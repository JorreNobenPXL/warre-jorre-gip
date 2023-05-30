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
    $psw = mysqli_real_escape_string($conn, $_POST['psw']);
    $psw_repeat = mysqli_real_escape_string($conn, $_POST['psw_repeat']);
    $admin = mysqli_real_escape_string($conn, $_POST['admin']);


    $checkUsernameAdmin = "SELECT * FROM admin WHERE username = '$username'";
    $checkUsernameSignup = "SELECT * FROM signup WHERE username = '$username'";

    $resultUsernameSignup = mysqli_query($conn, $checkUsernameSignup);
    $resultUsernameAdmin = mysqli_query($conn, $checkUsernameAdmin);


    $checkUseremailAdmin = "SELECT * FROM admin WHERE useremail = '$useremail'";
    $checkUseremailSignup = "SELECT * FROM signup WHERE useremail = '$useremail'";

    $resultUseremailSignup = mysqli_query($conn, $checkUseremailSignup);
    $resultUseremailAdmin = mysqli_query($conn, $checkUseremailAdmin);



    if((mysqli_num_rows($resultUsernameSignup) > 0) || (mysqli_num_rows($resultUsernameAdmin) > 0)){
      $error[] = 'User already used!';
    }else{
      if((mysqli_num_rows($resultUseremailSignup) > 0) || (mysqli_num_rows($resultUseremailAdmin) > 0)){
        $error[] = 'Email already used!';
      }else{
        if($psw != $psw_repeat){
          $error[] = 'Passwords do not match!';
          }else{
            if(isset($admin) && $admin == 'Yes'){
              $insert = "INSERT INTO admin(username, useremail, psw, admin) VALUES('$username', '$useremail', '$psw', '$admin')";
              mysqli_query($conn, $insert);
              header('location:http://193.121.129.31/website/logged-out/login_system/login.php');
            }else{
              $insert = "INSERT INTO signup(username, useremail, psw, admin) VALUES('$username', '$useremail','$psw', '$admin')";
              mysqli_query($conn, $insert);
              header('location:http://193.121.129.31/website/logged-out/login_system/login.php');
            }
          }
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
      <link rel="icon" href="images/logo_tab.png">
      <link rel="stylesheet" href="css-login-system/sign-up.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  </head>
  <body>
      
    <main>
      <form action="" method="post" id="signupform" name="signupform">
          <div>
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
            <div class="seepassword">
                <input type="password" id="psw" name="psw" required>
                <i class="far fa-eye" id="togglePassword"></i>
            </div>
            <!-- repeat password -->
            <label for="psw-repeat"><b>Confirm Password</b></label>
            <div class="seepassword">
                <input type="password" id="psw_repeat" name="psw_repeat" required>
                <i class="far fa-eye" id="togglePasswordrepeat"></i>
            </div>
            <!-- admin -->
            <label for="admin"><b>Choose Admin Account</b></label>
              <select id="admin" name="admin" size="1" required>
                <option value="No">No</option>
                <option value="Yes">Yes</option>
              </select>
            <!-- buttons -->
            <div class="buttons">
              <!-- submit button -->
              <div class="submit">
                <input type="submit" name="submit" class="form-btn" value="Sign Up">
              </div>
              <!-- cancel button -->
              <div class="cancel">
                <a class="form-btn-cancel" href="http://193.121.129.31/website/logged-out/home/home.html">Cancel</a>
              </div>
            </div>
            <div class="login">
                    <p class="text-login">Have an account?<a href="login.php">Login now</a></p>
            </div>
          </div>
        </form>
      </main>

    
    <script src="js-files/seepasssignup.js"></script>
  </body>
</html>