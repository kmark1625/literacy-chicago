<?php
/**
 * Default Content Template
 */ 
?>

<?php if( is_single() ) : ?>
	
	<div id="post-<?php the_ID(); ?>" <?php post_class( 'col-lg-12 col-md-12' ); ?>>
	
		<?php if( has_post_thumbnail() && !post_password_required() && !is_attachment() ) : ?>
		
	    <figure class="news-featured-image">
	    	<?php the_post_thumbnail(); ?>
	    </figure>
	    
		<?php endif; ?>
		
		<div class="news-title-meta"><!-- title and meta wrapper -->
		
			<h1 class="page-title"><?php the_title(); ?></h1>
			
			<?php k_post_meta(); // print date, author and comments number ?>
			
			<div class="news-body">
				<?php if( has_excerpt() ) : ?><div class="call-out"><?php the_excerpt(); ?></div><?php endif; ?>
				<?php the_content(); // full content ?>
			</div>
			
			<?php k_post_tags(); // print post tags if any ?>
		
		</div><!-- title and meta wrapper end -->
	
	</div>
	
<?php elseif( is_category() ) : ?>

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
	
<?php elseif( is_home() || is_front_page() ) : ?>

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
	
<?php else : ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class( 'news-stacked col-lg-12 col-md-12' ); ?>><!-- content wrap -->
	
		<h1 class="page-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute( array( 'before' => 'Permalink to: ', 'after' => '' ) ); ?>"><?php the_title(); ?></a>
		</h1>
		
		<?php 
		if( get_post_type() == 'post' ) k_post_meta(); // print date, author and comments number 
		elseif( get_post_type() == 'event' || get_post_type() == 'course' || get_post_type() == 'gallery' ) echo k_cpt_meta(); // print info
		?>
		
		<div class="news-summary">
	
    	<?php
    	// print excerpt - if any, otherwise trim it up automatically
    	if( has_excerpt() ) the_excerpt();
		else echo '<p>' . wp_trim_excerpt() . '</p>';
		?>
	
		</div>
	
	</div>

<?php endif; ?>