<?php


require_once 'handle/conn.php';

$invoices = [];
$query = "select * from invoices";
$runQuery = mysqli_query($conn,$query);
if(mysqli_num_rows($runQuery)>0){
    $invoices = mysqli_fetch_all($runQuery,MYSQLI_ASSOC);

}else{
    $_SESSION['invoices'] = 'not found';
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/all.min.css" />
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="./css/invoices.css">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- jsPDF Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
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
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link" href="../index.html">
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
                <h1 class="pt-3 text-center text-capitalize fw-bolder">Dashboard: Appointment Submissions</h1>
                <!-- msg -->
            <?php //if (isset($_SESSION['delete'])): ?>
                <h5 id="delete-alert"
    style="position: fixed; top: 0; left: 50%; transform: translateX(-50%); z-index: 1055; opacity: 0; visibility: hidden;"
    class="px-4 mt-3 mx-auto py-2 rounded-4 fw-semibold bg-danger text-white text-center text-capitalize shadow d-inline-flex align-items-center gap-2">
    <i class="fas fa-circle-check"></i> Invoice Deleted
            </h5>
                
            <?php //endif; ?>

                <!--===============> Display invoices -->
                <?php foreach($invoices as $inv):  ?>
                    <div class="dashboard my-3 w-100">
                        <p><strong>Full Name:</strong> <?php echo $inv['full_name']; ?> </p>
                        <p><strong>Email Address:</strong><?php echo $inv['email']; ?> </p>
                        <p><strong>Phone Number:</strong><?php echo $inv['phone']; ?></p>
                        <p><strong>Appointment Date:</strong><?php echo $inv['date']; ?></p>
                        <p><strong>Time:</strong> <?php echo $inv['time']; ?></p>
                        <p><strong>Service Required:</strong> <?php echo $inv['service']; ?></p>
                        <p><strong>Additional Notes:</strong><?php echo $inv['note']; ?></p>
                         <div class="btn-group">
                            <button class="btn btn-danger" onclick="handleDelete(this)" data-href="handle/invoicesDeleteHandle.php?id=<?php echo $inv['id'] ?>">
                                Delete
                            </button>
                         </div> 
                    </div>
                    <?php endforeach; ?>


                <!--===============> Display invoices -->
                <!-- <div class="dashboard my-3 w-100">
                    <p><strong>Full Name:</strong> Abdallah</p>
                    <p><strong>Email Address:</strong> Abdallah@gmail.com</p>
                    <p><strong>Phone Number:</strong> 01097587504</p>
                    <p><strong>Appointment Date:</strong> 6/11/2025</p>
                    <p><strong>Time:</strong> 6:00 pm</p>
                    <p><strong>Service Required:</strong> car maint</p>
                    <p><strong>Additio nal Notes:</strong>i want to check the engine</p>
                     <div class="btn-group">
                        <button class="delete-btn">Delete</button>
                     </div> 
                </div> -->
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>

  
        <!-- Script to handle delete click -->
<script>
    function handleDelete(button) {
        const alert = document.getElementById('delete-alert');
        const href = button.getAttribute('data-href');

        // Show alert
        alert.style.visibility = 'visible';
        alert.style.transition = 'opacity 0.5s ease';
        alert.style.opacity = '1';

        // After 2 seconds, hide alert and redirect
        setTimeout(() => {
            alert.style.opacity = '0';
            setTimeout(() => {
                alert.remove(); // Optional: remove from DOM
                window.location.href = href; // Perform the actual delete request
            }, 500); // wait for fade-out
        }, 2000);
    }
</script>
        <?php //unset($_SESSION['delete']); ?>
    </body>
</html>
