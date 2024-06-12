<?php
include('session.php');
?>
<?php

if(isset($_POST['update'])) {
    include 'dbConfig.php';
    // create a variable
    
    $password=$_POST['conpassword'];
    
    $user=$_POST['user'];
    //Execute the query
    
    
   $query= mysqli_query($conn,"UPDATE master_login SET password = '$password',username='$user'
        WHERE id = 1");

    if(mysqli_affected_rows($conn) > 0){
        echo '<script language="javascript">';
        echo 'alert("Successfully Change Details");';
     //   echo 'location.href="change_billing_password.php";';
        echo '</script>';
    } else {
        echo "NOT Updated<br />";
        echo mysqli_error($conn);
    
   }
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

  <!-- Favicons -->
  <link href="img/" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>
    <script type="text/javascript">
function fncSubmit()
{

if(document.ChangePasswordForm.password.value == "")
{
alert('Please input old password');
document.ChangePasswordForm.password.focus();
return false;
} 

if(document.ChangePasswordForm.newpassword.value == "")
{
alert('Please input Password');
document.ChangePasswordForm.newpassword.focus(); 
return false;
} 

if(document.ChangePasswordForm.conpassword.value == "")
{
alert('Please input Confirm Password');
document.ChangePasswordForm.conpassword.focus(); 
return false;
} 

if(document.ChangePasswordForm.newpassword.value != document.ChangePasswordForm.conpassword.value)
{
alert('Confirm Password Not Match');
document.ChangePasswordForm.conpassword.focus(); 
return false;
} 
document.ChangePasswordForm.submit();
}
</script>
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
      <!--header start-->
      <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
  <a href="home.php" class="logo"><b><span>Ganesh</span>Agency</b></a>
      <!--logo end-->
     <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">


          <!-- notification dropdown start-->
          <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="view_follow_up.php">
              <i class="fa fa-bell-o"></i>
              <span class="badge bg-warning">
                <?php
                include('dbConfig.php');
                $currdate=date("Y-m-d");
                $result=mysqli_query($conn,"select count(*) as total from follow_up where next_date='$currdate'");
                $data=mysqli_fetch_assoc($result);
                echo $data['total'];
                
                ?>
                </span>
              </a>
          </li>
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li>
          	<form action="logout.php" method="post">
          		<input type="submit" class="btn btn-large btn-primary" style="margin-top:10px;" value="logout">
          	</form>
          	</li>
        </ul>
      </div>
    </header>
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
               <ul class="sidebar-menu" id="nav-accordion">
         
          <li class="mt">
            <a  class="active"  href="home.php">
              <i class="fa fa-dashboard"></i>
              <span>Home</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-bolt"></i>
              <span>Manage Setting</span><label class="label pull-right"><i class="fa fa-angle-down" style="color:#404E67;"></i></label>
              </a>
            <ul class="sub">
   			   <li><a href="view_user.php">Add USer</a></li>

              <li><a href="change_billing_password.php">Change Passowrd Billing </a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-inr"></i>
              <span>Sales</span><label class="label pull-right"><i class="fa fa-angle-down" style="color:#404E67;"></i></label>
              </a>
            <ul class="sub">
              <li><a href="view_invoice.php">Sales Invoice</a></li>
   
            </ul>
          </li>

            <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-houzz"></i>
              <span>Company / Stock</span><label class="label pull-right"><i class="fa fa-angle-down" style="color:#404E67;"></i></label>
              </a>
            <ul class="sub">

              <li><a href="view_available_stock.php">Stock</a></li>
   
            </ul>
          </li>
                    
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-inr"></i>
              <span>Expenses</span><label class="label pull-right"><i class="fa fa-angle-down" style="color:#404E67;"></i></label>
              </a>
            <ul class="sub">
      
              <li><a href="view_vendor.php">Other Expenses</a></li>
             
            </ul>
          </li>
          
             <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-file"></i>
              <span>Report</span><label class="label pull-right"><i class="fa fa-angle-down" style="color:#404E67;"></i></label>
              </a>
            <ul class="sub">
               <li><a href="home.php">Client</a></li>
               <li><a href="home.php">Company</a></li>
               <li><a href="view_stock_report.php">Stock</a></li>
               <li><a href="home.php">Payment</a></li>
               <li><a href="home.php">Total Tax</a></li>
               <li><a href="home.php">Total Sale</a></li>
             
              
             
            </ul>
          </li>
          

 

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->

        <!-- /row -->
            <section id="main-content">
      <section class="wrapper">
          <h3> Change Master Password</h3>
      	<?php 
include 'dbConfig.php';
//  $sql = "SELECT a.*,b.product_name,b.display_name,c.company_name as c_name FROM product_invoice a,product_details b,product_company c where b.company_name=c.id and b.id=a.display_name and a.product=b.id and a.q_id = 1 order by a.id";
//  $result = mysqli_query($conn, $sql);
// while($row = mysqli_fetch_array($result))
$query = mysqli_query($conn,"select * from master_login");

//display the items
$row = mysqli_fetch_assoc($query);
?>
      		 <form class="form-login" action="" name="ChangePasswordForm" OnSubmit="return fncSubmit();" method="post" style="margin:0 auto;">
        <h2 class="form-login-heading">Change Login Details</h2>
        <div class="login-wrap">
        <label>Your Old Username</label>
          <input type="text" name="user" class="form-control" value="<?php echo $row["username"]; ?>" required/>
          <br>
           <label>Your Old Password</label>
           <input type="text" name="password" class="form-control" value="<?php echo $row["password"]; ?>" required/>
          <br>
          <input type="password" name="newpassword" class="form-control" placeholder="New Password" id="myInput2" required/>
          <br>
          <input type="password" name="conpassword" class="form-control" placeholder="Confirm Password" id="myInput3" required/>
         
            <br>
           <button type="submit" value="submit" name="update" class="btn btn-large btn-block  btn-theme"><i class="fa fa-lock"></i> Change Login Details</button>
      
          <hr>
        </div>
  
      </form>
        <!-- /row -->
      </section>
    </section>

    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy;<strong></strong>. All Rights Reserved
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
          Powered by <a href="https://pnminfotech.com/">P&amp;N Mutke Infotech</a>
        </div>
        <a href="blank.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Welcome!',
        // (string | mandatory) the text inside the notification
        text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo.',
        // (string | optional) the image to display on the left
        image: 'logo1.png',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 8000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });
  </script>
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
</body>
</html>