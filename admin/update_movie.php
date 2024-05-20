<?php
// Include database connection
include_once 'db_connect.php';

// Check if form is submitted and movie ID is provided
if(isset($_POST['movie_id'])) {
    // Retrieve form data
    $movieId = $_POST['movie_id'];
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $duration = $_POST['duration'];
    $rating = $_POST['rating'];
    $release_date = $_POST['release_date'];
    $movie_desc = $_POST['movie_desc'];
    $trailer = $_POST['trailer'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name']; // Temporary file path

    // Check if image is uploaded
    if(!empty($image)) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        // Move uploaded file to target directory
        if(move_uploaded_file($image_tmp, $target_file)) {
            // Prepare and execute the SQL UPDATE statement
            $sql = "UPDATE movies SET title = ?, genre = ?, duration = ?, rating = ?, release_date = ?, movie_desc = ?, trailer = ?, image_path = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssssi", $title, $genre, $duration, $rating, $release_date, $movie_desc, $trailer, $target_file, $movieId);
            
            if($stmt->execute()) {
                echo "Movie updated successfully.";
            } else {
                echo "Error updating movie: " . $conn->error;
            }
        } else {
            echo "Error uploading image.";
        }
    } else {
        // Prepare and execute the SQL UPDATE statement without image update
        $sql = "UPDATE movies SET title = ?, genre = ?, duration = ?, rating = ?, release_date = ?, movie_desc = ?, trailer = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssi", $title, $genre, $duration, $rating, $release_date, $movie_desc, $trailer, $movieId);
        
        if($stmt->execute()) {
            echo "Movie updated successfully.";
        } else {
            echo "Error updating movie: " . $conn->error;
        }
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If movie_id is not provided, return an error
    echo "Error: Movie ID not provided.";
}
?>
