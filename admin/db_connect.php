<?php
$host = "localhost";
$username = "root";
$password = ""; // Password for MySQL (if any)
$database = "movietime";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// else{
//     echo("Connection Sucessfully");
// }
?>
