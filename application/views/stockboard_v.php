<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mohamed Syam">

    <title>Stock Board | <?php echo $userdata[0]['s_name'];?></title>

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
                        <h1 class="page-header">Stock Board</h1>
						<?php $ver=array('id'=>'try','name'=>'try','class'=>'form-horizontal'); ?>
						<?php echo form_open('StockBoard',$ver);?>
						<div class="panel panel-default">
                <div class="panel-heading">Warehouse </div>
                <div class="panel-body">
				
           <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="plant" id="plant"  onchange="[document.try.action='StockBoard',document.try.submit()]">
                        <?php
                        if (count($plants)>1) {
                            echo '<option selected></option>';
                            foreach ($plants as $u):
                                echo "<option   value ='$u->w_id'>" . $u->w_name . "</option>";
                            endforeach;
                        }
                        elseif(count($plants)==1){
						echo '<option selected></option>';
                            foreach ($plants as $u):?>
							
							 <option <?php if($warehouse==$u->w_id){echo "selected";}?> value ="<?php echo $u->w_id;?>"> <?php echo $u->w_name;?></option>
							 <?php
                            endforeach;
                        }
                        ?>
						
                    </select>
					<?php if(count($plants)==1):?>
				<button type="submit" name ="cancel" class="btn btn-warning">Cancel</button>
				<button type="submit" class="btn btn-info" name="excel">Excel</button>
                    <?php endif;?>
                </div>
                </div>
		
			<?php echo form_close();?>
				<?php if(!empty($item)) :?>
				<div class="panel panel-default">
                <div class="panel-heading">Current Stock</div>
				
                <div class="panel-body">

                    <div id="education_fields">

                    <div class="col-sm-7 nopadding" style="padding-left:25%">
                          <table  align="center" class="table table-condensed table-bordered table-striped " >
            <thead>
            <tr>

                <th>Item</th>
                <th>Qty</th>
                
            </tr>
            </thead>
            
                <?php foreach($item as $row):?>
                    <?php echo '<tr>'; ?>
                    <?php echo '<td>'.$row->s_name .'</td>';?>
                    <?php echo '<td>'.$row->s_qty .'</td>';?>
					
                    <?php echo '</tr>'; ?>
                <?php endforeach ; ?>
           
			</table>

		     <center><ul class="pagination">
                <?php foreach ($links as $link) {
                    echo "<li>". $link."</li>";
                } ?>
            </ul></center>
				</div>
	
                    </div>
                    <div class="clear"></div>
                    </div>
					
					<?php endif;?>
					
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
