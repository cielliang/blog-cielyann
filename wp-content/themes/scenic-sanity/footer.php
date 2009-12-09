
<hr />
<div class="clear"></div>
<div id="footer">
    <p>
	<br />Grab <a href="<?php bloginfo('rss2_url'); ?>" class="rss" >Blog RSS</a>
		and <a href="<?php bloginfo('comments_rss2_url'); ?>" >Comments RSS</a><br />
		
		<?php bloginfo('name'); ?> is proudly powered by <a href="http://wordpress.org/">WordPress</a><br/>
		Wordpress theme designed by <a href="http://www.dynamicguru.com" title="Theme by Dynamic Guru">Mujtaba
		</a>
		<br />
		<!-- <?php echo get_num_queries(); ?>queries.-->
		The server took <?php timer_stop(1); ?> seconds to serve you this nice blog ...
    </p>

</div>
</div>


<!-- Gorgeous design by Mujtaba Ahmed - http://www.dynamicguru.com -->

		<?php wp_footer(); ?>
</body>
</html>
