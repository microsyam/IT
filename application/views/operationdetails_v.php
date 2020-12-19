<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mohamed Syam">

    <title>Operation | <?php echo $userdata[0]['s_name'];?></title>

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
                        <h1 class="page-header">Case Number #<?php echo $opdet['0']['op_id'];?></h1>
						
						<div class="panel panel-default">
                <div class="panel-heading">Header </div>
                <div class="panel-body">
				<?php echo form_open('Operations/Details/'.$opdet['0']['op_id']);?>
                 <div class="form-group">
				 <label class="col-lg-2">Name : <?php echo $opdet['0']['e_name'];?></label>
				 </br>
				 </br>
				 <label class="col-lg-6">Classification : <?php echo $opdet['0']['o_name'];?></label></br>
				 </br>
				 <label class="col-lg-2">Priority : <?php echo $opdet['0']['o_piriority'];?></label>
				</br>
				</br>
				 <label class="col-lg-2">Date : <?php echo $opdet['0']['o_date'];?></label>
				</br>
				</br>
				<label class="col-lg-2">Owner : <?php echo $opdet['0']['u_name'];?></label>
				 
				</br>
				</br>
				<label class="col-lg-2">Status : <?php echo $opdet['0']['o_status'];?></label>
				 <br>
				 <br>
				 <?php if($opdet['0']['o_status']!="Closed"){ echo'<button type="submit" name="closed" class="btn btn-primary">CLOSE</button>';}?>
				 <?php if($opdet['0']['o_status']!="Onhold"){ echo'<button type="submit" name="onhold" class="btn btn-warning">ONHOLD</button>';}?>
				 <?php if($opdet['0']['o_status']!="Opened"){ echo'<button type="submit" name="opened" class="btn btn-danger">OPEN</button>';}?>
					<br>
					
				 <h1 class="col-lg-9">[<?php echo $opdet['0']['o_subject'];?>]</h1>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					
					<label  class="col-lg-1">Comment direction</label>
					<div class="col-lg-2">
				
					  <select class="selectpicker" data-show-subtext="true" required data-live-search="true" name="direction"  >
                       <option value="0">From Employee</option>
                       <option value="1">From Support</option>
                    </select>
					</div>
					<br>
					<br>
					<br>
					<div class="col-lg-6">
					  <textarea type="text" class="form-control" rows="6" placeholder="Enter your comment here"  name="description"></textarea>
					  
					</div>
					<button type="submit" name="Save" class="btn btn-primary ">Submit</button>
					<br>
					
				</div>
				<?php echo form_close();?>
				</div>
				</div>
				
						   
                    
                </div><!--customer panel-Body-->
                </div>
				<div class="panel panel-default">
				<div class="panel-heading">Conversation & Comments </div>
               <div class="panel-body">
			   <table   class="table table-condensed table-bordered table-striped " >
            <thead>
            <tr>

               
                <th >From</th>
                <th >Comment</th>
                <th >Date</th>
                <th >By</th>
                
				
                
            </tr>
			</thead>
                <?php foreach($comments as $co):?>
                    <?php echo '<tr>'; ?>
                    <?php if ($co['o_direction_flag']==1){echo '<td>'.$co['u_name'] .'</td>';}else{echo '<td>'.$co['e_name'] .'</td>';}?>
                    <?php echo '<td>'.$co['o_description'] .'</td>';?>
                    <?php echo '<td>'.$co['od_date'] .'</td>';?>
                    <?php echo '<td>'.$co['u_name'] .'</td>';?>
					
                   
                <?php endforeach ; ?>
			</table>
			  
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
