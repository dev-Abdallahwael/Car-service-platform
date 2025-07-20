<?php

require_once 'conn.php';

if(isset($_GET['id'])){
    $productId = $_GET['id'];
    $userId = $_SESSION['user_id'];
    $qty = 1;
    $query = "SELECT * from products where id = $productId";
    $runQuery = mysqli_query($conn,$query);
    if(mysqli_num_rows($runQuery) == 1){
        $product = mysqli_fetch_assoc($runQuery);
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = [
                "$productId" => [
                    "name" => $product['name'],
                    "image" => $product['image'],
                    "price" => $product['price'],
                    "discount" => $product['discount'],
                    "qty" => $qty,
                ]
            ];
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }else{
            if(isset($_SESSION['cart'][$productId])){
                $_SESSION['cart'][$productId]['qty'] += $qty;
            }else{
                $_SESSION['cart'][$productId] = [
                    "name" => $product['name'],
                    "image" => $product['image'],
                    "price" => $product['price'],
                    "discount" => $product['discount'],
                    "qty" => $qty,
                    ];
            }
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();       
        }
        
    }
    

}