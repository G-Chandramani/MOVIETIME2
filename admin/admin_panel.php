<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Movie Time</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include_once 'includes/header.php'; ?>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="#userManagement">
                                User Management
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#movieManagement">
                                Movie Management
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#bookingManagement">
                                Booking Management
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#seatManagement">
                                Seat Management
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="container mt-4">
                    <h2 class="text-center mb-4">Admin Panel - Movie Time</h2>
                    
                    <!-- User Management -->
                    <div id="userManagement" class="card mb-4">
                        <div class="card-header">
                            <h4>User Management</h4>
                        </div>
                        <div class="card-body">
                            <?php include_once 'display_users.php'; ?>
                        </div>
                    </div>

                    <!-- Movie Management -->
                    <div id="movieManagement" class="card mb-4">
                        <div class="card-header">
                            <h4>Movie Management</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="add-movie-form">
                                        <!-- Add Movie Form -->
                                        <?php include_once 'add_movie_form.php'; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="movie-list">
                                        <!-- Display Movie List -->
                                        <?php include_once 'display_movies.php'; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Booking Management -->
                    <div id="bookingManagement" class="card mb-4">
                        <div class="card-header">
                            <h4>Booking Management</h4>
                        </div>
                        <div class="card-body">
                            <!-- Display Booking List -->
                            <div id="bookingListContainer"></div>
                        </div>
                    </div>
                    
                    <!-- Seat Management -->
                    <div id="seatManagement" class="card mb-4">
                        <div class="card-header">
                            <h4>Seat Management</h4>
                        </div>
                        <div class="card-body">
                            <!-- Display Seat List -->
                            <?php include_once 'display_seats.php'; ?>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Include footer and scripts -->
    <?php include_once 'includes/footer.php'; ?>

    <!-- JavaScript to fetch and display bookings -->
    <script>
        function displayBookings() {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById("bookingListContainer").innerHTML = xhr.responseText;
                }
            };
            xhr.open("GET", "display_bookings.php", true);
            xhr.send();
        }

        // Call the function when the page loads
        window.onload = function() {
            displayBookings();
        };
    </script>
</body>
</html>
