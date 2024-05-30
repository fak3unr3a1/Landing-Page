<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $profile_image = $_FILES['profile_image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($profile_image);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if passwords match
    if ($password != $confirm_password) {
        echo "Passwords do not match.";
        exit();
    }

    // Check if uploads directory exists and create if not
    if (!is_dir($target_dir)) {
        if (!mkdir($target_dir, 0777, true)) {
            die("Failed to create uploads directory.");
        }
    }

    // Upload profile image
    if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file)) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Check if the username already exists
        $sql = "SELECT id FROM users WHERE username='$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "Username already exists.";
            exit();
        }

        // Insert user data
        $sql = "INSERT INTO users (username, email, password, profile_image) VALUES ('$username', '$email', '$hashed_password', '$profile_image')";

        if ($conn->query($sql) === TRUE) {
            echo "New user registered successfully";
            header("Location: index.html"); // Redirect to home page after successful registration
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $conn->close();
}
?>
