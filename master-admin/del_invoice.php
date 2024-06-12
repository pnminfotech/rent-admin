<?php
include 'dbConfig.php';
$id=$_REQUEST["id"];

//$query = "DELETE FROM invoice WHERE id=$id";
$query = "select count(sn) as total,product,product_weight,qty from product_invoice where q_id=$id";
$result = mysqli_query($conn,$query) or die ( mysqli_error($conn));
$row=mysqli_fetch_assoc($result);
echo $row['total'];

$count = $row['total'];

for($i=1; $i<=$count; $i++)
{
    $query11 = "select product,product_weight,qty from product_invoice where q_id=$id and sn=$i";
    $result11 = mysqli_query($conn,$query11) or die ( mysqli_error($conn));
    $row11=mysqli_fetch_assoc($result11);
    $product = $row11['product'];
    $qty = $row11['qty'];   
    $str2 = $row11['product_weight'];
    $str = preg_replace('/[^0-9.]+/', '', $str2);
    echo $str;
    
    
    
    $sel1="select * from stock_weight where stock_id=$product and weight=$str";
    $query4=mysqli_query($conn, $sel1)  or die(mysqli_error($conn));
    while($row1 = mysqli_fetch_array($query4))
    {
        echo $row1["balance_qty"];
        $bal=$row1["balance_qty"];
    }
    $ins2="insert into stock_details (date,qty_return,stock_id,balance_qty,weight,invoice_id)values(now(),'$qty','$product',$bal+$qty,$str,$id)";
    $query3=mysqli_query($conn,$ins2) or die(mysqli_error($conn));
    if($query3==1)
   {
        $inss4="UPDATE stock_weight SET balance_qty=$bal+$qty  WHERE stock_id =$product and weight=$str";
        $query4=mysqli_query($conn,$inss4)  or die(mysqli_error($conn));
        if($query4==1)
        {
            $query111 = "select unpaid_amount,name,mobile from invoice where id=$id";
            $result111 = mysqli_query($conn,$query111) or die ( mysqli_error($conn));
            $row111=mysqli_fetch_assoc($result111);
            $unpaid_amount12 = $row111['unpaid_amount'];
            $name = $row111['name'];
            $mobile = $row111['mobile'];
            echo  $unpaid_amount12;
            echo  $name;
            echo  $mobile;
            
            
            $query21 = "select outstanding from client where mobile='".$mobile."' and name='".$name."'";
            $result21 = mysqli_query($conn,$query21) or die ( mysqli_error($conn));
            $row21=mysqli_fetch_assoc($result21);
            $outstanding = $row21['outstanding'];

            $inss5="UPDATE client SET outstanding=$outstanding-$unpaid_amount12  WHERE  mobile='".$mobile."' and name='".$name."'";
            mysqli_query($conn,$inss5)  or die(mysqli_error($conn));
        
        }
   }
}

$query43 = "DELETE FROM invoice WHERE id=$id";
$result143 = mysqli_query($conn,$query43) or die ( mysqli_error());
if($result143==1){
       $query1 = "DELETE FROM product_invoice WHERE q_id=$id";
       mysqli_query($conn,$query1) or die ( mysqli_error());
}
echo '<script language="javascript">';
echo 'location.href="view_invoice.php";';
echo 'alert("Invoice Deleted");';
echo '</script>';
//if($result==1){   
//    $query1 = "DELETE FROM product_invoice WHERE q_id=$id";
//    $result2=mysqli_query($conn,$query1) or die ( mysqli_error());
//    if($result2==1){ 
//        $query2="";
  
//    echo '<script language="javascript">';
//    echo 'location.href="view_invoice.php";';
//    echo 'alert("Invoice Deleted");';
 //   echo '</script>';
//}

//}

?>