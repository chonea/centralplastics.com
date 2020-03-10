<?php

$slides = array();
$default = null; 

foreach($view->result as $row){
	if( $row->field_field_slide_default[0]['raw']['value'] ){
		$default = $row;
	} else {
		$slides[] = $row;
	}
}

?>
<link rel="stylesheet" type="text/css" href="/sites/all/themes/gfcp/css/placeholder.css" />

<div class="homepage content">
  <div class="stage-component clearfix">

    <div class="stage clearfix">
      <div class="active"><div class="image landscape"><img src="<?php print file_create_url($default->field_field_slide_image[0]['raw']['uri']); ?>" title="homepage_corp-img-neutral" alt="homepage_corp-img-neutral" class="cq-dd-image keyvisual" /></div></div>
      <?php foreach ($slides as $slide): ?>
        <div><div class="image landscape"><img src="<?php print file_create_url($slide->field_field_slide_image[0]['raw']['uri']); ?>" title="homepage_corp-img-gfps" alt="homepage_corp-img-gfps" class="cq-dd-image keyvisual" /></div></div>
      <?php endforeach; ?>
    </div> <!-- /.stage -->

    <div class="stage_wrapper">
<?php /** / ?>
     <h1 class="bright"> <?php print $default->node_title; ?> </h1>
<?php //*/ ?>
<div class="heightFix"><div class="image landscape"> <img src="<?php print file_create_url($default->field_field_slide_image[0]['raw']['uri']); ?>" title="homepage_corp-img-neutral" alt="homepage_corp-img-neutral" class="cq-dd-image" /> </div></div>

     <div class="sections clearfix">

        <?php foreach($slides as $slide): ?>
        <div class="small_staging_teaser sst1">
            <div class="content">
              <h2><?php print $slide->node_title; ?></h2>
              <h3><?php print render($slide->field_field_slide_sub_title); ?></h3>
              <div class="additional">
                <p><?php print render($slide->field_body ); ?></p>
                <?php print l($slide->field_field_slide_link[0]['rendered']['#title'], $slide->field_field_slide_link[0]['rendered']['#href']); ?>
              </div> 
            </div>
        </div> <!-- /.small_staging_teaser -->
        <?php endforeach; ?>

      </div> <!-- /.sections -->

    </div> <!-- /.stage_wrapper -->

  </div>  <!-- /.stage-component -->
</div> <!-- /.homepage -->

<script type="text/javascript" src="/sites/all/themes/gfcp/js/gf-default.js"></script>
