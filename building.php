<?php
require('config.php');
class Employee extends Dbconfig {
    protected $hostName;
    protected $userName;
    protected $password;
    protected $dbName;
    private $empTable = 'building';
    private $dbConnect = false;
    public function __construct(){
        if(!$this->dbConnect){
            $database = new dbConfig();
            $this -> hostName = $database -> serverName;
            $this -> userName = $database -> userName;
            $this -> password = $database ->password;
            $this -> dbName = $database -> dbName;
            $conn = new mysqli($this->hostName, $this->userName, $this->password, $this->dbName);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            } else{
                $this->dbConnect = $conn;
            }
        }
    }
    private function getData($sqlQuery) {
        $result = mysqli_query($this->dbConnect, $sqlQuery);
        if(!$result){
            die('Error in query: '. mysqli_error());
        }
        $data= array();
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[]=$row;
        }
        return $data;
    }
    private function getNumRows($sqlQuery) {
        $result = mysqli_query($this->dbConnect, $sqlQuery);
        if(!$result){
            die('Error in query: '. mysqli_error());
        }
        $numRows = mysqli_num_rows($result);
        return $numRows;
    }
    public function employeeList(){
        $sqlQuery = "SELECT * FROM building ";
        if(!empty($_POST["search"]["value"])){
            $sqlQuery .= 'where(id LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= ' OR building_name LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= ' OR area LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= ' OR total_flat LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= ' OR common_meter_no LIKE "%'.$_POST["search"]["value"].'%") ';
        }
        if(!empty($_POST["order"])){
            $sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        } else {
            $sqlQuery .= 'ORDER BY id DESC ';
        }
        if($_POST["length"] != -1){
            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }
        $result = mysqli_query($this->dbConnect, $sqlQuery);
        
        $sqlQuery1 = "SELECT * FROM ".$this->empTable." ";
        $result1 = mysqli_query($this->dbConnect, $sqlQuery1);
        $numRows = mysqli_num_rows($result1);
        
        $employeeData = array();
        while( $employee = mysqli_fetch_assoc($result) ) {
            $empRows = array();
            $empRows[] = $employee['id'];
            $empRows[] = ucfirst($employee['building_name']);
            $empRows[] = $employee['area'];
            $empRows[] = $employee['total_flat'];
            $empRows[] = $employee['common_meter_no'];
        
            $empRows[] = ' <button type="button" name="delete" id="'.$employee["id"].'" class="btn btn-danger btn-xs delete" ><i class="fa fa-trash"></i></button>';
          
            $employeeData[] = $empRows;
        }
        $output = array(
            "draw"				=>	intval($_POST["draw"]),
            "recordsTotal"  	=>  $numRows,
            "recordsFiltered" 	=> 	$numRows,
            "data"    			=> 	$employeeData
        );
        echo json_encode($output);
    }
    public function getEmployee(){
        if($_POST["empId"]) {
            $sqlQuery = "
				SELECT * FROM ".$this->empTable."
				WHERE id = '".$_POST["empId"]."'";
            $result = mysqli_query($this->dbConnect, $sqlQuery);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            echo json_encode($row);
        }
    }
    public function updateEmployee(){
        if($_POST['empId']) {
            $updateQuery = "UPDATE ".$this->empTable."
			SET name = '".$_POST["empName"]."', age = '".$_POST["empAge"]."', skills = '".$_POST["empSkills"]."', address = '".$_POST["address"]."' , designation = '".$_POST["designation"]."'
			WHERE id ='".$_POST["empId"]."'";
            $isUpdated = mysqli_query($this->dbConnect, $updateQuery);
        }
    }
    public function addEmployee(){
        $act = implode(',',array_filter($_POST['common_meter_no']));
        $insertQuery = "INSERT INTO ".$this->empTable." (building_name,area,total_flat,common_meter_no)
			VALUES ('".$_POST["building_name"]."', '".$_POST["area"]."', '".$_POST["all_flat"]."', '$act')";
        $isUpdated = mysqli_query($this->dbConnect, $insertQuery);
        if($isUpdated==1)
        {
            $last_id = $this->dbConnect->insert_id;
            $count = count($_POST['sn']);
            for($i=0; $i<$count; $i++)
            {
                $flatall=$_POST['total_flat'][$i];
                
                for($j=1; $j<=$flatall; $j++)
                {
                    $insert1="INSERT INTO flat_details(flat_no,building_name,sn,wing,status,b_id)
    		        VALUES ('$j','".$_POST["building_name"]."','{$_POST['sn'][$i]}','{$_POST['wing'][$i]}','Empty','$last_id')";
                    mysqli_query($this->dbConnect, $insert1);
                }
            }
        }
        if($isUpdated==1)
        {
           
            $count = count($_POST['sn']);
            for($i=0; $i<$count; $i++)
            {
                $flatall=$_POST['total_flat'][$i];
                
                for($j=1; $j<=$flatall; $j++)
                {
                    $insert2="INSERT INTO rent_update_details(flat_no,building_name,sn,wing,b_id)
    		        VALUES ('$j','".$_POST["building_name"]."','{$_POST['sn'][$i]}','{$_POST['wing'][$i]}','$last_id')";
                    mysqli_query($this->dbConnect, $insert2);
                }
            }
        }
    }
    public function deleteEmployee(){
        if($_POST["empId"]) {
            $sqlDelete = "
				DELETE FROM ".$this->empTable."
				WHERE id = '".$_POST["empId"]."'";
            $query1=mysqli_query($this->dbConnect, $sqlDelete);
            if($query1==1){
             
                $sqlDelete1 = "
				DELETE FROM flat_details
		     	WHERE b_id = '".$_POST["empId"]."'";
               mysqli_query($this->dbConnect, $sqlDelete1);
            }
        }
    }
}
?>