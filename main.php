<?php session_start(); 
require_once 'header.php';
?>
  <!-- ============== HEADER ============== -->
    <header id="home">
      <div
        class="montserrat bg-black bg-opacity-75 container-fluid vh-100 text-white d-flex justify-content-center align-items-center flex-column">
        <h1>Drive with confidence and repair with care</h1>
        <p class="fs-2 text-capitalize">
          View our <span id="animation-text" class="animation-text"></span> services
        </p>
      </div>
                        <!-- Load library from the CDN -->
                        <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
                        <!-- Setup and start animation! -->
                        <script>
                          var typed = new Typed('#animation-text', {
                            strings: [' Car maintenance', 'Car wash', 'Breakdown assistance', 'Sell your car', 'View cars', 'E-commerce', 'ChatBot'],
                            typeSpeed: 100,
                            backSpeed: 70,
                            loop: true 
                          });
                        </script>
                      </script>
    </header>
    <!-- ============== ABOUT Us ============== -->
    <section id="about" class="about overflow-auto">
      <div class="my-5 container p-md-5 bg-white about-card">
        <div class="row">
          <div class="skills d-flex flex-column p-3 col-lg-5">
            <div class="upper-left d-flex align-items-center">
              <div class="p-2 position-relative">
                <img
                  class="d-block w-100 rounded-2 position-relative z-1"
                  src="./imgs/About us.jpg"
                  alt="portrait image" />
              </div>
            </div>
          </div>
          <div class="content p-3 col-lg-7">
            <h3 class="about-header fs-2 montserrat bold-headers">About us.</h3>
            <h4
              class="text-uppercase small text-danger fw-light poppins letter-spacing mb-4">
              Car service website 
            </h4>
            <p class="fw-light text-secondary poppins mb-4">

              At <span class="fw-bolder">CarMedics</span>, we are dedicated to providing reliable car service and maintenance for all makes and models. We prioritize quality workmanship and exceptional customer care. From routine maintenance to complex repairs, we strive to ensure your vehicle runs smoothly and safely. Our commitment to transparency and honesty means you can trust us to keep your car in peak condition, allowing you to hit the road with confidence.
            </p>
            <a href="#contact">
              <button
                class="contact-btn mt-2 btn bg-white border border-1 border-black py-2 poppins t-duration">
                Contact us
              </button>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- <a href="washCenters.php">view center</a> -->
    <!-- ============== SERVICES ============== -->
     <!-- car maintenance -->
<section id="services" class="services bg-body-tertiary overflow-auto">
  <div class="container text-center my-5">
    <h2 class="fs-1 montserrat very-bold-headers text-capitalize mb-5">
      services.
      <div class="dotted-bg position-absolute"></div>
    </h2>
    <div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 g-4 pb-5">
      <div class="col">
        <a href="maintanceCenters.php" class="text-decoration-none text-black">
          <div class="card h-100 shadow border-0 px-3 py-4 d-flex flex-column">
            <img src="./imgs/back.jpg" alt="car maintenance" class="w-100 flex-shrink-0">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title text-uppercase my-3 fs-5 text-capitalize bold-headers">Car maintenance</h5>
              <p class="card-text text-body-tertiary mb-4 small poppins">Browse our car centers and book your appointment</p>
              <a href="maintanceCenters.php" class="mt-auto btn btn-primary">View Center</a>
            </div>
          </div>
        </a>
      </div>
      <div class="col">
        <a href="washCenters.php" class="text-decoration-none text-black">
          <div class="card h-100 shadow border-0 px-3 py-4 d-flex flex-column">
            <img src="./imgs/wash.jpeg" alt="car wash" class="w-100 flex-shrink-0">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title text-uppercase my-3 fs-5 text-capitalize bold-headers">Car wash</h5>
              <p class="card-text text-body-tertiary mb-4 small poppins">Keep your car clean, go check our cleaning centers</p>
              <a href="washCenters.php" class="mt-auto btn btn-primary">View Center</a>
            </div>
          </div>
        </a>
      </div>
      <div class="col">
        <a href="handle/breakdownHandle.php" class="text-decoration-none text-black">
          <div class="card h-100 shadow border-0 px-3 py-4 d-flex flex-column">
            <img src="./imgs/accident.jpg" alt="accident" class="w-100 flex-shrink-0">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title text-uppercase my-3 fs-5 text-capitalize bold-headers">Breakdown assistance</h5>
              <p class="card-text text-body-tertiary mb-4 small poppins">Always ready to help you</p>
              <a href="handle/breakdownHandle.php" class="mt-auto btn btn-primary">View Center</a>
            </div>
          </div>
        </a>

      </div>
      <div class="col">
        <a href="AddorRent.php" class="text-decoration-none text-black">
        <div class="card h-100 shadow border-0 px-3 py-4 d-flex flex-column">
          <img src="./imgs/selling.jpeg" alt="car selling" class="w-100 flex-shrink-0">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title text-uppercase my-3 fs-5 text-capitalize bold-headers">Sell or Rent</h5>
            <p class="card-text text-body-tertiary mb-4 small poppins">List your car for sale or renting</p>
            <a href="AddorRent.php" class="mt-auto btn btn-primary">View</a>
          </div>
        </div>
        </a>

      </div>
      <div class="col">
        <a href="Rent_Buy.php" class="text-decoration-none text-black">
                  <div class="card h-100 shadow border-0 px-3 py-4 d-flex flex-column">
          <img src="./imgs/viewcars.jpg" alt="view cars" class="w-100 flex-shrink-0">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title text-uppercase my-3 fs-5 text-capitalize bold-headers">View Cars</h5>
            <p class="card-text text-body-tertiary mb-4 small poppins">View listed cars and find yours</p>
            <a href="Rent_Buy.php" class="mt-auto btn btn-primary">View</a>
          </div>
        </div>
        </a>
      </div>
      <div class="col">
        <a href="handle/eCommerceHandle.php" class="text-decoration-none text-black">

        <div class="card h-100 shadow border-0 px-3 py-4 d-flex flex-column">
          <img src="./imgs/e-comm.jpg" alt="e-commerce" class="w-100 flex-shrink-0">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title text-uppercase my-3 fs-5 text-capitalize bold-headers">E-commerce</h5>
            <p class="card-text text-body-tertiary mb-4 small poppins">Browse the available products</p>
            <a href="handle/eCommerceHandle.php" class="mt-auto btn btn-primary">View</a>
          </div>
        </div>
        </a>
      </div>
    </div>
  </div>
</section>

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
    <script>
      window.embeddedChatbotConfig = {
      chatbotId: "eULljhXZlCQZd7-CbWRDp",
      domain: "www.chatbase.co"
      }
      </script>
      <script
      src="https://www.chatbase.co/embed.min.js"
      chatbotId="eULljhXZlCQZd7-CbWRDp"
      domain="www.chatbase.co"
      defer>
  </script>
  </body>
</html>