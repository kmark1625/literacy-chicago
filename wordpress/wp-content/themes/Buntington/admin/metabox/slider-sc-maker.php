<?php
return array(
	'id'          => 'slider_shortcode',
	'types'       => array( 'slider' ),
	'title'       => __('Slider Shortcode', 'kazaz'),
	'priority'    => 'high',
	'context'     => 'side',
	'template'    => array(
		array(
			'type' => 'html',
			'name' => 'slider_auto_shortcode',
			'binding' => array(
				'field' => 'slider_sc',
				'function' => 'k_slider_shortcode',
			),
		),
		array(
			'type' => 'notebox',
			'name' => 'slider_shortcode_notebox',
			'label' => __('How to use this slider?', 'kazaz'),
			'description' => __('Slider shortcode is generated automatically. In order to insert this slider copy and paste shortcode into Page, Post or Widget content.', 'kazaz'),
			'status' => 'info',
		),
	),
);

/**
 * EOF
 */