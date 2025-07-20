<?php

require_once 'handle/conn.php';

$query = "SELECT sell_cars.*, users.name, users.email
FROM sell_cars
INNER JOIN users ON sell_cars.user_id = users.id;
";
$runQuery = mysqli_query($conn,$query);
$cars = [];
if(mysqli_num_rows($runQuery)>0){
  $cars = mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
  $_SESSION['sellCars'] = "cars found";
}else{
  $_SESSION['sellCars'] = "no cars found";
}


echo $_SESSION['sellCars'];



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
    <link rel="stylesheet" href="./CSS/all.min.css" />
    <link rel="stylesheet" href="./CSS/bootstrap.min.css" />
    <link rel="stylesheet" href="./CSS/style.css" />
    <title>CarMedics.</title>
  </head>
  <body>
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
      <h2
      class="fs-1 text-center montserrat very-bold-headers text-capitalize mt-5 pt-5">
      <span class="text-danger">Buy</span> a car.
      </h2>
      
      <div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 g-4 py-5">
      <!-- Car 1 -->
      <?php //echo $_SESSION['rentCars']; ?>
       <?php foreach ($cars as $car) : ?>
        <?php //echo $car['front_image']; ?>
        <div class="col car" id="car" >
             <div class="card h-100 border-0 shadow-lg border-0 px-3 py-2">
              <div class="card-body">
                 <img src="uploads/<?php echo $car['front_image']; ?>" alt="car" class="w-100 m-0">
                 <h5 class="card-title text-uppercase my-3 fs-5 text-capitalize bold-headers text-center text-secondary"> Price : <strong class="text-black"> <?php echo $car['Price']; ?></strong> </h5>
                 <div class="card-text fw-bolder">
                     <ul class="text-body-secondary">
                        owner name : <strong class="text-black"> <?php echo $car['name'];?> </strong> 
                     </ul>
                     <ul class="text-body-secondary">
                         Phone number : <strong class="text-black"> <?php echo $car['user_phone'];?> </strong> 
                     </ul> 
                     <ul class="text-body-secondary">
                         Email : <strong class="text-black"> <?php echo $car['email'];?> </strong> 
                     </ul>                                     
                     <ul class="text-body-secondary">
                         City : 
                             <strong class="text-black"><?php echo $car['city'];?></strong>
                     </ul>
                     <div class="d-flex">
                         <ul class="text-body-secondary">
                             Car Model : <strong class="text-black"> <?php echo $car['car_model'];?></strong> 
                        </ul>                    
                        <ul class="text-body-secondary">
                            Year : 
                                <strong class="text-black"><?php echo $car['year_of_manufacture'];?></strong>
                        </ul>
                     </div>
                     <ul class="text-body-secondary">
                        Mielage : 
                            <strong class="text-black"><?php echo $car['Mielage'];?></strong>
                    </ul>
                    <div class="btns ms-5 py-3">
                    <a href="sellCarView.php?id=<?php echo $car['id']?>" class="btn btn-outline-warning fw-bold" id="Edit" style="margin-right: 9rem;" >view center</a>
                  </div>
                 </div>
             </div>
            </div>
          </div>
          <?php endforeach; ?>
    </div>







    <!-- ============== FOOTER ============== -->
    <footer class="overflow-auto bg-black">
      <div class="container my-4 text-center text-white">
        <p class="small text-secondary p-1 poppins">
          Copy Right 2025 © 
        </p>
      </div>
    </footer>
    <script src="./Js/bootstrap.bundle.min.js"></script> 
  </body>
</html>