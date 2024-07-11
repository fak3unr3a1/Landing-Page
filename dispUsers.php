<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "recipe_app";
$port = 3307; // Use the correct MySQL port

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch users
$sql = "SELECT id, username, email FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users List</title>
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
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff7f2; 
      border-radius: 10px;
      box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    table, th, td {
      border: 1px solid #ddd;
    }

    th, td {
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #411204;
      color: #fff;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    tr:hover {
      background-color: #ddd;
    }

    .no-users {
      text-align: center;
      margin-top: 20px;
      color: #f00;
    }
  </style>
</head>
<body>
  
  <div class="header">
    <h1>Users List</h1>
  </div>

  <div class="container">
    <?php
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Username</th><th>Email</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='no-users'>No users found.</p>";
    }
    $conn->close();
    ?>
  </div>

</body>
</html>
