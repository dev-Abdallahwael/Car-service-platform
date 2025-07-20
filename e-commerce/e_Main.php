<?php
require_once 'admin_dashboard/handle/conn.php';

if (isset($_GET['type'])) {
  $products = [];
  $type = $_GET['type'];
  $query = "SELECT * from products where status = 'active' AND category_id = (SELECT id from categories where name = '$type')";
  $runQuery = mysqli_query($conn, $query);
  if (mysqli_num_rows($runQuery) > 0) {
    $products = mysqli_fetch_all($runQuery, MYSQLI_ASSOC);
    $_SESSION['productsDe'] = "products found";
  } else {
    $_SESSION['productsDe'] = "products found";
  }
} else {
  $products = [];
  $query = "SELECT * from products where status = 'active'";
  $runQuery = mysqli_query($conn, $query);
  if (mysqli_num_rows($runQuery) > 0) {
    $products = mysqli_fetch_all($runQuery, MYSQLI_ASSOC);
    $_SESSION['productsDe'] = "products found";
  } else {
    $_SESSION['productsDe'] = "products found";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="author" content="Abdallah Wael" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../CSS/all.min.css" />
  <link rel="stylesheet" href="../CSS/bootstrap.min.css" />
  <link rel="stylesheet" href="../CSS/style.css" />
  <title>CarMedics.</title>
</head>
<body>
  <!-- Alert Messages -->
  <div id="Cart" class="fw-bold alert  bg-success position-fixed top-0 start-50 translate-middle-x mt-5 text-white text-center w-fit" style="display: none; z-index: 999;">
    <h5>✅ Added to cart </h5>
  </div>
  <div id="Fav" class=" fw-bold  alert  bg-danger position-fixed top-0 start-50 translate-middle-x mt-5  text-white text-center w-fit" style="display: none;  z-index: 999;">
    <h5> ❤️ Added to favorites</h5>  
  </div>

  <!-- ============== NAVBAR ============== -->
 <?php require_once "navbar.php"; ?>

  <!-- ============== SERVICES ============== -->
  <section id="services" class="services bg-body-tertiary overflow-auto pt-3">
    <div class="container text-center my-5">
      <h2 class="fs-1 montserrat very-bold-headers text-capitalize">Browse our products.</h2>
      <input type="search" class="form-control-sm w-50 border-opacity-25 rounded-4" placeholder="search our product">
      <div class="categories fw-bolder fs-5 d-flex justify-content-evenly pt-5">
        <a href="e_Main.php" class="text-decoration-none categ">All</a>
        <a href="e_Main.php?type=Accessories" class="text-decoration-none categ">Accessories</a>
        <a href="e_Main.php?type=Tires" class="text-decoration-none categ">Tires</a>
        <a href="e_Main.php?type=Batteries" class="text-decoration-none categ">Batteries</a>
      </div>

      <div class="row row-cols-2 row-cols-lg-4 row-cols-md-2 g-4 py-5">
        <?php foreach ($products as $product): ?>
        <div class="col">
          <a href="#" class="text-decoration-none text-black">
            <div class="card h-100 w-100 border-0 shadow">
              <img src="../uploads/<?php echo $product['image']; ?>" alt="product" class="w-100 h-50">
              <h5 class="card-title text-uppercase my-3 fs-5 text-capitalize bold-headers"><?php echo $product['name']; ?></h5>
              <div class="d-flex justify-content-around">
                <p><span class="fw-bold"><?php echo $product['price']; ?></span> LE</p>
                <p><span class="fw-bold">Discount: <?php echo $product['discount']; ?></span> %</p>
                <p class="fw-bold"><i class="fa-solid fa-star" style="color: #FFD43B;"></i> 4.8</p>
              </div>
              <div class="d-flex justify-content-around py-2">
                <!-- Updated buttons -->
                <button onclick="handleFav(this)" data-href="admin_dashboard/handle/favHandle.php?id=<?php echo $product['id'] ?>" class="btn icobtn bg-dark-subtle rounded-5"><i class="fa-solid fa-heart"></i></button>
                <button onclick="handleCart(this)" data-href="admin_dashboard/handle/addToCartHandle.php?id=<?php echo $product['id'] ?>" class="btn icobtn bg-dark-subtle rounded-5"><i class="fa-solid fa-cart-shopping"></i></button>
                <div><a href="viewproduct.php?id=<?php echo $product['id'] ?>" class="mt-auto btn btn-primary w-100">View</a></div>
              </div>
            </div>
          </a>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ============== FOOTER ============== -->
  <footer class="overflow-auto bg-black">
    <div class="container my-4 text-center text-white">
      <p class="small text-secondary p-1 poppins">Copy Right 2025 ©</p>
    </div>
  </footer>

  <!-- Bootstrap -->
  <script src="../Js/bootstrap.bundle.min.js"></script>

  <!-- Alert + Redirect Logic -->
  <script>
    function showAlert(id, duration = 1500) {
      const alert = document.getElementById(id);
      if (!alert) return;

      alert.style.display = 'block';
      alert.style.opacity = '1';
      alert.style.transition = 'opacity 0.5s ease';

      setTimeout(() => {
        alert.style.opacity = '0';
        setTimeout(() => {
          alert.style.display = 'none';
        }, 500);
      }, duration);
    }

    function handleCart(button) {
      const href = button.getAttribute('data-href');
      showAlert('Cart');
      setTimeout(() => {
        window.location.href = href;
      }, 1500);
    }

    function handleFav(button) {
      const href = button.getAttribute('data-href');
      showAlert('Fav');
      setTimeout(() => {
        window.location.href = href;
      }, 1500);
    }
  </script>
</body>
</html>
