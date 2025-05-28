<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "test_db";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$table = "users";
$columns = "
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
";

$sql = "CREATE TABLE IF NOT EXISTS $table ($columns)";
if ($conn->query($sql)) echo "Table created.";
else echo "Error: " . $conn->error;

$conn->close();
?>
