<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

include '../inc/db_connect.php'; // Database connection

// Fetch current content
$query = "SELECT content FROM about_page WHERE id = 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$current_content = $row['content'] ?? '';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_content = mysqli_real_escape_string($conn, $_POST['about_content']);
    $update_query = "UPDATE about_page SET content = '$new_content' WHERE id = 1";
    mysqli_query($conn, $update_query);
    header("Location: admin_about.php"); // Refresh to show updated content
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit About Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            max-width: 700px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
        }
        h1 {
            color: #ffcc00;
            text-align: center;
            margin-bottom: 20px;
        }
        textarea {
            width: 100%;
            height: 250px;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            border-radius: 8px;
            color: white;
            padding: 12px;
            font-size: 16px;
            outline: none;
            transition: 0.3s;
            resize: none;
        }
        textarea:focus {
            background: rgba(255, 255, 255, 0.3);
            border: 2px solid #ffcc00;
        }
        .btn-custom {
            width: 100%;
            padding: 12px;
            background: #ff7b00;
            border: none;
            color: white;
            font-size: 18px;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }
        .btn-custom:hover {
            background: #ffcc00;
            color: black;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1><i class="fas fa-edit"></i> Edit About Page</h1>
        <form method="post">
            <textarea name="about_content"><?php echo htmlspecialchars($current_content); ?></textarea>
            <button type="submit" class="btn btn-custom mt-3"><i class="fas fa-save"></i> Save Changes</button>
        </form>
    </div>

</body>
</html>
