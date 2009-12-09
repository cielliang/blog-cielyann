<?php
// register functions
add_action('admin_menu', array('pageOptions', 'add'));
/** page options */
class  pageOptions {

	function getOptions() {
		$options = get_option('page_options');
		if (!is_array($options)) {
			$options['menu_type'] = 'pages';
			$options['feed'] = false;
			$options['feed_url'] = '';
			$options['twitter'] = false;
			$options['twitter_username'] = '';
			$options['analytics'] = false;
			$options['analytics_content'] = '';
			$options['web_ads'] = false;
			$options['web_ads_content'] = '';
			update_option('page_options', $options);
		}
		return $options;
	}

	function add() {
		if(isset($_POST['page_save'])) {
			$options = pageOptions::getOptions();
			
			// menu
			$options['menu_type'] = stripslashes($_POST['menu_type']);

			
			// feed
			if ($_POST['feed']) {
				$options['feed'] = (bool)true;
			} else {
				$options['feed'] = (bool)false;
			}
			$options['feed_url'] = stripslashes($_POST['feed_url']);


			// twitter
			if ($_POST['twitter']) {
				$options['twitter'] = (bool)true;
			} else {
				$options['twitter'] = (bool)false;
			}
			$options['twitter_username'] = stripslashes($_POST['twitter_username']);

			// analytics
			if ($_POST['analytics']) {
				$options['analytics'] = (bool)true;
			} else {
				$options['analytics'] = (bool)false;
			}
			$options['analytics_content'] = stripslashes($_POST['analytics_content']);
			
			// web_ads
			if ($_POST['web_ads']) {
				$options['web_ads'] = (bool)true;
			} else {
				$options['web_ads'] = (bool)false;
			}
			$options['web_ads_content'] = stripslashes($_POST['web_ads_content']);

			update_option('page_options', $options);

		} else {
			pageOptions::getOptions();
		}

		add_theme_page(__('page-photo Options', 'page'), __('page-photo Options', 'page'), 'edit_themes', basename(__FILE__), array('pageOptions', 'display'));
	}

	function display() {
		$options = pageOptions::getOptions();
?>

<form action="#" method="post" enctype="multipart/form-data" name="page_form" id="page_form">
	<div class="wrap">
	<h2><?php _e('Theme Options [page-photo]', 'page'); ?></h2>
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><?php _e('Menubar', 'page'); ?></th>
					<td>
						<label style="margin-right:20px;">
							<input name="menu_type" type="radio" value="pages" <?php if($options['menu_type'] != 'categories') echo "checked='checked'"; ?> />
							 <?php _e('Show pages as menu.', 'page'); ?>
						</label>
						<label>
							<input name="menu_type" type="radio" value="categories" <?php if($options['menu_type'] == 'categories') echo "checked='checked'"; ?> />
							 <?php _e('Show categories as menu.', 'page'); ?>
						</label>
					</td>
				</tr>
			</tbody>
		</table>
		
		<table class="form-table">
		
			<tbody>
				<tr valign="top">
					<th scope="row"><?php _e('Feed', 'page'); ?></th>
					<td>
						<label>
							<input name="feed" type="checkbox" value="checkbox" <?php if($options['feed']) echo "checked='checked'"; ?> />
							 <?php _e('Custom feed.', 'page'); ?>
						</label>
						 <?php _e('URL:', 'page'); ?> <input type="text" name="feed_url" id="feed_url" class="code" size="60" value="<?php echo($options['feed_url']); ?>">
						<br/>
						
					</td>
				</tr>
			</tbody>
		</table>

		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><?php _e('Twitter', 'page'); ?></th>
					<td>
						<label>
							<input name="twitter" type="checkbox" value="checkbox" <?php if($options['twitter']) echo "checked='checked'"; ?> />
							 <?php _e('Add Twitter button.', 'page'); ?>
						</label>
						<br />
						 <?php _e('Twitter username:', 'page'); ?>
						 <input type="text" name="twitter_username" id="twitter_username" class="code" size="60" value="<?php echo($options['twitter_username']); ?>">
						<br />
						<a href="http://twitter.com/pagemod/" onclick="window.open(this.href);return false;">Follow me on twitter.</a>
					</td>
				</tr>
			</tbody>
		</table>

		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">
						<?php _e('Web Analytics', 'page'); ?>
						<br/>
						<small style="font-weight:normal;"><?php _e('HTML enabled', 'page'); ?></small>
					</th>
					<td>
						<label>
							<input name="analytics" type="checkbox" value="checkbox" <?php if($options['analytics']) echo "checked='checked'"; ?> />
							 <?php _e('Add web analytics code to your site. (e.g. Google Analytics, Yahoo! Web Analytics, ...)', 'page'); ?>
						</label>
						<label>
							<textarea name="analytics_content" cols="50" rows="10" id="analytics_content" class="code" style="width:98%;font-size:12px;"><?php echo($options['analytics_content']); ?></textarea>
						</label>
					</td>
				</tr>
			</tbody>
		</table>
				<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">
						<?php _e('Sponsored Ads', 'page'); ?>
						<br/>
						<small style="font-weight:normal;"><?php _e('HTML enabled', 'page'); ?></small>
					</th>
					<td>
						<label>
							<input name="web_ads" type="checkbox" value="checkbox" <?php if($options['web_ads']) echo "checked='checked'"; ?> />
							 <?php _e('Add Sponsored Ads code to your site. (e.g. Google adsense ...)(NOTE:width<=370px,above the besidecomment_sidebar)', 'page'); ?>
						</label>
						<label>
							<textarea name="web_ads_content" cols="50" rows="10" id="web_ads_content" class="code" style="width:98%;font-size:12px;"><?php echo($options['web_ads_content']); ?></textarea>
						</label>
					</td>
				</tr>
			</tbody>
		</table>

		<p class="submit">
			<input class="button-primary" type="submit" name="page_save" value="<?php _e('Save Changes', 'page'); ?>" />
		</p>

	</div>
</form>

<!-- donation -->
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
	<div class="wrap" style="background:#E3E3E3; margin-bottom:1em;">
			<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">Donation</th>
					<td>
						If you would like to support this theme by providing a donation of any amount, please use the button below to donate using PayPal. Your support is appreciated. And it is a nice way of saying Thanks.
						<br />
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
<input type="image" style="border:none;" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypal.com/zh_XC/i/scr/pixel.gif" width="1" height="1">
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</form>

<form>
<div class="wrap" style="background:#E3E3E3; margin-bottom:1em;">
		<table class="form-table">
			<tbody>
				<tr valign="top">
				<th scope="row">Contact theme author</th>
					<td>If you have questions about this theme, please feel free to contact me. BTW no spam plz^-^.<br/>
email:pagemod.cn@gmail.com
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</form>



<?php
}}
if( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'bottom_sidebar',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => 'besidecomment_sidebar',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	}
?>