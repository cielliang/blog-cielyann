<?php

class GalleryFormHelper extends GalleryPlugin {
	
	function hidden($name = '', $args = array()) {
		global $wpcoHtml;
		
		$defaults = array(
			'value' 		=> 	(empty($args['value'])) ? $this -> Html -> field_value($name) : $args['value'],
		);
		
		$r = wp_parse_args($args, $defaults);
		extract($r, EXTR_SKIP);
		
		ob_start();
		
		?><input type="hidden" name="<?= $this -> Html -> field_name($name); ?>" value="<?= $value; ?>" id="<?= $name; ?>" /><?php
		
		$hidden = ob_get_clean();
		return $hidden;
	}

	function text($name = '', $args = array()) {	
		$defaults = array(
			'id'			=>	(empty($args['id'])) ? $name : $args['id'],
			'width'			=>	'100%',
			'class'			=>	"widefat",
			'error'			=>	true,
			'value'			=>	(empty($args['value'])) ? GalleryHtmlHelper::field_value($name) : $args['value'],
			'autocomplete'	=>	"on",
		);
		
		$r = wp_parse_args($args, $defaults);
		extract($r, EXTR_SKIP);
		
		$this -> debug($this);
		echo $this -> Html -> field_value($name);
		
		ob_start();
		
		?><input class="<?= $class; ?>" type="text" autocomplete="<?= $autocomplete; ?>" style="width:<?= $width; ?>" name="<?= $this -> Html -> field_name($name); ?>" value="<?= $value; ?>" id="<?= $id; ?>" /><?php
		
		if ($error == true) {
			echo $this -> Html -> field_error($name);
		}
		
		$text = ob_get_clean();
		return $text;
	}
	
	function textarea($name = '', $args = array()) {		
		$defaults = array(
			'error'			=>	true,
			'width'			=>	'100%',
			'class'			=>	"widefat",
			'rows'			=>	4,
			'cols'			=>	"100%",
		);
		
		$r = wp_parse_args($args, $defaults);
		extract($r, EXTR_SKIP);
		
		ob_start();
		
		?><textarea class="<?= $class; ?>" name="<?= $this -> Html -> field_name($name); ?>" rows="<?= $rows; ?>" style="width:<?= $width; ?>;" cols="<?= $cols; ?>" id="<?= $name; ?>"><?= $this -> Html -> field_value($name); ?></textarea><?php
		
		if ($error == true) {
			echo $this -> Html -> field_error($name);
		}
		
		$textarea = ob_get_clean();
		return $textarea;
	}

	function submit($name = '', $args = array()) {		
		$defaults = array('class' => "button-primary");
		$r = wp_parse_args($args, $defaults);
		extract($r, EXTR_SKIP);
		
		ob_start();
		
		?><input class="<?= $class; ?>" type="submit" name="<?= $this -> Html -> sanitize($name); ?>" value="<?= $name; ?>" /><?php
		
		$submit = ob_get_clean();
		return $submit;
	}
}

?>