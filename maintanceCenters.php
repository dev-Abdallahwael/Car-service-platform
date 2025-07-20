
<?php

require_once 'handle/conn.php';


  $id = $_SESSION['user_id'];
  // echo $id;
  // $query = "SELECT users.name ,centers.* FROM `centers` join users on owner_id = $id ";
  $query = "SELECT * FROM centers where service = 'car maintenance center' ";
  $runQuery = mysqli_query($conn,$query);
  if (mysqli_num_rows($runQuery)>0) {
    $centers  = mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
    $_SESSION['get_center'] = "center found";
  }else{
    $_SESSION['get_center'] = "center not found";
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

     <!-- ============== Centers ============== -->
     <section id="Centers" class="Centers overflow-auto bg-body-secondary">
        <div class="container my-5 py-5">
          <h2
            class="fs-1 text-center montserrat very-bold-headers text-capitalize mb-5">
            View the car wash centers
          </h2>
    <div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 g-4 pb-5">
    <!-- ============== Center 1================ -->
     <?php foreach($centers as $center): ?>
        <div class="col" id="CarMaintCenter" >
            <div class="card h-100 border-0 shadow-lg border-0 px-3 py-2">
             <div class="card-body">
                <img src="admin_dashboard/uploads/<?php echo $center['image']; ?>" alt="car maintenance" class="w-100 m-0">
                <h5 class="card-title text-uppercase my-3 fs-5 text-capitalize bold-headers text-center">Center Name</h5>
                <div class="card-text fw-bolder">
                    <ul class="text-body-secondary">
                        Center owner : <strong class="text-black"> <?php echo $center['c_name']; ?> </strong> 
                    </ul>
                    <ul class="text-body-secondary">
                        Phone number : <strong class="text-black"> <?php echo $center['phone']; ?> </strong> 
                    </ul> 
                    <ul class="text-body-secondary">
                        Service : <strong class="text-black"> <?php echo $center['service']; ?> </strong> 
                    </ul>                    
                    <ul class="text-body-secondary">
                        Description : <strong class="text-black"> <?php echo $center['descr']; ?> </strong> 
                    </ul>                    
                    <ul class="text-body-secondary">
                        Location URL: 
                        <a href="<?php echo $center['location']; ?>" class="" target="_blank">
                            <strong><?php echo $center['c_name']; ?></strong>
                        </a>
                    </ul>
                    <div class="btns ms-5 py-3">
                        <a href="centerView.php?id=<?php echo $center['id']?>" class="btn btn-outline-warning fw-bold" id="Edit" style="margin-right: 9rem;" >view center</a>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <?php endforeach;?>
    <!-- ============== Center 2================ -->
        
      </section>
    <!-- ============== CONTACT ============== -->
    <section id="contact" class="contact overflow-auto">
      <div class="container my-5 py-5">
        <h2
          class="fs-1 text-center montserrat very-bold-headers text-capitalize mb-5">
          Contact Us.
          <div class="dotted-bg position-absolute"></div>
        </h2>
        <div class="row">
          <div class="text-center mb-4 col-lg-4 col-md-6">
            <i
              class="fa-solid fa-location-arrow rounded-pill t-duration fs-4"></i>
            <h4 class="fs-6 montserrat fw-bold mt-2">Address</h4>
            <p class="text-secondary poppins">
              6834 Hollywood Blvd - Los Angeles CA
            </p>
          </div>

          <div class="text-center mb-4 col-lg-4 col-md-6">
            <i class="fa-solid fa-envelope rounded-pill t-duration fs-4"></i>
            <h4 class="fs-6 montserrat fw-bold mt-2">Email</h4>
            <p class="text-secondary poppins">Support@website.com</p>
          </div>

          <div class="text-center mb-4 col-lg-4 col-md-6">
            <i class="fa-solid fa-phone rounded-pill t-duration fs-4"></i>
            <h4 class="fs-6 montserrat fw-bold mt-2">Phone</h4>
            <p class="text-secondary poppins">+20 010 2517 8918</p>
          </div>
        </div>

        <form method="post" class="mt-5">
          <div class="row gap-2">
            <div class="col-lg mt-2">
              <input
                id="name"
                type="text"
                name="name"
                class="w-100 bg-body-secondary border-0 rounded-1 p-2"
                placeholder="Name" />
            </div>
            <div class="col-lg mt-2">
              <input
                type="email"
                name="email"
                class="w-100 bg-body-secondary border-0 rounded-1 p-2"
                placeholder="Email" />
            </div>
            <div class="col-12 mt-2">
              <textarea
                name="msg"
                id="msg"
                rows="7"
                class="w-100 bg-body-secondary border-0 rounded-1 p-2"
                placeholder="Message"></textarea>
            </div>
            <div class="col-2">
              <button
                class="btn border border-1 border-black t-duration poppins">
                Submit
              </button>
            </div>
          </div>
        </form>
      </div>
    </section>

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