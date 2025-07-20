<?php


  // session_start();
  require_once 'handle/conn.php';

?>

<?php


if(isset($_SESSION['user_id'])&& isset($_GET['id'])){
  $id = $_GET['id'];
  // echo $id;
  // $query = "SELECT users.name ,centers.* FROM `centers` join users on owner_id = $id ";
  // center query (need to update these queries do not make it two)
  $query = "SELECT * FROM centers where id = $id";
  $runQuery = mysqli_query($conn,$query);
  if (mysqli_num_rows($runQuery)>0) {
    $center  = mysqli_fetch_assoc($runQuery);
    $_SESSION['get_center'] = "center found";
    $ownerId = $center["owner_id"];
  // owner query 
  $queryowner = "SELECT * FROM users where id = $ownerId";
  $runQueryowner = mysqli_query($conn,$queryowner);
  if (mysqli_num_rows($runQueryowner)==1) {
    $owner  = mysqli_fetch_assoc($runQueryowner);
    $_SESSION['get_owner'] = "center found";
  }else{
    $_SESSION['get_owner'] = "center not found";
  }
  }else{
    $_SESSION['get_center'] = "center not found";
  }
  
}else{
  header("location:login.php");
  exit();
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

    <div class="container vh-100 " >
        <h2 class="fw-bold fs-1 mt-5 pt-5"><?php echo $center['c_name']; ?></h2>
        <div class="Carinfo row g-2 pt-3 row-cols-1 row-cols-lg-2">
            <div class="col">
                <h3 class="text-black fw-bold">Center Details:</h3>
                <div class="fs-5 text-secondary">
                    <ul>Location:<a href="<?php echo $center['location']; ?>" class="" target="_blank">
                        <strong><?php echo $center['c_name']; ?></strong>
                    </a></strong></ul>
                    <ul>Service provided : <strong class="text-black"><?php echo $center['service']; ?></strong></ul>
                    <ul><strong>Book a date :</strong>
                    <?php if($center['service'] == "Car wash center"): ?>
                      <a href="appointment_form_Car_Wash.php?id=<?php echo $center['id']?>" class="btn btn-outline-warning fw-bold" id="Edit" style="margin-right: 9rem;" >Book a date</a>
                      <?php elseif($center['service'] == "car maintenance center"): ?>
                        <a href="appointment_form_Car_Maint.php?id=<?php echo $center['id']?>" class="btn btn-outline-warning fw-bold" id="Edit" style="margin-right: 9rem;" >Book a date</a>
                        <?php else:?>
                          <a href="BreakDown_Appointment.php?id=<?php echo $center['id']?>" class="btn btn-outline-warning fw-bold" id="Edit" style="margin-right: 9rem;" >Book a date</a>
                          <?php endif; ?>
                    </ul>
                </div>
                <h3 class="text-black fw-bold">Owner Details:</h3>
                <div class="fs-5 text-secondary">
                    <ul>Name: <strong class="text-black"><?php echo $owner['name']; ?></strong></ul>
                    <ul><i class="fa-solid fa-phone fa-shake fa-lg" style="color: #7a7a7a;"></i> <strong class="text-black"><a href="tel:+201097587504"> <?php echo $center['phone']; ?></a></strong></ul>
                </div>
                               
            </div>
            <div class="col">
                <img src="admin_dashboard/uploads/<?php echo $center['image']; ?>" alt="Center" class="w-100"  >

            </div>
        </div>
        <div>
            <h2 class="fw-bold fs-1 pt-2">Description</h2>
            <p class="fs-5"><?php echo $center['descr']; ?></p>
        </div>
        
    </div>
    <br>
    <br>

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