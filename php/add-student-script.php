<?php
	include("ojt-management.php");
	include("../connection.php");
	$result = $conn->query("SELECT * FROM tbl_students WHERE fld_stud_id ='".$_POST["idnumber"]."'");
	$row = $result->rowCount();
	if ($row!=0) {
		echo '<script>
		    setTimeout(function() {
		        swal({
		            title: "Oops",
		            text: "ID Number already exist.",
		            type: "error",
		            animation:false
		        }, function() {
		            window.location = "ojt-management.php";
		        });
		    }, 50);
		 </script>';
	}
	else
	{
		$query = "INSERT INTO tbl_students (fld_stud_id,fld_stud_fname,fld_stud_mname,fld_stud_lname,fld_stud_course,fld_workplace,fld_cpnumber,fld_address) VALUES ('".$_POST["idnumber"]."','".ucwords($_POST["fname"])."','".ucwords($_POST["mname"])."','".ucwords($_POST["lname"])."','".strtoupper($_POST["course"])."','".ucwords($_POST["workplace"])."','".$_POST["cpnumber"]."','".ucwords($_POST["address"])."')";
		$conn->query($query);
		if ($query) {
			$fullname = ucwords($_POST["lname"]).', '.ucwords($_POST["fname"]).' '.ucwords($_POST["mname"]);
			$second_query = "INSERT INTO tbl_attendance_record (fld_stud_id,fld_stud_name,fld_absent,fld_consumed_hours,fld_remaining_hours) VALUES ('".$_POST["idnumber"]."','".$fullname."','".'0'."','".'0'."','"."480"."')";
			$conn->query($second_query);
			echo '<script>
				    setTimeout(function() {
				        swal({
				            title: "Successful",
				            text: "Added new OJT Student.",
				            type: "success",
				            animation:false
				        }, function() {
				            window.location = "ojt-management.php";
				        });
				    }, 50);
				 </script>';
			$conn->query("INSERT INTO tbl_activitylog(fld_activity,fld_date,fld_time) Values ('".$_SESSION["user"]." add a new OJT Student with ID# ".$_POST["idnumber"]."','".date('Y-m-d')."','".date('h:i:s a')."')");
		}
	}

?>