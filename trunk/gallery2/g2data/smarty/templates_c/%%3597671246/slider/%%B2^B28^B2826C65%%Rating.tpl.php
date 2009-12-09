<?php /* Smarty version 2.6.20, created on 2009-10-22 11:29:28
         compiled from gallery:modules/rating/templates/blocks/Rating.tpl */ ?>
<?php if (empty ( $this->_tpl_vars['item'] )): ?> <?php $this->assign('item', $this->_tpl_vars['theme']['item']); ?> <?php endif; ?>
<?php echo $this->_reg_objects['g'][0]->callback(array('type' => "rating.LoadRating",'itemId' => $this->_tpl_vars['item']['id']), $this);?>

<?php if (! empty ( $this->_tpl_vars['block']['rating']['RatingData'] )): ?>
<div class="<?php echo $this->_tpl_vars['class']; ?>
">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gallery:modules/rating/templates/RatingInterface.tpl", 'smarty_include_vars' => array('RatingData' => $this->_tpl_vars['block']['rating']['RatingData'],'RatingSummary' => $this->_tpl_vars['block']['rating']['RatingSummary'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<?php endif; ?>