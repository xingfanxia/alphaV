<script>
jQuery(document).ready(function(){
effect_change();
});
function effect_change() {
	var optionvalue = jQuery( "#PGPP_Effect option:selected" ).val();
	jQuery('.tr_effect').hide();
	jQuery('#tr_'+optionvalue+'').show();
	if(optionvalue == "effect2" || optionvalue == "effect5" || optionvalue == "effect13" || optionvalue == "effect17" || optionvalue == "effect19"){
		jQuery('.opacity').show();
	}else{
		jQuery('.opacity').hide();
	}
}
</script>
<tr id="tr_effect2" class="tr_effect">
	<th scope="row"><label><?php _e('Animation','PGPP_TEXT_DOMAIN')?></label></th>
	<td>
		<select name="PGPP_effect2_anim" id="PGPP_effect2_anim">
			<optgroup label="Select Animation">
				<option value="left_to_right" <?php if($PGPP_Effect_animation == 'left_to_right') echo "selected=selected"; ?>><?php _e('Left to Right','PGPP_TEXT_DOMAIN')?></option>
				<option value="right_to_left" <?php if($PGPP_Effect_animation == 'right_to_left') echo "selected=selected"; ?>><?php _e('Right to Left','PGPP_TEXT_DOMAIN')?></option>
				<option value="top_to_bottom" <?php if($PGPP_Effect_animation == 'top_to_bottom') echo "selected=selected"; ?>><?php _e('Top to Bottom','PGPP_TEXT_DOMAIN')?></option>
				<option value="bottom_to_top" <?php if($PGPP_Effect_animation == 'bottom_to_top') echo "selected=selected"; ?>><?php _e('Bottom to Top','PGPP_TEXT_DOMAIN')?></option>
			</optgroup>
		</select>
		<p class="description">
			<?php _e('Choose Animation style.','PGPP_TEXT_DOMAIN')?>
		</p>
	</td>
</tr>
<tr id="tr_effect3" class="tr_effect">
	<th scope="row"><label><?php _e('Animation','PGPP_TEXT_DOMAIN')?></label></th>
	<td>
		<select name="PGPP_effect3_anim" id="PGPP_effect3_anim">
			<optgroup label="Select Animation">
				<option value="left_to_right" <?php if($PGPP_Effect_animation == 'left_to_right') echo "selected=selected"; ?>><?php _e('Left to Right','PGPP_TEXT_DOMAIN')?></option>
				<option value="right_to_left" <?php if($PGPP_Effect_animation == 'right_to_left') echo "selected=selected"; ?>><?php _e('Right to Left','PGPP_TEXT_DOMAIN')?></option>
				<option value="top_to_bottom" <?php if($PGPP_Effect_animation == 'top_to_bottom') echo "selected=selected"; ?>><?php _e('Top to Bottom','PGPP_TEXT_DOMAIN')?></option>
				<option value="bottom_to_top" <?php if($PGPP_Effect_animation == 'bottom_to_top') echo "selected=selected"; ?>><?php _e('Bottom to Top','PGPP_TEXT_DOMAIN')?></option>
			</optgroup>
		</select>
		<p class="description">
			<?php _e('Choose Animation style.','PGPP_TEXT_DOMAIN')?>
		</p>
	</td>
</tr>
<tr id="tr_effect4" class="tr_effect">
	<th scope="row"><label><?php _e('Animation','PGPP_TEXT_DOMAIN')?></label></th>
	<td>
		<select name="PGPP_effect4_anim" id="PGPP_effect4_anim">
			<optgroup label="Select Animation">
				<option value="left_to_right" <?php if($PGPP_Effect_animation == 'left_to_right') echo "selected=selected"; ?>><?php _e('Left to Right','PGPP_TEXT_DOMAIN')?></option>
				<option value="right_to_left" <?php if($PGPP_Effect_animation == 'right_to_left') echo "selected=selected"; ?>><?php _e('Right to Left','PGPP_TEXT_DOMAIN')?></option>
				<option value="top_to_bottom" <?php if($PGPP_Effect_animation == 'top_to_bottom') echo "selected=selected"; ?>><?php _e('Top to Bottom','PGPP_TEXT_DOMAIN')?></option>
				<option value="bottom_to_top" <?php if($PGPP_Effect_animation == 'bottom_to_top') echo "selected=selected"; ?>><?php _e('Bottom to Top','PGPP_TEXT_DOMAIN')?></option>
			</optgroup>
		</select>
		<p class="description">
			<?php _e('Choose Animation style.','PGPP_TEXT_DOMAIN')?>
		</p>
	</td>
</tr>
<tr id="tr_effect6" class="tr_effect">
	<th scope="row"><label><?php _e('Animation','PGPP_TEXT_DOMAIN')?></label></th>
	<td>
		<select name="PGPP_effect6_anim" id="PGPP_effect6_anim">
			<optgroup label="Select Animation">
				<option value="scale_up" <?php if($PGPP_Effect_animation == 'scale_up') echo "selected=selected"; ?>><?php _e('Scale Up','PGPP_TEXT_DOMAIN')?></option>
				<option value="scale_down" <?php if($PGPP_Effect_animation == 'scale_down') echo "selected=selected"; ?>><?php _e('Scale Down','PGPP_TEXT_DOMAIN')?></option>
				<option value="scale_down_up" <?php if($PGPP_Effect_animation == 'scale_down_up') echo "selected=selected"; ?>><?php _e('Scale Down Up','PGPP_TEXT_DOMAIN')?></option>
			</optgroup>
		</select>
		<p class="description">
			<?php _e('Choose Animation style.','PGPP_TEXT_DOMAIN')?>
		</p>
	</td>
</tr>
<tr id="tr_effect7" class="tr_effect">
	<th scope="row"><label><?php _e('Animation','PGPP_TEXT_DOMAIN')?></label></th>
	<td>
		<select name="PGPP_effect7_anim" id="PGPP_effect7_anim">
			<optgroup label="Select Animation">
				<option value="left_to_right" <?php if($PGPP_Effect_animation == 'left_to_right') echo "selected=selected"; ?>><?php _e('Left to Right','PGPP_TEXT_DOMAIN')?></option>
				<option value="right_to_left" <?php if($PGPP_Effect_animation == 'right_to_left') echo "selected=selected"; ?>><?php _e('Right to Left','PGPP_TEXT_DOMAIN')?></option>
				<option value="top_to_bottom" <?php if($PGPP_Effect_animation == 'top_to_bottom') echo "selected=selected"; ?>><?php _e('Top to Bottom','PGPP_TEXT_DOMAIN')?></option>
				<option value="bottom_to_top" <?php if($PGPP_Effect_animation == 'bottom_to_top') echo "selected=selected"; ?>><?php _e('Bottom to Top','PGPP_TEXT_DOMAIN')?></option>
			</optgroup>
		</select>
		<p class="description">
			<?php _e('Choose Animation style.','PGPP_TEXT_DOMAIN')?>
		</p>
	</td>
</tr>
<tr id="tr_effect8" class="tr_effect">
	<th scope="row"><label><?php _e('Animation','PGPP_TEXT_DOMAIN')?></label></th>
	<td>
		<select name="PGPP_effect8_anim" id="PGPP_effect8_anim">
			<optgroup label="Select Animation">
				<option value="left_to_right" <?php if($PGPP_Effect_animation == 'left_to_right') echo "selected=selected"; ?>><?php _e('Left to Right','PGPP_TEXT_DOMAIN')?></option>
				<option value="right_to_left" <?php if($PGPP_Effect_animation == 'right_to_left') echo "selected=selected"; ?>><?php _e('Right to Left','PGPP_TEXT_DOMAIN')?></option>
				<option value="top_to_bottom" <?php if($PGPP_Effect_animation == 'top_to_bottom') echo "selected=selected"; ?>><?php _e('Top to Bottom','PGPP_TEXT_DOMAIN')?></option>
				<option value="bottom_to_top" <?php if($PGPP_Effect_animation == 'bottom_to_top') echo "selected=selected"; ?>><?php _e('Bottom to Top','PGPP_TEXT_DOMAIN')?></option>
			</optgroup>
		</select>
		<p class="description">
			<?php _e('Choose Animation style.','PGPP_TEXT_DOMAIN')?>
		</p>
	</td>
</tr>
<tr id="tr_effect9" class="tr_effect">
	<th scope="row"><label><?php _e('Animation','PGPP_TEXT_DOMAIN')?></label></th>
	<td>
		<select name="PGPP_effect9_anim" id="PGPP_effect9_anim">
			<optgroup label="Select Animation">
				<option value="left_to_right" <?php if($PGPP_Effect_animation == 'left_to_right') echo "selected=selected"; ?>><?php _e('Left to Right','PGPP_TEXT_DOMAIN')?></option>
				<option value="right_to_left" <?php if($PGPP_Effect_animation == 'right_to_left') echo "selected=selected"; ?>><?php _e('Right to Left','PGPP_TEXT_DOMAIN')?></option>
				<option value="top_to_bottom" <?php if($PGPP_Effect_animation == 'top_to_bottom') echo "selected=selected"; ?>><?php _e('Top to Bottom','PGPP_TEXT_DOMAIN')?></option>
				<option value="bottom_to_top" <?php if($PGPP_Effect_animation == 'bottom_to_top') echo "selected=selected"; ?>><?php _e('Bottom to Top','PGPP_TEXT_DOMAIN')?></option>
			</optgroup>
		</select>
		<p class="description">
			<?php _e('Choose Animation style.','PGPP_TEXT_DOMAIN')?>
		</p>
	</td>
</tr>
<tr id="tr_effect10" class="tr_effect">
	<th scope="row"><label><?php _e('Animation','PGPP_TEXT_DOMAIN')?></label></th>
	<td>
		<select name="PGPP_effect10_anim" id="PGPP_effect10_anim">
			<optgroup label="Select Animation">
				<option value="top_to_bottom" <?php if($PGPP_Effect_animation == 'top_to_bottom') echo "selected=selected"; ?>><?php _e('Top to Bottom','PGPP_TEXT_DOMAIN')?></option>
				<option value="bottom_to_top" <?php if($PGPP_Effect_animation == 'bottom_to_top') echo "selected=selected"; ?>><?php _e('Bottom to Top','PGPP_TEXT_DOMAIN')?></option>
			</optgroup>
		</select>
		<p class="description">
			<?php _e('Choose Animation style.','PGPP_TEXT_DOMAIN')?>
		</p>
	</td>
</tr>
<tr id="tr_effect11" class="tr_effect">
	<th scope="row"><label><?php _e('Animation','PGPP_TEXT_DOMAIN')?></label></th>
	<td>
		<select name="PGPP_effect11_anim" id="PGPP_effect11_anim">
			<optgroup label="Select Animation">
				<option value="left_to_right" <?php if($PGPP_Effect_animation == 'left_to_right') echo "selected=selected"; ?>><?php _e('Left to Right','PGPP_TEXT_DOMAIN')?></option>
				<option value="right_to_left" <?php if($PGPP_Effect_animation == 'right_to_left') echo "selected=selected"; ?>><?php _e('Right to Left','PGPP_TEXT_DOMAIN')?></option>
				<option value="top_to_bottom" <?php if($PGPP_Effect_animation == 'top_to_bottom') echo "selected=selected"; ?>><?php _e('Top to Bottom','PGPP_TEXT_DOMAIN')?></option>
				<option value="bottom_to_top" <?php if($PGPP_Effect_animation == 'bottom_to_top') echo "selected=selected"; ?>><?php _e('Bottom to Top','PGPP_TEXT_DOMAIN')?></option>
			</optgroup>
		</select>
		<p class="description">
			<?php _e('Choose Animation style.','PGPP_TEXT_DOMAIN')?>
		</p>
	</td>
</tr>
<tr id="tr_effect12" class="tr_effect">
	<th scope="row"><label><?php _e('Animation','PGPP_TEXT_DOMAIN')?></label></th>
	<td>
		<select name="PGPP_effect12_anim" id="PGPP_effect12_anim">
			<optgroup label="Select Animation">
				<option value="left_to_right" <?php if($PGPP_Effect_animation == 'left_to_right') echo "selected=selected"; ?>><?php _e('Left to Right','PGPP_TEXT_DOMAIN')?></option>
				<option value="right_to_left" <?php if($PGPP_Effect_animation == 'right_to_left') echo "selected=selected"; ?>><?php _e('Right to Left','PGPP_TEXT_DOMAIN')?></option>
				<option value="top_to_bottom" <?php if($PGPP_Effect_animation == 'top_to_bottom') echo "selected=selected"; ?>><?php _e('Top to Bottom','PGPP_TEXT_DOMAIN')?></option>
				<option value="bottom_to_top" <?php if($PGPP_Effect_animation == 'bottom_to_top') echo "selected=selected"; ?>><?php _e('Bottom to Top','PGPP_TEXT_DOMAIN')?></option>
			</optgroup>
		</select>
		<p class="description">
			<?php _e('Choose Animation style.','PGPP_TEXT_DOMAIN')?>
		</p>
	</td>
</tr>
<tr id="tr_effect13" class="tr_effect">
	<th scope="row"><label><?php _e('Animation','PGPP_TEXT_DOMAIN')?></label></th>
	<td>
		<select name="PGPP_effect13_anim" id="PGPP_effect13_anim">
			<optgroup label="Select Animation">
				<option value="from_left_and_right" <?php if($PGPP_Effect_animation == 'from_left_and_right') echo "selected=selected"; ?>><?php _e('Left to Right','PGPP_TEXT_DOMAIN')?></option>
				<option value="top_to_bottom" <?php if($PGPP_Effect_animation == 'top_to_bottom') echo "selected=selected"; ?>><?php _e('Top to Bottom','PGPP_TEXT_DOMAIN')?></option>
				<option value="bottom_to_top" <?php if($PGPP_Effect_animation == 'bottom_to_top') echo "selected=selected"; ?>><?php _e('Bottom to Top','PGPP_TEXT_DOMAIN')?></option>
			</optgroup>
		</select>
		<p class="description">
			<?php _e('Choose Animation style.','PGPP_TEXT_DOMAIN')?>
		</p>
	</td>
</tr>
<tr id="tr_effect14" class="tr_effect">
	<th scope="row"><label><?php _e('Animation','PGPP_TEXT_DOMAIN')?></label></th>
	<td>
		<select name="PGPP_effect14_anim" id="PGPP_effect14_anim">
			<optgroup label="Select Animation">
				<option value="left_to_right" <?php if($PGPP_Effect_animation == 'left_to_right') echo "selected=selected"; ?>><?php _e('Left to Right','PGPP_TEXT_DOMAIN')?></option>
				<option value="right_to_left" <?php if($PGPP_Effect_animation == 'right_to_left') echo "selected=selected"; ?>><?php _e('Right to Left','PGPP_TEXT_DOMAIN')?></option>
				<option value="top_to_bottom" <?php if($PGPP_Effect_animation == 'top_to_bottom') echo "selected=selected"; ?>><?php _e('Top to Bottom','PGPP_TEXT_DOMAIN')?></option>
				<option value="bottom_to_top" <?php if($PGPP_Effect_animation == 'bottom_to_top') echo "selected=selected"; ?>><?php _e('Bottom to Top','PGPP_TEXT_DOMAIN')?></option>
			</optgroup>
		</select>
		<p class="description">
			<?php _e('Choose Animation style.','PGPP_TEXT_DOMAIN')?>
		</p>
	</td>
</tr>
<tr id="tr_effect15" class="tr_effect">
	<th scope="row"><label><?php _e('Animation','PGPP_TEXT_DOMAIN')?></label></th>
	<td>
		<select name="PGPP_effect15_anim" id="PGPP_effect15_anim">
			<optgroup label="Select Animation">
				<option value="left_to_right" <?php if($PGPP_Effect_animation == 'left_to_right') echo "selected=selected"; ?>><?php _e('Left to Right','PGPP_TEXT_DOMAIN')?></option>
			</optgroup>
		</select>
		<p class="description">
			<?php _e('Choose Animation style.','PGPP_TEXT_DOMAIN')?>
		</p>
	</td>
</tr>
<tr id="tr_effect16" class="tr_effect">
	<th scope="row"><label><?php _e('Animation','PGPP_TEXT_DOMAIN')?></label></th>
	<td>
		<select name="PGPP_effect16_anim" id="PGPP_effect16_anim">
			<optgroup label="Select Animation">
				<option value="left_to_right" <?php if($PGPP_Effect_animation == 'left_to_right') echo "selected=selected"; ?>><?php _e('Left to Right','PGPP_TEXT_DOMAIN')?></option>
				<option value="right_to_left" <?php if($PGPP_Effect_animation == 'right_to_left') echo "selected=selected"; ?>><?php _e('Right to Left','PGPP_TEXT_DOMAIN')?></option>
			</optgroup>
		</select>
		<p class="description">
			<?php _e('Choose Animation style.','PGPP_TEXT_DOMAIN')?>
		</p>
	</td>
</tr>
<tr id="tr_effect18" class="tr_effect">
	<th scope="row"><label><?php _e('Animation','PGPP_TEXT_DOMAIN')?></label></th>
	<td>
		<select name="PGPP_effect18_anim" id="PGPP_effect18_anim">
			<optgroup label="Select Animation">
				<option value="bottom_to_top" <?php if($PGPP_Effect_animation == 'bottom_to_top') echo "selected=selected"; ?>><?php _e('Bottom to Top','PGPP_TEXT_DOMAIN')?></option>
				<option value="left_to_right" <?php if($PGPP_Effect_animation == 'left_to_right') echo "selected=selected"; ?>><?php _e('Left to Right','PGPP_TEXT_DOMAIN')?></option>
				<option value="right_to_left" <?php if($PGPP_Effect_animation == 'right_to_left') echo "selected=selected"; ?>><?php _e('Right to Left','PGPP_TEXT_DOMAIN')?></option>
				<option value="top_to_bottom" <?php if($PGPP_Effect_animation == 'top_to_bottom') echo "selected=selected"; ?>><?php _e('Top to Bottom','PGPP_TEXT_DOMAIN')?></option>
			</optgroup>
		</select>
		<p class="description">
			<?php _e('Choose Animation style.','PGPP_TEXT_DOMAIN')?>
		</p>
	</td>
</tr>
<tr id="tr_effect20" class="tr_effect">
	<th scope="row"><label><?php _e('Animation','PGPP_TEXT_DOMAIN')?></label></th>
	<td>
		<select name="PGPP_effect20_anim" id="PGPP_effect20_anim">
			<optgroup label="Select Animation">
				<option value="top_to_bottom" <?php if($PGPP_Effect_animation == 'top_to_bottom') echo "selected=selected"; ?>><?php _e('Top to Bottom','PGPP_TEXT_DOMAIN')?></option>
				<option value="bottom_to_top" <?php if($PGPP_Effect_animation == 'bottom_to_top') echo "selected=selected"; ?>><?php _e('Bottom to Top','PGPP_TEXT_DOMAIN')?></option>
			</optgroup>
		</select>
		<p class="description">
			<?php _e('Choose Animation style.','PGPP_TEXT_DOMAIN')?>
		</p>
	</td>
</tr>