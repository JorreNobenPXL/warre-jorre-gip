<?php

  $servername = "193.121.129.31";
  $username = "warre";
  $password = "Warre6789!";
  $dbname = "gip2023";

  //database connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  
  session_start();

    if(!isset($_SESSION['useremail'])){
    header('location:http://localhost:3000/webiste/login_system/login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
<div class="container">
   <div class="content">
      <h3>Welcome!</h3>
      <p>your email : <span><?php echo $_SESSION['useremail']; ?></span></p>
      <button><a href="login_system/logout.php" class="logout">logout</a></button>
   </div>
</div>

</body>
</html>