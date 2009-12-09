<?php get_header(); ?>

<?php get_sidebar(); ?>

	<div id="content" class="narrowcolumn">
		<a name="content"></a>

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				 <small class="time"><?php the_time('F j, Y') ?></small><small class="author"><?php the_author() ?> </small><small class="comments_count"><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></small>

				<div class="entry">
					<?php the_excerpt('Continue reading &raquo;'); ?>
				</div>
				<a href="<?php the_permalink() ?>" rel="bookmark" class="readmore" title="Read <?php the_title_attribute(); ?>">Read More &raquo;</a>

				<p class="postmetadata">Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?></p>
			</div>

		<?php endwhile; ?>
		<div class="clear" ></div>

		<div class="navigation">
			<span class="linkleft"><?php next_posts_link('&laquo; Older Entries') ?></span>
			<span class="linkright"><?php previous_posts_link('Newer Entries &raquo;') ?></span>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

	</div>



<?php get_footer(); ?>
