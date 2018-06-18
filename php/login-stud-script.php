
<?php
	session_start();
	include("linkscript.php");
	include("../connection.php");
	$result = $conn->query("SELECT * FROM tbl_students WHERE fld_stud_id = '".$_GET["id"]."'");
	$row = $result->rowCount();

	$result2 = $conn->query("SELECT * FROM tbl_attendance_record WHERE fld_stud_id = '".$_GET["id"]."'");
	while ($data2=$result2->fetch(PDO::FETCH_BOTH)) {
		$attendance = $data2["fld_attendance"];
		}
	if ($row==0) {
		echo '<script>
		    setTimeout(function() {
		        swal({
		            title: "Oops",
		            text: "Invalid Identification Number.",
		            type: "error",
		            animation:false
		        }, function() {
		            window.location = "home.php";
		        });
		    }, 50);
		 </script>';
	}elseif ($attendance=="1") {
		echo '<script>
		    setTimeout(function() {
		        swal({
		            title: "Oops",
		            text: "Student already Logged in.",
		            type: "error",
		            animation:false
		        }, function() {
		            window.location = "home.php";
		        });
		    }, 50);
		 </script>';
	}else{

		$datetoday = date('Y-m-d');
		$timetoday = date('h:i:s a');

		include("../connection.php");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql ="UPDATE tbl_attendance_record SET fld_date='".$datetoday."',fld_time ='".$timetoday."',fld_attendance='1' where fld_stud_id='".$_GET["id"]."'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();

		/** $conn->query("INSERT INTO tbl_attendancelog(fld_stud_id,fld_stud_name,fld_login,fld_logout,fld_date) Values ()");
		$conn = null; **/

		$conn->query("INSERT INTO tbl_activitylog(fld_activity,fld_date,fld_time) Values ('".$_SESSION["user"]." Login student with ID # ".$_GET["id"]."','".date('Y-m-d')."','".date('h:i:s a')."')");
		$conn = null;
		echo '<script>
		    setTimeout(function() {
		        swal({
		            title: "Successful",
		            text: "Student Login Successful.",
		            type: "success",
		            animation: false
		        }, function() {
		            window.location = "home.php";
		        });
		    }, 50);
		</script>';
		
	}

?>



