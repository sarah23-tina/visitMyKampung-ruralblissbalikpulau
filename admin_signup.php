<?php
session_start();
include '../inc/db_connect.php'; // Connects to the database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role']; // New role field (admin or homestay_owner)
    $key = $_POST['key']; // Optional field

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match!'); window.location.href='signup.php';</script>";
        exit();
    }

    // Hash password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into signup table (added role column)
    $sql = "INSERT INTO signup (username, password, role) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $hashed_password, $role);

    if ($stmt->execute()) {
        echo "<script>alert('Registration Successful! Please login.'); window.location.href='admin_login.php';</script>";
    } else {
        echo "<script>alert('Error: Unable to register. Try again!'); window.location.href='signup.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
         * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            text-align: center;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow: auto;
            padding: 20px;
        }
        .container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 30px;
            width: 400px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
            text-align: left;
        }
        h2 {
            color: #ffcc00;
            margin-bottom: 20px;
            text-align: center;
        }
        label {
            display: block;
            font-size: 16px;
            margin: 10px 0 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            font-size: 16px;
            outline: none;
            transition: 0.3s;
        }
        input:focus {
            background: rgba(255, 255, 255, 0.3);
            border: 2px solid #ffcc00;
        }
        .role-options {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
            margin-bottom: 15px;
        }
        .role-options label {
            flex: 1 1 45%;
            display: flex;
            align-items: center;
            gap: 5px;
            background: rgba(255, 255, 255, 0.2);
            padding: 8px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: normal;
        }
        .role-options input[type="radio"] {
            accent-color: #ffcc00;
        }
        button {
            width: 100%;
            padding: 12px;
            margin-top: 15px;
            background: #ff7b00;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: #ffcc00;
            color: black;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Sign Up</h2>
    <form method="POST" action="">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter username" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter password" required>

        <label for="confirm_password">Confirm Password</label>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Re-enter password" required>

        <!-- New Radio Buttons for Role -->
        <label>Select Your Role</label>
        <div class="role-options">
            <label><input type="radio" name="role" value="admin" required> Admin</label>
            <label><input type="radio" name="role" value="homestay_owner" required> Homestay Owner</label>
            <label><input type="radio" name="role" value="stall_owner" required> Stall Owner</label>
            <label><input type="radio" name="role" value="food" required> Food Owner</label>
            <label><input type="radio" name="role" value="animal_park" required> Animal Park</label>
            <label><input type="radio" name="role" value="durian_orchard" required> Durian Orchard</label>
            <label><input type="radio" name="role" value="attraction_place" required> Attraction Place</label>
            <label><input type="radio" name="role" value="nature" required> Nature</label>
        </div>

        <label for="key">Key (Optional)</label>
        <input type="text" id="key" name="key" placeholder="Enter key">

        <button type="submit">SIGN-UP</button>
    </form>
</div>

</body>
</html>
