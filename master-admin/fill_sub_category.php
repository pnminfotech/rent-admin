<?php

//fill_sub_category.php

include('database_connection1.php');

echo fill_select_box($connect, $_POST["category_id"]);

?>