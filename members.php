<?php
session_start();
require_once('PHPMailer/PHPMailerAutoload.php');
if(isset($_REQUEST['roll_no'])) {
    $roll_no = $_REQUEST['roll_no'];
    $accepted_status = $_REQUEST['accepted_status'];
    $club_id = $_REQUEST['club_id'];
    include "db.php";
    if($accepted_status==1) {
        $query = "UPDATE users SET accepted_status=0 where roll_no=$roll_no and club_id=$club_id";
    }else{
        $query = "UPDATE users SET accepted_status=1 where roll_no=$roll_no and club_id=$club_id";
        $sql = "SELECT email from signup where roll_no = $roll_no";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);
        $email = $row['email'];
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '465';
        $mail->isHTML();
        $mail->Username = 'collegeclubs446@gmail.com';
        $mail->Password = 'college@123!';
        $mail->SetFrom('no-reply@howcode.org');
        $mail->Subject = 'Welcome to Uniclub';
        $mail->Body = 'Audition details will be sent soon. Stay tuned. All the best!!';
        $mail->AddAddress($email);

        if($mail->Send()){
            echo "<script>";
            echo "alert('Mail successfully sent');";
            echo "window.location.href='main.php';";
            echo "</script>";

        }
    }
    if($con->query($query)){
        
    }else{
        echo "Error Updating record: " . $con->error;
    }

    $con->close();
}else{
    echo "<script>";
    echo "alert('Access Denied');";
    echo "window.location.href = 'index.php';";
    echo "</script>";
}