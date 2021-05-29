<?php
include('db.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    $roll_no = $_SESSION['rollno'];
    echo $roll_no;
    if(isset($_POST['send'])){
        $message = $con->real_escape_string($_POST['message']);
        $sql = "INSERT INTO chat(roll_no,message) VALUES('$roll_no','$message')";
        if(mysqli_query($con, $sql))
        {
            echo 'Message sent';
        }
        else{
            echo "Error:  <br>" . $con->error;
        }
    }
    else{
        echo "<script>";
        echo "alert('Access Denied');";
        echo "window.location.href = 'chat.php';";
        echo "</script>";
    }
}
else{
        echo "<script>";
        echo "alert('Access Denied');";
        echo "window.location.href = 'chat.php';";
        echo "</script>";
}
?>