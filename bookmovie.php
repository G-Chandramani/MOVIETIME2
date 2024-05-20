<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Movie - Book Tickets Now</title>
    <link rel="stylesheet" href="css/booking.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
    <?php include 'assets/header.php'; ?>
    

    <main>
        <?php
        if(isset($_GET['movie_id'])) {
            include_once 'admin/db_connect.php';

            $movie_id = $_GET['movie_id'];

            // Fetch movie details from the database
            $movie_sql = "SELECT * FROM movies WHERE id = $movie_id";
            $movie_result = $conn->query($movie_sql);

            if ($movie_result->num_rows > 0) {
                $row = $movie_result->fetch_assoc();

                // Display movie details
                echo '<div class="container">';
                echo '<div class="movie-container">';
                echo '<div class="movie-poster">';
                echo '<img src="'. 'admin/'  . $row["image_path"] . '" alt="Movie poster" class="movie-image">';
                echo '</div>';
                echo '<div class="movie-info">';
                echo '<h2>' . $row['title'] . '</h2>';
                echo '<div class="rating">' . $row['rating'] . '</div>';
                echo '<div class="trailer">';
                echo '<a href="' . $row['trailer'] . '">Trailer 1</a>';
                echo '</div>';
                echo '<div class="details">';
                echo '<p>In cinemas</p>';
                echo '<p>' . $row['duration'] . ' Min </p>';
                echo '<p>' . $row['genre'] . '</p>';
                echo '<p>⚫UA ' . date('d-m-Y', strtotime($row['release_date'])) . '</p>';
                echo '</div>';
                echo '<button class="book-button" onclick="redirectToSeatPage(' . $movie_id . ', \'' . $row['title'] . '\')">Book Tickets</button>';
                echo '</div>';
                echo '</div>';
                echo '</div>';

                // Display about movie section
                echo '<div id="about_movie1">';
                echo '<h3>About the Movie</h3>';
                echo '<p>' . $row['movie_desc'] . '</p>';
                echo '</div>';
            } else {
                echo 'No movie found';
            }
            //  //Fetch cast information from the database
        //     $cast_sql = "SELECT * FROM cast WHERE movie_id = $movie_id";
        //     $cast_result = $conn->query($cast_sql);

        //     if ($cast_result->num_rows > 0) {
        //         // Display cast section
        //         echo '<h3>Cast</h3>';
        //         echo '<div class="cast-container">';
        //         while ($cast_row = $cast_result->fetch_assoc()) {
        //             echo '<div class="cast-member">';
        //             echo '<img src="../images/' . $cast_row['image'] . '" alt="' . $cast_row['name'] . '">';
        //             echo '<h5>' . $cast_row['name'] . '</h5>';
        //             echo '<p>' . $cast_row['role'] . '</p>';
        //             echo '</div>';
        //         }
        //         echo '</div>';
        //     } else {
        //         echo 'No cast information found';
        //     }

        //     $conn->close();
        // } else {
        //     echo 'Movie ID not provided';
        }
        ?>
    </main>

    <?php include 'assets/footer.php'; ?>

    <!-- JavaScript files -->
   
    <!-- jQuery and Bootstrap JavaScript files -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function redirectToSeatPage(movieId, movieTitle) {
            window.location.href = 'seat.php?movie_id=' + movieId + '&movie_title=' + encodeURIComponent(movieTitle);
        }
    </script>
</body>
</html>
