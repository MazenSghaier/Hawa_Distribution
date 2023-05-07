// JS code to hide and show the pagination based on the width of the screen
window.addEventListener('resize', function () {
  if (window.innerWidth <= 576) {
    document.querySelector('.pagination').style.display = 'none';
  } else {
    document.querySelector('.pagination').style.display = 'flex';
  }
});

// JS code to hide and show the

let navbar = document.querySelector('.navbar');

$(document).ready(function(){
   $('.menu-icons').click(function(){
     $('.nav-menu').toggleClass('active');
     $('.menu-icons i').toggleClass('fa-times fa-bars');
   });
 });
 
 
var swiper = new Swiper(".home-slider", {
   loop:true,
   navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
   },
   autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
  effect: 'fade', // or 'slide' or 'cube', etc.
    // other options...
  speed: 1500,
 });

