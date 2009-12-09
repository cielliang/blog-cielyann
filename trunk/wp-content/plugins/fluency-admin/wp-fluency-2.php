<?php
/*
Plugin Name: Fluency Admin
Plugin URI: http://deanjrobinson.com/projects/fluency-admin/
Description: Give your WordPress admin the Fluency look, Fluency 2.1.1 is the latest update and is compatible with WP 2.8.x.
Author: Dean Robinson
Version: 2.1.1
Author URI: http://deanjrobinson.com/
*/ 

function wp_fluency_init() {
	if (isset($_GET['activate']) && $_GET['activate'] == 'true' && isset($_GET['plugin']) && $_GET['plugin'] == 'wp-fluency-2/wp-fluency-2.php') {
		$key_s = get_option('fluency_login_style');
		if(empty($key_s)) {
			update_option('fluency_login_style', 'true');
		}
		$key_l = get_option('fluency_login_logo');
		if(empty($key_l)) {
			update_option('fluency_login_logo', '');
		}
		$key_ml = get_option('fluency_menu_logo');
		if(empty($key_m)) {
			update_option('fluency_menu_logo', '');
		}
	}
}
add_action('init', 'wp_fluency_init');


function wp_admin_fluency_css() {
	global $userdata;
	wp_admin_fluency_add_css('wp-admin.css','2.1.1');
	if($userdata->admin_color == 'classic'){
		wp_admin_fluency_add_css('classic-colors.css','2.1.1');
	}
}
add_action('admin_head', 'wp_admin_fluency_css',1000);


function wp_admin_fluency_js() {
	wp_admin_fluency_add_js('fluency.js','2.1.1');
	if(get_option('fluency_menu_logo')!=''){
		echo '<script>try{document.getElementById("adminmenu").style.backgroundImage = "url(\'' . get_option('fluency_menu_logo') . '\')";}catch(e){}</script>';
	}
}
add_action('admin_print_footer_scripts', 'wp_admin_fluency_js',1000000);

function wp_login_fluency_css() {
	wp_admin_fluency_add_css('wp-login.css','2.1.1');
}
if(get_option('fluency_login_style')=='true'){
	add_action('login_head', 'wp_login_fluency_css',1000);
}


function wp_login_fluency_js() {
	echo '<script>try{document.getElementById("login").childNodes[0].childNodes[0].style.backgroundImage = "url(\'' . get_option('fluency_login_logo') . '\')";}catch(e){}</script>';
}
if(get_option('fluency_login_logo')!=''){
	add_action('login_form', 'wp_login_fluency_js',1000);
}


function wp_admin_fluency_add_css($file, $version) {
	$fluency_path = get_settings('siteurl') . '/wp-content/plugins/' . plugin_basename(dirname(__FILE__)) ;
	echo '<link rel="stylesheet" type="text/css" href="' . $fluency_path . '/resources/' . $file . '?version=' . $version .'" />'."\n";
}


function wp_admin_fluency_add_js($file, $version){
	$fluency_path = get_settings('siteurl') . '/wp-content/plugins/' . plugin_basename(dirname(__FILE__)) ;
	echo '<script src="' . $fluency_path . '/resources/' . $file . '?version=' . $version .'" type="text/javascript" charset="utf-8"></script>';
}


function wp_fluency_footer(){
	echo "<span id='fluency-footer'><a href='http://deanjrobinson.com/projects/fluency-admin/'>Fluency Admin 2.1.1</a> is a plugin by <a href='http://deanjrobinson.com'>Dean Robinson</a> - <a href='http://deanjrobinson.com/donate/'>Donate</a></span><br/>";
}
add_action('in_admin_footer', 'wp_fluency_footer',1000);


/* Adds Akismet Link to the Comments menu in addtion to the item under Dashboard */
function wp_fluencycomments_akismet_stats_page() {
	if ( function_exists('add_submenu_page') && function_exists('akismet_init') )
		add_submenu_page('edit-comments.php', __('Akismet Stats'), __('Akismet Stats'), 'manage_options', 'akismet-stats-display', 'akismet_stats_display');
}
add_action('admin_menu', 'wp_fluencycomments_akismet_stats_page');


function wp_fluency_options_page() {

	if ( isset($_POST['submit']) ) {
		if ( function_exists('current_user_can') && !current_user_can('manage_options') ) {
			die(__('Cheatin&#8217; uh?'));
		}
		
		if(isset($_POST['fluency_login_style'])){
			update_option('fluency_login_style', 'true');
		} else {
			update_option('fluency_login_style', 'false');
		}
		
		if(isset($_POST['fluency_login_logo'])){
			update_option('fluency_login_logo', strip_tags($_POST['fluency_login_logo']));
		} else {
			update_option('fluency_login_logo', '');
		}
		
		if(isset($_POST['fluency_menu_logo'])){
			update_option('fluency_menu_logo', strip_tags($_POST['fluency_menu_logo']));
		} else {
			update_option('fluency_menu_logo', '');
		}

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
					<th></th>
					<td class="submit"><input type="submit" name="submit" value="<?php _e('Update options &raquo;'); ?>" /></td>
				</tr>
			</tbody>
		</table>
	</form>
</div>
<?php
}

function wp_fluency_options_menu() {
	if ( function_exists('add_submenu_page') )
		add_options_page(__('Fluency Options'), __('Fluency Options'), 'manage_options', 'fluency-options', 'wp_fluency_options_page');
}
add_action('admin_menu', 'wp_fluency_options_menu');

?>