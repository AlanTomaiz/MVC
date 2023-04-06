const sideMenu = document.querySelector('aside');
const menuBtn = document.querySelector('#menu-btn');
const closeBtn = document.querySelector('#close-btn');
const themeToggler = document.querySelector('.theme-toggler');

menuBtn.addEventListener('click', () => {
  sideMenu.style.left = '0';
});

closeBtn.addEventListener('click', () => {
  sideMenu.style.left = 'calc(-100%)';
});

themeToggler.addEventListener('click', () => {
  document.body.classList.toggle('dark-mode');
})