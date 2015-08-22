<?php 
$img_inner_shadow =  PGPP_hex2rgb( $PGPP_Image_Border_Color );
$img_bg_color =  PGPP_hex2rgb( $PGPP_Color );

// Image Label String Length Corp
if($PGPP_Gallery_Layout=="col-md-6"){
	$str_lenght = 30;
} elseif($PGPP_Gallery_Layout=="col-md-4"){
	$str_lenght = 21;
} else {
	$str_lenght = 15;
}
?>
<style>
.pgpp_effect{
	overflow: hidden;
	paddind:10px;
}
.item_margin{
	margin-bottom:20px;
}
.info .h3-<?php echo $PGPP_Id;?>{
    font-family: <?php echo $PGPP_Font_Style; ?>;
    font-weight: 500;
}
.portfolio-gallery-title{
	font-weight: bold;font-size:18px;padding-bottom:20px; border-bottom:3px solid #f1f1f1; margin-bottom: 20px; text-align:center
}
.pp_nav {
	display: block !important;
}
@media (min-width: 992px){
	.col-md-6 {
		width: 49.57% !important;
	}
	.col-md-4 {
		width: 33.30% !important;
	}
	.col-md-3 {
		width: 24.70% !important;
	}
	.footer-h3-<?php echo $PGPP_Id;?>{
		display:none;
	}
}
@media (max-width: 992px){
  .h3-<?php echo $PGPP_Id;?>{
		display:none;
	}
	.item_margin {
		width:100%;
	}
}

						

</style>

<!-- Load Effect File -->
<?php include('ohover.php'); ?>

<!-- Custom Css -->
<style>
<?php echo $PGPP_Custom_CSS; ?>
</style>

<div class="pgpp_effect">
	<?php if($PGPP_Show_Gallery_Title=="yes"){?>
	<div class="portfolio-gallery-title">
        <?php echo get_the_title($PGPP_Id);?>
    </div>
	<?php } ?>
	<div class="row gallery1">
		<?php
		$PGPP_AllPhotosDetails = unserialize(get_post_meta( $PGPP_Id, 'PGPP_all_photos_details', true));
		$TotalImages =  get_post_meta( $PGPP_Id, 'PGPP_total_images_count', true );
		if($TotalImages) {
			if( $PGPP_Effect == "effect8")
			{
				foreach($PGPP_AllPhotosDetails as $PGPP_SinglePhotoDetails) {
					$name = $PGPP_SinglePhotoDetails['PGPP_image_label'];
					$UniqueString = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
					$url = $PGPP_SinglePhotoDetails['PGPP_image_url'];
					$url1 = $PGPP_SinglePhotoDetails['PGPP_gallery_admin_thumb'];
					$url2 = $PGPP_SinglePhotoDetails['PGPP_gallery_admin_medium'];
					$circle = $PGPP_SinglePhotoDetails['PGPP_gallery_admin_circle'];
					$video = $PGPP_SinglePhotoDetails['PGPP_video_link']; 
					$link = $PGPP_SinglePhotoDetails['PGPP_external_link'];
					$type = $PGPP_SinglePhotoDetails['PGPP_portfolio_type'];
					if($type=="image"){
						$href_link = $url;
					}  elseif($type=="link"){
						$href_link = $link;
					} else {
						$href_link = $video;
					}
					
					if($PGPP_Masonry_Thumbnail == "yes"){
						$Img_Url=$url2;
					} else {
						$Img_Url=$circle;
					}
					?>
					<div class="<?php echo $PGPP_Gallery_Layout; ?> item_margin wl-gallery">
					  <!-- colored -->
					  <div class="item-hover-<?php echo $PGPP_Id;?> circle colored <?php echo $PGPP_Effect; ?> <?php echo $PGPP_Effect_animation; ?>"><a href="<?php echo $href_link; ?>" title="<?php if( $PGPP_Show_Image_Label =="yes"){ echo $name; } ?>" <?php  
						if($type != "link"){ if($PGPP_Light_Box == "lightbox2") { ?> data-rel="prettyPhoto[portfolio<?php echo $PGPP_Id;?>]" <?php } else { ?> class="swipebox_<?php echo $PGPP_Id;?>" <?php } }else{ ?> target="<?php echo $PGPP_Open_Link; ?>" <?php } 
							 ?> >
						<div class="img-container">
						  <div class="img"><img src="<?php echo $Img_Url; ?>" ></div>
						</div>
						<div class="info-container">
						  <div class="info">
							<h3 class="h3-<?php echo $PGPP_Id;?>"><?php if( $PGPP_Show_Image_Label =="yes"){ if(strlen($name) > $str_lenght ) echo substr($name,0,$str_lenght)."..."; else echo $name; } ?></h3>
						  </div>
						</div></a></div>
					  <!-- end colored -->
					  <h3 class="footer-h3-<?php echo $PGPP_Id;?> "><?php if( $PGPP_Show_Image_Label =="yes"){  echo $name; } ?></h3>
							  
					</div>
					<?php
				}
			}
			else if($PGPP_Effect == "effect13" || $PGPP_Effect == "effect5" || $PGPP_Effect == "effect18" || $PGPP_Effect == "effect20"){
				foreach($PGPP_AllPhotosDetails as $PGPP_SinglePhotoDetails) {
					$name = $PGPP_SinglePhotoDetails['PGPP_image_label'];
					$UniqueString = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
					$url = $PGPP_SinglePhotoDetails['PGPP_image_url'];
					$url1 = $PGPP_SinglePhotoDetails['PGPP_gallery_admin_thumb'];
					$url2 = $PGPP_SinglePhotoDetails['PGPP_gallery_admin_medium'];
					$circle = $PGPP_SinglePhotoDetails['PGPP_gallery_admin_circle'];
					$video = $PGPP_SinglePhotoDetails['PGPP_video_link']; 
					$link = $PGPP_SinglePhotoDetails['PGPP_external_link'];
					$type = $PGPP_SinglePhotoDetails['PGPP_portfolio_type'];
					if($type=="image") {
						$href_link = $url;
					} elseif($type=="link"){
						$href_link = $link;
					} else {
						$href_link = $video;
					}
					
					if($PGPP_Masonry_Thumbnail == "yes"){
						$Img_Url=$url2;
					} else {
						$Img_Url=$circle;
					}
					?>
					<div class="<?php echo $PGPP_Gallery_Layout; ?> item_margin wl-gallery">
					  <!-- colored -->
					  <div class="item-hover-<?php echo $PGPP_Id;?> circle colored <?php echo $PGPP_Effect; ?> <?php echo $PGPP_Effect_animation; ?>"><a href="<?php echo $href_link; ?>" title="<?php if( $PGPP_Show_Image_Label =="yes"){ echo $name; } ?>" <?php  
						if($type != "link"){ if($PGPP_Light_Box == "lightbox2") { ?> data-rel="prettyPhoto[portfolio<?php echo $PGPP_Id;?>]" <?php } else { ?> class="swipebox_<?php echo $PGPP_Id;?>" <?php } }else{ ?> target="<?php echo $PGPP_Open_Link; ?>" <?php } 
							 ?> >
						  <div class="img"><img src="<?php echo $Img_Url; ?>" ></div>
						  <div class="info">
							<div class="info-back">
							   <h3 class="h3-<?php echo $PGPP_Id;?>"><?php if( $PGPP_Show_Image_Label =="yes"){ if(strlen($name) > $str_lenght ) echo substr($name,0,$str_lenght)."..."; else echo $name; } ?></h3>
							</div>	
						  </div></a></div>
					  <!-- end colored -->
					  <h3 class="footer-h3-<?php echo $PGPP_Id;?> "><?php if( $PGPP_Show_Image_Label =="yes"){  echo $name; } ?></h3>
					  
					</div>
					<?php
				}
			}
			else{
				foreach($PGPP_AllPhotosDetails as $PGPP_SinglePhotoDetails) {
					$name = $PGPP_SinglePhotoDetails['PGPP_image_label'];
					$UniqueString = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
					$url = $PGPP_SinglePhotoDetails['PGPP_image_url'];
					$url1 = $PGPP_SinglePhotoDetails['PGPP_gallery_admin_thumb'];
					$url2 = $PGPP_SinglePhotoDetails['PGPP_gallery_admin_medium'];
					$circle = $PGPP_SinglePhotoDetails['PGPP_gallery_admin_circle'];
					$video = $PGPP_SinglePhotoDetails['PGPP_video_link']; 
					$link = $PGPP_SinglePhotoDetails['PGPP_external_link'];
					$type = $PGPP_SinglePhotoDetails['PGPP_portfolio_type'];
					if($type=="image") {
						$href_link = $url;
					} elseif($type=="link"){
						$href_link = $link;
					} else {
						$href_link = $video;
					}
					
					if($PGPP_Masonry_Thumbnail == "yes"){
						$Img_Url=$url2;
					} else{
						$Img_Url=$circle;
					}
					?>
					<div class="<?php echo $PGPP_Gallery_Layout; ?> item_margin col-sm-6 wl-gallery">
					  <!-- colored -->
					  <div class="item-hover-<?php echo $PGPP_Id;?> circle colored <?php echo $PGPP_Effect; ?> <?php echo $PGPP_Effect_animation; ?>">
					
					  <a href="<?php echo $href_link; ?>" title="<?php if( $PGPP_Show_Image_Label =="yes"){ echo $name; } ?>"
					  <?php  
						if($type != "link"){ if($PGPP_Light_Box == "lightbox2") { ?> data-rel="prettyPhoto[portfolio<?php echo $PGPP_Id;?>]" <?php } else { ?> class="swipebox_<?php echo $PGPP_Id;?>" <?php } }else{ ?> target="<?php echo $PGPP_Open_Link; ?>" <?php } 
							 ?> >
						  <div class="img"><img src="<?php echo $Img_Url; ?>" ></div>
						  <div class="info">
							<h3 class="h3-<?php echo $PGPP_Id;?>"><?php if( $PGPP_Show_Image_Label =="yes"){ if(strlen($name) > $str_lenght ) echo substr($name,0,$str_lenght)."..."; else echo $name; } ?></h3>
						  </div></a></div>
					  <!-- end colored -->
					  <h3 class="footer-h3-<?php echo $PGPP_Id;?> "><?php if( $PGPP_Show_Image_Label =="yes"){  echo $name; } ?></h3>
					  
					</div>
					<?php
				}
			}
		}
		?>
	</div>
</div>