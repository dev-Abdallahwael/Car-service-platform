<?php


session_start();



if(isset($_SESSION['cart'])){
    unset($_SESSION['cart']);
    header("location:". $_SERVER['HTTP_REFERER']);
    exit();
}else{
    header("location:". $_SERVER['HTTP_REFERER']);
    exit();
}