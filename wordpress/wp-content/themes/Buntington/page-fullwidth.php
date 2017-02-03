<?php
/**
 * Template Name: Full width page
 */
?>
        
<?php
// print site header
get_header();
?>

    <div class="row no-gutter fullwidth"><!-- row -->
        
        <div class="col-lg-12 col-md-12"><!-- doc body wrapper -->
        	
            <div id="post-<?php the_ID(); ?>" <?php post_class( 'col-padded' ); ?>><!-- inner custom column -->
				
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
				
				// allow page comments?
				// komments...
				
				// main loop end
				endwhile;
				?>
				
			</div><!-- inner custom column end -->
			
		</div><!-- doc body wrapper end -->
		
	</div><!-- row end -->

<?php
// print site footer
get_footer();
?>