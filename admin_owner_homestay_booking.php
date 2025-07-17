<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

include '../inc/db_connect.php'; // Database connection

// Fetch homestays for dropdown (only names with 'Homestay')
$homestayQuery = "SELECT DISTINCT short_description FROM travel_ideas WHERE short_description LIKE '%Homestay%' ORDER BY short_description ASC";
$homestayResult = mysqli_query($conn, $homestayQuery);
if (!$homestayResult) {
    die("Homestay fetch failed: " . mysqli_error($conn));
}

// Handle action submission (accept/reject)
if (isset($_POST['action_submit']) && isset($_POST['booking_id']) && isset($_POST['action_status'])) {
    $bookingId = intval($_POST['booking_id']);
    $actionStatus = $_POST['action_status'];

    $updateStmt = $conn->prepare("UPDATE hotel_bookings SET action_status = ? WHERE id = ?");
    $updateStmt->bind_param("si", $actionStatus, $bookingId);

    if ($updateStmt->execute()) {
        $_SESSION['message'] = "Action updated successfully!";
    } else {
        $_SESSION['message'] = "Failed to update action.";
    }
    // Redirect to prevent resubmission
    header("Location: ".$_SERVER['REQUEST_URI']);
    exit();
}

// Get selected homestay
$selectedHomestay = isset($_GET['homestay']) ? $_GET['homestay'] : '';

$hasSelection = !empty($selectedHomestay);
$result = null;

// Fetch bookings only if homestay selected
if ($hasSelection) {
    $stmt = $conn->prepare("SELECT * FROM hotel_bookings WHERE homestay_name = ? ORDER BY created_at DESC");
    $stmt->bind_param("s", $selectedHomestay);
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Homestay Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            max-width: 100%;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
            margin: 20px;
            overflow-x: auto;
        }

        h2 {
            color: #ffcc00;
            text-align: center;
            margin-bottom: 20px;
        }

        .filter-form {
            text-align: center;
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }

        .filter-form select {
            padding: 8px;
            border-radius: 8px;
            border: none;
            min-width: 220px;
        }

        .filter-form button, .filter-form a {
            padding: 8px 16px;
            border-radius: 8px;
            background-color: #ffcc00;
            border: none;
            color: black;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
        }

        .filter-form button:hover, .filter-form a:hover {
            background-color: #ffb700;
        }

.table-responsive {
    width: 100%;
    overflow-x: auto;
}

.table {
    min-width: 1400px; /* 💥 Increase the minimum width */
    table-layout: auto;
    background-color: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(8px);
    border-radius: 12px;
    overflow: hidden;
    color: white;
    word-wrap: break-word;
    white-space: normal;
}

.table thead {
    background: linear-gradient(to right, #ff7b00, #ffcc00);
    color: #000;
    font-weight: bold;
}

.table tbody tr:nth-child(even) {
    background-color: rgba(255, 255, 255, 0.05);
}

.table tbody tr:hover {
    background-color: rgba(255, 255, 255, 0.1);
    transform: scale(1.01);
    transition: transform 0.2s ease; /* Add smooth hover effect */
}

.table td, .table th {
    padding: 12px 20px; /* 💥 Make the padding wider */
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    text-align: center;
    vertical-align: middle;
}

.no-data {
    text-align: center;
    margin-top: 20px;
    font-size: 18px;
    color: #ffcc00;
}

    </style>
</head>
<body>
    <div class="container py-4">
        <h2>Homestay Bookings</h2>

        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-info"><?= $_SESSION['message']; unset($_SESSION['message']); ?></div>
        <?php endif; ?>

        <!-- Dropdown Form -->
        <form method="GET" class="filter-form mb-4">
            <select name="homestay" onchange="this.form.submit()" class="form-select w-auto d-inline-block">
                <option value="">-- Select Homestay --</option>
                <?php while ($homestay = mysqli_fetch_assoc($homestayResult)): ?>
                    <option value="<?= htmlspecialchars($homestay['short_description']) ?>" 
                        <?= ($selectedHomestay == $homestay['short_description']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($homestay['short_description']) ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <?php if ($hasSelection): ?>
                <a href="?" class="btn btn-warning ms-2">Reset Filter</a>
            <?php endif; ?>
        </form>

        <!-- Show Table Only if Homestay Selected -->
        <?php if ($hasSelection): ?>
            <?php if (mysqli_num_rows($result) > 0): ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Homestay</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact Number</th>
                                <th>Guests</th>
                                <th>Arrival</th>
                                <th>Time</th>
                                <th>Departure</th>
                                <th>Request</th>
                                <th>Booked At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= htmlspecialchars($row['homestay_name']) ?></td>
                                    <td><?= htmlspecialchars($row['first_name'] . ' ' . $row['last_name']) ?></td>
                                    <td><?= htmlspecialchars($row['email']) ?></td>
                                    <td><?= htmlspecialchars($row['contact']) ?></td>
                                    <td><?= htmlspecialchars($row['guest_number']) ?></td>
                                    <td><?= htmlspecialchars($row['arrival_date']) ?></td>
                                    <td><?= htmlspecialchars($row['arrival_time']) ?></td>
                                    <td><?= htmlspecialchars($row['departure_date']) ?></td>
                                    <td><?= htmlspecialchars($row['special_request']) ?></td>
                                    <td><?= htmlspecialchars($row['created_at']) ?></td>
                                    <td>
                                        <?php if ($row['action_status']): ?>
                                            <span class="badge <?= $row['action_status'] == 'Accepted' ? 'bg-success' : 'bg-danger' ?>">
                                                <?= htmlspecialchars($row['action_status']) ?>
                                            </span>
                                        <?php else: ?>
                                            <form method="POST" class="d-flex">
                                                <input type="hidden" name="booking_id" value="<?= $row['id'] ?>">
                                                <select name="action_status" class="form-select form-select-sm me-2" required>
                                                    <option value="">--Select--</option>
                                                    <option value="Accepted">Accept</option>
                                                    <option value="Rejected">Reject</option>
                                                </select>
                                                <button type="submit" name="action_submit" class="btn btn-primary btn-sm">Submit</button>
                                            </form>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p class="text-danger">No bookings found for selected homestay.</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</body>
</html>
