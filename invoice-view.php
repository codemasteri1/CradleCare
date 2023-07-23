<?php
session_start();
include('connection.php');
$invoiceNumber = $_GET['invoiceNumber'];
//getting the names of the patients
$sql = "SELECT * FROM inv WHERE invoice_id = '$invoiceNumber'";
$run = mysqli_query($connect,$sql);
if($run)
{
	while($row = mysqli_fetch_assoc($run))
	{
		$name = $row['patient'];
		$address = $row['address'];
		$email = $row['email'];
		$total_amount = $row['total_amount'];
		$paid_amount = $row['paid_amount'];
		$invoice_date = $row['invoice_date'];
		$due_date = $row['due_date'];
		$invoice_id = $row['invoice_id'];

	}
}

$sql1 = "SELECT * FROM invoice_detail WHERE invoice_id = '$invoiceNumber'";
$run1 = mysqli_query($connect,$sql1);
if($run1)
{
	while($rows = mysqli_fetch_assoc($run1))
	{
		$item_1 = $rows['item_1'];
		$description_1 = $rows['description_1'];
		$unit_cost_1 = $rows['unit_cost_1'];
		$qty_1 = $rows['qty_1'];
		$amount_1 = $rows['amount_1'];

		$item_2 = $rows['item_2'];
		$description_2 = $rows['description_2'];
		$unit_cost_2 = $rows['unit_cost_2'];
		$qty_2 = $rows['qty_1'];
		$amount_2 = $rows['amount_1'];
		
		$item_3 = $rows['item_3'];
		$description_3 = $rows['description_3'];
		$unit_cost_3 = $rows['unit_cost_3'];
		$qty_3 = $rows['qty_3'];
		$amount_3 = $rows['amount_3'];
		
		$item_3 = $rows['item_3'];
		$description_3 = $rows['description_3'];
		$unit_cost_3 = $rows['unit_cost_3'];
		$qty_3 = $rows['qty_3'];
		$amount_3 = $rows['amount_3'];
		
		$subtotal = $amount_1 + $amount_2 + $amount_3;
		$tax = $rows['tax'];
		$o_info = $rows['other_info'];
		$total_amount = $rows['total_amount'];
	}
}
?>
<!DOCTYPE html>
<html lang="en">


<!-- invoice-view24:07-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>CradleCare - Invoice</title>
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
       <?php include('header.php')?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-5 col-4">
                        <h4 class="page-title">Invoice</h4>
                    </div>
                    <div class="col-sm-7 col-8 text-right m-b-30">
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-white" onclick = "printDiv()"><i class="fa fa-print fa-lg"></i> Print</button>
                        </div>
                    </div>
                </div>
                <div class="row" id = "mainDiv" >
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row custom-invoice">
                                    <div class="col-6 col-sm-6 m-b-20">
                                        <img src="assets/img/logo.png" class="inv-logo" alt="">
                                        <ul class="list-unstyled">
                                            <li>Standfirm</li>
                                            <li>Sapele, Delta State</li>
                                            <li>+234-9033428193</li>
                                        </ul>
                                    </div>
									
                                    <div class="col-6 col-sm-6 m-b-20">
                                        <div class="invoice-details">
                                            <h3 class="text-uppercase"><?php echo "Invoice #INV-".str_pad("$invoice_id",6,"0", STR_PAD_LEFT);?></h3>
                                            <ul class="list-unstyled">
                                                <li><strong>Date: </strong><span><?php echo $invoice_date ?></span></li>
                                                <li><strong>Due date: </strong><span><?php echo $due_date ?></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" >
                                    <div class="col-sm-6 col-lg-6 m-b-20">
										
											<h5>Invoice to:</h5>
											<ul class="list-unstyled">
												<li>
													<h5><strong><?php echo $name?></strong></h5>
												</li>
												<li><span><?php echo $address?></span></li>
												<li><?php echo $email;?></li>												
											</ul>
										
                                    </div>
                                    <div class="col-sm-6 col-lg-6 m-b-20">
										<div class="invoices-view">
											<span class="text-muted">Payment Details:</span>
											<ul class="list-unstyled invoice-payment-details">
												<li>
													<h5>Total Amount: <span class="text-right"><span><?php echo number_format($total_amount) ?></span></h5>
												</li>
												<li>
													<h5>Paid Amount: <span class="text-right"><span><?php echo number_format($paid_amount) ?></span></h5>
												</li>
											</ul>
										</div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ITEM</th>
                                                <th>DESCRIPTION</th>
                                                <th>UNIT COST</th>
                                                <th>QUANTITY</th>
                                                <th>TOTAL</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td><?php echo $item_1 ?></td>
                                                <td><?php echo $description_1 ?></td>
                                                <td><?php echo number_format($unit_cost_1) ?></td>
                                                <td><?php echo $qty_1 ?></td>
                                                <td><?php echo number_format($amount_1) ?></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td><?php echo $item_2 ?></td>
                                                <td><?php echo $description_2 ?></td>
                                                <td><?php echo number_format($unit_cost_2) ?></td>
                                                <td><?php echo $qty_2 ?></td>
                                                <td><?php echo number_format($amount_2) ?></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td><?php echo $item_3 ?></td>
                                                <td><?php echo $description_3 ?></td>
                                                <td><?php echo number_format($unit_cost_3) ?></td>
                                                <td><?php echo $qty_3 ?></td>
                                                <td><?php echo number_format($amount_3) ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                    <div class="row invoice-payment">
                                        <div class="col-sm-7">
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="m-b-20">
                                                <h6>Total due</h6>
                                                <div class="table-responsive no-border">
                                                    <table class="table mb-0">
                                                        <tbody>
                                                            <tr>
                                                                <th>Subtotal:</th>
                                                                <td class="text-right"><?php echo number_format($subtotal) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Tax:</th>
                                                                <td class="text-right"><?php echo number_format($tax) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Total:</th>
                                                                <td class="text-right text-primary">
                                                                    <h5><?php echo number_format($total_amount) ?></h5>
																</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="invoice-info">
                                        <h5>Other information</h5>
                                        <p class="text-muted"><?php echo $o_info ?></p>
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
		<script>
	function printDiv() { 
			var printContents = document.getElementById("mainDiv").innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;
        } 
	</script>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- invoice-view24:07-->
</html>