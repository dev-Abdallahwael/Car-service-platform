<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- *============= Google Fonts ============= -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;600;700&family=Righteous&display=swap"
        rel="stylesheet">
    <!-- *============= CSS FILES ============= -->
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="./assets_registration/css/bootstrap.min.css">
    <!-- Main style Css -->
    <link rel="stylesheet" href="./assets_registration/css/style.css">
    <title>SignUp</title>
</head>
<body class="py-5 min-vh-100 d-flex justify-content-center align-items-center">
    
    <div class="container py-3">
        <?php if (isset($_SESSION['error']) && !empty($_SESSION['error'])): ?>
    <div class="container mt-3">
        <?php foreach ($_SESSION['error'] as $error): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo htmlspecialchars($error); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
        <form id="singupForm" class="mx-auto py-5  px-3 px-md-5  position-relative " action="handle/signupHandle.php" method="post">
            <div class="mb-5 mt-3 ">
                <h2 class="text-center mb-0">SignUp</h2>
            </div>
            <div class="input-cont mb-3">
                <input id="singupInputName" type="text" class="form-control" placeholder="Enter your name" name="name">
                <div class="invalid-feedback">Name must be at least 3 characters long.</div>
            </div>
            <div class="input-cont mb-3">
                <input id="singupInputEmail" type="email" class="form-control" placeholder="Enter your email" name="email">
                <div class="invalid-feedback email-feedback">Please, enter valid email.</div>
            </div>

            <div class="input-cont mb-3 position-relative">
                <input id="singupInputPassword" type="password" class="form-control input-password"
                    placeholder="Enter your password" name="password">
                <div class="invalid-feedback">Password must be at least 8 characters long,
                    <br /> contain at least 1 uppercase letter, and 1 number..
                </div>
            </div>
            <div class="input-cont mb-3 position-relative">
                <input id="singupInputConPassword" type="password" class="form-control input-password"
                    placeholder="confirm your password" name="confirmPassword">
                <div class="invalid-feedback">Password must be Equal confirm Password
                </div>
                <h4><?php if(isset($_SESSION['signup'])){echo $_SESSION['signup'];}?> </h4>
            </div>

            <div class="radio-button-container">
              <div class="radio-button">
              <input type="radio" class="radio-button__input" id="radio1" name="role" value="customer">
              <label class="radio-button__label" for="radio1">
                <span class="radio-button__custom"></span>
                Login as Customer 
              </label>
            </div>
            <div class="radio-button">
              <input type="radio" class="radio-button__input" id="radio2" name="role" value="owner">
              <label class="radio-button__label" for="radio2">
                <span class="radio-button__custom"></span>
                Login as Owner 
              </label>
            </div>
            </div>

            <button id="btnSingup" type="submit" class="btn  btn-form  w-100 mt-3 bg-primary text-dark" name = "submit">Sign Up</button>
            <div class=" text-center mt-2 mb-3">
                <p class="login-ask"> You have an account? <a href="login.php">SignIn</a></p>
            </div>
        </form>

        <pre>
            <?php 
                //if(isset($_SESSION['error'])){var_dump($_SESSION['error']);};
            
            ?>
        </pre>
    </div>
    <!-- *============= JS FILES ============= -->
    <!-- BootStrap JS -->
    <script src="./assets_registration/js/bootstrap.bundle.min.js"></script>
    <!-- Main JS -->
    <script src="assets_registration/js/main.js"></script>
</body>

</html>