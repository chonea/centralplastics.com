
<a id="top-of-page"></a>


<div id="header">
	<div class="container">
	<?php /* if ($site_name): ?>
		<?php if ($title): ?>
			<h1><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a></h>
		<?php else: /* Use h1 when the content title is empty * / ?>
			<h1 id="site-name"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a></h1>
		<?php endif; ?>
	<?php endif; //*/ ?>
	
	<?php /* if ($site_slogan): ?>
		<h2><?php print $site_slogan; ?></h2>
	<?php endif; //*/ ?>
	
	<?php if ($logo): ?>
		<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo" class="ten columns"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
	<?php endif; ?>
		<?php print render($page['header']); ?>
	
	</div>
		<?php print render($page['navigation']); ?>
		<?php print render($page['banner']); ?>
</div>


<div id="wrap" class="container">

	<div id="content" class="sixteen columns">
	
			<?php print render($page['highlighted']); ?>
			<?php print $breadcrumb; ?>
	
			<?php /* print render($title_prefix); ?>
			<?php if ($title): ?>
				<h1 class="title" id="page-title"><?php print $title; ?></h1>
			<?php endif;  ?>
			<?php print render($title_suffix); /**/ ?>
	
			<?php print $messages; ?>
			
			<?php if ($tabs = render($tabs)): ?>
				<div class="tabs"><?php print $tabs; ?></div>
			<?php endif; ?>
			
			<?php print render($page['help']); ?>
			
			<?php if ($action_links): ?>
				<ul class="action-links"><?php print render($action_links); ?></ul>
			<?php endif; ?>
	</div><!-- /#content -->

			<?php print render($page['content_top']); ?>
			<div class="four columns">
				<?php if( empty($page['sidebar_first']) ) echo '&nbsp;'; ?>
			<?php print render($page['sidebar_first']); ?>
			</div>

			<div class="eight columns">
			<?php if( empty($page['content']) ) echo '&nbsp;'; ?>
			<?php print render($page['content']); ?>

			<?php 
			// if( isset( $_GET['dev'] ) ){
			//   include_once('sharethis.inc.php'); 
			// }
			?>

			</div>

			<div class="four columns">
			<?php if( empty($page['sidebar_second']) ) echo '&nbsp;'; ?>
			<?php print render($page['sidebar_second']); ?>
			</div>

			<?php print render($page['content_bottom']); ?>
</div> <!-- /#wrap -->

<div id="footer">
<div class="container">
	<div class="sixteen columns">
		<?php print render($page['footer_top']); ?>
		<?php print render($page['footer']); ?>
	</div>
	
</div> <!-- /.container -->
</div> <!-- /#footer -->


<?php print render($page['bottom']); ?>
