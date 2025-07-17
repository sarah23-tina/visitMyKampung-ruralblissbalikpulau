<?php
include '../inc/db_connect.php';
include '../inc/side_nav_bar.php'; 
$homestay_name = '';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize the ID

    // Fetch name from your homestay/mosestay table
    $query = "SELECT short_description,hemail FROM travel_ideas WHERE id = $id";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $homestay_name = $row['short_description'];
        $homestay_hemail = $row['hemail'];
    } else {
        $homestay_name = "Unknown Homestay";
        $homestay_hemail = "Unknown Email";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Hotel Booking</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .header {
            background: url('../srcimg/bg.jpeg') no-repeat center center;
            background-size: cover;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: black;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.7);
            font-size: 36px;
            font-weight: bold;
        }

        .main-content {
            background: #ffffff;
            margin: -50px auto 0 auto;
            padding: 40px;
            border-radius: 10px;
            max-width: 900px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            box-sizing: border-box;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: black;
        }

        form {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 255, 255, 0.3);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: black;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: none;
            background: #444;
            color: black;
        }

        .row {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .row > div {
            flex: 1;
        }

        .form-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .back-btn, .submit-btn {
            background: #00ffff;
            color: #000;
            font-weight: bold;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .back-btn:hover, .submit-btn:hover {
            background: #00cccc;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<div class="header">
    Homestay Booking
</div>

<div class="main-content">

<?php if (!empty($homestay_name)): ?>
    <h2>Booking for: <?php echo htmlspecialchars($homestay_name); ?></h2>
<?php endif; ?>

    <form action="submit_booking.php" method="post">
        <div class="row">
            <div>
                <label>First Name:</label>
                <input type="text" name="first_name" required>
            </div>
            <div>
                <label>Last Name:</label>
                <input type="text" name="last_name" required>
            </div>
            <div>
                <label>Email:</label>
                <input type="email" name="email" required>
            </div>
        </div>

        <div class="row">
            <div>
                <label>Contact Number:</label>
                <input type="number" name="contact" min="1" required>
            </div>
            <div>
                <label>Number of Guests:</label>
                <input type="number" name="guests" min="1" required>
            </div>
        </div>

        <label>Check-In Date & Time:</label>
        <div class="row">
            <div><input type="date" name="arrival_date" required></div>
            <div><input type="time" name="arrival_time" required></div>
        </div>

        <label>Check-Out Date:</label>
        <div class="row">
            <input type="date" id="departure_date" name="departure_date" required>

            <!-- Hidden fields to send separately -->
            <input type="hidden" name="departure_month" id="departure_month">
            <input type="hidden" name="departure_day" id="departure_day">
            <input type="hidden" name="departure_year" id="departure_year">
        </div>

        <label>Special Request:</label>
        <textarea name="special_request" rows="4" placeholder="Enter any special requirements..."></textarea>

        <input type="hidden" name="homestay_id" value="<?php echo htmlspecialchars($id); ?>">
        <input type="hidden" name="short_description" value="<?php echo htmlspecialchars($homestay_name); ?>">
        <input type="hidden" name="hemail" value="<?php echo htmlspecialchars($homestay_hemail); ?>">

        <p style="font-size: 12px; color: #333; margin-top: 20px;">
             <b>After submission, the owner will receive notification via email. Please WhatsApp the owner for fast response. Thank you.</b>
        </p>

        <div class="form-buttons">
            <button class="back-btn" type="button" onclick="window.location.href='../../PBU_TRAVEL/travel_idea/travel_idea.php'">← Back</button>
            <button class="submit-btn" type="submit">Submit Booking</button>
        </div>
    </form>
</div>

<script>
    const dateInput = document.getElementById('departure_date');
    dateInput.addEventListener('change', function () {
        const date = new Date(this.value);
        if (!isNaN(date)) {
            document.getElementById('departure_month').value = date.getMonth() + 1; // Months are 0-indexed
            document.getElementById('departure_day').value = date.getDate();
            document.getElementById('departure_year').value = date.getFullYear();
        }
    });
</script>

<?php include '../inc/footer.php'; ?>
</body>
</html>
