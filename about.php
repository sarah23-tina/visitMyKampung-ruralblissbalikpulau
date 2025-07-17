<?php
include '../inc/side_nav_bar.php';
include '../inc/db_connect.php'; // Include database connection

// Fetch current about content
$query = "SELECT content FROM about_page WHERE id = 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$current_content = $row['content'] ?? 'No content available.';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABOUT</title>
    <style>
        /* Header Section */
        .header-section {
            background-image: url('images/header-bg.jpg');
            background-size: cover;
            background-position: center;
            height: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
        }
        .header-section h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .main-content {
            background-color: #e0eff1;
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }
        .center-content {
            text-align: center;
            font-weight: bold;
        }
        .center-content h1 {
            margin-top: 20px;
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
        }
        .center-content p {
            width: 80%;
            margin: 0 auto;
            text-align: justify;
        }
        .featured-tour {
            padding: 50px 0;
            background-color: #ffffff;
        }
        .featured-tour h2 {
            font-size: 2.5rem;
            margin-bottom: 30px;
            font-weight: bold;
            text-transform: uppercase;
            color: #333;
            text-align: center;
        }
        .hex-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .hex-row {
            display: flex;
            justify-content: center;
            gap: 15px;
        }
        .hex {
            width: 150px;
            height: 170px;
            position: relative;
            clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }
        .hex:hover {
            transform: scale(1.1);
        }
        .hex-content {
            position: relative;
            width: 100%;
            height: 100%;
        }
        .hex-content img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }
        .hex:hover .overlay {
            opacity: 1;
        }
        .overlay h3 {
            color: white;
            font-size: 1rem;
            text-align: center;
            margin-bottom: 8px;
        }
        .btn {
            background: #f08a5d;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            font-size: 0.9rem;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .btn:hover {
            background: #b83b5e;
        }
        @media (max-width: 768px) {
            .hex-row {
                flex-direction: row;
                gap: 10px;
            }
            .hex {
                width: 120px;
                height: 135px;
            }
        }
        @media (max-width: 480px) {
            .hex-row {
                flex-direction: column;
                align-items: center;
            }
            .hex {
                width: 140px;
                height: 160px;
            }
        }
    </style>
</head>
<body>

<div class="header-section">
    <h1 style="color:black;">ABOUT BALIK PULAU</h1>
</div>

<div class="main-content">
    <div class="center-content">
        <div class="description-container">
            <p><?php echo nl2br(htmlspecialchars($current_content)); ?></p>
        </div>
    </div>
</div>

<section class="featured-tour">
    <h2>PLACES </h2>
    <div class="hex-container">
        <div class="hex-row">
            <a href="https://en.wikipedia.org/wiki/Balik_Pulau" target="_blank">
                <div class="hex">
                    <div class="hex-content">
                        <img src="images/ibd.jpg" alt="Balik Pulau Town">
                        <div class="overlay">
                            <h3>Balik Pulau Town</h3>
                        </div>
                    </div>
                </div>
            <a href="https://mypenang.gov.my/nature-adventure/directory/49/?lg=en" target="_blank">
                <div class="hex">
                    <div class="hex-content">
                        <img src="images/csp.jpg" alt="Butterfly Farm">
                        <div class="overlay">
                            <h3>Countryside Stables Penang</h3>
                        </div>
                    </div>
                </div>
            <a href="https://www.internationalsteam.co.uk/penang/penanghills202.html" target="_blank">
                <div class="hex">
                    <div class="hex-content">
                        <img src="images/pic4.png" alt="Penang Hill">
                        <div class="overlay">
                            <h3>Hill View</h3>
                        </div>
                    </div>
                </div>
            </div>
        <div class="hex-row">
            <a href="https://explorebalikpulau.com.my/Home.php" target="_blank">
                <div class="hex">
                    <div class="hex-content">
                        <img src="images/pic5.png" alt="Cycling Tour">
                        <div class="overlay">
                            <h3>Cycling Tour</h3>
                        </div>
                    </div>
                </div>
            <a href="https://durian.com.my/" target="_blank">
                <div class="hex">
                    <div class="hex-content">
                        <img src="images/pic6.png" alt="Durian Farm">
                        <div class="overlay">
                            <h3>Durian Farm</h3>
                        </div>
                    </div>
                </div>
            </div>
        <div class="hex-row">
            <a href="https://www.penang-traveltips.com/pantai-malindo.htm" target="_blank">
                <div class="hex">
                    <div class="hex-content">
                        <img src="images/pic7.png" alt="Pantai Batu Feringghi">
                        <div class="overlay">
                            <h3>Pantai Malindo</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<br><br><br><br><br><br>
<?php include '../inc/footer.php'; ?>
</body>
</html>
