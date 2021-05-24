<?php
session_start();
require_once('PHPMailer/PHPMailerAutoload.php');
$email = $_SESSION['mail'];
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
$mail->Subject = 'Welcome to uniclub';
$mail->Body = 'Audition details will be sent soon.';
$mail->AddAddress($email);

if($mail->Send()){
    echo "<script>";
    echo "alert('Mail successfully sent');";
    echo "window.location.href='main.php';";
    echo "</script>";

}

?>