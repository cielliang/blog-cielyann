<div class="wrap">
	<h2><?php _e('Order Slides', $this -> plugin_name); ?></h2>
	
	<div style="float:none;" class="subsubsub">
		<a href="<?= $this -> url; ?>"><?php _e('&larr; Manage All Slides', $this -> plugin_name); ?></a>
	</div>
	
	<?php if (!empty($slides)) : ?>
		<ul id="slidelist">
			<?php foreach ($slides as $slide) : ?>
				<li class="lineitem" id="item_<?= $slide -> id; ?>">
					<span><img src="<?= $this -> Html -> image_url($this -> Html -> thumbname($slide -> image, "small")); ?>" alt="<?= $this -> Html -> sanitize($slide -> title); ?>" /></span>
					<?= $slide -> title; ?>
				</li>
			<?php endforeach; ?>
		</ul>
		
		<div id="slidemessage"></div>
		
		<script type="text/javascript">
		jQuery(document).ready(function() {		
			jQuery("ul#slidelist").sortable({
				start: function(request) {
					jQuery("#slidemessage").slideUp();
				},
				stop: function(request) {					
					jQuery("#slidemessage").load(GalleryAjax + "?cmd=slides_order", jQuery("ul#slidelist").sortable('serialize')).slideDown("slow");
				},
				axis: "y"
			});
		});
		</script>
		
		<style type="text/css">
		#slidelist li.lineitem {
			list-style: none;
			margin: 3px 0px !important;
			padding: 2px 5px 2px 5px;
			background-color: #F1F1F1 !important;
			border:1px solid #B2B2B2;
			cursor: move;
			vertical-align: middle !important;
			display: block;
		}
		</style>
	<?php else : ?>
		<p style="color:red;"><?php _e('No slides found', $this -> plugin_name); ?></p>
	<?php endif; ?>
</div>