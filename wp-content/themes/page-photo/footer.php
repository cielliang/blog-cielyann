<div id="footer-top">
	<div id="footer">
			<p id="footer-left">Copyright &copy;  <?php bloginfo('name'); ?> .</p>
			<p id="footer-right">Powered by <a href="http://wordpress.org" title="wordpress.org">WordPress</a>, Designed by <a href="http://www.pagemod.cn/" title="page">page</a>.Valid <a href="http://validator.w3.org/check?uri=referer">XHTML</a> &amp; <a href="http://jigsaw.w3.org/css-validator/validator?uri=<?php bloginfo('stylesheet_url'); ?>">CSS</a>.</p>

		<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
		
	
	</div>
</div>

<?php wp_footer(); 
	$options = get_option('page_options');
	if ($options['analytics']) {
		echo($options['analytics_content']);
	}
?>

</div>
</body>
</html>