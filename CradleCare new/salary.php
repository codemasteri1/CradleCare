<?php
session_start();
include('connection.php');
$sql = "SELECT * FROM staff";
$run = mysqli_query($connect,$sql);
$rows = mysqli_fetch_all($run, MYSQLI_ASSOC);

//sum salry////////////////////////////////////////////////////////
$sql1 = "SELECT * FROM salary";
$run1 = mysqli_query($connect,$sql1);
$sum_staff = mysqli_num_rows($run1);
$sum_salary = 0;
while($exp = mysqli_fetch_assoc($run1))
{
	$sum_salary += (int)$exp['net_salary'];
}
?>
<!DOCTYPE html>
<html lang="en">


<!-- salary23:27-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Standfirm - Payrol</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
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
                    <div class="col-sm-4 col-5">
                        <h4 class="page-title">Employee Salary</h4>
                    </div>
                    <div class="col-sm-8 col-7 text-right m-b-30">
                        <a href="add-salary.php" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Salary</a>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th style="width:25%;">Employee</th>
                                        <th>Employee ID</th>
                                        <th>Email</th>
                                        <th>Joining Date</th>
                                        <th>Role</th>
                                        <th>Salary</th>
                                        <th>Payslip</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach ($rows as $row): ?>
                                    <tr>
                                        <td>
											<img class="rounded-circle" src="assets/img/user.jpg" height="28" width="28" alt=""><?php echo $row['firstname']." ".$row['lastname']?>
                                        </td>
                                        <td><?php echo $row['staff_id']?></td>
                                        <td><?php echo $row['email']?></td>
                                        <td><?php echo $row['join_date']?></td>
                                        <td>
                                           <?php echo $row['job_role']?>
                                        </td>
                                        <td><?php echo $row['salary']?></td>
                                        <td><a class="btn btn-sm btn-primary" href="salary-view.php?staff_id=<?php echo $row['staff_id'] ?>">Generate Slip</a></td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="edit-salary.php?id=<?php echo $row['staff_id'] ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_salary"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
									<?php endforeach?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
			<div class="row">
					<div class="col-sm-6">			
						<label href="#" class="btn btn-warning btn-block"> <h4 >Total Staff on Payrol</h4><h3 ><?php echo number_format($sum_staff);?></h3></label> 
					</div>
					<div class="col-sm-6">
						<label href="#" class="btn btn-success btn-block"> <h4>Total Staff Salary</h4><h3 ><?php echo number_format($sum_salary);?></h3> </label>       
					</div>
			</div>
        </div>
		<div id="delete_salary" class="modal fade delete-modal" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body text-center">
						<img src="assets/img/sent.png" alt="" width="50" height="46">
						<h3>Are you sure want to delete this Salary?</h3>
						<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
							<button type="submit" class="btn btn-danger">Delete</button>
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
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- salary23:28-->
</html>