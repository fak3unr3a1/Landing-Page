<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_name = $_POST['category_name'];

    $sql = "INSERT INTO categories (category_name) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $category_name);

    if ($stmt->execute() === TRUE) {
        header("Location: add_recipe.php?status=success&type=category");
    } else {
        header("Location: add_recipe.php?status=error&type=category");
    }

    $stmt->close();
    $conn->close();
    exit();
}
?>
