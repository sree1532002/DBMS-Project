<?php
if(isset($_REQUEST['roll_no'])) {
    $roll_no = $_REQUEST['roll_no'];
    $accepted_status = $_REQUEST['accepted_status'];
    $club_id = $_REQUEST['club_id'];
    include "db.php";
    if($accepted_status==1) {
        $query = "UPDATE users SET accepted_status=0 where roll_no=$roll_no and club_id=$club_id";
    }else{
        $query = "UPDATE users SET accepted_status=1 where roll_no=$roll_no and club_id=$club_id";
    }
    if($con->query($query)){
        $txt = ($accepted_status)? "Visible to non visible":"Non visible to visible";
        echo "Updated from " . $txt;
    }else{
        echo "Error Updating record: " . $con->error;
    }

    $con->close();
}else{
    echo "boo";
}