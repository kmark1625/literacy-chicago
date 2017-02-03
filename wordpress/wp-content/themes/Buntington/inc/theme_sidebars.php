<?php 
/**
 * Registers Sidebars
 */
function k_sidebars_init() {
	
	/* Legal Sidebars */
	register_sidebar( array(
		'name' => __( 'Sidebar Index', 'kazaz' ),
		'id' => 'sidebar-widgets-index',
		'description' => __( 'Content: Home/Index Page', 'kazaz' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="title-widget">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Sidebar Single', 'kazaz' ),
		'id' => 'sidebar-widgets-single',
		'description' => __( 'Content: Single Post', 'kazaz' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="title-widget">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Sidebar Page', 'kazaz' ),
		'id' => 'sidebar-widgets-page',
		'description' => __( 'Content: Page', 'kazaz' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="title-widget">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Sidebar Category', 'kazaz' ),
		'id' => 'sidebar-widgets-category',
		'description' => __( 'Content: Category Page', 'kazaz' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="title-widget">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Sidebar Archive', 'kazaz' ),
		'id' => 'sidebar-widgets-archive',
		'description' => __( 'Content: Archive Page', 'kazaz' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="title-widget">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Sidebar Tag', 'kazaz' ),
		'id' => 'sidebar-widgets-tag',
		'description' => __( 'Content: Tags Page', 'kazaz' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="title-widget">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Sidebar Search', 'kazaz' ),
		'id' => 'sidebar-widgets-search',
		'description' => __( 'Content: Search Page', 'kazaz' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="title-widget">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Sidebar Contact', 'kazaz' ),
		'id' => 'sidebar-widgets-contact',
		'description' => __( 'Content: Contact Page', 'kazaz' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="title-widget">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Sidebar Events', 'kazaz' ),
		'id' => 'sidebar-widgets-events',
		'description' => __( 'Content: Events Category Page', 'kazaz' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="title-widget">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Sidebar Event Single', 'kazaz' ),
		'id' => 'sidebar-widgets-event-single',
		'description' => __( 'Content: Event Single Page', 'kazaz' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="title-widget">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Sidebar Courses', 'kazaz' ),
		'id' => 'sidebar-widgets-courses',
		'description' => __( 'Content: Courses Category Page', 'kazaz' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="title-widget">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Sidebar Course Single', 'kazaz' ),
		'id' => 'sidebar-widgets-course-single',
		'description' => __( 'Content: Course Single Page', 'kazaz' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="title-widget">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Sidebar Galleries', 'kazaz' ),
		'id' => 'sidebar-widgets-galleries',
		'description' => __( 'Content: Galleries Category Page', 'kazaz' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="title-widget">',
		'after_title' => '</h2>',
	) );

	/*
	register_sidebar( array(
		'name' => __( 'Sidebar Author', 'kazaz' ),
		'id' => 'sidebar-widgets-author',
		'description' => __( 'Content: Author archive', 'kazaz' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="title-widget">',
		'after_title' => '</h2>',
	) );
	*/
	
	/* Footer Widgets */
	register_sidebar( array(
		'name' => __( 'Footer Column Left', 'kazaz' ),
		'id' => 'sidebar-widgets-fcl',
		'description' => __( 'Content: Footer, column left', 'kazaz' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="title-widget">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Column Middle', 'kazaz' ),
		'id' => 'sidebar-widgets-fcm',
		'description' => __( 'Content: Footer, column middle', 'kazaz' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="title-widget">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Column Right', 'kazaz' ),
		'id' => 'sidebar-widgets-fcr',
		'description' => __( 'Content: Footer, column right', 'kazaz' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="title-widget">',
		'after_title' => '</h2>',
	) );
	
}
add_action( 'widgets_init', 'k_sidebars_init' );