<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a href="<?php echo base_url(); ?>">

			<img style="padding-left:10px" height="50px" alt="<?php echo $userdata[0]['s_name'];?>"
				 src="<?php echo base_url() . 'images/' . $userdata[0]['s_logo']; ?>"/> <!--class="navbar-brand"-->

		</a>
	</div>
	<!-- /.navbar-header -->

	<ul class="nav navbar-top-links navbar-right">

		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
				<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
			</a>
			<ul class="dropdown-menu dropdown-user">
				<li><a href="#"><i class="fa fa-user fa-fw"></i> <?php echo $userdata[0]['u_name']; ?></a>
				</li>

				<li class="divider"></li>
				<li><a href="<?php echo base_url(); ?>MyAccount"><i class="glyphicon glyphicon-cog"></i> My Account</a>
				<li><a href="<?php echo base_url(); ?>logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
				</li>
			</ul>
			<!-- /.dropdown-user -->
		</li>
		<!-- /.dropdown -->
	</ul>
	<!-- /.navbar-top-links -->

	<div class="navbar-default sidebar" role="navigation">
		<div class="sidebar-nav navbar-collapse">
			<ul class="nav" id="side-menu">

				<li>
					<a href="<?php echo base_url(); ?>Dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
				</li>


				<?php if ($priv[0]['p_view_computers'] + $priv[0]['p_add_computer'] + $priv[0]['p_edit_computer'] !== 0): ?>
					<!--Start-->
					<li>
						<a href="#"><i class="fa fa fa-desktop"></i> Computers<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<?php if ($priv[0]['p_view_computers'] == 1): ?>
								<li>
									<a href="<?php echo base_url(); ?>Computers">Search</a>
								</li>
							<?php endif; ?>
							<?php if ($priv[0]['p_add_computer'] == 1): ?>
								<li>
									<a href="<?php echo base_url(); ?>AddComputer">Add a computer</a>
								</li>
							<?php endif; ?>
							<?php if ($priv[0]['p_edit_computer'] == 1): ?>
								<li>
									<a href="<?php echo base_url(); ?>EditComputer">Edit a computer</a>
								</li>
							<?php endif; ?>
						</ul>


						<!-- /.nav-second-level -->
					</li> <!--END-->

				<?php endif; ?>

				<?php if ($priv[0]['p_contract'] !== '0'): ?>
					<!--Start-->
					<li>
						<a href="#"><i class="fa fa fa-desktop"></i> Legal Affair<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<?php if ($priv[0]['p_contract'] == 1): ?>
								<li>
									<a href="<?php echo base_url(); ?>Contract">Contracts</a>
								</li>
							<?php endif; ?>
						</ul>


						<!-- /.nav-second-level -->
					</li> <!--END-->

				<?php endif; ?>



				<?php if ($priv[0]['p_new_emp'] + $priv[0]['p_edit_emp'] + $priv[0]['p_custodies'] + $priv[0]['p_operation'] !== 0): ?>
					<li>
						<a href="#"><i class="fa fa fa-desktop"></i> Employees<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<?php if ($priv[0]['p_new_emp'] == 1): ?>
								<li>
									<a href="<?php echo base_url(); ?>AddEmp">New Employee</a>
								</li>
							<?php endif; ?>
							<?php if ($priv[0]['p_edit_emp'] == 1): ?>
								<li>
									<a href="<?php echo base_url(); ?>EditEmp">Edit Employee</a>
								</li>
							<?php endif; ?>
							<?php if ($priv[0]['p_custodies'] == 1): ?>
								<li>
									<a href="<?php echo base_url(); ?>Custodies">Custodies</a>
								</li>
							<?php endif; ?>
							<?php if ($priv[0]['p_operation'] == 1): ?>
								<li>
									<a href="<?php echo base_url(); ?>Operations">Operations</a>
								</li>
							<?php endif; ?>
						</ul>


						<!-- /.nav-second-level -->
					</li>
				<?php endif; ?>

				<?php if ($priv[0]['p_gift_redeem'] == 1): ?>
					<li>
						<a href="<?php echo base_url(); ?>Gift"><i class="fa fa fa-gift"></i> Gift Cards<span
									class="fa arrow"></span></a>
					</li>
				<?php endif; ?>
				<?php if ($priv[0]['p_stock_board'] + $priv[0]['p_manage_items'] + $priv[0]['p_make_transaction'] + $priv[0]['p_report'] !== 0): ?>
					<li>
						<a href="#"><i class="fa fa fa-desktop"></i> Stock<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<?php if ($priv[0]['p_stock_board'] == 1): ?>
								<li>
									<a href="<?php echo base_url(); ?>StockBoard">Stock board</a>
								</li>
							<?php endif; ?>

							<?php if ($priv[0]['p_manage_items'] == 1): ?>
								<li>
									<a href="<?php echo base_url(); ?>ItemManager">Item manager</a>
								</li>
							<?php endif; ?>
							<?php if ($priv[0]['p_make_transaction'] == 1): ?>
								<li>
									<a href="<?php echo base_url(); ?>Transfer">Transfer</a>
								</li>
							<?php endif; ?>
							<?php if ($priv[0]['p_report'] == 1): ?>
								<li>
									<a href="<?php echo base_url(); ?>transactions">Transactions</a>
								</li>
							<?php endif; ?>

						</ul>


						<!-- /.nav-second-level -->
					</li>

				<?php endif; ?>



				<?php if ($priv[0]['p_add_user'] + $priv[0]['p_edit_user'] + $priv[0]['p_privilages'] + $priv[0]['p_departments'] + $priv[0]['p_general'] + $priv[0]['p_warehouses'] + $priv[0]['p_vendors'] + $priv[0]['p_op_class'] + $priv[0]['p_location']+ $priv[0]['p_period'] !== 0): ?>

					<li>
						<a href="#"><i class="	glyphicon glyphicon-cog"></i>System Settings<span
									class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<?php if ($priv[0]['p_add_user'] == 1): ?>
								<li>
									<a href="<?php echo base_url(); ?>AddUser">Create user</a>
								</li>
							<?php endif; ?>
							<?php if ($priv[0]['p_edit_user'] == 1): ?>
								<li>
									<a href="<?php echo base_url(); ?>EditUser">Edit user</a>
								</li>
							<?php endif; ?>
							<?php if ($priv[0]['p_privilages'] == 1): ?>
								<li>
									<a href="<?php echo base_url(); ?>Privileges">Privileges</a>
								</li>
							<?php endif; ?>

							<?php if ($priv[0]['p_location'] == 1): ?>
								<li>
									<a href="<?php echo base_url(); ?>Locations">Locations</a>
								</li>
							<?php endif; ?>

							<?php if ($priv[0]['p_period'] == 1): ?>
								<li>
									<a href="<?php echo base_url(); ?>Periods">Periods</a>
								</li>
							<?php endif; ?>
							<?php if ($priv[0]['p_warehouses'] == 1): ?>
								<li>
									<a href="<?php echo base_url(); ?>Warehouses">Warehouses</a>
								</li>
							<?php endif; ?>
							<?php if ($priv[0]['p_vendors'] == 1): ?>
								<li>
									<a href="<?php echo base_url(); ?>Vendors">Vendors</a>
								</li>
							<?php endif; ?>
							<?php if ($priv[0]['p_departments'] == 1): ?>
								<li>
									<a href="<?php echo base_url(); ?>Departments">Departments</a>
								</li>
							<?php endif; ?>
							<?php if ($priv[0]['p_op_class'] == 1): ?>
								<li>
									<a href="<?php echo base_url(); ?>OpClass">OP Classifications</a>
								</li>
							<?php endif; ?>
							<?php if ($priv[0]['p_general'] == 1): ?>
								<li>
									<a href="<?php echo base_url(); ?>GeneralSettings">General settings</a>
								</li>
							<?php endif; ?>


						</ul>
						<!-- /.nav-second-level -->
					</li>
				<?php endif; ?>
			</ul>
		</div>
		<!-- /.sidebar-collapse -->
	</div>
	<!-- /.navbar-static-side -->
</nav>
