<?php
session_start();
if (isset($_POST['signup'])) {
  include('db.php');
  $name = $con->real_escape_string($_POST['name']);
  $year = $con->real_escape_string($_POST['year']);
  $dept = $con->real_escape_string($_POST['dept']);
  $email = $con->real_escape_string($_POST['email']);
  $uname = $con->real_escape_string($_POST['uname']);
  $pword = $con->real_escape_string($_POST['pword']);
  $_SESSION['uname']=$uname;
  $_SESSION['login'] = 1;
  $name = stripcslashes($name);
  $year = stripcslashes($year);
  $dept = stripcslashes($dept);
  $email = stripcslashes($email);
  $uname = stripcslashes($uname);
  $pword = stripcslashes($pword);
  $sql0 = "SELECT * FROM signup WHERE uname = '$uname'";
  $result = $con->query($sql0);
  $count = $result->num_rows;
  if($count > 0){
    echo "<script>";
    echo "alert('Username already exists!!');";
    echo "window.location.href='main.php';";
    echo "</script>";
  }
  else{
  $sql = "INSERT INTO signup(name,year,dept,email,uname,pword) VALUES ('$name', '$year', '$dept', '$email', '$uname', '$pword')";
  $sql1 = "INSERT INTO login(uname, pword) VALUES ('$uname', '$pword')";
  if(mysqli_query($con, $sql))
  {
    echo "<script>";
    echo "alert('Signup successful!');";
    echo "</script>";
    if(mysqli_query($con, $sql1)){
        echo "<script>";
        echo "window.location.href='main.php';";
        echo "</script>";
    }
    else{
        echo "Error: " . $sql . "<br>" . $con->error;
      }
  }
  else{
    echo "Error: " . $sql . "<br>" . $con->error;
  }
}
}
else{
    echo "<script>";
    echo "alert('Access denied');";
    echo "window.location.href='main.php';";
    echo "</script>";
}
?>
