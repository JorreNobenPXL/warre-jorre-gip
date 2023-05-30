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
    $newpass = mysqli_real_escape_string($conn, $_POST['newpass']);
    $confirmpass = mysqli_real_escape_string($conn, $_POST['confirmpass']);

    $selectsignup = "UPDATE signup SET psw = '$confirmpass' WHERE username = '$username'";
    $selectadmin = "UPDATE admin SET psw = '$confirmpass' WHERE username = '$username'";

    $resultsignup = mysqli_query($conn, $selectsignup);
    $resultadmin = mysqli_query($conn, $selectadmin);

        if($newpass != $confirmpass){
            $error[] = 'Passwords do not match!';
        }else{
            if(($resultsignup) || ($resultadmin)){
                header('location:http://193.121.129.31/website/logged-in/account/account.php');
            }else{
                $error[] = 'Incorrect username!';
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
    <title>Forgot Pass</title>
    <link rel="icon" href="images/logo_tab.png">
    <link rel="stylesheet" href="css-login-system/forgotpass.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

</head>
<body>
    <main>
        <form action="" method="post" id="forgotpassform" name="gorgotpassform">
            <div>
                <h1>Forgot Password</h1>
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
                <!-- newpass -->
                <label for="newpass"><b>New Password</b></label>
                <div class="seepassword">
                    <input type="password" id="newpass" name="newpass" required>
                    <i class="far fa-eye" id="togglePasswordnew"></i>
                </div>
                <!-- confirmpass -->
                <label for="confirmpass"><b>Confirm Password</b></label>
                <div class="seepassword">
                    <input type="password" id="confirmpass" name="confirmpass" required>
                    <i class="far fa-eye" id="togglePasswordconfirm"></i>
                </div>
                <div class="buttons">
                    <!-- submit button -->
                    <div class="submit">
                    <input type="submit" name="submit" class="form-btn" value="Confirm">
                    </div>
                    <!-- cancel button -->
                    <div class="cancel">
                    <a class="form-btn-cancel" href="http://193.121.129.31/website/logged-out/login_system/login.php">Cancel</a>
                    </div>
                </div>
               

            </div>
        </form>
    </main>

    <script src="js-files/seepassforgot.js"></script>
</body>
</html>