<?php
include('session.php');
?>
<?php

include 'dbConfig.php';

?>
<?php
$building_name=$_REQUEST['building_name'];
$wing=$_REQUEST['wing'];
$b_id=$_REQUEST['b_id'];
if(isset($_POST['update'])) {
  
    // create a variable
    $id=$_POST["id"];
    $flat_no=$_POST["flat_no"];
    $property=$_POST['property'];
    $room_type=$_POST['room_type'];
    $sq_ft=$_POST['sq_ft'];
    $meter_no=$_POST['meter_no'];
    $floor=$_POST['floor'];
    $availonrent='Available';
    $owner_name=$_POST['owner_name'];
    $phone=$_POST['phone'];
    //Execute the query
    
    
   $query= mysqli_query($conn,"UPDATE flat_details SET property = '$property',phone='$phone',room_type='$room_type',sq_ft='$sq_ft',availonrent='$availonrent',meter_no='$meter_no',floor='$floor',owner_name='$owner_name'
        WHERE id = '".$_POST["id"]."'");
   if($query==1){
     mysqli_query($conn,"UPDATE rent_update_details SET room_type='$room_type' where flat_no='$flat_no' and wing='$wing' and building_name='$building_name'");
     if(mysqli_affected_rows($conn) > 0){
        echo '<script language="javascript">;
        alert("Successfully Update flat_details");
        location.href="view-flat-main-info.php?flat_no='.$flat_no.'&b_id='.$b_id.'&building_name='.$building_name.'&wing='.$wing.'";
        </script>';
    } else {
        echo " NOT Updated<br />";
        echo mysqli_error ($conn);
    
   }
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
  <title>Rent</title>

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
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
	

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


          <!-- notification dropdown start-->
         	 <?php  include 'header-notify.php';?>
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
            <a href="home.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          
           <li class="sub-menu">
            <a  class="active"  href="javascript:;">
              <i class="fa fa-home"></i>
              <span>Manage Property</span><label class="label pull-right"><i class="fa fa-angle-down" style="color:#404E67;"></i></label>
              </a>
              <ul class="sub">
                 <li><a href="view-building.php">Add Building </a></li>
                 <li class="active" ><a href="view-flat-building.php">Add Flat  </a></li>
            </ul>
          </li>
  	  <li>
             <a  href="view-expenses.php">
             <i class="fa fa-money"></i>
              <span>Expense</span>
              <span class="label label-theme pull-right mail-info"></span>
              </a>
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
         <h3>Flat Details</h3>         
   
            
            <div class="row mt">
          		<div class="col-lg-12">
           			 <div class="content-panel">
            		 <div class="col-lg-12"><div class="col-lg-6"><h4>Flat Details</h4></div>
            		 <?php 
            		 $building_name=$_REQUEST['building_name'];
            		 $id=$_REQUEST['b_id'];
            		 $wing=$_REQUEST['wing'];
            		 ?>
            		        <div class="col-lg-6"><a href="view-flat-details.php?building_name=<?php echo $building_name;?>&wing=<?php echo $wing;?>&b_id=<?php echo $id;?>"><button type="button" class="float-r back-btn btn btn-secondary btn-sm"><i class="fa fa-mail-reply-all"></i> Back To <?php echo $wing;?> Wing flats</button></a>
            		 </div>
            		 </div>
  		<div class="adv-table" id="no-more-tables">
                <table id="hidden-table-info" class="table table-bordered table-striped">
			    <thead >
				<tr role="row">
					<th role="columnheader">Flat No</th>
					<th role="columnheader">Building Name</th>			
					<th role="columnheader">Wing</th>
					<th role="columnheader">room_type</th>				
					<th role="columnheader">property</th>	
					<th role="columnheader">Sqft</th>
					<th role="columnheader">Owner Name</th>
					<th role="columnheader">Phone</th>
					<th role="columnheader">Meter</th>					
					<th role="columnheader">Floor</th>		
					<th role="columnheader">Action</th>
				</tr>
			   </thead>
			               		 <?php
include 'dbConfig.php';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$building_name=$_REQUEST['building_name'];
$id=$_REQUEST['b_id'];
$wing=$_REQUEST['wing'];
$flat_no=$_REQUEST['flat_no'];
$sql = "select * from flat_details where flat_no='$flat_no' and building_name='$building_name' and b_id=$id and wing='$wing'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
?>
			      <tbody>
                         <?php 
                         $count = 1;
                         while($row = $result->fetch_assoc()) {
                             ?>
                        <tr>
       						   <td data-title="Flat No"><?php echo $row["flat_no"];?></td>   
                               <td data-title="Building "><?php echo $row["building_name"];?></td>   
                                <td data-title="Wing"><?php echo $row["wing"];?></td>   
                               <td data-title="Room Type"><?php echo $row["room_type"];?></td>   
                               <td data-title="Property"><?php echo $row["property"];?></td>   
                               <td data-title="Sq Ft"><?php echo $row["sq_ft"];?></td>   
                               <td data-title="Owner"><?php echo $row["owner_name"];?></td>    
                               <td data-title="Phone"><?php echo $row["phone"];?></td>    
                               <td data-title="Meter No"><?php echo $row["meter_no"];?></td>           
                               <td data-title="Floor"> <?php echo $row["floor"];?></td>     
                               <td data-title="Action">    
                              <a> <button type="button" onclick="document.getElementById('updateForm').style.display='block'" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></button></a>                         
                               </td>    
                        </tr>
              
                       	<?php 
                       	    $count=$count+1;}
                            } else {
                                echo "0 results";
                            }                          
                            mysqli_close($conn);
                            ?>
                      </tbody>
		</table>  
          

            <div class="x_content" id="updateForm" style="display:none">
									<br />
									<?php
include 'dbConfig.php';
$flat_no=$_REQUEST['flat_no'];
$id=$_REQUEST['b_id'];
$sql = "select * from flat_details where flat_no='$flat_no' and building_name='$building_name' and b_id=$id and wing='$wing'";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
?>
       				<?php 
                         while($row = $result->fetch_assoc()) {
                             ?>
              					    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post" style="padding: 10px;">


												<div class="item form-group">										
    											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Flat No <span class="required">*</span>
    											</label>
    											<div class="col-md-6 col-sm-6 ">
    												<input type="text" readonly id="first-name" name="flat_no" value="<?php echo $row["flat_no"];  ?>" required="required" class="form-control " Placeholder="Building Name">
    											</div>
											</div>
											<div class="item form-group">										
    											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Building Name <span class="required">*</span>
    											</label>
    											<div class="col-md-6 col-sm-6 ">
    												<input type="hidden" name="id" class="form-control" value="<?php echo $row["id"];  ?>" placeholder="name">								
    												<input type="text" readonly id="first-name" name="building_name" value="<?php echo $row["building_name"];  ?>" required="required" class="form-control " Placeholder="Building Name">
    											</div>
											</div>
													<div class="item form-group">										
    											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Wing <span class="required">*</span>
    											</label>
    											<div class="col-md-6 col-sm-6 ">
    												<input type="text" readonly id="first-name" name="wing" value="<?php echo $row["wing"];  ?>" required="required" class="form-control " Placeholder="Building Name">
    											</div>
											</div>
											<div class="item form-group">
    											<label class="col-form-label  col-md-3 col-sm-3  label-align" for="first-name">Room Type <span class="required">*</span>
    											</label>
    											<div class="col-md-6 col-sm-6 ">
        											 <select name="room_type" id="first-name" class="form-control" required="required">
                                                     	<option value="" disabled selected>Select From Here</option>
                                                        <option value="1BHK" <?php if ($row["room_type"] == "1BHK") { echo 'selected'; } ?>>1BHK</option>                                                              	                                    
                                    			        <option value="2BHK" <?php if ($row["room_type"] == "2BHK") { echo 'selected'; } ?>>2BHK</option>
                                         			    <option value="1RK" <?php if ($row["room_type"] == "1RK") { echo 'selected'; } ?>>1RK</option>
                									    <option value="Single Room" <?php if ($row["room_type"] == "Single Room") { echo 'selected'; } ?>>Single Room</option>  
                									    <option value="Office" <?php if ($row["room_type"] == "Office") { echo 'selected'; } ?>>Office</option>         
                									    <option value="Retail" <?php if ($row["room_type"] == "Retail") { echo 'selected'; } ?>>Retail</option>    
                									    <option value="Patra Shed" <?php if ($row["room_type"] == "Patra Shed") { echo 'selected'; } ?>>Patra Shed</option>  
                									    <option value="Godaun" <?php if ($row["room_type"] == "Godaun") { echo 'selected'; } ?>>Godaun</option> 
                                     		        </select>
                                                 </div>
									 		</div>
									    	<div class="item form-group">										
    											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Property  <span class="required">*</span>
    											</label>
    											<div class="col-md-6 col-sm-6 ">
													<select name="property" id="first-name" class="form-control" required="required">
                                                     	<option value="" disabled selected>Select Property From Here</option>
                                          			        	    	<option value="Residential" <?php if ($row["property"] == "Residential") { echo 'selected'; } ?>>Residential</option>                                                              	                                    
                                    			            	     	<option value="Industrial" <?php if ($row["property"] == "Industrial") { echo 'selected'; } ?>>Industrial</option>
                                         			        	    	<option value="Commercial" <?php if ($row["property"] == "Commercial") { echo 'selected'; } ?>>Commercial</option>
                									                    <option value="Semi-Commercial" <?php if ($row["property"] == "Semi-Commercial") { echo 'selected'; } ?>>Semi-Commercial</option>
                									
                                     		        </select>    											</div>
											</div>
											<div class="item form-group">										
    											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Area Sq.ft <span class="required">*</span>
    											</label>
    											<div class="col-md-6 col-sm-6 ">
    												<input type="text" id="first-name" name="sq_ft" value="<?php echo $row["sq_ft"];  ?>"  class="form-control " Placeholder="Area Sq.ft">
    											</div>
											</div>
											<div class="item form-group">										
    											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Floor Number <span class="required">*</span>
    											</label>
    											<div class="col-md-6 col-sm-6 ">
    												<input type="number" id="first-name" name="floor" value="<?php echo $row["floor"];  ?>"  class="form-control " Placeholder="Floor Number">
    											</div>
											</div>
											<div class="item form-group">										
    											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Meter Number <span class="required">*</span>
    											</label>
    											<div class="col-md-6 col-sm-6 ">
    												<input type="text" id="first-name" name="meter_no" value="<?php echo $row["meter_no"];  ?>"  class="form-control " Placeholder="Meter Number">
    											</div>
											</div>
											<div class="item form-group">										
    											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Owner Name <span class="required">*</span>
    											</label>
    											<div class="col-md-6 col-sm-6 ">
    												<input type="text" id="first-name" name="owner_name" value="<?php echo $row["owner_name"];  ?>"  class="form-control " Placeholder="Owner Name">
    											</div>
											</div>
												<script>
											function check()
                                            {
                                            
                                                var mobile = document.getElementById('mobile');
                                               
                                                
                                                var message = document.getElementById('message');
                                            
                                               var goodColor = "transparent";
                                                var badColor = "Red";
                                              
                                                if(mobile.value.length!=10){
                                                   
                                                    mobile.style.borderColor = badColor;
                                                    message.style.color = badColor;
                                                    message.innerHTML = "required 10 digits, match requested format!"
                                                }
                                                else{
                                                    mobile.style.borderColor = goodColor;
                                                    message.style.color = goodColor;
                                                    message.innerHTML = ""
                                                }}
											</script>
										    <div class="item form-group">										
    											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Owner Phone No: <span class="required">*</span>
    											</label>
    											<div class="col-md-6 col-sm-6 ">
    												<input type="text" id="mobile"  onkeyup="check(); return false;" name="phone" value="<?php echo $row["phone"];  ?>"  class="form-control " Placeholder="Owner Phone No"><span id="message"></span>
    											</div>
											 </div>
										
										<div class="ln_solid"></div>
										<div class="item form-group" style="text-align:center";>
											<div class="col-md-6 col-sm-6 offset-md-3">
										
												<button class="btn btn-primary" type="reset">Reset</button>
												<button type="submit" name="update" class="btn btn-success btn-shadow">Update</button>
											</div>
										</div>

									</form>
									
                       	<?php }
                            } else {
                                echo "0 results";
                            }
                            
                            mysqli_close($conn);
                            ?>    
									</div>  
         </div>
  </div></div></div>
      </section>
      
 
      <!-- /wrapper -->
    </section>
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

  <script type="text/javascript" src="lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  
    <script src="lib/jquery-ui-1.9.2.custom.min.js"></script>
  <!--custom switch-->
  <script src="lib/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
  <script src="lib/jquery.tagsinput.js"></script>
  <script type="text/javascript" src="lib/adv-export/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" src="lib/adv-export/buttons.html5.min.js"></script>
  <!--script for this page-->
  
   <script>
 
$(document).ready(function(){
	$(".addCF").click(function(){
	  var counter = $("#customFields tbody tr").length;
	  var newId = counter + 0;
		$("#customFields").append('<tbody><tr id="1" ><td class="append-table"> '+newId+ '<input type="hidden" value="'+newId+ '" id="1" name="sn[]" ></td><td class="text-center append-table"><input required  class="form-control" name="total_flat[]" onblur="findTotal()"  type="text" placeholder="total Flat"></td><td class="text-center append-table"><input required name="wing[]" class="form-control" type="text" placeholder="Wing Name"> </td><td class="append-table"> <a href="javascript:void(0);" class="remCF"> <span class="fa fa-2x fa-minus-square removeItem"></span></a></td></tr></tbody>');
	});
    $("#customFields").on('click','.remCF',function(){
        $(this).parent().parent().remove();
    });
});
  </script>
  <script>

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
          "aTargets": [1]
        }],
        "aaSorting": [
          [1, 'asc']
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