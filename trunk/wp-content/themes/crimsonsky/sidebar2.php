<div class="cs-sidebar2">      
<?php if (!cs_sidebar(2)): ?>
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
<div class="cs-BlockHeader">
    <div class="cs-header-tag-icon">
        <div class="t"><?php _e('Categories', 'kubrick'); ?></div>
    </div>
</div><div class="cs-BlockContent">
    <div class="cs-BlockContent-body">
<ul>
  <?php wp_list_categories('show_count=1&title_li='); ?>
</ul>
    </div>
</div>

    </div>
</div>
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
<div class="cs-BlockHeader">
    <div class="cs-header-tag-icon">
        <div class="t"><?php _e('Links:', 'kubrick'); ?></div>
    </div>
</div><div class="cs-BlockContent">
    <div class="cs-BlockContent-body">
<ul>
      <?php wp_list_bookmarks('title_li=&categorize=0'); ?>
      </ul>
    </div>
</div>

    </div>
</div>

<?php endif ?>
</div>
