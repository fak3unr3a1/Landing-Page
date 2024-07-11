<?php
include 'db.php';

// Check if ID is set
if (!isset($_GET['id'])) {
    die("ID not specified.");
}

$id = $_GET['id'];

// Fetch the existing recipe
$sql = "SELECT recipe_name, ingredients, instructions, category_id, recipe_image FROM recipes WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows != 1) {
    die("Recipe not found.");
}

$recipe = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Recipe</title>
    <style>
        /* Your existing styles here */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Comic Sans MS', cursive; 
            background-color: #fff; 
        }
        /* Form container styling */
        .form-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff7f2; 
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
        /* Form input styling */
        .form-container label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
        }
        .form-container input[type="text"],
        .form-container textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }
        .form-container textarea {
            resize: vertical;
        }
        .form-container img {
            max-width: 100%;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .form-container input[type="file"] {
            margin-bottom: 15px;
        }
        .form-container input[type="submit"] {
            background-color: #8B4513;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 1.2em;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .form-container input[type="submit"]:hover {
            background-color: #654321; 
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Edit Recipe</h1>
        <form action="update_recipe.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="recipe_name">Recipe Name:</label>
            <input type="text" name="recipe_name" value="<?php echo $recipe['recipe_name']; ?>" required><br>

            <label for="ingredients">Ingredients:</label>
            <textarea name="ingredients" rows="5" required><?php echo $recipe['ingredients']; ?></textarea><br>

            <label for="instructions">Instructions:</label>
            <textarea name="instructions" rows="5" required><?php echo $recipe['instructions']; ?></textarea><br>

            <label for="category_id">Category ID:</label>
            <input type="text" name="category_id" value="<?php echo $recipe['category_id']; ?>" required><br>

            <label for="recipe_image">Recipe Image:</label>
            <input type="file" name="recipe_image" accept="image/*"><br>
            <img src="<?php echo $recipe['recipe_image']; ?>" alt="Recipe Image"><br>

            <input type="submit" value="Update Recipe">
        </form>
    </div>
</body>
</html>
