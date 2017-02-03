<?php

return array(
	'Content' => array(
		'elements' => array(
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
			/* Content Chunk */
			'hp_content_chunk' => array(
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
			/* Slider */
			'hp_slider_pages' => array(
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
			/* Slider ends */
		), // elements end
	),
	'Media' => array(
		'elements' => array(
			/* Video */
			'hp_embed' => array(
				'title'   => __( 'Embed (Video, Soundcloud)', 'kazaz' ),
				'code'    => '[embed]',
				'attributes' => array(
					array(
						'name'  => 'section_title',
						'type'  => 'textbox',
						'label' => __('The title', 'kazaz'),
					),
					array(
						'type' => 'textbox',
						'name' => 'share',
						'label' => __( 'SHARE link here (YouTube, Vimeo, Blip.tv, Soundcloud...)', 'kazaz' ),
					),
					array(
						'name'  => 'responsive',
						'type'  => 'toggle',
						'label' => __('Should the content be responsive?', 'kazaz'),
						'default' => 'true',
					),
				),
			),
			/* Video ends */
			/* Featured Gallery */
			'hp_featured_gallery' => array(
				'title'   => __( 'Featured Gallery', 'kazaz' ),
				'code'    => '[featured_gallery]',
				'attributes' => array(
					array(
						'name'  => 'section_title',
						'type'  => 'textbox',
						'label' => __('The title', 'kazaz'),
					),
					array(
						'type' => 'select',
						'name' => 'gallery_id',
						'label' => __('Select featured Gallery by title', 'kazaz'),
						'items' => array(
							'data' => array(
								array(
									'source' => 'function',
									'value' => 'k_get_galleries',
								),
							),
						),
					),
				),
			), 
			/* Featured Gallery ends */
			/* google map */
			'hp_google_maps' => array(
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
		), // elements end
	),
	'Miscellaneous' => array(
		'elements' => array(
			/* Pages Menu */
			'hp_pages_menu' => array(
				'title'   => __( 'Make Pages Menu', 'kazaz' ),
				'code'    => '[pages_menu]',
				'attributes' => array(
					array(
						'name'  => 'section_title',
						'type'  => 'textbox',
						'label' => __('The title', 'kazaz'),
					),
					array(
						'type' => 'multiselect',
						'name' => 'pages_list',
						'label' => __('Select pages to create the Menu from', 'kazaz'),
						'description' => __('Minimum selection: 2 items', 'kazaz'),
						'validation' => 'minselected[2]',
						'items' => array(
							'data' => array(
								array(
									'source' => 'function',
									'value' => 'k_get_pages',
								),
							),
						),
					),
				),
			),
			/* Pages Menu ends */
			/* Course Search */
			'hp_course_search' => array(
				'title'   => __( 'Course Search form', 'kazaz' ),
				'code'    => '[course_search]',
				'attributes' => array(
					array(
						'name'  => 'section_title',
						'type'  => 'textbox',
						'label' => __('The title', 'kazaz'),
					),
					array(
						'name'  => 'tagline',
						'type'  => 'textbox',
						'label' => __('Course search tip (how to search?)', 'kazaz'),
					),
				),
			),
			/* Course Search ends */
			/* Twitter */
			'hp_twitter' => array(
				'title'   => __( 'Twitter Twitts', 'kazaz' ),
				'code'    => '[twitter_twitts]',
				'attributes' => array(
					array(
						'name'  => 'section_title',
						'type'  => 'textbox',
						'label' => __('The title', 'kazaz'),
					),
					array(
						'name'  => 'twitter_user',
						'type'  => 'textbox',
						'label' => __('Twitter user name to pull the Twitts from', 'kazaz'),
					),
					array(
						'name'  => 'twitts_num',
						'type'  => 'textbox',
						'label' => __('Number of Twitts to show', 'kazaz'),
					),
					array(
						'name'  => 'excl_replies',
						'type'  => 'toggle',
						'label' => __('Exclude replies from Twitts?', 'kazaz'),
						'default' => 'true',
					),
				),
			),
			/* Twitter ends */
			/* super buttons start */
			'hp_super_buttons' => array(
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
		), // elements end
	),
);

/**
 * EOF
 */