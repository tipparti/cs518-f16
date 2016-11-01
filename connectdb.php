<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root';
$dbname = 'cs518';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname); // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
?>
