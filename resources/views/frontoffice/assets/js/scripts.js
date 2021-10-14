var $j = jQuery.noConflict(),
    $w = $j(window)

$j(document).ready(function ($) {
  scrollMenuFixed()

  // select2
  const category = $j('.category_id').select2()

  category.on("change", function (e) { removeClassErrorSelect2('partnerCreation', 'category_id') });

  // Block Faq
  $j('.faqs').on('click', '.faq-button', function(){
    this.classList.toggle('is-open')
    const content = this.nextElementSibling
      if (content.style.maxHeight) {
        // accordion is currently open, so close it
        content.style.maxHeight = null
      } else {
        // accordion is currently closed, so open it
        content.style.maxHeight = content.scrollHeight + 'px'
      }
  })
})

function scrollMenuFixed() {
  if ($j(this).scrollTop() > 5) {
    $j('header').addClass('fixed')
  } else {
    $j('header').removeClass('fixed')
  }
}

function removeClassErrorSelect2(form, inputId){
  jQuery(`#${form} #${inputId}`).parents('.block-field').removeClass('is-invalid');
}
window.removeClassErrorSelect2 = removeClassErrorSelect2; 

$w.scroll(function () {
  scrollMenuFixed()
})