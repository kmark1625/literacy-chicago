<?php if(!$is_compact) echo VP_View::instance()->load('control/template_control_head', $head_info); ?>
  
<div class="placeholder">

	<div class="sc-visual">

    <?php 
    $metabox_name   = substr( $value, 1, strpos( $value, ' ' ) - 1 );
    $metabox_visual = get_template_directory_uri() . '/admin/metabox/img/' . $metabox_name . '.png';
    if( !empty( $value ) && file_exists( get_template_directory() . '/admin/metabox/img/' . $metabox_name . '.png' ) ) : 
    ?>
    
    <img src="<?php echo $metabox_visual; ?>" alt="ShortCode Visual" />
    
    <?php endif; ?>
    
    </div>

    <a class="add-sc" href="#" data-modal-id="hom_shortcodes_modal" id="<?php echo $name; ?>">
        <i class="fa fa-plus-circle fa-2x"></i>
    </a>

</div>
    
    <textarea class="vp-input" name="<?php echo $name; ?>"><?php echo $value; ?></textarea>

<?php if(!$is_compact) echo VP_View::instance()->load('control/template_control_foot'); ?>