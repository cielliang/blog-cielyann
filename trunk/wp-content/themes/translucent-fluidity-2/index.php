<?php get_header(); ?>

<?php if (have_posts()) : ?>
<ul id="nav">
<li <?php if(is_home()){echo 'class="first current_page_item"';}?>><a href="<?php bloginfo('siteurl'); ?>/" title="Home">Home</a></li>
				<?php wp_list_pages('title_li=&depth=1');?>
</ul>
<div id="container">
<div id="content">

	<?php while (have_posts()) : the_post(); ?>
			
		<div class="post" id="post-<?php the_ID(); ?>">
			<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
			<small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>
			
			<div class="entry">
				<?php the_content('Read the rest of this entry &raquo;'); ?>
			</div>
	
			<p class="postmetadata">Posted in <?php the_category(', ') ?> <strong>|</strong> <?php edit_post_link('Edit','','<strong>|</strong>'); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
<p><?php the_tags(); ?></p>

		</div>

	<?php comments_template(); ?>
	<?php endwhile; ?>

		<p align="center"><?php next_posts_link('&laquo; Previous Entries') ?> &nbsp; <?php previous_posts_link('Next Entries &raquo;') ?></p>

	<?php else : ?>
		<h2 align="center">Not Found</h2>
		<p align="center">Sorry, but you are looking for something that isn't here.</p>
	<?php endif; ?>
</div>
	<div id="menu">
	<?php get_sidebar();?>
	</div>		


<?php get_footer(); ?>