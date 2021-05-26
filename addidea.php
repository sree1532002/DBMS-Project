<?php
if(isset($_POST['addidea'])){
    session_start();
    include('db.php');
    $rollno = $con->real_escape_string($_POST['rollno']);
    $rollno = stripcslashes($rollno);
    $idea = $con->real_escape_string($_POST['idea']);
    $idea = stripcslashes($idea);
    $clubno = $con->real_escape_string($_POST['clubno']);
    $sql = "INSERT INTO ideas (club_id,idea,roll_no) VALUES ('$clubno', '$idea','$rollno')";
    if(mysqli_query($con, $sql)){
        echo "<script>";
        echo "alert('Idea sent!');";
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