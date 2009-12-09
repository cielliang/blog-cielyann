<?php /* Smarty version 2.6.20, created on 2009-10-22 11:29:28
         compiled from gallery:themes/slider/templates/header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'gallery:themes/slider/templates/header.tpl', 14, false),)), $this); ?>
<script type="text/javascript">
<?php if ($this->_tpl_vars['theme']['imageCount'] == 1): ?>
var data_iw = new Array(1); data_iw[0] = <?php echo $this->_tpl_vars['theme']['imageWidths']; ?>
;
var data_ih = new Array(1); data_ih[0] = <?php echo $this->_tpl_vars['theme']['imageHeights']; ?>
;
<?php else: ?>
var data_iw = new Array(<?php echo $this->_tpl_vars['theme']['imageWidths']; ?>
),
data_ih = new Array(<?php echo $this->_tpl_vars['theme']['imageHeights']; ?>
);
<?php endif; ?>
var data_count = data_iw.length, data_name = '<?php echo $this->_tpl_vars['theme']['item']['id']; ?>
',
data_view = <?php echo ((is_array($_tmp=@$this->_tpl_vars['theme']['viewIndex'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
,
image_map = '<?php if ($this->_tpl_vars['theme']['params']['enableImageMap']): ?> usemap="#prevnext"<?php endif; ?>';
</script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['theme']['themeUrl']; ?>
/slider.js"></script>