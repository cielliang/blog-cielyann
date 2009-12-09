<?php /* Smarty version 2.6.20, created on 2009-10-22 11:29:28
         compiled from gallery:modules/comment/templates/blocks/AddComment.tpl */ ?>
<?php if (empty ( $this->_tpl_vars['item'] )): ?> <?php $this->assign('item', $this->_tpl_vars['theme']['item']); ?> <?php endif; ?>
<?php echo $this->_reg_objects['g'][0]->callback(array('type' => "comment.AddComment",'itemId' => $this->_tpl_vars['item']['id']), $this);?>

<?php if (! isset ( $this->_tpl_vars['expand'] )): ?><?php $this->assign('expand', true); ?><?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['block']['comment']['AddComment'] )): ?>
<div id="AddComment_block" <?php if ($this->_tpl_vars['expand']): ?>style="display: none"<?php endif; ?> class="<?php echo $this->_tpl_vars['class']; ?>
">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gallery:modules/comment/templates/AddComment.tpl", 'smarty_include_vars' => array('AddComment' => $this->_tpl_vars['block']['comment']['AddComment'],'inBlock' => 1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<?php if ($this->_tpl_vars['expand']): ?>
<div id="AddComment_trigger" class="<?php echo $this->_tpl_vars['class']; ?>
" onclick="AddComment_showBlock()">
<div class="gbBlock gcBackground1">
<h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Add Comment'), $this);?>
 </h3>
</div>
<textarea cols="80" rows="5"></textarea>
</div>
<?php echo '
<script type="text/javascript">
// <![CDATA[
function AddComment_showBlock() {
document.getElementById(\'AddComment_block\').style.display=\'block\';
document.getElementById(\'AddComment_trigger\').style.display=\'none\';
}
// ]]>
</script>
'; ?>

<?php endif; ?>
<?php endif; ?>