<?php
add_shortcode( 'PGPP', 'PhotoGalleryPluginProShortCode' );
function PhotoGalleryPluginProShortCode( $Id ) {
    ob_start();
	
	/**
	 * Load Hex to Rgb color code function
	 */
	require_once("pgpp_rgb_color_code_function.php");
	
	/**
	 * Load All Image Gallery Custom Post Type
	 */
	$CPT_Name = "pgpp_gallery";
	$AllGalleries = array( 'post_id' => $Id['id'], 'post_type' => $CPT_Name, 'orderby' => 'ASC');
	$loop = new WP_Query( $AllGalleries );

	while ( $loop->have_posts() ) : $loop->the_post();
	
	/**
     * Load Saved Photo Gallery Pro Settings
     */

    if(!isset($AllGalleries['post_id'])) {
        $AllGalleries['post_id'] = "";		
    } else {
		$PGPP_Id = $AllGalleries['post_id'];
		$PGPP_Gallery_Settings = "PGPP_Gallery_Settings_".$PGPP_Id;
		$PGPP_Gallery_Settings = unserialize(get_post_meta( $PGPP_Id, $PGPP_Gallery_Settings, true));
		if(count($PGPP_Gallery_Settings)) {
			$PGPP_Effect  				= $PGPP_Gallery_Settings['PGPP_Effect'];
			$PGPP_Effect_animation		= $PGPP_Gallery_Settings['PGPP_Effect_animation'];
			$PGPP_Masonry_Thumbnail		= $PGPP_Gallery_Settings['PGPP_Masonry_Thumbnail'];
			$PGPP_Image_Style    		= $PGPP_Gallery_Settings['PGPP_Image_Style'];
			$PGPP_Show_Gallery_Title	= $PGPP_Gallery_Settings['PGPP_Show_Gallery_Title'];
			$PGPP_Show_Image_Label		= $PGPP_Gallery_Settings['PGPP_Show_Image_Label'];
			$PGPP_Gallery_Layout		= $PGPP_Gallery_Settings['PGPP_Gallery_Layout'];
			$PGPP_Open_Link				= $PGPP_Gallery_Settings['PGPP_Open_Link'];
			$PGPP_Color 				= $PGPP_Gallery_Settings['PGPP_Color'];
			$PGPP_Color_Opacity			= $PGPP_Gallery_Settings['PGPP_Color_Opacity'];
			$PGPP_Font_Style			= $PGPP_Gallery_Settings['PGPP_Font_Style'];
			$PGPP_Light_Box				= $PGPP_Gallery_Settings['PGPP_Light_Box'];
			$PGPP_Image_Border			= $PGPP_Gallery_Settings['PGPP_Image_Border'];
			$PGPP_Image_Border_Size		= $PGPP_Gallery_Settings['PGPP_Image_Border_Size'];
			$PGPP_Image_Border_Color	= $PGPP_Gallery_Settings['PGPP_Image_Border_Color'];
			$PGPP_Custom_CSS			= $PGPP_Gallery_Settings['PGPP_Custom_CSS'];
		}
	}
	?>
		
    <script src="http://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js"></script>
    <script type="text/javascript">
      WebFont.load({
        google: {
          families: ['<?php echo $PGPP_Font_Style; ?>'] // saved value
        }
      });
    </script>
	<?php if($PGPP_Light_Box == "lightbox2") { ?>
		<script>
		jQuery(document).ready(function(){	
			jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({
				animation_speed: 'fast', /* fast/slow/normal */
				slideshow: 2000, /* false OR interval time in ms */
				autoplay_slideshow: false, /* true/false */
				opacity: 0.80  /* Value between 0 and 1 */				
			});			
		});	
		</script>
		<?php } ?>
		<!-- Swipe Box-->
		<?php  if($PGPP_Light_Box == "lightbox3") { ?>
		<script type="text/javascript">
			jQuery(document).ready(function(){
				;( function( jQuery ) {
					jQuery( '.swipebox_<?php echo $PGPP_Id;?>' ).swipebox();
				})( jQuery );
			});
		</script>
		<?php } 
	// Load Effect File
	include("effect/photo-gallery-effects.php");
    return ob_get_clean();
	endwhile;
}
?>