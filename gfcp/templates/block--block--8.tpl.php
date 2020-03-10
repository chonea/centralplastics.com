<style type="text/css">@import "<?php echo libraries_get_path('jqvmap'); ?>/jqvmap/jqvmap.css";</style>
<style type="text/css">
#contact-map {
	position: relative;
	width: 700px;
	height: 373px;
	margin: 0 0 40px 0;
	background: transparent url('<?php echo path_to_theme(); ?>/images/map-na-700x373.png') 0px 4px no-repeat;
}
#contact-map #contact-map-description {
	position: absolute;
	top: 0;
	left: 0;
	width: 157px;
	height: 250px;
	z-index: 2;
}
#contact-map #contact-map-description p {
	padding: 10px 0 0 10px;
	margin: 0;
	font-size: 90%;
	line-height: 16px;
}
#contact-map #contact-map-description p a {
	text-decoration: none;
}
#contact-map #contact-map-description p a:hover {
	text-decoration: underline;
}

#contact-map #vmap {
	position: absolute;
	top: 18px;
	left: 0;
	width: 700px !important;
	height: 349px;
}

#contact-map-toggle {
	position: relative;
	width: 676px;
	margin: 0 0 10px;
	padding: 5px;
	font-size: 12px;
	line-height: 12px;
	text-align: right;
	border-bottom: 1px solid #ccc;
	color: #888;
	cursor: pointer;
	display: none;
}
a#contact-national,
a#contact-international,
a#contact-all {
	cursor: pointer;
}
path#jqvmap1_tx {
	position: absolute !important;
	left: 10px !important;
}
#vmap {
	display: none;
}
#contact-map-nav {
	position: absolute;
	left: 0px;
	top: 343px;
	width: 100%;
	height: 40px;
	z-index: 2;
}
#contact-map-nav a {
	display: block;
	float: left;
	height: 40px;
	line-height: 40px;
	font-size: 13px;
	padding: 0 20px 0 30px;
	margin: 0 15px 0 0;
	background: #00549a url('<?php echo path_to_theme(); ?>/css/img/icons.png') no-repeat scroll 12px -2186px;
	color: #fff;
	cursor: pointer;
}
#contact-map-nav a:hover {
	background-color: #027ba8;
}
#contact-map-nav input {
	float: left;
	width: 256px;
	height: 40px;
	line-height: 40px;
	font-size: 13px;
	padding: 0 10px 0 30px;
	background: #fff url('<?php echo path_to_theme(); ?>/images/search.png') 10px 9px no-repeat;
	color: #00549a;
	border: 1px solid #00549a;
	border-radius: 0 0 0 0 !important;
	opacity: .75;
}
#contact-map-nav input:focus {
	opacity: 1;
}

@media only screen and (min-width:1200px){
	#contact-map {
		width: 844px;
		height: 450px;
		background: transparent url('<?php echo path_to_theme(); ?>/images/map-na-844x450.png') 0px 4px no-repeat;
	}
	#contact-map #contact-map-description {
		width: 187px;
		height: 270px;
	}
	#contact-map #contact-map-description p {
		font-size: 100%;
		line-height: 20px;
	}
	#contact-map #vmap {
		top: 20px;
		width: 844px !important;
		height: 421px;
	}
	#contact-map-toggle {
		width: 820px;
	}
	#contact-map-nav {
		top: 420px;
	}
	#contact-map-nav input {
		width: 400px;
	}
}
</style>
<script src="<?php echo libraries_get_path('jqvmap'); ?>/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="<?php echo libraries_get_path('jqvmap'); ?>/jqvmap/maps/jquery.vmap.usa-gfcp.js" type="text/javascript"></script>
<style type="text/css">@import "<?php echo libraries_get_path('jquery.svg'); ?>/jquery.svg.css";</style>
<script src="<?php echo libraries_get_path('jquery.svg'); ?>/jquery.svg.min.js" type="text/javascript"></script>
<script src="<?php echo libraries_get_path('jquery.svg'); ?>/jquery.svganim.min.js" type="text/javascript"></script>
<script type="text/javascript">
(function($) {
	$(document).ready(function() {

		var selectedRegionKey = '';

		var regions = {
			AL: "Alabama",
			AK: "Alaska", 
			AZ: "Arizona", 
			AR: "Arkansas", 
			CA: "California", 
			CO: "Colorado", 
			CT: "Connecticut", 
			DE: "Delaware", 
			DC: "District Of Columbia", 
			FL: "Florida", 
			GA: "Georgia", 
			HI: "Hawaii", 
			ID: "Idaho", 
			IL: "Illinois", 
			IN: "Indiana", 
			IA: "Iowa", 
			KS: "Kansas", 
			KY: "Kentucky", 
			LA: "Louisiana", 
			ME: "Maine", 
			MD: "Maryland", 
			MA: "Massachusetts", 
			MI: "Michigan", 
			MN: "Minnesota", 
			MS: "Mississippi", 
			MO: "Missouri", 
			MT: "Montana",
			NE: "Nebraska",
			NV: "Nevada",
			NH: "New Hampshire",
			NJ: "New Jersey",
			NM: "New Mexico",
			NY: "New York",
			NC: "North Carolina",
			ND: "North Dakota",
			OH: "Ohio", 
			OK: "Oklahoma", 
			OR: "Oregon", 
			PA: "Pennsylvania", 
			RI: "Rhode Island", 
			SC: "South Carolina", 
			SD: "South Dakota",
			TN: "Tennessee", 
			TX: "Texas", 
			UT: "Utah", 
			VT: "Vermont", 
			VA: "Virginia", 
			WA: "Washington", 
			WV: "West Virginia", 
			WI: "Wisconsin", 
			WY: "Wyoming"
		};

		$('#block-views-contact-offices-block').find('.view-content').addClass('view-content-condensed');
		$('#block-views-contact-offices-block').show('slow');

		$('#contact-map-toggle').click(function(){
			$('#contact-map-toggle').hide('slow');
			$('#contact-map').show('slow');
			$('#block-views-contact-offices-block').find('.view-content').addClass('view-content-condensed');
		});

		$('#contact-all, #contact-map-nav-all').click(function(){
			$('#contact-map').hide('slow');
			$('#block-views-contact-offices-block').find('.view-content').removeClass('view-content-condensed');
			$('#block-views-contact-offices-block').find('.view-content').removeClass('view-content-expanded');
			$('#contact-map-toggle').show('slow');
			if (selectedRegionKey != '') {
				$('#jqvmap1_' + selectedRegionKey.toLowerCase()).trigger('click');
				selectedRegionKey = '';
			}
		});

		$('#contact-national, #contact-map-nav-national').click(function(){
			if (selectedRegionKey != '') {
				$('#jqvmap1_' + selectedRegionKey.toLowerCase()).trigger('click');
				selectedRegionKey = '';
			} else {
				$('#block-views-contact-offices-block .view-content').scrollTo(0, {duration:'slow'});
			}
			$('#block-views-contact-offices-block').find('.view-content').each(function(){
				if ($(this).hasClass('view-content-expanded')) {
					$('#block-views-contact-offices-block').find('.view-content').removeClass('view-content-expanded');
				}
				$('#block-views-contact-offices-block').find('.view-content').addClass('view-content-condensed');
			});
		});

		$('#contact-canada, #contact-international, #contact-map-nav-international').click(function(){
			if (selectedRegionKey != '') {
				$('#jqvmap1_' + selectedRegionKey.toLowerCase()).trigger('click');
				selectedRegionKey = '';
			}
			$('#block-views-contact-offices-block .view-content').scrollTo('#_canada', {duration:'slow'});
			$('#block-views-contact-offices-block').find('.view-content').each(function(){
				if ($(this).hasClass('view-content-condensed')) {
					$('#block-views-contact-offices-block').find('.view-content').removeClass('view-content-condensed');
				}
				$('#block-views-contact-offices-block').find('.view-content').addClass('view-content-expanded');
			});
		});

		$('#contact-search-regions').click(function(){
			$('#contact-search').focus();
		});	

		$('#vmap').vectorMap({
			map: 'usa_en',
			backgroundColor: 'none',
			borderColor: '#ffffff',
			borderOpacity: 1.00,
			borderWidth: 2,
			color: '#d3d3d3',
			enableZoom: false,
			hoverColor: '#00549a',
			hoverOpacity: null,
			normalizeFunction: 'linear',
			scaleColors: ['#b6d6ff', '#005ace'],
			selectedColor: '#027ba8',
			selectedRegion: 'ok',
			showTooltip: true,
			onRegionSelect: function(element, code, region) {
				$('#block-views-contact-offices-block').find('.view-content').each(function(){
					if ($(this).hasClass('view-content-expanded')) {
						$('#block-views-contact-offices-block').find('.view-content').removeClass('view-content-expanded');
						$('#block-views-contact-offices-block').find('.view-content').addClass('view-content-condensed');
					}
				});
				$('#block-views-contact-offices-block .view-content').scrollTo('#' + code.toUpperCase(), {duration:'slow'});
				// selectedRegionKey = code;
			},
			onRegionDeselect: function(element, code, region) {
				$('#block-views-contact-offices-block').find('.view-content').each(function(){
					if ($(this).hasClass('view-content-expanded')) {
						$('#block-views-contact-offices-block').find('.view-content').removeClass('view-content-expanded');
						$('#block-views-contact-offices-block').find('.view-content').addClass('view-content-condensed');
					}
				});
				$('#block-views-contact-offices-block .view-content').scrollTo(0, {duration:'slow'});
				selectedRegionKey = '';
			}
		});

		$('#vmap g').children('path').animate({svgTransform: 'translate(125,20)'}, 0);
		$('#jqvmap1_ak').animate({svgTransform: 'translate(-132,-63)'}, 0);
		$('#jqvmap1_hi').animate({svgTransform: 'translate(-138,-60)'}, 0);
		$('#vmap').fadeIn('slow');

		$('#vmap').click(function(e){
			if ( e.originalEvent === undefined ) {
					//alert( 'triggered programmatically' );   
			} else {
				$('#contact-search').blur();
				$('#contact-search').val('');
					//alert( 'clicked by the user' );   
			}
		});

		$('#contact-search').keyup(function(){
			var searchString = $(this).val();
			searchString = searchString.toLowerCase();
			if (searchString != '') {
				if (selectedRegionKey == '' || (selectedRegionKey != '' && searchString != regions[selectedRegionKey].slice(0,searchString.length).toLowerCase())) {
					for (var key in regions) {
						if (searchString == regions[key].slice(0,searchString.length).toLowerCase() && key != selectedRegionKey) {
							$('#jqvmap1_' + key.toLowerCase()).trigger('click');
							selectedRegionKey = key;
							break;
						}
					}
				}
			} else {
				$('#jqvmap1_' + selectedRegionKey.toLowerCase()).trigger('click');
			}
		});

	});
})(jQuery);
</script>
<div id="contact-map-toggle">Show Map</div>
<div id="contact-map">
	<div id="contact-map-nav">
  	<form id="contact-map-nav-search" name="contact-map-nav-search" method="post" action="">
      <a id="contact-map-nav-national">View Corporate</a>
      <a id="contact-map-nav-international">View International</a>
      <a id="contact-map-nav-all">View All</a>
      <input id="contact-search" nmae="contact-search" type="text" maxlength="50"  />
    </form> 
  </div>
	<div id="contact-map-description">
  	<h2>Contact Us</h2>
    <p>Click on the regions to the <br />right to find your local <br />distributor. The contact <br />information will be displayed <br />below. You can also use <br />the buttons below to <br /><a id="contact-all">view all available contacts</a>, <br /><a id="contact-international">view international contacts</a>, <br /><a id="contact-national">view corporate contacts</a>, <br />or <a id="contact-search-regions">search by region</a>.</p>
  </div>
	<div id="vmap"></div>
</div>
