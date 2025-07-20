

<?php

require_once 'handle/conn.php';

if(isset($_SESSION['user_id'])){
  $id = $_SESSION['user_id'];
  // echo $id;
  // $query = "SELECT users.name ,centers.* FROM `centers` join users on owner_id = $id ";
  $query = "SELECT users.name, centers.* FROM centers 
          JOIN users ON users.id = centers.owner_id 
          WHERE centers.owner_id = $id";
  $centers = [];
if(!$conn){
  $_SESSION['conn'] = "empty";
}else{
  $_SESSION['conn'] = "run";
}
  $runQuery = mysqli_query($conn,$query);
  
  if($runQuery){
    $_SESSION['query'] = "run";
  }else{
    $_SESSION['query'] = "empty";
  }
  if (mysqli_num_rows($runQuery)>0) {
    $centers  = mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
    $_SESSION['get_center'] = "center found";
  }else{
    $_SESSION['get_center'] = "center not found";
  }
}


echo $_SESSION['get_center'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/styles.css">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <title>Service</title>
</head>
<body class="sb-nav-fixed bg-body-secondary">
    <!--============> Navbar  -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-black">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-5 fw-bold " href="index.html">CAR<span class="text-danger">MEDICS</span>.</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    </nav>
    <div id="layoutSidenav">
     <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="mainOwner.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="Profile.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            My Profile
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link" href="handle/logoutHandle.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Log out
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        
                        <!-- ======> Adding and Viewing  -->
                        <a class="nav-link" href="AddingCenter.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-upload"></i></div>
                                Add centers
                            </a>
                            <a class="nav-link" href="adminInvoices.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-eye"></i></div>
                                View invoices
                            </a>

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as <span class="fw-bold">owner</span> </div>
                    
                </div>
            </nav>
    </div>
<!--==============> Crud operation ==============-->
      <div id="layoutSidenav_content">
        <h1 class="pt-5 text-center text-capitalize fw-bolder">Dashboard</h1>
        <div class="addingservice">
<!--=============> Inputs form =================-->
        <form class="w-75 container " action="handle/addingCenterHandle.php" method="post" enctype="multipart/form-data">
            <div class="form-floating mb-3">
              <input
                type="text"
                class="form-control text-black"
                id="name"
                autocomplete="off"
                oninput="validate(this, nameRegex)"
                name = "center"
              />
              <label for="name" class="text-black">Center name</label>
              <div class="error d-none">
                Name must start with Capital letter followed by 3 characters or
                more
              </div>
            </div>

            <div class="form-floating mb-3">
                <input
                  type="text"
                  class="form-control"
                  id="name"
                  autocomplete="off"
                  oninput="validate(this, nameRegex)"
                  name="owName"
                />
                <label for="name" class="text-black">Owner name</label>
                <div class="error d-none" class="text-black">
                  Name must start with Capital letter followed by 3 characters or
                  more
                </div>
              </div>

            <div class="form-floating mb-3">
              <input
                type="text"
                class="form-control"
                id="category"
                list="categories"
                autocomplete="off"
                name="service"
              />
              <label for="category" class="text-black">Service offered</label>
              <div class="error d-none">
                Service must start with Capital letter followed by 3 characters
                or more
              </div>
  
              <datalist id="categories">
                <option value="Car wash center"></option>
                <option value="car maintenance center"></option>
                <option value="Breakdown Assistance"></option>
              </datalist>
            </div>

            <div class="form-floating mb-3">
              <input
                type="text"
                class="form-control"
                id="Phone number"
                maxlength ="12"
                name="phone"

              />
              <label for="price" class="text-black">Phone number</label>
              <div class="error d-none">
                Price must be greater than 0 and less than 100$
              </div>
            </div>

            <div class="form-floating mb-3">
              <textarea
                class="form-control"
                id="description"
                oninput="validate(this, descriptionRegex)"
                name="descr"
              ></textarea>
              <label for="description" class="text-black">Description</label> 
              <div class="error d-none">
                Descripton should be at least 25 character and at most 100
                character
              </div>
            </div>

            <div class="form-floating mb-3">
              <input
                type="url"
                class="form-control"
                id="name"
                autocomplete="off"
                name="location"
              />
              <label for="name" class="text-black">Location URL</label>
              <div class="error d-none" class="text-black">
                link must start with Http followed by 3 characters or
                more
              </div>
            </div>

            <div class="mb-3">
              <input
                type="file"
                class="form-control"
                id="imageInput"
                accept="image/*"
                name="image"
              />
              <div id="imgSrcContainer" class="d-none">
                <i class="fa-solid fa-link"></i>
                <span id="imgSrc"></span>
              </div>
            </div>

            <button class="btn btn-primary" id="addBtn" type="submit" name="submit" onclick="addProduct()">
              Add 
            </button>
            <button class="btn btn-info d-none" id="updateBtn" type="button" onclick="updateProduct()">
              Update 
            </button>
            
            <!-- ===============================> Displaying Data -->         
            <div class="DisplayData py-3">
              <div class="row g-3">
                <!-- ===============================> Card 1 --> 
                 <?php if(!empty($centers)): ?>
                 <?php foreach($centers as $center): ?>       
                  <div class="col-12 col-lg-5 shadow-lg bg-white rounded-3 me-2">
                    <div class="row">
                      <img src="uploads/<?php echo $center['image']; ?>" alt="Center photo" class="w-100">
                      <div class="cardcontent">
                        <ul class="fw-bold text-capitalize text-center">Center Name: <?php echo $center['c_name']; ?></ul>
                        <ul>Center owner: <?php echo $center['name']; ?></ul>
                        <ul>Phone number: <?php echo $center['phone']; ?></ul>
                        <ul>Service provided: <?php echo $center['service']; ?></ul>
                        <ul>Desipcrtion: <?php echo $center['descr']; ?></ul>
                        <div class="" style="word-wrap: break-word;"><ul>Location url: <a href=""><?php echo $center['location']; ?></a></ul></div>
                      </div>
                      <div class="btns d-flex justify-content-around  py-3">
                        <a href="editCenter.php?id=<?php echo $center['id']?>" class="btn btn-outline-warning fw-bold" id="Edit">Edit </a>
                        <a href="handle/deleteHandle.php?id=<?php echo $center['id']?>" class="btn btn-outline-danger fw-bold" id="del" value="<?php echo $center['id']; ?>" >Delete</a>
                      </div>
                    </div>
                  </div>
                  <?php endforeach;
                    endif;
                  ?>

      </form> 
<h1>
  <?php if(isset($_SESSION['centerH'])){
    // echo $id;
    // echo $_SESSION['centerH'];
    // echo $_SESSION['image'];
  } ?>
</h1>
    <!-- ?========|> Boostrap Js file -->
    <script src="../Js/bootstrap.bundle.min.js"></script>
    <!-- ?========|> Main Js File -->
    <script src="../admin dashboard/js/index.js"></script>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>
</html>