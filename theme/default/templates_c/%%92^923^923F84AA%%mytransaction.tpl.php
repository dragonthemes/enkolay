<?php /* Smarty version 2.6.3, created on 2015-12-09 12:11:40
         compiled from mytransaction.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'string_format', 'mytransaction.tpl', 27, false),array('modifier', 'date_format', 'mytransaction.tpl', 28, false),array('modifier', 'utf8_encode', 'mytransaction.tpl', 28, false),)), $this); ?>
<div class="row-fluid">
	<div class="marTop20">
		<div class="container">
			<div class="HeadingUser"><?php echo $this->_tpl_vars['LANG']['mytransaction_setting']; ?>
</div>
			<div class="clr"></div>
			<div class="MyAccPageOuter">
				<div class="MyAccPageInner">
					<div class="tableListContainer">
				  								<div class="clr"></div>
						<div class="ListContainOuter">
							<table width="100%" class="tableListContainer">
								<tr>	
                                    <th width="30%" align="left" class="ListContainHead"><?php echo $this->_tpl_vars['LANG']['domain_name']; ?>
</th>
                                    <th width="30%" align="left" class="ListContainHead"><?php echo $this->_tpl_vars['LANG']['payment_type']; ?>
</th>
									<th width="30%" align="left" class="ListContainHead"><?php echo $this->_tpl_vars['LANG']['user_amount']; ?>
</th>				
									<th width="30%" align="center" class="ListContainHead"><?php echo $this->_tpl_vars['LANG']['user_date']; ?>
</th>
                                                                       
								</tr>
								<?php unset($this->_sections['listing']);
$this->_sections['listing']['name'] = 'listing';
$this->_sections['listing']['loop'] = is_array($_loop=($this->_tpl_vars['transactiondetails'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['listing']['show'] = true;
$this->_sections['listing']['max'] = $this->_sections['listing']['loop'];
$this->_sections['listing']['step'] = 1;
$this->_sections['listing']['start'] = $this->_sections['listing']['step'] > 0 ? 0 : $this->_sections['listing']['loop']-1;
if ($this->_sections['listing']['show']) {
    $this->_sections['listing']['total'] = $this->_sections['listing']['loop'];
    if ($this->_sections['listing']['total'] == 0)
        $this->_sections['listing']['show'] = false;
} else
    $this->_sections['listing']['total'] = 0;
if ($this->_sections['listing']['show']):

            for ($this->_sections['listing']['index'] = $this->_sections['listing']['start'], $this->_sections['listing']['iteration'] = 1;
                 $this->_sections['listing']['iteration'] <= $this->_sections['listing']['total'];
                 $this->_sections['listing']['index'] += $this->_sections['listing']['step'], $this->_sections['listing']['iteration']++):
$this->_sections['listing']['rownum'] = $this->_sections['listing']['iteration'];
$this->_sections['listing']['index_prev'] = $this->_sections['listing']['index'] - $this->_sections['listing']['step'];
$this->_sections['listing']['index_next'] = $this->_sections['listing']['index'] + $this->_sections['listing']['step'];
$this->_sections['listing']['first']      = ($this->_sections['listing']['iteration'] == 1);
$this->_sections['listing']['last']       = ($this->_sections['listing']['iteration'] == $this->_sections['listing']['total']);
?>
								<?php $this->assign('trvar', $this->_sections['listing']['rownum']); ?>
									<tr>
                                        <td align="left" class="listCont"><a href="<?php echo $this->_tpl_vars['objCommon']->getDomainNames($this->_tpl_vars['transactiondetails'][$this->_sections['listing']['index']]['domain_id']); ?>
"target="_blank"><?php echo $this->_tpl_vars['objCommon']->getDomainNames($this->_tpl_vars['transactiondetails'][$this->_sections['listing']['index']]['domain_id']); ?>
</a></td>
                                        <td align="left" class="listCont"><?php echo $this->_tpl_vars['transactiondetails'][$this->_sections['listing']['index']]['payment_types']; ?>
</td>
										<td align="left" class="listCont">TR <?php echo ((is_array($_tmp=$this->_tpl_vars['transactiondetails'][$this->_sections['listing']['index']]['payment_gross'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
/<?php echo $this->_tpl_vars['LANG']['year']; ?>
</td>
										<td align="left" class="listCont"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['transactiondetails'][$this->_sections['listing']['index']]['payment_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%b %d, %Y') : smarty_modifier_date_format($_tmp, '%b %d, %Y')))) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</td>
                                                 
									</tr> 
								<?php endfor; else: ?>
									<tr><td colspan="10" align="center" class="noRec"><?php echo $this->_tpl_vars['LANG']['admin_norecords']; ?>
</td></tr>
								<?php endif; ?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>