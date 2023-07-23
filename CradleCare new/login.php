<?php

session_start();
session_destroy();
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">


<!-- login23:11-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Standfirm </title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
			<div class="account-center">
				<div class="account-box">
                    <form action="controller.php" class="form-signin" method = "POST">
						<div class="account-logo">
                            <a href="#">CRADLE CARE</a>
                        </div>
                        <div class="form-group">
                            <label>Account Type</label>
                            <select class = "form-control select" name = "usertype" required>
								<option>Select</option>
								<option>Lab</option>
								<option>Nurse</option>
								<option>Doctor</option>
							</select>
                        </div><div class="form-group">
                            <label>Email</label>
                            <input type="email" autofocus="" class="form-control" name = "email" required>
						<?php ?>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name  = "password" required>
                        </div>
                        <div class="form-group text-right">
                            <a href="forgot-password.html">Forgot your password?</a>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary account-btn" name = "login">Login</button>
                        </div>
                        <div class="text-center register-link">
                           <span class = "text text-danger"> Don’t have an account? </span> <span class = "text text-info">Contact the Management</a>
                        </div>
                    </form>
                </div>
			</div>
        </div>
    </div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- login23:12-->
</html>