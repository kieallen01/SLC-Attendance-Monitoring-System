<?php
	session_start();
    include("../connection.php");
    $result = $conn->query("SELECT fld_username,DES_DECRYPT(fld_password),fld_fname,fld_mname,fld_lname,fld_userlevel,fld_status FROM tbl_users WHERE fld_username ='".$_GET["username"]."'");
    while ($data=$result->fetch(PDO::FETCH_BOTH)) {
        $fname = $data["fld_fname"];
        $mname = $data["fld_mname"];
        $lname = $data["fld_lname"];
        $username = $data["fld_username"];
        $password = $data[1];
        $_SESSION["edit_user"] = $data["fld_username"];
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
                <!--Update New User-->
                <form action="update-user-script.php" method="post" onsubmit="return checkForm(this);">
                    <div class="card text-left" style="margin-top:20px;">
                        <div class="card-header"><span class="ion-compose"></span> Edit User Information</div>
                        <div class="card-block">
                            <div class="input-group" style="margin-bottom:5px;">
                                <span class="input-group-addon" id="basic-addon3" style="width:20%;text-align:right;">First Name :</span>
                                <input type="text" class="form-control" id="basic-url" name = "fname" aria-describedby="basic-addon3" pattern="[A-Za-z ]+" title="Must only contain letters" value="<?php echo $fname;?>" required/>
                            </div>

                            <div class="input-group" style="margin-bottom:5px;">
                                <span class="input-group-addon" id="basic-addon3"style="width:20%;text-align:right;">Middle Name :</span>
                                <input type="text" class="form-control" id="basic-url" name = "mname" aria-describedby="basic-addon3" pattern="[A-Za-z ]+" title="Must only contain letters" value="<?php echo $mname;?>" required/>
                            </div>

                            <div class="input-group" style="margin-bottom:5px;">
                                <span class="input-group-addon" id="basic-addon3"style="width:20%;text-align:right;">Last Name :</span>
                                <input type="text" class="form-control" id="basic-url" name = "lname" aria-describedby="basic-addon3" pattern="[A-Za-z ]+" title="Must only contain letters" value="<?php echo $lname;?>" required/>
                            </div>                            

                            <div class="input-group" style="margin-bottom:5px;">
                              <span class="input-group-addon" id="basic-addon3"style="width:20%;text-align:right;">Username :</span>
                              <input type="text" class="form-control" id="basic-url" name = "username" aria-describedby="basic-addon3" pattern=".{6,}" title="Username should be six or more characters" value="<?php echo $username;?>" required/>
                            </div>

                            <div class="input-group" style="margin-bottom:5px;">
                              <span class="input-group-addon" id="basic-addon3"style="width:20%;text-align:right;">Password :</span></span>
                              <input type="password" class="form-control" id="pass" name = "password" aria-describedby="basic-addon3" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" value="<?php echo $password;?>" required/>
                            </div>

                            <div class="checkbox" style="float:right;">
                              <label><input type="checkbox" onchange="document.getElementById('pass').type = this.checked ? 'text' : 'password'"> Show Password </label>
                            </div>
                            <br><br>
                            <a class="btn btn-md btn-outline-danger" style="float:left;width:25%;" href="user-management.php"><span class="ion-arrow-return-left"></span> Cancel</a>
                            <button class="btn btn-md btn-outline-primary" style="float:right;width:25%;margin-left:5px;" type="submit" name="update"><span class="ion-checkmark"></span> Save</button>
                        </div>
                    </div>
                </form>
                <br>
                <!--Add New User End-->
            </div>
            <div class="col"></div>
        </div>
    </div>
</div>

<!--Scripts-->
<?php include("bottom-scripts.php");?>
</body>
</html>
