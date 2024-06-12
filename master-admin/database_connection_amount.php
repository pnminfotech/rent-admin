
<?php

//database_connection.php

$connect = new PDO("mysql:host=localhost; dbname=ganesh_agency;", "root", "6WjuW+YX:J\\O8:i4\\I;f;7@r");

function fill_select_box($connect, $category_id)
{
    $query = 
              "select * from stock_details  where id='".$category_id."'";
    $statement = $connect->prepare($query);
    
    $statement->execute();
    
    $result = $statement->fetchAll();
    
    $output = '';
    foreach($result as $row)
    {
        $output .= '<option value="'.$row["purchase_amount"].'">'.$row["purchase_amount"].' In Stock</option>';
    }
    
    return $output;
}

?>