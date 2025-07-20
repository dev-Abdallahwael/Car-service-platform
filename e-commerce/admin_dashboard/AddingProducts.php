<?php


require_once 'handle/conn.php';

$query = "SELECT id, name from categories";
$runQuery = mysqli_query($conn,$query);
if(mysqli_num_rows($runQuery)>0){
    $categories = mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
    $_SESSION['category_id'] = "found";
}else{
    $_SESSION['category_id'] = "not found";
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Service Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
        <a class="navbar-brand fw-bold" href="#">CAR<span class="text-danger">MEDICS</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    
    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar py-4">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="mainOwner.php"><i class="fas fa-home me-2"></i> Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="Profile.php"><i class="fas fa-user me-2"></i> My Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="handle/logoutHandle.php"><i class="fas fa-sign-out-alt me-2"></i> Log out</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="AddingCategories.php"><i class="fas fa-plus-circle me-2"></i> Add Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="categories.php"><i class="fas fa-file-invoice me-2"></i> View Categories</a>
                        </li>
                    </ul>
                </div>
            </nav>
            
            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <h1 class="pt-4 text-center text-uppercase fw-bold">Dashboard</h1>
                <h2>
                  <?php
                //   session_start();
                    if(isset($_SESSION['product'])){
                      echo $_SESSION['product'];
                    }
                  
                  ?>
                </h2>
                <!-- Form Section -->
                <div class="card p-4 shadow-sm mt-4">
                    <h4 class="text-center">Add a New Category</h4>
                    <form action="handle/addingProductHandle.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="category" class="form-label">Product Name:</label>
                            <input type="text" class="form-control" id="category" name="category" required>
                        </div>
                        <div class="mb-3">
                            <label for="number" class="form-label">Price:</label>
                            <input type="text" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="number" class="form-label">Discount:</label>
                            <input type="number" class="form-control" id="discount" name="discount" required>
                        </div>
                        <div class="mb-3">
                            <label for="descr" class="form-label">Description:</label>
                            <textarea class="form-control" id="descr" name="descr" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Category:</label>
                            <select name="category_id" id="">
                                <?php foreach($categories as $cat): ?>
                                <option value="<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image:</label>
                            <input
                                type="file"
                                class="form-control"
                                id="imageInput"
                                accept="image/*"
                                name="image"
                                />
                        </div>
                        <button class="btn btn-primary" type="submit" name="submit">Add Product</button>
                    </form>
                </div>
            </main>
        </div>
    </div>

    
    <footer class="bg-dark text-white text-center py-3 mt-4">
    <div class="container">
        <p class="mb-0">© 2025 CAR<span class="text-danger">MEDICS</span>. All Rights Reserved.</p>
        <p class="mb-0">Designed by <a href="#" class="text-danger"></a></p>
    </div>
</footer>

    <!-- Bootstrap Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
