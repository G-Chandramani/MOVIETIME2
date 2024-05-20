function deleteMovie(movieId) {
    if (confirm("Are you sure you want to delete this movie?")) {
        // Send AJAX request to remove_movie.php with movieId
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "remove_movie.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Reload the page after successful deletion
                    window.location.reload();
                } else {
                    // Handle errors
                    console.error('Error:', xhr.responseText);
                }
            }
        };
        xhr.send("movie_id=" + movieId);
    }
}
