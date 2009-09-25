<?php

class GalleryPlugin {

	//the plugin internal name
	var $plugin_name;
	//the plugin absolute path
	var $plugin_base;
	var $pre = 'Gallery';
	var $debugging = true;
	
	var $helpers = array('Db', 'Html', 'Form', 'Metabox');
	var $models = array('Slide');

	function register_plugin($name, $base) {
		$this -> plugin_name = $name;
		$this -> plugin_base = rtrim(dirname($base), '/');
		
		$this -> enqueue_scripts();
		$this -> enqueue_styles();
		
		$this -> initialize_classes();
		$this -> initialize_options();
		
		return true;
	}
	
	function init_class($name = null, $params = array()) {
		if (!empty($name)) {
			$name = $this -> pre . $name;
				
			if (class_exists($name)) {
				if ($class = new $name($params)) {							
					return $class;
				}
			}
		}
		
		$this -> init_class('Country');
		
		return false;
	}
	
	function initialize_classes() {
		if (!empty($this -> helpers)) {
			foreach ($this -> helpers as $helper) {
				$hfile = dirname(__FILE__) . '/helpers/' . strtolower($helper) . '.php';
				
				if (file_exists($hfile)) {
					require_once($hfile);
					
					if (!is_object($this -> {$helper})) {
						$classname = $this -> pre . $helper . 'Helper';
						
						if (class_exists($classname, true)) {
							$this -> {$helper} = new $classname;
						}
					}
				} 
			}
		}
	
		if (!empty($this -> models)) {
			foreach ($this -> models as $model) {
				$mfile = dirname(__FILE__) . '/models/' . strtolower($model) . '.php';
				
				if (file_exists($mfile)) {
					require_once($mfile);
					
					if (!is_object($this -> {$model})) {
						$classname = $this -> pre . $model;
						
						if (class_exists($classname, true)) {
							$this -> {$model} = new $classname;
						}
					}
				} 
			}
		}
	}
	
	function initialize_options() {
		$styles = array(
			'width'				=>	"450",
			'height'			=>	"250",
			'border'			=>	"1px solid #CCCCCC",
			'background'		=>	"#000000",
			'infobackground'	=>	"#000000",
			'infocolor'			=>	"#FFFFFF",
		);
		
		$this -> add_option('styles', $styles);
		
		//General Settings
		$this -> add_option('fadespeed', 10);
		$this -> add_option('navopacity', 25);
		$this -> add_option('navhover', 70);
		$this -> add_option('information', "Y");
		$this -> add_option('infospeed', 10);
		$this -> add_option('thumbnails', "N");
		$this -> add_option('thumbposition', "bottom");
		$this -> add_option('thumbopacity', 70);
		$this -> add_option('thumbscrollspeed', 5);
		$this -> add_option('thumbspacing', 5);
		$this -> add_option('thumbactive', "#FFFFFF");
		$this -> add_option('autoslide', "Y");
		$this -> add_option('autospeed', 10);
	}
	
	function render_msg($message = '') {
		$this -> render('msg-top', array('message' => $message), true, 'admin');
	}
	
	function render_err($message = '') {
		$this -> render('err-top', array('message' => $message), true, 'admin');
	}
	
	function redirect($location = '', $msgtype = '', $message = '') {
		$url = $location;
		
		if ($msgtype == "message") {
			$url .= '&' . $this -> pre . 'updated=true';
		} elseif ($msgtype == "error") {
			$url .= '&' . $this -> pre . 'error=true';
		}
		
		if (!empty($message)) {
			$url .= '&' . $this -> pre . 'message=' . urlencode($message);
		}
		
		?>
		
		<script type="text/javascript">
		window.location = '<?= (empty($url)) ? get_option('home') : $url; ?>';
		</script>
		
		<?php
		
		flush();
	}
	
	function paginate($model = null, $fields = '*', $sub = null, $conditions = null, $searchterm = null, $per_page = 10, $order = array('modified', "DESC")) {
		global $wpdb;
	
		if (!empty($model)) {
			global $paginate;
			$paginate = $this -> vendor('Paginate');
			$paginate -> table = $this -> {$model} -> table;
			$paginate -> sub = (empty($sub)) ? $this -> {$model} -> controller : $sub;
			$paginate -> fields = (empty($fields)) ? '*' : $fields;
			$paginate -> where = (empty($conditions)) ? false : $conditions;
			$paginate -> searchterm = (empty($searchterm)) ? false : $searchterm;
			$paginate -> per_page = $per_page;
			$paginate -> order = $order;
			
			$data = $paginate -> start_paging($_GET[$this -> pre . 'page']);
			
			if (!empty($data)) {
				$newdata = array();
			
				foreach ($data as $record) {
					$newdata[] = $this -> init_class($model, $record);
				}
				
				$data = array();
				$data[$model] = $newdata;
				$data['Paginate'] = $paginate;
			}
			
			return $data;
		}
		
		return false;
	}
	
	function vendor($name = '', $folder = '') {
		if (!empty($name)) {
			$filename = 'class.' . strtolower($name) . '.php';
			$filepath = rtrim(dirname(__FILE__), '/') . '/vendors/' . $folder . '';
			$filefull = $filepath . $filename;
		
			if (file_exists($filefull)) {
				require_once($filefull);
				$class = 'Gallery' . $name;
				
				if (${$name} = new $class) {
					return ${$name};
				}
			}
		}
	
		return false;
	}
	
	function check_uploaddir() {
		$uploaddir = ABSPATH . 'wp-content/uploads/' . $this -> plugin_name . '/';
		
		if (!file_exists($uploaddir)) {
			if (@mkdir($uploaddir, 0777)) {
				@chmod($uploaddir, 0777);
				return true;
			} else {
				$message = __('Uploads folder named "' . $this -> plugin_name . '" cannot be created inside "wp-content/uploads"', $this -> plugin_name);
				$this -> render_msg($message);
			}
		}
		
		return false;
	}
	
	function add_action($action, $function = null, $priority = 10, $params = 1) {
		if (add_action($action, array($this, (empty($function)) ? $action : $function), $priority, $params)) {
			return true;
		}
		
		return false;
	}
	
	function enqueue_scripts() {
		wp_enqueue_script('jquery');
		wp_enqueue_script($this -> plugin_name, '/' . PLUGINDIR . '/' . $this -> plugin_name . '/js/gallery.js', null, "1.0");
		
		if (is_admin()) {
			if (!empty($_GET['page'])) {
				if ($_GET['page'] == "slideshow-gallery-settings" || ($_GET['page'] == $this -> plugin_name . ".php" && $_GET['method'] == "order")) {				
					wp_enqueue_script('suggest');
					wp_enqueue_script('jquery-ui-tabs');
					wp_enqueue_script('wp-lists');
					wp_enqueue_script('jquery-ui-sortable');
					wp_enqueue_script('postbox');
					wp_enqueue_script('post');
				}
			}
		
			wp_enqueue_script($this -> plugin_name . 'admin', '/' . PLUGINDIR . '/' . $this -> plugin_name . '/js/admin.js', null, '1.0');
			add_thickbox();
		}
		
		return true;
	}
	
	function enqueue_styles() {
		$src = '/' . PLUGINDIR . '/' . $this -> plugin_name . '/css/gallery-css.php?1=1';
		
		if ($styles = $this -> get_option('styles')) {
			foreach ($styles as $skey => $sval) {
				$src .= "&amp;" . $skey . "=" . urlencode($sval);
			}
		}
		
		wp_enqueue_style($this -> plugin_name, $src, null, '1.0', 'screen');
	
		return true;
	}
	
	function url() {
		$url = get_option('siteurl') . substr($this -> plugin_base, strlen(realpath(ABSPATH)));		
		return $url;
	}
	
	function add_option($name = '', $value = '') {
		if (add_option($this -> pre . $name, $value)) {
			return true;
		}
		
		return false;
	}
	
	function update_option($name = '', $value = '') {
		if (update_option($this -> pre . $name, $value)) {
			return true;
		}
		
		return false;
	}
	
	function get_option($name = '', $stripslashes = true) {
		if ($option = get_option($this -> pre . $name)) {
			if (@unserialize($option) !== false) {
				return unserialize($option);
			}
			
			if ($stripslashes == true) {
				$option = stripslashes_deep($option);
			}
			
			return $option;
		}
		
		return false;
	}
	
	function debug($var = array()) {
		if ($this -> debugging) {
			echo '<pre>' . print_r($var, true) . '</pre>';
			return true;
		}
		
		return false;
	}
	
	function check_table($model = null) {
		global $wpdb;
	
		if (!empty($model)) {			
			if (!empty($this -> fields) && is_array($this -> fields)) {			
				if (!$wpdb -> get_var("SHOW TABLES LIKE '" . $this -> table . "'")) {				
					$query = "CREATE TABLE `" . $this -> table . "` (";
					$c = 1;
					
					foreach ($this -> fields as $field => $attributes) {
						if ($field != "key") {
							$query .= "`" . $field . "` " . $attributes . "";
						} else {
							$query .= "" . $attributes . "";
						}
						
						if ($c < count($this -> fields)) {
							$query .= ",";
						}
						
						$c++;
					}
					
					$query .= ") ENGINE=MyISAM AUTO_INCREMENT=1 CHARSET=UTF8;";
					
					if (!empty($query)) {
						$this -> table_query[] = $query;
					}
				} else {
					$field_array = $this -> get_fields($this -> table);
					
					foreach ($this -> fields as $field => $attributes) {					
						if ($field != "key") {
							$this -> add_field($this -> table, $field, $attributes);
						}
					}
				}
				
				if (!empty($this -> table_query)) {				
					require_once(ABSPATH . 'wp-admin/upgrade-functions.php');
					dbDelta($this -> table_query, true);
				}
			}
		}
		
		return false;
	}
	
	function get_fields($table = null) {	
		global $wpdb;
	
		if (!empty($table)) {
			$fullname = $table;
		
			if (($tablefields = mysql_list_fields(DB_NAME, $fullname, $wpdb -> dbh)) !== false) { 
				$columns = mysql_num_fields($tablefields);
				
				$field_array = array();
				for ($i = 0; $i < $columns; $i++) {
					$fieldname = mysql_field_name($tablefields, $i);
					$field_array[] = $fieldname;
				}
				
				return $field_array;
			}
		}
		
		return false;
	}
	
	function delete_field($table = '', $field = '') {
		global $wpdb;
		
		if (!empty($table)) {
			if (!empty($field)) {
				$query = "ALTER TABLE `" . $wpdb -> prefix . "" . $table . "` DROP `" . $field . "`";
				
				if ($wpdb -> query($query)) {
					return false;
				}
			}
		}
		
		return false;
	}
	
	function change_field($table = '', $field = '', $newfield = '', $attributes = "TEXT NOT NULL") {
		global $wpdb;
		
		if (!empty($table)) {		
			if (!empty($field)) {			
				if (!empty($newfield)) {
					$field_array = $this -> get_fields($table);
					
					if (!in_array($field, $field_array)) {
						if ($this -> add_field($table, $newfield)) {
							return true;
						}
					} else {
						$query = "ALTER TABLE `" . $table . "` CHANGE `" . $field . "` `" . $newfield . "` " . $attributes . ";";
						
						if ($wpdb -> query($query)) {
							return true;
						}
					}
				}
			}
		}
		
		return false;
	}
	
	function add_field($table = '', $field = '', $attributes = "TEXT NOT NULL") {
		global $wpdb;
	
		if (!empty($table)) {
			if (!empty($field)) {
				$field_array = $this -> get_fields($table);
				
				if (!empty($field_array)) {				
					if (!in_array($field, $field_array)) {					
						$query = "ALTER TABLE `" . $table . "` ADD `" . $field . "` " . $attributes . ";";
						
						if ($wpdb -> query($query)) {
							return true;
						}
					}
				}
			}
		}
		
		return false;
	}
	
	function render($file = '', $params = array(), $output = true, $folder = 'admin') {
		//the absolute path to the plugin base
		$this -> plugin_base = rtrim(dirname(__FILE__), '/');
	
		if (!empty($file)) {
			$filename = $file . '.php';
			$filepath = $this -> plugin_base . '/views/' . $folder . '/';
			$filefull = $filepath . $filename;
		
			if (file_exists($filefull)) {
				if (!empty($params)) {
					foreach ($params as $pkey => $pval) {
						${$pkey} = $pval;
					}
				}
			
				if ($output == false) {
					ob_start();
				}
				
				include($filefull);
				
				if ($output == false) {					
					$data = ob_get_clean();					
					return $data;
				} else {
					flush();
					return true;
				}
			}
		}
		
		return false;
	}
}

?>