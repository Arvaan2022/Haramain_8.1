
let email = document.getElementById('email');
// let password = document.getElementById('password');



function loginValid() {
    let is_success = false;
    let error = 0;


    if (email.value != "") {
        showErr(email, "");
    } else {
        error = 1;
        showErr(email, 'Please enter email');
    }


    // if (password.value != "") {
    //     showErr(password, "");
    // } else {
    //     error = 1;
    //     showErr(password, 'Please enter password');
    // }


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
