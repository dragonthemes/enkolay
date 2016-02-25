<div class="Heading">{$LANG.admin_user_details} <a class="backButt pull-right" href="userManage.php"><i class="fa fa-backward"></i> {$LANG.admin_back}</a></div>
<div class="ContBody clearfix">
	<div class="row-fluid sky-form form-horizontal skyformbgNon">
		<div class="span6">
			{if $totalRecords gt 0}
				<!-- Sort By -->
				<form name="usermanage" class="no-mar" method="post" action="userManage.php" />
					Sort By <span class="restManageCol">:</span> <span class="selctTopAlign">
					<label class="select">
							<select class="no-mar" name="sortby" id="sortby" size="1" onchange="document.usermanage.submit();">
								<option value="">{$LANG.admin_select}</option>
								<optgroup label="Status">
									<option value="active" {if $smarty.request.sortby eq active} selected="selected"{/if}>&nbsp;&nbsp;Active</option>
									<option value="deactive" {if $smarty.request.sortby eq deactive} selected="selected"{/if}>&nbsp;&nbsp;Deactive</option>
								</optgroup>
								<optgroup label="Others">
									<option value="casc" {if $smarty.request.sortby eq 'casc'}selected="selected"{/if}>&nbsp;&nbsp;Username A to Z</option>
									<option value="cdesc" {if $smarty.request.sortby eq 'cdesc'}selected="selected"{/if}>&nbsp;&nbsp;Username Z to A</option>
						 		 
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
					<input type="text" name="keyword" id="keyword" value="{$smarty.request.keyword}" class="no-mar" placeholder="User Name">
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
			<li class="pages">{$LANG.admin_per_page}</li>	
		</ul>
		<!--Button Right start-->
		<span class="pull-right">
			<!--<a class="manageButton_addnw " href="listingAddEdit.php">Add New</a>-->	
			<input type="button"  class="manageButton but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="manageButton but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" />			
			<input type="button" class="manageButton but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','reguser');" />
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
				<td width="7%" align="center" class="listHeaderCont">{$LANG.user_sno}</td>
				
				<td width="10%" align="left" class="listHeaderCont">
					{if $smarty.get.sortby eq 'tdesc'}
						<a href="{$filename}?sortby=tasc{if $smarty.get.limit neq ''}&limit={$smarty.get.limit}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}">
							{$LANG.admin_username}<img src="images/icon_arrow_down.png" alt="Descending" title="Descending" />
						</a>
					{elseif $smarty.get.sortby eq 'tasc'}
						<a href="{$filename}?sortby=tdesc{if $smarty.get.limit neq ''}&limit={$smarty.get.limit}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}">
								{$LANG.admin_username}<img src="images/icon_arrow_up.png" alt="Ascending" title="Ascending" />
						</a>
					{else}
						<a href="{$filename}?sortby=tasc{if $smarty.get.limit neq ''}&limit={$smarty.get.limit}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}">
								{$LANG.admin_username}<img src="images/icon_arrow_up.png" alt="Ascending" title="Ascending" />
						</a>
					{/if}
				</td>
				
				<td width="15%" align="left" class="listHeaderCont">{$LANG.admin_email}</td>
				<td width="15%" align="left" class="listHeaderCont">{$LANG.user_subdomain}</td>	
                <td width="15%" align="left" class="listHeaderCont">{$LANG.user_themedetails}</td>	
                {*<td width="15%" align="left" class="listHeaderCont">{$LANG.user_storedetails}</td>	*}		
				<td width="25%" align="center" class="listHeaderCont">{$LANG.admin_date}</td>
				<td width="5%" align="center" class="listHeaderCont">{$LANG.status}</td>
				{*<td width="5%" align="center" class="listHeaderCont">{$LANG.admin_action}</td>*}
			</tr>
			{section name="listing" loop="$usermanage"}
			{assign var="trvar" value=$smarty.section.listing.rownum}
			<tr {if $trvar is even}class="listLightGray"{/if} id="deletecate{$usermanage[listing].user_id}">
            
				<td align="center" class="listCont">{if $usermanage[listing].email != 'info@roamsoft.in'}<input type="checkbox" class="case" value="{$usermanage[listing].user_id}" onclick="individualSelect();" />{/if}</td>
                
            
				<td align="center" class="listCont">{$smarty.section.listing.index+1}</td>
				<td align="left" class="listCont"><!--<a href="cityManage.php?sc={$areaName_list[area].areacode}">-->{$usermanage[listing].username|stripslashes}<!--</a>--></td>
				{*assign var='ary' value="@"|explode:$usermanage[listing].email}
                 <td align="left" class="listCont">*****@{$ary.1|stripslashes}</td>*}
                  <td align="left" class="listCont">{$usermanage[listing].email|stripslashes}</td>
            	<td align="left" class="listCont"><a href="manageDomainDetails.php?user_id={$usermanage[listing].user_id|stripslashes}&paging=theme">{$LANG.user_domain}</a></td>
                <td align="left" class="listCont"><a href="manageDomainDetails.php?user_id={$usermanage[listing].user_id|stripslashes}&paging=blog">{$LANG.user_theme}</a></td>	
               {* <td align="left" class="listCont"><a href="manageDomainDetails.php?user_id={$usermanage[listing].user_id|stripslashes}&paging=store">{$LANG.user_store}</a></td>*}			
				<td align="center" class="listCont">{$usermanage[listing].addeddate}</td>
				
				<!--Status-->
				<!--<td align="center" class="listCont" id="chgstatus{$user_list[listing].user_id}">
					{if $user_list[listing].status eq '1'}
					<img src="images/icon_active.png" alt="Active" title="Active" onclick="return changeStatus('0','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$user_list[listing].id}');" style="cursor:pointer;" />
					
					{else}
					<img src="images/delete.png" alt="Deactive" title="Deactive" onclick="return changeStatus('1','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$user_list[listing].id}');" style="cursor:pointer;" />
					{/if}
				</td>-->
				{if $usermanage[listing].email != 'info@roamsoft.in'}
				<td align="center" class="listCont" id="chgstatus{$usermanage[listing].user_id}">
					<!--Pending-->					
					{if $usermanage[listing].log_status eq '1'}
					<span onclick="return changeStatus('2','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$usermanage[listing].user_id}');" style="cursor:pointer;">
						<i class="fa fa-spinner"></i> 
					</span>
					{elseif $usermanage[listing].log_status eq '2'}
					<span onclick="return changeStatus('0','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$usermanage[listing].user_id}');" style="cursor:pointer;" >
						<i class="fa fa-check-square-o"></i> 
					</span>
					
					{else}
					<span onclick="return changeStatus('2','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$usermanage[listing].user_id}');" style="cursor:pointer;">
						<i class="fa fa-minus-square-o"></i> 
					</span>

					{/if}
				</td>
                {/if}
			{*	<td align="center" class="listCont">
					<span class="EditDeleteButton">
						 <a href="userManageAdd.php?user_id={$usermanage[listing].user_id}" >
                        </a> 
							<i class="fa fa-edit"></i>
						
					</span>
				</td>	*}										
			</tr>
			{sectionelse}
			<tr><td colspan="10" align="center" class="listCont">{$LANG.admin_norecords}</td></tr>
			{/section}
		</table>
	</div>
	<!--List End-->
	<!--Pagination start-->
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
			<li class="pages">{$LANG.admin_per_page}</li>	
		</ul>
		
		<div class="paginationCont">
			{$pagination}
		</div>
		<!--Button List start-->
		<div class="pull-right">
			<!--<a class="manageButton_addnw " href="listingAddEdit.php">Add New</a>-->
			<input type="button"  class="manageButton but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="manageButton but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" />
			<input type="button" class="manageButton but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','reguser');" />
		</div>
		<!--Button List End-->
	</div>
	<!--Pagination End-->
</div>