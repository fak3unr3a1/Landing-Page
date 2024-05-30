
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];
    $user_image = $_FILES['user_image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["user_image"]["name"]);

    // Save image to server
    move_uploaded_file($_FILES["user_image"]["tmp_name"], $target_file);

    // Create database connection
    $conn = new mysqli('localhost', 'root', '', 'recipe_app');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert user data
    $sql = "INSERT INTO users (username, password, email, user_image) VALUES ('$username', '$password', '$email', '$user_image')";

    if ($conn->query($sql) === TRUE) {
        echo "New user registered successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
