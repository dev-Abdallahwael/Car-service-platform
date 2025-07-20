var nameRegex = /^[A-Z][a-z]+(?: [A-Z][a-z]+)*$/;
var CardRegex = /^\d{16}$/;
var cvvRegex =/^\d{3}$/;
var dateRegex= /^(0[1-9]|1[0-2])\/\d{2}$/;
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