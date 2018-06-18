<?php
	include('ojt-management.php');
	if(isset($_POST["update_stud"]))
	{	
		include("../connection.php");
		$result = $conn->query("SELECT * FROM tbl_students where fld_stud_id ='".$_SESSION["edit_stud_info"]."'");
		$row=$result->rowCount();
		while($data=$result->fetch(PDO::FETCH_BOTH)){
		$_SESSION["update_stud_info"] = $data[0];
	}

	include("../connection.php");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "UPDATE tbl_students SET fld_stud_fname='".ucwords($_POST["fname"])."',fld_stud_mname='".ucwords($_POST["mname"])."',fld_stud_lname='".ucwords($_POST["lname"])."',fld_stud_course='".$_POST["course"]."',fld_workplace= '".$_POST["workplace"]."',fld_cpnumber='".$_POST["cpnumber"]."',fld_address='".$_POST["address"]."' where fld_stud_id='".$_SESSION["update_stud_info"]."'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
		if ($sql) {
			$fullname = ucwords($_POST["lname"]).', '.ucwords($_POST["fname"]).' '.ucwords($_POST["mname"]);
			$sql2 = "UPDATE tbl_attendance_record SET fld_stud_name = '".$fullname."' where fld_stud_id='".$_SESSION["update_stud_info"]."'";
			$stmt2 = $conn->prepare($sql2);
			$stmt2->execute();
			echo '<script>
			setTimeout(function() {
			    swal({
			        title: "Successful",
			        text: "User Account Updated.",
			        type: "success",
			        animation: false
			    }, function() {
			        window.location = "ojt-management.php";
			    });
			}, 50);
			</script>';
		}
	$conn->query("INSERT INTO tbl_activitylog(fld_activity,fld_date,fld_time) Values ('".$_SESSION["user"]." updated a student information with ID#".$_SESSION["update_stud_info"]."','".date('Y-m-d')."','".date('h:i:s a')."')");
	$conn = null;
}
?>