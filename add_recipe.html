<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Recipe</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Comic Sans MS', cursive;
            background-color: #fff;
        }

        .header {
            background-color: #411204;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            margin: 50px auto;
        }

        h2 {
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="text"], input[type="file"], textarea, select, input[type="submit"] {
            margin-bottom: 10px;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #8B4513;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #654321;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Delicious Recipes</h1>
    <button onclick="location.href='index.html';">Return home</button>
</div>

<div class="container" id="recipe-container">
    <h2>Add Recipe</h2>
    <form action="add_recipe.php" method="post" enctype="multipart/form-data">
        <input type="text" name="recipe_name" placeholder="Recipe Name" required>
        <input type="file" name="recipe_image" accept="image/*">
        <textarea name="ingredients" placeholder="Ingredients" required></textarea>
        <textarea name="instructions" placeholder="Instructions" required></textarea>
        <select name="category_id" required>
            <!-- Dynamically populate categories -->
            <?php
            include 'db.php';
            $sql = "SELECT id, category_name FROM categories";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['category_name'] . "</option>";
                }
            } else {
                echo "<option value=''>No categories available</option>";
            }
            $conn->close();
            ?>
        </select>
        <input type="submit" value="Add Recipe">
    </form>
</div>

</body>
</html>
