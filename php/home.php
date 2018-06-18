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
		        buttons: ['colvis' ]
		    } );
		 
		    table.buttons().container()
		        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
		} );
	</script>
</head>
<body>
<div class="container">
	<!--Navigation Bar-->
	<?php include("navbar.php");?>
    <!--Wrapper-->
	<div class="wrapper w3-light-grey container">
	    <!--Row-->
	    <div class="row">
	        <!--Columns 1-->
	        <div class="col">
	        	<!--LOGIN-->
	        	<div class="card text-left" style="margin-top:20px;margin-bottom:20px;" >
                    <div class="card-header w3-green"><span class="ion-person-stalker"></span> Login Student</div>
                    <div class="card-block">
			        	<form action="login-stud.php" method="post">
				            <div class="input-group" style="margin-bottom:10px;margin-top:10px;height:25px;">
								<span class="input-group-addon" id="basic-addon3">ID #</span>
								<input type="text" class="form-control form-control-sm" id="basic-url" name = "id" aria-describedby="basic-addon3" pattern="[0-9]{8}" title="ID number must only be 8 numbers" required/>
			                </div>
							<button type="submit" class="btn btn-sm btn-outline-success" name="login_stud" style="width:100%;"><span class="ion-ios-paperplane-outline"></span> Login Student</button>
			            </form>
			        </div>
			        <div class="card-footer w3-green"></div>
			    </div>
			    <!--LOGOUT-->
			   	<div class="card text-left" style="margin-top:20px;margin-bottom:20px;" >
                    <div class="card-header w3-red"><span class="ion-plus"></span> Add Student Absent</div>
                    <div class="card-block">
			        	<form action="add-stud-absent.php" method="post">
				            <div class="input-group" style="margin-bottom:10px;margin-top:10px;height:25px;">
								<span class="input-group-addon" id="basic-addon3">ID #</span>
								<input type="text" class="form-control form-control-sm" id="basic-url" name = "id_absent" aria-describedby="basic-addon3" pattern="[0-9]{8}" title="ID number must only be 8 numbers" required/>
			                </div>
							<button type="submit" class="btn btn-sm btn-outline-danger" name="login_stud" style="width:100%;"><span class="ion-plus"></span> Add Absent</button>
			            </form>
			        </div>
			        <div class="card-footer w3-red"></div>
			    </div>
	        </div>
	        <!--Columns 2-->
	        <div class="col-9">
	            <!--Student Attendance Table-->
	                <div class="card text-left" style="margin-top:20px;margin-bottom:50px;" >
	                    <div class="card-header"><span class="ion-man"></span> Student Attendance</div>
	                    <div class="card-block">
	                        <div class="table-responsive">
	                            <table id="example" class="table table-hover table-bordered" cellspacing="0" width="100%">
	                                <thead>
	                                    <tr>
	                                        <th>ID Number</th>
	                                        <th>Name</th>
	                                        <th>Date</th>
	                                        <th>Time Started</th>
	                                        <th>Action</th>
	                                    </tr>
	                                </thead>

	                                <tbody>
	                                    <?php
	                                        $result=$conn->query("Select * from tbl_attendance_record");
	                                        while ($data=$result->fetch(PDO::FETCH_BOTH)) {	                                        
		                                        if ($data["fld_attendance"]=="1") {
		                                        echo "<tr>";
		                                       	echo "<td>".$data[0]."</td>";
	                                            echo "<td>".$data[1]."</td>";
	                                            echo "<td><center>".$data[5]."<center></td>";
	                                            echo "<td><center>".$data[6]."<center></td>";
 												echo "
 												<td>
	 												<center>
	 													<a href='logout-student.php?id=".$data[0]."' class='btn btn-sm btn-outline-danger' id='logout_stud' title='Click to logout student.'><span class='ion-log-out'></span></a>
	 													<a href='view-student-info-home.php?student_id=".$data[0]."' class='btn btn-sm btn-outline-success' title='Click to view student information.'><span class='ion-eye'></span></a>
	 												</center>
 												</td>";                                                      
	                                            echo "</tr>";
		                                        }
	                                        }
	                                    ?>
	                                </tbody>
	                            </table>
	                        </div> 
	                    </div>
	                    <div class="card-footer"></div>
	                </div>
	            <!--Student Attendance Table-->
	        </div>
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
