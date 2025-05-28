<?php
session_start();
require_once 'db_config.php';

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - User Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <nav class="nav">
            <a href="dashboard.php">Dashboard</a>
            <a href="profile.php">Profile</a>
            <a href="logout.php">Logout</a>
        </nav>

        <div class="card">
            <h2>Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h2>
            
            <div style="margin: 20px 0;">
                <h3>Your Profile Information</h3>
                <table>
                    <tr>
                        <th>Name</th>
                        <td><?php echo htmlspecialchars($user['name']); ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                    </tr>
                    <tr>
                        <th>Member Since</th>
                        <td><?php echo date('F j, Y', strtotime($user['created_at'])); ?></td>
                    </tr>
                </table>
            </div>

            <div class="form-group">
                <a href="edit_profile.php" class="btn">Edit Profile</a>
                <a href="change_password.php" class="btn" style="margin-left: 10px;">Change Password</a>
            </div>
        </div>
    </div>
</body>
</html>
