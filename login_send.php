<?php
session_start();
if (isset($_POST['login'])){
    include('db.php');
    $uname = $con->real_escape_string($_POST['uname']);
    $pword = $con->real_escape_string($_POST['pword']);
    $sql = "SELECT * FROM signup WHERE uname = '$uname' AND pword = '$pword'";
    $sql1 = "SELECT * FROM admin WHERE uname = '$uname' AND pword = '$pword'";
    $result = $con->query($sql);
    $result1 = $con->query($sql1);
    $count = $result->num_rows;
    $count1 = $result1->num_rows;
    if($count == 1){
      $_SESSION["uname"] = $uname ;
      $_SESSION['login'] = 1;
      $sql = "INSERT INTO login(uname, pword) VALUES ('$uname', '$pword')";
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
        $_SESSION["uname"] = $uname ;
        $_SESSION['login'] = 2;
        $sql1 = "INSERT INTO login(uname, pword) VALUES ('$uname', '$pword')";
        if(mysqli_query($con, $sql1)){
            echo "<script>";
            echo "alert('Login successful!');";
            echo "window.location.href='main.php';";
            echo "</script>";
        }
        else{
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
    else {
        echo "<script>";
        echo "alert('Invalid username or password');";
        echo "window.location.href='main.php';";
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
