<?php

require "conn.php";
$usernamelog = mysqli_real_escape_string($conn, $_POST['password']); 
$useremaillog = mysqli_real_escape_string($conn, $_POST['email']);
$pswlog = md5($_POST['name']);


$mysqli_query = "SELECT * FROM signup WHERE username = '$usernamelog' && psw = '$pswlog'";
// or useremail = '$usernamelog' 

$result = mysqli_query($conn, $mysqli_query);

if(mysqli_num_rows($result)>0){
//print("Login success");
$row = mysqli_fetch_assoc($result); 
Print(" Login Successful.. Welcome!");

}
else{
print(" Login not successfull"); 
}

?>