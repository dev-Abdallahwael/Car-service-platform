    
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

var nameInput = document.getElementById("name");
var nameRegex = /^[A-Z][a-z]+(?: [A-Z][a-z]+)*$/;
var EmailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
var PhoneNum =/^01[0-9]{9}$/;
function validate(element,regex){
    if(regex.test(element.value)){
        element.classList.add("is-valid");
        element.classList.remove("is-invalid");
        element.nextElementSibling.classList.add("d-none");
        return true;
    }
    element.classList.remove("is-valid");
    element.classList.add("is-invalid");
    element.nextElementSibling.classList.remove("d-none");
    return false;
}
