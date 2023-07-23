<?php
include('connection.php');
include('controller.php');
?>
<!DOCTYPE html>
<html lang="en">


<!-- add-doctor24:06-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Standfirm Add doctor</title>
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
		<?php if (!empty($msg)): ?>
            <div class="alert <?php echo $msg_class ?>" role="alert">
              <?php echo $msg; ?>
            </div>
          <?php endif; ?>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Lab Result</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action = "controller.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Patient Name<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name">
                                    </div>
                                </div>
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Patient ID<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="id">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Test Name</label>
                                        <input class="form-control" type="text" name="test_name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Attendant <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="attendant">
                                    </div>
                                </div>
                                <div class="col-sm-6">
									<div class="form-group gender-select">
										<label class="gen-label">Gender:</label>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="gender" class="form-check-input" value = "Male" checked>Male
											</label>
										</div>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="gender"  value = "Female" class="form-check-input">Female
											</label>
										</div>
									</div>
                                </div>
								 <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="select" name = "category">
                                            <option>Select</option>
                                            <option value="Scan">Scan</option>
                                            <option value = "X-Ray">X-Ray</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
									<div class="form-group">
										<label>Result</label>
										<div class="profile-upload">
											<div class="upload-input">
												<input type="file" class="form-control" name="result" >
												<span class = "text text-danger">Image must not greater than 200kb</span>
											</div>
										</div>
									</div>
                                </div>
                            </div>
							<div class="form-group">
                                <label>Note</label>
                                <textarea class="form-control" rows="3" cols="30" name="note"></textarea>
                            </div>
                            <div class="m-t-20 text-center">
                                <input class="btn btn-primary submit-btn" type ="submit" name = "lab_result" value = "Save Result">
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


<!-- add-doctor24:06-->
</html>
