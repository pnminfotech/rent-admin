   <div id="add-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg"> 
     <div class="modal-content modal-lg">  
   
        <div class="modal-header"> 
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button> 
            <h4 class="modal-title">
             Add Rent
           </h4> 
        </div> 
            
        <div class="modal-body">                     
<?php   
    include 'dbConfig.php';
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
$building_name=$_REQUEST['building_name'];
$id=$_REQUEST['b_id'];
$wing=$_REQUEST['wing'];
$flat_no=$_REQUEST['flat_no'];
$sql = "select a.* from rent_update_details a where a.flat_no='$flat_no' and a.building_name='$building_name' and a.wing='$wing'";
//$sql = "select a.*,b.building FROM building b,flat_details a where a.flat_no='$flat_no' and a.building_name='$building_name' and a.b_id=$id and a.wing='$wing' and a.building_name=b.building_name";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
?>                          
           <!-- mysql data will be load here -->                          
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post" enctype="multipart/form-data">

										<div class="item form-group">
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Flat Number <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" readonly  id="first-name" name="flat_no" required="required" class="form-control" value="<?php echo $row["flat_no"];  ?>"  Placeholder="flat_no">
											</div>
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Building Name <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" readonly id="first-name" name="building_name" required="required" value="<?php echo $row["building_name"];  ?>" class="form-control " Placeholder="Building Name">
											</div>	
										</div>
										
										<div class="item form-group">
												<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name"> Wing <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" readonly id="first-name" name="wing" required="required" value="<?php echo $row["wing"];  ?>" class="form-control " Placeholder="Building Name">
											</div>
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Room Type <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" readonly id="first-name" name="room_type" required="required" value="<?php echo $row["room_type"];  ?>" class="form-control " Placeholder="Building Name">
											</div>
										</div>
										
										
										<div class="item form-group">
											
										
											
										</div>
										
											<div class="item form-group">
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Renter Full Name<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="first-name" readonly name="user_name" required="required"  value="<?php echo $row["user_name"];  ?>" class="form-control " Placeholder="Renter Full Name">
											</div>
											
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Mobile NO.<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="number" id="first-name" readonly name="phone" required="required"  value="<?php echo $row["phone"];  ?>" class="form-control" Placeholder="Mobile No.">
											</div>
									
										</div>
										
										<div class="item form-group">
											
								
									
										</div>
									
										<div class="item form-group">
											<?php 
											$create_date=$row["rent_due_date"];
											$month = date('m');
											$year = date('yy');
											$main_date= "$year-$month-$create_date";
											$rent_date=$row["rent_paid_date"]; 
											
											$ts1 = strtotime($rent_date);
											$ts2 = strtotime($main_date);
											
											$year1 = date('yy', $ts1);
											$year2 = date('yy',$ts2);
											
											$month1 = date('m', $ts1);
											$month2 = date('m',$ts2);
											
											$diff =(($year2 - $year1) * 12) +($month2 - $month1);
									  
											$diff11=substr($diff,-2);
										//    echo $diff11;
											
											    ?>
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Rent ( Last <span style=" font-family: sans-serif;font-weight:bold;"><?php  echo $diff11; ?> </span>Month 
											
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="hidden" id="" name="total_rent" readonly required="required" value="<?php echo $row["final_rent_amt"] ?>" class="form-control " Placeholder="Rent">
												<input type="text" id="rent" name="rent" readonly required="required" value="<?php echo $row["final_rent_amt"] * $diff11; ?>" class="form-control " Placeholder="Rent">
											</div>
										
											
   									    	<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Pending Amout<span class="required">*</span></label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="pending_amt" name="pen" readonly required="required" value="<?php echo $row["remain_amt"]; ?>" oninput="weightConverter()" onchange="weightConverter()" class="form-control " Placeholder="Current Meter Reading">
											</div>
											

									     	</div>
										
										<div class="item form-group">
										
												<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Last Meter Reading <span class="required">*</span></label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="weight1" name="last_meter_reading" readonly required="required" value="<?php echo $row["last_meter_reading"]; ?>" oninput="weightConverter()" onchange="weightConverter()" class="form-control " Placeholder="Current Meter Reading">
											</div>
											
												<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Current Meter Reading <span class="required">*</span></label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="weight2" name="current_meter_reading" required="required" value=""  oninput="weightConverter()" onchange="weightConverter()" class="form-control " Placeholder="Current Meter Reading">
											</div>
											
										</div>
											
										<div class="item form-group">

											   <label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Total Reading <span class="required">*</span></label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="outputTon" readonly name="total_meter_reading" required="required" value="0" class="form-control " Placeholder="">
											</div>
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Total LightBill Pay<span class="required">*</span></label>
											<div class="col-md-4 col-sm-4 ">
												<input type="hidden" id="amount_unit" name="" readonly  value="<?php echo $row["per_unit_reading"]; ?>"  class="form-control " Placeholder="Total Lightbill">									
												<input type="text" id="bill" readonly name="lightbill_amt" required="required" value=""  class="form-control"  Placeholder="Total Lightbill">
											</div>
											
										</div>
										
										<div class="item form-group">
										
											


											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Total Rent<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="total_rent" name="final_rent_amt" readonly   class="form-control " Placeholder="Total Rent">
											</div>
											
											
										
										
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Paid Rent<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="number" id="paid_rent" name="paid_amt" required="required" oninput="paidrent()" onchange="paidrent()" class="form-control" Placeholder="Paid Rent">
											</div>
											
													<script>
                                                        function weightConverter() {
                                                          var first_number = document.getElementById("weight1").value;
                                                          var second_number =document.getElementById("weight2").value;
                                                          var third_number =document.getElementById("amount_unit").value;
                                                          var fourth_number =document.getElementById("bill").value;
                                                          var rent =document.getElementById("rent").value;
                                                          var pending_amt = document.getElementById("pending_amt").value;
                                                            var result = (parseInt(second_number) - parseInt(first_number));
 														    var result2 = ((parseInt(second_number) - parseInt(first_number)) * parseInt(third_number));
 														    var result3 = parseInt(rent) + parseInt(fourth_number) + parseInt(pending_amt);
                                                            document.getElementById("outputTon").value=result;
                                                            document.getElementById("bill").value=result2;
                                                            document.getElementById("total_rent").value=result3;
                                                        }   
       
                                                   </script>  
											
										  </div>
										
										
										<div class="item form-group">
											
											
										   <label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Remaining Rent<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="number" id="remain_rent" readonly name="remain_amt" required="required"  class="form-control" Placeholder="Remaining Rent">
											</div>
												<script>
										             function paidrent() {
                                                          var first_number = document.getElementById("total_rent").value;
                                                          var second_number =document.getElementById("paid_rent").value;
                                                        
                                                            var result = (parseInt(first_number) - parseInt(second_number) );
 														   
                                                            document.getElementById("remain_rent").value=result;
                                                      
                                                        }  
                                                        </script>
										</div>
										
										
										<br>
										<div class="item form-group">
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Rent Date <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="date" id="first-name" name="rent_paid_date" required="required"  class="form-control " Placeholder="Address">
											</div>
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Select Month OF Rent <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<select name="month[]" required class="form-control" multiple>
												<option value="January">January</option>
												<option value="February">February</option>
												<option value="March">March</option>
												<option value="April">April</option>
												<option value="May">May</option>
												<option value="June">June</option>
												<option value="July">July</option>
												<option value="August">August</option>
												<option value="September">September</option>
												<option value="October">October</option>
												<option value="November">November</option>
												<option value="December">December</option>
												</select>
											</div>
										</div>
									
										
											<div class="item form-group">

											</div>
										
									
										
										<div class="item form-group">
										
									   

									
										</div>
										<div class="item form-group">
											
										
									
										</div>
										
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="pad-20 col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="reset">Reset</button>
												<button type="submit" name="add" class="btn btn-success">Submit</button>
											</div>
										</div>

									</form>
						<?php 
                       	   }
                            } else {
                                echo "0 results";
                            }                          
                            mysqli_close($conn);
                            ?>
        </div> 
                        
        <div class="modal-footer"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
        </div> 
                        
    </div> 
  </div>
</div>   


   <div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg"> 
     <div class="modal-content modal-lg">  
   
        <div class="modal-header"> 
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button> 
            <h4 class="modal-title">
              Tentant Details
           </h4> 
        </div> 
            
        <div class="modal-body">                     
    <?php   
    include 'dbConfig.php';
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
$building_name=$_REQUEST['building_name'];
$id=$_REQUEST['b_id'];
$wing=$_REQUEST['wing'];
$flat_no=$_REQUEST['flat_no'];
$sql = "select a.* from flat_rental a where  a.flat_no='$flat_no' and a.building_name='$building_name' and a.wing='$wing'";
//$sql = "select a.*,b.building FROM building b,flat_details a where a.flat_no='$flat_no' and a.building_name='$building_name' and a.b_id=$id and a.wing='$wing' and a.building_name=b.building_name";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $output='';
    $output .= '
      <div class="table-responsive">
         <table class="table table-bordered">';
    while($row = $result->fetch_assoc()) {

    
            $output .= '
                <tr>
                     <td width="30%"><label>Name</label></td>
                     <td width="70%">'.$row["user_name"].'</td>
                </tr>
                <tr>
                     <td width="30%"><label>Phone No.</label></td>
                     <td width="70%">'.$row["phone"].' / '.$row["phone2"].'</td>
                </tr>

                <tr>
                     <td width="30%"><label>Email</label></td>
                     <td width="70%">'.$row["email"].'</td>
                </tr>
                 <tr>
                     <td width="30%"><label>Rent</label></td>
                     <td width="70%">'.$row["rent"].'</td>
                </tr>
                <tr>
                     <td width="30%"><label>Maintenance</label></td>
                     <td width="70%">'.$row["maintainence"].'</td>
                </tr>
                <tr>
                     <td width="30%"><label>Working Place</label></td>
                     <td width="70%">'.$row["working_place"].' </td>
                </tr>
                <tr>
                     <td width="30%"><label>Family Members</label></td>
                     <td width="70%">'.$row["Family_members"].'</td>
                </tr>
                <tr>
                     <td width="30%"><label>Family Members Name</label></td>
                     <td width="70%">'.$row["family_members_name"].'</td>
                </tr>
                <tr>
                     <td width="30%"><label>Current Meter Reading</label></td>
                     <td width="70%">'.$row["current_meter_reading"].'</td>
                </tr>
                <tr>
                     <td width="30%"><label>Flat Given On</label></td>
                     <td width="70%">'.$row["flat_given_on"].'</td>
                </tr>
                <tr>
                     <td width="30%"><label>Rent Due Date</label></td>
                     <td width="70%">'.$row["rent_due_date"].'</td>
                </tr>
                <tr>
                     <td width="30%"><label>Address</label></td>
                     <td width="70%">'.$row["address"].'</td>
                </tr>
                     <tr>
                     <td width="30%"><label>Photo</label></td>
                     <td width="70%"><img src="data:image/jpeg;base64,'.base64_encode( $row['photo']).'" height="100" width="100" class="img-thumnail" /></td>
                </tr>
                <tr>
                     <td width="30%"><label>adhar_card</label></td>
                     <td width="70%"><img src="data:image/jpeg;base64,'.base64_encode( $row['adhar_card']).'" height="100" width="100" class="img-thumnail" /></td>
                </tr>
                <tr>
                     <td width="30%"><label>Pancard</label></td>
                     <td width="70%">'."<img src='data:image/jpeg;base64,".base64_encode( $row["pancard"])."' height='100' width='100' class='img-thumnail' />".'</td>
                </tr>
                <tr>
                     <td width="30%"><label>Lightbill</label></td>
                     <td width="70%">'."<img src='data:image/jpeg;base64,".base64_encode( $row["lightbill"])."' height='100' width='100' class='img-thumnail' />".'</td>
                </tr>
<tr>
                     <td width="30%"><label>Status</label></td>
                     <td width="70%">'.$row["status"].'</td>
                </tr>
                ';
        }
        $output .= "</table>
                    </div>";
        echo $output;
                 
                            } else {
                                echo "0 results";
                            }                          
                            mysqli_close($conn);
                            ?>
        </div> 
                        
        <div class="modal-footer"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
        </div> 
                        
    </div> 
  </div>
</div>   

 