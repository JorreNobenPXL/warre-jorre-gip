<?php

   $servername = "193.121.129.31";
   $username = "host";
   $password = "GIP-2022";
   $dbname = "gip2023";

   //database connection
   $conn = mysqli_connect($servername, $username, $password, $dbname);
  
  session_start();

  
   $username = $_SESSION['username'];
   $sql= "SELECT * FROM checkout WHERE username='".$username."'";
   $res = mysqli_query($conn, $sql);

   if(mysqli_num_rows($res) > 0)
        {
            foreach($res as $row)
            {
                ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['stud_name']; ?></td>
                    <td><?= $row['stud_class']; ?></td>
                    <td><?= $row['stud_phone']; ?></td>
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
                                

//  while ($row = mysql_fetch_assoc($res)){
//      $username = $row['username'];
//      $firstname = $row['first_name'];
//      $lastname = $row['last_name'];
//      $email = $row['email'];
//      $school = $row['school'];
//      $topics .= "<tr><td>username:".$username." </td><td>First name:".$firstname."</td><td>Last name:".$lastname."</td><td>email: ".$email."</td><td>school: ".$school."</td></tr>";
//  echo $topics;
//  } 

?>
<!-- 

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



    
    <div class="footer-section">
        <footer>
            <h5 class="footer-copyright">
                Copyright © 2023 TICKETSCANNER | Powered by Warre Gielkens & Jorre Noben
            </h5>
        </footer>
    </div>



    <script src="main.js"></script>
</body>
</html> -->