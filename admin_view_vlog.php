<?php
include '../inc/db_connect.php'; 
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

// Fetch videos from the database
$query = "SELECT id, video_path, feedback FROM vlog_videos ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vlog Video</title>
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
            padding: 20px;
            position: relative;
            top: -10rem;
            width: 60%;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
            text-align: left;
        }
        h2 {
            color: #ffcc00;
            margin-bottom: 15px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            color: white;
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 12px;
            text-align: center;
        }
        th {
            background: rgba(255, 255, 255, 0.2);
            color: #ffcc00;
        }
        a {
            color: white;
            text-decoration: none;
            transition: 0.3s;
        }
        a:hover {
            color: #ffcc00;
        }
        .download-icon {
            font-size: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Vlog Video</h2>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Video Name</th>
             <th>Feedback</th>
            <th>Play</th>
            <th>Download</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (mysqli_num_rows($result) > 0) {
            $count = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                $video_path = $row['video_path'];
                $video_name = basename($video_path);
                $feedback = htmlspecialchars($row['feedback']); // Prevent XSS
                $video_id = $row['id'];
                echo "<tr>
                        <td>{$count}</td>
                        <td>{$video_name}</td>
                         <td>{$feedback}</td>
                        <td><a href='../vlog/{$video_path}' target='_blank'>▶ Play</a></td>
                        <td><a href='../vlog/{$video_path}' download='{$video_name}'><span class='download-icon'>⬇</span></a></td>
                       
                        <td>
                            <form method='POST' action='delete_video.php' onsubmit='return confirm(\"Are you sure to delete this video?\")'>
                                <input type='hidden' name='id' value='{$video_id}'>
                                <button type='submit' style='background:red;color:white;border:none;padding:5px 10px;border-radius:5px;cursor:pointer;'>Delete</button>
                            </form>
                        </td>
                      </tr>";
                $count++;
            }
        } else {
            echo "<tr><td colspan='6'>No videos uploaded yet.</td></tr>";
        }
        ?>
    </tbody>
</table>
    </div>
    <br><br>
</body>
</html>
