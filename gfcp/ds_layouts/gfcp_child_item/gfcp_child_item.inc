<?php

/**
 * @file
 * Display Suite Section Banner configuration.
 */

function ds_gfcp_child_item() {
  return array(
    'label' => t('GFCP - Child Display Block'),
    'regions' => array(
      'childblock' => t('Child Block')
    ),
    // Uncomment if you want to include a CSS file for this layout (section_banner.css)
    'css' => TRUE,
    // Uncomment if this is a template for a node form.
    // 'form' => TRUE,
  );
}
