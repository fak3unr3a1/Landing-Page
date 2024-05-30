<?php
include 'db.php';

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
        move_uploaded_file($_FILES["recipe_image"]["tmp_name"], $target_file);
    }

    $sql = "INSERT INTO recipes (recipe_name, ingredients, instructions, category_id, recipe_image)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $recipe_name, $ingredients, $instructions, $category_id, $target_file);

    if ($stmt->execute() === TRUE) {
        header("Location: add_recipe.php?status=success");
    } else {
        header("Location: add_recipe.php?status=error");
    }

    $stmt->close();
    $conn->close();
    exit();
}
?>
