<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Booking</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center mb-4">Update Booking</h2>
        <?php
        include_once 'db_connect.php';

        if (isset($_GET['id'])) {
            $bookingId = $_GET['id'];

            $sql = "SELECT * FROM bookings WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $bookingId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                ?>
                <form action="update_booking_process.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="form-group">
                        <label for="movie">Movie:</label>
                        <input type="text" class="form-control" id="movie" name="movie" value="<?php echo $row['movie']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="seats">Seats Numbers:</label>
                        <input type="text" class="form-control" id="seats" name="seats_numbers" value="<?php echo $row['seats_numbers']; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Update Booking</button>
                </form>
                <?php
            } else {
                echo "Booking not found.";
            }

            $stmt->close();
            $conn->close();
        } else {
            echo "Error: Booking ID is not set.";
        }
        ?>
    </div>
</body>
</html>
