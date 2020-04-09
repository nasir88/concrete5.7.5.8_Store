
$(function() {
    carousels();
});


/* carousels */
function carousels() {

	var owl = $('.product-slider');

    owl.owlCarousel({
		navigation: false, // Show next and prev buttons
		slideSpeed: 300,
		paginationSpeed: 400,
		afterInit: function() {
			$('.product-slider .item').css('visibility', 'visible');
		}
    });
	
    // Custom Navigation Events
    $(".owl-carousel-arrows .next").click(function() {
        owl.trigger('owl.next');
    });
	
    $(".owl-carousel-arrows .prev").click(function() {
        owl.trigger('owl.prev');
    });

}


