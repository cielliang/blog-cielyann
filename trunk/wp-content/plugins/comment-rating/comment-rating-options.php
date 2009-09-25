<?php
/*
Author: Bob King
Author URI: http://WealthyNetizen.com/
License: Copyright 2009 Bob King.  http://WealthyNetizen.com/

    The program is distributed under the terms of the GNU General
    Public License GPLv3.

    This file is part of Comment Rating Wordpress plugin

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
?>
   <p> 
   The Comment Rating plugin can automatically insert
   ratings and images into comments. You can also turn off
   auto-insertion and customize your theme in
   the "comments.php" file within the "Comments Loop" with the following line.
   <br/>
      if(function_exists(ckrating_display_karma)) { ckrating_display_karma(); }
   </p>
   <br/>

   <form id="ckrating_option" name="ckrating_option" action="options-general.php?page=ckrating" method="post">

   <table style="margin-bottom:5px">
   <tr>
   <th style="text-align:left;" colspan="2">
   </th>
   </tr>
   <tr>
   <td>
      Turn on Auto-insert into comments:
   </td>
   <td>
      <select name="ckrating_auto_insert" id="ckrating_auto_insert">
<?php
   if (get_option('ckrating_auto_insert') == 'yes')
      print('<option selected="selected" value="yes">Yes</option>
            <option value="no">No</option>');
   else 
      print('<option value="yes">Yes</option>
            <option selected="selected" value="no">No</option>');
?>
   </select>
   </td>
   </tr>
   <tr>
   <td>
      Position the images above or below comments:
   </td>
   <td>
     <select name="ckrating_position" id="ckrating_position">
<?php
   if (get_option('ckrating_position') == 'below')
      print('<option selected="selected" value="below">Below</option>
             <option value="above">Above</option>');
   else
      print('<option value="below">Below</option>
             <option selected="selected" value="above">Above</option>');
?>
   </select>
   </td>
   </tr>
   <tr>
   <td>
       Words before the rating images:
   </td>
   <td>
      <input type="text" size="25" name="ckrating_words" value="<?php echo get_option('ckrating_words'); ?>">
   </td>
   </tr>
   <tr>
   <td>
      Highly-rated comments have (Likes - Dislikes) >=
   </td>
   <td>
      <input type="text" size="2" name="ckrating_goodRate"
      value="<?php echo get_option('ckrating_goodRate'); ?>"> 
   </td>
   </tr>
   <tr>
   <td>
       Style highly-rated comment with:
   </td>
   <td>
      <input type="text" size="50" name="ckrating_styleComment"
      value="<?php echo get_option('ckrating_styleComment'); ?>">
   </td>
   </tr>
   <tr>
   <td>
      Poorly-rated comments have (Dislikes - Likes) >=
   </td>
   <td>
      <input type="text" size="2" name="ckrating_negative" value="<?php echo get_option('ckrating_negative'); ?>"> 
   </td>
   </tr>
   <tr>
   <td>
       Turn on Auto-hide poorly-rated comments: 
   </td>
   <td>
   <select name="ckrating_hideComment" id="ckrating_hideComment">
<?php
   if (get_option('ckrating_hideComment') == 'yes')
      print('<option selected="selected" value="yes">Yes</option>
            <option value="no">No</option>');
   else 
      print('<option value="yes">Yes</option>
            <option selected="selected" value="no">No</option>');
?>
   </select>
   </td>
   </tr>
   <tr>
   <td>
      Style poorly-rated comments as:
   </td>
   <td>
       <input type="text" size="50" name="ckrating_hide_style" value="<?php echo get_option('ckrating_hide_style') ?>">
   </td>
   </tr>
   <tr>
   <td>
       Turn off rating for comments by admin/author :
   </td>
   <td>
   <select name="ckrating_admin_off" id="ckrating_admin_off">
<?php
   if (get_option('ckrating_admin_off') == 'yes')
      print('<option selected="selected" value="yes">Yes</option>
            <option value="no">No</option>');
   else 
      print('<option value="yes">Yes</option>
            <option selected="selected" value="no">No</option>');
?>
   </select>
   </td>
   </tr>
   <tr>
   <td>
       Show two vote values, one combined or both:
   </td>
   <td>
   <select name="ckrating_value_display" id="ckrating_value_display">
<?php
   if (get_option('ckrating_value_display') == 'one')
      print('<option selected="selected" value="one">One</option>
            <option value="two">Two</option>
            <option value="three">Three</option>');
   else if (get_option('ckrating_value_display') == 'two')
      print('<option value="one">One</option>
            <option selected="selected" value="two">Two</option>
            <option value="three">Three</option>');
   else
      print('<option value="one">One</option>
            <option value="two">Two</option>
            <option selected="selected" value="three">Three</option>');
?>
   </select>
   </td>
   </tr>
   <tr>
   <td>
      Style the Likes number as:
   </td>
   <td>
       <input type="text" size="50" name="ckrating_likes_style" value="<?php echo get_option('ckrating_likes_style') ?>">
   </td>
   </tr>
   <tr>
   <td>
      Style the DisLikes number as:
   </td>
   <td>
       <input type="text" size="50" name="ckrating_dislikes_style" value="<?php echo get_option('ckrating_dislikes_style') ?>">
   </td>
   </tr>
   <tr>
   <td>
      Select the image style:
   </td>
   <td>
       <input type="radio" name="ckrating_image_index" value="1"
          <?php if (get_option('ckrating_image_index') == 1) echo 'checked';?> >
       <img src="<?php echo get_bloginfo('url').'/wp-content/plugins/comment-rating/images/1_16_up.png'; ?>" /><img src="<?php echo get_bloginfo('url').'/wp-content/plugins/comment-rating/images/1_16_down.png'; ?>" />
       <input type="radio" name="ckrating_image_index" value="2"
          <?php if (get_option('ckrating_image_index') == 2) echo 'checked';?> >
       <img src="<?php echo get_bloginfo('url').'/wp-content/plugins/comment-rating/images/2_16_up.png'; ?>" /><img src="<?php echo get_bloginfo('url').'/wp-content/plugins/comment-rating/images/2_16_down.png'; ?>" />
   </td>
   </tr>
   <tr>
   <td>
      Select the image size (in pixels):
   </td>
   <td>
      <select name="ckrating_image_size" id="ckrating_image_size">
         <option <?php if (get_option('ckrating_image_size') == 14) echo 'selected="selected"';?> value="14">14</option>
         <option <?php if (get_option('ckrating_image_size') == 16) echo 'selected="selected"';?> value="16">16</option>
         <option <?php if (get_option('ckrating_image_size') == 20) echo 'selected="selected"';?> value="20">20</option>
      </select>
   </td>
   </tr>
   <tr> <td> <br/></td> <td> </td> <br/> </tr>
   <tr>
   <td>
   <input type="hidden" name="ckrating_hidden" value="Y">
   <input type="submit" class="button-primary" value="Update options" />
   </td>
   <td>
   <input type="submit" class="button-primary" name="Reset" value="Reset options to default" />
   <br/><b>If you see any blank value above,<br/>please reset everything to default first.</b>
   </td>
   </tr>
</table>
</form>
   <br/>
   <p> <b>Note:</b> the highly-rated comment styling uses the new
   comment_class filter (introduced in Wordpress 2.7). If your
   theme doesn't use Wordpress 2.7 wp_list_comments(),
   you'll only see the comment text background being styled/highlighted. To
   fix the problem, you need to add comment_class into your existing
   theme. For example code, please see <a
   href="http://brassblogs.com/blog/wordpress-27-and-comment-display">here</a>
   </p>

<h2>News</h2> <ul style="list-style-type:disc;margin-left: 15px; margin-right:20px;">
<?php
   require_once(ABSPATH . WPINC . '/rss.php');
		
   $resp = _fetch_remote_file('http://WealthyNetizen.com/feed/');
   if ( is_success( $resp->status ) ) {
      $rss =  _response_to_rss( $resp );			
      $blog_posts = array_slice($rss->items, 0, 3);
      
      $posts_arr = array();
      foreach ($blog_posts as $item) {
         echo '<li><a href="'.$item['link'].'">'.$item['title'].'</a><br>'.$item['description'].'</li>';
      }
   } 
   print('</ul>');
?>
</div>
