/*=========== sticy header ===========*/

$=jQuery;


$(window).scroll(function() {
	var header_ht = $( 'header' ).height();
  	if ($(document).scrollTop() > header_ht) {
    	$('.header').addClass('fixed');
  	} else {
    	$('.header').removeClass('fixed');
  }
});
