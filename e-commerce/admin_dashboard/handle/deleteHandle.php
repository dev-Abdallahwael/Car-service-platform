<?php

require_once 'conn.php';

if(isset($_GET['id'])){


    $id = $_GET['id'];
    $queryCheck = "select id from centers where id = '$id'";
    $runQueryCheck = mysqli_query($conn,$queryCheck);
    if(mysqli_num_rows($runQueryCheck)>0){
        $queryDelete = "DELETE FROM centers WHERE id = '$id'";
        $runQueryDelete = mysqli_query($conn,$queryDelete);
        if($runQueryDelete){
            $_SESSION['delete'] = "center deleted successfuly";
            header("location:../AddingCenter.php");
            exit();
        }else{
            $_SESSION['delete'] = "center deleted failed";
            header("location:../AddingCenter.php");
            exit();
        }
    }else{
        $_SESSION['centerD'] = "center not found";
        header("location:../AddingCenter.php");
        exit();
    }

}else{
    $_SESSION['centerD'] = "center error";
    header("location:../AddingCenter.php");
    exit();
}