<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title><?php if (is_home () ) { bloginfo('name'); } elseif ( is_category() ) { single_cat_title(); echo ' - ' ; bloginfo('name'); }
 elseif (is_single() ) { single_post_title(); }
 elseif (is_page() ) { bloginfo('name'); echo ': '; single_post_title(); }
 else { wp_title('',true); } ?></title>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/script.js"></script>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<!--[if IE 6]><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.ie6.css" type="text/css" media="screen" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.ie7.css" type="text/css" media="screen" /><![endif]-->
<link rel="alternate" type="application/rss+xml" title="<?php printf(__('%s RSS Feed', 'kubrick'), get_bloginfo('name')); ?>" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php printf(__('%s Atom Feed', 'kubrick'), get_bloginfo('name')); ?>" href="<?php bloginfo('atom_url'); ?>" /> 
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
</head>
<body>
<div id="cs-page-background-simple-gradient">
</div>
<div id="cs-main">
<div class="cs-Sheet">
    <div class="cs-Sheet-tl"></div>
    <div class="cs-Sheet-tr"></div>
    <div class="cs-Sheet-bl"></div>
    <div class="cs-Sheet-br"></div>
    <div class="cs-Sheet-tc"></div>
    <div class="cs-Sheet-bc"></div>
    <div class="cs-Sheet-cl"></div>
    <div class="cs-Sheet-cr"></div>
    <div class="cs-Sheet-cc"></div>
    <div class="cs-Sheet-body">
<div class="cs-Header">
    <div class="cs-Header-jpeg"></div>
<div class="cs-Logo">
    <h1 id="name-text" class="cs-Logo-name">
        <a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
    <div id="slogan-text" class="cs-Logo-text">
        <?php bloginfo('description'); ?></div>
</div>

</div>
<div class="cs-nav">
	<ul class="cs-menu">
		<?php cs_menu_items(); ?>
	</ul>
</div>
