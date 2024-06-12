<?php
//Database details
$db_host     = 'localhost';
$db_username = 'root';
$db_password = '6WjuW+YX:J\\O8:i4\\I;f;7@r';
$db_name     = 'ganesh_agency';

//Create connection and select DB
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

if($conn->connect_error){
    die("Unable to connect database: " . $conn->connect_error);
}
//6WjuW+YX:J\O8:i4\I;f;7@r


//SELECT a.*,sum(a.vatAmountinput) as gst_total,sum(a.rowtotal) as without_gst,sum(a.c_amt) as c_total,sum(a.s_amt) as s_total,b.product_name,b.display_name,c.company_name as c_name,d.totalwithgst FROM product_invoice a,product_details b,product_company c,invoice d where b.company_name=c.id and b.id=a.display_name and d.id=a.q_id and a.product=b.id and a.q_id =$id group by vatinput;