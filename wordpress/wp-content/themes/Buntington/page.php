<?php
/**
 * Theme's generic Page
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
			
				<div class="row gutter"><!-- row -->
	
					<div id="post-<?php the_ID(); ?>" <?php post_class( 'col-lg-12 col-md-12' ); ?>>
				
						<?php
						// main loop start
						while( have_posts() ) : the_post();
						?>
						
						<?php if( has_post_thumbnail() ) { ?>
						
					    <figure class="news-featured-image">
					    	<?php the_post_thumbnail(); ?>
					    </figure>
					    
						<?php } ?>
						
						<h1 class="page-title"><?php the_title(); ?></h1>
						
						<div class="news-body">
							<?php the_content(); ?>
						</div>
							
						<?php
						// paging
						k_paging();
						
						// main loop end
						endwhile;
						?>
						
						<?php 
						// enable page comments
						$page_comments_status = vp_option( 'vpt_option.use_page_comments' );
						if( $page_comments_status ) { 
						?>
						
						<div class="row row-splitter"></div>
						
						<?php comments_template(); // page comments ?>
						
						<?php } // end if page comments enabled ?>
				
					</div>
				
				</div><!-- row end -->
				
			</div><!-- inner custom column end -->
			
		</div><!-- doc body wrapper end -->
			
		<?php
		// print sidebar wrappers - open
		k_sidebar_head();
		
		// print sidebar content
		get_template_part( 'sidebars/sidebar-page' );
		
		// print sidebar wrappers - close
		k_sidebar_foot();
		?>
		
	</div><!-- row end -->

<?php
// print site footer
get_footer();
?>