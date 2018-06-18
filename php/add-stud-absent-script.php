
<?php
	session_start();
	include("linkscript.php");
	include("../connection.php");
	$result = $conn->query("SELECT * FROM tbl_students WHERE fld_stud_id = '".$_GET["id"]."'");
	$row = $result->rowCount();

	$result2 = $conn->query("SELECT * FROM tbl_attendance_record WHERE fld_stud_id = '".$_GET["id"]."'");
	while ($data2=$result2->fetch(PDO::FETCH_BOTH)) {
		$name = $data2["fld_stud_name"];
		$absent = $data2["fld_absent"];
		$att = $data2["fld_attendance"];
		}

	$result2 = $conn->query("SELECT * FROM tbl_attendancelog WHERE fld_stud_id = '".$_GET["id"]."'");
	$row2 = $result2->rowCount();

	$result3 = $conn->query("SELECT * FROM tbl_attendancelog WHERE fld_stud_id = '".$_GET["id"]."'");
	while ($data3=$result3->fetch(PDO::FETCH_BOTH)) {
	$date = $data3["fld_date"];
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

	}elseif ($att=="1") {
		echo '<script>
		    setTimeout(function() {
		        swal({
		            title: "Oops",
		            text: "Student is already logged in.",
		            type: "error",
		            animation:false
		        }, function() {
		            window.location = "home.php";
		        });
		    }, 50);
		 </script>';
	}elseif ($row2==1) {
		echo '<script>
		    setTimeout(function() {
		        swal({
		            title: "Error",
		            text: "Student absent today is already added / Student already logged out.",
		            type: "error",
		            animation:false
		        }, function() {
		            window.location = "home.php";
		        });
		    }, 50);
		 </script>';
	}else{
			$totalabsent = $absent +1;
			include("../connection.php");
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql ="UPDATE tbl_attendance_record SET fld_absent = '".$totalabsent."' where fld_stud_id='".$_GET["id"]."'";
			$stmt = $conn->prepare($sql);
			$stmt->execute();

			if ($sql) {
			$conn->query("INSERT INTO tbl_attendancelog(fld_stud_id,fld_stud_name,fld_login,fld_logout,fld_date,fld_hours_rendered) Values ('".$_GET["id"]."','".$name."','".'ABSENT'."','"."ABSENT"."','".date('Y-m-d')."','"."ABSENT"."')");
			$conn->query("INSERT INTO tbl_activitylog(fld_activity,fld_date,fld_time) Values ('".$_SESSION["user"]." recorded student absent with ID # ".$_GET["id"]."','".date('Y-m-d')."','".date('h:i:s a')."')");
			$conn = null;
			echo '<script>
			    setTimeout(function() {
			        swal({
			            title: "Successful",
			            text: "Student absent recorded.",
			            type: "success",
			            animation: false
			        }, function() {
			            window.location = "home.php";
			        });
			    }, 50);
			</script>';
		}
	}

?>



	