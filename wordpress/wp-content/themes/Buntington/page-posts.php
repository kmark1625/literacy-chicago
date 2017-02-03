<?php
/**
 * Template Name: Posts Page
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

				<?php
				// main loop start
				while( have_posts() ) : the_post();
				?>
			
				<div class="row gutter"><!-- row -->
	
					<div id="post-<?php the_ID(); ?>" <?php post_class( 'col-lg-12 col-md-12' ); ?>>
						
						<?php if( has_post_thumbnail() ) { ?>
						
					    <figure class="news-featured-image">
					    	<?php the_post_thumbnail(); ?>
					    </figure>
					    
						<?php } ?>
						
						<h1 class="page-title"><?php the_title(); ?></h1>
						
						<div class="news-body">
							<?php the_content(); ?>
						</div>
				
					</div>
				
				</div><!-- row end -->
				
				<?php 
				// options:
				$posts_page_layout = vp_option( 'vpt_option.posts_page_layout' );
				$posts_page_num_of_posts = vp_option( 'vpt_option.posts_page_num_of_posts' );
				if( intval( $posts_page_num_of_posts ) < -1 ) $posts_page_num_of_posts = -1;
				elseif( ! intval( $posts_page_num_of_posts ) ) $posts_page_num_of_posts = 6;
				
				// posts loop
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	            $args = array(
	                'post_type' => 'post',
	                'post_status' => array( 'publish' ),
	                'posts_per_page' => $posts_page_num_of_posts,
	                'paged' => $paged
	            );
	            
	            $TEMP_query = $wp_query;
	            $wp_query = NULL;
	            $wp_query = new WP_Query( $args ); 
            
				if( have_posts() ) : 
				?>
					
				<div class="row gutter k-equal-height"><!-- row -->
				
				<?php
				// main loop start
				while( have_posts() ) : the_post();
				?>

					<?php if( $posts_page_layout == 'grid' ) { ?>

					<div id="post-<?php the_ID(); ?>" <?php post_class( 'news-mini-wrap col-lg-6 col-md-6' ); ?>><!-- news wrap -->
					
						<?php if( has_post_thumbnail() && !post_password_required() && !is_attachment() ) : ?>
						
					    <figure class="news-featured-image">
						    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array( 'before' => 'Permalink to: ', 'after' => '' ) ); ?>"><?php the_post_thumbnail(); ?></a>
					    </figure>
					    
						<?php endif; ?>
					
						<h1 class="page-title">
							<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute( array( 'before' => 'Permalink to: ', 'after' => '' ) ); ?>"><?php the_title(); ?></a>
						</h1>
						
						<?php k_post_meta(); // print date, author and comments number ?>
						
						<div class="news-summary">
					
				    	<?php
				    	// print excerpt - if any, otherwise trim it up automatically
				    	if( has_excerpt() ) echo '<p>' . get_the_excerpt() . '</p>';
						else echo '<p>' . wp_trim_excerpt() . '</p>';
						?>
					
						</div>
					
					</div><!-- news wrap end-->
					
					<?php } else { ?>
					
					<div id="post-<?php the_ID(); ?>" <?php post_class( 'news-stacked col-lg-12 col-md-12' ); ?>><!-- news wrap -->
					
						<?php if( has_post_thumbnail() && !post_password_required() && !is_attachment() ) : ?>
						
					    <figure class="news-featured-image">
						    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array( 'before' => 'Permalink to: ', 'after' => '' ) ); ?>"><?php the_post_thumbnail(); ?></a>
					    </figure>
					    
						<?php endif; ?>
					
						<h1 class="page-title">
							<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute( array( 'before' => 'Permalink to: ', 'after' => '' ) ); ?>"><?php the_title(); ?></a>
						</h1>
						
						<?php k_post_meta(); // print date, author and comments number ?>
						
						<div class="news-summary">
					
				    	<?php
				    	// print excerpt - if any, otherwise trim it up automatically
				    	if( has_excerpt() ) echo '<p>' . get_the_excerpt() . '</p>';
						else echo '<p>' . wp_trim_excerpt() . '</p>';
						?>
					
						</div>
					
					</div>
					
					<?php } // end layout ?>

				<?php endwhile; ?>
				
				</div><!-- row end -->
						
				<?php else : ?>
				
					<div class="row gutter"><!-- row -->
				
					<?php get_template_part( 'content', 'none' ); ?>
				
					</div><!-- row end -->

				<?php endif; ?>
				
				<?php 
				k_pagination(); // pagination 
				$wp_query = NULL;
				$wp_query = $TEMP_query;
				$TEMP_query = NULL;
				
				endwhile; // main loop end
				?>
				
			</div><!-- inner custom column end -->
			
		</div><!-- doc body wrapper end -->
			
		<?php
		// print sidebar wrappers - open
		k_sidebar_head();
		
		// print sidebar content
		get_template_part( 'sidebars/sidebar-category' );
		
		// print sidebar wrappers - close
		k_sidebar_foot();
		?>
		
	</div><!-- row end -->

<?php
// print site footer
get_footer();
?>