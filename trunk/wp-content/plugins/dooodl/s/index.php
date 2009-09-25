<?
	
	
	require_once("../../../../wp-blog-header.php");
	require_once("../globals.php");
	
	$theCount = $wpdb->get_var("select count(id) as aantal from ". $wpdb->prefix . $dooodl_table_name);
	
	
?><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Dooodl Viewer</title>
<script type="text/javascript" src="swfobject.js"></script>

<link href="layout.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="intro">
    <h1>Dooodl History Viewer!!</h1>
    <p>
        Welcome to the <strong>Dooodl History Viewer</strong>! <br />
        This is the complete collection of what people have created using the <a href="../creator/">Dooodl creator</a> on my blog!<br />
        Visitors of this blog already created <span class="theCount"><?= $theCount ?></span> Dooodls!! Feeling creative? <a href="../creator/">Add your own</a>!! 
        </p>
   	</div>
	<div id="theviewer">
    	<div id="htmlcontent">
	

<table id="theList">
<tr>

<?
		
		
		$html="";
		
		$teller = 0;
		
		$doodls = $wpdb->get_results("SELECT id, username, title, timestamp, description, url FROM ". $wpdb->prefix . $dooodl_table_name ." ORDER BY id DESC ");
		foreach($doodls as $doodl){
			$teller++;
			if($teller == 1){
				echo('<tr>');	
			}
			?>
				<td>
					
						<p class="title"><?= stripslashes($doodl->title) ?></p> 
						<img src="../../../uploads/doodls/<?= $doodl->id ?>.jpg"/>
						<p class="description">
							<?= stripslashes($doodl->description) ?>
						</p>
						
					<span class="date">Created: <?= date("j F y @ G:i",strtotime($doodl->timestamp)) ?></span><br />                            
					<span class="author">
						Author: <strong><?= $doodl->username ?></strong> 
						<? if($url != ""){ ?>
						  [ <a href="<?= $doodl->url ?>" target="_blank" rel="nofollow">link</a> ]
						<? } ?>
					</span>
				</td>
			<?
			if($teller==3){
				echo ('</tr>');
				$teller =0;
			}
		}
?>
</tr>
</table>
</div>
</div>
	<script type="text/javascript">
	
		var fo = new SWFObject("TiltViewer.swf", "theviewer", "100%", "600px", "9.0.28", "#000000");			
		
		// TILTVIEWER CONFIGURATION OPTIONS
		// To use an option, uncomment it by removing the "//" at the start of the line
		// For a description of config options, go to: 
		// http://www.airtightinteractive.com/projects/tiltviewer/config_options.html
															
		//FLICKR GALLERY OPTIONS
		// To use images from Flickr, uncomment this block
		//fo.addVariable("useFlickr", "true");
		//fo.addVariable("user_id", "48508968@N00");
		//fo.addVariable("tags", "jump,smile");
		//fo.addVariable("tag_mode", "all");
		//fo.addVariable("showTakenByText", "true");			
		
		// XML GALLERY OPTIONS
		// To use local images defined in an XML document, use this block		
		fo.addVariable("useFlickr", "false");
		fo.addVariable("xmlURL", "xml.php");
		fo.addVariable("maxJPGSize","260");
		
		//GENERAL OPTIONS		
		fo.addVariable("useReloadButton", "false");
		fo.addVariable("columns", "8");
		fo.addVariable("rows", "5");
		//fo.addVariable("showFlipButton", "true");
		fo.addVariable("showLinkButton", "true");		
		fo.addVariable("linkLabel", "Visit the link!");
		//fo.addVariable("frameColor", "0xFF0000");
		//fo.addVariable("backColor", "0xDDDDDD");
		//fo.addVariable("bkgndInnerColor", "0xFF00FF");
		//fo.addVariable("bkgndOuterColor", "0x0000FF");				
		//fo.addVariable("langGoFull", "Go Fullscreen");
		//fo.addVariable("langExitFull", "Exit Fullscreen");
		//fo.addVariable("langAbout", "About");				
		
		// END TILTVIEWER CONFIGURATION OPTIONS
		
		fo.addParam("allowFullScreen","true");
		fo.write("theviewer");			
	</script>	
</body>
</html>