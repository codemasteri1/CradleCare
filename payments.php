<?php
include('connection.php');
$sql = "SELECT * FROM payment ORDER BY sn DESC";
$run = mysqli_query($connect,$sql);
$sum = 0;
$month_year = date('m/Y');
//$run2 = mysqli_query($connect,"SELECT SUM(amt) FROM payment");
$rows = mysqli_fetch_all($run, MYSQLI_ASSOC);

//sum expenses////////////////////////////
$sql1 = "SELECT * FROM expenses WHERE month = '$month_year'";
$run1 = mysqli_query($connect,$sql1);
$sum_expenses = 0;
while($exp = mysqli_fetch_assoc($run1))
{
	$sum_expenses += (int)$exp['amount'];
}

$sql3 = "SELECT * FROM payment WHERE month = '$month_year'";
$run3 = mysqli_query($connect,$sql3);
$sum_payment = 0;
while($pay = mysqli_fetch_assoc($run3))
{
	$sum_payment += (int)$pay['amt'];
}

//expenses//////////////////////////////expenses////////////////////////////
$sql2 = "SELECT * FROM expenses ORDER BY id DESC";
$run2 = mysqli_query($connect,$sql2);
$rows1 = mysqli_fetch_all($run2, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">


<!-- payments23:25-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.png">
    <title>CradleCare | Payment</title>
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
                        <h4 class="page-title" style="background-color:green;padding:10px;color:white">Payments</h4>
                    </div>
                </div>
				<!--
				<div class="row filter-row">
                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 col-12">
                        <div class="form-group form-focus">
                            <label class="focus-label">From</label>
                            <div class="cal-icon">
                                <input class="form-control floating datetimepicker" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 col-12">
                        <div class="form-group form-focus">
                            <label class="focus-label">To</label>
                            <div class="cal-icon">
                                <input class="form-control floating datetimepicker" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 col-12">
                        <a href="#" class="btn btn-success btn-block"> Search </a>
                    </div>
                </div>
				-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable mb-0">
                                <thead>
                                    <tr>
                                       <!-- <th>Invoice ID</th> -->
                                        <th>Patient</th>
                                        <th>Payment Type</th>
                                        <th>Paid Date</th>
                                        <th>Paid Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach ($rows as $row):; $sum += $row['amt'];?>
								
                                    <tr>
                                      <!--  <td><a href="invoice-view.php?invoiceNumber=<?php echo $row['invoice_id'] ?>" ><?php echo "#INV-".str_pad($row['invoice_id'],6,"0", STR_PAD_LEFT);?></a></td> -->
                                        <td>
                                            <h2><?php echo $row['recievedFrom']?></h2>
                                        </td>
                                        <td><?php echo $row['paidFor']?></td>
                                        <td><?php echo $row['date_created']?></td>
                                        <td><?php echo $row['amt']?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
				<br>
				<div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title" style="background-color:red;padding:10px;color:white">Expenses</h4>
                    </div>
                </div>
				 <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Purchase From</th>
                                        <th>Purchase Date</th>
                                        <th>Purchased By</th>
                                        <th>Amount</th>
                                        <th>Paid By</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach ($rows1 as $row1):; ?>
                                    <tr>
                                        <td>
                                            <strong><?php echo $row1['item']?></strong>
                                        </td>
                                        <td><?php echo $row1['p_from']?></td>
                                        <td><?php echo $row1['date_created']?></td>
                                        <td><?php echo $row1['p_by']?></td>
                                        <td><?php echo $row1['amount']?></td>
                                        <td><?php echo $row1['paid_by']?></td>
                                    </tr>
                                   <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
				<br>
				<div class="row">
					<div class="col-sm-6">			
						<label href="#" class="btn btn-success btn-block"> <h4 >Total Payment this Month</h4><h3 ><?php echo number_format($sum_payment);?></h3></label> 
					</div>
					<div class="col-sm-6">
						<label href="#" class="btn btn-danger btn-block"> <h4>Total Expenses this Month</h4><h3 ><?php echo number_format($sum_expenses);?></h3> </label>       
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