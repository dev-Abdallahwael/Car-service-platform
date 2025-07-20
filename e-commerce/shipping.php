<?php
session_start();


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


    <!-- ============== SERVICES ============== -->
    <section id="services" class="services bg-body-tertiary overflow-auto pt-3">
      <div class="container text-center my-5">
        <h2 class="fs-1 montserrat very-bold-headers text-capitalize">
          Shipping Address.
        </h2>
     
        <form action="admin_dashboard/handle/shippingHandle.php" method="post" class="py-5">
            <input type="text" class="form-control w-100 mb-3" placeholder="City" name="city">
            <input type="text" class="form-control w-100 mb-3" name="address" placeholder="Street and Appartment">
            <textarea name="details" id="" placeholder="Details " class="w-100 mb-3"></textarea>
            <button type="submit" name="submit" class="btn icobtn btn-primary text-white">Cash order</button>
        </form>

      <!-- ====>Clear btn & Price  -->
     <div class=" d-flex justify-content-between">
      <div class=" d-flex align-items-center">
        <a href="onlinepay.php"> <button class="btn btn-success ms-3">Online payment</button></a>
      </div>
  </div>
  <h4 class=""><?php 
    
          if(isset($_SESSION['order'])){
            echo $_SESSION['order'];
          }
           
           ?></h4>
</div>


   </section> 
<!--========> On Click msg -->
    <div id="message-box" class="message-box fw-bold border-1 rounded-1"><i class="fa-solid fa-circle-check" style="color: #006605;"></i> Order Placed </div>
    <!-- ============== FOOTER ============== -->
     <br>
     <br>
     <br>
     <br>
    <footer class="overflow-auto bg-black fixed-bottom">
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