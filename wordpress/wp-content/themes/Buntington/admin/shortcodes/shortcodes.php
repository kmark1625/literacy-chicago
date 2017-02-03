<?php

return array(
	// Columns
	'Columns' => array(
		'elements' => array(
			/* Layout starts */
			'column_1' => array(
				'title'   => __( 'Column Single', 'kazaz' ),
				'code'    => '[row]<br /><br />[column col="12"] ' . __( 'Column content goes here...', 'kazaz' ) . ' [/column]<br /><br />[/row]',
			), 
			// 1 column end
			'column_2' => array(
				'title'   => __( 'Columns 1/2 + 1/2', 'kazaz' ),
				'code'    => '[row]<br /><br />[column col="6"] '  . __( 'Column content goes here...', 'kazaz' ) . ' [/column]<br /><br />[column col="6"] ' . __( 'Column content goes here...', 'kazaz' ) . ' [/column]<br /><br />[/row]',
			),
			// 2 columns end
			'column_3' => array(
				'title'   => __( 'Columns 1/3 + 1/3 + 1/3', 'kazaz' ),
				'code'    => '[row]<br /><br />[column col="4"] ' . __( 'Column content goes here...', 'kazaz' ) . ' [/column]<br /><br />[column col="4"] ' . __( 'Column content goes here...', 'kazaz' ) . ' [/column]<br /><br />[column col="4"] ' . __( 'Column content goes here...', 'kazaz' ) . ' [/column]<br /><br />[/row]',
			),
			// 3 columns end
			'column_4' => array(
				'title'   => __( 'Columns 1/4 + 1/4 + 1/4 + 1/4', 'kazaz' ),
				'code'    => '[row]<br /><br />[column col="3"] ' . __( 'Column content goes here...', 'kazaz' ) . ' [/column]<br /><br />[column col="3"] ' . __( 'Column content goes here...', 'kazaz' ) . ' [/column]<br /><br />[column col="3"] ' . __( 'Column content goes here...', 'kazaz' ) . ' [/column]<br /><br />[column col="3"] ' . __( 'Column content goes here...', 'kazaz' ) . ' [/column]<br /><br />[/row]',
			),
			// 4 columns end
			'column_6' => array(
				'title'   => __( 'Columns 1/6 + 1/6 + 1/6 + 1/6 + 1/6 + 1/6', 'kazaz' ),
				'code'    => '[row]<br /><br />[column col="2"] ' . __( 'Column content goes here...', 'kazaz' ) . ' [/column]<br /><br />[column col="2"] ' . __( 'Column content goes here...', 'kazaz' ) . ' [/column]<br /><br />[column col="2"] ' . __( 'Column content goes here...', 'kazaz' ) . ' [/column]<br /><br />[column col="2"] ' . __( 'Column content goes here...', 'kazaz' ) . ' [/column]<br /><br />[column col="2"] ' . __( 'Column content goes here...', 'kazaz' ) . ' [/column]<br /><br />[column col="2"] ' . __( 'Column content goes here...', 'kazaz' ) . ' [/column]<br /><br />[/row]',
			),
			// 6 columns end
			'column_1_3_2_3' => array(
				'title'   => __( 'Columns 1/3 + 2/3', 'kazaz' ),
				'code'    => '[row]<br /><br />[column col="4"] ' . __( 'Column content goes here...', 'kazaz' ) . ' [/column]<br /><br />[column col="8"] ' . __( 'Column content goes here...', 'kazaz' ) . ' [/column]<br /><br />[/row]',
			),
			// 1_3_2_3 columns end
			'column_2_3_1_3' => array(
				'title'   => __( 'Columns 2/3 + 1/3', 'kazaz' ),
				'code'    => '[row]<br /><br />[column col="8"] ' . __( 'Column content goes here...', 'kazaz' ) . ' [/column]<br /><br />[column col="4"] ' . __( 'Column content goes here...', 'kazaz' ) . ' [/column]<br /><br />[/row]',
			),
			// 1_3_2_3 columns end
			'column_1_4_3_4' => array(
				'title'   => __( 'Columns 1/4 + 3/4', 'kazaz' ),
				'code'    => '[row]<br /><br />[column col="3"] ' . __( 'Column content goes here...', 'kazaz' ) . ' [/column]<br /><br />[column col="9"] ' . __( 'Column content goes here...', 'kazaz' ) . ' [/column]<br /><br />[/row]',
			),
			// 1_4_3_4 columns end
			'column_3_4_1_4' => array(
				'title'   => __( 'Columns 3/4 + 1/4', 'kazaz' ),
				'code'    => '[row]<br /><br />[column col="9"] ' . __( 'Column content goes here...', 'kazaz' ) . ' [/column]<br /><br />[column col="3"] ' . __( 'Column content goes here...', 'kazaz' ) . ' [/column]<br /><br />[/row]',
			),
			// 1_4_3_4 columns end
			'row' => array(
				'title'   => __('Row', 'kazaz'),
				'code'    => '[row]<br /><br />' . __( 'Column(s) should be placed here...', 'kazaz' ) . '<br /><br />[/row]',
				'attributes' => array(
					array(
						'name'  => 'equal_height',
						'type'  => 'toggle',
						'label' => __('Equal height items row', 'kazaz'),
					),
				),
			), // custom row end
			'column_custom' => array(
				'title'   => __( 'Custom Column', 'kazaz' ),
				'code'    => '[custom_column] ' . __( 'Column content goes here...', 'kazaz' ) . ' [/custom_column]',
				'attributes' => array(
					array(
						'name'    => 'col',
						'type'    => 'slider',
						'label'   => __( 'Column width', 'kazaz' ),
						'min'     => 1,
						'max'     => 12,
						'default' => 12,
					),
					array(
						'name'    => 'offset',
						'type'    => 'slider',
						'label'   => __('Column offset', 'kazaz'),
						'min'     => 0,
						'max'     => 11,
						'default' => 0,
					),
					array(
						'name'    => 'textalign',
						'type'    => 'select',
						'label'   => __('Select text alignment', 'kazaz'),
						'items' => array(
							array(
								'value' => 'text-left',
								'label' => __('Align to Left', 'kazaz')
							),
							array(
								'value' => 'text-center',
								'label' => __('Align to Center', 'kazaz')
							),
							array(
								'value' => 'text-right',
								'label' => __('Align to Right', 'kazaz')
							),
						),
						'default' => 'text-left',
					),
				),
			), // custom column end
		), 
		// end elements
	), // end Columns
	// Spacers and Separators start
	'Spacers and Separators' => array(
		'elements' => array(
			/* gaps */
			'gaps' => array(
				'title'   => __( 'Content gaps', 'kazaz' ),
				'code'    => '[gap]',
				'attributes' => array(
					array(
						'name'    => 'height',
						'type'    => 'select',
						'label'   => __('Select content gap height', 'kazaz'),
						'items' => array(
							array(
								'value' => '10',
								'label' => __('10px Gap', 'kazaz')
							),
							array(
								'value' => '20',
								'label' => __('20px Gap', 'kazaz')
							),
							array(
								'value' => '30',
								'label' => __('30px Gap', 'kazaz')
							),
							array(
								'value' => '40',
								'label' => __('40px Gap', 'kazaz')
							),
							array(
								'value' => '50',
								'label' => __('50px Gap', 'kazaz')
							),
							array(
								'value' => '60',
								'label' => __('60px Gap', 'kazaz')
							),
						),
						'default' => '40',
					),
				),
			), 
			/* gaps ends */
			/* separators */
			'separators' => array(
				'title'   => __( 'Content separators', 'kazaz' ),
				'code'    => '[separator]',
				'attributes' => array(
					array(
						'name'    => 'style',
						'type'    => 'select',
						'label'   => __('Select separator style', 'kazaz'),
						'items' => array(
							array(
								'value' => 'regular',
								'label' => __('Regular, 1px line', 'kazaz')
							),
							array(
								'value' => 'dbl-strike',
								'label' => __('Double strike', 'kazaz')
							),
							array(
								'value' => 'dashed',
								'label' => __('Dashed line', 'kazaz')
							),
							array(
								'value' => 'dotted',
								'label' => __('Dotted line', 'kazaz')
							),
							array(
								'value' => 'zigzag',
								'label' => __('Zig-zag line', 'kazaz')
							),
							array(
								'value' => 'fatty',
								'label' => __('Fat one', 'kazaz')
							),
						),
						'default' => 'regular',
					),
				),
			), 
		), // separators end
	),
	// Spacers and Separators end
	// Content starts
	'Content' => array(
		'elements' => array(
			/* Content Chunk */
			'content_chunk' => array(
				'title'   => __( 'Insert Content', 'kazaz' ),
				'code'    => '[content_chunk]',
				'attributes' => array(
					array(
						'name'  => 'section_title',
						'type'  => 'textbox',
						'label' => __('The title', 'kazaz'),
					),
					array(
						'type' => 'select',
						'name' => 'id',
						'label' => __('Content Chunk', 'kazaz'),
						'items' => array(
							'data' => array(
								array(
									'source' => 'function',
									'value' => 'k_get_content_chunks',
								),
							),
						),
					),
				),
			),
			/* Content Chunk ends */
			/* Blog */
			'blog' => array(
				'title'   => __( 'Blog', 'kazaz' ),
				'code'    => '[blog]',
				'attributes' => array(
					array(
						'name'  => 'section_title',
						'type'  => 'textbox',
						'label' => __('The title', 'kazaz'),
					),
					array(
						'name'  => 'items_number',
						'type'  => 'textbox',
						'label' => __('Number of posts to show', 'kazaz'),
						'default' => 6,
					),
					array(
						'type' => 'multiselect',
						'name' => 'include_categories',
						'label' => __('Include posts from selected categories', 'kazaz'),
						'items' => array(
							'data' => array(
								array(
									'source' => 'function',
									'value' => 'k_get_categories',
								),
							),
						),
					),
					array(
						'type' => 'multiselect',
						'name' => 'exclude_posts',
						'label' => __('Exclude specific post(s)', 'kazaz'),
						'items' => array(
							'data' => array(
								array(
									'source' => 'function',
									'value' => 'k_get_posts',
								),
							),
						),
					),
					array(
						'name'  => 'clear_wrapper_margin',
						'type'  => 'toggle',
						'label' => __('Remove wrapper top margin?', 'kazaz'),
						'default' => 'true',
					),
				),
			), 
			/* Blog ends */
			/* recent news */
			'hp_recent_news' => array(
				'title'   => __( 'Recent News', 'kazaz' ),
				'code'    => '[recent_news]',
				'attributes' => array(
					array(
						'name'  => 'section_title',
						'type'  => 'textbox',
						'label' => __('The title', 'kazaz'),
					),
					array(
						'name'  => 'items_number',
						'type'  => 'textbox',
						'label' => __('Number of posts to show', 'kazaz'),
						'default' => 3,
					),
					array(
						'type' => 'multiselect',
						'name' => 'exclude_categories',
						'label' => __('Exclude posts from selected categories', 'kazaz'),
						'items' => array(
							'data' => array(
								array(
									'source' => 'function',
									'value' => 'k_get_categories',
								),
							),
						),
					),
					array(
						'name'    => 'style',
						'type'    => 'select',
						'label'   => __('Select news style', 'kazaz'),
						'items' => array(
							array(
								'value' => 'basic',
								'label' => __('No summary text', 'kazaz')
							),
							array(
								'value' => 'extended',
								'label' => __('With the summary text', 'kazaz')
							),
						),
						'default' => 'basic',
					),
				),
			), 
			/* recent news ends */
			/* Upcoming Events */
			'hp_upcoming_events' => array(
				'title'   => __( 'Upcoming Events', 'kazaz' ),
				'code'    => '[upcoming_events]',
				'attributes' => array(
					array(
						'name'  => 'section_title',
						'type'  => 'textbox',
						'label' => __('The title', 'kazaz'),
					),
					array(
						'name'  => 'items_number',
						'type'  => 'textbox',
						'label' => __('Number of events to show', 'kazaz'),
						'default' => 3,
					),
				),
			), 
			/* Upcoming Events ends */
			/* blockquote starts */
			'blockquotes' => array(
				'title'   => __( 'Blockquotes', 'kazaz' ),
				'code'    => '[blockquote]<br /><br />' . __( 'Content goes here...', 'kazaz' ) . '<br /><br />[/blockquote]',
				'attributes' => array(
					array(
						'name'  => 'quote_author',
						'type'  => 'textbox',
						'label' => __('Quote author', 'kazaz'),
						'default' => 'Johnny Doe',
					),
					array(
						'name'  => 'quote_source',
						'type'  => 'textbox',
						'label' => __('Quote surce', 'kazaz'),
						'default' => 'New York Times',
					),
					array(
						'name'    => 'textalign',
						'type'    => 'select',
						'label'   => __('Select Blockquote float', 'kazaz'),
						'items' => array(
							array(
								'value' => 'pull-left',
								'label' => __('Float left', 'kazaz')
							),
							array(
								'value' => 'pull-right',
								'label' => __('Float right', 'kazaz')
							),
						),
						'default' => 'pull-left',
					),
				),
			), 
			/* blockquote ends */
			/* bullet-paragraph starts */
			'bullet_paragraphs' => array(
				'title'   => __( 'Bullet-paragraph', 'kazaz' ),
				'code'    => '[bullet_paragraph]<br /><br />' . __( 'Content goes here...', 'kazaz' ) . '<br /><br />[/bullet_paragraph]',
				'attributes' => array(
					array(
						'name'  => 'paragraph_icon',
						'type'  => 'fontawesome',
						'label' => __('Select Fontawesome Icon', 'kazaz'),
					),
				),
			), 
			/* bullet-paragraph ends */
			/* team member starts */
			'team_members' => array(
				'title'   => __( 'Team Member', 'kazaz' ),
				'code'    => '[team_member]<br /><br />' . __( 'Content goes here...', 'kazaz' ) . '<br /><br />[/team_member]',
				'attributes' => array(
					array(
						'type' => 'upload',
						'name' => 'photo',
						'label' => __('Upload team member photo (min 100px wide!)', 'kazaz'),
					),
					array(
						'name'  => 'name',
						'type'  => 'textbox',
						'label' => __('Team member name', 'kazaz'),
						'default' => 'John Doe',
					),
					array(
						'name'  => 'position',
						'type'  => 'textbox',
						'label' => __('Team member position', 'kazaz'),
						'default' => 'Superintendent',
					),
					array(
						'name'  => 'tagline',
						'type'  => 'textbox',
						'label' => __('Team member tagline', 'kazaz'),
						'default' => 'Administrative team member since June, 1962',
					),
				),
			), 
			/* team member ends */
			/* buttons start */
			'buttons' => array(
				'title'   => __( 'Buttons', 'kazaz' ),
				'code'    => '[button]',
				'attributes' => array(
					array(
						'name'    => 'style',
						'type'    => 'select',
						'label'   => __('Select Button style', 'kazaz'),
						'items' => array(
							array(
								'value' => 'btn-default',
								'label' => __('Button Default', 'kazaz')
							),
							array(
								'value' => 'btn-primary',
								'label' => __('Button Primary', 'kazaz')
							),
							array(
								'value' => 'btn-info',
								'label' => __('Button Info', 'kazaz')
							),
							array(
								'value' => 'btn-danger',
								'label' => __('Button Danger', 'kazaz')
							),
							array(
								'value' => 'btn-success',
								'label' => __('Button Success', 'kazaz')
							),
							array(
								'value' => 'btn-warning',
								'label' => __('Button Warning', 'kazaz')
							),
						),
						'default' => 'btn-default',
					),
					array(
						'name'    => 'size',
						'type'    => 'select',
						'label'   => __('Select Button size', 'kazaz'),
						'items' => array(
							array(
								'value' => 'btn-lg',
								'label' => __('Large size', 'kazaz')
							),
							array(
								'value' => 'btn-md',
								'label' => __('Medium size', 'kazaz')
							),
							array(
								'value' => 'btn-sm',
								'label' => __('Small size', 'kazaz')
							),
							array(
								'value' => 'btn-xs',
								'label' => __('Extra Small size', 'kazaz')
							),
						),
						'default' => 'default',
					),
					array(
						'name'  => 'label',
						'type'  => 'textbox',
						'label' => __('Button label', 'kazaz'),
						'default' => 'BUTTON',
					),
					array(
						'name'  => 'icon',
						'type'  => 'fontawesome',
						'label' => __('Select Fontawesome Icon', 'kazaz'),
					),
					array(
						'name'  => 'link',
						'type'  => 'textbox',
						'label' => __('Button link (absolute URL!)', 'kazaz'),
						'default' => 'http://',
					),
					array(
						'name'    => 'link_opens',
						'type'    => 'select',
						'label'   => __('Link should be opened in', 'kazaz'),
						'items' => array(
							array(
								'value' => '_self',
								'label' => __('The same page', 'kazaz')
							),
							array(
								'value' => '_blank',
								'label' => __('New Browser tab/window', 'kazaz')
							),
						),
						'default' => '_self',
					),
				),
			), 
			/* buttons end */
			/* super buttons start */
			'super_buttons' => array(
				'title'   => __( 'Super Button', 'kazaz' ),
				'code'    => '[super_button]',
				'attributes' => array(
					array(
						'name'  => 'icon',
						'type'  => 'fontawesome',
						'label' => __('Select Fontawesome Icon', 'kazaz'),
					),
					array(
						'name'  => 'label',
						'type'  => 'textbox',
						'label' => __('Button label', 'kazaz'),
						'default' => 'Button Label',
					),
					array(
						'name'  => 'tagline',
						'type'  => 'textbox',
						'label' => __('Button tagline', 'kazaz'),
						'default' => 'My button tagline...',
					),
					array(
						'name'  => 'color',
						'type'  => 'color',
						'label' => __('Button color', 'kazaz'),
						'default' => '#ea5644',
					),
					array(
						'name'  => 'link',
						'type'  => 'textbox',
						'label' => __('Button link (absolute URL!)', 'kazaz'),
						'default' => 'http://',
					),
					array(
						'name'    => 'link_opens',
						'type'    => 'select',
						'label'   => __('Link should be opened in', 'kazaz'),
						'items' => array(
							array(
								'value' => '_self',
								'label' => __('The same page', 'kazaz')
							),
							array(
								'value' => '_blank',
								'label' => __('New Browser tab/window', 'kazaz')
							),
						),
						'default' => '_self',
					),
				),
			), 
			/* super buttons end */
			/* alerts start */
			'alert' => array(
				'title'   => __( 'Alerts', 'kazaz' ),
				'code'    => '[alert]<br /><br />' . __( 'Content goes here...', 'kazaz' ) . '<br /><br />[/alert]',
				'attributes' => array(
					array(
						'name'    => 'style',
						'type'    => 'select',
						'label'   => __('Select Alert style', 'kazaz'),
						'items' => array(
							array(
								'value' => 'alert-success',
								'label' => __('Alert success', 'kazaz')
							),
							array(
								'value' => 'alert-info',
								'label' => __('Alert Info', 'kazaz')
							),
							array(
								'value' => 'alert-warning',
								'label' => __('Alert Warning', 'kazaz')
							),
							array(
								'value' => 'alert-danger',
								'label' => __('Alert Danger', 'kazaz')
							),
						),
						'default' => 'alert-success',
					),
					array(
						'name'  => 'dismissable',
						'type'  => 'toggle',
						'label' => __('Dismissable Alert', 'kazaz'),
					),
				),
			), 
			/* alerts end */
			/* progress bar starts */
			'progress_bars' => array(
				'title'   => __( 'Progress Bars', 'kazaz' ),
				'code'    => '[progress_bar]',
				'attributes' => array(
					array(
						'name'    => 'style',
						'type'    => 'select',
						'label'   => __('Progress Bar style', 'kazaz'),
						'items' => array(
							array(
								'value' => 'default',
								'label' => __('Progress Bar default', 'kazaz')
							),
							array(
								'value' => 'progress-bar-success',
								'label' => __('Progress Bar success', 'kazaz')
							),
							array(
								'value' => 'progress-bar-info',
								'label' => __('Progress Bar info', 'kazaz')
							),
							array(
								'value' => 'progress-bar-warning',
								'label' => __('Progress Bar warning', 'kazaz')
							),
							array(
								'value' => 'progress-bar-danger',
								'label' => __('Progress Bar danger', 'kazaz')
							),
						),
						'default' => 'default',
					),
					array(
						'name'    => 'value',
						'type'    => 'slider',
						'label'   => __( 'Progress Bar value', 'kazaz' ),
						'min'     => 0,
						'max'     => 100,
						'default' => 29,
					),
					array(
						'name'  => 'striped',
						'type'  => 'toggle',
						'label' => __('Progress Bar striped', 'kazaz'),
					),
				),
			), 
			/* progress bar ends */
			/* google map starts */
			'google_maps' => array(
				'title'   => __( 'Google Map', 'kazaz' ),
				'code'    => '[google_map]',
				'attributes' => array(
					array(
						'type' => 'textbox',
						'name' => 'title',
						'label' => __('Google Map title', 'kazaz'),
						'default' => 'My Map Title',
					),
					array(
						'type' => 'textbox',
						'name' => 'lat',
						'label' => __('Location Latitude', 'kazaz'),
						'default' => 37.782231,
					),
					array(
						'type' => 'textbox',
						'name' => 'lon',
						'label' => __('Location Longitude', 'kazaz'),
						'default' => -122.400679,
					),
					array(
						'type'  => 'slider',
						'name'  => 'zoom',
						'label' => __('Map Zoom level', 'kazaz'),
						'min'   => 3,
						'max'   => 19,
						'default' => 15,
					),
					array(
						'type' => 'upload',
						'name' => 'marker',
						'label' => __('Upload custom Marker', 'kazaz'),
					),
					array(
						'type' => 'textbox',
						'name' => 'name',
						'label' => __('Map marker name/company', 'kazaz'),
						'default' => 'John Doe, Inc.',
					),
					array(
						'type' => 'textbox',
						'name' => 'address',
						'label' => __('Map marker address', 'kazaz'),
						'default' => '795 Folsom Ave, Suite 600',
					),
					array(
						'type' => 'textbox',
						'name' => 'city',
						'label' => __('Map marker city', 'kazaz'),
						'default' => 'San Francisco',
					),
					array(
						'type' => 'textbox',
						'name' => 'state',
						'label' => __('Map marker state', 'kazaz'),
						'default' => 'CA',
					),
					array(
						'type' => 'textbox',
						'name' => 'zip',
						'label' => __('Map marker zip code', 'kazaz'),
						'default' => '94107',
					),
					array(
						'type' => 'textbox',
						'name' => 'country',
						'label' => __('Map marker country', 'kazaz'),
						'default' => 'USA',
					),
				),
			), 
			/* google map ends */
			/* simple pie chart starts */
			'pie_charts' => array(
				'title'   => __( 'Simple Pie Chart', 'kazaz' ),
				'code'    => '[pie_chart]',
				'attributes' => array(
					array(
						'name'  => 'color',
						'type'  => 'color',
						'label' => __('Pick Chart color', 'kazaz'),
						'default' => '#333333',
					),
					array(
						'name'    => 'value',
						'type'    => 'slider',
						'label'   => __( 'Chart value', 'kazaz' ),
						'min'     => 0,
						'max'     => 100,
						'default' => 29,
					),
					array(
						'type' => 'textbox',
						'name' => 'label',
						'label' => __('Chart label', 'kazaz'),
						'default' => 'My chart',
					),
					array(
						'name'    => 'chart_align',
						'type'    => 'select',
						'label'   => __('Select label alignment (pie chart will always be centered!)', 'kazaz'),
						'items' => array(
							array(
								'value' => 'text-left',
								'label' => __('Align to Left', 'kazaz')
							),
							array(
								'value' => 'text-center',
								'label' => __('Align to Center', 'kazaz')
							),
							array(
								'value' => 'text-right',
								'label' => __('Align to Right', 'kazaz')
							),
						),
						'default' => 'text-center',
					),
					array(
						'name'    => 'line_width',
						'type'    => 'slider',
						'label'   => __( 'Chart line width', 'kazaz' ),
						'min'     => 10,
						'max'     => 25,
						'default' => 12,
					),
					array(
						'type' => 'textbox',
						'name' => 'width',
						'label' => __('Chart width and height (BEWARE: it is not responsive!)', 'kazaz'),
						'default' => 120,
					),
				),
			), 
			/* simple pie chart ends */
			/* video embed start */
			'embeder' => array(
				'title'   => __( 'Embed (Video, Soundcloud)', 'kazaz' ),
				'code'    => '[embedr]<br /><br />' . __( 'Paste SHARE link here (YouTube, Vimeo, Blip.tv, Soundcloud...)', 'kazaz' ) . '<br /><br />[/embedr]',
				'attributes' => array(
					array(
						'name'  => 'responsive',
						'type'  => 'toggle',
						'label' => __('Should the content be responsive?', 'kazaz'),
						'default' => 'true',
					),
				),
			),
			/* video embed end */
			/* audio player start */
			'audio_player' => array(
				'title'   => __( 'Insert Audio Player', 'kazaz' ),
				'code'    => '[audio_playr]',
				'attributes' => array(
					array(
						'type' => 'textbox',
						'name' => 'src_ogg',
						'label' => __('Full path to ".ogg" file version (required!)', 'kazaz'),
					),
					array(
						'type' => 'textbox',
						'name' => 'src_mp3',
						'label' => __('Full path to ".mp3" file version (required!)', 'kazaz'),
					),
				),
			),
			/* audio playerend */
			/* fontawesome icon starts */
			'awesome_icons' => array(
				'title'   => __( 'Fontawesome Icon', 'kazaz' ),
				'code'    => '[awesome_icon]',
				'attributes' => array(
					array(
						'name'  => 'icon',
						'type'  => 'fontawesome',
						'label' => __('Select Fontawesome Icon', 'kazaz'),
					),
					array(
						'name'    => 'icon_size',
						'type'    => 'select',
						'label'   => __('Fontawesome icon size', 'kazaz'),
						'items' => array(
							array(
								'value' => 'fa-lg',
								'label' => __('Regular size', 'kazaz')
							),
							array(
								'value' => 'fa-2x',
								'label' => __('2x size', 'kazaz')
							),
							array(
								'value' => 'fa-3x',
								'label' => __('3x size', 'kazaz')
							),
							array(
								'value' => 'fa-4x',
								'label' => __('4x size', 'kazaz')
							),
							array(
								'value' => 'fa-5x',
								'label' => __('5x size', 'kazaz')
							),
						),
						'default' => 'fa-lg',
					),
				),
			), 
			/* fontawesome icon ends */
		),
	),
	// Content ends
	// Tabs starts
	'Tabed Content' => array(
		'elements' => array(
			'tabs_container' => array(
				'title'   => __( 'STEP 1: Create tabs wrapper', 'kazaz' ),
				'code'    => '[tabs_wrapper]<br /><br />' . __( 'Start adding tab containers here...', 'kazaz' ) . '<br /><br />[/tabs_wrapper]',
				'attributes' => array(
					array(
						'name'    => 'style',
						'type'    => 'select',
						'label'   => __('Tabs navigation style', 'kazaz'),
						'items' => array(
							array(
								'value' => 'nav-tabs',
								'label' => __('Tabs regular', 'kazaz')
							),
							array(
								'value' => 'nav-pills',
								'label' => __('Pills', 'kazaz')
							),
						),
						'default' => 'nav-tabs',
					),
					array(
						'name'  => 'justify',
						'type'  => 'toggle',
						'label' => __('Justify tabs', 'kazaz'),
					),
				),
			), 
			'tab_content' => array(
				'title'   => __( 'STEP 2: Add single tab container', 'kazaz' ),
				'code'    => '[tab_content] ' . __( 'Content goes here...', 'kazaz' ) . ' [/tab_content]',
				'attributes' => array(
					array(
						'name'  => 'tab_label',
						'type'  => 'textbox',
						'label' => __('Tab Label', 'kazaz'),
						'default' => 'Tab 1',
					),
				),
			),
		),
	),
	// Tabs ends
	// Accordion starts
	'Accordion' => array(
		'elements' => array(
			'accordion_container' => array(
				'title'   => __( 'STEP 1: Create accordion wrapper', 'kazaz' ),
				'code'    => '[accordion_wrapper]<br /><br />' . __( 'Start adding accordion containers here...', 'kazaz' ) . '<br /><br />[/accordion_wrapper]',
			), 
			'accordion_content' => array(
				'title'   => __( 'STEP 2: Add single accordion content', 'kazaz' ),
				'code'    => '[accordion_content] ' . __( 'Content goes here...', 'kazaz' ) . ' [/accordion_content]',
				'attributes' => array(
					array(
						'name'  => 'accordion_label',
						'type'  => 'textbox',
						'label' => __('Accordion Label', 'kazaz'),
						'default' => 'Accordion 1',
					),
				),
			),
		),
	),
	// Accordion ends
	// Slider starts
	'Sliders' => array(
		'elements' => array(
			'slider_pages' => array(
				'title'   => __( 'Insert Slider', 'kazaz' ),
				'code'    => '[slider]',
				'attributes' => array(
					array(
						'type' => 'select',
						'name' => 'id',
						'label' => __('Select slider by title', 'kazaz'),
						'items' => array(
							'data' => array(
								array(
									'source' => 'function',
									'value' => 'k_get_sliders',
								),
							),
						),
					),
				),
			),
		),
	),
	// Slider ends
	
);

/**
 * EOF
 */