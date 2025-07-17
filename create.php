<?php
include '../inc/db_connect.php';

$username = "admin";
$password = password_hash("admin123", PASSWORD_DEFAULT); // Encrypt password

$query = "INSERT INTO admin_users (username, password) VALUES ('$username', '$password')";

if ($conn->query($query) === TRUE) {
    echo "Admin user created successfully!";
} else {
    echo "Error: " . $conn->error;
}
?>
