<?php
if(!isset($_SESSION['id'])){
    header('location:login.php');
}

$host_name = 'localhost';
$host_username = 'root';
$host_password = '';
$db_name = 'election';

$db_connect = mysqli_connect($host_name, $host_username, $host_password, $db_name);
?>