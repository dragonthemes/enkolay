<?php /* Smarty version 2.6.3, created on 2015-12-09 11:28:34
         compiled from subdomain.tpl */ ?>
<div class="clearfix">
	<div id="errormsg"></div>
	<div id="sucessmsg"></div>
	
	<div id="subdomain" style="display:block">
		<div class="subdomainLeft"><?php echo $this->_tpl_vars['LANG']['main_site_address']; ?>
</div>
		<div class="subdomainRight clearfix">
			<!--<?php echo $this->_tpl_vars['settingpage']['0']['subdomainurl']; ?>
-->
			<div id="subdomainform">
				<form name="form_subdoamin" id="form_subdoamin" class="no-mar" method="post" action="">
					<div class="subdomainformLeft">
						<input class="PageMainRightTxtBx" type="text" name="subdomain_url" id="subdomain_url" value="<?php echo $this->_tpl_vars['settingpage']['0']['subdomainurl']; ?>
" readonly >
					</div>
					<div class="subdomainformRight marTop10">
                        <?php if ($this->_tpl_vars['settingpage']['0']['payment_status'] == 'Yes'): ?>
						    <a name="save" id="save" class="btn btn-primary" onclick="return showSettSubDom('<?php echo $_SESSION['domain_id']; ?>
');"><?php echo $this->_tpl_vars['LANG']['main_change']; ?>
</a>
                        <?php else: ?>
                            <a class="upgradeButton" href="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/<?php if ($this->_tpl_vars['USERFRIENDLY'] == 'Y'): ?>subscription/<?php echo $_SESSION['domain_id'];  else: ?>subscription.php?domain_id=<?php echo $_SESSION['domain_id'];  endif; ?>"><i class="fa fa-globe"></i><span class="text"><?php echo $this->_tpl_vars['LANG']['user_buy_btn']; ?>
</span></a><?php echo $this->_tpl_vars['LANG']['user_buy_text']; ?>


                        <?php endif; ?>
					</div>
				</form>
			</div>
		</div>		
	</div>
</div>
<div id="maska" style="display:none;"></div>