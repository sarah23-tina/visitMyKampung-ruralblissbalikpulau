<?php
include '../inc/db_connect.php';

$sql = "SELECT tg.id AS topic_id, tg.topic, tg.position, v.video_url
        FROM travel_guide tg
        LEFT JOIN travel_guide_video v ON tg.id = v.travel_guide_id
        ORDER BY tg.position ASC, v.id ASC";

$result = mysqli_query($conn, $sql);

$topics = [];

while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['topic_id'];

    if (!isset($topics[$id])) {
        $topics[$id] = [
            'topic_id' => $id,
            'topic' => $row['topic'],
            'position' => $row['position'],
            'videos' => []
        ];
    }

    if (!empty($row['video_url'])) {
        $topics[$id]['videos'][] = $row['video_url'];
    }
}

$topics = array_values($topics); // Re-index numerically for JSON encoding
?>

<?php include '../inc/side_nav_bar.php'; ?>
<div class="header-section">
    <h1 style="color:Black;">TRAVEL GUIDE</h1>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Travel Guide</title>
  <style>
        body {
            background-image: url("../srcimg/bg.jpeg");
            background-size: cover;
            background-position: center;
            color: white;
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
            margin: 0;
        }
        .header-section {
            background-image: url('../srcimg/bg.jpeg');
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
        .page-section {
            background-color: #e0eff1;
            padding: 40px 0;
        }
        .container {
            display: flex;
            align-items: flex-start;
            margin: 0 50px;
            gap: 20px;
        }
        .sidebar {
            width: 250px;
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
            backdrop-filter: blur(5px);
        }
        .sidebar h2 {
            text-align: center;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 12px;
            margin: 6px 0;
            background: rgba(255, 255, 255, 0.2);
            text-align: center;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        .sidebar ul li:hover {
            background: rgba(255, 255, 255, 0.4);
        }
        .sidebar ul li.active {
            background: #b0a2ff;
        }
        .content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .video-frame-container {
            justify-content: center;
            display: flex;
            align-items: center;
            gap: 40px;
            width: 100%;
        }
        .video-frame {
            width: 80vw;
            height: 45vw;
            max-width: 1200px;
            max-height: 675px;
            border-radius: 15px;
            border: none;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }
        .arrow-btn {
            font-size: 30px;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="page-section">
    <div class="container">
        <div class="sidebar">
            <h2>Topics</h2>
            <ul id="topicList">
                <?php foreach ($topics as $index => $topic): ?>
                    <li data-topic-id="<?= htmlspecialchars($topic['topic_id']) ?>" <?= $index === 0 ? 'class="active"' : '' ?>>
                        <?= htmlspecialchars($topic['topic']) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="content">
            <div class="video-frame-container">
                <span class="arrow-btn" id="prevVideo">←</span>
                <iframe id="videoFrame" class="video-frame" 
                        src="<?= count($topics) > 0 && isset($topics[0]['videos'][0]) ? htmlspecialchars($topics[0]['videos'][0]) : '' ?>" 
                        allowfullscreen>
                </iframe>
                <span class="arrow-btn" id="nextVideo">→</span>
            </div>
        </div>
    </div>
</div>

<?php include '../inc/footer.php'; ?>

<script>
const videos = <?php echo json_encode($topics); ?>;

document.addEventListener("DOMContentLoaded", function () {
    const topicList = document.getElementById('topicList');
    const videoFrame = document.getElementById('videoFrame');
    const prevVideoBtn = document.getElementById('prevVideo');
    const nextVideoBtn = document.getElementById('nextVideo');

    const topics = <?php echo json_encode($topics); ?>;
    let currentTopicIndex = 0;
    let currentVideoIndex = 0;

    function updateVideo() {
        const currentTopic = topics[currentTopicIndex];
        const videoUrl = currentTopic.videos[currentVideoIndex];

        if (videoUrl) {
            videoFrame.src = videoUrl;
        }

        // Highlight active topic
        document.querySelectorAll('#topicList li').forEach(li => li.classList.remove('active'));
        document.querySelector(`#topicList li[data-topic-id="${currentTopic.topic_id}"]`).classList.add('active');
    }

    topicList.addEventListener('click', function (event) {
        const target = event.target.closest('li');
        if (!target) return;

        currentTopicIndex = [...topicList.children].indexOf(target);
        currentVideoIndex = 0;
        updateVideo();
    });

    nextVideoBtn.addEventListener('click', function () {
        const currentTopic = topics[currentTopicIndex];
        if (currentVideoIndex < currentTopic.videos.length - 1) {
            currentVideoIndex++;
        } else {
            currentVideoIndex = 0;
        }
        updateVideo();
    });

    prevVideoBtn.addEventListener('click', function () {
        const currentTopic = topics[currentTopicIndex];
        if (currentVideoIndex > 0) {
            currentVideoIndex--;
        } else {
            currentVideoIndex = currentTopic.videos.length - 1;
        }
        updateVideo();
    });

    updateVideo();
});
</script>

</body>
</html>
