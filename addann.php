<?php
if(isset($_POST['addann'])){
    session_start();
    include('db.php');
    $feeddata = $con->real_escape_string($_POST['feeddata']);
    $feeddata = stripcslashes($feeddata);
    $sql = "INSERT INTO ann (feed) VALUES ('$feeddata')";
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