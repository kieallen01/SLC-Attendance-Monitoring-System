<?php
session_start();
if(isset($_SESSION["login"])){
if($_SESSION["login"]==true){
header("location: php/home.php");
}else{
header("location: index.php");
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<?php include("connection.php");?>
	<title>SAO Attendance Monitoring System</title>

	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="true">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="ionicons/css/ionicons.css">

	<link rel="stylesheet" href="sweet-alert/dist/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="sweet-alert/themes/google/google.css">

	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

</head>
<body>
<div class = "container">
	<div class="wrapper">
		<div class = "row">
			<div class = "col"></div>
			<div class = "col-6">
				<center><img style="width:140px;height:140px;padding-top:20px;" src="images/slclogo.png"></center>
				<div>
					<center><strong id="system">Attendance Monitoring System  <br> of On the Job Training for <br>Student Affairs Office</strong></center>
				</div>
				<form action ="login-script.php" method="post">
					<div class="card text-center" style="width:100%;">
						<div class="card-header">
						Sign-in to start
						</div>

						<div class="card-block">
							<div class="input-group">
							  <span class="input-group-addon" id="basic-addon3"><span class="ion-person"></span></span>
							  <input type="text" class="form-control" id="basic-url" name = "username" placeholder="Username" aria-describedby="basic-addon3" required>
							</div>

							<div class="input-group">
							  <span class="input-group-addon" id="basic-addon3" ><span class="ion-locked"></span></span>
							  <input type="password" class="form-control" id="basic-url" name = "userpassword" placeholder="Password" aria-describedby="basic-addon3" required>
							</div>
						<br>
							<button class="btn btn-primary" style="width:100%;" type="submit" name="login"><span class="ion-ios-paperplane-outline"></span> Login</button>
						</div>
					</div>
				</form>
			</div>
			<div class = "col"></div>
		</div>
		<div class="push"></div>
	</div>
	<br>
	<footer class="footer"> 
		<center>
		    <b>Version</b> 1.00
	        <strong>Copyright &copy; 2017. SLC Student Affairs Office Attendance Monitoring System.</strong> All rights reserved.
	    </center>
	</footer>
</div>
<script src="sweet-alert/dist/sweetalert-dev.js"></script>
</body>
</html>