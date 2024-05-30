<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "recipe_app";
$port = 3307; // Use the correct MySQL port

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Select the database
if (!$conn->select_db($dbname)) {
    die("Database selection failed: " . $conn->error);
}
?>
