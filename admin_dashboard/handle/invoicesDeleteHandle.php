<?php

require_once 'conn.php';

if(isset($_GET['id'])){


    $id = $_GET['id'];
    $queryCheck = "select id from invoices where id = '$id'";
    $runQueryCheck = mysqli_query($conn,$queryCheck);
    if(mysqli_num_rows($runQueryCheck)>0){
        $queryDelete = "DELETE FROM invoices WHERE id = '$id'";
        $runQueryDelete = mysqli_query($conn,$queryDelete);
        if($runQueryDelete){
            $_SESSION['delete'] = "invoices deleted successfuly";
            header("location:../adminInvoices.php");
            exit();
        }else{
            $_SESSION['delete'] = "invoices deleted failed";
            header("location:../adminInvoices.php");
            exit();
        }
    }else{
        $_SESSION['invoicesD'] = "invoices not found";
        header("location:../adminInvoices.php");
        exit();
    }

}else{
    $_SESSION['invoicesD'] = "invoices error";
    header("location:../adminInvoices.php");
    exit();
}