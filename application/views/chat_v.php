<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Assign A Job | <?php echo $userdata[0]['s_name'];?></title>

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
                        <h1 class="page-header"><?php if($priv[0]['p_assign_task']==1){echo "Assign A Task";}else{echo "My Tasks";}?></h1>
						<div class="panel panel-default">
						<?php if($priv[0]['p_assign_task']==1):?>
                <div class="panel-heading">New Task </div>
                <div class="panel-body">
				<?php echo form_open('AssignTask/save');?>
                 <div class="form-group">
				 <label class="col-lg-1"> Assign To  </label>
                    
                    <select class="selectpicker col-lg-2" data-show-subtext="true" data-live-search="true"  name="select_user" id="select_user" >
                        <?php
                        if (count($user_result)>=0) {
                            echo '<option value="0" selected> Anyone</option>';
                            foreach ($user_result as $u):
                                echo "<option   value ='$u->u_id'>" . $u->u_name . "</option>";
                            endforeach;
                        }
                    
                        ?>
						
                    </select>
					<br>
					<br>
					<br>
					<label class="col-lg-1"> Service</label>
                    
                    <select class="selectpicker col-lg-2" data-show-subtext="true" data-live-search="true"  name="service" id="service" >
                        <?php
                        if (count($services)>=0) {
                           foreach ($services as $u):
                                echo "<option   value ='$u->s_id'>" . $u->s_name . "</option>";
                            endforeach;
                        }
                    
                        ?>
						
                    </select>
					<br>
					<br>
					<br>
				 </div>
                 <div class="form-group">
				 
				 
				     
				  <label for="message" class="col-lg-1">Task Details </label>
					<div class="col-lg-3">
					  <textarea type="text" style="height:170px; width:600px;"  required class="form-control" name="message"></textarea>
					  <br>
					  <br>
					    <button type="submit" class="btn btn-primary ">Submit</button>
					</div>
					
					
				</div>
				
		
				
						   <?php echo form_close();?>
                    
                </div><!--customer panel-Body-->
				<?php endif;?>
				<?php if(!empty($messages)) :?>
                <div class="panel-heading">Current Tasks</div>
				
                <div class="panel-body">

                    <div id="education_fields">

                    <div class="col-sm-12 nopadding" style="padding-left:10%;padding-right:10%;">
					<?php foreach($messages as $row):?>
					
				 <div class="panel panel-primary">
				  <div class="panel-heading"><?php if ($row->c_u_id ==$userdata[0]['u_id']){echo "You";}else {echo $row->c_u_name;}?>  assigned  <?php if ($row->c_u_to_id ==$userdata[0]['u_id']){echo "You";}else{echo $row->c_u_to_name;}?> |  <?php echo $row->c_date;?></div>
				  <div class="panel-body"><?php echo $row->c_message;?> </div>
				  
				  <div class="panel-body" align="left">
				  <?php echo form_open('AssignTask/done');?>
				  <button type="submit"  name="done"  value="<?php echo $row->c_id;?>" class="btn btn-primary">Done</button>
				 <?php echo form_close();?>
				  </div>
				</div>
				<?php endforeach ; ?>
	
	
	
				</div>
		
		     <center><ul class="pagination">
                <?php foreach ($links as $link) {
                    echo "<li>". $link."</li>";
                } ?>
            </ul></center>
				
	
                    </div>
                    <div class="clear"></div>
                    </div>
					
					<?php endif;?>
					
                </div>
				
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
