const navbar = document.querySelector(".navbar");
const hamToggle = document.querySelector(".navbar-dark .navbar-toggler");
const logo = document.querySelector(".navbar .navbar-brand img");
const hotelName = document.querySelector(".hotel-name");
const hotelNameUnhidden = document.querySelector(".navbar p");
const sectionOne = document.querySelector(".landing");
const gallery = document.querySelector("#gallery");
const sliders = document.querySelector(".jumbotron");
var resizePossible;

const sectionOneOptions = {
  rootMargin: "-100px 0px 0px 0px",
};

function resize() {
  if (window.innerWidth < 768 && resizePossible == 1) {
    logo.classList.add("sized-down");
  } else if (window.innerWidth > 768 && resizePossible == 1) {
    logo.classList.remove("sized-down");
  }
    if (window.innerWidth < 768) {
    gallery.style.width = "100%";
    sliders.classList.remove("narrow");
  } else if (window.innerWidth > 768) {
    gallery.style.width = "75%";
    sliders.classList.add("narrow");
  }
  if (window.innerWidth < 372) {
    hotelNameUnhidden.style.fontSize = "1rem";
  } else if (window.innerWidth > 372) {
    hotelNameUnhidden.style.fontSize = "1.2rem";
  }
  if (window.innerWidth < 342) {
    hotelNameUnhidden.style.fontSize = "0.8rem";
  }
}

const sectionOneObserver = new IntersectionObserver(function (
  entries,
  sectionOneObserver
) {
  entries.forEach((entry) => {
    if (!entry.isIntersecting) {
      navbar.classList.add("scrolled");
      $(".navbar-dark .navbar-nav .nav-link").toggleClass("dark");
      hamToggle.classList.add("dark");
      logo.classList.add("sized-down");
      resizePossible = 0;
      hotelName.classList.add("unhidden");
      logo.src = "img/logo_new.png";
    } else {
      navbar.classList.remove("scrolled");
      $(".navbar-dark .navbar-nav .nav-link").removeClass("dark");
      hamToggle.classList.remove("dark");
      hotelName.classList.remove("unhidden");
      if (window.innerWidth > 768) {
        logo.classList.remove("sized-down");
      }
      if (window.innerWidth < 768) {
        logo.classList.add("sized-down");
      }
      resizePossible = 1;
      logo.src = "img/logo_new_white.png";
    }
  });
},
sectionOneOptions);

sectionOneObserver.observe(sectionOne);
window.onresize = resize;
window.onload = resize;