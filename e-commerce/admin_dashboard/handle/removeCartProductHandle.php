<?php


session_start();


if(isset($_GET['id']) && isset($_SESSION['cart'][$_GET['id']])){
    $productId = $_GET['id'];
    unset($_SESSION['cart'][$productId]);
    header("location:". $_SERVER['HTTP_REFERER']);
    exit();
}else{
    header("location:". $_SERVER['HTTP_REFERER']);
    exit();
}