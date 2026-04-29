let menuHamburguesa = document.querySelector('.nav__logo');

menuHamburguesa.addEventListener('click', ()=>{
    let menu = document.querySelector('.menu');

    menu.classList.toggle('menu--show');
});

