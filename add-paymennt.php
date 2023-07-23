<?php
session_start();
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">


<!-- add-expense24:07-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.png">
    <title>CredleCare - Payment</title>
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
            <div id="add_group" class="modal fade">
                <div class="modal-dialog modal-dialog-centered" >
                    <div class="modal-content" id = "mainDiv" style = "height: 600px;width: 	388px;">
                        <div class="modal-header">
                            <h4 class="modal-title">Your Payment Details</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
						
						<center>
                            <img src = "assets/img/logo.png" style = "width: 60px"><br>
							<strong><label>Payment Reciept</label></strong><br>
							<span>----------Customer Copy----------</span><br><label id = "info"></label>
							<span>----------------------------------------------------</span>
						</center>
                            
							<table  class="table" style = "height:;width: 90%" align="center">
                               <tr>
                                    <td><strong>Customer ID: </strong></td><td class="text-right"><label id = "customer_id" ></label></td>
								</tr>                             
                                <tr>
                                  <td><strong>Name: </strong></td><td class = "text-right"><label id = "customer_name" ></label></td>
                                </tr>
								<tr>
                                  <td><strong>Payment for: </strong></td><td class = "text-right"><p id = "payment_for" ></p></td>
                                </tr>
								<tr>
                                  <td><strong>Amount: </strong></td><td class = "text-right"><label id = "amount_paid" ></label></td>
                                </tr>
								<tr>
                                <td><strong>Date: </strong></td><td class = "text-right"><label id = "date_time" ></label></td>
                                </tr>
								<tr>
                               <td><strong>Chashier: </strong></td><td class = "text-right"><label id = "cashier" ></label></td>
                                </tr>                                
							</table>
                            <button class="btn btn-success" id = "pay" onclick="payno()">Pay</button>
                        </div>
                    </div>
                </div>
            </div>
    <div class="main-wrapper">
         <div class="header" >
			<<?php include('header.php')?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Payment</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method = "post" action="controller.php">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Invoice ID</label>
                                        <input class="form-control" type="text"  id = "invoice_id" name = "invoice_id">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Patient Name</label>
                                        <input class="form-control" type="text" id = "name"  name = "name">
                                    </div>
                                </div>
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Payment Detail</label>
                                        <input class="form-control" type="text" id = "detaill" name ="detaill">
                                    </div>
                                </div>
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Paid To</label>
                                        <input class="form-control" type="text" id = "paid_to" name ="paid_to">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Purchase Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" type="text" id = "date" name = "date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Purchase Time</label>
                                        <div class="time-icon">
                                            <input type="text" class="form-control" id="datetimepicker3" id = "time" name = "time">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Amount</label>
                                        <input placeholder="0.00" class="form-control" type="text" id = "amount" name = "amount">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Paid By</label>
                                        <select class="select" id  = "paid_by" name = "paid_by">
                                            <option>Cash</option>
                                            <option>Cheque</option>
                                            <option>Transfer</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        <div class="m-t-20 text-center">
                               <a href="#" data-toggle="modal" data-target="#add_group"><button class="btn btn-primary submit-btn" onclick="loadDetails()"> Generate Reciept</button></a>
								<button class="btn btn-success submit-btn" name = "make_payment"  onclick="loadDetails()"> Make Payment</button>
							</div>
                            <div class="m-t-20 text-center">
                               
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
	<script>
	function loadDetails(){
	document.getElementById('customer_id').innerHTML = "&nbsp &nbsp &nbsp" + document.getElementById('invoice_id').value;
	document.getElementById('customer_name').innerHTML = "&nbsp &nbsp &nbsp" + document.getElementById('name').value;
	document.getElementById('payment_for').innerHTML = "&nbsp &nbsp &nbsp" + document.getElementById('detaill').value;
	document.getElementById('amount_paid').innerHTML = "&nbsp &nbsp &nbsp" + document.getElementById('amount').value;
	document.getElementById('date_time').innerHTML = "&nbsp &nbsp &nbsp" + document.getElementById('date').value;
	document.getElementById('cashier').innerHTML = "&nbsp &nbsp &nbsp" + document.getElementById('paid_to').value;
	}
	
	function payno(){
		
			var printContents = document.getElementById("mainDiv").innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;
	/*	var invoice_id = document.getElementById("invoice_id").value;  
		var name = document.getElementById("name").value;  
		var detaill = document.getElementById("detaill").value;  
		var amount = document.getElementById("amount").value;  
		var time = document.getElementById("time").value;  
		var paid_to = document.getElementById("paid_to").value;  
		var paid_by = document.getElementById("paid_by").value; 
		
		var variables = "invoice_id=" + invoice_id + "&name=" + name + "&detaill=" + detaill + "&amount=" + amount + "&time=" + time + "&paid_to=" + paid_to + "&paid_by=" + paid_by;
		var str = "dcdcd";
			var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("info").innerHTML = this.responseText;
			document.getElementById("pay").innerHTML = "Print Reciept";
			//alert(this.responseText);
              }
            };
            xmlhttp.open("GET", "pay-verify.php?id" + str, true);
            xmlhttp.send();
			*/
	}
	</script>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- add-expense24:07-->
</html>
