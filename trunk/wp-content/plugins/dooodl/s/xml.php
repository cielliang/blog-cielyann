<tiltviewergallery>
	<photos>
		<?	
			require_once("../../../../wp-blog-header.php");
			require_once("../globals.php");
		
	
		$doodls = $wpdb->get_results("SELECT id, username, title, timestamp, description, url FROM ". $wpdb->prefix . $dooodl_table_name ." ORDER BY id DESC ");
		foreach($doodls as $doodl){
					?>
                    	<photo imageurl="../../../uploads/doodls/<?= $doodl->id ?>.jpg"<? if($doodl->url != ""){ ?> linkurl="<?= $doodl->url ?>"<? } ?>>
                            <title><?=  stripslashes($doodl->title) ?></title>
                            <description><![CDATA[<?= stripslashes($doodl->description) ?><?="\n"?>
<? if($url != ""){ ?><b>Link</b>: <a href="<?=$url?>" target="_blank"><?= $doodl->url ?></a><? } ?>

                            
<b>Author</b>: <?= $doodl->username ?> 
<b>Submitted</b>: <?= date("j F y @ G:i",strtotime($doodl->timestamp)) ?>]]></description>
                        </photo>
                    <?
				}

?>
    </photos>
</tiltviewergallery>