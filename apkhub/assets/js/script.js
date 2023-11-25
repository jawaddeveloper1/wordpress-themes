const swiper = new Swiper('.swiper', {
    loop: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });

const hamburgerbtn = document.querySelector('.apkhub-hamburger');
const overlay = document.querySelector('.apkhub-nav-overlay');
const menu = document.getElementById('primary-menu');

hamburgerbtn.addEventListener('click',function(){
  menu.classList.add('apkhub-mobilemenu');
  overlay.classList.add('apkhub-nav-overlay-open');
});

overlay.addEventListener('click',function(){
  menu.classList.remove('apkhub-mobilemenu');
  overlay.classList.remove('apkhub-nav-overlay-open');
});