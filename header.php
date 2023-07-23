 <?php
 session_start();
 $role = $_SESSION['job_role'];
 ?>
 <div class="header" >
			<div class="header-left">
				<a href="index.php" class="logo">
				<h2 style="color:white"><img src="assets/img/logo.png" alt="cradlecare" height="80px" width="80px" title="Back Home"></h2>
				</a>
			</div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">

                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
							<img class="rounded-circle" src="assets/img/user.jpg" width="24" alt="Admin">
							<span class="status online"></span>
						</span>
						<span><?php echo $_SESSION['fname'] ?></span>
                    </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="index.php">Logout</a>
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-elslipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
                    <a class="dropdown-item" href="index.php">Logout</a>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
			<?php if($role == "Admin" || $role == "Doctor")
			{ 
              echo '  <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li class="active">
                            <a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
						<li>
						<a href = "diag.php"><i class = "fa fa-stethoscope"></i><span>Diagnosis</span></a>
						</li>
						<li>
                            <a href="doctors.php"><i class="fa fa-user-md"></i> <span>Doctors</span></a>
                        </li>
                        <li>
                            <a href="patients.php"><i class="fa fa-wheelchair"></i> <span>Patients</span></a>
                        </li>
                        <li>
                            <a href="appointments.php"><i class="fa fa-calendar"></i> <span>Appointments</span></a>
                        </li>
						<li>
                            <a href="lab-result.php"><i class="fa fa-stethoscope"></i> <span>Lab Report</span></a>
                        </li>
						<li class="submenu">
							<a href="#"><i class="fa fa-user"></i> <span> Employees </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="employees.php">Employees List</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#"><i class="fa fa-money"></i> <span> Accounts </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="add-paymennt.php">Add Payment</a></li>
								<li><a href="invoices.php">Invoices</a></li>
								<li><a href="payments.php">Account Report</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#"><i class="fa fa-book"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="salary.php"> Employee Salary </a></li>
							</ul>
						</li>
                        <li>
                            <a href="chat.php"><i class="fa fa-comments"></i> <span>Chat</span> </a>
                        </li>
						
                    </ul>
                </div>';
			}
			else if($role == "Nurse")
			{
				echo '  <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li class="active">
                            <a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="patients.php"><i class="fa fa-wheelchair"></i> <span>Patients</span></a>
                        </li>
						<li>
                            <a href="ref.php"><i class="fa fa-calendar"></i> <span>Referral</span></a>
                        </li>
                        <li>
                            <a href="appointments.php"><i class="fa fa-calendar"></i> <span>Appointments</span></a>
                        </li>
						<li class="submenu">
							<a href="#"><i class="fa fa-money"></i> <span> Accounts </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="add-paymennt.php">Add Payment</a></li>
								<li><a href="invoices.php">Invoices</a></li>
								<li><a href="expenses.php">Expenses</a></li>
							</ul>
						</li>
                        <li>
                            <a href="chat.php"><i class="fa fa-comments"></i> <span>Chat</span></a>
                        </li>
						
                    </ul>
                </div>';
			}else
			{
				echo '  <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li class="active">
                            <a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="patients.php"><i class="fa fa-wheelchair"></i> <span>Patients</span></a>
                        </li>
                        <li>
                            <a href="appointments.php"><i class="fa fa-calendar"></i> <span>Appointments</span></a>
                        </li>
						 <li>
                            <a href="lab.php"><i class="fa fa-calendar"></i> <span>Lab Records</span></a>
                        </li>
						<li>
                            <a href="ref.php"><i class="fa fa-calendar"></i> <span>Referral</span></a>
                        </li>
						<li class="submenu">
							<a href="#"><i class="fa fa-money"></i> <span> Accounts </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="invoices.php">Invoices</a></li>
							</ul>
						</li>
                        <li>
                            <a href="chat.php"><i class="fa fa-comments"></i> <span>Chat</span> </a>
                        </li>
						
                    </ul>
                </div>';
			}
			?>
            </div>
        </div>
