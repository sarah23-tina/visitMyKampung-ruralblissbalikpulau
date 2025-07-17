<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../inc/db_connect.php';

// Handle image deletion
if (isset($_GET['remove_image']) && isset($_GET['idea_id'])) {
    $img_path = $_GET['remove_image'];
    $idea_id = intval($_GET['idea_id']);
    
    mysqli_query($conn, "DELETE FROM travel_idea_images WHERE travel_idea_id=$idea_id AND image_path='" . mysqli_real_escape_string($conn, $img_path) . "'");
    
    if (file_exists($img_path)) {
        unlink($img_path);
    }

    echo "<script>window.location.href='?edit=$idea_id';</script>";
    exit;
}

// Initialize variables
$edit_id = '';
$edit_short_description = '';
$edit_long_description = '';
$edit_hemail = '';
$existing_images = [];

// Check if editing
if (isset($_GET['edit'])) {
    $edit_id = intval($_GET['edit']);
    $edit_result = mysqli_query($conn, "SELECT * FROM travel_ideas WHERE id = $edit_id AND topic_id = 17");
    if ($edit_data = mysqli_fetch_assoc($edit_result)) {
        $edit_short_description = $edit_data['short_description'];
        $edit_long_description = $edit_data['long_description'];
        $edit_hemail = $edit_data['hemail'];

        $images_result = mysqli_query($conn, "SELECT image_path FROM travel_idea_images WHERE travel_idea_id = $edit_id");
        while ($img = mysqli_fetch_assoc($images_result)) {
            $existing_images[] = $img['image_path'];
        }
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_idea'])) {
    $short_description = mysqli_real_escape_string($conn, $_POST['short_description']);
    $long_description = mysqli_real_escape_string($conn, $_POST['long_description']);
    $hemail = mysqli_real_escape_string($conn, $_POST['hemail']);
    $uploadDir = "uploads_food/";  // New upload folder for food
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (!empty($_POST['edit_id'])) {
        // Update
        $edit_id = intval($_POST['edit_id']);
        
        $stmt = $conn->prepare("UPDATE travel_ideas SET short_description=?, long_description=?, hemail=? WHERE id=? AND topic_id=17");
        $stmt->bind_param("sssi", $short_description, $long_description, $hemail, $edit_id);
        $stmt->execute();
        $stmt->close();

        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            if (!empty($tmp_name)) {
                $image_name = time() . "_" . basename($_FILES['images']['name'][$key]);
                $image_path = $uploadDir . $image_name;
                move_uploaded_file($tmp_name, $image_path);

                $stmt = $conn->prepare("INSERT INTO travel_idea_images (travel_idea_id, image_path) VALUES (?, ?)");
                $stmt->bind_param("is", $edit_id, $image_path);
                $stmt->execute();
                $stmt->close();
            }
        }

        echo "<script>alert('Stall Idea Updated Successfully'); window.location.href='admin_stowner_travel_ideas.php';</script>";
    } else {
        // Insert new
        $stmt = $conn->prepare("INSERT INTO travel_ideas (topic_id, short_description, long_description, book_now_link, hemail) VALUES (17, ?, ?, '', ?)");
        $stmt->bind_param("sss", $short_description, $long_description, $hemail);
        $stmt->execute();
        $insert_id = $stmt->insert_id;
        $stmt->close();

        $final_link = "food.php?id=" . $insert_id;
        
        $stmt = $conn->prepare("UPDATE travel_ideas SET book_now_link = ? WHERE id = ?");
        $stmt->bind_param("si", $final_link, $insert_id);
        $stmt->execute();
        $stmt->close();

        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            if (!empty($tmp_name)) {
                $image_name = time() . "_" . basename($_FILES['images']['name'][$key]);
                $image_path = $uploadDir . $image_name;
                move_uploaded_file($tmp_name, $image_path);

                $stmt = $conn->prepare("INSERT INTO travel_idea_images (travel_idea_id, image_path) VALUES (?, ?)");
                $stmt->bind_param("is", $insert_id, $image_path);
                $stmt->execute();
                $stmt->close();
            }
        }

        echo "<script>alert('Stall Idea Added Successfully'); window.location.href='admin_stowner_travel_ideas.php';</script>";
    }
}

// Handle delete
if (isset($_GET['delete'])) {
    $delete_id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM travel_ideas WHERE id = $delete_id AND topic_id=17");
    echo "<script>alert('Stall Idea Deleted Successfully'); window.location.href='admin_stowner_travel_ideas.php';</script>";
}

// Fetch all Food ideas
$ideas_result = mysqli_query($conn, "
    SELECT id, short_description
    FROM travel_ideas
    WHERE topic_id = 17
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Stall Ideas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #8E2DE2, #4A00E0);
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
    <h2><?= empty($edit_id) ? 'Add New' : 'Edit' ?> Stall Idea</h2>
    <form method="post" enctype="multipart/form-data" class="row g-3">
        <input type="hidden" name="edit_id" value="<?= $edit_id ?>">

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

        <div class="col-md-6">
            <label>Email Address</label>
            <input type="email" name="hemail" class="form-control" value="<?= $edit_hemail ?>" required>
        </div>

        <div class="col-md-12">
            <label>Long Description</label>
            <textarea name="long_description" class="form-control" rows="4" required><?= htmlspecialchars(preg_replace('/\\\r\\\n/', "\n", $edit_long_description)) ?></textarea>
        </div>

        <div class="col-md-12 text-center">
            <button class="btn btn-primary" name="add_idea"><?= empty($edit_id) ? 'Add Stall Idea' : 'Update Stall Idea' ?></button>
        </div>
    </form>

    <h3 class="mt-4">Stall Ideas List</h3>
    <table class="table table-bordered text-white">
        <thead>
        <tr>
            <th>Images</th>
            <th>Short Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($idea = mysqli_fetch_assoc($ideas_result)): ?>
            <tr>
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
                    <a href="?delete=<?= $idea['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this stall idea?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>
