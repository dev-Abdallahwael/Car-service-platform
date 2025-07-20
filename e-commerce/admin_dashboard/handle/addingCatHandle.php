<?php

require_once 'conn.php';

if(isset($_POST['submit'])){

    $categoryName = trim(htmlspecialchars($_POST['category']));
    $descr = trim(htmlspecialchars($_POST['descr']));

    $errors = 0;
    $queryCheck = "Select name from categories";
    $runQueryCheck = mysqli_query($conn,$queryCheck);
    if($runQueryCheck){
        $errors +=1;
        $error = "this category already exists";
    }
    
    if(empty($categoryName)){
        $error = "category name is required";
        $errors +=1;
    }elseif(!is_string($categoryName)){
        $error = "category name must be string";
        $errors +=1;
    }elseif(is_numeric($categoryName)){
        $error = "category name must be string";
        $errors +=1;
    }

    if(empty($descr)){
        $error = "description is required";
        $errors +=1;
    }elseif(!is_string($descr)){
        $error = "description name must be string";
        $errors +=1;
    }elseif(is_numeric($descr)){
        $error = "description name must be string";
        $errors +=1;
    }elseif(strlen($descr) < 10){
        $error = "description name must be longer";
        $errors +=1;
    }



    if($errors < 1){
        $query = "INSERT INTO categories(`name`,`descr`)
        VALUES('$categoryName','$descr')";
        $runQuery = mysqli_query($conn,$query);
        if($runQuery){
            $_SESSION['category'] = "category added successfuly";
            header("location:../categories.php");
            exit();
        }else{
            $_SESSION['category'] = "category added failed";
            header("location:../AddingCategories.php");
            exit();
        }

    }else{
        $_SESSION['category'] = "$error";
        header("location:../AddingCategories.php");
        exit();
    }





}else{
    header("location:../../../login.php");
    exit();
}