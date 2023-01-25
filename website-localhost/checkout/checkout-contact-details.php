<?php

  $servername = "193.121.129.31";
  $username = "host";
  $password = "GIP-2022";
  $dbname = "gip2023";

  //database connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  
  session_start();

  if(isset($_POST['checkout'])){

    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);  
    $useremail = mysqli_real_escape_string($conn, $_POST['useremail']);
    $verify_email = mysqli_real_escape_string($conn, $_POST['verify_email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $checkbox_tp = mysqli_real_escape_string($conn, $_POST['checkbox-tp']);


      if($checkbox_tp = 0){
        $error[] = 'Accept the Terms & Privacy!';
      }else{
        if($useremail != $verify_email){
          $error[] = 'Email not mathched!';
        }else{
            $insert = "INSERT INTO checkout(lname, fname, useremail, phone) VALUES('$lname', '$fname', '$useremail','$phone')";
            mysqli_query($conn, $insert);
            header('location:http://localhost:3000/website-localhost/index.html');
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
    <title>Checkout</title>
</head>
<body>
    <main>
        <form action="" method="post" id="contactform" name="contactform">
            <div class="container">
              <h1>Contact details</h1>
              <!-- error code -->
              <?php
                if(isset($error)){
                    foreach($error as $error){
                      echo '<span class="error-msg">'.$error.'</span>';
                    }
                }
              ?>
              <p>Please fill in this form to go further</p>
              <!-- last name -->
              <label for="lname"><b>Name*</b></label>
              <input type="text" id="lname" name="lname" required>
              <!-- front name -->
              <label for="fname"><b>Frontname*</b></label>
              <input type="text" id="fname" name="fname" required>
              <!-- email -->
              <label for="email"><b>Email*</b></label>
              <input type="email" id="email" name="useremail" required>
              <!-- verify email -->
              <label for="verify_email"><b>Verify Email*</b></label>
              <input type="email" id="verify_email" name="verify_email" required>
              <!-- phone number -->
              <label for="phone"><b>Phone*</b></label>
              <input type="text" id="phone" name="phone" required>
              <!--checkbox  -->
              <label>
                <input type="checkbox" name="checkbox-tp" id="checkbox-tp" required>I have read and accept the <a href="#" style="color:dodgerblue">Terms & Privacy</a>.
              </label>
              
              <p>*required</p>
              <!-- submit button -->
              <div class="submit">
                <input type="submit" name="checkout" class="form-btn" value="Go to payment">
              </div>
            </div>
          </form>
        </main>
</body>
</html>