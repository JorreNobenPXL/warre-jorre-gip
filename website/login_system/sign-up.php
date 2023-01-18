<?php

  $servername = "193.121.129.31";
  $username = "warre";
  $password = "Warre6789!";
  $dbname = "gip2023";

  //database connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  
  session_start();

  if(isset($_POST['submit'])){
      
    $useremail = mysqli_real_escape_string($conn, $_POST['useremail']);
    $psw = md5($_POST['psw']);
    $psw_repeat = md5($_POST['psw_repeat']);

    $select = " SELECT * FROM signup WHERE useremail = '$useremail' && psw = '$psw'";

    $result = mysqli_query($conn, $select);

      if(mysqli_num_rows($result) > 0){
        $error[] = 'user already exist';
      }else{
        if($psw != $psw_repeat){
          $error[] = 'password not mathched!';
        }else{
            $insert = "INSERT INTO signup(useremail, psw) VALUES('$useremail','$psw')";
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
      
  </head>
  <body>
      
    <main>
      <form action="" method="post" id="signupform" name="signupform">
          <div class="container">
            <h1>Sign Up</h1>
            <!-- error code -->
            <?php
              if(isset($error)){
                  foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                  }
              }
            ?>
            <p>Please fill in this form to create an account.</p>
            <!-- email -->
            <label for="email"><b>Email</b></label>
            <input type="email" id="email" name="useremail" required>
            <!-- password -->
            <label for="psw"><b>Password</b></label>
            <input type="password" id="psw" name="psw" required>
            <!-- repeat password -->
            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" id="psw_repeat" name="psw_repeat" required>
            <!-- remember me -->
            <label>
              <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px">Remember me
            </label>
            
        
            <!-- submit button -->
            <div class="submit">
              <input type="submit" name="submit" class="form-btn" value="Sign Up">
            </div>
            <div class="login">
                    <p>Have an account? <a href="login.php">Login now</a></p>
                </div>
          </div>
        </form>
      </main>

    
    <script src="main.js"></script>
  </body>
</html>

