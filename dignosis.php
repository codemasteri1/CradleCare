<?php
session_start();
include('connection.php');
$id = $_GET['id'];
$patient_phone = $_GET['number'];
$status = "Inactive";
$sql = "UPDATE appointment SET status = '$status' WHERE appointment_id = '$id'";
$run = mysqli_query($connect,$sql);
if(!$_GET['id'])
{
	header('location:index.php');
}
//Patients info////////////////////////////////////////////////////////////////////////
$sql5 = "SELECT * FROM patient WHERE phone_no = '$patient_phone'";
$run5 = mysqli_query($connect,$sql5);
while($row = mysqli_fetch_assoc($run5 ))
{
	$name = $row['name'];
	$patient_id = $row['patient_id'];
	$_SESSION['patient_id_d'] = $patient_id;
	$phone_no = $row['phone_no'];
	$email = $row['email'];
	$dob = $row['dob'];
	$address = $row['address'];
	$gender = $row['gender'];
	$note = $row['note'];
}

$sql6 = "SELECT * FROM symptoms ";
$run6 = mysqli_query($connect,$sql6);
if($run6)
{
	$rows = mysqli_fetch_all($run6, MYSQLI_ASSOC);	
}

$sql3 = "SELECT * FROM prescription WHERE patient_id = '$patient_id'";
$run3 = mysqli_query($connect,$sql3);
$rr = mysqli_fetch_all($run3, MYSQLI_ASSOC);

$sqlinv = "SELECT * FROM inv WHERE patient_id = '$patient_id'";
$inv = mysqli_query($connect,$sqlinv);
$inv_row = mysqli_fetch_all($inv, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">


<!-- profile22:59-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.png">
        <title>CradleCare - Dignosis</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
   <?php include('header.php')?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-7 col-6">
                        <h4 class="page-title">Dignosis</h4>
                    </div>

                    <div class="col-sm-5 col-6 text-right m-b-30">
						<input type = "text" class = "form-control" placeholder = "Search for a patient here....."><br>
                        <button class = "btn btn-success">Search</button>
                    </div>
                </div>
                <div class="card-box profile-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#"><img class="avatar" src="assets/img/user.jpg" alt=""></a>
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0"><?php echo $name ?></h3>
                                                <div class="staff-id">Patient ID : <?php echo $patient_id ?></div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <span class="title">Phone:</span>
                                                    <span class="text"><a href="#"><?php echo $phone_no ?></a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Email:</span>
                                                    <span class="text"><a href="#"><?php echo $email ?></a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Date of Birth:</span>
                                                    <span class="text"><?php echo $dob ?></span>
                                                </li>
                                                <li>
                                                    <span class="title">Address:</span>
                                                    <span class="text"><?php echo $address ?></span>
                                                </li>
                                                <li>
                                                    <span class="title">Gender:</span>
                                                    <span class="text"><?php echo $gender ?></span>
                                                </li>
                                                <li>
                                                    <span class="title">Note:</span>
                                                    <span class="text scrollable"><?php echo $note ?></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                    </div>
                </div>
				<div class="profile-tabs">
					<ul class="nav nav-tabs nav-tabs-bottom">
						<li class="nav-item"><a class="nav-link active" href="#about-cont" data-toggle="tab">Diagnosis</a></li>
						<li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-toggle="tab">Medical Records</a></li>
						<li class="nav-item"><a class="nav-link" href="#bottom-tab3" data-toggle="tab">Payement</a></li>
					</ul>

					<div class="tab-content">
						<div class="tab-pane show active" id="about-cont">
                <div class="row">
                    <div class="col-md-12">
					<form method ="post" action  ="controller.php">
                        <div class="card-box">
                            <h3 class="card-title">SYMPTOMS</h3>
                            <div class="experience-box">
							<div class="form-group">
							<?php foreach ($rows as $row): ?>
								&nbsp &nbsp <input type="checkbox" id="syptoms" class = "form-check-input" name="syptoms[]" value="<?php echo $row['symptoms']?>">
								<label for="syptoms"><?php echo $row['symptoms']?></label> &nbsp &nbsp
							<?php endforeach ?>
							</div>
                            </div>
                        </div>
                        <div class="card-box">
                            <h3 class="card-title">Treatment Section</h3>
                            <div class="experience-box">
							<div class="form-group">
													
							<div class = "col-sm-12">
										<div class = "form-group">
											<label>Diagnosis</label>
											<textarea  class = "form-control" rows = "5" name = "diag"></textarea>
									
							<div class = "col-sm-12">
										<div class = "form-group">
											<label>Prescription</label>
											<textarea  class = "form-control" rows = "5" name = "prescription"></textarea>
										</div>
							</div>
							</div>
							</div>
							<div class = "col-sm-12">
										<div class = "form-group">
											<label>Additional Note</label>
											<textarea  class = "form-control" rows = "5" name = "a_note"></textarea>
										</div>
							</div>
							<button class = "btn btn-success" type = "submit" name = "treatment">Submit</button>
							<a href = "create-invoice.php" class = "btn btn-warning">Invoice</a>
							
                            </div>
                        </div>
						</div>
                       </form>
                    </div>
                </div>
						</div>
						<div class="tab-pane" id="bottom-tab2">
							<div class="table-responsive">
							<table class="table table-border table-striped custom-table datatable mb-0">
								<thead>
									<tr>
										<th>ID</th>
										<th>Symptoms</th>
										<th>Disease</th>
										<th>Prescription</th>
										
										<th>Treatment</th>
										<th>Date</th>
										
									</tr>
								</thead>
								<tbody>
							<?php
							$id =1;
							foreach($rr as $r): ?>
									<tr>
										<td><?php echo $id ?></td>
										<td><?php echo $r['symptoms']?></td>
										<td><?php echo $r['ill']?></td>
										<td><?php echo $r['prescription']?></td>
										
										<td><?php echo $r['note']?></td>
										<td><?php echo $r['date_created']?></td>
										
									</tr>
							<?php 
							$id++;
							endforeach; ?> 
								</tbody>
							</table>
						</div>
						</div>
						<div class="tab-pane" id="bottom-tab3">
							 <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0">
                                <thead>
                                    <tr>
                                        <th>Invoice Number</th>
                                        <th>Patient</th>
                                        <th>Created Date</th>
                                        <th>Due Date</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach ($inv_row as $inv_rows):; ?>
								
                                    <tr>
                                        <td><a href="invoice-view.php?invoiceNumber=<?php echo $inv_rows['invoice_id'] ?>" ><?php echo "#INV-".str_pad($inv_rows['invoice_id'],6,"0", STR_PAD_LEFT);?></a></td>
                                        <td><?php echo $inv_rows['patient']?></td>
                                        <td><?php echo $inv_rows['invoice_date']?></td>
                                        <td><?php echo $inv_rows['due_date']?></td>
                                        <td><?php echo "NGN ".number_format($inv_rows['total_amount'])?></td>
										<?php
										$amount = $inv_rows['total_amount'];
										$p_amount = $inv_rows['paid_amount'];
										if($amount == $p_amount )
										{
											$status = "Paid";
										}
										if($amount > $p_amount )
										{
											$status = "Partially";
										}
										if($p_amount == 0 )
										{
											$status = "Sent";
										}
										?>
                                        <td><span class="custom-badge status-green"><?php echo $status?></span></td>
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
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- profile23:03-->
</html>