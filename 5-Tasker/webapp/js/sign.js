const target = document.getElementById("sign-up");
const hide = document.getElementById("standard");
const btn_1 = document.getElementById("sign");
function activateSign() {
    document.getElementById("standard").style.display = "none";
    document.getElementById("sign-up").style.display = "block";
};

function activateLog() {
    document.getElementById("standard").style.display = "none";
    document.getElementById("log-in").style.display = "block";
}