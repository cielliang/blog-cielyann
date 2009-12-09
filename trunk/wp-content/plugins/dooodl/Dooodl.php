<?php
/*
Plugin Name: Dooodl! 
Plugin URI: http://nocreativity.com/blog/dooodls-for-everyone
Description: Enables your blog's visitors to draw a little Doodle and save it to your site. Powered by AMFPHP and TiltViewer! Best integration with ShadowBox-JS!
Version: 1.0.10
Author: Ronny Welter
Author URI: http://noCreativity.com
*/

/*  Copyright 2009  Ronny Welter  (email : senderHas@noCreativity.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


require_once("globals.php");

$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'dooodl_actlinks' ); 


add_action('admin_menu', 'Dooodl_menu');//add Admin menu
//add_action('admin_init', 'register_dooodl_settings' );//registers setting to update options

add_action('plugins_loaded', 'Dooodl_init');// Add widget once plugins are loaded.
register_activation_hook(__FILE__,'Dooodl_install');//Hook the install function to the activation of the plugin. (Otherwise we can't access the table for this plugin!)
register_deactivation_hook(__FILE__, 'Dooodl_uninstall');//Uninstall the database and files upon deactivation
add_action('wp_head', 'Dooodl_head');
add_action('wp_footer', 'Dooodl_autoLoad',15); // Add the badge's CSS to the head.


function dooodl_actlinks( $links ) { 
	 // Add a link to this plugin's settings page
	 $settings_link = '<a href="options-general.php?page=wp-dooodl">Settings</a>'; 
	 array_unshift( $links, $settings_link ); 
	 return $links; 
}



function Dooodl_install(){
	global $wpdb;
	global $dooodl_table_name;
	global $dooodl_db_version;

	//prepare table name (get the WP table prefix!)
	$table_name = $wpdb->prefix . $dooodl_table_name;
	
   //if the table does not yet exist...
   if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
		//create the table
		$sql = "
			CREATE TABLE " . $table_name . " (
			id int(11) NOT NULL auto_increment,
		  	timestamp timestamp NOT NULL default CURRENT_TIMESTAMP,
		  	title text NOT NULL,
		  	url text NOT NULL,
		  	description blob NOT NULL,
		  	username varchar(25) NOT NULL,
		  	PRIMARY KEY  (id)
			);";
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
		
		//set up initial data
		$def_title = "Oh hai!";
		$def_username = "Mr. Doodl";
		$def_description = "This is the first Dooodl created with the Dooodl Creator!";
		$def_url = "http://nocreativity.com";
		
		$firstRow = "	INSERT INTO ". $table_name ." (`title`, `url`, `description`, `username`) 
						VALUES ('". $wpdb->escape($def_title) ."', '". $wpdb->escape($def_url) ."', '". $wpdb->escape($def_description) ."', '". $wpdb->escape($def_username) ."');";
		
		$results = $wpdb->query( $firstRow );
		
	}
	
	
	if(!file_exists(WP_CONTENT_DIR."/uploads/doodls")){
		mkdir(WP_CONTENT_DIR."/uploads/doodls");
		copy(WP_PLUGIN_DIR."/". str_replace(basename( __FILE__),"",plugin_basename(__FILE__)) ."doodls/1.jpg", WP_CONTENT_DIR."/uploads/doodls/1.jpg");
	}
	
	add_option("dooodl_db_version", $dooodl_db_version);
	add_option("dooodl_remove_images", "");
	add_option("dooodl_uninstall_tables","");
	
	
}





function Dooodl_uninstall(){
	global $wpdb;
	global $dooodl_table_name;
	
	if(get_option('dooodl_remove_images')=="on"){
			
		//delete the files
		if ($dir = opendir(WP_CONTENT_DIR."/uploads/doodls/")) {
			while (false !== ($file = readdir($dir))) {
				 if (is_file(WP_CONTENT_DIR."/uploads/doodls/".$file)) {
					unlink(WP_CONTENT_DIR."/uploads/doodls/".$file);
				}
			}
			closedir($dir);
		}
	
		//delete the folder itself
		rmdir(WP_CONTENT_DIR."/uploads/doodls/");
	}
	
	if(get_option('dooodl_uninstall_tables')=='on'){
		//drop the tables
		$wpdb->query("DROP TABLE ". $wpdb->prefix.$dooodl_table_name);
	}
	
	//get rid of the option values
	delete_option("dooodl_db_version");
	delete_option("dooodl_remove_images");
	delete_option("dooodl_uninstall_tables");
	
}

function Dooodl_widget($args=NULL){
		if($args != NULL){
			extract($args);
		}
		global $wpdb;
		global $dooodl_table_name;
		
		$table_name = $wpdb->prefix . $dooodl_table_name;
		
		$html="";
		
		$sql = " 	SELECT 
						id, username, title
					FROM ". $table_name ."
					ORDER BY id DESC
					LIMIT 0 , 1 ";
		
		$result = $wpdb->get_row($sql);
		$html = '<a rel="shadowbox" href="'. WP_CONTENT_URL.'/uploads/doodls/'.$result->id.'.jpg" target="_blank"><img style="float:left; margin-right:5px; margin-bottom:5px;" height="120" src="'. WP_CONTENT_URL.'/uploads/doodls/'.$result->id.'.jpg"/></a>最新的Doodle: <br/><b>'.$result->title.'</b> by <b>'. $result->username.'</b> <br/> ';
				
		
		echo $before_widget; 
		
		?>
		<h2 class="widgettitle" style="margin-left:5px;">Dooodl! 乱画!</h2>
        <div>
       	<?
		echo $html;
		?>
       	<br/>
        <a onclick="updateURL('#dooodlviewer')" rel="shadowbox;width=880;height=600;player=iframe;options={onClose:function(){checkURL()}}" href="<?= WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)) ?>s#theviewer" target="_blank">单击这里</a> 浏览所有访客的Dooodl!
        
        <br clear="all"/>
        
         如果你也想乱画一通， <a onclick="updateURL('#drawadooodl')" rel="shadowbox;width=700;height=400;player=iframe;options={onClose:function(){checkURL()}}" href="<?= WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)) ?>creator" target="_blank">单击这里</a>，就可以在这上面留下你的 dooodl 啦！
        
        </div>
		<br clear="all"/>
  
        <? 
		
		echo $after_widget;
	}





function Dooodl_init(){
	if ( !function_exists('register_sidebar_widget') || !function_exists('register_widget_control') )
		return; 

		// Admin controls - insert your name here!!
		function Dooodl_widget_control() {
			/*
			$options = get_option('Dooodl_widget');
			$newOptions = $options;

			// if submitted, clean up stuff
			if ($_POST['twitter-badge-submit']==1){
				$newOptions['twittername'] = strip_tags(stripslashes($_POST['twitter-badge-twittername']));
			}

			if ( $options != $newOptions ){
				$options = $newOptions;
				update_option('Dooodl_widget', $options,' ', true);
			}

			$twittername = htmlspecialchars($options['twittername'], ENT_QUOTES);
			*/
			
	// Control form
	/*
			<div>
				<label for="twitter-badge-twittername">Twitter username: <input type="text" name="twitter-badge-twittername" value="<?php echo $twittername ?>"/></label>
				<input type="hidden" name="twitter-badge-submit" id="twitter-badge-submit" value="1" />
				<p>Don't forget to click the Save Changes button after closing this option window.</p>
                
			</div>*/
		}

		// Register widget & control
		register_sidebar_widget('Dooodl!', 'Dooodl_widget');
		register_widget_control('Dooodl!', 'Dooodl_widget_control');
}





function Dooodl_menu(){
	add_options_page('Dooodl options', 'Dooodl', 8, 'wp-dooodl', 'Dooodl_settings_panel');
}






function register_dooodl_settings(){
	 register_setting( 'dooodl_settings_uninstall', 'dooodl_uninstall_tables' );
	 register_setting( 'dooodl_settings_uninstall', 'dooodl_remove_images' );
}





function Dooodl_settings_panel(){
	?>
    <div class="wrap">
<h2>Dooodl! Settings</h2>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>


<table style="width:90%;" class="form-table">

<tr valign="top">
<th style="width:60%;" scope="row">Drop tables upon plugin deactivation? (This <strong>cannot</strong> be undone!)</th>
<td><input type="checkbox" name="dooodl_uninstall_tables" <? if(get_option('dooodl_uninstall_tables')=="on"){ ?> checked="checked" <? } ?> /></td>
</tr>
 
<tr valign="top">
<th scope="row">Delete doodles (the images your visitors submitted) upon plugin deactivation? (This <strong>cannot</strong> be undone!)</th>
<td><input type="checkbox" name="dooodl_remove_images"<? if(get_option('dooodl_remove_images')=="on"){ ?> checked="checked" <? } ?> /></td>
</tr>



</table>


<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="dooodl_remove_images,dooodl_uninstall_tables" />

    
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>

</form>
</div>

    
    <?
}



function Dooodl_head(){	
	?>
    
    <script type="text/javascript" src="<?= WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)) ?>client.php"></script>
    
    <?
}

function Dooodl_autoLoad() {
	?>	
		<script type="text/javascript">
			jQuery(window).ready(testForAutoload);
        </script>
	<?
}




?>