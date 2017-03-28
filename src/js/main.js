var menu = document.querySelector('.fa-bars');
var quit = document.querySelector('.fa-times');

var menuBox = document.querySelector('.menu');

var isOpen = false;

menu.addEventListener('click', function()
{
    if (isOpen == false)
    {
        menuBox.classList.remove('anim-quit');
        menuBox.className += " anim-menu";
        isOpen = true;
    }
});

quit.addEventListener('click', function()
{
    if (isOpen == true)
    {
        menuBox.classList.remove('anim-menu');
        menuBox.className += " anim-quit";
        isOpen = false;
    }
});
