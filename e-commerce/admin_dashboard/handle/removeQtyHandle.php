<?php

session_start();


if(isset($_GET['id'])){
    $productId = $_GET['id'];
    if($_SESSION['cart'][$productId]['qty'] > 1){
        $_SESSION['cart'][$productId]['qty'] -=1;
    }else{
        unset( $_SESSION['cart'][$productId]);
    }
    header("location:".$_SERVER['HTTP_REFERER']);
    exit();
}else{
    header("location:".$_SERVER['HTTP_REFERER']);
    exit();
}