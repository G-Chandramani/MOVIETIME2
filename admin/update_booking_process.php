<?php
include_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id']) && isset($_POST['movie']) && isset($_POST['seats_numbers'])) {
        $id = $_POST['id'];
        $movieName = $_POST['movie'];
        $seatsNumbers = $_POST['seats_numbers'];

        $sql = "UPDATE bookings SET movie = ?, seats_numbers = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $movieName, $seatsNumbers, $id);

        if ($stmt->execute()) {
            header("Location: booking_success.php");
            exit();
        } else {
            echo "Error updating booking: " . $conn->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Invalid request method.";
}
?>
