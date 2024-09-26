
"use strict"

// for show password 
let createpassword = (type, ele) => {
    document.getElementById(type).type = document.getElementById(type).type == "password" ? "text" : "password"
    let icon = ele.childNodes[0].classList
    let stringIcon = icon.toString()
    if (stringIcon.includes("ri-eye-line")) {
        ele.childNodes[0].classList.remove("ri-eye-line")
        ele.childNodes[0].classList.add("ri-eye-off-line")
    }
    else {
        ele.childNodes[0].classList.add("ri-eye-line")
        ele.childNodes[0].classList.remove("ri-eye-off-line")
    }
}


let validatePassword = () => {
    alert('hh');
    var password = document.getElementById('signup-password').value;
    var confirmPassword = document.getElementById('signup-confirmpassword').value;
    var errorDiv = document.getElementById('password-match-error');

    if (password !== confirmPassword) {
        errorDiv.style.display = 'block';
        return false;
    } else {
        errorDiv.style.display = 'none';
        return true;
    }
};