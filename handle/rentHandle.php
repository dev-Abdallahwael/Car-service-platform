<?php

require_once "conn.php";


if(isset($_SESSION['user_id']) && isset($_POST['submit'])){

    $errors = 0;
    $phone = trim(htmlspecialchars($_POST['phone']));
    $city = trim(htmlspecialchars($_POST['city']));
    $model = trim(htmlspecialchars($_POST['model']));
    $year = trim(htmlspecialchars($_POST['year']));
    $mielage = trim(htmlspecialchars($_POST['mielage']));
    $price = trim(htmlspecialchars($_POST['price']));
    $notes = trim(htmlspecialchars($_POST['notes']));
    $userId = $_SESSION['user_id'];

    // image one
    $imgOne = $_FILES['imgOne'];
    $imgOneName = $imgOne['name'];
    $imgOneTmpName = $imgOne['tmp_name'];
    $imgOneError = $imgOne['error'];
    $imgOneExt = pathinfo($imgOneName,PATHINFO_EXTENSION);
    $imgOneExt = strtolower($imgOneExt);

    // image two
    $imgTwo = $_FILES['imgTwo'];
    $imgTwoName = $imgTwo['name'];
    $imgTwoTmpName = $imgTwo['tmp_name'];
    $imgTwoError = $imgTwo['error'];
    $imgTwoExt = pathinfo($imgTwoName,PATHINFO_EXTENSION);
    $imgTwoExt = strtolower($imgTwoExt);

    // image three
    $imgThree = $_FILES['imgThree'];
    $imgThreeName = $imgThree['name'];
    $imgThreeTmpName = $imgThree['tmp_name'];
    $imgThreeError = $imgThree['error'];
    $imgThreeExt = pathinfo($imgThreeName,PATHINFO_EXTENSION);
    $imgThreeExt = strtolower($imgThreeExt);

    // image four
    $imgFour = $_FILES['imgFour'];
    $imgFourName = $imgFour['name'];
    $imgFourTmpName = $imgFour['tmp_name'];
    $imgFourError = $imgFour['error'];
    $imgFourExt = pathinfo($imgFourName,PATHINFO_EXTENSION);
    $imgFourExt = strtolower($imgFourExt);

    $ext = ['png','jpg','jpeg'];

    // phone validation
    if(empty($phone)){
        $error = "here 1";
        $errors +=1;
    }elseif(!preg_match('/^\+?[0-9]{7,15}$/', $phone)){
        $error = "here 12";
        $errors +=1;
    }elseif(strlen($phone) < 11){
        $error = "here 13";
        $errors +=1;
    }

    // city validation
    if(empty($city)){
        $error = "here 2";
        $errors +=1;
    }elseif(!is_string($city)){
        $error = "here 21";
        $errors +=1;
    }elseif(is_numeric($city)){
        $error = "here 23";
        $errors +=1;
    }

    // model validation
    if(empty($model)){
        $error = "here 3";
        $errors +=1;
    }elseif(!is_string($model)){
        $error = "here 31";
        $errors +=1;
    }elseif(is_numeric($model)){
        $error = "here 33";
        $errors +=1;
    }

    // year validation
    if(empty($year)){
        $error = "here 4";
        $errors +=1;
    }elseif(ctype_alpha($year)){
        $error = "here 41";
        $errors +=1;
    }elseif(!is_numeric($year)){
        $error = "here 43";
        $errors +=1;
    }

    // mielage validation
    if(empty($mielage)){
        $error = "here 5";
        $errors +=1;
    }elseif(ctype_alpha($mielage)){
        $error = "here 51";
        $errors +=1;
    }elseif(!is_numeric($mielage)){
        $error = "here 53";
        $errors +=1;
    }
    // price validation
    if(empty($price)){
        $error = "here 6";
        $errors +=1;
    }elseif(ctype_alpha($price)){
        $error = "here 61";
        $errors +=1;
    }elseif(!is_numeric($price)){
        $error = "here 63";
        $errors +=1;
    }

    
    if(empty($year)){
        $error = "here 71";
        $errors +=1;
    }elseif(!is_string($notes)){
        $error = "here 72";
        $errors +=1;
    }
    elseif(is_numeric($notes)){
        $error = "here 73";
        $errors +=1;
    }


    if($imgOneError != 0 && $imgTwoError != 0 && $imgThreeError != 0 && $imgFourError != 0){
        $error = "here 8";
        $errors +=1;
    }elseif (!getimagesize($imgOneTmpName) && !getimagesize($imgTwoTmpName) && !getimagesize($imgThreeTmpName) && !getimagesize($imgFourTmpName) ) {
        $error = "here 81";
        $errors +=1;
    }elseif(!in_array($imgOneExt,$ext)){
        $error = "here 82";
        $errors +=1;
    }elseif(!in_array($imgTwoExt,$ext)){
        $error = "here 83";
        $errors +=1;
    }elseif(!in_array($imgThreeExt,$ext)){
        $error = "here 84";
        $errors +=1;
    }elseif(!in_array($imgFourExt,$ext)){
        $error = "here 85";
        $errors +=1;
    }


    if($errors < 1){
        $newImageOne = uniqid() . ".$imgOneExt";
        $newImageTwo = uniqid() . ".$imgTwoExt";
        $newImageThree = uniqid() . ".$imgThreeExt";
        $newImageFour = uniqid() . ".$imgFourExt";
        $query = "INSERT INTO rent_cars(`car_model`,`city`,`year_of_manufacture`,`Mielage`,`Price_per_day`,`Additional_Notes`,`user_phone`,`user_id`,`front_image`,`back_image`,`Interior_image`,`side_image`)
        VALUES('$model','$city','$year','$mielage','$price','$notes','$phone','$userId','$newImageOne','$newImageTwo','$newImageThree','$newImageFour')";
        $runQuery = mysqli_query($conn,$query);
        if($runQuery){
            move_uploaded_file($imgOneTmpName, "../uploads/$newImageOne");
            move_uploaded_file($imgTwoTmpName, "../uploads/$newImageTwo");
            move_uploaded_file($imgThreeTmpName, "../uploads/$newImageThree");
            move_uploaded_file($imgFourTmpName, "../uploads/$newImageFour");
            $_SESSION['rentCar'] = "car added successfuly";
            header("location:../Rent_Car.php");
            exit();
        }else{
            $_SESSION['rentCar'] = "car added failed";
            header("location:../Rent_Car.php");
            exit();
        }

    }else{
        $_SESSION['rentCar'] = "center added error $error";
        header("location:../Rent_Car.php");
        exit();
    }



}else{
    header("location:../login.php");
}