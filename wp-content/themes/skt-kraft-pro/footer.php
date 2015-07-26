<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SKT Kraft
 */
?>
<div id="footer-wrapper">
    	<div class="container">
        	
        	<?php if(!dynamic_sidebar('footer-1')) : ?>  
             <div class="cols-3 widget-column-1">            	
               <h5><?php if( of_get_option('aboutustitle') != '') { echo of_get_option('aboutustitle'); } ; ?></h5>
               <?php if( of_get_option('aboutdescription') != '') { echo of_get_option('aboutdescription'); } ; ?>
                <div class="clear"></div>    
               
               <p class="parastyle"><?php if( of_get_option('address',true) != '') { echo of_get_option('address',true) ; } ; ?>
                  <?php if( of_get_option('address2',true) != '') { echo of_get_option('address2',true) ; } ; ?></p>
                <div class="phone-no">
                	<p><?php if( of_get_option('phone',true) != ''){ ?>
                		<strong><?php _e('Phone:','skt-kraft'); ?></strong> <?php echo of_get_option('phone'); ?>
                    <?php } ?>
                    <?php if( of_get_option('email',true) != '' ) { ?>
                   <strong><?php _e('E-mail:','skt-kraft'); ?></strong><a href="mailto:<?php echo of_get_option('email',true); ?>"> <?php echo of_get_option('email',true) ; ?></a>
                    <?php } ?>
                    <?php if( of_get_option('weblink',true) != ''){ ?>
                    <strong><?php _e('Website:','skt-kraft'); ?></strong><a href="<?php echo of_get_option('weblink',true); ?>" target="_blank"> <?php echo of_get_option('weblink',true); ?></a>
                    <?php } ?></p>
                </div>   
                
                <div class="clear"></div>                
                <?php if( of_get_option('footersocialicons') != ''){ echo do_shortcode(of_get_option('footersocialicons', true));}; ?>
                
              </div>                  
			<?php  endif; ?>
           
            
           
            <?php if(!dynamic_sidebar('footer-2')) : ?> 
             <div class="cols-3 widget-column-2">          
            	<h5><?php if( of_get_option('usefullinktitle') != ''){ echo of_get_option('usefullinktitle');}; ?></h5>
                <?php wp_nav_menu( array('theme_location'  => 'footer', 'container' => '', 'container_class' => '', 'items_wrap' => '<ul>%3$s</ul>' ) ); ?> 
              </div>             
            <?php endif; ?>
          
            <?php if(!dynamic_sidebar('footer-3')) : ?>
              <div class="cols-3 widget-column-3">                
            	<h5><?php if( of_get_option('frptitle') != '') { echo of_get_option('frptitle'); } ; ?></h5>
               	<?php echo do_shortcode( '[footer-posts show="2"]') ;?>            	
               </div>
            <?php endif; ?>
            
            <div class="clear"></div>
        </div><!--end .container-->
        
        <div class="copyright-wrapper">
        	<div class="container">
            	<div class="copyright-txt"><?php if( of_get_option('copytext',true) != ''){ echo of_get_option('copytext',true); }; ?></div>
                <div class="design-by"><?php if( of_get_option('ftlink', true) != ''){echo of_get_option('ftlink',true);}; ?></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
<?php wp_footer(); ?>
</body>
</html>