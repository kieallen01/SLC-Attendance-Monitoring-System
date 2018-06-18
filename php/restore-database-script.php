<?php
include("restore.php");
include("../connection.php");

if($_FILES["sql"]["tmp_name"]==""){
	echo '<script>
            setTimeout(function() {
                swal({
                    title: "Oops...",
                    text: "Please Choose a file.",
                    type: "error",
                    animation:false
                }, function() {
                    window.location = "restore.php";
                });
            }, 50);
          </script>';
}else{
$file = $_FILES["sql"]["tmp_name"];
$sql = file_get_contents($file);
$qr = $conn->exec($sql);
$conn->query("INSERT INTO tbl_activitylog(fld_activity,fld_date,fld_time) Values ('".$_SESSION["user"]." performed database restoration ','".date('Y-m-d')."','".date('h:i:s a')."')");
echo '<script>
        setTimeout(function() {
            swal({
                title: "Successful",
                text: "Your database file has been restored.",
                type: "success",
                animation:false
            }, function() {
                window.location = "restore.php";
            });
        }, 50);
      </script>';
}
?>