<?php
session_start(); // Start the session
include '../inc/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get all the submitted POST data
    $first_name      = $_POST['first_name'];
    $last_name       = $_POST['last_name'];
    $email           = $_POST['email'];
    $contact         = $_POST['contact'];
    $guest_number    = $_POST['guests'];
    $arrival_date    = $_POST['arrival_date'];
    $arrival_time    = $_POST['arrival_time'];
    $departure_date  = $_POST['departure_year'] . '-' . str_pad($_POST['departure_month'], 2, "0", STR_PAD_LEFT) . '-' . str_pad($_POST['departure_day'], 2, "0", STR_PAD_LEFT);
    $special_request = $_POST['special_request'];
    $homestay_name   = isset($_POST['short_description']) ? $_POST['short_description'] : "Unknown Homestay";
    $homestay_hemail = isset($_POST['hemail']) ? $_POST['hemail'] : "Unknown Email";

    // Save to session
    $_SESSION['booking_data'] = [
        'first_name'      => $first_name,
        'last_name'       => $last_name,
        'email'           => $email,
        'contact'         => $contact,
        'guest_number'    => $guest_number,
        'arrival_date'    => $arrival_date,
        'arrival_time'    => $arrival_time,
        'departure_date'  => $departure_date,
        'special_request' => $special_request,
        'homestay_name'   => $homestay_name,
        'homestay_hemail' => $homestay_hemail
    ];

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO hotel_bookings 
        (first_name, last_name, email, contact, guest_number, arrival_date, arrival_time, departure_date, special_request, homestay_name, hemail) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param(
        "ssssissssss",
        $first_name,
        $last_name,
        $email,
        $contact,
        $guest_number,
        $arrival_date,
        $arrival_time,
        $departure_date,
        $special_request,
        $homestay_name,
        $homestay_hemail
    );

    if ($stmt->execute()) {
        // Safely escape variables for JavaScript
        $escaped_first_name = htmlspecialchars($first_name, ENT_QUOTES);
        $escaped_last_name = htmlspecialchars($last_name, ENT_QUOTES);
        $escaped_arrival_date = htmlspecialchars($arrival_date, ENT_QUOTES);
        $escaped_departure_date = htmlspecialchars($departure_date, ENT_QUOTES);
        $escaped_homestay_hemail = htmlspecialchars($homestay_hemail, ENT_QUOTES);

        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script src='https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js'></script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            emailjs.init('z4SC9N-iN0DcliFWM'); // Your public key

            emailjs.send('service_pkn6eas', 'template_hmlfdl8', {
                email: '{$escaped_homestay_hemail}',
                name: 'Name: {$escaped_first_name} {$escaped_last_name}',
                arrival: 'Arrival Date: {$escaped_arrival_date}',
                departure: 'Departure Date: {$escaped_departure_date}'
            }).then(function(response) {
                console.log('Email successfully sent!', response.status, response.text);
            }, function(error) {
                console.error('Failed to send email:', error);
            });

            Swal.fire({
                title: 'Booking Successful!',
                text: 'Do you want to save your booking as a PDF?',
                icon: 'success',
                showCancelButton: true,
                confirmButtonText: 'Yes, save as PDF',
                cancelButtonText: 'No, just close'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'generate_pdf.php';
                } else {
                    window.location.href = 'http://localhost/PbuTravel/PBU_TRAVEL/home/home.php';
                }
            });
        });
        </script>";
    }

    $stmt->close();
    $conn->close();
}
?>
