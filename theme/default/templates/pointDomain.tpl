{*if $smarty.get.msg}
	<div id="errormsg" class="successmsg">{$LANG.domain_added_sucess}</div>
{/if*}
<h2>Please enter the doamin name you have purchased from another register</h2>
<div class="pointDomain">
	{if $pointdomaindetails|@count gt 0}                            
		<div class="marTop10 currentDomainOuter"> 
			<div class="currentDomainHead">{$LANG.admin_current_point_dom}</div>
			<div class="currentDomainList">
				{$pointdomaindetails.0.point_domain}
				<span class="currentDomainListClose" onclick="deletePointDomain({$pointdomaindetails.0.point_id},{$pointdomaindetails.0.domain_id})">Delete</span>
			</div>
		</div>
	{else}
		{*<form name="domain"  method="post" onsubmit="return validateNewDomain(); "> *}
			<div class="subdomainRight bgNongRight marTop20">
				<input type="hidden" name="domain_id" id="domain_id" value="{$smarty.get.domain_id}">
				<input type="text"  id="edit_point_domain_name" name="edit_point_domain_name" class="textAreaBoxInputs" value="{if $domainval.0.domain_type eq 'PD'}{$domainval.0.subdomainurl}{/if}" placeholder="">
				<input type="button" class="vpb_button" value="Assign" onclick="AddSubDomainInSettings();" >                
			</div>
            <div id="err_msg"></div>
	{*	</form>  *}
	{/if}    
</div>

<div class="domainChangeTwo pointdomainpopup">
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
					<input type="button" class="subdomainInput" value="{$LANG.domain_continue}" onclick="redirectnew();"/>
				</div>
			</div>            
		</div>
	</div>
</div>