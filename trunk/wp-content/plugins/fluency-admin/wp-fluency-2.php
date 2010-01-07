<?php
/*
Plugin Name: Fluency Admin
Plugin URI: http://deanjrobinson.com/projects/fluency-admin/
Description: Give your WordPress admin the Fluency look, Fluency 2.2 is the latest update and is compatible with WP 2.9.x.
Author: Dean Robinson
Version: 2.2
Author URI: http://deanjrobinson.com/
*/ 

define("FLUENCY_VERSION", "2.2");

/*
 * Setup Fluency Options when plugin is activated
 */
function wp_fluency_init() {
	if (isset($_GET['activate']) && $_GET['activate'] == 'true' && isset($_GET['plugin']) && $_GET['plugin'] == 'wp-fluency-2/wp-fluency-2.php') {
		$key_s = get_option('fluency_login_style');
		$key_l = get_option('fluency_login_logo');
		$key_ml = get_option('fluency_menu_logo');
		$key_mw = get_option('fluency_menu_width');
		$key_mp = get_option('fluency_menu_position');
		$key_mi = get_option('fluency_menu_icons');
		empty($key_s) ? update_option('fluency_login_style', 'true') : null;
		empty($key_l) ? update_option('fluency_login_logo', '') : null;
		empty($key_ml) ? update_option('fluency_menu_logo', '') : null;
		empty($key_mw) ? update_option('fluency_menu_width', '') : null;
		empty($key_mp) ? update_option('fluency_menu_position', 'true') : null;
		empty($key_mi) ? update_option('fluency_menu_icons', 'true') : null;
	}
}
add_action('init', 'wp_fluency_init');

/*
 * Add Fluency Stylesheet to admin head
 */
function wp_admin_fluency_css() {
	global $userdata;
	wp_enqueue_style('fluency',WP_PLUGIN_URL . '/' . plugin_basename(dirname(__FILE__)) . '/resources/wp-admin.css', $deps = array(), $ver = FLUENCY_VERSION, $media = 'all' );
	$userdata->admin_color == 'classic' ? wp_enqueue_style('fluency-classic-colors',WP_PLUGIN_URL . '/' . plugin_basename(dirname(__FILE__)) . '/resources/classic-colors.css', $deps = array(), $ver = FLUENCY_VERSION, $media = 'all' ) : null;
}
add_action('admin_print_styles', 'wp_admin_fluency_css');

/*
 * Add Style overrides for custom menu width/positioning
 */
function wp_admin_fluency_menu_size() {
	$width = get_option('fluency_menu_width');
	if(!empty($width) && $width>=140){
		?>
		<style>
			#wpwrap,#footer {border-left-width:<?php echo $width; ?>px;}
			#adminmenu,#adminmenu li.wp-has-submenu {width:<?php echo $width; ?>px;}
			#adminmenu a.menu-top {min-width:<?php echo $width-30; ?>px;}
			#adminmenu li.wp-has-submenu.hover {width:<?php echo $width+8; ?>px;}
			#adminmenu li div.wp-submenu {left:<?php echo $width+8; ?>px;}
			#adminmenu .menu-top-last a.menu-top,#adminmenu li a.wp-has-submenu,#adminmenu li.menu-top-first a.wp-has-submenu,#adminmenu li a.menu-top,#adminmenu li.wp-has-current-submenu a.wp-has-current-submenu,#adminmenu li.menu-top > a.current,#adminmenu li.wp-first-item.current,#adminmenu li.wp-has-current-submenu,#adminmenu li.menu-top:hover, #adminmenu li.menu-top.hover {background-position:<?php echo $width-140; ?>px bottom;}
			#adminmenu li.menu-top-last a, #adminmenu li.menu-top-last a:hover, #adminmenu li.menu-top .current, #adminmenu li.menu-top .current:hover {background-position:<?php echo $width-14; ?>px -112px;}
		</style>
		<?php
	}
	$pos = get_option('fluency_menu_position');
	if($pos=='false'){ ?><style>#adminmenu{position:absolute;}</style><?php }
	$icons = get_option('fluency_menu_icons');
	if($icons=='false'){ ?><style>#adminmenu li div.wp-menu-image{display:none;}.hiddenMenu #adminmenu li div.wp-menu-image{display:block;}</style><?php }
}
add_action('admin_head', 'wp_admin_fluency_menu_size');

/*
 * Add Fluency Javascript to admin footer
 */
function wp_admin_fluency_js() {
	wp_enqueue_script('fluency',WP_PLUGIN_URL . '/' . plugin_basename(dirname(__FILE__)) . '/resources/fluency.js', $deps = array('jquery'), $ver = FLUENCY_VERSION, $in_footer = true );
	get_option('fluency_menu_logo')!='' ? add_action('admin_print_footer_scripts', 'wp_admin_fluency_footer_js') : null;
}
add_action('admin_print_scripts', 'wp_admin_fluency_js');

/*
 * Prints Script to override WordPress logo above admin menu
 */
function wp_admin_fluency_footer_js(){
	echo '<script>try{document.getElementById("adminmenu").style.backgroundImage = "url(\'' . get_option('fluency_menu_logo') . '\')";}catch(e){}</script>';
}

/*
 * Add Fluency Login Stylesheet to login head
 */
function wp_login_fluency_css() {
	get_option('fluency_login_style')=='true' ? wp_admin_fluency_enqueue_style('fluency-login',WP_PLUGIN_URL . '/' . plugin_basename(dirname(__FILE__)) . '/resources/wp-login.css', $deps = array(), $ver = FLUENCY_VERSION, $media = 'all' ) : null;
}
add_action('login_head', 'wp_login_fluency_css');

/*
 * Add Javascript to Login page to override WordPress logo
 */
function wp_login_fluency_js() {
	echo get_option('fluency_login_logo')!='' ? '<script>try{document.getElementById("login").childNodes[0].childNodes[0].style.backgroundImage = "url(\'' . get_option('fluency_login_logo') . '\')";}catch(e){}</script>' : null;
}
add_action('login_form', 'wp_login_fluency_js',1000);

/*
 * Function that mimics the core wp_enqueue_style function which doesn't appear to work on the login page
 */
function wp_admin_fluency_enqueue_style($handle='',$file='', $deps = array(), $ver = FLUENCY_VERSION, $media = 'all') {
	echo '<link rel="stylesheet" id="' . $handle . '-css" href="' . $file . '?version=' . $ver .'" type="text/css" media="' . $media . '" />'."\n";
}

/*
 * Adds Fluency information to wp-admin footer
 */
function wp_fluency_footer(){
	echo '<span id="fluency-footer"><a href="http://deanjrobinson.com/projects/fluency-admin/">Fluency Admin '.FLUENCY_VERSION.'</a> is a plugin by <a href="http://deanjrobinson.com">Dean Robinson</a> - <a href="http://deanjrobinson.com/donate/">Donate</a></span><br/>';
}
add_action('in_admin_footer', 'wp_fluency_footer',1000);

/*
 * Adds Akismet Link to the Comments menu in addtion to the item under Dashboard
 */
function wp_fluencycomments_akismet_stats_page() {
	( function_exists('add_submenu_page') && function_exists('akismet_init') ) ? add_submenu_page('edit-comments.php', __('Akismet Stats'), __('Akismet Stats'), 'manage_options', 'akismet-stats-display', 'akismet_stats_display') : null;
}
add_action('admin_menu', 'wp_fluencycomments_akismet_stats_page');

/*
 * Fluency Admin Options Page
 */
function wp_fluency_options_page() {

	if ( isset($_POST['submit']) ) {
		( function_exists('current_user_can') && !current_user_can('manage_options') ) ? die(__('Cheatin&#8217; uh?')) : null;
		isset($_POST['fluency_login_style']) ? update_option('fluency_login_style', 'true') : update_option('fluency_login_style', 'false');
		isset($_POST['fluency_login_logo']) ? update_option('fluency_login_logo', strip_tags($_POST['fluency_login_logo'])) : update_option('fluency_login_logo', '');
		isset($_POST['fluency_menu_logo']) ? update_option('fluency_menu_logo', strip_tags($_POST['fluency_menu_logo'])) : update_option('fluency_menu_logo', '');
		isset($_POST['fluency_menu_width']) ? update_option('fluency_menu_width', strip_tags($_POST['fluency_menu_width'])) : update_option('fluency_menu_width', '');
		isset($_POST['fluency_menu_position']) ? update_option('fluency_menu_position', 'true') : update_option('fluency_menu_position', 'false');
		isset($_POST['fluency_menu_icons']) ? update_option('fluency_menu_icons', 'true') : update_option('fluency_menu_icons', 'false');
	}

?>
<?php if ( !empty($_POST ) ) : ?>
<div id="message" class="updated fade"><p><strong><?php _e('Options saved.') ?></strong></p></div>
<?php endif; ?>
<div class="wrap">
	<div class="icon32" id="icon-themes"><br/></div>
	<h2><?php _e('Fluency Admin Options'); ?></h2>
	<form action="" method="post" id="fluency-options">
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row">Fluency Login Style</th>
					<td><label><input name="fluency_login_style" id="fluency_login_style" value="true" type="checkbox" <?php if ( get_option('fluency_login_style') == 'true' ) echo ' checked="checked" '; ?> /> <?php _e('Style the WordPress login to match the rest of the Fluency Admin theme.'); ?></label></td>
				</tr>
				<tr>
					<th scope="row"><label for="fluency_login_logo">Login screen custom logo</label></th>
					<td>
						<input type="text" class="regular-text" value="<?php if ( get_option('fluency_login_logo') != '' ) echo get_option('fluency_login_logo'); ?>" id="fluency_login_logo" name="fluency_login_logo"/>
						<div class="description">Specify the full URL for your chosen image, for best results use an image that is 250px wide, and 50px high.</div>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="fluency_menu_logo">Custom logo (top of menu)</label></th>
					<td>
						<input type="text" class="regular-text" value="<?php if ( get_option('fluency_menu_logo') != '' ) echo get_option('fluency_menu_logo'); ?>" id="fluency_menu_logo" name="fluency_menu_logo"/>
						<div class="description">Specify the full URL for your chosen image, for best results use an image that is 140px wide, and 50px high.</div>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="fluency_menu_width">Custom menu width</label></th>
					<td>
						<input type="text" class="small-text" maxlength="3" value="<?php if ( get_option('fluency_menu_width') != '' ) echo get_option('fluency_menu_width'); ?>" id="fluency_menu_width" name="fluency_menu_width"/>px
						<div class="description">If you find that some menu items are wrapping across multiple lines you can increase the width of the menu. Default is 140px.</div>
					</td>
				</tr>
				<tr>
					<th scope="row">Fixed position menu</th>
					<td><label><input name="fluency_menu_position" id="fluency_menu_position" value="true" type="checkbox" <?php if ( get_option('fluency_menu_position') == 'true' ) echo ' checked="checked" '; ?> /> <?php _e('Disable if you have lots of plugins that add menu items, or a small screen.'); ?></label></td>
				</tr>
				<tr>
					<th scope="row">Menu item icons</th>
					<td><label><input name="fluency_menu_icons" id="fluency_menu_icons" value="true" type="checkbox" <?php if ( get_option('fluency_menu_icons') == 'true' ) echo ' checked="checked" '; ?> /> <?php _e('Disable to hide icons from expanded menu.'); ?></label></td>
				</tr>
				<tr>
					<th></th>
					<td class="submit"><input type="submit" name="submit" value="<?php _e('Update options &raquo;'); ?>" /></td>
				</tr>
			</tbody>
		</table>
	</form>
</div>
<?php
}

/*
 * Add Fluency Admin Options Page to Settings menu
 */
function wp_fluency_options_menu() {
	function_exists('add_submenu_page') ? add_options_page(__('Fluency Options'), __('Fluency Options'), 'manage_options', 'fluency-options', 'wp_fluency_options_page') : null;
}
add_action('admin_menu', 'wp_fluency_options_menu');

?>