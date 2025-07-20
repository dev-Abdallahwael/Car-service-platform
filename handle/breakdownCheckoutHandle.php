<?php


require_once 'conn.php';

if(isset($_POST['submit']) && isset($_SESSION['user_id']) && isset($_GET['id'])){


    $error = "";
    $errors = 0;
    $planId = $_GET['id'];
    $userId = $_SESSION['user_id'];
    $name = trim(htmlspecialchars($_POST['name']));
    $visaNumber = trim(htmlspecialchars($_POST['number']));
    $exDate = trim(htmlspecialchars($_POST['date']));
    $cvv = trim(htmlspecialchars($_POST['cvv']));

// name validation
    if(empty($name)){
        $error = "here 1";
        $errors +=1;
    }elseif(!preg_match("/^[A-Za-z ]+$/", $name)){
        $error = "here 12";
        $errors +=1;
    }elseif(strlen($name)<8){
        $error = "here 13";
        $errors +=1;
    }
// visa number validation
    if(empty($visaNumber)){
        $error = "here 2";
        $errors +=1;
    }elseif(!preg_match("/^[0-9]+$/", $visaNumber)){
        $error = "here 22";
        $errors +=1;
    }elseif(strlen($visaNumber) != 16){
        $error = "here 23";
        $errors +=1;
    }

    // expire date validation
    if(empty($exDate)){
        $error = "here 3";
        $errors +=1;
    }elseif(!preg_match("/^(0[1-9]|1[0-2])\/(0[1-9]|[12][0-9]|3[01])$/", $exDate)){
        $error = "here 32";
        $errors +=1;
    }elseif(strlen($exDate) != 5){
        $error = "here 33";
        $errors +=1;
    }

    // cvv validation
    if(empty($cvv)){
        $error = "here 4";
        $errors +=1;
    }elseif(!preg_match("/^[0-9]+$/", $cvv)){
        $error = "here 42";
        $errors +=1;
    }elseif(strlen($cvv)!= 3){
        $error = "here 43";
        $errors +=1;
    }

    if($errors < 1){
        // hash visa number
        $visaNumber = password_hash($visaNumber,PASSWORD_DEFAULT);
        // insert card data in credit_cards table
        $query = "INSERT INTO credit_cards(`number`,`exdate`,`user_id`)
        VALUES('$visaNumber','$exDate','$userId')";
        $runQuery = mysqli_query($conn,$query);
        if($runQuery){
            // if the card added edit the vip column in user table to make it vip
            $queryEditVip = "UPDATE users SET vip = 'vip', plans = 'plan $planId' WHERE id = $userId";
            $runQueryVip = mysqli_query($conn,$queryEditVip);
            if($runQueryVip){
                // return to centers after pay success
                $_SESSION['Bpay'] = "pay success";
                header("location:../ViewBreakdown_centers.php");
                exit();
            }else{
                $_SESSION['Bpay'] = "pay edit failed";
                header("location:../BreakDown_pay.php?id=".$planId);
                exit();
            }
        }else{
            $_SESSION['Bpay'] = "pay insert failed";
            header("location:../BreakDown_pay.php?id=".$planId);
            exit();
        }



    }else{
        $_SESSION['Bpay'] = "pay failed error $error";
        header("location:../BreakDown_pay.php?id=".$planId);
        exit();
    }


}else{
    $_SESSION['Bpay'] = "pay failed error $error";
    header("location:../login.php");
    exit();
}