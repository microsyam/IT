<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mohamed Syam">

    <title>Edit Employee | <?php echo $userdata[0]['s_name'];?></title>

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
                        <h1 class="page-header">Employee</h1>
						
						<div class="panel panel-default">
			  <div class="panel-heading">Details</div>
			  <div class="panel-body">
			  
			  <?php $ver=array('id'=>'try','name'=>'try','class'=>'form-horizontal'); ?>
                <?php echo form_open('EditEmp/update',$ver);?>
                
                    <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="select_emp" id="select_emp"  onchange="[document.try.action='EditEmp',document.try.submit()]">
                        <?php
                        if (count($employees)>1) {
                            echo '<option selected></option>';
                            foreach ($employees as $e):
                                echo "<option   value ='$e->e_id'>" . $e->e_name . "</option>";
                            endforeach;
                        }
                        elseif(count($employees)==1){
                            foreach ($employees as $e):
                                echo "<option selected  value ='$e->e_id'>" . $e->e_name . "</option>";
                            endforeach;
                        }
                        ?>
						
                    </select>
					
					
			  </div>
			</div>
			
			<?php if(count($employees)==1){
				$name=$e->e_name;
				$code=$e->e_code;
				$dep=$e->e_department_id;
				$status=$e->e_status;
			}else{
				$name='';
				$code='';
				$dep='';
				$status='';
			}
				
			
			
			?>
			
			<?php if(count($employees)==1):?>
						<div class="panel panel-default">
                <div class="panel-heading">Employee script </div>
                <div class="panel-body">
				
                 <div class="form-group">
				 
				  <label  class="col-lg-2">Name</label>
					<div class="col-lg-3">
					  <input type="text" class="form-control" value ="<?php  echo $name;?>" required name="ename">
					  
					</div>
					<br>
					<br>
					<label  class="col-lg-2">Code</label>
					<div class="col-lg-3">
					  <input type="text" class="form-control"  value ="<?php  echo $code;?>" name="code">
					  
					</div>
					<br>
					<br>
					<label  class="col-lg-2">Deparment</label>
					<div class="col-lg-3">
					  <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="department"  >
                        <?php if (count($deparments)>=1) :
                                foreach ($deparments as $u):?>
                                <option <?php if($dep==$u->d_id){echo "selected";}?> value ="<?php echo $u->d_id;?>" >  <?php echo $u->d_name;?> </option>
                          <?php  endforeach;
                         endif;?>
						
                    </select>
					</div>
					<br>
					<br>					
					<label  class="col-lg-2">Status</label>
					<div class="col-lg-3">
					  <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="status"  >
                        <option value="1" <?php if($status=="1"){echo "selected";}?> >Active</option>
                        <option value="0" <?php if($status=="0"){echo "selected";}?> >Deactivate</option>
						
                    </select>
					</div>
					<div class="col-lg-3">
					<br>
					
					<br>
					  <div class="btn-group" style="padding-left:0">
				<button type="submit" name ="save" class="btn btn-primary">Save</button>
				<button type="submit" name = "back" class="btn btn-warning ">cancel</button>
				<br>
				</div>
					</div>
				</div>
					
				
						   <?php echo form_close();?>
                    
                </div>
									
                </div>
				<?php endif;?>
				
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
