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
    <title>Admin Dashboard Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
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
        h2 {
            color: #ffcc00;
            margin-bottom: 10px;
        }
        .dashboard-icons {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            width: 80%;
        }
        .dashboard-card {
            width: 180px;
            height: 160px;
            padding: 20px;
            text-align: center;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
            transition: 0.3s;
            cursor: pointer;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            color: white;
            font-weight: bold;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .dashboard-card:hover {
            transform: scale(1.1);
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid #ff7b00;
        }
        .dashboard-card i {
            font-size: 40px;
            margin-bottom: 10px;
        }
        .logout {
            background: rgba(255, 0, 0, 0.2);
            border: 2px solid red;
        }
        .logout:hover {
            background: rgba(255, 0, 0, 0.4);
        }
    </style>
</head>
<body>

<div class="dashboard-icons">
    <div class="dashboard-card" onclick="loadPage('admin_dashboard_home.php')">
        <i class="fas fa-tachometer-alt"></i>
        <p>Dashboard Home</p>
    </div>
    <div class="dashboard-card" onclick="loadPage('admin_home.php')">
        <i class="fas fa-home"></i>
        <p>Edit Home Page</p>
    </div>
    <div class="dashboard-card" onclick="loadPage('admin_about.php')">
        <i class="fas fa-address-card"></i>
        <p>Edit About Page</p>
    </div>
    <div class="dashboard-card" onclick="loadPage('admin_travel_guide.php')">
        <i class="fas fa-map"></i>
        <p>Edit Travel Guide</p>
    </div>
    <div class="dashboard-card" onclick="loadPage('admin_travel_ideas.php')">
        <i class="fas fa-lightbulb"></i>
        <p>Edit Travel Ideas</p>
    </div>
    <div class="dashboard-card" onclick="loadPage('admin_view_vlog.php')">
        <i class="fas fa-video"></i>
        <p>View Vlog Videos</p>
    </div>
    <div class="dashboard-card" onclick="loadPage('admin_chat_handler.php')">
        <i class="fas fa-comments"></i>
        <p>Edit Chat Handler</p>
    </div>
    <div class="dashboard-card" onclick="loadPage('admin_homestay.php')">
        <i class="fas fa-bed"></i>
        <p>View Booking</p>
    </div>
    <div class="dashboard-card" onclick="loadPage('admin_signup.php')">
        <i class="fas fa-user-plus"></i>
        <p>Sign Up</p>
    </div>
    <div class="dashboard-card logout" onclick="window.location.href='admin_logout.php'">
        <i class="fas fa-sign-out-alt"></i>
        <p>Logout</p>
    </div>
</div>


    <script>
        function loadPage(page) {
            parent.document.getElementById('content-frame').src = page;
        }
    </script>
</body>
</html>
