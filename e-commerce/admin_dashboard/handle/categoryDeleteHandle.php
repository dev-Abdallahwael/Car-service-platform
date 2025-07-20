<?php

require_once 'conn.php';

if(isset($_GET['id'])){


    $id = $_GET['id'];
    $queryCheck = "select id from categories where id = $id";
    $runQueryCheck = mysqli_query($conn,$queryCheck);
    if(mysqli_num_rows($runQueryCheck)>0){
        $queryDelete = "DELETE FROM categories WHERE id = $id";
        $runQueryDelete = mysqli_query($conn,$queryDelete);
        if($runQueryDelete){
            $_SESSION['delete'] = "categories deleted successfuly";
            header("location:../categories.php");
            exit();
        }else{
            $_SESSION['delete'] = "categories deleted failed";
            header("location:../categories.php");
            exit();
        }
    }else{
        $_SESSION['categoriesD'] = "categories not found";
        header("location:../categories.php");
        exit();
    }

}else{
    $_SESSION['categoriesD'] = "categories error";
    header("location:../categories.php");
    exit();
}