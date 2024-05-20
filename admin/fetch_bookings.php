<?php
// Include database connection
include_once 'db_connect.php';

// SQL query to fetch bookings
$sql = "SELECT id,user_id,movie,total_seats,seats_numbers,booking_date FROM bookings";
$result = $conn->query($sql);

// Array to hold bookings data
$bookings = array();

// Check if there are any bookings
if ($result->num_rows > 0) {
    // Loop through each booking and store details in the $bookings array
    while($row = $result->fetch_assoc()) {
        $bookings[] = $row;
    }
}

// Close database connection
$conn->close();

// Output bookings data as JSON
echo json_encode($bookings);
?>
