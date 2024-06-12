
<?php
include 'dbConfig.php';
$id=$_REQUEST["id"];

$query111 = "select * from stock_details where id=$id";
$result111 = mysqli_query($conn,$query111) or die ( mysqli_error($conn));
$row111=mysqli_fetch_assoc($result111);
$qty_in = $row111['qty_in'];
$stock_id  = $row111['stock_id'];
$weight = $row111['weight'];
$size = $row111['size'];

$query21 = "select balance_qty from stock_weight where stock_id='".$stock_id."' and weight='".$weight."' and size='".$size."'";
$result21 = mysqli_query($conn,$query21) or die ( mysqli_error($conn));
$row21=mysqli_fetch_assoc($result21);
$balance_qty = $row21['balance_qty'];


$inss5="UPDATE stock_weight SET balance_qty=$balance_qty-$qty_in  WHERE stock_id='".$stock_id."' and weight='".$weight."' and size='".$size."'";
mysqli_query($conn,$inss5)  or die(mysqli_error($conn));

            $query4 = "DELETE FROM stock_details WHERE id=$id";
            mysqli_query($conn,$query4) or die ( mysqli_error());
    echo '<script language="javascript">';
    echo 'location.href="view_available_stock.php";';
    echo 'alert("Stock Deleted");';
    echo '</script>';


?>