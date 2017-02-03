<?php
/* images upload metabox */
function k_media_upload_meta_box() {
		global $post;
		wp_enqueue_script( 'plupload-handlers' );
		
		$form_class = 'media-upload-form type-form validate';
		$post_id = $post->ID;
		$_REQUEST[ 'post_id' ] = $post_id;
		?>
		
		<style>
		#media-items { width: auto; }
		.uploaded-img-wrapper { overflow: hidden; margin-bottom: 20px; }
		.uploaded-img { display: block; float: left; margin-right: 10px; }
		</style>
		
		<?php
		$imgs = '';
		$this_post_images = get_children( array(
			'post_parent' => $post_id,
			'post_type' => 'attachment',
			'post_mime_type' => 'image',
			'orderby' => 'menu_order', 
			'order' => 'ASC'
		) );
		if( !empty( $this_post_images ) ) {
			foreach( $this_post_images as $photo ) {
				$img_edit_url = admin_url( 'post.php?post=' . $photo->ID . '&amp;action=edit' );
				$imgs .= '<a href="' . $img_edit_url . '" title="' . __( 'Edit this image!', 'kazaz' ) . '" class="uploaded-img">' . wp_get_attachment_image( $photo->ID, 'thumbnail' ) . '</a>';
			}
		}
		?>
		
		<div class="uploaded-img-wrapper hide-if-no-js">
		<h4>Uploaded photos...</h4>
		<?php if( !empty( $imgs ) ) echo $imgs; else _e( 'No uploaded images yet.', 'kazaz' ); ?>
		</div>
	
		<?php media_upload_form(); ?>
	
		<script type="text/javascript">
		var post_id = <?php echo $post_id; ?>;
		var shortform = 3;
		</script>

		<div id="media-items" class="hide-if-no-js"></div>
 <?php	 
}

//add meta boxes to post types
function k_add_media_upload_meta_boxes() {
	if( current_user_can( 'upload_files' ) ) {
		$id       = 'gallery_upload';
		$title    = __( 'Bulk upload photos...', 'kazaz' );
		$callback = 'k_media_upload_meta_box';
		$context  = 'normal';
		$screens  = array( 'gallery' );
		
		foreach( $screens as $screen ) {
			add_meta_box( $id, $title, $callback, $screen, $context );
		}
	}
}
add_action( 'add_meta_boxes', 'k_add_media_upload_meta_boxes' );

/**
 * EOF
 */