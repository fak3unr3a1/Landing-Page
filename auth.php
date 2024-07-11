
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In / Sign Up</title>
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

        input[type="text"], input[type="password"], input[type="email"], input[type="submit"] {
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

        .switch {
            text-align: center;
        }

        .switch a {
            text-decoration: none;
            color: #8B4513;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Delicious Recipes</h1>
</div>

<div class="container" id="signin-container">
    <h2>Sign In</h2>
    <form action="signin.php" method="post" onsubmit="return signIn()">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Sign In">
    </form>
    <div class="switch">
        Don't have an account? <a href="#" id="signup-link">Sign Up</a>
    </div>
</div>

<!-- Add an input for profile image -->
<div class="container" id="signup-container" style="display: none;">
    <h2>Sign Up</h2>
    <form action="signup.php" method="post" enctype="multipart/form-data" onsubmit="return signUp()">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
        <input type="file" name="profile_image" accept="image/*">
        <select name="user_group" required>
            <option value="1">Admin</option>

            <option value="2">Client</option>
            <option value="3">Recipe Owner</option>
    </select>
        <input type="submit" value="Sign Up">
    </form>
    <div class="switch">
        Already have an account? <a href="#" id="signin-link">Sign In</a>
    </div>
</div>


<script>
    function signIn() {
        return true; // Allow form submission to signin.php
    }

    function signUp() {
        var password = document.querySelector('input[name="password"]').value;
        var confirm_password = document.querySelector('input[name="confirm_password"]').value;

        // if (password !== confirm_password) {
        //     alert("Passwords do not match");
        //     return false; // Prevent form submission
        // }
        return true; // Allow form submission to signup.php
    }

    document.getElementById('signup-link').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('signup-container').style.display = 'block';
        document.getElementById('signin-container').style.display = 'none';
    });

    document.getElementById('signin-link').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('signin-container').style.display = 'block';
        document.getElementById('signup-container').style.display = 'none';
    });
</script>


</body>
</html>
