<?php
include('connection.php');
include('login.php')
$connect = $connection;
if (!$_SESSION['username']) {
	header('location: login.php');
	exit;
}

$sql1 = "SELECT * FROM patient WHERE phone_no = '$patient_phone'";
$run1 = mysqli_query($connect, $sql1);
if ($run1) {
	$patient_info = mysqli_fetch_assoc($run1);
} else {
	// Handle error if needed
}

// Fetch the patient's upcoming appointments
$sql5 = "SELECT * FROM appointment WHERE patient_phone = '$patient_phone' AND status = 'Active' ORDER BY appointment_id DESC LIMIT 5";
$run5 = mysqli_query($connect, $sql5);
$rows = mysqli_fetch_all($run5, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags, title, and CSS links -->
</head>
<body>
    <div class="main-wrapper">
    <link href="styleses.css" rel='stylesheet'>
        <?php include('header.php')?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $patient_info['name']; ?></h3>
                                <span class="widget-title2">Patient <i class="fa fa-check" aria-hidden="true"></i></span>
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
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <!-- JS scripts -->
</body>
</html>
