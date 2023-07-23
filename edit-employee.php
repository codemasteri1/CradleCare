<?php
session_start();
include('connection.php');
$patient_id = $_GET['id'];
if($_GET['id'] == "")
{
	header('location:employees.php');
}
//getting the names of the patients
$sql1 = "SELECT * FROM staff WHERE staff_id = '$patient_id'";
$run1 = mysqli_query($connect,$sql1);
if($run1)
{
	while($rows = mysqli_fetch_assoc($run1))
	{
		$firstname = $rows['firstname'];
		$lastname = $rows['lastname'];
		$email = $rows['email'];
		$password = $rows['password'];
		$address = $rows['address'];
		$phone_no = $rows['phone'];
		$join_date = $rows['join_date'];
		$date_created = $rows['date_created'];
	}		
}
?>
<!DOCTYPE html>
<html lang="en">


<!-- edit-employee24:07-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.png">
    <title>CredleCare | Edit Employee</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper">
       <?php include('header.php')?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Edit Employee</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                       <form action="controller.php" method = "post">
							<div class="row" id = "info">
                                	  <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Staff ID <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id = "patient_id" readonly value = "<?php echo $patient_id?>">
                                    </div>
                        </div>
							<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>First Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name = "firstname" value = "<?php echo $firstname?>">

                                    </div>
                                </div>
							<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Last Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name = "lastname" value = "<?php echo $lastname?>">

                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email"  name = "email" value = "<?php echo $email?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" type="password" name = "password" value = "<?php echo $password?>" >
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input class="form-control" type="password" value = "<?php echo $password?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Address <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name = "address" value = "<?php echo $address?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Join Date <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" type="text" name = "join_date" value = "<?php echo $join_date?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone </label>
                                        <input class="form-control" type="text" name = "phone_no" value = "<?php echo $phone_no?>">
                                    </div>
                                </div>

                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name = "update">Save</button>
                            </div>
						</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<script type="text/javascript">

 
</script>
    <div class="sidebar-overlay" data-reff=""></div>
	<script src="assets/js/infro.js"></script>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- edit-employee24:07-->
</html>
