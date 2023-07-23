<?php
include('connection.php');
if(isset($_GET['fetchE']))
{
                $id_num = $_GET['fetchE'];
                $sql = "SELECT * FROM staff WHERE staff_id ='$id_num'";
                $run = mysqli_query($connect,$sql);
                if($run)
                {
                    $rows = mysqli_fetch_all($run, MYSQLI_ASSOC);
					foreach($rows as $row)
					$output = '
								';
								echo $output;
                }
}

if(isset($_GET['staff_id']))
{
	$staff_id = $_GET['staff_id'];
	$sql = "SELECT * FROM staff WHERE staff_id ='$staff_id'";
    $run = mysqli_query($connect,$sql);
	if($run)
	{
		while($row = mysqli_fetch_assoc($run))
		{
			$firstname = $row['firstname'];
			$lastname = $row['lastname'];
			echo $firstname." ".$lastname;
		}
		
	}
}

if(isset($_GET['fetchP']))
{
		$id_num = $_GET['fetchP'];
                $sql = "SELECT * FROM patient WHERE patient_id ='$id_num'";
                $run = mysqli_query($connect,$sql);
                if($run)
                {
                    $rows = mysqli_fetch_all($run, MYSQLI_ASSOC);
					foreach($rows as $row):
					
					$output = '<div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Full Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" value = "'.$row['name'].'" name ="name">
										
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" value = "'.$row['email'].'" name ="email">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" type="password" value = "'.$row['password'].'" name ="password">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input class="form-control" type="password" value = "'.$row['password'].'" >
                                    </div>
                                </div>
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker"  value = "'.$row['dob'].'" name = "dob">
                                        </div>
                                    </div>
                                </div>
                                
								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-6">
									<div class="form-group gender-select">
										<label class="gen-label">Gender:</label>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="gender" class="form-check-input" value = "male" checked>Male
											</label>
										</div>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="gender" class="form-check-input" value = "female">Female
											</label>
										</div>
									</div>
                                </div>
									<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone </label>
                                        <input class="form-control" type="text" value = "'.$row['phone_no'].'" name="phone">
                                    </div>
                                </div>
										
									</div>
								</div>
                                
								<div class="col-sm-12">
											<div class="form-group">
												<label>Address</label>
												<input type="text" class="form-control" value = "'.$row['address'].'" name="address">
											</div>
										</div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name = "updatepaient">Save</button>
                            </div>
                        
                    </div>';
					endforeach;
					echo $output;
				}
				
}
?>
