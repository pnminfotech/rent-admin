<?php
include('session.php');
?>
<?php
//index.php

include('database_connection.php');

?>

<?php 
if(isset($_POST["id"]))
{
    include 'dbConfig.php';
$id=$_POST["id"];

$query="select * from client where id='".$id."'";
$result = mysqli_query($conn,$query);
while($row= mysqli_fetch_array($result))
{
    $name = $row['name'];
    $client_type=$row['client_type'];
    $email = $row['email'];
    $phone=$row['mobile'];
    $addr=$row['addr1'];
    $adhar_card=$row['adhar_card'];
    $gst=$row['gst'];
    $tal=$row['tal'];
    $dist=$row['dist'];
    $pincode=$row['pincode'];
    $fms_no=$row['fms_no'];
    
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

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-daterangepicker/daterangepicker.css" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <link href="css/table-responsive.css" rel="stylesheet">
  

    <link rel="stylesheet" href="lib/select2/select.css"/>
    <script src="lib/select2/jquery.min.js"></script>
	 <script src="lib/select2/jquery-3.2.1.min.js"></script>
	 
	 <link rel="stylesheet" href="lib/select2/style.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<script src="lib/select2/choosen.js"></script>
    
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<style type="text/css">

.select-checkbox option::before {
  content: "\2610";
  width: 1.3em;
  text-align: center;
  display: inline-block;
}
.select-checkbox option:checked::before {
  content: "\2611";
}

.select-checkbox-fa option::before {
  font-family: FontAwesome;
  content: "\f096";
  width: 1.3em;
  display: inline-block;
  margin-left: 2px;
}
.select-checkbox-fa option:checked::before {
  content: "\f046";
}

.table-resizable12 {

		cursor: col-resize;
		user-select: none;
	}

.table-resizable {
	&.resizing {
		cursor: col-resize;
		user-select: none;
	}
	
	th {
		position: relative;

		// Show resize curson when hovering over column borders
		&::before {
			@extend .table-resizable.resizing;
			content: '';
			display: block;
			height: 100%;
			position: absolute;
			right: 0;
			top: 0;
			width: 1em;
		}

		&:last-of-type::before {
			display: none;
		}
	}

	// Add `th` to the selector below to allow shrinking a column all the way
	td {
		max-width: 0;
		overflow: hidden;
		text-overflow: ellipsis;
		white-space: nowrap;
	}
}
</style>
<style>
.highlight-error {
  border-color: red;
}
</style>
	<script>
	$(function() {
		var startX,
			 startWidth,
			 $handle,
			 $table,
			 pressed = false;
		
		$(document).on({
			mousemove: function(event) {
				if (pressed) {
					$handle.width(startWidth + (event.pageX - startX));
				}
			},
			mouseup: function() {
				if (pressed) {
					$table.removeClass('resizing');
					pressed = false;
				}
			}
		}).on('mousedown', '.table-resizable th', function(event) {
			$handle = $(this);
			pressed = true;
			startX = event.pageX;
			startWidth = $handle.width();
			
			$table = $handle.closest('.table-resizable').addClass('resizing');
		}).on('dblclick', '.table-resizable thead', function() {
			// Reset column sizes on double click
			$(this).find('th[style]').css('width', '');
		});
	});


	</script>
<script type="text/javascript">
$(document).ready(function(){
$('#product').change(function(){
    $.get('getProduct.php',{product:$(this).val()},function(data){
        $('#hsn').val(data);
        
     });

     });
});

</script>
<script type="text/javascript">
$(document).ready(function(){
$('#product').change(function(){
    $.get('getLotno.php',{product:$(this).val()},function(data){
        $('#lotno').val(data);
        
     });

     });
});

</script>
<script type="text/javascript">
function CheckColors(val){
 var element=document.getElementById('client_type');
 if(val=='Select Category'||val=='wholesaler')
   $("#client_type").attr("readonly", false); 
 else  
   $("#client_type").attr("readonly", true); 
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
            <a  href="home.php">
              <i class="fa fa-dashboard"></i>
              <span>Home</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-houzz"></i>
              <span>Company / Stock</span><label class="label pull-right"><i class="fa fa-angle-down" style="color:#404E67;"></i></label>
              </a>
            <ul class="sub">
            <li><a href="view_category.php">Category</a></li>
              <li><a href="view_product_company.php">Company</a></li>
              <li><a href="view_product.php">Product</a></li>
              <li><a href="view_available_stock.php">Stock</a></li>
   
            </ul>
          </li>
            <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-inr"></i>
              <span>Purchase</span><label class="label pull-right"><i class="fa fa-angle-down" style="color:#404E67;"></i></label>
              </a>
            <ul class="sub">
               <li><a href="home.php">Bill</a></li>
              <li><a href="home.php">Payment</a></li>
             
              
             
            </ul>
          </li>
          <li class="sub-menu">
            <a  class="active"  href="javascript:;">
              <i class="fa fa-inr"></i>
              <span>Sales</span><label class="label pull-right"><i class="fa fa-angle-down" style="color:#404E67;"></i></label>
              </a>
            <ul class="sub">
              <li><a href="view_client.php">Client</a></li>
              <li><a href="view_invoice.php">Sales Invoice</a></li>
              <li><a href="view_quotation.php">Quotation</a></li>
              <li><a href="view_outstanding.php">Outstanding</a></li>
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
<script>
function extract(){
var ide=document.getElementById("info").selectedIndex;
var id = document.getElementById("info").options[ide].text;
window.location.replace("add_invoice.php?id="+id);
}
</script> 
     <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3>New Invoice</h3>
        <!-- BASIC FORM ELELEMNTS -->
       
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb">Invoice Details</h4>
                
 			<div class="form-group">
					 <?php
                    include 'dbConfig.php';
                    
           
                    
                    $id=$_REQUEST['id'];
                    $query = "SELECT * from invoice where id='".$id."'";
                    $result = mysqli_query($conn, $query) or die ( mysqli_error());
                    $row = mysqli_fetch_assoc($result);
      
                    ?>
				
                  <div class="col-sm-12">
                  <label class=" control-label lab_name">Date:</label>
                    
                 
                   <h4 id="datetime" style="color:black;" name="date"></h4><br>
                   <script>
					var dt = new Date();
					document.getElementById("datetime").innerHTML = (("0"+dt.getDate()).slice(-2)) +"."+ (("0"+(dt.getMonth()+1)).slice(-2)) +"."+ (dt.getFullYear());
					</script>
                  
                  </div>
           
              
			</div>
		
		   <form class="form-horizontal style-form" target="_blank"  action="add_invoice1.php" method="post" id="addOrder" name="autoSumForm">
 			<div class="form-group">
        	   <div class="col-sm-6">
                  <label class="col-sm-2 control-label lab_name">Client Name:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="name" class="form-control" value="<?php echo $row["name"];  ?>" Placeholder="Client Name">
                  </div>
           	   </div>
           
                <div class="col-sm-6">
                  <label class="col-sm-2 control-label lab_name">Client Type</label>
                  <div class="col-sm-8">
                   <!--   <input class="form-control" name="client_type" type="text" value="<?php if(isset($_POST["id"])) echo $client_type; ?>" Placeholder="wholesaler / Customer"> -->
                    <div class="col-sm-6" style="padding:0px"> 
                    <select class="form-control" name="client_type" onchange='CheckColors(this.value);' required> 
                    <option value="">Select From Here</option>
                    <option value="wholesaler" <?php if ($row["client_type"] == "wholesaler") { echo 'selected'; } ?>>wholesaler</option>
                    <option value="Customer" <?php if ($row["client_type"] == "wholesaler") { echo 'Customer'; } ?>>Customer</option>
                    </select>
                    </div> 
             	 	  <div class="col-sm-6"  >
                   <input type="text" name="fms_no"  id="client_type" readonly class="form-control" value="<?php echo $row["fms_no"];  ?>" placeholder="FMS Number" />
                    </div>
                  </div>
                </div>       
              </div>
              
               <div class="form-group">
            
                 <div class="col-sm-6">
                  <label class="col-sm-2 control-label lab_name">Mobile No:</label>
                  <div class="col-sm-8">
                    <input type="text" name="mobile" class="form-control"  id="mobileno" data-minlength="13" maxlength="13" value="<?php echo $row["mobile"];  ?>" required placeholder="mobile no">
                  
                    
                  </div>
                </div>
                 
                  <div class="col-sm-6">
                  <label class="col-sm-2 control-label lab_name">Client Email</label>
                  <div class="col-sm-8">
                    <input class="form-control" name="email" type="email"  value="<?php echo $row["email"];  ?>" Placeholder="email">
                  </div>
                </div>   
               
             </div>
               
               <div class="form-group">
        	   <div class="col-sm-6">
                  <label class="col-sm-2 control-label lab_name">Adhar Card:</label>
                  <div class="col-sm-8">
                     <input type="text" name="adhar_card" data-type="adhaar-number" maxLength="14" class="form-control"  value="<?php echo $row["adhar_card"];  ?>" placeholder="Aadhar Card">
                  </div>
           	   </div>
           
                <div class="col-sm-6">
                  <label class="col-sm-2 control-label lab_name">Gst No:</label>
                  <div class="col-sm-8">
                    <input class="form-control" name="gst" type="text"  value="<?php echo $row["gst"];  ?>" Placeholder="GST Number">
                  </div>
                </div>       
              </div>
              
			

            <div class="form-group">  
                <div class="col-sm-6">
                 <label class="col-sm-2 control-label lab_name">Billing Address:</label>
				  <label class="col-sm-8  lab_name"><input name="addr" type="text" class="form-control" value="<?php echo $row["addr"];  ?>" placeholder="Address"> </label>  
                      
               </div> 
                  <div class="col-sm-6">
                 <label class="col-sm-2 control-label lab_name">Tal:</label>
				  <label class="col-sm-8  lab_name"><input name="tal" type="text" class="form-control" value="<?php echo $row["tal"];  ?>" Placeholder="Tal"> </label>  
                      
               </div> 
             </div>   
               <div class="form-group">  
            <div class="col-sm-12">
 
    		 </div> 
                <div class="col-sm-6">
                 <label class="col-sm-2 control-label lab_name">Dist:</label>
				  <label class="col-sm-8  lab_name"><input name="dist" type="text" class="form-control" value="<?php echo $row["dist"];  ?>" Placeholder="Dist"> </label>  
                      
               </div> 
                  <div class="col-sm-6">
                 <label class="col-sm-2 control-label lab_name">Pin Code:</label>
				  <label class="col-sm-8  lab_name"><input name="pincode" type="text" class="form-control" value="<?php echo $row["pincode"];  ?>" Placeholder="Pincode"> </label>  
                      
               </div> 
             </div> 
              <div class="form-group">  
            <div class="col-sm-12">
 
    		 </div> 
                <div class="col-sm-6">
                 <label class="col-sm-2 control-label lab_name">Sales Person:</label>
				  <label class="col-sm-8  lab_name"><input readonly name="sales_person" type="text" value="<?php echo $row["sales_person"];  ?>" class="form-control" Placeholder="Sales Person"> </label>  
                      
               </div> 
             
             </div> 
              <section id="no-more-tables">
              <table id="dataTable" class="table-resizable table table-bordered table-striped table-condensed cf">
                    <thead style="background: #f9f9f9;" class="table-resizable12 cf">
                                        <tr>
                                            <th width="20" class="text-center">S.N.</th>
                                            <th width="120" class="text-center">Product</th>
                                            <th width="120" class="text-center">Display Name</th>
                                            <th width="80" class="text-center">HSN No</th>
                                            <th width="80" class="text-center">Lot No / Batch NO</th>
                                            <th width="80" class="text-center">Weight</th>                                  
                                            <th width="30" class="text-center">GST %</th>
                                            <th width="30" class="text-center">Qty </th>
                                            <th width="30" class="text-center">Single unit Price</th>
                                            <th width="30" class="text-center">CGST</th>
                                            <th width="30" class="text-center">CGST Amt</th>
                                            <th width="30" class="text-center" >SGST</th>
                                            <th width="30" class="text-center">SGST Amt</th>
                                            <th width="30" class="text-center">Rate(unit Price)</th>
                                            <th width="30" class="text-center" style="display:none"> Dis %  </th> 
                                            <th width="30" class="text-center">Sub Total</th>
                                            <th width="20" class="text-center"   >Tax Rate</th>                      
                                            <th width="150" class="text-center">Total </th>
                                            <th width="10" class="text-center"> </th>
                                        </tr>
                                    </thead>
                                                          <tbody id="itemItreate"> 
                                                             <?php
                    include 'dbConfig.php';
                    $id=$_REQUEST['id'];
                   // $sql = "SELECT * from product_invoice where q_id='".$id."'";
                    $sql = "SELECT a.*,b.product_name,b.display_name,c.company_name as c_name FROM product_invoice a,product_details b,product_company c where b.company_name=c.id and b.id=a.display_name and a.product=b.id and a.q_id =$id";
                    $result=mysqli_query($conn,$sql);
                    while($rows=mysqli_fetch_array($result))
                    {
                    ?>
                                 
                                                  <tr id="1" >
                                            <td>
                                               <?php echo $rows["sn"];  ?><input type="hidden" id="1" name="sn[]" value=" <?php echo $rows["sn"];  ?>" ></td>
                                          
                                            <td class="text-center">
                                          <!--     <select name="product[]"  id="product" class="form-control"> <option value="">Select Category</option><?php echo fill_select_box($connect, "0"); ?></select>
                                               -->   <select name="product[]" class="form-control" required>
                                     	<option value="" disabled selected>Select From Here</option>
                                           <?php  
                                            $query7 = "  SELECT a.* FROM product_details a;";  
                                            $result7 = mysqli_query($conn, $query7);  
                                            while($row7 = mysqli_fetch_array($result7))  
                                            {  
                                             ?>
                                     	<option value="<?php echo $row7["id"];?>" <?php if ($row7["id"] == $rows["product"]) { echo 'selected'; } ?>><?php echo $row7["product_name"];  ?></option>
                                     		<?php 
                                            }
                                            ?>
                                     </select>
                                            </td>
                                             
                                             <td class="text-center">                                              
                                                <input name="display_name[]" type="text" class="form-control" id="" value="<?php echo $rows["display_name"];  ?>"  placeholder="">
                                                
                                            </td>
                                            <td class="text-center">                                              
                                                <input name="hsn[]" type="text" class="form-control"  value="<?php echo $rows["hsn"];  ?>"  placeholder="">
                                                
                                            </td>
                                             <td class="text-center">                                              
                                                <input name="lot_no[]" type="text" class="form-control" value="<?php echo $rows["lot_no"];  ?>"  placeholder="">
                                                
                                            </td>
                                             <td class="text-center">                                              
                                                <input name="packing[]" type="text" class="form-control"  value="<?php echo $rows["product_weight"];  ?>"  placeholder="">
                                                
                                            </td>
                                            <td class="text-center">                                              
                                               <input name="vatinput[]" type="text" class="vatinput form-control" value="<?php echo $rows["vatinput"];  ?>" placeholder="0">
                                                <input name="vatAmountinput[]" type="hidden" class="vatAmountinput" value="">
                                            <td class="text-center">                                              
                                                <input name="qty[]" type="text" class="qty form-control numberinput" value="<?php echo $rows["qty"];  ?>"  placeholder="">
                                            </td>
                                            
                                       				<td class='text-center' data-title='total' ><input  name='single_price[]' type='text' class='form-control singlerowtotal' value=''  readonly placeholder='0.00'> </td>  
  							 
  					
  							<td class='text-center' data-title='total' ><input  name='cgst[]' type='text' class='form-control c_gst' value=''  readonly placeholder='0.00'> </td>               
  							 
<td class='text-center'  data-title='total' ><input  name='c_amt[]' type='text' class='form-control c_amt' value=''  readonly placeholder='0.00'> </td>                
  							 
  						    <td class='text-center'  data-title='total' ><input  name='sgst[]' type='text' class='form-control c_gst' value=''  readonly placeholder='0.00'> </td>                   
  							 
  						<td class='text-center'  data-title='total' ><input  name='s_amt[]' type='text' class='form-control c_amt' value=''  readonly placeholder='0.00'> </td>
                                            
                                            <td style="display:none" class="text-center" width="70">
                                                <input name="lessdiscount[]" type="text" class="numberinput form-control lessdiscount" value="<?php echo $rows["lessdiscount"];  ?>" >
                                            </td>
                                            <td class="text-center">                                              
                                                <input name="unitprice[]" type="text" class="numberinput unitprice form-control"  value="<?php echo $rows["unitprice"];  ?>"  placeholder="">
                                                
                                            </td>
                                            <td class="text-center">                                              
                                                <input name="rowtotal[]" type="text" class="form-control rowtotal" id="" value="<?php echo $rows["rowtotal"];  ?>"  placeholder="">
                                                
                                            </td>
                                            <td class="text-center">
                                                <strong class="gst"><input name="rowtotalx[]" type="hidden" readonly="" class="form-control rowtotalx" value="<?php echo $rows["rowtotalx"];  ?>" placeholder="0.00"></strong>
                                           
                                            </td>
                                           
                                            <td width="100">
                                                <input name="rowtotalx[]" type="text" readonly="" class="form-control rowtotalx" value="<?php echo $rows["rowtotalx"];  ?>" placeholder="0.00">
                                            </td>
                        
                                            <td><span id="1" class="fa fa-2x fa-minus-square removeItem"></span></td>
                                        </tr>

                                        
                               
                                            <?php }?>    </tbody>
                </table>
                </section>
                <div>
                <button type="button" class="btn btn-primary addMoreRow"  > Add New Product <i class="fa fa-edit"></i></button>  
             
                </div>
                <hr>
             
        <div class="row mt">
          <div class="col-lg-6 col-md-6 col-sm-12">
         
             
               <div class="col-sm-12">
                  <h4 class="col-sm-2 control-label lab_name">Note :-</h4>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="note"></textarea>
                  </div>
                </div> 
                <br>
	             <div class="col-sm-12" style="margin-top:10px">
	                    <div class="panel ">
								<table class="taxSummary table table-bordered table-striped  table-actions">
	                         </table>
						 </div>
	                </div>
	                <br>
	              <div class="form-group">
        	   <div class="col-sm-12">
                  <label class="col-sm-2 control-label lab_name">Total CGST:</label>
                  <div class="col-sm-4">
                    <input name="totalcgst" type="text" class="form-control totalcgst" value="0" placeholder="Total Gst" readonly="">
                  </div>
                  <label class="col-sm-2 control-label lab_name">Total SGST:</label>
                  <div class="col-sm-4">
                    <input name="totalsgst" type="text" class="form-control totalcgst" value="0" placeholder="Total Gst" readonly="">
                  </div>
                </div>
            </div>
		</div>
          <!-- /col-lg-6 -->
          
         <div class="col-lg-6 col-md-6 col-sm-12">         
           

           <div class="form-group">
        	   <div class="col-sm-12">
                  <label class="col-sm-3 control-label lab_name">Total GST:</label>
                  <div class="col-sm-8">
                    <input name="totalgst" type="text" class="form-control totalgst" value="0" placeholder="Total Gst" readonly="">
                  </div>
                </div>
            </div>
          	 <div class="form-group">
                <div class="col-sm-12">
                  <label class="col-sm-3 control-label lab_name">Total:</label>
                  <div class="col-sm-8">
                      <input name="totalwithgst" type="text" class="form-control finalTotal" readonly="">
                  </div>
                </div>       
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                  <label class="col-sm-3 control-label lab_name">Total Taxable Amount:</label>
                  <div class="col-sm-8">
                    <input name="grosstotal" type="text" class="form-control withouttax" readonly="">
                  </div>
                </div>
           </div>
             <div class="form-group">
                <div class="col-sm-12">
                  <label class="col-sm-3 control-label lab_name">Round (+ / -):</label>
                  <div class="col-sm-3">
		              <select id="signRound" name="sign" class="form-control sign">
		                     <option value="1" selected=""> +</option>
		                      <option value="0"> - </option>
		               </select>
                  </div>
                   <div class="col-sm-5">
                    <input name="roundfinalTotal" type="text" class="numberinput form-control roundfinalTotal" value="0.00">
                  </div>
                </div>       
            </div>
             <div class="form-group">
                <div class="col-sm-12">
                  <label class="col-sm-3 control-label lab_name">Amount In Word:</label>
                  <div class="col-sm-8">
                        <strong class="word"> </strong>
                        <input name="inword" type="hidden" class="word  form-control ">
                  </div>
                </div>       
            </div>
             <div class="form-group">
                <div class="col-sm-12">
                  <label class="col-sm-3 control-label lab_name">Final:</label>
                  <div class="col-sm-8">
                      <input readonly="" name="finalOrderPrice" id="weight1" type="text" class="finalOrderPrice  form-control ">
                  </div>
                </div>       
            </div>
               <div class="form-group">
                <div class="col-sm-12">
                  <label class="col-sm-3 control-label lab_name">Paid Amount:</label>
                  <div class="col-sm-8">
                      <input  name="paid_amount" type="text" id="weight2" oninput="weightConverter()" onchange="weightConverter()" class="form-control" required>
                  </div>
                </div>       
            </div>
               <div class="form-group">
                <div class="col-sm-12">
                  <label class="col-sm-3 control-label lab_name">Remaining Amount:</label>
                  <div class="col-sm-8">
                      <input  name="unpaid_amount" type="text" id="outputTon" value="" readonly class="form-control ">
                  </div>
                </div>       
            </div>
             <script>
                        function weightConverter() {
                          var first_number = document.getElementById("weight1").value;
                          var second_number =document.getElementById("weight2").value;
                           var result = (first_number - second_number);
                          document.getElementById("outputTon").value=result;
                            
                        }           
                   </script>  
             <div class="col-sm-6" style="float:right;">
                 <button type="submit" value="submit" name="add" class="btn btn-large  btn-theme btn-primary">Create Invoice</button>
                   <button type="Reset" class="btn btn-large btn-primary">Reset</button>
              </div> 
              
          </div>
          <!-- /col-lg-6 -->
         
        </div>

</form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
        <!-- /row -->
        <!-- INLINE FORM ELELEMNTS -->
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
         All Rights Reserved
        </p>
        <div class="credits">
       
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
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script src="lib/jquery-ui-1.9.2.custom.min.js"></script>
  <!--custom switch-->
  <script src="lib/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
  <script src="lib/jquery.tagsinput.js"></script>
  <!--custom checkbox & radio-->
  <script type="text/javascript" src="lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
  <script src="lib/form-component.js"></script>
    <script>
$("#account").keydown(function(e) {
    var oldvalue=$(this).val();
    var field=this;
    setTimeout(function () {
        if(field.value.indexOf('+91') !== 0) {
            $(field).val(oldvalue);
        } 
    }, 1);
});

</script>	
   <script>
$('[data-type="adhaar-number"]').keyup(function() {
  var value = $(this).val();
  value = value.replace(/\D/g, "").split(/(?:([\d]{4}))/g).filter(s => s.length > 0).join("-");
  $(this).val(value);
});

$('[data-type="adhaar-number"]').on("change, blur", function() {
  var value = $(this).val();
  var maxLength = $(this).attr("maxLength");
  if (value.length != maxLength) {
    $(this).addClass("highlight-error");
  } else {
    $(this).removeClass("highlight-error");
  }
});
</script>
  <script>
  $(document).ready(function(){
	   $('.item_sub_lot_no').multiselect({
	    nonSelectedText: 'Select Framework',
	    enableFiltering: true,
	    enableCaseInsensitiveFiltering: true,
	    buttonWidth:'400px'
	   });
  </script>
  <script type="text/javascript">
$(".chosen").chosen();
</script>
 <script>
 
 $(document).ready(function() {

	
 $('.addMoreRow').click(function() {

                           var _thisId = "";
                     
                           var counter = $("#addOrder tbody#itemItreate tr").length;
						
                           var newId = counter + 1;

                           var addRowHtml = "<tr  id='" + newId + "'>";
                           addRowHtml += "<td>" + newId +" <input type='hidden' value='" + newId +"' id='0' name='sn[]' id='sn'  ></td>";

                           //ProductS

                           addRowHtml += '<td data-title="Product" class="text-center"> <select name="product[]" class="form-control item_category" data-live-search="true" data-sub_category_id="' + newId +'"> <option value="">Select Category</option><?php echo fill_select_box($connect); ?> </select></td>';

                           addRowHtml += '<td data-title="Display Name" style="display:none;" class="text-center"><select name="display_name[]" class="form-control item_sub_display_name" style="" id="item_sub_display_name' + newId +'"></select></td>';
							
                           addRowHtml += '<td data-title="HSN" class="text-center" style="display:none;"><select name="hsn[]" class="form-control item_sub_category" style="" id="item_sub_category' + newId +'"><option value="">Hsn Code</option></select></td>';
                                                                     
                           addRowHtml += '<td data-title="Lot" class="text-center"><select name="lot_no[]"  class="form-control select-checkbox-fa  item_sub_lot_no" id="item_sub_lot_no' + newId +'"><option value="">Lot/Batch Code</option></select></td>';

                           addRowHtml += '<td data-title="Weight" class="text-center"><select name="packing[]"  class="form-control select-checkbox-fa  item_sub_weight" id="item_sub_weight' + newId +'"><option value="">Select Weight</option></select></td>';
                           
                           addRowHtml += "<td  class='text-center hide'><textarea name='itemdesc[]' row='3' class='form-control prddesc'>  </textarea></td>";
                          // addRowHtml += "<td data-title='packing' class='text-center'><input type='text' name='packing[]' class='form-control' value='' placeholder=''></td>";
                    
                          addRowHtml += '<td data-title="gst" class="text-center"><select name="vatinput[]" class="form-control item_sub_category vatinput"style="padding: 5px;-webkit-appearance: none;" id="item_sub_gst' + newId +'"><option value="">Gst</option></select><input name="vatAmountinput[]" type="hidden" class="vatAmountinput"></td>';
                    //        addRowHtml += '<td data-title="gst" class="text-center"><input type="text" name="vatinput2[]" class="vatinput form-control " value="" placeholder="0"><input name="vatAmountinput[]" type="hidden" class="vatAmountinput"></td>';
                           //Qty 
                           addRowHtml += '<td class="text-center" data-title="Qty"><input name="qty[]" class="qty form-control numberinput" type="text"   placeholder="0" /></td>';

                           //Single Unit Price
  							 addRowHtml += "<td class='text-center' data-title='total' ><input  name='single_price[]' type='text' class='form-control singlerowtotal' value=''  readonly placeholder='0.00'> </td>";     
  							 
  							//CGST & SGST 
  							addRowHtml += "<td class='text-center' style='display:none;' data-title='total' ><input  name='cgst[]' type='text' class='form-control c_gst' value=''  readonly placeholder='0.00'> </td>";                      
  							 
  						     addRowHtml += "<td class='text-center' style='display:none;' data-title='total' ><input  name='c_amt[]' type='text' class='form-control c_amt' value=''  readonly placeholder='0.00'> </td>";                      
  							 
  						     addRowHtml += "<td class='text-center' style='display:none;' data-title='total' ><input  name='sgst[]' type='text' class='form-control c_gst' value=''  readonly placeholder='0.00'> </td>";                      
  							 
  							addRowHtml += "<td class='text-center' style='display:none;' data-title='total' ><input  name='s_amt[]' type='text' class='form-control c_amt' value=''  readonly placeholder='0.00'> </td>";                      
  							                  
  							 
  						  //Unit Price
                           addRowHtml += '<td class="text-center" data-title="price"><input name="unitprice[]"  type="text"  class="unitprice form-control numberinput" value="" placeholder="0.00"></td>';

                           //Less Discount
                           addRowHtml += "<td class='text-center' data-title='disc' style='display:none;'><input name='lessdiscount[]' class='lessdiscount form-control numberinput' type='text'  value='0'></td>";

							//Total
                            addRowHtml += "<td class='text-center' data-title='total'><input  name='rowtotal[]' type='text' class='form-control rowtotal' value='' placeholder='0.00'> </td>";

                           //Vat
                           addRowHtml += "<td class='text-center' style='display:none;' data-title='total' width='10'><strong class='gst'></strong><input name='gst_amt[]' type='text' readonly style='border: 0; background-color:transparent;text-align:center' class='gst'> <input  readonly name='rowtotalxx[]' type='hidden' class=' form-control rowtotalxx' value=''   placeholder='0.00'></td>";
             
                           //Taxable Amount
                           addRowHtml += "<td class='text-center' data-title='sub total'> <input  readonly name='rowtotalx[]' type='text' class=' form-control rowtotalx' value=''   placeholder='0.00'></td>";
                           
                          


                           addRowHtml += "<td><span id='" + newId + "' class='fa fa-2x fa-minus-square removeItem'></span></td>";


                           addRowHtml += "</tr>";

                           $("#addOrder tbody#itemItreate").append(addRowHtml);

                           performaActions();
                           var _thisTr = $("#addOrder tbody#itemItreate tr#" + newId);

                           autoProductSelectizAjax(_thisTr);

                           removeItem();
                        
                      
                  

               });

               function removeItem() {

                   $(".removeItem").click(function() {
                       var deleterowid = $(this).attr('id');
                       $("#addOrder tbody#itemItreate tr#" + deleterowid).remove();
                       summaryVatBlock();
                       totalBlock();
                   });
               }
               removeItem();

            		 $(document).on('change', '.item_category', function(){
                       var category_id = $(this).val();
                       var sub_category_id = $(this).data('sub_category_id');
    
                        $.ajax({
                         url:"fill_gst.php",
                         method:"POST",
                         data:{category_id:category_id},
                         success:function(data)
                         {
                           var html = '<input type="text"/>';
                           html += data;
                           $('#item_sub_gst'+sub_category_id).html(html);
                         }
                       })
                     });

               $(document).on('change', '.item_category', function(){
                   var category_id = $(this).val();
                   var sub_category_id = $(this).data('sub_category_id');
                   $.ajax({
                     url:"fill_sub_category.php",
                     method:"POST",
                     data:{category_id:category_id},
                     success:function(data)
                     {
                       var html = '<input type="text"/>';
                       html += data;
                       $('#item_sub_category'+sub_category_id).html(html);
                     }
                   })
                 });


               $(document).on('change', '.item_category', function(){
                   var category_id = $(this).val();
                   var sub_category_id = $(this).data('sub_category_id');

                    $.ajax({
                     url:"fill_lot.php",
                     method:"POST",
                     data:{category_id:category_id},
                     success:function(data)
                     {
                       var html = '<input type="text"/>';
                       html += data;
                       $('#item_sub_lot_no'+sub_category_id).html(html);
                     }
                   })
                 });


     
                 
                 
				  $(document).on('change', '.item_category', function(){
                   var category_id = $(this).val();
                   var sub_category_id = $(this).data('sub_category_id');

                    $.ajax({
                     url:"fill_display_name.php",
                     method:"POST",
                     data:{category_id:category_id},
                     success:function(data)
                     {
                       var html = '<input type="text"/>';
                       html += data;
                       $('#item_sub_display_name'+sub_category_id).html(html);
                     }
                   })
                 });
                 
                 
               $(document).on('change', '.item_category', function(){
                   var category_id = $(this).val();
                   var sub_category_id = $(this).data('sub_category_id');

                    $.ajax({
                     url:"fill_weight.php",
                     method:"POST",
                     data:{category_id:category_id},
                     success:function(data)
                     {
                       var html = '<input type="text"/>';
                       html += data;
                       $('#item_sub_weight'+sub_category_id).html(html);
                     }
                   })
                 });
               
               $(document).on('change', '.item_category', function(){
                   var category_id = $(this).val();
                   var sub_category_id = $(this).data('sub_category_id');

                    $.ajax({
                     url:"fill_qty.php",
                     method:"POST",
                     data:{category_id:category_id},
                     success:function(data)
                     {
                       var html = '<input type="text"/>';
                       html += data;
                       $('#item_sub_qty'+sub_category_id).html(html);
                     }
                   })
                 });
               
               $('.autoProduct').change(function(e) {
                   var prdId = $(this).val();
                   var _thisTr = $(this).closest('tr');
                   productChange(prdId, _thisTr);
               });

               function autoProductSelectizAjax(_thisTr) {

                   _thisTr.find('.autoProduct').change(function(e) {
                       var prdId = $(this).val();
                       var _thisTr = $(this).closest('tr');
                       productChange(prdId, _thisTr);

                   });

               }


              



               //Tax Summary Block 
               function summaryVatBlock() {
               
                   $(".taxSummary").empty(); 
                   var TotlataxAmoutn = 0;
                    var stateId = $("input.stateid").val();
                   if ( typeof stateId == 'undefined'  ) {
                         var vatListHtml = `<thead><tr><th>CGST % </th><th>CGST Amount </th><th>SGST % </th><th>SGST Amount </th></tr></thead><tbody>`;
                   }else{
                       if(  stateId == 22 ){
                             var vatListHtml = `<thead><tr><th>CGST % </th><th>CGST Amount </th><th>SGST % </th><th>SGST Amount </th></tr></thead><tbody>`;
                       }else{
                            var vatListHtml = `<thead><tr><th>IGST % </th><th>IGST Amount </th></tr></thead><tbody>`;
                       }

                   }
                   $(".taxSummary").append(vatListHtml);
                   $( "#itemItreate tr" ).each(function( index ) {
                       
                       var _thisTr =  $(this);
                       
                       var prdHSN = _thisTr.find(".prdHSN").text();
                       var taxPercent = _thisTr.find("select.vatinput").val();
                       var taxAmoutn  = _thisTr.find("input.vatAmountinput").val();
                       //alert( taxPercent );
                       if( taxAmoutn > 0 ) {
                           TotlataxAmoutn = parseFloat( TotlataxAmoutn ) + parseFloat(taxAmoutn );
                           updateCombineTax( taxPercent , taxAmoutn ,prdHSN);
                       }
                       
                   });
                    $(".taxSummary").append('</tbody>'); 
               }
               
               
               function updateCombineTax( taxPercent, taxAmoutn , prdHSN ) {
               
                   var gstintpercent    = Math.floor(taxPercent) ;
                   var stateId = $("input.stateid").val();

				var cgst = taxPercent/2;
				var cAmount = taxAmoutn/2;
				
                   if ( typeof stateId == 'undefined'  ) {
                        var vatListHtml = `<tr><td>`+  cgst +`</td><td>`+  cAmount +`</td><td>`+  cgst +`</td><td>`+  cAmount +`</td></tr>`;
                   }else{
                       if(  stateId == 22 ){
                            var vatListHtml =  `<tr><td>`+  cgst +`</td><td>`+  cAmount +`</td><td>`+  cgst +`</td><td>`+  cAmount +`</td></tr>`;
                       }else{
                            var vatListHtml = `<tr><td>`+  taxPercent +`</td><td>`+  taxAmoutn +`</td></tr>`;
                       }

                   }
                    

                   $(".taxSummary").append(vatListHtml);    
           
               }

 	                   






                          //Total Balance Update 
                          function totalBlock() {

                              var totalBalance = 0;
                              var vatBal = 0;
                              var discountAmt = 0;
                              var transportAmt = 0;
                              var octria = 0;
                              var totoalwithoutVat = 0;
                              var grossTotal = 0;
                              var totalgst = 0;
                              var totalcgst=0;

                              var totalPrdamount = 0;

                              $("#itemItreate tr").each(function(index) {

                                  var _thisTr = $(this);

                                  var rowTotal = _thisTr.find("input.rowtotal").val();
                                  var singlerowTotal = _thisTr.find("input.singlerowtotal").val();
                                  var singelUnitPrice = _thisTr.find("input.unitprice").val();
                                  var rowTotalx = _thisTr.find("input.rowtotalx").val();
                                  var qty = _thisTr.find("input.qty").val();
                                  var gstAmount = _thisTr.find("input.vatAmountinput").val();
                                  var cgstAmount = _thisTr.find("input.c_amt").val();
                                  

                                  if (rowTotal > 0) {
                                      totoalwithoutVat = totoalwithoutVat + parseFloat(rowTotalx);
                                      totalPrdamount = parseFloat(totalPrdamount) + parseFloat(rowTotal);
                                      grossTotal = parseFloat(grossTotal) + parseFloat(rowTotalx);
                                      totalgst = parseFloat(totalgst) + parseFloat(gstAmount);
                                      totalcgst = parseFloat(totalcgst) + parseFloat(cgstAmount);                                     
                                  }
                              });


                              var vatAmount = totalPrdamount - totoalwithoutVat;

                              /*       var discountAmount = $(".discountAmount").val();*/

                              /*   var octria = $(".octria").val();*/

                              totalBalance = (parseFloat(totalPrdamount));


                              $("strong.withouttax").empty();
                              $("strong.withtax").empty();

                              /*       $("strong.withouttax").append( totoalwithoutVat.toFixed(2) + " Rs");
                                   $("strong.withtax").append( totalPrdamount.toFixed(2) + " Rs");*/

                              $("input.withouttax").val(totoalwithoutVat.toFixed(2));
                              $("input.withtax").val(totalPrdamount.toFixed(2));

                              $("input.finalTotal").val();
                              $("input.finalTotal").val(totalBalance.toFixed(2));

                              $("input.orderFinal").val(totalBalance.toFixed(2));

                              //$("input.vat").val( vatAmount.toFixed(2));

                              $("input.totalgst").val(totalgst.toFixed(2));
                              $("input.totalcgst").val(totalcgst.toFixed(2));
                              
                              /*        
                                   $("strong.finalTotalwithoutTax").empty();
                                   $("strong.finalTotalwithoutTax").append( grossTotal.toFixed(2));*/
                                   
                              var routAmount = $("input.roundfinalTotal").val();
                              var sign = $("#signRound").val();
                              if (sign == 1) {
                                  var grandTotla = totoalwithoutVat + parseFloat(routAmount);

                              } else {
                                  var grandTotla = totoalwithoutVat - parseFloat(routAmount);
                              }

                              $("input.finalOrderPrice").val();
                              $("input.finalOrderPrice").val(totoalwithoutVat.toFixed(2));
                              //In word 

                              var inword = toWords(totoalwithoutVat.toFixed(2));

                              $("strong.word").empty();
                              $("strong.word").append(inword);
                              $("input.word").val(inword);
                          }


                          //Product Chnage Event      
                          function performaActions() {

                              //Qty Chnage 
                              $(".qty").change(function() {
                                  var qtyChnage = $(this).val();
                                  var singleqtyChnage = 1;
                                  var _thisTr = $(this).closest('tr');

                                  var unitPrice = _thisTr.find("input.unitprice").val();

                                  var lessDiscount = _thisTr.find('input.lessdiscount').val();
                                  //Default Price

                                  var discountedSingleUinitPrice = (parseFloat(unitPrice) * parseFloat(lessDiscount)) / 100;

                                  var discountedPrice = parseFloat(unitPrice) - parseFloat(discountedSingleUinitPrice);

                                  var price = parseFloat(qtyChnage) * parseFloat(discountedPrice);
                                  var singleprice = parseFloat(singleqtyChnage) * parseFloat(discountedPrice);

                                  var taxPercent = _thisTr.find("select.vatinput").val()
                                  var taxAmoutn = (parseFloat(price) * parseFloat(taxPercent)) / 100;
                                  var singletaxAmoutn = (parseFloat(singleprice) * parseFloat(taxPercent)) / 100;
                                  
                                  var total = parseFloat(price) - parseFloat(taxAmoutn);
                                  var singletotal = parseFloat(singleprice) - parseFloat(singletaxAmoutn);
                                  //Tax

                                 _thisTr.find(".gst").html("GST : " + taxPercent  + "%" + " <br>Tax amount: ");
                            	  _thisTr.find(".gst").val(taxAmoutn.toFixed(2));
                            
                                  _thisTr.find("input.vatAmountinput").val(taxAmoutn.toFixed(2));
									
									var cgst = taxPercent/2;
									var cAmount = taxAmoutn/2;

                                  //Total 
                                    _thisTr.find(".c_gst").val(cgst.toFixed(2));
                                    _thisTr.find(".c_amt").val(cAmount.toFixed(2));
                                    _thisTr.find(".c_gst").val(cgst.toFixed(2));
                                    _thisTr.find(".c_amt").val(cAmount.toFixed(2));
                        
                        
 								 _thisTr.find(".singlerowtotal").val(singletotal.toFixed(2));
 	                             _thisTr.find(".rowtotal").val(total.toFixed(2));
                                  _thisTr.find(".rowtotalx").val(price.toFixed(2));


                                  //Total
                                   summaryVatBlock();
                                  totalBlock();

                              });

                              $(".lessdiscount").change(function() {
                                  var lessdiscountchange = $(this).val();

                                  var _thisTr = $(this).closest('tr');

                                  var qty = _thisTr.find("input.qty").val();
                                  var unitPrice = _thisTr.find("input.unitprice").val();

                                  var taxAbleAmmount = parseFloat(qty) * parseFloat(unitPrice);

                                  var discountedAmmount = (parseFloat(taxAbleAmmount) * parseFloat(lessdiscountchange)) / 100;

                                  //Default Price

                                  var price = parseFloat(taxAbleAmmount) - parseFloat(discountedAmmount);

                                  var taxPercent = _thisTr.find("select.vatinput").val()
                                  var taxAmoutn = (parseFloat(price) * parseFloat(taxPercent)) / 100;
                                  var total = parseFloat(price) - parseFloat(taxAmoutn);


                                  //Tax
                                   _thisTr.find(".gst").html("GST : " + taxPercent  + "%" + " <br>Tax amount: ");
                            	  _thisTr.find(".gst").val(taxAmoutn.toFixed(2));
                            
                                  _thisTr.find("input.vatAmountinput").val(taxAmoutn.toFixed(2));
                                  
                                  	var cgst = taxPercent/2;
									var cAmount = taxAmoutn/2;

                                  //Total 
                                    _thisTr.find(".c_gst").val(cgst.toFixed(2));
                                    _thisTr.find(".c_amt").val(cAmount.toFixed(2));
                                    _thisTr.find(".c_gst").val(cgst.toFixed(2));
                                    _thisTr.find(".c_amt").val(cAmount.toFixed(2));
                                    
                                  //Total 
                                  _thisTr.find(".rowtotal").val(total.toFixed(2));
                                  _thisTr.find(".rowtotalx").val(price.toFixed(2));

                                  //Total
                                   summaryVatBlock();
                                  totalBlock();

                              });


                              $(".unitprice").change(function() {
                                  var unitPrice = $(this).val();
                                  var _thisTr = $(this).closest('tr');


                                  var qtyChnage = _thisTr.find("input.qty").val();

 								var singleqtyChnage = 1;

                                  var lessDiscount = _thisTr.find('input.lessdiscount').val();


                                  //Default Price

                                  var discountedSingleUinitPrice = (parseFloat(unitPrice) * parseFloat(lessDiscount)) / 100;

                                  var discountedPrice = parseFloat(unitPrice) - parseFloat(discountedSingleUinitPrice);

                                  var price = parseFloat(qtyChnage) * parseFloat(discountedPrice);
                                  var singleprice = parseFloat(singleqtyChnage) * parseFloat(discountedPrice);

                                  var taxPercent = _thisTr.find("select.vatinput").val()
                                  var taxAmoutn = (parseFloat(price) * parseFloat(taxPercent)) / 100;
                                  var singletaxAmoutn = (parseFloat(singleprice) * parseFloat(taxPercent)) / 100;
                                   
                                  var total = parseFloat(price) - parseFloat(taxAmoutn);
                                  var singletotal = parseFloat(singleprice) - parseFloat(singletaxAmoutn);



                                  //Tax
									_thisTr.find(".gst").html("GST : " + taxPercent  + "%" + " <br>Tax amount: ");
                            	  _thisTr.find(".gst").val(taxAmoutn.toFixed(2));
                            
                                  _thisTr.find("input.vatAmountinput").val(taxAmoutn.toFixed(2));	
                                  
									var cgst = taxPercent/2;
									var cAmount = taxAmoutn/2;

                                  //Total 
                                    _thisTr.find(".c_gst").val(cgst.toFixed(2));
                                    _thisTr.find(".c_amt").val(cAmount.toFixed(2));
                                    _thisTr.find(".c_gst").val(cgst.toFixed(2));
                                    _thisTr.find(".c_amt").val(cAmount.toFixed(2));

                                  //Total 
							      _thisTr.find(".singlerowtotal").val(singletotal.toFixed(2));
                                  _thisTr.find(".rowtotal").val(total.toFixed(2));
                                  _thisTr.find(".rowtotalx").val(price.toFixed(2));

                                  //Total
                                   summaryVatBlock();
                                   totalBlock();

                              });





                          }

                          performaActions();





                          $("#signRound").change(function() {

                              var ordeFinal = $("input.withouttax").val();

                              var routAmount = $("input.roundfinalTotal").val();
                              var sign = $("#signRound").val();

                              if (sign == 1) {
                                  var grandTotla = parseFloat(ordeFinal) + parseFloat(routAmount);

                              } else {
                                  var grandTotla = parseFloat(ordeFinal) - parseFloat(routAmount);
                              }

                              $("input.finalOrderPrice").val("");
                              $("input.finalOrderPrice").val(grandTotla);

                              var inword = toWords(grandTotla);

                              $("strong.word").empty();
                              $("strong.word").append(inword);
                              $("input.word").val(inword);
                          });


                          $(".roundfinalTotal").change(function() {

                              var ordeFinal = $("input.withouttax").val();


                              var routAmount = $("input.roundfinalTotal").val();
                              var sign = $("#signRound").val();

                              if (sign == 1) {
                                  var grandTotla = parseFloat(ordeFinal) + parseFloat(routAmount);

                              } else {
                                  var grandTotla = parseFloat(ordeFinal) - parseFloat(routAmount);
                              }

                              $("input.finalOrderPrice").val("");
                              $("input.finalOrderPrice").val(grandTotla);

                              var inword = toWords(grandTotla);


                              $("strong.word").empty();
                              $("strong.word").append(inword);
                              $("input.word").val(inword);
                          });

                          function toWords(mydigit) {
                              mydigit = mydigit.toString();
                              var splitDigit = mydigit.split('.');
                              if (typeof(splitDigit[0]) != "undefined" && splitDigit[0] !== null) {
                                  var x = splitDigit[0];
                              } else {
                                  var x = mydigit;
                              }

                              var r = 0;
                              var txter = x;
                              var sizer = txter.length;
                              var numStr = "";
                              if (isNaN(txter)) {
                                  alert(" Invalid number");
                                  exit();
                              }
                              var n = parseInt(x);
                              var places = 0;
                              var str = "";
                              var entry = 0;
                              while (n >= 1) {
                                  r = parseInt(n % 10);

                                  if (places < 3 && entry == 0) {
                                      numStr = txter.substring(txter.length - 0, txter.length - 3) // Checks for 1 to 999.
                                      str = onlyDigit(numStr); //Calls function for last 3 digits of the value.
                                      entry = 1;
                                  }

                                  if (places == 3) {
                                      numStr = txter.substring(txter.length - 5, txter.length - 3)
                                      if (numStr != "") {
                                          str = onlyDigit(numStr) + " Thousand " + str;
                                      }
                                  }

                                  if (places == 5) {
                                      numStr = txter.substring(txter.length - 7, txter.length - 5) //Substring for 5 place to 7 place of the string
                                      if (numStr != "") {
                                          str = onlyDigit(numStr) + " Lakhs " + str; //Appends the word lakhs to it
                                      }
                                  }

                                  if (places == 6) {
                                      numStr = txter.substring(txter.length - 9, txter.length - 7) //Substring for 7 place to 8 place of the string
                                      if (numStr != "") {
                                          str = onlyDigit(numStr) + " Crores " + str; //Appends the word Crores
                                      }
                                  }

                                  n = parseInt(n / 10);
                                  places++;


                              }

                              var finalword = str;


                              if (typeof(splitDigit[1]) != "undefined") {
                                  //alert(splitDigit[1]);

                                  var point = splitDigit[1];
                                  var pointdigit = other(point);
                                  var finalword = str + " point " + pointdigit;
                              }

                              /*
                              if(typeof(splitDigit[1] != "undefined" && splitDigit[1] !== null) ) {
                               var point   =    splitDigit[1] ;
                               var pointdigit = other(point );
                               
                               var finalword = str  + " point " + pointdigit + " only" ;
                               
                               
                              }
                              */

                              return finalword;


                          }

                          function other(x) {
                              var r = 0;
                              var txter = x;
                              var sizer = txter.length;
                              var numStr = "";
                              if (isNaN(txter)) {
                                  alert(" Invalid number");
                                  exit();
                              }
                              var n = parseInt(x);
                              var places = 0;
                              var str = "";
                              var entry = 0;
                              while (n >= 1) {
                                  r = parseInt(n % 10);

                                  if (places < 3 && entry == 0) {
                                      numStr = txter.substring(txter.length - 0, txter.length - 3) // Checks for 1 to 999.
                                      str = onlyDigit(numStr); //Calls function for last 3 digits of the value.
                                      entry = 1;
                                  }

                                  if (places == 3) {
                                      numStr = txter.substring(txter.length - 5, txter.length - 3)
                                      if (numStr != "") {
                                          str = onlyDigit(numStr) + " Thousand " + str;
                                      }
                                  }

                                  if (places == 5) {
                                      numStr = txter.substring(txter.length - 7, txter.length - 5) //Substring for 5 place to 7 place of the string
                                      if (numStr != "") {
                                          str = onlyDigit(numStr) + " Lakhs " + str; //Appends the word lakhs to it
                                      }
                                  }

                                  if (places == 6) {
                                      numStr = txter.substring(txter.length - 9, txter.length - 7) //Substring for 7 place to 8 place of the string
                                      if (numStr != "") {
                                          str = onlyDigit(numStr) + " Crores " + str; //Appends the word Crores
                                      }
                                  }

                                  n = parseInt(n / 10);
                                  places++;


                              }


                              return str;

                          }




                          function onlyDigit(n) {
                              //Arrays to store the string equivalent of the number to convert in words
                              var units = ['', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine'];
                              var randomer = ['', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'];
                              var tens = ['', 'Ten', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];
                              var r = 0;
                              var num = parseInt(n);
                              var str = "";
                              var pl = "";
                              var tenser = "";
                              while (num >= 1) {
                                  r = parseInt(num % 10);
                                  tenser = r + tenser;
                                  if (tenser <= 19 && tenser > 10) //Logic for 10 to 19 numbers
                                  {
                                      str = randomer[tenser - 10];
                                  } else {
                                      if (pl == 0) //If units place then call units array.
                                      {
                                          str = units[r];
                                      } else if (pl == 1) //If tens place then call tens array.
                                      {
                                          str = tens[r] + " " + str;
                                      }
                                  }
                                  if (pl == 2) //If hundreds place then call units array.
                                  {
                                      str = units[r] + " Hundred " + str;
                                  }

                                  num = parseInt(num / 10);
                                  pl++;
                              }
                              return str;
                          }
                      });
  </script>

</body>

</html>

