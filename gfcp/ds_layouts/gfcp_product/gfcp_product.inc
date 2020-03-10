<?php

/**
 * @file
 * Display Suite Section Banner configuration.
 */

function ds_gfcp_product() {
  return array(
    'label' => t('GFCP -Product'),
    'regions' => array(
      'top' => t('Top'),
      'left' => t('Left'),
      'right' => t('Right')
    ),
    // Uncomment if you want to include a CSS file for this layout (section_banner.css)
    'css' => TRUE,
    // Uncomment if this is a template for a node form.
    // 'form' => TRUE,
  );
}
