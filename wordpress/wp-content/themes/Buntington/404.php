<?php
/**
 * Theme's generic 404 error page
 */
?>

<?php
// print site header
get_header();
?>

    <div class="row"><!-- row -->
        
        <div class="col-lg-12"><!-- doc body wrapper -->
        	
            <div class="col-padded"><!-- inner custom column -->
                
                <h1 class="page-title text-center"><?php _e( '404 Error', 'kazaz' ); ?></h1>
                
                <div class="news-body">
                    
                    <div class="row"><!-- row -->
                    
                        <?php if( vp_option( 'vpt_option.404_image' ) ) : ?>
                        <div class="col-lg-12">
                        	<figure class="thumb-404">
			                    <img src="<?php echo vp_option( 'vpt_option.404_image' ); ?>" alt="<?php _e( 'NOTHING FOUND!', 'kazaz' ); ?>" class="aligncenter img-responsive" />
                            </figure>
                        </div>
                        <?php endif; ?>
                        
                        <div class="col-lg-12">
                        	<h6 class="text-center"><?php _e( 'Ooops!', 'kazaz' ); ?></h6>
                        	<p class="text-center">
                        	<?php _e( 'What an embarrassing situation, requested page can not be found or it doesn\'t exist.', 'kazaz' ); ?>
                        	</p>
                        	<div class="gap40"></div>
                        </div>
                    
                    </div><!-- row end -->
                    
                </div>
            
            </div><!-- inner custom column end -->
            
        </div><!-- doc body wrapper end -->
    
    </div><!-- row end -->

<?php
// print site footer
get_footer();
?>