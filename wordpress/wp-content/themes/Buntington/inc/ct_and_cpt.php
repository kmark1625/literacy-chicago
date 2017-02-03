<?php
/**
 * CUSTOM POST TYPES AND TAXONOMIES
 */
function k_custom_tax_cpt() {
	// home page builder
	$labels_home_page = array(
		'name'               => _x( 'Home Pages', 'CPT general name', 'kazaz' ),
		'singular_name'      => _x( 'Home Page', 'CPT singular name', 'kazaz' ),
		'add_new'            => __( 'Add New', 'kazaz' ),
		'add_new_item'       => __( 'New Home Page', 'kazaz'),
		'edit_item'          => __( 'Edit Home Page', 'kazaz' ),
		'new_item'           => __( 'New Home Page', 'kazaz' ),
		'all_items'          => __( 'All Home Pages', 'kazaz' ),
		'view_item'          => __( 'View Home Page', 'kazaz'),
		'search_items'       => __( 'Search Home Pages', 'kazaz' ),
		'not_found'          => __( 'No Home Page found', 'kazaz' ),
		'not_found_in_trash' => __( 'No Home Page found in Trash', 'kazaz' ), 
		'parent_item_colon'  => '',
		'menu_name'          => __( 'Home Pages', 'kazaz' )
	);
	$args_home_page = array(
		'labels'             => $labels_home_page, 
		'menu_icon'			 => 'dashicons-tagcloud',
		'exclude_from_search'=> true,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true, 
		'show_in_menu'       => true, 
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'home' ),
		'capability_type'    => 'page',
		'has_archive'        => true, 
		'hierarchical'       => false,
		'menu_position'      => 21,
		'supports'           => array( 'title', 'author' ),
	); 
	register_post_type( 'hom_page', $args_home_page );
	// home page builder end
	
	// events cpt
	$labels_event = array(
		'name'               => _x( 'Event', 'CPT general name', 'kazaz' ),
		'singular_name'      => _x( 'Event', 'CPT singular name', 'kazaz' ),
		'add_new'            => __( 'Add New Event', 'kazaz' ),
		'add_new_item'       => __( 'New Event', 'kazaz'),
		'edit_item'          => __( 'Edit Event', 'kazaz' ),
		'new_item'           => __( 'New Event', 'kazaz' ),
		'all_items'          => __( 'All Events', 'kazaz' ),
		'view_item'          => __( 'View Event', 'kazaz'),
		'search_items'       => __( 'Search Events', 'kazaz' ),
		'not_found'          => __( 'No Events found', 'kazaz' ),
		'not_found_in_trash' => __( 'No Events found in Trash', 'kazaz' ), 
		'parent_item_colon'  => __( 'Parent Events:', 'kazaz' ),
		'menu_name'          => __( 'Events', 'kazaz' ),
	);
	$args_event = array(
		'labels'             => $labels_event,
		'menu_icon'			 => 'dashicons-calendar',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true, 
		'show_in_menu'       => true, 
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'event' ),
		'capability_type'    => 'post',
		'has_archive'        => true, 
		'hierarchical'       => false,
		'menu_position'      => 22,
		'supports'           => array( 'title', 'editor' ),
	); 
	register_post_type( 'event', $args_event ); // register CPT
	
	$labels_events = array(
		'name'              => _x( 'Event Categories', 'taxonomy general name', 'kazaz' ),
		'singular_name'     => _x( 'Event Category', 'taxonomy singular name', 'kazaz' ),
		'search_items'      => __( 'Search Event Categories', 'kazaz' ),
		'all_items'         => __( 'All Event Categories', 'kazaz' ),
		'parent_item'       => __( 'Parent Event Category', 'kazaz' ),
		'parent_item_colon' => __( 'Parent Event Categories:', 'kazaz' ),
		'edit_item'         => __( 'Edit Event Category', 'kazaz' ),
		'update_item'       => __( 'Update Event Category', 'kazaz' ),
		'add_new_item'      => __( 'Add New Event Category', 'kazaz' ),
		'new_item_name'     => __( 'New Event Category Name', 'kazaz' ),
		'menu_name'         => __( 'Event Categories', 'kazaz' ),
	);
	$args_events = array(
		'hierarchical'      => true,
		'labels'            => $labels_events ,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'events' ),
	);
	register_taxonomy( 'events', array( 'event' ), $args_events ); // register CT
	
	//---------------------------------------------------------------------------
	// events cpt end
	
	// course cpt
	$labels_course = array(
		'name'               => _x( 'Course', 'CPT general name', 'kazaz' ),
		'singular_name'      => _x( 'Course', 'CPT singular name', 'kazaz' ),
		'add_new'            => __( 'Add New Course', 'kazaz' ),
		'add_new_item'       => __( 'New Course', 'kazaz'),
		'edit_item'          => __( 'Edit Course', 'kazaz' ),
		'new_item'           => __( 'New Course', 'kazaz' ),
		'all_items'          => __( 'All Courses', 'kazaz' ),
		'view_item'          => __( 'View Course', 'kazaz'),
		'search_items'       => __( 'Search Courses', 'kazaz' ),
		'not_found'          => __( 'No Courses found', 'kazaz' ),
		'not_found_in_trash' => __( 'No Courses found in Trash', 'kazaz' ), 
		'parent_item_colon'  => __( 'Parent Courses:', 'kazaz' ),
		'menu_name'          => __( 'Courses', 'kazaz' ),
	);
	$args_course = array(
		'labels'             => $labels_course,
		'menu_icon'			 => 'dashicons-awards',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true, 
		'show_in_menu'       => true, 
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'course' ),
		'capability_type'    => 'page',
		'has_archive'        => true, 
		'hierarchical'       => false,
		'menu_position'      => 23,
		'supports'           => array( 'title', 'editor' ),
	); 
	register_post_type( 'course', $args_course ); // register CPT
	
	$labels_courses = array(
		'name'              => _x( 'Course Categories', 'taxonomy general name', 'kazaz' ),
		'singular_name'     => _x( 'Course Category', 'taxonomy singular name', 'kazaz' ),
		'search_items'      => __( 'Search Course Categories', 'kazaz' ),
		'all_items'         => __( 'All Course Categories', 'kazaz' ),
		'parent_item'       => __( 'Parent Course Category', 'kazaz' ),
		'parent_item_colon' => __( 'Parent Course Categories:', 'kazaz' ),
		'edit_item'         => __( 'Edit Course Category', 'kazaz' ),
		'update_item'       => __( 'Update Course Category', 'kazaz' ),
		'add_new_item'      => __( 'Add New Course Category', 'kazaz' ),
		'new_item_name'     => __( 'New Course Category Name', 'kazaz' ),
		'menu_name'         => __( 'Course Categories', 'kazaz' ),
	);
	$args_courses = array(
		'hierarchical'      => true,
		'labels'            => $labels_courses,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'courses' ),
	);
	register_taxonomy( 'courses', array( 'course' ), $args_courses ); // register CT
	
	//---------------------------------------------------------------------------
	// course cpt end
	
	// school gallery
	$labels_gallery = array(
		'name'               => _x( 'Gallery', 'CPT general name', 'kazaz' ),
		'singular_name'      => _x( 'Gallery', 'CPT singular name', 'kazaz' ),
		'add_new'            => __( 'Add New Gallery', 'kazaz' ),
		'add_new_item'       => __( 'New Gallery', 'kazaz'),
		'edit_item'          => __( 'Edit Gallery', 'kazaz' ),
		'new_item'           => __( 'New Gallery', 'kazaz' ),
		'all_items'          => __( 'All Galleries', 'kazaz' ),
		'view_item'          => __( 'View Gallery', 'kazaz'),
		'search_items'       => __( 'Search Galleries', 'kazaz' ),
		'not_found'          => __( 'No Galleries found', 'kazaz' ),
		'not_found_in_trash' => __( 'No Galleries found in Trash', 'kazaz' ), 
		'parent_item_colon'  => __( 'Parent Galleries:', 'kazaz' ),
		'menu_name'          => __( 'Galleries', 'kazaz' ),
	);
	$args_gallery = array(
		'labels'             => $labels_gallery,
		'menu_icon'			 => 'dashicons-camera',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true, 
		'show_in_menu'       => true, 
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'gallery' ),
		'capability_type'    => 'post',
		'has_archive'        => true, 
		'hierarchical'       => false,
		'menu_position'      => 24,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'comments' ),
	); 
	register_post_type( 'gallery', $args_gallery ); // register CPT
	
	$labels_galleries = array(
		'name'              => _x( 'Gallery Categories', 'taxonomy general name', 'kazaz' ),
		'singular_name'     => _x( 'Gallery Category', 'taxonomy singular name', 'kazaz' ),
		'search_items'      => __( 'Search Gallery Categories', 'kazaz' ),
		'all_items'         => __( 'All Gallery Categories', 'kazaz' ),
		'parent_item'       => __( 'Parent Gallery Category', 'kazaz' ),
		'parent_item_colon' => __( 'Parent Gallery Categories:', 'kazaz' ),
		'edit_item'         => __( 'Edit Gallery Category', 'kazaz' ),
		'update_item'       => __( 'Update Gallery Category', 'kazaz' ),
		'add_new_item'      => __( 'Add New Gallery Category', 'kazaz' ),
		'new_item_name'     => __( 'New Gallery Category Name', 'kazaz' ),
		'menu_name'         => __( 'Gallery Categories', 'kazaz' ),
	);
	$args_galleries = array(
		'hierarchical'      => true,
		'labels'            => $labels_galleries ,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'galleries' ),
	);
	register_taxonomy( 'galleries', array( 'gallery' ), $args_galleries ); // register CT
	
	//---------------------------------------------------------------------------
	// school gallery end
	
	// sliders...
	$labels_slider = array(
		'name'               => _x( 'Sliders', 'CPT general name', 'kazaz' ),
		'singular_name'      => _x( 'Slider', 'CPT singular name', 'kazaz' ),
		'add_new'            => __( 'Add New Slider', 'kazaz' ),
		'add_new_item'       => __( 'New Slider', 'kazaz'),
		'edit_item'          => __( 'Edit Slider', 'kazaz' ),
		'new_item'           => __( 'New Slider', 'kazaz' ),
		'all_items'          => __( 'All Sliders', 'kazaz' ),
		'view_item'          => __( 'View Slider', 'kazaz'),
		'search_items'       => __( 'Search Sliders', 'kazaz' ),
		'not_found'          => __( 'No Sliders found', 'kazaz' ),
		'not_found_in_trash' => __( 'No Sliders found in Trash', 'kazaz' ), 
		'parent_item_colon'  => __( 'Parent Sliders:', 'kazaz' ),
		'menu_name'          => __( 'Sliders', 'kazaz' ),
	);
	$args_slider= array(
		'labels'             => $labels_slider,
		'menu_icon'			 => 'dashicons-images-alt2',
		'exclude_from_search' => true,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true, 
		'show_in_menu'       => true, 
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'slider' ),
		'capability_type'    => 'page',
		'has_archive'        => true, 
		'hierarchical'       => false,
		'menu_position'      => 19,
		'supports'           => array( 'title' ),
	); 
	register_post_type( 'slider', $args_slider ); // register CPT
	// sliders end
	
	// content chunks...
	$labels_content_chunk = array(
		'name'               => _x( 'Content Chunks', 'CPT general name', 'kazaz' ),
		'singular_name'      => _x( 'Content Chunk', 'CPT singular name', 'kazaz' ),
		'add_new'            => __( 'Add New Content Chunk', 'kazaz' ),
		'add_new_item'       => __( 'New Content Chunk', 'kazaz'),
		'edit_item'          => __( 'Edit Content Chunk', 'kazaz' ),
		'new_item'           => __( 'New Content Chunk', 'kazaz' ),
		'all_items'          => __( 'All Content Chunks', 'kazaz' ),
		'view_item'          => __( 'View Content Chunk', 'kazaz'),
		'search_items'       => __( 'Search Content Chunk', 'kazaz' ),
		'not_found'          => __( 'No Content Chunk found', 'kazaz' ),
		'not_found_in_trash' => __( 'No Content Chunks found in Trash', 'kazaz' ), 
		'parent_item_colon'  => __( 'Parent Content Chunks:', 'kazaz' ),
		'menu_name'          => __( 'Content Chunks', 'kazaz' ),
	);
	$args_content_chunk = array(
		'labels'             => $labels_content_chunk,
		'menu_icon'			 => 'dashicons-tickets',
		'exclude_from_search' => true,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true, 
		'show_in_menu'       => true, 
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'chunk' ),
		'capability_type'    => 'page',
		'has_archive'        => true, 
		'hierarchical'       => false,
		'menu_position'      => 18,
		'supports'           => array( 'title', 'editor' ),
	); 
	register_post_type( 'chunk', $args_content_chunk ); // register CPT
	// content chunks end
	
}
add_action( 'init', 'k_custom_tax_cpt' );

/* ------------------------------------------------------ */
/* We will need to add custom columns to our CTs as well! */
/* ------------------------------------------------------ */

/* 1. Events *******/
// add columns
function k_edit_event_columns( $columns ) {
	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Event', 'kazaz' ),
		'event_from' => __( 'Start Date', 'kazaz' ),
		'event_to' => __( 'End Date', 'kazaz' ),
		'event_time_start' => __( 'Start Time', 'kazaz' ),
		'event_time_end' => __( 'End Time', 'kazaz' ), 
		'taxonomy-events' => __( 'Event Categories', 'kazaz' ),
		'date' => __( 'Date posted', 'kazaz' )
	);
	return $columns;
}
add_filter( 'manage_edit-event_columns', 'k_edit_event_columns' );

// fill up with data
function k_manage_event_columns( $column, $post_id ) {

	global $post;
	
	// extract post meta...
	$all_meta = get_post_custom();
	$post_event_meta_arr = unserialize( implode( '', $all_meta[ 'event' ] ) );
	$event_start_date = $post_event_meta_arr[ 'event_from' ];
	$event_end_date = $post_event_meta_arr[ 'event_to' ];
	$event_start_time = $post_event_meta_arr[ 'event_time_start' ];
	$event_end_time = $post_event_meta_arr[ 'event_time_end' ];
	
	switch( $column ) {

		case 'event_from' :

			if( !empty( $event_start_date ) ) echo date_i18n( get_option( 'date_format'), strtotime( $event_start_date ) );
			else echo _x( '-----', 'non-existing table value', 'kazaz' );
			break;

		case 'event_to' :

			if( !empty( $event_end_date ) ) echo date_i18n( get_option( 'date_format'), strtotime( $event_end_date ) );
			else echo _x( '-----', 'non-existing table value', 'kazaz' );
			break;
			
		case 'event_time_start' :

			if( !empty( $event_start_time ) ) echo $event_start_time;
			else echo _x( '-----', 'non-existing table value', 'kazaz' );
			break;
			
		case 'event_time_end' :

			if( !empty( $event_end_time ) ) echo $event_end_time;
			else echo _x( '-----', 'non-existing table value', 'kazaz' );
			break;

		default : break;
	}
}
add_action( 'manage_event_posts_custom_column', 'k_manage_event_columns', 10, 2 );

// make it sortable
function k_event_sortable_columns( $columns ) {
	$columns[ 'event_from' ] = 'event_from';
	return $columns;
}
add_filter( 'manage_edit-event_sortable_columns', 'k_event_sortable_columns' );

// sort it
function k_edit_event_load() {
	add_filter( 'request', 'k_sort_events' );
}
function k_sort_events( $vars ) {
	if( isset( $vars[ 'post_type' ] ) && 'event' == $vars[ 'post_type' ] ) {
		if ( isset( $vars[ 'orderby' ] ) && 'event_from' == $vars[ 'orderby' ] ) {
			$vars = array_merge(
				$vars,
				array(
					'meta_key' => '_order',
					'orderby' => 'meta_value_num'
				)
			);
		}
	}
	return $vars;
}
add_action( 'load-edit.php', 'k_edit_event_load' );
/* Events END ******/


/* 2. Courses *******/
// add columns
function k_edit_course_columns( $columns ) {
	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Course Title', 'kazaz' ),
		'course_id' => __( 'Course ID', 'kazaz' ),
		'taxonomy-courses' => __( 'Course Categories', 'kazaz' ),
		'date' => __( 'Date posted', 'kazaz' )
	);
	return $columns;
}
add_filter( 'manage_edit-course_columns', 'k_edit_course_columns' );

// fill up with data
function k_manage_course_columns( $column, $post_id ) {

	global $post;
	
	// extract post meta...
	$all_meta = get_post_custom();
	$post_course_meta_arr = unserialize( implode( '', $all_meta[ 'course' ] ) );
	$course_id = $post_course_meta_arr[ 'course_id' ];
	
	switch( $column ) {

		case 'course_id' :

			if( !empty( $course_id ) ) echo esc_attr( $course_id );
			else echo _x( '-----', 'non-existing table value', 'kazaz' );
			break;

		default : break;
	}
}
add_action( 'manage_course_posts_custom_column', 'k_manage_course_columns', 10, 2 );

// make it sortable
function k_course_sortable_columns( $columns ) {
	$columns[ 'title' ] = 'title';
	return $columns;
}
add_filter( 'manage_edit-course_sortable_columns', 'k_course_sortable_columns' );

// sort it
function k_edit_course_load() {
	add_filter( 'request', 'k_sort_courses' );
}
function k_sort_courses( $vars ) {
	if( isset( $vars[ 'post_type' ] ) && 'course' == $vars[ 'post_type' ] ) {
		if( isset( $vars[ 'orderby' ] ) && 'title' == $vars[ 'orderby' ] ) $vars = array_merge( $vars, array( 'orderby' => 'title' ) );
	}
	return $vars;
}
add_action( 'load-edit.php', 'k_edit_course_load' );
/* Courses END ******/


/* 3. Galleries *******/
// add columns
function k_edit_gallery_columns( $columns ) {
	$columns = array(
		'cb' => '<input type="checkbox" />',
		'featured_image' => __( 'Featured Image', 'kazaz' ),
		'title' => __( 'Gallery Title', 'kazaz' ),
		'taxonomy-galleries' => __( 'Gallery Categories', 'kazaz' ),
		'gall_ID' => __( 'Gallery ID', 'kazaz' ),
		'date' => __( 'Date posted', 'kazaz' )
	);
	return $columns;
}
add_filter( 'manage_edit-gallery_columns', 'k_edit_gallery_columns' );

// fill up with data
function k_manage_gallery_columns( $column, $post_id ) {

	global $post;
	
	switch( $column ) {

		case 'featured_image' :

			if( has_post_thumbnail( $post_id ) ) echo get_the_post_thumbnail( $post_id, 'thumbnail' );
			else echo _x( '-----', 'non-existing table value', 'kazaz' );
			break;
			
		case 'gall_ID' :

			echo $post_id;
			break;

		default : break;
	}
}
add_action( 'manage_gallery_posts_custom_column', 'k_manage_gallery_columns', 10, 2 );
/* Galleries END ******/


/* 4. Sliders *******/
// add columns
function k_edit_slider_columns( $columns ) {
	$columns = array(
		'cb' => '<input type="checkbox" />',
		'featured_image' => __( 'Slider Leading Image', 'kazaz' ),
		'title' => __( 'Slider Title', 'kazaz' ),
		'shortcode' => __( 'Slider Shortcode', 'kazaz' ),
		'date' => __( 'Date posted', 'kazaz' )
	);
	return $columns;
}
add_filter( 'manage_edit-slider_columns', 'k_edit_slider_columns' );

// fill up with data
function k_manage_slider_columns( $column, $post_id ) {

	global $post;
	
	switch( $column ) {

		case 'featured_image' : 

			if( has_post_thumbnail( $post_id ) ) echo get_the_post_thumbnail( $post_id, 'thumbnail' );
			else echo _x( '-----', 'non-existing table value', 'kazaz' );
			break;
			
		case 'shortcode' : 
		
			// extract post meta...
			$all_meta = get_post_custom();
			$post_slider_meta_arr = unserialize( implode( '', $all_meta[ 'slider_shortcode' ] ) );
			$shortcode_code = $post_slider_meta_arr[ 'slider_auto_shortcode' ];

			if( !empty( $shortcode_code ) ) echo $shortcode_code;
			else echo _x( '-----', 'non-existing table value', 'kazaz' );
			break;

		default : break;
	}
}
add_action( 'manage_slider_posts_custom_column', 'k_manage_slider_columns', 10, 2 );
/* Sliders END ******/


/* 5. Content Chunks *******/
// add columns
function k_edit_content_chunk_columns( $columns ) {
	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Content Title', 'kazaz' ),
		'shortcode' => __( 'Content Shortcode', 'kazaz' ),
		'date' => __( 'Date posted', 'kazaz' )
	);
	return $columns;
}
add_filter( 'manage_edit-chunk_columns', 'k_edit_content_chunk_columns' );

// fill up with data
function k_manage_content_chunk_columns( $column, $post_id ) {

	global $post;
	
	switch( $column ) {
			
		case 'shortcode' : 
		
			// extract post meta...
			$all_meta = get_post_custom();
			$post_content_meta_arr = unserialize( implode( '', $all_meta[ 'content_chunk_shortcode' ] ) );
			$shortcode_code = $post_content_meta_arr[ 'content_auto_shortcode' ];

			if( !empty( $shortcode_code ) ) echo $shortcode_code;
			else echo _x( '-----', 'non-existing table value', 'kazaz' );
			break;

		default : break;
	}
}
add_action( 'manage_chunk_posts_custom_column', 'k_manage_content_chunk_columns', 10, 2 );
/* Sliders END ******/


/* DEFAULT TERMS FOR CTaxonomies */
/*
WordPress' posts have default category named 'Uncategorized', Custom Post Types should follow the logic
*/
function k_set_default_object_terms( $post_id, $post ) {
    if( 'publish' === $post->post_status ) {
		// who are we dealing with?
        if( $post->post_type === 'event' ) $defaults = array( 'events' => array( 'Events' ) );
		elseif( $post->post_type === 'course' ) $defaults = array( 'courses' => array( 'Courses' ) );
		elseif( $post->post_type === 'gallery' ) $defaults = array( 'galleries' => array( 'Galleries' ) );
		// set defaults
		if( $post->post_type === 'event' || $post->post_type === 'course' || $post->post_type === 'gallery' ) {
	        $taxonomies = get_object_taxonomies( $post->post_type );
	        foreach( (array) $taxonomies as $taxonomy ) {
	            $terms = wp_get_post_terms( $post_id, $taxonomy );
	            if( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
					$info = wp_set_object_terms( $post_id, $defaults[ $taxonomy ], $taxonomy );
				}
	        }
        }
    }
}
add_action( 'save_post', 'k_set_default_object_terms', 100, 2 );