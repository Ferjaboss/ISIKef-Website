<?php

$servername = "localhost";
$username = "root";
$db_password = ""; 
$dbname = "isik";

$conn = mysqli_connect($servername, $username, $db_password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
