<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        /* Style for the background video */
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
    
    <!-- Header -->
    <?php
     include 'assets/header.php'; 
    ?>
    <main>
    <!-- Contact Us Content -->
    <div class="container mt-5">
        <h1 class="text-center mb-4">Contact Us</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Include your database connection file
                    include_once 'admin/db_connect.php';

                    // Retrieve form data
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $message = $_POST['message'];

                    // Insert data into contactus table
                    $sql = "INSERT INTO contactus (name, email, message) VALUES ('$name', '$email', '$message')";

                    if ($conn->query($sql) === TRUE) {
                        echo '<div class="alert alert-success" role="alert">Form submitted successfully. We will reach out to you soon!</div>';
                    } else {
                        echo '<div class="alert alert-danger" role="alert">Oops! Something went wrong. Please try again later.</div>';
                    }

                    // Close database connection
                    $conn->close();
                }
                ?>
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea id="message" name="message" rows="5" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    </main>
    <!-- Footer -->
    <?php include 'assets/footer.php'; ?>
    
 
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
