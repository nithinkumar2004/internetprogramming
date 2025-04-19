<?php
// store.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Validation
    if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        die("Invalid name.");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email.");
    }

    // Database connection
    $conn = new mysqli("localhost", "root", "", "test"); // Replace with your credentials
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepared statement to prevent SQL injection
    $sql = $conn->prepare("INSERT INTO employees (name, email) VALUES (?, ?)");
    $sql->bind_param("ss", $name, $email);

    if ($sql->execute()) {
        echo "Record inserted successfully!";
    } else {
        echo "Error: " . $sql->error;
    }

    $sql->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Form</title>
</head>
<body>
    <form action="store.php" method="post">
        Name: <input type="text" name="name"><br>
        Email: <input type="email" name="email"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>