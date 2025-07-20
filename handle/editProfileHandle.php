<?php 



require_once 'conn.php';

if(isset($_SESSION['user_id']) && isset($_POST['submit'])){


    $name = trim(htmlspecialchars($_POST['name']));
    $email = trim(htmlspecialchars($_POST['Email']));

    $error = '';
    $errors = 0;
    $user_id = $_SESSION['user_id'];

    if(empty($name)){
        $error = "name is required";
        $errors +=1;
    }elseif(!is_string($name)){
        $error = "name must be string only";
        $errors +=1;
    }elseif(is_numeric($name)){
        $error = "name must be string only";
        $errors +=1;
    }elseif(strlen($name) < 5){
        $error = "name length is to short";
        $errors +=1;
    }

    if(empty($email)){
        $error = "email is required";
         $errors +=1;
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = "invalid email";
         $errors +=1;
    }

    if($errors < 1){
        $query = "UPDATE users
            SET email = '$email', name = '$name'
            WHERE id = $user_id;
            ";
        $runQuery = mysqli_query($conn,$query);
        if($runQuery){
            $_SESSION['profileEdit'] = "Profile edit success";
            header("location: ../Profile.php");
            exit();
        }else{
            $_SESSION['profileEdit'] = "Profile edit Failed";
            header("location:" .$_SERVER['HTTP_REFERER'] );
            exit();
        }

    }else{
        $_SESSION['profileEdit'] = "$error";
        header("location:" .$_SERVER['HTTP_REFERER']);
        exit();
    }


}else{
    header("location: ../login.php");
    exit();
}