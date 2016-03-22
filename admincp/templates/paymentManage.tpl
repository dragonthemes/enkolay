<div class="rightContHeading Heading">{$LANG.admin_payment_manage}<a class="backButt pull-right" href="paymentManage.php"><i class="fa fa-backward"></i> {$LANG.admin_back}</a></div>
<div class="ContBody clearfix">
	<!--Button Left start-->
{*	<div  class="clearfix">
		{if $totalRecords gt 0}
			<!--Filter-->
			<span class="processButton" id="searchkey">
				<form name="filterform" method="post" onsubmit="return filterValidation();" class="no-mar pull-left">
					<input type="hidden" name="action"  value="filterProcess" />
					
					{$LANG.admin_keyword}:
					<input type="text" name="keyword" id="keyword" value="{$smarty.request.keyword}" class="no-mar">
					<input type="submit" name="filter" value="Filter" class="btn btn-success">
					<input type="button" name="clear" value="Clear" class="btn btn-danger" id="clear" onclick="return clearFilterTxtBox();">		 
				</form>	
			</span>
		{/if}
		<!--Export-->		
		<!--Import-->	 
	</div> *}
	<!--Button Left End-->
 	<!--Error Msg-->
	<span id="errormsg"></span>
	 
	<!--List Start-->
	<div class="tableListContainer">
		<table width="100%" border="0" class="tableListContent">
			<tr class="listHeader leftNavblueBg">
				 <td width="10%" align="center" class="listHeaderCont">{$LANG.admin_action}</td>	
				<td width="10%" align="center" class="listHeaderCont">{$LANG.admin_method}</td>					
			</tr>
		 	<tr {if $trvar is even}class="listLightGray"{/if}>
			 	<td align="center" class="listCont" id="chgstatus{$followers_List[followers].price_id}">
					<span class="EditDeleteButton">
						<a href="paymentEditManage.php?method=paypal" >
							<i class="fa fa-edit"></i>
						</a>
					</span>
				</td>
			 	<td align="center" class="listCont">Paypal</td>
			</tr>
		{*	<tr {if $trvar is even}class="listLightGray"{/if}>
			 	<td align="center" class="listCont" id="chgstatus{$followers_List[followers].price_id}">
					<span class="EditDeleteButton">
						<a href="paymentEditManage.php?method=authorize" >
							<i class="fa fa-edit"></i>
						</a>
					</span>
				</td>
			 	<td align="center" class="listCont">Authorize</td>
			</tr>*}
            
            <tr {if $trvar is even}class="listLightGray"{/if}>
			 	<td align="center" class="listCont" id="chgstatus{$followers_List[followers].price_id}">
					<span class="EditDeleteButton">
						<a href="paymentEditManage.php?method=nestPayment" >
							<i class="fa fa-edit"></i>
						</a>
					</span>
				</td>
			 	<td align="center" class="listCont">Nest Payment</td>
			</tr>                        
		 
		</table>
	</div>
	<!--List End-->
  
</div>