<?php
session_start(); // Start the session
require __DIR__ . '/../vendor/autoload.php';
use Dompdf\Dompdf;

// Get booking data from session
$data = $_SESSION['booking_data'] ?? [];

if (empty($data)) {
    echo "No booking data found.";
    exit;
}

// Generate HTML for PDF
$html = "
<h2 style='text-align:center;'>Booking Details</h2>
<table border='1' cellpadding='8' cellspacing='0' style='width:100%; border-collapse:collapse;'>
    <tr><td><strong>First Name</strong></td><td>{$data['first_name']}</td></tr>
    <tr><td><strong>Last Name</strong></td><td>{$data['last_name']}</td></tr>
    <tr><td><strong>Email</strong></td><td>{$data['email']}</td></tr>
    <tr><td><strong>Contact Number</strong></td><td>{$data['contact']}</td></tr>
    <tr><td><strong>Number of Guests</strong></td><td>{$data['guest_number']}</td></tr>
    <tr><td><strong>Check-In Date</strong></td><td>{$data['arrival_date']}</td></tr>
    <tr><td><strong>Check-In Time</strong></td><td>{$data['arrival_time']}</td></tr>
    <tr><td><strong>Check-Out Date</strong></td><td>{$data['departure_date']}</td></tr>
    <tr><td><strong>Special Request</strong></td><td>{$data['special_request']}</td></tr>
    <tr><td><strong>Homestay</strong></td><td>{$data['homestay_name']}</td></tr>
</table>
<p style='text-align:center;'>Thank you for choosing our service!</p>
";

// Generate PDF
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Save PDF to server
$output = $dompdf->output();
$file_path = __DIR__ . "/booking_details.pdf"; // Save the file path on the server
file_put_contents($file_path, $output);

// Send PDF to browser for download using a link and JavaScript for redirection
echo "
    <script>
        // Create a download link
        var link = document.createElement('a');
        link.href = 'booking_details.pdf'; // Link to the saved PDF
        link.download = 'booking_details.pdf'; // PDF file name
        
        // Trigger download
        link.click();
        
        // Redirect to the homepage after download starts
        setTimeout(function() {
            window.location.href = 'http://localhost/PbuTravel/PBU_TRAVEL/home/home.php';
        }, 1000); // Redirect after 1 second
    </script>
";
?>
