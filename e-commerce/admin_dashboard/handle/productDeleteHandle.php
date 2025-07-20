<?php

require_once 'conn.php';

if(isset($_GET['id'])){


    $id = $_GET['id'];
    $queryCheck = "select id from products where id = '$id'";
    $runQueryCheck = mysqli_query($conn,$queryCheck);
    if(mysqli_num_rows($runQueryCheck)>0){
        $queryDelete = "DELETE FROM products WHERE id = $id";
        $runQueryDelete = mysqli_query($conn,$queryDelete);
        if($runQueryDelete){
            $_SESSION['delete'] = "products deleted successfuly";
            header("location:../products.php");
            exit();
        }else{
            $_SESSION['delete'] = "products deleted failed";
            header("location:../products.php");
            exit();
        }
    }else{
        $_SESSION['productsD'] = "products not found";
        header("location:../products.php");
        exit();
    }

}else{
    $_SESSION['productsD'] = "products error";
    header("location:../products.php");
    exit();
}