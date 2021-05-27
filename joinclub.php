<?php
include('db.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //print_r($_POST);
        $club = $con->real_escape_string($_POST['club']);
        $rollno = $con->real_escape_string($_POST['rollno']);
        $sql = "INSERT INTO users (club_id,roll_no,interested_status) VALUES('$club','$rollno',1)";
        
        $sql1 = "SELECT * FROM users WHERE club_id = '$club' AND roll_no = '$rollno'";
        $result = mysqli_query($con, $sql1);
        $rowcount = mysqli_num_rows($result);
        if($rowcount == 1){
            echo "<script>";
            echo "alert('You have already applied for the club');";
            echo "window.location.href = 'main.php';";
            echo "</script>";
        }
        else{
            if(mysqli_query($con, $sql))
            {
                echo "<script>";
                echo "alert('You will be contacted soon by our club organizers');";
                echo "window.location.href = 'main.php';";
                echo "</script>";
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