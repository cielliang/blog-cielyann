<?php get_header(); ?>

	<div id="content">
	<div id="maincontent">
		<div class="topcorner"></div>
		<div class="contentpadding">
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php the_ID(); ?>">

				

				<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div>

	
			</div>	

		<?php endwhile; ?>


	<div id="urcomment">
		<?php comments_template(); ?>
	</div>
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
