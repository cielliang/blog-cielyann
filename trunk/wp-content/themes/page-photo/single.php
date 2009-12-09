<?php get_header(); ?>

	<div id="content">
	<div id="maincontent">
		<div class="topcorner"></div>
		<div class="contentpadding">
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				

				<div class="entry">
					<?php the_content(); ?>
					<?php wp_link_pages(array('before' => '<div class="page-link clearfix"><strong>Pages:</strong>', 'after' => '</div>', 'next_or_number' => 'number', 'pagelink' => '<span>%</span>')); ?>
				</div>

				<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit'); ?></p>
			</div>

						<div class="ping-track clear">
						This entry was posted
						on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?>
						and is filed under <?php the_category(', ') ?>.
						You can follow any responses to this entry through the <?php comments_rss_link('RSS 2.0'); ?> feed.

						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							/* Both Comments and Pings are open*/ ?>
							You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							/* Only Pings are Open*/ ?>
							Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							/* Comments are open, Pings are not*/ ?>
							You can skip to the end and leave a response. Pinging is currently not allowed.

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							/* Neither Comments, nor Pings are open */ ?>
							Both comments and pings are currently closed.
						<?php } ?>
					</div>	

<div>					
	<div id="urcomment">
		<?php comments_template(); ?>
	</div>
	<div id="ads">
	
<?php
		$options = get_option('page_options');
	if ($options['web_ads']) {
		echo($options['web_ads_content']);}
?>
	<ul class="widget">
			<?php 	/* Widgetized sidebar, if you have the plugin installed. */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(besidecomment_sidebar) ) : ?>
			<h3>recent post</h3><?php
				if (is_single()) {
					$posts = get_posts('numberposts=10&orderby=post_date');
				} else {
					$posts = get_posts('numberposts=5&orderby=rand');
				}
				foreach($posts as $post) {
					setup_postdata($post);
					echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
				}
				$post = $posts[0];
			?>
<?php wp_list_categories('show_count=0&title_li=<h3>Categories</h3>'); ?>

			<?php endif; ?>
	</ul>
	</div>
<div class="clear"></div>
</div>

		<?php endwhile; ?>



	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>
			</div>
	<div class="bottomcorner"></div>
	</div>
<?php get_sidebar(); ?>
<div class="clear"></div>
	</div>
	
<?php get_footer(); ?>
