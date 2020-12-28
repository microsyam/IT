<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="author" content="Mohamed Syam">

	<title>Accounts | <?php echo $userdata[0]['s_name'];?></title>


	<!-- Bootstrap Core CSS -->
	<link href="<?php echo base_url();?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="<?php echo base_url();?>vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="<?php echo base_url();?>dist/css/sb-admin-2.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="<?php echo base_url();?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<script src="<?php echo base_url();?>js/jquery.min.js.download"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-3.1.1.min.js"></script>
	<script src="<?php echo base_url();?>js/0a3b9034e109d88d72f83c9e6c9d13b7.js.download"></script>

	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-select.min.css" />


</head>


<body>

<div id="wrapper">

	<!-- Navigation -->
	<?php include_once('nav_v.php');?>

	<!-- Page Content -->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Accounts</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<div class="alert alert-success" style="display: none;">
			</div>
			<div id="myModal" class="modal fade" tabindex="-1" role="dialog"><!-- modal -->
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							<form id="myForm" action="" method="post" class="form-horizontal" >
								<input type="hidden" name="txtId" value="0">
								<div class="form-group">
									<label for="accountName"  class="label-control col-md-4">Name</label>
									<div class="col-md-8">
										<input type="text" required name="accountName" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label for="department" class="label-control col-md-4">Department</label>
									<div class="col-md-8">
										<select class="selectpicker" required data-show-subtext="true" data-live-search="true" name="txtdepartment" id="txtdepartment">
											<?php foreach($departments as $d):?>
											<option value= "<?php echo $d->d_id;?>" ><?php echo "[".$d->loc_name."] ".$d->d_name;?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="accountCode"  class="label-control col-md-4">Code</label>
									<div class="col-md-3">
										<input type="text" required name="accountCode" class="form-control">
									</div>
								</div>

						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
			<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Confirm Delete</h4>
						</div>
						<div class="modal-body">
							Do you want to delete this record?
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->

			<div class="container" style="width:100%">

				<div class="form-group">

					<button id="btnAdd" class="btn btn-success">Add New</button>



					<br>
					<br>
					<div class="input-group">

						<span class="input-group-addon">Search</span>
						<input type="text" name="search_text" id="search_text" placeholder="Search by Account" class="form-control" />
					</div>
				</div>
				<br />
				<div id="result"></div>
			</div>
			<div style="clear:both"></div>
			<br />
			<br />
			<br />
			<br />



			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->


<script>
	$(function(){

		load_data();
		function load_data(query)
		{
			$.ajax({
				url:"<?php echo base_url(); ?>Accounts/fetch",
				method:"POST",
				data:{query:query},
				success:function(data){
					$('#result').html(data);
				}
			})
		}

		$('#search_text').keyup(function(){
			var search = $(this).val();
			if(search != '')
			{
				load_data(search);
			}
			else
			{
				load_data();
			}
		});

		$('#btnAdd').click(function(){
			$('#myModal').modal('show');
			$('#myModal').find('.modal-title').text('Add New Account');
			$('#myForm').attr('action', '<?php echo base_url() ?>Accounts/addAccount');
		});

		$('#btnSave').click(function(){
			var url = $('#myForm').attr('action');
			var data = $('#myForm').serialize();
			var AccountName = $('input[name=accountName]');
			var Department = $('select[name=txtdepartment]');
			var AccCode = $('input[name=accountCode]');
			var result = '';
			if(AccountName.val()==''){
				AccountName.parent().parent().addClass('has-error');
			}else{
				AccountName.parent().parent().removeClass('has-error');
				result +='1';
			}
			if(Department.val()==''){
				Department.parent().parent().addClass('has-error');
			}else{
				Department.parent().parent().removeClass('has-error');
				result +='2';
			}
			if(AccCode.val()==''){
				AccCode.parent().parent().addClass('has-error');
			}else{
				AccCode.parent().parent().removeClass('has-error');
				result +='3';
			}
			if(result=='123') {
				$.ajax({
					type: 'ajax',
					method: 'post',
					url: url,
					data: data,
					async: false,
					dataType: 'json',
					success: function (response) {
						if (response.success) {
							$('#myModal').modal('hide');
							$('#myForm')[0].reset();
							if (response.type == 'add') {
								var type = 'added'
							} else if (response.type == 'update') {
								var type = "updated"
							}

							$('.alert-success').html('Account ' + type + ' successfully').fadeIn().delay(4000).fadeOut('slow');

						} else {
							alert('Error');
						}
						load_data();
					},
					error: function () {
						alert('Could not add data');
					}
				});
			}
		});





	//Edit

	$('#result').on('click', '.item-edit', function(){
		var id = $(this).attr('data');
		$('#myModal').modal('show');
		$('#myModal').find('.modal-title').text('Edit Account');
		$('#myForm').attr('action', '<?php echo base_url() ?>Departments/updateAccount');
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: '<?php echo base_url() ?>Accounts/editAccount',
			data: {id: id},
			async: false,
			dataType: 'json',
			success: function(data){
				$('input[name=accountName]').val(data.a_name);
				$('select[name=txtdepartment]').val(data.a_department_id);
				$('input[name=accountCode]').val(data.a_code);
				$('input[name=txtId]').val(data.d_id);
				$('.selectpicker').selectpicker('refresh');
			},
			error: function(){
				alert('Could not Edit Data');
			}
		});
	});

	//delete

	//delete-
		$('#result').on('click', '.item-delete', function(){
			var id = $(this).attr('data');
			$('#deleteModal').modal('show');
			//prevent previous handler - unbind()
			$('#btnDelete').unbind().click(function(){
				$.ajax({
					type: 'ajax',
					method: 'get',
					async: false,
					url: '<?php echo base_url() ?>Accounts/deleteAccount',
					data:{id:id},
					dataType: 'json',
					success: function(response){
						if(response.success){
							$('#deleteModal').modal('hide');
							$('.alert-success').html('Account Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
							load_data();
						}else{
							alert('Error');
						}
					},
					error: function(){
						alert('Error deleting');
					}
				});
			});
		});
	});
</script>



<!-- jQuery -->
<script src="<?php echo base_url();?>vendor/jquery/jquery.min.js"></script>

<script src="<?php echo base_url();?>js/bootstrap-select.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url();?>vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url();?>vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url();?>dist/js/sb-admin-2.js"></script>



</body>

</html>
