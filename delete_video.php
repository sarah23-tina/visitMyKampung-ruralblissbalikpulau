<?php
include '../inc/db_connect.php';
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $video_id = intval($_POST['id']);

    // Get the video path before deleting the record
    $query = "SELECT video_path FROM vlog_videos WHERE id = $video_id";
    $result = mysqli_query($conn, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        $video_path = '../vlog/' . $row['video_path'];
        
        // Delete the file from the server
        if (file_exists($video_path)) {
            unlink($video_path);
        }

        // Delete the DB record
        $delete_query = "DELETE FROM vlog_videos WHERE id = $video_id";
        mysqli_query($conn, $delete_query);
    }
}

header("Location: admin_view_vlog.php");
exit();
