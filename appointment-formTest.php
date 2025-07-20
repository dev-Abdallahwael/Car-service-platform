
<?php 

session_start();

if(isset($_GET['id']) && isset($_SESSION['user_id'])){

    $id = $_GET['id'];
    $_SESSION['centerId'] = $id;
}else{
    header("location:login.php");
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .appointment-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }
        .appointment-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group textarea {
            resize: vertical;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #218838;
        }
        .success-message {
            display: none;
            margin-top: 20px;
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            text-align: center;
        }
    </style>
    <!-- jsPDF Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</head>
<body>

    <div class="appointment-form">
        <h2>Book an Appointment</h2>
        <form id="appointmentForm" action="handle/appointmentHandle.php" method="post">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="date">Preferred Appointment Date</label>
                <input type="date" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="time">Preferred Time</label>
                <input type="time" id="time" name="time" required>
            </div>
            <div class="form-group">
                <label for="service">Service Required</label>
                <select id="service" name="service" required>
                    <option value="Car Maintenance">Car Maintenance</option>
                    <option value="Oil Change">Oil Change</option>
                    <option value="Brake Service">Brake Service</option>
                    <option value="Tire Rotation">Tire Rotation</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group other-service" id="other-service-input" style="display: none;">
                <label for="otherService">Please specify the service</label>
                <input type="text" id="otherService" name="otherService">
            </div>
            <div class="form-group">
                <label for="message">Additional Notes</label>
                <textarea id="message" name="message" rows="4"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" name="submit">Submit Appointment</button>
            </div>
        </form>
        <div class="success-message" id="successMessage">Appointment submitted successfully! Click below to download your receipt.</div>
    </div>

    <h1>
        <?php
            if(isset($_SESSION['invoices'])){
                echo $_SESSION['invoices'];
            }
        ?>
    </h1>

    <script>
        // Function to store the appointment in local storage and show success message
        function submitForm() {
            const appointment = {
                name: document.getElementById("name").value,
                email: document.getElementById("email").value,
                phone: document.getElementById("phone").value,
                date: document.getElementById("date").value,
                time: document.getElementById("time").value,
                service: document.getElementById("service").value,
                otherService: document.getElementById("otherService").value,
                message: document.getElementById("message").value
            };

            // Save the appointment in local storage
            let appointments = JSON.parse(localStorage.getItem('appointments')) || [];
            appointments.push(appointment);
            localStorage.setItem('appointments', JSON.stringify(appointments));

            // Show the success message
            document.getElementById("successMessage").style.display = "block";

            // Generate and download the receipt
            downloadReceipt(appointments.length - 1); // Download the receipt for the last appointment

            // Clear the form
            document.getElementById("appointmentForm").reset();
        }

        // Function to download the receipt as a PDF for the latest appointment
        function downloadReceipt(index) {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            // Fetch appointments from local storage
            let appointments = JSON.parse(localStorage.getItem('appointments')) || [];
            let appointment = appointments[index];

            // Format the content for the PDF
            doc.text("Appointment Receipt", 20, 20);
            doc.text(`Full Name: ${appointment.name}`, 20, 30);
            doc.text(`Email Address: ${appointment.email}`, 20, 40);
            doc.text(`Phone Number: ${appointment.phone}`, 20, 50);
            doc.text(`Appointment Date: ${appointment.date}`, 20, 60);
            doc.text(`Preferred Time: ${appointment.time}`, 20, 70);
            doc.text(`Service Required: ${appointment.service || appointment.otherService}`, 20, 80);
            doc.text(`Additional Notes: ${appointment.message}`, 20, 90);

            // Save the PDF with a unique file name
            doc.save(`appointment-receipt-${index + 1}.pdf`);
        }

        // Show or hide the other service input based on selection
        document.getElementById("service").addEventListener("change", function() {
            document.getElementById("other-service-input").style.display = this.value === "Other" ? "block" : "none";
        });
    </script>

</body>
</html>
