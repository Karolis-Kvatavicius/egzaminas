<?php
if (isset($_GET['rating']) && isset($_GET['course'])) {
    // Connection credentials
    $mysqli = new mysqli("localhost", "root", "student", "egzaminas");

    // Check connection
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }

    $query = "update courses set rating=" . $_GET['rating'] . " where id=" . $_GET['course'] . ";";
    $result = mysqli_query($mysqli, $query);
}

header("Location: ./index.php");
