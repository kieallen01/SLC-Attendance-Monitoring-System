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
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#example').DataTable( {
            lengthChange: false,
            buttons: ['excel', 'pdf' ]
        } );
     
        table.buttons().container()
            .appendTo( '#example_wrapper .col-md-6:eq(0)' );
    } );
</script>
<body>
<div class="container">
<!--Navigation Bar-->
	<?php 
		include("navbar.php");
	?>
    <!--OJT Log Table-->
    <!--Wrapper-->
    <div class="wrapper w3-light-grey">
        <!--Row-->
        <div class="row">
            <!--Columns 3-->
            <div class="col"></div>
            <div class="col-11"> 
                <!--OJT Log Table-->
                    <div class="card text-left" style="margin-top:20px;margin-bottom:20px;" >
                        <div class="card-header"><span class="ion-ios-book"></span> OJT Attendance Log</div>
                        <div class="card-block">
                            <div class="table-responsive">
                                <table id="example" class="table table-hover table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Fullname</th>
                                            <th>Login Time</th>
                                            <th>Logout Time</th>
                                            <th>Date</th>
                                            <th>Hours Rendered</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                            include("../connection.php");
                                            $result=$conn->query("Select * from tbl_attendancelog");
                                            while ($data=$result->fetch(PDO::FETCH_BOTH)) {
                                                echo "<tr>";
                                                echo "<td style = 'text-align:center;'>".$data[0]."</td>";
                                                echo "<td style = 'text-align:center;'>".$data[1]."</td>";
                                                echo "<td style = 'text-align:center;'>".$data[2]."</td>";
                                                echo "<td style = 'text-align:center;'>".$data[3]."</td>";
                                                echo "<td style = 'text-align:center;'>".$data[4]."</td>"; 
                                                echo "<td style = 'text-align:center;'>".$data[5]."</td>";                                                 
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
                <!--OJT Table End-->
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
