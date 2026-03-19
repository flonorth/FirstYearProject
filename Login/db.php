<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "fpldb";

    // Create connection
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    // Check connection
    if (!$conn) {
        die("Could not connect: " . mysqli_connect_error());
    }

    // Optional: Uncomment to test connection
    // echo "Database connected successfully!";
?>
