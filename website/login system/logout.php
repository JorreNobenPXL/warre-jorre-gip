<?php

$servername = "193.121.129.31";
$username = "warre";
$password = "Warre6789!";
$dbname = "gip2023";

//database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

session_start();
session_unset();
session_destroy();

header('location:http://localhost:3000/website/index.html');

?>