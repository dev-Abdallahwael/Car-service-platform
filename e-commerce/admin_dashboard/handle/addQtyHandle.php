<?php

session_start();


if(isset($_GET['id'])){
    $productId = $_GET['id'];
    $_SESSION['cart'][$productId]['qty'] +=1;
    header("location:".$_SERVER['HTTP_REFERER']);
    exit();
}else{
    header("location:".$_SERVER['HTTP_REFERER']);
    exit();
}