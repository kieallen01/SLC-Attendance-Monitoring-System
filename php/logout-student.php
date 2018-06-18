<?php
    include("home.php");
    include("../connection.php");
    $result = $conn->query("SELECT * FROM tbl_attendance_record WHERE fld_stud_id ='".$_GET["id"]."'");
    while ($data=$result->fetch(PDO::FETCH_BOTH)) {
        $name = $data["fld_stud_name"];
        $hconsumed = $data["fld_consumed_hours"];
        $hrendered = $data["fld_remaining_hours"];
        $timestarted = $data["fld_time"];
        $datestarted = $data["fld_date"];
    }

    $hour1 = 0; $hour2 = 0;

    $date1 = $datestarted.' '.$timestarted;
    $date2 = date('Y-m-d h:i:s a', time());;
    $datetimeObj1 = new DateTime($date1);
    $datetimeObj2 = new DateTime($date2);
    $interval = $datetimeObj1->diff($datetimeObj2);
     
    if($interval->format('%a') > 0){
    $hour1 = $interval->format('%a')*24;
    }
    if($interval->format('%h') > 0){
    $hour2 = $interval->format('%h');
    }
    
    $total = ($hour1 + $hour2);

    echo '<script type="text/javascript">
            swal({
              title: "Are you sure?",
              text: "'.$name.' rendered '.$total.' hour/s",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes, Logout!",
              cancelButtonText: "No, cancel please!",
              closeOnConfirm: false,
              closeOnCancel: false,
              animation: false
            },
            function(isConfirm){
              if (isConfirm) {
                window.location = "logout-student-script.php?id='.$_GET["id"].'&totaltime='.$total.'";
              } else {
                window.location = "home.php";
              }
            });
        </script>';
?>

