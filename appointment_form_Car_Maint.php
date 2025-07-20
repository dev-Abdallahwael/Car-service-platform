<?php

session_start();

if(isset($_GET['id'])){
  $centerId = $_GET['id'];
}


?>


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
      <?php require_once "header.php";?>
        
       <!-- MSG-->
          <!-- SUCCESS MESSAGE ALERT -->
<?php if (isset($_SESSION['invoices'])): ?>
    <div class="alert alert-success alert-dismissible fade show text-center mx-auto mt-5 w-75" role="alert">
        <?php echo $_SESSION['invoices']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['invoices']); ?>
<?php endif; ?>

        <!-- MSG -->
                
            
        <div class="appointment-form mt-5 pt-5 container">
            <h2
            class="fs-1 text-center montserrat very-bold-headers text-capitalize mb-5">
            Book your <span class="text-danger">Car maintenance </span> Appointment.
            </h2>
        <form id="appointmentForm" action="handle/appointmentHandle.php?id=<?php echo $centerId; ?>" method="post">
                <div class="row">   

                    <div class="secLeft col-12 col-lg-6 ">
                    <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name" class="form-control" oninput="validate(this, nameRegex)" required>
                            <div class="error d-none text-danger">
                                Name must start with Capital letter followed by 3 letters or more
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control"  oninput="validate(this, EmailRegex)"  required>
                        <div class="error d-none text-danger">
                            Please Enter correct Email address 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" maxlength="11" class="form-control"  oninput="validate(this, PhoneNum)"  required>
                        <div class="error d-none text-danger">
                            Please Enter a correct phone number 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date">Preferred Appointment Date</label>
                        <input type="date" id="date" name="date" class="form-control" required>
                    </div>
                    </div>
                    
                    <div class="secRight col-12 col-lg-6 ">
                        <div class="form-group">
                            <label for="time">Preferred Time</label>
                            <input type="time" id="time" name="time" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="service">Service Required</label>
                            <select id="service" name="service"  class="form-control" required>
                                <option value="Car Maintenance">Full Car Check</option>
                                <option value="Oil Change">Oil Change</option>
                                <option value="Brake Service">Brake Service</option>
                                <option value="Tire Rotation">Tire Rotation</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group other-service" id="other-service-input" style="display: none;">
                            <label for="otherService">Please specify the service</label>
                            <input type="text" id="otherService" class="form-control" name="otherService">
                        </div>
                        <div class="form-group">
                            <label for="message">Additional Notes</label>
                            <textarea id="message" name="message" rows="4" class="form-control"></textarea>
                        </div>
                        
                    </div>

                    <!-- =====>Button -->
                    <div class="form-group d-flex justify-content-center py-5">
                        <button class="btnsub" onclick="bookHandle(this)" id="bookBtn" type="submit" name="submit">
                                <path d="M10,21.236,6.755,14.745.264,11.5,6.755,8.255,10,1.764l3.245,6.491L19.736,11.5l-6.491,3.245ZM18,21l1.5,3L21,21l3-1.5L21,18l-1.5-3L18,18l-3,1.5ZM19.333,4.667,20.5,7l1.167-2.333L24,3.5,21.667,2.333,20.5,0,19.333,2.333,17,3.5Z"></path>
                            </svg>
                            <span class="text">Submit Appointment</span>
                        </button>                        
                    </div>
                </div>                  
        </form>
        <div class="success-message" id="successMessage">Appointment submitted successfully! Click below to download your receipt.</div>
        
        </div>
    <script src="./Js/bootstrap.bundle.min.js"></script> 
    <script src="./Js/form.js"></script>
    <script>
    function bookHandle(button) {
        const alert = document.getElementById('bookBtn');
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

</body>
</html>
