<?php

//fill_sub_category.php

include('database_connection_amount.php');

echo fill_select_box($connect, $_POST["category_id"]);


/* Fetching city data
$state_id=!empty($_POST['state_id'])?$_POST['state_id']:'';
if(!empty($state_id))
{
    $cityData="SELECT id, name from cities WHERE state_id=$state_id";
    $result=mysqli_query($conn,$cityData);
    if(mysqli_num_rows($result)>0)
    {
        echo "<option value=''>Select City</option>";
        while($arr=mysqli_fetch_assoc($result))
        {
            echo "<option value='".$arr['id']."'>".$arr['name']."</option><br>";
            
        }
    }
}
*/
?>