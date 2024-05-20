<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Ticket Booking - Registration</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Your internal CSS styles go here */
        main {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
            background-color:transparent;
        }
        html{
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .registration-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f7f7f7; /* Light gray background */
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        .form-group label {
            font-weight: bold;
            color: #333; /* Dark gray text */
        }
        .form-control {
            margin-bottom: 15px;
            background-color: #fff; /* White input field */
        }
        .btn-primary {
            background-color: #ff6b6b; /* Red button color */
            border-color: #ff6b6b; /* Red button border color */
            color: #fff; /* White text color */
        }
        .btn-primary:hover {
            background-color: #ff3f3f; /* Darker red on hover */
            border-color: #ff3f3f; /* Darker red border on hover */
        }
        #bg-video {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensure the video covers the entire viewport */
            z-index: -1; /* Place the video behind other content */
            /* filter: blur(40px); */
            filter: opacity(40%);
        }
    </style>
</head>
<body>
    <video autoplay muted loop id="bg-video">
        <source src="videofiles/Rounded_Animation.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <?php
     include 'assets/header.php'; 
    ?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="registration-form">
                    <h2 class="text-center mb-4" style="color: #ff6b6b;">MovieTime Registration</h2>
                    
                    <!-- Registration form -->
                    <form action="#" method="post">
                        <?php
                        // Include the database connection file
                        include_once 'admin/db_connect.php';

                        // Handle form submission
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            // Retrieve form data
                            $name = $_POST["name"];
                            $username = $_POST["username"];
                            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

                            // Prepare and execute SQL statement to insert user data
                            $sql = "INSERT INTO users (name, username, password) VALUES ('$name', '$username', '$password')";
                            if ($conn->query($sql) === TRUE) {
                                // Registration successful, redirect to login page
                                header("Location: login.php");
                                exit();
                            } else {
                                // Registration failed, redirect to registration page with error message
                                header("Location: register.php?error=1");
                                exit();
                            }
                        }
                        ?>
                        <div class="form-group">
                            <label for="name">Enter Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Enter Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
                        </div>
                        <div class="form-group">
                            <label for="pass">Enter Password</label>
                            <input type="password" class="form-control" id="pass" name="password" placeholder="Enter Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </form>
                    <div class="text-center mt-3">
                        <a href="login.php">Already have an account? Login here.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<footer class="bg-dark text-light py-4 ">
        
        <p class="text-center m-0">&copy; <?php echo date('Y'); ?> MovieTime. All rights reserved.</p>
    
</footer>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   
</body>
</html>
