<?php
/**
* Add some styles to tinyMCE drop-down --------------------------------------------------------------------------- >>>>>
*/
function k_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
add_filter( 'mce_buttons_2', 'k_mce_buttons_2' );

function k_mce_before_init( $settings ) {
    $style_formats = array(
		// image start
    	array(
    		'title' => __( 'Rounded corners Image', 'kazaz' ),
    		'selector' => 'img',
    		'classes' => 'img-rounded'
    	),
    	array(
    		'title' => __( 'Circled Image', 'kazaz' ),
    		'selector' => 'img',
    		'classes' => 'img-circle'
    	),
    	array(
    		'title' => __( 'Thumbnail Image', 'kazaz' ),
    		'selector' => 'img',
    		'classes' => 'img-thumbnail'
    	),
		//image end
		// titles start
    	array(
    		'title' => __( 'Title Median', 'kazaz' ),
    		'selector' => 'h1,h2,h3,h4,h5,h6',
    		'classes' => 'title-median'
    	),
    	array(
    		'title' => __( 'Title Titan', 'kazaz' ),
    		'selector' => 'h1,h2,h3,h4,h5,h6',
    		'classes' => 'title-titan'
    	),
    	array(
    		'title' => __( 'Title Giant', 'kazaz' ),
    		'selector' => 'h1,h2,h3,h4,h5,h6',
    		'classes' => 'title-giant'
    	),
		// titles end
		// lists start
    	array(
    		'title' => __( 'List unstyled (OL or UL)', 'kazaz' ),
    		'selector' => 'ol,ul',
    		'classes' => 'list-unstyled'
    	),
    	array(
    		'title' => __( 'List inline (OL or UL)', 'kazaz' ),
    		'selector' => 'ol,ul',
    		'classes' => 'list-inline'
    	),
    	array(
    		'title' => __( 'List pills (OL or UL)', 'kazaz' ),
    		'selector' => 'ol,ul',
    		'classes' => 'clearfix nav nav-pills'
    	),
    	array(
    		'title' => __( 'List stacked pills (OL or UL)', 'kazaz' ),
    		'selector' => 'ol,ul',
    		'classes' => 'clearfix nav nav-pills nav-stacked'
    	),
    	array(
    		'title' => __( 'Active item - pill (LI)', 'kazaz' ),
    		'selector' => 'li',
    		'classes' => 'active'
    	),
		// lists end
		// callout section start
        array(
        	'title' => __( 'Callout Section', 'kazaz' ),
        	'block' => 'div',
        	'classes' => 'call-out',
        	'wrapper' => true
        ),
		// callout section end
		// text alignment start
    	array(
    		'title' => __( 'Text align: Center', 'kazaz' ),
    		'selector' => 'h1,h2,h3,h4,h5,h6,div,section,p,button,input',
    		'classes' => 'text-center'
    	),
    	array(
    		'title' => __( 'Text align: Right', 'kazaz' ),
    		'selector' => 'h1,h2,h3,h4,h5,h6,div,section,p,button,input',
    		'classes' => 'text-right'
    	),
		// text alignment end
		// remove margins start
    	array(
    		'title' => __( 'Remove element margin top', 'kazaz' ),
    		'selector' => 'h1,h2,h3,h4,h5,h6,div,section,p,button,input',
    		'classes' => 'remove-margin-top'
    	),
    	array(
    		'title' => __( 'Remove element margin bottom', 'kazaz' ),
    		'selector' => 'h1,h2,h3,h4,h5,h6,div,section,p,button,input',
    		'classes' => 'remove-margin-bottom'
    	),
    	array(
    		'title' => __( 'Remove top and bottom margin', 'kazaz' ),
    		'selector' => 'h1,h2,h3,h4,h5,h6,div,section,p,button,input',
    		'classes' => 'clear-margins'
    	),
		// remove margins end
		// small text start
    	array(
    		'title' => __( 'Small text', 'kazaz' ),
    		'block' => 'small',
    		'classes' => '',
			'wrapper' => true
    	),
		// small text end
		// tables start
    	array(
    		'title' => __( 'Table style: basic', 'kazaz' ),
    		'selector' => 'table',
    		'classes' => 'table'
    	),
    	array(
    		'title' => __( 'Table style: stripped', 'kazaz' ),
    		'selector' => 'table',
    		'classes' => 'table table-striped'
    	),
    	array(
    		'title' => __( 'Table style: bordered', 'kazaz' ),
    		'selector' => 'table',
    		'classes' => 'table table-bordered'
    	),
    	array(
    		'title' => __( 'Table style: hover', 'kazaz' ),
    		'selector' => 'table',
    		'classes' => 'table table-hover'
    	),
    	array(
    		'title' => __( 'Table style: condensed', 'kazaz' ),
    		'selector' => 'table',
    		'classes' => 'table table-condensed'
    	),
		// tables end
    );

    $settings[ 'style_formats' ] = json_encode( $style_formats );
    return $settings;
}
add_filter( 'tiny_mce_before_init', 'k_mce_before_init' );

function k_tinymce_styles() {
    add_editor_style( 'css/custom-editor-style.css' );
}
add_action( 'init', 'k_tinymce_styles' );