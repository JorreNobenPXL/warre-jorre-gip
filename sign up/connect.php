<?php 
   
    //database connection
    $conn = new mysqli('193.121.129.31','warre','Warre6789!',);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
?>
