<?php
// Start session
session_start();

// Include the database connection file
include_once 'admin/db_connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve selected seats, total price, and movie name from form submission
    $selectedSeats = $_POST["selectedSeats"];
    $totalPrice = $_POST["totalPrice"]; // Convert to float
    $movieName = $_POST["movie"];

    // Check if the user is logged in
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
    } else {
        // If the user is not logged in, assign a random user ID
        $userId = rand(1000, 9999);
    }

    // If the user is logged in, get the user's name
    if (isset($_SESSION['username'])) {
        $userName = $_SESSION['username'];
    } else {
        // If the user is not logged in, set the username to NULL
        $userName = NULL;
    }

    // Get current date and time
    $bookingDate = date('Y-m-d H:i:s');

    // Count total number of seats
    $totalSeats = count(explode(',', $selectedSeats));

    // Prepare and execute SQL statement to insert booking information into the database
    $sql = "INSERT INTO bookings (user_id, username, movie, booking_date, total_seats, seats_numbers, total_payment) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('isssisd', $userId, $userName, $movieName, $bookingDate, $totalSeats, $selectedSeats, $totalPrice);

    if ($stmt->execute()) {
        // Redirect to ticket page with selected seats, movie name, and total payment as URL parameters
        $selectedSeatsArray = json_decode($selectedSeats, true); // Convert JSON string to array
        $selectedSeatsQueryParam = implode(',', $selectedSeatsArray);
        header("Location: ticket.php?selectedSeats=$selectedSeatsQueryParam&movie=$movieName&totalPrice=$totalPrice");
        header("Location: ticket.php?movie=$movieName&seats=$selectedSeatsQueryParam&total_payment=$totalPrice");
        exit();
    } else {
        // Redirect to payment failed page
        header("Location: payment_failed.html");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head content -->
    <style>
        #bg-video {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensure the video covers the entire viewport */
            z-index: -1; /* Place the video behind other content */
            filter: opacity(40%);
        }
        footer{
            margin-top:8%;
        }
        </style>
</head>
<body>
    <!-- Include header -->
    <?php include 'assets/header.php'; ?>

    <video autoplay muted loop id="bg-video">
        <source src="videofiles/Rounded_Animation.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
   
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="payment-form">
                    <h2 class="text-center mb-4" style="color: #ff6b6b;">Payment</h2>
                    <!-- Summary section -->
                    <div class="summary">
                        <h4>Total Charge</h4>
                        <!-- Display total payment received from URL parameter -->
                        <p>Total Price: <span id="total-price"><?php echo isset($_GET['total_payment']) ? htmlspecialchars($_GET['total_payment']) : ''; ?> rs</span></p>
                    </div>
                    <!-- Payment form -->
                    <form id="payment-form" action="" method="post">
                        <!-- Add a hidden input field to pass the movie value -->
                        <input type="hidden" name="movie" value="<?php echo isset($_GET['movie']) ? htmlspecialchars($_GET['movie']) : ''; ?>">
                        <p>Total Price: <span id="total-price"><?php echo isset($_GET['total_payment']) ? htmlspecialchars($_GET['total_payment']) : ''; ?> rs</span></p>

                        <!-- Hidden input fields to pass selected seats and total price -->
                        <input type="hidden" name="selectedSeats" id="selectedSeats">
                        <!-- <input type="hidden" name="totalPrice" id="totalPrice"> -->

                        <div class="form-group">
                            <label for="card-number">Card Number (16 digits)</label>
                            <input type="text" class="form-control" id="card-number" name="cardNumber" placeholder="Enter card number" pattern="[0-9]*" maxlength="16" required>
                        </div>
                        <div class="form-group">
                            <label for="expiry-date">Expiry Date (MM/YY)</label>
                            <input type="text" class="form-control" id="expiry-date" name="expiryDate" placeholder="MM/YY" maxlength="5" required>
                        </div>
                        <div class="form-group">
                            <label for="cvv">CVV (3 digits)</label>
                            <input type="text" class="form-control" id="cvv" name="cvv" placeholder="CVV" pattern="\d{3}" maxlength="3" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Make Payment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const totalPrice = JSON.parse(localStorage.getItem("totalPrice"));
            const totalPriceElement = document.getElementById("total-price");
            totalPriceElement.textContent = `${totalPrice} rs`;

            // Retrieve selected seats from localStorage
            const selectedSeats = JSON.parse(localStorage.getItem("selectedSeats"));

            // Set the value of hidden input field for selected seats
            document.getElementById("selectedSeats").value = JSON.stringify(selectedSeats);

            document.getElementById("expiry-date").addEventListener("input", function() {
                const input = this.value;
                if (input.length === 2 && !input.includes("/")) {
                    this.value = input + "/";
                }
            });
        });
    </script>
    <footer class="bg-dark text-light py-4 ">
        
        <p class="text-center m-0">&copy; <?php echo date('Y'); ?> MovieTime. All rights reserved.</p>
    
</footer>
</body>
</html>
