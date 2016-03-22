<div id="modals">
	<div id="settingPop" class="all_popup">
      <div class="domainChangeOne">
		<!--<div class="deleteHead">
			{$LANG.domain_change}
			<div class="close PopDeleteButt" data-dismiss="modal"></div>
		</div>-->
		<div class="domainOuterHead">
			<img src="{$SITE_BASEURL}/images/Www.png" alt="domain" title="domain" />
			<div>Choose Your Website Domain</div>
		</div>
		<div class="chooseDomainPop">
			<div id="err_msg"></div>
			<div id="suc_msg"></div>
			<div class="notify clearfix"> <img src="{$SITE_BASEURL}/images/notification.png" alt="notification" title="notification" /> <span>{$LANG.main_chose_reverse}</span></div>
			<!--<div class="settPopTopHead">{$LANG.main_chose_reverse}</div>-->
			<!--<div class="settPopBottHead">{$LANG.main_choose_subdomain}</div>		
				<div class="subdomainLeft">{$LANG.main_website_started}</div>-->
			 
				<div class="subdomainRight clearfix">
					<div class="chooseDomainInner">
						<div id="sitedescrip">
							<div class="chooseDomainInnerBg">
								<form class="chooseDomainInnerForm" id="site_description" name="site_description" method="post">
									<input type='hidden' id="domain_id" name="domain_id" value="{$smarty.session.domain_id}"/>
									<div class="chooseDomainSubdomain">
										<div class="chooseDomainSubdomainTop">Use a Subdomain of {$SITE_MAIN_DOMAIN}</div>
										<div class="chooseDomainSubdomainBott">A great way to get your website started</div>
										<input type="radio" name="domain" id="edit_sub_domain" style="display:none;"/>{$LANG.main_http} <input type="text" class="popsettTxtBx" id="domain" name="domain"  value="" onkeyup="checkDomainValidationInPopup();"/>{$SITE_MAIN_DOMAIN}
									</div>
								{*	<div class="chooseDomainAlreaydomain">
										<div class="chooseDomainSubdomainTop">Connect a Domain You Already Own</div>
										<div class="chooseDomainSubdomainBott">Choose a plan and connect your domain in the next step</div>
										<input type="radio" name="domain" id="edit_point_domain" />{$LANG.main_http}www. <input type="text" id="edit_point_domain_name" name="edit_point_domain_name"  value="" placeholder="" />
									</div>
								    <script type="text/javascript" src="{$SITE_JS_URL}/newdomain.js"></script>
									<div class="chooseDomainAlreaydomain">
											<div class="chooseDomainSubdomainTop">Register a New Domain</div>
											<div class="chooseDomainSubdomainBott">For a more professional online presence</div>
											<div id="vpb_search_status"></div>
											<input type="radio"  name="domain" id="edit_new_domain" />{$LANG.main_http}www. <input type="text" id="edit_new_domain_name" name="edit_new_domain_name" autocomplete="off" value="" placeholder="Ex:xxxx"/>
											<a class="vpb_button" onclick="vpb_check_this_domain();">check</a>
									</div> *}
									<div class="clearfix marTop15">
										<input type="button" class="saveButtonClose flt_none"  value="Close" onclick="$('#showSubdomainChangeInSettings').hide();$('#maska').hide();"/>
										<input type="button" class="saveButtonInput" name="setting_domain_submit" id="setting_domain_submit" value="{$LANG.main_continue}" onclick="AddSubDomainInSettings();" />									
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
				<img src="{$SITE_BASEURL}/images/Www.png" alt="domain" title="domain" />
				<div>Choose Your Website Domain</div>
			</div>
			<div class="clearfix">
					<div class="chooseDomainPop">
						<div class="chooseDomainInner chooseDomainInnerSec">
							<div class="para">To set up your domain with {$SITE_MAIN_DOMAIN}, your domain's DNS settings need to be updated.</div>
							<div class="option"><b>Option A:</b> Email instructions to your domain registrar</div>
							<div class="inst">Send these instructions to your domain registrar (ex. GoDaddy, 1and1, Yahoo, etc.)</div>
							<div class="chooseDomainPopTxtarea">
								<p>Hello, I have purchased my domain <span id="youdomainurl_set"></span>.  I have built my website on {$SITE_MAIN_DOMAIN}.  I need you to point my domain to the following IP: {$smarty.server.SERVER_ADDR}</p>								
								<p>This is done by changing my domain's A-Records. I am not requesting that you transfer my domain, redirect my domain, or change my name servers.  I want to remain with you as my domain registrar.</p>
							</div>
							<div class="option"><b>Option B:</b> Make the DNS changes yourself see instructions </div>
							<div class="para">Once the DNS changes are made, it may take up to 48 hours (although usually less) for the changes to propagate through the Internet</div>
							<div class="dc">
								<input type="button" class="subdomainInput" value="{$LANG.main_continue}" onclick="redirectnew();"/>
							</div>
						</div>            
					</div>
				</div>
		</div>
	</div>
</div>