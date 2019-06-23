$(document).ready(function() {
	$(".owl-carousel").owlCarousel({
		items: 1,
		loop: true,
		nav: true,
		autoplay: true,
		margin: 10,
		autoplayTimeout: 5000,
		autoplayHoverPause: true,
		autoHeightClass: "owl-height"
	});
	$(".owl-carousel-2").owlCarousel({
		items: 16,
		loop: true,
		nav: true,
		autoplay: true,
		margin: 10,
		autoplayTimeout: 5000,
		autoplayHoverPause: true,
		autoHeightClass: "owl-height"
	});

});
