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
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#example').DataTable( {
                lengthChange: false,
                buttons: ['colvis']
            } );
         
            table.buttons().container()
                .appendTo( '#example_wrapper .col-md-6:eq(0)' );
        } );
    </script>
</head>

<body>
<div class="container">
<!--Navigation Bar-->
	<?php 
		include("navbar.php");
	?>
    <!--OJT Management Table-->
    <!--Wrapper-->
    <div class="wrapper w3-light-grey">
        <!--Row-->
        <div class="row">
            <!--Columns 3-->
            <div class="col"></div>
            <div class="col-11">   
                <!--Add New Student-->
                <form action="add-student-script.php" method="post">
                    <div class="card text-left" style="margin-top:20px;">
                        <div class="card-header"><span class="ion-person-add"></span> Add Student</div>
                        <div class="card-block">

                            <div class="input-group" style="margin-bottom:5px;">
                              <span class="input-group-addon" id="basic-addon3"><span class="ion-pound" style="width:20px;"></span></span>
                              <input type="text" class="form-control form-control-sm" id="basic-url" name = "idnumber" placeholder="ID Number" aria-describedby="basic-addon3" pattern="[0-9]{8}" title="Must only contain 8 digit numbers" required/>
                            </div>

                            <div class="input-group" style="margin-bottom:5px;">
                                <span class="input-group-addon" id="basic-addon3"><span class="ion-information" style="width:20px;"></span></span>
                                <input type="text" class="form-control form-control-sm" id="basic-url" style="text-transform:capitalize;" name = "fname" placeholder="First Name" aria-describedby="basic-addon3" pattern="[A-Za-z ]+" title="Must only contain letters" required/>
                                <input type="text" class="form-control form-control-sm" id="basic-url" style="text-transform:capitalize;" name = "mname" placeholder="Middle Name" aria-describedby="basic-addon3" pattern="[A-Za-z ]+" title="Must only contain letters" required/>
                                <input type="text" class="form-control form-control-sm" id="basic-url" style="text-transform:capitalize;" name = "lname" placeholder="Last Name" aria-describedby="basic-addon3" pattern="[A-Za-z ]+" title="Must only contain letters" required/>
                            </div>

                            <div class="input-group" style="margin-bottom:5px;">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon3"><span class="ion-university" style="width:20px;"></span></span>
                                    <input type="text" class="form-control form-control-sm" id="basic-url" style="text-transform:uppercase;" name = "course" placeholder="Course" aria-describedby="basic-addon3" pattern="[A-Za-z ]+" title="Must only contain letters" required/>
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon3"><span class="ion-ios-home-outline"></span></span>
                                    <input type="text" class="form-control form-control-sm" id="basic-url" style="text-transform:capitalize;" name = "workplace" placeholder="Workplace" aria-describedby="basic-addon3" pattern="[A-Za-z ]+" title="Must only contain letters" required/>
                                </div>
                            </div>

                            <div class="input-group" style="margin-bottom:5px;">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon3"><span class="ion-ios-telephone" style="width:20px;"></span></span>
                                    <span class="input-group-addon" id="basic-addon3">+63</span>
                                    <input type="text" class="form-control form-control-sm" id="phonenumber" name = "cpnumber" placeholder="Contact Number" aria-describedby="basic-addon3" pattern="9[0-9]{9}" title="Must start with country code (63) followed by the mobile number" required/>
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon3"><span class="ion-ios-home"></span></span>
                                    <input type="text" class="form-control form-control-sm" id="basic-url" style="text-transform:capitalize;" name = "address" placeholder="Home Address" aria-describedby="basic-addon3" required/>
                                </div>
                            </div>

                            <center><button class="btn btn-md btn-outline-primary" style="width:33%;" type="submit" name="submit"><span class="ion-paper-airplane"></span> Submit</button></center>
                        </div>
                    </div>
                </form>
                <br>
                <!--Add New OJT End-->

                <!--OJT Student Table-->
                    <div class="card text-left" style="margin-bottom:20px;">
                        <div class="card-header"><span class="ion-ios-people"></span> Student Management</div>
                        <div class="card-block">
                            <div class="table-responsive">
                                <table id="example" class="table table-hover table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Fullname</th>
                                            <th>Course</th>
                                            <th>Workplace</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include("../connection.php");
                                            $result=$conn->query("Select * from tbl_students");
                                            while ($data=$result->fetch(PDO::FETCH_BOTH)) {
                                                echo "<tr>";
                                                echo "<td>".$data[0]."</td>";
                                                echo "<td>".$data[3].", ".$data[1]." ".$data[2]."</td>";
                                                echo "<td>".$data[4]."</td>";
                                                echo "<td>".$data[5]."</td>";
                                                echo "<td>"."+63".$data[6]."</td>";
                                                echo "<td>".$data[7]."</td>";
                                                echo "
                                                <td>
                                                    <center>
                                                        <a href='view-student-info.php?student_id=".$data[0]."' class='btn btn-sm btn-outline-success' title='Click to view student information.'><span class='ion-eye'></span></a>                                                    
                                                        <a href='update-student-info.php?student_id=".$data[0]."' class='btn btn-sm btn-outline-primary' title='Click to edit student information.'><span class='ion-compose'></span></a>
                                                    </center>
                                                </td>";                                                
                                                echo "</tr>";
                                            }

                                        ?>
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
                <!--OJT Student Table End-->
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
