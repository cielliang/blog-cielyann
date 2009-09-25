<?php
/*
Plugin Name: Twitter Avatar
Plugin URI: http://businessxpand.com
Description: Allows a User to enter their Twitter username when posting a comment on your blog and a link to their Twitter page will appear next to their comment. This plugin will also replace the avatar on the comment with their picture on Twitter.

Two small changes to your theme's comments.php file is needed for this plugin to work correctly. 
Author: BusinessXpand.com
Version: 0.9
Author URI: http://businessxpand.com
*/

/**
 * @package Twitter Avatar
 * @author BusinessXpand.com
 * @version 0.9
 */

/**
 * Twitter Avatar
 *
 * @copyright 2009 Business Xpand
 * @license GPL v2.0
 * @author Thomas McGregor
 * @version 0.9
 * @link http://www.businessxpand.com/
 * @since File available since Release 0.9
 */

if( !class_exists('twitter_avatar') ) {
		class twitter_avatar {
				function twitter_avatar()
				{
						add_action( 'comment_post', array( &$this,'update_comment_twitter' ) );
						add_filter( 'get_avatar', array(&$this, 'get_twitter_avatar' ), 1, 1 );
						register_activation_hook( __FILE__, array( &$this, 'init' ) );
				}
		
				function init() 
				{
					global $wpdb;
				
					if($wpdb->get_var("SHOW TABLES LIKE '" . $wpdb->prefix . "comments_meta'") != $wpdb->prefix.'comments_meta') {
						$sql = "CREATE TABLE `" . $wpdb->prefix . "comments_meta` (
										`comments_meta_id` BIGINT( 20 ) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
										`comment_id` BIGINT( 20 ) UNSIGNED NOT NULL ,
										`meta_key` VARCHAR( 255 ) NULL DEFAULT NULL ,
										`meta_value` LONGTEXT NULL DEFAULT NULL
										)";
						
						require_once(ABSPATH . 'wp-admin/upgrade-functions.php');
						dbDelta($sql);
					}
				}
				
				function update_comment_twitter($comment_id)
				{
						if( isset($_POST['author_twitter']) && !empty($_POST['author_twitter'])) {
								$author_twitter = $_POST['author_twitter'];
								$this->update_comment_meta($comment_id, 'author_twitter', $author_twitter);
						}
				}
				
				function update_comment_meta($comment_id, $meta_key, $meta_value)
				{
						global $wpdb;
			
						$wpdb->query( $wpdb->prepare( "INSERT INTO " . $wpdb->prefix . "comments_meta ( comments_meta_id, comment_id, meta_key, meta_value ) VALUES ( NULL, %d, %s, %s )", $comment_id, $meta_key, $meta_value ) );
				}
				
				function get_author_twitter($comment_id)
				{
						global $wpdb;
						
						$author_twitter = $wpdb->get_row( "SELECT meta_value FROM " . $wpdb->prefix . "comments_meta WHERE comment_id = $comment_id AND meta_key = 'author_twitter' " );
						
						if ( is_null($author_twitter) || !$author_twitter->meta_value ) {
							return '';
						}
						
						return $author_twitter->meta_value;
				}
				
				function get_twitter_avatar($image) {
						global $comment;
						
						preg_match_all('/<\s*img [^\>]*src\s*=\s*[\""\']?([^\""\'\s>]*)/i', $image, $matches);


						$result = $this->get_user_info( $this->get_author_twitter( $comment->comment_ID ) );
											
						if( $result !== false) {
							return str_replace($matches[1][0], $result->profile_image_url, $image);
						}
								
						return $image;
				}
							
				function get_user_info($username){
						$request = 'http://twitter.com/users/' . $username . '.xml';
						return $this->process($request);
				}
				
				function process($url,$postargs=false)
				{
						$ch = curl_init($url);
		
						if($postargs !== false){
								curl_setopt ($ch, CURLOPT_POST, true);
								curl_setopt ($ch, CURLOPT_POSTFIELDS, $postargs);
						}
						
						
						curl_setopt($ch, CURLOPT_VERBOSE, 1);
						curl_setopt($ch, CURLOPT_NOBODY, 0);
						curl_setopt($ch, CURLOPT_HEADER, 0);                   
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);           
		
						$response = curl_exec($ch);
						
						$responseInfo=curl_getinfo($ch);
						curl_close($ch);
						
						
						if(intval($responseInfo['http_code'])==200){
								if(class_exists('SimpleXMLElement')){
										$xml = new SimpleXMLElement($response);
										return $xml;
								}else{
										return $response;    
								}
						}else{
								return false;
						}
				}  
		}
}

if( !isset ( $twitter_avatar ) ) {
		$twitter_avatar = new twitter_avatar;
}

if( !function_exists( 'twitter_comment' ) ) {
		function twitter_comment($comment, $args, $depth) {
				global $twitter_avatar;
				$GLOBALS['comment'] = $comment;
		
				if ( 'div' == $args['style'] ) {
					$tag = 'div';
					$add_below = 'comment';
				} else {
					$tag = 'li';
					$add_below = 'div-comment';
				}
		?>
				<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
				<?php if ( 'ul' == $args['style'] ) : ?>
				<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
				<?php endif; ?>
				<div class="comment-author vcard">
				<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
				<?php 
					$author_twitter = $twitter_avatar->get_author_twitter( $comment->comment_ID );
					$author_twitter = ( strlen($author_twitter) > 0 ? " (<a href='http://twitter.com/$author_twitter'>@" . $author_twitter . "</a>)" : ''); ?>
				<?php printf(__('<cite class="fn">%s' . $author_twitter . '</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
				</div>
		<?php if ($comment->comment_approved == '0') : ?>
				<em><?php _e('Your comment is awaiting moderation.') ?></em>
				<br />
		<?php endif; ?>
		
				<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'&nbsp;&nbsp;','') ?>
				</div>
		
				<?php comment_text() ?>
		
				<div class="reply">
				<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>
				<?php if ( 'ul' == $args['style'] ) : ?>
				</div>
				<?php endif; ?>
		<?php
		}
}
?>