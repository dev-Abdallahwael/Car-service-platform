<?php

require_once 'conn.php';

if(isset($_POST['submit'])){
    $errors = 0;

    $id = $_GET['id'];
    $querySelect = "select image from centers where id = '$id'";
    $runQuerySelect = mysqli_query($conn,$querySelect);
    if(mysqli_num_rows($runQuerySelect)){
        $center = mysqli_fetch_assoc($runQuerySelect);
        $oldImage = $center['image'];
        $_SESSION['image'] = $oldImage;
    }else{
        $error = "here 0";
        $errors +=1;
    }

    $centerName = trim(htmlspecialchars($_POST['center']));
    $ownerName = trim(htmlspecialchars($_POST['owName']));
    $service = trim(htmlspecialchars($_POST['service']));
    $phone = trim(htmlspecialchars($_POST['phone']));
    $descr = trim(htmlspecialchars($_POST['descr']));
    $location = trim(htmlspecialchars($_POST['location']));
    $owner_id = $_SESSION['user_id'];
    $errors = 0;
    $error = "";
    if(empty($centerName)){
        $error = "here 1";
        $errors +=1;
    }elseif(!is_string($centerName)){
        $error = "here 11";
        $errors +=1;
    }elseif(is_numeric($centerName)){
        $error = "here 13";
        $errors +=1;
    }elseif(strlen($centerName) < 5){
        $error = "here 14";
        $errors +=1;
    }

    if(empty($service)){
        $error = "here 2";
        $errors +=1;
    }elseif(!is_string($service)){
        $error = "here 21";
        $errors +=1;
    }elseif(is_numeric($service)){
        $error = "here 24";
        $errors +=1;
    }


    if(empty($phone)){
        $error = "here 3";
        $errors +=1;
    }elseif(!preg_match('/^\+?[0-9]{7,15}$/', $phone)){
        $error = "here 32";
        $errors +=1;
    }elseif(strlen($phone) < 11){
        $error = "here 33";
        $errors +=1;
    }

    if(empty($descr)){
        $error = "here 4";
        $errors +=1;
    }elseif(!is_string($descr)){
        $error = "here 41";
        $errors +=1;
    }elseif(is_numeric($descr)){
        $error = "here 43";
        $errors +=1;
    }elseif(strlen($descr) < 20){
        $error = "here 44";
        $errors +=1;
    }

    if(empty($location)){
        $error = "here 5";
        $errors +=1;
    }elseif(!filter_var($location,FILTER_VALIDATE_URL)){
        $error = "here 51";
        $errors +=1;
    }

    if(!empty($_FILES['image']['name'])){
        $image = $_FILES['image'];
        $imageName = $image['name'];
        $imageTmpName = $image['tmp_name'];
        $imageError = $image['error'];
        $imageExt = pathinfo($imageName,PATHINFO_EXTENSION);
        $imageExt = strtolower($imageExt);
        $ext = ['png','jpg','jpeg'];
        if($imageError != 0){
            $error = "here 6";
            $errors +=1;
        }elseif (!getimagesize($imageTmpName)) {
            $error = "here 61";
            $errors +=1;
        }elseif(!in_array($imageExt,$ext)){
            $error = "here 62";
            $errors +=1;
        }else{
            $newImage = uniqid() . ".$imageExt";
        }
    }else{
        $newImage = $oldImage;
    }
    


    if($errors < 1){
        $query = "UPDATE centers
SET
    c_name = '$centerName',
    service = '$service',
    phone = '$phone',
    descr = '$descr',
    location = '$location',
    image = '$newImage',
    owner_id = '$owner_id'
WHERE id = '$id'";
        $runQuery = mysqli_query($conn,$query);
        if($runQuery){
            if(!empty($_FILES['image']['name'])){
                unlink("../uploads/$oldImage");
                move_uploaded_file($imageTmpName, "../uploads/$newImage");
            }
            // move_uploaded_file($imageTmpName, "../uploads/$newImage");
            $_SESSION['center'] = "center edit successfuly";
            header("location:../AddingCenter.php");
            exit();
        }else{
            $_SESSION['center'] = "center added failed";
            header("location:../editCenter.php?id=$id");
            exit();
        }

    }else{
        $_SESSION['center'] = "center added error $error";
        header("location:../editCenter.php?id=$id");
        exit();
    }





}else{
    header("location:../AddingCenter.php");
    exit();
}