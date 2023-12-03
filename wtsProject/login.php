<?php
session_start(); // Start a PHP session for user authentication
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate user input
    if (!empty($username) && !empty($password)) {
        // Query to check if the user exists in the database
        $sql = "SELECT  username FROM logintbl WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Check if a row is returned
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);

                // Authentication successful 
                $_SESSION["username"] = $row["username"];
                echo "Login successful! Welcome, $username!";

                // Redirect to another page using JavaScript
                echo '<script>window.location.href = "home.html";</script>';
                exit(); 
            } else {
                echo "Invalid username and password";
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        mysqli_free_result($result);
    } else {
        echo "Please enter both username and password";
    }
}

mysqli_close($conn);
?>