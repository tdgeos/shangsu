
/* Document Ready Begin */
	$(document).ready(function() {
	
	/* Smooth Scroll init Begin */
		$('a.smooths').smoothScroll({
          easing: 'swing',
  		  speed: 1000
		});
	/* Smooth Scroll init End */
        
        
	/* lightbox init Begin */
     	$('.lightbox').lightbox();
	/* lightbox init End */
	
	
	
	/* Logo Begin */
		$('#logo').hover(function() {
            $(this).stop().animate({ marginTop: '19px' }, 150);
        },function(){
            $(this).stop().animate({ marginTop: '11px' }, 85).animate({ marginTop: '15px' }, 150);
        });
    /* Logo End */
    
    
	/* ie Logo Begin */
		$('.ie #logo').hover(function() {
            $(this).stop().animate({ marginTop: '19px' }, 80);
        },function(){
            $(this).stop().animate({ marginTop: '11px' }, 40).animate({ marginTop: '15px' }, 100);
        });
    /* ie Logo End */


	/* ie font embed begin */
	$(".browserIE body").ieffembedfix();
	/* ie font embed End */

	
	});
/* Document Ready End */


    
    
    
/* Functions Begin */
	$(function(){
	
	
	/* Slider Begin */
		$('.slide').mobilyslider({
			content: '.sliderContent',
			children: 'div',
			transition: 'fade',
			animationSpeed: 1000,
			autoplay: true,
			autoplaySpeed: 5000,
			pauseOnHover: true,
			bullets: true,
			arrows: true,
			arrowsHide: true,
			prev: 'prev',
			next: 'next',
			animationStart: function(){},
			animationComplete: function(){}
		});
	/* Slider End */
	
	
	/* Gallery Begin */
		$("ul.gallery li ").hover(function() { //On hover...
			//Get image url and assign it to 'thumbOver'
			var thumbOver = $(this).find("img").attr("src");
			//Set a background image(thumbOver) on the <a> tag - Set position to bottom
			$(this).find("a.thumb").css({'background' : 'url(' + thumbOver + ') no-repeat center bottom'});
			//Animate the image to 0 opacity (fade it out)
			$(this).find("span").stop().fadeTo('slow', 0 , function() {
			$(this).hide() //Hide the image after fade
			});
		} , function() { //on hover out...
			//Fade the image to full opacity 
			$(this).find("span").stop().fadeTo('slow', 1).show();
		});
	/* Gallery Begin */


	/* Tweet Begin */
      $(".tweet").tweet({
        join_text: "auto",
        username: "rockstarworking",
        avatar_size: 0,
        count: 3,
        auto_join_text_default: "",
        auto_join_text_ed: "",
        auto_join_text_ing: "",
        auto_join_text_reply: "",
        auto_join_text_url: "",
        loading_text: "loading tweets..."
      });
	/* Tweet End */
	
	
	});
/* Functions End */
  
  
  
/* jrumble Begin */
$('.available').jrumble({
	rangeX: 1,
	rangeY: 1,
	rangeRot: 2,
	rumbleSpeed:0,
	rumbleEvent: 'mousedown'
});

$('#content .twitter .icon').jrumble({
	rangeX: 1,
	rangeY: 1,
	rangeRot: 1,
	rumbleSpeed:35,
	posX: 'left',
	posY: 'top',
	rumbleEvent: 'mousedown'
});
/* jrumble Begin */



/* autoResize Begin */
$('textarea#message').autoResize({
    // On resize:
    onResize : function() {
        $(this).css({opacity:0.8});
    },
    // After resize:
    animateCallback : function() {
        $(this).css({opacity:1});
    },
    // Quite slow animation:
    animateDuration : 300,
    // More extra space:
    extraSpace : 10
});
/* autoResize End */




/* Rollover Begin */
	$(function() {
		
		// set opacity to nill on page load
		$(".roll span, .roll span, .available span, #send span").css("opacity","0");
		// on mouse over
		$(".roll span, .roll span, .available span, #send span").hover(function () {
			// animate opacity to full
			$(this).stop().animate({
				opacity: 1
			}, 'normal');
		},
		// on mouse out
		function () {
			// animate opacity to nill
			$(this).stop().animate({
				opacity: 0
			}, 'normal');
		});
		
		
		// ----------------------------------------------
		
		// set opacity to nill on page load
		$(".roll-slow span, .html5badge span").css("opacity","0");
		// on mouse over
		$(".roll-slow span, .html5badge span").hover(function () {
			// animate opacity to full
			$(this).stop().animate({
				opacity: 1
			}, 'slow');
		},
		// on mouse out
		function () {
			// animate opacity to nill
			$(this).stop().animate({
				opacity: 0
			}, 'slow');
		});
		
		
		// ----------------------------------------------
				
		// set opacity to nill on page load
		$(".browserIE8 .roll span, .browserIE8 .roll-slow span, .browserIE8 .available span, .browserIE8 #send span, .browserIE7 .roll span, .browserIE7 .roll-slow span, .browserIE7 .available span, .browserIE7 #send span, .browserIE6 .roll span, .browserIE6 .roll-slow span, .browserIE6 .available span, .browserIE6 #send span").css("opacity","0");
		// on mouse over
		$(".browserIE8 .roll span, .browserIE8 .roll-slow span, .browserIE8 .available span, .browserIE8 #send span, .browserIE7 .roll span, .browserIE7 .roll-slow span, .browserIE7 .available span, .browserIE7 #send span, .browserIE6 .roll span, .browserIE6 .roll-slow span, .browserIE6 .available span, .browserIE6 #send span").hover(function () {
			// animate opacity to full
			$(this).stop().animate({
				opacity: 0
			}, 'slow');
		},
		// on mouse out
		function () {
			// animate opacity to nill
			$(this).stop().animate({
				opacity: 0
			}, 'slow');
		});
		
		
	});
/* Rollover End */




