<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mohamed Syam">

    <title>Edit Computer | <?php echo $userdata[0]['s_name'];?></title>

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
                        <h1 class="page-header">Edit Computer</h1>
						
						<div class="panel panel-default">
			  <div class="panel-heading">Computer Name</div>
			  <div class="panel-body">
			  
			  <?php $ver=array('id'=>'try','name'=>'try','class'=>'form-horizontal'); ?>
                <?php echo form_open('EditComputer/update',$ver);?>
                
                    <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="select_computer" id="select_computer"  onchange="[document.try.action='EditComputer',document.try.submit()]">
                        <?php
                        if (count($computers)>1) {
                            echo '<option selected></option>';
                            foreach ($computers as $u):
                                echo "<option   value ='$u->p_id'>" . $u->p_name . "</option>";
                            endforeach;
                        }
                        elseif(count($computers)==1){
                            foreach ($computers as $u):
                                echo "<option selected  value ='$u->p_id'>" . $u->p_name . "</option>";
                            endforeach;
                        }
                        ?>
						
                    </select>
					
					
			  </div>
			</div>
			
			<?php if(count($computers)==1){
				$p_name=$u->p_name;
				$p_ip=$u->p_ip;
				$p_owner_id=$u->p_owner_id;
				$p_teamviewer=$u->p_teamviewer;
				$p_dep=$u->p_department;
			}else{
				$p_name='';
				$p_ip='';
				$p_owner='';
				$p_teamviewer='';
				$p_dep='';
			}
				
			
			
			?>
			
			<?php if(count($computers)==1):?>
						<div class="panel panel-default">
                <div class="panel-heading">Computer Specifications </div>
                <div class="panel-body">
				
                 <div class="form-group">
				 
				  <label  class="col-lg-2">Computer Name</label>
					<div class="col-lg-3">
					  <input type="text" class="form-control" value ="<?php  echo $p_name;?>" required name="pcname">
					  
					</div>
					<br>
					<br>
					<label  class="col-lg-2">IP Address</label>
					<div class="col-lg-3">
					  <input type="text" class="form-control"  value ="<?php  echo $p_ip;?>" name="ip">
					  
					</div>
					<br>
					<br>
					<label  class="col-lg-2">Full User Name</label>
					<div class="col-lg-3">
					  <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="employee"  >
                        <?php if (count($employees)>=1) :
                                foreach ($employees as $e):?>
                                <option <?php if($p_owner_id==$e->e_id){echo "selected";}?> value ="<?php echo $e->e_id;?>" >  <?php echo $e->e_name;?> </option>
                          <?php  endforeach;
                         endif;?>
						
                    </select>
					</div>
					<br>
					<br>
					<label  class="col-lg-2">Team Viewer</label>
					<div class="col-lg-3">
					  <input type="text" class="form-control" value ="<?php  echo $p_teamviewer;?>"  name="teamviewer">
					  
					</div>
					<br>
					<br>
					<label  class="col-lg-2">Deparment</label>
					<div class="col-lg-3">
					  <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="department"  >
                        <?php if (count($deparments)>=1) :
                                foreach ($deparments as $u):?>
                                <option <?php if($p_dep==$u->d_id){echo "selected";}?> value ="<?php echo $u->d_id;?>" >  <?php echo $u->d_name;?> </option>
                          <?php  endforeach;
                         endif;?>
						
                    </select>
					</div>
					<div class="col-lg-3">
					<br>
					<br>
					<br>
					<br>
					  <div class="btn-group" style="padding-left:0">
				<button type="submit" class="btn btn-primary">Save</button>
				<button type="submit" name ="del" class="btn btn-danger">Delete</button>
				<button type="submit" name = "back" class="btn btn-warning ">cancel</button>
				<br>
				</div>
					</div>
				</div>
					
				
						   <?php echo form_close();?>
                    
                </div>
									
                </div>
				<?php endif;?>
				
                <div class="panel-footer"> <small> </small></div>
				
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
