<link href="<?php echo libraries_get_path('jqvmap'); ?>/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />
<script src="<?php echo libraries_get_path('jqvmap'); ?>/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="<?php echo libraries_get_path('jqvmap'); ?>/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script type="text/javascript">
(function($) {
	$(document).ready(function() {

		$('#vmap').vectorMap({
			map: 'usa_en',
			backgroundColor: 'none',
			borderColor: '#ffffff',
			borderOpacity: 0.25,
			borderWidth: 1,
			color: '#d3d3d3',
			enableZoom: true,
			hoverColor: '#027ba8',
			hoverOpacity: null,
			normalizeFunction: 'linear',
			scaleColors: ['#b6d6ff', '#005ace'],
			selectedColor: '#00549a',
			selectedRegion: 'OK',
			showTooltip: true,
			onRegionClick: function(element, code, region) {
				var message = 'You clicked "'
				+ region
				+ '" which has the code: '
				+ code.toUpperCase();
				
				alert(message);
			}
		});
	});
})(jQuery);
</script>
<div id="vmap" style="width: 500px; height: 400px;"></div>
