<?php

require_once "conn.php";


if(isset($_POST['submit'])){

    $errors = 0;
    $userId = $_SESSION['user_id'];
    $id = $_GET['id'];
    $querySelect = "select front_image,back_image,Interior_image,side_image from sell_cars where id = $id ";
    $runQuerySelect = mysqli_query($conn,$querySelect);
    if(mysqli_num_rows($runQuerySelect) == 1){
        $car = mysqli_fetch_assoc($runQuerySelect);
        $oldImageOne = $car['front_image'];
        $oldImageTwo = $car['back_image'];
        $oldImageThree = $car['Interior_image'];
        $oldImageFour = $car['side_image'];
        // $_SESSION['image'] = $oldImage;
    }else{
        $error = "here 0";
        $errors +=1;
    }

    
    $phone = trim(htmlspecialchars($_POST['phone']));
    $city = trim(htmlspecialchars($_POST['city']));
    $model = trim(htmlspecialchars($_POST['model']));
    $year = trim(htmlspecialchars($_POST['year']));
    $mielage = trim(htmlspecialchars($_POST['mielage']));
    $price = trim(htmlspecialchars($_POST['price']));
    $notes = trim(htmlspecialchars($_POST['notes']));
    $userId = $_SESSION['user_id'];
    $ext = ['png','jpg','jpeg'];

    // phone validation
    // $phone = preg_replace('/\D/', '', $phone);
    if(empty($phone)){
        $error = "here 1";
        $errors += 1;
    }elseif(!preg_match('/^\+?\d{7,15}$/', $phone)){
        $error = "here 12";
        $errors += 1;
    }elseif(strlen($phone) < 11){
        $error = "here 13";
        $errors += 1;
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

    if(!is_string($notes)){
        $error = "here 71";
        $errors +=1;
    }elseif(is_numeric($notes)){
        $error = "here 73";
        $errors +=1;
    }


    // if($imgOneError != 0 && $imgTwoError != 0 && $imgThreeError != 0 && $imgFourError != 0){
    //     $error = "here 8";
    //     $errors +=1;
    // }elseif (!getimagesize($imgOneTmpName) && !getimagesize($imgTwoTmpName) && !getimagesize($imgThreeTmpName) && !getimagesize($imgFourTmpName) ) {
    //     $error = "here 81";
    //     $errors +=1;
    // }elseif(!in_array($imgOneExt,$ext)){
    //     $error = "here 82";
    //     $errors +=1;
    // }elseif(!in_array($imgTwoExt,$ext)){
    //     $error = "here 83";
    //     $errors +=1;
    // }elseif(!in_array($imgThreeExt,$ext)){
    //     $error = "here 84";
    //     $errors +=1;
    // }elseif(!in_array($imgFourExt,$ext)){
    //     $error = "here 85";
    //     $errors +=1;
    // }


    if(!empty($_FILES['imgOne']['name'])){
     // image one
     $imgOne = $_FILES['imgOne'];
     $imgOneName = $imgOne['name'];
     $imgOneTmpName = $imgOne['tmp_name'];
     $imgOneError = $imgOne['error'];
     $imgOneExt = pathinfo($imgOneName,PATHINFO_EXTENSION);
     $imgOneExt = strtolower($imgOneExt);
        if($imgOneError != 0){
            $error = "here 8";
            $errors +=1;
        }elseif (!getimagesize($imgOneTmpName)) {
            $error = "here 81";
            $errors +=1;
        }elseif(!in_array($imgOneExt,$ext)){
            $error = "here 82";
            $errors +=1;
        }else{
            $newImageOne = uniqid() . ".$imgOneExt";
        }
    }else{
        $newImageOne = $oldImageOne;
    }
    
    if(!empty($_FILES['imgTwo']['name'])){
     // image two
     $imgTwo = $_FILES['imgTwo'];
     $imgTwoName = $imgTwo['name'];
     $imgTwoTmpName = $imgTwo['tmp_name'];
     $imgTwoError = $imgTwo['error'];
     $imgTwoExt = pathinfo($imgTwoName,PATHINFO_EXTENSION);
     $imgTwoExt = strtolower($imgTwoExt);
     if($imgTwoError != 0){
        $error = "here 9";
        $errors +=1;
    }elseif (!getimagesize($imgTwoTmpName)) {
        $error = "here 91";
        $errors +=1;
    }elseif(!in_array($imgTwoExt,$ext)){
        $error = "here 92";
        $errors +=1;
    }else{
        $newImageTwo = uniqid() . ".$imgTwoExt";
    }
    }else{
        $newImageTwo = $oldImageTwo;
    }
    
    
    if(!empty($_FILES['imgThree']['name'])){
     // image three
     $imgThree = $_FILES['imgThree'];
     $imgThreeName = $imgThree['name'];
     $imgThreeTmpName = $imgThree['tmp_name'];
     $imgThreeError = $imgThree['error'];
     $imgThreeExt = pathinfo($imgThreeName,PATHINFO_EXTENSION);
     $imgThreeExt = strtolower($imgThreeExt);
     if($imgThreeError != 0){
        $error = "here 10";
        $errors +=1;
    }elseif (!getimagesize($imgThreeTmpName)) {
        $error = "here 101";
        $errors +=1;
    }elseif(!in_array($imgThreeExt,$ext)){
        $error = "here 102";
        $errors +=1;
    }else{
        $newImageTwo = uniqid() . ".$imgThreeExt";
    }
    }else{
        $newImageThree = $oldImageThree;
    }
    
    if(!empty($_FILES['imgFour']['name'])){
     // image four
     $imgFour = $_FILES['imgFour'];
     $imgFourName = $imgFour['name'];
     $imgFourTmpName = $imgFour['tmp_name'];
     $imgFourError = $imgFour['error'];
     $imgFourExt = pathinfo($imgFourName,PATHINFO_EXTENSION);
     $imgFourExt = strtolower($imgFourExt);
     if($imgFourError != 0){
        $error = "here 11";
        $errors +=1;
    }elseif (!getimagesize($imgFourTmpName)) {
        $error = "here 111";
        $errors +=1;
    }elseif(!in_array($imgFourExt,$ext)){
        $error = "here 112";
        $errors +=1;
    }else{
        $newImageTwo = uniqid() . ".$imgFourExt";
    }
    }else{
        $newImageFour = $oldImageFour;
    }

    if($errors < 1){
       $query =" UPDATE sell_cars
        SET
            car_model = '$model',
            city = '$city',
            year_of_manufacture = '$year',
            Mielage = '$mielage',
            Price = '$price',
            Additional_Notes = '$notes',
            user_phone = '$phone',
            front_image = '$newImageOne',
            back_image = '$newImageTwo',
            Interior_image = '$newImageThree',
            side_image = '$newImageFour'
        WHERE id = $id";
        // $newImageOne = uniqid() . ".$imgOneExt";
        // $newImageTwo = uniqid() . ".$imgTwoExt";
        // $newImageThree = uniqid() . ".$imgThreeExt";
        // $newImageFour = uniqid() . ".$imgFourExt";
        // $query = "INSERT INTO rent_cars(`car_model`,`city`,`year_of_manufacture`,`Mielage`,`Price_per_day`,`Additional_Notes`,`user_phone`,`user_id`,`front_image`,`back_image`,`Interior_image`,`side_image`)
        // VALUES('$model','$city','$year','$mielage','$price','$notes','$phone','$userId','$newImageOne','$newImageTwo','$newImageThree','$newImageFour')";
        $runQuery = mysqli_query($conn,$query);
        if($runQuery){
            if(!empty($_FILES['imgOne']['name'])){
                unlink("../uploads/$oldImageOne");
                move_uploaded_file($imgOneTmpName, "../uploads/$newImageOne");
            }
            if(!empty($_FILES['imgTwo']['name'])){
                unlink("../uploads/$oldImageTwo");
                move_uploaded_file($imgTwoTmpName, to: "../uploads/$newImageTwo");
            }
            if(!empty($_FILES['imgThree']['name'])){
                unlink("../uploads/$oldImageThree");
                move_uploaded_file($imgThreeTmpName, "../uploads/$newImageThree");
            }
            if(!empty($_FILES['imgOne']['name'])){
                unlink("../uploads/$oldImageFour");
                move_uploaded_file($imgFourTmpName, "../uploads/$newImageFour");
            }
            $_SESSION['sellCarEdit'] = "car edit success";
            header("location:../Sell_Car.php");
            exit();
        }else{
            $_SESSION['sellCarEdit'] = "car edit failed";
            header("location:../Sell_Car.php");
            exit();
        }

    }else{
        $_SESSION['sellCarEdit'] = "car edit error $error";
        header("location:../Sell_Car.php");
        exit();
    }



}else{
    $_SESSION['sellCarEdit'] = "car edit error $error";
    header("location:../login.php");
    exit();
}