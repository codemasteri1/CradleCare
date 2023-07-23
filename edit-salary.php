<?php
session_start();
include('connection.php');
$staff_id = $_GET['id'];
//getting the names of the patients
$sql1 = "SELECT * FROM salary WHERE staff_id = '$staff_id'";
$run1 = mysqli_query($connect,$sql1);
if($run1)
{
	while($rows = mysqli_fetch_assoc($run1))
	{
		$staff_name = $rows['staff_name'];
		$basic_salary = $rows['basic_salary'];
		$allowance = $rows['allowance'];
		$other_salary = $rows['other_salary'];
		$pro_dedt = $rows['pro_dedt'];
		$tax_dedt = $rows['tax_dedt'];
		$other_dedt = $rows['other_dedt'];
		$net_salary = $rows['net_salary'];;
	}		
}
?>
<!DOCTYPE html>
<html lang="en">


<!-- edit-salary24:08-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="images/cradlecare1(1).jpg">
    <title>CredleCare | Salary</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
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
                        <h4 class="page-title">Edit Staff Salary</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method = "post" action = "controller.php">
                            <div class="row">
                                <div class="col-sm-6">
								    <div class="form-group">
                                        <label>Staff ID</label>
                                        <input class="form-control" type="text" id = "staff_id" name = "staff_id" readonly onkeyup = "fetchName()" value = "<?php echo $staff_id?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Staff Name</label>
                                        <input class="form-control" type="text" id = "info" readonly name = "name" value = "<?php echo $staff_name?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
									<div class="form-group">
										<label>Net Salary</label>
										<input class="form-control" type="text" value = "<?php echo $net_salary?>" id = "net_salary" name = "net_salary" >
									</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4 class="text-primary">Earnings</h4>
                                    <div class="form-group">
                                        <label>Basic</label>
                                        <input class="form-control" type="text" id = "basic_salary"  value = "<?php echo $basic_salary?>" onkeyup = "getNetSalary()" name = "basic_salary">
                                    </div>                                
                                  
                                    <div class="form-group">
                                        <label>Allowance</label>
                                        <input class="form-control" type="text" id = "allowance" value = "<?php echo $allowance?>" onkeyup = "getNetSalary()" name = "allowance">
                                    </div>
                                   
                                    <div class="form-group">
                                        <label>Others</label>
                                        <input class="form-control" type="text" id = "other_salary"  value = "<?php echo $other_salary?>" onkeyup = "getNetSalary()" name = "other_salary">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <h4 class="text-primary">Deductions</h4>
                                    <div class="form-group">
                                        <label>Professional Bodies</label>
                                        <input class="form-control" type="text" id = "p_deduction" value = "<?php echo $pro_dedt?>"  onkeyup = "getNetSalary()" name = "p_deduction">
                                    </div>
                                    <div class="form-group">
                                        <label>Tax</label>
                                        <input class="form-control" type="text" id = "tax_deduction"  value = "<?php echo $tax_dedt?>" onkeyup = "getNetSalary()" name = "tax_deduction">
                                    </div>
                                    <div class="form-group">
                                        <label>Others</label>
                                        <input class="form-control" type="text"  id = "other_deduction"  value = "<?php echo $other_dedt?>" onkeyup = "getNetSalary()" name = "other_deduction">
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name = "edit_salary">Create Salary</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/infro.js"></script>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- edit-salary24:08-->
</html>
