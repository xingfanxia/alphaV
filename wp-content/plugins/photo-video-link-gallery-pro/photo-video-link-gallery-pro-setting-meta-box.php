<?php
/**
 * Load Saved Gallery Pro Settings
 */
$PostId = $post->ID;
$PGPP_Gallery_Settings = "PGPP_Gallery_Settings_".$PostId;
$PGPP_Gallery_Settings = unserialize(get_post_meta( $PostId, $PGPP_Gallery_Settings, true));
if($PGPP_Gallery_Settings['PGPP_Show_Gallery_Title'] && $PGPP_Gallery_Settings['PGPP_Color'] ) {
	$PGPP_Effect				= $PGPP_Gallery_Settings['PGPP_Effect'];
	$PGPP_Effect_animation		= $PGPP_Gallery_Settings['PGPP_Effect_animation'];
	$PGPP_Masonry_Thumbnail		= $PGPP_Gallery_Settings['PGPP_Masonry_Thumbnail'];
	$PGPP_Image_Style			= $PGPP_Gallery_Settings['PGPP_Image_Style'];
	$PGPP_Show_Gallery_Title	= $PGPP_Gallery_Settings['PGPP_Show_Gallery_Title'];
	$PGPP_Show_Image_Label		= $PGPP_Gallery_Settings['PGPP_Show_Image_Label'];
	$PGPP_Gallery_Layout		= $PGPP_Gallery_Settings['PGPP_Gallery_Layout'];
	$PGPP_Open_Link        		= $PGPP_Gallery_Settings['PGPP_Open_Link'];
	$PGPP_Color 				= $PGPP_Gallery_Settings['PGPP_Color'];
	$PGPP_Color_Opacity         = $PGPP_Gallery_Settings['PGPP_Color_Opacity'];
	$PGPP_Font_Style			= $PGPP_Gallery_Settings['PGPP_Font_Style'];
	$PGPP_Light_Box				= $PGPP_Gallery_Settings['PGPP_Light_Box'];
	$PGPP_Image_Border			= $PGPP_Gallery_Settings['PGPP_Image_Border'];
	$PGPP_Image_Border_Size		= $PGPP_Gallery_Settings['PGPP_Image_Border_Size'];
	$PGPP_Image_Border_Color	= $PGPP_Gallery_Settings['PGPP_Image_Border_Color'];
	$PGPP_Custom_CSS			= $PGPP_Gallery_Settings['PGPP_Custom_CSS'];
}
else{
	$PGPP_Gallery_Settings = unserialize(get_option( 'PGPP_Settings' ));
	if(count($PGPP_Gallery_Settings)) {
		$PGPP_Effect  				= $PGPP_Gallery_Settings['PGPP_Effect'];
		$PGPP_Effect_animation  	= $PGPP_Gallery_Settings['PGPP_Effect_animation'];
		$PGPP_Masonry_Thumbnail		= $PGPP_Gallery_Settings['PGPP_Masonry_Thumbnail'];
		$PGPP_Image_Style    		= $PGPP_Gallery_Settings['PGPP_Image_Style'];
		$PGPP_Show_Gallery_Title    = $PGPP_Gallery_Settings['PGPP_Show_Gallery_Title'];
		$PGPP_Show_Image_Label      = $PGPP_Gallery_Settings['PGPP_Show_Image_Label'];
		$PGPP_Gallery_Layout        = $PGPP_Gallery_Settings['PGPP_Gallery_Layout'];
		$PGPP_Open_Link        		= $PGPP_Gallery_Settings['PGPP_Open_Link'];
		$PGPP_Color 				= $PGPP_Gallery_Settings['PGPP_Color'];
		$PGPP_Color_Opacity         = $PGPP_Gallery_Settings['PGPP_Color_Opacity'];
		$PGPP_Font_Style           	= $PGPP_Gallery_Settings['PGPP_Font_Style'];
		$PGPP_Light_Box           	= $PGPP_Gallery_Settings['PGPP_Light_Box'];
		$PGPP_Image_Border          = $PGPP_Gallery_Settings['PGPP_Image_Border'];
		$PGPP_Image_Border_Size     = $PGPP_Gallery_Settings['PGPP_Image_Border_Size'];
		$PGPP_Image_Border_Color    = $PGPP_Gallery_Settings['PGPP_Image_Border_Color'];
		$PGPP_Custom_CSS			= "";
	}
}
?>
<style>
@media only screen and (min-width: 970px){
	#post-body.columns-2 #postbox-container-1 {
		float: right;
		margin-right: 15px;
		width: 280px;
		right:0;
		position:fixed;
	}
}
.thumb-pro th, .thumb-pro label, .thumb-pro h3, .thumb-pro{
	color:#31a3dd !important;
	font-weight:bold;
}
.caro-pro th, .caro-pro label, .caro-pro h3, .caro-pro{
	color:#DA5766 !important;
	font-weight:bold;
}
</style>
<script>
jQuery(document).ready(function(){
	PGPP_MasonryClick();
	PGPP_BorderClick();
});
function PGPP_BorderClick() {
	if (jQuery('#PGPP_Image_Border').is(":checked")) {
	  jQuery('.bor').show();
	} else {
		jQuery('.bor').hide();
	}
}
function PGPP_MasonryClick() {
	if (jQuery('#PGPP_Masonry_Thumbnail').is(":checked")) {
		jQuery('.ImageLayout').hide();
	} else {
		jQuery('.ImageLayout').show();
	}
}
</script>
<?php require_once("tooltip.php"); ?>

<input type="hidden" id="wl_action" name="wl_action" value="wl-save-settings">
<table class="form-table">
	<tbody>
		<tr>
			<th scope="row"><label><?php _e('Transition Effect','PGPP_TEXT_DOMAIN')?></label></th>
			<td>
				<select name="PGPP_Effect" id="PGPP_Effect" onchange='effect_change()'>
					<optgroup label="Select Effect">
						<option value="effect2" <?php if($PGPP_Effect == 'effect2') echo "selected=selected"; ?>><?php _e('Effect 1','PGPP_TEXT_DOMAIN')?></option>
						<option value="effect3" <?php if($PGPP_Effect == 'effect3') echo "selected=selected"; ?>><?php _e('Effect 2','PGPP_TEXT_DOMAIN')?></option>
						<option value="effect4" <?php if($PGPP_Effect == 'effect4') echo "selected=selected"; ?>><?php _e('Effect 3','PGPP_TEXT_DOMAIN')?></option>
						<option value="effect5" <?php if($PGPP_Effect == 'effect5') echo "selected=selected"; ?>><?php _e('Effect 4','PGPP_TEXT_DOMAIN')?></option>
						<option value="effect6" <?php if($PGPP_Effect == 'effect6') echo "selected=selected"; ?>><?php _e('Effect 5','PGPP_TEXT_DOMAIN')?></option>
						<option value="effect7" <?php if($PGPP_Effect == 'effect7') echo "selected=selected"; ?>><?php _e('Effect 6','PGPP_TEXT_DOMAIN')?></option>
						<option value="effect8" <?php if($PGPP_Effect == 'effect8') echo "selected=selected"; ?>><?php _e('Effect 7','PGPP_TEXT_DOMAIN')?></option>
						<option value="effect9" <?php if($PGPP_Effect == 'effect9') echo "selected=selected"; ?>><?php _e('Effect 8','PGPP_TEXT_DOMAIN')?></option>
						<option value="effect10" <?php if($PGPP_Effect == 'effect10') echo "selected=selected"; ?>><?php _e('Effect 9','PGPP_TEXT_DOMAIN')?></option>
						<option value="effect11" <?php if($PGPP_Effect == 'effect11') echo "selected=selected"; ?>><?php _e('Effect 10','PGPP_TEXT_DOMAIN')?></option>
						<option value="effect12" <?php if($PGPP_Effect == 'effect12') echo "selected=selected"; ?>><?php _e('Effect 11','PGPP_TEXT_DOMAIN')?></option>
						<option value="effect13" <?php if($PGPP_Effect == 'effect13') echo "selected=selected"; ?>><?php _e('Effect 12','PGPP_TEXT_DOMAIN')?></option>
						<option value="effect14" <?php if($PGPP_Effect == 'effect14') echo "selected=selected"; ?>><?php _e('Effect 13','PGPP_TEXT_DOMAIN')?></option>
						<option value="effect15" <?php if($PGPP_Effect == 'effect15') echo "selected=selected"; ?>><?php _e('Effect 14','PGPP_TEXT_DOMAIN')?></option>
						<option value="effect16" <?php if($PGPP_Effect == 'effect16') echo "selected=selected"; ?>><?php _e('Effect 15','PGPP_TEXT_DOMAIN')?></option>
						<option value="effect17" <?php if($PGPP_Effect == 'effect17') echo "selected=selected"; ?>><?php _e('Effect 16','PGPP_TEXT_DOMAIN')?></option>
						<option value="effect18" <?php if($PGPP_Effect == 'effect18') echo "selected=selected"; ?>><?php _e('Effect 17','PGPP_TEXT_DOMAIN')?></option>
						<option value="effect19" <?php if($PGPP_Effect == 'effect19') echo "selected=selected"; ?>><?php _e('Effect 18','PGPP_TEXT_DOMAIN')?></option>
						<option value="effect20" <?php if($PGPP_Effect == 'effect20') echo "selected=selected"; ?>><?php _e('Effect 19','PGPP_TEXT_DOMAIN')?></option>
					</optgroup>
				</select>
				<p class="description">
					<?php _e('Choose an animation effect apply on images after mouse hover.','PGPP_TEXT_DOMAIN')?>
					
				</p>
			</td>
		</tr>
		<?php require_once("settings.php"); ?>
		<tr>
			<th scope="row"><label><?php _e('Show Masonry Thumbnails ','PGPP_TEXT_DOMAIN')?></label></th>
			<td>
				<?php if($PGPP_Masonry_Thumbnail == "") $PGPP_Masonry_Thumbnail = "no"; ?>
				<input type="radio" name="PGPP_Masonry_Thumbnail" id="PGPP_Masonry_Thumbnail" onclick="return PGPP_MasonryClick();" value="yes" <?php if($PGPP_Masonry_Thumbnail == 'yes' ) { echo "checked"; } ?>> <i class="fa fa-check fa-2x"></i> 
				<input type="radio" name="PGPP_Masonry_Thumbnail" id="PGPP_Masonry_Thumbnail" onclick="return PGPP_MasonryClick();" value="no" <?php if($PGPP_Masonry_Thumbnail == 'no' ) { echo "checked"; } ?>> <i class="fa fa-times fa-2x"></i>
				<p class="description">
					<?php _e('Select an option for thumbnail layout setting.','PGPP_TEXT_DOMAIN')?>
					<a href="#" id="p14" data-tooltip="#s14"><?php _e('Preview','PGPP_TEXT_DOMAIN')?></a><br>
					<?php _e('Note: Masonry Effect Must be Work With Only <b>Rectangle Image Layout</b>.','PGPP_TEXT_DOMAIN')?>
				</p>
			</td>
		</tr>
		<tr class="ImageLayout">
			<th scope="row"><label><?php _e('Image Layout','PGPP_TEXT_DOMAIN')?></label></th>
			<td>
				<?php if($PGPP_Image_Style == "") $PGPP_Image_Style = "rectangle"; ?>
				<input type="radio" name="PGPP_Image_Style" id="PGPP_Image_Style1" value="rectangle" <?php if($PGPP_Image_Style == 'rectangle' ) { echo "checked"; } ?>> <i class="fa fa-square-o fa-2x"></i><?php _e(' Rectangle','PGPP_TEXT_DOMAIN')?> &nbsp;&nbsp;
				<input type="radio" name="PGPP_Image_Style" id="PGPP_Image_Style2" value="circle" <?php if($PGPP_Image_Style == 'circle' ) { echo "checked"; } ?>> <i class="fa fa-circle-thin fa-2x"></i><?php _e(' Circle','PGPP_TEXT_DOMAIN')?>
				<p class="description">
					<?php _e('Select Rectangle/Circle option to set album image style.','PGPP_TEXT_DOMAIN')?>
					<a href="#" id="p3" data-tooltip="#s3"><?php _e('Preview','PGPP_TEXT_DOMAIN')?></a>
				</p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label><?php _e('Image Hover Color','PGPP_TEXT_DOMAIN')?></label></th>
			<td>
				<?php if($PGPP_Color == "") $PGPP_Color = "#0074a2"; ?>
				<input id="PGPP_Color" name="PGPP_Color" type="text" value="<?php echo $PGPP_Color; ?>" class="my-color-field" data-default-color="#ffffff" />
				<p class="description">
					<?php _e('Select any color to apply on image gallery.','PGPP_TEXT_DOMAIN')?>
					<a href="#" id="p4" data-tooltip="#s4"><?php _e('Preview','PGPP_TEXT_DOMAIN')?></a>
				</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Show Gallery Title','PGPP_TEXT_DOMAIN')?></label></th>
			<td>
				<?php if($PGPP_Show_Gallery_Title == "") $PGPP_Show_Gallery_Title = "yes"; ?>
				<input type="radio" name="PGPP_Show_Gallery_Title" id="PGPP_Show_Gallery_Title1" value="yes" <?php if($PGPP_Show_Gallery_Title == 'yes' ) { echo "checked"; } ?>> <i class="fa fa-check fa-2x"></i> 
				<input type="radio" name="PGPP_Show_Gallery_Title" id="PGPP_Show_Gallery_Title2" value="no" <?php if($PGPP_Show_Gallery_Title == 'no' ) { echo "checked"; } ?>> <i class="fa fa-times fa-2x"></i>
				<p class="description">
					<?php _e('Select Yes/No option to hide or show gallery title.','PGPP_TEXT_DOMAIN')?>
					<a href="#" id="p5" data-tooltip="#s5"><?php _e('Preview','PGPP_TEXT_DOMAIN')?></a>
				</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Show Image Label','PGPP_TEXT_DOMAIN')?></label></th>
			<td>
				<?php if($PGPP_Show_Image_Label == "") $PGPP_Show_Image_Label = "yes"; ?>
				<input type="radio" name="PGPP_Show_Image_Label" id="PGPP_Show_Image_Label1" value="yes" <?php if($PGPP_Show_Image_Label == 'yes' ) { echo "checked"; } ?>> <i class="fa fa-check fa-2x"></i> 
				<input type="radio" name="PGPP_Show_Image_Label" id="PGPP_Show_Image_Label2" value="no" <?php if($PGPP_Show_Image_Label == 'no' ) { echo "checked"; } ?>> <i class="fa fa-times fa-2x"></i>
				<p class="description">
					<?php _e('Select Yes/No option to hide or show label on image.','PGPP_TEXT_DOMAIN')?>
					<a href="#" id="p6" data-tooltip="#s6"><?php _e('Preview','PGPP_TEXT_DOMAIN')?></a>
				</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Gallery Layout','PGPP_TEXT_DOMAIN')?></label></th>
			<td>
				<?php if($PGPP_Gallery_Layout == "") $PGPP_Gallery_Layout = "col-md-6"; ?>
				<select name="PGPP_Gallery_Layout" id="PGPP_Gallery_Layout">
					<optgroup label="Select Gallery Layout">
						<option value="col-md-6" <?php if($PGPP_Gallery_Layout == 'col-md-6') echo "selected=selected"; ?>><?php _e('Two Column','PGPP_TEXT_DOMAIN')?></option>
						<option value="col-md-4" <?php if($PGPP_Gallery_Layout == 'col-md-4') echo "selected=selected"; ?>><?php _e('Three Column','PGPP_TEXT_DOMAIN')?></option>
						<option value="col-md-3" <?php if($PGPP_Gallery_Layout == 'col-md-3') echo "selected=selected"; ?>><?php _e('Four Column','PGPP_TEXT_DOMAIN')?></option>
					</optgroup>
				</select>
				<p class="description">
					<?php _e('Choose a column layout for image gallery.','PGPP_TEXT_DOMAIN')?>
					<a href="#" id="p7" data-tooltip="#s7"><?php _e('Preview','PGPP_TEXT_DOMAIN')?></a>
				</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Open Link','PGPP_TEXT_DOMAIN')?></label></th>
			<td>
				<?php if($PGPP_Open_Link == "") $PGPP_Open_Link = "_blank"; ?>
				<input type="radio" name="PGPP_open_link" id="PGPP_open_link" value="_self" <?php if($PGPP_Open_Link == '_self' ) { echo "checked"; } ?>> <?php _e('In Same Tab','PGPP_TEXT_DOMAIN')?>
				<input type="radio" name="PGPP_open_link" id="PGPP_open_link" value="_blank" <?php if($PGPP_Open_Link == '_blank' ) { echo "checked"; } ?>> <?php _e('In New Tab','PGPP_TEXT_DOMAIN')?>
				<p class="description">
					<?php _e('Select option to open link in save tab or in new tab.','PGPP_TEXT_DOMAIN')?>
				</p>
			</td>
		</tr>
		
		<tr class="opacity" >
			<th scope="row"><label><?php _e('Color Opacity','PGPP_TEXT_DOMAIN')?></label></th>
			<td>
				<?php if($PGPP_Color_Opacity == "") $PGPP_Color_Opacity = "0.5"; ?>
				<select name="PGPP_Color_Opacity" id="PGPP_Color_Opacity">
					<optgroup label="Select Hover Color Opacity">
						<option value="1" <?php if($PGPP_Color_Opacity == '1') echo "selected=selected"; ?>>1</option>
						<option value="0.9" <?php if($PGPP_Color_Opacity == '0.9') echo "selected=selected"; ?>>0.9</option>
						<option value="0.8" <?php if($PGPP_Color_Opacity == '0.8') echo "selected=selected"; ?>>0.8</option>
						<option value="0.7" <?php if($PGPP_Color_Opacity == '0.7') echo "selected=selected"; ?>>0.7</option>
						<option value="0.6" <?php if($PGPP_Color_Opacity == '0.6') echo "selected=selected"; ?>>0.6</option>
						<option value="0.5" <?php if($PGPP_Color_Opacity == '0.5') echo "selected=selected"; ?>>0.5</option>
						<option value="0.4" <?php if($PGPP_Color_Opacity == '0.4') echo "selected=selected"; ?>>0.4</option>
						<option value="0.3" <?php if($PGPP_Color_Opacity == '0.3') echo "selected=selected"; ?>>0.3</option>
						<option value="0.2" <?php if($PGPP_Color_Opacity == '0.2') echo "selected=selected"; ?>>0.2</option>
						<option value="0.1" <?php if($PGPP_Color_Opacity == '0.1') echo "selected=selected"; ?>>0.1</option>
					</optgroup>
				</select>
				<p class="description">
					<?php _e('Choose hover color opacity on images.','PGPP_TEXT_DOMAIN')?>
					<a href="#" id="p8" data-tooltip="#s8"><?php _e('Preview','PGPP_TEXT_DOMAIN')?></a>
				</p>
			</td>
		</tr>

		<tr>
			<th scope="row"><label><?php _e('Font Style','PGPP_TEXT_DOMAIN')?></label></th>
			<td>
				<?php if($PGPP_Font_Style == "") $PGPP_Font_Style="Arial" ;  ?>
				<select  name="PGPP_Font_Style" class="standard-dropdown" id="PGPP_Font_Style">
					<optgroup label="Default Fonts">
						<option value="Arial" <?php selected($PGPP_Font_Style, 'Arial' ); ?>>Arial</option>
						<option value="_arial_black" <?php selected($PGPP_Font_Style, '_arial_black' ); ?>>Arial Black</option>
						<option value="Courier New" <?php selected($PGPP_Font_Style, 'Courier New' ); ?>>Courier New</option>
						<option value="georgia" <?php selected($PGPP_Font_Style, 'Georgia' ); ?>>Georgia</option>
						<option value="grande" <?php selected($PGPP_Font_Style, 'Grande' ); ?>>Grande</option>
						<option value="_helvetica_neue" <?php selected($PGPP_Font_Style, '_helvetica_neue' ); ?>>Helvetica Neue</option>
						<option value="_impact" <?php selected($PGPP_Font_Style, '_impact' ); ?>>Impact</option>
						<option value="_lucida" <?php selected($PGPP_Font_Style, '_lucida' ); ?>>Lucida</option>
						<option value="_lucida" <?php selected($PGPP_Font_Style, '_lucida' ); ?>>Lucida Grande</option>
						<option value="_OpenSansBold" <?php selected($PGPP_Font_Style, 'OpenSansBold' ); ?>>OpenSansBold</option>
						<option value="_palatino" <?php selected($PGPP_Font_Style, '_palatino' ); ?>>Palatino</option>
						<option value="_sans" <?php selected($PGPP_Font_Style, '_sans' ); ?>>Sans</option>
						<option value="_sans" <?php selected($PGPP_Font_Style, 'Sans-Serif' ); ?>>Sans-Serif</option>
						<option value="_tahoma" <?php selected($PGPP_Font_Style, '_tahoma' ); ?>>Tahoma</option>
						<option value="_times"<?php selected($PGPP_Font_Style, '_times' ); ?>>Times New Roman</option>
						<option value="_trebuchet" <?php selected($PGPP_Font_Style, 'Trebuchet' ); ?>>Trebuchet</option>
						<option value="_verdana" <?php selected($PGPP_Font_Style, '_verdana' ); ?>>Verdana</option>
					</optgroup>
					<optgroup label="Google Fonts">
						<option value="Abel"<?php selected($PGPP_Font_Style, 'Abel' ); ?>>Abel</option>
						<option value="Abril Fatface" <?php selected($PGPP_Font_Style, 'Abril Fatface' ); ?>>Abril Fatface</option>
						<option value="Aclonica" <?php selected($PGPP_Font_Style, 'Aclonica' ); ?>>Aclonica</option>
						<option value="Acme" <?php selected($PGPP_Font_Style, 'Acme' ); ?>>Acme</option>
						<option value="Actor" <?php selected($PGPP_Font_Style, 'Actor' ); ?>>Actor</option>
						<option value="Adamina" <?php selected($PGPP_Font_Style, 'Adamina' ); ?>>Adamina</option>
						<option value="Advent Pro" <?php selected($PGPP_Font_Style, 'Advent Pro' ); ?>>Advent Pro</option>
						<option value="Aguafina Script" <?php selected($PGPP_Font_Style, 'Aguafina Script' ); ?>>Aguafina Script</option>
						<option value="Aladin" <?php selected($PGPP_Font_Style, 'Aladin' ); ?>>Aladin</option>
						<option value="Aldrich" <?php selected($PGPP_Font_Style, 'Aldrich' ); ?>>Aldrich</option>
						<option value="Alegreya" <?php selected($PGPP_Font_Style, 'Alegreya' ); ?>>Alegreya</option>
						<option value="Alegreya SC" <?php selected($PGPP_Font_Style, 'Alegreya SC' ); ?>>Alegreya SC</option>
						<option value="Alex Brush" <?php selected($PGPP_Font_Style, 'Alex Brush' ); ?>>Alex Brush</option>
						<option value="Alfa Slab One" <?php selected($PGPP_Font_Style, 'Alfa Slab One' ); ?>>Alfa Slab One</option>
						<option value="Alice" <?php selected($PGPP_Font_Style, 'Alice' ); ?>>Alice</option>
						<option value="Alike" <?php selected($PGPP_Font_Style, 'Alike' ); ?>>Alike</option>
						<option value="Alike Angular" <?php selected($PGPP_Font_Style, 'Alike Angular' ); ?>>Alike Angular</option>
						<option value="Allan" <?php selected($PGPP_Font_Style, 'Allan' ); ?>>Allan</option>
						<option value="Allerta" <?php selected($PGPP_Font_Style, 'Allerta' ); ?>>Allerta</option>
						<option value="Allerta Stencil"<?php selected($PGPP_Font_Style, 'Allerta Stencil' ); ?>>Allerta Stencil</option>
						<option value="Allura" <?php selected($PGPP_Font_Style, 'Allura' ); ?>>Allura</option>
						<option value="Almendra" <?php selected($PGPP_Font_Style, 'Almendra' ); ?>>Almendra</option>
						<option value="Almendra SC"<?php selected($PGPP_Font_Style, 'Almendra SC' ); ?>>Almendra SC</option>
						<option value="Amaranth" <?php selected($PGPP_Font_Style, 'Amaranth' ); ?>>Amaranth</option> <option value="Amatic SC"<?php selected($PGPP_Font_Style, 'Amatic SC' ); ?>>Amatic SC</option>
						<option value="Amethysta" <?php selected($PGPP_Font_Style, 'Amethysta' ); ?>>Amethysta</option><option value="Andada"<?php selected($PGPP_Font_Style, 'Andada' ); ?>>Andada</option>
						<option value="Andika" <?php selected($PGPP_Font_Style, 'Andika' ); ?>>Andika</option>
						<option value="Angkor" <?php selected($PGPP_Font_Style, 'Angkor' ); ?>>Angkor</option>
						<option value="Annie Use Your Telescope" <?php selected($PGPP_Font_Style, 'Annie Use Your Telescope' ); ?>>Annie Use Your Telescope</option>
						<option value="Anonymous Pro" <?php selected($PGPP_Font_Style, 'Anonymous Pro' ); ?>>Anonymous Pro</option>
						<option value="Antic" <?php selected($PGPP_Font_Style, 'Antic' ); ?>>Antic</option>
						<option value="Antic Didone" <?php selected($PGPP_Font_Style, 'Antic Didone' ); ?>>Antic Didone</option>
						<option value="Antic Slab" <?php selected($PGPP_Font_Style, 'Antic Slab' ); ?>>Antic Slab</option>
						<option value="Anton" <?php selected($PGPP_Font_Style, 'Anton' ); ?>>Anton</option>
						<option value="Arapey" <?php selected($PGPP_Font_Style, 'Arapey' ); ?>>Arapey</option>
						<option value="Arbutus" <?php selected($PGPP_Font_Style, 'Arbutus' ); ?>>Arbutus</option>
						<option value="Architects Daughter" <?php selected($PGPP_Font_Style, 'Architects Daughter' ); ?>>Architects Daughter</option>
						<option value="Arimo" <?php selected($PGPP_Font_Style, 'Arimo' ); ?>>Arimo</option>
						<option value="Arizonia" <?php selected($PGPP_Font_Style, 'Arizonia' ); ?>>Arizonia</option>
						<option value="Armata" <?php selected($PGPP_Font_Style, 'Armata' ); ?>>Armata</option>
						<option value="Artifika" <?php selected($PGPP_Font_Style, 'Artifika' ); ?>>Artifika</option>
						<option value="Arvo" <?php selected($PGPP_Font_Style, 'Arvo' ); ?>>Arvo</option>
						<option value="Asap" <?php selected($PGPP_Font_Style, 'Asap' ); ?>>Asap</option>
						<option value="Asset" <?php selected($PGPP_Font_Style, 'Asset' ); ?>>Asset</option>
						<option value="Astloch" <?php selected($PGPP_Font_Style, 'Astloch' ); ?>>Astloch</option>
						<option value="Asul" <?php selected($PGPP_Font_Style, 'Asul' ); ?>>Asul</option>
						<option value="Atomic Age" <?php selected($PGPP_Font_Style, 'Atomic Age' ); ?>>Atomic Age</option>
						<option value="Aubrey" <?php selected($PGPP_Font_Style, 'Aubrey' ); ?>>Aubrey</option>
						<option value="Audiowide" <?php selected($PGPP_Font_Style, 'Audiowide' ); ?>>Audiowide</option>
						<option value="Average" <?php selected($PGPP_Font_Style, 'Average' ); ?>>Average</option>
						<option value="Averia Gruesa Libre" <?php selected($PGPP_Font_Style, 'Averia Gruesa Libre' ); ?>>Averia Gruesa Libre</option>
						<option value="Averia Libre" <?php selected($PGPP_Font_Style, 'Averia Libre' ); ?>>Averia Libre</option>
						<option value="Averia Sans Libre" <?php selected($PGPP_Font_Style, 'Averia Sans Libre' ); ?>>Averia Sans Libre</option>
						<option value="Averia Serif Libre" <?php selected($PGPP_Font_Style, 'Averia Serif Libre' ); ?>>Averia Serif Libre</option>
						<option value="Bad Script" <?php selected($PGPP_Font_Style, 'Bad Script' ); ?>>Bad Script</option>
						<option value="Balthazar" <?php selected($PGPP_Font_Style, 'Balthazar' ); ?>>Balthazar</option>
						<option value="Bangers" <?php selected($PGPP_Font_Style, 'Bangers' ); ?>>Bangers</option>
						<option value="Basic" <?php selected($PGPP_Font_Style, 'Basic' ); ?>>Basic</option>
						<option value="Battambang" <?php selected($PGPP_Font_Style, 'Battambang' ); ?>>Battambang</option>
						<option value="Baumans" <?php selected($PGPP_Font_Style, 'Baumans' ); ?>>Baumans</option>
						<option value="Bayon" <?php selected($PGPP_Font_Style, 'Bayon' ); ?>>Bayon</option>
						<option value="Belgrano"<?php selected($PGPP_Font_Style, 'Belgrano' ); ?>>Belgrano</option>
						<option value="Belleza" <?php selected($PGPP_Font_Style, 'Belleza' ); ?>>Belleza</option>
						<option value="Bentham" <?php selected($PGPP_Font_Style, 'Bentham' ); ?>>Bentham</option>
						<option value="Berkshire Swash"<?php selected($PGPP_Font_Style, 'Berkshire Swash' ); ?>>Berkshire Swash</option>
						<option value="Bevan"  <?php selected($PGPP_Font_Style, 'Bevan' ); ?>>Bevan</option>
						<option value="Bigshot One"<?php selected($PGPP_Font_Style, 'Bigshot One' ); ?>>Bigshot One</option>
						<option value="Bilbo" <?php selected($PGPP_Font_Style, 'Bilbo' ); ?>>Bilbo</option>
						<option value="Bilbo Swash Caps" <?php selected($PGPP_Font_Style, 'Bilbo Swash Caps' ); ?>>Bilbo Swash Caps</option>
						<option value="Bitter" <?php selected($PGPP_Font_Style, 'Bitter' ); ?>>Bitter</option>
						<option value="Black Ops One" <?php selected($PGPP_Font_Style, 'Black Ops One' ); ?>>Black Ops One</option>
						<option value="Bokor" <?php selected($PGPP_Font_Style, 'Bokor' ); ?>>Bokor</option>
						<option value="Bonbon" <?php selected($PGPP_Font_Style, 'Bonbon' ); ?>>Bonbon</option>
						<option value="Boogaloo" <?php selected($PGPP_Font_Style, 'Boogaloo' ); ?>>Boogaloo</option>
						<option value="Bowlby One" <?php selected($PGPP_Font_Style, 'Bowlby One' ); ?>>Bowlby One</option>
						<option value="Bowlby One SC" <?php selected($PGPP_Font_Style, 'Bowlby One SC' ); ?>>Bowlby One SC</option>
						<option value="Brawler" <?php selected($PGPP_Font_Style, 'Brawler' ); ?>>Brawler</option>
						<option value="Bree Serif" <?php selected($PGPP_Font_Style, 'Bree Serif' ); ?>>Bree Serif</option>
						<option value="Bubblegum Sans"  <?php selected($PGPP_Font_Style, 'Bubblegum Sans' ); ?>>Bubblegum Sans</option>
						<option value="Buda"  <?php selected($PGPP_Font_Style, 'Buda' ); ?>>Buda</option>
						<option value="Buenard"  <?php selected($PGPP_Font_Style, 'Buenard' ); ?>>Buenard</option>
						<option value="Butcherman"  <?php selected($PGPP_Font_Style, 'Butcherman' ); ?>>Butcherman</option>
						<option value="Butterfly Kids" <?php selected($PGPP_Font_Style, 'Butterfly Kids' ); ?>>Butterfly Kids</option>
						<option value="Cabin"  <?php selected($PGPP_Font_Style, 'Cabin' ); ?>>Cabin</option>
						<option value="Cabin Condensed"  <?php selected($PGPP_Font_Style, 'Cabin Condensed' ); ?>>Cabin Condensed</option>
						<option value="Cabin Sketch"  <?php selected($PGPP_Font_Style, 'Cabin Sketch' ); ?>>Cabin Sketch</option>
						<option value="Caesar Dressing"  <?php selected($PGPP_Font_Style, 'Caesar Dressing' ); ?>>Caesar Dressing</option>
						<option value="Cagliostro"  <?php selected($PGPP_Font_Style, 'Cagliostro' ); ?>>Cagliostro</option>
						<option value="Calligraffitti"  <?php selected($PGPP_Font_Style, 'Calligraffitti' ); ?>>Calligraffitti</option>
						<option value="Cambo"  <?php selected($PGPP_Font_Style, 'Cambo' ); ?>>Cambo</option>
						<option value="Candal"  <?php selected($PGPP_Font_Style, 'Candal' ); ?>>Candal</option>
						<option value="Cantarell"  <?php selected($PGPP_Font_Style, 'Cantarell' ); ?>>Cantarell</option>
						<option value="Cantata One"  <?php selected($PGPP_Font_Style, 'Cantata One' ); ?>>Cantata One</option>
						<option value="Cardo"  <?php selected($PGPP_Font_Style, 'Cardo' ); ?>>Cardo</option>
						<option value="Carme"  <?php selected($PGPP_Font_Style, 'Carme' ); ?>>Carme</option>
						<option value="Carter One"  <?php selected($PGPP_Font_Style, 'Carter One' ); ?>>Carter One</option>
						<option value="Caudex"  <?php selected($PGPP_Font_Style, 'Caudex' ); ?>>Caudex</option>
						<option value="Cedarville Cursive"  <?php selected($PGPP_Font_Style, 'Cedarville Cursive' ); ?>>Cedarville Cursive</option>
						<option value="Ceviche One"  <?php selected($PGPP_Font_Style, 'Ceviche One' ); ?>>Ceviche One</option>
						<option value="Changa One"  <?php selected($PGPP_Font_Style, 'Changa One' ); ?>>Changa One</option>
						<option value="Chango"  <?php selected($PGPP_Font_Style, 'Chango' ); ?>>Chango</option>
						<option value="Chau Philomene One"  <?php selected($PGPP_Font_Style, 'Chau Philomene One' ); ?>>Chau Philomene One</option>
						<option value="Chelsea Market"  <?php selected($PGPP_Font_Style, 'Chelsea Market' ); ?>>Chelsea Market</option>
						<option value="Chenla"  <?php selected($PGPP_Font_Style, 'Chenla' ); ?>>Chenla</option>
						<option value="Cherry Cream Soda"  <?php selected($PGPP_Font_Style, 'Cherry Cream Soda' ); ?>>Cherry Cream Soda</option>
						<option value="Chewy"  <?php selected($PGPP_Font_Style, 'Chewy' ); ?>>Chewy</option>
						<option value="Chicle"  <?php selected($PGPP_Font_Style, 'Chicle' ); ?>>Chicle</option>
						<option value="Chivo"  <?php selected($PGPP_Font_Style, 'Chivo' ); ?>>Chivo</option>
						<option value="Coda"  <?php selected($PGPP_Font_Style, 'Coda' ); ?>>Coda</option>
						<option value="Coda Caption"  <?php selected($PGPP_Font_Style, 'Coda Caption' ); ?>>Coda Caption</option>
						<option value="Codystar"  <?php selected($PGPP_Font_Style, 'Codystar' ); ?>>Codystar</option>
						<option value="Comfortaa"  <?php selected($PGPP_Font_Style, 'Comfortaa' ); ?>>Comfortaa</option>
						<option value="Coming Soon"  <?php selected($PGPP_Font_Style, 'Coming Soon' ); ?>>Coming Soon</option>
						<option value="Concert One"  <?php selected($PGPP_Font_Style, 'Concert One' ); ?>>Concert One</option>
						<option value="Condiment"  <?php selected($PGPP_Font_Style, 'Condiment' ); ?>>Condiment</option>
						<option value="Content"  <?php selected($PGPP_Font_Style, 'Content' ); ?>>Content</option>
						<option value="Contrail One"  <?php selected($PGPP_Font_Style, 'Contrail One' ); ?>>Contrail One</option>
						<option value="Convergence"  <?php selected($PGPP_Font_Style, 'Convergence' ); ?>>Convergence</option>
						<option value="Cookie"  <?php selected($PGPP_Font_Style, 'Cookie' ); ?>>Cookie</option>
						<option value="Copse"  <?php selected($PGPP_Font_Style, 'Copse' ); ?>>Copse</option>
						<option value="Corben"  <?php selected($PGPP_Font_Style, 'Corben' ); ?>>Corben</option>
						<option value="Courgette"  <?php selected($PGPP_Font_Style, 'Courgette' ); ?>>Courgette</option>
						<option value="Cousine"  <?php selected($PGPP_Font_Style, 'Cousine' ); ?>>Cousine</option>
						<option value="Coustard"  <?php selected($PGPP_Font_Style, 'Coustard' ); ?>>Coustard</option>
						<option value="Covered By Your Grace"  <?php selected($PGPP_Font_Style, 'Covered By Your Grace' ); ?>>Covered By Your Grace</option>
						<option value="Crafty Girls"  <?php selected($PGPP_Font_Style, 'Crafty Girls' ); ?>>Crafty Girls</option>
						<option value="Creepster"  <?php selected($PGPP_Font_Style, 'Creepster' ); ?>>Creepster</option>
						<option value="Crete Round"  <?php selected($PGPP_Font_Style, 'Crete Round' ); ?>>Crete Round</option>
						<option value="Crimson Text"  <?php selected($PGPP_Font_Style, 'Crimson Text' ); ?>>Crimson Text</option>
						<option value="Crushed"  <?php selected($PGPP_Font_Style, 'Crushed' ); ?>>Crushed</option>
						<option value="Cuprum"  <?php selected($PGPP_Font_Style, 'Cuprum' ); ?>>Cuprum</option>
						<option value="Cutive"  <?php selected($PGPP_Font_Style, 'Cutive' ); ?>>Cutive</option>
						<option value="Damion"  <?php selected($PGPP_Font_Style, 'Damion' ); ?>>Damion</option>
						<option value="Dancing Script"  <?php selected($PGPP_Font_Style, 'Dancing Script' ); ?>>Dancing Script</option>
						<option value="Dangrek"  <?php selected($PGPP_Font_Style, 'Dangrek' ); ?>>Dangrek</option>
						<option value="Dawning of a New Day"  <?php selected($PGPP_Font_Style, 'Dawning of a New Day' ); ?>>Dawning of a New Day</option>
						<option value="Days One"  <?php selected($PGPP_Font_Style, 'Days One' ); ?>>Days One</option>
						<option value="Delius"  <?php selected($PGPP_Font_Style, 'Delius' ); ?>>Delius</option>
						<option value="Delius Swash Caps"  <?php selected($PGPP_Font_Style, 'Delius Swash Caps' ); ?>>Delius Swash Caps</option>
						<option value="Delius Unicase"  <?php selected($PGPP_Font_Style, 'Delius Unicase' ); ?>>Delius Unicase</option>
						<option value="Della Respira"  <?php selected($PGPP_Font_Style, 'Della Respira' ); ?>>Della Respira</option>
						<option value="Devonshire"  <?php selected($PGPP_Font_Style, 'Devonshire' ); ?>>Devonshire</option>
						<option value="Didact Gothic"  <?php selected($PGPP_Font_Style, 'Didact Gothic' ); ?>>Didact Gothic</option>
						<option value="Diplomata"  <?php selected($PGPP_Font_Style, 'Diplomata' ); ?>>Diplomata</option>
						<option value="Diplomata SC"  <?php selected($PGPP_Font_Style, 'Diplomata SC' ); ?>>Diplomata SC</option>
						<option value="Doppio One"  <?php selected($PGPP_Font_Style, 'Doppio One' ); ?>>Doppio One</option>
						<option value="Dorsa"  <?php selected($PGPP_Font_Style, 'Dorsa' ); ?>>Dorsa</option>
						<option value="Dosis"  <?php selected($PGPP_Font_Style, 'Dosis' ); ?>>Dosis</option>
						<option value="Dr Sugiyama"  <?php selected($PGPP_Font_Style, 'Dr Sugiyama' ); ?>>Dr Sugiyama</option>
						<option value="Droid Sans"  <?php selected($PGPP_Font_Style, 'Droid Sans' ); ?>>Droid Sans</option>
						<option value="Droid Sans Mono"  <?php selected($PGPP_Font_Style, 'Droid Sans Mono' ); ?>>Droid Sans Mono</option>
						<option value="Droid Serif" <?php selected($PGPP_Font_Style, 'Droid Serif' ); ?>>Droid Serif</option>
						<option value="Duru Sans" <?php selected($PGPP_Font_Style, 'Duru Sans' ); ?>>Duru Sans</option>
						<option value="Dynalight" <?php selected($PGPP_Font_Style, 'Dynalight' ); ?>>Dynalight</option>
						<option value="EB Garamond" <?php selected($PGPP_Font_Style, 'EB Garamond' ); ?>>EB Garamond</option>
						<option value="Eater" <?php selected($PGPP_Font_Style, 'Eater' ); ?>>Eater</option>
						<option value="Economica" <?php selected($PGPP_Font_Style, 'Economica' ); ?>>Economica</option>
						<option value="Electrolize" <?php selected($PGPP_Font_Style, 'Electrolize' ); ?>>Electrolize</option>
						<option value="Emblema One" <?php selected($PGPP_Font_Style, 'Emblema One' ); ?>>Emblema One</option>
						<option value="Emilys Candy" <?php selected($PGPP_Font_Style, 'Emilys Candy' ); ?>>Emilys Candy</option>
						<option value="Engagement" <?php selected($PGPP_Font_Style, 'Engagement' ); ?>>Engagement</option>
						<option value="Enriqueta" <?php selected($PGPP_Font_Style, 'Enriqueta' ); ?>>Enriqueta</option>
						<option value="Erica One" <?php selected($PGPP_Font_Style, 'Erica One' ); ?>>Erica One</option>
						<option value="Esteban" <?php selected($PGPP_Font_Style, 'Esteban' ); ?>>Esteban</option>
						<option value="Euphoria Script">Euphoria Script</option>
						<option value="Ewert" <?php selected($PGPP_Font_Style, 'Ewert' ); ?>>Ewert</option>
						<option value="Exo" <?php selected($PGPP_Font_Style, 'Exo' ); ?>>Exo</option>
						<option value="Expletus Sans" <?php selected($PGPP_Font_Style, 'Expletus Sans' ); ?>>Expletus Sans</option>
						<option value="Fanwood Text" <?php selected($PGPP_Font_Style, 'Fanwood Text' ); ?>>Fanwood Text</option>
						<option value="Fascinate" <?php selected($PGPP_Font_Style, 'Fascinate' ); ?>>Fascinate</option>
						<option value="Fascinate Inline" <?php selected($PGPP_Font_Style, 'Fascinate Inline' ); ?>>Fascinate Inline</option>
						<option value="Federant" <?php selected($PGPP_Font_Style, 'Federant' ); ?>>Federant</option>
						<option value="Federo" <?php selected($PGPP_Font_Style, 'Federo' ); ?>>Federo</option>
						<option value="Felipa" <?php selected($PGPP_Font_Style, 'Felipa' ); ?>>Felipa</option>
						<option value="Fjord One" <?php selected($PGPP_Font_Style, 'Fjord One' ); ?>>Fjord One</option>
						<option value="Flamenco" <?php selected($PGPP_Font_Style, 'Flamenco' ); ?>>Flamenco</option>
						<option value="Flavors" <?php selected($PGPP_Font_Style, 'Flavors' ); ?>>Flavors</option>
						<option value="Fondamento" <?php selected($PGPP_Font_Style, 'Fondamento' ); ?>>Fondamento</option>
						<option value="Fontdiner Swanky" <?php selected($PGPP_Font_Style, 'Fontdiner Swanky' ); ?>>Fontdiner Swanky</option>
						<option value="Forum" <?php selected($PGPP_Font_Style, 'Forum' ); ?>>Forum</option>
						<option value="Francois One" <?php selected($PGPP_Font_Style, 'Francois One' ); ?>>Francois One</option>
						<option value="Fredericka the Great" <?php selected($PGPP_Font_Style, 'Fredericka the Great' ); ?>>Fredericka the Great</option>
						<option value="Fredoka One" <?php selected($PGPP_Font_Style, 'Fredoka One' ); ?>>Fredoka One</option>
						<option value="Freehand" <?php selected($PGPP_Font_Style, 'Freehand' ); ?>>Freehand</option>
						<option value="Fresca" <?php selected($PGPP_Font_Style, 'Fresca' ); ?>>Fresca</option>
						<option value="Frijole" <?php selected($PGPP_Font_Style, 'Frijole' ); ?>>Frijole</option>
						<option value="Fugaz One" <?php selected($PGPP_Font_Style, 'Fugaz One' ); ?>>Fugaz One</option>
						<option value="GFS Didot" <?php selected($PGPP_Font_Style, 'GFS Didot' ); ?>>GFS Didot</option>
						<option value="GFS Neohellenic" <?php selected($PGPP_Font_Style, 'GFS Neohellenic' ); ?>>GFS Neohellenic</option>
						<option value="Galdeano" <?php selected($PGPP_Font_Style, 'Galdeano' ); ?>>Galdeano</option>
						<option value="Gentium Basic" <?php selected($PGPP_Font_Style, 'Gentium Basic' ); ?>>Gentium Basic</option>
						<option value="Gentium Book Basic" <?php selected($PGPP_Font_Style, 'Gentium Book Basic' ); ?>>Gentium Book Basic</option>
						<option value="Geo" <?php selected($PGPP_Font_Style, 'Geo' ); ?>>Geo</option>
						<option value="Geostar" <?php selected($PGPP_Font_Style, 'Geostar' ); ?>>Geostar</option>
						<option value="Geostar Fill" <?php selected($PGPP_Font_Style, 'Geostar Fill' ); ?>>Geostar Fill</option>
						<option value="Germania One" <?php selected($PGPP_Font_Style, 'Germania One' ); ?>>Germania One</option>
						<option value="Give You Glory" <?php selected($PGPP_Font_Style, 'Give You Glory' ); ?>>Give You Glory</option>
						<option value="Glass Antiqua" <?php selected($PGPP_Font_Style, 'Glass Antiqua' ); ?>>Glass Antiqua</option>
						<option value="Glegoo" <?php selected($PGPP_Font_Style, 'Glegoo' ); ?>>Glegoo</option>
						<option value="Gloria Hallelujah" <?php selected($PGPP_Font_Style, 'Gloria Hallelujah' ); ?>>Gloria Hallelujah</option>
						<option value="Goblin One" <?php selected($PGPP_Font_Style, 'Goblin One' ); ?>>Goblin One</option>
						<option value="Gochi Hand" <?php selected($PGPP_Font_Style, 'Gochi Hand' ); ?>>Gochi Hand</option>
						<option value="Gorditas" <?php selected($PGPP_Font_Style, 'Gorditas' ); ?>>Gorditas</option>
						<option value="Goudy Bookletter 1911" <?php selected($PGPP_Font_Style, 'Goudy Bookletter 191' ); ?>>Goudy Bookletter 1911</option>
						<option value="Graduate" <?php selected($PGPP_Font_Style, 'Graduate' ); ?>>Graduate</option>
						<option value="Gravitas One" <?php selected($PGPP_Font_Style, 'Gravitas One' ); ?>>Gravitas One</option>
						<option value="Great Vibes" <?php selected($PGPP_Font_Style, 'Great Vibes' ); ?>>Great Vibes</option>
						<option value="Gruppo" <?php selected($PGPP_Font_Style, 'Gruppo' ); ?>>Gruppo</option>
						<option value="Gudea" <?php selected($PGPP_Font_Style, 'Gudea' ); ?>>Gudea</option>
						<option value="Habibi" <?php selected($PGPP_Font_Style, 'Habibi' ); ?>>Habibi</option>
						<option value="Hammersmith One" <?php selected($PGPP_Font_Style, 'Hammersmith One' ); ?>>Hammersmith One</option>
						<option value="Handlee" <?php selected($PGPP_Font_Style, 'Handlee' ); ?>>Handlee</option>
						<option value="Hanuman" <?php selected($PGPP_Font_Style, 'Hanuman' ); ?>>Hanuman</option>
						<option value="Happy Monkey" <?php selected($PGPP_Font_Style, 'Happy Monkey' ); ?>>Happy Monkey</option>
						<option value="Henny Penny" <?php selected($PGPP_Font_Style, 'Henny Penny' ); ?>>Henny Penny</option>
						<option value="Herr Von Muellerhoff" <?php selected($PGPP_Font_Style, 'Herr Von Muellerhoff' ); ?>>Herr Von Muellerhoff</option>
						<option value="Holtwood One SC" <?php selected($PGPP_Font_Style, 'Holtwood One SC' ); ?>>Holtwood One SC</option>
						<option value="Homemade Apple" <?php selected($PGPP_Font_Style, 'Homemade Apple' ); ?>>Homemade Apple</option>
						<option value="Homenaje" <?php selected($PGPP_Font_Style, 'Homenaje' ); ?>>Homenaje</option>
						<option value="IM Fell DW Pica" <?php selected($PGPP_Font_Style, 'IM Fell DW Pica' ); ?>>IM Fell DW Pica</option>
						<option value="IM Fell DW Pica SC" <?php selected($PGPP_Font_Style, 'IM Fell DW Pica SC' ); ?>>IM Fell DW Pica SC</option>
						<option value="IM Fell Double Pica" <?php selected($PGPP_Font_Style, 'IM Fell Double Pica' ); ?>>IM Fell Double Pica</option>
						<option value="IM Fell Double Pica SC" <?php selected($PGPP_Font_Style, 'IM Fell Double Pica SC' ); ?>>IM Fell Double Pica SC</option>
						<option value="IM Fell English" <?php selected($PGPP_Font_Style, 'IM Fell English' ); ?>>IM Fell English</option>
						<option value="IM Fell English SC" <?php selected($PGPP_Font_Style, 'IM Fell English SC' ); ?>>IM Fell English SC</option>
						<option value="IM Fell French Canon" <?php selected($PGPP_Font_Style, 'IM Fell French Canon' ); ?>>IM Fell French Canon</option>
						<option value="IM Fell French Canon SC" <?php selected($PGPP_Font_Style, 'IM Fell French Canon SC' ); ?>>IM Fell French Canon SC</option>
						<option value="IM Fell Great Primer" <?php selected($PGPP_Font_Style, 'IM Fell Great Primer' ); ?>>IM Fell Great Primer</option>
						<option value="IM Fell Great Primer SC" <?php selected($PGPP_Font_Style, 'IM Fell Great Primer SC' ); ?>>IM Fell Great Primer SC</option>
						<option value="Iceberg" <?php selected($PGPP_Font_Style, 'Iceberg' ); ?>>Iceberg</option>
						<option value="Iceland" <?php selected($PGPP_Font_Style, 'Iceland' ); ?>>Iceland</option>
						<option value="Imprima" <?php selected($PGPP_Font_Style, 'Imprima' ); ?>>Imprima</option>
						<option value="Inconsolata" <?php selected($PGPP_Font_Style, 'Inconsolata' ); ?>>Inconsolata</option>
						<option value="Inder" <?php selected($PGPP_Font_Style, 'Inder' ); ?>>Inder</option>
						<option value="Indie Flower" <?php selected($PGPP_Font_Style, 'Indie Flower' ); ?>>Indie Flower</option>
						<option value="Inika" <?php selected($PGPP_Font_Style, 'Inika' ); ?>>Inika</option>
						<option value="Irish Grover" <?php selected($PGPP_Font_Style, 'Irish Grover' ); ?>>Irish Grover</option>
						<option value="Istok Web" <?php selected($PGPP_Font_Style, 'Istok Web' ); ?>>Istok Web</option>
						<option value="Italiana" <?php selected($PGPP_Font_Style, 'Italiana' ); ?>>Italiana</option>
						<option value="Italianno" <?php selected($PGPP_Font_Style, 'Italianno' ); ?>>Italianno</option>
						<option value="Jim Nightshade" <?php selected($PGPP_Font_Style, 'Jim Nightshade' ); ?>>Jim Nightshade</option>
						<option value="Jockey One" <?php selected($PGPP_Font_Style, 'Jockey One' ); ?>>Jockey One</option>
						<option value="Jolly Lodger" <?php selected($PGPP_Font_Style, 'Jolly Lodger' ); ?>>Jolly Lodger</option>
						<option value="Josefin Sans" <?php selected($PGPP_Font_Style, 'Josefin Sans' ); ?>>Josefin Sans</option>
						<option value="Josefin Slab" <?php selected($PGPP_Font_Style, 'Josefin Slab' ); ?>>Josefin Slab</option>
						<option value="Judson" <?php selected($PGPP_Font_Style, 'Judson' ); ?>>Judson</option>
						<option value="Julee" <?php selected($PGPP_Font_Style, 'Julee' ); ?>>Julee</option>
						<option value="Junge" <?php selected($PGPP_Font_Style, 'Junge' ); ?>>Junge</option>
						<option value="Jura" <?php selected($PGPP_Font_Style, 'Jura' ); ?>>Jura</option>
						<option value="Just Another Hand" <?php selected($PGPP_Font_Style, 'Just Another Hand' ); ?>>Just Another Hand</option>
						<option value="Just Me Again Down Here" <?php selected($PGPP_Font_Style, 'Just Me Again Down Here' ); ?>>Just Me Again Down Here</option>
						<option value="Kameron" <?php selected($PGPP_Font_Style, 'Kameron' ); ?>>Kameron</option>
						<option value="Karla" <?php selected($PGPP_Font_Style, 'Karla' ); ?>>Karla</option>
						<option value="Kaushan Script" <?php selected($PGPP_Font_Style, 'Kaushan Script' ); ?>>Kaushan Script</option>
						<option value="Kelly Slab" <?php selected($PGPP_Font_Style, 'Kelly Slab' ); ?>>Kelly Slab</option>
						<option value="Kenia" <?php selected($PGPP_Font_Style, 'Kenia' ); ?>>Kenia</option>
						<option value="Khmer" <?php selected($PGPP_Font_Style, 'Khmer' ); ?>>Khmer</option>
						<option value="Knewave" <?php selected($PGPP_Font_Style, 'Knewave' ); ?>>Knewave</option>
						<option value="Kotta One" <?php selected($PGPP_Font_Style, 'Kotta One' ); ?>>Kotta One</option>
						<option value="Koulen" <?php selected($PGPP_Font_Style, 'Koulen' ); ?>>Koulen</option>
						<option value="Kranky" <?php selected($PGPP_Font_Style, 'Kranky' ); ?>>Kranky</option>
						<option value="Kreon" <?php selected($PGPP_Font_Style, 'Kreon' ); ?>>Kreon</option>
						<option value="Kristi" <?php selected($PGPP_Font_Style, 'Kristi' ); ?>>Kristi</option>
						<option value="Krona One" <?php selected($PGPP_Font_Style, 'Krona One' ); ?>>Krona One</option>
						<option value="La Belle Aurore" <?php selected($PGPP_Font_Style, 'La Belle Aurore' ); ?>>La Belle Aurore</option>
						<option value="Lancelot" <?php selected($PGPP_Font_Style, 'Lancelot' ); ?>>Lancelot</option>
						<option value="Lato" <?php selected($PGPP_Font_Style, 'Lato' ); ?>>Lato</option>
						<option value="League Script" <?php selected($PGPP_Font_Style, 'League Script' ); ?>>League Script</option>
						<option value="Leckerli One" <?php selected($PGPP_Font_Style, 'Leckerli One' ); ?>>Leckerli One</option>
						<option value="Ledger" <?php selected($PGPP_Font_Style, 'Ledger' ); ?>>Ledger</option>
						<option value="Lekton" <?php selected($PGPP_Font_Style, 'Lekton' ); ?>>Lekton</option>
						<option value="Lemon" <?php selected($PGPP_Font_Style, 'Lemon' ); ?>>Lemon</option>
						<option value="Lilita One" <?php selected($PGPP_Font_Style, 'Lilita One' ); ?>>Lilita One</option>
						<option value="Limelight" <?php selected($PGPP_Font_Style, 'Limelight' ); ?>>Limelight</option>
						<option value="Linden Hill" <?php selected($PGPP_Font_Style, 'Linden Hill' ); ?>>Linden Hill</option>
						<option value="Lobster" <?php selected($PGPP_Font_Style, 'Lobster' ); ?>>Lobster</option>
						<option value="Lobster Two" <?php selected($PGPP_Font_Style, 'Lobster Two' ); ?>>Lobster Two</option>
						<option value="Londrina Outline" <?php selected($PGPP_Font_Style, 'Londrina Outline' ); ?>>Londrina Outline</option>
						<option value="Londrina Shadow" <?php selected($PGPP_Font_Style, 'Londrina Shadow' ); ?>>Londrina Shadow</option>
						<option value="Londrina Sketch" <?php selected($PGPP_Font_Style, 'Londrina Sketch' ); ?>>Londrina Sketch</option>
						<option value="Londrina Solid" <?php selected($PGPP_Font_Style, 'Londrina Solid' ); ?>>Londrina Solid</option>
						<option value="Lora" <?php selected($PGPP_Font_Style, 'Lora' ); ?>>Lora</option>
						<option value="Love Ya Like A Sister" <?php selected($PGPP_Font_Style, 'Love Ya Like A Sister' ); ?>>Love Ya Like A Sister</option>
						<option value="Loved by the King" <?php selected($PGPP_Font_Style, 'Loved by the King' ); ?>>Loved by the King</option>
						<option value="Lovers Quarrel" <?php selected($PGPP_Font_Style, 'Lovers Quarrel' ); ?>>Lovers Quarrel</option>
						<option value="Luckiest Guy" <?php selected($PGPP_Font_Style, 'Luckiest Guy' ); ?>>Luckiest Guy</option>
						<option value="Lusitana" <?php selected($PGPP_Font_Style, 'Lusitana' ); ?>>Lusitana</option>
						<option value="Lustria" <?php selected($PGPP_Font_Style, 'Lustria' ); ?>>Lustria</option>
						<option value="Macondo" <?php selected($PGPP_Font_Style, 'Macondo' ); ?>>Macondo</option>
						<option value="Macondo Swash Caps" <?php selected($PGPP_Font_Style, 'Macondo Swash Caps' ); ?>>Macondo Swash Caps</option>
						<option value="Magra" <?php selected($PGPP_Font_Style, 'Magra' ); ?>>Magra</option>
						<option value="Maiden Orange" <?php selected($PGPP_Font_Style, 'Maiden Orange' ); ?>>Maiden Orange</option>
						<option value="Mako" <?php selected($PGPP_Font_Style, 'Mako' ); ?>>Mako</option>
						<option value="Marck Script" <?php selected($PGPP_Font_Style, 'Marck Script' ); ?>>Marck Script</option>
						<option value="Marko One" <?php selected($PGPP_Font_Style, 'Marko One' ); ?>>Marko One</option>
						<option value="Marmelad" <?php selected($PGPP_Font_Style, 'Marmelad' ); ?>>Marmelad</option>
						<option value="Marvel" <?php selected($PGPP_Font_Style, 'Marvel' ); ?>>Marvel</option>
						<option value="Mate" <?php selected($PGPP_Font_Style, 'Mate' ); ?>>Mate</option>
						<option value="Mate SC" <?php selected($PGPP_Font_Style, 'Mate SC' ); ?>>Mate SC</option>
						<option value="Maven Pro" <?php selected($PGPP_Font_Style, 'Maven Pro' ); ?>>Maven Pro</option>
						<option value="Meddon" <?php selected($PGPP_Font_Style, 'Meddon' ); ?>>Meddon</option>
						<option value="MedievalSharp" <?php selected($PGPP_Font_Style, 'MedievalSharp' ); ?>>MedievalSharp</option>
						<option value="Medula One" <?php selected($PGPP_Font_Style, 'Medula One' ); ?>>Medula One</option>
						<option value="Megrim" <?php selected($PGPP_Font_Style, 'Megrim' ); ?>>Megrim</option>
						<option value="Merienda One" <?php selected($PGPP_Font_Style, 'Merienda One' ); ?>>Merienda One</option>
						<option value="Merriweather" <?php selected($PGPP_Font_Style, 'Merriweather' ); ?>>Merriweather</option>
						<option value="Metal" <?php selected($PGPP_Font_Style, 'Metal' ); ?>>Metal</option>
						<option value="Metamorphous"<?php selected($PGPP_Font_Style, 'Metamorphous' ); ?>>Metamorphous</option>
						<option value="Metrophobic" <?php selected($PGPP_Font_Style, 'Metrophobic' ); ?>>Metrophobic</option>
						<option value="Michroma" <?php selected($PGPP_Font_Style, 'Michroma' ); ?>>Michroma</option>
						<option value="Miltonian" <?php selected($PGPP_Font_Style, 'Miltonian' ); ?>>Miltonian</option>
						<option value="Miltonian Tattoo" <?php selected($PGPP_Font_Style, 'Miltonian Tattoo' ); ?>>Miltonian Tattoo</option>
						<option value="Miniver" <?php selected($PGPP_Font_Style, 'Miniver' ); ?>>Miniver</option>
						<option value="Miss Fajardose" <?php selected($PGPP_Font_Style, 'Miss Fajardose' ); ?>>Miss Fajardose</option>
						<option value="Modern Antiqua" <?php selected($PGPP_Font_Style, 'Modern Antiqua' ); ?>>Modern Antiqua</option>
						<option value="Molengo" <?php selected($PGPP_Font_Style, 'Molengo' ); ?>>Molengo</option>
						<option value="Monofett" <?php selected($PGPP_Font_Style, 'Monofett' ); ?>>Monofett</option>
						<option value="Monoton" <?php selected($PGPP_Font_Style, 'Monoton' ); ?>>Monoton</option>
						<option value="Monsieur La Doulaise" <?php selected($PGPP_Font_Style, 'Monsieur La Doulaise' ); ?>>Monsieur La Doulaise</option>
						<option value="Montaga" <?php selected($PGPP_Font_Style, 'Montaga' ); ?>>Montaga</option>
						<option value="Montez" <?php selected($PGPP_Font_Style, 'Montez' ); ?>>Montez</option>
						<option value="Montserrat" <?php selected($PGPP_Font_Style, 'Montserrat' ); ?>>Montserrat</option>
						<option value="Moul" <?php selected($PGPP_Font_Style, 'Moul' ); ?>>Moul</option>
						<option value="Moulpali" <?php selected($PGPP_Font_Style, 'Moulpali' ); ?>>Moulpali</option>
						<option value="Mountains of Christmas" <?php selected($PGPP_Font_Style, 'Mountains of Christmas' ); ?>>Mountains of Christmas</option>
						<option value="Mr Bedfort" <?php selected($PGPP_Font_Style, 'Mr Bedfort' ); ?>>Mr Bedfort</option>
						<option value="Mr Dafoe" <?php selected($PGPP_Font_Style, 'Mr Dafoe' ); ?>>Mr Dafoe</option>
						<option value="Mr De Haviland" <?php selected($PGPP_Font_Style, 'Mr De Haviland' ); ?>>Mr De Haviland</option>
						<option value="Mrs Saint Delafield" <?php selected($PGPP_Font_Style, 'Mrs Saint Delafield' ); ?>>Mrs Saint Delafield</option>
						<option value="Mrs Sheppards" <?php selected($PGPP_Font_Style, 'Mrs Sheppards' ); ?>>Mrs Sheppards</option>
						<option value="Muli" <?php selected($PGPP_Font_Style, 'Muli' ); ?>>Muli</option>
						<option value="Mystery Quest" <?php selected($PGPP_Font_Style, 'Mystery Quest' ); ?>>Mystery Quest</option>
						<option value="Neucha" <?php selected($PGPP_Font_Style, 'Neucha' ); ?>>Neucha</option>
						<option value="Neuton" <?php selected($PGPP_Font_Style, 'Neuton' ); ?>>Neuton</option>
						<option value="News Cycle" <?php selected($PGPP_Font_Style, 'News Cycle' ); ?>>News Cycle</option>
						<option value="Niconne" <?php selected($PGPP_Font_Style, 'Niconne' ); ?>>Niconne</option>
						<option value="Nixie One" <?php selected($PGPP_Font_Style, 'Nixie One' ); ?>>Nixie One</option>
						<option value="Nobile" <?php selected($PGPP_Font_Style, 'Nobile' ); ?>>Nobile</option>
						<option value="Nokora" <?php selected($PGPP_Font_Style, 'Nokora' ); ?>>Nokora</option>
						<option value="Norican" <?php selected($PGPP_Font_Style, 'Norican' ); ?>>Norican</option>
						<option value="Nosifer" <?php selected($PGPP_Font_Style, 'Nosifer' ); ?>>Nosifer</option>
						<option value="Nothing You Could Do" <?php selected($PGPP_Font_Style, 'Nothing You Could Do' ); ?>>Nothing You Could Do</option>
						<option value="Noticia Text" <?php selected($PGPP_Font_Style, 'Noticia Text' ); ?>>Noticia Text</option>
						<option value="Nova Cut" <?php selected($PGPP_Font_Style, 'Nova Cut' ); ?>>Nova Cut</option>
						<option value="Nova Flat" <?php selected($PGPP_Font_Style, 'Nova Flat' ); ?>>Nova Flat</option>
						<option value="Nova Mono" <?php selected($PGPP_Font_Style, 'Nova Mono' ); ?>>Nova Mono</option>
						<option value="Nova Oval" <?php selected($PGPP_Font_Style, 'Nova Oval' ); ?>>Nova Oval</option>
						<option value="Nova Round" <?php selected($PGPP_Font_Style, 'Nova Round' ); ?>>Nova Round</option>
						<option value="Nova Script" <?php selected($PGPP_Font_Style, 'Nova Script' ); ?>>Nova Script</option>
						<option value="Nova Slim" <?php selected($PGPP_Font_Style, 'Nova Slim' ); ?>>Nova Slim</option>
						<option value="Nova Square" <?php selected($PGPP_Font_Style, 'Nova Square' ); ?>>Nova Square</option>
						<option value="Numans" <?php selected($PGPP_Font_Style, 'Numans' ); ?>>Numans</option>

						<option value="Nunito" <?php selected($PGPP_Font_Style, 'Nunito' ); ?>>Nunito</option>
						<option value="Odor Mean Chey" <?php selected($PGPP_Font_Style, 'Odor Mean Chey' ); ?>>Odor Mean Chey</option>
						<option value="Old Standard TT" <?php selected($PGPP_Font_Style, 'Old Standard TT' ); ?>>Old Standard TT</option>
						<option value="Oldenburg" <?php selected($PGPP_Font_Style, 'Oldenburg' ); ?>>Oldenburg</option>
						<option value="Oleo Script" <?php selected($PGPP_Font_Style, 'Oleo Script' ); ?>>Oleo Script</option>
						<option value="Open Sans" <?php selected($PGPP_Font_Style, 'Open Sans' ); ?>>Open Sans</option>
						<option value="Open Sans Condensed" <?php selected($PGPP_Font_Style, 'Open Sans Condensed' ); ?>>Open Sans Condensed</option>
						<option value="Orbitron" <?php selected($PGPP_Font_Style, 'Orbitron' ); ?>>Orbitron</option>
						<option value="Original Surfer" <?php selected($PGPP_Font_Style, 'Original Surfer' ); ?>>Original Surfer</option>
						<option value="Oswald" <?php selected($PGPP_Font_Style, 'Oswald' ); ?>>Oswald</option>
						<option value="Over the Rainbow" <?php selected($PGPP_Font_Style, 'Over the Rainbow' ); ?>>Over the Rainbow</option>
						<option value="Overlock" <?php selected($PGPP_Font_Style, 'Overlock' ); ?>>Overlock</option>
						<option value="Overlock SC" <?php selected($PGPP_Font_Style, 'Overlock SC' ); ?>>Overlock SC</option>
						<option value="Ovo" <?php selected($PGPP_Font_Style, 'Ovo' ); ?>>Ovo</option>
						<option value="Oxygen" <?php selected($PGPP_Font_Style, 'Oxygen' ); ?>>Oxygen</option>
						<option value="PT Mono" <?php selected($PGPP_Font_Style, 'PT Mono' ); ?>>PT Mono</option>
						<option value="PT Sans" <?php selected($PGPP_Font_Style, 'PT Sans' ); ?>>PT Sans</option>
						<option value="PT Sans Caption" <?php selected($PGPP_Font_Style, 'PT Sans Caption' ); ?>>PT Sans Caption</option>
						<option value="PT Sans Narrow" <?php selected($PGPP_Font_Style, 'PT Sans Narrow' ); ?>>PT Sans Narrow</option>
						<option value="PT Serif" <?php selected($PGPP_Font_Style, 'PT Serif' ); ?>>PT Serif</option>
						<option value="PT Serif Caption" <?php selected($PGPP_Font_Style, 'PT Serif Caption' ); ?>>PT Serif Caption</option>
						<option value="Pacifico" <?php selected($PGPP_Font_Style, 'Pacifico' ); ?>>Pacifico</option>
						<option value="Parisienne" <?php selected($PGPP_Font_Style, 'Parisienne' ); ?>>Parisienne</option>
						<option value="Passero One" <?php selected($PGPP_Font_Style, 'Passero One' ); ?>>Passero One</option>
						<option value="Passion One" <?php selected($PGPP_Font_Style, 'Passion One' ); ?>>Passion One</option>
						<option value="Patrick Hand" <?php selected($PGPP_Font_Style, 'Patrick Hand' ); ?>>Patrick Hand</option>
						<option value="Patua One" <?php selected($PGPP_Font_Style, 'Patua One' ); ?>>Patua One</option>
						<option value="Paytone One" <?php selected($PGPP_Font_Style, 'Paytone One' ); ?>>Paytone One</option>
						<option value="Permanent Marker" <?php selected($PGPP_Font_Style, 'Permanent Marker' ); ?>>Permanent Marker</option>
						<option value="Petrona" <?php selected($PGPP_Font_Style, 'Petrona' ); ?>>Petrona</option>
						<option value="Philosopher" <?php selected($PGPP_Font_Style, 'Philosopher' ); ?>>Philosopher</option>
						<option value="Piedra" <?php selected($PGPP_Font_Style, 'Piedra' ); ?>>Piedra</option>
						<option value="Pinyon Script" <?php selected($PGPP_Font_Style, 'Pinyon Script' ); ?>>Pinyon Script</option>
						<option value="Plaster" <?php selected($PGPP_Font_Style, 'Plaster' ); ?>>Plaster</option>
						<option value="Play" <?php selected($PGPP_Font_Style, 'Play' ); ?>>Play</option>
						<option value="Playball" <?php selected($PGPP_Font_Style, 'Playball' ); ?>>Playball</option>
						<option value="Playfair Display" <?php selected($PGPP_Font_Style, 'Playfair Display' ); ?>>Playfair Display</option>
						<option value="Podkova" <?php selected($PGPP_Font_Style, 'Podkova' ); ?>>Podkova</option>
						<option value="Poiret One" <?php selected($PGPP_Font_Style, 'Poiret One' ); ?>>Poiret One</option>
						<option value="Poller One" <?php selected($PGPP_Font_Style, 'Poller One' ); ?>>Poller One</option>
						<option value="Poly" <?php selected($PGPP_Font_Style, 'Poly' ); ?>>Poly</option>
						<option value="Pompiere" <?php selected($PGPP_Font_Style, 'Pompiere' ); ?>>Pompiere</option>
						<option value="Pontano Sans" <?php selected($PGPP_Font_Style, 'Pontano Sans' ); ?>>Pontano Sans</option>
						<option value="Port Lligat Sans" <?php selected($PGPP_Font_Style, 'Port Lligat Sans' ); ?>>Port Lligat Sans</option>
						<option value="Port Lligat Slab" <?php selected($PGPP_Font_Style, 'Port Lligat Slab' ); ?>>Port Lligat Slab</option>
						<option value="Prata" <?php selected($PGPP_Font_Style, 'Prata' ); ?>>Prata</option>
						<option value="Preahvihear" <?php selected($PGPP_Font_Style, 'Preahvihear' ); ?>>Preahvihear</option>
						<option value="Press Start 2P" <?php selected($PGPP_Font_Style, 'Press Start 2P' ); ?>>Press Start 2P</option>
						<option value="Princess Sofia" <?php selected($PGPP_Font_Style, 'Princess Sofia' ); ?>>Princess Sofia</option>
						<option value="Prociono" <?php selected($PGPP_Font_Style, 'Prociono' ); ?>>Prociono</option>
						<option value="Prosto One" <?php selected($PGPP_Font_Style, 'Prosto One' ); ?>>Prosto One</option>
						<option value="Puritan" <?php selected($PGPP_Font_Style, 'Puritan' ); ?>>Puritan</option>
						<option value="Quantico" <?php selected($PGPP_Font_Style, 'Quantico' ); ?>>Quantico</option>
						<option value="Quattrocento" <?php selected($PGPP_Font_Style, 'Quattrocento' ); ?>>Quattrocento</option>
						<option value="Quattrocento Sans" <?php selected($PGPP_Font_Style, 'Quattrocento Sans' ); ?>>Quattrocento Sans</option>
						<option value="Questrial" <?php selected($PGPP_Font_Style, 'Questrial' ); ?>>Questrial</option>
						<option value="Quicksand" <?php selected($PGPP_Font_Style, 'Quicksand' ); ?>>Quicksand</option>
						<option value="Qwigley" <?php selected($PGPP_Font_Style, 'Qwigley' ); ?>>Qwigley</option>
						<option value="Radley" <?php selected($PGPP_Font_Style, 'Radley' ); ?>>Radley</option>
						<option value="Raleway" <?php selected($PGPP_Font_Style, 'Raleway' ); ?>>Raleway</option>
						<option value="Rammetto One" <?php selected($PGPP_Font_Style, 'Rammetto One' ); ?>>Rammetto One</option>
						<option value="Rancho" <?php selected($PGPP_Font_Style, 'Rancho' ); ?>>Rancho</option>
						<option value="Rationale" <?php selected($PGPP_Font_Style, 'Rationale' ); ?>>Rationale</option>
						<option value="Redressed" <?php selected($PGPP_Font_Style, 'Redressed' ); ?>>Redressed</option>
						<option value="Reenie Beanie" <?php selected($PGPP_Font_Style, 'Reenie Beanie' ); ?>>Reenie Beanie</option>
						<option value="Revalia" <?php selected($PGPP_Font_Style, 'Revalia' ); ?>>Revalia</option>
						<option value="Ribeye" <?php selected($PGPP_Font_Style, 'Ribeye' ); ?>>Ribeye</option>
						<option value="Ribeye Marrow" <?php selected($PGPP_Font_Style, 'Ribeye Marrow' ); ?>>Ribeye Marrow</option>
						<option value="Righteous" <?php selected($PGPP_Font_Style, 'Righteous' ); ?>>Righteous</option>
						<option value="Rochester" <?php selected($PGPP_Font_Style, 'Rochester' ); ?>>Rochester</option>
						<option value="Rock Salt" <?php selected($PGPP_Font_Style, 'Rock Salt' ); ?>>Rock Salt</option>
						<option value="Rokkitt" <?php selected($PGPP_Font_Style, 'Rokkitt' ); ?>>Rokkitt</option>
						<option value="Ropa Sans" <?php selected($PGPP_Font_Style, 'Ropa Sans' ); ?>>Ropa Sans</option>
						<option value="Rosario" <?php selected($PGPP_Font_Style, 'Rosario' ); ?>>Rosario</option>
						<option value="Rosarivo" <?php selected($PGPP_Font_Style, 'Rosarivo' ); ?>>Rosarivo</option>
						<option value="Rouge Script" <?php selected($PGPP_Font_Style, 'Rouge Script' ); ?>>Rouge Script</option>
						<option value="Ruda" <?php selected($PGPP_Font_Style, 'Ruda' ); ?>>Ruda</option>
						<option value="Ruge Boogie" <?php selected($PGPP_Font_Style, 'Ruge Boogie' ); ?>>Ruge Boogie</option>
						<option value="Ruluko" <?php selected($PGPP_Font_Style, 'Ruluko' ); ?>>Ruluko</option>
						<option value="Ruslan Display" <?php selected($PGPP_Font_Style, 'Ruslan Display' ); ?>>Ruslan Display</option>
						<option value="Russo One" <?php selected($PGPP_Font_Style, 'Russo One' ); ?>>Russo One</option>
						<option value="Ruthie" <?php selected($PGPP_Font_Style, 'Ruthie' ); ?>>Ruthie</option>
						<option value="Sail" <?php selected($PGPP_Font_Style, 'Sail' ); ?>>Sail</option>
						<option value="Salsa" <?php selected($PGPP_Font_Style, 'Salsa' ); ?>>Salsa</option>
						<option value="Sancreek" <?php selected($PGPP_Font_Style, 'Sancreek' ); ?>>Sancreek</option>
						<option value="Sansita One" <?php selected($PGPP_Font_Style, 'Sansita One' ); ?>>Sansita One</option>
						<option value="Sarina" <?php selected($PGPP_Font_Style, 'Sarina' ); ?>>Sarina</option>
						<option value="Satisfy" <?php selected($PGPP_Font_Style, 'Satisfy' ); ?>>Satisfy</option>
						<option value="Schoolbell" <?php selected($PGPP_Font_Style, 'Schoolbell' ); ?>>Schoolbell</option>
						<option value="Seaweed Script" <?php selected($PGPP_Font_Style, 'Seaweed Script' ); ?>>Seaweed Script</option>
						<option value="Sevillana" <?php selected($PGPP_Font_Style, 'Sevillana' ); ?>>Sevillana</option>
						<option value="Shadows Into Light" <?php selected($PGPP_Font_Style, 'Shadows Into Light' ); ?>>Shadows Into Light</option>
						<option value="Shadows Into Light Two" <?php selected($PGPP_Font_Style, 'Shadows Into Light Two' ); ?>>Shadows Into Light Two</option>
						<option value="Shanti" <?php selected($PGPP_Font_Style, 'Shanti' ); ?>>Shanti</option>
						<option value="Share">Share</option>
						<option value="Shojumaru" <?php selected($PGPP_Font_Style, 'Shojumaru' ); ?>>Shojumaru</option>
						<option value="Short Stack" <?php selected($PGPP_Font_Style, 'Short Stack' ); ?>>Short Stack</option>
						<option value="Siemreap"<?php selected($PGPP_Font_Style, 'Siemreap' ); ?>>Siemreap</option>
						<option value="Sigmar One" <?php selected($PGPP_Font_Style, 'Sigmar One' ); ?>>Sigmar One</option>
						<option value="Signika"<?php selected($PGPP_Font_Style, 'Signika' ); ?>>Signika</option>
						<option value="Signika Negative" <?php selected($PGPP_Font_Style, 'Signika Negative' ); ?>>Signika Negative</option>
						<option value="Simonetta" <?php selected($PGPP_Font_Style, 'Simonetta' ); ?>>Simonetta</option>
						<option value="Sirin Stencil" <?php selected($PGPP_Font_Style, 'Sirin Stencil' ); ?>>Sirin Stencil</option>
						<option value="Six Caps" <?php selected($PGPP_Font_Style, 'Six Caps' ); ?>>Six Caps</option>
						<option value="Slackey" <?php selected($PGPP_Font_Style, 'Slackey' ); ?>>Slackey</option>
						<option value="Smokum" <?php selected($PGPP_Font_Style, 'Smokum' ); ?>>Smokum</option>
						<option value="Smythe" <?php selected($PGPP_Font_Style, 'Smythe' ); ?>>Smythe</option>
						<option value="Sniglet" <?php selected($PGPP_Font_Style, 'Sniglet' ); ?>>Sniglet</option>
						<option value="Snippet" <?php selected($PGPP_Font_Style, 'Snippet' ); ?>>Snippet</option>
						<option value="Sofia" <?php selected($PGPP_Font_Style, 'Sofia' ); ?>>Sofia</option>
						<option value="Sonsie One" <?php selected($PGPP_Font_Style, 'Sonsie One' ); ?>>Sonsie One</option>
						<option value="Sorts Mill Goudy" <?php selected($PGPP_Font_Style, 'Sorts Mill Goudy' ); ?>>Sorts Mill Goudy</option>
						<option value="Special Elite" <?php selected($PGPP_Font_Style, 'Special Elite' ); ?>>Special Elite</option>
						<option value="Spicy Rice" <?php selected($PGPP_Font_Style, 'Spicy Rice' ); ?>>Spicy Rice</option>
						<option value="Spinnaker" <?php selected($PGPP_Font_Style, 'Spinnaker' ); ?>>Spinnaker</option>
						<option value="Spirax" <?php selected($PGPP_Font_Style, 'Spirax' ); ?>>Spirax</option>
						<option value="Squada One" <?php selected($PGPP_Font_Style, 'Squada One' ); ?>>Squada One</option>
						<option value="Stardos Stencil" <?php selected($PGPP_Font_Style, 'Stardos Stencil' ); ?>>Stardos Stencil</option>
						<option value="Stint Ultra Condensed" <?php selected($PGPP_Font_Style, 'Stint Ultra Condensed' ); ?>>Stint Ultra Condensed</option>
						<option value="Stint Ultra Expanded" <?php selected($PGPP_Font_Style, 'Stint Ultra Expanded' ); ?>>Stint Ultra Expanded</option>
						<option value="Stoke" <?php selected($PGPP_Font_Style, 'Stoke' ); ?>>Stoke</option>
						<option value="Sue Ellen Francisco" <?php selected($PGPP_Font_Style, 'Sue Ellen Francisco' ); ?>>Sue Ellen Francisco</option>
						<option value="Sunshiney" <?php selected($PGPP_Font_Style, 'Sunshiney' ); ?>>Sunshiney</option>
						<option value="Supermercado One" <?php selected($PGPP_Font_Style, 'Supermercado One' ); ?>>Supermercado One</option>
						<option value="Suwannaphum" <?php selected($PGPP_Font_Style, 'Suwannaphum' ); ?>>Suwannaphum</option>
						<option value="Swanky and Moo Moo" <?php selected($PGPP_Font_Style, 'Swanky and Moo Moo' ); ?>>Swanky and Moo Moo</option>
						<option value="Syncopate" <?php selected($PGPP_Font_Style, 'Syncopate' ); ?>>Syncopate</option>
						<option value="Tangerine" <?php selected($PGPP_Font_Style, 'Tangerine' ); ?>>Tangerine</option>
						<option value="Taprom" <?php selected($PGPP_Font_Style, 'Taprom' ); ?>>Taprom</option>
						<option value="Telex" <?php selected($PGPP_Font_Style, 'Telex' ); ?>>Telex</option>
						<option value="Tenor Sans" <?php selected($PGPP_Font_Style, 'Tenor Sans' ); ?>>Tenor Sans</option>
						<option value="The Girl Next Door" <?php selected($PGPP_Font_Style, 'The Girl Next Door' ); ?>>The Girl Next Door</option>
						<option value="Tienne" <?php selected($PGPP_Font_Style, 'Tienne' ); ?>>Tienne</option>
						<option value="Tinos" <?php selected($PGPP_Font_Style, 'Tinos' ); ?>>Tinos</option>
						<option value="Titan One" <?php selected($PGPP_Font_Style, 'Titan One' ); ?>>Titan One</option>
						<option value="Trade Winds" <?php selected($PGPP_Font_Style, 'Trade Winds' ); ?> >Trade Winds</option>
						<option value="Trocchi" <?php selected($PGPP_Font_Style, 'Trocchi' ); ?>>Trocchi</option>
						<option value="Trochut" <?php selected($PGPP_Font_Style, 'Trochut' ); ?>>Trochut</option>
						<option value="Trykker" <?php selected($PGPP_Font_Style, 'Trykker' ); ?>>Trykker</option>
						<option value="Tulpen One" <?php selected($PGPP_Font_Style, 'Tulpen One' ); ?>>Tulpen One</option>
						<option value="Ubuntu" <?php selected($PGPP_Font_Style, 'Ubuntu' ); ?>>Ubuntu</option>
						<option value="Ubuntu Condensed" <?php selected($PGPP_Font_Style, 'Ubuntu Condensed' ); ?>>Ubuntu Condensed</option>
						<option value="Ubuntu Mono" <?php selected($PGPP_Font_Style, 'Ubuntu Mono' ); ?>>Ubuntu Mono</option>
						<option value="Ultra" <?php selected($PGPP_Font_Style, 'Ultra' ); ?>>Ultra</option>
						<option value="Uncial Antiqua" <?php selected($PGPP_Font_Style, 'Uncial Antiqua' ); ?>>Uncial Antiqua</option>
						<option value="UnifrakturCook" <?php selected($PGPP_Font_Style, 'UnifrakturCook' ); ?>>UnifrakturCook</option>
						<option value="UnifrakturMaguntia" <?php selected($PGPP_Font_Style, 'UnifrakturMaguntia' ); ?>>UnifrakturMaguntia</option>
						<option value="Unkempt" <?php selected($PGPP_Font_Style, 'Unkempt' ); ?>>Unkempt</option>
						<option value="Unlock" <?php selected($PGPP_Font_Style, 'Unlock' ); ?>>Unlock</option>
						<option value="Unna" <?php selected($PGPP_Font_Style, 'Unna' ); ?>>Unna</option>
						<option value="VT323" <?php selected($PGPP_Font_Style, 'VT323' ); ?>>VT323</option>
						<option value="Varela" <?php selected($PGPP_Font_Style, 'Varela' ); ?>>Varela</option>
						<option value="Varela Round" <?php selected($PGPP_Font_Style, 'Varela Round' ); ?>>Varela Round</option>
						<option value="Vast Shadow" <?php selected($PGPP_Font_Style, 'Vast Shadow' ); ?>>Vast Shadow</option>
						<option value="Vibur" <?php selected($PGPP_Font_Style, 'Vibur' ); ?>>Vibur</option>
						<option value="Vidaloka" <?php selected($PGPP_Font_Style, 'Vidaloka' ); ?>>Vidaloka</option>
						<option value="Viga" <?php selected($PGPP_Font_Style, 'Viga' ); ?>>Viga</option>
						<option value="Voces" <?php selected($PGPP_Font_Style, 'Voces' ); ?>>Voces</option>
						<option value="Volkhov" <?php selected($PGPP_Font_Style, 'Volkhov' ); ?>>Volkhov</option>
						<option value="Vollkorn" <?php selected($PGPP_Font_Style, 'Vollkorn' ); ?>>Vollkorn</option>
						<option value="Voltaire" <?php selected($PGPP_Font_Style, 'Voltaire' ); ?>>Voltaire</option>
						<option value="Waiting for the Sunrise" <?php selected($PGPP_Font_Style, 'Waiting for the Sunrise' ); ?>>Waiting for the Sunrise</option>
						<option value="Wallpoet" <?php selected($PGPP_Font_Style, 'Wallpoet' ); ?>>Wallpoet</option>
						<option value="Walter Turncoat" <?php selected($PGPP_Font_Style, 'Walter Turncoat' ); ?>>Walter Turncoat</option>
						<option value="Wellfleet" <?php selected($PGPP_Font_Style, 'Wellfleet' ); ?>>Wellfleet</option>
						<option value="Wire One" <?php selected($PGPP_Font_Style, 'Wire One' ); ?>>Wire One</option>
						<option value="Yanone Kaffeesatz" <?php selected($PGPP_Font_Style, 'Yanone Kaffeesatz' ); ?>>Yanone Kaffeesatz</option>
						<option value="Yellowtail" <?php selected($PGPP_Font_Style, 'Yellowtail' ); ?>>Yellowtail</option>
						<option value="Yeseva One" <?php selected($PGPP_Font_Style, 'Yeseva One' ); ?>>Yeseva One</option>
						<option value="Yesteryear" <?php selected($PGPP_Font_Style, 'Yesteryear' ); ?>>Yesteryear</option>
						<option value="Zeyada" <?php selected($PGPP_Font_Style, 'Zeyada' ); ?>>Zeyada</option>
					</optgroup>
				</select>
				<p class="description">
					<?php _e('Choose a caption font style.','PGPP_TEXT_DOMAIN')?>
					<a href="#" id="p9" data-tooltip="#s9"><?php _e('Preview','PGPP_TEXT_DOMAIN')?></a>
				</p>
			</td>
		</tr>

		<tr>
			<th scope="row"><label><?php _e('Light Box Styles','PGPP_TEXT_DOMAIN')?></label></th>
			<td>
				<?php if($PGPP_Light_Box == "") $PGPP_Light_Box = "lightbox2"; ?>
				<select name="PGPP_Light_Box" id="PGPP_Light_Box">
					<optgroup label="Select Light Box Styles">
						<option value="lightbox2" <?php if($PGPP_Light_Box == 'lightbox2') echo "selected=selected"; ?>>Pretty photo</option>
						<option value="lightbox3" <?php if($PGPP_Light_Box == 'lightbox3') echo "selected=selected"; ?>>Swipe Box</option>
					</optgroup>
				</select>
				<p class="description">
					<?php _e('Choose an image Title style.','PGPP_TEXT_DOMAIN')?>
					<a href="#" id="p10" data-tooltip="#s10"><?php _e('Preview','PGPP_TEXT_DOMAIN')?></a>
				</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Image Border','PGPP_TEXT_DOMAIN')?></label></th>
			<td>
				<?php if($PGPP_Image_Border == "") $PGPP_Image_Border = "yes"; ?>
				<input onclick="return PGPP_BorderClick();" type="radio" name="PGPP_Image_Border" id="PGPP_Image_Border" value="yes" <?php if($PGPP_Image_Border == 'yes' ) { echo "checked"; } ?>> <i class="fa fa-check fa-2x"></i>
				<input onclick="return PGPP_BorderClick();" type="radio" name="PGPP_Image_Border" id="PGPP_Image_Border" value="no" <?php if($PGPP_Image_Border == 'no' ) { echo "checked"; } ?>> <i class="fa fa-times fa-2x"></i>
				<p class="description">
					<?php _e('Select Yes/No option to apply border on portfolio image thumbnails.','PGPP_TEXT_DOMAIN')?>
					<a href="#" id="p11" data-tooltip="#s11"><?php _e('Preview','PGPP_TEXT_DOMAIN')?></a>
				</p>
			</td>
		</tr>
		
		<tr class="bor">
			<th scope="row"><label><?php _e('Image Border Size','PGPP_TEXT_DOMAIN')?></label></th>
			<td>
				<?php if($PGPP_Image_Border_Size == "") $PGPP_Image_Border_Size = "5"; ?>
				<select name="PGPP_Image_Border_Size" id="PGPP_Image_Border_Size">
					<optgroup label="Select Image Border Size">
						<option value="1" <?php if($PGPP_Image_Border_Size == '1') echo "selected=selected"; ?>>1</option>
						<option value="2" <?php if($PGPP_Image_Border_Size == '2') echo "selected=selected"; ?>>2</option>
						<option value="3" <?php if($PGPP_Image_Border_Size == '3') echo "selected=selected"; ?>>3</option>
						<option value="4" <?php if($PGPP_Image_Border_Size == '4') echo "selected=selected"; ?>>4</option>
						<option value="5" <?php if($PGPP_Image_Border_Size == '5') echo "selected=selected"; ?>>5</option>
						<option value="6" <?php if($PGPP_Image_Border_Size == '6') echo "selected=selected"; ?>>6</option>
						<option value="7" <?php if($PGPP_Image_Border_Size == '7') echo "selected=selected"; ?>>7</option>
						<option value="8" <?php if($PGPP_Image_Border_Size == '8') echo "selected=selected"; ?>>8</option>
						<option value="9" <?php if($PGPP_Image_Border_Size == '9') echo "selected=selected"; ?>>9</option>
						<option value="10" <?php if($PGPP_Image_Border_Size == '10') echo "selected=selected"; ?>>10</option>
					</optgroup>
				</select>
				<p class="description">
					<?php _e('Choose a image border size.','PGPP_TEXT_DOMAIN')?>
					<a href="#" id="p12" data-tooltip="#s12"><?php _e('Preview','PGPP_TEXT_DOMAIN')?></a>
				</p>
			</td>
		</tr>
		
		<tr class="bor">
			<th scope="row"><label><?php _e('Image Border Color','PGPP_TEXT_DOMAIN')?></label></th>
			<td>
				<?php if($PGPP_Image_Border_Color == "") $PGPP_Image_Border_Color = "#FFFFFF"; ?>
				<input id="PGPP_Image_Border_Color" name="PGPP_Image_Border_Color" type="text" value="<?php echo $PGPP_Image_Border_Color; ?>" class="my-color-field" data-default-color="#ffffff" />
				<p class="description">
					<?php _e('Select any color to apply on image border.','PGPP_TEXT_DOMAIN')?>
					<a href="#" id="p13" data-tooltip="#s13"><?php _e('Preview','PGPP_TEXT_DOMAIN')?></a>
				</p>
			</td>
		</tr>
		<tr >
			<th scope="row"><label><?php _e('Custom CSS','PGPP_TEXT_DOMAIN')?></label></th>
			<td>
				<textarea id="PGPP_Custom_CSS" name="PGPP_Custom_CSS" type="text" class="" style="width:80%"><?php echo $PGPP_Custom_CSS; ?></textarea>
				<p class="description">
					<?php _e('Enter any custom css you want to apply on this gallery.','PGPP_TEXT_DOMAIN')?><br>
					<?php _e('Note: Please Do Not Use <b>Style</b> Tag With Custom CSS.','PGPP_TEXT_DOMAIN')?>
				</p>
			</td>
		</tr>
	</tbody>
</table>