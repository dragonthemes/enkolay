<div class="row-fluid">
	<div class="marTop20">
		<div class="container marTop20">
			<div class="HeadingUser">Alan Adı Detayları</div>
			<div class="clr"></div>
		 	    {if $smarty.get.msg}
					<div id="errormsg" class="successmsg">{$LANG.subscription_payment_done}</div>
				{/if}
                {if isset($home_suc_msg) and $home_suc_msg neq ''}<div  class="successmsg">{$home_suc_msg}</div>{/if}
				{if $smarty.get.domain_id}
					<div class="pointTab">                        
                        {if $domaindetails|@count gt 0}
                            <div class="pointTabHead active no-mar">
                                <div class="row-fluid marTop20">
                                	<span class="HeadingUser">
                                    	Satın Alınan Ad: <a href="http://{$domaindetails.0.domain_name}" target="_blank">http://{$domaindetails.0.domain_name}</a>
									</span>                                        
								</div>     
                                <div class="row-fluid">                               
                                    <span class="span3">Otomatik Yenileme</span><span class="pull-left">:</span>
                                    <span class="span8 gray">
                                    	{if $domaindetails.0.autoRenew eq 'On'}Açık{else}{$domaindetails.0.autoRenew}{/if}
									</span>
								</div>
                                <div class="row-fluid">                                    
                                    <span class="span3">Bitiş Tarihi</span><span class="pull-left">:</span>
                                    <span class="span8 gray">
                                    	<span class="red">{$domaindetails.0.expiryDate|date_format:'%b %d, %Y'|utf8_encode}</span>
									</span>
								</div>
                                <div class="row-fluid">                                    
                                	<span class="span3">DNS Sunucusu</span><span class="pull-left">:</span>
                                    <span class="span8 gray">
                                    	<div class="">{$ns_1}</div>
                                        <div class="">{$ns_1}</div>
									</span>                                        
								</div>                                    
                            </div>
                        {else}                        
						<div class="pointTabHead active no-mar">
							<label class="no-mar"><input type="radio" name="domain_process" id="newdomain" class="pointdomainRadio" value="newdomain" checked="checked" onclick="return divShowForDomainProcess('new_domain_show','point_domain_show');"/> {$LANG.admin_new_domain} <span class="downArrow"></span></label>
						</div>
						<div class="pointTabCont clearfix" id="new_domain_show">
							{literal}<script type="text/javascript" src="{/literal}{$SITE_JS_URL}{literal}/domainProcess.js"></script>{/literal}
							<h2>{*$LANG.domain_purchasename*} Yeni Alan Adi Satin Al</h2>
							<div id="vpb_search_status" class="clearfix"></div>
							<div class="subdomainRight bgNongRight marTop20">
								<input type="text" autocomplete="off" class="textAreaBoxInputs" id="suggested_names" name="suggested_names" placeholder="Ex: xxxx.xxx"/> 
								<input type="hidden" id="domain_id" value="{$smarty.get.domain_id}"/> 				
								<a class="vpb_button" onclick="vpb_check_this_domain();">Kontrol</a>                             
							</div>                            
						</div>
                        {/if}
                        {if $domaindetails|@count eq 0}
    						<div class="pointTabHead active">
    							<label class="no-mar"><input type="radio" class="pointdomainRadio" name="domain_process" id="edit_point_domain" {if $domainval.0.domain_type eq 'PD'}checked="checked"{/if} value="pointdomain" onclick="return divShowForDomainProcess('point_domain_show','new_domain_show');"/>Your Own Doamin <span class="downArrow"></span></label>
    						</div>
    						<div class="pointTabCont clearfix" id="point_domain_show">
    							{include file="pointDomain.tpl"}
    						</div> 
                        {/if}
					</div>
				{/if}
				{if !$smarty.get.domain_id}
				<div class="myAccTab ListContainOuter">
					<div class="myAccTabHead active no-mar">{$LANG.admin_new_domain}<span class="downArrow"></span></div>
					<div class="myAccTabCont">
						<table cellspacing="0" cellpadding="0" class="tableListContainer">
							<thead>
								<tr>
									<th class="ListContainHead" width="10%">{$LANG.myhome_s_no}</th>
									<th class="ListContainHead" width="25%">{$LANG.domain_name}</th>
									<th class="ListContainHead" width="26%">{$LANG.subdomain_name}</th>
									<th class="ListContainHead" width="13%">{$LANG.domain_status}</th>
									<th class="ListContainHead" width="17%">{$LANG.added_date}</th>
									<th class="ListContainHead" width="15%">{$LANG.delete_action}</th>									
								</tr>								
							</thead>
							<tbody>	
								{section name="domaindet" loop="$domaindetails"}
									<tr>
										<td class="listCont">{$smarty.section.domaindet.index+1}</td>
										<td class="listCont">{$domaindetails[domaindet].domain_name}</td>
										<td class="listCont">{$objCommon->getSubdomainName($domaindetails[domaindet].domain_id)}</td>
										<td class="listCont">{$domaindetails[domaindet].status}</td>
										<td class="listCont">{$domaindetails[domaindet].addeddate}</td>
										<td class="listCont" onclick="deleteNewDomain({$domaindetails[domaindet].newdomainid},{$domaindetails[domaindet].domain_id})">XX</td>
									</tr>
								{sectionelse}
									<tr>
										<td class="listCont" colspan="5">
											<div class="noRec dc">{$LANG.no_records}</div>
										</td>
									</tr>
								{/section}							
							</tbody>
						</table>
					</div>
				{*	<div class="myAccTabHead">{$LANG.admin_point_domain}<span class="downArrow"></span></div>
					<div class="myAccTabCont" style="display:none;">
						<div class="pointDomainRec">
							<table cellspacing="0" cellpadding="0" class="tableListContainer">
								<thead>
									<tr>
										<th class="ListContainHead" width="10%">{$LANG.myhome_s_no}</th>
										<th class="ListContainHead" width="25%">{$LANG.domain_name}</th>
										<th class="ListContainHead" width="26%">{$LANG.subdomain_name}</th>
										<th class="ListContainHead" width="13%">{$LANG.domain_status}</th>
										<th class="ListContainHead" width="17%">{$LANG.added_date}</th>
										<th class="ListContainHead" width="15%">{$LANG.delete_action}</th>
									</tr>								
								</thead>
								<tbody>	
									{section name="pointdomaindet" loop="$pointdomaindetails"}
										<tr>
											<td class="listCont">{$smarty.section.pointdomaindet.index+1}</td>
											<td class="listCont">{$pointdomaindetails[pointdomaindet].point_domain}</td>
											<td class="listCont">{$objCommon->getSubdomainName($pointdomaindetails[pointdomaindet].domain_id)}</td>
											<td class="listCont">{$pointdomaindetails[pointdomaindet].status}</td>
											<td class="listCont">{$pointdomaindetails[pointdomaindet].addeddate}</td>
											<td class="listCont" onclick="deletePointDomain({$pointdomaindetails[pointdomaindet].point_id},{$pointdomaindetails[pointdomaindet].domain_id})">XX</td>
										</tr>
									{sectionelse}
										<tr>
											<td class="listCont" colspan="5">
												<div class="noRec dc">{$LANG.no_records}</div>
											</td>
										</tr>
									{/section}							
								</tbody>
							</table>
						</div>	
					</div>	*}				
				</div>				
			{/if}
		</div>
	</div>
</div>
{if $smarty.get.msg}
{literal}
<script>
//alert("hi")
	setTimeout("hideSuccess('errormsg')", 2000);
 	function hideSuccess(id1)
			{
		 		$('#'+id1).hide();
		 	}
</script>
{/literal}
{/if}
{literal}
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
{/literal}