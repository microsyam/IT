<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="author" content="Mohamed Syam">

	<title>Followers | <?php echo $userdata[0]['s_name'];?></title>
	<!-- Bootstrap Core CSS -->
	<link href="<?php echo base_url();?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="<?php echo base_url();?>vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

	<!-- DataTables CSS -->
	<link href="<?php echo base_url();?>vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

	<!-- DataTables Responsive CSS -->
	<link href="<?php echo base_url();?>vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="<?php echo base_url();?>dist/css/sb-admin-2.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="<?php echo base_url();?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<script src="<?php echo base_url();?>js/jquery.min.js.download"></script>

	<!--<script src="<?php /*echo base_url();*/?>js/0a3b9034e109d88d72f83c9e6c9d13b7.js.download"></script>-->

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
					<h1 class="page-header">Follower report</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>

			<div class="container">
				<div class="alert alert-success" style="display: none;">
				</div>
				<div class="form-group">

					<div class="input-group">
						<input type="hidden" name="txtId" value="0">
						<select  class="selectpicker" required data-show-subtext="true" data-live-search="true" id="user" name="user">
							<option value="0">Select User</option>
							<?php foreach ($get_users as $row):?>
							<option value="<?php echo $row->u_id;?>"><?php echo $row->u_name;?></option>
							<?php endforeach;?>
						</select>

					</div>
				</div>



				<br />
					<!--Here ISA-->
				<!-- Posts List -->
				<table class="table table-bordered table-striped" id='postsList'>

					<thead>

					<tr>

						<th>Location</th>
						<th>Follower</th>

					</tr>

					</thead>

					<tbody></tbody>

				</table>



				<!-- Paginate -->

				<div id='pagination'></div>
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

	<script type='text/javascript'>

		$(document).ready(function(){
			load_data();
			function load_data(user){

			$('#pagination').on('click','a',function(e){
				e.preventDefault();
				var pageno = $(this).attr('data-ci-pagination-page');
				loadPagination(pageno);
			});
			loadPagination(0);
			function loadPagination(pagno){
				$.ajax({
					url: '<?php echo base_url();?>LegalReports/fetch/'+pagno,
					type: 'POST',
					data:{user:user},
					dataType: 'json',
					success: function(response){
						$('#pagination').html(response.pagination);
						createTable(response.result,response.row,response.counta);
					}
				});
			}

			function createTable(result,sno,counta){
				sno = Number(sno);
				 allcounts=Number(counta);
				$('#postsList tbody').empty();
				for(index in result){
					var locationName = result[index].loc_name;
					var follower=result[index].u_name;
					var id = result[index].leg_id;
					/*content = content.substr(0, 60) + " ...";*/
					var link = result[index].slug;
					sno+=1;
					var tr = "<tr>";
					tr += "<td>"+ locationName +"</td>";
					tr += "<td>"+ follower +"</td>";
					tr += "</tr>";
					$('#postsList tbody').append(tr);
				}

				$('.alert-success').html('Total Contracts is : '+allcounts ).show();
			}
			}

				$('#user').change(function(){
					var user1 = $('select[name=user]').val();
					$('input[name=txtId]').val(user1);
					user=$('input[name=txtId]').val();
					if(user !=0)
					{
						load_data(user);
					}else
					{
						load_data();
					}
				});

		});

	</script>



<!-- jQuery -->
<script src="<?php echo base_url();?>vendor/jquery/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url();?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url();?>vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url();?>dist/js/sb-admin-2.js"></script>


<script src="<?php echo base_url();?>js/bootstrap-select.min.js"></script>

</body>

</html>
