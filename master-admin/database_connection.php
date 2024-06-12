<?php

//database_connection.php

$connect = new PDO("mysql:host=localhost; dbname=ganesh_agency;", "root", "6WjuW+YX:J\\O8:i4\\I;f;7@r");

function fill_select_box($connect)
{
    $query = "
  SELECT a.*,b.company_name as c_name FROM product_details a,product_company b where a.company_name=b.id";
    
    $statement = $connect->prepare($query);
    
    $statement->execute();
    
    $result = $statement->fetchAll();
    
    $output = '';    
    foreach($result as $row)
    {
        $output .= '<option value="'.$row["id"].'">'.$row["product_name"].'-'.$row['c_name'].'</option>';
    }
    
    return $output;
}

?>