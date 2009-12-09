<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	
	$options = get_option('page_options');

	if($options['feed'] && $options['feed_url']) {
		if (substr(strtoupper($options['feed_url']), 0, 7) == 'HTTP://') {
			$feed = $options['feed_url'];
		} else {
			$feed = 'http://' . $options['feed_url'];
		}
	} else {
		$feed = get_bloginfo('rss2_url');
	}
?>

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php _e('RSS 2.0 - all posts', 'page'); ?>" href="<?php echo $feed; ?>" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!--[if lt IE 6]>
<style>.contentpadding img{cursor:pointer;cursor:pointer;zoom:expression( function(elm) {if (elm.width>940) {var oldVW = elm.width; elm.width=940;elm.height = elm.height*(940/oldVW);}elm.style.zoom ='1';}(this));}</style>
<![endif]-->

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/menu.js"></script>

<?php wp_head(); ?>
</head>
<body>
<div id="page">

<div id="menu">
	<div id="menulist">
		<div id="topsearch">
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>
		</div>
		<div id="social">
		
		<a id="rssfeed" rel="external nofollow" href="<?php echo $feed; ?>" title="Subscribe this blog" >RSS feed</a>
		<?php if($options['twitter'] && $options['twitter_username']) : ?>
		
		<a id="twitter" rel="external nofollow" href="http://twitter.com/<?php echo $options['twitter_username']; ?>/" title="Follow me" >Twitter</a>
		<?php endif; ?>
		
		</div>



	</div>
		<div class="clear"></div>
</div>
<div id="header">
	<div id="banner">
		<div>
		<ul id="menus">
				<li <?php if(is_home()){echo 'class="current_page_item"';}?>><a href="<?php echo get_option('home'); ?>/" title="Home">Home</a></li>
		<?php
			if($options['menu_type'] == 'categories') {
				wp_list_categories('title_li=0&orderby=name&show_count=0');
			} else {
				wp_list_pages('title_li=0&sort_column=menu_order');
			}
		?>
		</ul>
		</div>
		<div class="clear"></div>
		<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
		<div class="description"><?php bloginfo('description'); ?></div>
	</div>
</div>


	


<hr />
