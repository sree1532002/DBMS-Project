<?php
include('db.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['up'])){
        //print_r($_POST);
        $id = $con->real_escape_string($_POST['id']);
        $club_id = $con->real_escape_string($_POST['club_id']);
        $events = $con->real_escape_string($_POST['events']);
        $dates = $con->real_escape_string($_POST['dates']);
        $sql = "UPDATE announcements SET club_id = '$club_id',events = '$events',dates = '$dates' WHERE id = $id";
        if(mysqli_query($con, $sql))
        {
            echo 'Announcement updated';
        }
        else{
            echo "Error:  <br>" . $con->error;
        }
    }
    if(isset($_POST['del'])){
        $id = $con->real_escape_string($_POST['id']);
        $sql = "DELETE FROM announcements WHERE id = $id";
        if(mysqli_query($con, $sql))
        {
            echo 'Announcement deleted';
        }
        else{
            echo "Error:  <br>" . $con->error;
        }
    }
    if(isset($_POST['add'])){
        $club_id = $con->real_escape_string($_POST['club_id']);
        $events = $con->real_escape_string($_POST['events']);
        $dates = $con->real_escape_string($_POST['dates']);
        $sql = "INSERT INTO announcements(club_id,dates,events) VALUES ('$club_id','$dates','$events')";
        if(mysqli_query($con, $sql))
        {
            echo 'Announcement added';
        }
        else{
            echo "Error:  <br>" . $con->error;
        }
    }
}
else{
        echo "<script>";
        echo "alert('Access Denied');";
        echo "window.location.href = 'index.php';";
        echo "</script>";
}
?>