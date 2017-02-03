<?php header( "Content-type: text/css; charset: UTF-8" ); ?>

<?php
// typography; content and titles
$font_face_content = vp_option( 'vpt_option.font_family_content' ); // content
$font_face_title = vp_option( 'vpt_option.font_family_title' ); // titles
?>

<?php if( !empty( $font_face_content ) ) { ?>
body { font-family: '<?php echo $font_face_content; ?>', 'Myriad Pro', 'Helvetica',  sans-serif; }
<?php } ?>

<?php if( !empty( $font_face_title ) ) { ?>
h1, h2, h3, h4, h5, h6 { font-family: '<?php echo $font_face_title; ?>', 'Myriad Pro', 'Helvetica',  sans-serif; }
<?php 
} else { 
	if( !empty( $font_face_content ) ) {
?>
h1, h2, h3, h4, h5, h6 { font-family: '<?php echo $font_face_content; ?>', 'Myriad Pro', 'Helvetica',  sans-serif; }
<?php 
	}
}
// end typography
?>

<?php
// links
$link_regular = vp_option( 'vpt_option.links_color' ); // hout
$link_hover   = vp_option( 'vpt_option.links_hover_color' ); // hover
?>
a:link, a:visited { color: <?php echo $link_regular; ?>; }
a:hover, a:focus { color: <?php echo $link_hover; ?>; }
.title-widget:before { background-color: <?php echo $link_regular; ?>; }

h1 a:hover, h1 a:focus, h2 a:hover, h2 a:focus, h3 a:hover, h3 a:focus, h4 a:hover, h4 a:focus, h5 a:hover, h5 a:focus, h6 a:hover, h6 a:focus, 
.title-median a:hover, .title-median a:focus, .title-titan a:hover, .title-titan a:focus, .page-title a:hover, .page-title a:focus, 
.next-gallery-link:hover .next-gallery-title, .next-gallery-link:focus .next-gallery-title, 
.k-twitter-twitts-follow:hover, .k-twitter-twitts-follow:focus, 
.pagination > li > a:hover, .pagination > li > span:hover, .pagination > li > a:focus, .pagination > li > span:focus, 
.s-close, 
.tagcloud a:hover, .tagcloud a:focus, 
.widget_archive ul li a:hover, .widget_categories ul li a:hover, .widget_pages ul li a:hover, .widget_meta ul li a:hover, .widget_nav_menu ul li a:hover, 
.widget_archive ul li a:focus, .widget_categories ul li a:focus, .widget_pages ul li a:focus, .widget_meta ul li a:focus, .widget_nav_menu ul li a:focus, 
.table-courses a:hover, .table-courses a:focus { color: <?php echo $link_regular; ?>; }

.pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, 
.pagination > .active > a:focus, .pagination > .active > span:focus { background-color: <?php echo $link_regular; ?>; }

<?php
// main navigation
$link_nav_mob = vp_option( 'vpt_option.navig_color' ); // hout
$link_nav_mob_hover = vp_option( 'vpt_option.navig_hover_color' ); // hover
$drops_bg = vp_option( 'vpt_option.navig_dropdown_bg' ); // drop-down bg color
$drops_nav = vp_option( 'vpt_option.navig_dropdown_color' ); // drop-down link color
$drops_bg_hover = vp_option( 'vpt_option.navig_dropdown_bg_hover_color' ); // drop-down bg hover color
$drops_nav_hover = vp_option( 'vpt_option.navig_dropdown_hover_color' ); // drop-down link hover color
$submenu_indicator = vp_option( 'vpt_option.navig_submenu_tit_color' ); // submenu indicator color
?>
#drop-down-left a:link, #drop-down-left a:visited { color: <?php echo $link_nav_mob; ?>; }
#drop-down-left a:hover, #drop-down-left li.dropdown-menu-hover > a, #drop-down-left li.current-menu-item > a, .sub-menu li.current-menu-item a { color: <?php echo $link_nav_mob_hover; ?> !important; }
#drop-down-left ul a:link, #drop-down-left ul a:visited { color: <?php echo $drops_nav; ?>; background-color: <?php echo $drops_bg; ?>; }
#drop-down-left ul a:hover, #drop-down-left ul li.dropdown-menu-hover > a { color: <?php echo $drops_nav_hover; ?>; background-color: <?php echo $drops_bg_hover; ?>; }
#drop-down-left ul .dropdown-menu-sub-indicator:after { border-left: 6px solid <?php echo $submenu_indicator; ?>; }
#navigation-mobile li a:link, #navigation-mobile li a:visited { color: <?php echo $link_nav_mob; ?>; }
#navigation-mobile li a:hover, #navigation-mobile li a:focus { color: <?php echo $link_nav_mob_hover; ?>; }

<?php
// functional navigation
$f_nav = vp_option( 'vpt_option.navig_color' ); // hout
$f_nav_hover = vp_option( 'vpt_option.navig_hover_color' ); // hover
?>
.k-functional-navig a:link, .k-functional-navig a:visited { color: <?php echo $f_nav; ?>; }
.k-functional-navig a:hover { color: <?php echo $f_nav_hover; ?>; }

<?php
// footer
$footer_bg_color = vp_option( 'vpt_option.footer_bg_color' );
$footer_text_color = vp_option( 'vpt_option.footer_text_color' );
$footer_link_color = vp_option( 'vpt_option.footer_link_color' );
$footer_link_hover_color = vp_option( 'vpt_option.footer_link_hover_color' );
// footer bg image
$use_background_image = vp_option( 'vpt_option.use_background_image' );
$image_bg_url = vp_option( 'vpt_option.image_bg_url' );
$image_bg_repeat = vp_option( 'vpt_option.image_bg_repeat' );
$image_bg_attachment = vp_option( 'vpt_option.image_bg_attachment' );
$image_bg_position = vp_option( 'vpt_option.image_bg_position' );
$image_bg_size = vp_option( 'vpt_option.image_bg_size' );

if( $use_background_image ) {
?>
#k-footer { 
	color: <?php echo $footer_text_color; ?>;
    background-color: <?php echo $footer_bg_color; ?>;
    background-image: url(<?php echo $image_bg_url; ?>);
    background-repeat: <?php echo $image_bg_repeat; ?>;
    background-attachment: <?php echo $image_bg_attachment; ?>;
    background-position: <?php echo $image_bg_position; ?>;
    background-size: <?php echo $image_bg_size; ?>;
}
<?php } else { ?>
#k-footer { background-color: <?php echo $footer_bg_color; ?>; color: <?php echo $footer_text_color; ?>; }
<?php } ?>
#k-footer a:link, #k-footer a:visited { color: <?php echo $footer_link_color; ?>; }
#k-footer a:hover, #k-footer a:focus { color: <?php echo $footer_link_hover_color; ?>; }

#k-footer h1, #k-footer h2, #k-footer h3, #k-footer h4, #k-footer h5, #k-footer h6, 
#k-footer .title-median, #k-footer .title-titan, #k-footer .title-giant { color: <?php echo $footer_text_color; ?>; }
#k-footer .title-widget:before { background-color: <?php echo $footer_link_color; ?>; }

#k-footer h1 a:link, #k-footer h1 a:visited, #k-footer h2 a:link, #k-footer h2 a:visited, #k-footer h3 a:link, #k-footer h3 a:visited, 
#k-footer h4 a:link, #k-footer h4 a:visited, #k-footer h5 a:link, #k-footer h5 a:visited, #k-footer h6 a:link, #k-footer h6 a:visited, 
#k-footer .title-median a:link, #k-footer .title-median a:visited, #k-footer .title-titan a:link, #k-footer .title-titan a:visited, 
#k-footer .page-title a:link, #k-footer .page-title a:visited, 
#k-footer .social-icons ul li a:link, #k-footer .social-icons ul li a:visited { color: <?php echo $footer_text_color; ?>; }

#k-footer h1 a:hover, #k-footer h1 a:focus, #k-footer h2 a:hover, #k-footer h2 a:focus, #k-footer h3 a:hover, #k-footer h3 a:focus, 
#k-footer h4 a:hover, #k-footer h4 a:focus, #k-footer h5 a:hover, #k-footer h5 a:focus, #k-footer h6 a:hover, #k-footer h6 a:focus, 
#k-footer .title-median a:hover, #k-footer .title-median a:focus, #k-footer .title-titan a:hover, #k-footer .title-titan a:focus, 
#k-footer .page-title a:hover, #k-footer .page-title a:focus, 
#k-footer .social-icons ul li a:hover, #k-footer .social-icons ul li a:focus { color: <?php echo $footer_link_color; ?>; }

#k-footer .widget_archive ul li a:link, #k-footer .widget_categories ul li a:link, #k-footer .widget_pages ul li a:link, #k-footer .widget_meta ul li a:link, 
#k-footer .widget_nav_menu ul li a:link, #k-footer .widget_archive ul li a:visited, #k-footer .widget_categories ul li a:visited, #k-footer .widget_pages ul li a:visited, 
#k-footer .widget_meta ul li a:visited, #k-footer .widget_nav_menu ul li a:visited { color: <?php echo $footer_link_hover_color; ?>; }
#k-footer .widget_archive ul li a:hover, #k-footer .widget_categories ul li a:hover, #k-footer .widget_pages ul li a:hover, #k-footer .widget_meta ul li a:hover, 
#k-footer .widget_nav_menu ul li a:hover, #k-footer .widget_archive ul li a:focus, #k-footer .widget_categories ul li a:focus, #k-footer .widget_pages ul li a:focus, 
#k-footer .widget_meta ul li a:focus, #k-footer .widget_nav_menu ul li a:focus { color: <?php echo $footer_link_color; ?>; }

#k-footer .help-block { color: <?php echo $footer_text_color; ?>; }

<?php 
$scheme_light = vp_option( 'vpt_option.scheme_light' );
if( $scheme_light ) { ?>
#k-footer .separator-dbl-strike, #k-footer .separator-dashed, #k-footer .separator-dotted { border-bottom-color: rgba( 255, 255, 255, 0.15 ); }
#k-footer .separator-fatty { background-color: rgba( 255, 255, 255, 0.15 );  }

#k-footer .widget_archive ul li:before, #k-footer .widget_categories ul li:before, #k-footer .widget_pages ul li:before, 
#k-footer .widget_meta ul li:before, #k-footer .widget_nav_menu ul li:before { background-color: rgba(255, 255, 255, 0.3); }

#k-footer .widget_archive ul li:not(:last-child), #k-footer .widget_categories ul li:not(:last-child), #k-footer .widget_pages ul li:not(:last-child), 
#k-footer .widget_meta ul li:not(:last-child), #k-footer .widget_nav_menu ul li:not(:last-child) { border-bottom: 1px solid rgba(255, 255, 255, 0.15); }

#k-footer .social-icons ul li:not(:last-child) { border-right: 1px solid rgba(255, 255, 255, 0.15); }
#k-footer .social-icons { border-top: 1px solid rgba(255, 255, 255, 0.15); }

#k-footer .twitter-twitt { background-color: rgba(255, 255, 255, 0.15); }
#k-footer .twitter-twitt:after { border-top-color: rgba(255, 255, 255, 0.15); }

#k-footer .up-event-meta div:not(:last-child), #k-footer .gallery-info { border-right: 1px solid rgba(255, 255, 255, 0.15); }
#k-footer .up-event-date, #k-footer .up-event-time { border-bottom: 1px solid rgba(255, 255, 255, 0.15); border-top: 1px solid rgba(255, 255, 255, 0.15); }

#k-footer .tagcloud a { background-color: rgba(255, 255, 255, 0.15); }

#k-footer .title-widget { opacity: 0.8; }
<?php } ?>


