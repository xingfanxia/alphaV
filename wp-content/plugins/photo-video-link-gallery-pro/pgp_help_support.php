<div class="row-fluid pricing-table pricing-three-column" style="margin-top: 10px; display:block; width:100%; overflow:hidden; background:white; box-shadow: 0 0 5px hsla(0, 0%, 20%, 0.3);padding-bottom:70px">
	<div class="plan-name" style="margin-top:20px;text-align: center;">
        <h2 style="font-weight: bold;font-size: 36px;padding-top: 30px;padding-bottom: 10px;color:#D9534F;">Photo Video Link Gallery Pro</h2>
		<h6 style="font-size: 21px;padding-top: 10px;padding-bottom: 10px;margin-left:11px;">Display your WordPress content like Photo, Video, Link, Image etc in Gallery format With CSS3 Hover Animation & Display With Lightbox.</h6>
    </div>
	<hr>
	<div class="purchase_btn_div" style="margin-top:20px; text-align: center;">
		<h2 style="font-weight: bold;font-size: 24px;padding-top: 30px;"><a  style= "margin-right:10px;margin-left:40px;margin-top: 30px;text-align: center;" href="https://www.weblizar.com/forum/viewforum.php?f=32" target="_new" class="btn btn-primary btn-lg"><?php _e('View Support Docs or Open a Ticket','')?></a>		
	
		<h2 style="font-weight: bold;font-size: 24px;padding-top: 30px;margin-bottom:40px"><a  style= "margin-right:10px;margin-left:40px;margin-top: 30px;text-align: center;" href="https://weblizar.com/documentation/plugins/photo-video-link-gallery-pro/" target="_new" class="btn btn-primary btn-lg"><?php _e('View Plugin Documentation','')?></a>		
	
	</h2>	
		</div>
	<hr>
	<div class="purchase_btn_div" style="margin-top:20px; margin-left:30px;">
		<h2 style="font-weight: bold;font-size: 42px;padding-top: 30px;text-align: center;">Video Tutorial</h2>
		
		<div style=" padding-top:20px;text-align: center;">
			<h2 style="font-weight: bold; font-size:18px;text-align: center;margin-bottom:20px">Weblizar photo video link gallery Pro plugin installation on Wordpress </h2>		
			<iframe width="853" height="480" src="https://www.youtube.com/embed/xoRGXpUgNXY" frameborder="0" allowfullscreen></iframe>
			
			<h2 style="font-weight: bold;font-size: 18px;padding-top: 30px;margin-bottom:20px">photo video link gallery Pro plugin settings customization </h2>		
			<iframe width="853" height="480" src="https://www.youtube.com/embed/U_jhpx4UDWw" frameborder="0" allowfullscreen></iframe>
			
			<h2 style="font-weight: bold;font-size: 18px;padding-top: 30px;margin-bottom:20px">how to add youtube/vimeo videos and link for photo video link gallery plugin on Wordpress </h2>		
			<iframe width="853" height="480" src="https://www.youtube.com/embed/WOQECvjSMzw" frameborder="0" allowfullscreen></iframe>
			
			</div>		
	</div>
	<hr>
	<div style="margin-top:40px; margin-left:30px; text-align: center;">
		<h2 style="font-weight: bold;font-size: 34px;padding-top: 30px;">Rate Us</h2>
		<h6 style="font-size: 22px;padding-top: 10px;padding-bottom: 10px;line-height:40px">If you are enjoying using our Admin Custom Login plugin and find it useful, then please consider writing a positive feedback. Your feedback will help us to encourage and support the plugin's continued development and better user support.</h6>
		<style>
			.acl-rate-us  span.dashicons{
			width: 30px;
			height: 30px;
			}
			.acl-rate-us  span.dashicons-star-filled:before {
			content: "\f155";
			font-size: 30px;
			}
			.acl-rate-us {
				color : #FBD229 !important;
				padding-top:5px !important;
			}
			
			.acl-rate-us span{
				display:inline-block;
			}
		</style>
		<div style="background:#EF4238; display:inline-block; margin-bottom:10px;">
		<a class="acl-rate-us" style="text-align:center; text-decoration: none;font:normal 30px/l; " href="https://wordpress.org/plugins/photo-video-link-gallery/" target="_blank" >
			<span class="dashicons dashicons-star-filled"></span>
			<span class="dashicons dashicons-star-filled"></span>
			<span class="dashicons dashicons-star-filled"></span>
			<span class="dashicons dashicons-star-filled"></span>
			<span class="dashicons dashicons-star-filled"></span>
		</a>
		</div>
	</div>
	<hr>
	<div style="margin-top:30px;margin-left:30px;text-align: center;">
		<h2 style="font-weight: bold;font-size: 28px;padding-top: 30px;">Share Us Your Suggestion</h2>
		<h6 style="font-size: 18px;padding-top: 10px;padding-bottom: 10px;line-height:50px;">If you have any suggestion or features in your mind then please share us. We will try our best to add them in this plugin. <br> Contact Me at <span style="color:#F7504B">lizarweb[at]gmail[dot]com <span></h6>
	</div>
	<hr>
	<div style="margin-top:30px;margin-left:30px;text-align: center;">
		<h2 style="font-weight: bold;font-size: 28px;padding-top:10px;">Language Contribution </h2>
		<h6 style="font-size: 18px;padding-top: 20px;padding-bottom: 10px;line-height:30px;margin-left:30px;">Translate this plugin into your language <br/> Contact Me at <span style="color:#F7504B">lizarweb[at]gmail[dot]com <span> </h6>
	</div>
	<hr>
	<div style="margin-top:30px;margin-left:30px; text-align: center;">
		<h2 style="font-weight: bold;font-size: 28px;padding-top:10px;">Change Old Server Image URL</h2>
		<form action="" method="post">
			<input type="submit" value="Change image URL" name= "pgppchangeurl" style= "margin-top:10px; margin-right:10px; margin-left:30px; background:#31B0D5; text-decoration:none;" class="btn btn-primary btn-lg">
			
			<h6 style="font-size: 22px;padding-top: 10px;padding-bottom: 10px;line-height:40px"><b>Note:</b> Use this option after import <b>Responsive Photo Gallery Pro Settings</b> to change old server image url to new server image url.</h6>
		</form>
	</div>
</div>

<?php
if(isset($_REQUEST['pgppchangeurl']) )
{		
	$all_posts = wp_count_posts( 'pgpp_gallery')->publish;
	$args = array('post_type' => 'pgpp_gallery', 'posts_per_page' =>$all_posts);
	global $pgpp_galleries;
	$pgpp_galleries = new WP_Query( $args );	

	while ( $pgpp_galleries->have_posts() ) : $pgpp_galleries->the_post();
	
		
		$PGPP_Id = get_the_ID();
		$PGPP_AllPhotosDetails = unserialize(get_post_meta( $PGPP_Id, 'PGPP_all_photos_details', true));
		$TotalImages =  get_post_meta( $PGPP_Id, 'PGPP_total_images_count', true );
		
		if($TotalImages) {
			foreach($PGPP_AllPhotosDetails as $PGPP_SinglePhotoDetails) {
				$name = $PGPP_SinglePhotoDetails['PGPP_image_label'];
				$url = $PGPP_SinglePhotoDetails['PGPP_image_url'];
				$url1 = $PGPP_SinglePhotoDetails['PGPP_gallery_admin_thumb'];
				$url2 = $PGPP_SinglePhotoDetails['PGPP_gallery_admin_medium'];
				$circle = $PGPP_SinglePhotoDetails['PGPP_gallery_admin_circle'];
				$video = $PGPP_SinglePhotoDetails['PGPP_video_link']; 
				$link = $PGPP_SinglePhotoDetails['PGPP_external_link'];
				$type = $PGPP_SinglePhotoDetails['PGPP_portfolio_type'];
				
				$upload_dir = wp_upload_dir();
				$data = $url;
				if (strpos($data,'uploads') !== false) {
					list($oteher_path, $image_path) = explode("uploads", $data);
					$url = $upload_dir['baseurl']. $image_path;
				}
				
				$data = $url1;
				if (strpos($data,'uploads') !== false) {
					list($oteher_path, $image_path) = explode("uploads", $data);
					$url1 = $upload_dir['baseurl']. $image_path;
				}
				
				$data = $url2;
				if (strpos($data,'uploads') !== false) {
					list($oteher_path, $image_path) = explode("uploads", $data);
					$url2 = $upload_dir['baseurl']. $image_path;
				}
				
				$data = $circle;
				if (strpos($data,'uploads') !== false) {
					list($oteher_path, $image_path) = explode("uploads", $data);
					$circle = $upload_dir['baseurl']. $image_path;
				}
				
				$ImagesArray[] = array(
					'PGPP_image_label' => $name,
					'PGPP_image_url' => $url,
					'PGPP_gallery_admin_thumb' => $url1,
					'PGPP_gallery_admin_medium' => $url2,
					'PGPP_gallery_admin_circle' => $circle,
					'PGPP_video_link' => $video,
					'PGPP_external_link' => $link,
					'PGPP_portfolio_type' => $type
				);
				
			}
			update_post_meta($PGPP_Id, 'PGPP_all_photos_details', serialize($ImagesArray));
			$ImagesArray="";
		}
	
	endwhile; 
}

?>