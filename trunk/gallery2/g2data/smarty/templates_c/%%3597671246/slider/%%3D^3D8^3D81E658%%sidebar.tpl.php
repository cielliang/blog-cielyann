<?php /* Smarty version 2.6.20, created on 2009-10-22 11:29:28
         compiled from gallery:themes/slider/templates/sidebar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'markup', 'gallery:themes/slider/templates/sidebar.tpl', 21, false),array('modifier', 'default', 'gallery:themes/slider/templates/sidebar.tpl', 21, false),)), $this); ?>
<div id="gsSidebar" class="gcBorder1">
<div class="gbBlock">
<?php echo $this->_reg_objects['g'][0]->block(array('type' => "core.SystemLinks",'order' => "core.SiteAdmin core.YourAccount core.Login core.Logout",'othersAt' => 4), $this);?>

</div>
<?php if (! empty ( $this->_tpl_vars['theme']['parents'] )): ?>
<div class="gbBlock">
<h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Navigation'), $this);?>
 </h3>
<ul>
<?php $_from = $this->_tpl_vars['theme']['parents']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['parent']):
?>
<li>
&raquo;
<a href="<?php echo $this->_reg_objects['g'][0]->url(array('params' => $this->_tpl_vars['parent']['urlParams']), $this);?>
">
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['parent']['title'])) ? $this->_run_mod_handler('markup', true, $_tmp, 'strip') : smarty_modifier_markup($_tmp, 'strip')))) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['parent']['pathComponent']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['parent']['pathComponent'])); ?>

</a>
</li>
<?php endforeach; endif; unset($_from); ?>
</ul>
</div>
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['theme']['itemLinks'] )): ?>
<div class="gbBlock">
<h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Album'), $this);?>
 </h3>
<select onchange="<?php echo 'if (this.value) { var a=this.value; this.options[0].selected=1; eval(a); }'; ?>
" style="margin-left: 1em">
<option label="<?php echo $this->_reg_objects['g'][0]->text(array('text' => "&laquo; actions &raquo;"), $this);?>
" value="">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "&laquo; actions &raquo;"), $this);?>

</option>
<?php $_from = $this->_tpl_vars['theme']['itemLinks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?>
<?php echo $this->_reg_objects['g'][0]->itemLink(array('link' => $this->_tpl_vars['link'],'type' => 'option'), $this);?>

<?php endforeach; endif; unset($_from); ?>
</select>
</div>
<?php endif; ?>
<div id="photoActions" class="gbBlock" style="display: none">
<h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Photo'), $this);?>
 </h3>
<select id="linkList" onchange="<?php echo 'if (this.value) { var a=this.value; this.options[0].selected=1; eval(a); }'; ?>
" style="margin-left: 1em">
<option label="<?php echo $this->_reg_objects['g'][0]->text(array('text' => "&laquo; actions &raquo;"), $this);?>
" value="">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "&laquo; actions &raquo;"), $this);?>

</option>
</select>
</div>
<div class="gbBlock">
<h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => "Slideshow&nbsp;Options"), $this);?>
 </h3>
<ul><li>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Delay'), $this);?>
:&nbsp;
<select id="slide_delay" onchange="slide_setdelay(this.value)">
<option value="3"><?php echo $this->_reg_objects['g'][0]->text(array('text' => '3 seconds'), $this);?>
</option>
<option selected="selected" value="5"><?php echo $this->_reg_objects['g'][0]->text(array('text' => '5 seconds'), $this);?>
</option>
<option value="7"><?php echo $this->_reg_objects['g'][0]->text(array('text' => '7 seconds'), $this);?>
</option>
<option value="10"><?php echo $this->_reg_objects['g'][0]->text(array('text' => '10 seconds'), $this);?>
</option>
<option value="15"><?php echo $this->_reg_objects['g'][0]->text(array('text' => '15 seconds'), $this);?>
</option>
<option value="20"><?php echo $this->_reg_objects['g'][0]->text(array('text' => '20 seconds'), $this);?>
</option>
</select>
<br/>
<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Direction'), $this);?>
:&nbsp;
<select id="slide_order" onchange="slide_setorder(this.value)">
<option selected="selected" value="1"><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'forward'), $this);?>
</option>
<option value="-1"><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'reverse'), $this);?>
</option>
<option value="0"><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'random'), $this);?>
</option>
</select>
</li></ul>
</div>
<div class="gbBlock">
<h3> <?php echo $this->_reg_objects['g'][0]->text(array('text' => "Image&nbsp;Bar"), $this);?>
 </h3>
<ul><li>
<a href="" onclick="options_onoff();thumbs_horizvert();return false">
<?php echo $this->_reg_objects['g'][0]->text(array('text' => "Horizontal/Vertical"), $this);?>

</a>
</li></ul>
</div>
<?php $_from = $this->_tpl_vars['theme']['params']['sidebarBlocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['block']):
?>
<?php echo $this->_reg_objects['g'][0]->block(array('type' => $this->_tpl_vars['block']['0'],'params' => $this->_tpl_vars['block']['1'],'class' => 'gbBlock'), $this);?>

<?php endforeach; endif; unset($_from); ?>
</div>