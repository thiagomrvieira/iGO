const { unset } = require("lodash")

var $j = jQuery.noConflict(),
    $w = $j(window)

$j(document).ready(function ($) {
  scrollMenuFixed()

  $j('.block-accordion').on('click', '.accordion-button', function(){
    this.classList.toggle('is-open')
  });

  // input partner images cover
  $j('.form-group #image-cover').on('change', function(){
    const path = $( this ).val().split('\\'); 
    const last = path[path.length - 1]
    $( this ).parent().prev().text( last );
  });

  // input partner images 01
  $j('.form-group #image-01').on('change', function(){
    const path = $( this ).val().split('\\'); 
    const last = path[path.length - 1]
    $( this ).parent().prev().text( last );
  });

  // input partner images 02
  $j('.form-group #image-02').on('change', function(){
    const path = $( this ).val().split('\\'); 
    const last = path[path.length - 1]
    $( this ).parent().prev().text( last );
  });

  // input partner images 03
  $j('.form-group #image-03').on('change', function(){
    const path = $( this ).val().split('\\'); 
    const last = path[path.length - 1]
    $( this ).parent().prev().text( last );
  });
  
})

function showImageName(val) {
  alert(val);
}
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