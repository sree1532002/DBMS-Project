<?php
function connect() {
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'phppoll';
    try {
    	return new PDO('mysql:host=' . $host . ';dbname=' . $database . ';charset=utf8', $user, $password);
    } catch (PDOException $exception) {
    	die ('Failed to connect to database!');
    }
}
?>