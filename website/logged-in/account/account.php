<?php

   $servername = "193.121.129.31";
   $username = "host";
   $password = "GIP-2022";
   $dbname = "gip2023";

   //database connection
   $conn = mysqli_connect($servername, $username, $password, $dbname);
  
  session_start();



    if(!isset($_SESSION['useremail'])){
    header('location:http://193.121.129.31/webiste/login_system/login.php');
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link rel="icon" href="images/logo_tab.png">
    <link rel="stylesheet" href="account.css">
</head> 
<body>
    <div class="navbar">
        <header>
            <img class="logo" src="images/logo.png" alt="logo">
            <nav>
                <ul class="nav_links">
                    <li><a href="http://193.121.129.31/website/logged-in/account/account.php"><span><?php echo $_SESSION['useremail']; ?></span></a></li>
                    <li><a href="http://193.121.129.31/website/logged-in/home/home-logged-in.php">Home</a></li>
                    <li><a href="http://193.121.129.31/website/logged-in/events/events.php">Events</a></li>
                </ul>
            </nav>
            <a href="http://193.121.129.31/website/logged-out/login_system/logout.php"><button class="nav_button">Logout</button></a>
        </header>
    </div>

    <div class="text-account">
        <h1>Account</h1>
    </div>

    <div class="settings">
        <div class="tabel-left">
            <div class="name">
                <h2>Naam:</h2>
            </div>
            <div class="email">
                <h2>Email:</h2>
            </div>
            <div class="psw">
                <h2>Wachtwoord:</h2>
            </div>
        </div>
        <div class="tabel-right">
            <div class="name">
                <h2>warre gielkens</h2>
            </div>
            <div class="email">
                <h2><?php echo $_SESSION['useremail']; ?></h2>
            </div>
            <div class="psw">
                <h2><?php echo $_SESSION['psw']; ?></h2>
            </div>
        </div>
    </div>
    


    
    <div class="footer-section">
        <footer>
            <h5 class="footer-copyright">
                Copyright © 2023 TICKETSCANNER | Powered by Warre Gielkens & Jorre Noben
            </h5>
        </footer>
    </div>



    <script src="main.js"></script>
</body>
</html>