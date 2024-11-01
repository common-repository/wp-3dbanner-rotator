<?php
global $wpdb, $grtr;
$ops = get_option('rotator_settings', array());
//$ops = array_merge($rotator_settings, $ops);
?>
<div class="wrap">
	<h2><?php _e('Create XML File'); ?></h2>
	<form action="" method="post">
		<input type="hidden" name="task" value="save_rotator_settings" />
		<table>
		<tr>
			<td><?php _e('Slideshow Width'); ?></td>
			<td><input type="text" name="settings[slideshow_width]" value="<?php print  @$ops['slideshow_width']; ?>" /></td>
		</tr>

		<tr>
			<td><?php _e('Slideshow Height'); ?></td>
			<td><input type="text" name="settings[slideshow_height]" value="<?php print  @$ops['slideshow_height']; ?>" /></td>
		</tr>

		<tr>
			<td><?php _e('Navigationbar Color'); ?></td>
			<td><input type="text" name="settings[navbar_color]" class="color {hash:false,caps:true}"  value="<?php print  @$ops['navbar_color']; ?>" /></td>
		</tr>

		<tr>
			<td><?php _e('Navigationbar Height'); ?></td>
			<td><input type="text" name="settings[navbar_height]" value="<?php print  @$ops['navbar_height']; ?>" /></td>
		</tr>

		<tr>
			<td><?php _e('Navigationbar Alpha'); ?></td>
			<td>
				<select name="settings[navbar_alpha]">
					<option value="0.1" <?php print (@$ops['navbar_alpha'] == '0.1') ? 'selected' : ''; ?>><?php _e('0.1');?></option>

					<option value="0.2" <?php print (@$ops['navbar_alpha'] == '0.2') ? 'selected' : ''; ?>><?php _e('0.2');?></option>

					<option value="0.3" <?php print (@$ops['navbar_alpha'] == '0.3') ? 'selected' : ''; ?>><?php _e('0.3');?></option>

					<option value="0.4" <?php print (@$ops['navbar_alpha'] == '0.4') ? 'selected' : ''; ?>><?php _e('0.4');?></option>

					<option value="0.5" <?php print (@$ops['navbar_alpha'] == '0.5') ? 'selected' : ''; ?>><?php _e('0.5');?></option>

					<option value="0.6" <?php print (@$ops['navbar_alpha'] == '0.6') ? 'selected' : ''; ?>><?php _e('0.6');?></option>

					<option value="0.7" <?php print (@$ops['navbar_alpha'] == '0.7') ? 'selected' : ''; ?>><?php _e('0.7');?></option>

					<option value="0.8" <?php print (@$ops['navbar_alpha'] == '0.8') ? 'selected' : ''; ?>><?php _e('0.8');?></option>

					<option value="0.9" <?php print (@$ops['navbar_alpha'] == '0.9') ? 'selected' : ''; ?>><?php _e('0.9');?></option>

					<option value="1" <?php print (@$ops['navbar_alpha'] == '1') ? 'selected' : ''; ?>><?php _e('1');?></option>

				</select>
			</td>
		</tr>

		<tr>
			<td><?php _e('Navigation selected Button Color'); ?></td>
			<td><input type="text" name="settings[navbar_but_color]" class="color {hash:false,caps:true}"  value="<?php print  @$ops['navbar_but_color']; ?>" /></td>
		</tr>

		<tr>
			<td><?php _e('Pregressbar Height'); ?></td>
			<td><input type="text" name="settings[progressbar_height]" value="<?php print  @$ops['progressbar_height']; ?>" /></td>
		</tr>

		<tr>
			<td><?php _e('Progressbar Color'); ?></td>
			<td><input type="text" name="settings[progressbar_color]" class="color {hash:false,caps:true}"  value="<?php print  @$ops['progressbar_color']; ?>" /></td>
		</tr>

		<tr>
			<td><?php _e('Progressbar Alpha'); ?></td>
			<td>
				<select name="settings[progressbar_alpha]">
					<option value="0.1" <?php print (@$ops['progressbar_alpha'] == '0.1') ? 'selected' : ''; ?>><?php _e('0.1');?></option>

					<option value="0.2" <?php print (@$ops['progressbar_alpha'] == '0.2') ? 'selected' : ''; ?>><?php _e('0.2');?></option>

					<option value="0.3" <?php print (@$ops['progressbar_alpha'] == '0.3') ? 'selected' : ''; ?>><?php _e('0.3');?></option>

					<option value="0.4" <?php print (@$ops['progressbar_alpha'] == '0.4') ? 'selected' : ''; ?>><?php _e('0.4');?></option>

					<option value="0.5" <?php print (@$ops['progressbar_alpha'] == '0.5') ? 'selected' : ''; ?>><?php _e('0.5');?></option>

					<option value="0.6" <?php print (@$ops['progressbar_alpha'] == '0.6') ? 'selected' : ''; ?>><?php _e('0.6');?></option>

					<option value="0.7" <?php print (@$ops['progressbar_alpha'] == '0.7') ? 'selected' : ''; ?>><?php _e('0.7');?></option>

					<option value="0.8" <?php print (@$ops['progressbar_alpha'] == '0.8') ? 'selected' : ''; ?>><?php _e('0.8');?></option>

					<option value="0.9" <?php print (@$ops['progressbar_alpha'] == '0.9') ? 'selected' : ''; ?>><?php _e('0.9');?></option>

					<option value="1" <?php print (@$ops['progressbar_alpha'] == '1') ? 'selected' : ''; ?>><?php _e('1');?></option>

				</select>
			</td>
		</tr>

		<tr>
			<td><?php _e('Slideshow Shade color 1'); ?></td>
			<td><input type="text" name="settings[slideshow_shadeclr1]" class="color {hash:false,caps:true}"  value="<?php print  @$ops['slideshow_shadeclr1']; ?>" /></td>
		</tr>

		<tr>
			<td><?php _e('Slideshow Shade color 2'); ?></td>
			<td><input type="text" name="settings[slideshow_shadeclr2]" class="color {hash:false,caps:true}"  value="<?php print  @$ops['slideshow_shadeclr2']; ?>" /></td>
		</tr>

		<tr>
			<td><?php _e('Slideshow Preloader Color'); ?></td>
			<td><input type="text" name="settings[preloader_color]" class="color {hash:false,caps:true}"  value="<?php print  @$ops['preloader_color']; ?>" /></td>
		</tr>

		<tr>
			<td><?php _e('Play/Pause Button Color'); ?></td>
			<td><input type="text" name="settings[play_button_color]" class="color {hash:false,caps:true}"  value="<?php print  @$ops['play_button_color']; ?>" /></td>
		</tr>

		<tr>
			<td><?php _e('Slideshow Corner Radious'); ?></td>
			<td><input type="text" name="settings[slideshowcorner_radious]" value="<?php print  @$ops['slideshowcorner_radious']; ?>" /></td>
		</tr>

		<tr>
			<td><?php _e('Navigation Buttons Corner Radious'); ?></td>
			<td><input type="text" name="settings[navcorner_radious]" value="<?php print  @$ops['navcorner_radious']; ?>" /></td>
		</tr>

		<tr>
			<td><?php _e('Slide Transition Effect'); ?></td>
			<td>
				<select name="settings[slide_trans_effect]">
					<option value="random" <?php print (@$ops['slide_trans_effect'] == 'random') ? 'selected' : ''; ?>><?php _e('Random');?></option>

					<option value="effect1" <?php print (@$ops['slide_trans_effect'] == 'effect1') ? 'selected' : ''; ?>><?php _e('Effect 1');?></option>

					<option value="effect2" <?php print (@$ops['slide_trans_effect'] == 'effect2') ? 'selected' : ''; ?>><?php _e('Effect 2');?></option>

					<option value="effect3" <?php print (@$ops['slide_trans_effect'] == 'effect3') ? 'selected' : ''; ?>><?php _e('Effect 3');?></option>

					<option value="effect4" <?php print (@$ops['slide_trans_effect'] == 'effect4') ? 'selected' : ''; ?>><?php _e('Effect 4');?></option>

					<option value="effect5" <?php print (@$ops['slide_trans_effect'] == 'effect5') ? 'selected' : ''; ?>><?php _e('Effect 5');?></option>

					<option value="effect6" <?php print (@$ops['slide_trans_effect'] == 'effect6') ? 'selected' : ''; ?>><?php _e('Effect 6');?></option>

					<option value="effect7" <?php print (@$ops['slide_trans_effect'] == 'effect7') ? 'selected' : ''; ?>><?php _e('Effect 7');?></option>

					<option value="effect8" <?php print (@$ops['slide_trans_effect'] == 'effect8') ? 'selected' : ''; ?>><?php _e('Effect 8');?></option>

					<option value="effect9" <?php print (@$ops['slide_trans_effect'] == 'effect9') ? 'selected' : ''; ?>><?php _e('Effect 9');?></option>

					<option value="effect10" <?php print (@$ops['slide_trans_effect'] == 'effect10') ? 'selected' : ''; ?>><?php _e('Effect 10');?></option>

				</select>
			</td>
		</tr>

		<tr>
			<td><?php _e('Navigationbar Position'); ?></td>
			<td>
				<select name="settings[navbar_pos]">
					<option value="T" <?php print (@$ops['navbar_pos'] == 'T') ? 'selected' : ''; ?>><?php _e('Top');?></option>

					<option value="R" <?php print (@$ops['navbar_pos'] == 'R') ? 'selected' : ''; ?>><?php _e('Right');?></option>

					<option value="B" <?php print (@$ops['navbar_pos'] == 'B') ? 'selected' : ''; ?>><?php _e('Bottom');?></option>

					<option value="L" <?php print (@$ops['navbar_pos'] == 'L') ? 'selected' : ''; ?>><?php _e('Left');?></option>

				</select>
			</td>
		</tr>

		<tr>
			<td><?php _e('Navigationbar Autohide'); ?></td>
			<td>
				<input type="radio" name="settings[navbar_autohide]" value="yes" <?php print (@$ops['navbar_autohide'] == 'yes') ? 'checked' : ''; ?>><span><?php _e('Yes'); ?></span>
				<input type="radio" name="settings[navbar_autohide]" value="no" <?php print (@$ops['navbar_autohide'] == 'no') ? 'checked' : ''; ?>><span><?php _e('No'); ?></span>
			</td>
		</tr>

		<tr>
			<td><?php _e('Image Scale'); ?></td>
			<td>
				<input type="radio" name="settings[scale_image]" value="true" <?php print (@$ops['scale_image'] == 'true') ? 'checked' : ''; ?>><span><?php _e('Yes'); ?></span>
				<input type="radio" name="settings[scale_image]" value="false" <?php print (@$ops['scale_image'] == 'false') ? 'checked' : ''; ?>><span><?php _e('No'); ?></span>
			</td>
		</tr>

		<tr>
			<td><?php _e('Slide Transition Time'); ?></td>
			<td><input type="text" name="settings[slidetransition_time]" value="<?php print  @$ops['slidetransition_time']; ?>" /></td>
		</tr>

		<tr>
			<td><?php _e('Auto Play'); ?></td>
			<td>
				<input type="radio" name="settings[auto_play]" value="yes" <?php print (@$ops['auto_play'] == 'yes') ? 'checked' : ''; ?>><span><?php _e('Yes'); ?></span>
				<input type="radio" name="settings[auto_play]" value="no" <?php print (@$ops['auto_play'] == 'no') ? 'checked' : ''; ?>><span><?php _e('No'); ?></span>
			</td>
		</tr>

		<tr>
			<td><?php _e('3D / 2D Fragments'); ?></td>
			<td>
				<input type="radio" name="settings[slide_solid]" value="yes" <?php print (@$ops['slide_solid'] == 'yes') ? 'checked' : ''; ?>><span><?php _e('Yes'); ?></span>
				<input type="radio" name="settings[slide_solid]" value="no" <?php print (@$ops['slide_solid'] == 'no') ? 'checked' : ''; ?>><span><?php _e('No'); ?></span>
			</td>
		</tr>

		<tr>
			<td><?php _e('Slildeshow Font'); ?></td>
			<td><input type="text" name="settings[slideshow_font]" value="<?php print  @$ops['slideshow_font']; ?>" /></td>
		</tr>

		<tr>
			<td><?php _e('Title Size'); ?></td>
			<td><input type="text" name="settings[title_size]" value="<?php print  @$ops['title_size']; ?>" /></td>
		</tr>

		<tr>
			<td><?php _e('Title Color'); ?></td>
			<td><input type="text" name="settings[title_color]" class="color {caps:true}"  value="<?php print  @$ops['title_color']; ?>" /></td>
		</tr>
		<tr>
			<td><?php _e('Description Position'); ?></td>
			<td>
				<select name="settings[desc_pos]">
					<option value="TL" <?php print (@$ops['desc_pos'] == 'TL') ? 'selected' : ''; ?>><?php _e('Top Left');?></option>

					<option value="TR" <?php print (@$ops['desc_pos'] == 'TR') ? 'selected' : ''; ?>><?php _e('Top Right');?></option>

					<option value="BL" <?php print (@$ops['desc_pos'] == 'BL') ? 'selected' : ''; ?>><?php _e('Bottom Left');?></option>

					<option value="BR" <?php print (@$ops['desc_pos'] == 'BR') ? 'selected' : ''; ?>><?php _e('Bottom Right');?></option>

				</select>
			</td>
		</tr>

		<tr>
			<td><?php _e('Description Size'); ?></td>
			<td><input type="text" name="settings[desc_size]" value="<?php print  @$ops['desc_size']; ?>" /></td>
		</tr>

		<tr>
			<td><?php _e('Description Color'); ?></td>
			<td><input type="text" name="settings[desc_color]" class="color {caps:true}"  value="<?php print  @$ops['desc_color']; ?>" /></td>
		</tr>

		<tr>
			<td><?php _e('Description Box Bgcolor'); ?></td>
			<td><input type="text" name="settings[descbox_bgcolor]" class="color {hash:false,caps:true}"  value="<?php print  @$ops['descbox_bgcolor']; ?>" /></td>
		</tr>

		
		<tr>
			<td><?php _e('Description Box Bgcolor Alpha'); ?></td>
			<td>
				<select name="settings[descbox_bgcolor_alpha]">
					<option value="0" <?php print (@$ops['descbox_bgcolor_alpha'] == '0') ? 'selected' : ''; ?>><?php _e('No Background');?></option>

					<option value="0.1" <?php print (@$ops['descbox_bgcolor_alpha'] == '0.1') ? 'selected' : ''; ?>><?php _e('0.1');?></option>

					<option value="0.2" <?php print (@$ops['descbox_bgcolor_alpha'] == '0.2') ? 'selected' : ''; ?>><?php _e('0.2');?></option>

					<option value="0.3" <?php print (@$ops['descbox_bgcolor_alpha'] == '0.3') ? 'selected' : ''; ?>><?php _e('0.3');?></option>

					<option value="0.4" <?php print (@$ops['descbox_bgcolor_alpha'] == '0.4') ? 'selected' : ''; ?>><?php _e('0.4');?></option>

					<option value="0.5" <?php print (@$ops['descbox_bgcolor_alpha'] == '0.5') ? 'selected' : ''; ?>><?php _e('0.5');?></option>

					<option value="0.6" <?php print (@$ops['descbox_bgcolor_alpha'] == '0.6') ? 'selected' : ''; ?>><?php _e('0.6');?></option>

					<option value="0.7" <?php print (@$ops['descbox_bgcolor_alpha'] == '0.7') ? 'selected' : ''; ?>><?php _e('0.7');?></option>

					<option value="0.8" <?php print (@$ops['descbox_bgcolor_alpha'] == '0.8') ? 'selected' : ''; ?>><?php _e('0.8');?></option>

					<option value="0.9" <?php print (@$ops['descbox_bgcolor_alpha'] == '0.9') ? 'selected' : ''; ?>><?php _e('0.9');?></option>

					<option value="1" <?php print (@$ops['descbox_bgcolor_alpha'] == '1') ? 'selected' : ''; ?>><?php _e('No Transparancy');?></option>

				</select>
			</td>
		</tr>
		
		
		<tr>
			<td><?php _e('DescriptionBox Vertical Margin'); ?></td>
			<td><input type="text" name="settings[descbox_bgvertmargin]" value="<?php print  @$ops['descbox_bgvertmargin']; ?>" /></td>
		</tr>

		<tr>
			<td><?php _e('DescriptionBox Horizontal Margin'); ?></td>
			<td><input type="text" name="settings[descbox_bghorzmargin]" value="<?php print  @$ops['descbox_bghorzmargin']; ?>" /></td>
		</tr>

		<tr>
			<td><?php _e('Description Vertical Margin'); ?></td>
			<td><input type="text" name="settings[desc_vertmargin]" value="<?php print  @$ops['desc_vertmargin']; ?>" /></td>
		</tr>

		<tr>
			<td><?php _e('Description Horizontal Margin'); ?></td>
			<td><input type="text" name="settings[desc_horzmargin]" value="<?php print  @$ops['desc_horzmargin']; ?>" /></td>
		</tr>

		<tr>
			<td><?php _e('Target Link'); ?></td>
			<td>
				<input type="radio" name="settings[target]" value="_self" <?php print (@$ops['target'] == '_self') ? 'checked' : ''; ?>><span><?php _e('Same Window'); ?></span>
				<input type="radio" name="settings[target]" value="_blank" <?php print (@$ops['target'] == '_blank') ? 'checked' : ''; ?>><span><?php _e('New Window'); ?></span>
			</td>
		</tr>

		<tr>
			<td><?php _e('wmode'); ?></td>
			<td>
				<select name="settings[wmode]">
					<option value="opaque" <?php print (@$ops['wmode'] == 'opaque') ? 'selected' : ''; ?>><?php _e('opaque');?></option>

					<option value="transparent" <?php print (@$ops['wmode'] == 'transparent') ? 'selected' : ''; ?>><?php _e('transparent');?></option>

					<option value="window" <?php print (@$ops['wmode'] == 'window') ? 'selected' : ''; ?>><?php _e('window');?></option>

				</select>
				</td>
		</tr>
		</table>
	<p><button type="submit" class="button-primary"><?php _e('Save Config'); ?></button></p>
	</form>
</div>