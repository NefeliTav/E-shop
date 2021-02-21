//modal pop up
window.onload = function () {

    var modal = document.getElementById("myModal");
    var btn = document.getElementById("login");
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function () {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    var btn2 = document.getElementById("signup");

    //when the user clicks on "make account"-> close modal and open new one 
    btn2.onclick = function () {
        modal.style.display = "none";
        var modal2 = document.getElementById("myModal2");
        modal2.style.display = "block";
        var span2 = document.getElementById("close");
        span2.onclick = function () {
            modal2.style.display = "none";
        }
        window.onclick = function (event) {
            if (event.target == modal2) {
                modal2.style.display = "none";
            }
        }
    }

};

//show password
function show_password(id1, id2) {
    var x = document.getElementById(id1);

    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }

    if (id2 !== undefined) {
        var y = document.getElementById(id2);
        if (y.type === "password") {
            y.type = "text";
        } else {
            y.type = "password";
        }
    }
}

//password strength
$(document).ready(function () {
    $('.password-field input').keyup(function () {
        var strength = checkPasswordStrength($(this).val());
        var $outputTarget = $(this).parent('.password-field');

        $outputTarget.removeClass(function (index, css) {
            return (css.match(/\level\S+/g) || []).join(' ');
        });

        $outputTarget.addClass('level' + strength);
    });
});

function checkPasswordStrength(password) {
    var strength = 0;

    // If password is 6 characters or longer
    if (password.length >= 6) {
        strength += 1;
    }

    // If password contains both lower and uppercase characters, increase strength value.
    if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
        strength += 1;
    }

    // If it has numbers and characters, increase strength value.
    if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) {
        strength += 1;
    }

    return strength;
}

//check if passwords match
var check_match = function () {
    if (document.getElementById('myInput1').value !==
        document.getElementById('myInput2').value) {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'not matching';
    } else {
        document.getElementById('message').innerHTML = '';
    }
}

//show hamburger
function show_hamburger() {
    var x = document.getElementById("topnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
function openSideNav() {
    document.getElementById("myNav").style.width = "100%";
}

function closeSideNav() {
    document.getElementById("myNav").style.width = "0%";
}
