<?php
/**
 * Search Form chunk of code
 */
?>

<form action="<?php echo esc_url( home_url( '/' ) ); ?>" id="searchform" method="get" role="search">
    <div class="input-group">
        <input type="text" name="s" id="s" class="form-control" autocomplete="off" placeholder="<?php _e( 'Search', 'kazaz' ); ?>" />
        <span class="input-group-btn"><button class="btn btn-default" type="submit"><?php echo _e( 'Search', 'kazaz' ); ?></button></span>
    </div>
</form>