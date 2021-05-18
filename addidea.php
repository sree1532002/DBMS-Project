<?php
if(isset($_POST['addidea'])){
    session_start();
    include('db.php');
    $uname = $con->real_escape_string($_POST['uname']);
    $uname = stripcslashes($uname);
    $idea = $con->real_escape_string($_POST['idea']);
    $idea = stripcslashes($idea);
    $clubno = $con->real_escape_string($_POST['clubno']);
    $loc = 'club'.$clubno.'.php';
    $sql = "INSERT INTO club$clubno (uname, idea) VALUES ('$uname', '$idea')";
    if(mysqli_query($con, $sql)){
        echo "<script>";
        echo "alert('Idea sent!!');";
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