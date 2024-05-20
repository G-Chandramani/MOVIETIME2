<?php
// Include the database connection file
include_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if (isset($_POST['id']) && isset($_POST['movie']) && isset($_POST['seats_numbers'])) {
        // Sanitize the input
        $id = $_POST['id'];
        $movieName = $_POST['movie'];
        $seatsNumbers = $_POST['seats_numbers'];

        // Prepare an UPDATE statement
        $sql = "UPDATE bookings SET movie = ?, seats_numbers = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $movieName, $seatsNumbers, $id);

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to a success page or display a success message
            header("Location: booking_success.php");
            exit();
        } else {
            // Handle the update failure
            echo "Error updating booking: " . $conn->error;
        }

        // Close the statement and database connection
        $stmt->close();
        $conn->close();
    } else {
        // Handle missing fields
        echo "All fields are required.";
    }
} else {
    // Handle invalid request method
    echo "Invalid request method.";
}
?>
