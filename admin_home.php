<?php
include '../inc/db_connect.php'; 
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

// Fetch current content
$query = "SELECT * FROM home_content WHERE id = 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $subtitle = mysqli_real_escape_string($conn, $_POST['subtitle']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $audio_path = mysqli_real_escape_string($conn, $_POST['audio_path']);

    $updateQuery = "UPDATE home_content SET title='$title', subtitle='$subtitle', description='$description', audio_path='$audio_path' WHERE id=1";
    if (mysqli_query($conn, $updateQuery)) {
        echo "<script>alert('Home page updated successfully!'); window.location.href='admin_home.php';</script>";
        exit();
    } else {
        echo "Error updating content: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Home Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            overflow: hidden;
        }
        .container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 30px;
            width: 50%;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
            text-align: left;
        }
        h2 {
            color: #ffcc00;
            margin-bottom: 15px;
            text-align: center;
        }
        label {
            display: block;
            font-size: 16px;
            margin: 10px 0 5px;
            font-weight: bold;
            text-align: left;
        }
        input, textarea {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            font-size: 16px;
            outline: none;
            transition: 0.3s;
        }
        input:focus, textarea:focus {
            background: rgba(255, 255, 255, 0.3);
            border: 2px solid #ffcc00;
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
        <h2><i class="fas fa-edit"></i> Edit Home Page Content</h2>
        <form action="" method="POST">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" required>

            <label for="subtitle">Subtitle:</label>
            <input type="text" id="subtitle" name="subtitle" value="<?php echo htmlspecialchars($row['subtitle']); ?>" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="5" required><?php echo htmlspecialchars($row['description']); ?></textarea>

            <label for="audio_path">Audio File Name:</label>
            <input type="text" id="audio_path" name="audio_path" value="<?php echo htmlspecialchars($row['audio_path']); ?>">

            <button type="submit"><i class="fas fa-save"></i> Update</button>
        </form>
    </div>
</body>
</html>
