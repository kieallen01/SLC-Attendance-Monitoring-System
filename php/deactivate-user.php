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
				  text: "Deactivate user account <?php echo $_GET["user"];?>?",
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
				  	location.href="deactivate-user-script.php?user=<?php echo $_GET["user"]; ?>";
				  } else {
				        swal({
				            title: "Cancelled",
				            text: "User account deactivation cancelled.",
				            type: "error",
				            animation: false
				        }, function() {
				            window.location = "user-management.php";
				        });
				  }
				});
		    }, 50);
		</script>
	</head>
	<body onload="myFunction()">
	</body>
</html>
