<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mohamed Syam">

    <title>Transfer | <?php echo $userdata[0]['s_name'];?></title>

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
                        <h1 class="page-header">Transfer In - Out</h1>
						<?php if($this->session->flashdata('error')): ?>
                <div class="alert alert-warning">
                    <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php endif;?>
			<?php if($this->session->flashdata('done')): ?>
                <div class="alert alert-success">
                    <strong>Success!</strong> <?php echo $this->session->flashdata('done'); ?>
                </div>
            <?php endif;?>
						<?php $ver=array('id'=>'try','name'=>'try','class'=>'form-horizontal'); ?>
						<?php echo form_open('Transfer/process',$ver);?>
						<div class="panel panel-default">
                <div class="panel-heading">Warehouse </div>
                <div class="panel-body">
				
           <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="warehouse" required id="warehouse" onchange="[document.try.action='Transfer',document.try.submit()]">
                        <?php
                        if (count($warehouse)>1) {
							echo "<option disabled selected>Select Warehouse</option>";
                            foreach ($warehouse as $u):
                                echo "<option   value ='$u->w_id'>" . $u->w_name . "</option>";
                            endforeach;
                        }else{
							 foreach ($warehouse as $u):
                                echo "<option   value ='$u->w_id'>" . $u->w_name . "</option>";
                            endforeach;
						}
                        ?>
						
                    </select>
					<?php if(count($warehouse)==1):?>
					<button type="submit" name ="cancel" class="btn btn-warning">Cancel</button>
				  <?php endif;?>
                </div>
                </div>
				<?php if (count($warehouse)==1):?>
				<div class="panel panel-default">
			  <div class="panel-heading">Item</div>
			  <div class="panel-body">
			  <div class="col-lg-2">
				<select class="selectpicker" data-show-subtext="true" data-live-search="true" name="item"  id="item" >
				<?php
				if (count($warehouse)==1) {
					echo "<option disabled  selected>Select Item</option>";
					foreach ($items as $d):
						echo "<option   value ='$d->s_id'>" . $d->s_name . "</option>";
					endforeach;
				}
				?>
				
				</select>
				</div>
				<div class="col-lg-2">
				<select class="selectpicker" data-show-subtext="true" data-live-search="true" name="type"  id="type" >
				<option selected disabled>Transafer type</option>
				<option value="in">Transfer IN</option>
				<option value="out">Transfer OUT</option>
				</select>
				</div>
				<br>
				<br>
				<br>
				
				<div id="in" style="display:none">
				<div class="col-lg-2">
				<select class="selectpicker" data-show-subtext="true" data-live-search="true" name="vendor"  id="vendor" >
				<?php
				if (count($vendors)>=1) {
					echo "<option disabled  selected>Select Vendor</option>";
					
					foreach ($vendors as $v):
						echo "<option   value ='$v->v_id'>" . $v->v_name . "</option>";
					endforeach;
				}
				?>
				
				</select>
				</div>
				
					<div class="col-lg-2">
					  <input type="text"  class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Quantity" name="qtyin">
					  
					</div>
					<br>
					<br>
					<br>
					<br>
					<div class="col-lg-2">
				<label for="details" class="col-lg-2">Details</label>
				</div>
					<div class="col-lg-5">
					  <textarea   class="form-control" dir="ltr" style="width:100%" name="detailsin"></textarea>
					  
					</div> 
					<br>
					<br>
					<br>
					<br>
					<div class="col-lg-2">
					<button type="submit" name ="in" class="btn btn-primary">Submit</button>
					</div>
				</div>
				
				
				<div id="out" style="display:none">
				<div class="col-lg-2">
				<label for="qtyin" class="col-lg-2">Quantity</label>
				</div>
					<div class="col-lg-2">
					  <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control"  name="qtyout">
					  
					</div> 
					<br>
					<br>
					<br>
					<div class="col-lg-2">
				<label for="details" class="col-lg-2">Details</label>
				</div>
					<div class="col-lg-5">
					  <textarea   class="form-control" dir="ltr" style="width:100%" name="details"></textarea>
					  
					</div> 
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<div class="col-lg-2">
					<label for="computers" class="col-lg-2">To</label>
					</div>
					<div class="col-lg-2">
					<select class="selectpicker" data-show-subtext="true" data-live-search="true" name="computers"  id="computers" >
				<?php
				if (count($employees)>=1) {
					echo "<option disabled  selected> Select User</option>";
					foreach ($employees as $d):
						echo "<option   value ='$d->e_id'>" . $d->e_name . "</option>";
					endforeach;
				}
				?>
				
				</select>
				</div>
					<div class="col-lg-2">
					<button type="submit" name ="out" class="btn btn-primary">Submit</button>
					</div>
				
				</div>
				
				
			  </div>
			</div>
			<?php endif;?>
			<?php echo form_close();?>
		
				
                
				
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


<script>
$(document).ready(function(){
    $('#type').on('change', function() {
      if ( this.value == 'in')
      {
        $("#in").show();
		$("#out").hide();
      }
      else
      {
		  $("#in").hide();
        $("#out").show();
      }
    });
});

</script>



<script src="<?php echo base_url();?>js/bootstrap-select.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url();?>js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url();?>js/startmin.js"></script>


</body>

</html>
