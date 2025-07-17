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

while ($row = mysqli_fetch_assoc($result)) {
    if (!$firstTopicId) {
        $firstTopicId = $row['id']; // Store the first topic ID
    }

    $topics[$row['id']] = [
        'topic' => $row['topic'],
        'position' => $row['position'],
        'ideas' => []
    ];
}

// Fetch travel ideas
$query = "SELECT * FROM travel_ideas ORDER BY topic_id ASC";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Error: " . mysqli_error($conn));
}

while ($idea = mysqli_fetch_assoc($result)) {
    $topic_id = $idea['topic_id'];
    $idea_id = $idea['id'];

    // Fetch associated images for this travel idea
    $image_query = "SELECT image_path FROM travel_idea_images WHERE travel_idea_id = $idea_id";
    $image_result = mysqli_query($conn, $image_query);

    $images = [];
    while ($image = mysqli_fetch_assoc($image_result)) {
        $images[] = $image['image_path'];
    }

    // Add idea with images into topics array, and include topic name
    if (isset($topics[$topic_id])) {
        $topics[$topic_id]['ideas'][] = [
            'short_description' => $idea['short_description'],
            'long_description' => $idea['long_description'],
            'book_now_link' => $idea['book_now_link'],
            'images' => $images,
            'topic' => $topics[$topic_id]['topic'] // ✅ Added topic name here
        ];
    }
}

// Convert PHP array to JavaScript JSON if needed
?>


<script>
    const topicsData = <?= json_encode($topics) ?>;
    const firstTopicId = <?= json_encode($firstTopicId) ?>;
</script>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Travel Ideas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
         body {
            background-image: url("../srcimg/bg.jpeg");
            background-size: cover;
            background-position: center;
            color: white;
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
        }
        .carousel-inner img {
    height: 200px;
    object-fit: cover;
}

        .container {
            display: flex;
            align-items: flex-start;
            margin: 50px;
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
            position: relative;
            left: 220px;
            flex-grow: 1;
            text-align: center;
        }
                .content h1 {
            margin-bottom: 20px;
            position: relative;
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
            color: black;

        }
        .image-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            width: 100%;
            justify-items: center;
        }
        .image-box {
            width: 100%;
            max-width: 250px;
            position: relative;
            overflow: hidden;
            border-radius: 10px;
        }
        .image-box .card {
            background: rgba(0, 0, 0, 0.7); /* Black transparent */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            overflow: hidden;
        }
        .image-box:hover .card {
            transform: scale(1.05); /* Slight zoom on hover */
            box-shadow: 0 8px 16px rgba(255, 255, 255, 0.3); /* White glow effect */
        }
        .image-box .card img {
            height: 200px;
            object-fit: cover;
            width: 100%;
            border-radius: 10px 10px 0 0;
        }
        .image-box .card-body {
            background: rgba(0, 0, 0, 0.6); /* Dark overlay */
            color: white;
            text-align: center;
            padding: 15px;
        }
        .image-box .card-body h4 {
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Modal Background */
/* Modal Background */
#imageModal {
    display: none;
    position: fixed;
    z-index: 1050;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8); /* Adjusted opacity */
    justify-content: center;
    align-items: center;
    backdrop-filter: blur(10px); /* Blur background */
}

.modal-body #modalDescription {
    max-height: 300px;  /* Adjust this value based on your design */
    overflow-y: auto;   /* Adds vertical scroll */
}



/* Modal Content */
.modal-content {
    background: rgba(255, 255, 255, 0.1);
    padding: 0;
    border-radius: 10px;
    text-align: center;
    max-width: 500px;
        left: 9rem;
    top:3rem;
    width: 90%;
    position: relative;
    box-shadow: 0 4px 10px rgba(255, 255, 255, 0.2);
    animation: fadeIn 0.3s ease-in-out;
    display: flex;
    flex-direction: column;
    max-height: 80vh; /* Important */
    overflow: hidden; /* Prevent overflow */
}

/* Modal Image */
.modal-img {
    height: auto;
    max-height: 500px;
    object-fit: contain;
}

/* Scrollable content inside the modal */
.modal-scrollable {
    overflow-y: auto;
    padding: 20px;
    max-height: 80vh; /* Match modal content height */
}

/* Image container for scrollable modal images */
.modal-image-container {
    display: flex;
    overflow-x: auto;
    gap: 10px;
    padding-bottom: 10px;
    scroll-snap-type: x mandatory;
}

.modal-image-container img {
    max-height: 250px;
    border-radius: 10px;
    cursor: pointer;
    flex-shrink: 0;
    scroll-snap-align: center;
    transition: transform 0.3s ease;
}

.modal-image-container img:hover {
    transform: scale(1.05);
}

/* Modal Description Text */
.modal-content p {
    color: white;
    font-size: 18px;
    margin: 15px 0;
}






/* Book Now Button */
#bookNowBtn {
    background: #b0a2ff;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 18px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}



#bookNowBtn:hover {
    background: #9180ff;
}

/* Fade In Effect */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: scale(0.8);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

    </style>
</head>
<body>

<div class="container">
    <div class="sidebar">
        <h2>Topics</h2>
        <ul id="topicList">
            <?php foreach ($topics as $id => $data): ?>
                <li data-topic="<?= $id ?>" <?= array_key_first($topics) == $id ? 'class="active"' : '' ?>>
                    <?= htmlspecialchars($data['topic']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="content">
        <h1>TRAVEL IDEAS</h1>
        <br>
        <div class="image-grid" id="imageGrid"></div>
        <br>
        <br>

    </div>

<div id="imageModal" class="modal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <!-- Carousel -->
        <div id="imageModalCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
          <div class="carousel-inner" id="carouselImages"></div>
          <button class="carousel-control-prev" type="button" data-bs-target="#imageModalCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#imageModalCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
          </button>
        </div>

        <!-- Description -->
        <p id="modalDescription" class="mt-3"></p>

        <!-- Book Now Button -->
        <!-- Book Now Button -->
<!-- Book Now Button Wrapper -->
<div id="bookNowWrapper" class="mt-2">
  <button id="bookNowBtn" class="btn btn-primary">Book Now</button>
</div>


      </div>
    </div>
  </div>
</div>
</div>

<br>
<br>
<?php include '../inc/footer.php'; ?>




<script>

$(document).ready(function () {
    const topicList = $('#topicList');
    const imageGrid = $('#imageGrid');

    // Function to create a card for each image
    function createCard(images, shortDesc, longDesc, bookLink, ideaId, topic) {
        let indicators = '';
        let innerSlides = '';

        if (images.length === 0) {
            images = ['https://via.placeholder.com/200'];
        }

        images.forEach((img, index) => {
            let imgSrc = img ? '../admin/' + img : 'https://via.placeholder.com/200';
            let isActive = index === 0 ? 'active' : '';
            indicators += `<button type="button" data-bs-target="#carousel-${ideaId}" data-bs-slide-to="${index}" class="${isActive}" aria-current="true" aria-label="Slide ${index + 1}"></button>`;
            innerSlides += `
                <div class="carousel-item ${isActive}">
                    <img src="${imgSrc}" class="d-block w-100" alt="Image">
                </div>
            `;
        });

        return `<div class="image-box" data-long-desc="${longDesc}" data-book-link="${bookLink}" data-topic="${topic}">
            <div class="card shadow-lg border-0">
                <div id="carousel-${ideaId}" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                    <div class="carousel-indicators">${indicators}</div>
                    <div class="carousel-inner">${innerSlides}</div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">${shortDesc || 'No Description'}</h5>
                </div>
            </div>
        </div>`;
    }

    // Function to create an empty card when no data is available
    function createEmptyCard() {
        return `<div class="image-box empty-card">
            <div class="card shadow-lg border-0">
                <img src="https://via.placeholder.com/200" alt="No Image" class="card-img">
                <div class="card-body">
                    <h5 class="card-title">No Image Available</h5>
                </div>
            </div>
        </div>`;
    }

    // Function to update the image grid with the latest images based on ideas
    function updateImages(ideas) {
        let cards = [];
        let totalCards = 8;

        for (let i = 0; i < totalCards; i++) {
            if (ideas[i]) {
                cards.push(createCard(
                    ideas[i].images,
                    ideas[i].short_description,
                    ideas[i].long_description,
                    ideas[i].book_now_link,
                    i,
                    ideas[i].topic // Pass topic here
                ));
            } else {
                cards.push(createEmptyCard());
            }
        }

        imageGrid.html(cards.join(''));
    }

    // Function to open modal and control "Book Now" button visibility
function openImageModal(images, description, topic, bookLink) {
    // Convert any form of line breaks or escaped characters to <br>
    const formattedDescription = description
        .replace(/\\r\\n|\\n|\\r/g, '<br>')   // Handle escaped newlines from JSON/PHP
        .replace(/\r\n|\n|\r/g, '<br>')       // Handle actual newlines
        .replace(/\\/g, '');                  // Clean up extra backslashes

    // Set the formatted description in the modal
    $('#modalDescription').html(formattedDescription);

    // Load images into the modal carousel
    const carouselInner = $('#carouselImages');
    carouselInner.empty();

    images.forEach((src, index) => {
        const activeClass = index === 0 ? 'active' : '';
        const item = `
            <div class="carousel-item ${activeClass}">
                <img src="${src}" class="d-block w-100 modal-img" alt="Image">
            </div>
        `;
        carouselInner.append(item);
    });

    // Show Book Now button only for "homestay" topic
    const bookNowWrapper = $('#bookNowWrapper');
    if (topic.trim().toLowerCase() === 'homestay') {
        bookNowWrapper.show();
    } else {
        bookNowWrapper.hide();
    }

    // Set Book Now button action
    $('#bookNowBtn').off('click').on('click', function () {
        if (bookLink) {
            window.open(bookLink, '_blank');
        }
    });

    // Show the modal
    const modal = new bootstrap.Modal(document.getElementById('imageModal'));
    modal.show();
}


    // Handle topic click and update images
    topicList.on('click', 'li', function () {
        topicList.find('li').removeClass('active');
        $(this).addClass('active');

        const topicId = $(this).data('topic');
        if (topicsData[topicId] && topicsData[topicId].ideas.length > 0) {
            updateImages(topicsData[topicId].ideas);
        } else {
            updateImages([]);
        }
    });

    // Auto-select first topic on page load
    if (firstTopicId) {
        topicList.find(`li[data-topic="${firstTopicId}"]`).addClass('active').trigger('click');
    }

    // Handle image box click to open modal
    $(document).on('click', '.image-box:not(.empty-card)', function () {
        let images = [];
        $(this).find('.carousel-item img').each(function () {
            images.push($(this).attr('src'));
        });

        const longDesc = $(this).data('long-desc');
        const bookLink = $(this).data('book-link');
        const topic = $(this).data('topic');

        openImageModal(images, longDesc, topic, bookLink);
    });

    // Close the modal when clicking outside the content
    $("#imageModal").on("click", function (e) {
        if (e.target === this) {
            $(this).fadeOut();
        }
    });
});
</script>



</body>
</html>

  