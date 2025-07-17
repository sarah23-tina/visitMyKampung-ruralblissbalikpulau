<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

include '../inc/db_connect.php'; // Database connection

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question = mysqli_real_escape_string($conn, $_POST['chat_question']);
    $answer = mysqli_real_escape_string($conn, $_POST['chat_answer']);

    $insert_query = "INSERT INTO chat_messages (question, answer) VALUES ('$question', '$answer')";
    if (mysqli_query($conn, $insert_query)) {
        header("Location: admin_chat_handler.php?success=1");
        exit();
    } else {
        $error = "Failed to insert message.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Chat Q&A</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            max-width: 700px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
        }
        h1 {
            color: #ffcc00;
            text-align: center;
            margin-bottom: 20px;
        }
        textarea {
            width: 100%;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            border-radius: 8px;
            color: white;
            padding: 12px;
            font-size: 16px;
            outline: none;
            transition: 0.3s;
            resize: none;
        }
        textarea:focus {
            background: rgba(255, 255, 255, 0.3);
            border: 2px solid #00ffcc;
        }
        .btn-custom {
            width: 100%;
            padding: 12px;
            background: #ffcc00;;
            border: none;
            color: white;
            font-size: 18px;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }
        .btn-custom:hover {
            background: orange;
            color: black;
        }
        .alert {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1><i class="fas fa-comments"></i> Add Chat Q&A</h1>
    
    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success">Chat Q&A added successfully!</div>
    <?php elseif (isset($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="post">
        <label for="chat_question" class="form-label">Chat Question:</label>
        <textarea name="chat_question" id="chat_question" rows="4" required></textarea>

        <label for="chat_answer" class="form-label mt-3">Chat Answer:</label>
        <textarea name="chat_answer" id="chat_answer" rows="4" required></textarea>

        <button type="submit" class="btn btn-custom mt-4"><i class="fas fa-save"></i> Save Chat</button>
    </form>
</div>

</body>
</html>
