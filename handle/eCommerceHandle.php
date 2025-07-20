<?php

require_once 'conn.php';


if(isset($_SESSION['user_id'])){
    $userId = $_SESSION['user_id'];
    $query = "select status from users where id = $userId";
    $runQuery = mysqli_query($conn,$query);
    if(mysqli_num_rows($runQuery) == 1){
        $user = mysqli_fetch_assoc($runQuery);
    }else{
        header("location:../login.php");
        exit();
    }
    $userRole = $user['status'];
    if($userRole == "admin"){
        $_SESSION['role'] = $userRole;
        header("location:../e-commerce/admin_dashboard/mainOwner.php");
        exit();
    }else{
        $_SESSION['role'] = $userRole;
        header("location:../e-commerce/e_Main.php");
        exit();
    }
}