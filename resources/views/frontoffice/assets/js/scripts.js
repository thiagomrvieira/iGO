var $j = jQuery.noConflict(),
    $w = $j(window)

$j(document).ready(function ($) {
	$j(document).on('click', 'header .row-fluid .column-right .block-menu-mobile', function(){
		$j('header .row-fluid .column-middle').addClass('showMenu');
	});
	$j(document).on('click', 'header .column-middle .block-close-mobile', function(){
		$j('header .row-fluid .column-middle').removeClass('showMenu');
	});

	scrollMenuFixed()

	// select2
	const category = $j('.category_id').select2();
	const county = $j('.county_id').select2({ dropdownCssClass : "county_select2_dropdown" });
	// $("#myBox").select2({ containerCssClass : "error" });
	category.on("change", function (e) { removeClassErrorSelect2('partnerCreation', 'category_id') });
	county.on("change", function (e) { removeClassErrorSelect2('partnerCreation', 'county_id') });


	// Close modal
	const modal = $j('.modal');
	modal.on('click', function(){
		modal.find('.partner-error .partner-error-company').html('');
		modal.find('.partner-error .partner-error-email').html('');
		modal.find('.delivery-error .delivery-error-email').html('');
		$j(this).removeClass('show-partner-success show-partner-error show-delivery-success show-delivery-error');
	});

	// Add color border
	$j("form#partnerCreation :input").each(function(){
		$j(this).on('keyup', function(){
			if ($j(this).val() != "") {
			$j(this).parents('.block-field').addClass("block-field-active");
			} else {
			$j(this).parents('.block-field').removeClass("block-field-active");
			}
		})
	});

	// Block Faq
	$j(document).on("click", ".block-faqs .block-faqs-list .block-faqs-item .block-faqs-header", function(){        
		$j(this).parent().toggleClass('active').children('.block-faqs-body').stop().slideToggle();
	});

	if(window.location.hash) {
		$j('html, body').animate({
			scrollTop: ($j(window.location.hash).offset().top - $j('header').height() + 40)
		}, 1000, 'swing');
	}
})

function scrollMenuFixed() {
	if ($j(this).scrollTop() > 5) {
		$j('header').addClass('fixed')
	} else {
		$j('header').removeClass('fixed')
	}
}
// Remove error message from the select2 on the partners form
function removeClassErrorSelect2(form, inputId){
	jQuery(`#${form} #${inputId}`).parents('.block-field').removeClass('is-invalid');
}
window.removeClassErrorSelect2 = removeClassErrorSelect2; 

$w.scroll(function () {
	scrollMenuFixed()
})