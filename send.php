<?php
//print_r($_POST);
include('db.php');
session_start();
$roll_no = $_SESSION['rollno'];

$message = htmlspecialchars($_POST["message"]);

$sql = "INSERT INTO chat(roll_no,message) VALUES('$roll_no','$message')";
if(mysqli_query($con, $sql))
{
    $query = "SELECT * FROM chat";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo "<ul>";
    foreach($row as $r){
    echo "$r[roll_no] || $r[dt] || $r[message]";
    echo '<br><br>';
    };
}
else{
    echo "Error:  <br>" . $con->error;
}

?>