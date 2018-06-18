<?php
session_start();
include("../connection.php");
$conn->query("INSERT INTO tbl_activitylog(fld_activity,fld_date,fld_time) Values ('".$_SESSION["user"]." logged out ','".date('Y-m-d')."','".date('h:i:s a')."')");
unset($_SESSION["login"]);
unset($_SESSION["user"]);
header("location: ../index.php");

?>