// CREATE EVERY NEEDED VARIABLES
var curiosity = {};
    curiosity.home = document.querySelector('.container-home'),
        curiosity.button = curiosity.home.querySelector('.curiosityButton');
        curiosity.content = curiosity.home.querySelector('.learn-curiosity');
        curiosity.img = curiosity.home.querySelector('.curiosity-img');


// EVENT ON CLICK TO SHOW MORE INFORMATIONS
curiosity.button.addEventListener('click', function()
{
    curiosity.content.style.display = 'block';
    curiosity.home.classList += ' anim-container';
    curiosity.img.classList += ' anim-img';
    curiosity.content.style.overflow = 'hidden';
});
