<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mohamed Syam">

    <title>Operations | <?php echo $userdata[0]['s_name'];?></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	 <script src="<?php echo base_url();?>js/jquery.min.js.download"></script>

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
                        <h1 class="page-header">Operations</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
				
				<div class="container" style="width:100%">
			<br />
			<br />
			<br />
			<!--h2 align="center">Current ticket</h2><br /-->
			<div class="form-group">
				 <?php echo form_open('Operations/Save');?>
				  <label  class="col-lg-2">Employee</label>
				 <div class="col-lg-3">
				
					  <select class="selectpicker" data-show-subtext="true" required data-live-search="true" name="employee"  >
                        <?php
                        if (count($employees)>=1) {
                            echo '<option disabled selected></option>';
                            foreach ($employees as $e):
                                echo "<option   value ='$e->e_id'>" . $e->e_name . "</option>";
                            endforeach;
                        }
                        ?>
						
                    </select>
					</div>
					<br>
				
					<br>
				  <label  class="col-lg-2">Classification</label>
					<div class="col-lg-3">
				
					  <select class="selectpicker" data-show-subtext="true" required data-live-search="true" name="class"  >
                        <?php
                        if (count($class)>=1) {
                            echo '<option disabled selected></option>';
                            foreach ($class as $o):
                                echo "<option   value ='$o->o_id'>" . $o->o_name . "</option>";
                            endforeach;
                        }
                        ?>
						
                    </select>
					</div>
					<br>
					<br>
					<label  class="col-lg-2">Priority</label>
					<div class="col-lg-3">
				
					  <select class="selectpicker" data-show-subtext="true" required data-live-search="true" name="pir"  >
                       <option value="High">High</option>
                       <option value="Medium">Medium</option>
                       <option value="Low">Low</option>
                    </select>
					</div>
					<br>
					<br>
					<label  class="col-lg-2">Status</label>
					<div class="col-lg-3">
				
					  <select class="selectpicker" data-show-subtext="true" required data-live-search="true" name="Status"  >
                       <option value="Opened">Opened</option>
                       <option value="Onhold">Onhold</option>
                       <option value="Closed">Closed</option>
                    </select>
					</div>
					<br>
					<br>
					<label  class="col-lg-2">Subject</label>
					<div class="col-lg-3">
					  <input type="text" class="form-control"  required name="subject"/>
					  
					</div>
					<br>
					<br>
					<br>
					<label  class="col-lg-2">Direction</label>
					<div class="col-lg-2">
				
					  <select class="selectpicker" data-show-subtext="true" required data-live-search="true" name="direction"  >
                       <option value="0">From Employee</option>
                       <option value="1">From Support</option>
                    </select>
					</div>
					<br>
					<br>
					<label  class="col-lg-2">Description</label>
					<div class="col-lg-5">
					  <textarea type="text" class="form-control" rows="6" required name="description"></textarea>
					  
					</div>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					
					
					
					<div class="col-lg-6">
					  <button type="submit" class="btn btn-primary center-block">Save</button>
					  
					</div>
				</div>
				<br>
				<br>
				<br>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Search</span>
					<input type="text" name="search_text" id="search_text" placeholder="Search" class="form-control" />
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
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"<?php echo base_url(); ?>Operations/fetch",
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
});
</script>

    <!-- jQuery -->
<script src="<?php echo base_url();?>js/bootstrap-select.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url();?>js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url();?>js/startmin.js"></script>



</body>

</html>
