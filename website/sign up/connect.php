<?php 

    $servername = "193.121.129.31";
    $username = "warre";
    $password = "Warre6789!";
    $dbname = "signup";

    $email = $_POST['email'];
    $psw = $_POST['psw'];
    $psw_repeat = $_POST['psw_repeat'];
    
    //database connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "INSERT INTO signup (email, psw, psw_repeat)  
    VALUES ('$email', '$psw', '$psw_repeat')"; //insert values into db

    if ($conn->query($sql) === TRUE) {
        header("Location:http://localhost:3000/index.html"); //go to page
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
