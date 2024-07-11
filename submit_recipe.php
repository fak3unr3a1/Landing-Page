<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $recipe_name = $_POST['recipe_name'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];
    $category_id = $_POST['category_id'];
    $user_id = $_POST['id']; // Assuming this is the logged-in user's ID

    // Handle file upload
    $target_file = null;
    if (isset($_FILES['recipe_image']) && $_FILES['recipe_image']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["recipe_image"]["name"]);
        move_uploaded_file($_FILES["recipe_image"]["tmp_name"], $target_file);
    }

    // Prepare and execute the SQL query
    $sql = "INSERT INTO recipes (recipe_name, ingredients, instructions, category_id, recipe_image, user_id)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $recipe_name, $ingredients, $instructions, $category_id, $target_file, $user_id);

    if ($stmt->execute()) {
        header("Location: add_recipe.php?status=success");
        exit();
    } else {
        header("Location: add_recipe.php?status=error");
        // Optionally, you can log the error for debugging
        // echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
