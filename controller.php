<?php
session_start();
include('connection.php');

$connect = $connection;
function validate_data($data)
	{
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = strip_tags($data);
		  $data = htmlspecialchars($data);
		 // $data = mysqli_real_escape_string($connect,$data);
		  return $data;    
	 }
	 
//LOGIN...................................................................................................
if (isset($_POST['login']))
{
	
	$email = $_POST['email'];
	$_SESSION['username'] = $email;
	$password = $_POST['password'];
	$usertype = $_POST['usertype'];
	if ($usertype == "Doctor")
	{
		$usertype_id = 1;
	}
	if ($usertype == "Nurse")
	{
		$usertype_id = 2;
	}
	if($usertype == "Lab")
	{
		$usertype_id = 3;
	}
	//echo $email." ".$password." ".$usertype_id;
	
	$sql1 = "SELECT * FROM staff WHERE email = '$email' AND usertype_id = '$usertype_id' AND password = '$password'";
	$run = mysqli_query($connect,$sql1);
	if($run)
	{
		while($row = mysqli_fetch_assoc($run))
		{
			$_SESSION['fname'] = $row['firstname'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['id'] = $row['staff_id'];
			$_SESSION['fullname'] = $row['firstname']." ".$row['lastname'];
			$_SESSION['job_role'] = $row['job_role'];
		}
		$row_counter = mysqli_num_rows($run);
		if($row_counter>0)
		{
			$_SESSION['usernamae'] = $email;
			header('location:dashboard.php');
		}	
		else
		{
			?>
			<script>
			alert('Invalid Credential');
			window.location.href="index.php";
			</script>
			<?php
		}
		
	}
	
	//$row = mysqli_fetch_assoc($run);
}
//Treatment ////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['treatment']))
{
		$patient_id = $_SESSION['patient_id_d'];
		$symptoms = implode(',',$_POST['syptoms']);
		$diag = validate_data($_POST['diag']);
		$prescription = validate_data($_POST['prescription']);
		$a_note = validate_data($_POST['a_note']);
		$date_created = date('d/m/Y');
		//query
		$sql = "INSERT INTO treatment(patient_id,symptoms,prescription,treatment,diagnose,date_created)
		VALUES('$patient_id','$symptoms','$prescription','$a_note','$diag','$date_created')";
		$res = mysqli_query($connect,$sql);
		if($res)
					{
					?>
					<script>
					alert("Diagnosis Completed");
					window.location.href="dignosis.php";
					</script>
					<?php
					}
}

//create group//////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['create_group']))
{
	$members = $_POST['member'];	
	$group_name = $_POST['group'];	
	$group_id = 2;	
	$date_created = date('d/m/Y');
	foreach($members as $member)
	{
		$sql1 = "INSERT INTO group_member(staff_id,group_id,date_created)
		VALUES('$member','$group_name','$date_created')";
		$res1 = mysqli_query($connect,$sql1);
	}
		$sql = "INSERT INTO chat_group(group_name,date_created)
		VALUES('$group_name','$date_created')";
		$res = mysqli_query($connect,$sql);
		if($res)
					{
					?>
					<script>
					alert("Group Created!");
					window.location.href="chat.php";
					</script>
					<?php
					}
	
}
////lab////////////////////////lab//////////////////////////////////////////lab////////////////////////lab//////////////////////////////////////////l
if(isset($_POST['lab_result']))
{
	$id = validate_data($_POST['id']);
	$name = validate_data($_POST['name']);
	$test_name = validate_data($_POST['test_name']);
	$attendant = validate_data($_POST['attendant']);
	//$gender = validate_data($_POST['gender']);
	$category = validate_data($_POST['category']);
	$note = validate_data($_POST['note']);
	$passport = time() . '-' . $_FILES["result"]["name"];
	$date_created = date('d/m/Y');
	$msg = "";
			$msg_class = "";
			// For image upload
			$target_dir = "assets/lab/";
			$target_file = $target_dir . basename($passport);
			// VALIDATION
			// validate image size. Size is calculated in Bytes
			if($_FILES['result']['size'] > 2000000) {
			  $msg = "Image size should not be greated than 200Kb";
			  $msg_class = "alert-danger";
			  ?>
				<script>
				alert("Passport More than 2mb");
				window.location.href="lab.php";
				</script>
				<?php
				return;
			}
			
			if(move_uploaded_file($_FILES["result"]["tmp_name"], $target_file))
			{
				$sql = "INSERT INTO lab(patient_id,name,test,resultW,attendant,category,result,date_created)VALUES('$id','$name','$test_name','$note','$attendant','$category','$passport','$date_created')";
				$res = mysqli_query($connect,$sql);
				if($res)
				{
				?>
				<script>
				alert("Added Successfully");
				window.location.href="lab.php";
				</script>
				<?php
				}
			}
}
//STAFF REGISTRATION.....................................................................................................
if(isset($_POST['staff_reg']))
{
	$firstname = validate_data($_POST['firstname']);
	$lastname = validate_data($_POST['lastname']);
	$staff_id = validate_data($_POST['username']);
	$email = validate_data($_POST['email']);
	$password = validate_data($_POST['password']);
	$dob = validate_data($_POST['dob']);
	$role = validate_data($_POST['role']);
	$gender = validate_data($_POST['gender']);
	$address = validate_data($_POST['address']);
	$city = validate_data($_POST['city']);
	$state = validate_data($_POST['state']);
	$phone_no = validate_data($_POST['phone_no']);
	$passport = time() . '-' . $_FILES["profileImage"]["name"];
	$bio = validate_data($_POST['bio']);
	$status = validate_data($_POST['status']);
	$join_date = validate_data($_POST['join_date']);
	$date_today = date("d/m/Y");
	
	if ($role == "Admin")
	{
		$usertype_id = 1;
	}
	else if ($role == "Doctor")
	{
		$usertype_id = 1;
	}
	else if ($role == "Nurse")
	{
		$usertype_id = 2;
	}
	else if ($role == "Laboratorist")
	{
		$usertype_id = 3;
	}
	
	

	$validate = "SELECT * FROM staff WHERE email = '$email' || staff_id = '$staff_id' ";
	$run = mysqli_query($connect,$validate);
	if($run)
	{
	$check  = mysqli_num_rows($run);
		if($check>0)
		{
			?>
				<script>
				alert('Email or Staff ID exist!');
				window.location.href="add-doctor.php";
				</script>
				<?php
		}
		else
		{
			$msg = "";
			$msg_class = "";
			// For image upload
			$target_dir = "assets/passport/";
			$target_file = $target_dir . basename($passport);
			// VALIDATION
			// validate image size. Size is calculated in Bytes
			if($_FILES['profileImage']['size'] > 2000000) {
			  $msg = "Image size should not be greated than 200Kb";
			  $msg_class = "alert-danger";
			  ?>
				<script>
				alert("Passport More than 2mb");
				window.location.href="add-doctor.php";
				</script>
				<?php
				return;
			}
			
			if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file))
			{
				$sql = "INSERT INTO staff(firstname,lastname,staff_id,email,password,usertype_id,job_role,dob,gender,address,city,state,phone,short_bio,status,join_date,date_created,passport)VALUES('$firstname','$lastname','$staff_id','$email','$password','$usertype_id','$role','$dob','$gender','$address','$city','$state','$phone_no','$bio','$status','$join_date','$date_today','$passport ')";
				$res = mysqli_query($connect,$sql);
				if($res)
				{
				?>
				<script>
				alert("Added Successfully");
				window.location.href="employees.php";
				</script>
				<?php
				}
			}
		}
	}
	
}
/////ref////////////////ref///////////////////////////ref////////////////////////////
if(isset($_POST['ref']))
{
	$id = $_POST['id'];
	$ref_id = ltrim($id,"REF-0");
	$firstname = validate_data($_POST['fname']);
	$email = validate_data($_POST['email']);
	$phone = validate_data($_POST['phone']);
	$doctor = validate_data($_POST['doctor']);
	$gender = validate_data($_POST['gender']);
	$reason = validate_data($_POST['reason']);
	$create_date = date('d/m/Y');
	//query
		$sql = "INSERT INTO referal(referal_id,name,gender,phone_no,email,reason,doctor,date_created)
		VALUES('$ref_id','$firstname','$gender','$phone','$email','$reason','$doctor','$create_date')";
		$res = mysqli_query($connect,$sql);
		if($res)
					{
					?>
					<script>
					alert("Added Successfully");
					window.location.href="ref.php";
					</script>
					<?php
					}
}

//Patients REGISTRATION...............................................................................................
if(isset($_POST['addpatient']))
{
	$firstname = validate_data($_POST['fname']);
	$lastname = validate_data($_POST['lname']);
	$name = $firstname." ".$lastname;
	$email = validate_data($_POST['email']);
	$password = validate_data($_POST['password']);
	$dob = validate_data($_POST['dob']);
	$gender = validate_data($_POST['gender']);
	$address = validate_data($_POST['address']);
	$gynotype = validate_data($_POST['gynotype']);
	$blood_group = validate_data($_POST['bloodgroup']);
	$phone_no = validate_data($_POST['phone']);
	$next_of_kin = validate_data($_POST['nextofkin']);
	$note = validate_data($_POST['note']);
	$next_of_kin_phone = validate_data($_POST['phone_k']);
	$join_date = date('d/m/Y');
	
	$getid = "SELECT patient_id FROM patient ORDER BY patient_id  DESC LIMIT 1";
	$run = mysqli_query($connect,$getid);
	
	if($run)
	{
		
		while($row = mysqli_fetch_assoc($run))
		{
			$id = (int)$row['patient_id']+1;
		}
	}

	$sql = "INSERT INTO patient(patient_id,name,email,password,gender,dob,phone_no,genotype,blood,address,nextofkin,nextofkin_phone,note,date_created)
	VALUES('$id','$name','$email','$password','$gender','$dob','$phone_no','$gynotype','$blood_group','$address','$next_of_kin','$next_of_kin_phone','$note','$join_date')";
	$res = mysqli_query($connect,$sql);
	if($res)
				{
				?>
				<script>
				alert("Added Successfully");
				window.location.href="patients.php";
				</script>
				<?php
				}
}
//Appointment
if(isset($_POST['appointment']))
	{
		$appointment_id = validate_data($_POST['appointment_id']);
		$id = ltrim($appointment_id,"APT-0");
		$patientname = validate_data($_POST['patients']);
		$email = validate_data($_POST['email']);
		$dept = validate_data($_POST['dept']);
		$doctorname = validate_data($_POST['doctor']);
		$date = validate_data($_POST['date']);
		$time = validate_data($_POST['time']);
		$phone = validate_data($_POST['phone']);
		$note = validate_data($_POST['note']);
		$status = validate_data($_POST['status']);
		$join_date = date('d/m/Y');
		//query
		$sql = "INSERT INTO appointment(appointment_id,patient_name,dept,doctor,a_date,a_time,patient_email,patient_phone,note,status)
		VALUES('$id','$patientname','$dept','$doctorname','$date','$time','$email','$phone','$note','$status')";
		$res = mysqli_query($connect,$sql);
		if($res)
					{
					?>
					<script>
					alert("Added Successfully");
					window.location.href="appointments.php";
					</script>
					<?php
					}
	}
//INVOICE...............................................................................................................................
if(isset($_POST['create_invoice']))
{
	//getting the last id
	$getid = "SELECT invoice_id FROM invoice ORDER BY invoice_id  DESC LIMIT 1";
	$run = mysqli_query($connect,$getid);
	while($last_id = mysqli_fetch_assoc($run))
		{
			$id = $last_id['invoice_id']+1;
		}
		$invoice_id = $id;
		$patientid = validate_data($_POST['id']);
		$patientname = validate_data($_POST['name']);
		$payment = validate_data($_POST['payment']);
		$email = validate_data($_POST['email']);
		$tax = validate_data($_POST['tax']);
		$address = validate_data($_POST['address']);
		$date = validate_data($_POST['date']);
		$due_date = validate_data($_POST['due_date']);
		
		//invoice details
		$item_1 = validate_data($_POST['item_1']);
		$discription_1 = validate_data($_POST['discription_1']);
		$unit_cost_1 = validate_data($_POST['unit_cost_1']);
		$qty_1 = validate_data($_POST['qty_1']);
		$amount_1 = validate_data($_POST['amount_1']);
		
		$item_2 = validate_data($_POST['item_2']);
		$discription_2 = validate_data($_POST['discription_2']);
		$unit_cost_2 = validate_data($_POST['unit_cost_2']);
		$qty_2 = validate_data($_POST['qty_2']);
		$amount_2 = validate_data($_POST['amount_2']);
		
		$item_3 = validate_data($_POST['item_3']);
		$discription_3 = validate_data($_POST['discription_3']);
		$unit_cost_3 = validate_data($_POST['unit_cost_3']);
		$qty_3 = validate_data($_POST['qty_3']);
		$amount_3 = validate_data($_POST['amount_3']);
		
		$o_info = validate_data($_POST['o_info']);
		$tax = validate_data($_POST['tax']);
		$discount = validate_data($_POST['discount']);
		$total_amount = validate_data($_POST['total_amount']);
		
		//query for saving invoice
		$sql = "INSERT INTO invoice(invoice_id,patient_id,patient,payment_type,email,tax,address,invoice_date,due_date,total_amount)
		VALUES('$invoice_id','$patientid','$patientname','$payment','$email','$tax','$address','$date','$due_date','$total_amount')";
		$res = mysqli_query($connect,$sql);
		
		//query for saving invoice details
		$sql2 = "INSERT INTO invoice_detail(invoice_id,item_1,description_1,unit_cost_1,qty_1,amount_1,item_2,description_2,unit_cost_2,qty_2,amount_2,item_3,description_3,unit_cost_3,qty_3,amount_3,other_info,tax,discount,total_amount)
		VALUES('$invoice_id','$item_1','$discription_1','$unit_cost_1','$qty_1','$amount_1','$item_2','$discription_2','$unit_cost_2','$qty_2','$amount_2','$item_3','$discription_3','$unit_cost_3','$qty_3','$amount_3','$o_info','$tax','$discount','$total_amount')";
		$res2 = mysqli_query($connect,$sql2);
		if($res2)
					{
					?>
					<script>
					alert("Invoice Created!");
					window.location.href="invoices.php";
					</script>
					<?php
					}
		
		
		
}

/*if(isset($_GET(['invoice_id']))
{
	$invoice_id = validate_data($_GET['invoice_id']);
	$name = validate_data($_GET['name']);
	$detail = validate_data($_GET['detaill']);
	$paid_to = validate_data($_GET['paid_to']);
	$date = date("d/m/Y");
	$time = validate_data($_GET['time']);
	validate_data($_GET['amount']);
	$paid_by = validate_data($_GET['paid_by']);
	echo 
}
*/
//PAYMENT////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['make_payment']))
{
	$invoice_id = validate_data($_POST['invoice_id']);
	$name = validate_data($_POST['name']);
	$detail = validate_data($_POST['detaill']);
	$paid_to = validate_data($_POST['paid_to']);
	$date = date("d/m/Y");
	$time = validate_data($_POST['time']);
	$amount = validate_data($_POST['amount']);
	$paid_by = validate_data($_POST['paid_by']);
	$month_year = date('m/Y');
	
	$getid = "SELECT * FROM inv WHERE invoice_id = '$invoice_id'";
	$run = mysqli_query($connect,$getid);
	$invcounter = mysqli_num_rows($run);
	if($invcounter>0)
	{
			while($row = mysqli_fetch_assoc($run))
			{
				$due_amount = $row['total_amount'];
				$paid_amount = $row['paid_amount'];
				
				$update_amount = $paid_amount + $amount;
				$amt  = $update_amount ;
			}
			if($paid_amount >= $due_amount)
			{
				?>
				<script>
				alert('This due as been paid completly')
				window.location="add-paymennt.php"
				</script>
				<?php
				return;
			}
			
			//query for saving payment details
				$sql = "UPDATE inv SET paid_amount ='$amt' WHERE invoice_id = '$invoice_id'";
				$res = mysqli_query($connect,$sql);
				
				$sql2 = "INSERT INTO payment(recievedFrom,paidFor,date_created,amt,time,invoice_id,payto,paidby,month)
				VALUES('$name','$detail','$date','$amount','$time','$invoice_id','$paid_to','$paid_by','$month_year')";
				$res2 = mysqli_query($connect,$sql2);
				if($res2)
							{
							?>
							<script>
							alert("Payment Done!");
							window.location.href="payments.php";
							</script>
							<?php
							}
	}
	else
	{
		$sql2 = "INSERT INTO payment(recievedFrom,paidFor,date_created,amt,time,invoice_id,payto,paidby,month)
				VALUES('$name','$detail','$date','$amount','$time','$invoice_id','$paid_to','$paid_by','$month_year')";
				$res2 = mysqli_query($connect,$sql2);
				if($res2)
							{
							?>
							<script>
							alert("Payment Done!");
							window.location.href="payments.php";
							</script>
							<?php
							}
	}
}
//expenses///////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['expenses']))
{
	$item = validate_data($_POST['item']);
	$p_from = validate_data($_POST['p_from']);
	$date = validate_data($_POST['date']);
	$p_by = validate_data($_POST['p_by']);
	$amount = validate_data($_POST['amount']);
	$paid_by = validate_data($_POST['paid_by']);
	$month_year = date('m/Y');
	
	$sql2 = "INSERT INTO expenses(item,p_from,amount,p_by,date_created,paid_by,month)
		VALUES('$item','$p_from','$amount','$p_by','$date','$paid_by','$month_year')";
		$res2 = mysqli_query($connect,$sql2);
		if($res2)
					{
					?>
					<script>
					alert("Payment Done!");
					window.location.href="expenses.php";
					</script>
					<?php
					}
}
//salary////////////////////////////////////////////salary////////////////////////////////////////////
if(isset($_POST['create_salary']))
{
	$staff_id = validate_data($_POST['staff_id']);
	$name = validate_data($_POST['name']);
	$net_salary = validate_data($_POST['net_salary']);
	$basic_salary = validate_data($_POST['basic_salary']);
	$allowance = validate_data($_POST['allowance']);
	$other_salary = validate_data($_POST['other_salary']);
	$p_deduction = validate_data($_POST['p_deduction']);
	$tax_deduction = validate_data($_POST['tax_deduction']);
	$other_deduction = validate_data($_POST['other_deduction']);
	
	$sql = "UPDATE staff SET salary = '$net_salary'
	WHERE staff_id = '$staff_id'";
	$res = mysqli_query($connect,$sql);
	
	$sql2 = "INSERT INTO salary (staff_id,staff_name,basic_salary,allowance,other_salary,pro_dedt,tax_dedt,other_dedt,net_salary)
		VALUES('$staff_id','$name','$basic_salary','$allowance','$other_salary','$p_deduction','$tax_deduction','$other_deduction','$net_salary')";
	$res2 = mysqli_query($connect,$sql2);
		if($res2)
					{
					?>
					<script>
					alert("Salary added!");
					window.location.href="salary.php";
					</script>
					<?php
					}
}

//Update................................................................................................................
if(isset($_POST['update']))
{
	
	$firstname = validate_data($_POST['firstname']);
	$lastname = validate_data($_POST['lastname']);
	$email = validate_data($_POST['email']);
	$password = validate_data($_POST['password']);
	$address = validate_data($_POST['address']);
	$phone_no = validate_data($_POST['phone_no']);
	$join_date = validate_data($_POST['join_date']);
	$date_today = date("d/m/Y");
	
	$sql = "UPDATE staff SET firstname ='$firstname', lastname = '$lastname', email = '$email', password='$password', address='$address', phone='$phone_no', join_date='$join_date', date_updated='$date_today'
	WHERE email = '$email'";
	$run = mysqli_query($connect,$sql);
	if ($run)
	{
						?>
					<script>
					alert('Record Updated!');
					window.location= "edit-employee.php";
					</script>
					<?php
	}
}
if(isset($_POST['edit_salary']))
{
	$staff_id = validate_data($_POST['staff_id']);
	$name = validate_data($_POST['name']);
	$net_salary = validate_data($_POST['net_salary']);
	$basic_salary = validate_data($_POST['basic_salary']);
	$allowance = validate_data($_POST['allowance']);
	$other_salary = validate_data($_POST['other_salary']);
	$p_deduction = validate_data($_POST['p_deduction']);
	$tax_deduction = validate_data($_POST['tax_deduction']);
	$other_deduction = validate_data($_POST['other_deduction']);
	
	$sql = "UPDATE salary SET staff_id ='$staff_id',staff_name = '$name', basic_salary='$basic_salary', allowance='$allowance', other_salary='$other_salary', pro_dedt='$p_deduction', tax_dedt='$tax_deduction', other_dedt='$other_deduction', net_salary='$net_salary'
	WHERE staff_id = '$staff_id'";
	$run = mysqli_query($connect,$sql);
	if ($run)
	{
					?>
					<script>
					alert('Record Updated!');
					window.location= "salary.php";
					</script>
					<?php
		
	}
}
//Update Patients Record
if(isset($_POST['updatepaient']))
{
	$name = validate_data($_POST['name']);
	$email = validate_data($_POST['email']);
	$password = validate_data($_POST['password']);
	$address = validate_data($_POST['address']);
	$phone_no = validate_data($_POST['phone_no']);
	$dob = validate_data($_POST['dob']);
	$date_today = date("d/m/Y");
	
	$sql = "UPDATE patient SET name ='$name',email = '$email', password='$password', address='$address', phone_no='$phone_no', dob='$dob', date_updated='$date_today'
	WHERE email = '$email'";
	$run = mysqli_query($connect,$sql);
	if ($run)
	{
					?>
					<script>
					alert('Record Updated!');
					window.location= "patients.php";
					</script>
					<?php
		
	}
}
//logout................................................................................................................
if(isset($_POST['logout']))
{
	echo "seen";
}
?>