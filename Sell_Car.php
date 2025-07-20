<?php

require_once 'handle/conn.php';

if(isset($_SESSION['user_id'])){


    $userId = $_SESSION['user_id'];
    $cars = [];
    $query = $query = "SELECT sell_cars.*, users.name, users.email
    FROM sell_cars
    INNER JOIN users ON sell_cars.user_id = users.id
    WHERE sell_cars.user_id = $userId";
    $runQuery = mysqli_query($conn,$query);
    if(mysqli_num_rows($runQuery)){
        $cars = mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
        $_SESSION['rentCarsUser'] = "cars found";
    }else{
        $_SESSION['rentCarsUser'] = "no cars found";
    }

}else{
    header("location:login.php");
    exit();
}




?>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Car</title>
    <meta name="author" content="Abdallah Wael" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet" />
      <link rel="stylesheet" href="./CSS/all.min.css" />
      <link rel="stylesheet" href="./CSS/bootstrap.min.css" />
      <link rel="stylesheet" href="./CSS/style.css" />
      <!-- jsPDF Library -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    </head>
    <body class="bg-body-secondary">
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
        <div class="appointment-form mt-5 pt-5 container">
            <h2
            class="fs-1 text-center montserrat very-bold-headers text-capitalize mb-5">
            <span class="text-danger">Sell </span>your car.
            </h2>
            <h2>
                <?php

                    if(isset($_SESSION['sellCar'])){
                        echo $_SESSION['sellCar'];
                    }


                ?>
            </h2>
        <form id="appointmentForm" action="handle/sellHandle.php" method="post" enctype="multipart/form-data">
                <div class="row">   
                    <div class="secLeft col-12 col-lg-6 ">
                    <div class="form-group">
                        <h2 class="fw-bold">Personal information</h2>

                        <!-- NAME -->
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name" class="form-control" oninput="validate(this, nameRegex)" required>
                            <div class="error d-none text-danger">
                                Name must start with Capital letter followed by 3 letters or more
                            </div>
                    </div>
                    <div class="form-group">

                        <!-- EMAIL -->
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control"  oninput="validate(this, EmailRegex)"  required>
                        <div class="error d-none text-danger">
                            Please Enter correct Email address 
                        </div>
                    </div>
                    <div class="form-group">

                        <!-- PHONE NO -->
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" maxlength="11" class="form-control"  oninput="validate(this, PhoneNum)"  required>
                        <div class="error d-none text-danger">
                            Please Enter a correct phone number 
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- CITY -->
                        <label for="city">City</label>
                        <input type="text" id="date" name="city" class="form-control" required>
                    </div>
                    
                    <!-- 4 IMG UPLOAD -->
                     <div class="2imgs d-flex">
                         <div class="">
                             <label for="IMG">car photo <strong>Front</strong></label>
                             <input
                             type="file"
                             name="imgOne"
                             class="form-control w-100
                             id="imageInput"
                             accept="image/*"
                             />
                             <div id="imgSrcContainer" class="d-none">
                             <i class="fa-solid fa-link"></i>
                             <span id="imgSrc"></span>
                             </div>
                         </div>
                         <!-- IMG UPLOAD -->
                         <div class="">
                             <label for="IMG">car photo <strong>Side</strong></label>
                             <input
                             type="file"
                             name="imgTwo"
                             class="form-control w-100
                             id="imageInput"
                             accept="image/*"
                             />
                             <div id="imgSrcContainer" class="d-none">
                             <i class="fa-solid fa-link"></i>
                             <span id="imgSrc"></span>
                             </div>
                         </div>                    
                     </div>
                     <div class="2imgs d-flex">
                         <!-- IMG UPLOAD -->
                         <div class="">
                             <label for="IMG">car photos <strong>Back</strong></label>
                             <input
                             type="file"
                             name="imgThree"
                             class="form-control w-100
                             id="imageInput"
                             accept="image/*"
                             />
                             <div id="imgSrcContainer" class="d-none">
                             <i class="fa-solid fa-link"></i>
                             <span id="imgSrc"></span>
                             </div>
                         </div>                    
                         <!-- IMG UPLOAD -->
                         <div class="">
                             <label for="IMG">car photos <strong>Interior</strong></label>
                             <input
                             type="file"
                             name="imgFour"
                             class="form-control w-100
                             id="imageInput"
                             accept="image/*"
                             />
                             <div id="imgSrcContainer" class="d-none">
                             <i class="fa-solid fa-link"></i>
                             <span id="imgSrc"></span>
                             </div>
                         </div>                        
                     </div>

                    </div>
                    
                    <div class="secRight col-12 col-lg-6 ">
                        <div class="form-group">
                            <h2 class="fw-bold">Car information</h2>
                            <label for="model">Car model</label>
                            <input type="text" id="time" name="model" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="year">Year of manufacture</label>
                            <input type="tel" id="tel" name="year" class="form-control" maxlength="4"  required  oninput="validate(this, YearRegx)"  required>
                            <div class="error d-none text-danger">
                                Please Enter a Correct Year
                            </div>

                        <div class="form-group">
                            <label for="year">Mielage</label>
                            <input type="number" id="tel" name="mielage" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" id="tel" name="price" class="form-control"  required>
                        </div>

                        <div class="form-group">
                            <label for="message">Additional Notes</label>
                            <textarea id="message" name="notes" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                </div>                  
                <!-- =====>Button -->
                <div class="form-group d-flex justify-content-center pt-5">
                    <button class="btnsub">
                            <path d="M10,21.236,6.755,14.745.264,11.5,6.755,8.255,10,1.764l3.245,6.491L19.736,11.5l-6.491,3.245ZM18,21l1.5,3L21,21l3-1.5L21,18l-1.5-3L18,18l-3,1.5ZM19.333,4.667,20.5,7l1.167-2.333L24,3.5,21.667,2.333,20.5,0,19.333,2.333,17,3.5Z"></path>
                        </svg>
                        <span class="text">Submit</span>
                    </button>                        
                </div>
        </form>

        </div>
        <div class="list">
            <H2 class="fw-bold">Your listing : </H2>
        <!-- ============== Car ================ -->
        <div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 g-4 pb-5">
            <?php foreach($cars as $car): ?>
            <div class="col" id="CarMaintCenter" >
                 <div class="card h-100 border-0 shadow-lg border-0 px-3 py-2">
                  <div class="card-body">
                     <img src="uploads/<?php echo $car['front_image']; ?>" alt="car" class="w-100 m-0">
                     <h5 class="card-title text-uppercase my-3 fs-5 text-capitalize bold-headers text-center text-secondary"> Price : <strong class="text-black"> <?php echo $car['Price'] ?> egp </strong> </h5>
                     <div class="card-text fw-bolder">
                         <ul class="text-body-secondary">
                            owner name : <strong class="text-black"> <?php echo $car['name'] ?> </strong> 
                         </ul>
                         <ul class="text-body-secondary">
                             Phone number : <strong class="text-black"> <?php echo $car['user_phone'] ?> </strong> 
                         </ul> 
                         <ul class="text-body-secondary">
                             Email : <strong class="text-black"><?php echo $car['email'] ?> </strong> 
                         </ul>                                     
                         <ul class="text-body-secondary">
                             City : 
                                 <strong class="text-black"><?php echo $car['city'] ?></strong>
                         </ul>
                         <div class="d-flex">
                             <ul class="text-body-secondary">
                                 Car Model : <strong class="text-black"> <?php echo $car['car_model'] ?></strong> 
                            </ul>                    
                            <ul class="text-body-secondary">
                                Year : 
                                    <strong class="text-black"><?php echo $car['year_of_manufacture'] ?></strong>
                            </ul>
                         </div>
                         <ul class="text-body-secondary">
                            Mielage : 
                                <strong class="text-black"><?php echo $car['Mielage'] ?></strong>
                        </ul>
                        <div class="btns d-flex justify-content-around">
                            <a href="Sell_CarEdit.php?id=<?php echo $car['id'] ?>"><button class="btn btn-primary">Edit</button></a>
                            <a href="handle/sellDelete.php?id=<?php echo $car['id'] ?>"><button class="btn btn-danger">Delete</button></a>

                        </div>
                     </div>
                 </div>
                 </div>
             </div>
             <?php endforeach; ?>
         </div>
        </div>
    <script src="./Js/bootstrap.bundle.min.js"></script> 
    <script src="./Js/carSell.js"></script>

</body>
</html>
