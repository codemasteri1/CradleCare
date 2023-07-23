<?php
if(isset($_GET['id']))
{
	$invoice_id = validate_data($_GET['invoice_id']);
	$name = validate_data($_GET['name']);
	$detail = validate_data($_GET['detaill']);
	$paid_to = validate_data($_GET['paid_to']);
	$date = date("d/m/Y");
	$time = validate_data($_GET['time']);
	validate_data($_GET['amount']);
	$paid_by = validate_data($_GET['paid_by']);
	
	echo $_GET['id'];

}
?>