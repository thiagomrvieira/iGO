/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************************************************!*\
  !*** ./resources/views/backoffice-partner/assets/js/scripts.js ***!
  \*****************************************************************/
var $j = jQuery.noConflict(),
    $w = $j(window);
$j(document).ready(function ($) {
  scrollMenuFixed();
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