<?
require_once("../../../wp-blog-header.php");
?>
//dooodl autoload
function testForAutoload(){
	var qs = location.href;
	qs = qs.toLowerCase();
	if(qs.indexOf("#dooodlviewer") != -1){
			//trigger shadowbox to open the viewer
			Shadowbox.open({
				content:    '<?= WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)) ?>s#theviewer',
				player:     'iframe',
				width:		880,
				height:		600,
                options:{
                    onClose:function(){
                        checkURL();
                    }
                }
			});

	}else if(qs.indexOf("#drawadooodl") != -1){
			//trigger shadowbox to open the drawer
			Shadowbox.open({
				content:    '<?= WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)) ?>creator',
				player:     'iframe',
				width:		700,
				height:		400,
                options:{
                    onClose:function(){
                        checkURL();
                    }
                }
			});
	}
}

function updateURL(str){
	window.location = location.href.split("#")[0] +str;
}

function checkURL(){
	
   // alert("location.search: " + location.href);
     
    if(location.href.toLowerCase().indexOf("#dooodlviewer") != -1){
			window.location = location.href.split("#dooodlviewer")[0]+"#";
	}
    if(location.href.toLowerCase().indexOf("#drawadooodl") != -1){
			window.location = location.href.split("#drawadooodl")[0]+"#";
	}
   
}