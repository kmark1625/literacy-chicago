<?php
/**
 * Theme Header
 */
?>
<!DOCTYPE html>
<!--[if gt IE 8]><html class="no-js ie9-plus" <?php language_attributes(); ?>><![endif]-->
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="shortcut icon" href="<?php echo vp_option( 'vpt_option.site_logo_favicon' ); ?>">
    <?php wp_head(); ?>	
</head>

<body <?php body_class(); ?>>

    <!-- device test, don't remove. javascript needed! -->
    <span class="visible-xs"></span><span class="visible-sm"></span><span class="visible-md"></span><span class="visible-lg"></span>
    <!-- device test end -->
    
    <div id="k-functional-wrap">
		<?php 
		// theme's functional navigation
		if( has_nav_menu( 'functional' ) ) : k_navig_functional(); endif;
        ?>
    </div>
    
    <div id="k-head" class="container"><!-- container + head wrapper -->
    
    	<div class="row"><!-- row -->
        
        	<div class="col-lg-12"><!-- column -->
        	
        		<?php $site_logo = vp_option( 'vpt_option.site_logo_upload' ); ?>
        
        		<div id="k-site-logo"<?php if( $site_logo ) { echo ' class="pull-left"'; } ?>><!-- site logo -->
        		
                    <?php if( $site_logo ) : ?>
                
                    <h1 class="k-logo">
                    	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                        	<img src="<?php echo $site_logo; ?>" alt="<?php _e( 'Site Logo', 'kazaz' ); ?>" />
                        </a>
                    </h1>
                    
                    <?php else : ?>
                    
                    <h1 class="site-title">
                    	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                    		<?php bloginfo( 'name' ); ?>
                    	</a>
                        <small class="site-title-tagline hide-sm hide-xs"><?php bloginfo( 'description' ); ?></small>
                    </h1>
                    
                    <?php endif; ?>
                    
                    <a id="mobile-nav-switch" href="#drop-down-left"><span class="alter-menu-icon"></span></a><!-- alternative menu button -->
            
            	</div><!-- site logo end -->
            	
				<?php 
				// theme's main navigation
				if( has_nav_menu( 'primary' ) ) : k_navig_head(); endif;
            	?>
            
            </div><!-- column end -->
            
        </div><!-- row end -->
    
    </div><!-- container + head wrapper end -->
    
    <div id="k-body"><!-- content wrapper -->
    
    	<div class="container"><!-- container -->
        
        	<div class="row"><!-- row -->
            
                <div id="k-top-search" class="col-lg-12 clearfix"><!-- top search -->
                
                    <form action="<?php echo esc_url( home_url( '/' ) ); ?>" id="top-searchform" method="get" role="search">
                        <div class="input-group">
                            <input type="text" name="s" id="site-search" class="form-control" autocomplete="off" placeholder="<?php _e( 'Type in keyword(s) then hit Enter on keyboard', 'kazaz' ); ?>" />
                        </div>
                    </form>
                    
                    <div id="bt-toggle-search" class="search-icon text-center"><i class="s-open fa fa-search"></i><i class="s-close fa fa-times"></i></div><!-- toggle search button -->
                
                </div><!-- top search end -->
            
            	<div class="k-breadcrumbs col-lg-12 clearfix"><!-- breadcrumbs -->
                
                	<?php 
					// k_breadcrumbs(); // old breadcrumbs
					$bread_args = array( 'container' => 'div', 'separator' => ' &nbsp;|&nbsp; ', 'before' => '', 'after' => '', 'show_on_front' => false, 'network' => false, 'show_title' => true, 'show_browse' => false, 'echo' => true );
					if( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail( $bread_args );
					?>
                    
                </div><!-- breadcrumbs end -->
                
            </div><!-- row end -->