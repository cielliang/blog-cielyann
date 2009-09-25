<?php header("Content-Type: text/css"); ?>

<?php $styles = array(); ?>
<?php foreach ($_GET as $skey => $sval) : ?>
	<?php $styles[$skey] = urldecode($sval); ?>
<?php endforeach; ?>

#slideshow { list-style:none; color:#fff; }
#slideshow span { display:none; }
#wrapper { width:<?= ((int) $styles['width'] - 6); ?>px; background:<?= $styles['background']; ?>; padding:2px; border:<?= $styles['border']; ?>; margin:25px auto; display:none; }
#wrapper * { margin:0; padding:0; }
#fullsize { position:relative; overflow:hidden; width:<?= ((int) $styles['width'] - 6); ?>px; height:<?= $styles['height']; ?>px; }
#information { position:absolute; bottom:0; width:<?= ((int) $styles['width'] - 6); ?>px; height:0; background:<?= $styles['infobackground']; ?>; color:<?= $styles['infocolor']; ?>; overflow:hidden; z-index:200; opacity:.7; filter:alpha(opacity=70); }
#information h3 { color:<?= $styles['infocolor']; ?>; padding:4px 8px 3px; font-size:14px; }
#information p { color:<?= $styles['infocolor']; ?>; padding:0 8px 8px; }
#image { width:<?= ((int) $styles['width'] - 6); ?>px; }
#image img { position:absolute; border:none; z-index:25; width:<?= ((int) $styles['width'] - 6); ?>px; }
.imgnav { position:absolute; width:25%; height:<?= ((int) $styles['height'] + 6); ?>px; cursor:pointer; z-index:150; }
#imgprev { left:0; background:url('../images/left.gif') left center no-repeat; }
#imgnext { right:0; background:url('../images/right.gif') right center no-repeat; }
#imglink { position:absolute; height:<?= ((int) $styles['height'] + 6); ?>px; width:100%; z-index:100; opacity:.4; filter:alpha(opacity=40); }
.linkhover { background:url('../images/link.gif') center center no-repeat; }
#thumbnails {  }
.thumbstop { margin-bottom:15px !important; }
.thumbsbot { margin-top:15px !important; }
#slideleft { float:left; width:20px; height:81px; background:url('../images/scroll-left.gif') center center no-repeat; background-color:#222; }
#slideleft:hover { background-color:#333; }
#slideright { float:right; width:20px; height:81px; background:#222 url('../images/scroll-right.gif') center center no-repeat; }
#slideright:hover { background-color:#333; }
#slidearea { float:left; background:<?= $styles['background']; ?>; position:relative; width:<?= ((int) $styles['width'] - 55); ?>px; margin-left:5px; height:81px; overflow:hidden; }
#slider { position:absolute; left:0; height:81px; }
#slider img { cursor:pointer; border:1px solid #666; padding:2px; -moz-border-radius-bottomleft:4px; -moz-border-radius-bottomright:4px; -moz-border-radius-topleft:4px; -moz-border-radius-topright:4px; }