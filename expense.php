<?php
require('config.php');
class Employee extends Dbconfig {
    protected $hostName;
    protected $userName;
    protected $password;
    protected $dbName;
    private $empTable = 'building_expense';
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
        $sqlQuery = "SELECT * FROM ".$this->empTable." ";
        if(!empty($_POST["search"]["value"])){
            $sqlQuery .= 'where(id LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= 'OR building_name  LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= 'OR wing  LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= 'OR common_meter_no  LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= 'OR expense_amt  LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= 'OR date LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= 'OR expense_type  LIKE "%'.$_POST["search"]["value"].'%") ';    
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
            $empRows[] = $employee['wing'];
            $empRows[] = $employee['expense_type'];
            $empRows[] = $employee['expense_amt'];
            $empRows[] = $employee['common_meter_no'];
            $empRows[] = $employee['date'];

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
			SET area = '".$_POST["area"]."'
			WHERE id ='".$_POST["empId"]."'";
            $isUpdated = mysqli_query($this->dbConnect, $updateQuery);
        }
    }
    public function addEmployee(){
        $insertQuery = "INSERT INTO ".$this->empTable." (building_name,common_meter_no,expense_type,expense_amt,date,wing)
			VALUES ('".$_POST["building_name"]."','".$_POST["common_meter_no"]."','".$_POST["expense_type"]."','".$_POST["expense_amt"]."','".$_POST["date"]."','".$_POST["wing"]."')";
        $isUpdated = mysqli_query($this->dbConnect, $insertQuery);
    }
    public function deleteEmployee(){
        if($_POST["empId"]) {
            $sqlDelete = "
				DELETE FROM ".$this->empTable."
				WHERE id = '".$_POST["empId"]."'";
            mysqli_query($this->dbConnect, $sqlDelete);
        }
    }
}
?>