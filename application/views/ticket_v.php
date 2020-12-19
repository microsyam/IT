<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mohamed Syam">

    <title>Ticket | <?php echo $userdata[0]['s_name'];?></title>

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
                        <h1 class="page-header">Ticket</h1>
						<div class="panel panel-default">
                <div class="panel-heading">Ticket Details </div>
                <div class="panel-body">
				
                 <div class="form-group">
				
				  <label for="name" class="col-lg-2">User Name :</label>
					<div class="col-lg-3">
					  <p> <?php echo $ticket_data['0']['t_u_name'];?> </p>
					  
					</div>
					</br>
					<br>
					<label for="name" class="col-lg-2">Date\Time:</label>
					<div class="col-lg-3">
					  <p> <?php echo $ticket_data['0']['t_date'];?> </p>
					  
					</div>
					<br>
					<br>
					<label for="name" class="col-lg-2">Status :</label>
					<div class="col-lg-3">
					  <p> <?php if($ticket_data['0']['t_status']==0){echo "Open";}else{echo "Closed";}?></p>
					  
					</div>
					<br>
					<br>
					<label for="name" class="col-lg-2">Ticket Type :</label>
					<div class="col-lg-3">
					  <p><?php echo $ticket_data['0']['t_t_name'];?> </p>
					  
					</div>
					<br>
					<br>
					<label for="name" class="col-lg-2">Details :</label>
					<div class="col-lg-3">
					  <p><?php echo $ticket_data['0']['t_message'];?></p>
					  
					</div>
					<br>
					<div class="col-lg-3">
					<?php if($ticket_data['0']['t_status']==0):?>
					<?php echo form_open('Ticket/Solved');?>
					  <button type="submit" name="solved" value="<?php echo $ticket_data['0']['t_id'];?>" class="btn btn-primary center-block">Solved</button>
					 <?php echo form_close();?>
					  <?php endif;?>
					</div>
				</div>
					
				
						   
                    
                </div><!--customer panel-Body-->
				<?php if($ticket_data['0']['t_status']==0):?>
				 <div class="panel-heading">Reply</div>
				  <div class="panel-body">
				  <div id="education_fields">
                    <div class="col-sm-7 nopadding" >
					<?php echo form_open('Ticket/reply');?>
					<div class="input-group" style="padding-left:40%">
                                    <textarea type="text" style="width:600px;height:150px;" required class="form-control total"  name="reply" placeholder="..." ></textarea>
								
                            </div>
							<div style="padding-left:50%">
							<br>
							<button type="submit" class="btn btn-primary center-block">Reply</button>
							</div>
							<?php echo form_close();?>
					</div>
					</div>
				  </div>
				  
				  <?php endif;?>
				  <?php if (!empty($replies)):?>
                <div class="panel-heading">Replies</div>
				
                <div class="panel-body">

                    <div id="education_fields">

                    
						
						
								<?php foreach($replies as $row):?>
	
					

						<div class="col-sm-12">
						<div class="panel panel-default">
						<div class="panel-heading">
						<?php echo'<strong>'.$row->t_u_name.'</strong> <span class="text-muted">'.$row->t_date.'</span>
						</div>';?>
						
						<div class="panel-body">
						<?php echo $row->t_reply ;?>
						</div>
						</div>
						</div>
						
						<?php endforeach;?>
						
						

				
	 
			
			
                    </div>
                    <div class="clear"></div>
                    </div>
					<center><ul class="pagination">
                <?php foreach ($links as $link) {
                    echo "<li>". $link."</li>";
                } ?>
            </ul></center>
				
					
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
