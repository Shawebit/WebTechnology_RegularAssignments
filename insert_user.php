<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "test_db";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$name = "John Doe";
$email = "john@example.com";
$password = password_hash("secret", PASSWORD_DEFAULT);

$sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $password);
$stmt->execute();

echo "User inserted.";
$stmt->close();
$conn->close();
?>
