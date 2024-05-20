

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieTime - Login</title>
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
        .login-form {
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
        .summary {
            background-color: #fff; /* White background */
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .summary h4 {
            margin-bottom: 10px;
            color: #333; /* Dark gray text */
        }
        #total-price {
            color: #ff6b6b; /* Red text for total price */
            font-weight: bold;
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
        .footer {
            background-color: #333; /* Dark background color */
            color: #fff; /* White text color */
            padding: 20px; /* Add padding for spacing */
            text-align: center; /* Center align text */
            margin-top:50%;
        }
        
    </style>
</head>
<body>
<?php
                        // Include the database connection file from the admin folder
                        include_once 'admin/db_connect.php';

                        // Handle form submission
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            // Retrieve form data
                            $username = $_POST["username"];
                            $password = $_POST["password"];

                            // Execute query to retrieve user record
                            $sql = "SELECT * FROM users WHERE username = '$username'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // User found, verify password
                                $row = $result->fetch_assoc();
                                if (password_verify($password, $row["password"])) {
                                    // Password matches, redirect to movies page
                                    header("Location: movies.php");
                                    exit();
                                } else {
                                    // Invalid password, redirect to login page with error message
                                    header("Location: login.php?error=1");
                                    exit();
                                }
                            } else {
                                // User not found, redirect to login page with error message
                                header("Location: login.php?error=2");
                                exit();
                            }
                        }
                        ?>
    <video autoplay muted loop id="bg-video">
        <source src="videofiles/Rounded_Animation.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <?php include 'assets/header.php'; 
    ?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="registration-form">
                    <h2 class="text-center mb-4" style="color: #ff6b6b;">MovieTime Login</h2>
                    
                   
                    <!-- login form -->
                    <form id="login-form" action="#" method="post">
                      
                        <div class="form-group">
                            <label for="username">Enter Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" maxlength="10" required>
                        </div>
                        <div class="form-group">
                            <label for="pass">Enter Password</label>
                            <input type="password" class="form-control" id="pass" name="password" placeholder="Enter Password"  maxlength="10" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block"> Login</button>
                        <button type="button" class="btn btn-danger btn-block" onclick="window.location.href='register.php'"> Register</button>
                    </form>
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
   
    </script>
</body>
</html>
