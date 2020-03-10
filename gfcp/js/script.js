// script.js

// log function
window.log=function(){log.history=log.history||[];log.history.push(arguments);if(this.console){arguments.callee=arguments.callee.caller;var a=[].slice.call(arguments);(typeof console.log==="object"?log.apply.call(console.log,console,a):console.log.apply(console,a))}};
(function(b){function c(){}for(var d="assert,count,debug,dir,dirxml,error,exception,group,groupCollapsed,groupEnd,info,log,timeStamp,profile,profileEnd,time,timeEnd,trace,warn".split(","),a;a=d.pop();){b[a]=b[a]||c}})((function(){try
{console.log();return window.console;}catch(err){return window.console={};}})());





(function($) { 					// jQuery Closure

	$(function(){ 				// Dom Ready shortcut

		// Hijacked by Chad Honea 1/18/2013 for Vertical Motion
		// Fix product document link descriptions	
		$('.field-collection-item-field-product-related-documents').each(function(index, element) {
			$(this).find('.field-name-field-product-document-name').hide();
      $(this).find('.field-name-field-product-documents-file .file a[href]').attr('target','_blank');
			var str = $(this).find('.field-name-field-product-document-name .field-items .field-item').text();
			if (str != '') $(this).find('.field-name-field-product-documents-file .file a[href]').html(str);
    });

	}); 						// end dom ready shortcut

})(jQuery); 					// jQuery Closure


