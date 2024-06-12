<?php
$db_host     = 'localhost';
$db_username = 'root';
$db_password = '6WjuW+YX:J\\O8:i4\\I;f;7@r';
$db_name     = 'ganesh_agency';

//Create connection and select DB
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

if($conn->connect_error){
    die("Unable to connect database: " . $conn->connect_error);
}
?>

<select name="name" ID="name" onchange="myFunction()" class="form-control">
<option value="Select">Select</option>
<?php
$qu="Select * from client";
$res=$conn->query($qu);

while($r=mysqli_fetch_row($res))
{ 
    echo "<option data-add='$r[3]'  data-con='$r[2]'  value='$r[0]'> $r[1] </option>";
}
?> 
</select>
<label>Address</label><input type="text" name="add" id="add"/>
<label>Contact</label><input type="text" name="con" id="con"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>


    function myFunction(){
        var address = $('#name').find(':selected').data('add');
        var contact = $('#name').find(':selected').data('con');
        $('#add').val(address);
        $('#con').val(contact);
    }
</script>
