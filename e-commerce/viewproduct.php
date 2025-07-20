<?php


require_once 'admin_dashboard/handle/conn.php';

if(isset($_GET['id'])){
  $productId = $_GET['id'];
  $product = [];
  $query = "SELECT * from products where id = $productId ";
  $runQuery = mysqli_query($conn,$query);
  if(mysqli_num_rows($runQuery)){
    $product = mysqli_fetch_assoc($runQuery);
    $_SESSION['product1'] = "product found";
  }else{
    $_SESSION['product1'] = "product not found";
  }
}



?>







<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="keywords"/>
    <meta name="author" content="Abdallah Wael" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet" />
    <link rel="stylesheet" href="../CSS/all.min.css" />
    <link rel="stylesheet" href="../CSS/bootstrap.min.css" />
    <link rel="stylesheet" href="../CSS/style.css" />
    <title>CarMedics.</title>
  </head>
  <body>
    <!-- ============== NAVBAR ============== -->
    <?php require_once "navbar.php"; ?>


    <div class="container vh-100" >
        <h2 class="fw-bold fs-1 mt-5 pt-5"><?php echo $product['name'] ?></h2>
        <div class="Carinfo row g-5 pt-3 row-cols-1 row-cols-lg-2">
            
            <div class="col">
                <img src="../uploads/<?php echo $product['image'] ?>" alt="Center" class="w-100"  >

            </div>

            <div class="col">
                <h2 class="fw-bold fs-1 pt-2">Description</h2>
                <p class="fs-5"><?php echo $product['descr']?></p>
                <div class="d-flex pt-3 justify-content-between">
                    <h5 class="fw-bold"><?php echo $product['price']?> LE</h5>
                    <p>
                        <div class="rating">
                          <input type="radio" id="star5" name="rating" value="5" />
                          <label for="star5"></label>
                          <input type="radio" id="star4" name="rating" value="4" />
                          <label for="star4"></label>
                          <input type="radio" id="star3" name="rating" value="3" />
                          <label for="star3"></label>
                          <input type="radio" id="star2" name="rating" value="2" />
                          <label for="star2"></label>
                          <input type="radio" id="star1" name="rating" value="1" />
                          <label for="star1"></label>
                        </div>
                        </p>
                </div>
                <a href="admin_dashboard/handle/addToCartHandle.php?id=<?php echo $product['id'] ?>"> <button class="btn icobtn text-white btn-success mt-5 w-100"><i class="fa-solid fa-cart-shopping pe-2"></i>Add to cart </button></a>
            </div>
            <div id="message-box" class="message-box fw-bold border-1 rounded-1"><i class="fa-solid fa-circle-check" style="color: #006605;"></i> The Product is Added</div>



        </div>
    </div>
    <script src="../Js/bootstrap.bundle.min.js"></script> 
    <script src="../Js/ecomm_fav.js"></script>

  </body>
</html>