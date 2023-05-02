<?php

   $servername = "193.121.129.31";
   $username = "host";
   $password = "GIP-2022";
   $dbname = "gip2023";

   //database connection
   $conn = mysqli_connect($servername, $username, $password, $dbname);
  
  session_start();

    // $event = $_SESSION['event'];
    $useremail = $_SESSION['useremail'];
    // $myBarcodeDir = '../../generated_barcode/';
    // $fileName = $useremail."_".$event.'.png';
    // $pngAbsoluteFilePath = $myBarcodeDir.$fileName;
    // $qrcode = "<img style='width=20px' src='localhost/data/$pngAbsoluteFilePath'>"; //path aanpassen
    
    //$query = "SELECT * FROM checkout WHERE useremail LIKE $useremail";
    $query = "SELECT * FROM checkout WHERE id LIKE 2";
    $query2 = "SELECT * FROM signup WHERE id LIKE 2";
    $query_run = mysqli_query($conn, $query);
    $query_run2 = mysqli_query($conn, $query2);

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
                    <li><a href="http://193.121.129.31/website/logged-in/home/home-logged-in.php">Home</a></li
                    <li><a href="http://193.121.129.31/website/logged-in/events/events.php">Events</a></li>
                    <li><a href="http://193.121.129.31/website/logged-in/account/account.php"><span>My Account</span></a></li>
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
    <?php        
        if(mysqli_num_rows($query_run) > 0)
        {
            foreach($query_run as $row)
            {
                ?>
                <tr>
                    <th>ID</th>
                    <td><?= $row['id']; ?></td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td><?= $row['lname']; ?></td>
                    <td><?= $row['fname']; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= $row['useremail']; ?></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><?= $psw2['psw']; ?></td>
                </tr>
                <tr>
                    <th>Event</th>
                    <td><?= $row['event']; ?></td>
                </tr>
                <tr>
                    <th>QR-Code</th>
                    <td><?= $qrcode ?></td>
                </tr>
                
                <?php
            }
        }
        else
        {
            ?>
                <tr>
                    <td colspan="4">No Record Found</td>
                </tr>
            <?php
        }
    ?>


    
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