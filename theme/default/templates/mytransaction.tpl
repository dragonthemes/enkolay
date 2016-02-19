<div class="row-fluid">
	<div class="marTop20">
		<div class="container">
			<div class="HeadingUser">{$LANG.mytransaction_setting}</div>
			<div class="clr"></div>
			<div class="MyAccPageOuter">
				<div class="MyAccPageInner">
					<div class="tableListContainer">
				  		{*<div class="ramainDays">{$LANG.myaccount_buy_instruct} {$rem_days}</div>*}
						<div class="clr"></div>
						<div class="ListContainOuter">
							<table width="100%" class="tableListContainer">
								<tr>	
                                    <th width="30%" align="left" class="ListContainHead">{$LANG.domain_name}</th>
                                    <th width="30%" align="left" class="ListContainHead">{$LANG.payment_type}</th>
									<th width="30%" align="left" class="ListContainHead">{$LANG.user_amount}</th>				
									<th width="30%" align="center" class="ListContainHead">{$LANG.user_date}</th>
                                   {* <th width="30%" align="center" class="ListContainHead">{$LANG.leftdays}</th>
                                    <th width="30%" align="center" class="ListContainHead">{$LANG.doamin_upgrade}</th> *}
                                    
								</tr>
								{section name="listing" loop="$transactiondetails"}
								{assign var="trvar" value=$smarty.section.listing.rownum}
									<tr>
                                        <td align="left" class="listCont"><a href="{$objCommon->getDomainNames($transactiondetails[listing].domain_id)}"target="_blank">{$objCommon->getDomainNames($transactiondetails[listing].domain_id)}</a></td>
                                        <td align="left" class="listCont">{$transactiondetails[listing].payment_types}</td>
										<td align="left" class="listCont">TR {$transactiondetails[listing].payment_gross|string_format:"%.2f"}/{$LANG.year}</td>
										<td align="left" class="listCont">{$transactiondetails[listing].payment_date|date_format:'%b %d, %Y'|utf8_encode}</td>
                                      {*  <td align="left" class="listCont">
                                            {if $transactiondetails[listing].expire le 0}
                                                {$LANG.upgrade_expired}
                                            {else}  	
                                               {$transactiondetails[listing].expire}
                                             {/if}
                                         </td>
                                         <td align="left" class="listCont">
                                             {if $transactiondetails[listing].expire le 0}
												  <a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}">{$LANG.upgrade_button}</a>
    									      {else}
    										     --
    									      {/if}
										</td>    *}           
									</tr> 
								{sectionelse}
									<tr><td colspan="10" align="center" class="noRec">{$LANG.admin_norecords}</td></tr>
								{/section}
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>