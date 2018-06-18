<?php
	include("home.php");
	include("../connection.php");
	$result = $conn->query("SELECT * FROM tbl_attendance_record where fld_stud_id ='".$_GET["id"]."'");
	$row=$result->rowCount();
	while($data=$result->fetch(PDO::FETCH_BOTH)){
		$name = $data["fld_stud_name"];
		$hconsumed = $data["fld_consumed_hours"];
		$hremaining = $data["fld_remaining_hours"];
		$starttime = $data["fld_time"];
	}
	$totaltime = $_GET["totaltime"];
	$timenow = date("h:i:s a");
	$updateconsumed = $hconsumed + $totaltime;
	$updateremaining = $hremaining - $totaltime;

	include("../connection.php");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "UPDATE tbl_attendance_record SET fld_consumed_hours = '".$updateconsumed."', fld_remaining_hours = '".$updateremaining."',fld_time = '".date("h:i:s a")."',fld_attendance = '".'0'."' where fld_stud_id='".$_GET["id"]."'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();

	$conn->query("INSERT INTO tbl_attendancelog (fld_stud_id,fld_stud_name,fld_login,fld_logout,fld_date,fld_hours_rendered) VALUES ('".$_GET["id"]."','".$name."','".$starttime."','".date("h:i:s a")."','".date('Y-m-d')."','".$totaltime."')");
	echo '<script>
	    setTimeout(function() {
	        swal({
	            title: "Successful",
	            text: "Student logged out.",
	            type: "success",
	            animation: false
	        }, function() {
	            window.location = "home.php";
	        });
	    }, 50);
	</script>';
	$conn->query("INSERT INTO tbl_activitylog(fld_activity,fld_date,fld_time) Values ('".$_SESSION["user"]." logged out a student with ID # ".$_GET["id"]."','".date('Y-m-d')."','".date('h:i:s a')."')");
	$conn = null;

?>