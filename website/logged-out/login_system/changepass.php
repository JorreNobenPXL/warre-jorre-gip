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
    $oldpass = md5($_POST['oldpass']);
    $newpass = md5($_POST['newpass']);
    $confirmpass = md5($_POST['confirmpass']);

    $selectsignup = "UPDATE signup SET psw = '$confirmpass' WHERE username = '$username'";
    $selectadmin = "UPDATE admin SET psw = '$confirmpass' WHERE username = '$username'";

    $resultsignup = mysqli_query($conn, $selectsignup);
    $resultadmin = mysqli_query($conn, $selectadmin);

        
    if(($resultsignup) || ($resultadmin)){
        header('location:http://193.121.129.31/website/logged-in/account/account.php');
    }else{
        $error[] = 'Incorrect username, email or password!';
    }

    }   

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Pass</title>
    <link rel="icon" href="images/logo_tab.png">
    <link rel="stylesheet" href="css-login-system/changepass.css">
</head>
<body>
    <main>
        <form action="" method="post" id="changepassform" name="changepassform">
            <div>
                <h1>Change Password</h1>
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
                <!-- oldpass -->
                <label for="oldpass"><b>Old Password</b></label>
                <input type="password" id="oldpass" name="oldpass" required>
                <!-- newpass -->
                <label for="newpass"><b>New Password</b></label>
                <input type="password" id="newpass" name="newpass" required>
                <!-- confirmpass -->
                <label for="confirmpass"><b>Confirm Password</b></label>
                <input type="password" id="confirmpass" name="confirmpass" required>
                <div class="buttons">
                    <!-- submit button -->
                    <div class="submit">
                    <input type="submit" name="submit" class="form-btn" value="Confirm">
                    </div>
                    <!-- cancel button -->
                    <div class="cancel">
                    <a class="form-btn-cancel" href="http://193.121.129.31/website/logged-in/account/account.php">Cancel</a>
                    </div>
                </div>
               

            </div>
        </form>
    </main>

    <script src="main.js"></script>
</body>
</html>