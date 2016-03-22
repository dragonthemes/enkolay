<div class="clearfix">
	<div id="errormsg"></div>
	<div id="sucessmsg"></div>
	
	<div id="subdomain" style="display:block">
		<div class="subdomainLeft">{$LANG.main_site_address}</div>
		<div class="subdomainRight clearfix">
			<!--{$settingpage.0.subdomainurl}-->
			<div id="subdomainform">
				<form name="form_subdoamin" id="form_subdoamin" class="no-mar" method="post" action="">
					<div class="subdomainformLeft">
						<input class="PageMainRightTxtBx" type="text" name="subdomain_url" id="subdomain_url" value="{$settingpage.0.subdomainurl}" readonly >
					</div>
					<div class="subdomainformRight marTop10">
                        {if $settingpage.0.payment_status eq 'Yes'}
						    <a name="save" id="save" class="btn btn-primary" onclick="return showSettSubDom('{$smarty.session.domain_id}');">{$LANG.main_change}</a>
                        {else}
                            <a class="upgradeButton" href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription/{$smarty.session.domain_id}{else}subscription.php?domain_id={$smarty.session.domain_id}{/if}"><i class="fa fa-globe"></i><span class="text">{$LANG.user_buy_btn}</span></a>{$LANG.user_buy_text}

                        {/if}
					</div>
				</form>
			</div>
		</div>		
	</div>
</div>
<div id="maska" style="display:none;"></div>