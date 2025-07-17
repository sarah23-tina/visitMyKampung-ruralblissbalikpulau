<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            height: 100vh;
            display: flex;
            overflow: hidden;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding-top: 20px;
            transition: 0.3s;
        }
        .sidebar a {
            display: flex;
            align-items: center;
            gap: 10px;
            color: white;
            text-decoration: none;
            padding: 15px;
            font-size: 18px;
            text-align: left;
            transition: 0.3s;
            cursor: pointer;
        }
        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.2);
            border-left: 5px solid #ff7b00;
        }
        .main-content {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
        }
        iframe {
            width: 100%;
            height: 85vh;
            border: none;
            border-radius: 10px;
            background: #f4f4f4;
        }
    </style>
    <script>
        function loadPage(page) {
            document.getElementById('content-frame').src = page;
        }
    </script>
</head>
<body>
<div class="sidebar">
    <h4 class="text-center">Admin Panel</h4>
    <hr class="text-white">

    <a onclick="loadPage('admin_dashboard_home.php')"><i class="fas fa-tachometer-alt"></i> <span>Dashboard Home</span></a>
    <a onclick="loadPage('admin_home.php')"><i class="fas fa-home"></i> <span>Edit Home Page</span></a>
    <a onclick="loadPage('admin_about.php')"><i class="fas fa-address-card"></i> <span>Edit About Page</span></a>
    <a onclick="loadPage('admin_travel_guide.php')"><i class="fas fa-map"></i> <span>Edit Travel Guide</span></a>
    <a onclick="loadPage('admin_travel_ideas.php')"><i class="fas fa-lightbulb"></i> <span>Edit Travel Ideas</span></a>
    <a onclick="loadPage('admin_view_vlog.php')"><i class="fas fa-video"></i> <span>View Vlog Videos</span></a>
    <a onclick="loadPage('admin_chat_handler.php')"><i class="fas fa-comments"></i> <span>Edit Chat Handler</span></a>
    <a onclick="loadPage('admin_homestay.php')"><i class="fas fa-bed"></i> <span>View Booking</span></a>
    <a onclick="loadPage('admin_signup.php')"><i class="fas fa-user-plus"></i> <span>Sign Up</span></a>
    <a href="admin_logout.php" class="text-danger"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a>
</div>

    <div class="main-content">
        <h2>Welcome, <?php echo $_SESSION['admin_username']; ?>!</h2>
        <iframe id="content-frame" src="admin_dashboard_home.php"></iframe>
    </div>
</body>
</html>
