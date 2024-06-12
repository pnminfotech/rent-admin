<?php
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
$connection = mysqli_connect("localhost", "root", "6WjuW+YX:J\\O8:i4\\I;f;7@r");
$db = mysqli_select_db($connection,"ganesh_agency");
// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query( $connection,"select * from users where password='$password' AND name='$username'");
$rows = mysqli_num_rows($query);
if ($rows == 1) {
	if(!empty($_POST["remember"]))
{
    setcookie ("member_login",$username,time()+ (10 * 365 * 24 * 60 * 60));
    setcookie ("member_password",$password,time()+ (10 * 365 * 24 * 60 * 60));
    $_SESSION["admin_name"] = $username;
}
else
{
    if(isset($_COOKIE["member_login"]))
    {
        setcookie ("member_login","");
    }
    if(isset($_COOKIE["member_password"]))
    {
        setcookie ("member_password","");
    }
} 
header("Location:home.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
mysqli_close($connection); // Closing Connection
}
}
?>
