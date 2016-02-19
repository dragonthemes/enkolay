<?php /* Smarty version 2.6.3, created on 2015-12-09 11:50:45
         compiled from contactform_fields.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'explode', 'contactform_fields.tpl', 25, false),)), $this); ?>
<?php unset($this->_sections['fields']);
$this->_sections['fields']['name'] = 'fields';
$this->_sections['fields']['loop'] = is_array($_loop=$this->_tpl_vars['contactfields']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['fields']['show'] = true;
$this->_sections['fields']['max'] = $this->_sections['fields']['loop'];
$this->_sections['fields']['step'] = 1;
$this->_sections['fields']['start'] = $this->_sections['fields']['step'] > 0 ? 0 : $this->_sections['fields']['loop']-1;
if ($this->_sections['fields']['show']) {
    $this->_sections['fields']['total'] = $this->_sections['fields']['loop'];
    if ($this->_sections['fields']['total'] == 0)
        $this->_sections['fields']['show'] = false;
} else
    $this->_sections['fields']['total'] = 0;
if ($this->_sections['fields']['show']):

            for ($this->_sections['fields']['index'] = $this->_sections['fields']['start'], $this->_sections['fields']['iteration'] = 1;
                 $this->_sections['fields']['iteration'] <= $this->_sections['fields']['total'];
                 $this->_sections['fields']['index'] += $this->_sections['fields']['step'], $this->_sections['fields']['iteration']++):
$this->_sections['fields']['rownum'] = $this->_sections['fields']['iteration'];
$this->_sections['fields']['index_prev'] = $this->_sections['fields']['index'] - $this->_sections['fields']['step'];
$this->_sections['fields']['index_next'] = $this->_sections['fields']['index'] + $this->_sections['fields']['step'];
$this->_sections['fields']['first']      = ($this->_sections['fields']['iteration'] == 1);
$this->_sections['fields']['last']       = ($this->_sections['fields']['iteration'] == $this->_sections['fields']['total']);
?>

<?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_type'] == 'text'): ?>
<div class="span4 offset0 marTop10 relatepop clr formcustombuild_new formcustom" id="divfld<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_id']; ?>
">
	<div class="span12 contactLisNav"><span onclick="showContactFormFieldsList('<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_id']; ?>
','<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['page_list_id']; ?>
');"><?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_label_name']; ?>
</span><?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['required']): ?><span class="red">*</span><?php endif; ?></div>
	<div class="clearfix"></div>
	<input class="contacttxtbx" type="text" style="<?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['size'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['size'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['size'] == 'Large'): ?>width:100%;<?php endif; ?>" value="<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['value']; ?>
" onclick="showContactFormFieldsList('<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_id']; ?>
','<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['page_list_id']; ?>
');" name="<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_label_name']; ?>
"  placeholder="<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['place_holder']; ?>
" <?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['required'] == 'Y'): ?>required=""<?php endif; ?> /><?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['instruction']; ?>
</span><?php endif; ?>
    <span class="deleteField" onclick="deleteCustomeFields('<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_id']; ?>
','divfld<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_id']; ?>
')" ><i class="fa fa-trash-o"></i></span>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_type'] == 'file'): ?>
<div class="span4 offset0 marTop10 relatepop clr formcustombuild_new formcustom" id="divfld<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_id']; ?>
">
	<div class="span12 contactLisNav"><span onclick="showContactFormFieldsList('<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_id']; ?>
','<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['page_list_id']; ?>
');"><?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_label_name']; ?>
</span><?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['required']): ?><span class="red">*</span><?php endif; ?></div>
	<div class="clearfix"></div>
	<input type="file" style="<?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['size'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['size'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['size'] == 'Large'): ?>width:100%;<?php endif; ?>" value="<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['value']; ?>
" onclick="showContactFormFieldsList('<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_id']; ?>
','<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['page_list_id']; ?>
');" name="<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_label_name']; ?>
"  placeholder="<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['place_holder']; ?>
" <?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['required'] == 'Y'): ?>required=""<?php endif; ?> /><?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['instruction']; ?>
</span><?php endif; ?>
    <span class="deleteField" onclick="deleteCustomeFields('<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_id']; ?>
','divfld<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_id']; ?>
')" ><i class="fa fa-trash-o"></i></span>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_type'] == 'radio'): ?>
<div class="span4 offset0 marTop10 relatepop clr formcustombuild_new formcustom" id="divfld<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_id']; ?>
">
	<div class="span12 contactLisNav"><span onclick="showContactFormFieldsList('<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_id']; ?>
','<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['page_list_id']; ?>
');"><?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_label_name']; ?>
</span><?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['required']): ?><span class="red">*</span><?php endif; ?></div>
	<div class="clearfix"></div>
	<?php $this->assign('opt', ((is_array($_tmp=",")) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['value']) : explode($_tmp, $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['value']))); ?>
    <?php unset($this->_sections['selopt']);
$this->_sections['selopt']['name'] = 'selopt';
$this->_sections['selopt']['loop'] = is_array($_loop=$this->_tpl_vars['opt']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['selopt']['show'] = true;
$this->_sections['selopt']['max'] = $this->_sections['selopt']['loop'];
$this->_sections['selopt']['step'] = 1;
$this->_sections['selopt']['start'] = $this->_sections['selopt']['step'] > 0 ? 0 : $this->_sections['selopt']['loop']-1;
if ($this->_sections['selopt']['show']) {
    $this->_sections['selopt']['total'] = $this->_sections['selopt']['loop'];
    if ($this->_sections['selopt']['total'] == 0)
        $this->_sections['selopt']['show'] = false;
} else
    $this->_sections['selopt']['total'] = 0;
if ($this->_sections['selopt']['show']):

            for ($this->_sections['selopt']['index'] = $this->_sections['selopt']['start'], $this->_sections['selopt']['iteration'] = 1;
                 $this->_sections['selopt']['iteration'] <= $this->_sections['selopt']['total'];
                 $this->_sections['selopt']['index'] += $this->_sections['selopt']['step'], $this->_sections['selopt']['iteration']++):
$this->_sections['selopt']['rownum'] = $this->_sections['selopt']['iteration'];
$this->_sections['selopt']['index_prev'] = $this->_sections['selopt']['index'] - $this->_sections['selopt']['step'];
$this->_sections['selopt']['index_next'] = $this->_sections['selopt']['index'] + $this->_sections['selopt']['step'];
$this->_sections['selopt']['first']      = ($this->_sections['selopt']['iteration'] == 1);
$this->_sections['selopt']['last']       = ($this->_sections['selopt']['iteration'] == $this->_sections['selopt']['total']);
?>                
    <label class="radio-inline" style="<?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['spacing'] == 'Large'): ?>margin:15px 0px;<?php endif; ?>">
    		<input class="flt" type="radio" name="<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_post_name']; ?>
" onclick="showContactFormFieldsList('<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_id']; ?>
','<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['page_list_id']; ?>
');" value="<?php echo $this->_tpl_vars['opt'][$this->_sections['selopt']['index']]; ?>
" <?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['required'] == 'Y'): ?>required=""<?php endif; ?> /> <?php echo $this->_tpl_vars['opt'][$this->_sections['selopt']['index']];  if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['instruction']; ?>
</span><?php endif; ?>
	</label>
    
    <?php endfor; else: ?>
    <label class="radio-inline" style="<?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['spacing'] == 'Large'): ?>margin:15px 0px;<?php endif; ?>" >
    		<input class="flt" type="radio" name="<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_post_name']; ?>
" onclick="showContactFormFieldsList('<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_id']; ?>
','<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['page_list_id']; ?>
');" value="" <?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['required'] == 'Y'): ?>required=""<?php endif; ?> /><?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['instruction']; ?>
</span><?php endif; ?>
	</label>
    <?php endif; ?>
   <span class="deleteField" onclick="deleteCustomeFields('<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_id']; ?>
','divfld<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_id']; ?>
')" ><i class="fa fa-trash-o"></i></span>
</div>
<?php endif;  if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_type'] == 'checkbox'): ?>
<div class="span4 offset0 marTop10 relatepop clr formcustombuild_new formcustom" id="divfld<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_id']; ?>
">
	<div class="span12 contactLisNav"><span onclick="showContactFormFieldsList('<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_id']; ?>
','<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['page_list_id']; ?>
');"><?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_label_name']; ?>
</span><?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['required']): ?><span class="red">*</span><?php endif; ?></div>
	<div class="clearfix"></div>
	<?php $this->assign('opt', ((is_array($_tmp=",")) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['value']) : explode($_tmp, $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['value']))); ?>
    <?php unset($this->_sections['selopt']);
$this->_sections['selopt']['name'] = 'selopt';
$this->_sections['selopt']['loop'] = is_array($_loop=$this->_tpl_vars['opt']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['selopt']['show'] = true;
$this->_sections['selopt']['max'] = $this->_sections['selopt']['loop'];
$this->_sections['selopt']['step'] = 1;
$this->_sections['selopt']['start'] = $this->_sections['selopt']['step'] > 0 ? 0 : $this->_sections['selopt']['loop']-1;
if ($this->_sections['selopt']['show']) {
    $this->_sections['selopt']['total'] = $this->_sections['selopt']['loop'];
    if ($this->_sections['selopt']['total'] == 0)
        $this->_sections['selopt']['show'] = false;
} else
    $this->_sections['selopt']['total'] = 0;
if ($this->_sections['selopt']['show']):

            for ($this->_sections['selopt']['index'] = $this->_sections['selopt']['start'], $this->_sections['selopt']['iteration'] = 1;
                 $this->_sections['selopt']['iteration'] <= $this->_sections['selopt']['total'];
                 $this->_sections['selopt']['index'] += $this->_sections['selopt']['step'], $this->_sections['selopt']['iteration']++):
$this->_sections['selopt']['rownum'] = $this->_sections['selopt']['iteration'];
$this->_sections['selopt']['index_prev'] = $this->_sections['selopt']['index'] - $this->_sections['selopt']['step'];
$this->_sections['selopt']['index_next'] = $this->_sections['selopt']['index'] + $this->_sections['selopt']['step'];
$this->_sections['selopt']['first']      = ($this->_sections['selopt']['iteration'] == 1);
$this->_sections['selopt']['last']       = ($this->_sections['selopt']['iteration'] == $this->_sections['selopt']['total']);
?>                
    <label class="radio-inline"  style="<?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['spacing'] == 'Large'): ?>margin:15px 0px;<?php endif; ?>">
    		<input class="flt" type="checkbox" name="<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_post_name']; ?>
[]" onclick="showContactFormFieldsList('<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_id']; ?>
','<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['page_list_id']; ?>
');" value="<?php echo $this->_tpl_vars['opt'][$this->_sections['selopt']['index']]; ?>
" <?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['required'] == 'Y'): ?>required=""<?php endif; ?> /> <?php echo $this->_tpl_vars['opt'][$this->_sections['selopt']['index']];  if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['instruction']; ?>
</span><?php endif; ?>
    </label>
    
    <?php endfor; else: ?>
    <label class="radio-inline" style="<?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['spacing'] == 'Large'): ?>margin:15px 0px;<?php endif; ?>">
  		<input class="flt" type="checkbox" name="<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_post_name']; ?>
" onclick="showContactFormFieldsList('<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_id']; ?>
','<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['page_list_id']; ?>
');" value="" <?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['required'] == 'Y'): ?>required=""<?php endif; ?> /><?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['instruction']; ?>
</span><?php endif; ?>
	</label>
    <?php endif; ?>
    <span class="deleteField" onclick="deleteCustomeFields('<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_id']; ?>
','divfld<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_id']; ?>
')" ><i class="fa fa-trash-o"></i></span>
</div>

<?php endif; ?>

<?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_type'] == 'select'): ?>
<div class="span4 offset0 marTop10 relatepop clr formcustombuild_new formcustom" id="divfld<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_id']; ?>
">
	<div class="span12 contactLisNav"><span onclick="showContactFormFieldsList('<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_id']; ?>
','<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['page_list_id']; ?>
');"><?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_label_name']; ?>
</span><?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['required']): ?><span class="red">*</span><?php endif; ?></div>
	<div class="clearfix"></div>
	<?php $this->assign('opt', ((is_array($_tmp=",")) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['value']) : explode($_tmp, $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['value']))); ?>
     <select style="<?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['size'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['size'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['size'] == 'Large'): ?>width:100%;<?php endif; ?>" name="<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_post_name']; ?>
" onclick="showContactFormFieldsList('<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_id']; ?>
','<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['page_list_id']; ?>
');" <?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['required'] == 'Y'): ?>required=""<?php endif; ?>>
     <?php $this->assign('opt', ((is_array($_tmp=",")) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['value']) : explode($_tmp, $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['value']))); ?>
     <?php unset($this->_sections['selopt']);
$this->_sections['selopt']['name'] = 'selopt';
$this->_sections['selopt']['loop'] = is_array($_loop=$this->_tpl_vars['opt']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['selopt']['show'] = true;
$this->_sections['selopt']['max'] = $this->_sections['selopt']['loop'];
$this->_sections['selopt']['step'] = 1;
$this->_sections['selopt']['start'] = $this->_sections['selopt']['step'] > 0 ? 0 : $this->_sections['selopt']['loop']-1;
if ($this->_sections['selopt']['show']) {
    $this->_sections['selopt']['total'] = $this->_sections['selopt']['loop'];
    if ($this->_sections['selopt']['total'] == 0)
        $this->_sections['selopt']['show'] = false;
} else
    $this->_sections['selopt']['total'] = 0;
if ($this->_sections['selopt']['show']):

            for ($this->_sections['selopt']['index'] = $this->_sections['selopt']['start'], $this->_sections['selopt']['iteration'] = 1;
                 $this->_sections['selopt']['iteration'] <= $this->_sections['selopt']['total'];
                 $this->_sections['selopt']['index'] += $this->_sections['selopt']['step'], $this->_sections['selopt']['iteration']++):
$this->_sections['selopt']['rownum'] = $this->_sections['selopt']['iteration'];
$this->_sections['selopt']['index_prev'] = $this->_sections['selopt']['index'] - $this->_sections['selopt']['step'];
$this->_sections['selopt']['index_next'] = $this->_sections['selopt']['index'] + $this->_sections['selopt']['step'];
$this->_sections['selopt']['first']      = ($this->_sections['selopt']['iteration'] == 1);
$this->_sections['selopt']['last']       = ($this->_sections['selopt']['iteration'] == $this->_sections['selopt']['total']);
?>
     <option><?php echo $this->_tpl_vars['opt'][$this->_sections['selopt']['index']]; ?>
</option>
     <?php endfor; endif; ?>
     </select>
     <?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['instruction']; ?>
</span><?php endif; ?>
	<span class="deleteField" onclick="deleteCustomeFields('<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_id']; ?>
','divfld<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_id']; ?>
')" ><i class="fa fa-trash-o"></i></span>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_type'] == 'textarea'): ?>
<div class="span4 offset0 marTop10 relatepop clr formcustombuild_new formcustom" id="divfld<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_id']; ?>
">
	<div class="span12 contactLisNav"><span onclick="showContactFormFieldsList('<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_id']; ?>
','<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['page_list_id']; ?>
');"><?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_label_name']; ?>
</span><?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['required']): ?><span class="red">*</span><?php endif; ?></div>
	<div class="clearfix"></div>
	<textarea class="contacttxtarea" style="<?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['size'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['size'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['size'] == 'Large'): ?>width:100%;<?php endif; ?>" placeholder="<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['place_holder']; ?>
"  name="<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_label_name']; ?>
" <?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['required'] == 'Y'): ?>required=""<?php endif; ?> onclick="showContactFormFieldsList('<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_id']; ?>
','<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['page_list_id']; ?>
');"><?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['value']; ?>
</textarea><?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['instruction']; ?>
</span><?php endif; ?>
    <span class="deleteField" onclick="deleteCustomeFields('<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_id']; ?>
','divfld<?php echo $this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['field_id']; ?>
')" ><i class="fa fa-trash-o"></i></span>
</div>
<?php endif;  endfor; endif; ?>