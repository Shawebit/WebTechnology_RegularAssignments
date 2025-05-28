<?php
header("Content-Type: application/json");
$method = $_SERVER['REQUEST_METHOD'];
$conn = new mysqli("localhost", "root", "", "test_db");

switch ($method) {
    case 'GET':
        $result = $conn->query("SELECT * FROM users");
        $rows = [];
        while ($row = $result->fetch_assoc()) $rows[] = $row;
        echo json_encode($rows);
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        $name = $data['name'];
        $email = $data['email'];
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $password);
        $stmt->execute();
        echo json_encode(["message" => "User Created"]);
        break;

    case 'PUT':
        parse_str(file_get_contents("php://input"), $data);
        $id = $data['id'];
        $name = $data['name'];
        $email = $data['email'];
        $stmt = $conn->prepare("UPDATE users SET name=?, email=? WHERE id=?");
        $stmt->bind_param("ssi", $name, $email, $id);
        $stmt->execute();
        echo json_encode(["message" => "User Updated"]);
        break;

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $data);
        $id = $data['id'];
        $conn->query("DELETE FROM users WHERE id=$id");
        echo json_encode(["message" => "User Deleted"]);
        break;

    default:
        echo json_encode(["message" => "Unsupported Method"]);
}
$conn->close();
?>
