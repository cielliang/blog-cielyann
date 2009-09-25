<?php
/*
Plugin Name: Contact Me Widget
Plugin URI: http://www.contactmebutton.com
Description: Contact Me Widget allows all your readers and visitors the ability to communicate with you through Instant Messaging, Email, and your Contact Information.  You can share all your information from only one location on SocialShake.com.  With this widget their is no need to update previous blog posts and everywhere else when your information changes and to communicate with everyone.
Version: 2.2.6.4
Author: ContactMeButton.com
Author URI: http://www.contactmebutton.com
*/

/* no change */

class cmb_social_widget{


  /* Please do not modify any code. To update your settings please go to the settings menu from your wordpress dashboard. Thanks */

  function cmb_social_widget(){
     add_filter('the_content', array(&$this, 'social_widget'));
     add_filter('admin_menu', 'cmb_admin_menu');
     add_filter('plugin_action_links', 'cmb_links_setting', 10, 2);
	
     add_option('Contact_Me_Button_Username', 'YOUR-CONTACTMEBUTTON-USERNAME-HERE');
     add_option('Contact_Me_Button_DisplayName', 'YOUR-NAME-HERE');     
     add_option('Contact_Me_Button_buttonType', 'us');     
     add_option('Contact_Me_Button_overlay', 'true');     

  }

  function social_widget_doposts($content){

     for ($i=0; $i<10; $i++){
         $content .= $this->social_widget_post($i);
     }
     return $content;
  }





  function social_widget($content){
     $link  = urlencode(get_permalink());
     $title = urlencode(get_the_title($id));

     return $content . $this->social_widget_badge($link, $title);
  }

  function social_widget_post($entry){
     $link  = urlencode(get_permalink());
     $title = urlencode(get_the_title($id));
     if (!isset($link)){
       $widget_post  = $this->social_widget_badge($link, $title);
       $widget_post .= $this->social_widget_postit($entry);
     }
     return $widget_post;
  }

  function social_widget_badge($link, $title){
    $cmb_username = get_option('Contact_Me_Button_Username');
    $cmb_displayName = get_option('Contact_Me_Button_DisplayName');
    $pub = $this->cmb_username;
    
    if( get_option('Contact_Me_Button_overlay') == 'true'){
	    
	if( get_option('Contact_Me_Button_buttonType') == 'me'){
	
	
		$reply = "<a href=\"#\" id=\"contactmeimage\" onclick=\"showContactMe();return false;\"><img border=\"0\" src=\"http://www.contactmebutton.com/img/contactmebutton.png\" alt=\"contact me\" title=\"$cmb_displayName\" /></a><script type=\"text/javascript\" src=\"http://www.contactmebutton.com/scripts/initWidget.js\"></script><script type=\"text/javascript\" src=\"http://www.contactmebutton.com/js/jq/$cmb_username/$cmb_displayName.js\"></script>";
	    }else{
		$reply = "<a href=\"#\" id=\"contactmeimage\" onclick=\"showContactMe();return false;\"><img border=\"0\" src=\"http://www.contactmebutton.com/img/contactusbutton.png\" alt=\"contact me\" title=\"$cmb_displayName\" /></a><script type=\"text/javascript\" src=\"http://www.contactmebutton.com/scripts/initWidget.js\"></script><script type=\"text/javascript\" src=\"http://www.contactmebutton.com/js/jq/$cmb_username/$cmb_displayName.js\"></script>";
	    }

            
            
    }else{
           if( get_option('Contact_Me_Button_buttonType') == 'me'){
	
	
		$reply = "<a href=\"http://www.contactmebutton.com/contact-me/contact-widget.action?ss_username=$cmb_username&displayName=$cmb_displayName&addRef=t\" id=\"contactmeimage\" \"><img border=\"0\" src=\"http://www.contactmebutton.com/img/contactmebutton.png\" alt=\"contact me\" title=\"$cmb_displayName\" /></a><script type=\"text/javascript\" src=\"http://www.contactmebutton.com/scripts/initWidget.js\"></script>";
	    }else{
		$reply = "<a href=\"http://www.contactmebutton.com/contact-me/contact-widget.action?ss_username=$cmb_username&displayName=$cmb_displayName&addRef=t\" id=\"contactmeimage\" \"><img border=\"0\" src=\"http://www.contactmebutton.com/img/contactusbutton.png\" alt=\"contact me\" title=\"$cmb_displayName\" /></a><script type=\"text/javascript\" src=\"http://www.contactmebutton.com/scripts/initWidget.js\"></script>";
	    }


	    

    }


    return $reply;
  }

  function social_widget_postit($i){
     add_filter('the_content', array(&$this, 'social_widget'));
     $content = $this->social_widget($content);

     $cut = explode("|", $content);
     $post = $cut[0];
     $link  = $cut[1];
     return content . "<br />$link";
  }

}


function cmb_links_setting( $links, $file ){
 //Static so we don't call plugin_basename on every plugin row.
	static $this_plugin;

	if ( ! $this_plugin ) $this_plugin = plugin_basename(__FILE__);
	
	if ( $file == $this_plugin ){
		$settings_link = '<a href="options-general.php?page=cmb_social_widget.php">' . __('Contact Button Settings') . '</a>';
		array_unshift( $links, $settings_link ); // before other links
	}
	return $links;
}





function cmb_admin_menu()
{
    //add_options_page('Contact Me Button Plugin Options', 'Contact Me Button', 8, __FILE__, 'cmb_plugin_options');

	if( current_user_can('manage_options') ) {
		add_options_page(
			'Contact Me Button: '. __("Contact Me Button", "contact-me-widget"). " " . __("Settings")
			, __("Contact Me Button", "cmb_social_widget")
			, 8 
			, basename(__FILE__)
			, 'cmb_plugin_options'
		);
	}

}
function cmb_plugin_options()
{
?>
    <div class="wrap">
    <h2>Contact Me Button Settings</h2>

<p><i>
<strong>Note:</strong> If you haven't signed up for your <a href="http://www.contactmebutton.com/signup/signupButton.jsp" target="blank">free ContactMeButton.com account</a> you will need to signup which only takes a minute. ContactMeButton.com is where you enter your email address for the email widget to send an email to.  You can also list your IM username so the widget can send you an instant message. Also <a href="http://www.contactmebutton.com" target="blank">ContactMeButton.com is where you enter your contact information.</a> If you need to update your info in the future, simply log into your ContactMeButton.com account and update it.  Finally visit <a href="http://www.contactmebutton.com"target="blank">ContactMeButton.com</a> to get more widgets for your email signature and website.
</i></p>

To Complete the setup of your contact button please:
<ol>
  <li>Replace "YOUR-CONTACTMEBUTTON-USERNAME-HERE" with your username from contactmebutton.com</li>
  <li>Replace "YOUR-NAME-HERE" with your name to display ex. Company Name, Real Name, Nick name, etc.</li>
  <li>Click Save Changes</li>
</ol>

     <form method="post" action="options.php">
     <?php wp_nonce_field('update-options'); ?>

    <table class="form-table">
        <tr valign="top">
            <th scope="row"><?php _e("<strong>ContactMeButton.com username:</strong>", 'cmb_trans_domain' ); ?></th>
            <td><input type="text" size="40" name="Contact_Me_Button_Username" value="<?php echo get_option('Contact_Me_Button_Username'); ?>" /></td>

         </tr>
         <tr valign="top">
            <th scope="row"><?php _e("<strong>Display Name:</strong>", 'cmb_trans_domain' ); ?></th>
            <td><input type="text" size="40" name="Contact_Me_Button_DisplayName" value="<?php echo get_option('Contact_Me_Button_DisplayName'); ?>" /></td>
        </tr>
	<tr valign="top">
            <th scope="row"><?php _e("<strong>Overlay Blog:</strong>", 'cmb_trans_domain' ); ?></th>
            <td><input type="checkbox" name="Contact_Me_Button_overlay" value="true" <?php echo (get_option('Contact_Me_Button_overlay') == 'true' ? 'checked' : ''); ?>/></td>
        </tr>
        <tr valign="top">
            <th scope="row"><?php _e("<strong>Button Type:</strong>", 'cmb_trans_domain' ); ?></th>
            <td><input type="radio" name="Contact_Me_Button_buttonType" value="us" <?php echo (get_option('Contact_Me_Button_buttonType') == 'us' ? 'checked' : ''); ?> /><img src="http://www.contactmebutton.com/img/contactusbutton.png" alt="contact us button"/> or <input type="radio" name="Contact_Me_Button_buttonType" value="me" <?php echo (get_option('Contact_Me_Button_buttonType') == 'me' ? 'checked' : ''); ?> /><img src="http://www.contactmebutton.com/img/contactmebutton.png" alt="contact me button"/> </td>
        </tr>
        
    </table>

    &nbsp;

    <input type="hidden" name="action" value="update" />
    <input type="hidden" name="page_options" value="Contact_Me_Button_Username, Contact_Me_Button_DisplayName,Contact_Me_Button_buttonType, Contact_Me_Button_overlay"/>
<p class="submit">
    <input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" />
    </p>
    </form>

    </div>

<?php
 }


$cmb &= new cmb_social_widget();

?>