<?php /* Smarty version 2.6.3, created on 2015-12-09 11:51:01
         compiled from contactform.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'explode', 'contactform.tpl', 52, false),)), $this); ?>

<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['contact_form'] == '1'): ?>
<form name="contactform" id="contactform<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" action="<?php echo $this->_tpl_vars['SITE_SOURCE_BASEURL']; ?>
" enctype="multipart/form-data" method="post" >

	<div id="success_contact"></div>
	<input type="hidden" name="action" id="action" value="commoncontact">
	<input type="hidden" name="mail_to" id="mail_to" value="<?php echo $this->_tpl_vars['contactlist']['0']['mail_to']; ?>
">
		<div class="contactHead"><?php echo $this->_tpl_vars['contactlist']['0']['title_head']; ?>
</div>
		
		<div class="row-fluid marTop10"> 	
			<div class="span12 relatePop">
				<div class="span12 contactLisNav"><?php echo $this->_tpl_vars['contactlist']['0']['text1'];  if ($this->_tpl_vars['contactlist']['0']['text1_required']): ?><span class="red">*</span><?php endif; ?></div>
				<input type="hidden" id="firstreq_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['contactlist']['0']['text1_required']; ?>
">
				<div class="clearfix"></div>
				<input type="text"  class="contacttxtbx hei35" required name="firstname" id="firstname_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="" placeholder="<?php echo $this->_tpl_vars['LANG']['common_first']; ?>
" class="span12 offset0" style="<?php if ($this->_tpl_vars['contactlist']['0']['text1_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['text1_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_width'] == 'Large'): ?>width:100%;<?php endif; ?>"><?php if ($this->_tpl_vars['contactlist']['0']['text1_instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactlist']['0']['text1_instruction']; ?>
</span><?php endif; ?>
				<div id="error_msg1"></div>
			</div>
		</div>
		<div class="row-fluid marTop10">
			<div class="span12 relatePop">
				<div class="span12 contactLisNav"><?php echo $this->_tpl_vars['contactlist']['0']['text2']; ?>
 <?php if ($this->_tpl_vars['contactlist']['0']['text2_required']): ?><span class="red">*</span><?php endif; ?></div>
				<input type="hidden" id="lastreq_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['contactlist']['0']['text2_required']; ?>
">
				<div class="clearfix"></div>
				<input type="text" class="contacttxtbx hei35" required name="lastname" id="lastname_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="" placeholder="<?php echo $this->_tpl_vars['LANG']['common_last']; ?>
" class="span12 offset0" style="<?php if ($this->_tpl_vars['contactlist']['0']['text2_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['text2_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_width'] == 'Large'): ?>width:100%;<?php endif; ?>"><?php if ($this->_tpl_vars['contactlist']['0']['text2_instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactlist']['0']['text2_instruction']; ?>
</span><?php endif; ?>
                <div id="error_msg2"></div>
			</div>
		</div>
		<div class="row-fluid marTop10">
			<div class="span12 contactLisNav"><?php echo $this->_tpl_vars['contactlist']['0']['text3'];  if ($this->_tpl_vars['contactlist']['0']['text3_required']): ?><span class="red">*</span><?php endif; ?></div>
			<input type="hidden" id="emailreq_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['contactlist']['0']['text3_required']; ?>
">
			<div class="clearfix"></div>
			<input type="text" class="contacttxtbx hei35" required  name="email" id="email_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="" placeholder="<?php echo $this->_tpl_vars['LANG']['common_email']; ?>
" class="span12 offset0" style="<?php if ($this->_tpl_vars['contactlist']['0']['text3_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['text3_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_width'] == 'Large'): ?>width:100%;<?php endif; ?>"><?php if ($this->_tpl_vars['contactlist']['0']['text3_instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactlist']['0']['text3_instruction']; ?>
</span><?php endif; ?>
            <div id="error_msg3"></div>
    	</div>
		<div class="row-fluid marTop10">
			<div class="span12 contactLisNav"><?php echo $this->_tpl_vars['contactlist']['0']['text4']; ?>
 <?php if ($this->_tpl_vars['contactlist']['0']['text4_required']): ?><span class="red">*</span><?php endif; ?></div>
			<input type="hidden" id="commreq_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
}" value="<?php echo $this->_tpl_vars['contactlist']['0']['text4_required']; ?>
">
			<div class="clearfix"></div>
			<textarea class="contacttxtarea" required name="comment_contact" id="comment_contact_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
}" style="<?php if ($this->_tpl_vars['contactlist']['0']['text4_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['text4_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_width'] == 'Large'): ?>width:100%;<?php endif; ?>"></textarea><?php if ($this->_tpl_vars['contactlist']['0']['text4_instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactlist']['0']['text4_instruction']; ?>
</span><?php endif; ?>
            <div id="error_msg4"></div>
        </div>
        <?php unset($this->_sections['cntfld']);
$this->_sections['cntfld']['name'] = 'cntfld';
$this->_sections['cntfld']['loop'] = is_array($_loop=$this->_tpl_vars['contactfields']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['cntfld']['show'] = true;
$this->_sections['cntfld']['max'] = $this->_sections['cntfld']['loop'];
$this->_sections['cntfld']['step'] = 1;
$this->_sections['cntfld']['start'] = $this->_sections['cntfld']['step'] > 0 ? 0 : $this->_sections['cntfld']['loop']-1;
if ($this->_sections['cntfld']['show']) {
    $this->_sections['cntfld']['total'] = $this->_sections['cntfld']['loop'];
    if ($this->_sections['cntfld']['total'] == 0)
        $this->_sections['cntfld']['show'] = false;
} else
    $this->_sections['cntfld']['total'] = 0;
if ($this->_sections['cntfld']['show']):

            for ($this->_sections['cntfld']['index'] = $this->_sections['cntfld']['start'], $this->_sections['cntfld']['iteration'] = 1;
                 $this->_sections['cntfld']['iteration'] <= $this->_sections['cntfld']['total'];
                 $this->_sections['cntfld']['index'] += $this->_sections['cntfld']['step'], $this->_sections['cntfld']['iteration']++):
$this->_sections['cntfld']['rownum'] = $this->_sections['cntfld']['iteration'];
$this->_sections['cntfld']['index_prev'] = $this->_sections['cntfld']['index'] - $this->_sections['cntfld']['step'];
$this->_sections['cntfld']['index_next'] = $this->_sections['cntfld']['index'] + $this->_sections['cntfld']['step'];
$this->_sections['cntfld']['first']      = ($this->_sections['cntfld']['iteration'] == 1);
$this->_sections['cntfld']['last']       = ($this->_sections['cntfld']['iteration'] == $this->_sections['cntfld']['total']);
?>       
        <div class="span4 offset0 marTop10 relatepop clr formcustombuild_new formcustom">
			<div class="span12 contactLisNav"><?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['field_label_name'];  if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['required'] == 'Y'): ?><span class="red">*</span><?php endif; ?></div>
			<input type="hidden" id="commreq_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
}" value="<?php echo $this->_tpl_vars['contactlist']['0']['text4_required']; ?>
" />
			<div class="clearfix"></div>
			<?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['field_type'] == 'textarea'): ?>
                 <textarea class="contacttxtarea" style="<?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Large'): ?>width:100%;<?php endif; ?>"
 name="<?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['field_post_name']; ?>
" <?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['required'] == 'Y'): ?>required=""<?php endif; ?>><?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['value']; ?>
</textarea><?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['instruction']; ?>
</span><?php endif; ?>
            <?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['field_type'] == 'select'): ?>
                <select name="<?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['field_post_name']; ?>
" <?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['required'] == 'Y'): ?>required=""<?php endif; ?> class="contacttxtbx">
                <?php $this->assign('opt', ((is_array($_tmp=",")) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['value']) : explode($_tmp, $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['value']))); ?>
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
                </select><?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['instruction']; ?>
</span><?php endif; ?>     
            <?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['field_type'] == 'radio'): ?>               
                <?php $this->assign('opt', ((is_array($_tmp=",")) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['value']) : explode($_tmp, $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['value']))); ?>
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
                <label class="radio-inline" style="<?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Large'): ?>width:100%;<?php endif; ?>">
				<input class="flt" type="radio" name="<?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['field_post_name']; ?>
" value="<?php echo $this->_tpl_vars['opt'][$this->_sections['selopt']['index']]; ?>
" <?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['required'] == 'Y'): ?>required=""<?php endif; ?> /><?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['instruction']; ?>
</span><?php endif; ?> <?php echo $this->_tpl_vars['opt'][$this->_sections['selopt']['index']]; ?>
</label>
                <?php endfor; endif; ?>
            <?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['field_type'] == 'checkbox'): ?>                
                <?php $this->assign('opt', ((is_array($_tmp=",")) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['value']) : explode($_tmp, $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['value']))); ?>
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
                <label class="radio-inline" style="<?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Large'): ?>width:100%;<?php endif; ?>"
 style="<?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Large'): ?>width:100%;<?php endif; ?>">
			 <input onclick="checkValidate('<?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['field_post_name']; ?>
')" type="checkbox" name="<?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['field_post_name']; ?>
[]" class="<?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['field_post_name']; ?>
 flt" value="<?php echo $this->_tpl_vars['opt'][$this->_sections['selopt']['index']]; ?>
" <?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['required'] == 'Y'): ?>required=""<?php endif; ?> /><?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['instruction']; ?>
</span><?php endif; ?> <?php echo $this->_tpl_vars['opt'][$this->_sections['selopt']['index']]; ?>
</label>
                <?php endfor; endif; ?>
            <?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['field_type'] == 'file'): ?>
                <input class="contacttxtbx hei35" type="file" style="<?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Large'): ?>width:100%;<?php endif; ?>"
 <?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['required'] == 'Y'): ?>required=""<?php endif; ?> name="<?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['field_post_name']; ?>
" value="<?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['value']; ?>
" /> 
 <?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['instruction']; ?>
</span><?php endif; ?>       
            <?php else: ?>
                <input class="contacttxtbx hei35" style="<?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Large'): ?>width:100%;<?php endif; ?>"
 name="<?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['field_post_name']; ?>
" <?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['required'] == 'Y'): ?>required=""<?php endif; ?> value="<?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['value']; ?>
" /><?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['instruction']; ?>
</span><?php endif; ?>     
            <?php endif; ?>
            <div id="error_msg4"></div>
        </div>
         <?php endfor; endif; ?>
        <div class="row-fluid marTop10" >
        	<div class="span12 contactLisNav">Captcha <span class="red">*</span></div>
        	<?php echo $this->_tpl_vars['objCommon']->changeCaptchaCode(); ?>

			<div class="clearfix"></div>
			<input type="text" required name="captcha" id="capt<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
}" value="" onclick="changecaptcha('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
}');" class="contacttxtbx hei35" />
			<!-- <img  id="captcha<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
}" src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/captcha.php?formcode=<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
}" class="pull-left" style="vertical-align:middle;" /> -->
			 <div class="clearfix"></div>
                <span class="refreshCode captchaCode btn pull-left">
	            	<span id="captchacode_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"><?php echo $this->_tpl_vars['rndnumber']; ?>
</span>
	            </span>
	            <span class="refreshNew refreshCaptcha btn btn-primary pull-left offset1" title="Refresh Code" onclick="return refrashCaptchacode('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');">Change</span>	
			 <div id="capterror<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
}"></div>
        </div>
		<div class="row-fluid marTop10">
			<div class="buildPagePostButtonLeft"><input type="submit" value="Gönder" onclick="SubmitContact('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" class="buildPagePostButton" /></div>
		</div>
	</form>
<?php endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['contact_form'] == '1'): ?>
<form class="clearfix" name="contactform" id="contactform<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" action="<?php echo $this->_tpl_vars['SITE_SOURCE_BASEURL']; ?>
" enctype="multipart/form-data" method="post" >
	<div id="success_contact"></div>
	<input type="hidden" name="action" id="action" value="commoncontact">
	<input type="hidden" name="mail_to" id="mail_to" value="<?php echo $this->_tpl_vars['contactlist']['0']['mail_to']; ?>
">
		<div class="contactHead themeheadsec margin_top_10"><?php echo $this->_tpl_vars['contactlist']['0']['title_head']; ?>
</div>
		
		<div class="row-fluid"> 	
			<div class="span4 relatePop">
				<div class="span12 contactLisNav"><?php echo $this->_tpl_vars['contactlist']['0']['text1'];  if ($this->_tpl_vars['contactlist']['0']['text1_required']): ?><span class="red">*</span><?php endif; ?></div>
				<input type="hidden" id="firstreq_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['contactlist']['0']['text1_required']; ?>
">
				<input type="text" required class="contacttxtbx hei35" name="firstname" id="firstname_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" value="" placeholder="<?php echo $this->_tpl_vars['LANG']['common_first']; ?>
" class="span12 offset0" style="<?php if ($this->_tpl_vars['contactlist']['0']['text1_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['text1_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_width'] == 'Large'): ?>width:100%;<?php endif; ?>"><?php if ($this->_tpl_vars['contactlist']['0']['text1_instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactlist']['0']['text1_instruction']; ?>
</span><?php endif; ?>
				<div id="error_msg1"></div>
			</div>
			<div class="span4 relatePop">
				<div class="span12 contactLisNav"><?php echo $this->_tpl_vars['contactlist']['0']['text2']; ?>
 <?php if ($this->_tpl_vars['contactlist']['0']['text2_required']): ?><span class="red">*</span><?php endif; ?></div>
				<input type="hidden" id="lastreq_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['contactlist']['0']['text2_required']; ?>
">
				<input type="text" required  class="contacttxtbx hei35" name="lastname" id="lastname_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" value="" placeholder="<?php echo $this->_tpl_vars['LANG']['common_last']; ?>
" class="span12 offset0" style="<?php if ($this->_tpl_vars['contactlist']['0']['text2_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['text2_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_width'] == 'Large'): ?>width:100%;<?php endif; ?>"><?php if ($this->_tpl_vars['contactlist']['0']['text2_instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactlist']['0']['text2_instruction']; ?>
</span><?php endif; ?>
                <div id="error_msg2"></div>
			</div>
            
            <div class="span4 offset0 marTop10 relatepop clr">
			<div class="span12 contactLisNav"><?php echo $this->_tpl_vars['contactlist']['0']['text3'];  if ($this->_tpl_vars['contactlist']['0']['text3_required']): ?><span class="red">*</span><?php endif; ?></div>
			<input type="hidden" id="emailreq_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['contactlist']['0']['text3_required']; ?>
">
			<input type="text" required class="contacttxtbx  hei35"  name="email" id="email_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" value="" placeholder="<?php echo $this->_tpl_vars['LANG']['common_email']; ?>
" class="span12 offset0" style="<?php if ($this->_tpl_vars['contactlist']['0']['text3_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['text3_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_width'] == 'Large'): ?>width:100%;<?php endif; ?>"><?php if ($this->_tpl_vars['contactlist']['0']['text3_instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactlist']['0']['text3_instruction']; ?>
</span><?php endif; ?>
            <div id="error_msg3"></div>
    	</div>
            <div class="span4 offset0 marTop10 relatepop clr">
                <div class="span12 contactLisNav"><?php echo $this->_tpl_vars['contactlist']['0']['text4']; ?>
 <?php if ($this->_tpl_vars['contactlist']['0']['text4_required']): ?><span class="red">*</span><?php endif; ?></div>
                <input type="hidden" id="commreq_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['contactlist']['0']['text4_required']; ?>
">
                <textarea class="contacttxtarea" required name="comment_contact" id="comment_contact_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" style="<?php if ($this->_tpl_vars['contactlist']['0']['text4_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['text4_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_width'] == 'Large'): ?>width:100%;<?php endif; ?>"></textarea><?php if ($this->_tpl_vars['contactlist']['0']['text4_instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactlist']['0']['text4_instruction']; ?>
</span><?php endif; ?>
                <div id="error_msg4"></div>
            </div>
            
            <?php unset($this->_sections['cntfld']);
$this->_sections['cntfld']['name'] = 'cntfld';
$this->_sections['cntfld']['loop'] = is_array($_loop=$this->_tpl_vars['contactfields']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['cntfld']['show'] = true;
$this->_sections['cntfld']['max'] = $this->_sections['cntfld']['loop'];
$this->_sections['cntfld']['step'] = 1;
$this->_sections['cntfld']['start'] = $this->_sections['cntfld']['step'] > 0 ? 0 : $this->_sections['cntfld']['loop']-1;
if ($this->_sections['cntfld']['show']) {
    $this->_sections['cntfld']['total'] = $this->_sections['cntfld']['loop'];
    if ($this->_sections['cntfld']['total'] == 0)
        $this->_sections['cntfld']['show'] = false;
} else
    $this->_sections['cntfld']['total'] = 0;
if ($this->_sections['cntfld']['show']):

            for ($this->_sections['cntfld']['index'] = $this->_sections['cntfld']['start'], $this->_sections['cntfld']['iteration'] = 1;
                 $this->_sections['cntfld']['iteration'] <= $this->_sections['cntfld']['total'];
                 $this->_sections['cntfld']['index'] += $this->_sections['cntfld']['step'], $this->_sections['cntfld']['iteration']++):
$this->_sections['cntfld']['rownum'] = $this->_sections['cntfld']['iteration'];
$this->_sections['cntfld']['index_prev'] = $this->_sections['cntfld']['index'] - $this->_sections['cntfld']['step'];
$this->_sections['cntfld']['index_next'] = $this->_sections['cntfld']['index'] + $this->_sections['cntfld']['step'];
$this->_sections['cntfld']['first']      = ($this->_sections['cntfld']['iteration'] == 1);
$this->_sections['cntfld']['last']       = ($this->_sections['cntfld']['iteration'] == $this->_sections['cntfld']['total']);
?>       
            <div class="span4 offset0 marTop10 relatepop clr formcustombuild_new formcustom">
                <div class="span12 contactLisNav"><?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['field_label_name'];  if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['required'] == 'Y'): ?><span class="red">*</span><?php endif; ?></div>
                <input type="hidden" id="commreq_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['contactlist']['0']['text4_required']; ?>
" />
                <?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['field_type'] == 'textarea'): ?>
                     <textarea class="contacttxtarea" style="<?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Large'): ?>width:100%;<?php endif; ?>"
     <?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['required'] == 'Y'): ?>required=""<?php endif; ?> name="<?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['field_post_name']; ?>
"><?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['value']; ?>
</textarea><?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['instruction']; ?>
</span><?php endif; ?>     
                <?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['field_type'] == 'select'): ?>
                    <select class="contacttxtbx hei35" style="<?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Large'): ?>width:100%;<?php endif; ?>"
     name="<?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['field_post_name']; ?>
" <?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['required'] == 'Y'): ?>required=""<?php endif; ?>>
                    <?php $this->assign('opt', ((is_array($_tmp=",")) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['value']) : explode($_tmp, $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['value']))); ?>
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
                    </select><?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['instruction']; ?>
</span><?php endif; ?>     
                <?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['field_type'] == 'radio'): ?>               
                    <?php $this->assign('opt', ((is_array($_tmp=",")) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['value']) : explode($_tmp, $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['value']))); ?>
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
                    <label class="radio-inline" style="<?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Large'): ?>width:100%;<?php endif; ?>">
                 <input class="flt" type="radio" name="<?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['field_post_name']; ?>
" value="<?php echo $this->_tpl_vars['opt'][$this->_sections['selopt']['index']]; ?>
" <?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['required'] == 'Y'): ?>required=""<?php endif; ?> /> <?php echo $this->_tpl_vars['opt'][$this->_sections['selopt']['index']]; ?>

                    <?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['instruction']; ?>
</span><?php endif; ?> 
                    </label> 
                    <?php endfor; endif; ?>
                       
                <?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['field_type'] == 'checkbox'): ?>                
                    <?php $this->assign('opt', ((is_array($_tmp=",")) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['value']) : explode($_tmp, $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['value']))); ?>
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
                    <label class="radio-inline" style="<?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Large'): ?>width:100%;<?php endif; ?>">
                     <input onclick="checkValidate('<?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['field_post_name']; ?>
')" type="checkbox" name="<?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['field_post_name']; ?>
[]" class="<?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['field_post_name']; ?>
 flt" value="<?php echo $this->_tpl_vars['opt'][$this->_sections['selopt']['index']]; ?>
" <?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['required'] == 'Y'): ?>required=""<?php endif; ?> /> 
                     <?php echo $this->_tpl_vars['opt'][$this->_sections['selopt']['index']]; ?>

                     <?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['instruction']; ?>
</span><?php endif; ?>
                     </label>
                    <?php endfor; endif; ?>                       
                <?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['field_type'] == 'file'): ?>
                    <input type="file" style="<?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Large'): ?>width:100%;<?php endif; ?>"
     <?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['required'] == 'Y'): ?>required=""<?php endif; ?> name="<?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['field_post_name']; ?>
" value="<?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['value']; ?>
" /> 
     <?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['instruction']; ?>
</span><?php endif; ?>   
                <?php else: ?>
                    <input class="contacttxtbx hei35" type="text" style="<?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['size'] == 'Large'): ?>width:100%;<?php endif; ?>"
     <?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['required'] == 'Y'): ?>required=""<?php endif; ?> name="<?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['field_post_name']; ?>
" value="<?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['value']; ?>
" /> 
     <?php if ($this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactfields'][$this->_sections['cntfld']['index']]['instruction']; ?>
</span><?php endif; ?>         
                <?php endif; ?>
                <div id="error_msg4"></div>
            </div>
            <?php endfor; endif; ?>
            <div class="span4 offset0 marTop10 relatepop clr" >
                <div class="span12 contactLisNav">Captcha <span class="red">*</span></div>
                <?php echo $this->_tpl_vars['objCommon']->changeCaptchaCode(); ?>

                <div class="clearfix"></div>
                <input type="text" required name="captcha" id="capt<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" value=""  class="contacttxtbx hei35">
                <!-- <img id="captcha<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/captcha.php?formcode=<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" onclick="changecaptcha('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
')"  class="pull-left" style="vertical-align:middle;" /> -->
                <div class="clearfix"></div>
                <span class="refreshCode captchaCode btn pull-left">
	            	<span id="captchacode_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"><?php echo $this->_tpl_vars['rndnumber']; ?>
</span>
	            </span>
	            <span class="refreshNew refreshCaptcha btn btn-primary pull-left offset1" title="Refresh Code" onclick="return refrashCaptchacode('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');">Change</span>	
             <div id="capterror<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"></div>
            </div>
            <div class="span4 offset0 marTop10 relatepop clr">
                <div class="span12 contactLisNav"><input type="submit" value="Gönder" onclick="return SubmitContact('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');" class="buildPagePostButton" /></div>
                
            </div>
		</div>
		
	</form>	
<?php endif;  echo '
<script>
function checkValidate(id)
{    
   
    if($("."+id+":checked").length>0)
    {        
        $("."+id).removeAttr("required");
    }
    else
    {
        $("."+id).attr("required","required");
        
    }
}
</script>
'; ?>