<?php include '../inc/side_nav_bar.php'; ?>
<?php include '../inc/db_connect.php'; ?>

<?php
$query = "SELECT * FROM home_content WHERE id = 1";
$result = $conn->query($query);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #ffffff;
        }

        .header-section {
            position: relative;
            height: 100vh;
            width: 100%;
            overflow: hidden;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .header-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .header-content h1 {
            font-size: 5em;
            color: white;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
        }

        .info-section {
            padding: 50px;
            background-color: #ffffff;
            color: black;
            text-align: center;
        }

        .info-section h2 {
            margin-bottom: 20px;
            color: #333;
            font-size: 3em;
            font-weight: bold;
        }

        .info-section p {
            font-size: 2em;
            font-weight: bold;
            line-height: 1.6;
        }


    </style>
</head>
<body>

<audio id="welcomeAudio" autoplay>
    <source src="<?php echo $row['audio_path']; ?>" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>

<!-- Header with Video Background -->
<div class="header-section">
    <video class="header-video" autoplay muted loop>
        <source src="header-background.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="header-content">
        <h1 style="color: #000000;"><?php echo $row['title']; ?></h1>
        <h2 style="color: #000000;"><?php echo $row['subtitle']; ?></h2>
        <h2 style="color: #000000;"><?php echo $row['description']; ?></h2>
    </div>
</div>


<!-- Information Section: Vision, Mission, Slogan -->
<div class="info-section">
    <h2 style="font-size: 3em; font-weight: bold;">✨ Slogan</h2>
    <p style="font-size: 2em;"><b><strong>Your Digital Gateway to Balik Pulau’s Hidden Treasures</strong></b></p>
    <br>
    <h2 style="font-size: 3em; font-weight: bold;">🌟 Vision</h2>
    <p style="font-size: 2em;"><b>To become the leading digital platform that promotes Balik Pulau as a vibrant rural tourism destination, connecting travelers with authentic village experiences while supporting sustainable local development.</b></p>

    <h2 style="font-size: 3em; font-weight: bold;">🎯 Mission</h2>
    <ul style="font-size: 2em; text-align: justify; list-style-type: disc; padding-left: 40px;">
        <li><b>To provide a centralized, user-friendly website offering complete and up-to-date information on Balik Pulau’s attractions, homestays, food, and events.</b></li>
          <li><b>To enhance visitor experience through immersive 360-degree video tours and AI-powered voice assistance.</b></li>
          <li><b>To empower local businesses and homestay owners by giving them a digital space to promote their services and reach a wider audience.</b></li>
          <li><b>To preserve and celebrate the unique cultural heritage and natural beauty of Balik Pulau through responsible tourism promotion.</b></li>
    </ul>

    
</div>


<?php include '../inc/footer.php'; ?>

</body>
</html>

