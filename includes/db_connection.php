<?php
$servername ="localhost";
$username ="root";
$password ="192003SP@Rx";
$dbname ="newspaper";
// $port = 3307;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
