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
    }

    $result2 = $conn->query("SELECT * FROM tbl_attendance_record WHERE fld_stud_id ='".$_GET["student_id"]."'");
    while ($data2=$result2->fetch(PDO::FETCH_BOTH)) {
        $absent = $data2["fld_absent"];
        $hrendered  = $data2["fld_consumed_hours"];
        $hremaining = $data2["fld_remaining_hours"];
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
                        <div class="card-header"><span class="ion-ios-paper-outline"></span> Student Information</div>
                        <div class="card-block">

                            <div class="input-group" style="margin-bottom:5px;">
                              <span class="input-group-addon" id="basic-addon3" style="width:20%;text-align:right;">ID Number :</span>
                              <input type="text" class="form-control" id="basic-url" style="background-color:white;" name = "idnumber" placeholder="<?php echo $id;?>" aria-describedby="basic-addon3" readonly="" />
                            </div>

                            <div class="input-group" style="margin-bottom:5px;">
                                <span class="input-group-addon" id="basic-addon3" style="width:20%;text-align:right;">Fullname :</span>
                                <input type="text" class="form-control" id="basic-url" style="text-transform:capitalize;background-color:white;" name = "fname" aria-describedby="basic-addon3" value="<?php echo $sfname;?>" readonly/>
                                <input type="text" class="form-control" id="basic-url" style="text-transform:capitalize;background-color:white;" name = "mname" aria-describedby="basic-addon3" value="<?php echo $smname;?>" readonly/>
                                <input type="text" class="form-control" id="basic-url" style="text-transform:capitalize;background-color:white;" name = "lname" aria-describedby="basic-addon3" value="<?php echo $slname;?>" readonly/>
                            </div>

                            <div class="input-group" style="margin-bottom:5px;">
                                <span class="input-group-addon" id="basic-addon3" style="width:20%;text-align:right;">Course :</span>
                                <input type="text" class="form-control" id="basic-url" style="text-transform:uppercase;background-color:white;" name = "course" value="<?php echo $course;?>" aria-describedby="basic-addon3" readonly/>
                            </div>

                            <div class="input-group" style="margin-bottom:5px;">
                                <span class="input-group-addon" id="basic-addon3" style="width:20%;text-align:right;">Workplace :</span>
                                <input type="text" class="form-control" id="basic-url" style="text-transform:capitalize;background-color:white;" name = "workplace" value="<?php echo $workplace;?>" aria-describedby="basic-addon3" readonly/>
                            </div>

                            <div class="input-group" style="margin-bottom:5px;">
                                <span class="input-group-addon" id="basic-addon3" style="width:20%;text-align:right;">Phone Number :</span>
                                <span class="input-group-addon" id="basic-addon3">+63</span>
                                <input type="text" class="form-control" id="phonenumber" style="background-color:white;" name = "cpnumber" value="<?php echo $cpnumber;?>" aria-describedby="basic-addon3" readonly/>
                            </div>

                            <div class="input-group" style="margin-bottom:5px;">
                                <span class="input-group-addon" id="basic-addon3" style="width:20%;text-align:right;">Address :</span>
                                <input type="text" class="form-control" id="basic-url" style="text-transform:capitalize;background-color:white;" name = "address" value="<?php echo $saddress;?>" aria-describedby="basic-addon3" readonly/>
                            </div>

                            <div class="input-group" style="margin-bottom:5px;margin-top:20px;">

                                <label style="text-align:center;font-size:20px;width:33%;">
                                    Absent
                                </label>

                                <label style="text-align:center;font-size:20px;width:33%;">
                                    Hours Rendered
                                </label>

                                <label style="text-align:center;font-size:20px;width:33%;">
                                    Hours Remaining
                                </label>
                            </div>

                            <div class="input-group" style="margin-bottom:20px;">

                                <div class="input-group">
                                    <input type="text" class="form-control form-control-lg" id="basic-url" value="<?php echo $absent;?>" style="text-align:center;background-color:white;" readonly/>
                                </div>

                                <div class="input-group">
                                    <input type="text" class="form-control form-control-lg" id="basic-url" value="<?php echo $hrendered;?>" style="text-align:center;background-color:white;" readonly/>
                                </div>

                                <div class="input-group">
                                    <input type="text" class="form-control form-control-lg" id="basic-url" value="<?php echo $hremaining;?>" style="text-align:center;background-color:white;" readonly/>
                                </div>

                            </div>

                            <a class="btn btn-md btn-outline-danger" style="float:left;" href="ojt-management.php"><span class="ion-arrow-return-left"></span> Back</a>
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
