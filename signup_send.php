<?php
session_start();
if (isset($_POST['signup'])) {
  include('db.php');
  $rollno = $con->real_escape_string($_POST['rollno']);
  $name = $con->real_escape_string($_POST['name']);
  $year = $con->real_escape_string($_POST['year']);
  $dept = $con->real_escape_string($_POST['dept']);
  $email = $con->real_escape_string($_POST['email']);
  $pword = $con->real_escape_string($_POST['pword']);
  $phone = $con->real_escape_string($_POST['phone']);

  $_SESSION['rollno'] = $rollno;
  $_SESSION['login'] = 1;

  $rollno = stripcslashes($rollno);
  $name = stripcslashes($name);
  $year = stripcslashes($year);
  $dept = stripcslashes($dept);
  $email = stripcslashes($email);
  $pword = stripcslashes($pword);
  $phone = stripcslashes($phone);

  $sql0 = "SELECT * FROM signup WHERE rollno = '$rollno'";

  $result = $con->query($sql0);
  if($result != NULL){
    $count = mysqli_num_rows($result);

  if($count > 0){
    echo "<script>";
    echo "alert('Username already exists!!');";
    echo "window.location.href='index.php';";
    echo "</script>";
  }
}
  else{
  $sql = "INSERT INTO signup(roll_no,name,year,dept,email,pword,phone) VALUES ('$rollno','$name', '$year', '$dept', '$email', '$pword','$phone')";

  if(mysqli_query($con, $sql))
  {
    echo "<script>";
    echo "alert('Signup successful!');";
    echo "window.location.href='main.php';";
    echo "</script>";
  }
  else{
    echo "Error: " . $sql . "<br>" . $con->error;
  }
}
}
else{
    echo "<script>";
    echo "alert('Access denied');";
    echo "window.location.href='index.php';";
    echo "</script>";
}
?>
