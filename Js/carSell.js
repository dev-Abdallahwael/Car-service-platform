var nameRegex = /^[A-Z][a-z]+(?: [A-Z][a-z]+)*$/;
var EmailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
var PhoneNum =/^01[0-9]{9}$/;
var YearRegx =/^(19\d{2}|20[0-2][0-6])$/

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