(function($){ //create closure so we can safely use $ as alias for jQuery

	//Menu Options
	$(document).ready(function(){

		var exampleOptions = {
		  speed: 'fast'
		}
		
		var example = $('#sf-menu').superfish(exampleOptions);

		// initialise plugin
		//var example = $('#sf-menu').superfish({
		//	//add options here if required
		//});

	});
	
	//Menu With Button More
	$(document).ready(function(){
	
		alignMenu();

		$(window).resize(function() {
			$("#sf-menu").append($("#sf-menu li.hideshow ul").html());
			$("#sf-menu li.hideshow").remove();
			alignMenu();
		});

		function alignMenu() {
			var w = 0;
			var mw = $("#sf-menu").width() - 100;
			var i = -1;
			var menuhtml = '';
			jQuery.each($("#sf-menu").children(), function() {
				i++;
				w += $(this).outerWidth(true);
				if (mw < w) {
					menuhtml += $('<div>').append($(this).clone()).html();
					$(this).remove();
				}
			});
			$("#sf-menu").append(
					'<li href="#" class="hideshow">'
							+ '<a href="#" class="nav-last" style="cursor: default;">more '
							+ '<span style="font-size:11px; margin-left:5px;">&#8595;</span>'
							+ '</a><ul class="SubMenu">' + menuhtml + '</ul></li>');
			//$("#sf-menu li.hideshow ul").css("top",
					//$("#sf-menu li.hideshow").outerHeight(true) + "px");
			$("#sf-menu li.hideshow").click(function() {
				$(this).children("ul").toggle();
			});
			if (menuhtml == '') {
				$("#sf-menu li.hideshow").hide();
			} else {
				$("#sf-menu li.hideshow").show();
			}
		}
	});
	
	//Same Height Menu
	$(document).ready(function($){

		//Set Your Class Div
		var MyClass = ".ctitles";

		//Set Auto Same Height
		var maxHeight = 0;
		$(MyClass).each(function(){
		   if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
		});
		$(MyClass).height(maxHeight);
		
		
		//Set Auto Same Height after Resize	
		setHeight(MyClass);

		function setHeight(column) {
			var maxHeight = 0;
			//Get all the element with class = col
			column = $(column);
			column.css('height', 'auto');
			//Loop all the column
			column.each(function() {       
				//Store the highest value
				if($(this).height() > maxHeight) {
					maxHeight = $(this).height();
				}
			});
			//Set the height
			column.height(maxHeight);
		}

		$(window).resize(function() {
			setHeight(MyClass);
		});

	});
	
	
	//Accordion Menu
	$(document).ready(function(){

	  $('#accmenu > ul > li:has(ul)').addClass("has-sub");

	  $('#accmenu > ul > li > a').click(function() {
		var checkElement = $(this).next();
		
		$('#accmenu li').removeClass('active');
		$(this).closest('li').addClass('active');	
		
		
		if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		  $(this).closest('li').removeClass('active');
		  checkElement.slideUp('normal');
		}
		
		if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		  $('#accmenu ul ul:visible').slideUp('normal');
		  checkElement.slideDown('normal');
		}
		
		if (checkElement.is('ul')) {
		  return false;
		} else {
		  return true;	
		}		
	  });

	});


})(jQuery);