<?php
	include("user-management.php");
	include("../connection.php");
	
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql ="UPDATE tbl_users SET fld_status='0' where fld_username='".$_GET["user"]."'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();

	$conn->query("INSERT INTO tbl_activitylog(fld_activity,fld_date,fld_time) Values ('".$_SESSION["user"]." Deactivate a user account ".$_GET["username"]."','".date('Y-m-d')."','".date('h:i:s a')."')");
	$conn = null;
	echo '<script>
	    setTimeout(function() {
	        swal({
	            title: "Deactivated",
	            text: "Account Deactivated.",
	            type: "error",
	            animation: false
	        }, function() {
	            window.location = "user-management.php";
	        });
	    }, 50);
	</script>';
?>