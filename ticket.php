<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
            height: 100%;
        }
        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            background-color: transparent;
            height: 100%;
        }
       

        .container {
            background-color: #ccc;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px;
        }

        .ticket-info {
            margin-top: 30px;
        }

        .ticket-info p {
            margin: 10px 0;
            font-size: 18px;
            color: #495057;
        }

        .ticket-info li {
            font-size: 16px;
            color: #6c757d;
            margin-left: 20px;
        }

        .qr-code {
            margin-top: 30px;
        }

        .qr-code img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }


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
            <h1 class="text-center mb-4" style="color: #ff6b6b;">Ticket</h1>
            <div class="ticket-info">
                <p style="color: #ff6b6b;">Thank you for booking!</p>
                <p>Here are your ticket details:</p>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Movie:</strong> <?php echo isset($_GET['movie']) ? $_GET['movie'] : 'Unknown'; ?></li>
                    <li class="list-group-item"><strong>Day:</strong> Today</li>
                    <li class="list-group-item"><strong>Time:</strong> 7:00 PM</li>
                    <li class="list-group-item"><strong>Booked Seat No:</strong> <?php echo isset($_GET['seats']) ? $_GET['seats'] : 'None'; ?></li>
                    <li class="list-group-item"><strong>User ID:</strong> <?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 'Guest'; ?></li>
                    <li class="list-group-item"><strong>Total Payment:</strong> <?php echo isset($totalPayment) ? $totalPayment : 'Not Available'; ?></li>
                </ul>
            </div>
            <div style="text-align: center;">
                <img src="images/qr.png" alt="QR CODE" width="15%" height="15%" style="position: relative;">
            </div>
            <div class="text-center mt-4">
                <a href="index.php" class="btn btn-primary">Go to Homepage</a>
            </div>
        </div>
    </main>
    <footer class="bg-dark text-light py-4 ">
        
            <p class="text-center m-0">&copy; <?php echo date('Y'); ?> MovieTime. All rights reserved.</p>
        
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Prevent going back to payment page
        window.history.pushState(null, "", window.location.href);
        window.onpopstate = function() {
            window.history.pushState(null, "", window.location.href);
        };
    </script>
</body>
</html>
