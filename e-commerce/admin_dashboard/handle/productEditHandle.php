<?php

require_once 'conn.php';

if(isset($_POST['submit']) && isset($_GET['id'])){

    $errors = 0;
    $error = "";
    $productName = trim(htmlspecialchars($_POST['category']));
    $descr = trim(htmlspecialchars($_POST['descr']));
    $price = trim(htmlspecialchars($_POST['price']));
    $discount = trim(htmlspecialchars($_POST['discount']));
    $category_id = trim(htmlspecialchars($_POST['category_id']));
    $ext = ['png','jpg','jpeg'];
    $productId = $_GET['id'];
    $querySelect = "select image from products where id = $productId";
    $runQuerySelect = mysqli_query($conn,$querySelect);
    if(mysqli_num_rows($runQuerySelect) == 1){
        $product = mysqli_fetch_assoc($runQuerySelect);
        $oldImage = $product['image'];
        $_SESSION['image'] = $oldImage;
    }else{
        $error = "here 0";
        $errors +=1;
    }
    // $owner_id = $_SESSION['user_id'];
    
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

    

    if(!empty($_FILES['image']['name'])){
        $image = $_FILES['image'];
        $imageName = $image['name'];
        $imageTmpName = $image['tmp_name'];
        $imageError = $image['error'];
        $imageExt = pathinfo($imageName,PATHINFO_EXTENSION);
        $imageExt = strtolower($imageExt);
        if($imageError != 0){
            $error = "here 7";
            $errors +=1;
        }elseif (!getimagesize($imageTmpName)) {
            $error = "here 71";
            $errors +=1;
        }elseif(!in_array($imageExt,$ext)){
            $error = "here 72";
            $errors +=1;
        }else{
            $newImage = uniqid() . ".$imageExt";
        }
    }else{
        $newImage = $oldImage;
    }




    if($errors < 1){
        
        // $query = "INSERT INTO products(`name`,`descr`,`price`,`discount`,`image`,`category_id`)
        // VALUES('$productName','$descr','$price','$discount','$newImage','$category_id')";
        $query = "UPDATE products
        SET
            name = '$productName',
            descr = '$descr',
            price = '$price',
            discount = '$discount',
            category_id = '$category_id',
            image = '$newImage'
        WHERE id = $productId";
        $runQuery = mysqli_query($conn,$query);
        if($runQuery){
            if(!empty($_FILES['image']['name'])){
                unlink("../uploads/$oldImage");
                move_uploaded_file($imageTmpName, "../../uploads/$newImage");
            }
            // move_uploaded_file($imageTmpName, "../uploads/$newImage");
            $_SESSION['center'] = "center edit successfuly";
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