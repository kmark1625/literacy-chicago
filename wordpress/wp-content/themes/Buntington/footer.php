<?php
/**
 * Theme Footer
 */
?>

        </div><!-- container end -->
    
    </div><!-- content wrapper end -->

    <div id="k-footer"><!-- footer -->
    
    	<div class="container"><!-- container -->
        
        	<div class="row no-gutter"><!-- row -->
            
            	<div class="col-lg-4 col-md-4"><!-- widgets column left -->
            
                    <div class="col-padded col-naked">
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
							<?php if( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( __( 'Footer Column Left', 'kazaz' ) ) ) : ?><?php endif; ?> 
                            
                        </ul><!-- widgets end -->
                         
                    </div>
                    
                </div><!-- widgets column left end -->
                
                <div class="col-lg-4 col-md-4"><!-- widgets column center -->
                
                    <div class="col-padded col-naked">
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
							<?php if( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( __( 'Footer Column Middle', 'kazaz' ) ) ) : ?><?php endif; ?> 
                            
                        </ul>
                        
                    </div>
                    
                </div><!-- widgets column center end -->
                
                <div class="col-lg-4 col-md-4"><!-- widgets column right -->
                
                    <div class="col-padded col-naked">
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
							<?php if( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( __( 'Footer Column Right', 'kazaz' ) ) ) : ?><?php endif; ?>
                            
                        </ul> 
                        
                    </div>
                
                </div><!-- widgets column right end -->
            
            </div><!-- row end -->
        
        </div><!-- container end -->
    
    </div><!-- footer end -->
    
    <div id="k-subfooter"><!-- subfooter -->
    
    	<div class="container"><!-- container -->
        
        	<div class="row"><!-- row -->
            
            	<div class="col-lg-12">
                
                	<p class="copy-text text-inverse"><?php echo vp_option( 'vpt_option.theme_copyright' ); ?></p>
                
                </div>
            
            </div><!-- row end -->
        
        </div><!-- container end -->
    
    </div><!-- subfooter end -->
    
	<?php wp_footer(); ?>
    
  </body>
  
</html>