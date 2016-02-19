<div class="row-fluid userHomeOuter">
	<div class="marTop20">
		<div class="container" id="container">
			<div class="HeadingUser">{$LANG.user_mysite} <a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}onboarding{else}onboarding.php{/if}" class="rightbutton" name="add" id="add"><i class="fa fa-plus-square-o"></i> {$LANG.user_addsite}</a></div>
			<div class="clr"></div>
			<div id="MyAccPageInner" class="ListContainOuter">	
				{section name=sitedetails loop=$usersiteDetails}
				<div class="ListContainOuterHover">
					<table cellspacing="0" cellpadding="0" class="tableListContainer">
						<thead>
							<tr>
								<th class="ListContainHead" width="100">Şablon</th>
								<th class="ListContainHead" width="400">Site Başlığı</th>
								<th class="ListContainHead" width="400">Site Adresi</th>
							</tr>								
						</thead>
						<tbody>	
							<tr>
								<td rowspan="2"><img src="{if $usersiteDetails[sitedetails].theme_id}{$SITE_IMAGE_BANNER_URL}{elseif $usersiteDetails[sitedetails].blog_id}{$SITE_IMAGE_BLOG_URL}{else}{$SITE_IMAGE_STORE_URL}{/if}/{$usersiteDetails[sitedetails].theme_image}"  width="100%" height="120"/></td>
								<td class="borNone"><h4 class="ListContainTitle">{if $usersiteDetails[sitedetails].site_title}{$usersiteDetails[sitedetails].site_title}{else}{$LANG.user_home_my_title}{/if}</h4></td>
                                
								<td class="borNone"><div>{$LANG.validtodate} : {if $smarty.now lte $usersiteDetails[sitedetails].validtodate}{$usersiteDetails[sitedetails].validtodate|date_format:'%b %d, %Y'|utf8_encode}{else}{$usersiteDetails[sitedetails].expire_grace_period|date_format:'%b %d, %Y'|utf8_encode}{/if}</div><a class="ListContainUrl" href="{$usersiteDetails[sitedetails].subdomainurl}" target="_blank">{$usersiteDetails[sitedetails].subdomainurl}</a>
                                {if $usersiteDetails[sitedetails].original_remain_days gt 0 or $usersiteDetails[sitedetails].grace_remain_days gt 0}
                                    <div>Kalan Gün : {if $smarty.now lte $usersiteDetails[sitedetails].validtodate}{$usersiteDetails[sitedetails].original_remain_days}{else}{$usersiteDetails[sitedetails].grace_remain_days}{/if}</div>
                                {/if}
                                </td>                                  
							</tr>
							<tr>
								<td class="ListContainActionsec" colspan="2">
									{$objCommon->getSubsCripDetailsFordomain($usersiteDetails[sitedetails].domain_id)}
                                    
									<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription/{$usersiteDetails[sitedetails].domain_id}/invoice{else}subscription.php?domain_id={$usersiteDetails[sitedetails].domain_id}&inv=invoice{/if}">{if ( $usersiteDetails[sitedetails].payment_status eq 'Yes' && $usersiteDetails[sitedetails].original_remain_days lt 30 ) or $usersiteDetails[sitedetails].payment_status eq 'No'}<i class="fa fa-globe"></i><span class="text"> {if $usersiteDetails[sitedetails].payment_status eq 'Yes' && $usersiteDetails[sitedetails].original_remain_days lt 30} {$LANG.user_upgracde_btn}{else}{$LANG.user_buy_btn}{/if}</span>{/if}</a>
                                    
                                    {if $usersiteDetails[sitedetails].payment_status eq 'Yes'}
									   <a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}myhome/{$usersiteDetails[sitedetails].domain_id}{else}MyHome.php?domain_id={$usersiteDetails[sitedetails].domain_id}{/if}"><i class="fa fa-globe"></i> <span>{$LANG.add_point_domains}</span></a>
                                    {/if}
									{if $usersiteDetails[sitedetails].theme_id}
										<a onclick="SettingFunction('{$usersiteDetails[sitedetails].domain_id}','{$usersiteDetails[sitedetails].theme_id}');">
											<i class="fa fa-edit"></i>
											<span class="text">{$LANG.user_site_edit}</span>
										</a>
									{elseif $usersiteDetails[sitedetails].blog_id}
										<a onclick="SettingFunctionForBlog('{$usersiteDetails[sitedetails].domain_id}','{$usersiteDetails[sitedetails].blog_id}');">
											<i class="fa fa-edit"></i>
											<span class="text">{$LANG.user_blog_edit}</span>
										</a>
									{else}
										<a onclick="SettingFunctionForStore('{$usersiteDetails[sitedetails].domain_id}','{$usersiteDetails[sitedetails].store_id}');">
											<i class="fa fa-edit"></i>
											<span class="text">{$LANG.user_store_edit}</span>
										</a>
									{/if}
									<!--<a class="s-btn light" onclick="openOptions('{$usersiteDetails[sitedetails].domain_id}');">{$LANG.user_more} <i class="fa fa-caret-down"></i></a>	-->
									{if $usersiteDetails[sitedetails].blog_id}
									<a onclick="ShowCommentBlock('{$usersiteDetails[sitedetails].domain_id}','{$usersiteDetails[sitedetails].theme_id}','{$usersiteDetails[sitedetails].blog_id}');"><i class="fa fa-comments"></i> <span>{$LANG.user_blogcomments}</span></a>
									{/if}
									{if !$usersiteDetails[sitedetails].store_id}
										<a onclick="ShowFormBlock('{$usersiteDetails[sitedetails].domain_id}','{$usersiteDetails[sitedetails].theme_id}','{$usersiteDetails[sitedetails].blog_id}');"><i class="fa fa-share"></i> <span>{$LANG.user_form}</span></a>
									{/if}
									
									{if $usersiteDetails[sitedetails].theme_id}
										<a onclick="DeleteSubdomain('{$usersiteDetails[sitedetails].domain_id}','{$usersiteDetails[sitedetails].theme_id}');"><i class="fa fa-trash-o"></i> <span>{$LANG.user_deletesite}</span></a>
									{elseif $usersiteDetails[sitedetails].store_id}
										<a onclick="DeleteSubdomainWithStore('{$usersiteDetails[sitedetails].domain_id}','{$usersiteDetails[sitedetails].store_id}');"><i class="fa fa-trash-o"></i> <span>{$LANG.user_deletesite}</span></a>
									{else}
										<a onclick="DeleteSubdomainWithBlog('{$usersiteDetails[sitedetails].domain_id}','{$usersiteDetails[sitedetails].blog_id}');"><i class="fa fa-trash-o"></i> <span>{$LANG.user_deletesite}</span></a>
									{/if}									
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				{sectionelse}
					 <div class="noRec dc">No Records Found</div>
				{/section}	
			</div>
            <div id="formentries" style="display:none">
								
			</div>
		</div>
	</div>
</div>