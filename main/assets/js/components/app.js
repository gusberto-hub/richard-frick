"use strict";

const navigation = document.querySelector("nav");
const header = document.querySelector("header");
const navButtonMobile = document.querySelector(".nav-header button");
const menuItemsLv1 = document.querySelectorAll(".submenu-handler");
const root = document.documentElement;
let touchDevice = false;

function resetHeight() {
  const viewportHeight = window.innerHeight + "px";
  document.querySelector("body").style.height = viewportHeight;
  root.style.setProperty("--viewport-height", viewportHeight);
}
resetHeight();

navButtonMobile.onclick = () => {
  header.classList.toggle("nav-open");
};

// Accordions
function accordionsControl() {
  for (let menuItemLv1 of menuItemsLv1) {
    const listItem = menuItemLv1.parentNode;
    if (listItem.childNodes.length > 2) {
      let heightMenuOpen = 0;
      setTimeout(() => {
        heightMenuOpen = listItem.scrollHeight;
        listItem.style.setProperty(
          "--accordion-height",
          listItem.scrollHeight + "px"
        );
      }, 100);

      menuItemLv1.onclick = (el) => {
        const clickedEl = el.target.parentNode;
        clickedEl.classList.toggle("open-menu");
        for (let sibling of clickedEl.parentNode.children) {
          if (sibling !== clickedEl) sibling.classList.remove("open-menu");
        }
      };
    }
  }
}
accordionsControl();

window.onresize = () => {
  resetHeight();
  accordionsControl();
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
  });

  const swiperPagination = document.querySelector(".swiper-pagination-current");
  swiperPagination ? (swiperPagination.nextSibling.textContent = " | ") : "";

  swiper.on("slideChangeTransitionStart", () => {
    const activeSlide = document.querySelector(".swiper-slide-active");
    const swipeTitle = document.querySelector(".swiper-name");
    swipeTitle
      ? (swipeTitle.innerText = activeSlide.getAttribute("swipetitle"))
      : "";
  });
}
