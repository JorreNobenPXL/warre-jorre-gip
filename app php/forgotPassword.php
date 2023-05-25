<?php

  $servername = "127.0.0.1";
  $username = "host";
  $password = "GIP-2022";
  $dbname = "gip2023";

  // database connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  
  session_start();

    // database values
    $useremail = mysqli_real_escape_string($conn, $_POST['email']);
    $code_id = mysqli_real_escape_string($conn, $_POST['id']);

    // email values
    $eol = "\r\n";
    $to = $useremail;
    
    $subject = "Reset your password!";
    $message = '<html><body>';
    $message .= "<tr><td><strong style='font-size: 175%;'>This mail is sent because you used the forgot password option in the APP</strong></td></tr>";
    $message .= "<tr><td><strong style='font-size: 175%;'>The digit below is your secret number, please enter this in the app</strong></td></tr>";
    $message .= "</td><td><strong style='font-size: 175%;'>" . $code_id. "</td></tr>";
    $message .= "</table>";
    $message .= "</body></html>";
    $mailHead = implode("\r\n", [
      "MIME-Version: 1.0",
      "Content-type: text/html; charset=iso-8859-1"
    ]);

    mail($to, $subject, $message, $mailHead);

?>