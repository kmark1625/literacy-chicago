<?php
/**
 * Custom Post Type: Event /// single event
 */
?>

<?php
// print site header
get_header();
?>

<?php
// sidebar
$sidebar_class = '';
$sidebar_pos = vp_option( 'vpt_option.sidebar_position' );
if( $sidebar_pos == 'left' ) $sidebar_class = ' col-lg-push-4 col-md-push-4';
?>

	<div class="row no-gutter"><!-- row -->

		<div class="col-lg-8 col-md-8<?php echo $sidebar_class; ?>"><!-- doc body wrapper -->
		
			<div class="col-padded"><!-- inner custom column -->
				
			<?php if( have_posts() ) : ?>
				
				<div class="row gutter"><!-- row -->
				
					<div class="col-lg-12 col-md-12">
				
					<?php while( have_posts() ) : the_post(); ?>

                        <div id="post-<?php the_ID(); ?>" <?php post_class( 'events-title-meta clearfix' ); ?>>
                        
                            <h1 class="page-title"><?php the_title(); ?></h1>
                            
                            <div class="event-meta">
                            	<?php
                            	$event_start_date = vp_metabox( 'event.event_from' );
                            	$event_end_date = vp_metabox( 'event.event_to' );
                            	$event_start_time = vp_metabox( 'event.event_time_start' );
                            	$event_end_time = vp_metabox( 'event.event_time_end' );
                            	?>                                
                                <?php if( $event_start_date ) : ?>
                                	<span class="event-from">
                                	<?php echo date_i18n( get_option( 'date_format'), strtotime( $event_start_date ) ); ?>
                                	</span>
                                <?php endif; ?>
                                <?php if( $event_end_date ) : ?>
                                	<span class="event-divider"><?php _e( 'to', 'kazaz' ); ?></span>
                                	<span class="event-to">
                                	<?php echo date_i18n( get_option( 'date_format'), strtotime( $event_end_date ) ); ?>
                                	</span>
                                <?php endif; ?>
                                <?php if( $event_start_time ) : ?>
                                	<span class="event-time">
                                	<?php echo $event_start_time; ?><?php if( $event_end_time ) { echo ' - ' . $event_end_time; } ?>
                                	</span>
                                <?php endif; ?>
                            </div>
                            
                            <?php echo k_get_google_uri(); // google calendar add ?>
                            
                        </div>
                        
                        <div class="news-body clearfix">
                        
                        	<?php the_content(); ?>
                        
                        </div>

					<?php endwhile; ?>
				
					</div>
					
					<?php k_share_with_add_this(); // addThis sharing ?>
				
				</div><!-- row end -->
				
				<?php k_paging(); //post paging ?>
				
				<?php else : ?>
				
				<div class="row gutter"><!-- row -->
				
				<?php get_template_part( 'content', 'none' ); ?>
				
				</div><!-- row end -->
				
				<?php endif; ?>
				
			</div><!-- inner custom column end -->
			
		</div><!-- doc body wrapper end -->
			
		<?php
		// print sidebar wrappers - open
		k_sidebar_head();
		
		// print sidebar content
		get_template_part( 'sidebars/sidebar-single-event' );
		
		// print sidebar wrappers - close
		k_sidebar_foot();
		?>
		
	</div><!-- row end -->

<?php
// print site footer
get_footer();
?>