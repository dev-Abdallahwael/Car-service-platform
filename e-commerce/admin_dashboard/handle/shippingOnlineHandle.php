<?php

require_once 'conn.php';

if(isset($_POST['submit'])){
    $errors = 0;
    $userId = $_SESSION['user_id'];
    $city = trim(htmlspecialchars($_POST['city']));
    $address = trim(htmlspecialchars($_POST['address']));
    $details = trim(htmlspecialchars($_POST['details']));

    if(empty($city)){
        $error = "here 1";
        $errors +=1;
    }elseif(!is_string($city)){
        $error = "here 11";
        $errors +=1;
    }elseif(is_numeric($city)){
        $error = "here 13";
        $errors +=1;
    }

    if(empty($address)){
        $error = "here 2";
        $errors +=1;
    }elseif(!preg_match('/^[a-zA-Z0-9\s,-]+$/', $address)){
        $error = "here 21";
        $errors +=1;
    }

    if(!is_string($details)){
        $error = "here 31";
        $errors +=1;
    }elseif(is_numeric($details)){
        $error = "here 33";
        $errors +=1;
    }

    if(!isset($_SESSION['cart'])){
        $error = "here 43";
        $errors +=1;
    }
    $_SESSION['order'] = "order yet";
    $cartProducts = [];
    if($errors < 1){
        $_SESSION['order'] = "order error successfuly";
        $cartProducts = $_SESSION['cart'];
        $query = "INSERT INTO orders(`city`,`address`,`details`,`payment`,`user_id`)
        VALUES('$city','$address','$details','online','$userId')";
        $runQuery = mysqli_query($conn,$query);
        if($runQuery){
            $_SESSION['order'] = "order run successfuly";
            $querySelect = "SELECT id FROM orders where user_id = $userId ORDER BY id DESC LIMIT 1";
            $runQuerySelect = mysqli_query($conn,$querySelect);
            if($runQuerySelect){
                $_SESSION['order'] = "order select successfuly";
                $order = mysqli_fetch_assoc($runQuerySelect);
                foreach($cartProducts as $p_id => $product){
                    $queryAdd = "INSERT INTO orderdetails (`product_id`, `price`, `qty`, `discount`, `order_id`) 
                    VALUES ('$p_id', '{$product['price']}', '{$product['qty']}', '{$product['discount']}', '{$order['id']}')";
                    $runQueryAdd = mysqli_query($conn,$queryAdd);
            }
            if($runQueryAdd){
                unset($_SESSION['cart']);
                $_SESSION['order'] = "order made successfuly";
                header("location:../../e_Main.php");
                exit();
            }else{
                $_SESSION['order'] = "order made failed";
                header("location:../../cart.php");
                exit();
            }
            
        }else{
            $_SESSION['order'] = "order select failed";
            header("location:../../cart.php");
            exit();
        }
    }else{
        $_SESSION['order'] = "order run failed";
        header("location:../../cart.php");
        exit();
    }



}else{
    $_SESSION['order'] = "center added error $error";
    header("location:../../cart.php");
    exit();
}
}else{
    header("location:../../shipping.php");
    exit();
}