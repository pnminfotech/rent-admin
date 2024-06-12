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
    <link href="lib/fancybox/jquery.fancybox.css" rel="stylesheet" />
      <script src="lib/jquery/jquery.min.js"></script>
<script type="text/javascript">
function delete_data(id)
{
 if(confirm('Sure To Remove This stock?'))
 {
  window.location.href='del_stock.php?id='+id;
 }
}
</script>
<style>
.cell-breakWord {
   word-wrap: break-word;
   max-width: 1px;
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
      <h3>Stock List</h3>  
          
                         <?php  
                    include 'dbConfig.php';
                    $id=$_REQUEST['id'];
                    $sn=$_REQUEST['sn'];
                  
                    {  
                  ?>                       
         
            <?php }?>

        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">`
             <?php  
                    include 'dbConfig.php';
                    $id=$_REQUEST['id'];
                   // $program_name=$_REQUEST['name'];
                   // $company_name=$_REQUEST['company_name'];
                    $query = "select a.*,b.company_name as c_name,c.weight as weight1,c.sn,c.size,c.balance_qty from stock a,product_company b,stock_weight c where c.stock_id=a.id and c.sn='".$sn."' and a.id= '".$id."' and a.company_name=b.id";;
                    $result = mysqli_query($conn, $query);  
                    while($row = mysqli_fetch_array($result))    
                    {  
                  ?>
               <div class="col-lg-6"><h4><?php echo $row["c_name"];  ?>-<?php echo $row["product_name"];  ?>-<?php echo $row["sub_product"];  ?>, Weight : <?php echo $row["weight1"];  ?><?php echo $row["size"];  ?> </h4></div>
               <?php } ?>
           <hr style="margin-top:50px;border-top: 1px solid #d9d2d2;">
            <div class="adv-table" id="no-more-tables">
              <table cellpadding="0" cellspacing="0" border="0" class="table-striped table table-hover table-condensed cf" id="hidden-table-info">
  
                 <thead class="cf">
                    <tr>
                    <th>Sr.No</th>
                    <th>Bill</th>
                    <th>Party</th>
                    <th>date</th>
                    <th>Qty</th>   
          			<th>In Tonn</th>  
          			
                    <th>Purchase Amt</th>
                    <th>Total Amt</th>
                    <th>Outstan</th>  
                    <th>Total Pay</th>
                    <th>Tax</th>
                    <th>Expiry Date</th>
                    <th>Invoice Number</th>
                    <th>Invoice Date</th>
                     <th>Chalan Number</th>
                    <th>Chalan Date</th>
                    <th style="display:none">Vehicle Rent</th>
                    <th style="display:none">Vehicle Number</th>
                    <th style="display:none">Hamali Rent</th>
                    <th style="width:155px">Lot No</th>
                    <th style="display:none">Driver No</th>
                     <th style="display:none">transport_name</th>
                    <th>Action</th>       
        	       	
                        
                  </tr>

                  </thead>

<?php
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id=$_REQUEST['id'];
$weight=$_REQUEST['weight'];
$sql = "select * from stock_details where stock_id= '".$id."' and weight = '".$weight."' and qty_in is not null and purchase_amount is not null order by id desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
?>
     <tbody>
     <?php 
     $count=1;     
     while($row = $result->fetch_assoc()) {
         ?>
     <tr>
   						  <td data-title="ID"><?php echo $count; ?></td>
   					 <?php echo '<td><a class="fancybox" href="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" target="_blank"><img src="data:image/jpeg;base64,'.base64_encode( $row['image']).'" height="100" width="50" class="img-responsive img-thumnail" /></a> </td>  '?>

					<td data-title="Party Name"><?php echo $row["party_name"];  ?></td> 
   						<td data-title="Name"><?php echo $row["date"];  ?></td>
                     	<td data-title="Opening Quantity"><?php echo $row["qty_in"];  ?></td> 
                		<td data-title="In tonnes"><?php echo $row["tonnes"];  ?></td> 
                	
                     	<td data-title="Purchase Amount"><?php echo $row["purchase_amount"];  ?></td> 
                     	<td data-title="Total Amount"><?php echo $row["total_amount"];  ?></td> 
                     	 <td data-title="outstandings"><?php echo $row["outstanding"];  ?></td> 
                     	<td data-title="Total Pay Amount"><?php echo $row["paid_amount"];  ?></td> 
                     	<td data-title="Tax"><?php echo $row["tax"];  ?></td> 
                        <td data-title="Expiry Date"><?php echo $row["expiry_date"];  ?></td>    
                     	<td data-title="invoice_number"><?php echo $row["invoice_number"];  ?></td> 
                     	   	<td data-title="invoice_date"><?php echo $row["invoice_date"];  ?></td> 
                     	<td data-title="Chalan number"><?php echo $row["chalan_no"];  ?></td> 
                     	<td data-title="Chalan Date"><?php echo $row["chalan_date"];  ?></td> 
                  
                     	<td data-title="veicle_rent" style="display:none"><?php echo $row["veicle_rent"];  ?></td> 
                     	<td data-title="veicle_number" style="display:none"><?php echo $row["veicle_number"];  ?></td>  
                     	<td data-title="hamali_rent" style="display:none"><?php echo $row["hamali_rent"];  ?></td> 
                     	<td data-title="lot" class="cell-breakWord"><?php echo $row["lot_no"];  ?></td>     
                     	<td data-title="lot" style="display:none"><?php echo $row["driver_no"];  ?></td>  
                     	<td data-title="lot" style="display:none"><?php echo $row["transport_name"];  ?></td>   
                     	<td data-title="Action">            
                       <a href="javascript:delete_data(<?php echo $row["id"]; ?>)"> <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
						
						</td>      
                     	
                                    
		</tr>
	<?php 		$count=$count+1; }
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
    <script src="lib/fancybox/jquery.fancybox.js"></script>
  <!--script for this page-->
    <script type="text/javascript">
    $(function() {
      //    fancybox
      jQuery(".fancybox").fancybox();
    });
  </script>
  
<script type="text/javascript">
    /* Formating function for row details */
    function fnFormatDetails(oTable, nTr) {
      var aData = oTable.fnGetData(nTr);
      var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
      sOut += '<tr><td>Vehicle Rent:</td><td>' + aData[17] + ' </td></tr><tr><td>Hamali Rent:</td><td>' + aData[19] + '</td></tr><tr><td>Vehicle No : </td><td>' + aData[18] + '.</td></tr><tr><td>Transport Name: </td><td>' + aData[22] + '.</td></tr><tr><td> and Driver No : </td><td>' + aData[21] + '</td></tr>';
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
      nCloneTd.className = "center";

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
