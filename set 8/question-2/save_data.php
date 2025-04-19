<?php
$name = $_POST['name'];
$email = $_POST['email'];

if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
    die("Invalid name");
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email");
}

$conn = new mysqli("localhost", "root", "", "college_db");
if ($conn->connect_error) {
    die("DB Connection Failed: " . $conn->connect_error);
}

$sql = "INSERT INTO students (name, email) VALUES ('$name', '$email')";
if ($conn->query($sql) === TRUE) {
    echo "Student data saved successfully!";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>
