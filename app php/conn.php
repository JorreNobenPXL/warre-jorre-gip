<?php

$servername = "localhost";
$username = "jorre";
$password = "123456";
$database = "gip2023";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);

if($conn) {echo "Connected";}

else { echo "Not connected";}


?>