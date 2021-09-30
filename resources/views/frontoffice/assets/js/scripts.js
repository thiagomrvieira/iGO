var $j = jQuery.noConflict(),
    $w = $j(window);

$j(document).ready(function($) {
	scrollMenuFixed();
	
	// select2
	$j('.category_id').select2();
});

function scrollMenuFixed() {
	if ($j(this).scrollTop() > 5) {
		$j("header").addClass("fixed");
	} else {
		$j("header").removeClass("fixed");
	}
}

$w.scroll(function() {
	scrollMenuFixed();
});