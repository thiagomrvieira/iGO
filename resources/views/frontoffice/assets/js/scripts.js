var $j = jQuery.noConflict(),
  $w = $j(window)

$j(document).ready(function ($) {
  scrollMenuFixed()

  // select2
  $j('.category_id').select2()
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


// Block Faq
var faq = $j('.faq-button')
console.log(faq)
for (var i = 0; i < faq.length; i++) {
  faq[i].onclick = function () {
    this.classList.toggle('is-open')

    var content = this.nextElementSibling
    console.log(content)
    if (content.style.maxHeight) {
      // accordion is currently open, so close it
      content.style.maxHeight = null
    } else {
      // accordion is currently closed, so open it
      content.style.maxHeight = content.scrollHeight + 'px'
    }
  }
}