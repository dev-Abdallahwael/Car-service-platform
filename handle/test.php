<?php

require_once 'conn.php';


$email = trim(htmlspecialchars($_POST['email']));
$password = trim(htmlspecialchars($_POST['password']));

$query = "select * from users where email = '$email'";
$runQuery = mysqli_query($conn,$query);

if(mysqli_num_rows($runQuery)>0){
    $user = mysqli_fetch_assoc($runQuery);
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['password'] = $user['password'];
    $_SESSION['password2'] = $password;
    $_SESSION['email2'] = $email;
    $emailverify = $email == $user['email'];
    $oldPassword = $user['password'];
    $is_verfiy = password_verify($password, $oldPassword);
    $_SESSION['emailv'] =  $emailverify;
    $_SESSION['passv'] =   $is_verfiy ? 'true' : 'false';

    if($is_verfiy){
        $_SESSION['login'] = "success";
        $_SESSION['user_id'] = $user['id'];
        header("location:../Registration/mainCustomer.php");
    }else{
        $_SESSION['login'] = "failed";
        // $_SESSION['user_id'] = $user['id'];
        header("location:../Registration/mainCustomer.php");
    }



}