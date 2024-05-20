<?php
// Include database connection
include_once 'db_connect.php';

// Fetch bookings from the database
$sql = "SELECT id,user_id,movie,total_seats,seats_numbers,booking_date  FROM bookings";
$result = $conn->query($sql);

// Check if there are any bookings
if ($result->num_rows > 0) {
    // Start building the HTML content
    $output = "<table class='table table-bordered'>";
    $output .= "<thead class='thead-dark'>";
    $output .= "<tr>";
    $output .= "<th>ID</th>";
    $output .= "<th>User ID</th>";
    $output .= "<th>Movie</th>";
    $output .= "<th>Seats Number</th>";
    $output .= "<th>Total Seats</th>";
    $output .= "<th>Booking Date</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";

    // Loop through each booking and append it to the HTML content
    while ($row = $result->fetch_assoc()) {
        $output .= "<tr>";
        $output .= "<td>" . $row['id'] . "</td>";
        $output .= "<td>" . $row['user_id'] . "</td>";
        $output .= "<td>" . $row['movie'] . "</td>";
        $output .= "<td>" . $row['seats_numbers'] . "</td>";
        $output .= "<td>" . $row['total_seats'] . "</td>";
        $output .= "<td>" . $row['booking_date'] . "</td>";
        $output .= "</tr>";
    }

    $output .= "</tbody>";
    $output .= "</table>";

    // Output the generated HTML content
    echo $output;
} else {
    // If no bookings found, display a message
    echo "<p class='text-center'>No bookings available</p>";
}

// Close database connection
$conn->close();
?>
<script>
// Function to fetch bookings data using AJAX
function displayBookings() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("bookingList").innerHTML = xhr.responseText;
        }
    };
    xhr.open("GET", "display_bookings.php", true);
    xhr.send();
}

// Call the function when the page loads
window.onload = function() {
    displayBookings();
};
</script>
