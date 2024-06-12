
<?php

//database_connection.php

$connect = new PDO("mysql:host=localhost; dbname=ganesh_agency;", "root", "6WjuW+YX:J\\O8:i4\\I;f;7@r");

function fill_select_box($connect, $category_id)
{
    $query = 
              "select a.*,b.gst as gst_total from product_details a,category b where a.category=b.id and a.gst=b.id and a.id='".$category_id."'";
    $statement = $connect->prepare($query);
    
    $statement->execute();
    
    $result = $statement->fetchAll();
    
    $output = '';
    foreach($result as $row)
    {
        $output .= '<option value="'.$row["gst_total"].'">'.$row["gst_total"].'</option>';
    }    
    return $output;
}

?>