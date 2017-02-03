<?php
return array(
	'id'          => 'content_chunk_shortcode',
	'types'       => array( 'chunk' ),
	'title'       => __('Content Shortcode', 'kazaz'),
	'priority'    => 'high',
	'context'     => 'side',
	'template'    => array(
		array(
			'type' => 'html',
			'name' => 'content_auto_shortcode',
			'binding' => array(
				'field' => 'content_sc',
				'function' => 'k_content_shortcode',
			),
		),
		array(
			'type' => 'notebox',
			'name' => 'content_shortcode_notebox',
			'label' => __('How to use Content Chunks?', 'kazaz'),
			'description' => __('Copy-paste Content Chunk shortcode to display content in widget ready sections or other pages or posts.', 'kazaz'),
			'status' => 'info',
		),
	),
);

/**
 * EOF
 */