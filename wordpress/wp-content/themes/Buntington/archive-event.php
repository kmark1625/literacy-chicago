<?php
/**
 * Archive: Event /// event CPT
 */
?>

<?php
// print site header
get_header();
?>

<?php
// query
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$ev_query = new WP_Query( array( 'post_type' => 'event', 'order' => 'ASC', 'orderby' => 'meta_value_num', 'meta_key' => '_order', 'paged' => $paged ) );
// sidebar
$sidebar_class = '';
$sidebar_pos = vp_option( 'vpt_option.sidebar_position' );
if( $sidebar_pos == 'left' ) $sidebar_class = ' col-lg-push-4 col-md-push-4';
?>

	<div class="row no-gutter"><!-- row -->

		<div class="col-lg-8 col-md-8<?php echo $sidebar_class; ?>"><!-- doc body wrapper -->
		
			<div class="col-padded"><!-- inner custom column -->
			
	        	<div class="row gutter"><!-- row -->
	            
	            	<div class="col-lg-12 col-md-12">
	        
	                	<h1 class="page-title"><?php _e( 'Upcoming Events', 'kazaz' ); ?></h1><!-- events category title -->
	                
	                </div>
	            
	            </div><!-- row end -->
				
			<?php if( $ev_query->have_posts() ) : ?>
				
				<div class="row gutter"><!-- row -->
				
					<div class="col-lg-12 col-md-12">
				
					<?php while( $ev_query->have_posts() ) : $ev_query->the_post(); ?>
						
                    	<div id="post-<?php the_ID(); ?>" <?php post_class( 'up-event-wrapper' ); ?>><!-- event summary -->
                        
                            <h1 class="title-median">
                            	<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute( array( 'before' => 'Permalink to: ', 'after' => '' ) ); ?>">
                            	<?php the_title(); ?>
                            	</a>
                            </h1>
                            
                            <div class="up-event-meta clearfix">
                            	<?php
                            	$event_start_date = vp_metabox( 'event.event_from' );
                            	$event_end_date = vp_metabox( 'event.event_to' );
                            	$event_start_time = vp_metabox( 'event.event_time_start' );
                            	$event_end_time = vp_metabox( 'event.event_time_end' );
                            	?>
                                <?php if( $event_start_date ) : ?><div class="up-event-date"><?php echo date_i18n( get_option( 'date_format'), strtotime( $event_start_date ) ); ?></div><?php endif; ?>
                                <?php if( $event_end_date ) : ?><div class="up-event-date"><?php echo date_i18n( get_option( 'date_format'), strtotime( $event_end_date ) ); ?></div><?php endif; ?>
                                <?php if( $event_start_time ) : ?><div class="up-event-time"><?php echo $event_start_time; ?><?php if( $event_end_time ) { echo ' - ' . $event_end_time; } ?></div><?php endif; ?>
                            </div>
                            
                            <?php echo '<p>' . wp_trim_excerpt() . '</p>'; ?>
                        
                        </div><!-- event summary end -->
						
					<?php endwhile; ?>
				
					</div>
				
				</div><!-- row end -->
				
			<?php k_pagination(); // pagination ?>
					
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
		get_template_part( 'sidebars/sidebar-events' );
		
		// print sidebar wrappers - close
		k_sidebar_foot();
		?>
		
	</div><!-- row end -->

<?php
// print site footer
get_footer();
?>