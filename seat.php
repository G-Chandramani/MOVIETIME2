<?php
include_once 'admin/db_connect.php';

// Function to fetch booked seats from the database
function fetchBookedSeats($conn) {
    $bookedSeats = [];
    $sql = "SELECT seats_numbers FROM bookings";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $seats = json_decode($row["seats_numbers"]);
            foreach ($seats as $seat) {
                array_push($bookedSeats, $seat);
            }
        }
    }
    return $bookedSeats;
}

$bookedSeats = fetchBookedSeats($conn); // Fetch booked seats

// Get movie ID from URL
$movieId = $_GET['movie_id'] ?? 0;

// Function to fetch the number of seats for the selected movie
function fetchMovieSeats($conn, $movieId) {
    $sql = "SELECT seats FROM movies WHERE id = $movieId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['seats'];
    } else {
        return 0;
    }
}

// Function to fetch booked seats from the database for a specific movie
function fetchBookedSeatsForMovie($conn, $movieId) {
    $bookedSeats = [];
    $sql = "SELECT seats_numbers FROM bookings WHERE movie_id = $movieId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $seats = json_decode($row["seats_numbers"]);
            foreach ($seats as $seat) {
                array_push($bookedSeats, $seat);
            }
        }
    }
    return $bookedSeats;
}


// Fetch the number of seats for the selected movie
$numSeats = fetchMovieSeats($conn, $movieId);
$bookedForCurrentMovie = fetchBookedSeatsForMovie($conn, $movieId);
// Convert booked seats to JSON for JavaScript usage
$bookedSeatsJSON = json_encode($bookedForCurrentMovie);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Ticket Booking - Select Seats</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add your custom styles here */
        .seat-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .seat {
            width: 30px;
            height: 30px;
            border: 1px solid #ccc;
            margin: 2px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            background-color: #f0f0f0; /* Light gray background */
            color: #333; /* Dark gray text */
            font-weight: bold;
            font-size: 0.8em;
            border-radius: 5px; /* Rounded corners */
        }
        .seat.selected {
            background-color: #6a9;
            color: #fff;
        }
        .seat.booked {
            background-color: #E32636; /* Gray background for booked seats */
            color: #fff;
            cursor: not-allowed;
        }
        .screen {
            border-top: 2px solid #333;
            height: 30px;
            text-align: center;
            font-weight: bold;
            margin-top: 20px;
        }
        .content {
            position: relative;
        }
        #bg-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            filter: opacity(40%);
        }
        /* Add color to the footer */
        .footer {
            background-color: #333; /* Dark background color */
            color: #fff; /* White text color */
            padding: 20px; /* Add padding for spacing */
            text-align: center; /* Center align text */
        }
        Adjust the position of the footer
        footer.footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: 999;
        }
    </style>
</head>
<body>
    <video autoplay muted loop id="bg-video">
        <source src="videofiles/Rounded_Animation.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <?php include 'assets/header.php'; ?>
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="content">
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Seats selection interface -->
                                <h2 id="movieTitle">---movie name----</h2>
                                <p>Please select your seats:</p>
                                <div class="seat-container seats">
                                    <?php
                                    // Generate seats dynamically based on the number of seats for the selected movie
                                    for ($i = 1; $i <= $numSeats; $i++) {
                                        $seatId = 'seat-' . $i;
                                        $isBooked = in_array($seatId, $bookedForCurrentMovie) ? ' booked' : '';
                                        echo "<div class='seat{$isBooked}' id='{$seatId}'>{$i}</div>";
                                    }
                                    ?>
                                </div>
                                <div class="screen"></div>
                                <p>SCREEN THIS SIDE</p>
                            </div>
                            <div class="col-md-4">
                                <!-- Selected seats and total price -->
                                <h3>Selected Seats</h3>
                                <ul class="seats-list"></ul>
                                <h4 class="total-price"><span></span></h4>
                                <button id="paymentButton" class="btn btn-primary">Pay {price}</button>
                                <button class="btn btn-secondary" onclick="clearSelectedSeats()">Clear Selection</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include 'assets/footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Get movie title from URL and display it
            const urlParams = new URLSearchParams(window.location.search);
            const movieTitle = urlParams.get('movie_title');
            if (movieTitle) {
                document.getElementById('movieTitle').textContent = `Booking For Movie: ${movieTitle}`;
            }

            const seatContainer = document.querySelector('.seat-container');
            const selectedSeatsList = document.querySelector('.seats-list');
            const totalPriceElement = document.querySelector('.total-price span');
            const paymentButton = document.getElementById('paymentButton');

            const numSeats = <?php echo $numSeats; ?>; // Number of seats
            let totalPrice = 0;
            let maxSelectedSeats = 5;
            let selectedSeatsCount = 0;
            let selectedSeats = [];

            // Create seats
            const seats = document.querySelectorAll('.seat');
            seats.forEach(seat => {
                seat.addEventListener('click', () => {
                    if (!seat.classList.contains('booked')) { // Check if seat is not already booked
                        seat.classList.toggle('selected');

                        if (seat.classList.contains('selected')) {
                            if (selectedSeatsCount < maxSelectedSeats) {
                                selectedSeats.push(seat.id);
                                totalPrice += 100;
                                selectedSeatsCount++;
                            } else {
                                seat.classList.toggle('selected');
                                alert(`You can only select up to ${maxSelectedSeats} seats.`);
                            }
                        } else {
                            const index = selectedSeats.indexOf(seat.id);
                            selectedSeats.splice(index, 1);
                            totalPrice -= 100;
                            selectedSeatsCount--;
                        }

                        seat.classList.add('booked'); // Mark the seat as booked
                        updatePaymentButton();
                    }
                });
            });

            // Clear selected seats
            window.clearSelectedSeats = () => {
                selectedSeats.forEach((seatId) => {
                    const seat = document.getElementById(seatId);
                    seat.classList.remove('selected');
                    seat.classList.remove('booked'); // Remove booked status when clearing selection
                });
                selectedSeatsList.innerHTML = '';
                totalPrice = 0;
                selectedSeatsCount = 0;
                totalPriceElement.textContent = `${totalPrice} `;
                selectedSeats = [];
                updatePaymentButton();
            };

            // Proceed to payment button click event
            paymentButton.addEventListener('click', () => {
                generateTicket();
            });

            // Generate Ticket function
            const generateTicket = () => {
                if (selectedSeats.length > 0) {
                    // Save selected seats and total price in local storage
                    localStorage.setItem('selectedSeats', JSON.stringify(selectedSeats));
                    localStorage.setItem('totalPrice', totalPrice);

                    // Redirect to payment page with selected seats and total price as URL parameters
                    window.location.href = `payment.php?movie=${encodeURIComponent(movieTitle)}&totalPrice=${totalPrice}`;
                } else {
                    alert('Please select seats first.');
                }
            };


            // Update payment button text and state
            const updatePaymentButton = () => {
                if (selectedSeats.length > 0) {
                    paymentButton.textContent = `Pay ${totalPrice} Rs`;
                    paymentButton.disabled = false;
                    updateSelectedSeatsList();
                } else {
                    paymentButton.textContent = 'Proceed to Payment';
                    paymentButton.disabled = true;
                }
            };

            // Function to update the list of selected seats
            const updateSelectedSeatsList = () => {
                selectedSeatsList.innerHTML = '';
                selectedSeats.forEach(seatId => {
                    const seatNumber = seatId.split('-')[1];
                    const li = document.createElement('li');
                    li.textContent = `Seat ${seatNumber}`;
                    selectedSeatsList.appendChild(li);
                });
            };
        });
    </script>
</body>
</html>
