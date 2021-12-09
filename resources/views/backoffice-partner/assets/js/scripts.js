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
    console.log(path);
    const last = path[path.length - 1]
    if (path.length >= 1 && path[0] !== '') {
      $(this).parent().prev().text(last);
    }
  });

  // input partner images 01
  $j('.form-group #image-01').on('change', function(){
    const path = $( this ).val().split('\\'); 
    const last = path[path.length - 1]
    if (path.length >= 1 && path[0] !== '') {
      $(this).parent().prev().text(last);
    }
  });

  // input partner images 02
  $j('.form-group #image-02').on('change', function(){
    const path = $( this ).val().split('\\'); 
    const last = path[path.length - 1]
    if (path.length >= 1 && path[0] !== '') {
      $(this).parent().prev().text(last);
    }
  });

  // input partner images 03
  $j('.form-group #image-03').on('change', function(){
    const path = $( this ).val().split('\\'); 
    const last = path[path.length - 1]
    if (path.length >= 1 && path[0] !== '') {
      $(this).parent().prev().text(last);
    }
  });

  // Add color border
	$j("form#formProfileData :input").each(function(){
		inputBorders(this);
    $j(this).on('keyup', function(){
			inputBorders(this);
		})
	});
})

// Add color border function
function inputBorders(val) {
  if ($j(val).val() != "") {
    $j(val).closest('.block-form-group').addClass("block-field-active");
  } else {
    $j(val).closest('.block-form-group').removeClass("block-field-active");
  }
}

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