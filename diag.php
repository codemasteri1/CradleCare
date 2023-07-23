<?php
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">


<!-- profile22:59-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.png">    
    <title>Cradlecare - Dignosis</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
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
						<input type = "text" class = "form-control" id = "search" placeholder = "Search for a patient ID here....."><br>
                        <button class = "btn btn-success" onclick="getInfo()">Search</button>
                    </div>
                </div>
                <div id = "ouptut"></div>
            
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
	<script>
	function getInfo(){
	//alert("seen");
	var the_message = document.getElementById("search").value;  
			if(the_message == "")
			{
				alert('Please type in the patient ID');
				return;
			}
			
			//var variables = "the_message=" + the_message;
				
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("ouptut").innerHTML = this.responseText;
			document.getElementById("search").value = "";
			//alert(this.responseText);
              }
            };
            xmlhttp.open("GET", "dignos.php?id=" + the_message, true);
            xmlhttp.send();
	}
	</script>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- profile23:03-->
</html>