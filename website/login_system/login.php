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

    $select = "SELECT * FROM signup WHERE useremail = '$useremail' && psw = '$psw'";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_fields($result) > 0){
        $_SESSION['useremail'] = $useremail;
        header('location:http://localhost:3000/website/header.php');
    }else{
        $error[] = 'Incorrect password or email.';
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
</head>
<body>
    <main>
        <form action="" method="post" id="loginform" name="loginform">
            <div class="container">
                <h1>Login Now</h1>
                <?php
                    if(isset($error)){
                        foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                        }
                    }
                ?>
                <!-- email -->
                <label for="email"><b>Email</b></label>
                <input type="email" id="email" name="useremail" required>
                <!-- password -->
                <label for="psw"><b>Password</b></label>
                <input type="password" id="psw" name="psw" required>
                <!-- submit button -->
                <div class="submit">
                    <input type="submit" name="submit" class="form-btn" value="Login">
                </div>
                <!-- no account register/signup -->
                <div class="register">
                    <p>Don't have an account? <a href="sign-up.php">Register now</a></p>
                </div>

            </div>
        </form>
    </main>

    <script src="main.js"></script>
</body>
</html>