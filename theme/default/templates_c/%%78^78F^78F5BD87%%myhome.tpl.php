<?php /* Smarty version 2.6.3, created on 2015-12-09 13:41:54
         compiled from myhome.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'myhome.tpl', 12, false),array('modifier', 'date_format', 'myhome.tpl', 28, false),array('modifier', 'utf8_encode', 'myhome.tpl', 28, false),)), $this); ?>
<div class="row-fluid">
	<div class="marTop20">
		<div class="container marTop20">
			<div class="HeadingUser">Alan Adı Detayları</div>
			<div class="clr"></div>
		 	    <?php if ($_GET['msg']): ?>
					<div id="errormsg" class="successmsg"><?php echo $this->_tpl_vars['LANG']['subscription_payment_done']; ?>
</div>
				<?php endif; ?>
                <?php if (isset ( $this->_tpl_vars['home_suc_msg'] ) && $this->_tpl_vars['home_suc_msg'] != ''): ?><div  class="successmsg"><?php echo $this->_tpl_vars['home_suc_msg']; ?>
</div><?php endif; ?>
				<?php if ($_GET['domain_id']): ?>
					<div class="pointTab">                        
                        <?php if (count($this->_tpl_vars['domaindetails']) > 0): ?>
                            <div class="pointTabHead active no-mar">
                                <div class="row-fluid marTop20">
                                	<span class="HeadingUser">
                                    	Satın Alınan Ad: <a href="http://<?php echo $this->_tpl_vars['domaindetails']['0']['domain_name']; ?>
" target="_blank">http://<?php echo $this->_tpl_vars['domaindetails']['0']['domain_name']; ?>
</a>
									</span>                                        
								</div>     
                                <div class="row-fluid">                               
                                    <span class="span3">Otomatik Yenileme</span><span class="pull-left">:</span>
                                    <span class="span8 gray">
                                    	<?php if ($this->_tpl_vars['domaindetails']['0']['autoRenew'] == 'On'): ?>Açık<?php else:  echo $this->_tpl_vars['domaindetails']['0']['autoRenew'];  endif; ?>
									</span>
								</div>
                                <div class="row-fluid">                                    
                                    <span class="span3">Bitiş Tarihi</span><span class="pull-left">:</span>
                                    <span class="span8 gray">
                                    	<span class="red"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['domaindetails']['0']['expiryDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%b %d, %Y') : smarty_modifier_date_format($_tmp, '%b %d, %Y')))) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</span>
									</span>
								</div>
                                <div class="row-fluid">                                    
                                	<span class="span3">DNS Sunucusu</span><span class="pull-left">:</span>
                                    <span class="span8 gray">
                                    	<div class=""><?php echo $this->_tpl_vars['ns_1']; ?>
</div>
                                        <div class=""><?php echo $this->_tpl_vars['ns_1']; ?>
</div>
									</span>                                        
								</div>                                    
                            </div>
                        <?php else: ?>                        
						<div class="pointTabHead active no-mar">
							<label class="no-mar"><input type="radio" name="domain_process" id="newdomain" class="pointdomainRadio" value="newdomain" checked="checked" onclick="return divShowForDomainProcess('new_domain_show','point_domain_show');"/> <?php echo $this->_tpl_vars['LANG']['admin_new_domain']; ?>
 <span class="downArrow"></span></label>
						</div>
						<div class="pointTabCont clearfix" id="new_domain_show">
							<?php echo '<script type="text/javascript" src="';  echo $this->_tpl_vars['SITE_JS_URL'];  echo '/domainProcess.js"></script>'; ?>

							<h2> Yeni Alan Adi Satin Al</h2>
							<div id="vpb_search_status" class="clearfix"></div>
							<div class="subdomainRight bgNongRight marTop20">
								<input type="text" autocomplete="off" class="textAreaBoxInputs" id="suggested_names" name="suggested_names" placeholder="Ex: xxxx.xxx"/> 
								<input type="hidden" id="domain_id" value="<?php echo $_GET['domain_id']; ?>
"/> 				
								<a class="vpb_button" onclick="vpb_check_this_domain();">Kontrol</a>                             
							</div>                            
						</div>
                        <?php endif; ?>
                        <?php if (count($this->_tpl_vars['domaindetails']) == 0): ?>
    						<div class="pointTabHead active">
    							<label class="no-mar"><input type="radio" class="pointdomainRadio" name="domain_process" id="edit_point_domain" <?php if ($this->_tpl_vars['domainval']['0']['domain_type'] == 'PD'): ?>checked="checked"<?php endif; ?> value="pointdomain" onclick="return divShowForDomainProcess('point_domain_show','new_domain_show');"/>Your Own Doamin <span class="downArrow"></span></label>
    						</div>
    						<div class="pointTabCont clearfix" id="point_domain_show">
    							<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pointDomain.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    						</div> 
                        <?php endif; ?>
					</div>
				<?php endif; ?>
				<?php if (! $_GET['domain_id']): ?>
				<div class="myAccTab ListContainOuter">
					<div class="myAccTabHead active no-mar"><?php echo $this->_tpl_vars['LANG']['admin_new_domain']; ?>
<span class="downArrow"></span></div>
					<div class="myAccTabCont">
						<table cellspacing="0" cellpadding="0" class="tableListContainer">
							<thead>
								<tr>
									<th class="ListContainHead" width="10%"><?php echo $this->_tpl_vars['LANG']['myhome_s_no']; ?>
</th>
									<th class="ListContainHead" width="25%"><?php echo $this->_tpl_vars['LANG']['domain_name']; ?>
</th>
									<th class="ListContainHead" width="26%"><?php echo $this->_tpl_vars['LANG']['subdomain_name']; ?>
</th>
									<th class="ListContainHead" width="13%"><?php echo $this->_tpl_vars['LANG']['domain_status']; ?>
</th>
									<th class="ListContainHead" width="17%"><?php echo $this->_tpl_vars['LANG']['added_date']; ?>
</th>
									<th class="ListContainHead" width="15%"><?php echo $this->_tpl_vars['LANG']['delete_action']; ?>
</th>									
								</tr>								
							</thead>
							<tbody>	
								<?php unset($this->_sections['domaindet']);
$this->_sections['domaindet']['name'] = 'domaindet';
$this->_sections['domaindet']['loop'] = is_array($_loop=($this->_tpl_vars['domaindetails'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['domaindet']['show'] = true;
$this->_sections['domaindet']['max'] = $this->_sections['domaindet']['loop'];
$this->_sections['domaindet']['step'] = 1;
$this->_sections['domaindet']['start'] = $this->_sections['domaindet']['step'] > 0 ? 0 : $this->_sections['domaindet']['loop']-1;
if ($this->_sections['domaindet']['show']) {
    $this->_sections['domaindet']['total'] = $this->_sections['domaindet']['loop'];
    if ($this->_sections['domaindet']['total'] == 0)
        $this->_sections['domaindet']['show'] = false;
} else
    $this->_sections['domaindet']['total'] = 0;
if ($this->_sections['domaindet']['show']):

            for ($this->_sections['domaindet']['index'] = $this->_sections['domaindet']['start'], $this->_sections['domaindet']['iteration'] = 1;
                 $this->_sections['domaindet']['iteration'] <= $this->_sections['domaindet']['total'];
                 $this->_sections['domaindet']['index'] += $this->_sections['domaindet']['step'], $this->_sections['domaindet']['iteration']++):
$this->_sections['domaindet']['rownum'] = $this->_sections['domaindet']['iteration'];
$this->_sections['domaindet']['index_prev'] = $this->_sections['domaindet']['index'] - $this->_sections['domaindet']['step'];
$this->_sections['domaindet']['index_next'] = $this->_sections['domaindet']['index'] + $this->_sections['domaindet']['step'];
$this->_sections['domaindet']['first']      = ($this->_sections['domaindet']['iteration'] == 1);
$this->_sections['domaindet']['last']       = ($this->_sections['domaindet']['iteration'] == $this->_sections['domaindet']['total']);
?>
									<tr>
										<td class="listCont"><?php echo $this->_sections['domaindet']['index']+1; ?>
</td>
										<td class="listCont"><?php echo $this->_tpl_vars['domaindetails'][$this->_sections['domaindet']['index']]['domain_name']; ?>
</td>
										<td class="listCont"><?php echo $this->_tpl_vars['objCommon']->getSubdomainName($this->_tpl_vars['domaindetails'][$this->_sections['domaindet']['index']]['domain_id']); ?>
</td>
										<td class="listCont"><?php echo $this->_tpl_vars['domaindetails'][$this->_sections['domaindet']['index']]['status']; ?>
</td>
										<td class="listCont"><?php echo $this->_tpl_vars['domaindetails'][$this->_sections['domaindet']['index']]['addeddate']; ?>
</td>
										<td class="listCont" onclick="deleteNewDomain(<?php echo $this->_tpl_vars['domaindetails'][$this->_sections['domaindet']['index']]['newdomainid']; ?>
,<?php echo $this->_tpl_vars['domaindetails'][$this->_sections['domaindet']['index']]['domain_id']; ?>
)">XX</td>
									</tr>
								<?php endfor; else: ?>
									<tr>
										<td class="listCont" colspan="5">
											<div class="noRec dc"><?php echo $this->_tpl_vars['LANG']['no_records']; ?>
</div>
										</td>
									</tr>
								<?php endif; ?>							
							</tbody>
						</table>
					</div>
								
				</div>				
			<?php endif; ?>
		</div>
	</div>
</div>
<?php if ($_GET['msg']):  echo '
<script>
//alert("hi")
	setTimeout("hideSuccess(\'errormsg\')", 2000);
 	function hideSuccess(id1)
			{
		 		$(\'#\'+id1).hide();
		 	}
</script>
'; ?>

<?php endif;  echo '
	<script type="text/javascript">
		$(".pointTab .pointTabHead").click(function(){
			$(".pointTab .pointTabHead").removeClass("active");
			$(this).addClass("active");			
		});
		$(".myAccTab .myAccTabHead").click(function(){
			$(".myAccTab .myAccTabHead").removeClass("active");
			$(this).addClass("active");			
		});
	</script>
'; ?>