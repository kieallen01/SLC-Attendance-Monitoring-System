<?php
	include("user-management.php");
	include("../connection.php");
	$result = $conn->query("SELECT * FROM tbl_users WHERE fld_username ='".$_POST["username"]."'");
	$row = $result->rowCount();
	if ($row!=0) {
		echo '<script>
		    setTimeout(function() {
		        swal({
		            title: "Oops",
		            text: "Username already exist.",
		            type: "error",
		            animation:false
		        }, function() {
		            window.location = "user-management.php";
		        });
		    }, 50);
		 </script>';
	}
	else
	{
		$query = "INSERT INTO tbl_users (fld_username,fld_password,fld_fname,fld_mname,fld_lname,fld_userlevel,fld_status) VALUES ('".$_POST["username"]."',DES_ENCRYPT('".$_POST["password"]."'),'".ucwords($_POST["fname"])."','".ucwords($_POST["mname"])."','".ucwords($_POST["lname"])."','"."Admin"."','"."1"."')";
		$conn->query($query);
		echo '<script>
			    setTimeout(function() {
			        swal({
			            title: "Successful",
			            text: "User Account is Registered.",
			            type: "success",
			            animation:false
			        }, function() {
			            window.location = "user-management.php";
			        });
			    }, 50);
			 </script>';

		$conn->query("INSERT INTO tbl_activitylog(fld_activity,fld_date,fld_time) Values ('".$_SESSION["user"]." add a user account ".$_POST["username"]."','".date('Y-m-d')."','".date('h:i:s a')."')");
	}

?>