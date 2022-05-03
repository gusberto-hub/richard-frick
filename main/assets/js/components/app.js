"use strict";

const navigation = document.querySelector("nav");
const header = document.querySelector("header");
const navButtonMobile = document.querySelector(".nav-header button");
const menuItemsLv1 = document.querySelectorAll(".submenu-handler");
const root = document.documentElement;
let touchDevice = false;
const body = document.querySelector("body");

function resetHeight() {
  const viewportHeight = window.innerHeight + "px";
  document.querySelector("body").style.height = viewportHeight;
  root.style.setProperty("--viewport-height", viewportHeight);
}
resetHeight();

setTimeout(() => (body.className = ""), 500);

navButtonMobile.onclick = () => {
  header.classList.toggle("nav-open");
};

// Accordions
function accordionsControl() {
  for (let menuItemLv1 of menuItemsLv1) {
    menuItemLv1.onclick = (el) => {
      const clickedEl = el.target.parentNode;
      clickedEl.classList.toggle("open-menu");
      clickedEl.style.animationDuration = "2s !important";
      for (let sibling of clickedEl.parentNode.children) {
        if (sibling !== clickedEl) {
          sibling.classList.remove("open-menu");
          sibling.childNodes[1].classList.remove("nav-current");
        }
      }
    };
  }

  // for (let itemLv2 of menuItemsLv2) {
  //   console.log(itemLv2.parentNode.scrollHeight);
  //   // itemLv2.parentNode.parentNode.parentNode.style.setProperty(
  //   //   "--accordion-height",
  //   //   itemLv2.parentNode.scrollHeight + "px"
  //   // );

  //   itemLv2.onclick = (el) => {
  //     const clickedEl = el.target.parentNode;
  //     clickedEl.classList.toggle("open-menu");

  //     if (clickedEl.classList.contains("open-menu")) {
  //       clickedEl.parentNode.parentNode.style.setProperty(
  //         "--accordion-height",
  //         itemLv2.parentNode.scrollHeight + 20 + "px"
  //       );
  //     } else {
  //       clickedEl.parentNode.parentNode.style.setProperty(
  //         "--accordion-height",
  //         `${2 * 1.6 + 0.1}em`
  //       );
  //     }

  //     // for (let sibling of clickedEl.parentNode.children) {
  //     //   if (sibling !== clickedEl) sibling.classList.remove("open-menu");
  //     // }
  //   };
  // }
}
accordionsControl();

window.onresize = () => {
  resetHeight();
  body.className = "preload";
  setTimeout(() => (body.className = ""), 1000);
};

const carousel = document.querySelector(".swiper");
if (carousel && carousel.querySelectorAll(".swiper-slide").length > 1) {
  carousel.querySelector(".change-slide-btns").style.visibility = "visible";
  const swiper = new Swiper(carousel, {
    loop: true,

    pagination: {
      el: ".swiper-pagination",
      type: "fraction",
    },

    navigation: {
      nextEl: ".swipe-next",
      prevEl: ".swipe-prev",
    },
    keyboard: true,
  });

  const swiperPagination = document.querySelector(".swiper-pagination-current");
  swiperPagination && (swiperPagination.nextSibling.textContent = " | ");

  let activeSlide = document.querySelector(".swiper-slide-active");
  let swipeTitle = document.querySelector(".swiper-name");
  swipeTitle && (swipeTitle.innerText = activeSlide.getAttribute("swipetitle"));

  swiper.on("slideChangeTransitionStart", () => {
    activeSlide = document.querySelector(".swiper-slide-active");
    swipeTitle = document.querySelector(".swiper-name");
    swipeTitle &&
      (swipeTitle.innerText = activeSlide.getAttribute("swipetitle"));
  });
}
