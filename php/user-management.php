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
      function checkForm(form)
      {
        if(form.password.value != "" && form.password.value == form.repassword.value) {
          if(form.password.value == form.username.value) 
          {
            setTimeout(function() {
                swal({
                    title: "Oops...",
                    text: "Password must be different from your Username!",
                    type: "error"
                });
            }, 50);
            form.password.focus();
            return false;
          }
        } else {
            setTimeout(function() {
                swal({
                    title: "Oops...",
                    text: "Password did not match!.",
                    type: "error"
                });
            }, 50);
          form.repassword.focus();
          return false;
        }
      }
    </script>

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

    <style type="text/css">
    .stat{
        text-align: center;
    }
    </style>
</head>
<body>
<div class="container">
<!--Navigation Bar-->
	<?php 
		include("navbar.php");
	?>
    <!--User Management Table-->
    <!--Wrapper-->
    <div class="wrapper w3-light-grey">
        <!--Row-->
        <div class="row">
            <!--Columns 3-->
            <div class="col"></div>
            <div class="col-9">   
                <!--Add New User-->
                <form action="add-user-script.php" method="post" onsubmit="return checkForm(this);">
                    <div class="card text-left" style="margin-top:20px;">
                        <div class="card-header"><span class="ion-person-add"></span> Add User</div>
                        <div class="card-block">
                            <div class="input-group" style="margin-bottom:5px;">
                                <span class="input-group-addon" id="basic-addon3"><span class="ion-information" style="width:20px;"></span></span>
                                <input type="text" class="form-control form-control-sm" id="basic-url" style="text-transform:capitalize;" name = "fname" placeholder="First Name" aria-describedby="basic-addon3" pattern="[A-Za-z ]+" title="Must only contain letters" required/>
                                <input type="text" class="form-control form-control-sm" id="basic-url" style="text-transform:capitalize;" name = "mname" placeholder="Middle Name" aria-describedby="basic-addon3" pattern="[A-Za-z ]+" title="Must only contain letters" required/>
                                <input type="text" class="form-control form-control-sm" id="basic-url" style="text-transform:capitalize;" name = "lname" placeholder="Last Name" aria-describedby="basic-addon3" pattern="[A-Za-z ]+" title="Must only contain letters" required/>
                            </div>

                            <div class="input-group" style="margin-bottom:5px;">
                              <span class="input-group-addon" id="basic-addon3"><span class="ion-person" style="width:20px;"></span></span>
                              <input type="text" class="form-control form-control-sm" id="basic-url" name = "username" placeholder="Username" aria-describedby="basic-addon3" pattern=".{6,}" title="Username should be six or more characters" required/>
                            </div>

                            <div class="input-group" style="margin-bottom:5px;">
                              <span class="input-group-addon" id="basic-addon3" ><span class="ion-locked" style="width:20px;"></span></span>
                              <input type="password" class="form-control form-control-sm" id="pass" name = "password" placeholder="Password" aria-describedby="basic-addon3" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
                            </div>

                            <div class="input-group" style="margin-bottom:5px;">
                              <span class="input-group-addon" id="basic-addon3" ><span class="ion-lock-combination" style="width:20px;"></span></span>
                              <input type="password" class="form-control form-control-sm" id="repass" name = "repassword" placeholder="Re-Enter Password" aria-describedby="basic-addon3" required/>
                            </div>

                            <center><button class="btn btn-md btn-outline-primary" style="width:40%;" type="submit" name="submit"><span class="ion-paper-airplane"></span> Submit</button></center>
                        </div>
                    </div>
                </form>
                <br>
                <!--Add New User End-->

                <!--User Table-->
                    <div class="card text-left" style="margin-bottom:20px;">
                        <div class="card-header"><span class="ion-ios-people"></span> User Management</div>
                        <div class="card-block">
                            <div class="table-responsive">
                                <table id="example" class="table table-hover table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Fullname</th>
                                            <th>Account Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                            include("../connection.php");
                                            $result=$conn->query("Select * from tbl_users");
                                            while ($data=$result->fetch(PDO::FETCH_BOTH)) {
                                                if ($data[6]=="1") {
                                                    echo "<tr>";
                                                    echo "<td>".$data[0]."</td>";
                                                    echo "<td>".$data[4].", ".$data[2]." ".$data[3]."</td>";
                                                    echo "<td style='color:green' class='stat'>"."Active"."</td>";
                                                }else{
                                                    echo "<tr style='color:gray;'>";
                                                    echo "<td>".$data[0]."</td>";
                                                    echo "<td>".$data[4].", ".$data[2]." ".$data[3]."</td>";
                                                    echo "<td style='color:red' class='stat'>"."Deactivated"."</td>";
                                                }

                                                if ($_SESSION["user"]==$data[0]) {
                                                    echo "<td><center><a href='update-user.php?username=".$data[0]."' class='btn btn-sm btn-outline-info' title='Click to edit account information'><span class='ion-compose'></span></a></center></td>";                                                
                                                }else{
                                                    if ($data["fld_status"]=="0") 
                                                    {
                                                    echo 
                                                    "<td>
                                                        <center>
                                                            <button class='btn btn-sm btn-outline-info' disabled><span class='ion-compose'></span></button>
                                                            <a href='activate-user.php?user=".$data[0]."' class='btn btn-sm btn-outline-success' title='Click to activate account.'><span class='ion-checkmark-circled'></span></a>
                                                        </center>
                                                    </td>";                                                  
                                                    }
                                                    else
                                                    {
                                                    echo 
                                                    "<td>
                                                        <center>
                                                            <a href='update-user.php?username=".$data[0]."' class='btn btn-sm btn-outline-info' title='Click to edit account information.'><span class='ion-compose'></span></a>
                                                            <a href='deactivate-user.php?user=".$data[0]."' class='btn btn-sm btn-outline-danger' title='Click to deactivate account.'><span class='ion-minus-circled'></span></a>
                                                        </center>
                                                    </td>"; 
                                                    }

                                                }
                                            }
                                            echo "</tr>";
                                        ?>
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
                <!--User Table End-->
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
