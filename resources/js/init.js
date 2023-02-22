// App initializers (Menu,...)
//Hamburger Menubar
const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");
// import Post from './post.bundle.js';

if (hamburger) hamburger.addEventListener("click", mobileMenu);

function mobileMenu() {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
}

const navLink = document.querySelectorAll(".nav-link");

if (navLink) {
    navLink.forEach(n => n.addEventListener("click", closeMenu));
}
function closeMenu() {
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");
}

document.getElementById("menuDropdownFunction").addEventListener('click', function () {
    document.getElementById("menuDropdown").classList.toggle("show");
})
