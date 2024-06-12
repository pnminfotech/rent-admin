<?php
require('config.php');
class Employee extends Dbconfig {
    protected $hostName;
    protected $userName;
    protected $password;
    protected $dbName;
    private $empTable = 'flat_details';
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
        $Flat_no=$_GET[''];
        $sqlQuery = "SELECT * FROM ".$this->empTable." ";
        if(!empty($_POST["search"]["value"])){
            $sqlQuery .= 'where(id LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= ' OR flat_no LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= ' OR wing LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= ' OR building_name LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= ' OR room_type LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= ' OR property LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= ' OR sq_ft LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= ' OR owner_name LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= ' OR meter_no LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= ' OR floor LIKE "%'.$_POST["search"]["value"].'%") ';    
        
        }
        if(!empty($_POST["order"])){
            $sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        } else {
            $sqlQuery .= 'ORDER BY id ASC ';
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
            $empRows[] = $employee['flat_no'];
            $empRows[] = $employee['wing'];
            $empRows[] = $employee['room_type'];
            $empRows[] = $employee['property'];
            $empRows[] = $employee['sq_ft'];
            $empRows[] = $employee['owner_name'];
            $empRows[] = $employee['meter_no'];
            $empRows[] = $employee['floor'];
      
            $empRows[] = '<button type="button" name="update" id="'.$employee["id"].'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';
            
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
			SET property = '".$_POST["property"]."', room_type = '".$_POST["room_type"]."', sq_ft = '".$_POST["sq_ft"]."', availonrent = 'Available' , meter_no = '".$_POST["meter_no"]."',
           floor = '".$_POST["floor"]."', owner_name = '".$_POST["owner_name"]."'
	       WHERE id ='".$_POST["empId"]."'";
            $isUpdated = mysqli_query($this->dbConnect, $updateQuery);
        }
    }
    public function addEmployee(){
      
    }
    public function deleteEmployee(){
   
    }
}
?>