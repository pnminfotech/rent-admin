<?php

include("config/config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $Email = mysqli_real_escape_string($link,$_POST['Email']);
    $Pwd = mysqli_real_escape_string($link,$_POST['Pwd']);
    
    $sql = "SELECT staff.Email,staff.Role FROM staff WHERE Email = '$Email' AND Pwd ='$Pwd'"; // Remember You do not need to check role here so you can accept both
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
    $count = mysqli_num_rows($result);
    
    if($count == 1) {
        
        $_SESSION['login_user'] = $Email;
        
        if($row["Role"] == "admin"){ //Check the role here
            header("location: pages/dashboard/dashboard_admin.php");
        }else{ // If you want to be more specific you can write a else-if here too.
            header("location: pages/dashboard/dashboard_super_admin.php");
        }
    }else {
        $error = "Your Login Name or Password is invalid";
    }
}



?>