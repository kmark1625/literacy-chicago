<?php
/**
 * Archive: Gallery /// gallery CPT
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
// query
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$gal_query = new WP_Query( array( 'post_type' => 'gallery', 'paged' => $paged ) );
?>

	<div class="row no-gutter"><!-- row -->

		<div class="col-lg-8 col-md-8<?php echo $sidebar_class; ?>"><!-- doc body wrapper -->
		
			<div class="col-padded"><!-- inner custom column -->
			
	        	<div class="row gutter"><!-- row -->
	            
	            	<div class="col-lg-12 col-md-12">
	        
	                	<h1 class="page-title"><?php _e( 'School Galleries', 'kazaz' ); ?></h1><!-- course category title -->
	                
	                </div>
	            
	            </div><!-- row end -->
				
			<?php if( $gal_query->have_posts() ) : ?>
				
				<div class="row gutter"><!-- row -->
				
					<div class="col-lg-12 col-md-12">
				
							<?php while( $gal_query->have_posts() ) : $gal_query->the_post(); ?>
							
								<?php
								$photos_num = 0;
								$this_post_images =& get_children( array(
									'post_parent' => get_the_ID(),
									'post_type' => 'attachment',
									'post_mime_type' => 'image'
								) );
								
								if( !empty( $this_post_images ) ) {
									// how many photos?
									$photos_num = count( $this_post_images );
									if( $photos_num < 10 ) $photos_num = '0' . $photos_num;
								}
								?>
		                    	
                                <div id="post-<?php the_ID(); ?>" <?php post_class( 'gallery-wrapper' ); ?>><!-- gallery single wrap -->
                                
                            		<figure class="gallery-last-photo clearfix">
                            			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array( 'before' => 'Permalink to: ', 'after' => '' ) ); ?>">
                            			<?php the_post_thumbnail(); ?>
                            			</a>
                            		</figure>
                            		
                            		<div class="gallery-info">
                            			<span class="gallery-photos-num"><?php echo $photos_num; ?></span>
                            			<span class="gallery-photos-tag"><?php echo _x( 'Photos', 'galleries category page, NN photos', 'kazaz' ); ?></span>
                            		</div>
                                    
                                    <div class="gallery-meta">
                                    	<h1 class="gallery-title">
	                                    	<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute( array( 'before' => 'Permalink to: ', 'after' => '' ) ); ?>">
	                                    	<?php the_title(); ?>
	                                    	</a>
                                    	</h1>
                                        <p class="gallery-description">
                                    	<?php echo wp_trim_excerpt(); ?>
                                    	</p>
                                    </div>
                                
                                </div><!-- gallery single wrap end -->
							
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
		get_template_part( 'sidebars/sidebar-galleries' );
		
		// print sidebar wrappers - close
		k_sidebar_foot();
		?>
		
	</div><!-- row end -->

<?php
// print site footer
get_footer();
?>