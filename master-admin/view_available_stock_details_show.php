<?php
include('session.php');
?>
<?php
include 'dbConfig.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>pnm Infotech</title>

  

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
<script type="text/javascript">
function delete_data(id)
{
 if(confirm('Sure To Remove This Record ?'))
 {
  window.location.href='del_client.php?id='+id;
 }
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
     <a href="home.php" class="logo"><span>Ganesh</span>Agencies</a>
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
            <a  class="active" href="javascript:;">
              <i class="fa fa-bolt"></i>
              <span>Manage Setting</span><label class="label pull-right"><i class="fa fa-angle-down" style="color:#404E67;"></i></label>
              </a>
            <ul class="sub">
               <li><a href="view_user.php">Add USer</a></li>

              <li><a href="change_billing_password.php">Change Passoword</a></li>
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
    
    <section id="main-content">
      <section class="wrapper">
      <h3>Stock Details List</h3>  
       
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
             <?php  
                    include 'dbConfig.php';
                    $id=$_REQUEST['id'];
                    $sn=$_REQUEST['sn'];
                   // $program_name=$_REQUEST['name'];
                   // $company_name=$_REQUEST['company_name'];
                    $query = "select a.*,b.company_name as c_name,c.weight as weight1,c.sn,c.size,c.balance_qty from stock a,product_company b,stock_weight c where c.stock_id=a.id and c.sn='".$sn."' and a.id= '".$id."' and a.company_name=b.id";
                    $result = mysqli_query($conn, $query);  
                    while($row = mysqli_fetch_array($result))    
                    {  
                  ?>
               <div class="col-lg-12"><h4><?php echo $row["c_name"];  ?>-<?php echo $row["product_name"];  ?>-<?php echo $row["sub_product"];  ?> , Balance Quantity : <?php echo $row["balance_qty"];  ?> </h4></div>
               <?php } ?>
           <hr style="margin-top:50px;border-top: 1px solid #d9d2d2;">
            <div class="adv-table" id="no-more-tables">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-striped table-condensed cf" id="hidden-table-info">
  
                 <thead class="cf">
                    <tr>
                    <th>Sr.No</th>
                    <th>date</th>
            
                     <th>Quantity In</th>
              	  	<th>Quantity Out</th>
              	  	<th>Balance Quantity</th>
              	  	<th>Quantity Return</th>
              	  	<th>Invocie No</th>
              	       	
                        
                  </tr>

                  </thead>

<?php
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id=$_REQUEST['id'];
$weight=$_REQUEST['weight'];

$sql = "select * from stock_details where stock_id= '".$id."' and weight = '".$weight."'  order by id desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
?>
     <tbody>
     <?php 
     $count=1;
     while($row = $result->fetch_assoc()) {
         ?>
     <tr>
   						<td data-title="ID"><?php echo $count;  ?></td>
   						<td data-title="Name"><?php echo $row["date"];  ?></td>
                     	<td data-title="Opening Quantity"><?php echo $row["qty_in"];  ?></td>           
                     	<td data-title="Balance"><?php echo $row["qty_out"];  ?></td>
                     	<td data-title="balance Qty"><?php echo $row["balance_qty"];  ?></td>
                     	<td data-title="return Qty"><?php echo $row["qty_return"];  ?></td>
                     	<td data-title="invoice No"><?php echo $row["invoice_id"];  ?></td>
                     	

		</tr>
	<?php 	$count=$count+1;  }
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
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
           Powered by <a href="https://pnminfotech.com/"><img src="logo11.png" style="max-width:5%;"></a>
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

    $(document).ready(function() {
      /*
       * Insert a 'details' column to the table
       */
     


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
