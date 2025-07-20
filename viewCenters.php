<?php


  // session_start();
  require_once 'handle/conn.php';

?>

<?php



  $id = $_SESSION['user_id'];
  // echo $id;
  // $query = "SELECT users.name ,centers.* FROM `centers` join users on owner_id = $id ";
  $query = "SELECT * FROM centers ";
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
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
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
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link" href="../main.php">
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
                 <?php foreach($centers as $center): ?>       
                  <div class="col-12 col-lg-5 shadow-lg bg-white rounded-3 me-2">
                    <div class="">
                      <img src="admin_dashboard/uploads/<?php echo $center['image']; ?>" alt="Center photo" class="w-100">
                      <div class="cardcontent">
                        <ul class="fw-bold text-capitalize text-center">Center Name: <?php echo $center['c_name']; ?></ul>
                        <ul>Phone number: <?php echo $center['phone']; ?></ul>
                        <ul>Service provided: <?php echo $center['service']; ?></ul>
                        <ul>Desipcrtion: <?php echo $center['descr']; ?></ul>
                        <ul>Location url: <?php echo $center['location']; ?></ul>
                      </div>
                      <div class="btns ms-5 py-3">
                        <a href="viewCenter.php?id=<?php echo $center['id']?>" class="btn btn-outline-warning fw-bold" id="Edit" style="margin-right: 9rem;" >view center</a>
                      </div>
                    </div>
                  </div>
                  <?php endforeach; ?>

      
      </form> 
<h1>
  <?php if(isset($_SESSION['image'])){
    // echo $id;
    // echo $_SESSION['get_center'];
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