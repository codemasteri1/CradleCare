<?php
session_start();
include('connection.php');
$sql = "SELECT * FROM referal";
$run = mysqli_query($connect,$sql);
$rows = mysqli_fetch_all($run, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">


<!-- payments23:25-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.png">
    <title>Cradelcare | Refferal</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
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
				
                    <div class="col-sm-12">
                        <h4 class="page-title">Refferal</h4>

                    </div>
                </div>
                <div class="row">
				<div class="col-sm-12">
                        <a href="add-ref.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Patient</a>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable mb-0">
                                <thead>
                                    <tr>
                                        <th>Refferal ID</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Phone Number</th>
                                        <th>Reason for referal</th>
										<th>Doctor</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach ($rows as $row):; ?>
                                    <tr>
                                        <td><?php echo "REF-".str_pad($row['referal_id'],6,"0", STR_PAD_LEFT);?></td>
                                        <td>
                                            <h2><?php echo $row['name']?></h2>
                                        </td>
                                        <td><?php echo $row['gender']?></td>
                                        <td><?php echo $row['phone_no']?></td>
                                        <td><?php echo $row['reason']?></td>
                                        <td><?php echo $row['doctor']?></td>
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
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- payments23:25-->
</html>