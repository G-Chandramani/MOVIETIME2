<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Movie</title>
</head>
<body>
    <?php
    // Include database connection
    include_once 'db_connect.php';

    // Check if movie ID is provided in the URL
    // Check if movie ID is provided in the URL
    if(isset($_GET['id'])) {
    $movieId = $_GET['id'];
    echo "Movie ID: " . $movieId; // Add this line for debugging


        // Fetch movie details from the database
        $sql = "SELECT * FROM movies WHERE id = ?";
        $stmt = $conn->prepare($sql);
        
        // Check if the prepare() call was successful
        if($stmt) {
            // Bind the movie ID parameter
            $stmt->bind_param("i", $movieId);
            
            // Execute the statement
            $stmt->execute();
            
            // Get the result set
            $result = $stmt->get_result();
            
            // Check if there are rows returned
            if($result->num_rows > 0) {
                // Fetch movie details
                $row = $result->fetch_assoc();
                ?>
                <h1>Edit Movie</h1>
                <form action="update_movie.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="movie_id" value="<?php echo $movieId; ?>">
                    <label for="title">Title:</label><br>
                    <input type="text" id="title" name="title" value="<?php echo $row['title']; ?>"><br>
                    <label for="genre">Genre:</label><br>
                    <input type="text" id="genre" name="genre" value="<?php echo $row['genre']; ?>"><br>
                    <label for="duration">Duration:</label><br>
                    <input type="text" id="duration" name="duration" value="<?php echo $row['duration']; ?>"><br>
                    <label for="rating">Rating:</label><br>
                    <input type="text" id="rating" name="rating" value="<?php echo $row['rating']; ?>"><br>
                    <label for="release_date">Release Date:</label><br>
                    <input type="date" id="release_date" name="release_date" value="<?php echo $row['release_date']; ?>"><br>
                    <label for="movie_desc">Movie Description:</label><br>
                    <textarea id="movie_desc" name="movie_desc"><?php echo $row['movie_desc']; ?></textarea><br>
                    <label for="trailer">Trailer:</label><br>
                    <input type="text" id="trailer" name="trailer" value="<?php echo $row['trailer']; ?>"><br>
                    <label for="image">Image:</label><br>
                    <input type="file" id="image" name="image"><br><br>
                    <input type="submit" value="Submit">
                </form>
                <?php
            } else {
                echo "No movie found with ID: " . $movieId;
            }
            
            // Close the statement
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }

        // Close database connection
        $conn->close();
    } else {
        echo "Error: Movie ID not provided.";
    }
    ?>
</body>
</html>
