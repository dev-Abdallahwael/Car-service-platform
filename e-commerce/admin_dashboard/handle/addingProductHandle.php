<?php

require_once 'conn.php';

if(isset($_POST['submit'])){

    $productName = trim(htmlspecialchars($_POST['category']));
    $descr = trim(htmlspecialchars($_POST['descr']));
    $price = trim(htmlspecialchars($_POST['price']));
    $discount = trim(htmlspecialchars($_POST['discount']));
    $category_id = trim(htmlspecialchars($_POST['category_id']));
    $image = $_FILES['image'];
    $imageName = $image['name'];
    $imageTmpName = $image['tmp_name'];
    $imageError = $image['error'];
    $imageExt = pathinfo($imageName,PATHINFO_EXTENSION);
    $imageExt = strtolower($imageExt);
    $ext = ['png','jpg','jpeg'];
    // $owner_id = $_SESSION['user_id'];
    $errors = 0;
    $error = "";
   
    if(empty($productName)){
        $error = "here 1";
        $errors +=1;
    }elseif(!is_string($productName)){
        $error = "here 11";
        $errors +=1;
    }elseif(is_numeric($productName)){
        $error = "here 13";
        $errors +=1;
    }

    if(empty($descr)){
        $error = "here 2";
        $errors +=1;
    }elseif(!preg_match("/^[a-zA-Z\s]+$/", $descr)){
        $error = "here 21";
        $errors +=1;
    }elseif(is_numeric($descr)){
        $error = "here 23";
        $errors +=1;
    }elseif(strlen($descr) < 10){
        $error = "here 24";
        $errors +=1;
    }

    if(empty($price)){
        $error = "here 3";
        $errors +=1;
    }elseif(!is_numeric($price)){
        $error = "here 33";
        $errors +=1;
    }

    if(empty($discount)){
        $error = "here 4";
        $errors +=1;
    }elseif(!is_numeric($discount)){
        $error = "here 43";
        $errors +=1;
    }

    

    if($imageError != 0){
        $error = "here 6";
        $errors +=1;
    }elseif (!getimagesize($imageTmpName)) {
        $error = "here 61";
        $errors +=1;
    }elseif(!in_array($imageExt,$ext)){
        $error = "here 62";
        $errors +=1;
    }




    if($errors < 1){
        $newImage = uniqid() . ".$imageExt";
        $query = "INSERT INTO products(`name`,`descr`,`price`,`discount`,`image`,`category_id`)
        VALUES('$productName','$descr','$price','$discount','$newImage','$category_id')";
        $runQuery = mysqli_query($conn,$query);
        if($runQuery){
            move_uploaded_file($imageTmpName, "../../../uploads/$newImage");
            $_SESSION['product'] = "product added successfuly";
            header("location:../products.php");
            exit();
        }else{
            $_SESSION['product'] = "product added failed";
            header("location:../AddingProducts.php");
            exit();
        }

    }else{
        $_SESSION['product'] = "product added error $error";
        header("location:../AddingProducts.php");
        exit();
    }





}else{
    header("location:../../../login.php");
    exit();
}