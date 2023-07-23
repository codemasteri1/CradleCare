<?php
session_start();
include('connection.php');
$sql = "SELECT * FROM patient";
$run = mysqli_query($connect,$sql);
$rows = mysqli_fetch_all($run, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">


<!-- create-invoice24:07-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.png">
    <title>CradleCare - Invoice</title>
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
                    <div class="col-sm-12">
                        <h4 class="page-title">Create Invoice</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <form method = "post" action = "controller.php">
                            <div class="row">
							<div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Patient ID <span class="text-danger"></span></label>
                                        <input type = "text" class ="form-control" name = "id">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Patient <span class="text-danger">*</span></label>
                                        <input type = "text" class ="form-control" name = "name">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Payment Type <span class="text-danger">*</span></label>
										<input type = "text" class ="form-control" name = "payment">
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" type="email" name = "email">
                                    </div>
                                </div>
								
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Tax</label>
                                        <select class="select" name ="tax" id = "selectTax">
                                            <option>Select Tax</option>
                                            <option>VAT</option>
                                            <option>No Tax</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group" name = "address">
                                        <label>Patient Address</label>
                                        <textarea class="form-control" rows="2" name = "address"></textarea>
                                    </div>
                                </div>
								<!--
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Billing Address</label>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
								-->
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Invoice date <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" type="text" name = "date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Due Date <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" type="text" name = "due_date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-white">
                                            <thead>
                                                <tr>
                                                    <th style="width: 20px">#</th>
                                                    <th class="col-sm-2">Item</th>
                                                    <th class="col-md-6">Description</th>
                                                    <th style="width:100px;">Unit Cost</th>
                                                    <th style="width:80px;">Qty</th>
                                                    <th>Amount</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>
                                                        <input class="form-control" type="text" style="min-width:150px" name = "item_1">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text" style="min-width:150px" name = "discription_1">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" style="width:100px"  id = "unit_cost_1" onkeyup = "sum()" name = "unit_cost_1" type="number">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" style="width:80px" id = "qty_1"  onkeyup = "sum()" name = "qty_1"  value="1" type="number">
                                                    </td>
                                                    <td>
                                                        <input class="form-control form-amt" readonly="" style="width:120px" type="number" id = "amount_1" name = "amount_1" placeholder = "0.0">
                                                    </td>

                                                </tr>
                                               <tr>
                                                    <td>2</td>
                                                    <td>
                                                        <input class="form-control" type="text" style="min-width:150px"  name = "item_2">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text" style="min-width:150px" name = "discription_2">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" style="width:100px" type="text" id = "unit_cost_2" onkeyup = "sum2()" name = "unit_cost_2" type="number">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" style="width:80px" type="text" name = "qty_2" id = "qty_2"  onkeyup = "sum2()"  value="1" type="number">
                                                    </td>
                                                    <td>
                                                        <input class="form-control form-amt" readonly="" style="width:120px" type="number" id = "amount_2" name = "amount_2" placeholder = "0.0" >
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>
                                                        <input class="form-control" type="text" style="min-width:150px" name = "item_3">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text" style="min-width:150px" name = "discription_3">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" style="width:100px" type="text" id = "unit_cost_3" onkeyup = "sum3()" name = "unit_cost_3" type="number">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" style="width:80px" type="text" id = "qty_3"  onkeyup = "sum3()"  name = "qty_3" value="1" type="number">
                                                    </td>
                                                    <td>
                                                        <input class="form-control form-amt" readonly="" style="width:120px" type="number" name = "amount_3" id = "amount_3" placeholder = "0.0" >
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive">
									
                                        <table class="table table-hover table-white">
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-right">Total</td>
                                                    <td style="text-align: right; padding-right: 30px;width: 230px"><input class="form-control text-right form-amt" style="width:230px" type="text" id = "total_amount" placeholder = "0.0" readonly onfocus = "amount()"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" class="text-right">Tax</td>
                                                    <td style="text-align: right; padding-right: 30px;width: 230px">
                                                        <input class="form-control text-right form-amt" value="0.0" readonly  type="text" name = "tax" id = "c_tax" onfocus = "tax_cal()">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" class="text-right">
                                                        Discount %
                                                    </td>
                                                    <td style="text-align: right; padding-right: 30px;width: 230px">
                                                        <input class="form-control text-right" type="text" name = "discount" onkeyup = "discountGiven(this.value)">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" style="text-align: right; font-weight: bold">
                                                        Grand Total
                                                    </td>
                                                    <td style="text-align: right; padding-right: 30px; font-weight: bold; font-size: 16px;width: 230px">
                                                        <input type = "text" readonly class = "form-control text-right" name="total_amount" id = "groundTotal" placeholder = "0.00">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Other Information</label>
                                                <textarea class="form-control" name = "o_info"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center m-t-20">
                                <button class="btn btn-grey submit-btn m-r-10" >Save & Send</button>
                                <button class="btn btn-primary submit-btn" type="submit" name = "create_invoice">Save</button>
								
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<script>
		  
	</script>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/infro.js"></script>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- create-invoice24:07-->
</html>