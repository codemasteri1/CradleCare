<?php
session_start();
include('connection.php');
$d_email = $_SESSION['username'];
$id = $_SESSION['id'];
$name = $_SESSION['fullname'];

if(isset($_GET['id']))
{
	$to_id = $_GET['id'];
	$from_id = $_GET['id'];
	$image = $_GET['image'];
	$from_name = $_GET['name'];
}
else
{
	$from_id = "";
	$from_name = "";
}
$sql = "SELECT * FROM staff WHERE email = '$d_email' ";
$run = mysqli_query($connect,$sql);
while($row = mysqli_fetch_assoc($run))
{
	$name = $row['firstname']." ".$row['lastname'];
	$staff_id = $row['staff_id'];
	$job_role = $row['job_role'];
	$dob = $row['dob'];
	$email = $row['email'];
	$phone = $row['phone'];
	$passport = $row['passport'];
	$fname = $row['firstname'];
}


//Show chat

$sql2 = "SELECT * FROM group_chat WHERE (to_userid = '$staff_id' AND from_user_id = '$from_id') || (from_user_id = '$staff_id' AND to_userid = '$from_id') ";
$run2 = mysqli_query($connect,$sql2);
$rowss = mysqli_fetch_all($run2, MYSQLI_ASSOC);

//Show chat
$sql3 = "SELECT * FROM group_chat WHERE from_user_id = 'ADMIN-001' AND to_userid = '$from_id'";
$run3 = mysqli_query($connect,$sql3);
$row3 = mysqli_fetch_all($run3, MYSQLI_ASSOC);

//Show all group
$sql1 = "SELECT * FROM staff ";
$run1 = mysqli_query($connect,$sql1);
$rows = mysqli_fetch_all($run1, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">


<!-- chat23:28-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Standfirm - Chat</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
        <div class="header">
            <div class="header-left">
                <a href="index.php" class="logo">
                    <img src="assets/img/logo.png" width="35" height="35" alt=""> <span>Standfirm</span>
                </a>
            </div>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="assets/img/user.jpg" width="40" alt="Admin">
							<span class="status online"></span></span>
                        <span><?php echo $_SESSION['fname'] ?></span>
                    </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="profile.html">My Profile</a>
						<a class="dropdown-item" href="login.php">Logout</a>
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
                    <a class="dropdown-item" href="settings.html">Settings</a>
                    <a class="dropdown-item" href="login.html">Logout</a>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div class="sidebar-menu">
                    <ul>
                        <li>
                            <a href="index.php"><i class="fa fa-home back-icon"></i> <span>Back to Home</span></a>
                        <li class="menu-title">Direct Chats <a href="#" class="add-user-icon" data-toggle="modal" data-target="#add_chat_user"></a></li>
                         <?php foreach($rows as $show):?>
						<li>
                            <a href="chat.php?id=<?php echo $show['staff_id']?>&name=<?php echo $show['firstname']." ".$show['lastname']?>&image=<?php echo $show['passport'] ?>"><span class="chat-avatar-sm user-img"><img src="<?php echo 'assets/passport/' .$show['passport'] ?>" alt="" class="rounded-circle"></span> <?php echo $show['firstname']." ".$show['lastname'] ?></a>
                        </li>
						<?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="chat-main-row">
                <div class="chat-main-wrapper">
                    <div class="col-lg-9 message-view chat-view">
                        <div class="chat-window">
                            <div class="fixed-header">
                                <div class="navbar">
                                    <div class="user-details mr-auto">
                                        <div class="float-left user-img m-r-10">
                                            <a href="profile.html" title="Jennifer Robinson"><img src="<?php echo 'assets/passport/' .$image ?>" alt="" class="w-40 rounded-circle"><span class="status online"></span></a>
                                        </div>
                                        <div class="user-info float-left">
                                            <a href="profile.html"><span class="font-bold"><?php echo $from_name?></span></a>

                                        </div>
                                    </div>

                                    <ul class="nav custom-menu">
                                        <li class="nav-item">
                                            <a href="#chat_sidebar" class="nav-link task-chat profile-rightbar float-right" id="task_chat"><i class="fa fa-user"></i></a>
                                        </li>
                                        
                                        <li class="nav-item dropdown dropdown-action">
                                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="javascript:void(0)">Delete Conversations</a>
                                                
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="chat-contents" id = "get_chat">
                                <div class="chat-content-wrap">
                                    <div class="chat-wrap-inner">
                                        <div class="chat-box">
                                            <div class="chats">
											<?php foreach($rowss as $chat_m): ?>
											<?php // foreach ($row3 as $sender): ?>												
												<!--
                                                <div class="chat-line">
                                                    <span class="chat-date">October 8th, 2015</span>
                                                </div>
												
												<div class="chat-avatar">
                                                        <a href="" class="avatar">
                                                            <img alt="" src="<?php echo 'assets/passport/'.$row['group_id'] ?>" class="img-fluid rounded-circle">
                                                        </a>
                                                 </div>
												 -->
                                                <div class="chat chat-left">
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <p><?php echo $chat_m['chat_out']?></p>
                                                                <span class="chat-time"><?php echo $chat_m['sender_name']?></span>
																<span class="chat-time"><?php echo $chat_m['chat_time']?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
												<div class="chat-line">
                                                   
                                                </div>
												<//?php endforeach;?>
												<?php endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-footer">
                                <div class="message-bar">
                                    <div class="message-inner">
                                       
                                        <div class="message-area">
                                            <div class="input-group">
                                                <textarea class="form-control" placeholder="Type message..." id = "the_message"></textarea>
                                                <span class="input-group-append">
													<button class="btn btn-primary" type="button" onclick = "SendMessage()"><i class="fa fa-send"></i></button>
												</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 message-view chat-profile-view chat-sidebar" id="chat_sidebar">
                        <div class="chat-window video-window">
                            <div class="fixed-header">
                                <ul class="nav nav-tabs nav-tabs-bottom">
                                    <li class="nav-item"><a class="nav-link active" href="#profile_tab" data-toggle="tab">Profile</a></li>
                                </ul>
                            </div>
                            <div class="tab-content chat-contents">
                                <div class="content-full tab-pane show active" id="profile_tab">
                                    <div class="display-table">
                                        <div class="table-row">
                                            <div class="table-body">
                                                <div class="table-content">
                                                    <div class="chat-profile-img">
                                                        <div class="edit-profile-img">
                                                            <img src="<?php echo 'assets/passport/' .$passport ?>" alt="">
                                                            <span class="change-img"><?php echo $fname ?></span>
                                                        </div>
                                                        <h3 class="user-name m-t-10 mb-0"><?php echo $name ?></h3>
                                                        <small class="text-muted"><?php echo $staff_id ?></small>
                                                        <a href="edit-employee.php?id=<?php echo $id ?>" class="btn btn-primary edit-btn"><i class="fa fa-pencil"></i></a>
                                                    </div>
                                                    <div class="chat-profile-info">
                                                        <ul class="user-det-list">
                                                            <li>
                                                                <span>Role:</span>
                                                                <span class="float-right text-muted"><?php echo $job_role?></span>
                                                            </li>
                                                            <li>
                                                                <span>DOB:</span>
                                                                <span class="float-right text-muted"><?php echo $dob ?></span>
                                                            </li>
                                                            <li>
                                                                <span>Email:</span>
                                                                <span class="float-right text-muted"><?php echo $email ?></span>
                                                            </li>
                                                            <li>
                                                                <span>Phone:</span>
                                                                <span class="float-right text-muted"><?php echo $phone ?></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="transfer-files">
                                                        
                                                        

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="add_group" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Create a group</h3>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p>Create a group for a particular topic of discussion</p>
                            <form method = "post" action= "controller.php">
                                <div class="form-group">
                                    <label>Group Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="group">
                                </div>
							
                                <div class="form-group d-inline">
                                    <h4>Add Participant: </h4>
									<?php foreach($rows as $show):?>
									
                                    <input class="form-control-input d-inline" type="checkbox" name = "member[]" value = "<?php echo $show['patient_id'] ?> "><h4 class = "d-inline">
									<label class = "form-check-label" for = "<?php echo $show['patient_id'] ?>" ><?php echo $show['firstname']." ".$show['lastname']?></label>
									<small class ="text text-primary"><?php echo ' ('.$show['job_role'].')' ?></small></h4><br>
									
									<!--<button class="btn btn-primary d-inline" value = "<?php echo $show['staff_id'] ?>" onclick = "addP(this.value)" >Add</button> -->
									<?php endforeach?>
                                </div>
                                <div class="m-t-50 text-center">
                                    <button class="btn btn-primary submit-btn" name = "create_group">Create Group</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="add_chat_user" class="modal fade " role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Create Chat Group</h3>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group m-b-30">
                                <input placeholder="Search to start a chat" class="form-control search-input" id="btn-input" type="text">
                                <span class="input-group-append">
									<button class="btn btn-primary">Search</button>
								</span>
                            </div>
                         
                            <div class="m-t-50 text-center">
                                <button class="btn btn-primary submit-btn">Create Group</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="share_files" class="modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Share File</h3>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="files-share-list">
                                <div class="files-cont">
                                    <div class="file-type">
                                        <span class="files-icon"><i class="fa fa-file-pdf-o"></i></span>
                                    </div>
                                    <div class="files-info">
                                        <span class="file-name text-ellipsis">AHA Selfcare Mobile Application Test-Cases.xls</span>
                                        <span class="file-author"><a href="#">Bernardo Galaviz</a></span> <span class="file-date">May 31st at 6:53 PM</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Share With</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="m-t-50 text-center">
                                <button class="btn btn-primary submit-btn">Share</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script>
		function autoRefresh_div() {
        $("#get_chat").load("refresh.php");
		}
		autoRefresh_div();
		setInterval(autoRefresh_div(), 5000);
	function SendMessage(){
			var the_message = document.getElementById("the_message").value;  
			if(the_message == "")
			{
				return;
			}
			var sender_name = "<?php echo $name ?>";
			var to_id = "<?php echo $to_id ?>";
			var id = "<?php echo $staff_id  ?>";
			var variables = "the_message=" + the_message + "&sender_id=" + id + "&sender_name=" + sender_name + "&to_id=" + to_id;
				
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("get_chat").innerHTML = this.responseText;
			document.getElementById("the_message").value = "";
			//alert(this.responseText);
              }
            };
            xmlhttp.open("GET", "save_chat.php?" + variables, true);
            xmlhttp.send();
	}
	</script>
    <script src="assets/js/infro.js"></script>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- chat23:29-->
</html>