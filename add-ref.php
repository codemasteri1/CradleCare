<?php
include('connection.php');
//getting the last id
$getid = "SELECT referal_id FROM referal ORDER BY referal_id  ASC LIMIT 1";
$run5 = mysqli_query($connect,$getid);
while($last_id = mysqli_fetch_assoc($run5))
		{
			$length = 6;
			$id = (int)$last_id['referal_id']+1;
			
		}
?>
<!DOCTYPE html>
<html lang="en">


<!-- add-patient24:06-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>CredleCare | Add Referal</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
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
                        <h4 class="page-title">Add Referal</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method = "post" action ="controller.php">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Ref ID <span class="text-danger">*</span></label>
                                       <input class="form-control" type="text" value="<?php echo "REF-".str_pad("$id",$length,"0", STR_PAD_LEFT);?>" readonly="" name = "id">
                                    </div>
                                </div>   
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Full Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name = "fname">
                                    </div>
                                </div> 								
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name = "email">
                                    </div>
                                </div>
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone </label><span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name =  "phone">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Doctor</label>
                                        <input class="form-control" type="text" name = "doctor">
                                    </div>
                                </div>
                                <div class="col-sm-6">
									<div class="form-group gender-select">
										<label class="gen-label">Gender:</label>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="gender" class="form-check-input" value = "male">Male
											</label>
										</div>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="gender" class="form-check-input" value = "female">Female
											</label>
										</div>
									</div>
									
                                </div>
								 <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Reason for Referal</label>
                                        <input class="form-control" type="text" name ="reason">
                                    </div>
                                </div>
                            </div>
                           
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name = "ref">Add Referal</button>
                            </div>
                        </form>
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
    <script src="assets/js/select2.min.js"></script>
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- add-patient24:07-->
</html>
