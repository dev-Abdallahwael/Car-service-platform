<?php

require_once 'conn.php';


if(isset($_POST['submit'])){

    $errors = [];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conPassword = $_POST['confirmPassword'];
    $role = $_POST['role'];

    if(empty($name)){
        $errors[] = "username is required";
    }elseif(! is_string($name)){
        $errors[] = "invalid username";
    }elseif(strlen($name)<6){
        $errors[] = "username length must be more than 5 characters";
    }else{
        $name = trim(htmlspecialchars($name));
    }

    if(empty($email)){
        $errors[] = "email is required";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = "invalid email";
    }else{
        $email = trim(htmlspecialchars($email));
    }

    if(empty($password)){
        $errors[] = "password is required";
    }elseif(strlen($password)<8){
        $errors[] = "password must be more than 8 characters";
    }elseif($password != $conPassword){
        $errors[] = "password must be equal confirm password";
    }else{
        $password = trim(htmlspecialchars($password));
        $password = password_hash($password,PASSWORD_DEFAULT);
    }

    if(empty($role)){
        $errors[] = "role is required";
    }else{
        $role = trim(htmlspecialchars($role));
    }

    

    $queryCheckValidation = "Select id from users where email = '$email';";
    $runQueryCheck = mysqli_query($conn,$queryCheckValidation);
    if(mysqli_num_rows($runQueryCheck) > 0){
        $errors[] = "email is already used";
        $_SESSION['signup'] = "signup insert failed";
    }

    if(empty($errors)){
        $query = "INSERT INTO users(`name`,`email`,`password`,`role`)VALUES('$name','$email','$password','$role')";
        $runQuery = mysqli_query($conn,$query);
        if($runQuery){
            $_SESSION['signup'] = "signup successfuly";
            header("location:../login.php");
        }else{
            $_SESSION['signup'] = "signup insert failed";
            // header("location:../Registration/signup.php");
        }
    
    }else{
        $_SESSION['error'] = $errors;
        $_SESSION['signup'] = "sign up failed";
        header("location:../signup.php");
    }



}else{
    header("location:../signup.php");
}