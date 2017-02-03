<?php

return array(
	'id'          => 'hom_page_metabox',
	'types'       => array( 'hom_page' ),
	'title'       => __( 'Page Builder', 'kazaz' ),
	'priority'    => 'high',
	'template'    => array(
		array(
			'type'      => 'group',
			'repeating' => true,
			'sortable'  => true,
			'name'      => 'hom_section',
			'title'     => __('Section', 'kazaz'),
			'fields'    => array(
				/* layout selection */
				array(
					'type' => 'radioimage',
					'name' => 'layout_style',
					'label' => __('Select this section layout', 'kazaz'),
					'item_max_height' => '90',
					'item_max_width' => '90',
					'items' => array(
						array(
							'value' => '1',
							'label' => __('1 column', 'kazaz'),
							'img' => get_template_directory_uri() . '/admin/metabox/img/1-col.png',
						),
						array(
							'value' => '2',
							'label' => __('2 columns', 'kazaz'),
							'img' => get_template_directory_uri() . '/admin/metabox/img/2-col.png',
						),
						array(
							'value' => '3',
							'label' => __('3 columns', 'kazaz'),
							'img' => get_template_directory_uri() . '/admin/metabox/img/3-col.png',
						),
						array(
							'value' => '4',
							'label' => __('4 columns', 'kazaz'),
							'img' => get_template_directory_uri() . '/admin/metabox/img/4-col.png',
						),
						array(
							'value' => '1_3-2_3',
							'label' => __('1/3 and 2/3 columns', 'kazaz'),
							'img' => get_template_directory_uri() . '/admin/metabox/img/1_3-2_3-col.png',
						),
						array(
							'value' => '2_3-1_3',
							'label' => __('2/3 and 1/3 columns', 'kazaz'),
							'img' => get_template_directory_uri() . '/admin/metabox/img/2_3-1_3-col.png',
						),
						array(
							'value' => '1_4-3_4',
							'label' => __('1/4 and 3/4 columns', 'kazaz'),
							'img' => get_template_directory_uri() . '/admin/metabox/img/1_4-3_4-col.png',
						),
						array(
							'value' => '3_4-1_4',
							'label' => __('3/4 and 1/4 columns', 'kazaz'),
							'img' => get_template_directory_uri() . '/admin/metabox/img/3_4-1_4-col.png',
						),
					),
					'default' => array(
						'1',
					),
				),
				/* layout selection end */
				/* merge columns */
				array(
					'name'  => 'merge_cols',
					'type'  => 'toggle',
					'label' => __('Merge layout columns at the first lower resolution?', 'kazaz'),
					'default' => 0,
				),
				/* merge columns */
				/* stripped columns */
				array(
					'name'  => 'stripe_cols',
					'type'  => 'toggle',
					'label' => __('Make columns stripped.', 'kazaz'),
					'default' => 0,
				),
				array(
					'name'    => 'stripe_odd_even',
					'type'    => 'select',
					'label'   => __('Stripped columns', 'kazaz'),
					'items' => array(
						array(
							'value' => 'odd',
							'label' => __('Odd columns (1, 3)', 'kazaz')
						),
						array(
							'value' => 'even',
							'label' => __('Even Columns (2, 4)', 'kazaz')
						),
					),
					'default' => 'odd',
					'dependency' => array(
						'field' => 'stripe_cols',
						'function' => 'vp_dep_boolean',
					),
				),
				/* stripped columns */
				/* force background */
				array(
					'name'  => 'force_background',
					'type'  => 'toggle',
					'label' => __('Force background? (fill-up column height gap)', 'kazaz'),
					'default' => 0,
				),
				/* force background */
				/* remove margins */
				array(
					'name'  => 'remove_margins',
					'type'  => 'toggle',
					'label' => __('Remove section margins?', 'kazaz'),
					'default' => 0,
				),
				/* remove margins */
				/* layout appearance */
				/* 1_1 */
				array(
					'type'      => 'group',
					'repeating' => false,
					'sortable'  => false,
					'name'      => 'section_1',
					'title'     => __('Section Layout', 'kazaz'),
					'dependency' => array(
						'field'    => 'layout_style',
						'function' => 'k_get_layout_style_1',
					),
					'fields'    => array(
						 array(
							'type' => 'group',
							'repeating' => true,
							'sortable'  => true,
							'name' => 'col_1_1',
							'title' => __('Shortcode', 'kazaz'),
							'fields'    => array(
								 array(
									'type' => 'textboxcustom',
									'name' => 'sc_1_1',
									'label' => __('Shortcode', 'kazaz'),
								),
							),
						),
					),
				),
				/* 1_1 */
				/* 1_2 */
				array(
					'type'      => 'group',
					'repeating' => false,
					'sortable'  => false,
					'name'      => 'section_2',
					'title'     => __('Section Layout', 'kazaz'),
					'dependency' => array(
						'field'    => 'layout_style',
						'function' => 'k_get_layout_style_2',
					),
					'fields'    => array(
						 array(
							'type' => 'group',
							'repeating' => true,
							'sortable'  => true,
							'name' => 'col_2_1',
							'title' => __('Shortcode', 'kazaz'),
							'fields'    => array(
								 array(
									'type' => 'textboxcustom',
									'name' => 'sc_2_1',
									'label' => __('Shortcode', 'kazaz'),
								),
							),
						),
						 array(
							'type' => 'group',
							'repeating' => true,
							'sortable'  => true,
							'name' => 'col_2_2',
							'title' => __('Shortcode', 'kazaz'),
							'fields'    => array(
								 array(
									'type' => 'textboxcustom',
									'name' => 'sc_2_2',
									'label' => __('Shortcode', 'kazaz'),
								),
							),
						),
					),
				),
				/* 1_2 */
				/* 1_3 */
				array(
					'type'      => 'group',
					'repeating' => false,
					'sortable'  => false,
					'name'      => 'section_3',
					'title'     => __('Section Layout', 'kazaz'),
					'dependency' => array(
						'field'    => 'layout_style',
						'function' => 'k_get_layout_style_3',
					),
					'fields'    => array(
						 array(
							'type' => 'group',
							'repeating' => true,
							'sortable'  => true,
							'name' => 'col_3_1',
							'title' => __('Shortcode', 'kazaz'),
							'fields'    => array(
								 array(
									'type' => 'textboxcustom',
									'name' => 'sc_3_1',
									'label' => __('Shortcode', 'kazaz'),
								),
							),
						),
						 array(
							'type' => 'group',
							'repeating' => true,
							'sortable'  => true,
							'name' => 'col_3_2',
							'title' => __('Shortcode', 'kazaz'),
							'fields'    => array(
								 array(
									'type' => 'textboxcustom',
									'name' => 'sc_3_2',
									'label' => __('Shortcode', 'kazaz'),
								),
							),
						),
						 array(
							'type' => 'group',
							'repeating' => true,
							'sortable'  => true,
							'name' => 'col_3_3',
							'title' => __('Shortcode', 'kazaz'),
							'fields'    => array(
								 array(
									'type' => 'textboxcustom',
									'name' => 'sc_3_3',
									'label' => __('Shortcode', 'kazaz'),
								),
							),
						),
					),
				),
				/* 1_3 */
				/* 1_4 */
				array(
					'type'      => 'group',
					'repeating' => false,
					'sortable'  => false,
					'name'      => 'section_4',
					'title'     => __('Section Layout', 'kazaz'),
					'dependency' => array(
						'field'    => 'layout_style',
						'function' => 'k_get_layout_style_4',
					),
					'fields'    => array(
						 array(
							'type' => 'group',
							'repeating' => true,
							'sortable'  => true,
							'name' => 'col_4_1',
							'title' => __('Shortcode', 'kazaz'),
							'fields'    => array(
								 array(
									'type' => 'textboxcustom',
									'name' => 'sc_4_1',
									'label' => __('Shortcode', 'kazaz'),
								),
							),
						),
						 array(
							'type' => 'group',
							'repeating' => true,
							'sortable'  => true,
							'name' => 'col_4_2',
							'title' => __('Shortcode', 'kazaz'),
							'fields'    => array(
								 array(
									'type' => 'textboxcustom',
									'name' => 'sc_4_2',
									'label' => __('Shortcode', 'kazaz'),
								),
							),
						),
						 array(
							'type' => 'group',
							'repeating' => true,
							'sortable'  => true,
							'name' => 'col_4_3',
							'title' => __('Shortcode', 'kazaz'),
							'fields'    => array(
								 array(
									'type' => 'textboxcustom',
									'name' => 'sc_4_3',
									'label' => __('Shortcode', 'kazaz'),
								),
							),
						),
						 array(
							'type' => 'group',
							'repeating' => true,
							'sortable'  => true,
							'name' => 'col_4_4',
							'title' => __('Shortcode', 'kazaz'),
							'fields'    => array(
								 array(
									'type' => 'textboxcustom',
									'name' => 'sc_4_4',
									'label' => __('Shortcode', 'kazaz'),
								),
							),
						),
					),
				),
				/* 1_4 */
				/* 1_3 + 2_3 */
				array(
					'type'      => 'group',
					'repeating' => false,
					'sortable'  => false,
					'name'      => 'section_5',
					'title'     => __('Section Layout', 'kazaz'),
					'dependency' => array(
						'field'    => 'layout_style',
						'function' => 'k_get_layout_style_5',
					),
					'fields'    => array(
						 array(
							'type' => 'group',
							'repeating' => true,
							'sortable'  => true,
							'name' => 'col_5_1',
							'title' => __('Shortcode', 'kazaz'),
							'fields'    => array(
								 array(
									'type' => 'textboxcustom',
									'name' => 'sc_5_1',
									'label' => __('Shortcode', 'kazaz'),
								),
							),
						),
						 array(
							'type' => 'group',
							'repeating' => true,
							'sortable'  => true,
							'name' => 'col_5_2',
							'title' => __('Shortcode', 'kazaz'),
							'fields'    => array(
								 array(
									'type' => 'textboxcustom',
									'name' => 'sc_5_2',
									'label' => __('Shortcode', 'kazaz'),
								),
							),
						),
					),
				),
				/* 1_3 + 2_3 */
				/* 2_3 + 1_3 */
				array(
					'type'      => 'group',
					'repeating' => false,
					'sortable'  => false,
					'name'      => 'section_6',
					'title'     => __('Section Layout', 'kazaz'),
					'dependency' => array(
						'field'    => 'layout_style',
						'function' => 'k_get_layout_style_6',
					),
					'fields'    => array(
						 array(
							'type' => 'group',
							'repeating' => true,
							'sortable'  => true,
							'name' => 'col_6_1',
							'title' => __('Shortcode', 'kazaz'),
							'fields'    => array(
								 array(
									'type' => 'textboxcustom',
									'name' => 'sc_6_1',
									'label' => __('Shortcode', 'kazaz'),
								),
							),
						),
						 array(
							'type' => 'group',
							'repeating' => true,
							'sortable'  => true,
							'name' => 'col_6_2',
							'title' => __('Shortcode', 'kazaz'),
							'fields'    => array(
								 array(
									'type' => 'textboxcustom',
									'name' => 'sc_6_2',
									'label' => __('Shortcode', 'kazaz'),
								),
							),
						),
					),
				),
				/* 2_3 + 1_3 */
				/* 1_4 + 3_4 */
				array(
					'type'      => 'group',
					'repeating' => false,
					'sortable'  => false,
					'name'      => 'section_7',
					'title'     => __('Section Layout', 'kazaz'),
					'dependency' => array(
						'field'    => 'layout_style',
						'function' => 'k_get_layout_style_7',
					),
					'fields'    => array(
						 array(
							'type' => 'group',
							'repeating' => true,
							'sortable'  => true,
							'name' => 'col_7_1',
							'title' => __('Shortcode', 'kazaz'),
							'fields'    => array(
								 array(
									'type' => 'textboxcustom',
									'name' => 'sc_7_1',
									'label' => __('Shortcode', 'kazaz'),
								),
							),
						),
						 array(
							'type' => 'group',
							'repeating' => true,
							'sortable'  => true,
							'name' => 'col_7_2',
							'title' => __('Shortcode', 'kazaz'),
							'fields'    => array(
								 array(
									'type' => 'textboxcustom',
									'name' => 'sc_7_2',
									'label' => __('Shortcode', 'kazaz'),
								),
							),
						),
					),
				),
				/* 1_4 + 3_4 */
				/* 3_4 + 1_4 */
				array(
					'type'      => 'group',
					'repeating' => false,
					'sortable'  => false,
					'name'      => 'section_8',
					'title'     => __('Section Layout', 'kazaz'),
					'dependency' => array(
						'field'    => 'layout_style',
						'function' => 'k_get_layout_style_8',
					),
					'fields'    => array(
						 array(
							'type' => 'group',
							'repeating' => true,
							'sortable'  => true,
							'name' => 'col_8_1',
							'title' => __('Shortcode', 'kazaz'),
							'fields'    => array(
								 array(
									'type' => 'textboxcustom',
									'name' => 'sc_8_1',
									'label' => __('Shortcode', 'kazaz'),
								),
							),
						),
						 array(
							'type' => 'group',
							'repeating' => true,
							'sortable'  => true,
							'name' => 'col_8_2',
							'title' => __('Shortcode', 'kazaz'),
							'fields'    => array(
								 array(
									'type' => 'textboxcustom',
									'name' => 'sc_8_2',
									'label' => __('Shortcode', 'kazaz'),
								),
							),
						),
					),
				),
				/* 3_4 + 1_4 */
				/* layout appearance end */
			),
		),
	),
);

/**
 * EOF
 */