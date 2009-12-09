<?php
/*
Plugin Name: WP-CopyProtect [Protect your posts]
Plugin URI: http://www.thechetan.com/wp-copyprotect/
Description: This plug-in will protect your blog content [posts] from being copied. A simple plug-in developed to stop the Copy cats.
Version: 1.9
Author: Chetan Gole
Author URI: http://www.thechetan.com/
*/

/*
Copyright 2008  Chetan Gole, IN  (http://www.thechetan.com/)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details: http://www.gnu.org/licenses/gpl.txt
*/



// No right click - Problem for copy cats NO RIGHT CLICK
function CopyProtect_no_right_click($CopyProtect_click_message)
{
?>
<script type="text/javascript">
<!--

/***************************************************************************************************************
*Copyprotection for this site is provided by WP-CopyProtect v1.9 visit www.TheChetan.com/wp-copyprotect/ for more details
*RightClick Disabled, Please DO NOT COPY.
***************************************************************************************************************/

var message="<?php echo $CopyProtect_click_message; ?>";

///////////////////////////////////
function clickIE4(){
if (event.button==2){
alert(message);
return false;
}
}

function clickNS4(e){
if (document.layers||document.getElementById&&!document.all){
if (e.which==2||e.which==3){
alert(message);
return false;
}
}
}

if (document.layers){
document.captureEvents(Event.MOUSEDOWN);
document.onmousedown=clickNS4;
}
else if (document.all&&!document.getElementById){
document.onmousedown=clickIE4;
}

document.oncontextmenu=new Function("alert(message);return false")

// --> 
</script>

<?php
}

// No selection header - Now your content is protected from copy and paste guys
function CopyProtect_no_select()
{
?>
<script type="text/javascript">
/***************************************************************************************************************
*Copyprotection for this site is provided by WP-CopyProtect v1.9 visit www.TheChetan.com/wp-copyprotect/ for more details
*Selection Disabled, Please DO NOT COPY.
**************************************************************************************************************/
function disableSelection(target){
if (typeof target.onselectstart!="undefined") //For IE 
	target.onselectstart=function(){return false}
else if (typeof target.style.MozUserSelect!="undefined") //For Firefox
	target.style.MozUserSelect="none"
else //All other route (For Opera)
	target.onmousedown=function(){return false}
target.style.cursor = "default"
}

</script>

<?php
}

// No selection footer 
// Yes, You can remove this link from footer, but why ?, This plugin is protecting your content, so just donate me a backlink.
// If you are removing this link please consider adding me in your blogroll or write a post about this plugin.
function CopyProtect_no_select_footer()
{
?>
<script type="text/javascript">
disableSelection(document.body)
</script>
<small>Copy Protected by <a href="http://www.thechetan.com/" target="_blank">Chetan</a>'s <a href="http://www.thechetan.com/wp-copyprotect/" target="_blank">WP-CopyProtect</a>.</small>
<?php
}


// Tuning your WP-CopyProtect
function CopyProtect_options_page()
{
	if($_POST['CopyProtect_save']){
		update_option('CopyProtect_nrc',$_POST['CopyProtect_nrc']);
		update_option('CopyProtect_nts',$_POST['CopyProtect_nts']);
		update_option('CopyProtect_nrc_text',$_POST['CopyProtect_nrc_text']);

		echo '<div class="updated"><p>Commands accepted</p></div>';
	}
	$wp_CopyProtect_nrc = get_option('CopyProtect_nrc');
	$wp_CopyProtect_nts = get_option('CopyProtect_nts');
	?>
	<div class="wrap">
	<h1>WP-CopyProtect</h1> ver. 1.9
	| <a href="http://www.thechetan.com/wp-copyprotect/" target="_blank" title="Visit homepage of wordpress plugin WP-CopyProtect">Visit Plugin page</a> | <a href="http://www.thechetan.com/wp-copyprotect/#donate" target="_blank" title="Donate some amount to WP-CopyProtect plugin developer to help him to develope more such plugins">Donate</a> | <a href="http://www.thechetan.com/wp-copyprotect/#donors" target="_blank" title="Few power donors,special thanks to them">Power Donors</a> | 
	<h2>WP-CopyProtect Options</h2>
	<form method="post" id="CopyProtect_options">
		<fieldset class="options">
		<legend>Now, its the time to bang the copy cats.</legend>
		<legend>Select the proper options as per your needs</legend>
		<table class="form-table">
			
			<tr valign="top"> 
				<th width="33%" scope="row">Disable right mouse click:</th> 
				<td>
				<input type="checkbox" id="CopyProtect_nrc" name="CopyProtect_nrc" value="CopyProtect_nrc" <?php if($wp_CopyProtect_nrc == true) { echo('checked="checked"'); } ?> />
				check to activate <br />
				<input name="CopyProtect_nrc_text" type="text" id="CopyProtect_nrc_text" value="<?php echo get_option('CopyProtect_nrc_text') ;?>" size="30"/>
				This warning will be given to right clickers.
				</td> 
			</tr>
			<tr valign="top"> 
				<th width="33%" scope="row">Disable text selection:</th> 
				<td>
				<input type="checkbox" id="CopyProtect_nts" name="CopyProtect_nts" value="CopyProtect_nts" <?php if($wp_CopyProtect_nts == true) { echo('checked="checked"'); } ?> />
				check to activate. <a href="http://www.thechetan.com/wp-copyprotect/#kp" target="_blank">Not working ?</a>
				</td> 
			</tr>
			
		<tr>
        <th width="33%" scope="row">Save settings :</th> 
        <td>
		<input type="submit" name="CopyProtect_save" value="Save Settings" />
        </td>
        </tr>
		<tr>
        <th width="33%" scope="row">Please note :</th> 
        <td>
		
This is just a basic copy protect plug-in, if someone want to copy your content he/she can go to source of the blog and can easily copy the stuff from there. 
Most copy cats use your blogs <a href="/feed/" target="_blank">RSS feeds</a> to steal the content. Always select "Summary" at "For each article in a feed, show" in Wordpress admin panel "<a href="options-reading.php">Reading Settings</a>" so that even if someone try to copy your content from feeds he/she can not copy the whole post.
		
		</td>
        </tr>
		
		<tr>
        <th scope="row" style="text-align:right; vertical-align:top;">
        <td>
		<h3>Whats next ?</h3>
		<p>Why don't you <a href="/wp-admin/post-new.php">write a post</a> about <a href="http://www.thechetan.com/wp-copyprotect/" target="_blank">WP-CopyProtect</a> ?</p>
		<h3>Problems, Questions, Suggestions ?</h3>
		<p>Catch me on <a href="http://www.thechetan.com/wp-copyprotect/" target="_blank">WP-CopyProtect Homepage</a></p>
        </td>
        </tr>
		</table>
		<h3>Thank you</h3>
		Plug in developed by <a href="http://www.thechetan.com/" target="_blank">Chetan Gole</a>. <br />
		<small>Follow me on Twitter <a href="http://twitter.com/cchetanonline" target="_blank">@cchetanonline</a></small>
		</fieldset>
	</form>
	</table>
	</div>
	<?php
}

//We are calling you, function
function CopyProtect()
{

	$wp_CopyProtect_nrc = get_option('CopyProtect_nrc');
	$wp_CopyProtect_nts = get_option('CopyProtect_nts');
	$wp_CopyProtect_nrc_text = get_option('CopyProtect_nrc_text');
	$pos = strpos(strtolower(getenv("REQUEST_URI")), '?preview=true');
	
	if ($pos === false) {
		if($wp_CopyProtect_nrc == true) { CopyProtect_no_right_click($wp_CopyProtect_nrc_text); }
		if($wp_CopyProtect_nts == true) { CopyProtect_no_select(); }
	}
}

function CopyProtect_footer()
{
	$wp_CopyProtect_nts = get_option('CopyProtect_nts');

	if($wp_CopyProtect_nts == true) { CopyProtect_no_select_footer(); }
}

function CopyProtect_adminmenu()
{
	if (function_exists('add_options_page')) {	
		add_options_page('WP-CopyProtect', 'WP-CopyProtect', 9, basename(__FILE__),'CopyProtect_options_page');
	}
}

//  Commanding the Wordpress
add_action('wp_head','CopyProtect');
add_action('wp_footer','CopyProtect_footer');
add_action('admin_menu','CopyProtect_adminmenu',1);
?>
