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
  <link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css" rel="stylesheet">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
              <link href="lib/select2/select2.min.css" rel="stylesheet"/>
    <script src="lib/select2/select2.min.js"></script>  
<script type="text/javascript">
function delete_data(id)
{
 if(confirm('Sure To Remove This Record ?'))
 {
  window.location.href='del_category.php?id='+id;
 }
}
</script>
<style>
div.dt-buttons {

    margin-left: 10px;
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
  <a href="home.php" class="logo"><span>Rent</span></a>
      <!--logo end-->
     <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">

 			 <?php  include 'header-notify.php';?>
          <!-- notification dropdown start-->
   
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
            <a  href="home.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          
            <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-home"></i>
              <span>Manage Property</span><label class="label pull-right"><i class="fa fa-angle-down" style="color:#404E67;"></i></label>
              </a>
              <ul class="sub">
                 <li><a href="view-building.php">Add Building </a></li>
                 <li><a href="view-flat-building.php">Add Flat  </a></li>
            </ul>
          </li>
          
          <li>
             <a href="view-tenant-building.php">
             <i class="fa fa-user"></i>
              <span>Tenant Details</span>
              <span class="label label-theme pull-right mail-info"></span>
              </a>
          </li>

          <li>
             <a href="view-rent-flat.php">
             <i class="fa fa-inr"></i>
              <span>Rent</span>
              <span class="label label-theme pull-right mail-info"></span>
              </a>
          </li>
 			  <li>
             <a href="view-expenses.php">
             <i class="fa fa-money"></i>
              <span>Expense</span>
              <span class="label label-theme pull-right mail-info"></span>
              </a>
          </li> 
                   
                <li class="sub-menu">
            <a class="active"   href="javascript:;">
              <i class="fa fa-file"></i>
              <span>Report</span><label class="label pull-right"><i class="fa fa-angle-down" style="color:#404E67;"></i></label>
              </a>
              <ul class="sub">
                 <li class="active"><a  href="view_tenant_report.php"> Rent </a></li>
                 
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
      <h3>Rent Report</h3>  
                 <form class="form-horizontal style-form" action="" method="post" style="border-radius: 15px;background:white;">
    
            <div class="form-panel" style="    box-shadow: none;">
          
            <p style="color:#FF0000;"></p>
               <div class="form-group">
            
            	 <div class="col-sm-4">
                  <label class="col-sm-2 control-label lab_name">To:</label>
                  <div class="col-sm-10">
                  
                      <input type="date" size="16" class="form-control" name="to_date" required>
                      
                                    
                  </div>
                </div>
                <div class="col-sm-4">
                  <label class="col-sm-2 control-label lab_name">from:</label>
                  <div class="col-sm-10">
                  
                      <input type="date" size="16" class="form-control" name="from_date" required>
                      
                                    
                  </div>
                </div>
            <div class="col-sm-4">
                  <label class="col-sm-2 control-label lab_name">Tenant Name:</label>
                  <div class="col-sm-10">                  
                                           <select name="name" class="form-control" id="select2">
                                     	<option value="" disabled selected>Select From Here</option>
                                           <?php  
                                            $query = "select user_name from flat_rental;";  
                                            $result = mysqli_query($conn, $query);  
                                            while($row = mysqli_fetch_array($result))  
                                            {  
                                             ?>
                                     	<option value="<?php echo $row["user_name"];  ?>"><?php echo $row["user_name"];  ?></option>
                                     	<?php 
                                            }
                                            ?>
                                     </select> 
                      <script type="text/javascript">
    $("#select2").select2({
        templateResult: formatState
    });
    function formatState (state) {
        if (!state.id) {
            return state.text;
        }
        var baseUrl = "flags";
        var $state = $(
            '<span> ' + state.text + '</span>'
        );
        return $state;
    }
</script>        
                  </div>
                </div>
    
                </div>
           

                 <div class="form-send">
                 <button type="submit" value="submit" name="update" class="btn btn-large  btn-theme btn-primary">Show Rent</button>
                   <button type="Reset" class="btn btn-large btn-primary">Reset</button>
              </div>  </div>
           <!-- /row -->
         </form>  
       <?php
if(isset($_POST['update'])) {
    error_reporting(0);
    $from_date=$_POST['from_date'];
    $to_date=$_POST['to_date'];
    $name=$_POST['name'];
    ?>
        <div class="row" style="margin-top:10px;">
        
          <div class="col-lg-12">
            <div class="content-panel">
              <h4>Rent Details</h4>
            <div class="adv-table" id="no-more-tables">
              <table cellpadding="0" cellspacing="0" border="0" class="table-striped table table-hover table-condensed cf" id="example">
  			  														
                             <thead class="cf">
                    <tr>
                  
                    <th>Sr.No</th>
                     <th>Flat No</th>
                     <th>Building</th>
					 <th>Wing</th>  
					  <th>Tenant Name</th> 
					 <th>Phone</th>
         			 <th>Rent</th>
         			  <th>Total Reading </th>      
         			  <th>Lightbill </th>      
					 <th>Total Rent</th>  
					  <th>Paid Rent</th>  
					 <th>Date</th>  
                  </tr>

                  </thead>

<?php 

include 'dbConfig.php';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * from flat_rent where rent_paid_date between '$to_date' and '$from_date%' and user_name like '%".$name."%' "; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
?>
     <tbody>
     <?php 
         $count = 1;
         while($row = $result->fetch_assoc()) {
     ?>
     <tr>
    				 	
   						<td data-title="ID"><?php echo $count; ?></td>
                     	<td  data-title="Flat No"><?php echo $row["flat_no"];  ?></td>
                     	<td data-title="Building"><?php echo $row["building_name"];  ?></td>
                     	<td data-title="wing"><?php echo $row["wing"];  ?></td>
                     	<td data-title="Tenant Name"><?php echo $row["user_name"];  ?></td>
                        <td data-title="Phone"><?php echo $row["phone"];  ?></td>
                        <td data-title="Rent"><?php echo $row["rent"];  ?></td>
                        <td data-title="Reading"><?php echo $row["total_meter_reading"];  ?></td>
                        <td data-title="Lightbill"><?php echo $row["lightbill_amt"];  ?></td>                  
                        <td data-title="total Rent"><?php echo $row["final_rent_amt"];  ?></td>
                        <td data-title="Paid Rent"><?php echo $row["paid_amt"];  ?></td>
  					        <td data-title="Date"><?php echo $row["rent_paid_date"];  ?></td>
		</tr>
		
	<?php 	
	$count=$count+1;}
                            } else {
                                echo "History of outstanding till yet";
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
        <?php } ?>
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
          &copy;<strong>P&amp;N MUTKE INFOTECH</strong>. All Rights Reserved

        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->

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

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>

  <script type="text/javascript" src="lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  
  
  <script type="text/javascript" src="lib/adv-export/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="lib/adv-export/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="lib/adv-export/jszip.min.js"></script>
  <script type="text/javascript" src="lib/adv-export/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" src="lib/adv-export/buttons.html5.min.js"></script>
  <!--script for this page-->
  <script>
  $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
  </script>
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
          [0, 'asc']
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
