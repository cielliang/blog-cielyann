<?php get_header(); ?>
	<div id="content" class="narrowcolumn">
		<h2>Error 404 &ndash; File not Found</h2>
	<div class="post">
	<p><strong>Sorry, but the page you were looking for could not be found.</strong></p>
	
Please Select from the category below to find what you looking for or you can use our Search Form
<ul>
<li><h2>Search</h2>
				<?php include (TEMPLATEPATH . '/searchform.php'); ?>
	  </li>
<li><h2>Categories</h2>
				<ul>
				<?php wp_list_cats('sort_column=name&hide_empty=0&optioncount=0&hierarchical=1'); ?>
				</ul>
	  </li>
			<li><h2>Recent entries</h2>
				<ul>
				<?php get_archives('postbypost','10','html'); ?>  
				</ul>
			</li>
			
	  </ul>

	</div>
	
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>