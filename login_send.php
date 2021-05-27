<?php
session_start();
if (isset($_POST['login'])){
    include('db.php');
    $rollno = $con->real_escape_string($_POST['rollno']);
    $pword = $con->real_escape_string($_POST['pword']);
    $sql = "SELECT * FROM signup WHERE roll_no = '$rollno' AND pword = '$pword'";
    $sql1 = "SELECT * FROM admin WHERE roll_no = '$rollno' AND pword = '$pword'";
    $result = $con->query($sql);
    $result1 = $con->query($sql1);
    $count = $result->num_rows;
    $count1 = $result1->num_rows;
    if($count == 1){
      $res = mysqli_fetch_assoc($result);
      $_SESSION['club'] = $res['club_id'];
      $_SESSION["rollno"] = $rollno ;
      $_SESSION['login'] = 1;
      $sql = "INSERT INTO login(roll_no, pword) VALUES ('$rollno', '$pword')";
      if(mysqli_query($con, $sql)){
        echo "<script>";
        echo "alert('Login successful!');";
        echo "window.location.href='main.php';";
        echo "</script>";
        }
        else{
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
    else if($count1 == 1){
        $res = mysqli_fetch_assoc($result1);
        $_SESSION['club'] = $res['club_id'];
        $_SESSION["rollno"] = $rollno ;
        $_SESSION['login'] = 2;
        echo "<script>";
        echo "alert('Admin login successful!');";
        echo "window.location.href='main.php';";
        echo "</script>";
    }
    else {
        echo "<script>";
        echo "alert('Invalid username or password');";
        echo "window.location.href='index.php';";
        echo "</script>";
    }
  }
  else{
    echo "<script>";
    echo "alert('Access denied');";
    echo "window.location.href='index.php';";
    echo "</script>";
}
?>
