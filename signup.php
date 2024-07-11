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
    $user_group = $_POST['user_group'];

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

        // Use prepared statement to insert user data
        $sql = "INSERT INTO users (username, email, password, profile_image, user_group) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Bind parameters to statement
        $stmt->bind_param("ssssi", $username, $email, $hashed_password, $profile_image, $user_group);

        if ($stmt->execute()) {
            // Start session and store user ID, username, and user group
            session_start();
            $_SESSION['id'] = $stmt->insert_id;
            $_SESSION['username'] = $username;
            $_SESSION['user_group'] = $user_group;

            // Redirect based on user group
            if ($user_group == 2) {
                header("Location: index.php");
            } elseif ($user_group == 3) {
                header("Location: recipe_owner_dashboard.php");
            }
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $conn->close();
}
?>
