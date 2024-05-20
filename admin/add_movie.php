<?php
include_once 'db_connect.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $duration = $_POST['duration'];
    $rating = $_POST['rating'];
    $release_date = $_POST['release_date'];
    $movie_desc = $_POST['movie_desc'];
    $trailer = $_POST['trailer'];
    $seats = $_POST['seats'];

    // File upload handling
    $targetDir = "uploads/"; // Directory where the uploaded image will be stored
    $targetFile = $targetDir . basename($_FILES["image"]["name"]); // Path to the uploaded image file
    $uploadOk = 1; // Flag to check if the file was uploaded successfully
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION)); // Get the file extension

    // Check if the image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "<script>alert('Error: File is not an image.');</script>";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "<script>alert('Error: File already exists.');</script>";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "<script>alert('Error: File is too large.');</script>";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType != "avif") {
        echo "<script>alert('Error: Only JPG, JPEG, AVIF, PNG & GIF files are allowed.');</script>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>alert('Error: Your file was not uploaded.');</script>";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // File uploaded successfully, now insert movie details into database
            $sql = "INSERT INTO movies (title, genre, duration, rating, release_date, movie_desc, trailer, image_path, seats) 
                    VALUES ('$title', '$genre', '$duration', '$rating', '$release_date', '$movie_desc', '$trailer', '$targetFile', '$seats')";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Movie added successfully!');
                window.location.href = 'admin_panel.php';</script>";
            } else {
                echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
            }
        } else {
            echo "<script>alert('Error: There was an error uploading your file.');</script>";
        }
    }
} else {
    echo "<script>alert('Error: Form not submitted.');</script>";
}

// Close the database connection
$conn->close();
?>
