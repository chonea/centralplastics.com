<?php

function gfcp_preprocess_page( &$vars ) {
  //dpm($vars);
	$vars['page']['header']['search_form']['actions']['submit']['#value'] = 'Go';
}

function gfcp_preprocess_block( &$vars ) {

	if($vars['block_html_id'] == 'block-multiblock-1'){
		//dpm($vars);
		$vars['classes_array'][] = 'four columns';
	}

	if($vars['block_html_id'] == 'block-block-4'){
		$vars['classes_array'][] = 'four columns';
	}

	if( $vars['block_html_id'] == 'block-views-news-block' ){
		$vars['classes_array'][] = 'eight columns';
	}

	if( $vars['block_html_id'] == 'block-menu-block-1' ){
		$vars['classes_array'][] = 'container';
	}

}

