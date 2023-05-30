<?php

   $servername = "193.121.129.31";
   $username = "host";
   $password = "GIP-2022";
   $dbname = "gip2023";

   //database connection
   $conn = mysqli_connect($servername, $username, $password, $dbname);
  
  session_start();

  
    $username = $_SESSION['username'];

    $getdataSignup = "SELECT * FROM signup WHERE username = '$username'";
    $getdataAdmin = "SELECT * FROM admin WHERE username = '$username'";

    $resSignup = mysqli_query($conn, $getdataSignup);
    $resAdmin = mysqli_query($conn, $getdataAdmin);

    $getUseremail = "SELECT useremail FROM checkout WHERE username = '$username'";
    $getEvent = "SELECT event FROM checkout WHERE username = '$username'";

    $resultUseremail = mysqli_query($conn, $getUseremail);
    $resultEvent = mysqli_query($conn, $getEvent);

        


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="icon" href="images/logo_tab.png">
    <link rel="stylesheet" href="account.css">
</head> 
<body>
    <div class="navbar">
        <header>
        <a class="logo" href="http://193.121.129.31/website/logged-in/home/home-logged-in.php"><img src="images/logo.png" alt="logo"></a>
            <nav>
                <ul class="nav_links">
                    <li><a href="http://193.121.129.31/website/logged-in/home/home-logged-in.php">Home</a></li>
                    <li><a href="http://193.121.129.31/website/logged-in/events/events.php">Events</a></li>
                    <li><a href="http://193.121.129.31/website/logged-in/account/account.php"><span>My Account</span></a></li>
                </ul>
            </nav>
            <a href="http://193.121.129.31/website/logged-out/login_system/logout.php"><button class="nav_button">Logout</button></a>
        </header>
    </div>

    <div class="text-account">
        <h1>Account Details</h1>
    </div>

    <div class="account-info">
    <?php 
        if(mysqli_num_rows($resSignup) > 0 ){
            foreach($resSignup as $rowSignup) {  
                ?>
                <div class="tables">
                    <table class="account-table">
                        <tr>
                            <td class="col1">Username:</td>
                            <td class="col2"><?= $rowSignup['username']; ?></>
                        </tr>
                        <tr>
                            <td class="col1">Email:</td>
                            <td class="col2"><?= $rowSignup['useremail']; ?></>
                        </tr>
                        <tr>
                            <td class="col1">Password:</td>
                            <td class="col2"><?= $rowSignup['psw']; ?>
                            <p><a href="http://193.121.129.31/website/logged-out/login_system/changepass.php" class="changepass">Change Password?</a></p>
                        </td>
                        </tr>
                        <tr>
                            <td class="col1">Admin Account:</td>
                            <td class="col2"><?= $rowSignup['admin']; ?></>
                        </tr>
                        <?php
                           
                           if (($rowUseremail = mysqli_fetch_assoc($resultUseremail)) && ($rowEvent = mysqli_fetch_assoc($resultEvent))) {
                            $useremail = $rowUseremail['useremail'];
                            $event = $rowEvent['event'];
                           
                            if ($useremail !== null && $event !== null) {
                                $myBarcodeDir = 'website/generated_barcode/';
                                $fileName = $useremail . "_" . $event . '.png';
                                $pngAbsoluteFilePath = $myBarcodeDir . $fileName;
                                ?>
                                <tr>
                                    <td class="col1">QR-Code:</td>
                                    <td class="col2"><img class="qr-code" src='http://193.121.129.31/<?= $pngAbsoluteFilePath ?>'/></td>
                                </tr>
                                <?php
                            } else {
                                ?>
                                <tr>
                                    <td class="col1">QR-Code:</td>
                                    <td class="col2">No Record Found</td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </table>
                    
                </div>
                <?php
                }
                }else{
                    if(mysqli_num_rows($resAdmin) > 0 ){
                        foreach($resAdmin as $rowAdmin) {  
                            ?>
                            <div class="tables">
                                <table class="account-table">
                                    <tr>
                                        <td class="col1">Username:</td>
                                        <td class="col2"><?= $rowAdmin['username']; ?></>
                                    </tr>
                                    <tr>
                                        <td class="col1">Email:</td>
                                        <td class="col2"><?= $rowAdmin['useremail']; ?></>
                                    </tr>
                                    <tr>
                                        <td class="col1">Password:</td>
                                        <td class="col2"><?= $rowAdmin['psw']; ?>
                                        <p><a href="http://193.121.129.31/website/logged-out/login_system/changepass.php" class="changepass">Change Password?</a></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col1">Admin Account:</td>
                                        <td class="col2"><?= $rowAdmin['admin']; ?></>
                                    </tr>
                                    <?php
                                       
                                       if (($rowUseremail = mysqli_fetch_assoc($resultUseremail)) && ($rowEvent = mysqli_fetch_assoc($resultEvent))) {
                                        $useremail = $rowUseremail['useremail'];
                                        $event = $rowEvent['event'];
                                       
                                        if ($useremail !== null && $event !== null) {
                                            $myBarcodeDir = 'website/generated_barcode/';
                                            $fileName = $useremail . "_" . $event . '.png';
                                            $pngAbsoluteFilePath = $myBarcodeDir . $fileName;
                                            ?>
                                            <tr>
                                                <td class="col1">QR-Code:</td>
                                                <td class="col2"><img class="qr-code" src='http://193.121.129.31/<?= $pngAbsoluteFilePath ?>'/></td>
                                            </tr>
                                            <?php
                                        } else {
                                            ?>
                                            <tr>
                                                <td class="col1">QR-Code:</td>
                                                <td class="col2">No Record Found</td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </table>
                                
                            </div>
                            <?php
                        }
                    }else{
                        ?>
                            <table class="account-table">
                                <tr>
                                    <td class="col1">Username:</td>
                                    <td class="col2">No Record Found</td>
                                </tr>
                                <tr>
                                    <td class="col1">Email:</td>
                                    <td class="col2">No Record Found</td>
                                </tr>
                                <tr>
                                    <td class="col1">Password:</td>
                                    <td class="col2">No Record Found</td>
                                </tr>
                                <tr>
                                    <td class="col1">Admin Account:</td>
                                    <td class="col2">No Record Found</td>
                                </tr>
                                <tr>
                                    <td class="col1">QR-Code:</td>
                                    <td class="col2">No Record Found</td>
                                </tr>
                            </table>
                        <?php
                    }
                }
                
    ?>
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