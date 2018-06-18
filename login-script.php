<?php
	include("index.php");
	include("connection.php");
	$result = $conn->query("SELECT * from tbl_users where fld_username = '".$_POST["username"]."' and DES_DECRYPT(fld_password) = '".$_POST["userpassword"]."'");
	$row = $result->rowCount();

	while ($data=$result->fetch(PDO::FETCH_BOTH)) {
		$status = $data["fld_status"];
	}

	if($row==1){
		if($status=="1"){
			$_SESSION["login"] = true;
			$_SESSION["user"] = $_POST["username"];
			$conn->query("INSERT INTO tbl_activitylog(fld_activity,fld_date,fld_time) Values ('".$_POST["username"]." logged in','".date('Y-m-d')."','".date('h:i:s a')."')");
			header("location: php/home.php");
		}
		else{
			echo '<script>
			    setTimeout(function() {
			        swal({
			            title: "Oops...",
			            text: "Account is temporarily disabled",
			            type: "error"
			        }, function() {
			            window.location = "index.php";
			        });
			    }, 50);
			</script>';
		$conn->query("INSERT INTO tbl_activitylog(fld_activity,fld_date,fld_time) Values ('".$_POST["username"]." logged in attempt failed account ".$_POST["username"]." is disabled','".date('Y-m-d')."','".date('h:i:s a')."')");

		}
	}else{
		echo '<script>
		    setTimeout(function() {
		        swal({
		            title: "Oops...",
		            text: "Invalid login credentials.",
		            type: "error"
		        }, function() {
		            window.location = "index.php";
		        });
		    }, 50);
		</script>';
		$conn->query("INSERT INTO tbl_activitylog(fld_activity,fld_date,fld_time) Values ('".$_POST["username"]." logged in attempt failed','".date('Y-m-d')."','".date('h:i:s a')."')");
	}	
?>