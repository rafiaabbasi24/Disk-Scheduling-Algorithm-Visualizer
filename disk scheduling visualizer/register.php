<?php
$conn = new mysqli("localhost", "root", "", "disk_scheduling");

if ($conn->connect_error) die("Connection failed");

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $password);

if ($stmt->execute()) {
    header("Location: login.php");
} else {
    echo "Registration failed. Username may already exist.";
}

$conn->close();
?>
