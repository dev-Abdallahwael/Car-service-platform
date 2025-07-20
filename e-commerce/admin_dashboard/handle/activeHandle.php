<?php



require_once 'conn.php';

if(isset($_GET['id']) && $_SESSION['user_id']){

    $productId = $_GET['id'];

    $query = "SELECT status from products where id = $productId";
    $runQuery = mysqli_query($conn,$query);
    if(mysqli_num_rows($runQuery)==1){
        $product = mysqli_fetch_assoc($runQuery);
        if($product['status'] == "active"){
            $queryEdit = "UPDATE products set status = 'inactive' where id = $productId";
            $runQueryEdit = mysqli_query($conn,$queryEdit);
            if($runQueryEdit){
                $_SESSION['activeE'] = "active edit succes";
                header("../products.php");
                exit();
            }else{
                $_SESSION['activeE'] = "active edit failed";
                header( "location:../products.php");
                exit();
            }
        }else{
            $queryEdit = "UPDATE products set status = 'active' where id = $productId";
            $runQueryEdit = mysqli_query($conn,$queryEdit);
            if($runQueryEdit){
                $_SESSION['activeE'] = "active edit succes";
                header( "location:../products.php");
                exit();
            }else{
                $_SESSION['activeE'] = "active edit failed";
                header( "location:../products.php");
                exit();
            }
        }
    }else{
        $_SESSION['activeE'] = "active select failed";
        header( "location:../products.php");
        exit();
    }

}