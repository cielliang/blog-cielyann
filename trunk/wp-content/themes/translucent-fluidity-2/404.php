<?php get_header(); ?>
<ul id="nav">
<li <?php if(is_home()){echo 'class="first current_page_item"';}?>><a href="<?php bloginfo('siteurl'); ?>/" title="Home">Home</a></li>
				<?php wp_list_pages('title_li=&depth=1');?>
</ul>
<div id="container">
<div id="content">
<h2 class="center">Error 404 - Not Found</h2>
<p>The document or page does not exist! Please search using the form below <br />
<form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="text" name="s" id="s" size="15" />
<input type="submit" value="<?php _e('Go'); ?>" />
</form></p>
<a href="<?php bloginfo ('home') ?>" class="alignleft">Blog Home</a>
 </div>
<div id="menu">
	<?php get_sidebar();?>
	</div>		


<?php get_footer(); ?>