<?php
    $con = mysqli_connect("localhost", "root", "", "hive");

    if($con->connect_error) {
        die("Failed to Connect to Database: " . $con->connect_error);
    }
?>