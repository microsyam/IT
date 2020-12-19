<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mohamed Syam">

    <title>Edit User | <?php echo $userdata[0]['s_name'];?></title>

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
                        <h1 class="page-header">Edit User</h1>
						<?php echo validation_errors(); ?>
						
						<?php $ver=array('id'=>'try','name'=>'try','class'=>'form-horizontal'); ?>
						<?php echo form_open('EditUser/update',$ver);?>
						<div class="panel panel-default">
					  <div class="panel-heading">User</div>
					  <div class="panel-body">
					  
					  <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="select_user" id="select_user"  onchange="[document.try.action='EditUser',document.try.submit()]">
                        <?php
                        if (count($user_result)>1) {
                            echo '<option selected></option>';
                            foreach ($user_result as $u):
                                echo "<option   value ='$u->u_id'>" . $u->u_name . "</option>";
                            endforeach;
                        }
                        elseif(count($user_result)==1){
                            foreach ($user_result as $u):
                                echo "<option selected  value ='$u->u_id'>" . $u->u_name . "</option>";
                            endforeach;
                        }
                        ?>
						
                    </select>
					  <?php 
						if (count($user_result)==1){
							$name=$u->u_name;

							$email=$u->u_email;
							
							$phone=$u->u_phone;
							$dep=$u->u_department;
							$status=$u->u_active;

						}else{
							$name="";
							$email="";
							
							$phone="";
							$dep="";
							$status='';

						}
						?>
						
					  </div>
					</div>
					<?php if(count($user_result)==1):?>
						<div class="panel panel-default">
					  <div class="panel-heading">Create User</div>
					  <div class="panel-body">
					 
					  <label  class="col-lg-2">Name</label>
					<div class="col-lg-3">
					  <input type="text" value ="<?php echo $name;?>" class="form-control" name="name">
					  
					</div>
					<br>
					<br>
					<br>
					  <label  class="col-lg-2">Phone Number</label>
					<div class="col-lg-3">
					  <input type="text" value ="<?php echo $phone;?>" class="form-control" name="phone">
					  
					</div>
					<br>
					<br>
					<br>
					<label  class="col-lg-2">Email</label>
					<div class="col-lg-3">
					  <input type="text" value ="<?php echo $email;?>" class="form-control" name="email">
					  
					</div>
					
					<br>
					<br>
					<br>
				
					
					<label  class="col-lg-2">Deparment</label>
					<div class="col-lg-3">
					  <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="department" >
                        
                            
                           <?php foreach ($deparments as $u):?>
                                <option <?php if($u->d_id==$dep){echo "selected";}?> value ="<?php echo $u->d_id;?>"> <?php echo $u->d_name;?> </option>
                          <?php endforeach;?>
                        
                        
						
                    </select>
					</div>
					<br>
					<br>
					<br>
				
					
					<label  class="col-lg-2">Status</label>
					<div class="col-lg-3">
					  <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="status" >
                        <option <?php if($status==1){echo "selected";}?> value="1">Active</option>
                        <option <?php if($status==0){echo "selected";}?> value="0">Deactivate</option>
                    </select>
					</div>
					<br>
					  <div class="btn-group" style="padding-left:0">
				<button type="submit" name="save" class="btn btn-primary">Save</button>
				<button type="submit" name = "cancel" class="btn btn-warning ">Cancel</button>
				<br>
				</div>
					
					  </div>
					</div>
					
					<div class="panel panel-default">
  <div class="panel-heading">Change Password</div>
  <div class="panel-body">
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
					<div class="col-lg-3">
					  <button type="submit" name="chpass" class="btn btn-primary">Update Password</button>
					  
					</div>
  </div>
</div>

<?php echo form_close();?>
<?php endif;?>

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
