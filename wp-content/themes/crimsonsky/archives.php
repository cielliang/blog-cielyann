<?php get_header(); ?>
<div class="cs-contentLayout">
<div class="cs-content">

<div class="cs-Block">
    <div class="cs-Block-tl"></div>
    <div class="cs-Block-tr"></div>
    <div class="cs-Block-bl"></div>
    <div class="cs-Block-br"></div>
    <div class="cs-Block-tc"></div>
    <div class="cs-Block-bc"></div>
    <div class="cs-Block-cl"></div>
    <div class="cs-Block-cr"></div>
    <div class="cs-Block-cc"></div>
    <div class="cs-Block-body">

<div class="cs-BlockContent">
    <div class="cs-BlockContent-body">

<h2><?php _e('Archives by Month:', 'kubrick'); ?></h2>
<ul><?php wp_get_archives('type=monthly'); ?></ul>
<h2><?php _e('Archives by Subject:', 'kubrick'); ?></h2>
<ul><?php wp_list_categories(); ?></ul>

    </div>
</div>


    </div>
</div>


</div>
<?php include (TEMPLATEPATH . '/sidebar1.php'); ?><?php include (TEMPLATEPATH . '/sidebar2.php'); ?>
</div>
<div class="cleared"></div>

<?php get_footer(); ?>