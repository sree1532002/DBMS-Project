<?php
if (isset($_POST['update'])){
    include 'db.php';
    $uname = $con->real_escape_string($_POST['uname']);
    $clubno = $con->real_escape_string($_POST['clubno']);
    $loc = 'club'.$clubno.'.php';
    $sql = "UPDATE club1 SET member = 1 WHERE uname = '$uname'";
    if(mysqli_query($con, $sql)){
        echo "<script>";
        echo "alert('Updated successfully');";
        echo "window.location.href= '$loc' ;";
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