<?php


require_once 'admin_dashboard/handle/conn.php';

if(isset($_SESSION['user_id'])){

  $products = [];
  $userId = $_SESSION['user_id'];
  $query = "SELECT products.*, f.*
FROM products
JOIN favorites f ON products.id = f.product_id
WHERE f.user_id = $userId 
";
$_SESSION['favP'] = "yet";
  $runQuery = mysqli_query($conn,$query);
  if(mysqli_num_rows($runQuery)>0){
    $products = mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
    $_SESSION['favP'] = "found";
  }else{
      $_SESSION['favP'] = "not found";
  }

}else{
  header("location:../login.php");
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
    <link rel="stylesheet" href="../CSS/all.min.css" />
    <link rel="stylesheet" href="../CSS/bootstrap.min.css" />
    <link rel="stylesheet" href="../CSS/style.css" />
    <title>CarMedics.</title>
  </head>
  <body>
    <!-- ============== NAVBAR ============== -->
    <?php require_once "navbar.php"; ?>
    
    <!-- ============== SERVICES ============== -->
    <section id="services" class="services bg-body-tertiary overflow-auto pt-3">
      <div class="container text-center my-5">
        <h2 class="fs-1 montserrat very-bold-headers text-capitalize">
          Favoutite List.
        </h2>
        <div class="row row-cols-2 row-cols-lg-4 row-cols-md-2 g-4 py-5">


        <?php //var_dump($products); ?>
            <!-- Cards -->
        <?php foreach($products as $product): ?>
          <div class="col">
            <a href="" class="text-decoration-none">
              <div class="card h-100 border-0 shadow border-0">
                <div class="">
                  <img src="../uploads/<?php echo $product['image']?>" alt="product" class="w-100">
                  <h5 class="card-title text-uppercase my-3 fs-5 text-capitalize bold-headers"><?php echo $product['name']?></h5>
                  <div class="d-flex justify-content-around">
                        <p><span class=" fw-bold"><?php echo $product['price']?></span> LE</p>
                        <p class="fw-bold"><i class="fa-solid fa-star" style="color: #FFD43B;"></i> 4.8</p>
                  </div>
                  <div class="d-flex justify-content-around py-2">
                    <button  class="btn icobtn  bg-dark-subtle rounded-5"><i class="fa-solid fa-cart-shopping"></i></button>
                    <button  class="btn viewbtn  bg-dark-subtle rounded-5"><i class="fa-solid fa-eye"></i></button>
                </div>
                <a href="admin_dashboard/handle/favDelete.php?id=<?php echo $product['f_id']; ?>"> <button class="btn btn-danger icodel w-100"><i class="fa-solid fa-trash pe-2" style="color: #ffffff;"></i>Remove</button></a>
                </div>
              </div>
            </a>
          </div>
          <?php endforeach; ?>
        
          
        </div>
      </div>

      <!--========> On Click msg -->
      <div id="message-del" class="message-del fw-bold border-1 rounded-1"><i class="fa-solid fa-circle-check" style="color: #000000;"></i> The Product is Removed</div>
      <div id="message-box" class="message-box fw-bold border-1 rounded-1"><i class="fa-solid fa-circle-check" style="color: #006605;"></i> The Product is Added</div>

    </section>
    <!-- ============== FOOTER ============== -->
    <footer class="overflow-auto bg-black fixed-bottom">
      <div class="container my-4 text-center text-white">
        <p class="small text-secondary p-1 poppins">
          Copy Right 2025 © 
        </p>
      </div>
    </footer>
    <script src="../Js/bootstrap.bundle.min.js"></script> 
    <!-- <script src="./js/ecomm_fav.js"></script> -->
  </body>
</html>