<?php
return array(
	'title' => __( 'Buntington Options', 'kazaz' ),
	'logo' => get_template_directory_uri() . '/public/img/options_panel_icon.png',
	'menus' => array(
		/* basic options start */
		array(
			'title' => __('Basic Options', 'kazaz'),
			'name' => 'basic_options',
			'icon' => 'font-awesome:fa fa-magic',
			'controls' => array(
				/* site logo & favicon */
				array(
					'type' => 'section',
					'title' => __('Upload site logo &amp; favicon', 'kazaz'),
					'name' => 'section_site_logo_upload',
					'fields' => array(
						array(
							'type' => 'upload',
							'name' => 'site_logo_upload',
							'label' => __('Browse to your own logo', 'kazaz'),
						),
						array(
							'type' => 'upload',
							'name' => 'site_logo_favicon',
							'label' => __('Browse to favicon.ico', 'kazaz'),
						),
					),
				),	
				/* site logo & favicon end */
				/* content font-family */
				array(
					'type' => 'section',
					'title' => __('Font family - Content', 'kazaz'),
					'name' => 'section_site_font_family',
					'description' => __('Select font face to activate other options.', 'kazaz'),
					'fields' => array(
					    array(
					    	'type' => 'select',
					    	'name' => 'font_family_content',
					    	'label' => __('Font Face', 'kazaz'),
					    	'description' => __('Select Font', 'kazaz'),
					    	'items' => array(
					    		'data' => array(
					   			 	array(
					    				'source' => 'function',
					    				'value' => 'vp_get_gwf_family',
					    			),
					    		),
					    	),
					    ),
					    array(
					    	'type' => 'checkbox',
					    	'name' => 'font_style_content',
					    	'label' => __('Font Styles', 'kazaz'),
					    	'description' => __('Select Font Styles', 'kazaz'),
					    	'items' => array(
					    		'data' => array(
					   			 	array(
					    				'source' => 'binding',
					    				'field' => 'font_family_content',
					    				'value' => 'vp_get_gwf_style',
					    			),
					    		),
					    	),
							'dependency' => array(
								'field' => 'font_family_content',
								'function' => 'vp_dep_boolean',
							),
					    ),
					    array(
					    	'type' => 'checkbox',
					    	'name' => 'font_weight_content',
					    	'label' => __('Font Weights', 'kazaz'),
					    	'description' => __('Select Font Weights', 'kazaz'),
					    	'items' => array(
					    		'data' => array(
					    			array(
					    				'source' => 'binding',
					    				'field' => 'font_family_content',
					    				'value' => 'vp_get_gwf_weight',
					    			),
					    		),
					    	),
							'dependency' => array(
								'field' => 'font_family_content',
								'function' => 'vp_dep_boolean',
							),
					    ),
					    array(
					    	'type' => 'checkbox',
					    	'name' => 'font_subset_content',
					    	'label' => __('Font Subsets', 'kazaz'),
					    	'description' => __('Select Font Subsets', 'kazaz'),
					    	'items' => array(
					    		'data' => array(
					    			array(
					    				'source' => 'binding',
					    				'field' => 'font_family_content',
					    				'value' => 'vp_get_gwf_subset',
					    			),
					    		),
					    	),
							'dependency' => array(
								'field' => 'font_family_content',
								'function' => 'vp_dep_boolean',
							),
					    ),
						array(
							'type' => 'html',
							'name' => 'content_font_preview',
							'binding' => array(
								'field'    => 'font_family_content',
								'function' => 'k_font_preview',
							),
							'dependency' => array(
								'field' => 'font_family_content',
								'function' => 'vp_dep_boolean',
							),
						),
					),
				),
				/* content font-family end */
				/* titles font-family */
				array(
					'type' => 'section',
					'title' => __('Font family - Titles', 'kazaz'),
					'name' => 'section_title_font_family',
					'description' => __('Select font face to activate other options. Leave empty if you want title font family match the content font.', 'kazaz'),
					'fields' => array(
					    array(
					    	'type' => 'select',
					    	'name' => 'font_family_title',
					    	'label' => __('Font Face', 'kazaz'),
					    	'description' => __('Select Font', 'kazaz'),
					    	'items' => array(
					    		'data' => array(
					   			 	array(
					    				'source' => 'function',
					    				'value' => 'vp_get_gwf_family',
					    			),
					    		),
					    	),
					    ),
					    array(
					    	'type' => 'checkbox',
					    	'name' => 'font_style_title',
					    	'label' => __('Font Styles', 'kazaz'),
					    	'description' => __('Select Font Styles', 'kazaz'),
					    	'items' => array(
					    		'data' => array(
					   			 	array(
					    				'source' => 'binding',
					    				'field' => 'font_family_title',
					    				'value' => 'vp_get_gwf_style',
					    			),
					    		),
					    	),
							'dependency' => array(
								'field' => 'font_family_title',
								'function' => 'vp_dep_boolean',
							),
					    ),
					    array(
					    	'type' => 'checkbox',
					    	'name' => 'font_weight_title',
					    	'label' => __('Font Weights', 'kazaz'),
					    	'description' => __('Select Font Weights', 'kazaz'),
					    	'items' => array(
					    		'data' => array(
					    			array(
					    				'source' => 'binding',
					    				'field' => 'font_family_title',
					    				'value' => 'vp_get_gwf_weight',
					    			),
					    		),
					    	),
							'dependency' => array(
								'field' => 'font_family_title',
								'function' => 'vp_dep_boolean',
							),
					    ),
					    array(
					    	'type' => 'checkbox',
					    	'name' => 'font_subset_title',
					    	'label' => __('Font Subsets', 'kazaz'),
					    	'description' => __('Select Font Subsets', 'kazaz'),
					    	'items' => array(
					    		'data' => array(
					    			array(
					    				'source' => 'binding',
					    				'field' => 'font_family_title',
					    				'value' => 'vp_get_gwf_subset',
					    			),
					    		),
					    	),
							'dependency' => array(
								'field' => 'font_family_title',
								'function' => 'vp_dep_boolean',
							),
					    ),
						array(
							'type' => 'html',
							'name' => 'title_font_preview',
							'binding' => array(
								'field'    => 'font_family_title',
								'function' => 'k_font_preview',
							),
							'dependency' => array(
								'field' => 'font_family_title',
								'function' => 'vp_dep_boolean',
							),
						),
					),
				),
				/* titles font-family end */
				/* links color */
				array(
					'type' => 'section',
					'title' => __('Links coloring', 'kazaz'),
					'name' => 'links_color_scheme',
					'fields' => array(
						array(
							'type' => 'color',
							'name' => 'links_color',
							'label' => __('Select links color', 'kazaz'),
							'default' => '#ea5644',
						),
						array(
							'type' => 'color',
							'name' => 'links_hover_color',
							'label' => __('Select links hover color', 'kazaz'),
							'default' => '#111111',
						),
					),
				),	
				/* links color end */
				/* main navig color */
				array(
					'type' => 'section',
					'title' => __('Main navigation coloring', 'kazaz'),
					'name' => 'main_navig_color',
					'fields' => array(
						array(
							'type' => 'color',
							'name' => 'navig_color',
							'label' => __('Select links color', 'kazaz'),
							'default' => '#363636',
						),
						array(
							'type' => 'color',
							'name' => 'navig_hover_color',
							'label' => __('Select hover color', 'kazaz'),
							'default' => '#ea5644',
						),
						array(
							'type' => 'color',
							'name' => 'navig_dropdown_bg',
							'label' => __('Select drop-down background color', 'kazaz'),
							'default' => '#FFFFFF',
						),
						array(
							'type' => 'color',
							'name' => 'navig_dropdown_color',
							'label' => __('Select drop-down items color', 'kazaz'),
							'default' => '#363636',
						),
						array(
							'type' => 'color',
							'name' => 'navig_dropdown_bg_hover_color',
							'label' => __('Select drop-down background hover color', 'kazaz'),
							'default' => '#F9F9F9',
						),
						array(
							'type' => 'color',
							'name' => 'navig_dropdown_hover_color',
							'label' => __('Select drop-down items hover color', 'kazaz'),
							'default' => '#ea5644',
						),
						array(
							'type' => 'color',
							'name' => 'navig_submenu_tit_color',
							'label' => __('Submenu indicator color', 'kazaz'),
							'default' => '#CCCCCC',
						),
					),
				),	
				/* main navig color end */
				/* functional navig color */
				array(
					'type' => 'section',
					'title' => __('Functional navigation coloring', 'kazaz'),
					'name' => 'functional_navig_color',
					'fields' => array(
						array(
							'type' => 'color',
							'name' => 'f_navig_color',
							'label' => __('Select links color', 'kazaz'),
							'default' => '#636363',
						),
						array(
							'type' => 'color',
							'name' => 'f_navig_hover_color',
							'label' => __('Select hover color', 'kazaz'),
							'default' => '#ea5644',
						),
					),
				),	
				/* functional navig color end */
				/* footer colors */
				array(
					'type' => 'section',
					'title' => __('Footer properties', 'kazaz'),
					'name' => 'footer_colors',
					'fields' => array(
						array(
							'name'  => 'use_background_image',
							'label' => __( 'Use Background Image?', 'kazaz' ),
							'type'  => 'toggle',
							'description'  => __( 'Uploaded image will be used as a background image.', 'kazaz' ),
						),
						array(
							'name'  => 'image_bg_url',
							'type'  => 'upload',
							'label' => __( 'Upload Background Image', 'kazaz' ),
							'validation' => 'required',
							'dependency' => array(
								'field' => 'use_background_image',
								'function' => 'vp_dep_boolean',
							),
						),
						array(
							'name'  => 'image_bg_repeat',
							'type'  => 'select',
							'label' => __('Background Image Repeat', 'kazaz'),
							'items' => array(
								array(
									'value' => 'repeat-x',
									'label' => __( 'Repeat X', 'kazaz' ),
								),
								array(
									'value' => 'repeat-y',
									'label' => __( 'Repeat Y', 'kazaz' ),
								),
								array(
									'value' => 'repeat',
									'label' => __( 'Repeat X and Y', 'kazaz' ),
								),
								array(
									'value' => 'no-repeat',
									'label' => __( 'No repeat!', 'kazaz' ),
								),
							), 
							'default' => 'repeat',
							'validation' => 'required',
							'dependency' => array(
								'field' => 'use_background_image',
								'function' => 'vp_dep_boolean',
							),
						),
						array(
							'name'  => 'image_bg_attachment',
							'type'  => 'select',
							'label' => __('Background Image Attachment', 'kazaz'),
							'items' => array(
								array(
									'value' => 'scroll',
									'label' => __( 'Scroll', 'kazaz' ),
								),
								array(
									'value' => 'fixed',
									'label' => __( 'Fixed', 'kazaz' ),
								),
							), 
							'default' => 'scroll',
							'validation' => 'required',
							'dependency' => array(
								'field' => 'use_background_image',
								'function' => 'vp_dep_boolean',
							),
						),
						array(
							'name'  => 'image_bg_position',
							'type'  => 'select',
							'label' => __('Background Image Position', 'kazaz'),
							'items' => array(
								array(
									'value' => 'top left',
									'label' => __( 'Top-Left', 'kazaz' ),
								),
								array(
									'value' => 'top center',
									'label' => __( 'Top-Center', 'kazaz' ),
								),
								array(
									'value' => 'top right',
									'label' => __( 'Top-Right', 'kazaz' ),
								),
								array(
									'value' => 'center left',
									'label' => __( 'Center-Left', 'kazaz' ),
								),
								array(
									'value' => 'center center',
									'label' => __( 'Center-Center', 'kazaz' ),
								),
								array(
									'value' => 'center right',
									'label' => __( 'Center-Right', 'kazaz' ),
								),
								array(
									'value' => 'bottom left',
									'label' => __( 'Bottom-Left', 'kazaz' ),
								),
								array(
									'value' => 'bottom center',
									'label' => __( 'Bottom-Center', 'kazaz' ),
								),
								array(
									'value' => 'bottom right',
									'label' => __( 'Bottom-Right', 'kazaz' ),
								),
							),
							'default' => 'top left',
							'validation' => 'required',
							'dependency' => array(
								'field' => 'use_background_image',
								'function' => 'vp_dep_boolean',
							),
						),
						array(
							'name'  => 'image_bg_size',
							'type'  => 'select',
							'label' => __('Background Image Size', 'kazaz'),
							'items' => array(
								array(
									'value' => 'normal',
									'label' => __( 'Normal - will keep original size', 'kazaz' ),
								),
								array(
									'value' => 'cover',
									'label' => __( 'Cover - will stretch to available width/height', 'kazaz' ),
								),
								array(
									'value' => 'contain',
									'label' => __( 'Contain - will scale', 'kazaz' ),
								),
							),
							'default' => 'normal',
							'validation' => 'required',
							'dependency' => array(
								'field' => 'use_background_image',
								'function' => 'vp_dep_boolean',
							),
						),
						array(
							'type' => 'color',
							'name' => 'footer_bg_color',
							'label' => __('Select background color', 'kazaz'),
							'default' => '#FFFFFF',
						),
						array(
							'type' => 'color',
							'name' => 'footer_text_color',
							'label' => __('Select footer text color', 'kazaz'),
							'default' => '#777777',
						),
						array(
							'type' => 'color',
							'name' => 'footer_link_color',
							'label' => __('Select footer links color', 'kazaz'),
							'default' => '#ea5644',
						),
						array(
							'type' => 'color',
							'name' => 'footer_link_hover_color',
							'label' => __('Select footer links hover color', 'kazaz'),
							'default' => '#111111',
						),
						array(
							'name'  => 'scheme_light',
							'label' => __( 'Lighten up assets', 'kazaz' ),
							'type'  => 'toggle',
							'description'  => __( 'Good for dark backgrounds.', 'kazaz' ),
						),
					),
				),	
				/* footer colors end */
			),
		),
		/* basic options end */
		/* Social media starts */
		array(
			'title' => __('Social Media Sites', 'kazaz'),
			'name' => 'social_media_sites',
			'icon' => 'font-awesome:fa fa-male',
			'controls' => array(
				array(
					'type' => 'notebox',
					'name' => 'nb_social_media_sites',
					'label' => __('How should this work?', 'kazaz'),
					'description' => __('Enter full path to your social media profiles and leave unused empty.', 'kazaz'),
					'status' => 'info',
				),
				array(
					'type' => 'textbox',
					'name' => 'sm_foursquare',
					'label' => '<i class="fa fa-foursquare fa-2x"></i> &nbsp; Foursquare',
					'default' => '',
				),
				array(
					'type' => 'textbox',
					'name' => 'sm_dribbble',
					'label' => '<i class="fa fa-dribbble fa-2x"></i> &nbsp; Dribbble',
					'default' => '',
				),
				array(
					'type' => 'textbox',
					'name' => 'sm_facebook',
					'label' => '<i class="fa fa-facebook fa-2x"></i> &nbsp; Facebook',
					'default' => '',
				),
				array(
					'type' => 'textbox',
					'name' => 'sm_flickr',
					'label' => '<i class="fa fa-flickr fa-2x"></i> &nbsp; Flickr',
					'default' => '',
				),
				array(
					'type' => 'textbox',
					'name' => 'sm_github',
					'label' => '<i class="fa fa-github fa-2x"></i> &nbsp; Github',
					'default' => '',
				),
				array(
					'type' => 'textbox',
					'name' => 'sm_google',
					'label' => '<i class="fa fa-google-plus fa-2x"></i> &nbsp; Google+',
					'default' => '',
				),
				array(
					'type' => 'textbox',
					'name' => 'sm_instagram',
					'label' => '<i class="fa fa-instagram fa-2x"></i> &nbsp; Instagram',
					'default' => 'http://instagram.com',
				),
				array(
					'type' => 'textbox',
					'name' => 'sm_linkedin',
					'label' => '<i class="fa fa-linkedin fa-2x"></i> &nbsp; LinkedIn',
					'default' => '',
				),
				array(
					'type' => 'textbox',
					'name' => 'sm_pinterest',
					'label' => '<i class="fa fa-pinterest fa-2x"></i> &nbsp; Pinterest',
					'default' => 'http://pinterest.com',
				),
				array(
					'type' => 'textbox',
					'name' => 'sm_tumblr',
					'label' => '<i class="fa fa-tumblr fa-2x"></i> &nbsp; Tumblr',
					'default' => '',
				),
				array(
					'type' => 'textbox',
					'name' => 'sm_twitter',
					'label' => '<i class="fa fa-twitter fa-2x"></i> &nbsp; Twitter',
					'default' => 'http://twitter.com',
				),
				array(
					'type' => 'textbox',
					'name' => 'sm_youtube',
					'label' => '<i class="fa fa-youtube fa-2x"></i> &nbsp; YouTube',
					'default' => '',
				),
				array(
					'type' => 'textbox',
					'name' => 'sm_vimeo',
					'label' => '<i class="fa fa-vimeo fa-2x"></i> &nbsp; Vimeo',
					'default' => '',
				),
			),
		),
		/* Social media ends */
		/* contact options start */
		array(
			'title' => __('Contact', 'kazaz'),
			'name' => 'contact_options',
			'icon' => 'font-awesome:fa fa-envelope',
			'controls' => array(
				/* google maps starts */
				array(
					'type' => 'section',
					'title' => __('Google Maps', 'kazaz'),
					'name' => 'google_maps_settings',
					'description' => __('Make your Contact page show up Google Map.', 'kazaz'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'show_google_map',
							'label' => __('Show GoogleMap on Contact page?', 'kazaz'),
							'default' => 1,
						),
						array(
							'type' => 'textbox',
							'name' => 'gmap_title',
							'label' => __('Google Map title', 'kazaz'),
							'description' => __('Enter the title for your map', 'kazaz'),
							'default' => 'Office Address',
							'dependency' => array(
								'field' => 'show_google_map',
								'function' => 'vp_dep_boolean',
							),
						),
						array(
							'type' => 'textbox',
							'name' => 'gmap_lat',
							'label' => __('Location Latitude', 'kazaz'),
							'description' => __('Enter the map location latitude', 'kazaz'),
							'default' => 37.782231,
							'dependency' => array(
								'field' => 'show_google_map',
								'function' => 'vp_dep_boolean',
							),
						),
						array(
							'type' => 'textbox',
							'name' => 'gmap_lon',
							'label' => __('Location Longitude', 'kazaz'),
							'description' => __('Enter the map location longitude', 'kazaz'),
							'default' => -122.400679,
							'dependency' => array(
								'field' => 'show_google_map',
								'function' => 'vp_dep_boolean',
							),
						),
						array(
							'type'  => 'slider',
							'name'  => 'gmap_zoom',
							'label' => __('Map Zoom level', 'kazaz'),
							'min'   => 3,
							'max'   => 19,
							'default' => 15,
							'dependency' => array(
								'field' => 'show_google_map',
								'function' => 'vp_dep_boolean',
							),
						),
						array(
							'type' => 'upload',
							'name' => 'gmap_marker',
							'label' => __('Upload custom Marker', 'kazaz'),
							'description' => __('Should be transparent PNG up to 32x32px', 'kazaz'),
							'dependency' => array(
								'field' => 'show_google_map',
								'function' => 'vp_dep_boolean',
							),
						),
					),
				),
				/* google maps ends */
				/* personal contact starts */
				array(
					'type' => 'section',
					'title' => __('Contact details', 'kazaz'),
					'name' => 'contact_details',
					'description' => __('The data you enter here will be used for both Google Maps and Quick Contact widget', 'kazaz'),
					'fields' => array(
						array(
							'type' => 'textbox',
							'name' => 'contact_name',
							'label' => __('Company or private name', 'kazaz'),
							'default' => 'Buntington Schools',
						),
						array(
							'type' => 'textbox',
							'name' => 'contact_address',
							'label' => __('Company or private address', 'kazaz'),
							'default' => '795 Folsom Ave, Suite 600',
						),
						array(
							'type' => 'textbox',
							'name' => 'contact_city',
							'label' => __('City', 'kazaz'),
							'default' => 'San Francisco',
						),
						array(
							'type' => 'textbox',
							'name' => 'contact_state',
							'label' => __('State - if any', 'kazaz'),
							'default' => 'CA',
						),
						array(
							'type' => 'textbox',
							'name' => 'contact_zip',
							'label' => __('Location ZIP code', 'kazaz'),
							'default' => '94107',
						),
						array(
							'type' => 'textbox',
							'name' => 'contact_country',
							'label' => __('Residence Country', 'kazaz'),
							'default' => 'USA',
						),
						array(
							'type' => 'textbox',
							'name' => 'contact_phone_1',
							'label' => __('Contact phone 1', 'kazaz'),
							'default' => '(123) 456-7890',
						),
						array(
							'type' => 'textbox',
							'name' => 'contact_phone_2',
							'label' => __('Contact phone 2 (or Fax)', 'kazaz'),
							'default' => '(123) 456-7891',
						),
						array(
							'type' => 'textbox',
							'name' => 'contact_email',
							'label' => __('Email address', 'kazaz'),
							'description' => __('BEWARE: This email address will also be used to receive Contact-form inquiries!', 'kazaz'),
							'default' => 'info@buntington.com',
						),
					),
				),
				/* personal contact ends */
			),
		),
		/* contact options end */
		/* common options start */
		array(
			'title' => __('Other Things...', 'kazaz'),
			'name' => 'other_options',
			'icon' => 'font-awesome:fa fa-rocket',
			'controls' => array(
				/* posts page*/
				array(
					'type' => 'section',
					'title' => __('Posts page settings', 'kazaz'),
					'name' => 'post_page_settings',
					'description' => __('Posts page is a Custom Template that can be used to display Blog posts.', 'kazaz'),
					'fields' => array(
						array(
							'type' => 'select',
							'name' => 'posts_page_layout',
							'label' => __('Posts page layout', 'kazaz'),
							'items' => array(
								array(
									'value' => 'stacked',
									'label' => __('Stacked', 'kazaz'),
								),
								array(
									'value' => 'grid',
									'label' => __('Grid', 'kazaz'),
								),
							),
							'default' => 'grid',
						),
						array(
							'type' => 'textbox',
							'name' => 'posts_page_num_of_posts',
							'label' => __('Number of posts per page', 'kazaz'),
							'default' => 6,
						),
					),
				),
				/* posts page end */
				/* post default image start */
				/*
				array(
					'type' => 'section',
					'title' => __('Default post Featured Image', 'kazaz'),
					'name' => 'post_default_featured_image',
					'description' => __( 'Upload default post featured image. It will be used whenever featured image not provided.', 'kazaz' ),
					'fields' => array(
						array(
							'type' => 'upload',
							'name' => 'post_default_image',
							'label' => __('Upload photo', 'kazaz'),
						),
					),
				),
				*/
				/* post default image end */
				/* page comments */
				array(
					'type' => 'section',
					'title' => __('Enable Page Comments', 'kazaz'),
					'name' => 'disable_page_comments',
					'description' => __('Page comments are enabled by default. Disable if needed.', 'kazaz'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'use_page_comments',
							'label' => __('Enable Page Comments', 'kazaz'),
							'default' => 'true',
						),
					),
				),
				/* page comments end */
				/* post summary start */
				array(
					'type' => 'section',
					'title' => __('Post summary length', 'kazaz'),
					'name' => 'post_summary',
					'description' => __('Trim post summary to N number of words. If post excerpt exists this setting will be ignored!', 'kazaz'),
					'fields' => array(
						array(
							'type' => 'textbox',
							'name' => 'post_summary_primal',
							'label' => __('Trim post summary for Category and Index page', 'kazaz'),
							'default' => '24',
						),
						array(
							'type' => 'textbox',
							'name' => 'post_summary_secondary',
							'label' => __('Trim post summary for Search, Archive and Tag pages', 'kazaz'),
							'default' => '24',
						),
						array(
							'type' => 'textbox',
							'name' => 'post_summary_more',
							'label' => __('READ MORE tag', 'kazaz'),
							'default' => __('Read More', 'kazaz'),
						),
					),
				),
				/* post summary end */
				/* sidebar position start */
				array(
					'type' => 'section',
					'title' => __('Content Sidebar positioning', 'kazaz'),
					'name' => 'content_sidebar_positioning',
					'description' => __('Where do you like to have Sidebar floated on pages that have Sidebar?', 'kazaz'),
					'fields' => array(
						array(
							'type' => 'select',
							'name' => 'sidebar_position',
							'label' => __('Sidebar position', 'kazaz'),
							'items' => array(
								array(
									'value' => 'right',
									'label' => __('Sidebar on Right', 'kazaz'),
								),
								array(
									'value' => 'left',
									'label' => __('Sidebar on Left', 'kazaz'),
								),
							),
							'default' => 'right',
						),
					),
				),
				/* sidebar position end */
				/* error page image starts */
				array(
					'type' => 'section',
					'title' => __('404 Error Image', 'kazaz'),
					'name' => '404_error_image',
					'description' => __('Upload photo that will be shown whenever page not found.', 'kazaz'),
					'fields' => array(
						array(
							'type' => 'upload',
							'name' => '404_image',
							'label' => __('Upload 404 Error page image', 'kazaz'),
							'description' => __('That image will show up on top of 404 error page content.', 'kazaz'),
						),
					),
				),
				/* error page image ends */
				/* copyright info starts */
				array(
					'type' => 'section',
					'title' => __('Copyright text', 'kazaz'),
					'name' => 'copyright_text',
					'description' => __('Enter copyright information here!', 'kazaz'),
					'fields' => array(
						array(
							'type' => 'textarea',
							'name' => 'theme_copyright',
							'label' => __('Footer copyrights', 'kazaz'),
							'description' => __('Your copyrights tagline will show up in theme\'s post-footer.', 'kazaz'),
							'default' => '&copy; 2015 Sofarider Inc. All rights reserved. WordPress theme by Dameer DJ.',
						),
					),
				),
				/* copyright info ends */
			),
		),
		/* common options end */
		/* Code starts */
		array(
			'title' => __('Code', 'kazaz'),
			'name' => 'javascript_codes',
			'icon' => 'font-awesome:fa fa-code',
			'controls' => array(
				// addthis
				array(
					'type' => 'section',
					'title' => __('Posts sharing with AddThis', 'kazaz'),
					'name' => 'share_with_addthis',
					'fields' => array(
						array(
							'type' => 'notebox',
							'name' => 'nb_addthis',
							'label' => __('What is AddThis?', 'kazaz'),
							'description' => __('This is the largest Sharing and Social Data platform. See more details here: http://www.addthis.com/ . Sign In or create an account first then copy-paste generated code ( https://www.addthis.com/get/sharing ).', 'kazaz'),
							'status' => 'info',
						),
						array(
							'type' => 'toggle',
							'name' => 'use_addthis',
							'label' => __('Use AddThis service?', 'kazaz'),
						),
						array(
							'type' => 'textarea',
							'name' => 'addthis_code',
							'label' => __('Paste AddThis code here', 'kazaz'),
							'dependency' => array(
								'field' => 'use_addthis',
								'function' => 'vp_dep_boolean',
							),
						),
					),
				),
				// google analytics
				array(
					'type' => 'section',
					'title' => __('Google Analytics', 'kazaz'),
					'name' => 'google_analytics',
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'use_ga',
							'label' => __('Use Google Analytics?', 'kazaz'),
						),
						array(
							'type' => 'textarea',
							'name' => 'ga_code',
							'label' => __('Paste Google Analytics code here', 'kazaz'),
							'dependency' => array(
								'field' => 'use_ga',
								'function' => 'vp_dep_boolean',
							),
						),
					),
				),				
			),
		),
		/* Code ends */
		/* API Keys start */
		array(
			'title' => __('API Keys', 'kazaz'),
			'name' => 'api_keys',
			'icon' => 'font-awesome:fa fa-key',
			'controls' => array(
				array(
					'type' => 'notebox',
					'name' => 'nb_keys',
					'label' => __('How to obtain API Keys?', 'kazaz'),
					'description' => __('Flickr API Key can be obtained here http://www.flickr.com/services/api/misc.api_keys.html and for the Twitter API Key you should register your application here https://dev.twitter.com/apps/new', 'kazaz'),
					'status' => 'info',
				),
				/* Flickr key starts */
				array(
					'type' => 'section',
					'title' => __('Flickr API key', 'kazaz'),
					'name' => 'flickr_auth',
					'fields' => array(
						array(
							'type' => 'textbox',
							'name' => 'flickr_key',
							'label' => __('Enter your Flickr API key', 'kazaz'),
							'description' => __('It will be needed for Flickr Widget!', 'kazaz'),
							'default' => '',
						),
						/*
						array(
							'type' => 'textbox',
							'name' => 'flickr_secret_code',
							'label' => __('Enter your Flickr API secret code', 'kazaz'),
							'description' => __('It will be needed for Flickr Widget!', 'kazaz'),
							'default' => '',
						),
						*/
					),
				),
				/* Flickr key ends */
				/* Twitter key starts */
				array(
					'type' => 'section',
					'title' => __('Twitter OAuth and Access Token', 'kazaz'),
					'name' => 'twitter_auth',
					'fields' => array(
						array(
							'type' => 'textbox',
							'name' => 'twitter_consumer_key',
							'label' => __( 'Enter your Twitter Consumer key', 'kazaz' ),
							'description' => __('It will be needed for OAuth settings!', 'kazaz'),
						),
						array(
							'type' => 'textbox',
							'name' => 'twitter_consumer_secret',
							'label' => __( 'Enter your Twitter Consumer secret key', 'kazaz' ),
							'description' => __('It will be needed for OAuth settings as well!', 'kazaz'),
						),
						array(
							'type' => 'textbox',
							'name' => 'twitter_access_token',
							'label' => __( 'Enter your Twitter Access Token', 'kazaz' ),
							'description' => __('It will be needed to sign requests with your own Twitter account!', 'kazaz'),
						),
						array(
							'type' => 'textbox',
							'name' => 'twitter_access_token_secret',
							'label' => __( 'Enter your Twitter Access Token secret', 'kazaz' ),
							'description' => __('It will be needed to sign requests with your own Twitter account as well!', 'kazaz'),
						),
					),
				),
				/* Twitter key ends */
				/* GMaps key starts */
				array(
					'type' => 'section',
					'title' => __('GoogleMaps API key', 'kazaz'),
					'name' => 'gmaps_auth',
					'fields' => array(
						array(
							'type' => 'textbox',
							'name' => 'gmap_key',
							'label' => __('Enter your GoogleMaps API key', 'kazaz'),
							'description' => __('It will be needed for GoogleMaps!', 'kazaz'),
							'default' => '',
						),
					),
				),
				/* GMaps key ends */
			),
		),
		/* API Keys end */
	)
);

/**
 *EOF
 */