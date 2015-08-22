<style>
.sprev {
	margin:8px;
}
</style>
<script>
jQuery(document).ready( function(){
	//Basic
	jQuery('#p3').darkTooltip();
	jQuery('#p4').darkTooltip();
	jQuery('#p5').darkTooltip();
	jQuery('#p6').darkTooltip();
	jQuery('#p7').darkTooltip();
	jQuery('#p8').darkTooltip();
	jQuery('#p9').darkTooltip();
	jQuery('#p10').darkTooltip();
	jQuery('#p11').darkTooltip();
	jQuery('#p12').darkTooltip();
	jQuery('#p13').darkTooltip();
	jQuery('#p14').darkTooltip();
	
	//With some options
	jQuery('#light').darkTooltip({
		animation:'flipIn',
		gravity:'west',
		confirm:true,
		theme:'light'
	});
});
</script>
<?php $PreviewImg = PGPP_PLUGIN_URL.'images/help/'; ?>

<div style="display:none;" id="s3">
	<h4><?php _e('Image Layout','PGPP_TEXT_DOMAIN')?></h4>
	<img src="<?php echo $PreviewImg."Image-style.jpg"; ?>" class="sprev">
</div>

<div style="display:none;" id="s4">
	<h4><?php _e('Image Hover Color','PGPP_TEXT_DOMAIN')?></h4>
	<img src="<?php echo $PreviewImg."image-bg-color.jpg"; ?>" class="sprev">
</div>

<div style="display:none;" id="s5">
	<h4><?php _e('Gallery Title','PGPP_TEXT_DOMAIN')?></h4>
	<img src="<?php echo $PreviewImg."Gallery-title.jpg"; ?>" class="sprev">
</div>

<div style="display:none;" id="s6">
	<h4><?php _e('Image Label','PGPP_TEXT_DOMAIN')?></h4>
	<img src="<?php echo $PreviewImg."Image-label.jpg"; ?>" class="sprev">
</div>

<div style="display:none;" id="s7">
	<h4><?php _e('Gallery Layout','PGPP_TEXT_DOMAIN')?></h4>
	<img src="<?php echo $PreviewImg."3columnlayout.jpg"; ?>" class="sprev">
</div>

<div style="display:none;" id="s8">
	<h4><?php _e('Light Box Styles','PGPP_TEXT_DOMAIN')?></h4>
	<img src="<?php echo $PreviewImg."image-style.jpg"; ?>" class="sprev">
</div>

<div style="display:none;" id="s9">
	<h4><?php _e('Font Style','PGPP_TEXT_DOMAIN')?></h4>
	<img src="<?php echo $PreviewImg."Image-font-style.jpg"; ?>" class="sprev">
</div>

<div style="display:none;" id="s10">
	<h4><?php _e('Light Box Styles','PGPP_TEXT_DOMAIN')?></h4>
	<img src="<?php echo $PreviewImg."Pretty-box.jpg"; ?>" class="sprev">
</div>

<div style="display:none;" id="s11">
	<h4><?php _e('Image Border','PGPP_TEXT_DOMAIN')?></h4>
	<img src="<?php echo $PreviewImg."border.jpg"; ?>" class="sprev">
</div>

<div style="display:none;" id="s12">
	<h4><?php _e('Image Border Size','PGPP_TEXT_DOMAIN')?></h4>
	<img src="<?php echo $PreviewImg."Border-Size.jpg"; ?>" class="sprev">
</div>

<div style="display:none;" id="s13">
	<h4><?php _e('Image Border Color','PGPP_TEXT_DOMAIN')?></h4>
	<img src="<?php echo $PreviewImg."border-shadow-color.jpg"; ?>" class="sprev">
</div>

<div style="display:none;" id="s14">
	<h4><?php _e('Masonry Thumbnails','PGPP_TEXT_DOMAIN')?></h4>
	<img src="<?php echo $PreviewImg."masonary-thumbnails.jpg"; ?>" class="sprev">
</div>