<?php

    $servername = "193.121.129.31";
    $username = "host";
    $password = "GIP-2022";
    $dbname = "gip2023";

    //database connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    session_start();
    session_unset();
    session_destroy();

    header('location:http://193.121.129.31/website/logged-out/home/home.html');

?>