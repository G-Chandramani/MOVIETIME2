// Function to add a new movie
function addMovie(title, genre, duration) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                alert("Movie added successfully!");
                fetchMovies();
            } else {
                alert("Failed to add movie. Please try again.");
            }
        }
    };
    xhr.open("POST", "add_movie.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("title=" + title + "&genre=" + genre + "&duration=" + duration);
}

// Function to remove a movie
document.addEventListener('DOMContentLoaded', function() {
    var deleteButtons = document.querySelectorAll('.delete-movie');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var movieId = this.getAttribute('data-movie-id');
                if (confirm("Are you sure you want to delete this movie?")) {
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "remove_movie.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                window.location.reload();
                            } else {
                                console.error('Error:', xhr.responseText);
                            }
                        }
                    };
                    xhr.send("movie_id=" + movieId);
                }
            });
        });
});

// Function to update movie details
document.addEventListener('DOMContentLoaded', function() {
    const editButtons = document.querySelectorAll('.edit-movie');
    editButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            // Prevent the default action of the button
            event.preventDefault();

            // Retrieve the movie ID associated with the button
            const movieId = button.dataset.movieId;

            // Redirect the user to the edit_movie.php page with the movie ID as a query parameter
            window.location.href = 'edit_movie.php?id=' + movieId;
        });
    });
});





// Function to fetch and display movie details
$(document).ready(function(){
    // AJAX request to fetch bookings
    $.ajax({
        url: 'fetch_bookings.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            // Check if any bookings are fetched
            if (response.length > 0) {
                // Loop through each booking and display details
                $.each(response, function(index, booking) {
                    $('#bookingsContainer').append("<div>Booking ID: " + booking.id + ", User ID: " + booking.user_id + ", Movie: " + booking.movie + "</div>");
                    // Additional details can be included here, such as booking date, seat numbers, etc.
                });
            } else {
                // If no bookings found, display a message
                $('#bookingsContainer').append("<p>No bookings found</p>");
            }
        },
        error: function(xhr, status, error) {
            // Handle AJAX error
            console.error(xhr.responseText);
        }
    });
});
// Similarly implement functions for users and bookings

// Event listener to fetch movies on page load
document.addEventListener("DOMContentLoaded", function() {
    fetchMovies();
});

// Function to add a new user
function addUser(name, email, password) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                alert("User added successfully!");
                fetchUsers();
            } else {
                alert("Failed to add user. Please try again.");
            }
        }
    };
    xhr.open("POST", "add_user.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("name=" + name + "&email=" + email + "&password=" + password);
}

// Function to remove a user
function removeUser(userId) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                alert("User removed successfully!");
                fetchUsers();
            } else {
                alert("Failed to remove user. Please try again.");
            }
        }
    };
    xhr.open("POST", "remove_user.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("id=" + userId);
}

// Function to update user details
function updateUser(userId, newName, newEmail, newPassword) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                alert("User updated successfully!");
                fetchUsers();
            } else {
                alert("Failed to update user. Please try again.");
            }
        }
    };
    xhr.open("POST", "update_user.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("id=" + userId + "&name=" + newName + "&email=" + newEmail + "&password=" + newPassword);
}

// Function to fetch and display user details
function fetchUsers() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("userList").innerHTML = xhr.responseText;
        }
    };
    xhr.open("GET", "display_users.php", true);
    xhr.send();
}

// Function to display booking details
function displayBookings() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("bookingList").innerHTML = xhr.responseText;
        }
    };
    xhr.open("GET", "display_bookings.php", true);
    xhr.send();
}

// $(document).ready(function() {
//     // Fetch bookings data using AJAX
//     $.ajax({
//         url: 'fetch_bookings.php',
//         type: 'GET',
//         dataType: 'json',
//         success: function(data) {
//             // Generate bookings table dynamically
//             var tableHtml = '<table class="table table-bordered">';
//             tableHtml += '<thead class="thead-dark"><tr>';
//             tableHtml += '<th>ID</th><th>User ID</th><th>Movie</th><th>Booking Date</th><th>Total Seats</th><th>Total Payment</th>';
//             tableHtml += '</tr></thead><tbody>';
            
//             // Loop through the bookings data and add rows to the table
//             data.forEach(function(booking) {
//                 tableHtml += '<tr>';
//                 tableHtml += '<td>' + booking.id + '</td>';
//                 tableHtml += '<td>' + booking.user_id + '</td>';
//                 tableHtml += '<td>' + booking.movie + '</td>';
//                 tableHtml += '<td>' + booking.booking_date + '</td>';
//                 tableHtml += '<td>' + booking.total_seats + '</td>';
//                 tableHtml += '<td>' + booking.total_payment + '</td>';
//                 tableHtml += '</tr>';
//             });
            
//             tableHtml += '</tbody></table>';
            
//             // Append the generated table to the bookingTable div
//             $('#bookingTable').html(tableHtml);
//         },
//         error: function(xhr, status, error) {
//             console.error('Error fetching bookings:', error);
//         }
//     });
// });



// Function to fetch and display booking details
function fetchBookings() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("bookingList").innerHTML = xhr.responseText;
        }
    };
    xhr.open("GET", "fetch_bookings.php", true);
    xhr.send();
}
