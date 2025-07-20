<?php


session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- *============= Meta ============= -->
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
    <title>Login</title>
</head>
<body class="py-5 min-vh-100 d-flex justify-content-center align-items-center">
    
    <div class="container py-3">
        <h1 class="d-flex pb-5 justify-content-center" >Welcome</h1>
        <form id="loginForm" class="mx-auto py-5  px-3 px-md-5  position-relative " action="handle/loginHandle.php" method="post">
            <div class="mb-5 mt-3">
                <h2 id="smartLoginSystem" class="text-center mb-0">Login</h2>
            </div>
            <div class="input-cont mb-3">
                <input id="loginInputEmail" type="email" class="form-control" placeholder="Enter your email" name="email">
                <div class="invalid-feedback">Please, enter valid email.</div>
            </div>

            <div class="input-cont mb-3">
                <div class="position-relative">
                    <input id="loginInputPassword" type="password" class="form-control input-password"
                        placeholder="Enter your password" name="password">
                    <i class="icon-eye-blocked icon-input icon-password"></i>
                    <div class="invalid-feedback">Password must be at least 8 characters long,<br />
                        contain at least 1
                        uppercase letter, and 1 number..
                    </div>
                </div>
            </div>
            <?php if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
            } ?>
            <!-- <div id="invalidAuth" class="invalid-auth text-center d-none">incorrect email or password.</div> -->
            <button id="btnLogin" type="sumbit" class="btn  btn-form w-100 mt-3 bg-primary text-dark" name="submit">Login</button>
            <div class=" text-center mt-2 mb-3">
                <p class="login-ask"> Don’t have an account? <a href="signup.php" class="fw-bold">Sign Up</a></p>
            </div>
        </form>
    </div>

    <!-- *============= JS FILES ============= -->
    <!-- BootStrap JS -->
    <script src="./assets_registration/js/bootstrap.bundle.min.js"></script>
    <!-- Main JS -->
    <script src="assets_registration/js/main.js"></script>
</body>

</html>