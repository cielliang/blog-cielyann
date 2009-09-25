<?php

/*
Plugin Name: Slideshow Gallery
Plugin URI: http://wpgallery.tribulant.net
Author: Antonie Potgieter
Author URI: http://tribulant.com
Description: Feature content in a JavaScript powered slideshow gallery showcase on your WordPress website. The slideshow is flexible and all aspects can easily be configured. Embedding or hardcoding the slideshow gallery is a breeze. To embed into a post/page, simply insert <code>[slideshow]</code> into its content. To hardcode into your theme, simply use <code>&lt;?php $Gallery -> slideshow(); ?&gt;</code>.
Version: 1.0
*/

//include the GalleryPlugin class file
require_once(dirname(__FILE__) . '/slideshow-gallery-plugin.php');

class Gallery extends GalleryPlugin {
	
	function Gallery() {
		$url = explode("&", $_SERVER['REQUEST_URI']);
		$this -> url = $url[0];
		
		$this -> register_plugin('slideshow-gallery', __FILE__);
		
		//WordPress action hooks
		$this -> add_action('admin_menu');
		$this -> add_action('admin_head');
		$this -> add_action('admin_notices');
		
		add_shortcode('slideshow', array($this, 'embed'));
	}
	
	function admin_menu() {
		add_menu_page(__('Slideshow', $this -> plugin_name), __('Slideshow', $this -> plugin_name), 10, basename(__FILE__), array($this, 'admin_slides'), $this -> url() . '/images/icon.png');
		add_submenu_page(basename(__FILE__), __('Configuration', $this -> plugin_name), __('Configuration', $this -> plugin_name), 10, $this -> plugin_name . '-settings', array($this, 'admin_settings'));
	}
	
	function admin_head() {
		$this -> render('head', false, true, 'admin');
	}
	
	function admin_notices() {
		$this -> check_uploaddir();
	
		if (!empty($_GET[$this -> pre . 'message'])) {		
			$msg_type = (!empty($_GET[$this -> pre . 'updated'])) ? 'msg' : 'err';
			call_user_method('render_' . $msg_type, $this, $_GET[$this -> pre . 'message']);
		}
	}
	
	function slideshow($output = true) {
		if ($slides = $this -> Slide -> find_all(null, null, array('order', "ASC"))) {
			if ($output) {
				$this -> render('gallery', array('slides' => $slides), true, 'default');
			} else {
				$content = $this -> render('gallery', array('slides' => $slides), false, 'default');
				return $content;
			}
		}
		
		return false;
	}
	
	function embed($atts = array()) {
		$defaults = array();
		extract(shortcode_atts($defaults, $atts));
		
		if ($slides = $this -> Slide -> find_all(null, null, array('order', "ASC"))) {
			$content = $this -> render('gallery', array('slides' => $slides), false, 'default');
		}
		
		return $content;
	}
	
	function admin_slides() {	
		switch ($_GET['method']) {
			case 'save'				:
				if (!empty($_POST)) {
					if ($this -> Slide -> save($_POST, true)) {
						$message = __('Slide has been saved', $this -> plugin_name);
						$this -> redirect($this -> url, "message", $message);
					} else {
						$this -> render('slides/save', false, true, 'admin');
					}
				} else {
					$this -> Db -> model = $this -> Slide -> model;
					$this -> Slide -> find(array('id' => $_GET['id']));
					$this -> render('slides/save', false, true, 'admin');
				}
				break;
			case 'mass'				:
				if (!empty($_POST['action'])) {
					if (!empty($_POST['Slide']['checklist'])) {						
						switch ($_POST['action']) {
							case 'delete'				:
								$this -> debug($_POST);
							
								foreach ($_POST['Slide']['checklist'] as $slide_id) {
									$this -> Slide -> delete($slide_id);
								}
								
								$message = __('Selected slides have been removed', $this -> plugin_name);
								$this -> redirect($this -> url, 'message', $message);
								break;
						}
					} else {
						$message = __('No slides were selected', $this -> plugin_name);
						$this -> redirect($this -> url, "error", $message);
					}
				} else {
					$message = __('No action was specified', $this -> plugin_name);
					$this -> redirect($this -> url, "error", $message);
				}
				break;
			case 'order'			:
				$slides = $this -> Slide -> find_all(null, null, array('order', "ASC"));
				$this -> render('slides/order', array('slides' => $slides), true, 'admin');
				break;
			default					:
				$data = $this -> paginate('Slide');				
				$this -> render('slides/index', array('slides' => $data[$this -> Slide -> model], 'paginate' => $data['Paginate']), true, 'admin');
				break;
		}
	}
	
	function admin_settings() {
		switch ($_GET['method']) {
			case 'reset'			:
				global $wpdb;
				$query = "DELETE FROM `" . $wpdb -> prefix . "options` WHERE `option_name` LIKE '" . $this -> pre . "%';";
				
				if ($wpdb -> query($query)) {
					$message = __('All configuration settings have been reset to their defaults', $this -> plugin_name);
					$msg_type = 'message';
					$this -> render_msg($message);	
				} else {
					$message = __('Configuration settings could not be reset', $this -> plugin_name);
					$msg_type = 'error';
					$this -> render_err($message);
				}
				
				$this -> redirect($this -> url, $msg_type, $message);
				break;
			default					:
				if (!empty($_POST)) {
					foreach ($_POST as $pkey => $pval) {					
						$this -> update_option($pkey, $pval);
					}
					
					$message = __('Configuration has been saved', $this -> plugin_name);
					$this -> render_msg($message);
				}	
				break;
		}
				
		$this -> render('settings', false, true, 'admin');
	}
}

//initialize a Gallery object
$Gallery = new Gallery();

?>