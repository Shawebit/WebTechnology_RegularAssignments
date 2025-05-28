<?php
$conn = new mysqli("localhost", "root", "", "test_db");
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $stmt = $conn->prepare("UPDATE users SET name=?, email=? WHERE id=?");
    $stmt->bind_param("ssi", $name, $email, $id);
    $stmt->execute();
    header("Location: dashboard.php");
}

$result = $conn->query("SELECT * FROM users WHERE id=$id")->fetch_assoc();
?>
<form method="POST">
    Name: <input name="name" value="<?= $result['name'] ?>"><br>
    Email: <input name="email" value="<?= $result['email'] ?>"><br>
    <button>Update</button>
</form>
