<?php get_header(); ?>
<?php
	$options = get_option('page_options');
?>
	<div id="content">
	
	<div id="maincontent">
	<div class="topcorner"></div>
		<div class="contentpadding">

	<div class="boxcaption"><h3><?php _e('Archive', 'page'); ?></h3></div>
	<div class="box">
		<?php
		// If this is a category archive
		if (is_category()) {
			printf( __('Archive for the &#8216;%1$s&#8217; Category', 'page'), single_cat_title('', false) );
		// If this is a tag archive
		} elseif (is_tag()) {
			printf( __('Posts Tagged &#8216;%1$s&#8217;', 'page'), single_tag_title('', false) );
		// If this is a daily archive
		} elseif (is_day()) {
			printf( __('Archive for %1$s', 'page'), get_the_time(__('F jS, Y', 'page')) );
		// If this is a monthly archive
		} elseif (is_month()) {
			printf( __('Archive for %1$s', 'page'), get_the_time(__('F, Y', 'page')) );
		// If this is a yearly archive
		} elseif (is_year()) {
			printf( __('Archive for %1$s', 'page'), get_the_time(__('Y', 'page')) );
		// If this is an author archive
		} elseif (is_author()) {
			_e('Author Archive', 'page');
		// If this is a paged archive
		} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
			_e('Blog Archives', 'page');
		}
		?>
	</div>

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time('M jS, Y') ?> <!-- by <?php the_author() ?> -->Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></small>

				<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div>

				<p class="postmetadata"><?php the_tags('Tags: ', ', '); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>
	<div class="clear"></div>
		</div>
	<div class="bottomcorner"></div>
	</div>
<?php get_sidebar(); ?>
<div class="clear"></div>
	</div>
<?php get_footer(); ?>
