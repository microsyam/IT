<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mohamed Syam">

    <title>Custody Report| <?php echo $userdata[0]['s_name'];?></title>

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
                        <h1 class="page-header">Employee custody</h1>
						<?php if($this->session->flashdata('error')): ?>
                <div class="alert alert-warning">
                    <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php endif;?>
						<div class="panel panel-default">
                <div class="panel-heading">Employee </div>
                <div class="panel-body">
				
                 <div class="form-group">
				 <label class="col-lg-2">Name : <?php echo $empdata['0']['e_name'];?></label>
				 </br>
				 </br>
				 <label class="col-lg-2">Department : <?php echo $empdata['0']['d_name'];?></label></br>
				 </br>
				 <label class="col-lg-2">Code : <?php echo $empdata['0']['e_code'];?></label>
				</div>
					
				
						   <?php echo form_close();?>
                    
                </div><!--customer panel-Body-->
                </div>
				<div class="panel panel-default">
				<div class="panel-heading">Custody </div>
               <div class="panel-body">
			   <table   class="table table-condensed table-bordered table-striped " >
            <thead>
            <tr>

               
                <th >Item Name</th>
                <th >Qty</th>
				<th>Action</th>
                
				
                
            </tr>
			</thead>
			<?php echo form_open('Custodies\update');?>
                <?php foreach($empdata as $row):?>
                    <?php echo '<tr>'; ?>
                    <?php echo '<td>'.$row['s_name'] .'</td>';?>
                    <?php echo '<td>'.$row['c_qty'] .'</td>';?>
					<td width="20%">
					<div class="input-group">
		  <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="value<?php echo $row['c_id'];?>" class="form-control">
		  <span class="input-group-btn">
			<button type="submit" name="restore" value="<?php echo $row['c_id'];?>"class="btn btn-primary ">Restore</button>
			<button type="submit" name="notwork" value="<?php echo $row['c_id'];?>" class="btn btn-danger ">Displosable</button>
		  </span>
		</div>

					</td>
                   
                <?php endforeach ; ?>
           <?php echo form_close();?>
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
