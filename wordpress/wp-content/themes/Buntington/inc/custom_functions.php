<?php
/**
 * Nice WP page title
 */
if( !function_exists( 'k_wp_title' ) ) {
	
	function k_wp_title( $title, $sep ) {
		global $paged, $page;
		if( is_feed() ) return $title;
		// Add site name
		$title .= get_bloginfo( 'name' );
		// Add site description
		$site_description = get_bloginfo( 'description', 'display' );
		if( $site_description && ( is_home() || is_front_page() ) ) $title = "$title $sep $site_description";
		// Add page number
		if( $paged >= 2 || $page >= 2 ) $title = "$title $sep " . sprintf( __( 'Page %s', 'kazaz' ), max( $paged, $page ) );
		return $title;
	}
	
}
add_filter( 'wp_title', 'k_wp_title', 10, 2 );


/**
 * Dynamic stylesheet file imprint
 *
 */
if( !function_exists( 'k_add_dynamic_css' ) ) {
	
	function k_add_dynamic_css( $css_query_vars ) {
		$css_query_vars[] = 'dynamic_css';
		return $css_query_vars;
	}
	
}
add_filter( 'query_vars', 'k_add_dynamic_css' );

if( !function_exists( 'k_css_display' ) ) {
	
	function k_css_display() {
		$css = get_query_var( 'dynamic_css' );
		if( $css == 'css' ) {
			include_once( get_template_directory() . '/style.php' );
			exit;
		}
	}
	
}
add_action( 'template_redirect', 'k_css_display' );


/**
 * Enqueue Google font stylesheets
 */
if( !function_exists( 'k_google_fonts_url' ) ) {
	
	function k_google_fonts_url() {
		// content
		$font_face_content = vp_option( 'vpt_option.font_family_content' );
		if( !empty( $font_face_content ) ) {
			$font_style_content = vp_option( 'vpt_option.font_style_content' );
			$font_weight_content = vp_option( 'vpt_option.font_weight_content' );
			$font_subset_content = vp_option( 'vpt_option.font_subset_content' );
			VP_Site_GoogleWebFont::instance()->add( $font_face_content, $font_weight_content, $font_style_content, $font_subset_content );
		}
		
		// titles
		$font_face_title = vp_option( 'vpt_option.font_family_title' );
		if( !empty( $font_face_title ) ) {
			$font_style_title = vp_option( 'vpt_option.font_style_title' );
			$font_weight_title = vp_option( 'vpt_option.font_weight_title' );
			$font_subset_title = vp_option( 'vpt_option.font_subset_title' );
			VP_Site_GoogleWebFont::instance()->add( $font_face_title, $font_weight_title, $font_style_title, $font_subset_title );
		}
		
		if( !empty( $font_face_content ) || !empty( $font_face_title ) ) VP_Site_GoogleWebFont::instance()->register_and_enqueue();
	}
	
}
add_action( 'wp_enqueue_scripts', 'k_google_fonts_url' );


/** 
 * Functional and Main navigation 
 */
if( !function_exists( 'k_navig_functional' ) ) {
	/**
	 * prints Functional menu
	 */
	function k_navig_functional() {
		echo '<nav class="k-functional-navig">';
		wp_nav_menu( array( 'menu_class' => 'list-inline pull-right', 'theme_location' => 'functional' ) );
		echo '</nav>';
	}
}

if( !function_exists( 'k_navig_head' ) ) {
	/**
	 * prints Main menu (drop-down)
	 */
	function k_navig_head() {
		echo '<nav id="k-menu" class="k-main-navig">';
		wp_nav_menu( array( 'menu_id' => 'drop-down-left', 'menu_class' => 'k-dropdown-menu', 'theme_location' => 'primary' ) );
		echo '</nav>';
	}
}


/** 
 * Sidebar HEAD & FOOT
 */
if( !function_exists( 'k_sidebar_head' ) ) {
	/**
	 * prints sidebar wrapping elements - close
	 */
	function k_sidebar_head() {
		$output = '';
		if( vp_option( 'vpt_option.sidebar_position' ) === 'left' ) {
			$output .= '<div id="k-sidebar" class="col-lg-4 col-md-4 col-lg-pull-8 col-md-pull-8"><!-- sidebar wrapper -->';
			$output .= '<div class="col-padded col-shaded"><!-- inner custom column -->';
			$output .= '<ul class="list-unstyled clear-margins"><!-- widgets -->';
		} else {
			$output .= '<div id="k-sidebar" class="col-lg-4 col-md-4"><!-- sidebar wrapper -->';
			$output .= '<div class="col-padded col-shaded"><!-- inner custom column -->';
			$output .= '<ul class="list-unstyled clear-margins"><!-- widgets -->';
		}
		echo $output;
	}
}

if( !function_exists( 'k_sidebar_foot' ) ) {
	/**
	 * prints sidebar wrapping elements - close
	 */
	function k_sidebar_foot() {
		$output = '';
		$output .= '</ul><!-- widgets end -->';
		$output .= '</div><!-- inner custom column end -->';
		$output .= '</div><!-- sidebar wrapper end -->';
		echo $output;
	}
}


/** 
 * Paging !!!
 */
 if( !function_exists( 'k_paging' ) ) { 
	/**
	* Prints pagination
	*/
	function k_paging() {
		$paging_str = wp_link_pages( array( 
			'before' => '<div class="page-links pull-right"><span class="link-pages-prefix">' . __( 'Pages:', 'kazaz' ) . '</span>', 
			'after' => '</div><div class="clearfix"></div>', 
			'link_before' => '<span class="link-pages-pagenum">', 
			'link_after' => '</span>',
			'echo' => 0
		) );
		echo $paging_str;
	}
}
	

/** 
 * Pagination !!!
 */
if( !function_exists( 'k_pagination' ) ) { 
	/**
	* Prints pagination
	*/
	function k_pagination( $echo = 1 ) {
		$output = '';
		global $wp_query;
		global $wp_rewrite;
		
		$wp_query->query_vars[ 'paged' ] > 1 ? $current = $wp_query->query_vars[ 'paged' ] : $current = 1;
		
		if( $wp_query->max_num_pages > 1 ) {	
			$paginate_links_args = array(
				'base' => @add_query_arg( 'paged','%#%' ), 
				'format' => '',
				'current' => $current,
				'show_all' => true,
				'total' => $wp_query->max_num_pages,
				'mid_size' => 5,
				'prev_text' => __( "&larr; PREVIOUS", "kazaz" ),
				'next_text' => __( "NEXT &rarr;", "kazaz" ),
				'type' => 'list',
				'add_args' => false,
				'add_fragment' => ''
			);
			if( !empty( $wp_query->query_vars[ 's' ] ) ) $paginate_links_args[ 'add_args' ] = array( 's' => get_query_var( 's' ) );
			$output .= '<div class="row gutter"><!-- row --><div class="col-lg-12">' . paginate_links( $paginate_links_args ) . '</div></div><!-- row end -->';
		}
		if( $echo ) echo $output;
		else return $output;
	}
}


/** 
 * Post meta data
 */
 if( !function_exists( 'k_post_meta' ) ) { 
	/**
	* Prints date, category and comments number
	*/
	function k_post_meta( $echo = 1 ) {
		// post date
		$output = '';
		$format_prefix = '%2$s';
		$p_date = sprintf( 
			'<span class="news-meta-date"><a href="%1$s" title="%2$s" rel="bookmark"><time datetime="%3$s">%4$s</time></a></span>', 
			esc_url( get_permalink() ), 
			esc_attr( sprintf( __( 'Permalink to %s', 'kazaz' ), the_title_attribute( 'echo=0' ) ) ), 
			esc_attr( get_the_date( 'c' ) ), 
			esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
		);
		// post categories
		$all_cats = '';
		$post_cat = get_the_category();
		$all_cats .= '<span class="news-meta-category">';
		foreach( $post_cat as $pc ) {
			$all_cats .= '<a rel="category" class="cat-walk" title="' . sprintf( __( 'View all posts in %s', 'kazaz' ), $pc->name ) . '" href="' . get_category_link( $pc->cat_ID ) . '">' . $pc->name . '</a>';
		}
		$all_cats .= '</span>';
		// assemble output - untidy because of non existing "get_comments_popup_link()"
		if( $echo ) {
			echo '<div class="news-meta">';
			echo $p_date . $all_cats;
			echo '<span class="news-meta-comments">';
			comments_popup_link( __( '0 comments', 'kazaz' ), __( '1 comment', 'kazaz' ), __( '% comments', 'kazaz' ) );
			echo '</span>';
			echo '</div>';
		} else {
			$write_comments = '';
			$output .= '<div class="news-meta">';
			$output .= $p_date . $all_cats;
			$output .= '<span class="news-meta-comments">';
			$num_comments = get_comments_number();
			if( comments_open() ) {
				if( $num_comments == 0 ) $comments = __( '0 comments', 'kazaz' );
				elseif( $num_comments > 1 ) $comments = $num_comments . ' ' . __( 'comments', 'kazaz' );
				else $comments = __( '1 comment', 'kazaz' );
				$write_comments = '<a href="' . get_comments_link() .'" title="' . the_title_attribute( 'echo=0' ) . '">' . $comments . '</a>';
			} else {
				$write_comments =  __( 'Comments disabled.', 'kazaz' );
			}
			$output .= $write_comments;
			$output .= '</span>';
			$output .= '</div>';
			return $output;
		}
	}
}
if( !function_exists( 'k_cpt_meta' ) ) {
	/**
	* Prints cpt type for search
	*/
	function k_cpt_meta() {
		$str_out = '';
		if( get_post_type() == 'event' ) $str_out = __( 'Event', 'kazaz' );
		if( get_post_type() == 'course' ) $str_out = __( 'Course', 'kazaz' );
		if( get_post_type() == 'gallery' ) $str_out = __( 'Gallery', 'kazaz' );
		$output = '<div class="news-meta"><span class="news-meta-date">' . $str_out . '</span></div>';
		return $output;
	}
}
if( !function_exists( 'k_post_tags' ) ) { 
	/**
	 * Print post tags
	 */
	function k_post_tags() { 
		$output = '';
		$tag_list = get_the_tag_list( '', '', '' );
		if( $tag_list ) {
			$output .= '<div class="news-tags tagcloud">';
			$output .= $tag_list;
			$output .= '</div>';
		}
		echo $output;
	}

}


/**
 Excerpt length & format
 *
 */
if( !function_exists( 'k_custom_excerpt_length' ) ) { 

	function k_custom_excerpt_length( $length ) {
		$post_len = intval( vp_option( 'vpt_option.post_summary_primal' ) );
		if( !$post_len || $post_len < 0 ) $post_len = 24;
		$cat_len = intval( vp_option( 'vpt_option.post_summary_secondary' ) );
		if( !$cat_len || $cat_len < 0 ) $cat_len = 24;
		if( is_category() || is_home() || is_front_page() ) return $post_len;
		else return $cat_len;
	}
	
}
add_filter( 'excerpt_length', 'k_custom_excerpt_length', 999 );

if( !function_exists( 'k_custom_excerpt_more' ) ) { 

	function k_custom_excerpt_more( $more ) {
		global $post;
		$more_str = vp_option( 'vpt_option.post_summary_more' );
		return '... &nbsp; <a href="'. get_permalink( $post->ID ) . '" class="moretag">' . $more_str . '</a>';
	}
	
}
add_filter( 'excerpt_more', 'k_custom_excerpt_more' );


/**
 * Better gallery shortcode handling/output
 */
if( !function_exists( 'k_gallery_shortcode' ) ) { 

	function k_gallery_shortcode( $attr ) {
		$post = get_post();
		
		static $instance = 0;
		$instance ++;
		
		if( !empty( $attr[ 'ids' ] ) ) {
			// 'ids' is explicitly ordered, unless you specify otherwise.
			if( empty( $attr[ 'orderby' ] ) ) $attr[ 'orderby' ] = 'post__in';
			$attr[ 'include' ] = $attr[ 'ids' ];
		}
		
		// Allow plugins/themes to override the default gallery template.
		$output = apply_filters( 'post_gallery', '', $attr );
		if( $output != '' ) return $output;
		
		// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
		if( isset( $attr[ 'orderby' ] ) ) {
			$attr[ 'orderby' ] = sanitize_sql_orderby( $attr[ 'orderby' ] );
			if( !$attr[ 'orderby' ] ) unset( $attr[ 'orderby' ] );
		}
		
		extract( shortcode_atts( array(
			'order'      => 'ASC',
			'orderby'    => 'menu_order ID',
			'id'         => $post ? $post->ID : 0,
			'itemtag'    => 'li',
			'icontag'    => 'div',
			'captiontag' => 'div',
			'columns'    => 3,
			'size'       => 'large',
			'include'    => '',
			'exclude'    => ''
		), $attr, 'gallery' ) );
		
		$id = intval( $id );
		if( 'RAND' == $order ) $orderby = 'none';
		
		if( !empty( $include ) ) {
			$_attachments = get_posts( array( 'include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
		
			$attachments = array();
			foreach ( $_attachments as $key => $val ) {
				$attachments[ $val->ID ] = $_attachments[ $key ];
			}
		} elseif ( !empty( $exclude ) ) {
			$attachments = get_children( array( 'post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
		} else {
			$attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
		}
		
		if( empty( $attachments ) ) return '';
		
		if( is_feed() ) {
			foreach( $attachments as $att_id => $attachment ) $output .= wp_get_attachment_link( $att_id, $size, true );
			return $output;
		}
		
		$itemtag = tag_escape( $itemtag );
		$captiontag = tag_escape( $captiontag );
		$icontag = tag_escape( $icontag );
		$valid_tags = wp_kses_allowed_html( 'post' );
		if( !isset( $valid_tags[ $itemtag ] ) ) $itemtag = 'dl';
		if( !isset( $valid_tags[ $captiontag ] ) ) $captiontag = 'dd';
		if( !isset( $valid_tags[ $icontag ] ) ) $icontag = 'dt';
		
		$columns = intval( $columns );
		// convert to Bootstrap readable columns
		$bs_cols = 12;
		if( $columns == 1 ) $bs_cols = 12;
		elseif( $columns == 2 ) $bs_cols = 6; 
		elseif( $columns == 3 ) $bs_cols = 4;
		elseif( $columns == 4 ) $bs_cols = 3;
		elseif( $columns == 6 ) $bs_cols = 2;
		elseif( $columns == 5 || $columns > 6 ) $bs_cols = 2;
		
		$size_class = sanitize_html_class( $size );
		$output .= '<ul class="k-gallery-grid list-unstyled k-equal-height">';
		$i = 0;
		foreach( $attachments as $id => $attachment ) {
			if( isset( $attr[ 'link' ] ) && 'file' == $attr[ 'link' ] ) $link = wp_get_attachment_url( $id );
			else $link = get_attachment_link( $id );
			$img_attr = array(
				'class'	=> "attachment-$size img-responsive",
				'alt'   => trim( strip_tags( get_post_meta( $id, '_wp_attachment_image_alt', true ) ) ),
			);
			$output .= "<{$itemtag} class='col-lg-" . $bs_cols . " col-md-" . $bs_cols . " col-sm-6 col-xs-12'>";
			$output .= '<figure>';
			$output .= '<a href="' . $link . '" title="' . apply_filters( 'the_title', $attachment->post_title ) . '" data-id="gallery-fb-' . $post->ID . '">';
			$output .= wp_get_attachment_image( $id, $size, false, $img_attr );
			$output .= '</a>';
			$output .= '</figure>';
			if( $attachment->post_excerpt != '' ) $output .= "<{$captiontag} class='wp-caption-text gallery-caption'>" . wptexturize( $attachment->post_excerpt ) . "</{$captiontag}>";
			$output .= "</{$itemtag}>";
		}
		
		$output .= "</ul>";
		return $output;
	}
}
remove_shortcode( 'gallery' );
add_shortcode( 'gallery' , 'k_gallery_shortcode' );

/**
 * Prints post attached image
 */
if( !function_exists( 'k_attached_image' ) ) { 

	function k_attached_image() {
		
		$post = get_post();
		$next_attachment_url = wp_get_attachment_url();
		$attachment_ids = get_posts( array(
			'post_parent' => $post->post_parent,
			'fields' => 'ids',
			'numberposts' => -1,
			'post_status' => 'inherit',
			'post_type' => 'attachment',
			'post_mime_type' => 'image',
			'order' => 'ASC',
			'orderby' => 'menu_order ID'
		) );
		
		if( count( $attachment_ids ) > 1 ) {
			foreach( $attachment_ids as $attachment_id ) {
				if ( $attachment_id == $post->ID ) {
					$next_id = current( $attachment_ids );
					break;
				}
			}
			if( $next_id ) $next_attachment_url = get_attachment_link( $next_id );
			else $next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
		}
		
		printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>', 
			esc_url( $next_attachment_url ), 
			the_title_attribute( array( 'echo' => false ) ), 
			wp_get_attachment_image( $post->ID, array( 1140, 9999 ) )
		);
	}
}


/**
 What's going on with CPT Event? Save event start date as post meta (UNIX timestamp) so we can order it properly
 *
 */ 
if( !function_exists( 'k_save_event_post_extra' ) ) { 

	function k_save_event_post_extra( $post_id ) {
		$cpt_slug = 'event';
		$event_span = NULL;
		if( isset( $_POST[ 'post_type' ] ) && $cpt_slug != $_POST[ 'post_type' ] ) return; // do nothing if we are not dealing with Event!
		if( isset( $_REQUEST[ 'event' ][ 'event_from' ] ) && $_REQUEST[ 'event' ][ 'event_from' ] != '' ) {
			$to_unix = strtotime( $_REQUEST[ 'event' ][ 'event_from' ] );
			update_post_meta( $post_id, '_order', sanitize_text_field( $to_unix ) );
			$event_span = $to_unix;
		}
		// appendix: calculate event life span
		if( isset( $_REQUEST[ 'event' ][ 'event_to' ] ) && $_REQUEST[ 'event' ][ 'event_to' ] != '' ) {
			$to_unix_evto = strtotime( $_REQUEST[ 'event' ][ 'event_to' ] );
			$begin_of_day = strtotime( 'midnight', $to_unix_evto );
			$end_of_day = strtotime( 'tomorrow', $begin_of_day ) - 1; // increase timestamp for 24 hours
			update_post_meta( $post_id, '_finito', sanitize_text_field( $end_of_day ) );
		} else {
			// when there's no event_to date defined
			if( $event_span ) {
				$begin_of_day = strtotime( 'midnight', $event_span );
				$end_of_day = strtotime( 'tomorrow', $begin_of_day ) - 1; // increase timestamp for 24 hours
				update_post_meta( $post_id, '_finito', sanitize_text_field( $end_of_day ) );
			}
		}
	}
	
}
add_action( 'save_post', 'k_save_event_post_extra' );


/**
 What's going on with CPT Course? Save course meta for easy search
 *
 */ 
if( !function_exists( 'k_save_course_post_extra' ) ) { 

	function k_save_course_post_extra( $post_id ) {
		$cpt_slug = 'course';
		$meta_field = '';
		if( isset( $_POST[ 'post_type' ] ) && $cpt_slug != $_POST[ 'post_type' ] ) return; // do nothing if we are not dealing with Course!
		$meta_field .= esc_attr( get_the_title( $post_id ) ) . ', '; // course title
		if( isset( $_REQUEST[ 'course' ][ 'course_id' ] ) ) $meta_field .= $_REQUEST[ 'course' ][ 'course_id' ] . ', '; // course ID
		// course[course_features][0][course_f_value]
		if( isset( $_REQUEST[ 'course' ][ 'course_features' ] ) ) {
			$course_features_arr = $_REQUEST[ 'course' ][ 'course_features' ];
			foreach( $course_features_arr as $course_feature ) {
				$meta_value = $course_feature[ 'course_f_value' ];
				$meta_field .= $meta_value . ', ';
			}
		}
		update_post_meta( $post_id, '_search', $meta_field );
	}
	
}
add_action( 'save_post', 'k_save_course_post_extra' );


/**
 CPT Course is searchable...
 *
 */
if( !function_exists( 'k_search_course_template_chooser' ) ) { 

	function k_search_course_template_chooser( $template ) {    
		global $wp_query;   
		$post_type = get_query_var( 'post_type' );   
		if( $wp_query->is_search && $post_type == 'course' ) return locate_template( 'search-course.php' ); // redirect
		return $template;   
	}
	
}
add_filter( 'template_include', 'k_search_course_template_chooser' );


/**
 What's going on with CPT Slider? Set featured image automatically
 *
 */
if( !function_exists( 'k_save_slider_post_extra' ) ) {
	  
	function k_save_slider_post_extra( $post_id ) {
		$cpt_slug = 'slider';
		if( isset( $_POST[ 'post_type' ] ) && $cpt_slug != $_POST[ 'post_type' ] ) return; // do nothing if we are not dealing with Slider!
		if( isset( $_REQUEST[ 'slider' ][ 'slider_slides' ][0][ 'slide_photo' ] ) ) {
			$first_slide_photo_id = k_url_to_attachmentid( $_REQUEST[ 'slider' ][ 'slider_slides' ][0][ 'slide_photo' ] );
			if( $first_slide_photo_id ) update_post_meta( $post_id, '_thumbnail_id', $first_slide_photo_id );
		}
	}
	
}
add_action( 'save_post', 'k_save_slider_post_extra' );

/* appendix to function "k_save_slider_post_extra()" : retrieve attachment ID by attachment URL */
if( !function_exists( 'k_url_to_attachmentid' ) ) {
	
	function k_url_to_attachmentid( $image_url ) {
		if( empty( $image_url ) ) return null;
		global $wpdb;
		$attachment = wp_cache_get( 'featured_column_thumbnail_' . md5( $image_url ), null );
		if( false === $attachment ) {
			$attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE guid = '%s';", $image_url ) );
			wp_cache_add( 'featured_column_thumbnail_' . md5( $image_url ), $attachment, null );
		}
		return !empty( $attachment ) ? $attachment[ 0 ] : null;
	}
	
}
/* end appendix */

/* enable CT posts filtering - since OCT 21. 2014 */
if( !function_exists( 'k_ct_filter_query' ) ) {
	
	function k_ct_filter_query( $query ) {
		if( $query->is_main_query() && $query->is_tax( 'events' ) ) {
			$date_time_now = time(); // to compare with
			$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
			$query->set( 'post_type', array( 'event' ) );
			$query->set( 'order', 'ASC' );
			$query->set( 'orderby', 'meta_value_num' );
			$query->set( 'meta_key', '_order' );
			$query->set( 'paged', $paged );
			$query->set( 'meta_query', array(
				array(
					'key' => '_finito', 
					'value' => $date_time_now,
					'compare' => '>', 
					'type' => 'NUMERIC' 
				)
			) );
		}
		if( $query->is_main_query() && $query->is_tax( 'courses' ) ) {
			$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
			$query->set( 'post_type', array( 'course' ) );
			$query->set( 'order', 'ASC' );
			$query->set( 'orderby', 'title' );
			$query->set( 'paged', $paged );
		}
		if( $query->is_main_query() && $query->is_tax( 'galleries' ) ) {
			$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
			$query->set( 'post_type', array( 'gallery' ) );
			$query->set( 'paged', $paged );
		}
		
		return $query;
	}

}
add_action( 'pre_get_posts', 'k_ct_filter_query' );

/* end enable CT posts filtering */


/**
 * Enable Page Blox to be selected for home page -------------------------------------------------------------
 */
if( !function_exists( 'k_blox_to_dropdown' ) ) {
	
	function k_blox_to_dropdown( $select ) {
		// Not our list.
		if( FALSE === strpos( $select, 'page_on_front' ) ) return $select;
		$blox = get_posts( array( 'post_type' => 'hom_page', 'post_status' => 'publish', 'posts_per_page' => -1 ) );
		if( !$blox ) return $select;
	
		$page_on_front = intval( get_option( 'page_on_front' ) ) ? get_option( 'page_on_front' ) : -1;
		$blox_options = walk_page_dropdown_tree( 
			$blox, 
			0, 
			array( 'depth' => 0, 'child_of' => 0, 'selected' => $page_on_front, 'echo' => 0, 'name' => 'page_on_front', 'id' => '', 'show_option_none' => '', 'show_option_no_change' => '', 'option_none_value' => '' )
		);
	
		return str_replace( '</select>', $blox_options . '</select>', $select );
	}
	
}
add_filter( 'wp_dropdown_pages', 'k_blox_to_dropdown', 10, 1 );

if( !function_exists( 'k_enable_front_page_cpt' ) ) {
	
	function k_enable_front_page_cpt( $query ) {
		if( $query->is_singular() && $query->is_main_query() && !$query->get( 'post_type' ) && !$query->is_single() ) {
			$page_on_front = get_option( 'page_on_front' );
			//if( ( !isset( $query->query_vars[ 'post_type' ] ) || '' == $query->query_vars[ 'post_type' ] ) ) {
			if( (int)$page_on_front ) $query->query_vars[ 'post_type' ] = array( 'page', 'hom_page' );
			//}
		}
	}
	
}
add_action( 'pre_get_posts', 'k_enable_front_page_cpt' );

if( !function_exists( 'k_template_redirect_frontpage_cpt' ) ) {

	function k_template_redirect_frontpage_cpt() {
		if( is_front_page() && is_singular( 'hom_page' ) ) {
		   include locate_template( '/single-hom_page.php' );
		   die();
		}
	}

}
add_action( 'template_redirect', 'k_template_redirect_frontpage_cpt' );
// ------------------------------------------------------------------------------------------------------------- 


/**
* Cleaner Shortcode output
*/
if( !function_exists( 'k_reformat_shortcode' ) ) {
	
	function k_reformat_shortcode( $content ) {
		$block = join( '|', array( 'row','column','custom_column','gap','separator','bullet_paragraph','blockquote','team_member','super_button','button','awesome_icon','alert','progress_bar','google_map','pie_chart','embedr','audio_playr','tabs_wrapper','tab_content','accordion_wrapper','accordion_content','slider','recent_news','upcoming_events','embed','featured_gallery','pages_menu','course_search','twitter_twitts' ) );
		$rep = preg_replace( "/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/", "[$2$3]", $content );
		$rep = preg_replace( "/(<p>)?\[\/($block)](<\/p>|<br \/>)?/", "[/$2]", $rep );
		return $rep;
	}

}
add_filter( 'the_content', 'k_reformat_shortcode' );


/**
* Social Media links
*/
if( !function_exists( 'k_social_media_links' ) ) : 

	function k_social_media_links() {
		$arr_valid = array();
		$arr_socials = array();
		$arr_socials[ 0 ][ 'url' ] = vp_option( 'vpt_option.sm_foursquare' ); $arr_socials[ 0 ][ 'media_name' ] = 'Foursquare'; 
		$arr_socials[ 1 ][ 'url' ] = vp_option( 'vpt_option.sm_dribbble' ); $arr_socials[ 1 ][ 'media_name' ] = 'Dribbble';
		$arr_socials[ 2 ][ 'url' ] = vp_option( 'vpt_option.sm_facebook' ); $arr_socials[ 2 ][ 'media_name' ] = 'Facebook';
		$arr_socials[ 3 ][ 'url' ] = vp_option( 'vpt_option.sm_flickr' ); $arr_socials[ 3 ][ 'media_name' ] = 'Flickr';
		$arr_socials[ 4 ][ 'url' ] = vp_option( 'vpt_option.sm_google' ); $arr_socials[ 4 ][ 'media_name' ] = 'Google-plus';
		$arr_socials[ 5 ][ 'url' ] = vp_option( 'vpt_option.sm_instagram' ); $arr_socials[ 5 ][ 'media_name' ] = 'Instagram';
		$arr_socials[ 6 ][ 'url' ] = vp_option( 'vpt_option.sm_linkedin' ); $arr_socials[ 6 ][ 'media_name' ] = 'LinkedIn';
		$arr_socials[ 7 ][ 'url' ] = vp_option( 'vpt_option.sm_pinterest' ); $arr_socials[ 7 ][ 'media_name' ] = 'Pinterest';
		$arr_socials[ 8 ][ 'url' ] = vp_option( 'vpt_option.sm_tumblr' ); $arr_socials[ 8 ][ 'media_name' ] = 'Tumblr';
		$arr_socials[ 9 ][ 'url' ] = vp_option( 'vpt_option.sm_twitter' ); $arr_socials[ 9 ][ 'media_name' ] = 'Twitter';
		$arr_socials[ 10 ][ 'url' ] = vp_option( 'vpt_option.sm_youtube' ); $arr_socials[ 10 ][ 'media_name' ] = 'YouTube';
		$arr_socials[ 11 ][ 'url' ] = vp_option( 'vpt_option.sm_vimeo' ); $arr_socials[ 11 ][ 'media_name' ] = 'Vimeo';
		foreach( $arr_socials as $k => $v) { if( !empty( $v[ 'url' ] ) ) $arr_valid[] = $v; }
		
		return $arr_valid;
	}
	
endif;


/**
* Random code generator
*/
if( !function_exists( 'k_rnd_key' ) ) : 

	function k_rnd_key( $len ) {
		$chars = array( '1','2','3','4','5','6','7','8','9','0',
		'a','b','c','d','e','f','g','h','i','j','k','l','m',
		'n','o','p','q','r','s','t','u','v','w','x','y','z',
		'A','B','C','D','E','F','G','H','I','J','K','L','M',
		'N','O','P','Q','R','S','T','U','V','W','X','Y','Z' );
		$min = 0;
		$max = sizeof( $chars ) - 1;
		$key = '';
		for( $i = 0; $i < $len; $i++ ) $key .= $chars[ mt_rand( $min, $max ) ];
		return $key;
	}
	
endif;


/**
* Add SoundCloud oEmbed
*/
if( !function_exists( 'k_oembed_soundcloud' ) ) : 

	function k_oembed_soundcloud() {
		wp_oembed_add_provider( '#http://(www\.)?soundcloud\.com/.*#i', 'http://soundcloud.com/oembed', true );
	}
	
endif;
add_action( 'init', 'k_oembed_soundcloud' );


/**
 * WP's Video shortcode dimensions
 */
if( !function_exists( 'k_oembed_video_filter' ) ) : 

	function k_oembed_video_filter( $html, $url, $attr, $post_ID ) {
		$return = '<div class="video-container">' . $html . '</div>';
		return $return;
	}

endif;
add_filter( 'embed_oembed_html', 'k_oembed_video_filter', 10, 4 );


/**
 * Share Post with AddThis
 */
if( !function_exists( 'k_share_with_add_this' ) ) : 

	function k_share_with_add_this() {
		$kode = '';
		if( vp_option( 'vpt_option.use_addthis' ) ) $kode = vp_option( 'vpt_option.addthis_code' );
		echo '<div class="addthis-wrapper col-lg-12">' . $kode . '</div>';
	}
	
endif;


/**
 * Google Analytics
 */
if( !function_exists( 'k_google_analytics' ) ) : 

	function k_google_analytics() {
		$kode = '';
		if( vp_option( 'vpt_option.use_ga' ) ) $kode = vp_option( 'vpt_option.ga_code' );
		echo $kode;
	}
	
endif;


/**
* Is valid email address?
*/
if( !function_exists( 'k_is_valid_email_address' ) ) : 

	function k_is_valid_email_address( $email ) {
		if( $isemail = filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
			list( $email, $domain ) = explode( '@', $email );
			if( !getmxrr( $domain, $mxhosts ) ) return FALSE;
			else return TRUE;
		} else {
			return FALSE;
		}
	}
	
endif;


/**
* Custom Login Logo Support
*/
if( !function_exists( 'k_custom_login_logo' ) ) : 

	function k_custom_login_logo() {
		list( $width, $height ) = getimagesize( get_template_directory_uri() . '/public/img/site-logo.png' );
		echo '<style type="text/css">
				h1 a { display: block; width: 100% !important; height: ' . $height . 'px !important; background-image: url(' . get_template_directory_uri() . '/public/img/site-logo.png) !important; background-size: inherit !important; }
				.login #nav, .login #backtoblog { display: inline-block; padding: 0 !important; font-size: 11px; text-transform: uppercase; width: 49%; margin-top: 15px; }
				.login #backtoblog { text-align: right; }
				.login label { font-size: 12px; text-transform: uppercase; font-weight: 600; }
				.login label input { font-weight: normal; }
				.login form { box-shadow: 0 0 30px rgba(0, 0, 0, 0.05); padding-top: 36px; }
		</style>';
	}
	
endif;
add_action( 'login_head', 'k_custom_login_logo' );


/**
* Custom Login URL
*/
if( !function_exists( 'k_wp_login_url' ) ) : 

	function k_wp_login_url() {
		return home_url();
	}
	
endif;
add_filter( 'login_headerurl', 'k_wp_login_url' );


/**
* Custom Login Title
*/
if( !function_exists( 'k_wp_login_title' ) ) : 

	function k_wp_login_title() {
		return get_option( 'blogname' );
	}
	
endif;
add_filter( 'login_headertitle', 'k_wp_login_title' );


/**
* Password protected form
*/
if( !function_exists( 'k_password_form' ) ) : 

	function k_password_form() {
		global $post;
		$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
		$o = '
		<form class="protected-post-form" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
		<p>' . __( 'This post is password protected!', 'kazaz' ) . '</p>
		<div class="form-group">
		<label for="' . $label . '">' . __( 'Enter Password', 'kazaz' ) . ' </label>
		<input name="post_password" id="' . $label . '" type="password" /><button type="submit" name="Submit" class="btn btn-success">' . __( 'Submit', 'kazaz' ) . '</button>
		</div></form>';
		return $o;
	}
	
endif;
add_filter( 'the_password_form', 'k_password_form' );

/**
* Add Event to Google calendar
*/
if( !function_exists( 'k_get_google_uri' ) ) : 

	function k_get_google_uri() {
		
		global $post;
		
		$post_id = $post->ID;
		
		if( !$post_id ) return;
		
		$post_title = get_the_title( $post_id );
		
		$event_start_date = vp_metabox( 'event.event_from' );
		$event_end_date = vp_metabox( 'event.event_to' );
		$event_start_time = vp_metabox( 'event.event_time_start' );
		$event_end_time = vp_metabox( 'event.event_time_end' );
		
		$date_template = 'Ymd\THis';
		$final_date_time_start = '';
		$final_date_time_end   = '';
		
		if( !$event_start_date ) return;
		if( !$event_start_time ) {
			//$date_template = 'Ymd';
			$final_date_time_start = $event_start_date . '00:00:01';
		} elseif( $event_start_time ) {
			$final_date_time_start = $event_start_date . $event_start_time;
		}
		
		if( !$event_end_date && $event_end_time ) {
			$final_date_time_end = $event_start_date . $event_end_time;
		} elseif( !$event_end_date && !$event_end_time ) {
			$final_date_time_end = $event_start_date . '23:59:59';
		} elseif( $event_end_date && $event_end_time ) {
			$final_date_time_end = $event_end_date . $event_end_time;
		} elseif( $event_end_date && !$event_end_time ) {
			$final_date_time_end = $event_end_date . '23:59:59';
		}
	
		$start = date( $date_template, strtotime( $final_date_time_start ) );
		$end   = date( $date_template, strtotime( $final_date_time_end ) );
		$location = esc_attr( get_bloginfo( 'name', 'display' ) );
		// any address given?
		$contact_address = ( vp_option( 'vpt_option.contact_address' ) != '' ) ? vp_option( 'vpt_option.contact_address' ) : 0;
		$contact_city = ( vp_option( 'vpt_option.contact_city' ) != '' ) ? vp_option( 'vpt_option.contact_city' ) : 0;
		$contact_state = ( vp_option( 'vpt_option.contact_state' ) != '' ) ? vp_option( 'vpt_option.contact_state' ) : 0;
		$contact_zip = ( vp_option( 'vpt_option.contact_zip' ) != '' ) ? vp_option( 'vpt_option.contact_zip' ) : 0;
		$contact_country = ( vp_option( 'vpt_option.contact_country' ) != '' ) ? vp_option( 'vpt_option.contact_country' ) : 0;
		
		if( $contact_address ) $location .= ',' . $contact_address;
		if( $contact_city ) $location .= ',' . $contact_city;
		if( $contact_state ) $location .= ',' . $contact_state;
		if( $contact_zip ) $location .= ',' . $contact_zip;
		if( $contact_country ) $location .= ',' . $contact_country;
		
		$output_html_front = '<div class="google-add-wrap"><span class="event-to-google-cal"><i class="fa fa-clock-o fa-lg"></i><a href="';
		$output_html_back  = '" class="GCpopup">' . __( 'Add to Google Calendar', 'kazaz' ) . '</a></span></div>';
	
		return $output_html_front . 'https://www.google.com/calendar/render?action=TEMPLATE&text=' . $post_title .
		'&dates=' . $start . '/' . $end .
		'&details=For+details,+link+here:+' . get_permalink( $post_id ) .
		'&location=' . $location . $output_html_back;
	}
	
endif;


/**
* Shortcodes everywhere
*/
add_filter( 'term_description', 'shortcode_unautop' );
add_filter( 'term_description', 'do_shortcode' );
add_filter( 'the_excerpt', 'shortcode_unautop' );
add_filter( 'the_excerpt', 'do_shortcode' );
add_filter( 'widget_text', 'shortcode_unautop' );
add_filter( 'widget_text', 'do_shortcode' );