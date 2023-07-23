<?php
session_start();
include('connection.php');
if(!$_SESSION['username'])
{
	header('location:login.php');
}
//Patient Counter..........................................................................................
$sql1 = "SELECT * FROM patient";
$run1 = mysqli_query($connect,$sql1);
if($run1)
{
	$patient_counter = mysqli_num_rows($run1);
}

//test Counter..........................................................................................
$sql2 = "SELECT * FROM lab";
$run2 = mysqli_query($connect,$sql2);
if($run2)
{
	$test_counter = mysqli_num_rows($run2);
}

//Referal Counter..........................................................................................
$sql3 = "SELECT * FROM referal";
$run3 = mysqli_query($connect,$sql3);
if($run3)
{
	$ref_counter = mysqli_num_rows($run3);
}

//Doctor Counter..........................................................................................
$sql4 = "SELECT * FROM staff WHERE job_role = 'Doctor'";
$run4 = mysqli_query($connect,$sql4);
if($run4)
{
	$doc_counter = mysqli_num_rows($run4);
	
}
$sql6 = "SELECT * FROM staff ";
$run6 = mysqli_query($connect,$sql6);
if($run6)
{
	$rows1 = mysqli_fetch_all($run6, MYSQLI_ASSOC);	
}


//Appointment////////////////////////////////////////////////////////////////////////////////////
$sql5 = "SELECT * FROM appointment WHERE status = 'Active' ORDER BY appointment_id  DESC LIMIT 5";
$run5 = mysqli_query($connect,$sql5);
$rows = mysqli_fetch_all($run5, MYSQLI_ASSOC);
//Appointment////////////////////////////////////////////////////////////////////////////////////

$sql7 = "SELECT * FROM patient ORDER BY id  DESC LIMIT 5";
$run7 = mysqli_query($connect,$sql7);
$rows2 = mysqli_fetch_all($run7, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Standfirm  | Admin</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <?php include('nurseheader.php')?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">

                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $patient_counter ?></h3>
                                <span class="widget-title2">Patients <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $test_counter ?></h3>
                                <span class="widget-title3">Test <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $ref_counter ?></h3>
                                <span class="widget-title4">Referal <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
					<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
							<span class="dash-widget-bg1"><i class="fa fa-user-md" aria-hidden="true"></i></span>
							<div class="dash-widget-info text-right">
								<h3><?php echo $doc_counter ?> </h3>
								<span class="widget-title1">Doctors <i class="fa fa-check" aria-hidden="true"></i></span>
							</div>
                        </div>
                    </div>
                </div>
				<div class="row">
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="card">
							<div class="card-body">
								<div class="chart-title">
									<h4>Patient Total</h4>
									<span class="float-right"><i class="fa fa-caret-up" aria-hidden="true"></i> 15% Higher than Last Month</span>
								</div>	
								<canvas id="linegraph"></canvas>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="card">
							<div class="card-body">
								<div class="chart-title">
									<h4>Patients In</h4>
									<div class="float-right">
										<ul class="chat-user-total">
											<li><i class="fa fa-circle current-users" aria-hidden="true"></i>ICU</li>
											<li><i class="fa fa-circle old-users" aria-hidden="true"></i> OPD</li>
										</ul>
									</div>
								</div>	
								<canvas id="bargraph"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-md-6 col-lg-8 col-xl-8">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title d-inline-block">Upcoming Appointments</h4> <a href="appointments.php" class="btn btn-primary float-right">View all</a>
							</div>
							<div class="card-body p-0">
								<div class="table-responsive">
									<table class="table mb-0">
										<thead class="d-none">
											<tr>
												<th>Patient Name</th>
												<th>Doctor Name</th>
												<th>Timing</th>
												<th class="text-right">Status</th>
											</tr>
										</thead>
										<tbody>
										<?php foreach ($rows as $row): ?>
											<tr>
												<td style="min-width: 200px;">
													<a class="avatar" href="#">A</a>
													<h2><a href="profile.html"><?php echo $row['patient_name'] ?> <span><?php echo $row['patient_phone'] ?></span></a></h2>
												</td>                 
												<td>
													<h5 class="time-title p-0">Appointment With</h5>
													<p><?php echo $row['dept'] ?></p>
												</td>
												<td>
													<h5 class="time-title p-0">Date</h5>
													<p><?php echo $row['a_date'] ?></p>
												</td>
												<td>
													<h5 class="time-title p-0">Timing</h5>
													<p><?php echo $row['a_time'] ?></p>
												</td>
												<form method = "post" action = "controller.php">
												<td><a href = "dignosis.php?id=<?php echo $row['appointment_id'] ?>&number=<?php echo $row['patient_phone'] ?>" class="btn btn-primary btn-success btn-submit float-right" >Takeup</a></td>
											</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="card member-panel">
							<div class="card-header bg-white">
								<h4 class="card-title mb-0">Staff</h4>
							</div>
                            <div class="card-body">
                                <ul class="contact-list">
								<?php foreach ($rows1 as $row1): ?>
                                    <li>
                                        <div class="contact-cont">
                                            <div class="float-left user-img m-r-10">
                                                <a href="profile.html" title="John Doe"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status online"></span></a>
                                            </div>
                                            <div class="contact-info">
                                                <span class="contact-name text-ellipsis"><?php echo $row1['firstname']." ".$row1['lastname'] ?></span>
                                                <span class="contact-date"><?php echo $row1['staff_id'] ?></span><br>
                                                <span class="contact-date"><?php echo $row1['email'] ?></span>
                                            </div>
                                        </div>
                                    </li>
                                  <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="card-footer text-center bg-white">
                                <a href="employees.php" class="text-muted">View all Staff</a>
                            </div>
                        </div>
                    </div>
				</div>
				<div class="row">
					<div class="col-12 col-md-6 col-lg-8 col-xl-8">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title d-inline-block">New Patients </h4> <a href="patients.php" class="btn btn-primary float-right">View all</a>
							</div>
							<div class="card-block">
								<div class="table-responsive">
									<table class="table mb-0 new-patient-table">
										<tbody>
										<?php foreach ($rows2 as $row2): ?>
											<tr>
												<td>
													<img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt=""> 
													<h2><?php echo $row2['name'] ?></h2>
												</td>
												<td><?php echo $row2['email'] ?></td>
												<td><?php echo $row2['phone_no'] ?></td>
											</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4 col-xl-4">
						<div class="hospital-barchart">
							<h4 class="card-title d-inline-block">Hospital Management</h4>
						</div>
						<div class="bar-chart">
							<div class="legend">
								<div class="item">
									<h4>Level1</h4>
								</div>
								
								<div class="item">
									<h4>Level2</h4>
								</div>
								<div class="item text-right">
									<h4>Level3</h4>
								</div>
								<div class="item text-right">
									<h4>Level4</h4>
								</div>
							</div>
							<div class="chart clearfix">
								<div class="item">
									<div class="bar">
										<span class="percent">16%</span>
										<div class="item-progress" data-percent="16">
											<span class="title">OPD Patient</span>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="bar">
										<span class="percent">71%</span>
										<div class="item-progress" data-percent="71">
											<span class="title">New Patient</span>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="bar">
										<span class="percent">82%</span>
										<div class="item-progress" data-percent="82">
											<span class="title">Laboratory Test</span>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="bar">
										<span class="percent">67%</span>
										<div class="item-progress" data-percent="67">
											<span class="title">Treatment</span>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="bar">
										<span class="percent">30%</span>									
										<div class="item-progress" data-percent="30">
											<span class="title">Discharge</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					 </div>
				</div>
            </div>

        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/Chart.bundle.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/app.js"></script>

</body>



</html>