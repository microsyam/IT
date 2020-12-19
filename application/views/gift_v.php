<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mohamed Syam">

    <title>Gift Cards| <?php echo $userdata[0]['s_name'];?></title>

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
				<?php echo form_open('Gift');?>
                    <div class="col-lg-12">
                        <h1 class="page-header">Gift Card</h1>
						<div class="panel panel-default">
                <div class="panel-heading">Card Information</div>
                <div class="panel-body">
				
                 <div class="form-group">
				 
				  <label  class="col-lg-2">Partner</label>
					<div class="col-lg-3">
					  <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="partner"  >
                        <?php
                        if (count($partners)>=1) {
                            echo '<option disabled selected></option>';
                            foreach ($partners as $u):
                                echo "<option   value ='$u->gp_id'>" . $u->gp_name . "</option>";
                            endforeach;
                        }
                        ?>
						
                    </select>
					</div>
					<br>
					<br>
					<label  class="col-lg-2">Gift Code</label>
					<div class="col-lg-2">
					  <input type="text" class="form-control"  name="gift_code">
					  
					</div>
					
					
					
					<div class="col-lg-3">
					  <button type="submit" name="check" class="btn btn-primary center-block">Check</button>
					  
					</div>
				</div>
					
				
						   
                    
                </div>
									
                </div>
				
				<?php if($card_info!=false):?>
				<div class="panel panel-default">
				<div class="panel-heading">Card Details</div>
                <div class="panel-body">
				<label  class="col-lg-2">Discount Type: <?php echo $card_info[0]['gift_name'];?></label>
				<label  class="col-lg-2">Code: <?php echo $card_info[0]['gift_code'];?></label>
				<label  class="col-lg-2">Partner:<?php echo $card_info[0]['gp_name'];?></label>
				
				<?php if($card_info[0]['gift_active']==1):?>
				<label  class="col-lg-2">Status: <span style="color:red;font-weight:900;">Redeemed</span></label>
				<label  class="col-lg-2">Date: <span style="color:red;font-weight:900;"><?php echo $card_info[0]['gift_date'];?></span></label>
				<label  class="col-lg-2">By: <span style="color:red;font-weight:900;"><?php echo $card_info[0]['u_name'];?></span></label>
				
				<?php elseif($card_info[0]['gift_active']==0):?>
				<button type="submit" name="redeem" value="<?php echo $card_info[0]['gift_id'];?>" class="btn btn-success center-block col-lg-1">Redeem</button>
				<?php endif;?>
				
				</div>
				</div>
				
				<?php endif;?>
				<?php if(isset($_POST["check"]) && $card_info==false):?>
				<?php echo "Invalid Card";?>
				<?php endif;?>
            </div>
			<?php echo form_close();?>
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
