<?php
// Include the database connection file
include_once 'db_connect.php';

// Fetch seats data from the database
$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h5>Booking List</h5>";
    echo "<table class='table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Movie</th>";
    echo "<th>Seats Booked</th>";
    echo "<th>Action</th>"; // Add new column for action buttons
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['movie'] . "</td>";
        echo "<td>" . $row['seats_numbers'] . "</td>";
        // Add action buttons for delete and update
        echo "<td>";
        echo "<button class='btn btn-danger btn-sm' onclick='deleteBooking(" . $row['id'] . ")'>Delete</button>";
        echo "<button class='btn btn-primary btn-sm ml-2' onclick='updateBooking(" . $row['id'] . ")'>Update</button>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "No bookings found.";
}

// Close the database connection
$conn->close();
?>

<script>
    function deleteBooking(bookingId) {
        // Send an Ajax request to delete the booking record
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Reload the page after deletion or update the table
                location.reload();
            }
        };
        xhr.open("POST", "delete_booking.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("id=" + bookingId);
    }

    function updateBooking(bookingId) {
        // Redirect to the update booking page with the bookingId as a parameter
        window.location.href = "update_booking.php?id=" + bookingId;
    }
</script>
