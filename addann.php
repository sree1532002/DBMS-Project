<?php
if(isset($_POST['addann'])){
    session_start();
    include('db.php');
    $clubid = $con->real_escape_string($_POST['clubid']);
    $events = $con->real_escape_string($_POST['events']);
    $date = $con->real_escape_string($_POST['date']);

    $clubid = stripcslashes($clubid);
    $events = stripcslashes($events);
    $date = stripcslashes($date);

    $sql = "INSERT INTO announcements (club_id,events,dates) VALUES ('$clubid','$events','$date')";
    if(mysqli_query($con, $sql)){
        echo "<script>";
        echo "alert('Announcement added');";
        echo "window.location.href='main.php';";
        echo "</script>";
        }
        else{
            echo "Error: " . $sql . "<br>" . $con->error;
        }
}
else{
    echo "<script>";
    echo "alert('Access denied');";
    echo "window.location.href='main.php';";
    echo "</script>";
}
?>