<?php
session_start();
include 'db.php';

// Check if the user is logged in and is a Recipe Owner
if (!isset($_SESSION['id']) || $_SESSION['user_group'] != 3) {
    header("Location: signin.php");
    exit();
}

$user_id = $_SESSION['id'];

// Fetch the recipes of the logged-in user
$sql = "SELECT id, recipe_name, recipe_image, ingredients, instructions FROM recipes WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Owner Dashboard</title>
    <style>
        body {
            font-family: 'Comic Sans MS', cursive;
            background-color: #fff;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #411204;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .container {
            padding: 20px;
        }

        .recipes {
            margin: 20px 0;
        }

        .recipe-card {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }

        .recipe-card img {
            width: 100%;
            height: auto;
        }

        .add-recipe-button {
            display: block;
            margin: 20px 0;
            padding: 10px;
            background-color: #8B4513;
            color: #fff;
            text-decoration: none;
            text-align: center;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .add-recipe-button:hover {
            background-color: #654321;
        }

        .edit-recipe-link {
            display: inline-block;
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #8B4513;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .edit-recipe-link:hover {
            background-color: #654321;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Recipe Owner Dashboard</h1>
</div>

<div class="container">
    <a href="add_recipe.php" class="add-recipe-button">Add Recipe</a>

    <div class="recipes">
        <h2>Your Recipes</h2>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='recipe-card'>";
                echo "<img src='" . $row["recipe_image"] . "' alt='" . $row["recipe_name"] . "'>";
                echo "<h3>" . $row["recipe_name"] . "</h3>";
                echo "<p>Ingredients: " . $row["ingredients"] . "</p>";
                echo "<p>Instructions: " . $row["instructions"] . "</p>";
                echo "<a href='edit_recipe.php?id=" . $row["id"] . "' class='edit-recipe-link'>Edit Recipe</a>";
                echo "</div>";
            }
        } else {
            echo "<p>You have not added any recipes yet.</p>";
        }
        ?>
    </div>
</div>

</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
