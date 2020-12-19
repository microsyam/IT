<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mohamed Syam">

    <title>Transactions | <?php echo $userdata[0]['s_name'];?></title>

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
                <h1 class="page-header">Transactions </h1>
            </div>
        </div>

        <!-- ... Your content goes here ... -->
        <?php echo form_open('Transactions/search');?>

        <label> Item
            <br>
            <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="item">
                <?php
                if (count($items)>1) {
                    echo '<option selected></option>';
                    foreach ($items as $u):
                        echo "<option  value ='$u->s_id'>" . $u->s_name . "  |  " .$u->w_name."</option>";
                    endforeach;
                }
                elseif(count($items)==1){
                    foreach ($items as $u):
                        echo "<option selected value ='$s->u_id'>" . $u->s_name . "  |  " . $u->w_name. "</option>";
                    endforeach;
                }
                ?>
            </select>
        </label>
        <label> Warehouse
            <br>
            <select class="selectpicker" data-show-subtext="true" data-live-search="true"  name="warehouse">
                <?php
                if (count($warehouses)>1) {
                    echo '<option selected></option>';
                    foreach ($warehouses as $c):
                        echo "<option  value ='$c->w_id'>" . $c->w_name . "</option>";
                    endforeach;
                }
                elseif(count($warehouses)==1){
                    echo '<option selected></option>';
                    foreach ($warehouses as $c):
                        echo "<option  value ='$c->w_id'>" . $c->w_name . "</option>";
                    endforeach;
                }
                ?>
            </select>
        </label> 
		<label> Vendor
            <br>
            <select class="selectpicker" data-show-subtext="true" data-live-search="true"  name="vendors">
                <?php
                if (count($vendors)>1) {
                    echo '<option selected></option>';
                    foreach ($vendors as $d):
                        echo "<option  value ='$d->v_id'>" . $d->v_name . "</option>";
                    endforeach;
                }
                elseif(count($vendors)==1){
                    echo '<option selected></option>';
                    foreach ($vendors as $d):
                        echo "<option  value ='$d->v_id'>" . $d->v_name . "</option>";
                    endforeach;
                }
                ?>
            </select>
        </label> 
		<label> Transafer
            <br>
            <select class="selectpicker" data-show-subtext="true" data-live-search="true"  name="transafer">
                
                   <option selected></option>
                   <option value="IN">IN</option>
                   <option value="OUT">OUT</option>
                
            </select>
        </label>
        <label>From Date
            <input type="date" class="form-control"   name="from"/>
        </label>
        <label>To Date
            <input type="date" class="form-control" name="to" />
        </label>
        <button type="submit" class="btn btn-info" name="search">Search</button>
		<button type="submit" class="btn btn-info" name="excel">Excel</button>
        <?php echo form_close();?>
        <table   class="table table-condensed table-bordered table-striped" >
            <thead>
            <tr>

               
                <th >Item</th>
                <th >Qty</th>
				<th>Transfer</th>
                <th >Date and time</th>
                <th >Submitted by</th>
				<th >Transfer to</th>
				<th>Vendor</th>
				<th>Details</th>
				
                
            </tr>
            </thead>
            <?php if(!empty($tabledata)):?>
                <?php foreach($tabledata as $row):?>
                    <?php echo '<tr>'; ?>
                    <?php echo '<td>'.$row->s_name .'</td>';?>
                    <?php echo '<td>'.$row->st_qty.'</td>';?>
                    <?php echo '<td>'.$row->s_status .'</td>';?>
                    <?php echo '<td>'.$row->s_date .'</td>';?>
                    <?php echo '<td>'.$row->u_name .'</td>';?>
                    <?php echo '<td>'.$row->e_name .'</td>';?>
                    <?php echo '<td>'.$row->v_name .'</td>';?>
                    <?php if(!empty($row->s_details)){ echo '<td><a href="'.base_url()."transactions/details/".$row->st_id.'" target="_blank">Click Here</a></td>';}?>
				 
                    <?php echo '</tr>'; ?>
                <?php endforeach ; ?>
            <?php endif;?>
        </table>
        <center><ul class="pagination">
                <?php foreach ($links as $link) {
                    echo "<li>". $link."</li>";
                } ?>
            </ul></center>
    </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
 <script src="<?php echo base_url();?>js/bootstrap-select.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url();?>js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url();?>js/startmin.js"></script>

</body>

</html>
