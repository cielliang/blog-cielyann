<?php
	/*
	Plugin Name: Comment Rating
	Plugin URI: http://wealthynetizen.com/wordpress-plugin-comment-rating/
	Description: Allows visitors to rate comments in a Like vs.  Dislike fashion with clickable images. Poorly-rated & highly-rated comments can be displayed differently. This plugin is simple and light-weight.  Configure it at <a href="options-general.php?page=ckrating">Settings &rarr; Comment Rating</a>. 
	Author: Bob King
	Author URI: http://wealthynetizen.com
	Version: 2.6.1
	*/ 

	/*
   Copyright 2009, Bob King, http://wealthynetizen.com

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
	Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
	*/

define('COMMENTRATING_PATH' , WP_CONTENT_DIR.'/plugins/'.plugin_basename(dirname(__FILE__)) );

add_action('comment_post', 'ckrating_comment_posted');//Hook into WordPress
add_action('admin_menu', 'ckrating_options_page');
add_action('wp_head', 'ckrating_add_highlight_style');
add_filter('comment_text', 'ckrating_display_filter'); // add comment rating icons 
add_filter('comment_class', 'ckrating_comment_class', 10 , 4 );
add_action('init', 'ckrating_add_javascript');  // add javascript in the footer


	global $table_prefix, $wpdb;
		
	$table_name = $table_prefix . "comment_rating";
	if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name)
	{
		ckrating_install();
	}
   // ckrating_admin_off is the last option added.
   if (!get_option('ckrating_admin_off')) ckrating_reset_default();

function ckrating_options_page(){
   add_options_page('Comment Rating Options', 'Comment Rating', 8, 'ckrating', 'ckrating_show_options_page');
}

function ckrating_show_options_page() {
   if ($_POST[ 'ckrating_hidden' ] == 'Y') {
      if (isset($_POST['Reset'])) {
         ckrating_reset_default();
		   echo '<div id="message" class="updated fade"><p><strong>Comment Rating Options are set to default.</strong></p></div>';
      }
      else {
         update_option('ckrating_auto_insert', $_POST['ckrating_auto_insert']);
         update_option('ckrating_position', $_POST['ckrating_position']);
         update_option('ckrating_words', urldecode($_POST['ckrating_words']));
         update_option('ckrating_hideComment', $_POST['ckrating_hideComment']);
         update_option('ckrating_goodRate', $_POST['ckrating_goodRate']);
         update_option('ckrating_styleComment', $_POST['ckrating_styleComment']);
         update_option('ckrating_negative', (int)($_POST['ckrating_negative'])); 
         update_option('ckrating_hide_style', urldecode($_POST['ckrating_hide_style']));
         update_option('ckrating_admin_off', $_POST['ckrating_admin_off']);
         update_option('ckrating_value_display', $_POST['ckrating_value_display']);
         update_option('ckrating_likes_style', $_POST['ckrating_likes_style']);
         update_option('ckrating_dislikes_style', $_POST['ckrating_dislikes_style']);
         update_option('ckrating_image_index', $_POST['ckrating_image_index']);
         update_option('ckrating_image_size', $_POST['ckrating_image_size']);
         echo '<div id="message" class="updated fade"><p><strong>Comment Rating Options updated.</strong></p></div>';
      }
   }
?>
   <div class="wrap">
   <div id="icon-options-general" class="icon32">
   <br/>
   </div>
   <h2>Comment Rating Options</h2>
   <br/>
<?php 
   if (0 == get_option('ckrating_show_thankyou') % 3)
      print('
         <div style="width: 75%; background-color: yellow;">
         <em><b> Thank you for choosing Comment Rating.  If you like the
         plugin, please help promoting its use. You can rate it at
         <a href="http://wordpress.org/extend/plugins/comment-rating/">WordPress.org Plugins</a>.
         </b>
         </em>
         </div>
         ');
   update_option('ckrating_show_thankyou', get_option('ckrating_show_thankyou')+1);

	include(COMMENTRATING_PATH.'/comment-rating-options.php');
}

// set the default values to options
function ckrating_reset_default() {
   update_option('ckrating_auto_insert', 'yes');
   update_option('ckrating_position', 'below');
   update_option('ckrating_words', 'Like or Dislike:');
   update_option('ckrating_hideComment', 'yes');
   update_option('ckrating_negative', 3); 
   update_option('ckrating_goodRate', 4); 
   update_option('ckrating_styleComment', 'background-color:#FFFFCC !important');
   update_option('ckrating_hide_style', 'opacity:0.4;filter:alpha(opacity=40)');
   update_option('ckrating_admin_off', 'no');
   update_option('ckrating_value_display', 'two');
   update_option('ckrating_likes_style', 'font-size:12px; color:#009933');
   update_option('ckrating_dislikes_style', 'font-size:12px; color:#990033');
   update_option('ckrating_image_index', 1);
   update_option('ckrating_image_size', 14);
}

function ckrating_install() //Install the needed SQl entries.
{
   global $table_prefix, $wpdb;

   $table_name = $table_prefix . "comment_rating";

   $sql = 'DROP TABLE `' . $table_name . '`';  // drop the existing table
   mysql_query($sql);
   $sql = 'CREATE TABLE `' . $table_name . '` (' //Add table
      . ' `ck_comment_id` BIGINT(20) NOT NULL, '
      . ' `ck_ips` BLOB NOT NULL, '
      . ' `ck_rating_up` INT,'
      . ' `ck_rating_down` INT'
      . ' )'
      . ' ENGINE = myisam;';
   mysql_query($sql);
   $sql = 'ALTER TABLE `' . $table_name . '` ADD INDEX (`ck_comment_id`);';  // add index
   mysql_query($sql);

   echo "comment_rating tables created";
       
   $ck_result = mysql_query('SELECT comment_ID FROM ' . $table_prefix . 'comments'); //Put all IDs in our new table
   while($ck_row = mysql_fetch_array($ck_result, MYSQL_ASSOC)) //Wee loop
   {
      mysql_query("INSERT INTO $table_name (ck_comment_id, ck_ips, ck_rating_up, ck_rating_down) VALUES ('" . $ck_row['comment_ID'] . "', '', 0, 0)");
   }
}

function ckrating_comment_posted($ck_comment_id) //When comment posted this executes
{
   global $table_prefix, $wpdb;
   $table_name = $table_prefix . "comment_rating";
   mysql_query("INSERT INTO $table_name (ck_comment_id, ck_ips, ck_rating_up, ck_rating_down) VALUES ('" . $ck_comment_id . "', '" . getenv("REMOTE_ADDR") . "', 0, 0)"); //Adds the new comment ID into our made table, with the users IP
}

function ckrating_display_content()
{
   global $table_prefix, $wpdb;

   $plugin_path = get_bloginfo('url').'/wp-content/plugins/comment-rating';
   $ck_link = str_replace('http://', '', get_bloginfo('url'));
   $ck_comment_ID = get_comment_ID();
   $content = '';
   
   $table_name = $table_prefix . "comment_rating";
   $ck_sql = "SELECT ck_ips, ck_rating_up, ck_rating_down FROM `$table_name` WHERE ck_comment_id = $ck_comment_ID";
   $ck_result = mysql_query($ck_sql);
   
   if(!$ck_result)
   { mysql_error(); }
   else if(!$ck_row = mysql_fetch_array($ck_result, MYSQL_ASSOC))
   { mysql_error(); }
   else {
      $imgIndex = get_option('ckrating_image_index') . '_' . get_option('ckrating_image_size') . '_';
      if(strstr($ck_row['ck_ips'], getenv("REMOTE_ADDR"))) {
         $imgUp = $imgIndex . "gray_up.png";
         $imgDown = $imgIndex . "gray_down.png";
         $imgStyle = 'style="padding: 0px; border: none;"';
         $onclick_add = '';
         $onclick_sub = '';
      }
      else {
         $imgUp = $imgIndex . "up.png";
         $imgDown = $imgIndex . "down.png";
         $imgStyle = 'style="padding: 0px; border: none; cursor: pointer;" onmouseover="this.width=this.width*1.3" onmouseout="this.width=this.width/1.2"';
         $onclick_add = "onclick=\"javascript:ckratingKarma('$ck_comment_ID', 'add', '{$ck_link}/wp-content/plugins/comment-rating/', '$imgIndex');\" title=\"Thumb up\"";
         $onclick_sub = "onclick=\"javascript:ckratingKarma('$ck_comment_ID', 'subtract', '{$ck_link}/wp-content/plugins/comment-rating/', '$imgIndex')\" title=\"Thumb down\"";
      }

      $total = $ck_row['ck_rating_up'] - $ck_row['ck_rating_down'];
      if ($total > 0) $total = "+$total";
      //Use onClick for the image instead, fixes the style link underline problem as well.
      $content .= '<p>' . get_option('ckrating_words') .  " <img $imgStyle id=\"up-$ck_comment_ID\" src=\"{$plugin_path}/images/$imgUp\" alt=\"Thumb up\" $onclick_add />";
      $likesStyle = 'style="' . get_option('ckrating_likes_style') .  ';"';
      $dislikesStyle = 'style="' . get_option('ckrating_dislikes_style') .  ';"';
      if ( get_option('ckrating_value_display') == 'two' ||
           get_option('ckrating_value_display') == 'three' )
         $content .= " <small id=\"karma-{$ck_comment_ID}-up\" $likesStyle>{$ck_row['ck_rating_up']}</small>";
      $content .= "&nbsp;<img $imgStyle id=\"down-$ck_comment_ID\" src=\"{$plugin_path}/images/$imgDown\" alt=\"Thumb down\" $onclick_sub />"; //Phew
      if ( get_option('ckrating_value_display') == 'two' ||
           get_option('ckrating_value_display') == 'three' )
         $content .= " <small id=\"karma-{$ck_comment_ID}-down\" $dislikesStyle>{$ck_row['ck_rating_down']}</small>";

      $totalStyle = '';
      if ($total > 0) $totalStyle = $likesStyle;
      else if ($total < 0) $totalStyle = $dislikesStyle;
      if ( get_option('ckrating_value_display') == 'one' )
         $content .= " <small id=\"karma-{$ck_comment_ID}-total\" $totalStyle>{$total}</small>";
      if ( get_option('ckrating_value_display') == 'three' )
         $content .= " (<small id=\"karma-{$ck_comment_ID}-total\" $totalStyle>{$total}</small>)";
      $content .= "</p>";
   }
   return array($content, $ck_row['ck_rating_up'], $ck_row['ck_rating_down']);
}

function ckrating_display_filter($text)
{
   $ck_comment_ID = get_comment_ID();
   $ck_comment = get_comment($ck_comment_ID); 
   $ck_comment_author = $ck_comment->comment_author;
   $ck_author_name = get_the_author();
   
   if (get_option('ckrating_admin_off') == 'yes' && 
       ($ck_author_name == $ck_comment_author || $ck_comment_author == 'admin')
      )
      return $text;

   $arr = ckrating_display_content();

   if (((int)$arr[1] - (int)$arr[2]) >= (int)get_option('ckrating_goodRate')) {
      $text = '<div style="' .  get_option('ckrating_styleComment') . '">' .
               $text .  '</div>';
   }

   if (get_option('ckrating_hideComment') == 'yes') {
      if ( ((int)$arr[2] - (int)$arr[1])>= (int)get_option('ckrating_negative') )
      {
         $text = '<p>Hidden due to low <a href="http://wealthynetizen.com/wordpress-plugin-comment-rating/" title="Rated by other readers">comment rating</a>.' . 
                 " <a href=\"javascript:crSwitchDisplay('ckhide-$ck_comment_ID');\" title=\"Click to see comment\">Click here to see</a>.</p>" .
                 "<div id='ckhide-$ck_comment_ID' style=\"display:none; ".get_option('ckrating_hide_style').';">' .
                 $text .
                 "</div>";
      }
   }

   // No auto insertion of images and ratings
   if (get_option('ckrating_auto_insert') != 'yes')
      return $text;

   if (get_option('ckrating_position') == 'below')
      return $text . $arr[0];
   else
      return $arr[0] . $text;
}

function ckrating_display_karma()
{
   $arr = ckrating_display_content();
   print $arr[0];
}

function ckrating_add_javascript() {
   wp_enqueue_script('comment-rating', plugins_url('comment-rating/ck-karma.js'), array(), false, true);
}

function ckrating_add_highlight_style() {
   echo '
<!-- Comment Rating plugin by Bob King, http://wealthynetizen.com/, dynamic comment styling. --> 
<style type="text/css" media="screen">
   .ckrating_highly_rated {'. get_option('ckrating_styleComment') . ';}
   .ckrating_poorly_rated {'. get_option('ckrating_hide_style') . ';}
</style>

';
}

function ckrating_comment_class (  $classes, $class, $comment_id, $page_id){
   global $table_prefix, $wpdb;
   //get the comment object, in case $comment_id is not passed.
   $ck_comment_ID = get_comment_ID();
   
   $table_name = $table_prefix . "comment_rating";
   $ck_sql = "SELECT ck_ips, ck_rating_up, ck_rating_down FROM `$table_name` WHERE ck_comment_id = $ck_comment_ID";
   $ck_result = mysql_query($ck_sql);
   
   if(!$ck_result)
   { mysql_error(); }
   else if(!$ck_row = mysql_fetch_array($ck_result, MYSQL_ASSOC))
   { mysql_error(); }
   else if ( ((int)$ck_row['ck_rating_up'] - (int)$ck_row['ck_rating_down'])
              >= (int)get_option('ckrating_goodRate')) {
      //add comment highlighting class
      $classes[] = "ckrating_highly_rated";
   }
   else if ( ((int)$ck_row['ck_rating_down'] - (int)$ck_row['ck_rating_up'])
            >= (int)get_option('ckrating_negative')) {
      //add hiding comment class
      $classes[] = "ckrating_poorly_rated";
   }
    
   //send the array back
   return $classes;
}

?>
