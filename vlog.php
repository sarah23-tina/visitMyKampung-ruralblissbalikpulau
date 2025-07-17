<?php
include '../inc/side_nav_bar.php';
include '../inc/db_connect.php';

// Handle video upload with feedback
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['video'])) {
    $target_dir = "uploads/videos/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $file_name = basename($_FILES['video']['name']);
    $target_file = $target_dir . $file_name;
    $feedback = mysqli_real_escape_string($conn, $_POST['feedback']);

    if (move_uploaded_file($_FILES['video']['tmp_name'], $target_file)) {
        $query = "INSERT INTO vlog_videos (video_path, feedback) VALUES ('$target_file', '$feedback')";
        mysqli_query($conn, $query);
        echo "<script>alert('Video and feedback uploaded successfully!');</script>";
    } else {
        echo "<script>alert('Error uploading video.');</script>";
    }
}

// Fetch all videos with feedback
$videos = mysqli_query($conn, "SELECT * FROM vlog_videos ORDER BY uploaded_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VLOG</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: white;
            text-align: center;
        }
        .main-content {
            padding: 20px;
        }
        .title {
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
            font-size: 2rem;
            margin-bottom: 20px;
        }
        .upload-box {
            width: 35%;
            margin: 0 auto 40px;
            padding: 20px;
            background: rgba(0,0,0,0.6);
            border: 2px solid white;
            border-radius: 10px;
            box-shadow: 0 0 10px #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        input[type="file"], textarea, button {
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            border: none;
            font-size: 1rem;
        }
        input[type="file"] {
            background: transparent;
            color: black;
            border: 1px solid white;
        }
        textarea {
            resize: none;
        }
        button {
            background: white;
            color: black;
            cursor: pointer;
        }
        button:hover {
            background: grey;
            color: white;
        }
.video-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

.video-card {
    width: 22%;
    background-color: rgba(255,255,255,0.05);
    border: 1px solid #fff;
    border-radius: 10px;
    padding: 10px;
    box-sizing: border-box;
    text-align: left;
}

video {
    width: 100%;
    height: 350px;
    object-fit: cover;
    border-radius: 10px;
}
.feedback-display {
    margin-top: 10px;
    font-size: 0.9rem;
    font-style: italic;
    color: #ccc;
}

        .feedback-display {
            margin-top: 10px;
            font-style: italic;
            color: #ccc;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <h1 class="title" style="color:black;">VLOG</h1>
        <h3 class="title" style="color: black;">Please Add Any Video About Balik Pulau</h3>
        <form class="upload-box" action="" method="post" enctype="multipart/form-data">
            <input type="file" name="video" accept="video/*" required>
            <textarea name="feedback" rows="3" placeholder="Write your feedback here..." required></textarea>
            <button type="submit">Upload</button>
        </form>

<div class="video-grid">
    <?php while ($video = mysqli_fetch_assoc($videos)): ?>
        <div class="video-card">
            <video controls>
                <source src="<?php echo $video['video_path']; ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="feedback-display">
                <?php echo nl2br(htmlspecialchars($video['feedback'])); ?>
            </div>
        </div>
    <?php endwhile; ?>
</div>
</div>
<br>
<br>
<br>


    <?php include '../inc/footer.php'; ?>
</body>
</html>
