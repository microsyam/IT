<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="author" content="Mohamed Syam">

	<title>Contracts | <?php echo $userdata[0]['s_name'];?></title>


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
					<h1 class="page-header">Contract</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<div class="alert alert-success" style="display: none;">
			</div>


			<!-- Button trigger modal -->


<!--				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">Summary</button>
-->


			<!-- Modal -->
			<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Summary</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							Total locations : <?php echo count($locations);?><br>
							Total Contracts : <?php echo $rws[0]['Alla'];?><br>
							Agents : <?php echo $rws[0]['Agents'];?><br>
							Companies : <?php echo $rws[0]['Companies'];?><br>
							Shared : <?php echo $rws[0]['Shared'];?><br>
							Added Tax : <?php echo $rws[0]['Added_tax'];?> <br>
							Not Tax : <?php echo $rws[0]['Not_tax'];?> <br>
							Added VAT : <?php echo $rws[0]['Yes_Vat'];?> <br>
							Not Added : <?php echo $rws[0]['No_Vat'];?> <br>
							Required Licenses : <?php echo $rws[0]['lic_required'];?> <br>
							In Progress License : <?php echo $rws[0]['lic_inprogress'];?> <br>
							Completed License : <?php echo $rws[0]['lic_comp'];?> <br>
							OnHold Contracts Copy : <?php echo $rws[0]['contract_onhold'];?> <br>
							Completed Contracts Copy : <?php echo $rws[0]['contract_done'];?> <br>
							Practicing Electricity : <?php echo $rws[0]['elect_prac'];?> <br>
							Standard Meter Electricity :  <?php echo $rws[0]['elect_done'];?> <br>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!-- END Modal -->

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
									<label for="location" class="label-control col-md-4">Location</label>
									<div class="col-md-8">
										<select class="selectpicker" required data-show-subtext="true" data-live-search="true" name="txtlocation" id="txtlocation">
											<?php foreach($locations as $l):?>
												<option value= "<?php echo $l->loc_id;?>" ><?php echo $l->loc_name;?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="Registration"  class="label-control col-md-4">Registration</label>
									<div class="col-md-8">
										<select class="selectpicker" required data-show-subtext="true" data-live-search="true" name="txtregist" id="txtregist">
											<option value="Agent">Agent</option>
											<option value="Company">Company</option>
											<option value="Shared">Shared</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="txtmodification"  class="label-control col-md-4">Modification</label>
									<div class="col-md-8">
										<input type="text" required name="txtmodification" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<label for="txttax"  class="label-control col-md-4">TAX</label>
									<div class="col-md-8">
										<select class="selectpicker" required data-show-subtext="true" data-live-search="true" name="txttax" id="txttax">
											<option value="Added">Added</option>
											<option value="Not Added">Not Added</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="comreg"  class="label-control col-md-4">Commercial Register</label>
									<div class="col-md-8">
										<select class="selectpicker" required data-show-subtext="true" data-live-search="true" name="comreg" id="comreg">
											<option value="Added">Added</option>
											<option value="Not Added">Not Added</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="vat"  class="label-control col-md-4">VAT Registration</label>
									<div class="col-md-8">
										<select class="selectpicker" required data-show-subtext="true" data-live-search="true" name="vat" id="vat">
											<option selected value="No">No</option>
											<option value="Yes">Yes</option>
										</select>
									</div>
								</div>
								<div class="form-group" id="vatno">
									<label for="vatno"  class="label-control col-md-4">VAT NO</label>
									<div class="col-md-8">
										<input type="text" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="vatno"  class="form-control">
									</div>
								</div>

								<div class="form-group">
									<label for="follower" class="label-control col-md-4">Follower</label>
									<div class="col-md-8">
										<select class="selectpicker" required data-show-subtext="true" data-live-search="true" name="follower" id="follower">
											<?php foreach($get_users as $u):?>
												<option value= "<?php echo $u->u_id;?>" ><?php echo $u->u_name;?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="licencestatus"  class="label-control col-md-4">License Status</label>
									<div class="col-md-8">
										<select class="selectpicker" required data-show-subtext="true" data-live-search="true" name="licencestatus" id="licencestatus">
											<option value="Required">Required</option>
											<option value="InProgress">In Progress</option>
											<option value="Completed">Completed</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="rental_start_date"  class="label-control col-md-4">Rental Start Date</label>
									<div class="col-md-8">
										<input type="date" required name="rental_start_date" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label for="rental_end_date"  class="label-control col-md-4">Rental End Date</label>
									<div class="col-md-8">
										<input type="date" required name="rental_end_date" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label for="rent_cost"  class="label-control col-md-4">Cost</label>
									<div class="col-md-8">
										<input type="text" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  name="rent_cost" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<label for="elect"  class="label-control col-md-4">Electricity Status</label>
									<div class="col-md-8">
										<select class="selectpicker" required data-show-subtext="true" data-live-search="true" name="elect" id="elect">
											<option value="Practice">Practice </option>
											<option value="Complete">Complete</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="realestatetax"  class="label-control col-md-4">Real Estate TAX</label>
									<div class="col-md-8">
										<input type="text" required name="realestatetax" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<label for="copy"  class="label-control col-md-4">Contract Copy</label>
									<div class="col-md-8">
										<select class="selectpicker" required data-show-subtext="true" data-live-search="true" name="copy" id="copy">
											<option value="OnHold">On Hold </option>
											<option value="Done">Done</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="branch_number"  class="label-control col-md-4">Branch Number</label>
									<div class="col-md-8">
										<input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required name="branch_number" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<label for="owner_name"  class="label-control col-md-4">Owner Name</label>
									<div class="col-md-8">
										<input type="text" required name="owner_name" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<label for="owner_number"  class="label-control col-md-4">Owner Number</label>
									<div class="col-md-8">
										<input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required name="owner_number" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<label for="note"  class="label-control col-md-4">Note</label>
									<div class="col-md-8">
										<textarea type="text" required name="note" class="form-control"></textarea>
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
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">Summary</button>




					<br>
					<br>
					<div class="input-group">

						<span class="input-group-addon">Search</span>
						<input type="text" name="search_text" id="search_text" placeholder="Search" class="form-control" />
						<select  class="selectpicker" required data-show-subtext="true" data-live-search="true" name="filter">
							<option value="brancha">Branch Name</option>
							<option value="owner">owner</option>
						</select>
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
		function load_data(query,filter)
		{
			$.ajax({
				url:"<?php echo base_url(); ?>Contract/fetch",
				method:"POST",
				data:{query:query,filter:filter},
				success:function(data){
					$('#result').html(data);
				}
			})
		}

		$('#search_text').keyup(function(){
			var search = $(this).val();
			var filter = $('select[name=filter]').val();
			if(search != '')
			{
				load_data(search,filter);
			}
			else
			{
				load_data();
			}
		});

		$('#btnAdd').click(function(){
			$('#myModal').modal('show');
			$('#myModal').find('.modal-title').text('Add New Contract');
			$('#myForm').attr('action', '<?php echo base_url() ?>Contract/addContract');
		});

		$('#btnSave').click(function(){
			var url = $('#myForm').attr('action');
			var data = $('#myForm').serialize();
			var Location = $('select[name=txtlocation]');
			var regirst = $('select[name=txtregist]');
			var modeification = $('input[name=txtmodification]');
			var tax = $('select[name=txttax]');
			var comreg = $('select[name=comreg]');
			var vat = $('select[name=vat]');
			var vatno = $('input[name=vatno]');
			var follower = $('select[name=follower]');
			var licstatus = $('select[name=licencestatus]');
			var rentstart = $('input[name=rental_start_date]');
			var rentend = $('input[name=rental_end_date]');
			var rentcost = $('input[name=rent_cost]');
			var elect = $('select[name=elect]');
			var realesttax = $('input[name=realestatetax]');
			var copy = $('select[name=copy]');
			var branchno = $('input[name=branch_number]');
			var ownername = $('input[name=owner_name]');
			var ownerno = $('input[name=owner_number]');
			var note = $('textarea[name=note]');
			var result = '';
			if(Location.val()==''){
				Location.parent().parent().addClass('has-error');
			}else{
				Location.parent().parent().removeClass('has-error');
				result +='1';
			}
			if(regirst.val()==''){
				regirst.parent().parent().addClass('has-error');
			}else{
				regirst.parent().parent().removeClass('has-error');
				result +='2';
			}
			/*if(modeification.val()==''){
				modeification.parent().parent().addClass('has-error');
			}else{
				modeification.parent().parent().removeClass('has-error');
				result +='3';
			}*/
			if(tax.val()==''){
				tax.parent().parent().addClass('has-error');
			}else{
				tax.parent().parent().removeClass('has-error');
				result +='4';
			}
			if(comreg.val()==''){
				comreg.parent().parent().addClass('has-error');
			}else{
				comreg.parent().parent().removeClass('has-error');
				result +='5';
			}
			/*if(vat.val()==''){
				vat.parent().parent().addClass('has-error');
			}else{
				vat.parent().parent().removeClass('has-error');
				result +='6';
			}*/
			/*if(vatno.val()==''){
				vatno.parent().parent().addClass('has-error');
			}else{
				vatno.parent().parent().removeClass('has-error');
				result +='7';
			}*/
			if(follower.val()==''){
				follower.parent().parent().addClass('has-error');
			}else{
				follower.parent().parent().removeClass('has-error');
				result +='8';
			}
			if(licstatus.val()==''){
				licstatus.parent().parent().addClass('has-error');
			}else{
				licstatus.parent().parent().removeClass('has-error');
				result +='9';
			}
			if(rentstart.val()==''){
				rentstart.parent().parent().addClass('has-error');
			}else{
				rentstart.parent().parent().removeClass('has-error');
				result +='10';
			}
			if(rentend.val()==''){
				rentend.parent().parent().addClass('has-error');
			}else{
				rentend.parent().parent().removeClass('has-error');
				result +='11';
			}
			/*if(rentcost.val()==''){
				rentcost.parent().parent().addClass('has-error');
			}else{
				rentcost.parent().parent().removeClass('has-error');
				result +='12';
			}*/
			if(elect.val()==''){
				elect.parent().parent().addClass('has-error');
			}else{
				elect.parent().parent().removeClass('has-error');
				result +='13';
			}
			if(copy.val()==''){
				copy.parent().parent().addClass('has-error');
			}else{
				copy.parent().parent().removeClass('has-error');
				result +='14';
			}
			/*if(branchno.val()==''){
				branchno.parent().parent().addClass('has-error');
			}else{
				branchno.parent().parent().removeClass('has-error');
				result +='15';
			}*/
			/*if(ownername.val()==''){
				ownername.parent().parent().addClass('has-error');
			}else{
				ownername.parent().parent().removeClass('has-error');
				result +='16';
			}*/
			/*if(ownerno.val()==''){
				ownerno.parent().parent().addClass('has-error');
			}else{
				ownerno.parent().parent().removeClass('has-error');
				result +='17';
			}*/
			/*if(note.val()==''){
				note.parent().parent().addClass('has-error');
			}else{
				note.parent().parent().removeClass('has-error');
				result +='18';
			}*/
			/*if(realesttax.val()==''){
				realesttax.parent().parent().addClass('has-error');
			}else{
				realesttax.parent().parent().removeClass('has-error');
				result +='19';
			}*/
			if(result=='12458910111314') {
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

							$('.alert-success').html('Contract ' + type + ' successfully').fadeIn().delay(4000).fadeOut('slow');

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
		$('#myModal').find('.modal-title').text('Edit Contract');
		$('#myForm').attr('action', '<?php echo base_url() ?>Contract/updateContract');
		$.ajax({
			type: 'ajax',
			method: 'get',
			url: '<?php echo base_url() ?>Contract/editContract',
			data: {id: id},
			async: false,
			dataType: 'json',
			success: function(data){
				$('select[name=txtlocation]').val(data.leg_loc_id);
				$('select[name=txtregist]').val(data.leg_reg_type);
				$('input[name=txtmodification]').val(data.leg_modif_contract);
				$('select[name=txttax]').val(data.leg_taxs);
				$('select[name=comreg]').val(data.leg_comm_reg);
				$('select[name=vat]').val(data.leg_vat);
				$('input[name=vatno]').val(data.leg_vat_no);
				$('select[name=follower]').val(data.leg_follower);
				$('select[name=licencestatus]').val(data.leg_license_status);
				$('input[name=rental_start_date]').val(data.leg_start_rent_date);
				$('input[name=rental_end_date]').val(data.leg_end_rant_date);
				$('input[name=rent_cost]').val(data.leg_rent_price);
				$('select[name=elect]').val(data.leg_elect_status);
				$('input[name=realestatetax]').val(data.leg_reales_taxs);
				$('select[name=copy]').val(data.leg_contract_copy);
				$('input[name=branch_number]').val(data.leg_branch_no);
				$('input[name=owner_name]').val(data.leg_owner_name);
				$('input[name=owner_number]').val(data.leg_owner_number);
				$('textarea[name=note]').val(data.leg_observation);

				$('input[name=txtId]').val(data.leg_id);
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
					url: '<?php echo base_url() ?>Contract/deleteContract',
					data:{id:id},
					dataType: 'json',
					success: function(response){
						if(response.success){
							$('#deleteModal').modal('hide');
							$('.alert-success').html('Contract Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
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
