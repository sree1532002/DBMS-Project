<?php
//print_r($_POST);
include('db.php');
session_start();
$roll_no = $_SESSION['rollno'];
$i = 0;
$message = htmlspecialchars($_POST["message"]);

$sql = "INSERT INTO chat(roll_no,message) VALUES('$roll_no','$message')";
if(mysqli_query($con, $sql)){
    $query = "SELECT * FROM chat";
    $result = mysqli_query($con,$query);
    while($row = mysqli_fetch_assoc($result)){
        if($i % 2 == 0){
            echo "<span style = 'background-color:#b8b5ff;border-radius:8px;padding:8px;float:left;margin:20px 10px;'>";
            echo $row['roll_no'].':'.$row['message'];echo '<br>';
            echo "<i style = 'font-size:10px;margin:7px;'>";
            echo $row['dt'];
            echo "</i></span>";
        }
        else{
            echo "<span style = 'background-color:#ffe3fe;border-radius:8px;padding:8px;float:right;margin:20px 10px;'>";
            echo $row['roll_no'].':'.$row['message'];echo '<br>';
            echo "<i style = 'font-size:10px;margin:7px;'>";
            echo $row['dt'];
            echo "</i></span>";
        } 
        $i++;
    };
}
else{
    echo "Error:  <br>" . $con->error;
}
?>
