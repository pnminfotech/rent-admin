   <div id="add-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg"> 
     <div class="modal-content modal-lg">  
   
        <div class="modal-header"> 
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button> 
            <h4 class="modal-title">
             Add Tenant Details
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
$sql = "select a.*,b.area from flat_details a,building b where a.building_name=b.building_name and a.flat_no='$flat_no' and a.building_name='$building_name' and a.b_id=$id and a.wing='$wing'";
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
										
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name"> Area <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" readonly id="first-name" name="area" required="required" value="<?php echo $row["area"];  ?>" class="form-control " Placeholder="Building Name">
											</div>
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Room Type <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" readonly id="first-name" name="room" required="required" value="<?php echo $row["room_type"];  ?>" class="form-control " Placeholder="Building Name">
											</div>
										</div>
										
										
										<div class="item form-group">
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Area Sq.ft <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" readonly id="first-name" name="area_sq_ft" required="required" value="<?php echo $row["sq_ft"];  ?>" class="form-control " Placeholder="Building Name">
											</div>
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name"> Wing <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" readonly id="first-name" name="wing" required="required" value="<?php echo $row["wing"];  ?>" class="form-control " Placeholder="Building Name">
											</div>
											
										</div>
										
											<div class="item form-group">
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Renter Full Name<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="first-name" name="user_name" required="required"  class="form-control " Placeholder="Renter Full Name">
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
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Mobile NO.<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="number" id="mobile" onkeyup="check(); return false;" name="phone" required="required" class="form-control" Placeholder="Mobile No."><span id="message"></span>
											</div>
									
										</div>
										
										<div class="item form-group">
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Alternate Mobile No.
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="first-name" name="phone2" class="form-control " Placeholder="Alternate Mobile No.">
											</div>
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Email
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="first-name" name="email"  value="" class="form-control " Placeholder="Email Id">
											</div>
											
									
										</div>
									
										<div class="item form-group">
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Rent (in Rs.) <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="weight1" name="rent" required="required" value="" oninput="weightConverter()" onchange="weightConverter()"  class="form-control " Placeholder="Rent">
											</div>
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Maintenance<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="weight2" name="maintainence" required="required"  oninput="weightConverter()" onchange="weightConverter()" class="form-control " Placeholder="Maintainence">
											</div>
										
									
										</div>
										
										<div class="item form-group">
										
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Final Rent <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="number" id="outputTon" name="final_rent" readonly required="required" class="form-control" Placeholder="0.00">
											</div>
									                  <script>
                                                        function weightConverter() {
                                                          var first_number = document.getElementById("weight1").value;
                                                          var second_number =document.getElementById("weight2").value;
                                                          
                                                           var result = (parseInt(first_number) + parseInt(second_number));
                                                          document.getElementById("outputTon").value=result;
                                                        }           
                                                   </script>  

										</div>
										<div class="item form-group">
										
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Deposite (in Rs.)<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="number" id="first-name" name="Deposite" required="required" class="form-control" Placeholder="Deposite">
											</div>
										
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Flat Given On<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="date" id="first-name" name="flat_given_on" required="required" class="form-control" Placeholder="Flat Given On">
											</div>

										</div>
											
										<div class="item form-group">
										
											
												<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Current Meter Reading <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="first-name" name="current_meter_reading" required="required"  class="form-control " Placeholder="Current Meter Reading">
											</div>
											
												<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Lightbill One Unit Amount<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="first-name" name="amt_per_unit" required="required"  class="form-control " Placeholder="Amount Per Unit">
											</div>

										</div>
										
								
										
										<div class="item form-group">
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">From Date <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="date" id="first-name" name="from_date" required="required"  class="form-control " Placeholder="Address">
											</div>
										
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Last Date of Rent<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="number" id="first-name" name="rent_due_date" required="required" class="form-control" Placeholder="Rent Due Date">
											</div>

										</div>
										
										<div class="item form-group">
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Total Family Members<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="first-name" name="Family_members" required="required" value="" class="form-control " Placeholder="Total Family Members">
											</div>
											
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Family Members Name<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<textarea id="first-name" name="family_members_name" class="form-control" Placeholder="Family Members Name"></textarea> 
											</div>
									
										</div>
									
										
											<div class="item form-group">
														
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Address <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="first-name" name="address" required="required"  class="form-control " Placeholder="Address">
											</div>
										
											
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Working Place<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="first-name" name="working_place" required="required" class="form-control" Placeholder="Working Place">
											</div>
										
										</div>
										
									
										
										<div class="item form-group">
										
									    	<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Rentar Photo<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="file"  name="photo" required="required" Placeholder="photo">
											</div>
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Lightbill<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="file"  name="lightbill" required="required" Placeholder="Lightbill">
											</div>

									
										</div>
										<div class="item form-group">
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Adhar Card <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="file" id="first-name" name="adhar_card" required="required"  Placeholder="Adhar Card">
											</div>
											
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Pan Card<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="file" id="first-name" name="pancard" required="required"  Placeholder="Pan Card">
											</div>
									
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

 