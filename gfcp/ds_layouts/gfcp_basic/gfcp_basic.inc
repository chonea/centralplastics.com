<?php

/**
 * @file
 * Display Suite Section Banner configuration.
 */

function ds_gfcp_basic() {
  return array(
    'label' => t('GFCP - Basic Layout'),
    'regions' => array(
      'top' => t('Top'),
      'left' => t('Left'),
      'middle' => t('Middle'),
      'right' => t('Right'),
      'bottom' => t('Bottom')
    ),
    // Uncomment if you want to include a CSS file for this layout (section_banner.css)
    'css' => TRUE,
    // Uncomment if this is a template for a node form.
    // 'form' => TRUE,
  );
}
