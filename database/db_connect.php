<?php
$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your database username
$password = "Miggyuy102295"; // Replace with your database password
$dbname = "project_lightspeed"; // Replace with your database name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>