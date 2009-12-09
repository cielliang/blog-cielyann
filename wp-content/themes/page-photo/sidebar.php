	<div id="sidebar">
	<div id="sidebar-left">
			<ul>		
			<?php 	/* Widgetized sidebar, if you have the plugin installed. */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(bottom_sidebar) ) : ?>
			
			
			<?php wp_list_categories('show_count=0&title_li=<h3>Categories</h3>'); ?>
								
			<li><h3>Archives</h3>
				<ul>
				<?php wp_get_archives('type=monthly'); ?>
				</ul>
			</li>

				<li><h3>Meta</h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
					<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
					<?php wp_meta(); ?>
				</ul>
				</li>

				<?php wp_list_bookmarks(); ?>
		
			<?php endif; ?>
</ul>

	</div>


	</div>

