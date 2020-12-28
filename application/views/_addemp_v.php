<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mohamed Syam">

    <title>Add Employee | <?php echo $userdata[0]['s_name'];?></title>

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

<body >

    <div id="wrapper">

        <!-- Navigation -->
        <?php include_once('nav_v.php');?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid" >
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">New Employee</h1>
						<div class="panel panel-default">
                <div class="panel-heading">Details</div>
                <div class="panel-body">
				
                 <div class="form-group">
				 <?php echo form_open('AddEmp/save');?>
				  <label  class="col-lg-2">Name</label>
					<div class="col-lg-3">
					  <input type="text" class="form-control" required name="empname">
					  
					</div>
					<br>
					<br>
					<label  class="col-lg-2">Code</label>
					<div class="col-lg-1">
					  <input type="text" class="form-control"  name="empcode">
					  
					</div>
					<br>
					<br>
					<label  class="col-lg-2">Deparment</label>
					<div class="col-lg-3">
					  <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="department"  >
                        <?php
                        if (count($deparments)>=1) {
                            echo '<option disabled selected></option>';
                            foreach ($deparments as $u):
                                echo "<option   value ='$u->d_id'>" . $u->d_name . "</option>";
                            endforeach;
                        }
                        ?>
						
                    </select>
					</div>
					
					<div class="col-lg-3">
					  <button type="submit" class="btn btn-primary center-block">Save</button>
					  
					</div>
				</div>
					
				
						   <?php echo form_close();?>
                    
                </div>
									
                </div>
            </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->






<script src="<?php echo base_url();?>js/bootstrap-select.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url();?>js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url();?>js/startmin.js"></script>


</body>

</html>
