<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <title>Dashboard -  Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/all.min.css" />
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
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
                            <!-- profile -->
                            <a class="nav-link" href="Profile.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            My Profile
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <!-- logout -->
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
            <div id="layoutSidenav_content">
                <h1 class="pt-5 text-center text-capitalize fw-bolder">Dashboard</h1>
    <!-- ============== ABOUT Us ============== -->
                <section id="about" class="about bg-body-tertiary overflow-auto">
            <div class="container p-md-5 bg-white about-card">
              <div class="row">
                <div class="skills d-flex flex-column p-3 col-lg-5">
                  <div class="upper-left d-flex align-items-center">
                    <div class="p-2 position-relative">
                      <img
                        class="center w-100  position-relative"
                        src="../imgs/center.jpg"
                        alt="center image" />
                    </div>
                  </div>
                </div>
                <div class="content p-3 col-lg-7">
                  <h3 class="about-header fs-2 montserrat bold-headers">Upload your center.</h3>
                  <h4
                    class="text-uppercase small text-danger fw-bold poppins letter-spacing mb-4">
                    Car service website 
                  </h4>
                  <p class="fw-light text-secondary poppins mb-4">
                    At <span class="fw-bolder">CarMedics</span>, you can upload your car's center information and Location url link to allow users view your location and offered service then they can book an appointment. </p>
                    <h6>Add the following:</h6>
                    <div class="addlists d-flex text-secondary">
                        <ul class="list-unstyled">
                            <ol>Center's name</ol>
                            <ol>Service offered</ol>
                            <ol>Manager's name</ol>
                        </ul>
                        <ul>
                            <ol>Center's image</ol>
                            <ol>additional information</ol>
                            <ol>Location url link</ol>
                        </ul>
                    </div>
                </div>
              </div>
            </div>
                </section>

                 <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2025</div>
                        </div>
                    </div>
                 </footer>
            </div>
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
