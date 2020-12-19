<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mohamed Syam">

    <title>My Profile | <?php echo $userdata[0]['s_name'];?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                        <h1 class="page-header">Profile Settings</h1>
						
						 <?php echo validation_errors(); ?>
						
						
					  <div class="panel panel-default">
						<div class="panel-heading">Genaral Data</div>
						<div class="panel-body">
						
						<?php echo form_open('MyAccount/save');?>
						<label  class="col-lg-2">Email Address</label>
					<div class="col-lg-3">
					  <input type="email" class="form-control" value="<?php echo $userdata[0]['u_email'];?>"  name="email">
					  
					</div>
					<br>
					<br>
					<br>
					<label  class="col-lg-2">Phone Number</label>
					<div class="col-lg-3">
					  <input type="text" class="form-control"  value="<?php echo $userdata[0]['u_phone'];?>" name="phone">
					  
					</div>
					<br>
					<br>
					
					<div class="col-lg-3">
					  <button type="submit" class="btn btn-primary">Save</button>
					  
					</div>
					
					<?php echo form_close();?>
						</div>
					  </div>
					  <div class="panel panel-default">
						<div class="panel-heading">Security Data</div>
						<div class="panel-body">
						
						<?php echo form_open('MyAccount/update');?>
						<label  class="col-lg-2">Password</label>
					<div class="col-lg-3">
					  <input type="password" class="form-control"  name="password">
					  
					</div>
					<br>
					<br>
					<label  class="col-lg-2">Password Confirmation</label>
					<div class="col-lg-3">
					  <input type="password" class="form-control"  name="passconf">
					  
					</div>
					<br>
					<br>
					

					<div class="col-lg-3">
					  <button type="submit" name="chpass" class="btn btn-primary">Update Password</button>
					  
					</div>
					
					<?php echo form_close();?>
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

    <!-- jQuery -->
    <script src="<?php echo base_url();?>vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>dist/js/sb-admin-2.js"></script>

</body>

</html>
