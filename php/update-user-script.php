<?php
	include('user-management.php');
	if(isset($_POST["update"]))
	{	
		include("../connection.php");
		$result = $conn->query("SELECT * FROM tbl_users where fld_username ='".$_SESSION["edit_user"]."'");
		$row=$result->rowCount();
		while($data=$result->fetch(PDO::FETCH_BOTH)){
		$_SESSION["update_user"] = $data[0];
	}

	include("../connection.php");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "UPDATE tbl_users SET fld_fname='".ucwords($_POST["fname"])."',fld_mname='".ucwords($_POST["mname"])."',fld_lname='".ucwords($_POST["lname"])."', fld_username='".$_POST["username"]."', fld_password= DES_ENCRYPT('".$_POST["password"]."') where fld_username='".$_SESSION["update_user"]."'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	unset($_SESSION["user"]);
	$_SESSION["user"]=$_POST["username"];

	echo '<script>
    setTimeout(function() {
        swal({
            title: "Successful",
            text: "User Account Updated.",
            type: "success",
            animation: false
        }, function() {
            window.location = "user-management.php";
        });
    }, 50);
	</script>';

	$conn->query("INSERT INTO tbl_activitylog(fld_activity,fld_date,fld_time) Values ('".$_SESSION["user"]." updated a user account ".$_SESSION["update_user"]."','".date('Y-m-d')."','".date('h:i:s a')."')");
	$conn = null;
}
?>