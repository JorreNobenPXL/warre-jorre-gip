<?php
require "conn.php"; 
$useremail = mysqli_real_escape_string($conn, $_POST['email']);
$psw = md5($_POST['password']);



$mysqli_query = "UPDATE signup SET psw = '$psw' WHERE useremail = '$useremail'";


$result = mysqli_query($conn,$mysqli_query);


if($result){
    print(" Password Changed"); 
}else{
    print(" Password Change NOT Successful"); 
}

?>