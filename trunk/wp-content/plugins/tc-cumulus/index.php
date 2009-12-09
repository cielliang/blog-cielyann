<?php
function ShowTagCumulus($target) {
	global $database, $blogURL, $pluginURL, $configVal;

	$script = $pluginURL.'/script/swfobject.js';
	$movie = $pluginURL.'/images/tagcloud.swf';

	$divname = 'TC-Cumulus';
	$soname = 'tccumulus';

	requireComponent('Textcube.Function.Setting');
	$options = setting::fetchConfigVal($configVal);

	$tagcloud = '';
	foreach(getRandomTags(getBlogId()) as $tag) {
		$tagcloud .= urlencode("<a href='$blogURL/tag/".urlencode($tag['name'])."' class='tag-link-$tag[id]' title='$tag[cnt] topic' rel='tag' style='font-size: ".round(13 + 0.3 * $tag['cnt'])."pt;'>$tag[name]</a>");
	}

	$cats = '';
	foreach(getCategories(getBlogId(), 'raw') as $cat) {
		$cats .= urlencode("<a href=\"$blogURL/category/".urlencode(urlencode($cat['name']))."\">$cat[name]</a> ($cat[entries])<br />\n");
	}

	$flashtag = '<!-- SWFObject embed by Geoff Stearns geoff@deconcept.com http://blog.deconcept.com/swfobject/ -->';
	$flashtag .= '<script type="text/javascript" src="'.$script.'"></script>';
	$flashtag .= '<div id="'.$divname.'"><p style="display:none">';
	if( $options['mode'] != "cats" ){ $flashtag .= urldecode($tagcloud); }
	if( $options['mode'] != "tags" ){ $flashtag .= urldecode($cats); }
	$flashtag .= '</p><p>TC Cumulus Flash tag cloud by <a href="http://reznoa.nayana.com/tt">reznoa</a> requires Flash Player 9 or better.</p></div>';
	$flashtag .= '<script type="text/javascript">';
	$flashtag .= 'var rnumber = Math.floor(Math.random()*9999999);'; // force loading of movie to fix IE weirdness
	$flashtag .= 'var '.$soname.' = new SWFObject("'.$movie.'?r="+rnumber, "tagcloudflash", "'.$options['width'].'", "'.$options['height'].'", "9", "#'.$options['bgcolor'].'");';
	if( $options['trans'] == 'true' ){
		$flashtag .= $soname.'.addParam("wmode", "transparent");';
	}
	$flashtag .= $soname.'.addParam("allowScriptAccess", "always");';
	$flashtag .= $soname.'.addVariable("tcolor", "0x'.$options['tcolor'].'");';
	$flashtag .= $soname.'.addVariable("tcolor2", "0x'.($options['tcolor2'] == '' ? $options['tcolor'] : $options['tcolor2']).'");';
	$flashtag .= $soname.'.addVariable("hicolor", "0x' . ($options['hicolor'] == '' ? $options['tcolor'] : $options['hicolor']) . '");';
	$flashtag .= $soname.'.addVariable("tspeed", "'.$options['speed'].'");';
	$flashtag .= $soname.'.addVariable("distr", "'.$options['distr'].'");';
	$flashtag .= $soname.'.addVariable("mode", "'.$options['mode'].'");';
	// put tags in flashvar
	if( $options['mode'] != "cats" ){
		$flashtag .= $soname.'.addVariable("tagcloud", "'.urlencode('<tags>') . $tagcloud . urlencode('</tags>').'");';
	}
	// put categories in flashvar
	if( $options['mode'] != "tags" ){
		$flashtag .= $soname.'.addVariable("categories", "' . $cats . '");';
	}
	$flashtag .= $soname.'.write("'.$divname.'");';
	$flashtag .= '</script>';
	return $flashtag;
}
?>
