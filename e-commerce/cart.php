<?php
session_start();

if(isset($_SESSION['cart'])){
  // var_dump($_SESSION['cart']);
  $cartProducts = $_SESSION['cart'];
}else{
  $cartProducts = [];
}

$totalPrice = 0;
foreach($cartProducts as $id => $product){
  $totalPrice += $product['price'] * $product['qty'];
}

// unset($_SESSION['cart']);

?>

<?php //unset($_SESSION['cart']); ?>


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

    <!-- ============== SERVICES ============== -->

    <section id="services" class="services overflow-auto pt-3 container">
      <div class="container text-center mt-5">
        <h2 class="fs-1 montserrat very-bold-headers text-capitalize">
          Cart.
        </h2>
        <div class="row row-cols-1 row-cols-lg-1 row-cols-md-1 g-3 py-5 justify-content-center">

        
            <!-- Cards -->
          <?php foreach($cartProducts as $id => $product): ?>
    
          <div class="col">
              <div class="border-0 shadow border-0 bg-body-secondary">
                <div class="d-flex justify-content-between">

                    <div class="contentLeft col-lg-4 ">
                        <img src="../uploads/<?php echo $product['image']; ?>" alt="product" class="w-100 img-fluid rounded-start">
                    </div>

                    <div class="contentRight col d-flex text-center align-items-center mb-5 justify-content-around">
                        <h5 class="card-title text-uppercase fs-5 text-capitalize bold-headers"><?php echo $product['name']; ?></h5>
                        <button  class="btn viewbtn  bg-dark-subtle rounded-5 mx-lg-3"><i class="fa-solid fa-eye"></i></button>
                        <h5 class="my-3 fs-5 bold-headers me-lg-4"><?php echo $product['qty']; ?></h5>
                        <a href="admin_dashboard/handle/addQtyHandle.php?id=<?php echo $id?>"> <button  class="btn +btn  bg-dark-subtle rounded-5 me-lg-3"><i class="fa-solid fa-plus"></i></button></a>
                        <a href="admin_dashboard/handle/removeQtyHandle.php?id=<?php echo $id?>"> <button  class="btn -btn  bg-dark-subtle rounded-5 me-lg-3 "><i class="fa-solid fa-minus"></i></button></a>
                        <h5 class="card-title text-uppercase bold-headers me-lg-5"><?php echo $product['price']; ?> LE</h5>
                        <h5 class="card-title text-uppercase bold-headers me-lg-5"><?php echo $product['discount']; ?> %</h5>
                        <a href="admin_dashboard/handle/removeCartProductHandle.php?id=<?php echo $id?>"> <button class="btn btn-danger icodel w-100 h-100"><i class="fa-solid fa-trash py-5" style="color: #ffffff;"></i></button></a>
                    </div>
                </div>
              </div>
          </div>
          <?php endforeach;?>
          

        </div>




        
    </div>
    <!-- ====>Clear btn & Price  -->
     <div class="mb-5 d-flex justify-content-between">
         <div class=" d-flex align-items-center">
             <h5 class=" fw-bold"><span class="text-danger">Total price :</span><?php echo $totalPrice ?> LE</h5>
             <a href="shipping.php"> <button class="btn btn-success ms-3">Continue to payment</button></a>
         </div>
         <a href="admin_dashboard/handle/removeCartPHandle.php"><button class="btn btn-danger">Clear all </button></a>
     </div>
    
      <!--========> On Click msg -->
      <div id="message-del" class="message-del fw-bold border-1 rounded-1"><i class="fa-solid fa-circle-check" style="color: #000000;"></i> The Product is Removed</div>
      <div id="message-box" class="message-box fw-bold border-1 rounded-1"><i class="fa-solid fa-circle-check" style="color: #006605;"></i> The Product is Added</div>
    </section>

    <br>
    <br>
    <br>
    <br>
    <!-- ============== FOOTER ============== -->
    <footer class="overflow-auto bg-black  mt-5 fixed-bottom">
      <div class="container my-4 text-center text-white">
        <p class="small text-secondary p-1 poppins">
          Copy Right 2025 © 
        </p>
      </div>
    </footer>
    <script src="../Js/bootstrap.bundle.min.js"></script> 
    <script src="../Js/ecomm_fav.js"></script>
  </body>
</html>