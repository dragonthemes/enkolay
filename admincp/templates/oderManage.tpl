<div class="Heading">{$LANG.domain_name} <a class="backButt pull-right" href="orderManage.php"><i class="fa fa-backward"></i> {$LANG.admin_back}</a></div>
<div class="ContBody clearfix">
	 <div class="row-fluid sky-form form-horizontal skyformbgNon">
		<div class="span6">
			{if $totalRecords gt 0}
				<!-- Sort By -->
				<form name="domainmanage" class="no-mar" method="get" action="orderManage.php" />
					Sort By <span class="restManageCol">:</span> <span class="selctTopAlign">
					<label class="select">
							<select class="no-mar" name="sortby" id="sortby" size="1" onchange="document.domainmanage.submit();">
								<option value="">{$LANG.admin_select}</option>
								<optgroup label="Status">
									<option value="Ordered" {if $smarty.request.sortby eq Ordered} selected="selected"{/if}>&nbsp;&nbsp;Ordered</option>
									<option value="Shipped" {if $smarty.request.sortby eq Shipped} selected="selected"{/if}>&nbsp;&nbsp;Shipped</option>
                                    <option value="Refund" {if $smarty.request.sortby eq Refund} selected="selected"{/if}>&nbsp;&nbsp;Refund</option>
									<option value="cancel" {if $smarty.request.sortby eq deactive} cancel="selected"{/if}>&nbsp;&nbsp;cancel</option>
								</optgroup>
								<optgroup label="Others">
									<option value="tasc" {if $smarty.request.sortby eq 'tasc'}selected="selected"{/if}>&nbsp;&nbsp;Product Name A to Z</option>
									<option value="tdesc" {if $smarty.request.sortby eq 'tdesc'}selected="selected"{/if}>&nbsp;&nbsp;Product Name Z to A</option>
				 			    </optgroup>	
								 			
							</select>
							<i></i>
						</label>
					</span>
				</form>
			{/if}
		</div>
		<!--Button Left start-->
		<div class="span6">
			{if $totalRecords gt 0}	
			<!--Filter-->
			<div class="processButton" id="searchkey">
				<form name="filterform" method="post" class="no-mar pull-left" onsubmit="return filterValidation();">
					<input type="hidden" name="action"  value="filterProcess" />
					
					{$LANG.admin_keyword}:
					<input type="text" name="keyword" id="keyword" value="{$smarty.request.keyword}" class="no-mar" placeholder="Amount">
					<input type="submit" name="filter" value="Filter" class="btn btn-success">
					<input type="button" name="clear" value="Clear" class="btn btn-danger" id="clear" onclick="return clearFilterTxtBox();">		 
				</form>
					 
			</div>
			
			{/if}
			
		</div>
		<!--Button Left End-->
	</div>
	
	<!--Pagination Start-->
	<div class="pageContTop sky-form form-horizontal skyformbgNon">
		<ul class="page">
			<li>{$fromRecords} to {$toRecords} of {$totalRecords}</li>
			<li class="pages">{$LANG.admin_show}</li>
			<li class="pages">
				<label class="select">
					<select class="pageSelectbox" onchange="showPerPage(this.value,'{$smarty.get.keyword}','{$smarty.get.sortby}');" >
						<option value="5" {if $limit eq '5'}selected="selected"{/if}>5</option>
						<option value="10" {if $limit eq '10'}selected="selected"{/if}>10</option>
						<option value="15" {if $limit eq '15'}selected="selected"{/if}>15</option>
						<option value="20" {if $limit eq '20'}selected="selected"{/if}>20</option>
						<option value="25" {if $limit eq '25'}selected="selected"{/if}>25</option>
						<option value="30" {if $limit eq '30'}selected="selected"{/if}>30</option>
						<option value="50" {if $limit eq '50'}selected="selected"{/if}>50</option>
						<option value="100" {if $limit eq '100'}selected="selected"{/if}>100</option>
					</select>
					<i></i>
				</label>
			</li>
			<li class="pages">{$LANG.admin_per_page}
</li>	
		</ul>
		<!--Button Right start-->
		<span class="pull-right">
			
			<input type="button" class="manageButton but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','property');" />
		{*	<input type="button" class="manageButton send_mail" value="Send Mail" style="display:none;" onclick="sendMailToUsers('1','mail_status','{$whereField}','{$tablename}','{$word}','user');" />*}
		</span>
		<!--Button List End-->
	</div>
	<!--Error Msg-->
	<span id="errormsg"></span>
	<!--Page Navigation-->
	<div class="paginationCont">
		{$pagination}
	</div>
	
	<!--Pagination End-->
	<!--List Start-->
	<div class="tableListContainer">
		<table width="100%" border="0" class="tableListContent">
			<tr class="listHeader leftNavblueBg">
				<td width="3%" align="center" class="listHeaderCont"><input type="checkbox" id="selectall" onclick="selectDeselectAll();" /></td>
				<td width="7%" align="center" class="listHeaderCont">{$LANG.admin_sno}</td>
				
			 {*	<td width="15%" align="center" class="listHeaderCont">{$LANG.product_name}</td> *}
                <td width="15%" align="center" class="listHeaderCont">{$LANG.domain_name}</td>
				<td width="15%" align="center" class="listHeaderCont">{$LANG.amount}</td>
				<td width="15%" align="center" class="listHeaderCont">{$LANG.payer_email }</td>
                <td width="15%" align="center" class="listHeaderCont">{$LANG.reciever_email  }</td>
                <td width="15%" align="center" class="listHeaderCont">{$LANG.status }</td>
			</tr>
			{section name="listing" loop="$orderlist"}
			{assign var="trvar" value=$smarty.section.listing.rownum}
			<tr {if $trvar is even}class="listLightGray"{/if} id="deletecate{$orderlist[listing].order_id}">
				<td align="center" class="listCont"><input type="checkbox" class="case" value="{$orderlist[listing].order_id}" onclick="return individualSelect();" />
				</td>
				<td align="center" class="listCont">{$orderlist[listing].sno}</td>
			{*	<td align="center" class="listCont">{$objCommon->getProductname($orderlist[listing].product_id)}</td> *}
				<td align="center" class="listCont">{$objAdminMgmt->getDomain($orderlist[listing].domain_id)}</td>
                <td align="center" class="listCont">{$orderlist[listing].grand_total}</td>
                <td align="center" class="listCont">{$orderlist[listing].payer_email}</td>
                <td align="center" class="listCont">{$orderlist[listing].receiver_mail}</td>
				<td align="center" class="listCont">{$orderlist[listing].order_status}</td>
				<!--Status-->
			
			</tr>
			{sectionelse}
			<tr><td colspan="10" align="center" class="noRec">{$LANG.admin_norecords}</td></tr>
			{/section}
		</table>
	</div>
	<!--List End-->
	<!--Pagination start-->
	<div class="paginationCont">
		{$pagination}
	</div>
	<div class="pageContBott sky-form form-horizontal skyformbgNon">
		<ul class="page">
			<li>{$fromRecords} to {$toRecords} of {$totalRecords}</li>
			<li class="pages">{$LANG.admin_show}</li>
			<li class="pages">
				<label class="select">
					<select class="pageSelectbox" onchange="showPerPage(this.value,'{$smarty.get.keyword}','{$smarty.get.sortby}');" >
						<option value="5" {if $limit eq '5'}selected="selected"{/if}>5</option>
						<option value="10" {if $limit eq '10'}selected="selected"{/if}>10</option>
						<option value="15" {if $limit eq '15'}selected="selected"{/if}>15</option>
						<option value="20" {if $limit eq '20'}selected="selected"{/if}>20</option>
						<option value="25" {if $limit eq '25'}selected="selected"{/if}>25</option>
						<option value="30" {if $limit eq '30'}selected="selected"{/if}>30</option>
						<option value="50" {if $limit eq '50'}selected="selected"{/if}>50</option>
						<option value="100" {if $limit eq '100'}selected="selected"{/if}>100</option>
					</select>
					<i></i>
				</label>
			</li>
			<li class="pages">{$LANG.admin_per_page}
</li>	
		</ul>
		<!--Button List start-->
			<div class="pull-right">
				
				<input type="button" class="manageButton but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','user');" />
				 
			</div>
		<!--Button List End-->
	</div>
</div>