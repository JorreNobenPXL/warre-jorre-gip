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

</head>
<body> 
   <div>
      <div>
         <h3>Welcome!</h3>
         <p>Your email : <span><?php echo $_SESSION['useremail']; ?></span></p>
         <button><a href="login_system/logout.php" class="logout">logout</a></button>
      </div>
   </div>

</body>
</html>
