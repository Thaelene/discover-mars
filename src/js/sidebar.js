// CREATE EVERY NEEDED VARIABLES

var animation = {};
    animation.about  = document.querySelector('.menuButton'),
    animation.quit   = document.querySelector('.menuQuit'),
    animation.box    = document.querySelector('.menu'),
    animation.isOpen = false;

// EVENT ON CLICK TO SHOW/UNSHOW MENU

animation.about.addEventListener('click', function()
{
    if (animation.isOpen == false)
    {
        animation.box.classList.remove('anim-quit');
        animation.box.className += " anim-menu";
        animation.isOpen = true;
    }
});

animation.quit.addEventListener('click', function()
{
    if (animation.isOpen == true)
    {
        animation.box.classList.remove('anim-menu');
        animation.box.className += " anim-quit";
        animation.isOpen = false;
    }
});
