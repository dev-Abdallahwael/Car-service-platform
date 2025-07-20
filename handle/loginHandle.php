<?php

require_once 'conn.php';

if(isset($_POST['submit'])){

    $errors = [];

    $email = trim(htmlspecialchars($_POST['email']));
    $password = trim(htmlspecialchars($_POST['password']));

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
    }else{
        $password = trim(htmlspecialchars($password));
    }


    if(empty($errors)){
        $query = "select * from users where email = '$email'";
        $runQuery = mysqli_query($conn,$query);
        if(mysqli_num_rows($runQuery)>0){
            $user = mysqli_fetch_assoc($runQuery);
            $dataPass = $user['password'];
            $passVerify = password_verify($password, $dataPass); // return bool

            // Verify the entered password
            if ($passVerify) {
                // Store session data
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['login'] = "Login successful";
                // Redirect based on role
                if ($user['role'] == "customer") {
                    header("Location:../main.php");
                } else {
                    header("Location:../admin_dashboard/mainOwner.php");
                }
                exit();

               
            } else {
                $_SESSION['login'] = "Email or password is incorrect";
                header("Location: ../login.php");
                exit();
            }
        }else {
                $_SESSION['login'] = "Email or password is incorrect";
                header("Location: ../login.php");
                exit();
            }
    }else{
        $_SESSION['login'] = "login failed error";
        $_SESSION['error'] = $errors;
        header("location:../login.php");
        exit();
    }
}else{
    header("location:../login.php");
    exit();
}


