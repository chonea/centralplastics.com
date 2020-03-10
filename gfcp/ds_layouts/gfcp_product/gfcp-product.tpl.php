<?php
/**
 * @file
 * Display Suite Section Banner template.
 *
 * Available variables:
 *
 * Layout:
 * - $classes: String of classes that can be used to style this layout.
 * - $contextual_links: Renderable array of contextual links.
 *
 * Regions:
 *
 * - $banner: Rendered content for the "Banner" region.
 * - $banner_classes: String of classes that can be used to style the "Banner" region.
 */
?> 
<div class="gfcp-product-row <?php print $classes;?> clearfix">
	<?php if (isset($title_suffix['contextual_links'])): ?>
	<?php print render($title_suffix['contextual_links']); ?>
	<?php endif; ?>

	<?php if ($top): ?>
		<div class="product-top <?php print $left_classes; ?> eight columns">
		<?php print $top; ?>
		</div>
	<?php endif; ?>

	<?php if ($left): ?>
		<div class="product-left <?php print $left_classes; ?> four columns">
		<?php print $left; ?>
		</div>
	<?php endif; ?>

	<?php if ($right): ?>
		<div class="product-right <?php print $right_classes; ?> four columns">
		<?php print $right; ?>
		</div>
		<?php endif; ?>

</div>
