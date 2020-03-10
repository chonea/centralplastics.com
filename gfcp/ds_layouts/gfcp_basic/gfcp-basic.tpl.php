
<div class="gfcp-basic <?php print $classes;?> clearfix container">

  <?php if (isset($title_suffix['contextual_links'])): ?>
  	<?php print render($title_suffix['contextual_links']); ?>
  <?php endif; ?>

  <?php /* if ($top): ?>
    <div class="gfcp-basic-top <?php print $top_classes; ?> sixteen columns">
      <?php print $top; ?>
    </div>
  <?php endif; //*/ ?>

  <?php /* if ($left): ?>
    <div class="gfcp-basic-left <?php print $left_classes; ?> four columns">
      <?php print $left; ?>
    </div>
  <?php endif; //*/ ?>

  <?php if ($middle): ?>
    <div class="gfcp-basic-middle<?php print $middle_classes; ?> eight columns">
      <?php print $middle; ?>
    </div>
  <?php endif; ?>

  <?php /* if ($right): ?>
    <div class="gfcp-basic-right<?php print $right_classes; ?> four columns">
      <?php print $right; ?>
    </div>
  <?php endif; //*/ ?>

  <?php /* if ($bottom): ?>
    <div class="gfcp-basic-bottom <?php print $bottom_classes; ?> sixteen columns">
      <?php print $bottom; ?>
    </div>
  <?php endif; //*/ ?>
</div>
