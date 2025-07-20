<?php

require_once "handle/conn.php";

if(isset($_SESSION['user_id'])){

  $userId = $_SESSION['user_id'];
  $query = "Select * from users where id = $userId";
  $runQuery = mysqli_query($conn,$query);
  if (mysqli_num_rows($runQuery) == 1) {
      $userInfo =  mysqli_fetch_assoc($runQuery);
  }else{
    $_SESSION['profile'] = "user not found";
  }


}else{
  header("location:main.php");
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
                href="main.html"
                >home</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="appointment-form mt-5 pt-5 container">
        <h2
        class="fs-1 text-center montserrat very-bold-headers text-capitalize mb-5">
        <i class="fa-solid fa-user fa-lg pe-2" style="color: #000000;"></i>My profile
        </h2>
    <form id="appointmentForm">
            <div class="row">   
                <div class="secLeft col-12 col-lg-6 ">

                <div class="form-group">
                        <label for="name">First Name</label>
                        <input type="text" id="name" name="name" value="<?php echo $userInfo['name'] ?>" readonly class="form-control  border-black">
                </div>

                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="text" id="Email" name="Email" value="<?php echo $userInfo['email'] ?>" readonly class="form-control  border-black">
                </div>

               
                </div>

                <!-- =====>Buttons -->
                <div class="form-group d-flex justify-content-evenly py-5">
                    <!-- From Uiverse.io by adamgiebl -->
                     
                    <a href="handle/logoutHandle.php" class="btn btn-primary">Logout</a>                    </a>                   
                    <!-- From Uiverse.io by adamgiebl --> 
                    <button class="btncarinfo fw-bold"> 
                      <a href="editProfile.php"> edit my profile </a>
                      </button>
                </div>
            </div>                  
    </form>    
    </div>

    <script src="./Js/bootstrap.bundle.min.js"></script> 
  </body>
</html>