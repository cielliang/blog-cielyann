<div class="cs-Footer">
    <div class="cs-Footer-inner">
                <a href="<?php bloginfo('rss2_url'); ?>" class="cs-rss-tag-icon" title="RSS"></a>
                <div class="cs-Footer-text">
<p>
<?php 
 global $default_footer_content;
 $footer_content = get_option('cs_footer_content');
 if ($footer_content === false) $footer_content = $default_footer_content;
 echo $footer_content;
?>
</p>
</div>
    </div>
    <div class="cs-Footer-background">
    </div>
</div>

    </div>
</div>
<div class="cleared"></div>
<p class="cs-page-footer">Powered by <a href="http://wordpress.org/" target="_blank">WordPress</a> &middot; CrimsonSky Theme by <a href="http://www.dialogue-theme.com/about/" target="_blank">Stephan</a>.</p>
</div>

<!-- <?php printf(__('%d queries. %s seconds.', 'kubrick'), get_num_queries(), timer_stop(0, 3)); ?> -->
<div><?php wp_footer(); ?></div>
</body>
</html>
