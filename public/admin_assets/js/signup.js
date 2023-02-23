
let email = document.getElementById('email');
let firstName = document.getElementById('firstName');
let lastName = document.getElementById('lastName');
let password = document.getElementById('password');
let cpassword = document.getElementById('cPassword');
let terms = document.getElementById('terms&Condition');
let privacy = document.getElementById('privacyPolicy');


function signupValid() {

    let is_success = false;
    let error = 0;
    let mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if (email.value != "") {
        showErr(email, "");
    } else {
        error = 1;
        showErr(email, 'Please enter email');
    }
    if (email.value.match(mailformat)) {
        showErr(email, "");
    } else {
        error = 1;
        showErr(email, 'Please enter valid email');
    }

    if (firstName.value != "") {
        showErr(firstName, "");
    } else {
        error = 1;
        showErr(firstName, 'Please enter first name');
    }


    if (lastname.value != "") {
        showErr(lastname, "");
    } else {
        error = 1;
        showErr(lastname, 'Please enter last name');
    }

    if (password.value != "") {
        showErr(password, "");
    } else {
        error = 1;
        showErr(password, 'Please enter password');
    }

    // if (password.value.length >= 6) {
    //     showErr(password, "");
    // } else {
    //     error = 1;
    //     showErr(password, 'Please enter minimum 6 character password');
    // }


    if (cPassword.value != "") {
        showErr(cPassword, "");
    } else {
        error = 1;
        showErr(cPassword, 'Please enter confirm password');
    }
    if (terms.checked) {
        $('#termserr').css('display', 'none');
    } else {
        error = 1;
        $('#termserr').css('display', 'block');
    }


    if (privacy.checked) {
        $('#privacyerr').css('display', 'none');

    } else {
        error = 1;
        $('#privacyerr').css('display', 'block');

    }
    //final check
    if (error == 0) {
        is_success = true;
    }
    if (is_success) {
        return true;
    } else {
        return false;
    }
}

function appendBefore(el, newNode) {
    el.parentNode.insertBefore(newNode, el);
}

function appendAfter(el, newNode) {
    el.parentNode.insertBefore(newNode, el.nextSibling);
}

function showErr(el, msg) {
    el.nextElementSibling.innerHTML = `${msg}`;
}
