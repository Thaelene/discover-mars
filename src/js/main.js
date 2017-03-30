// LOADER ON DASHBOARD PAGE
var loader = document.querySelector('.loader-wrapper');
document.addEventListener("DOMContentLoaded", function(event) {
    function fadeOut(el){
        el.style.opacity = 1;

        (function fade() {
            if ((el.style.opacity -= .1) < 0) {
                el.style.display = 'none';
            } else {
                requestAnimationFrame(fade);
            }
        })();
    }
    fadeOut(loader);
});
