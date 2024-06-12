<?php

//database_connection.php

$connect = new PDO("mysql:host=localhost; dbname=ganesh_agency;", "root", "6WjuW+YX:J\\O8:i4\\I;f;7@r");

function fill_select_box($connect, $category_id)
{
    $query = "
  select * from stock_details where stock_id = '".$category_id."' and lot_no is not null
 ";
    
    $statement = $connect->prepare($query);
    
    $statement->execute();
    
    $result = $statement->fetchAll();
    
    $output = '';
    $output .= '<option value="" disabled selected>Select Lot Number</option>';
    foreach($result as $row)
    {
        $output .= '<option value="'.$row["lot_no"].'">'.$row["lot_no"].'</option>';
    }
    
    
    return $output;
}

?>

