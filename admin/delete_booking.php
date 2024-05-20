<?php
// Include the database connection file
include_once 'db_connect.php';

// Check if the booking ID is set in the POST request
if (isset($_POST['id'])) {
    // Sanitize the input
    $bookingId = $_POST['id'];

    // Prepare a DELETE statement
    $sql = "DELETE FROM bookings WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $bookingId);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Booking deleted successfully.";
    } else {
        echo "Error deleting booking: " . $conn->error;
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If the booking ID is not set in the POST request, display an error message
    echo "Error: Booking ID is not set.";
}
?>
