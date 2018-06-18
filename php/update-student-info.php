<?php
	session_start();
    include("../connection.php");
    $result = $conn->query("SELECT * FROM tbl_students WHERE fld_stud_id ='".$_GET["student_id"]."'");
    while ($data=$result->fetch(PDO::FETCH_BOTH)) {
        $id = $data[0];
        $sfname = $data[1];
        $smname = $data[2];
        $slname = $data[3];
        $course = $data[4];
        $workplace = $data[5];
        $cpnumber = $data[6];
        $saddress = $data[7];
        $_SESSION["edit_stud_info"] = $data[0];
    }
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
    <!--Update User-->
    <!--Wrapper-->
    <div class="wrapper w3-light-grey">
        <!--Row-->
        <div class="row">
            <!--Columns 3-->
            <div class="col"></div>
            <div class="col-9">   
                <!--Add New User-->
                <form action="update-student-info-script.php" method="post">
                    <div class="card text-left" style="margin-top:20px;">
                        <div class="card-header"><span class="ion-compose"></span> Edit Student Information</div>
                        <div class="card-block">

                            <div class="input-group" style="margin-bottom:5px;">
                              <span class="input-group-addon" id="basic-addon3"><span class="ion-person" style="width:20px;"></span></span>
                              <input type="text" class="form-control" id="basic-url" name = "idnumber" placeholder="<?php echo $id;?>" aria-describedby="basic-addon3" readonly="" />
                            </div>

                            <div class="input-group" style="margin-bottom:5px;">
                                <span class="input-group-addon" id="basic-addon3"><span class="ion-information" style="width:20px;"></span></span>
                                <input type="text" class="form-control" id="basic-url" style="text-transform:capitalize;" name = "fname" aria-describedby="basic-addon3" pattern="[A-Za-z ]+" title="Must only contain letters" value="<?php echo $sfname;?>" required/>
                                <input type="text" class="form-control" id="basic-url" style="text-transform:capitalize;" name = "mname" aria-describedby="basic-addon3" pattern="[A-Za-z ]+" title="Must only contain letters" value="<?php echo $smname;?>" required/>
                                <input type="text" class="form-control" id="basic-url" style="text-transform:capitalize;" name = "lname" aria-describedby="basic-addon3" pattern="[A-Za-z ]+" title="Must only contain letters" value="<?php echo $slname;?>" required/>
                            </div>

                            <div class="input-group" style="margin-bottom:5px;">
                                <span class="input-group-addon" id="basic-addon3"><span class="ion-university" style="width:20px;"></span></span>
                                <input type="text" class="form-control" id="basic-url" style="text-transform:uppercase;" name = "course" value="<?php echo $course;?>" aria-describedby="basic-addon3" pattern="[A-Za-z ]+" title="Must only contain letters" required/>
                            </div>

                            <div class="input-group" style="margin-bottom:5px;">
                                <span class="input-group-addon" id="basic-addon3"><span class="ion-ios-home-outline" style="width:20px;"></span></span>
                                <input type="text" class="form-control" id="basic-url" style="text-transform:capitalize;" name = "workplace" value="<?php echo $workplace;?>" aria-describedby="basic-addon3" pattern="[A-Za-z ]+" title="Must only contain letters" required/>
                            </div>

                            <div class="input-group" style="margin-bottom:5px;">
                                <span class="input-group-addon" id="basic-addon3"><span class="ion-ios-telephone" style="width:20px;"></span></span>
                                <span class="input-group-addon" id="basic-addon3">+63</span>
                                <input type="text" class="form-control" id="phonenumber" name = "cpnumber" value="<?php echo $cpnumber;?>" aria-describedby="basic-addon3" pattern="9[0-9]{9}" title="Must start with country code (63) followed by the mobile number" required/>
                            </div>

                            <div class="input-group" style="margin-bottom:5px;">
                                <span class="input-group-addon" id="basic-addon3"><span class="ion-ios-home" style="width:20px;"></span></span>
                                <input type="text" class="form-control" id="basic-url" style="text-transform:capitalize;" name = "address" value="<?php echo $saddress;?>" aria-describedby="basic-addon3" required/>
                            </div>
                            <button class="btn btn-md btn-outline-primary" style="float:right;width:25%;" type="submit" name="update_stud"><span class="ion-checkmark"></span> Save</button>
                            <a class="btn btn-md btn-outline-danger" style="float:left;width:25%;" href="ojt-management.php"><span class="ion-arrow-return-left"></span> Cancel</a>
                        </div>
                    </div>
                </form>
                <br>
                <!--Add New User End-->
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
