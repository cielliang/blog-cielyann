<?php $styles = $this -> get_option('styles'); ?>

<table class="form-table">
	<tbody>
		<tr>
			<th><label for="styles.width"><?php _e('Gallery Width', $this -> plugin_name); ?></label></th>
			<td>
				<input style="width:45px;" id="styles.width" type="text" name="styles[width]" value="<?= $styles['width']; ?>" /> <?php _e('px', $this -> plugin_name); ?>
				<span class="howto"><?php _e('width of the slideshow gallery', $this -> plugin_name); ?></span>
			</td>
		</tr>
		<tr>
			<th><label for="styles.height"><?php _e('Gallery Height', $this -> plugin_name); ?></label></th>
			<td>
				<input style="width:45px;" id="styles.height" type="text" name="styles[height]" value="<?= $styles['height']; ?>" /> <?php _e('px', $this -> plugin_name); ?>
				<span class="howto"><?php _e('height of the slideshow gallery', $this -> plugin_name); ?></span>
			</td>
		</tr>
		<tr>
			<th><label for="styles.border"><?php _e('Slideshow Border', $this -> plugin_name); ?></label></th>
			<td>
				<input type="text" name="styles[border]" value="<?= $styles['border']; ?>" id="styles.border" style="width:145px;" />
			</td>
		</tr>
		<tr>
			<th><label for="styles.background"><?php _e('Slideshow Background', $this -> plugin_name); ?></label></th>
			<td>
				<input type="text" name="styles[background]" value="<?= $styles['background']; ?>" id="styles.background" style="width:65px;" />
			</td>
		</tr>
		<tr>
			<th><label for="styles.infobackground"><?php _e('Information Background', $this -> plugin_name); ?></label></th>
			<td>
				<input type="text" name="styles[infobackground]" value="<?= $styles['infobackground']; ?>" id="styles.infobackground" style="width:65px;" />
			</td>
		</tr>
		<tr>
			<th><label for="styles.infocolor"><?php _e('Information Text Color', $this -> plugin_name); ?></label></th>
			<td>
				<input type="text" name="styles[infocolor]" value="<?= $styles['infocolor']; ?>" id="styles.infocolor" style="width:65px;" />
			</td>
		</tr>
	</tbody>
</table>