<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
    header("location: home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Dashboard">
<meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
<title>Pnm Infotech</title>

<!-- Bootstrap core CSS -->
<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--external css-->
<link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
<!-- Custom styles for this template -->
<link href="css/style.css" rel="stylesheet">
<link href="css/style-responsive.css" rel="stylesheet">

<style>

</style>
</head>

<body>
<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->




<div id="login-page">
            <div class="container">
       <form class="form-login" action="" method="post" autocomplete="off">
      <div class="card-header border-0">
                  <div class="card-title text-center">
                    <div class="p-1">
                      <img src="logo1.png" alt="branding logo" style="width: 170px;">
                    </div>
                  </div>
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>Master Admin Login with PNM Software</span>
                  </h6>
        </div>
        <div class="login-wrap">
             <input type="text" name="username" class="form-control" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" placeholder="User ID" autofocus required/>
          <br>
          <input type="password" name="password" class="form-control" placeholder="Password" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>" id="myInput" required/>
        <label class="checkbox" style="text-indent:20px;">
          <!--  <input type="checkbox" value="remember-me">Remember me
            <input type="checkbox" onclick="myFunction()">Show Password -->
        
            <span class="pull-right">
            <input type="checkbox" onclick="myFunction()">Show Password
           <!--  <a data-toggle="modal" href="index.jsp#myModal"> Forgot Password?</a>--> 
            </span>
            </label>
            <div class="form-group">  
     <input type="checkbox" name="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />  
     <label for="remember-me">Remember me</label>  
    </div> 
          <button class="btn btn-theme btn-block"  type="submit" name="submit" autofill="off"><i class="fa fa-unlock"></i> SIGN IN</button>
          <span style="color:red;"><?php echo $error; ?></span>
          
          <hr>
       
        </div>
          </form>
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <form  action="forgot_mail.php" method="post">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Forgot Password ?</h4>
              </div>
              <div class="modal-body">
               
                <p>Enter your e-mail address below to reset your password.</p>
                <input type="email" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-theme" type="submit">Submit</button>
              </div>
             </form>
            </div>
          </div>
        </div>
        <!-- modal -->
      </div>
  </div>

  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>

        <script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>


</body>
    
</html>


