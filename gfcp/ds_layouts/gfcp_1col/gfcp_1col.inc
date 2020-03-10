<?php

/**
 * @file
 * Display Suite Section Banner configuration.
 */

function ds_gfcp_1col() {
  return array(
    'label' => t('GFCP - 1 column'),
    'regions' => array(
      'gfcp_1col_content' => t('Content')
    ),
    // Uncomment if you want to include a CSS file for this layout (section_banner.css)
    'css' => TRUE,
    // Uncomment if this is a template for a node form.
    // 'form' => TRUE,
  );
}

