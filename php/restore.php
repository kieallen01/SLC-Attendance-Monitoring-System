<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<?php 
		include("linkscript.php");
		include("../connection.php");
	?>
</head>
<body>
<div class="container">
<!--Navigation Bar-->
	<?php 
		include("navbar.php");
	?>
    <!--Backup-->
    <!--Wrapper-->
    <div class="wrapper w3-light-grey">
        <!--Row-->
        <div class="row">
            <!--Columns 3-->
            <div class="col"></div>
            <div class="col-4">
                <img src="../images/restore.png" style="height:350px;">
                <form action="restore-database-script.php" method="POST" enctype="multipart/form-data" class="w3-form">
                    <center><label class="control-label"><input id="input-1" type="file" accept=".sql" name="sql" id="sql"/></label></center>
                    <center><button type="submit" style="width:100%;" name="restore" class="btn btn-md btn-outline-success"><span class="ion-loop"></span> Restore a Database File</button></center>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
<footer class="footer"> 
    <center>
        <b>Version</b> 1.00
        <strong>Copyright &copy; 2017. SLC Student Affairs Office Attendance Monitoring System.</strong> All rights reserved.
    </center>
</footer>
</div>
<!--Scripts-->
<?php include("bottom-scripts.php");?>
</body>
</html>
