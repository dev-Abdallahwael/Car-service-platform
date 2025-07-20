<?php

require_once 'conn.php';

if(isset($_POST['submit']) && isset($_GET['id'])){

    $category_id = $_GET['id'];
    $categoryName = trim(htmlspecialchars($_POST['category']));
    $descr = trim(htmlspecialchars($_POST['descr']));
   
    if(empty($categoryName)){
        $error = "here 1";
        $errors +=1;
    }elseif(!is_string($categoryName)){
        $error = "here 11";
        $errors +=1;
    }elseif(is_numeric($categoryName)){
        $error = "here 13";
        $errors +=1;
    }

    if(empty($descr)){
        $error = "here 2";
        $errors +=1;
    }elseif(!is_string($descr)){
        $error = "here 21";
        $errors +=1;
    }elseif(is_numeric($descr)){
        $error = "here 23";
        $errors +=1;
    }elseif(strlen($descr) < 10){
        $error = "here 24";
        $errors +=1;
    }



    if($errors < 1){
        
        $query = "UPDATE categories
        SET
            name = '$categoryName',
            descr = '$descr'
        WHERE id = $category_id";
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
        $_SESSION['category'] = "category added error $error";
        header("location:../AddingCategories.php");
        exit();
    }





}else{
    header("location:../../../login.php");
    exit();
}