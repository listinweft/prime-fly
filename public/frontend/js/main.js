let burger = document.querySelector('.toggle-icon');
let menu_container = document.querySelector('.menu-container');
let backdrop = document.querySelector('.backdrop');

burger.addEventListener('click', function(){
    menu_container.classList.add('active');
    backdrop.classList.add('d-block');
});
backdrop.addEventListener('click', function(){
    menu_container.classList.remove('active');
    backdrop.classList.remove('d-block');
});


const lenis = new Lenis({
    duration: 1,
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t))
});
function raf(time) {
  lenis.raf(time)
  requestAnimationFrame(raf)
}

requestAnimationFrame(raf)