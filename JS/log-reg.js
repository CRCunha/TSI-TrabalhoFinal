function log() {
    var log = document.querySelector("#register-form");
    var reg = document.querySelector("#login-form");

    reg.style.display = "flex";
    log.style.display = "none";
}

function reg() {
    var log = document.querySelector("#register-form");
    var reg = document.querySelector("#login-form");

    reg.style.display = "none";
    log.style.display = "flex";
}