<?php
require 'db.php'; // Database connection file

if (isset($_GET['email'])) {
    $email = trim($_GET['email']);

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "invalid";
        exit;
    }

    // Use prepared statement to prevent SQL injection
    $stmt = $con->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    echo ($count > 0) ? "exist" : "available";
}
?>
