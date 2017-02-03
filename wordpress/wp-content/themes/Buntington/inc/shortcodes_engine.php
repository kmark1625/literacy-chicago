<?php
/*
* This file is supposed to convert producr shortcodes into WP readable code
*/

/* Row Shortcode */
function sc_row( $atts, $content = NULL ) {
	extract( shortcode_atts( array( 'equal_height' => 'true' ), $atts ) );
	$eh_class = '';
	if( $equal_height == 'true' ) $eh_class = ' k-equal-height';
	return '<div class="row gutter' . $eh_class . '">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( "row", "sc_row" );
/* Row Shortcode ----------------------------------------------------------------------------------------------------------* /


/* Column Shortcode */
function sc_column( $atts, $content = NULL ) {
	extract( shortcode_atts( array( 'col' => '12' ), $atts ) );
	// get next
	$side_classes = '';
	if( $col == 2 ) $side_classes = 'col-lg-2 col-md-4 col-sm-6 col-xs-12';
	else if( $col == 3 ) $side_classes = 'col-lg-3 col-md-3 col-sm-6 col-xs-12';
	else if( $col == 4 ) $side_classes = 'col-lg-4 col-md-4 col-sm-4 col-xs-12';
	else if( $col == 6 ) $side_classes = 'col-lg-6 col-md-6 col-sm-6 col-xs-12';
	else if( $col == 8 ) $side_classes = 'col-lg-8 col-md-8 col-sm-8 col-xs-12';
	else if( $col == 9 ) $side_classes = 'col-lg-9 col-md-9 col-sm-6 col-xs-12';
	else if( $col == 12 ) $side_classes = 'col-lg-12';
	return '<div class="' . $side_classes . '">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( "column", "sc_column" );
/* Column Shortcode ----------------------------------------------------------------------------------------------------------* /


/* Custom Column Shortcode */
function sc_custom_column( $atts, $content = NULL ) {
	extract( shortcode_atts( array( 'col' => '12', 'offset' => 0, 'textalign' => '' ), $atts ) );
	// get next
	$text_align = ( $textalign == 'text-left' ) ? '' : ' ' . $textalign;
	$offset_class = '';
	if( $offset == 1 ) $offset_class = 'col-lg-offset-1 col-md-offset-1 col-sm-offset-1';
	else if( $offset == 2 ) $offset_class = 'col-lg-offset-2 col-md-offset-2 col-sm-offset-2';
	else if( $offset == 3 ) $offset_class = 'col-lg-offset-3 col-md-offset-3 col-sm-offset-3';
	else if( $offset == 4 ) $offset_class = 'col-lg-offset-4 col-md-offset-4 col-sm-offset-4';
	else if( $offset == 5 ) $offset_class = 'col-lg-offset-5 col-md-offset-5 col-sm-offset-5';
	else if( $offset == 6 ) $offset_class = 'col-lg-offset-6 col-md-offset-6 col-sm-offset-6';
	else if( $offset == 7 ) $offset_class = 'col-lg-offset-7 col-md-offset-7 col-sm-offset-7';
	else if( $offset == 8 ) $offset_class = 'col-lg-offset-8 col-md-offset-8 col-sm-offset-8';
	else if( $offset == 9 ) $offset_class = 'col-lg-offset-9 col-md-offset-9 col-sm-offset-9';
	else if( $offset == 10 ) $offset_class = 'col-lg-offset-10 col-md-offset-10 col-sm-offset-10';
	else if( $offset == 11 ) $offset_class = 'col-lg-offset-11 col-md-offset-11 col-sm-offset-11';
	$side_classes = '';
	if( $col == 1 ) $side_classes = 'col-lg-1 col-md-1 col-sm-1 col-xs-12';
	else if( $col == 2 ) $side_classes = 'col-lg-2 col-md-2 col-sm-2 col-xs-12';
	else if( $col == 3 ) $side_classes = 'col-lg-3 col-md-3 col-sm-3 col-xs-12';
	else if( $col == 4 ) $side_classes = 'col-lg-4 col-md-4 col-sm-4 col-xs-12';
	else if( $col == 5 ) $side_classes = 'col-lg-5 col-md-5 col-sm-5 col-xs-12';
	else if( $col == 6 ) $side_classes = 'col-lg-6 col-md-6 col-sm-6 col-xs-12';
	else if( $col == 7 ) $side_classes = 'col-lg-7 col-md-7 col-sm-7 col-xs-12';
	else if( $col == 8 ) $side_classes = 'col-lg-8 col-md-8 col-sm-8 col-xs-12';
	else if( $col == 9 ) $side_classes = 'col-lg-9 col-md-9 col-sm-9 col-xs-12';
	else if( $col == 10 ) $side_classes = 'col-lg-10 col-md-10 col-sm-10 col-xs-12';
	else if( $col == 11 ) $side_classes = 'col-lg-11 col-md-11 col-sm-11 col-xs-12';
	else if( $col == 12 ) $side_classes = 'col-lg-12';
	return '<div class="' . $side_classes . $offset_class . $text_align . '">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( "custom_column", "sc_custom_column" );
/* Custom Column Shortcode ----------------------------------------------------------------------------------------------------------* /


/* Content Gaps */
function sc_gap( $atts, $content = NULL ) {
	extract( shortcode_atts( array( 'height' => 40 ), $atts ) );
	return '<div class="gap' . $height . '"></div>';
}
add_shortcode( "gap", "sc_gap" );
/* Content Gaps ----------------------------------------------------------------------------------------------------------* /


/* Content Separators */
function sc_separator( $atts, $content = NULL ) {
	extract( shortcode_atts( array( 'style' => 'regular' ), $atts ) );
	if( $style == 'regular' ) return '<hr />';
	else return '<div class="separator-' . $style . '"></div>';
}
add_shortcode( "separator", "sc_separator" );
/* Content Separators ----------------------------------------------------------------------------------------------------------* /


/* Bullet Paragraph */
function sc_bullet_paragraph( $atts, $content = NULL ) {
	extract( shortcode_atts( array( 'paragraph_icon' => 'fa fa-rocket' ), $atts ) );
	$output = '';
    $output .= '<div class="bullet-paragraph-wrap">';
    $output .= '<i class="fa fa-2x ' . $paragraph_icon . '"></i>';
    $output .= '<div class="bullet-paragraph-text">';
    $output .= do_shortcode( $content );
    $output .= '</div>';
    $output .= '</div>';
	return $output;
}
add_shortcode( "bullet_paragraph", "sc_bullet_paragraph" );
/* Bullet Paragraph ----------------------------------------------------------------------------------------------------------* /


/* Team member */
function sc_team_member( $atts, $content = NULL ) {
	extract( shortcode_atts( array( 'photo' => '', 'name' => 'John Doe', 'position' => '', 'tagline' => '' ), $atts ) );
	$member_position = ( !empty( $position ) ) ? ' <small>' . esc_attr( $position ) . '</small>' : '';
	$output = '';
    $output .= '<div class="leadership-wrapper">';
    if( !empty( $photo ) ) {
    	$output .= '<figure class="leadership-photo">';
    	$output .= '<img src="' . esc_attr( $photo ) . '" alt="' . esc_attr( $name ) . '" />';
    	$output .= '</figure>';
    }
    $output .= '<div class="leadership-meta clearfix">';
    $output .= '<h1 class="leadership-function title-median">' . esc_attr( $name ) . $member_position . '</h1>';
    if( !empty( $tagline) ) $output .= '<div class="leadership-position">' . esc_attr( $tagline ) . '</div>';
    $output .= do_shortcode( $content );
    $output .= '</div>';
    $output .= '</div>';
	return $output;
}
add_shortcode( "team_member", "sc_team_member" );
/* Team member ----------------------------------------------------------------------------------------------------------* /


/* Blockquotes */
function sc_blockquote( $atts, $content = NULL ) {
	extract( shortcode_atts( array( 'textalign' => 'pull-left', 'quote_author' => 'Johnny Doe', 'quote_source' => '' ), $atts ) );
	$text_align = ( $textalign == 'pull-left' ) ? '' : ' class="' . $textalign . '"';
	$q_author = ( $quote_source == '' ) ? '' : ', <cite title="' . esc_attr( $quote_source ) . '">' . esc_attr( $quote_source ) . '</cite>';
	return '<blockquote' . $text_align . '>' . do_shortcode( $content ) . '<small>' . esc_attr( $quote_author ) . $q_author . '</small></blockquote>';
}
add_shortcode( "blockquote", "sc_blockquote" );
/* Blockquotes ----------------------------------------------------------------------------------------------------------* /


/* Button */
function sc_button( $atts, $content = NULL ) {
	extract( shortcode_atts( array( 'icon' => '', 'style' => 'btn-default', 'size' => 'btn-md', 'label' => 'Button', 'link' => 'http://google.com' , 'link_opens' => '_self' ), $atts ) );
	$btn_icon = ( $icon == '' ) ? '' : '<i class="fa ' . $icon . '"></i> &nbsp; ';
	return '<a href="' . esc_attr( $link ) . '" target="' . $link_opens . '" class="btn ' . $style . ' ' . $size . '">' . $btn_icon . esc_attr( $label ) . '</a>';
}
add_shortcode( "button", "sc_button" );
/* Button ----------------------------------------------------------------------------------------------------------* /


/* Super Button */
function sc_super_button( $atts, $content = NULL ) {
	extract( shortcode_atts( array( 'icon' => '', 'label' => 'Button Label', 'tagline' => 'My button tagline...', 'color' => '#ea5644', 'link' => 'http://google.com' , 'link_opens' => '_self' ), $atts ) );
	$btn_icon = ( $icon == '' ) ? '' : '<i class="custom-button-icon fa ' . $icon . '"></i>';
	$output = '';
    $output .= '<a href="' . esc_attr( $link ) . '" class="custom-button" style="background-color: ' . $color . ';" title="' . esc_attr( $label ) . '" target="' . $link_opens . '">';
    $output .= $btn_icon;
    $output .= '<span class="custom-button-wrap">';
    $output .= '<span class="custom-button-title">' . esc_attr( $label ) . '</span>';
    if( !empty( $tagline ) ) $output .= '<span class="custom-button-tagline">' . esc_attr( $tagline ) . '</span>';
    $output .= '</span>';
    $output .= '<em></em>';
    $output .= '</a>';
	return $output;
}
add_shortcode( "super_button", "sc_super_button" );
/* Supper Button ----------------------------------------------------------------------------------------------------------* /


/* Fontawesome icon */
function sc_awesome_icon( $atts, $content = NULL ) {
	extract( shortcode_atts( array( 'icon' => 'fa-rocket', 'icon_size' => 'fa-lg' ), $atts ) );
	return '<i class="fa ' . $icon . ' ' . $icon_size . '"></i>';
}
add_shortcode( "awesome_icon", "sc_awesome_icon" );
/* Fontawesome icon ----------------------------------------------------------------------------------------------------------* /


/* Alerts */
function sc_alert( $atts, $content = NULL ) {
	extract( shortcode_atts( array( 'style' => 'alert-success', 'dismissable' => 'false' ), $atts ) );
	// get next
	$output = '';
	$class_dismissable = '';
	if( $dismissable == 'true' ) $class_dismissable = ' alert-dismissable';
	$output .= '<div class="alert ' . $style . $class_dismissable . '">';
	if( $dismissable == 'true' ) $output .= '<button aria-hidden="true" data-dismiss="alert" class="close-me" type="button">&times;</button>';
	$output .= do_shortcode( $content );
	$output .= '</div>';
	return $output;
}
add_shortcode( "alert", "sc_alert" );
/* Alerts ----------------------------------------------------------------------------------------------------------* /


/* Progress Bars */
function sc_progress_bar( $atts, $content = NULL ) {
	extract( shortcode_atts( array( 'style' => 'default', 'value' => '29', 'striped' => 'false' ), $atts ) );
	// get next
	$pb_class = ( $style == 'default' ) ? '' : ' ' . $style;
	$pb_striped = ( $striped == 'false' ) ? '' : ' progress-striped';
	return '<div class="progress' . $pb_striped . '"><div class="progress-bar' . $pb_class . '" role="progressbar" aria-valuenow="' . $value . '" aria-valuemin="0" aria-valuemax="100" style="width: ' . $value . '%"><span class="sr-only">' . $value . '% Complete (success)</span></div></div>';
}
add_shortcode( "progress_bar", "sc_progress_bar" );
/* Progress Bars ----------------------------------------------------------------------------------------------------------* /


/* Google Maps */
function sc_google_map( $atts, $content = NULL ) {
	extract( shortcode_atts( array( 'title' => '', 'lat' => '37.782231', 'lon' => '-122.400679', 'zoom' => '', 'marker' => '', 'name' => '', 'address' => '', 'city' => '', 'state' => '', 'zip' => '', 'country' => '' ), $atts ) );
	$map_wrapper_id = k_rnd_key( 12 );
	$map_title = ( $title != '' ) ? esc_attr( $title ) : 'Map-' . $map_wrapper_id;
	$map_lon = ( is_numeric( $lon ) ) ? $lon : -122.400679;
	$map_lat = ( is_numeric( $lat ) ) ? $lat : 37.782231;
	$map_marker = ( $marker != '' ) ? esc_attr( $marker ) : '';
	$map_name = ( $name != '' ) ? esc_attr( $name ) : '';
	$map_address = ( $address != '' ) ? esc_attr( $address ) : '';
	$map_city = ( $city != '' ) ? esc_attr( $city ) : '';
	$map_state = ( $state != '' ) ? esc_attr( $state ) : '';
	$map_zip = ( $zip != '' ) ? esc_attr( $zip ) : '';
	$map_country = ( $country != '' ) ? esc_attr( $country ) : '';
	return '<div id="g-map-' . $map_wrapper_id . '" class="map" data-gmaptitle="' . $map_title . '" data-gmapzoom="' . $zoom . '" data-gmaplon="' . $map_lon . '" data-gmaplat="' .  $map_lat . '" data-gmapmarker="' . $map_marker . '" data-cname="' . $map_name . '" data-caddress="' . $map_address . '" data-ccity="' . $map_city . '" data-cstate="' . $map_state . '" data-czip="' . $map_zip . '" data-ccountry="' . $map_country . '"></div>';
}
add_shortcode( 'google_map', 'sc_google_map' );
/* Google Maps ----------------------------------------------------------------------------------------------------------* /


/* Simple Pie Charts */
function sc_pie_chart( $atts, $content = NULL ) {
	extract( shortcode_atts( array( 'color' => '', 'value' => '', 'chart_align' => 'text-center', 'label' => '', 'line_width' => '', 'width' => '' ), $atts ) );
	$pie_color = ( $color == '' ) ? '#333333' : $color;
	$pie_width = ( intval( $width ) > 0 ) ? intval( $width ) : 120;
	$pie_label = ( $label != '' ) ? esc_attr( $label ) : '';
	$output = '';
	$output .= '<div class="k-chart-wrap ' . $chart_align . '">';
	$output .= '<div data-percent="' . $value . '" class="chart easyPieChart" data-color="' . $pie_color . '" data-line="' . $line_width . '" data-width="' . $pie_width . '">' . $value . '%';
	$output .= '</div>';
	if( $pie_label != '' ) $output .= '<div class="label">' . $pie_label . '</div>';
	$output .= '</div>';
	return $output;
}
add_shortcode( 'pie_chart', 'sc_pie_chart' );
/* Simple Pie Charts ----------------------------------------------------------------------------------------------------------* /


/* Embedding */
function sc_embedr( $atts, $content = NULL ) {
	extract( shortcode_atts( array( 'responsive' => 'true' ), $atts ) );
	$responsive_class = ( $responsive == 'false' ) ? 'embed' : 'video';
	return '<div class="' . $responsive_class . '-container">' . $content . '</div>';
}
add_shortcode( 'embedr', 'sc_embedr' );
/* Embedding ----------------------------------------------------------------------------------------------------------* /


/* Audio */
function sc_audio_player( $atts, $content = NULL ) {
	extract( shortcode_atts( array( 'src_ogg' => '', 'src_mp3' => '' ), $atts ) );
	$ogg = '';
	$mp3 = '';
	$sources = '';
	if( !empty( $src_ogg ) ) $ogg = '<source src="' . esc_attr( $src_ogg ) . '" />';
	if( !empty( $src_mp3 ) ) $mp3 = '<source src="' . esc_attr( $src_mp3 ) . '" />';
	$sources = $ogg . "\n" . $mp3;
	return '<div class="audio-container"><audio preload="auto" controls>' . $sources . '</audio></div>';
}
add_shortcode( 'audio_playr', 'sc_audio_player' );
/* Audio ----------------------------------------------------------------------------------------------------------* /


/* Tabs */
function sc_tabs_wrapper( $atts, $content = NULL ) {
	extract( shortcode_atts( array( 'style' => 'nav-tabs', 'justify' => 'false' ), $atts ) );
	// get next
	$tab_wrapper_id = k_rnd_key( 12 );
	$tabs_justify = ( $justify == 'false' ) ? '0' : 'nav-justified';
	$container_data = 'data-ul-class="nav" data-ul-style="' . $style . '" data-ul-justify="' . $tabs_justify . '"';
	return '<div id="k-make-tabs-' . $tab_wrapper_id . '" class="tab-content" ' . $container_data . '>' . do_shortcode( $content ) . '</div>';
}
add_shortcode( "tabs_wrapper", "sc_tabs_wrapper" );

function sc_tab_content( $atts, $content = NULL ) {
	extract( shortcode_atts( array( 'tab_label' => 'Tab 1' ), $atts ) );
	// get next
	$tab_content_id = k_rnd_key( 12 );
	return '<div id="' . $tab_content_id . '" class="tab-pane fade" data-label="' . esc_attr( $tab_label ) . '">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( "tab_content", "sc_tab_content" );
/* Tabs ----------------------------------------------------------------------------------------------------------* /


/* Accordions */
function sc_accordions_wrapper( $atts, $content = NULL ) {
	extract( shortcode_atts( array(), $atts ) );
	// get next
	$accordion_wrapper_id = k_rnd_key( 12 );
	return '<div id="k-make-accordions-' . $accordion_wrapper_id . '" class="panel-group">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( "accordion_wrapper", "sc_accordions_wrapper" );

function sc_accordion_content( $atts, $content = NULL ) {
	extract( shortcode_atts( array( 'accordion_label' => 'Accordion 1' ), $atts ) );
	// get next
	$accordion_content_id = k_rnd_key( 12 );
	$output = '';
	$output .= '<div class="panel panel-default">';
	$output .= '<div class="panel-heading">';
	$output .= '<h4 class="panel-title">';
	$output .= '<a class="accordion-toggle collapsed" data-toggle="collapse" href="#k-collapse-element-' . $accordion_content_id . '">' . esc_attr( $accordion_label ) . '</a>';
	$output .= '</h4>';
	$output .= '</div>';
	$output .= '<div id="k-collapse-element-' . $accordion_content_id . '" class="panel-collapse collapse">';
	$output .= '<div class="panel-body">';
	$output .= do_shortcode( $content );
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';
	return $output;
}
add_shortcode( "accordion_content", "sc_accordion_content" );
/* Accordions ----------------------------------------------------------------------------------------------------------* /


/* Slider by ID ----------------------------------------------------------------------------------------------------------*/
function k_slider( $atts, $content = NULL ) {
	extract( shortcode_atts( array( 'id' => null ), $atts ) );
	if( !$id ) return;

	$slider_wrapper_id = 'slider-' . k_rnd_key( 12 ); // DIV unique ID
	// slider post props
	$slider_props = get_post_custom( $id );
	
	if( ! function_exists( 'qtranxf_init_language' ) ) {
		$fixed_data = preg_replace_callback( '!s:(\d+):"(.*?)";!',
			function($match) {
				return ($match[1] == strlen($match[2])) ? $match[0] : 's:' . strlen($match[2]) . ':"' . $match[2] . '";';
			},
		$slider_props[ 'slider' ] );
		$slider_slides = unserialize( implode( '', $fixed_data ) );
		extract( $slider_slides );
	} else {
		$slider_controls_type = $slider_props[ 'slider' ][ 0 ][ 'slider_controls_type' ];
		$slider_effect = $slider_props[ 'slider' ][ 0 ][ 'slider_effect' ];
		$slider_mode = $slider_props[ 'slider' ][ 0 ][ 'slider_mode' ];
		$slider_interval = $slider_props[ 'slider' ][ 0 ][ 'slider_interval' ];
		$slider_margins = $slider_props[ 'slider' ][ 0 ][ 'slider_margins' ];
		$slider_slides = $slider_props[ 'slider' ][ 0 ][ 'slider_slides' ];
	}
	
	
	// slider effect
	$class_effect = '';
	if( $slider_effect != 'default' && $slider_effect ) $class_effect = ' carousel-' . $slider_effect;
	
	// how many slides?
	$slides_count = count( $slider_slides );
	$slider_cycle = '';
	if( $slider_mode == 'auto' ) $slider_cycle = ' data-ride="carousel" data-interval="' . $slider_interval . '"';
	elseif( $slider_mode == 'manual' ) $slider_cycle = ' data-interval="false"';
	
	$output = '';
	$output .= '<div id="' . $slider_wrapper_id . '" class="carousel slide ' . $slider_margins . $class_effect . '"' . $slider_cycle . '>';
		
		if( $slider_controls_type != 'slided' && !empty( $slider_controls_type ) ) : 
		$output .= '<ol class="carousel-indicators">';
			
			$cnt_pages = 0; 
			while( $cnt_pages < $slides_count ) {
			$output .= '<li data-target="#' . $slider_wrapper_id . '" data-slide-to="' . $cnt_pages . '"';
			if( $cnt_pages < 1 ) $output .= ' class="active"';
			$output .= '></li>';
			$cnt_pages ++; 
			}
		$output .= '</ol>';
		endif;
		
		$output .= '<div class="carousel-inner">';
		
		$cnt_slides = 0;
		while( $cnt_slides < $slides_count ) {
			$image = $slider_slides[ $cnt_slides ][ 'slide_photo' ];
			$title = esc_attr( $slider_slides[ $cnt_slides ][ 'slide_title' ] );
			$descr = esc_attr( $slider_slides[ $cnt_slides ][ 'slide_description' ] );
			$linkd = esc_attr( $slider_slides[ $cnt_slides ][ 'slide_link' ] );
			$cap_pos = $slider_slides[ $cnt_slides ][ 'caption_position' ];
			$cap_sch = $slider_slides[ $cnt_slides ][ 'caption_scheme' ];
			$rem_bck = $slider_slides[ $cnt_slides ][ 'remove_background' ];
			$tit_siz = $slider_slides[ $cnt_slides ][ 'title_size' ];

			$output .= '<div class="item';
			if( $cnt_slides < 1 ) $output .= ' active';
			$output .= '">';
				if( !empty( $linkd ) ) {
					$output .= '<a href="' . $linkd . '" title="' . $linkd . '">';
					$output .= '<img src="' . $image . '" alt="' . $title . '" />';
					$output .= '</a>';
				} else { 
					$output .= '<img src="' . $image . '" alt="' . $title . '" />';
				}
				if( !empty( $title ) || !empty( $descr ) ) : 
	            	$output .= '<div class="k-carousel-caption' . ' ' . $cap_pos . ' ' . $cap_sch; 
	            	if( $rem_bck ) $output .= ' no-bg';
	            	$output .= '">';
	            	$output .= '<div class="caption-content">';
	                if( !empty( $title ) ) $output .= '<h3 class="' . $tit_siz . ' remove-margin-top">' . $title . '</h3>';
	                if( !empty( $descr ) ) $output .= '<p>' .  $descr . '</p>';
	                $output .= '</div>';
	            	$output .= '</div>';
	            endif;
			$output .= '</div>';

			$cnt_slides ++;
		}
		
		$output .= '</div>';
		
		if( $slider_controls_type != 'paged' && !empty( $slider_controls_type ) ) : 
    	$output .= '<a class="left carousel-control" href="#' . $slider_wrapper_id . '" data-slide="prev"><i class="fa fa-chevron-left"></i></a>';
    	$output .= '<a class="right carousel-control" href="#' . $slider_wrapper_id . '" data-slide="next"><i class="fa fa-chevron-right"></i></a>';
		endif;
	
	$output .= '</div>';
	
	return $output;
}
add_shortcode( 'slider', 'k_slider' );
/* Slider by ID end ----------------------------------------------------------------------------------------------------------*/


/* Blog */
function sc_blog( $atts, $content = NULL ) {
	extract( shortcode_atts( array( 'section_title' => '', 'items_number' => 6, 'include_categories' => '', 'exclude_posts' => '', 'clear_wrapper_margin' => 'true' ), $atts ) );
	$safe_items_number = ( intval( $items_number ) <= 0 ) ? -1 : intval( $items_number );
	$include_categs = ( !empty( $include_categories ) ) ? $include_categories : '';
	$exclude_posts  = ( !empty( $exclude_posts ) ) ? $exclude_posts : '';

	$args = array( 'posts_per_page' => $safe_items_number, 'cat' => $include_categs, 'post__not_in' => $exclude_posts );
	$class_margin = '';
	if( $clear_wrapper_margin == 'true' ) $class_margin = ' clear-wrapper-margin';
	$postz = new WP_query( $args );
	$output = '';
	if( !empty( $section_title ) ) $output .= '<h1 class="title-widget">' . esc_attr( $section_title ) . '</h1>';
	if( !$postz->have_posts() ) $output .= '<div class="alert alert-danger">' . __( 'No entries found!', 'kazaz' ) . '</div>';
	else {
		$output .= '<div class="row gutter k-equal-height' . $class_margin . '">';
		
		// start loop...
		while( $postz->have_posts() ) : $postz->the_post();
		
		$output .= '<div class="news-mini-wrap col-lg-6 col-md-6">';
		
			if( has_post_thumbnail() && !post_password_required() && !is_attachment() ) : 
			
		    $output .= '<figure class="news-featured-image">';
			    $output .= '<a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '">' . get_the_post_thumbnail( get_the_ID(), 'full' ) . '</a>';
		    $output .= '</figure>';
		    
			endif;
		
			$output .= '<h1 class="page-title">';
				$output .= '<a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) .'">' . esc_attr( get_the_title() ) . '</a>';
			$output .= '</h1>';
			
			$output .= k_post_meta( 0 );
			
			$output .= '<div class="news-summary">';
		
	    	if( has_excerpt() ) $output .= '<p>' . get_the_excerpt() . '</p>';
			else $output .= '<p>' . wp_trim_excerpt() . '</p>';
		
			$output .= '</div>';
		
		$output .= '</div>';
			
		endwhile; // loop ends
		
		$output .= '</div>';
		
		$output .= k_pagination( 0 );
		
		wp_reset_query(); // reset query
		
		return $output;
	}
}
add_shortcode( "blog", "sc_blog" );
/* Blog ----------------------------------------------------------------------------------------------------------* /


/*                                     ---   H O M   P A G E   S H O R T C O D E S  ---                                       */


/* Recent News */
function sc_recent_news( $atts, $content = NULL ) {
	extract( shortcode_atts( array( 'section_title' => '', 'items_number' => 5, 'exclude_categories' => '', 'style' => 'basic' ), $atts ) );
	$safe_items_number = ( intval( $items_number ) <= 0 ) ? -1 : intval( $items_number );
	$exclude_categories = explode( ',', $exclude_categories );
	$excluded_categs = ( !empty( $exclude_categories ) ) ? $exclude_categories : array();
	$e_cats = '';
	$e_cats_negative = array();
	if( !empty( $excluded_categs ) ) {
		foreach( $excluded_categs as $e_cat ) {
			$e_cat_neg = $e_cat * -1;
			array_push( $e_cats_negative, $e_cat_neg );
		}
		$e_cats = implode( ',', $e_cats_negative );
	}
	$args = array( 'posts_per_page' => $safe_items_number, 'cat' => $e_cats );
	$postz = new WP_query( $args );
	$output = '';
	if( !empty( $section_title ) ) $output .= '<h1 class="title-widget">' . esc_attr( $section_title ) . '</h1>';
	if( !$postz->have_posts() ) $output .= '<div class="alert alert-danger">' . __( 'No entries found!', 'kazaz' ) . '</div>';
	else {
		$postz_count = $postz->post_count;
		// start...
		$output .= '<ul class="list-unstyled">';

		while( $postz->have_posts() ) : $postz->the_post();
		
			if( $style == 'basic' ) {

			$output .= '<li class="recent-news-wrap news-no-summary">';
	            $output .= '<div class="recent-news-content clearfix">';
	                $output .= '<figure class="recent-news-thumb">';
	                    $output .= '<a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '">';
	                    $output .= get_the_post_thumbnail( get_the_ID(), 'thumbnail' );
	                    $output .= '</a>';
	                $output .= '</figure>';
	                $output .= '<div class="recent-news-text">';
	                    $output .= '<div class="recent-news-meta">';
	                        $output .= '<div class="recent-news-date">' . get_the_date() . '</div>';
	                    $output .= '</div>';
	                    $output .= '<h1 class="title-median">';
	                    	$output .= '<a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '">' . esc_attr( get_the_title() ) . '</a>';
	                    $output .= '</h1>';
	                $output .= '</div>';
	            $output .= '</div>';
	        $output .= '</li>';

			} else {

			$output .= '<li class="recent-news-wrap">';
	            $output .= '<h1 class="title-median">';
	            	$output .= '<a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '">' . esc_attr( get_the_title() ) . '</a>';
	            $output .= '</h1>';
	            $output .= '<div class="recent-news-meta">';
	                $output .= '<div class="recent-news-date">' . get_the_date() . '</div>';
	            $output .= '</div>';
	            $output .= '<div class="recent-news-content clearfix">';
	                $output .= '<figure class="recent-news-thumb">';
	                    $output .= '<a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '">';
	                    $output .= get_the_post_thumbnail( get_the_ID(), 'thumbnail' );
	                    $output .= '</a>';
	                $output .= '</figure>';
	                $output .= '<div class="recent-news-text">';
	                    $output .= '<p>' . wp_trim_excerpt() . '</p>';
	                $output .= '</div>';
	            $output .= '</div>';
	        $output .= '</li>';

			} // end if one of two styles
			
		endwhile; // loop ends
		wp_reset_query(); // reset query

		$output .= '</ul>';
		
		return $output;
	}
}
add_shortcode( "recent_news", "sc_recent_news" );
/* Recent News ----------------------------------------------------------------------------------------------------------* /


/* Upcoming Events */
function sc_upcoming_events( $atts, $content = NULL ) {
	extract( shortcode_atts( array( 'section_title' => '', 'items_number' => 3 ), $atts ) );
	$output = '';
	$ppp = 3;
	if( !empty( $items_number ) ) $ppp = intval( $items_number );
	if( $ppp < 1 ) $ppp = 3;
	
	if( !empty( $section_title ) ) $output .= '<h1 class="title-widget">' . esc_attr( $section_title ) . '</h1>';
	
	// query events
	$date_time_now = time(); // to compare with
	$q_events = new WP_Query( 
		array( 
			'post_type' => 'event', 
			'order' => 'ASC', 
			'orderby' => 'meta_value_num', 
			'meta_key' => '_order', 
			'posts_per_page' => $ppp, 
			'meta_query' => array( 
				array(
					'key' => '_finito', 
					'value' => $date_time_now,
					'compare' => '>', 
					'type' => 'NUMERIC' 
				)
			)
		) 
	);
	
	if( !$q_events->have_posts() ) $output .= '<div class="alert alert-danger">' . __( 'No entries found!', 'kazaz' ) . '</div>';
	else {
		$output .= '<ul class="list-unstyled">';
		
		while( $q_events->have_posts() ) : $q_events->the_post();
			
            $output .= '<li class="up-event-wrap">';
                $output .= '<h1 class="title-median">';
                	$output .= '<a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '">';
                	$output .= esc_attr( get_the_title() );
                	$output .= '</a>';
                $output .= '</h1>';
            	// grab meta...
            	$event_start_date = vp_metabox( 'event.event_from' );
            	$event_end_date = vp_metabox( 'event.event_to' );
            	$event_start_time = vp_metabox( 'event.event_time_start' );
            	$event_end_time = vp_metabox( 'event.event_time_end' );
            	
                $output .= '<div class="up-event-meta clearfix">';
                if( $event_start_date ) : 
                	$output .= '<div class="up-event-date">' . date_i18n( get_option( 'date_format'), strtotime( $event_start_date ) ) . '</div>';
                endif;
                if( $event_end_date ) : 
                	$output .= '<div class="up-event-date">' . date_i18n( get_option( 'date_format'), strtotime( $event_end_date ) ) . '</div>';
                endif;
                if( $event_start_time ) : 
                	$output .= '<div class="up-event-time">' . $event_start_time;
                	if( $event_end_time ) $output .= ' - ' . $event_end_time;
                	$output .= '</div>';
                endif;
                $output .= '</div>';
				
				$output .= k_get_google_uri(); // google calendar add
				
                $output .= '<p>' . wp_trim_excerpt() . '</p>';
            $output .= '</li>';
			
        endwhile;
        
        $output .= '</ul>';
	}
	
	wp_reset_query(); // drop current query
	
	return $output;
}
add_shortcode( "upcoming_events", "sc_upcoming_events" );
/* Upcoming Events ----------------------------------------------------------------------------------------------------------* /


/* Content Chunks */
function sc_content_chunk( $atts, $content = NULL ) {
	extract( shortcode_atts( array( 'section_title' => '', 'id' => '' ), $atts ) );
	$output = '';
	if( !empty( $section_title ) ) $output .= '<h1 class="title-widget">' . esc_attr( $section_title ) . '</h1>';
	if( !empty( $id ) ) {
		// query
		$argz = array( 'page_id' => intval( $id ), 'post_type' => 'chunk' );
		$chunk_page = new WP_Query( $argz );
		if( !$chunk_page->have_posts() ) $output .= '<div class="alert alert-danger">' . __( 'No entries found!', 'kazaz' ) . '</div>';
		else {
			while( $chunk_page->have_posts() ) : $chunk_page->the_post();

				// print it
				$output .= wpautop( do_shortcode( get_the_content() ) );

			endwhile;
		}
		
		wp_reset_query();
		
	}
	
	return $output;
}
add_shortcode( "content_chunk", "sc_content_chunk" );
/* Content Chunks ----------------------------------------------------------------------------------------------------------* /


/* Pages Menu */
function sc_pages_menu( $atts, $content = NULL ) {
	extract( shortcode_atts( array( 'section_title' => '', 'pages_list' => '' ), $atts ) );
	$output = '';
	if( !empty( $section_title ) ) $output .= '<h1 class="title-widget">' . esc_attr( $section_title ) . '</h1>';
	if( !empty( $pages_list ) ) {
		$pages_arr = explode( ',', $pages_list );
		$output .= '<div class="widget_nav_menu"><ul>';
		foreach( $pages_arr as $page_id ) {
			$page_title = get_the_title( $page_id );
			$output .= '<li><a href="' . get_permalink( $page_id ) . '" title="' . esc_attr( $page_title ) . '">' . esc_attr( $page_title ) . '</a></li>';
		}
		$output .= '</ul></div>';
	} else {
		$output .= '<div class="alert alert-danger">' . __( 'No pages found!', 'kazaz' ) . '</div>';
	}
	
	return $output;
}
add_shortcode( "pages_menu", "sc_pages_menu" );
/* Pages Menu ----------------------------------------------------------------------------------------------------------* /


/* Any Gallery */
function sc_featured_gallery( $atts, $content = NULL ) {
	extract( shortcode_atts( array( 'section_title' => '', 'gallery_id' => '' ), $atts ) );
	$output = '';
	if( !empty( $section_title ) ) $output .= '<h1 class="title-widget">' . esc_attr( $section_title ) . '</h1>';
	if( !empty( $gallery_id ) ) {
		// query
		$argz = array( 'p' => intval( $gallery_id ), 'post_type' => 'gallery' );
		$g_post = new WP_Query( $argz );
		if( !$g_post->have_posts() ) $output .= '<div class="alert alert-danger">' . __( 'No entries found!', 'kazaz' ) . '</div>';
		else {
			while( $g_post->have_posts() ) : $g_post->the_post();
			// how many photos in this gallery?
			$photos_num = 0;
			$this_post_images = get_children( array(
				'post_parent' => $gallery_id,
				'post_type' => 'attachment',
				'post_mime_type' => 'image'
			) );
			if( !empty( $this_post_images ) ) {
				$photos_num = count( $this_post_images );
				if( $photos_num < 10 ) $photos_num = '0' . $photos_num;
				// print it
				$output .= '<div class="gallery-wrapper">';
				$output .= '<figure class="gallery-last-photo clearfix">';
				$output .= '<a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '">';
				$output .= get_the_post_thumbnail( $gallery_id );
				$output .= '</a>';
				$output .= '</figure>';
				$output .= '<div class="gallery-info">';
				$output .= '<span class="gallery-photos-num">' . $photos_num . '</span>';
				$output .= '<span class="gallery-photos-tag">' . _x( 'Photos', 'galleries category page, NN photos', 'kazaz' ) . '</span>';
				$output .= '</div>';
				$output .= '<div class="gallery-meta">';
				$output .= '<h1 class="gallery-title">';
				$output .= '<a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '">';
				$output .= get_the_title();
				$output .= '</a>';
				$output .= '</h1>';
				$output .= '</div>';
				$output .= '</div>';
			}
			endwhile;
		}
		wp_reset_query();
	}
	
	return $output;
}
add_shortcode( "featured_gallery", "sc_featured_gallery" );
/* Any Gallery ----------------------------------------------------------------------------------------------------------* /


/* Twitter Twitts */
function sc_twitter_twitts( $atts, $content = NULL ) {
	extract( shortcode_atts( array( 'section_title' => '', 'twitter_user' => '', 'twitts_num' => '', 'excl_replies' => 'true' ), $atts ) );
	$s_twitts_num = 1;
	if( intval( $twitts_num ) < 1 ) $s_twitts_num = 1;
	else $s_twitts_num = intval( $twitts_num );
	if( $excl_replies == 'true' ) $excl_replies = 1;
	else $excl_replies = 0;
	$output = '';
	if( !empty( $section_title ) ) $output .= '<h1 class="title-widget">' . esc_attr( $section_title ) . '</h1>';
	if( !empty( $twitter_user ) ) {
		// local vars
		$consumer_key    = esc_attr( vp_option( 'vpt_option.twitter_consumer_key' ) );
		$consumer_secret = esc_attr( vp_option( 'vpt_option.twitter_consumer_secret' ) );
		$access_token    = esc_attr( vp_option( 'vpt_option.twitter_access_token' ) );
		$access_secret   = esc_attr( vp_option( 'vpt_option.twitter_access_token_secret' ) );
		
		//create a new instance
		require_once 'twitteroauth.php';
		require_once 'FooTweetFetcher.php';
		$fetcher = new FooTweetFetcher( $consumer_key, $consumer_secret, $access_token, $access_secret );
		$args = array(
			'limit'            => $s_twitts_num, 
			'include_rts' 	   => false, 
			'exclude_replies'  => $excl_replies
		);
		
		//get tweets (cached for 5 hours)
		$tweets = $fetcher->get_tweets( $twitter_user, $args );
		if( $tweets !== false && is_array( $tweets ) && ( count( $tweets ) > 0 ) ) {
		
			$output .= '<ul class="k-twitter-twitts list-unstyled">';
		
			foreach( $tweets as $tweet ) {
				//convert all URLs, mentions, hashtags, media to clickable links
				$text = $fetcher->make_clickable( $tweet );
				$output .= '<li class="twitter-twitt"><p>' . $text . '</p></li>';
		 	}
		         
			$output .= '</ul>';
			
        	$output .= '<div class="k-twitter-twitts-footer">';
        	$output .= '<a href="https://twitter.com/' . $twitter_user . '" class="k-twitter-twitts-follow" title="' . __( 'Follow!', 'kazaz' ) . '"><i class="fa fa-twitter"></i>&nbsp; ' . __( 'Follow Us!', 'kazaz' ) . '</a>';
        	$output .= '</div>';

		} // end if there are twitts
		
	} else {
		$output .= '<div class="alert alert-danger">' . __( 'Twitter user is undefined!', 'kazaz' ) . '</div>';
	}
	
	return $output;
}
add_shortcode( "twitter_twitts", "sc_twitter_twitts" );
/* Twitter Twitts ----------------------------------------------------------------------------------------------------------* /


/* Course Search */
function sc_course_search( $atts, $content = NULL ) {
	extract( shortcode_atts( array( 'section_title' => '', 'tagline' => '' ), $atts ) );
	$output = '';
	$share_link = '';
	if( !empty( $section_title ) ) $output .= '<h1 class="title-titan">' . esc_attr( $section_title ) . '</h1>';
	
    $output .= '<form role="search" method="get" id="course-finder" action="' . site_url('/') . '">';
        $output .= '<div class="input-group">';
            $output .= '<input type="text" placeholder="' . _x( 'Find a course...', 'course search form placeholder', 'kazaz' ) . '" autocomplete="off" class="form-control" id="find-course" name="s" />';
            $output .= '<input type="hidden" name="post_type" value="course" />';
            $output .= '<span class="input-group-btn">';
            $output .= '<button type="submit" class="btn btn-default">' .  _x( 'GO!', 'course search form button label', 'kazaz' ) . '</button>';
            $output .= '</span>';
        $output .= '</div>';
        if( !empty( $tagline ) ) : 
        	$output .= '<span class="help-block">' . esc_attr( $tagline ) . '</span>';
        endif;
    $output .= '</form>';
    
    return $output;
        
}
add_shortcode( 'course_search', 'sc_course_search' );
/* Course Search ----------------------------------------------------------------------------------------------------------* /


/* Embedding 2 */
function sc_embed( $atts, $content = NULL ) {
	extract( shortcode_atts( array( 'section_title' => '', 'responsive' => 'true', 'share' => '' ), $atts ) );
	$output = '';
	$share_link = '';
	if( !empty( $section_title ) ) $output .= '<h1 class="title-widget">' . esc_attr( $section_title ) . '</h1>';
	if( !empty( $share ) ) $share_link = esc_attr( $share );
	else $output .= '<div class="alert alert-danger">' . __( 'Source is undefined!', 'kazaz' ) . '</div>';
	$responsive_class = ( $responsive == 'false' ) ? 'embed' : 'video';
	$output .= '<div class="' . $responsive_class . '-container">' . wp_oembed_get( $share_link ) . '</div>';
	
	return $output;
}
add_shortcode( 'embed', 'sc_embed' );
/* Embedding 2 ----------------------------------------------------------------------------------------------------------* /

/**
 * EOF
 */