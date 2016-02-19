<?php /* Smarty version 2.6.3, created on 2015-12-09 12:36:39
         compiled from formthemeentries.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'formthemeentries.tpl', 48, false),array('modifier', 'utf8_encode', 'formthemeentries.tpl', 48, false),)), $this); ?>
<div class="row-fluid">
	<div class="pull-right">
		<a class="btn btn-warning" onclick="hideTwodivForm('sitelisting_id','MyAccPageInner','formentries');"><?php echo $this->_tpl_vars['LANG']['user_sitelist']; ?>
</a>
		<a class="btn btn-success" href="<?php echo $this->_tpl_vars['SUBDOMAIN']; ?>
"><?php if ($this->_tpl_vars['seperatedetails']['0']['site_title']):  echo $this->_tpl_vars['seperatedetails']['0']['site_title'];  elseif ($this->_tpl_vars['seperatedetails']['0']['site_title'] == '' && $this->_tpl_vars['seperatedetails']['0']['blog_id']):  echo $this->_tpl_vars['LANG']['blog_title_name'];  else:  echo $this->_tpl_vars['LANG']['site_title_name'];  endif; ?></a>
		<a class="btn btn-info" onclick="SettingFunction('<?php echo $this->_tpl_vars['seperatedetails']['0']['domain_id']; ?>
','<?php echo $this->_tpl_vars['seperatedetails']['0']['theme_id']; ?>
');"><?php echo $this->_tpl_vars['LANG']['user_editlist']; ?>
</a>
	</div>
	<div class="clr"></div>
 	<?php if ($this->_tpl_vars['formdetails']['0']['id'] == '' && $this->_tpl_vars['contactformpresent']['0']['contact'] == '1'): ?>
		<div class="tableListContainer">
			<table width="100%" border="0" class="tableListContent">
				<thead>
					<tr>
						<th><?php echo $this->_tpl_vars['LANG']['date_submitted_for_form']; ?>
</th>  
						<th><?php echo $this->_tpl_vars['LANG']['ip_address_for_form']; ?>
</th>
						<th><?php echo $this->_tpl_vars['LANG']['name_first_for_form']; ?>
</th> 
						<th><?php echo $this->_tpl_vars['LANG']['name_last_for_form']; ?>
</th> 
						<th><?php echo $this->_tpl_vars['LANG']['email_for_form']; ?>
</th>
						<th><?php echo $this->_tpl_vars['LANG']['action_for_form']; ?>
</th>
					</tr>
				</thead>
				<tbody>
					  <th colspan="6"><?php echo $this->_tpl_vars['LANG']['no_records']; ?>
</th>  
					
				</tbody>
			</table>
		</div>
	
	<?php elseif ($this->_tpl_vars['contactformpresent']['0']['contact'] == '0'): ?>
		<div class="formThemeEntery">
			<div class="formThemeEnteryHead"><?php echo $this->_tpl_vars['LANG']['user_form_name']; ?>
</div>
			<div class="formThemeEnteryImage"></div>
		</div>
	<?php else: ?>
		<div class="tableListContainer">
			<table width="100%" border="0" class="tableListContent">
				<thead>
					<tr>
						<th><?php echo $this->_tpl_vars['LANG']['date_submitted_for_form']; ?>
</th>  
						<th><?php echo $this->_tpl_vars['LANG']['name_first_for_form']; ?>
</th> 
						<th><?php echo $this->_tpl_vars['LANG']['name_last_for_form']; ?>
</th> 
						<th><?php echo $this->_tpl_vars['LANG']['email_for_form']; ?>
</th>
						<th><?php echo $this->_tpl_vars['LANG']['action_for_form']; ?>
</th>
					</tr>
				</thead>
				<tbody>
					 <?php unset($this->_sections['formentry']);
$this->_sections['formentry']['name'] = 'formentry';
$this->_sections['formentry']['loop'] = is_array($_loop=($this->_tpl_vars['formdetails'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['formentry']['show'] = true;
$this->_sections['formentry']['max'] = $this->_sections['formentry']['loop'];
$this->_sections['formentry']['step'] = 1;
$this->_sections['formentry']['start'] = $this->_sections['formentry']['step'] > 0 ? 0 : $this->_sections['formentry']['loop']-1;
if ($this->_sections['formentry']['show']) {
    $this->_sections['formentry']['total'] = $this->_sections['formentry']['loop'];
    if ($this->_sections['formentry']['total'] == 0)
        $this->_sections['formentry']['show'] = false;
} else
    $this->_sections['formentry']['total'] = 0;
if ($this->_sections['formentry']['show']):

            for ($this->_sections['formentry']['index'] = $this->_sections['formentry']['start'], $this->_sections['formentry']['iteration'] = 1;
                 $this->_sections['formentry']['iteration'] <= $this->_sections['formentry']['total'];
                 $this->_sections['formentry']['index'] += $this->_sections['formentry']['step'], $this->_sections['formentry']['iteration']++):
$this->_sections['formentry']['rownum'] = $this->_sections['formentry']['iteration'];
$this->_sections['formentry']['index_prev'] = $this->_sections['formentry']['index'] - $this->_sections['formentry']['step'];
$this->_sections['formentry']['index_next'] = $this->_sections['formentry']['index'] + $this->_sections['formentry']['step'];
$this->_sections['formentry']['first']      = ($this->_sections['formentry']['iteration'] == 1);
$this->_sections['formentry']['last']       = ($this->_sections['formentry']['iteration'] == $this->_sections['formentry']['total']);
?>
						<tr onclick="clickToShowForm('<?php echo $this->_tpl_vars['formdetails'][$this->_sections['formentry']['index']]['id']; ?>
');">
							<td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['formdetails'][$this->_sections['formentry']['index']]['addeddate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%b %d, %Y') : smarty_modifier_date_format($_tmp, '%b %d, %Y')))) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</td>
							<td><?php echo $this->_tpl_vars['formdetails'][$this->_sections['formentry']['index']]['firstname']; ?>
</td>
							<td><?php echo $this->_tpl_vars['formdetails'][$this->_sections['formentry']['index']]['lastname']; ?>
</td>
							<td><?php echo $this->_tpl_vars['formdetails'][$this->_sections['formentry']['index']]['email']; ?>
</td>
							<td onclick="clickToDelete('<?php echo $this->_tpl_vars['formdetails'][$this->_sections['formentry']['index']]['id']; ?>
','<?php echo $this->_tpl_vars['formdetails'][$this->_sections['formentry']['index']]['domain_id']; ?>
')">Sil</td>
						</tr>
					<?php endfor; endif; ?>
				</tbody>
			</table>
		</div>
	 <?php endif; ?>
	<div id="showDetForm">
	</div>
</div>