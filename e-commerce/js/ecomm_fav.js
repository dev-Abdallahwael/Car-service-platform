var buttons = document.querySelectorAll(".icobtn");
var messageDiv = document.getElementById("message-box");
var messageDivDel = document.getElementById("message-del");
var delBtn = document.querySelectorAll(".icodel");

buttons.forEach(button => {
    button.addEventListener("click", (event) => {
        event.preventDefault(); // Prevents page reload if inside a link or form
        messageDiv.style.display = "block";
        setTimeout(() => messageDiv.style.display = "none", 3000);
    });
});


delBtn.forEach(button => {
    button.addEventListener("click", (event) => {
        event.preventDefault(); // Prevents page reload if inside a link or form
        messageDivDel.style.display = "block";
        setTimeout(() => messageDivDel.style.display = "none", 3000);
    });
});
