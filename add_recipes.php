<?php
include 'db.php';

$alertMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $recipe_name = $_POST['recipe_name'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];
    $category_id = $_POST['category_id'];

    // Handle file upload
    $target_file = null;
    if (isset($_FILES['recipe_image']) && $_FILES['recipe_image']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["recipe_image"]["name"]);
        if (!move_uploaded_file($_FILES["recipe_image"]["tmp_name"], $target_file)) {
            $alertMessage = "Error uploading file.";
        }
    }

    $sql = "INSERT INTO recipes (recipe_name, ingredients, instructions, category_id, recipe_image)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssis", $recipe_name, $ingredients, $instructions, $category_id, $target_file);

    if ($stmt->execute()) {
        $alertMessage = "New recipe added successfully.";
    } else {
        $alertMessage = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
