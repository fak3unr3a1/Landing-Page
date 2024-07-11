<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $recipe_name = $_POST['recipe_name'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];
    $category_id = $_POST['category_id'];

    // Handle file upload
    $target_file = $_POST['existing_image'];
    if (isset($_FILES['recipe_image']) && $_FILES['recipe_image']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["recipe_image"]["name"]);
        move_uploaded_file($_FILES["recipe_image"]["tmp_name"], $target_file);
    }

    $sql = "UPDATE recipes SET recipe_name = ?, ingredients = ?, instructions = ?, category_id = ?, recipe_image = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $recipe_name, $ingredients, $instructions, $category_id, $target_file, $id);

    if ($stmt->execute() === TRUE) {
        // Close statement and database connection if necessary
        $stmt->close();
        $conn->close();

        // Redirect based on user group
        session_start();
        if ($_SESSION['user_group'] == 2) {
            header("Location: index.php?status=success");
        } elseif ($_SESSION['user_group'] == 3) {
            header("Location: recipe_owner_dashboard.php?status=success");
        } else {
            header("Location: index.php?status=error");
        }
        exit();
    } else {
        // Handle error case
        $stmt->close();
        $conn->close();
        session_start();
        if ($_SESSION['user_group'] == 2) {
            header("Location: index.php?status=error");
        } elseif ($_SESSION['user_group'] == 3) {
            header("Location: recipe_owner_dashboard.php?status=error");
        } else {
            header("Location: index.php?status=error");
        }
        exit();
    }
}
?>
