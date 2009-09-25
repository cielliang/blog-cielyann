<div class="wrap">
	<h2><?php _e('Save a Slide', $this -> plugin_name); ?></h2>
	
	<form action="<?= $this -> url; ?>&amp;method=save" method="post">
		<input type="hidden" name="Slide[id]" value="<?= $this -> Slide -> data -> id; ?>" />
		<input type="hidden" name="Slide[order]" value="<?= $this -> Slide -> data -> order; ?>" />
	
		<table class="form-table">
			<tbody>
				<tr>
					<th><label for="Slide.title"><?php _e('Title', $this -> plugin_name); ?></label></th>
					<td>
						<input class="widefat" type="text" name="Slide[title]" value="<?= esc_attr($this -> Slide -> data -> title); ?>" id="Slide.title" />
						<?= (!empty($this -> Slide -> errors['title'])) ? '<div style="color:red;">' . $this -> Slide -> errors['title'] . '</div>' : ''; ?>
					</td>
				</tr>
				<tr>
					<th><label for="Slide.description"><?php _e('Description', $this -> plugin_name); ?></label></th>
					<td>
						<textarea class="widefat" name="Slide[description]"><?= esc_attr($this -> Slide -> data -> description); ?></textarea>
						<?= (!empty($this -> Slide -> errors['description'])) ? '<div style="color:red;">' . $this -> Slide -> errors['description'] . '</div>' : ''; ?>
					</td>
				</tr>
				<tr>
					<th><label for="Slide.image_url"><?php _e('Image URL', $this -> plugin_name); ?></th>
					<td>
						<input class="widefat" type="text" name="Slide[image_url]" value="<?= esc_attr($this -> Slide -> data -> image_url); ?>" id="Slide.image_url" />
						<?= (!empty($this -> Slide -> errors['image_url'])) ? '<div style="color:red;">' . $this -> Slide -> errors['image_url'] . '</div>' : ''; ?>
					</td>
				</tr>
				<tr>
					<th><label for="Slide.link"><?php _e('Link To', $this -> plugin_name); ?></label></th>
					<td><input class="widefat" type="text" name="Slide[link]" value="<?= esc_attr($this -> Slide -> data -> link); ?>" id="Slide.link" /></td>
				</tr>
			</tbody>
		</table>
		
		<p class="submit">
			<input class="button-primary" type="submit" name="submit" value="<?php _e('Save Slide', $this -> plugin_name); ?>" />
		</p>
	</form>
</div>