<?php
$servername = "feenix-mariadb.swin.edu.au";
$username = "s104852917";
$password = "200702";
$dbname = "s104852917_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>