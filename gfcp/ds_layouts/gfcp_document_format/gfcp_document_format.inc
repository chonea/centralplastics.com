<?php

function ds_gfcp_document_format() {
  return array(
    'label' => t('GFCP - documents formatter'),
    'regions' => array(
      'link' => t('link'),
      'text' => t('Text')
    ),
    // Uncomment if you want to include a CSS file for this layout (section_banner.css)
    'css' => FALSE,
    // Uncomment if this is a template for a node form.
    // 'form' => TRUE,
  );
}
