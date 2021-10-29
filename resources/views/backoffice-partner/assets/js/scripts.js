const { unset } = require("lodash")

var $j = jQuery.noConflict(),
    $w = $j(window)

$j(document).ready(function ($) {
  scrollMenuFixed()

  $j('.block-accordion').on('click', '.accordion-button', function(){
    this.classList.toggle('is-open')
  })
})

function scrollMenuFixed() {
  if ($j(this).scrollTop() > 5) {
    $j('header').addClass('fixed')
  } else {
    $j('header').removeClass('fixed')
  }
}

$w.scroll(function () {
  scrollMenuFixed()
})