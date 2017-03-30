var curiosity = {};
    curiosity.button = document.querySelector('.curiosityButton'),
    curiosity.introduce = document.querySelector('.introduce'),
    curiosity.img = document.querySelector('.rover'),
    curiosity.content = document.querySelector('.learn-curiosity');

// Event on click to show more about Curiosity

curiosity.button.addEventListener('click', function()
{
    curiosity.introduce.style.display = 'none';
    curiosity.img.style.display = 'none';
    curiosity.content.style.display = 'block';
});
