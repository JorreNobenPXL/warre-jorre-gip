<?php 
    $email = $_POST['email'];
    $psw = $_POST['psw'];
    $psw_repeat = $_POST['psw_repeat'];
    
    //database connection
    $conn = new mysqli('localhost','root','','gip');
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "INSERT INTO signup (email, psw, psw_repeat)
    VALUES ('$email', '$psw', '$psw_repeat')";

    if ($conn->query($sql) === TRUE) {
    echo "New sign up successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
