<?php

  $servername = "193.121.129.31";
  $username = "host";
  $password = "GIP-2022";
  $dbname = "gip2023";

  //database connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  
  session_start();

  if(isset($_POST['submit'])){

    $username = mysqli_real_escape_string($conn, $_POST['username']);  
    $useremail = mysqli_real_escape_string($conn, $_POST['useremail']);
    $psw = md5($_POST['psw']);
    $psw_repeat = md5($_POST['psw_repeat']);

    $select = " SELECT * FROM signup WHERE username = '$username' && useremail = '$useremail' && psw = '$psw'";

    $result = mysqli_query($conn, $select);

      if(mysqli_num_rows($result) > 0){
        $error[] = 'User already exist!';
      }else{
        if($psw != $psw_repeat){
          $error[] = 'Password not mathched!';
        }else{
            $insert = "INSERT INTO signup(username, useremail, psw) VALUES('$username', '$useremail','$psw')";
            mysqli_query($conn, $insert);
            header('location:http://localhost:3000/website/login_system/login.php');
           }
        }
  }

  

?>



<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Sign Up</title>
      <link rel="stylesheet" href="css/sign-up.css">
      
  </head>
  <body>
      
    <main>
      <form action="" method="post" id="signupform" name="signupform">
          <div class="box">
            <h1>Sign Up</h1>
            <p>Please fill in this form to create an account.</p>
            <!-- error code -->
            <?php
              if(isset($error)){
                  foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                  }
              }
            ?>
            <!-- username -->
            <label for="username"><b>Username</b></label>
            <input type="text" id="username" name="username" required>
            <!-- email -->
            <label for="email"><b>Email</b></label>
            <input type="email" id="email" name="useremail" required>
            <!-- password -->
            <label for="psw"><b>Password</b></label>
            <input type="password" id="psw" name="psw" required>
            <!-- repeat password -->
            <label for="psw-repeat"><b>Confirm Password</b></label>
            <input type="password" id="psw_repeat" name="psw_repeat" required>
            <!-- submit button -->
            <div class="submit">
              <input type="submit" name="submit" class="form-btn" value="Sign Up">
            </div>
            <div class="login">
                    <p>Have an account? <a class="text-login" href="login.php">Login now</a></p>
                </div>
          </div>
        </form>
      </main>

    
    <script src="main.js"></script>
  </body>
</html>

