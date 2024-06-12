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
  <link href="lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="lib/advanced-datatable/css/DT_bootstrap.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <link href="css/table-responsive.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
function delete_data(id)
{

  if(confirm('Sure To Remove This Record ?'))
 {
  window.location.href='del_invoice.php?id='+id;
 }
}
</script>
<style>
.center2 {
    margin: auto;
    width: 60%;
    padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.hideform {
    display: none;
}
</style>
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
            <a   href="home.php">
              <i class="fa fa-dashboard"></i>
              <span>Home</span>
              </a>
          </li>
          <li class="sub-menu">
            <a   href="javascript:;">
              <i class="fa fa-bolt"></i>
              <span>Manage Setting</span><label class="label pull-right"><i class="fa fa-angle-down" style="color:#404E67;"></i></label>
              </a>
            <ul class="sub">
              <li><a href="view_user.php">Add USer</a></li>
           
              <li><a href="change_billing_password.php">Change Passoword</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a class="active" href="javascript:;">
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
    
    <section id="main-content">
      <section class="wrapper">
      <h3>Sales Invoice List</h3>  
  
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <span style="font-size: 18px;margin-left: 10px;">Invoice Details </span><span style="font-size: 18px;margin-right: 10px;margin-bottom:10px;float:right">
                  <?php
            include 'dbConfig.php';
            $d=date("Y-m-d ");
            //echo  $d; 
            $sql1 = "SELECT sum(paid_amount) as total,sum(unpaid_amount) as untotal FROM invoice  where date LIKE '$d%' ORDER by id DESC";
            $result1 = $conn->query($sql1);
            $data=mysqli_fetch_assoc($result1);
            echo " Today's Income : ".$data['total']."Rs. &amp; Today's Outstanding : ".$data['untotal']."Rs.";
                ?>
            </span>
            <div class="adv-table" id="no-more-tables">

              <table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-condensed cf" id="hidden-table-info">
  
                   <thead class="cf">
                    <tr>
                    <th>Invoice No</th>
                    <th>Name</th>
                    <th>Adhar Card</th>   
                    <th>Phone</th>  
              		<th>Date</th>
              		<th>Paid Amount</th> 
              		<th>Remaining Amount</th>
              		        
              		<th style="display:none">none</th>    	
                    <th>Action</th>           
                  </tr>

                  </thead>

<?php
include 'dbConfig.php';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$d=date("Y-m-d ");
//echo  $d;
//$sql = "SELECT * FROM invoice where date LIKE '$d%' order by id desc";
$sql = "SELECT * FROM invoice order by id desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   

?>
     <tbody>
     <?php 
     while($row = $result->fetch_assoc()) {
         ?>
     <tr>
   						
                     	<td data-title="Name">IO-2020-<?php echo $row["id"];  ?></td>
                     	<td data-title="Email"><?php echo $row["name"];  ?></td>    
                     	<td data-title="Adhar Card"><?php echo $row["adhar_card"];  ?></td>
                     	<td data-title="Phone" ><?php echo $row["mobile"];  ?></td>
                     	<td data-title="Date"><?php echo $row["date"];  ?></td>
                     	<td data-title="Paid Amount" ><?php echo $row["paid_amount"];  ?></td>
                     	<td data-title="Unpaid Amount"><?php echo $row["unpaid_amount"];  ?></td>
                     	<td data-title="Mobile" style="display:none;"><?php echo $row["sales_person"];  ?></td>


	<td data-title="Action">


              <!--  <a href='update_invoice.php?id=<?php echo $row["id"]; ?>'> <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
          -->         <a href='print_pdf_invoice.php?id=<?php echo $row["id"]; ?>&name=<?php echo $row["name"]; ?>&mobile=<?php echo $row["mobile"]; ?>' target="_blank"> <button class="btn btn-primary btn-xs"><i class="fa fa-print"></i></button></a>
                <a href='download_pdf_invoice.php?id=<?php echo $row["id"]; ?>'> <button class="btn btn-primary btn-xs"><i class="fa fa-download"></i></button></a>
                 <a href='mail_pdf_invoice.php?id=<?php echo $row["id"]; ?>'> <button class="btn btn-primary btn-xs"><i class="fa fa-envelope"></i></button></a>
                <a href="javascript:delete_data(<?php echo $row["id"]; ?>)"> <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a> 

			</td>
		</tr>
	<?php 	 }
                            } else {
                                echo "0 results";
                            }
                            
                            mysqli_close($conn);
                            ?>
               </tbody>
              </table>


            </div>
          </div>
          <!-- page end-->
        </div>
        </div>
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
   <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; <strong></strong> All Rights Reserved
        </p>
        <div class="credits">

            Powered by <a href="https://pnminfotech.com/">P&amp;N Mutke Infotech</a>
        </div>
        <a href="advanced_table.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
<script type="text/javascript">
    /* Formating function for row details */
    function fnFormatDetails(oTable, nTr) {
      var aData = oTable.fnGetData(nTr);
      var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
      sOut += '<tr><td>Sales Person:</td><td>' + aData[8] + '</td></tr>';
      sOut += '<tr><td>Optional Address :</td><td>' + aData[13] + '</td></tr>';
      sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
      sOut += '</table>';

      return sOut;
    }

    $(document).ready(function() {
      /*
       * Insert a 'details' column to the table
       */
      var nCloneTh = document.createElement('th');
      var nCloneTd = document.createElement('td');
      nCloneTd.innerHTML = '<img src="lib/advanced-datatable/images/details_open.png">';
      nCloneTd.className = "center1";

      $('#hidden-table-info thead tr').each(function() {
        this.insertBefore(nCloneTh, this.childNodes[0]);
      });

      $('#hidden-table-info tbody tr').each(function() {
        this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
      });

      /*
       * Initialse DataTables, with no sorting on the 'details' column
       */
      var oTable = $('#hidden-table-info').dataTable({
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [0]
        }],
        "aaSorting": [
          [0, 'desc']
        ]
      });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
      $('#hidden-table-info tbody td img').live('click', function() {
        var nTr = $(this).parents('tr')[0];
        if (oTable.fnIsOpen(nTr)) {
          /* This row is already open - close it */
          this.src = "lib/advanced-datatable/images/details_open.png";
          oTable.fnClose(nTr);
        } else {
          /* Open this row */
          this.src = "lib/advanced-datatable/images/details_close.png";
          oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
        }
      });
    });
  </script>
</body>

</html>
