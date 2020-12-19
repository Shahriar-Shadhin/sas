<?php
// session_start();
$serverName = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'sas_db';

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);
mysqli_set_charset($conn, 'utf8');

if (!$conn) {
    
    die('Connection faild :' . mysqli_connect_error());
    header('Location: ./index.php');
}



?>
