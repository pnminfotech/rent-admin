
<?php

//database_connection.php

$connect = new PDO("mysql:host=localhost; dbname=ganesh_agency;", "root", "6WjuW+YX:J\\O8:i4\\I;f;7@r");

function fill_select_box($connect, $category_id)
{
    $query = 
              "select * from stock_weight where stock_id='".$category_id."'";
    $statement = $connect->prepare($query);
    
    $statement->execute();
    
    $result = $statement->fetchAll();
    
    $output = '';
    $output .= '<option value="" disabled selected>Select Weight</option>';
    foreach($result as $row)
    {
        $output .= '<option value="'.$row["weight"].$row["size"].'">'.$row["weight"].$row["size"].' - '.$row["balance_qty"].' Stock</option>';
    }
    
    return $output;
}

?>