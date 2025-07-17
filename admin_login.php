<?php
session_start();
include '../inc/db_connect.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM signup WHERE username='$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Verify password
        if (password_verify($password, $row['password'])) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $row['username'];
            $_SESSION['user_role'] = $row['role']; // <-- new: saving user role from database

            // Redirect based on role
            if ($row['role'] == 'admin') {
                header("Location: admin_dashboard.php");
            } elseif ($row['role'] == 'homestay_owner') {
                header("Location: admin_homestay_owner_dashboard.php");
            } elseif ($row['role'] == 'food') {
                header("Location: admin_food_owner_dashboard.php");
            } elseif ($row['role'] == 'stall_owner') {
                header("Location: admin_stall_owner_dashboard.php");
            } elseif ($row['role'] == 'animal_park') {
                header("Location: admin_animal_owner_dashboard.php"); 
            } elseif ($row['role'] == 'durian_orchard') {
                header("Location: admin_durian_owner_dashboard.php"); 
            } elseif ($row['role'] == 'attraction_place') {
                header("Location: admin_attrapla_owner_dashboard.php"); 
            } elseif ($row['role'] == 'nature') {
                header("Location: admin_nature_owner_dashboard.php"); 
            }  else {
                $error = "Unknown user role!";
            }
            exit();

            header("Location: admin_dashboard.php"); // <-- redirect to dashboard.php (handles both admin/owner)
            exit();
        } else {
            $error = "Invalid username or password!";
        }
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
        }
        .login-box {
            width: 100%;
            max-width: 400px;
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 12px;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        .login-box h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-control {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
        }
        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
        .form-control:focus {
            background: rgba(255, 255, 255, 0.3);
            color: white;
            box-shadow: none;
        }
        .btn-primary {
            background: #ff7b00;
            border: none;
            transition: 0.3s;
        }
        .btn-primary:hover {
            background: #ff9800;
        }
        .alert {
            text-align: center;
        }
    </style>
</head>
<body>

<div class="login-box text-white">
    <h2>Login</h2>
    <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <form method="POST">
        <div class="mb-3">
            <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>

         <p style="font-size: 12px; color: #333; margin-top: 20px;">
             <b>If don't have an account please sign in first. For sign in please contact Lembaga Kemajuan Wilayah Pulau Pinang (PERDA) via email</b>
        </p>

        <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
    </form>
</div>

</body>
</html>
