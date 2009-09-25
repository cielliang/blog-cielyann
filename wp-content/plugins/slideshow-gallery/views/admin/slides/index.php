<div class="wrap">
	<h2><?php _e('Manage Slides', $this -> plugin_name); ?> (<?= $this -> Html -> link(__('add new'), $this -> url . '&amp;method=save'); ?>)</h2>

	<?php if (!empty($slides)) : ?>	
		<form id="posts-filter" action="<?= $this -> url; ?>" method="post">
			<ul class="subsubsub">
				<li><?= $paginate -> allcount; ?> <?php _e('slides', $this -> plugin_name); ?></li>
			</ul>
			
			
		</form>
	<?php endif; ?>
	
	<form onsubmit="if (!confirm('<?php _e('Are you sure you wish to execute this action on the selected slides?', $this -> plugin_name); ?>')) { return false; }" action="<?= $this -> url; ?>&amp;method=mass" method="post">
		<div class="tablenav">
			<div class="alignleft actions">
				<a href="<?= $this -> url; ?>&amp;method=order" title="<?php _e('Order all your slides', $this -> plugin_name); ?>" class="button"><?php _e('Order Slides', $this -> plugin_name); ?></a>
			
				<select name="action" class="action">
					<option value="">- <?php _e('Bulk Actions', $this -> plugin_name); ?> -</option>
					<option value="delete"><?php _e('Delete', $this -> plugin_name); ?></option>
				</select>
				<input type="submit" class="button" value="<?php _e('Apply', $this -> plugin_name); ?>" name="execute" />
			</div>
			<?php $this -> render('paginate', array('paginate' => $paginate), true, 'admin'); ?>
		</div>
	
		<table class="widefat">
			<thead>
				<tr>
					<th class="check-column"><input type="checkbox" name="checkboxall" id="checkboxall" value="checkboxall" /></th>
					<th><?php _e('Image', $this -> plugin_name); ?></th>
					<th><?php _e('Title', $this -> plugin_name); ?></th>
					<th><?php _e('Date', $this -> plugin_name); ?></th>
					<th><?php _e('Order', $this -> plugin_name); ?></th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th class="check-column"><input type="checkbox" name="checkboxall" id="checkboxall" value="checkboxall" /></th>
					<th><?php _e('Image', $this -> plugin_name); ?></th>
					<th><?php _e('Title', $this -> plugin_name); ?></th>
					<th><?php _e('Date', $this -> plugin_name); ?></th>
					<th><?php _e('Order', $this -> plugin_name); ?></th>
				</tr>
			</tfoot>
			<tbody>
				<?php foreach ($slides as $slide) : ?>
					<tr class="<?= $class = (empty($class)) ? 'alternate' : ''; ?>">
						<th class="check-column"><input type="checkbox" name="Slide[checklist][]" value="<?= $slide -> id; ?>" id="checklist<?= $slide -> id; ?>" /></th>
						<td style="width:75px;">
							<?php $image = basename($slide -> image_url); ?>
							<a href="<?= $this -> Html -> image_url($image); ?>" title="<?= $slide -> title; ?>" class="thickbox"><img src="<?= $this -> Html -> image_url($this -> Html -> thumbname($image, "small")); ?>" alt="<?= $this -> Html -> sanitize($slide -> title); ?>" /></a>
						</td>
						<td><a class="row-title" href="<?= $this -> url; ?>&amp;method=save&amp;id=<?= $slide -> id; ?>" title=""><?= $slide -> title; ?></a></td>
						<td><abbr title="<?= $slide -> modified; ?>"><?= date("Y-m-d", strtotime($slide -> modified)); ?></abbr></td>
						<td><?= ((int) $slide -> order + 1); ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		
		<div class="tablenav">
			
			<?php $this -> render('paginate', array('paginate' => $paginate), true, 'admin'); ?>
		</div>
	</form>
</div>