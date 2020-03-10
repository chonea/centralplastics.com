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

(function($, undefined) {

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
			if(w.width() > 768){
				//h = $('img.keyvisual').height();
				h = Math.round($(window).width() * 440 / 1280);
				sw.height(h);
			} else {				
				sw.height($('img.keyvisual').height());
			} 
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
				
				i++
				
			} else { 
								
				img.eq(i).fadeOut('slow');
				img.eq(0).fadeIn('slow');
				
				hl.fadeIn("fast");
				clearInterval();
			}			
			
		}
		
		function startInterval(){  
		  	timeoutID = window.setInterval(startRotation, delay); 
		} 
		
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
