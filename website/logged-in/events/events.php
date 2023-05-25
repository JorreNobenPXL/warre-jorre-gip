<?php

   $servername = "193.121.129.31";
   $username = "host";
   $password = "GIP-2022";
   $dbname = "gip2023";

   //database connection
   $conn = mysqli_connect($servername, $username, $password, $dbname);
  
  session_start();

    if(!isset($_SESSION['username'])){
        header('location:http://193.121.129.31/webiste/logged-out/login_system/login.php');
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
    <link rel="stylesheet" href="events.css">
</head> 
<body>
    <div class="navbar">
        <header>
        <a class="logo" href="http://193.121.129.31/website/logged-in/home/home-logged-in.php"><img src="images/logo.png" alt="logo"></a>
            <nav>
            <ul class="nav_links">
                    <li><a href="http://193.121.129.31/website/logged-in/home/home-logged-in.php">Home</a></li>
                    <li><a href="http://193.121.129.31/website/logged-in/events/events.php">Events</a></li>
                    <li><a href="http://193.121.129.31/website/logged-in/account/account-under-construction.html"><span>My Account</span></a></li>
                </ul>
            </nav>
            <a href="http://193.121.129.31/website/logged-out/login_system/logout.php"><button class="nav_button">Logout</button></a>
        </header>
    </div>


    
    <div class="text-events">
        <h1>EVENTS</h1>
    </div>

    <div class="events">
        <div class="event">
            <div class="event-img">
                <img src="images/events_zillion.png" alt="">
            </div>
            <div class="event-details">
                <div class="event-text">
                <h1>The Zillion</h1>
                    <h3>About event:
                        <br>
                        Voor de nieuwe Zillion film
                        <br>
                        21:00 - 06:00
                        <br>
                        Karrewiel Hoeselt
                    </h3>
                </div>
                <a href="http://193.121.129.31/website/checkout/checkout-contact-details.php"><button class="buy-ticket">Buy Ticket</button></a>
            </div>    
        </div>
    </div>

    <div class="events">
        <div class="event">
            <div class="event-img">
                <img src="images/event_posttisj.png" alt="">
            </div>
            <div class="event-details">
                <div class="event-text">
                    <h1>Post X-MOS TISJ</h1>
                    <h3>About event:
                        <br>
                        Post X-MOS van TISJ
                        <br>
                        21:00 - 03:00
                        <br>
                        Karrewiel Hoeselt
                    </h3>
                </div>
                <a href="http://193.121.129.31/website/checkout/checkout-contact-details.php"><button class="buy-ticket">Buy Ticket</button></a>
            </div>    
        </div>
    </div>

    <div class="events">
        <div class="event">
            <div class="event-img">
                <img src="images/event_preikso.png" alt="">
            </div>
            <div class="event-details">
                <div class="event-text">
                    <h1>Pre X-MOS IKSO</h1>
                    <h3>About event:
                        <br>
                        Pre X-MOS van IKSO
                        <br>
                        21:00 - 03:00
                        <br>
                        Karrewiel Hoeselt
                    </h3>
                </div>
                <a href="http://193.121.129.31/website/checkout/checkout-contact-details.php"><button class="buy-ticket">Buy Ticket</button></a>
            </div>    
        </div>
    </div>

    <div class="events">
        <div class="event">
            <div class="event-img">
                <img src="images/event_prehgi.png" alt="">
            </div>
            <div class="event-details">
                <div class="event-text">
                    <h1>Pre X-MOS HGI</h1>
                    <h3>About event:
                        <br>
                        Pre X-MOS van HGI
                        <br>
                        21:00 - 03:00
                        <br>
                        Karrewiel Hoeselt
                    </h3>
                </div>
                <a href="http://193.121.129.31/website/checkout/checkout-contact-details.php"><button class="buy-ticket">Buy Ticket</button></a>
            </div>    
        </div>
    </div>

    <div class="events">
        <div class="event">
            <div class="event-img">
                <img src="images/events_pretisj.png" alt="">
            </div>
            <div class="event-details">
                <div class="event-text">
                <h1>Pre X-MOS TISJ</h1>
                    <h3>About event:
                        <br>
                        Pre X-MOS van TISJ
                        <br>
                        21:00 - 03:00
                        <br>
                        Karrewiel Hoeselt
                    </h3>
                </div>
                <a href="http://193.121.129.31/website/checkout/checkout-contact-details.php"><button class="buy-ticket">Buy Ticket</button></a>
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