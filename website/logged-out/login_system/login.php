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

    $selectsignup = "SELECT * FROM signup WHERE username = '$username' && useremail = '$useremail' && psw = '$psw'";
    $selectadmin = "SELECT * FROM admin WHERE username = '$username' && useremail = '$useremail' && psw = '$psw'";

    $resultsignup = mysqli_query($conn, $selectsignup);
    $resultadmin = mysqli_query($conn, $selectadmin);


    if((mysqli_num_rows($resultsignup) > 0) || (mysqli_num_rows($resultadmin) > 0)){
        $_SESSION['username'] = $username;
        header('location:http://193.121.129.31/website/logged-in/home/home-logged-in.php');
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
    <title>Login</title>
    <link rel="icon" href="images/logo_tab.png">
    <link rel="stylesheet" href="css-login-system/login.css">
</head>
<body>
    <main>
        <form action="" method="post" id="loginform" name="loginform">
            <div>
                <h1>Login Now</h1>
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
                <label class="label_email" for="email"><b>Email</b></label>
                <input type="email" id="email" name="useremail" required>
                <!-- password -->
                <label class="label_psw" for="psw"><b>Password</b></label>
                <input type="password" id="psw" name="psw" required>
                <div class="buttons">
                    <!-- submit button -->
                     <div class="submit">
                    <input type="submit" name="submit" class="form-btn" value="Login">
                    </div>
                    <!-- cancel button -->
                    <div class="cancel">
                    <a class="form-btn-cancel" href="http://193.121.129.31/website/logged-out/home/home.html">Cancel</a>
                    </div>
                </div>
                <!-- no account register/signup -->
                <div class="register">
                    <p class="text-register">Don't have an account? <a href="sign-up.php">Register now</a></p>
                </div>

            </div>
        </form>
    </main>

    <script src="main.js"></script>
</body>
</html>