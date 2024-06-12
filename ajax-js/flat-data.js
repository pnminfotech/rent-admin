$(document).ready(function(){	
	var employeeData = $('#employeeList').DataTable({
		"lengthChange": false,
		"processing":true,
		"serverSide":true,
		"order":[],

		"ajax":{
			url:"action_flat.php",
			type:"POST",
			data:{action:'listEmployee'},
			dataType:"json"
		},
		"columnDefs":[
			{
				"targets":[0, 6, 7],
				"orderable":false,
			},
		],
		
		"pageLength": 10
	});		
	$('#addEmployee').click(function(){
		$('#employeeModal').modal('show');
		$('#employeeForm')[0].reset();
		$('.modal-title').html("<i class='fa fa-plus'></i> Add Employee");
		$('#action').val('addEmployee');
		$('#save').val('Add');
	});		
	$("#employeeList").on('click', '.update', function(){
		var empId = $(this).attr("id");
		var action = 'getEmployee';
		$.ajax({
			url:'action_flat.php',
			method:"POST",
			data:{empId:empId, action:action},
			dataType:"json",
			success:function(data){
				$('#employeeModal').modal('show');
				$('#empId').val(data.id);
				$('#flat_no').val(data.flat_no);
				$('#building_name').val(data.building_name);
				$('#wing').val(data.wing);				
				$('#room_type').val(data.room_type);
				$('#property').val(data.property);	
				$('#sq_ft').val(data.sq_ft);				
				$('#floor').val(data.floor);
				$('#meter_no').val(data.meter_no);	
				$('#owner_name').val(data.owner_name);	
				$('.modal-title').html("<i class='fa fa-plus'></i> Edit Flat Details");
				$('#action').val('updateEmployee');
				$('#save').val('Save');
			}
		})
	});
	$("#employeeModal").on('submit','#employeeForm', function(event){
		event.preventDefault();
		$('#save').attr('disabled','disabled');
		var formData = $(this).serialize();
		$.ajax({
			url:"action_flat.php",
			method:"POST",
			data:formData,
			success:function(data){				
				$('#employeeForm')[0].reset();
				$('#employeeModal').modal('hide');				
				$('#save').attr('disabled', false);
				employeeData.ajax.reload();
			}
		})
	});		
	$("#employeeList").on('click', '.delete', function(){
		var empId = $(this).attr("id");		
		var action = "empDelete";
		if(confirm("Are you sure you want to delete this employee?")) {
			$.ajax({
				url:"action_flat.php",
				method:"POST",
				data:{empId:empId, action:action},
				success:function(data) {					
					employeeData.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});	
});