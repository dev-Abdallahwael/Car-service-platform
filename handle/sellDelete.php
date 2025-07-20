<?php

require_once 'conn.php';

if(isset($_GET['id'])){
    $carId = $_GET['id'];
    $query = "DELETE FROM sell_cars WHERE id = $carId";
    $runQuery = mysqli_query($conn,$query);
    if($runQuery){
        $_SESSION['deleteR'] = "car deleted";
        header("location:../Sell_Car.php");
        exit();
    }else{
        $_SESSION['deleteR'] = "car deleted error1";
        header("location:../Sell_Car.php");
        exit();
    }

}else{
    $_SESSION['deleteR'] = "car deleted error2";
    header("location:../Sell_Car.php");
    exit();
}