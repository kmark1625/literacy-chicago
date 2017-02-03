<?php
return array(
	'id'          => 'slider',
	'types'       => array( 'slider' ),
	'title'       => __('Slider definition', 'kazaz'),
	'priority'    => 'high',
	'context'     => 'normal',
	'template'    => array(
		array(
			'type' => 'select',
			'name' => 'slider_controls_type',
			'label' => __('Slider controls', 'kazaz'),
			'items' => array(
				array(
					'value' => 'paged',
					'label' => __('Show Pagination only', 'kazaz'),
				),
				array(
					'value' => 'slided',
					'label' => __('Show Left and Right controls', 'kazaz'),
				),
				array(
					'value' => 'paged-slided',
					'label' => __('Show Pagination and Controls', 'kazaz'),
				),
			),
			'default' => array(
				'paged-slided',
			),
		),
		array(
			'type' => 'select',
			'name' => 'slider_effect',
			'label' => __('Slider effect', 'kazaz'),
			'items' => array(
				array(
					'value' => 'default',
					'label' => __('Default', 'kazaz'),
				),
				array(
					'value' => 'fade',
					'label' => __('Fade', 'kazaz'),
				),
				array(
					'value' => 'crossfade',
					'label' => __('Crossfade', 'kazaz'),
				),
				array(
					'value' => 'perspective',
					'label' => __('Perspective', 'kazaz'),
				),
				array(
					'value' => 'dna',
					'label' => __('DNA', 'kazaz'),
				),
				array(
					'value' => 'push',
					'label' => __('Push', 'kazaz'),
				),
			),
			'default' => array(
				'default',
			),
		),
		array(
			'type' => 'select',
			'name' => 'slider_mode',
			'label' => __('Slider mode', 'kazaz'),
			'items' => array(
				array(
					'value' => 'manual',
					'label' => __('Manual', 'kazaz'),
				),
				array(
					'value' => 'auto',
					'label' => __('Automatic', 'kazaz'),
				),
			),
			'default' => array(
				'auto',
			),
		),
		array(
			'type' => 'select',
			'name' => 'slider_interval',
			'label' => __('Sliding Interval (if in Automatic mode)', 'kazaz'),
			'items' => array(
				array(
					'value' => '2000',
					'label' => __('2 seconds', 'kazaz'),
				),
				array(
					'value' => '4000',
					'label' => __('4 seconds', 'kazaz'),
				),
				array(
					'value' => '6000',
					'label' => __('6 seconds', 'kazaz'),
				),
				array(
					'value' => '8000',
					'label' => __('8 seconds', 'kazaz'),
				),
				array(
					'value' => '10000',
					'label' => __('10 seconds', 'kazaz'),
				),
			),
			'default' => array(
				'2000',
			),
		),
		array(
			'type' => 'select',
			'name' => 'slider_margins',
			'label' => __('Remove Slider margins', 'kazaz'),
			'items' => array(
				array(
					'value' => 'utabm',
					'label' => __('Use top and bottom margin!', 'kazaz'),
				),
				array(
					'value' => 'remove-margin-top',
					'label' => __('Remove top margin', 'kazaz'),
				),
				array(
					'value' => 'remove-margin-bottom',
					'label' => __('Remove bottom margin', 'kazaz'),
				),
				array(
					'value' => 'clear-margins',
					'label' => __('Remove top and bottom margin', 'kazaz'),
				),
			),
			'default' => array(
				'utabm',
			),
		),
		array(
			'type'        => 'group',
			'repeating'   => true,
			'sortable'    => true,
			'name'        => 'slider_slides',
			'title'       => __('Slides', 'kazaz'),
			'description' => __('Upload slider image, enter slide title and description - if any.', 'kazaz'),
			'fields'    => array(
				array(
					'type' => 'upload',
					'name' => 'slide_photo',
					'label' => __('Slide image', 'kazaz'),
				),
				array(
					'type'  => 'textbox',
					'name'  => 'slide_title',
					'label' => __('Slide title', 'kazaz'),
				),
				array(
					'type'  => 'textarea',
					'name'  => 'slide_description',
					'label' => __('Slide description', 'kazaz'),
				),
				array(
					'type'  => 'textbox',
					'name'  => 'slide_link',
					'label' => __('Slide link (must be full URL)', 'kazaz'),
				),
				array(
					'type' => 'select',
					'name' => 'caption_position',
					'label' => __('Caption position/size', 'kazaz'),
					'items' => array(
						array(
							'value' => 'pos-1-3-right',
							'label' => __('1/3 wide, RIGHT aligned', 'kazaz'),
						),
						array(
							'value' => 'pos-1-3-left',
							'label' => __('1/3 wide, LEFT aligned', 'kazaz'),
						),
						array(
							'value' => 'pos-2-3-right',
							'label' => __('2/3 wide, RIGHT aligned', 'kazaz'),
						),
						array(
							'value' => 'pos-2-3-left',
							'label' => __('2/3 wide, LEFT aligned', 'kazaz'),
						),
						array(
							'value' => 'pos-c-2-3',
							'label' => __('2/3 wide, CENTERED', 'kazaz'),
						),
						array(
							'value' => 'pos-l-full',
							'label' => __('Full width, text LEFT', 'kazaz'),
						),
						array(
							'value' => 'pos-r-full',
							'label' => __('Full width, text RIGHT', 'kazaz'),
						),
						array(
							'value' => 'pos-c-full',
							'label' => __('Full width, CENTERED', 'kazaz'),
						),
					),
					'default' => array(
						'pos-1-3-right',
					),
				),
				array(
					'type' => 'select',
					'name' => 'caption_scheme',
					'label' => __('Caption text scheme', 'kazaz'),
					'items' => array(
						array(
							'value' => 'scheme-dark',
							'label' => __('Text light', 'kazaz'),
						),
						array(
							'value' => 'scheme-light',
							'label' => __('Text dark', 'kazaz'),
						),
					),
					'default' => array(
						'scheme-dark',
					),
				),
				array(
					'type' => 'select',
					'name' => 'title_size',
					'label' => __('Caption title size', 'kazaz'),
					'items' => array(
						array(
							'value' => 'caption-title',
							'label' => __('Regular', 'kazaz'),
						),
						array(
							'value' => 'caption-title title-giant',
							'label' => __('Oversized', 'kazaz'),
						),
					),
					'default' => array(
						'caption-title',
					),
				),
				array(
					'type' => 'toggle',
					'name' => 'remove_background',
					'label' => __('Remove background? (will keep the text scheme)', 'kazaz'),
				),
			),
		),
	),
);
/**
 * EOF
 */