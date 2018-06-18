<ul class="w3-navbar w3-blue" style="margin-top:30px;margin-bottom:5px;">
  <li><a href="home.php"><i class="ion-home"></i> Home</a></li>

  <li><a href="user-management.php"><i class="ion-person-stalker"></i> User Management</a></li>

  <li class="w3-dropdown-hover"><a><i class="ion-android-person"></i> Student</a>
    <div class="w3-dropdown-content w3-white w3-card-4">
      <a href="ojt-management.php"><i class="ion-ios-people"> Student Management</i></a>
      <a href="ojt-attendance-log.php"><i class="ion-ios-list-outline"> Student Attendance Log</i></a>
    </div>
  </li>

  <li class="w3-dropdown-hover"><a><i class="ion-gear-b"></i> Settings</a>
    <div class="w3-dropdown-content w3-white w3-card-4">
      <a href="back-up.php"><i class="ion-android-sync"> Back-up Database</i></a>
      <a href="restore.php"><i class="ion-arrow-down-c"> Restore Database</i></a>
      <a href="activity-log.php"><i class="ion-ios-list-outline"> Activity Log</i></a>
      <a href="../images/usermanual.pdf" target="_blank"><i class="ion-ios-paper-outline"> Help</i></a>
    </div>
  </li>

  <li><span id="logout"><a style="cursor:pointer;"><i class="ion-log-out"></i> Logout</a></span></li>
      <script type="text/javascript">
        document.querySelector('#logout a').onclick = function(){
            swal({
              title: "LOGOUT",
              text: "Are you sure want end your session?",
              type: "info",
              showCancelButton: true,
              closeOnConfirm: false,
              showLoaderOnConfirm: true,
              animation: false,
            },
            function(){
              setTimeout(function(){
                window.location = "logout-script.php";
              }, 800);
            });
        };
      </script>
  <li style="float:right;"><a href="#">Hello, <?php echo ucwords($_SESSION["user"]);?></li>
</ul>

<nav class="navbar navbar-light bg-faded" style="margin-bottom:5px;">
  <a class="navbar-brand" href="home.php">
    <img src="../images/slclogo.png" width="50" height="50" class="d-inline-block align-center" alt="">
    <strong style="font-size:24px;">Attendance Monitoring System</strong> <span style="font-size:14px;">of On the Job Training for Student Affairs Office</span>
  </a>
</nav>