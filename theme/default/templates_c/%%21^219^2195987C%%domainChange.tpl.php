<?php /* Smarty version 2.6.3, created on 2015-12-09 11:28:35
         compiled from domainChange.tpl */ ?>
<div id="modals">
	<div id="settingPop" class="all_popup">
      <div class="domainChangeOne">
		<!--<div class="deleteHead">
			<?php echo $this->_tpl_vars['LANG']['domain_change']; ?>

			<div class="close PopDeleteButt" data-dismiss="modal"></div>
		</div>-->
		<div class="domainOuterHead">
			<img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/Www.png" alt="domain" title="domain" />
			<div>Choose Your Website Domain</div>
		</div>
		<div class="chooseDomainPop">
			<div id="err_msg"></div>
			<div id="suc_msg"></div>
			<div class="notify clearfix"> <img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/notification.png" alt="notification" title="notification" /> <span><?php echo $this->_tpl_vars['LANG']['main_chose_reverse']; ?>
</span></div>
			<!--<div class="settPopTopHead"><?php echo $this->_tpl_vars['LANG']['main_chose_reverse']; ?>
</div>-->
			<!--<div class="settPopBottHead"><?php echo $this->_tpl_vars['LANG']['main_choose_subdomain']; ?>
</div>		
				<div class="subdomainLeft"><?php echo $this->_tpl_vars['LANG']['main_website_started']; ?>
</div>-->
			 
				<div class="subdomainRight clearfix">
					<div class="chooseDomainInner">
						<div id="sitedescrip">
							<div class="chooseDomainInnerBg">
								<form class="chooseDomainInnerForm" id="site_description" name="site_description" method="post">
									<input type='hidden' id="domain_id" name="domain_id" value="<?php echo $_SESSION['domain_id']; ?>
"/>
									<div class="chooseDomainSubdomain">
										<div class="chooseDomainSubdomainTop">Use a Subdomain of <?php echo $this->_tpl_vars['SITE_MAIN_DOMAIN']; ?>
</div>
										<div class="chooseDomainSubdomainBott">A great way to get your website started</div>
										<input type="radio" name="domain" id="edit_sub_domain" style="display:none;"/><?php echo $this->_tpl_vars['LANG']['main_http']; ?>
 <input type="text" class="popsettTxtBx" id="domain" name="domain"  value="" onkeyup="checkDomainValidationInPopup();"/><?php echo $this->_tpl_vars['SITE_MAIN_DOMAIN']; ?>

									</div>
																	<div class="clearfix marTop15">
										<input type="button" class="saveButtonClose flt_none"  value="Close" onclick="$('#showSubdomainChangeInSettings').hide();$('#maska').hide();"/>
										<input type="button" class="saveButtonInput" name="setting_domain_submit" id="setting_domain_submit" value="<?php echo $this->_tpl_vars['LANG']['main_continue']; ?>
" onclick="AddSubDomainInSettings();" />									
									</div>
							   </form>  
						   </div>        
						</div>
					</div>
				</div>					
		</div>
       </div> 
        <div class="domainChangeTwo" style="display:none;">
			<div class="domainOuterHead">
				<img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/Www.png" alt="domain" title="domain" />
				<div>Choose Your Website Domain</div>
			</div>
			<div class="clearfix">
					<div class="chooseDomainPop">
						<div class="chooseDomainInner chooseDomainInnerSec">
							<div class="para">To set up your domain with <?php echo $this->_tpl_vars['SITE_MAIN_DOMAIN']; ?>
, your domain's DNS settings need to be updated.</div>
							<div class="option"><b>Option A:</b> Email instructions to your domain registrar</div>
							<div class="inst">Send these instructions to your domain registrar (ex. GoDaddy, 1and1, Yahoo, etc.)</div>
							<div class="chooseDomainPopTxtarea">
								<p>Hello, I have purchased my domain <span id="youdomainurl_set"></span>.  I have built my website on <?php echo $this->_tpl_vars['SITE_MAIN_DOMAIN']; ?>
.  I need you to point my domain to the following IP: <?php echo $_SERVER['SERVER_ADDR']; ?>
</p>								
								<p>This is done by changing my domain's A-Records. I am not requesting that you transfer my domain, redirect my domain, or change my name servers.  I want to remain with you as my domain registrar.</p>
							</div>
							<div class="option"><b>Option B:</b> Make the DNS changes yourself see instructions </div>
							<div class="para">Once the DNS changes are made, it may take up to 48 hours (although usually less) for the changes to propagate through the Internet</div>
							<div class="dc">
								<input type="button" class="subdomainInput" value="<?php echo $this->_tpl_vars['LANG']['main_continue']; ?>
" onclick="redirectnew();"/>
							</div>
						</div>            
					</div>
				</div>
		</div>
	</div>
</div>