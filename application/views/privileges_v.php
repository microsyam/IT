<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Privilages | <?php echo $userdata[0]['s_name'];?></title>

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
                        <h1 class="page-header">Privilages</h1>
						<?php if($this->session->flashdata('done')): ?>
                <div class="alert alert-success">
                    <strong>Success!</strong> <?php echo $this->session->flashdata('done'); ?>
                </div>
            <?php endif;?>
						<div class="panel panel-default">
                <div class="panel-heading">Select User</div>
                <div class="panel-body">
                    <div class="col-xs-3">
					
					
            <!-- ... Your content goes here ... -->
			 <?php
            $attr=array('id'=>'block','name'=>'try');
            ?>
			
					<?php echo form_open("Privileges/update",$attr);?>
                             <select name="select_user" class="selectpicker" data-show-subtext="true" data-live-search="true" id="select_user"  onchange="[document.try.action='Privileges',document.try.submit()]">
                <?php
                if (count($p_data)>1) {
                    echo '<option selected ></option>';
                    foreach ($p_data as $p):
                        echo "<option  value ='$p->u_id'>" . $p->u_name . "</option>";
                    endforeach;
                }
                elseif(count($p_data)==1 and isset($_POST["select_user"])){
                    foreach ($p_data as $p):
                        echo "<option selected value ='$p->u_id'>" . $p->u_name . "</option>";
                    endforeach;
                }else{
					echo '<option selected ></option>';
					foreach ($p_data as $p):
                        echo "<option  value ='$p->u_id'>" . $p->u_name . "</option>";
                    endforeach;
				}

                ?>
            </select>	
                    </div>
                    </div>
					
                    
                </div><!--customer panel-Body-->
				<?php if(isset($_POST["select_user"])):?>
				
				<div class="panel panel-default">
				  <div class="panel-heading">IT</div>
				  <div class="panel-body">
				  <div class="col-sm-9 nopadding"  style="padding-left:25%;">
				  <li class="list-group-item">
                        View Computers
                        <div class="material-switch pull-right">
                            <input id="viewcomputers" name="viewcomputers" value="1" <?php if ($pri[0]['p_view_computers']==1){echo "checked";}?> type="checkbox"/>
                            <label for="viewcomputers" class="label-primary"></label>
                        </div>
                    </li>
					<li class="list-group-item">
                        Add Computer
                        <div class="material-switch pull-right">
                            <input id="newcomputer" name="newcomputer" value="1" <?php if ($pri[0]['p_add_computer']==1){echo "checked";}?> type="checkbox"/>
                            <label for="newcomputer" class="label-primary"></label>
                        </div>
                    </li>
					<li class="list-group-item">
                        Edit Computer
                        <div class="material-switch pull-right">
                            <input id="editcomputer" name="editcomputer" value="1" <?php if ($pri[0]['p_edit_computer']==1){echo "checked";}?> type="checkbox"/>
                            <label for="editcomputer" class="label-primary"></label>
                        </div>
                    </li>
					
					</div>
				  </div>
				</div> <!--  End -->
				
				
				<div class="panel panel-default">
				  <div class="panel-heading">Employees</div>
				  <div class="panel-body">
				  <div class="col-sm-9 nopadding"  style="padding-left:25%;">
				  <li class="list-group-item">
                        New Employee
                        <div class="material-switch pull-right">
                            <input id="addemp" name="addemp" value="1" <?php if ($pri[0]['p_new_emp']==1){echo "checked";}?> type="checkbox"/>
                            <label for="addemp" class="label-primary"></label>
                        </div>
                    </li>
					<li class="list-group-item">
                        Edit Employee
                        <div class="material-switch pull-right">
                            <input id="editemp" name="editemp" value="1" <?php if ($pri[0]['p_edit_emp']==1){echo "checked";}?> type="checkbox"/>
                            <label for="editemp" class="label-primary"></label>
                        </div>
                    </li>
					<li class="list-group-item">
                        Custodies
                        <div class="material-switch pull-right">
                            <input id="custodies" name="custodies" value="1" <?php if ($pri[0]['p_custodies']==1){echo "checked";}?> type="checkbox"/>
                            <label for="custodies" class="label-primary"></label>
                        </div>
                    </li>
					<li class="list-group-item">
                        Operations
                        <div class="material-switch pull-right">
                            <input id="Operations" name="Operations" value="1" <?php if ($pri[0]['p_operation']==1){echo "checked";}?> type="checkbox"/>
                            <label for="Operations" class="label-primary"></label>
                        </div>
                    </li>
					
					
					</div>
				  </div>
				</div> <!--  End -->
				
				
				
				<div class="panel panel-default">
				  <div class="panel-heading">Stock</div>
				  <div class="panel-body">
				  <div class="col-sm-9 nopadding"  style="padding-left:25%;">
				  <li class="list-group-item">
                        Stock Board
                        <div class="material-switch pull-right">
                            <input id="stockboard" name="stockboard" value="1" <?php if ($pri[0]['p_stock_board']==1){echo "checked";}?> type="checkbox"/>
                            <label for="stockboard" class="label-primary"></label>
                        </div>
                    </li>
					<li class="list-group-item">
                        Add and remove items
                        <div class="material-switch pull-right">
                            <input id="item" name="item" value="1" <?php if ($pri[0]['p_manage_items']==1){echo "checked";}?> type="checkbox"/>
                            <label for="item" class="label-primary"></label>
                        </div>
                    </li>
					<li class="list-group-item">
                        Transfer
                        <div class="material-switch pull-right">
                            <input id="stocktrans" name="stocktrans" value="1" <?php if ($pri[0]['p_make_transaction']==1){echo "checked";}?> type="checkbox"/>
                            <label for="stocktrans" class="label-primary"></label>
                        </div>
                    </li>
					<li class="list-group-item">
                        Report
                        <div class="material-switch pull-right">
                            <input id="stockreport" name="stockreport" value="1" <?php if ($pri[0]['p_report']==1){echo "checked";}?> type="checkbox"/>
                            <label for="stockreport" class="label-primary"></label>
                        </div>
                    </li>
					<li class="list-group-item">
                        Gift Cards
                        <div class="material-switch pull-right">
                            <input id="giftcards" name="giftcards" value="1" <?php if ($pri[0]['p_gift_redeem']==1){echo "checked";}?> type="checkbox"/>
                            <label for="giftcards" class="label-primary"></label>
                        </div>
                    </li>
					
					</div>
				  </div>
				</div> <!--  End -->
				
				
				<div class="panel panel-default">
				  <div class="panel-heading">System Settings</div>
				  <div class="panel-body">
				  <div class="col-sm-9 nopadding"  style="padding-left:25%;">
				  
				 
					<li class="list-group-item">
                         Create User
                        <div class="material-switch pull-right">
                            <input id="createuser" name="createuser" value="1" <?php if ($pri[0]['p_add_user']==1){echo "checked";}?> type="checkbox"/>
                            <label for="createuser" class="label-primary"></label>
                        </div>
                    </li>
					<li class="list-group-item">
                         Vendors
                        <div class="material-switch pull-right">
                            <input id="vendors" name="vendors" value="1" <?php if ($pri[0]['p_vendors']==1){echo "checked";}?> type="checkbox"/>
                            <label for="vendors" class="label-primary"></label>
                        </div>
                    </li>
					<li class="list-group-item">
                        OP Classes
                        <div class="material-switch pull-right">
                            <input id="OpClass" name="OpClass" value="1" <?php if ($pri[0]['p_op_class']==1){echo "checked";}?> type="checkbox"/>
                            <label for="OpClass" class="label-primary"></label>
                        </div>
                    </li>
					<li class="list-group-item">
                         Warehouses
                        <div class="material-switch pull-right">
                            <input id="warehouses" name="warehouses" value="1" <?php if ($pri[0]['p_warehouses']==1){echo "checked";}?> type="checkbox"/>
                            <label for="warehouses" class="label-primary"></label>
                        </div>
                    </li>
					<li class="list-group-item">
                         Edit User
                        <div class="material-switch pull-right">
                            <input id="edituser" name="edituser" value="1" <?php if ($pri[0]['p_edit_user']==1){echo "checked";}?> type="checkbox"/>
                            <label for="edituser" class="label-primary"></label>
                        </div>
                    </li>
					
					<li class="list-group-item">
                        Privileges
                        <div class="material-switch pull-right">
                            <input id="Privileges" name="Privileges" value="1" <?php if ($pri[0]['p_privilages']==1){echo "checked";}?> type="checkbox"/>
                            <label for="Privileges" class="label-primary"></label>
                        </div>
                    </li>
					
					<li class="list-group-item">
                         Add/Remove Departments
                        <div class="material-switch pull-right">
                            <input id="depart" name="depart" value="1" <?php if ($pri[0]['p_departments']==1){echo "checked";}?> type="checkbox"/>
                            <label for="depart" class="label-primary"></label>
                        </div>
                    </li>
					
					<li class="list-group-item">
                         System Settings
                        <div class="material-switch pull-right">
                            <input id="settings" name="settings" value="1" <?php if ($pri[0]['p_general']==1){echo "checked";}?> type="checkbox"/>
                            <label for="settings" class="label-primary"></label>
                        </div>
                    </li>
				  
				  </div>
				  </div>
				</div> <!-- End-->
				
				
				<div class="panel panel-default">
			  <div class="panel-heading">Ticket System</div>
			  <div class="panel-body">
			   <div class="col-sm-9 nopadding"  style="padding-left:25%;">
			   
			   	<li class="list-group-item">
                        Open Ticket
                        <div class="material-switch pull-right">
                            <input id="openticket" name="openticket" value="1" <?php if ($pri[0]['p_open_ticket']==1){echo "checked";}?> type="checkbox"/>
                            <label for="openticket" class="label-primary"></label>
                        </div>
                    </li>
					<li class="list-group-item">
                        View Tickets
                        <div class="material-switch pull-right">
                            <input id="viewtickets" name="viewtickets" value="1" <?php if ($pri[0]['p_view_tickets']==1){echo "checked";}?> type="checkbox"/>
                            <label for="viewtickets" class="label-primary"></label>
                        </div>
                    </li>
					
					 <li class="list-group-item">
                         Assign to see his/her tickets only
                        <div class="material-switch pull-right">
                            <input id="cust_tickets" name="cust_tickets" value="1" <?php if ($pri[0]['p_view_cust_tickets']==1){echo "checked";}?> type="checkbox"/>
                            <label for="cust_tickets" class="label-primary"></label>
                        </div>
                    </li>
					
					
					<li class="list-group-item">
                        Ticket Cases
                        <div class="material-switch pull-right">
                            <input id="tickectcases" name="tickectcases" value="1" <?php if ($pri[0]['p_ticket_cases']==1){echo "checked";}?> type="checkbox"/>
                            <label for="tickectcases" class="label-primary"></label>
                        </div>
                    </li>
					
					
			  </div>
			  </div>
			</div> <!-- end -->
			
			<div class="panel panel-default">
		  <div class="panel-heading">Tasks And Activities</div>
		  <div class="panel-body">
		  <div class="col-sm-9 nopadding"  style="padding-left:25%;">
		  <li class="list-group-item">
                        Completed Task
                        <div class="material-switch pull-right">
                            <input id="newtask" name="newtask" value="1" <?php if ($pri[0]['p_new_task']==1){echo "checked";}?> type="checkbox"/>
                            <label for="newtask" class="label-primary"></label>
                        </div>
                    </li>
					<li class="list-group-item">
                        Assign\Display Tasks
						<br>[Display His/Her Tasks Only - Use The Next Privilege To grant him assign a task to another user ]
                        <div class="material-switch pull-right">
                            <input id="easyshare" name="easyshare" value="1" <?php if ($pri[0]['p_easy_share']==1){echo "checked";}?> type="checkbox"/>
                            <label for="easyshare" class="label-primary"></label>
                        </div>
                    </li>
					
					<li class="list-group-item">
                       Diaplay All Assigned User Tasks
                        <div class="material-switch pull-right">
                            <input id="seealltasks" name="seealltasks" value="1" <?php if ($pri[0]['p_cust_task']==1){echo "checked";}?> type="checkbox"/>
                            <label for="seealltasks" class="label-primary"></label>
                        </div>
                    </li>
					
					<li class="list-group-item">
                        Assign Task To Another user
                        <div class="material-switch pull-right">
                            <input id="asstask" name="asstask" value="1" <?php if ($pri[0]['p_assign_task']==1){echo "checked";}?> type="checkbox"/>
                            <label for="asstask" class="label-primary"></label>
                        </div>
                    </li>
					
					<li class="list-group-item">
                        Add And Remove Service
                        <div class="material-switch pull-right">
                            <input id="newservice" name="newservice" value="1" <?php if ($pri[0]['p_new_service']==1){echo "checked";}?> type="checkbox"/>
                            <label for="newservice" class="label-primary"></label>
                        </div>
                    </li>
					<li class="list-group-item">
                        Activity Report 
                        <div class="material-switch pull-right">
                            <input id="actvityreport" name="actvityreport" value="1" <?php if ($pri[0]['p_activity_report']==1){echo "checked";}?> type="checkbox"/>
                            <label for="actvityreport" class="label-primary"></label>
                        </div>
                    </li>
					<li class="list-group-item">
                        Assign to sees his/her Activity Report only
                        <div class="material-switch pull-right">
                            <input id="custtask" name="custtask" value="1" <?php if ($pri[0]['p_cust_activity_report']==1){echo "checked";}?> type="checkbox"/>
                            <label for="custtask" class="label-primary"></label>
                        </div>
                    </li>
		  
		  </div>
		  </div>
		</div>


				<div class="btn-group" style="padding-left:40%">
				<button type="submit" class="btn btn-primary center-block">Save</button>
				<button type="submit" name = "cancel" class="btn btn-warning">cancel</button>
				<br>
				</div>
				<?php endif;?>
				</br>
				
				<?php echo form_close();?>
                <div class="panel-footer"> <small></small></div>
				
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
