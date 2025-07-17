<?php
include '../inc/db_connect.php';
include '../inc/side_nav_bar.php';

// Fetch topics from the travel_guide table
$query = "SELECT * FROM travel_guide ORDER BY position ASC";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Error: " . mysqli_error($conn));
}

$topics = [];
$firstTopicId = null;
$firstTopicName = null;

while ($row = mysqli_fetch_assoc($result)) {
    if (!$firstTopicId) {
        $firstTopicId = $row['id']; 
        $firstTopicName = strtolower(str_replace(' ', '_', $row['topic'])); 
    }

    $topics[$row['id']] = [
        'topic' => $row['topic'],
        'position' => $row['position'],
    ];
}

$mapLinks = [
    "food" => "https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d108878.94933125976!2d100.18825811043617!3d5.3323471947824155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sRestaurants!5e0!3m2!1sen!2smy!4v1742937280857!5m2!1sen!2smy",
    "stall" => "https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d108878.94933125976!2d100.18825811043617!3d5.3323471947824155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sMarket!5e0!3m2!1sen!2smy!4v1742937280857!5m2!1sen!2smy",
    "homestay" => "https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d108878.94933125976!2d100.18825811043617!3d5.3323471947824155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sHomestay!5e0!3m2!1sen!2smy!4v1742937280857!5m2!1sen!2smy",
    "durian_orchard" => "https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d108878.94933125976!2d100.18825811043617!3d5.3323471947824155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sDurian+Farm!5e0!3m2!1sen!2smy!4v1742937280857!5m2!1sen!2smy",
    "nature" => "https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d108878.94933125976!2d100.18825811043617!3d5.3323471947824155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sNature+Reserve!5e0!3m2!1sen!2smy!4v1742937280857!5m2!1sen!2smy",
    "attraction_place" => "https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d108878.94933125976!2d100.18825811043617!3d5.3323471947824155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sTourist+Attraction!5e0!3m2!1sen!2smy!4v1742937280857!5m2!1sen!2smy"
];

$defaultMap = $mapLinks[$firstTopicName] ?? reset($mapLinks);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Balik Pulau Map</title>
    <style>
        body {
            margin: 0;
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
        }

        .header {
            background-image: url("../srcimg/bg.jpeg");
            background-size: cover;
            background-position: center;
            height: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: black;
            text-shadow: 2px 2px 4px #000;
            font-size: 48px;
            font-weight: bold;
        }

        .section {
            background: #ffffff;
            padding: 50px 20px;
            width: 100%;
        }

        .container {
            display: flex;
            gap: 30px;
            max-width: 1300px;
            margin: 0 auto;
            align-items: flex-start;
        }

        .sidebar {
            width: 250px;
            background: #333;
            border-radius: 10px;
            padding: 20px;
        }

        .sidebar h2 {
            text-align: center;
            color: #fff;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 10px;
            background: rgba(255, 255, 255, 0.2);
            margin-bottom: 10px;
            text-align: center;
            border-radius: 5px;
            cursor: pointer;
            color: #fff;
            transition: 0.3s;
        }

        .sidebar ul li:hover {
            background: rgba(255, 255, 255, 0.4);
        }

        .sidebar ul li.active {
            background: #b0a2ff;
            color: black;
            font-weight: bold;
        }

        .content {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .map-container {
            flex: 1;
        }

        iframe {
            width: 100%;
            height: 550px;
            border: none;
            border-radius: 10px;
        }
    </style>
</head>

<body>

<!-- Header -->
<div class="header">
    Balik Pulau Travel Map
</div>

<!-- Section -->
<div class="section">
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>Select a Topic</h2>
            <ul>
                <?php foreach ($topics as $id => $topicData): 
                    $topicKey = strtolower(str_replace(' ', '_', $topicData['topic']));
                    $isActive = ($topicKey === $firstTopicName) ? 'active' : '';
                ?>
                    <li class="topic-item <?= $isActive ?>" data-topic="<?= $topicKey ?>">
                        <?= strtoupper($topicData['topic']) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Map Content -->
        <div class="content">
            <div class="map-container">
                <iframe id="mapFrame" src="<?= $defaultMap ?>" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>

<script>
    const mapLinks = <?= json_encode($mapLinks) ?>;

    document.querySelectorAll('.topic-item').forEach(item => {
        item.addEventListener('click', function () {
            document.querySelectorAll('.topic-item').forEach(el => el.classList.remove('active'));
            this.classList.add('active');

            const topicKey = this.dataset.topic;
            if (mapLinks[topicKey]) {
                document.getElementById('mapFrame').src = mapLinks[topicKey];
            }
        });
    });
</script>

<?php include '../inc/footer.php'; ?>

</body>
</html>
