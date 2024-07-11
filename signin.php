<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_group = $_POST['user_group']; // Fetch user_group from form

    // Fetch user data
    $sql = "SELECT id, password, user_group FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password is correct, start a session and store user ID and user group
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $username;
            $_SESSION['user_group'] = $row['user_group'];

            // Redirect based on user group
            if ($row['user_group'] == 1) {
                header("Location: dispUsers.php");
            } elseif ($row['user_group'] == 2) {
                header("Location: index.php");
            } elseif ($row['user_group'] == 3) {
                header("Location: recipe_owner_dashboard.php");
            }
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Invalid username.";
    }

    $conn->close();
}
?>
