
  <?php if ($childblock): ?>
    <div class="gfcp-child-block <?php print $classes;?> four columns">
		<?php if (isset($title_suffix['contextual_links'])): ?>
			<?php print render($title_suffix['contextual_links']); ?>
		<?php endif; ?>
    <?php print $childblock; ?>
    </div>
  <?php endif; ?>
