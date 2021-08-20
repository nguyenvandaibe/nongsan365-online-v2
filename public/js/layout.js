$(document).ready(function() {
    makeFullHeight();
});

function makeFullHeight() {
    let headerBox = document.querySelector("header");
    let mainBox = document.querySelector("main");
    let mainBoxHeight = window.innerHeight - headerBox.clientHeight;
    mainBox.style.minHeight = mainBoxHeight + "px";
}
