<?php
$conn = new mysqli("localhost", "root", "", "test_db");
if ($conn->connect_error) die("Connection failed");

$result = $conn->query("SELECT * FROM users");
while ($row = $result->fetch_assoc()) {
    echo "ID: {$row['id']} | Name: {$row['name']} | Email: {$row['email']}<br>";
}
$conn->close();
?>
