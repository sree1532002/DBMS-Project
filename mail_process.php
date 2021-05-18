<?php
    session_start();
    include 'db.php';
    $uname = $_SESSION['uname'];
    $clubno = $_SESSION['clubno'];

    $sql = "SELECT name,email FROM signup WHERE uname = '$uname'";
    $sql1 = "SELECT id FROM club$clubno WHERE uname = '$uname' AND interested = 1";

    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);

    $email = $row['email'];
    $name = $row['name'];

    $result1 = $con->query($sql1);
    $count = $result1->num_rows;

    if($count > 0){
        echo "<script>";
        echo "alert('Mail has been already sent!');";
        echo "window.location.href='main.php';";
        echo "</script>";
    }
    else{
        mysqli_query($con,"insert into club$clubno (uname,interested) values ('$uname',1)") or die(mysqli_error());
        
        $to = $email;
        $subject = "Hello".$name;
        $txt = "You will be contacted soon by our organizers regarding auditions";
        $headers = "From: collegeclubs446@gmail.com" . "\r\n";

        if(mail($to,$subject,$txt,$headers)){
            echo "<script>";
            echo "alert('Mail sent');";
            echo "window.location.href='main.php';";
            echo "</script>";
        }
        else{
            echo "<script>";
            echo "alert('Mail not sent');";
            echo "window.location.href='main.php';";
            echo "</script>";
        }

    }
?>