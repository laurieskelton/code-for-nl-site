jQuery(document).ready( function( $ )  {


//this adds unique identifiers and classes to each section on the Static Home Page Template
	$( ".static-page section" ).each(function( index ) {
		$( this ).addClass( "area item"+(index+1) );
		$( this  ).attr("id", "area"+(index+1));
	}); 

// this adds the search toggle function

	$(".search-toggle").click(function(){

		$("#search-container").slideToggle('slow');

	});

// this adds the show/hide class for the site-title and tag-line when the logo is present

	if ( $('#logoImage').length > 0) {

		var siteTitle = $("h1.site-title");

			siteTitle.addClass("screen-reader-text");

		var siteTag = $("h2.site-description");

			siteTag.addClass("screen-reader-text");

	} else {

		var siteTitle = $("h1.site-title");

			siteTitle.removeClass("screen-reader-text");

		var siteTag = $("h2.site-description");

			siteTag.removeClass("screen-reader-text");

	}

	//Adds smooth scroll (from CSS Tricks)

	$(function() {
		$('a[href*=#]:not([href=#])').click(function() {
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				if (target.length) {
					$('html,body').animate({
						scrollTop: (target.offset().top - 80)
					}, 1000);
					return false;
				}
			}
		});
	});

	/* Stick navigation to the top of the page */
	var stickyNavTop = $('.main-navigation').offset().top; 

	$(window).scroll(function(){  
		var scrollTop = $(window).scrollTop();  

		if (scrollTop > stickyNavTop) {   
			$('.main-navigation').addClass('sticky-header'); 
			$('.site-header').addClass('shifted');
		} else {  
			$('.main-navigation').removeClass('sticky-header');   
			$('.site-header').removeClass('shifted');
		}  

	});
                

}); /* END DOC READY*/