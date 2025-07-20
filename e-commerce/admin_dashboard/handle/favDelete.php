<?php



require_once 'conn.php';


if(isset($_GET['id'])){
    $favId = $_GET['id'];
    $query = "SELECT * from favorites where f_id = $favId";
    $runQuery = mysqli_query($conn,$query);
    if(mysqli_num_rows($runQuery) == 1){
        $fav = mysqli_fetch_assoc($runQuery);
        $queryDelete = "DELETE from favorites where f_id = $favId";
        $runQueryDelete = mysqli_query($conn,$queryDelete);
        if($runQueryDelete){
            $_SESSION['delete'] = "fav removed";
            header("location:../../fav.php");
            exit();
        }
    }
}