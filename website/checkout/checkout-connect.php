<?php 

    $servername = "193.121.129.31";
    $username = "warre";
    $password = "Warre6789!";
    $dbname = "gip2023";

    $lname =$_POST['lname'];
    $fname =$_POST['fname'];
    $email = $_POST['email'];
    $verify_email = $_POST['verify_email'];
    $phonenumber = $_POST['phonenumber'];
    
    //database connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "INSERT INTO checkout (lname, fname, email, verify_email, phonenumber)  
    VALUES ('$lname', '$fname', '$email', '$verify_email', '$phonenumber')"; //insert values into db

    if ($conn->query($sql) === TRUE) {
        header("Location:http://localhost:3000/website/index.html"); //go to page
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>