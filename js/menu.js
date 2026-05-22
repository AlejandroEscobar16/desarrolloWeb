/*
let menuHamburguesa = document.querySelector('.nav__logo');

menuHamburguesa.addEventListener('click', ()=>{
    let menu = document.querySelector('.menu');

    menu.classList.toggle('menu--show');
});
*/

let menuHamburguesa = document.querySelector('.nav__logo');
let menuHamburguesa2 = document.querySelector('.menu');

menuHamburguesa.addEventListener('click', ()=>{
    let menu = document.querySelector('.menu');

    menu.classList.toggle('menu--show');
});

menuHamburguesa2.addEventListener('click', ()=>{
    let menu = document.querySelector('.menu--show');

    menu.classList.toggle('menu--show');

});
