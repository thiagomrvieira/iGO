/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************************************!*\
  !*** ./resources/views/frontoffice/assets/js/scripts.js ***!
  \**********************************************************/
var $j = jQuery.noConflict(),
    $w = $j(window);
$j(document).ready(function ($) {
  scrollMenuFixed(); // select2

  $j('.category_id').select2(); // Block Faq

  var items = document.querySelectorAll('.faqs button');

  function toggleAccordion() {
    var itemToggle = this.getAttribute('aria-expanded');

    for (i = 0; i < items.length; i++) {
      items[i].setAttribute('aria-expanded', 'false');
    }

    if (itemToggle == 'false') {
      this.setAttribute('aria-expanded', 'true');
    }
  }

  items.forEach(function (item) {
    return item.addEventListener('click', toggleAccordion);
  });
  console.log(items); //   for (i = 0; i < items.length; i++) {
  // 	items[i].addEventListener("click", function() {
  // 	  this.classList.toggle("active");
  // 	  var faqContent = this.nextElementSibling;
  // 	  if (faqContent.style.maxHeight) {
  // 		faqContent.style.maxHeight = null;
  // 	  } else {
  // 		faqContent.style.maxHeight = faqContent.scrollHeight + "px";
  // 	  } 
  // 	});
  //   }
});

function scrollMenuFixed() {
  if ($j(this).scrollTop() > 5) {
    $j('header').addClass('fixed');
  } else {
    $j('header').removeClass('fixed');
  }
}

$w.scroll(function () {
  scrollMenuFixed();
});
/******/ })()
;