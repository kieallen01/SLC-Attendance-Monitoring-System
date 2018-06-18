<!DOCTYPE html>
<html>
	<head>
		<?php 
		include("linkscript.php");
		;?>
		<script>
		    setTimeout(function myFunction() {
				swal({
				  title: "Are you sure?",
				  text: "Login student with ID # <?php echo $_POST["id"];?>?",
				  type: "warning",
				  showCancelButton: true,
				  confirmButtonColor: "#DD6B55",
				  confirmButtonText: "Yes",
				  cancelButtonText: "No",
				  closeOnConfirm: false,
				  closeOnCancel: false,
				  animation: false
				},
				function(isConfirm){
				  if (isConfirm) {
				  	location.href="login-stud-script.php?id=<?php echo $_POST["id"]; ?>";
				  } else {
				        swal({
				            title: "Cancelled",
				            text: "User account deactivation cancelled.",
				            type: "error",
				            animation: false
				        }, function() {
				            window.location = "home.php";
				        });
				  }
				});
		    }, 50);
		</script>
	</head>
	<body onload="myFunction()">
	</body>
</html>
