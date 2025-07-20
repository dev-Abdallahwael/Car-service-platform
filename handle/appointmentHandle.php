<?php


require_once 'conn.php';


if(isset($_SESSION['user_id']) && isset($_GET['id']) && isset($_POST['submit'])){


    $name = trim(htmlspecialchars($_POST['name']));
    $email = trim(htmlspecialchars($_POST['email']));
    $service = trim(htmlspecialchars($_POST['service']));
    $phone = trim(htmlspecialchars($_POST['phone']));
    $date = trim(htmlspecialchars($_POST['date']));
    $time = trim(htmlspecialchars($_POST['time']));
    $otherService = trim(htmlspecialchars($_POST['otherService']));
    $message = trim(htmlspecialchars($_POST['message']));
    $user_id = $_SESSION['user_id'];
    $center_id = $_GET['id'];
    $errors = 0;
    $error = "";


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
        $error = "email is wrong";
        $errors +=1;
    }

    if(empty($service)){
        $error = "service is required";
        $errors +=1;
    }elseif(!is_string($service)){
        $error = "service must be string only";
        $errors +=1;
    }elseif(is_numeric($service)){
        $error = "service must be string only";
        $errors +=1;
    }


    if(empty($phone)){
        $error = "phone is required";
        $errors +=1;
    }elseif(!preg_match('/^\+?[0-9]{7,15}$/', $phone)){
       $error = "phone is not correct";
        $errors +=1;
    }elseif(strlen($phone) < 11){
        $error = "phone is not correct";
        $errors +=1;
    }

    if(empty($date)){
        $error = "date is required";
        $errors +=1;
    }

    if(empty($time)){
        $error = "time is required";
        $errors +=1;
    }

    if(!is_string($otherService)){
        $error = "service must be string";
        $errors +=1;
    }elseif(is_numeric($otherService)){
        $error = "service must be string";
        $errors +=1;
    }

    if(!is_string($message)){
        $error = "note must be string";
        $errors +=1;
    }elseif(is_numeric($message)){
        $error = "note must be string";
        $errors +=1;
    }

    if($errors < 1){
        $query = "INSERT INTO invoices (`full_name`,`email`,`phone`,`date`,`time`,`service`,`note`,`otherService`,`center_id`)
        VALUES('$name','$email','$phone','$date','$time','$service','$note','$otherService','$center_id')";
        $runQuery = mysqli_query($conn,$query);
        if($runQuery){
            $_SESSION['invoices'] = "date booked successfuly";
            header("location:" .$_SERVER['HTTP_REFERER'] ." ?id=$center_id");
            exit();
        }else{
            $_SESSION['invoices'] = "date booked failed";
            header("location:" .$_SERVER['HTTP_REFERER'] ." ?id=$center_id");
            exit();
        }

    }else{
        $_SESSION['invoices'] = "date booked error $error";
        header("location:" .$_SERVER['HTTP_REFERER'] ."?id=$center_id");
        exit();
    }





}else{
    header("location:../login.php");
    exit();
}