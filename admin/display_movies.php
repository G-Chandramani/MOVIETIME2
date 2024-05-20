<?php
    // Fetch movies from the database
    include_once 'db_connect.php';

    $sql = "SELECT * FROM movies";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo '<div class="row">';
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-md-6 mb-3">';
            echo '<div class="card position-relative movie-card" id="movie-' . $row['id'] . '">';
            echo '<img src="' . $row["image_path"] . '" class="card-img-top " alt="Movie Poster">';
            echo '<div class="card-body position-absolute bottom-0 start-50 translate-middle-x text-center text-white font-weight-bold">';
            echo '<h5 class="card-title dark ">' . $row['title'] . '</h5>';
            echo '<p class="card-text ">' . $row['genre'] . '</p>';
            echo '<p class="card-text ">' . $row['duration'] . '</p>';
            echo '<p class="card-text ">' . $row['rating'] . '</p>';
            echo '<p class="card-text ">' . date('d-m-Y', strtotime($row['release_date'])) . '</p>';
            echo '<div class="btn-group">';
            echo '<button class="btn btn-primary edit-movie" data-movie-id="' . $row['id'] . '">Edit</button>';
            echo '<button class="btn btn-danger delete-movie" data-movie-id="' . $row['id'] . '">Delete</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo '<p class="text-center dark font-weight-bold">No movies found</p>';
    }

    // $conn->close();
?>
<script src="js/script.js"></script>
