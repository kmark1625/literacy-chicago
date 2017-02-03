<?php
VP_Security::instance()->whitelist_function( 'k_font_preview' );
function k_font_preview( $face ) {
	$gwf   = new VP_Site_GoogleWebFont();
	$gwf->add( $face );
	$links = $gwf->get_font_links();
	$link  = reset( $links );
	$dom   = <<<EOD
<link href='$link' rel='stylesheet' type='text/css'>
<p style="padding: 0 10px 0 10px; font-family: $face; font-weight: bold; font-size: 23px; line-height: 26px;">
	That's my title (ŠšĐđČčĆćŽž)
</p>
<p style="padding: 0 10px 0 10px; font-family: $face; font-weight: normal; font-size: 16px; line-height: 26px;">
	Grumpy wizards make toxic brew for the evil Queen and Jack (ŠšĐđČčĆćŽž).
	<br />
	Pellentesque sed odio nisi. Sed ut pellentesque libero, quis bibendum nibh. Phasellus sodales scelerisque nisi, eu rutrum mi lorem ipsum dolor.
</p>
EOD;
	return $dom;
}
// slider shortcode
function k_slider_shortcode() {
	global $post;
	return '[slider id="' . $post->ID . '"]';
}
// content chunks shortcode
function k_content_shortcode() {
	global $post;
	return '[content_chunk id="' . $post->ID . '"]';
}
// social media pages
function k_get_social_medias() {
	$socmeds = array(
		array('value' => 'dribbble', 'label' => 'Dribbble'),
		array('value' => 'facebook', 'label' => 'Facebook'),
		array('value' => 'flickr', 'label' => 'Flickr'),
		array('value' => 'foursquare', 'label' => 'Foursquare'),
		array('value' => 'github', 'label' => 'Github'),
		array('value' => 'googleplus', 'label' => 'Google+'),
		array('value' => 'instagram', 'label' => 'Instagram'),
		array('value' => 'linkedin', 'label' => 'LinkedIn'),
		array('value' => 'pinterest', 'label' => 'Pinterest'),
		array('value' => 'tumblr', 'label' => 'Tumblr'),
		array('value' => 'twitter', 'label' => 'Twitter'),
		array('value' => 'youtube', 'label' => 'Youtube'),
	);

	return $socmeds;
}
// return all posts
function k_get_posts() {
	$argz = array( 'post_type' => array( 'post' ), 'post_status' => 'publish', 'posts_per_page' => -1 );
	$wp_posts = get_posts( $argz );
	$result = array();
	foreach( $wp_posts as $pst ) {
		$result[] = array( 'value' => $pst->ID, 'label' => $pst->post_title );
	}
	return $result;
}
// return all pages
function k_get_pages() {
	$argz = array( 'post_type' => array( 'page' ), 'post_status' => 'publish', 'posts_per_page' => -1 );
	$wp_pages = get_posts( $argz );
	$result = array();
	foreach( $wp_pages as $pge ) {
		$result[] = array( 'value' => $pge->ID, 'label' => $pge->post_title );
	}
	return $result;
}
// return all top_level categories
function k_get_categories() {
	$wp_cat = get_categories( array( 'hide_empty' => 0 ) );
	$result = array();
	foreach( $wp_cat as $cat ) {
		//if( $cat->parent > 0 ) continue;
		$result[] = array( 'value' => $cat->cat_ID, 'label' => $cat->name );
	}
	return $result;
}
// return all sliders
function k_get_sliders() {
	$argz = array( 'post_type' => array( 'slider' ), 'post_status' => 'publish', 'posts_per_page' => -1 );
	$wp_pages = get_posts( $argz );
	$result = array();
	foreach( $wp_pages as $pge ) {
		$result[] = array( 'value' => $pge->ID, 'label' => $pge->post_title );
	}
	return $result;
}
// return all galleries
function k_get_galleries() {
	$argz = array( 'post_type' => array( 'gallery' ), 'post_status' => 'publish', 'posts_per_page' => -1 );
	$wp_pages = get_posts( $argz );
	$result = array();
	foreach( $wp_pages as $pge ) {
		$result[] = array( 'value' => $pge->ID, 'label' => $pge->post_title );
	}
	return $result;
}
// return all content chunks
function k_get_content_chunks() {
	$argz = array( 'post_type' => array( 'chunk' ), 'post_status' => 'publish', 'posts_per_page' => -1 );
	$wp_pages = get_posts( $argz );
	$result = array();
	foreach( $wp_pages as $pge ) {
		$result[] = array( 'value' => $pge->ID, 'label' => $pge->post_title );
	}
	return $result;
}
// layout selection
VP_Security::instance()->whitelist_function( 'k_get_layout_style_1' );
function k_get_layout_style_1( $selection ) {
	if( $selection === '1' ) return true;
	return false;
}
VP_Security::instance()->whitelist_function( 'k_get_layout_style_2' );
function k_get_layout_style_2( $selection ) {
	if( $selection === '2' ) return true;
	return false;
}
VP_Security::instance()->whitelist_function( 'k_get_layout_style_3' );
function k_get_layout_style_3( $selection ) {
	if( $selection === '3' ) return true;
	return false;
}
VP_Security::instance()->whitelist_function( 'k_get_layout_style_4' );
function k_get_layout_style_4( $selection ) {
	if( $selection === '4' ) return true;
	return false;
}
VP_Security::instance()->whitelist_function( 'k_get_layout_style_5' );
function k_get_layout_style_5( $selection ) {
	if( $selection === '1_3-2_3' ) return true;
	return false;
}
VP_Security::instance()->whitelist_function( 'k_get_layout_style_6' );
function k_get_layout_style_6( $selection ) {
	if( $selection === '2_3-1_3' ) return true;
	return false;
}
VP_Security::instance()->whitelist_function( 'k_get_layout_style_7' );
function k_get_layout_style_7( $selection ) {
	if( $selection === '1_4-3_4' ) return true;
	return false;
}
VP_Security::instance()->whitelist_function( 'k_get_layout_style_8' );
function k_get_layout_style_8( $selection ) {
	if( $selection === '3_4-1_4' ) return true;
	return false;
}