<?php

require_once 'conn.php';

if(isset($_SESSION['user_id'])){

    $userId = $_SESSION['user_id'];
    $query = "SELECT vip from users where id = $userId";
    $runQuery = mysqli_query($conn,$query);
    if(mysqli_num_rows($runQuery) == 1){
        $user = mysqli_fetch_assoc($runQuery);
        if($user['vip'] == "vip"){
            header("location:../ViewBreakdown_centers.php");
            exit();
        }else{
            header("location:../Breakdown_packs.php");
            exit();
        }
    }else{
        header("location:../login.php");
        exit();
    }

}else{
    header("location:../login.php");
    exit();
}