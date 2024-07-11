<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "recipe_app";
$port = 3307;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, recipe_name, recipe_image, ingredients, instructions FROM recipes";
$result = $conn->query($sql);

$recipes = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $recipes[] = $row;
    }
} else {
    $error = "No recipes found.";
}

$conn->close();
?>
