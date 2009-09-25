<?php if (!empty($slides)) : ?>
	<ul id="slideshow" style="display:none;">
		<?php foreach ($slides as $slide) : ?>		
			<li>
				<h3><?= $slide -> title; ?></h3>
				<span><?= get_option('siteurl'); ?>/wp-content/uploads/<?= $this -> plugin_name; ?>/<?= basename($slide -> image_url); ?></span>
				<p><?= $slide -> description; ?></p>
				<?php if ($this -> get_option('thumbnails') == "Y") : ?>
					<?php if (!empty($slide -> link)) : ?>
						<a href="<?= $slide -> link; ?>" title="<?= $slide -> title; ?>"><img src="<?= $this -> Html -> image_url($this -> Html -> thumbname(basename($slide -> image_url))); ?>" alt="<?= $this -> Html -> sanitize($slide -> title); ?>" /></a>
					<?php else : ?>
						<img src="<?= $this -> Html -> image_url($this -> Html -> thumbname(basename($slide -> image_url))); ?>" alt="<?= $this -> Html -> sanitize($slide -> title); ?>" />
					<?php endif; ?>
				<?php else : ?>
					<a href="<?= $slide -> link; ?>" title="<?= $slide -> title; ?>"></a>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
	</ul>
	
	<div id="wrapper">
		<?php if ($this -> get_option('thumbnails') == "Y" && $this -> get_option('thumbposition') == "top") : ?>
			<div id="thumbnails" class="thumbstop">
				<div id="slideleft" title="<?php _e('Slide Left', $this -> plugin_name); ?>"></div>
				<div id="slidearea">
					<div id="slider"></div>
				</div>
				<div id="slideright" title="<?php _e('Slide Right', $this -> plugin_name); ?>"></div>
				<br style="clear:both; visibility:hidden; height:1px;" />
			</div>
		<?php endif; ?>
	
		<div id="fullsize">
			<div id="imgprev" class="imgnav" title="Previous Image"></div>
			<div id="imglink"></div>
			<div id="imgnext" class="imgnav" title="Next Image"></div>
			<div id="image"></div>
			<?php if ($this -> get_option('information') == "Y") : ?>
				<div id="information">
					<h3></h3>
					<p></p>
				</div>
			<?php endif; ?>
		</div>
		
		<?php if ($this -> get_option('thumbnails') == "Y" && $this -> get_option('thumbposition') == "bottom") : ?>
			<div id="thumbnails" class="thumbsbot">
				<div id="slideleft" title="<?php _e('Slide Left', $this -> plugin_name); ?>"></div>
				<div id="slidearea">
					<div id="slider"></div>
				</div>
				<div id="slideright" title="<?php _e('Slide Right', $this -> plugin_name); ?>"></div>
				<br style="clear:both; visibility:hidden; height:1px;" />
			</div>
		<?php endif; ?>
	</div>
	
	<script type="text/javascript">
	jQuery.noConflict();
	tid('slideshow').style.display = "none";
	tid('wrapper').style.display = 'block';
	
	var slideshow = new TINY.slideshow("slideshow");
	
	jQuery(document).ready(function() {
		<?php if ($this -> get_option('autoslide')) : ?>slideshow.auto = true;<?php else : ?>slideshow.auto = false;<?php endif; ?>
		slideshow.speed = <?= $this -> get_option('autospeed'); ?>;
		slideshow.imgSpeed = <?= $this -> get_option('fadespeed'); ?>;
		slideshow.navOpacity = <?= $this -> get_option('navopacity'); ?>;
		slideshow.navHover = <?= $this -> get_option('navhover'); ?>;
		slideshow.letterbox = "#000000";
		slideshow.link = "linkhover";
		slideshow.info = "<?= ($this -> get_option('information') == "Y") ? 'information' : ''; ?>";
		slideshow.infoSpeed = <?= $this -> get_option('infospeed'); ?>;
		slideshow.thumbs = "<?= ($this -> get_option('thumbnails') == "Y") ? 'slider' : ''; ?>";
		slideshow.thumbOpacity = <?= $this -> get_option('thumbopacity'); ?>;
		slideshow.left = "slideleft";
		slideshow.right = "slideright";
		slideshow.scrollSpeed = <?= $this -> get_option('thumbscrollspeed'); ?>;
		slideshow.spacing = <?= $this -> get_option('thumbspacing'); ?>;
		slideshow.active = "<?= $this -> get_option('thumbactive'); ?>";
		slideshow.init("slideshow","image","imgprev","imgnext","imglink");
	});
	</script>
<?php endif; ?>