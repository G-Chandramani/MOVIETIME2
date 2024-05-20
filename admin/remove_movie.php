<?php
include_once 'db_connect.php';

// Check if movie_id is set
if (isset($_POST['movie_id'])) {
    $movieId = $_POST['movie_id'];

    // Prepare and execute the SQL DELETE statement
    $sql = "DELETE FROM movies WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $movieId);
    
    if ($stmt->execute()) {
        echo "Movie deleted successfully.";
    } else {
        echo "Error deleting movie: " . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If movie_id is not set, return an error
    echo "Error: Movie ID not provided.";
}
?>

