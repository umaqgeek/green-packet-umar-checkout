<?php
// development
// $dbhost = "localhost";
// $dbuser = "root";
// $dbpass = "";
// $dbname = "paygate_greenpacket_db";

// production
$dbhost = "tj5iv8piornf713y.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$dbuser = "yxvw19x64x9huqqz";
$dbpass = "t8d09ank81pcj9ox";
$dbname = "lyaawaqt6soek49l";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
