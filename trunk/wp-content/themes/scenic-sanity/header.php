<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js" ></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/cufon-yui.js" ></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/TitilliumText14L_300.font.js" ></script>
        <script type="text/javascript">
Cufon.replace('h2', {
	color: '-linear-gradient(#f92,0.45=#f60,0.45=#f30, #f60)'
});
Cufon.replace('h1', {
	color: '-linear-gradient(#f92,0.45=#f60,0.45=#f30, #f60)'
});
Cufon.replace('h3', {
	color: '-linear-gradient(#555,0.45=#000,0.45=#111, #000)'
});
        </script>
    
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/javascript.js" ></script>

<?php wp_head(); ?>
</head>
<body>
<div id="page">
<div id="header">	
	<h1>

	<a href="<?php echo get_option('home'); ?>/">
	<?php bloginfo('name'); ?>
	</a>
	</h1>
	<div id="description">
		<?php bloginfo('description'); ?>
	</div>
</div>

