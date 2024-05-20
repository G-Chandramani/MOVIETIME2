<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Booking Website</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css"> <!-- Custom CSS file -->
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
            /* filter: blur(40px); */
            filter: opacity(40%);
        }
        p,h4 {
    color: black;
}

        /* Style for movie cards */
        .card {
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .card-body {
            max-height: 300px; /* Set a max-height for the card body */
            padding: 15px; /* Add padding to the card body */
        }

        .card-title {
            margin-bottom: 10px;
        }

        .card-text {
            margin-bottom: 15px;
        }

        .movie-details {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 15px;
            display: none;
            transition: opacity 0.3s ease;
        }

        .card:hover .movie-details {
            display: block;
        }

        .book-now-btn {
            background-color: #ff6b6b;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .book-now-btn:hover {
            background-color: #e25050;
        }

        .card img {
            max-width: 100%; /* Set max-width for the image */
            height: auto; /* Ensure the image height adjusts proportionally */
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
        <div class="container py-5" id="nowShowingCatalog">
            <h2 class="mb-4" style="color: #ff6b6b;">Now Showing</h2>
            <div class="row" id="movie-cards">
                <?php
                // Include database connection
                include_once 'admin/db_connect.php';

                // Fetch movies from the database
                $sql = "SELECT * FROM movies";
                $result = $conn->query($sql);
                $temp = 'admin/';
                // Display movie cards
                if ($result->num_rows > 0) {
                    $counter = 0;
                    while ($row = $result->fetch_assoc()) {
                        if ($counter % 4 == 0) {
                            echo '</div><div class="row">';
                        }
                        echo '<div class="col-md-3 mb-4">';
                        echo '<div class="card" data-movie-id="' . $row['id'] . '">';
                        echo "<img src='" . 'admin/' . $row["image_path"] . "' alt='" . $row["title"] . "'>";
                        echo '<div class="card-body">';
                        echo '<div class="movie-details">';
                        echo '<h5 class="card-title ">' . $row['title'] . '</h5>';
                        echo '<p class="card-text colr">Genre: ' . $row['genre'] . '</p>';
                        echo '<p class="card-text colr">Duration: ' . $row['duration'] . '</p>';
                        echo '<button class="book-now-btn">Book Now</button>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        $counter++;
                    }
                } else {
                    echo 'No movies available';
                }

                // Close database connection
                $conn->close();
                ?>
            </div>
        </div>

        <!-- Include Theater Locations -->
        <div class="container" id="theaterLocations">
            <h2 class="mb-4" style="color: #ff6b6b;">Theater Locations</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">MovieTime Theater 1</h5>
                            <p class="card-text">Location: Pune</p>
                            <p class="card-text">Contact: 123-456-7890</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">MovieTime Theater 2</h5>
                            <p class="card-text">Location: Mumbai</p>
                            <p class="card-text">Contact: 123-456-7890</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">MovieTime Theater 3</h5>
                            <p class="card-text">Location: Hyderabad</p>
                            <p class="card-text">Contact: 123-456-7890</p>
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
    <script src="js/script.js"></script>
    <script>
    $(document).ready(function(){
        $(".book-now-btn").click(function(){
            // Get the movie ID associated with the clicked button
            var movieId = $(this).closest('.card').data('movie-id');
            // Redirect the user to bookmovie.php with the movie ID as a parameter
            window.location.href = "bookmovie.php?movie_id=" + movieId;
        });
    });
    </script>

</body>

</html>
