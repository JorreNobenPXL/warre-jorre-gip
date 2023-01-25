<?php

    $servername = "iict.be.mysql";
    $username = "iict_begip2023";
    $password = "GIP-2022";
    $dbname = "iict_begip2023";

    //database connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    session_start();
    session_unset();
    session_destroy();

    header('location:https://iict.be/website/index.html');

?>