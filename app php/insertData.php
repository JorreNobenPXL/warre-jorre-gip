<?php
$servername = "127.0.0.1";
$username = "host";
$password = "GIP-2022";
$dbname = "gip2023";

// database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);


$username = mysqli_real_escape_string($conn, $_POST['name']); 
$useremail = mysqli_real_escape_string($conn, $_POST['email']);
$psw = md5($_POST['password']);
$admin = "No";

//$username = "jorretest";
//$useremail = "jorretest@gmail.com";
//$psw = "1234";

$checkUser = "SELECT username FROM signup WHERE username = '$username'";
$resultCheckUser = mysqli_query($conn, $checkUser);
$checkEmail = "SELECT * FROM SIGNUP WHERE useremail = '$useremail'";
$resultCheckEmail = mysqli_query($conn, $checkEmail);

//if($resultCheckUser == null){
//    print(" Username is allready in use!");
//}else{
//    if($resultCheckEmail != null){
//        print(" Email is allready in use!");
//    }else{
//        if(! $resultCheckUser || $resultCheckEmail) {    
//            $insert = "INSERT INTO signup (username, useremail, psw, admin) VALUES('$username', '$useremail','$psw', '$admin')";
//            $result = mysqli_query($conn, $insert);
//            //RESET the AUTOINCREMENT
//            $result = mysqli_query($conn,"SET @num := 0;");
//            $result = mysqli_query($conn,"UPDATE signup SET id = @num := (@num+1)");
//            $result = mysqli_query($conn,"ALTER TABLE signup AUTO_INCREMENT =1");
 //       }
//    }
//    
//}

if(mysqli_num_rows($resultCheckUser)>0){
    $row = mysqli_fetch_assoc($resultCheckUser);
    print(" User allready used");
}else{
    if(mysqli_num_rows($resultCheckEmail)>0){
        $row = mysqli_fetch_assoc($resultCheckEmail);
        print(" Email allready used!");
    }else{
        $insert = "INSERT INTO signup (username, useremail, psw, admin) VALUES('$username', '$useremail','$psw', '$admin')";
        $result = mysqli_query($conn, $insert);
        //RESET the AUTOINCREMENT
        $result = mysqli_query($conn,"SET @num := 0;");
        $result = mysqli_query($conn,"UPDATE signup SET id = @num := (@num+1)");
        $result = mysqli_query($conn,"ALTER TABLE signup AUTO_INCREMENT =1");
        if($result){
            print(" You have registered!"); 
        }else{
            print(" NOT Successful"); 
        }

    }
}


?>