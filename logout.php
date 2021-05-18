<?php
session_start();
if(isset($_SESSION['login'])){
    unset($_SESSION['uname']);
    unset($_SESSION['login']);
}
echo '<script>window.location.href="index.php";</script>';
?>
