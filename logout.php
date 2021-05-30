<?php
session_start();
if(isset($_SESSION['login'])){
    unset($_SESSION['uname']);
    unset($_SESSION['login']);
    unset($_SESSION['admin']);
    unset($_SESSION['rollno']);
    unset($_SESSION['club']);
}
echo '<script>window.location.href="index.php";</script>';
?>
