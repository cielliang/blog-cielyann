<?php
class DooodlService{
	
	private function getUploadsDir(){
		$output_dir = WP_CONTENT_DIR."/uploads/doodls/";
		return $output_dir;
	}

	public function getTableName(){
		global $wpdb;
		require_once("../../globals.php");
		return 	$wpdb->prefix . $dooodl_table_name;
	}
		
	public function saveImage($username,$title,$description,$url,$image){
		global $wpdb;
		
		if($username == ""){
			$username = "Anonymous";	
		}
		if($title == ""){
			$title = "Untitled";	
		}
		
		$username = $wpdb->escape($username);
		$title = $wpdb->escape($title);
		$description = $wpdb->escape($description);
		$url = $wpdb->escape($url);
		
		
		$wpdb->query($wpdb->prepare("INSERT INTO ". $this->getTableName() ."(username, title, url, description) VALUES(%s,%s,%s,%s)",$username,$title,$url,$description));
		
		$id = $wpdb->insert_id;
		
		$this->saveAsJPEG($image,$id.".jpg");
		return true;
		
	}
	
	
	private function saveAsJPEG($ba, $name, $compressed = false){
        if(!file_exists($this->getUploadsDir()) || !is_writeable($this->getUploadsDir()))
            trigger_error ("please create a 'temp' directory first with write access", E_USER_ERROR);

        $data = $ba->data;
        if($compressed)
        {
            if(function_exists(gzuncompress))
            {
                $data = gzuncompress($data);
            } else {
                trigger_error ("gzuncompress method does not exists, please send uncompressed data", E_USER_ERROR);
            }
        }
        file_put_contents($this->getUploadsDir() . $name, $data);
        return $this->server_url . $this->getUploadsDir() . $name;
    }
	
}
?>