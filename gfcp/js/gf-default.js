




/* jquery.hoverIntent.js */
/**
* hoverIntent is similar to jQuery's built-in "hover" function except that
* instead of firing the onMouseOver event immediately, hoverIntent checks
* to see if the user's mouse has slowed down (beneath the sensitivity
* threshold) before firing the onMouseOver event.
* 
* hoverIntent r6 // 2011.02.26 // jQuery 1.5.1+
* <http://cherne.net/brian/resources/jquery.hoverIntent.html>
* 
* hoverIntent is currently available for use in all personal or commercial 
* projects under both MIT and GPL licenses. This means that you can choose 
* the license that best suits your project, and use it accordingly.
* 
* // basic usage (just like .hover) receives onMouseOver and onMouseOut functions
* $("ul li").hoverIntent( showNav , hideNav );
* 
* // advanced usage receives configuration object only
* $("ul li").hoverIntent({
*	sensitivity: 7, // number = sensitivity threshold (must be 1 or higher)
*	interval: 100,   // number = milliseconds of polling interval
*	over: showNav,  // function = onMouseOver callback (required)
*	timeout: 0,   // number = milliseconds delay before onMouseOut function call
*	out: hideNav    // function = onMouseOut callback (required)
* });
* 
* @param  f  onMouseOver function || An object with configuration options
* @param  g  onMouseOut function  || Nothing (use configuration options object)
* @author    Brian Cherne brian(at)cherne(dot)net
*/
(function($) {
	$.fn.hoverIntent = function(f,g) {
		// default configuration options
		var cfg = {
			sensitivity: 7,
			interval: 100,
			timeout: 0
		};
		// override configuration options with user supplied object
		cfg = $.extend(cfg, g ? { over: f, out: g } : f );

		// instantiate variables
		// cX, cY = current X and Y position of mouse, updated by mousemove event
		// pX, pY = previous X and Y position of mouse, set by mouseover and polling interval
		var cX, cY, pX, pY;

		// A private function for getting mouse position
		var track = function(ev) {
			cX = ev.pageX;
			cY = ev.pageY;
		};

		// A private function for comparing current and previous mouse position
		var compare = function(ev,ob) {
			ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
			// compare mouse positions to see if they've crossed the threshold
			if ( ( Math.abs(pX-cX) + Math.abs(pY-cY) ) < cfg.sensitivity ) {
				$(ob).unbind("mousemove",track);
				// set hoverIntent state to true (so mouseOut can be called)
				ob.hoverIntent_s = 1;
				return cfg.over.apply(ob,[ev]);
			} else {
				// set previous coordinates for next time
				pX = cX; pY = cY;
				// use self-calling timeout, guarantees intervals are spaced out properly (avoids JavaScript timer bugs)
				ob.hoverIntent_t = setTimeout( function(){compare(ev, ob);} , cfg.interval );
			}
		};

		// A private function for delaying the mouseOut function
		var delay = function(ev,ob) {
			ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
			ob.hoverIntent_s = 0;
			return cfg.out.apply(ob,[ev]);
		};

		// A private function for handling mouse 'hovering'
		var handleHover = function(e) {
			// copy objects to be passed into t (required for event object to be passed in IE)
			var ev = jQuery.extend({},e);
			var ob = this;

			// cancel hoverIntent timer if it exists
			if (ob.hoverIntent_t) { ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t); }

			// if e.type == "mouseenter"
			if (e.type == "mouseenter") {
				// set "previous" X and Y position based on initial entry point
				pX = ev.pageX; pY = ev.pageY;
				// update "current" X and Y position based on mousemove
				$(ob).bind("mousemove",track);
				// start polling interval (self-calling timeout) to compare mouse coordinates over time
				if (ob.hoverIntent_s != 1) { ob.hoverIntent_t = setTimeout( function(){compare(ev,ob);} , cfg.interval );}

			// else e.type == "mouseleave"
			} else {
				// unbind expensive mousemove event
				$(ob).unbind("mousemove",track);
				// if hoverIntent state is true, then call the mouseOut function after the specified delay
				if (ob.hoverIntent_s == 1) { ob.hoverIntent_t = setTimeout( function(){delay(ev,ob);} , cfg.timeout );}
			}
		};

		// bind the function to the two event listeners
		return this.bind('mouseenter',handleHover).bind('mouseleave',handleHover);
	};
})(jQuery);







/* _stage.js */

/*
 *	author: dominicw 
 *
 * 	stage: image rotation
 * 	stage: hover button 
 * 
 */

/* TODO hover_intent for stage */

//default-delay for image/teaser rotation - when not set via WCMS
delay = 3000;

;(function($, undefined) {

	$(function(){

		//isMobile?
		function isMobile(){
		    return (
		        (navigator.platform.indexOf("iPhone") != -1) ||
		        (navigator.platform.indexOf("iPod") != -1)
		    );
		}

		//prepareStage
		sw = $('.stage_wrapper');		
		hl = $('.stage_wrapper h1');
		w = $(window);
				
		function setStageHeight(){
			// if(w.width() > 768){
			// 	//h = $('img.keyvisual').height();
			// 	h = Math.round($(window).width() * 440 / 1280);
			// 	sw.height(h);
			// } else {				
			// 	sw.height($('img.keyvisual').height());
			// } 
			if(!isMobile()){
				if($('.content .standard_teaser img').length > 0){
					$('.standard_teaser .stock_perf').height($('.content .standard_teaser img').height()-3)
				}
			}
		}

		/* set initial height */
		setStageHeight();

		/* set stage height on resize */
		w.resize(function() {
			setStageHeight();
		});

		$('.stage .image').each(function(index){
			$(this).addClass("element"+index)
			$('.small_staging_teaser').eq(index).addClass("element"+(index+1))
		})

		//imageRotation
		num = $('.stage div.image').length
		i = 0

		function startRotation(){
			hl.fadeOut("fast");
			img = $('.stage div.image img')
			p = $(".small_staging_teaser div.content");
			p.removeClass('active').css('height','78%').find('.additional').hide();
			if(i<num-1){				
				img.eq(i).fadeOut('slow');
				img.eq(i+1).fadeIn('slow');
				t = $(".small_staging_teaser:eq("+i+") div.content");
				t.addClass("active").animate({ height: '100%' }).find('.additional').show();
				i++;
			} else { 
				img.eq(i).fadeOut('slow');
				img.eq(0).fadeIn('slow');
				hl.fadeIn("fast");
				clearInterval();
			}
		} // ends startRotation()

		function startInterval(){  
		  	timeoutID = window.setInterval(startRotation, delay); 
		} // ends startInterval()

		function clearInterval(reset){  
			window.clearInterval(timeoutID);
		  	timeoutID = null;
		  	if(reset){
		  		$('.stage div.image img').hide();
		  		$('.stage div.image.element0 img').show();
		  		
		  		el = $('.small_staging_teaser .content')
		  		el.css('height','78%')
		  		el.removeClass('active');
    			el.find('.additional').hide();
		  	}
		} 
		if(!$('html').hasClass('ie7')){
			startInterval();	
		}

		//hover
		var config = {    
			over: function(e){
				clearInterval(true);
			    hl.hide();
			    el = $(this);
			    el.addClass('active')

			    first_img = $('.stage div.image.element0 img')
			    first_img.hide()
			    var classAttribute =  el.parents('.small_staging_teaser').attr('class')
		    	var classes=classAttribute.split(" ");
				for (var i=0;i<classes.length;i++){
			        if (classes[i].indexOf('element')==0){
			            stage_img = classes[i]
			        }
			    }
				$('.stage div.image.'+stage_img +' img').fadeIn('slow');
				el.animate({ height: '100%' }).find('.additional').show();
    		},   
    		timeout: 400,  
			out: function(){
				var classAttribute =  $(this).parents('.small_staging_teaser').attr('class')
		    	var classes=classAttribute.split(" ");
    			for (var i=0;i<classes.length;i++){
			        if (classes[i].indexOf('element')==0){
			            stage_img = classes[i]
			        }
			    }
    			$('.stage div.image.'+stage_img +' img').fadeOut('slow');
    			
    			
    			el = $(this);	
    			el.animate({ height: '78%' }).removeClass('active').find('.additional').hide();
    			if(!$('.small_staging_teaser .content').hasClass("active")){
    				$('.stage div.image.element0 img').fadeIn('slow');
    				hl.show();
    			}
    		}   
		};
		if(!$('html').hasClass('ie7')){
			$('.sections .content').hoverIntent( config )
		}

		//special ie7 treatment
		if($('html').hasClass('ie7')){
			$('.sections .content').hover(
	    		function() {
	    			el = $(this) 
	    			el.addClass("active").find('.additional').show();
	    			el.find('.additional p, .additional h4').hide()
	    		},
	    		function() {
	    			el = $(this) 
	    			el.removeClass("active").find('.additional').hide();
	    			el.find('.additional p, .additional h4').hide();
	    		}
	    	)
		}

	});
})(jQuery);
