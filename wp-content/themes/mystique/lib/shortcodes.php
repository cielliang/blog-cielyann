<?php /* Mystique/digitalnature */


function youtube($atts){
  // example: [youtube embed=http://www.youtube.com/v/tmjbFT4NPjQ&hl width=425 height=344]
  extract(shortcode_atts(array(
   'embed' => FALSE,
   'width' => 425,
   'height' => 344,
  ), $atts));

  if(!$embed) return(FALSE);
  return(str_replace(array('%%embed%%','%%width%%','%%height%%'), array(wp_specialchars($embed), wp_specialchars($width), wp_specialchars($height)), '<object type="application/x-shockwave-flash" style="width:%%width%%px; height:%%height%%px;" data="%%embed%%"><param name="movie" value="%%embed%%" /></object>'));
}
add_shortcode('youtube','youtube');


// output a arbitrary widget
function widget($atts){
  global $wp_widget_factory;
  extract(shortcode_atts(array(
   'class' => FALSE
  ), $atts));

  ob_start();
  $class = wp_specialchars($class);

  if (!is_a($wp_widget_factory->widgets[$class], 'WP_Widget')):
    $wp_class = 'WP_Widget_'.ucwords($class);
    if (!is_a($wp_widget_factory->widgets[$wp_class], 'WP_Widget')): ?>
      <p class="error">
      <?php printf(__("%s: Widget class not found. Make sure this widget exists and the class name is correct","mystique"),'<strong>'.$class.'</strong>'); ?>
      </p>
      <?php
      return;
    else:
      $class = $wp_class;
    endif;
  endif;

  $instance = array(); // other attributes
  foreach($atts as $att=>$val):
   if ($att!="class") $instance[wp_specialchars($att)]=wp_specialchars($val);
  endforeach;

  $id = $class;
  $classname = $wp_widget_factory->widgets[$class]->widget_options['classname'];
  if(!$classname) $classname = $id;

  if(isset($instance['widget_id'])) $id= $instance['widget_id'];

  the_widget($class, $instance, array('widget_id'=>'arbitrary-instance-'.$id,'before_widget' => '<div class="arbitrary-block block-'.$classname.'">','after_widget' => '</div>','before_title' => '<h2 class="title">','after_title' => '</h2>'));
  $output = ob_get_contents();
  ob_end_clean();

  return $output;
}
add_shortcode('widget','widget');


function googlechart($atts){
  extract(shortcode_atts(array(
   'data' => '',
   'colors' => '',
   'size' => '400x200',
   'bg' => 'ffffff',
   'title' => '',
   'labels' => '',
   'advanced' => '',
   'type' => 'pie'
  ), $atts));

  switch ($type) {
   case 'line': $charttype = 'lc'; break;
   case 'xyline': $charttype = 'lxy'; break;
   case 'sparkline': $charttype = 'ls'; break;
   case 'meter': $charttype = 'gom'; break;
   case 'scatter': $charttype = 's'; break;
   case 'venn': $charttype = 'v'; break;
   case 'pie': $charttype = 'p3'; break;
   case 'pie2d': $charttype = 'p'; break;
   default: $charttype = $type; break;
  }

  if ($title) $string .= '&chtt='.$title.'';
  if ($labels) $string .= '&chl='.$labels.'';
  if ($colors) $string .= '&chco='.$colors.'';
  $string .= '&chs='.$size.'';
  $string .= '&chd=t:'.$data.'';
  $string .= '&chf='.$bg.'';
  return '<img title="'.wp_specialchars($title).'" src="http://chart.apis.google.com/chart?cht='.wp_specialchars($charttype).''.wp_specialchars($string).wp_specialchars($advanced).'" alt="'.wp_specialchars($title).'" />';
}
add_shortcode('googlechart', 'googlechart');


function queryposts($atts){
  extract( shortcode_atts( array(
   'category_id' => '',
   'category_name' => '',
   'tag' => '',
   'day' => '',
   'month' => '',
   'year' => '',
   'count' => '5',
   'author_id' => '',
   'author_name' => '',
   'order_by' => 'date',
  ), $atts));

  $output = '';
  $query = array();

  if ($category_id != '') $query[] = 'cat=' .$category_id;
  if ($category_name != '') $query[] = 'category_name=' .$category_name;
  if ($tag != '') $query[] = 'tag=' . $tag;
  if ($day != '') $query[] = 'day=' . $day;
  if ($month != '') $query[] = 'monthnum=' . $month;
  if ($year != '') $query[] = 'year=' . $year;
  if ($count) $query[] = 'posts_per_page=' .$count;
  if ($author_id != '') $query[] = 'author=' . $author_id;
  if ($author_name != '') $query[] = 'author_name=' . $author_name;
  if ($order_by) $query[] = 'orderby=' . $order_by;

  ob_start();

  $backup = $post;
  $posts = new WP_Query(implode('&',$query));

  while ($posts->have_posts()):
    $posts->the_post();
    include(TEMPLATEPATH . '/post.php');
  endwhile;

  $post = $backup;
  wp_reset_query();

  $output = ob_get_contents();
  ob_end_clean();

  return $output;
}
add_shortcode('query', 'queryposts');


// member/visitor only content - based on http://justintadlock.com/archives/2009/05/09/using-shortcodes-to-show-members-only-content

function memberonlycontent($atts, $content = null){
  if (is_user_logged_in() && !is_null($content) && !is_feed()) return (!detectWPMU() || detectWPMUadmin()) ? $content : wp_specialchars($content);
  return '';
}
add_shortcode('member', 'memberonlycontent');

function visitoronlycontent($atts, $content = null){
  if ((!is_user_logged_in() && !is_null($content)) || is_feed()) return (!detectWPMU() || detectWPMUadmin()) ? $content : wp_specialchars($content);
  return '';
}
add_shortcode('visitor', 'visitoronlycontent');


function subscribe_rss(){
  $subscribe = '<a class="rss-subscribe" href="'. get_bloginfo('rss2_url') .'" title="'. __('RSS Feeds','mystique') .'">'. __('RSS Feeds','mystique') .'</a>';
  return apply_filters('subscribe_rss', $subscribe);
}
add_shortcode('rss', 'subscribe_rss');


function tinyurl($atts){
  extract(shortcode_atts(array(
   'url' => '',
   'title' => '',
   'rel' => 'nofollow'
  ), $atts));
  if(!$title) $title = $url;
  $tinyurl = '<a href="'.wp_specialchars(getTinyUrl($url)).'" rel="'.wp_specialchars($rel).'">'.wp_specialchars($title).'</a>';
  return apply_filters('tinyurl', $tinyurl);
}
add_shortcode('tinyurl', 'tinyurl');


// ads
function advertisment($atts){
  extract(shortcode_atts(array(
   'code' => 1,
   'align' => 'left',
   'inline' => 0
  ), $atts));
  $ad = get_mystique_option('ad_code_'.$code);
  if(!empty($ad)):
   $ad = '<div class="ad align'.$align.'">'.$ad.'</div>';
   if(!$inline) $ad = '<div class="clearfix">'.$ad.'</div>';
   return apply_filters('advertisment', $ad);
  else:
   return '<p class="error">'.sprintf(__("Empty ad slot (#%s)!","mystique"),wp_specialchars($code)).'</p>';
  endif;
}
add_shortcode('ad', 'advertisment');


function go_to_top(){
  $link = sprintf('<a id="goTop" class="js-link">'.__('Top','mystique').'</a>');
  return apply_filters('go_to_top', $link);
}
add_shortcode('top', 'go_to_top');

function theme_link(){
  $theme_link = sprintf('<a class="theme-link" href="%1$s" title ="Mystique %2$s" rel="designer">Mystique</a>', THEME_URI, THEME_VERSION );
  return apply_filters('theme_link', $theme_link);
}
add_shortcode('theme-link', 'theme_link');

function credit(){
  $credit = sprintf(__('%1$s theme by %2$s | Powered by %3$s', 'mystique'), '<abbr title="'.THEME_NAME.'/'.THEME_VERSION.'">Mystique</abbr>','<a href="http://digitalnature.ro">digitalnature</a>', '<a href="http://wordpress.org/">WordPress</a>');
  return apply_filters('credit', $credit);
}
add_shortcode('credit', 'credit');

function copyright() {
  $copyright = sprintf('<span class="copyright"><span class="text">%1$s</span> <span class="the-year">%2$s</span> <a class="blog-title" href="%3$s" title="%4$s">%4$s</a></span>',
                        __('Copyright &copy;', 'mystique'),
                        date('Y'),
                        get_bloginfo('url'),
                        get_bloginfo('name'));
  return apply_filters('copyright', $copyright);
}
add_shortcode('copyright', 'copyright');

function wp_link(){
  $wp_link = '<a class="wp-link" href="http://WordPress.org/" title="WordPress" rel="generator">WordPress</a>';
  return apply_filters('wp_link', $wp_link);
}
add_shortcode('wp-link', 'wp_link');

// login
function login_link(){
  if (is_user_logged_in()) $link = sprintf('<a class="login-link" href="%1$s">%2$s</a>',admin_url(),__('Site Admin'));
  else $link = sprintf('<a class="login-link" href="%1$s">%2$s</a>',wp_login_url(),__('Log in'));
  return apply_filters('login_link', $link);
}
add_shortcode('login-link', 'login_link');

// blog title
function blog_title(){
  $blog_title = '<span class="blog-title">' . get_bloginfo('name') . '</span>';
  return apply_filters('blog_title', $blog_title);
}
add_shortcode('blog-title', 'blog_title');

// validate xhtml
function validate_xhtml(){
  $validate_xhtml = '<a class="valid-xhtml" href="http://validator.w3.org/check?uri=referer" title="Valid XHTML">XHTML 1.1</a>';
  return apply_filters('validate_xhtml', $validate_xhtml);
}
add_shortcode('xhtml', 'validate_xhtml');

// validate css
function validate_css(){
  $validate_css = '<a class="valid-css" href="http://jigsaw.w3.org/css-validator/check/referer?profile=css3" title="Valid CSS">CSS 3.0</a>';
  return apply_filters('validate_css', $validate_css);
}
add_shortcode('css', 'validate_css');


function theme_name(){ return THEME_NAME; }
add_shortcode('theme-name', 'theme_name');

function theme_author(){ return THEME_AUTHOR; }
add_shortcode('theme-author', 'theme_author');

function theme_uri(){ return THEME_URI; }
add_shortcode('theme-uri', 'theme_uri');


add_filter( 'widget_text', 'do_shortcode' ); // Allow [SHORTCODES] in Widgets
?>