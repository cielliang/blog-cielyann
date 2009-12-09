<? // LEFT SIDEBAR ?>

<div id="leftsidebar">

<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>	

<ul>
<li><h2>Search our blog</h2>
				<?php include (TEMPLATEPATH . '/searchform.php'); ?>
			</li>

			<li>
			<?php /* If this is a category archive */ if (is_category()) { ?>
			<p>You are currently browsing the archives for the <?php single_cat_title(''); ?> category.</p>
			
			<?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
			<p>You are currently browsing the <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a> weblog archives
			for the day <?php the_time('l, F jS, Y'); ?>.</p>
			
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<p>You are currently browsing the <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a> weblog archives
			for <?php the_time('F, Y'); ?>.</p>

      <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<p>You are currently browsing the <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a> weblog archives
			for the year <?php the_time('Y'); ?>.</p>
			
		 <?php /* If this is a monthly archive */ } elseif (is_search()) { ?>
			<p>You have searched the <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a> weblog archives
			for <strong>'<?php echo wp_specialchars($s); ?>'</strong>. If you are unable to find anything in these search results, you can try one of these links.</p>

			<?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<p>You are currently browsing the <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a> weblog archives.</p>

			<?php } ?>
			</li>
<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>			
                <?php } ?>  

 		
<li>
   <h2>About our blog</h2>
        <ul><li>
		       Your blog description here 
			    <br/>
        </li></ul>
</li>

<li><h2>Recent entries</h2>
				<ul>
                    <?php query_posts('showposts=8'); ?>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<li><a href="<?php the_permalink() ?>"><?php the_title() ?> <span>[<?php the_time('d.m.y') ?>]</span></a></li>
					<?php endwhile; endif; ?>
				</ul>
			</li>      

			<li><h2>Pages</h2>
				<ul>
				<?php wp_list_pages('title_li='); ?>
				</ul>
			</li>



			<li><h2>Categories</h2>
				<ul>
				<?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=1'); ?>
				</ul>
			</li>

		</ul>		       
<?php endif; ?>
        

</div>
<? // END LEFT SIDEBAR ?>



<? // RIGHT SIDEBAR ?>	
<div id="rightsidebar">



<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>	
<ul>			
			<li><h2><?php _e('Archives'); ?></h2>
				<ul>
				<?php wp_get_archives('type=monthly'); ?>
				</ul>
			</li>
			
<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>						
			<?php get_links_list(); ?>
				
			<li><h2><?php _e('Meta'); ?></h2>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="http://validator.w3.org/check/referer" title="<?php _e('This page validates as XHTML 1.0 Transitional'); ?>"><?php _e('Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr>'); ?></a></li>
					<li><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a></li>
	                <li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a></li>
					<li><a href="http://wordpress.org/" title="<?php _e('Powered by WordPress, state-of-the-art semantic personal publishing platform.'); ?>">WordPress</a></li>
					<?php wp_meta(); ?>
				</ul>
			</li>



<?php } ?>


</ul>
<?php endif; ?>

		
	</div>
<? // END RIGHT SIDEBAR ?>