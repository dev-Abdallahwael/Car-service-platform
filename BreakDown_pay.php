<?php

session_start();

$planId = $_GET['id'];


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
                class="nav-link text-white montserrat text-capitalize pb-0 px-3 fw-bolder fs-5"
                href="main.html"
                >home</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container mt-5 pt-5">
        <!-- From Uiverse.io by Praashoo7 --> 
         <h1 class="text-center bold-headers">Fill in you card info to continue the payment.</h1>
         <div class="row row-cols-1 row-cols-lg-2 g-5 py-3 px-5">
             <div class="col">
                 <div class="flip-card mt-5">
                     <div class="flip-card-inner">
                         <div class="flip-card-front">
                             <p class="heading_8264">MASTERCARD</p>
                             <svg class="logo" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="36" height="36" viewBox="0 0 48 48">
                             <path fill="#ff9800" d="M32 10A14 14 0 1 0 32 38A14 14 0 1 0 32 10Z"></path><path fill="#d50000" d="M16 10A14 14 0 1 0 16 38A14 14 0 1 0 16 10Z"></path><path fill="#ff3d00" d="M18,24c0,4.755,2.376,8.95,6,11.48c3.624-2.53,6-6.725,6-11.48s-2.376-8.95-6-11.48 C20.376,15.05,18,19.245,18,24z"></path>
                             </svg>
                             <svg version="1.1" class="chip" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 50 50" xml:space="preserve">  <image id="image0" width="50" height="50" x="0" y="0" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAMAAAAp4XiDAAAABGdBTUEAALGPC/xhBQAAACBjSFJN
                             AAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAB6VBMVEUAAACNcTiVeUKVeUOY
                             fEaafEeUeUSYfEWZfEaykleyklaXe0SWekSZZjOYfEWYe0WXfUWXe0WcgEicfkiXe0SVekSXekSW
                             ekKYe0a9nF67m12ZfUWUeEaXfESVekOdgEmVeUWWekSniU+VeUKVeUOrjFKYfEWliE6WeESZe0GS
                             e0WYfES7ml2Xe0WXeESUeEOWfEWcf0eWfESXe0SXfEWYekSVeUKXfEWxklawkVaZfEWWekOUekOW
                             ekSYfESZe0eXekWYfEWZe0WZe0eVeUSWeETAnmDCoWLJpmbxy4P1zoXwyoLIpWbjvXjivnjgu3bf
                             u3beunWvkFWxkle/nmDivXiWekTnwXvkwHrCoWOuj1SXe0TEo2TDo2PlwHratnKZfEbQrWvPrWua
                             fUfbt3PJp2agg0v0zYX0zYSfgkvKp2frxX7mwHrlv3rsxn/yzIPgvHfduXWXe0XuyIDzzISsjVO1
                             lVm0lFitjVPzzIPqxX7duna0lVncuHTLqGjvyIHeuXXxyYGZfUayk1iyk1e2lln1zYTEomO2llrb
                             tnOafkjFpGSbfkfZtXLhvHfkv3nqxH3mwXujhU3KqWizlFilh06khk2fgkqsjlPHpWXJp2erjVOh
                             g0yWe0SliE+XekShhEvAn2D///+gx8TWAAAARnRSTlMACVCTtsRl7Pv7+vxkBab7pZv5+ZlL/UnU
                             /f3SJCVe+Fx39naA9/75XSMh0/3SSkia+pil/KRj7Pr662JPkrbP7OLQ0JFOijI1MwAAAAFiS0dE
                             orDd34wAAAAJcEhZcwAACxMAAAsTAQCanBgAAAAHdElNRQfnAg0IDx2lsiuJAAACLElEQVRIx2Ng
                             GAXkAUYmZhZWPICFmYkRVQcbOwenmzse4MbFzc6DpIGXj8PD04sA8PbhF+CFaxEU8iWkAQT8hEVg
                             OkTF/InR4eUVICYO1SIhCRMLDAoKDvFDVhUaEhwUFAjjSUlDdMiEhcOEItzdI6OiYxA6YqODIt3d
                             I2DcuDBZsBY5eVTr4xMSYcyk5BRUOXkFsBZFJTQnp6alQxgZmVloUkrKYC0qqmji2WE5EEZuWB6a
                             lKoKdi35YQUQRkFYPpFaCouKIYzi6EDitJSUlsGY5RWVRGjJLyxNy4ZxqtIqqvOxaVELQwZFZdkI
                             JVU1RSiSalAt6rUwUBdWG1CP6pT6gNqwOrgCdQyHNYR5YQFhDXj8MiK1IAeyN6aORiyBjByVTc0F
                             qBoKWpqwRCVSgilOaY2OaUPw29qjOzqLvTAchpos47u6EZyYnngUSRwpuTe6D+6qaFQdOPNLRzOM
                             1dzhRZyW+CZouHk3dWLXglFcFIflQhj9YWjJGlZcaKAVSvjyPrRQ0oQVKDAQHlYFYUwIm4gqExGm
                             BSkutaVQJeomwViTJqPK6OhCy2Q9sQBk8cY0DxjTJw0lAQWK6cOKfgNhpKK7ZMpUeF3jPa28BCET
                             amiEqJKM+X1gxvWXpoUjVIVPnwErw71nmpgiqiQGBjNzbgs3j1nus+fMndc+Cwm0T52/oNR9lsdC
                             S24ra7Tq1cbWjpXV3sHRCb1idXZ0sGdltXNxRateRwHRAACYHutzk/2I5QAAACV0RVh0ZGF0ZTpj
                             cmVhdGUAMjAyMy0wMi0xM1QwODoxNToyOSswMDowMEUnN7UAAAAldEVYdGRhdGU6bW9kaWZ5ADIw
                             MjMtMDItMTNUMDg6MTU6MjkrMDA6MDA0eo8JAAAAKHRFWHRkYXRlOnRpbWVzdGFtcAAyMDIzLTAy
                             LTEzVDA4OjE1OjI5KzAwOjAwY2+u1gAAAABJRU5ErkJggg=="></image>
                             </svg>
                             <svg version="1.1" class="contactless" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 50 50" xml:space="preserve">  <image id="image0" width="50" height="50" x="0" y="0" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAQAAAC0NkA6AAAABGdBTUEAALGPC/xhBQAAACBjSFJN
                             AAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAJcEhZ
                             cwAACxMAAAsTAQCanBgAAAAHdElNRQfnAg0IEzgIwaKTAAADDklEQVRYw+1XS0iUURQ+f5qPyjQf
                             lGRFEEFK76koKGxRbWyVVLSOgsCgwjZBJJYuKogSIoOonUK4q3U0WVBWFPZYiIE6kuArG3VGzK/F
                             fPeMM/MLt99/NuHdfPd888/57jn3nvsQWWj/VcMlvMMd5KRTogqx9iCdIjUUmcGR9ImUYowyP3xN
                             GQJoRLVaZ2DaZf8kyjEJALhI28ELioyiwC+Rc3QZwRYyO/DH51hQgWm6DMIh10KmD4u9O16K49it
                             VoPOAmcGAWWOepXIRScAoJZ2Frro8oN+EyTT6lWkkg6msZfMSR35QTJmjU0g15tIGSJ08ZZMJkJk
                             HpNZgSkyXosS13TkJpZ62mPIJvOSzC1bp8vRhhCakEk7G9/o4gmZdbpsTcKu0m63FbnBP9Qrc15z
                             bkbemfgNDtEOI8NO5L5O9VYyRYgmJayZ9nPaxZrSjW4+F6Uw9yQqIiIZwhp2huQTf6OIvCZyGM6g
                             DJBZbyXifJXr7FZjGXsdxADxI7HUJFB6iWvsIhFpkoiIiGTJfjJfiCuJg2ZEspq9EHGVpYgzKqwJ
                             qSAOEwuJQ/pxPvE3cYltJCLdxBLiSKKIE5HxJKcTRNeadxfhDiuYw44zVs1dxKwRk/uCxIiQkxKB
                             sSctRVAge9g1E15EHE6yRUaJecRxcWlukdRIbGFOSZCMWQA/iWauIP3slREHXPyliqBcrrD71Amz
                             Z+rD1Mt2Yr8TZc/UR4/YtFnbijnHi3UrN9vKQ9rPaJf867ZiaqDB+czeKYmd3pNa6fuI75MiC0uX
                             XSR5aEMf7s7a6r/PudVXkjFb/SsrCRfROk0Fx6+H1i9kkTGn/E1vEmt1m089fh+RKdQ5O+xNJPUi
                             cUIjO0Dm7HwvErEr0YxeibL1StSh37STafE4I7zcBdRq1DiOkdmlTJVnkQTBTS7X1FYyvfO4piaI
                             nKbDCDaT2anLudYXCRFsQBgAcIF2/Okwgvz5+Z4tsw118dzruvIvjhTB+HOuWy8UvovEH6beitBK
                             xDyxm9MmISKCWrzB7bSlaqGlsf0FC0gMjzTg6GgAAAAldEVYdGRhdGU6Y3JlYXRlADIwMjMtMDIt
                             MTNUMDg6MTk6NTYrMDA6MDCjlq7LAAAAJXRFWHRkYXRlOm1vZGlmeQAyMDIzLTAyLTEzVDA4OjE5
                             OjU2KzAwOjAw0ssWdwAAACh0RVh0ZGF0ZTp0aW1lc3RhbXAAMjAyMy0wMi0xM1QwODoxOTo1Nisw
                             MDowMIXeN6gAAAAASUVORK5CYII="></image>
                             </svg>
                             <p class="number">9759 2484 5269 6576</p>
                             <p class="valid_thru">VALID THRU</p>
                             <p class="date_8264">1 2 / 2 4</p>
                             <p class="name">BRUCE WAYNE</p>
                         </div>
                         <div class="flip-card-back">
                             <div class="strip"></div>
                             <div class="mstrip"></div>
                             <div class="sstrip">
                             <p class="code">***</p>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="fs-5"> 
                    <h3 class="fw-bold mt-3">Steps :</h3>
                     <ul>Enter Your Name</ul>
                     <ul>Enter Your Card number</ul>
                     <ul>Enter Your CVV</ul>
                     <ul>Enter Your Card valid date</ul>
                 </div>

             </div>

             <div class="col">
           <!-- From Uiverse.io by 3bdel3ziz-T --> 
            <section class="add-card page">
              <h3>
                <?php //echo $_SESSION['Bpay']; ?>
              </h3>
                <form class="form" action="handle/breakdownCheckoutHandle.php?id=<?php echo $planId ?>" method="post">
                <label for="name" class="label">
                    <span class="title">Card holder full name</span>
                    <input
                    class="form-control bg-transparent text-white"
                    type="text"
                    name="name"
                    title="Input title"
                    placeholder="Enter your full name"
                    oninput="validate(this,nameRegex)"
                    />
                    <div class="error d-none text-danger">
                        Name must start with Capital letter followed by 5 letters or more
                    </div>
                </label>
                <label for="serialCardNumber" class="label">
                    <span class="title">Card Number</span>
                    <input
                    id="serialCardNumber"
                    class="form-control bg-transparent text-white"
                    type="number"
                    name="number"
                    title="Input title"
                    placeholder="0000 0000 0000 0000"
                    oninput="validate(this,CardRegex)"
                    />
                    <div class="error d-none text-danger">
                        must be 16 digits no letters or special characters
                    </div>
                </label>
                <div class="split">
                    <label for="ExDate" class="label">
                    <span class="title">Expiry Date</span>
                    <input
                        id="ExDate"
                        class="form-control bg-transparent text-white"
                        type="text"
                        name="date"
                        title="Expiry Date"
                        placeholder="01/23"
                        oninput="validate(this,dateRegex)"

                    />
                    <div class="error d-none text-danger">
                       Check the date to align with this formate mm/dd
                    </div>
                    </label>
                    <label for="cvv" class="label">
                    <span class="title"> CVV</span>
                    <input
                        id="cvv"
                        class="form-control bg-transparent text-white"
                        type="password"
                        name="cvv"
                        title="CVV"
                        placeholder="CVV"
                        maxlength="3"
                        minlength="3"
                        oninput="validate(this,cvvRegex)"

                    />
                    <div class="error d-none text-danger">
                        The Cvv must be 3 digits only 
                     </div>
                    </label>
                </div>
                <input class="checkout-btn" type="submit" name="submit" value="Checkout" />
                </form>
            </section>
  
             </div>        
       
         </div>

    </div>

    <!-- ============== CONTACT ============== -->
    <section id="contact" class="contact overflow-auto bg-body-tertiary">
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
    <script src="./Js/pay.js"></script>

  </body>
</html>