<?php
include('connection.php');	
$patient_id = $_GET['id'];

$sql5 = "SELECT * FROM patient WHERE patient_id = '$patient_id'";
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

$output = '    <div class="card-box profile-header">
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
                                                <h3 class="user-name m-t-0 mb-0">'.$name.'</h3>
                                                <div class="staff-id">Patient ID :  '.$patient_id.' </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <span class="title">Phone:</span>
                                                    <span class="text"><a href="#"> '.$phone_no.' </a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Email:</span>
                                                    <span class="text"><a href="#"> '.$email.' </a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Date of Birth:</span>
                                                    <span class="text"> '.$dob.'</span>
                                                </li>
                                                <li>
                                                    <span class="title">Address:</span>
                                                    <span class="text">'.$address.'</span>
                                                </li>
                                                <li>
                                                    <span class="title">Gender:</span>
                                                    <span class="text">'.$gender.'</span>
                                                </li>
                                                <li>
                                                    <span class="title">Note:</span>
                                                    <span class="text scrollable">'.$note.'</span>
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
							<div class="form-group">';
							
							 foreach ($rows as $row): ;
					$output.='&nbsp &nbsp <input type="checkbox" id="syptoms" class = "form-check-input" name="syptoms[]" value="'.$row['symptoms'].'">
								<label for="syptoms">'.$row['symptoms'].'</label> &nbsp &nbsp';
							endforeach;
					$output.='		</div>
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
								<tbody>';
							
							$id =1;
							foreach($rr as $r):;
				$output.= '<tr>
										<td>'.$id.'</td>
										<td><'.$r['symptoms'].'</td>
										<td>'.$r['ill'].'</td>
										<td>'.$r['prescription'].'</td>
										
										<td>'.$r['note'].'</td>
										<td>'.$r['date_created'].'</td>
										
									</tr>';
							
							$id++;
							endforeach; 
								
				$output.= '	</tbody>
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
                                <tbody>';
								
								 foreach ($inv_row as $inv_rows):
								
                 $output.=    '<tr>
                                        <td><a href="invoice-view.php?invoiceNumber='.$inv_rows['invoice_id'].'" >'. "#INV-".str_pad($inv_rows['invoice_id'],6,"0", STR_PAD_LEFT).'</a></td>
                                        <td>'.$inv_rows['patient'].'</td>
                                        <td>'.$inv_rows['invoice_date'].'</td>
                                        <td>'.$inv_rows['due_date'].'</td>
                                        <td>'."NGN ".number_format($inv_rows['total_amount']).'</td>';
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
				$output.=    '<td><span class="custom-badge status-green"><?php echo $status?></span></td>
                                    </tr>';
									endforeach; 
				$output.=    '</tbody>
                            </table>
						</div>
					</div>
				</div>
            </div>';
			echo $output;
?>