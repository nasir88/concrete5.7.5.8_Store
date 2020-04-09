
/* LoadFunctions */
$(function() {
		
	//Initialize Select2 Elements
	$(".select2").select2();

	//Datemask dd/mm/yyyy
	$("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});

	//Money
	$('.money').maskMoney();

	//Timepicker
	$(".timepicker").timepicker({showInputs: false});

	//Product Slider
    carousels();
	
	//Shot Limited Text
	ShortText();
	
	//Scroll Horizontal Set Width
	ScrollWidth();

	//Load Windows
	$(window).load(function() {
		equalheight('.EqHeightDiv');
		ScrollWidthButton();
	});

	//Resize Windows
	$(window).resize(function(){
		equalheight('.EqHeightDiv');
		ScrollWidthButton();
		
        if (window.innerWidth >= 768) {
			$('.collapse').collapse('hide');
        }
	});
	
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

/* ShortText */
function ShortText() {

	var max = 85;
	$(".ShortText").each(function(){
		fulltext = $(this).text();
		if (fulltext.length > max) {
		   $(this).text(fulltext.substr(0, max - 3));
		   $(this).append('...');
		}
	});
	
}

/* ScrollWidthButton */
function ScrollWidthButton() {

	//ShowHide Button
	if ($("#containerNavSection").prop('scrollWidth') > $("#containerNavSection").width() ) {
		$(".pannerNavSection").css("display","table");
	}else{
		$(".pannerNavSection").css("display","none");
	}
	
}

/* ScrollWidth */
function ScrollWidth() {

    var scrollHandle = 0,
        scrollStep = 5,
        parent = $("#containerNavSection");

    //Start the scrolling process
    $(".pannerNavSection").mousedown(function() {
        var data = $(this).data('scrollModifier'),
            direction = parseInt(data, 30);

        $(this).addClass('active');

        startScrolling(direction, scrollStep);
    });

    //Kill the scrolling
    $(".pannerNavSection").mouseup(function() {
        stopScrolling();
        $(this).removeClass('active');
    });

    //Actual handling of the scrolling
    function startScrolling(modifier, step) {
        if (scrollHandle === 0) {
            scrollHandle = setInterval(function () {
                var newOffset = parent.scrollLeft() + (scrollStep * modifier);

                parent.scrollLeft(newOffset);
            }, 30);
        }
    }

    function stopScrolling() {
        clearInterval(scrollHandle);
        scrollHandle = 0;
    }

}

/* equalHeight */
equalheight = function(container){

var currentTallest = 0,
 currentRowStart = 0,
 rowDivs = new Array(),
 $el,
 topPosition = 0;
	 
 $(container).each(function() {

   $el = $(this);
   $($el).height('auto')
   topPostion = $el.position().top;

   if (currentRowStart != topPostion) {
     for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
       rowDivs[currentDiv].height(currentTallest);
     }
     rowDivs.length = 0; // empty the array
     currentRowStart = topPostion;
     currentTallest = $el.height();
     rowDivs.push($el);
   } else {
     rowDivs.push($el);
     currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
  }
   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
     rowDivs[currentDiv].height(currentTallest);
   }
 });
}

