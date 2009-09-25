<?php

add_meta_box('submitdiv', __('Save Settings', $this -> plugin_name), array($this -> Metabox, "settings_submit"), 'post', 'side', 'core');
add_meta_box('generaldiv', __('General Settings', $this -> plugin_name), array($this -> Metabox, "settings_general"), 'post', 'normal', 'core');
add_meta_box('stylesdiv', __('Styles', $this -> plugin_name), array($this -> Metabox, "settings_styles"), 'post', 'normal', 'core');

//WordPress security measurements for calls
wp_nonce_field('closedpostboxes', 'closedpostboxesnonce', false);
wp_nonce_field('meta-box-order', 'meta-box-order-nonce', false);

?>

<div class="wrap">
	<h2><?php _e('Configuration Settings', $this -> plugin_name); ?></h2>
	
	<form action="<?= $this -> url; ?>" method="post">
		<div id="poststuff" class="metabox-holder has-right-sidebar">			
			<div id="side-info-column" class="inner-sidebar">			
				<?php do_meta_boxes('post', 'side', $post); ?>
			</div>
			<div id="post-body" class="has-sidebar">
				<div id="post-body-content" class="has-sidebar-content">
					<?php do_meta_boxes('post', 'normal', $post); ?>
				</div>
			</div>
		</div>
	</form>
</div>