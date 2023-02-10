<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "naiveBayes";

    $conn = mysqli_connect($servername, $username,"",$dbname);
    mysqli_set_charset($conn, "utf8");
    
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>