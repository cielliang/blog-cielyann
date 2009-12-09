<?php /* Smarty version 2.6.20, created on 2009-10-22 11:29:19
         compiled from gallery:modules/imageframe/templates/ImageFrameHead.tpl */ ?>
<?php if (! empty ( $this->_tpl_vars['ImageFrameData']['idList'] )): ?>
<link rel="stylesheet" type="text/css" href="<?php echo $this->_reg_objects['g'][0]->url(array('arg1' => "view=imageframe.CSS",'arg2' => "frames=".($this->_tpl_vars['ImageFrameData']['idList']),'forceDirect' => true), $this);?>
"/>
<?php endif; ?>