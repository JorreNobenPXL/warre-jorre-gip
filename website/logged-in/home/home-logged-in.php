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
    <title>Home</title>
    <link rel="icon" href="images/logo_tab.png">
    <link rel="stylesheet" href="home.css">
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

    <div>
        <main>

            <div class="phone">
                <div class="text-1">
                    <h1>Koop hier nu je ticket en Download de app voor je ticket te laten scannen!</h1>
                    <h4>Registreer je of log in voor alle events te zien</h4>
                </div>
                <img class="phone-pic" src="images/phone.png" alt="">
            </div>
            <div class="text-up-events">
                <h1>Upcomming events</h1>
            </div>

            <div class="events">
                <div class="event-img">
                    <a href="http://193.121.129.31/website/events/events.html"><img src="images/events_img.png" alt=""></a>
                    <h2 class="event-name">Event name 1</h2>
                </div>
                <div class="event-img">
                    <a href="http://193.121.129.31/website/events/events.html"><img src="images/events_img.png" alt=""></a>
                    <h2 class="event-name">Event name 1</h2>
                </div>
                <div class="event-img">
                    <a href="http://193.121.129.31/website/events/events.html"><img src="images/events_img.png" alt=""></a>
                    <h2 class="event-name">Event name 1</h2>
                </div>
            </div>

            <div class="btn-more-events">
                <a href="http://193.121.129.31/website/events/events.html">See more events</a>
            </div>

            <div class="text-sponser">
                <h1>Our Sponsers</h1>
            </div>

            <div class="sponsers">
                <div class="sponser-img">
                    <a href="https://www.cristal.be/"><img class="cristal-img" src="images/cristal logo.png" alt=""></a>
                </div>
                <div class="sponser-img">
                    <a href="https://pepsi.be/"><img class="pepsi-img" src="images/pepsi logo.png" alt=""></a>
                </div>
                <div class="sponser-img">
                    <a href="https://www.robe.cz/"><img class="robe-img" src="images/robe logo.png" alt=""></a>
                </div>
                <div class="sponser-img">
                    <a href="https://www.autoslimburg.be/"><img class="auto-limburg-img" src="images/auto's limburg logo.png" alt=""></a>
                </div>
                <div class="sponser-img">
                    <a href="https://www.apachefriends.org/"><img class="xampp-img" src="images/xampp logo.png" alt=""></a>
                </div>  
            </div>

        </main>

        
    </div>


    
    <div  class="footer-section">
        <footer>
            <h5 class="footer-copyright">
                Copyright © 2023 TICKETSCANNER | Powered by Warre Gielkens & Jorre Noben
            </h5>
        </footer>
    </div>


    
    <script src="main.js"></script>
</body>
</html>