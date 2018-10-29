<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "paygate_greenpacket_db";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
