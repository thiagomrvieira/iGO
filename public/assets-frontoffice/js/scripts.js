/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************************************!*\
  !*** ./resources/views/frontoffice/assets/js/scripts.js ***!
  \**********************************************************/
var $j = jQuery.noConflict(),
    $w = $j(window);
$j(document).ready(function ($) {
  scrollMenuFixed(); // select2

  var category = $j('.category_id').select2();
  var county = $j('.county_id').select2({
    dropdownCssClass: "county_select2_dropdown"
  }); // $("#myBox").select2({ containerCssClass : "error" });

  category.on("change", function (e) {
    removeClassErrorSelect2('partnerCreation', 'category_id');
  });
  county.on("change", function (e) {
    removeClassErrorSelect2('partnerCreation', 'county_id');
  }); // Block Faq

  $j('.faqs').on('click', '.faq-button', function () {
    this.classList.toggle('is-open');
    var content = this.nextElementSibling;

    if (content.style.maxHeight) {
      // accordion is currently open, so close it
      content.style.maxHeight = null;
    } else {
      // accordion is currently closed, so open it
      content.style.maxHeight = content.scrollHeight + 'px';
    }
  }); // Close modal

  var modal = $j('.modal');
  modal.on('click', function () {
    modal.find('.partner-error .partner-error-company').html('');
    modal.find('.partner-error .partner-error-email').html('');
    modal.find('.delivery-error .delivery-error-email').html('');
    $j(this).removeClass('show-partner-success show-partner-error show-delivery-success show-delivery-error');
  }); // Add color border

  $j("form#partnerCreation :input").each(function () {
    $j(this).on('keyup', function () {
      if ($j(this).val() != "") {
        $j(this).parents('.block-field').addClass("block-field-active");
      } else {
        $j(this).parents('.block-field').removeClass("block-field-active");
      }
    });
  });
});

function scrollMenuFixed() {
  if ($j(this).scrollTop() > 5) {
    $j('header').addClass('fixed');
  } else {
    $j('header').removeClass('fixed');
  }
} // Remove error message from the select2 on the partners form


function removeClassErrorSelect2(form, inputId) {
  jQuery("#".concat(form, " #").concat(inputId)).parents('.block-field').removeClass('is-invalid');
}

window.removeClassErrorSelect2 = removeClassErrorSelect2;
$w.scroll(function () {
  scrollMenuFixed();
});
/******/ })()
;