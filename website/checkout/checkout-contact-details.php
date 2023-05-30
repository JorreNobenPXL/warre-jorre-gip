<?php

  $servername = "127.0.0.1";
  $username = "host";
  $password = "GIP-2022";
  $dbname = "gip2023";

  // database connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  
  session_start();

  if(isset($_POST['checkout'])){

    // database values
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']); 
    $username = mysqli_real_escape_string($conn, $_POST['username']);   
    $useremail = mysqli_real_escape_string($conn, $_POST['useremail']);
    $verify_email = mysqli_real_escape_string($conn, $_POST['verify_email']);
    $event = $_POST['event'];
    $checkbox_tp = mysqli_real_escape_string($conn, $_POST['checkbox-tp']);

    // qrcode generate
    require "phpqrcode/qrlib.php";
    $codeContents = $username . " " . $fname . " " . $lname . " " . $event;
    $myBarcodeDir = '../generated_barcode/';
    $fileName = $useremail."_".$event.'.png';
    $pngAbsoluteFilePath = $myBarcodeDir.$fileName;
    QRcode::png($codeContents, $pngAbsoluteFilePath, QR_ECLEVEL_L, 32);

    // email values
    $eol = "\r\n";
    $to = $useremail;
    $subject = "Your ticket!";
    $message = '<html><body>';
    $message .= "<tr><td><strong style='font-size: 175%;'>This mail is sent because you ordered a ticket.</strong></td></tr>";
    $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
    $message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . $fname . " " . $lname . "</td></tr>";
    $message .= "<tr><td><strong>Username:</strong> </td><td>" . $username . "</td></tr>";
    $message .= "<tr><td><strong>Email:</strong> </td><td>" . $useremail . "</td></tr>";
    $message .= "<tr><td><strong>Event:</strong> </td><td>" . $event . "</td></tr>";
    $message .= "<tr><td><strong>QR-Code:</strong> </td><td><img style='width: 300px; height: 300px;' src='http://193.121.129.31/website/checkout/$pngAbsoluteFilePath' alt='QR-Code' /></td></tr>";
    $message .= "</table>";
    $message .= "</body></html>";
    $mailHead = implode("\r\n", [
      "MIME-Version: 1.0",
      "Content-type: text/html; charset=iso-8859-1"
    ]);

    if($checkbox_tp == 0){
      $error[] = 'Accept the Terms & Privacy!';
    }else{ 
      if($useremail != $verify_email){
        $error[] = 'Email not mathched!';
      }else{
        $insert = "INSERT INTO checkout(lname, fname, username, useremail, event) VALUES('$lname', '$fname', '$username', '$useremail','$event')";
        mysqli_query($conn, $insert);
        mail($to, $subject, $message, $mailHead);
        header('location:http://193.121.129.31/website/logged-out/home/home.html');
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
    <link rel="icon" href="images/logo_tab.png">
    <link rel="stylesheet" href="checkout.css">   
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
              <label for="fname"><b>Firstname*</b></label>
              <input type="text" id="fname" name="fname" required>
              <!-- username -->
              <label for="username"><b>Username*</b></label>
              <input type="text" id="username" name="username" required>
              <!-- email -->
              <label for="email"><b>Email*</b></label>
              <input type="email" id="email" name="useremail" required>
              <!-- verify email -->
              <label for="verify_email"><b>Verify Email*</b></label>
              <input type="email" id="verify_email" name="verify_email" required>
              <!-- event selecter -->
              <label for="event"><b>Choose Event*</b></label>
              <select id="event" name="event" size="1" required>
                <option value="Zillion">The Zillion</option>
                <option value="PostXMosTISJ">Post X-MOS TISJ</option>
                <option value="PreXMosIKSO">Pre X-MOS IKSO</option>
                <option value="PreXMosHGI">Pre X-MOS HGI</option>
                <option value="PreXMosTISJ">Pre X-MOS TISJ</option>
              </select>
              <p>*required</p>
              <div class="buttons">
                    <!-- submit button -->
                    <div class="checkout">
                    <input type="submit" name="checkout" class="form-btn" value="Get Ticket">
                    </div>
                    <!-- cancel button -->
                    <div class="cancel">
                    <a class="form-btn-cancel" href="http://193.121.129.31/website/logged-out/home/home.html">Cancel</a>
                    </div>
              </div>
            </div>
          </form>
        </main>
</body>
<script src="main.js"></script>
</html>