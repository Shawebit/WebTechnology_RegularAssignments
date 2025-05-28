<?php
$conn = new mysqli("localhost", "root", "", "test_db");
$id = $_GET['id'];
$conn->query("DELETE FROM users WHERE id=$id");
header("Location: dashboard.php");
?>
