var buttons = document.querySelectorAll(".icobtn");
var messageDiv = document.getElementById("message-box");

buttons.forEach(button => {
    button.addEventListener("click", (event) => {
        event.preventDefault(); // Prevents page reload if inside a link or form
        messageDiv.style.display = "block";
        setTimeout(() => messageDiv.style.display = "none", 2000);
    });
});
