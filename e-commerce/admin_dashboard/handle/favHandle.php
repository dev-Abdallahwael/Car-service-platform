<?php

require_once 'conn.php';


if(isset($_GET['id'])){
    $product_id = $_GET['id'];
    $userId = $_SESSION['user_id'];
    $query = "SELECT * from favorites where product_id = $product_id";
    $runQuery = mysqli_query($conn,$query);
    if(mysqli_num_rows($runQuery) == 1){
        $fav = mysqli_fetch_assoc($runQuery);
        $favId = $fav['f_id'];
        $queryDelete = "DELETE from favorites where f_id = $favId";
        $runQueryDelete = mysqli_query($conn,$queryDelete);
        if($runQueryDelete){
            $_SESSION['delete'] = "fav removed";
            header("location:../../e_Main.php");
            exit();
        }else{
            $_SESSION['delete'] = "fav remove failed";
            header("location:../../e_Main.php");
            exit();
        }
    }else{
        $queryAdd = "INSERT into favorites(`user_id`,`product_id`)VALUES('$userId','$product_id')";
        $runQueryAdd = mysqli_query($conn,$queryAdd);
        if($queryAdd){
            $_SESSION['add'] = "fav added";
            header("location:../../e_Main.php");
            exit();
        }else{
            $_SESSION['add'] = "fav add failed";
            header("location:../../e_Main.php");
            exit();
        }
    }


}else{
    header("location:../../e_Main.php");
}