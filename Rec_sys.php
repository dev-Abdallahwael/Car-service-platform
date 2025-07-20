<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Form</title>
    <meta name="author" content="Abdallah Wael" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet" />
      <link rel="stylesheet" href="./CSS/all.min.css" />
      <link rel="stylesheet" href="./CSS/bootstrap.min.css" />
      <link rel="stylesheet" href="./CSS/style.css" />
      <!-- jsPDF Library -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    </head>
    <body class="bg-body-secondary">
    <!-- ============== NAVBAR ============== -->
      <nav class="navbar fixed-top bg-black navbar-expand-lg ">
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
                  href="main.html"
                  >home</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>        
      
        <div class="appointment-form mt-5 pt-5 container">
            <h2
            class="fs-1 text-center montserrat very-bold-headers text-capitalize mb-5">
            Recommendation system.
            </h2>
        <form id="appointmentForm" method="post">
                <div class="row">   
                    <div class="secLeft col-12 col-lg-6 ">

                        <div class="form-group">
                            <label for="budget">What is your car budget ? </label>
                            <select id="budget" name="budget"  class="form-control" required>
                                <option value="">1,500,000 - 2,000,000</option>
                                <option value="">500,000 - 1,000,000</option>
                                <option value="">2,000,000 + </option>
                            </select>
                        </div>

                    <div class="form-group">
                        <label for="use">What will you primary use the car for ?</label>
                        <select id="use" name="use"  class="form-control" required>
                            <option value="">Daily driver </option>
                            <option value="">Regular traveler</option>
                            <option value="">short distance driver</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="passengers">How many passengers should the car accommodate ?</label>
                        <select id="passengers" name="passengers"  class="form-control" required>
                            <option value=" ">2</option>
                            <option value="">3</option>
                            <option value="">4</option>
                            <option value="">5</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="fule">What fuel type do you prefer ?</label>
                        <select id="fule" name="fule"  class="form-control" required>
                            <option value="  ">Disel </option>
                            <option value="  ">Gasoline</option>
                            <option value="  ">Electricity</option>
                            <option value="  ">Natural gas</option>
                        </select>
                    </div>
                    </div>
                    
                    <div class="secRight col-12 col-lg-6 ">

                        <div class="form-group">
                            <label for="performance">Preferred car performance ?</label>
                            <select id="performance" name="performance"  class="form-control" required>
                                <option value=" ">High Performance </option>
                                <option value=" ">Average  Performance</option>
                                <option value=" ">Low Performance </option>
                            </select>
                        </div>

                        <div class="form-group">
                          <label for="Weather">Weather conditions ?</label>
                          <select id="Weather" name="Weather"  class="form-control" required>
                              <option value=" ">Mostly rainy</option>
                              <option value=" ">Mostly  snowy</option>
                              <option value=" ">Hot weather</option>
                              <option value=" ">Steady weather</option>
                          </select>
                      </div>

                      <div class="form-group">
                        <label for="transmission">Automatic or Manual transmission ?</label>
                        <select id="transmission" name="transmission"  class="form-control" required>
                            <option value=" ">Automatic </option>
                            <option value=" ">Manual  </option>
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="body">Do you prefer specific body type ?</label>
                      <select id="body" name="body"  class="form-control" required>
                          <option value=" ">SUV</option>
                          <option value=" ">Sidane</option>
                          <option value=" ">Hatchback</option>
                          <option value=" ">Crossover</option>
                          <option value=" ">Sports car</option>
                          <option value=" ">Van</option>
                      </select>
                  </div>


                    </div>
                    <!-- =====>Button -->
                    <div class="form-group d-flex justify-content-center py-5">
                        <button class="btnsub">
                                <path d="M10,21.236,6.755,14.745.264,11.5,6.755,8.255,10,1.764l3.245,6.491L19.736,11.5l-6.491,3.245ZM18,21l1.5,3L21,21l3-1.5L21,18l-1.5-3L18,18l-3,1.5ZM19.333,4.667,20.5,7l1.167-2.333L24,3.5,21.667,2.333,20.5,0,19.333,2.333,17,3.5Z"></path>
                            </svg>
                            <span class="text">Submit</span>
                        </button>                        
                    </div>
                </div>                  
        </form>
        </div>
    <script src="./Js/bootstrap.bundle.min.js"></script> 

</body>
</html>
