<?php

/**
 * Theme functions and definitions.
 */
if( !isset( $content_width ) ) $content_width = 700;

/**
 * Vafpress framework ----------------------------------------------------------------------------------------------------------------------- >>>>>>>>>>>
 */
// load framework
require_once locate_template( '/vafpress/bootstrap.php' );

// custom classes location
VP_AutoLoader::add_directories( get_template_directory() . '/admin/classes', 'VP_' );
$vpfs = VP_FileSystem::instance();
$vpfs->add_directories( 'views' , get_template_directory() . '/admin/views' );

// load various data sources for metaboxes, theme options or shortcodes
require_once locate_template( '/admin/data_sources.php' );

// metabox
$tmpl_hompage  = get_template_directory() . '/admin/metabox/hom_page.php'; // cpt hom page - metaboxes
$tmpl_events   = get_template_directory() . '/admin/metabox/events.php'; // cpt event - metaboxes
$tmpl_courses  = get_template_directory() . '/admin/metabox/courses.php'; // cpt courses - metaboxes
$tmpl_sliders  = get_template_directory() . '/admin/metabox/sliders.php'; // cpt sliders - metaboxes
$tmpl_slid_sc  = get_template_directory() . '/admin/metabox/slider-sc-maker.php'; // cpt sliders - sidebar metabox
$tmpl_chunk_sc = get_template_directory() . '/admin/metabox/content_chunk-sc-maker.php'; // cpt chunk - sidebar metabox

// metabox init
$meta_box_hompage  = new VP_Metabox( $tmpl_hompage ); // cpt hom page - metaboxes init
$meta_box_events   = new VP_Metabox( $tmpl_events ); // cpt event - metaboxes init
$meta_box_courses  = new VP_Metabox( $tmpl_courses ); // cpt courses - metaboxes init
$meta_box_sliders  = new VP_Metabox( $tmpl_sliders ); // cpt sliders - metaboxes init
$meta_box_slid_sc  = new VP_Metabox( $tmpl_slid_sc ); // cpt sliders - sidebar metabox init
$meta_box_chunk_sc = new VP_Metabox( $tmpl_chunk_sc ); // cpt chunk - sidebar metabox init

// theme options template
$tmpl_opt  = get_template_directory() . '/admin/theme_options/buntington_options.php';

// theme options init
$theme_options = new VP_Option(array(
	'is_dev_mode'           => false,                                  // dev mode, default to false
	'option_key'            => 'vpt_option',                           // options key in db, required
	'page_slug'             => 'vpt_option',                           // options page slug, required
	'template'              => $tmpl_opt,                              // template file path or array, required
	'menu_page'             => 'themes.php',                           // parent menu slug or supply 'array' (can contains 'icon_url' & 'position') for top level menu
	'use_auto_group_naming' => true,                                   // default to true
	'use_exim_menu'         => true,                                   // default to true, shows export import menu
	'minimum_role'          => 'edit_theme_options',                   // default to 'edit_theme_options'
	'layout'                => 'fixed',                                // fluid or fixed, default to fixed
	'page_title'            => __( 'Buntington Options', 'kazaz' ),    // page title
	'menu_label'            => __( 'Buntington Options', 'kazaz' ),    // menu label
));

// regular shortocode template
$tmpl_sc_regular  = get_template_directory() . '/admin/shortcodes/shortcodes.php'; // regular shortcodes
$tmpl_sc_hom_page = get_template_directory() . '/admin/shortcodes/shortcodes_hom_page.php'; // hom page CPT shortcodes

// regular shortcodes init
$tmpl_sc_regular_init = array(
	'name'           => 'theme_shortcodes',                          	// unique name, required
	'template'       => $tmpl_sc_regular,                               // template file or array, required
	'modal_title'    => __( 'Theme Shortcodes', 'kazaz'),    			// modal title, default to empty string
	'button_title'   => __( 'Theme SC', 'kazaz'),            			// button title, default to empty string
	'types'          => array( 'post', 'page', 'event', 'course', 'chunk' ), // at what post types the generator should works, default to post and page
	'included_pages' => array(),         								// or to what other admin pages it should appears
	'main_image'     => get_template_directory_uri() . '/public/img/vp_shortcode_icon.png',			// main icon
	'sprite_image'   => get_template_directory_uri() . '/public/img/vp_shortcode_icon_sprite.png',  // text editor icon path
);
$theme_shortcodes_regular = new VP_ShortcodeGenerator( $tmpl_sc_regular_init );

// hom page CPT shortcodes init
$tmpl_sc_hom_page_init = array(
	'name'           => 'hom_shortcodes',                          		// unique name, required
	'template'       => $tmpl_sc_hom_page,                              // template file or array, required
	'modal_title'    => __( 'Home Page Shortcodes', 'kazaz'),    		// modal title, default to empty string
	'button_title'   => __( 'Home Page SC', 'kazaz'),            		// button title, default to empty string
	'types'          => array( 'hom_page' ),					// at what post types the generator should works, default to hom_page and page
	'included_pages' => array(),         								// or to what other admin pages it should appears
);
$theme_shortcodes_hom_page = new VP_ShortcodeGeneratorBase( $tmpl_sc_hom_page_init );

// custom dependencies
function k_imprint_dependencies( $dependencies ) {
	$dependencies[ 'scripts' ][ 'paths' ][ 'mycontrol' ] = array(
		'path' => get_template_directory_uri() . '/admin/dependencies/js/mycontrol.js',
		'deps' => array(),
		'ver' => '1.0',
	);
	$dependencies[ 'styles' ][ 'paths' ][ 'mycss' ] = array(
		'path' => get_template_directory_uri() . '/admin/dependencies/css/mystyles.css',
		'deps' => array(),
	);
	$dependencies[ 'rules' ][ 'textboxcustom' ] = array(
		'js' => array( 'reveal', 'mycontrol' ),
		'css' => array( 'select2', 'jqui', 'reveal', 'mycss', 'vp-shortcode' ),
	);
	return $dependencies;
}
add_filter( 'vp_dependencies_array', 'k_imprint_dependencies', NULL, 1 );


/* END Vafpress framework ---------------------------------------------------------------------------------------------------------------------------- */

/**
 * Sets up theme defaults and registers the various WordPress features
 */
function k_theme_setup() {
	// Translation
	load_theme_textdomain( 'kazaz', get_template_directory() . '/languages' );

	// TinyMCE styles
	add_editor_style( array( 'css/editor-style.css' ) );
	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Valid HTML5
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	// register navigation
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'kazaz' ), 
		'functional' => __( 'Functional Menu', 'kazaz' ),
	) );

	// custom image size
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1140, 500, true );

	// This theme uses its own gallery styles
	add_filter( 'use_default_gallery_style', '__return_false' );
	
	// remove default, it's gonna be available thru theme options!
	remove_theme_support( 'custom-header' );
	remove_theme_support( 'custom-background' );
}
add_action( 'after_setup_theme', 'k_theme_setup' );

/**
 * Enqueue required styles and scripts
 */
function k_styles_and_scripts() {
	/* Stylesheets */
	wp_enqueue_style( 'bootstrapcss', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', false, null );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css', false, null );
	wp_enqueue_style( 'dropdowncss', get_template_directory_uri() . '/js/dropdown-menu/dropdown-menu.css', false, null );
	wp_enqueue_style( 'swipeboxcss', get_template_directory_uri() . '/js/swipebox/css/swipebox.min.css', false, null );
	wp_enqueue_style( 'audioplayercss', get_template_directory_uri() . '/js/audioplayer/audioplayer.css', false, null );
	wp_enqueue_style( 'stylecss', get_stylesheet_directory_uri() . '/style.css', false, null );
	/* Dynamic stylesheet */
	wp_enqueue_style( 'dynamicstylesheet', home_url() . '/?dynamic_css=css', false, null );

	/* Load required js */	
	$gmaps_key = esc_attr( vp_option( 'vpt_option.gmap_key' ) );
	wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array('jquery'), NULL, true );
	wp_enqueue_script( 'dropdownjs', get_template_directory_uri() . '/js/dropdown-menu/dropdown-menu.js', array('jquery'), NULL, true );
	wp_enqueue_script( 'swipeboxjs', get_template_directory_uri() . '/js/swipebox/js/jquery.swipebox.min.js', array('jquery'), NULL, true );
	wp_enqueue_script( 'fitvidsjs', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'), NULL, true );
	wp_enqueue_script( 'audioplayerjs', get_template_directory_uri() . '/js/audioplayer/audioplayer.min.js', array('jquery'), NULL, true );
	wp_enqueue_script( 'easypiechartsjs', get_template_directory_uri() . '/js/jquery.easy-pie-chart.js', array('jquery'), NULL, true );
	if( '' != $gmaps_key ) wp_enqueue_script( 'gmapsjs', 'https://maps.googleapis.com/maps/api/js?key=' . $gmaps_key, array( 'jquery' ), NULL, true );
	else wp_enqueue_script( 'gmapsjs', 'https://maps.googleapis.com/maps/api/js?', array( 'jquery' ), NULL, true );
	wp_enqueue_script( 'themejs', get_template_directory_uri() . '/js/theme.js', array('jquery'), NULL, true );

	/* add support for threaded comments */
	if( is_singular() && comments_open() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' );
}
add_action( 'wp_enqueue_scripts', 'k_styles_and_scripts' );

/**
 * postMessage support for site title and description for the Customizer
 */
function k_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	$wp_customize->add_setting( 'display_site_title', array('default' => 1) );

	$wp_customize->add_control( 'display_site_title', array(
		'settings' => 'display_site_title',
		'label' => __( 'Display site title', 'kazaz' ),
		'section' => 'title_tagline',
		'type' => 'checkbox',
	) );
}
add_action( 'customize_register', 'k_customize_register' );

/**
 * Do Customizer preview reload upon changes
 */
function k_customize_preview_js() {
	wp_enqueue_script( 'k-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20140226', true );
}
add_action( 'customize_preview_init', 'k_customize_preview_js' );

/* --------------------------------------------------------------------------------------------------------------------------------------------- */

/**
 * Custom Post Types and Taxonomies
 */
require_once locate_template( '/inc/ct_and_cpt.php' );

/**
 * Gallery Uploader
 */
require_once locate_template( '/admin/metabox/galleries.php' );

/**
 * Comments looper
 */
require_once locate_template( '/inc/comments_loop.php' );

/**
 * Breadcrumbs
 */
require_once locate_template( '/inc/breadcrumbs.php' );

/**
 * Widget-ready sections
 */
require_once locate_template( '/inc/theme_sidebars.php' );

/**
 * Theme Widgets
 */
require_once locate_template( '/inc/theme_widgets.php' );

/**
 * Shortcodes engine
 */
require_once locate_template( '/inc/shortcodes_engine.php' );

/**
 * TinyMCE styles and formattings
 */
require_once locate_template( '/inc/tinyMCE_stuff.php' );


/**
 * Theme custom functions
 */
require_once locate_template( '/inc/custom_functions.php' );