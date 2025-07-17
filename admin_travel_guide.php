<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

include '../inc/db_connect.php';

// Add a new topic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_topic'])) {
    $topic = mysqli_real_escape_string($conn, $_POST['topic']);

    $result = mysqli_query($conn, "SELECT MAX(position) AS max_pos FROM travel_guide");
    $row = mysqli_fetch_assoc($result);
    $new_position = $row['max_pos'] + 1;

    $stmt = $conn->prepare("INSERT INTO travel_guide (topic, position) VALUES (?, ?)");
    $stmt->bind_param("si", $topic, $new_position);
    $stmt->execute();
    $stmt->close();
}

// Add a video to a topic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_video'])) {
    $video_url = mysqli_real_escape_string($conn, $_POST['video_url']);
    $travel_guide_id = intval($_POST['travel_guide_id']);

    $stmt = $conn->prepare("INSERT INTO travel_guide_video (travel_guide_id, video_url) VALUES (?, ?)");
    $stmt->bind_param("is", $travel_guide_id, $video_url);
    $stmt->execute();
    $stmt->close();
}

// Delete a topic and its videos
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);

    $result = mysqli_query($conn, "SELECT position FROM travel_guide WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
    $deleted_position = $row['position'];

    // Delete videos first
    mysqli_query($conn, "DELETE FROM travel_guide_video WHERE travel_guide_id = $id");

    // Delete topic
    $stmt = $conn->prepare("DELETE FROM travel_guide WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    mysqli_query($conn, "UPDATE travel_guide SET position = position - 1 WHERE position > $deleted_position");
}

// Delete individual video
if (isset($_GET['delete_video'])) {
    $video_id = intval($_GET['delete_video']);
    mysqli_query($conn, "DELETE FROM travel_guide_video WHERE id = $video_id");
}

// Move topics
if (isset($_GET['move']) && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $direction = $_GET['move'];

    $result = mysqli_query($conn, "SELECT id, position FROM travel_guide WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
    $current_position = $row['position'];

    $swap_position = ($direction == 'up') ? $current_position - 1 : $current_position + 1;

    $result = mysqli_query($conn, "SELECT id FROM travel_guide WHERE position = $swap_position");
    if ($swap_row = mysqli_fetch_assoc($result)) {
        $swap_id = $swap_row['id'];

        mysqli_query($conn, "UPDATE travel_guide SET position = $swap_position WHERE id = $id");
        mysqli_query($conn, "UPDATE travel_guide SET position = $current_position WHERE id = $swap_id");
    }
}

// Fetch all topics
$topics = mysqli_query($conn, "SELECT * FROM travel_guide ORDER BY position ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Travel Guide</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            max-width: 1000px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            padding: 30px;
            margin: 40px auto;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
        }
        .table {
            background-color: aqua;
            backdrop-filter: blur(8px);
            border-radius: 12px;
        }
        .table thead {
            background: linear-gradient(to right, #ff7b00, #ffcc00);
            color: white;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="text-center text-warning mb-4"><i class="fas fa-book"></i> Manage Travel Guide Topics</h2>

    <!-- Add new topic -->
    <form method="post" class="row g-3 mb-4">
        <div class="col-md-10">
            <input type="text" name="topic" class="form-control" placeholder="Enter Topic" required>
        </div>
        <div class="col-md-2">
            <button type="submit" name="add_topic" class="btn btn-warning w-100">Add Topic</button>
        </div>
    </form>

    <!-- Topic List -->
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th>Topic</th>
                <th>Videos</th>
                <th>Position</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($topics)): ?>
            <tr>
                <td><?= htmlspecialchars($row['topic']) ?></td>
                <td>
                    <?php
                    $videos = mysqli_query($conn, "SELECT * FROM travel_guide_video WHERE travel_guide_id = " . $row['id']);
                    while ($video = mysqli_fetch_assoc($videos)): ?>
                        <div class="mb-1">
                            <a href="<?= htmlspecialchars($video['video_url']) ?>" target="_blank" class="btn btn-primary btn-sm">View</a>
                            <a href="?delete_video=<?= $video['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this video?');">✕</a>
                        </div>
                    <?php endwhile; ?>

                    <!-- Add new video form -->
                    <form method="post" class="d-flex mt-2">
                        <input type="hidden" name="travel_guide_id" value="<?= $row['id'] ?>">
                        <input type="text" name="video_url" class="form-control form-control-sm me-2" placeholder="New Video URL" required>
                        <button type="submit" name="add_video" class="btn btn-success btn-sm">Add</button>
                    </form>
                </td>
                <td><?= $row['position'] ?></td>
                <td>
                    <a href="?move=up&id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">⬆</a>
                    <a href="?move=down&id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">⬇</a>
                    <a href="?delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete topic and all its videos?');">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
