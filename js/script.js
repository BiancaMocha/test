$(function() {

	// Cache the Window object
	var $window = $(window);


	$('section[data-type="background"]').each(function(){
		var $bgobj = $(this); // assigning the object

		$(window).scroll(function() {

			// Scroll the background at var speed
			// the yPos is a negative value because we're scrolling it UP!
			var yPos = -($window.scrollTop() / $bgobj.data('speed'));

			// Put together our final background position
			var coords = '50% '+ yPos + 'px';

			// Move the background
			$bgobj.css({ backgroundPosition: coords });

		}); // end window scroll
	});


	$('.scroll_top').click(function(){
	    //window.scrollTo(0, 0);
	    $('html').animate({scrollTop:0}, 'slow');//IE, FF
	    $('body').animate({scrollTop:0}, 'slow');//chrome, don't know if Safari works
	    $('.arrow').fadeIn(1000, function(){
	        setTimeout(function(){$('.arrow').fadeOut(2000);}, 3000);
	    });
	});

});
