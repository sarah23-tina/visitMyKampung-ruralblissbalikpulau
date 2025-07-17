<?php
include '../inc/db_connect.php';


// Handle image deletion
if (isset($_GET['remove_image']) && isset($_GET['idea_id'])) {
    $img_path = $_GET['remove_image'];
    $idea_id = intval($_GET['idea_id']);
    
    // Delete from DB
    mysqli_query($conn, "DELETE FROM travel_idea_images WHERE travel_idea_id=$idea_id AND image_path='" . mysqli_real_escape_string($conn, $img_path) . "'");
    
    // Delete from server
    if (file_exists($img_path)) {
        unlink($img_path);
    }

    echo "<script>window.location.href='?edit=$idea_id';</script>";
    exit;
}

// Fetch topics from travel_guide
$topics_result = mysqli_query($conn, "SELECT id, topic FROM travel_guide");
$topics = [];
while ($row = mysqli_fetch_assoc($topics_result)) {
    $topics[] = $row;
}

// Initialize variables
$edit_id = '';
$edit_topic_id = '';
$edit_short_description = '';
$edit_long_description = '';
$edit_book_now_link = '';
$edit_hemail = '';
$existing_images = [];

// Check if editing
if (isset($_GET['edit'])) {
    $edit_id = intval($_GET['edit']);
    $edit_result = mysqli_query($conn, "SELECT * FROM travel_ideas WHERE id = $edit_id");
    if ($edit_data = mysqli_fetch_assoc($edit_result)) {
        $edit_topic_id = $edit_data['topic_id'];
        $edit_short_description = $edit_data['short_description'];
        $edit_long_description = $edit_data['long_description'];
        $edit_book_now_link = $edit_data['book_now_link'];
        $edit_hemail =   $edit_data['hemail'];

        $images_result = mysqli_query($conn, "SELECT image_path FROM travel_idea_images WHERE travel_idea_id = $edit_id");
        while ($img = mysqli_fetch_assoc($images_result)) {
            $existing_images[] = $img['image_path'];
        }
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_idea'])) {
    $topic_id = intval($_POST['topic_id']);
    $short_description = mysqli_real_escape_string($conn, $_POST['short_description']);
    $long_description = mysqli_real_escape_string($conn, $_POST['long_description']);
    $book_now_link = mysqli_real_escape_string($conn, $_POST['book_now_link']);
    $hemail = mysqli_real_escape_string($conn, $_POST['hemail']);


    $uploadDir = "uploads/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

if (!empty($_POST['edit_id'])) {
    // Update existing
    $edit_id = intval($_POST['edit_id']);

    // Clean up book_now_link and force append ?id=XX
    $clean_link = strtok($book_now_link, '?');
    $final_link = $clean_link . "?id=" . $edit_id;

$stmt = $conn->prepare("UPDATE travel_ideas SET topic_id=?, short_description=?, long_description=?, book_now_link=?, hemail=? WHERE id=?");
$stmt->bind_param("issssi", $topic_id, $short_description, $long_description, $final_link, $hemail, $edit_id);

    $stmt->execute();
    $stmt->close();

    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
        if (!empty($tmp_name)) {
            $image_name = basename($_FILES['images']['name'][$key]);
            $image_path = $uploadDir . $image_name;
            move_uploaded_file($tmp_name, $image_path);

            $stmt = $conn->prepare("INSERT INTO travel_idea_images (travel_idea_id, image_path) VALUES (?, ?)");
            $stmt->bind_param("is", $edit_id, $image_path);
            $stmt->execute();
            $stmt->close();
        }
    }

    echo "<script>alert('Travel Idea Updated Successfully'); window.location.href='admin_travel_ideas.php';</script>";
}
 else {
        // Insert new
// Insert new record first
// Step 1: Insert first
$stmt = $conn->prepare("INSERT INTO travel_ideas (topic_id, short_description, long_description, book_now_link, hemail) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("issss", $topic_id, $short_description, $long_description, $book_now_link, $hemail);

$stmt->execute();
$insert_id = $stmt->insert_id;
$stmt->close();

// Step 2: Force clean link (remove any existing query string if someone pasted a full one with ?id=...)
$clean_link = strtok($book_now_link, '?');

// Step 3: Append ?id=XX
$final_link = $clean_link . "?id=" . $insert_id;

// Step 4: Update with new link
$stmt = $conn->prepare("UPDATE travel_ideas SET book_now_link = ? WHERE id = ?");
$stmt->bind_param("si", $final_link, $insert_id);
$stmt->execute();
$stmt->close();




        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            if (!empty($tmp_name)) {
                $image_name = basename($_FILES['images']['name'][$key]);
                $image_path = $uploadDir . $image_name;
                move_uploaded_file($tmp_name, $image_path);

                $stmt = $conn->prepare("INSERT INTO travel_idea_images (travel_idea_id, image_path) VALUES (?, ?)");
                $stmt->bind_param("is", $insert_id, $image_path);
                $stmt->execute();
                $stmt->close();
            }
        }

        echo "<script>alert('Travel Idea Added Successfully'); window.location.href='admin_travel_ideas.php';</script>";
    }
}

// Handle delete
if (isset($_GET['delete'])) {
    $delete_id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM travel_ideas WHERE id = $delete_id");
    echo "<script>alert('Travel Idea Deleted Successfully'); window.location.href='admin_travel_ideas.php';</script>";
}

// Fetch all ideas
$ideas_result = mysqli_query($conn, "
    SELECT ti.id, ti.short_description, ti.book_now_link, ti.long_description, ti.hemail, tg.topic
    FROM travel_ideas ti
    JOIN travel_guide tg ON ti.topic_id = tg.id
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Travel Ideas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .container {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(12px);
            margin-top: 40px;
            padding: 30px;
            border-radius: 12px;
        }
        h2, h3 { color: #ffcc00; }
        .table thead {
            background: linear-gradient(to right, #ff7b00, #ffcc00);
            color: white;
        }
        .table tbody tr:hover {
            background-color: rgba(255,255,255,0.2);
        }
        .thumb {
            width: 60px;
            border-radius: 4px;
            margin: 4px;
            position: relative;
        }
        .img-wrap {
            display: inline-block;
            position: relative;
        }
        .img-wrap .btn-close {
            position: absolute;
            top: -10px;
            right: -8px;
            background-color: red;
            border-radius: 50%;
            opacity: 1;
        }
    </style>
</head>
<body>
<div class="container">
    <h2><?= empty($edit_id) ? 'Add New' : 'Edit' ?> Travel Idea</h2>
    <form method="post" enctype="multipart/form-data" class="row g-3">
        <input type="hidden" name="edit_id" value="<?= $edit_id ?>">

<div class="col-md-6">
    <label>Topic</label>
    <select name="topic_id" id="topicSelect" class="form-control" required>
        <option value="">Choose Topic</option>
        <?php foreach ($topics as $t): ?>
            <option value="<?= $t['id'] ?>" data-topic-name="<?= strtolower($t['topic']) ?>" <?= $t['id'] == $edit_topic_id ? 'selected' : '' ?>>
                <?= htmlspecialchars($t['topic']) ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>


        <div class="col-md-6">
            <label>Upload Images</label>
            <input type="file" name="images[]" class="form-control" multiple <?= empty($edit_id) ? 'required' : '' ?>>
            <div>
                <?php foreach ($existing_images as $img): ?>
                    <div class="img-wrap">
                        <img src="<?= $img ?>" class="thumb">
                        <a href="?remove_image=<?= urlencode($img) ?>&idea_id=<?= $edit_id ?>" class="btn-close"></a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="col-md-6">
            <label>Short Description</label>
            <input type="text" name="short_description" class="form-control" value="<?= $edit_short_description ?>" required>
        </div>

<div class="col-md-6" id="bookNowWrapper">
    <label>Book Now Link</label>
    <input type="text" name="book_now_link" class="form-control" value="<?= htmlspecialchars($edit_book_now_link) ?>">
</div>

<div class="mb-3" id="emailField" style="display: none;">
    <label for="hemail" class="form-label">Email (only for Homestay)</label>
    <input type="email" class="form-control" name="hemail" id="hemail"
        value="<?= isset($edit_hemail) ? $edit_hemail : '' ?>" placeholder="Enter email address">
</div>


<div class="col-md-12">
    <label>Long Description</label>
    <textarea name="long_description" class="form-control" rows="4" required>
<?= htmlspecialchars(preg_replace('/\\\r\\\n/', "\n", $edit_long_description)) ?>
    </textarea>
</div>




        <div class="col-md-12 text-center">
            <button class="btn btn-primary" name="add_idea"><?= empty($edit_id) ? 'Add Idea' : 'Update Idea' ?></button>
        </div>
    </form>

    <h3 class="mt-4">Travel Ideas List</h3>
    <table class="table table-bordered text-white">
        <thead>
        <tr>
            <th>Topic</th>
            <th>Images</th>
            <th>Short Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($idea = mysqli_fetch_assoc($ideas_result)): ?>
            <tr>
                <td><?= htmlspecialchars($idea['topic']) ?></td>
                <td>
                    <?php
                    $imgs = mysqli_query($conn, "SELECT image_path FROM travel_idea_images WHERE travel_idea_id = {$idea['id']}");
                    while ($img = mysqli_fetch_assoc($imgs)) {
                        echo "<img src='{$img['image_path']}' class='thumb'>";
                    }
                    ?>
                </td>
                <td><?= htmlspecialchars($idea['short_description']) ?></td>
                <td>
                    <a href="?edit=<?= $idea['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="?delete=<?= $idea['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this idea?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const topicSelect = document.getElementById('topicSelect');
        const bookNowWrapper = document.getElementById('bookNowWrapper');
        const emailField = document.getElementById('emailField');

        function toggleBookNow() {
            const selectedOption = topicSelect.options[topicSelect.selectedIndex];
            const topicName = selectedOption.getAttribute('data-topic-name');
            bookNowWrapper.style.display = topicName === 'homestay' ? 'block' : 'none';
        }

function toggleEmailField() {
    const selectedText = topicSelect.options[topicSelect.selectedIndex].text.toLowerCase();
    emailField.style.display = selectedText === "homestay" ? 'block' : 'none';
}


        topicSelect.addEventListener('change', () => {
            toggleBookNow();
            toggleEmailField();
        });

        // Call both on initial load
        toggleBookNow();
        toggleEmailField();
    });
</script>
</body>

</html>
