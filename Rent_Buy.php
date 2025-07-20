<?php

session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell or Rent </title>
    <meta name="author" content="Abdallah Wael" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet" />
      <link rel="stylesheet" href="./CSS/all.min.css" />
      <link rel="stylesheet" href="./CSS/bootstrap.min.css" />
      <link rel="stylesheet" href="./CSS/style.css" />
    </head>
    <body class="bg-white">
    <!-- ============== NAVBAR ============== -->
    <nav class="navbar fixed-top bg-black navbar-expand-lg">
      <div class="container">
        <a
          class="navbar-brand montserrat fs-5 text-uppercase fw-bolder text-white"
          href="#"
          >Car<span class="text-danger">Medics</span>.</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation">
          <i class="fa-solid fa-bars fa-xl" style="color: #ffffff;"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
            <li class="nav-item fw-medium small position-relative">
              <a
                class="nav-link text-white montserrat text-capitalize pb-0 px-3"
                href="main.php"
                >home</a
              >
            </li>
            <li class="nav-item fw-medium small position-relative">
              <a
                class="nav-link text-white montserrat text-capitalize pb-0 px-3"
                href="#about"
                >about</a
              >
            </li>
            <li class="nav-item fw-medium small position-relative">
              <a
                class="nav-link text-white montserrat text-capitalize pb-0 px-3"
                href="#services"
                >services</a
              >
            </li>
            <li class="nav-item fw-medium small position-relative">
              <a
                class="nav-link text-white montserrat text-capitalize pb-0 px-3"
                href="Profile.php"
                >my profile</a
              >
            </li>
            <li class="nav-item fw-medium small position-relative">
              <a
                class="nav-link text-white montserrat text-capitalize pb-0 px-3"
                href="#contact"
                >contact</a
              >
            </li>
            <?php if(isset($_SESSION['user_id'])): ?>
            <li class="nav-item fw-medium small position-relative">
              <a
                class="nav-link text-white montserrat text-capitalize pb-0 px-3"
                href="handle/logoutHandle.php"
                >logout</a
              >
            </li>
            <?php else:?>
              <li class="nav-item fw-medium small position-relative">
              <a
                class="nav-link text-white montserrat text-capitalize pb-0 px-3"
                href="login.php"
                >login</a
              >
            </li>
            <?php endif;?>
          </ul>
        </div>
      </div>
    </nav>       
      <div class="container"> 
          <div class=" mt-5 py-5">
              <div class="row row-cols-1 row-cols-lg-3 g-5 ">
                <div class="col ">
                    <div class="d-flex justify-content-center pt-lg-5 mt-lg-5 mt-sm-0">
                        <h1 class="viewcarsHeader bold-headers ">Sell or Rent <span class="text-danger">Cars</span></h1>
                    </div>
                    <p class="fs-5"><strong>Sell</strong> or<strong> Rent</strong>  your car. It is easy and fast with Car <span class="text-danger">Medics</span></p>
                    <div class="viewbtns d-flex mt-5 mx-1">
                        <a href="viewcars_RENT.php"><button class="btn Rent border-black me-1">Rent a car</button></a>
                        <a href="viewcars_SELL.php"><button class="btn Sell border-black">Buy a car</button></a>
                      </div>
                      <p class="text-black fw-bold pt-3">Are you looking for specific specifications ? </p>
                      <a href="http://127.0.0.1:5000/"><button class="btn btn-outline-danger">Click here</button></a>
                </div>
                <div class="col">
                    <img src="./imgs/view.png" alt="viewcars">
                </div>
              </div>
          </div>
          
</div>
    <script src="./Js/bootstrap.bundle.min.js"></script> 
</body>
</html>
