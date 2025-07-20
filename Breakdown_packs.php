<?php

session_start();


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
    <link rel="stylesheet" href="./CSS/all.min.css" />
    <link rel="stylesheet" href="./CSS/bootstrap.min.css" />
    <link rel="stylesheet" href="./CSS/style.css" />
    <title>CarMedics.</title>
  </head>
  <body>
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

    <!-- ============== About ============== -->
    <div class="About py-5">
      <div class="container my-5 py-5">
        <h2
        class="fs-1 text-center montserrat very-bold-headers text-capitalize mb-5">
        Breakdown Assistance
      </h2>
        <div class="row g-5">
          <div class="aboutContent col-lg-6">
            <img src="./imgs/vehicle-breakdown.jpg" alt="aboutimg" class="w-100 ">
          </div>
          <div class="aboutContent col-lg-6">
            <h2 class="fw-bold text-danger pb-3"> Stuck on the road ?</h2>
            <p class="abouttext text-secondary">weather it's a flat tier, engine failure or a dead battery , our skilled technicians are always ready to respond quickly, providing reliable roadside assistance that minimizes your wait time and gets you back on track.</p>
            <p class="abouttext py-3 fw-bold">Add the following :</p>
            <div class="listadd text-secondary d-flex pb-3">
              <div class="listone">
                <ul>Full Name</ul>
                <ul>Phone number</ul>
                <ul>Email Address</ul>
              </div>
              <div class="listtwo">
                <ul>Vehicle  model</ul>
                <ul>Issue description</ul>
                <ul>Breakdown Location</ul>
              </div>
            </div>
            <div class="joinusbtn">
              <button class="rounded-2 px-4 py-1 shadow" id="btnjoin"><a href="#packs_section" class="text-decoration-none text-black">Join us</a></button>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- ============== Packages ============== -->
    <div class="packages_section bg-body-tertiary  " id="packs_section">
      <div class="my-5  p-5 container">
              <h2 class="about-header fs-1 montserrat very-bold-headers text-center pb-5">Choose your package</h2>
              <div class="row g-3">
                <!-- ===> Package 1 -->
                <div class="package col-12 col-md-12 col-lg-4" id="package">
                      <!-- From Uiverse.io --> 
                    <div class="plan shadow-lg">
                      <div class="inner">
                        <span class="pricing">
                          <span>
                            300 EGP <small>/ m</small>
                          </span>
                        </span>
                        <p class="title fw-bold">Basic plan</p>
                        <p class="info">This plan is for casual drivers who want essential ,no frills coverage for occasional emerginces.</p>
                        <ul class="features">
                          <li>
                            <span class="icon">
                              <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 0h24v24H0z" fill="none"></path>
                                <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                              </svg>
                            </span>
                            <span><strong>24/7 </strong>Roadside assistance </span>
                          </li>
                          <li>
                            <span class="icon">
                              <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 0h24v24H0z" fill="none"></path>
                                <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                              </svg>
                            </span>
                            <span>towling up to <strong>10 miles</strong></span>
                          </li>
                          <li>
                            <span class="icon">
                              <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 0h24v24H0z" fill="none"></path>
                                <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                              </svg>
                            </span>
                            <span>Fuel dilivery cost of fule not included  </span>
                          </li>
                        </ul>
                        <div class="action">
                        <a class="button" href="BreakDown_pay.php?id=1">
                          Choose plan
                        </a>
                        </div>
                      </div>
                    </div>
                </div>

                <!-- ===> Package 2 -->
                <div class="package col-12 col-md-12 col-lg-4" id="package">
                  <!-- From Uiverse.io --> 
                <div class="plan shadow-lg">
                  <div class="inner">
                    <span class="pricing">
                      <span>
                        800 EGP <small>/ m</small>
                      </span>
                    </span>
                    <p class="title fw-bold">Standard plan</p>
                    <p class="info">ideal for commuters and families who want dependable coverage for regular driving needs.</p>
                    <ul class="features">
                      <li>
                        <span class="icon">
                          <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                          </svg>
                        </span>
                        <span><strong>All</strong> basic plan benefits</span>
                      </li>
                      <li>
                        <span class="icon">
                          <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                          </svg>
                        </span>
                        <span><strong>Unlimited</strong> Roadside assistance</span>
                      </li>
                      <li>
                        <span class="icon">
                          <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                          </svg>
                        </span>
                        <span>Lockout assistance</span>
                      </li>
                    </ul>
                    <div class="action">
                    <a class="button" href="BreakDown_pay.php?id=2">
                      Choose plan
                    </a>
                    </div>
                  </div>
                </div>
                </div>

                <!-- ===> Package3 -->
                <div class="package col-12 col-md-12 col-lg-4" id="package">
                  <!-- From Uiverse.io --> 
                <div class="plan shadow-lg">
                  <div class="inner">
                    <span class="pricing">
                      <span>
                        1400 EGP <small>/ m</small>
                      </span>
                    </span>
                    <p class="title fw-bold">Premium plan</p>
                    <p class="info">Ideal for frequent travelers,who need comprehensive coverage for long distance driving.</p>
                    <ul class="features">
                      <li>
                        <span class="icon">
                          <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                          </svg>
                        </span>
                        <span><strong>All</strong> Standard Plan benefits</span>
                      </li>
                      <li>
                        <span class="icon">
                          <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                          </svg>
                        </span>
                        <span>towling up to <strong>200 miles</strong></span>
                      </li>
                      <li>
                        <span class="icon">
                          <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                          </svg>
                        </span>
                        <span>on spot reparis</span>
                      </li>
                    </ul>
                    <div class="action">
                    <a class="button" href="BreakDown_pay.php?id=3">
                      Choose plan
                    </a>
                    </div>
                  </div>
                </div>
                </div>
                </div>
      </div>
    </div>

    <!-- ============== CONTACT ============== -->
    <section id="contact" class="contact overflow-auto">
      <div class="container my-5 py-5">
        <h2
          class="fs-1 text-center montserrat very-bold-headers text-capitalize mb-5">
          Contact Us.
          <div class="dotted-bg position-absolute"></div>
        </h2>
        <div class="row">
          <div class="text-center mb-4 col-lg-4 col-md-6">
            <i
              class="fa-solid fa-location-arrow rounded-pill t-duration fs-4"></i>
            <h4 class="fs-6 montserrat fw-bold mt-2">Address</h4>
            <p class="text-secondary poppins">
              6834 Hollywood Blvd - Los Angeles CA
            </p>
          </div>

          <div class="text-center mb-4 col-lg-4 col-md-6">
            <i class="fa-solid fa-envelope rounded-pill t-duration fs-4"></i>
            <h4 class="fs-6 montserrat fw-bold mt-2">Email</h4>
            <p class="text-secondary poppins">Support@website.com</p>
          </div>

          <div class="text-center mb-4 col-lg-4 col-md-6">
            <i class="fa-solid fa-phone rounded-pill t-duration fs-4"></i>
            <h4 class="fs-6 montserrat fw-bold mt-2">Phone</h4>
            <p class="text-secondary poppins">+20 010 2517 8918</p>
          </div>
        </div>

        <form method="post" class="mt-5">
          <div class="row gap-2">
            <div class="col-lg mt-2">
              <input
                id="name"
                type="text"
                name="name"
                class="w-100 bg-body-secondary border-0 rounded-1 p-2"
                placeholder="Name" />
            </div>
            <div class="col-lg mt-2">
              <input
                type="email"
                name="email"
                class="w-100 bg-body-secondary border-0 rounded-1 p-2"
                placeholder="Email" />
            </div>
            <div class="col-12 mt-2">
              <textarea
                name="msg"
                id="msg"
                rows="7"
                class="w-100 bg-body-secondary border-0 rounded-1 p-2"
                placeholder="Message"></textarea>
            </div>
            <div class="col-2">
              <button
                class="btn border border-1 border-black t-duration poppins">
                Submit
              </button>
            </div>
          </div>
        </form>
      </div>
    </section>

    <!-- ============== FOOTER ============== -->
    <footer class="overflow-auto bg-black">
      <div class="container my-4 text-center text-white">
        <p class="small text-secondary p-1 poppins">
          Copy Right 2025 © 
        </p>
      </div>
    </footer>
    <script src="./Js/bootstrap.bundle.min.js"></script> 
  </body>
</html>