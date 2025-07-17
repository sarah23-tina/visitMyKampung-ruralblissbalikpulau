<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stall Owner Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right, #1e3c72, #2a5298);
            color: white;
        }
        .sidebar {
            height: 100vh;
            width: 200px;
            position: fixed;
            background-color: #2a3f5f;
            padding-top: 20px;
        }
        .sidebar h2 {
            text-align: center;
            color: #fff;
            font-size: 20px;
            margin-bottom: 30px;
        }
        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 16px;
            color: white;
            display: block;
        }
        .sidebar a:hover {
            background-color: #415b76;
        }
        .logout {
            color: #ff4d4d;
            margin-top: 20px;
        }
        .main-content {
            margin-left: 200px;
            padding: 20px;
        }
        .card-container {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
        .card {
            flex: 1;
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .card:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        iframe {
            width: 100%;
            height: 600px;
            border: none;
            background: #e8f0fe;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <h2>Stall Owner</h2>
        <a href="#" onclick="loadPage('admin_stowner_travel_ideas.php')">💡 Travel Ideas</a>
        <a href="admin_logout.php" class="logout">↩ Logout</a>
    </div>

    <div class="main-content">
        <h4 class="text-center">Welcome</h4>
        <hr class="text-white">

        <div class="card-container">
            <div class="card" onclick="loadPage('admin_stowner_travel_ideas.php')">
                <h3>💡 Travel Ideas</h3>
            </div>
            <div class="card" onclick="window.location.href='admin_logout.php'">
                <h3>↩ Logout</h3>
            </div>
        </div>

        <!-- Empty iframe initially -->
        <iframe id="content-frame" src=""></iframe>

    </div>

    <script>
        function loadPage(page) {
            document.getElementById('content-frame').src = page;
        }
    </script>

</body>
</html>
