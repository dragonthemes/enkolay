<div class="Heading">{$LANG.domain_name} <a class="backButt pull-right" href="manageDomainDetails.php?user_id={$smarty.get.user_id}&paging={$smarty.get.paging}"><i class="fa fa-backward"></i> {$LANG.admin_back}</a></div>
<div class="ContBody clearfix">
	<!--Button Left start-->
	<div  class="clearfix">
		{if $totalRecords gt 0}	
		<!--Filter-->
		<div class="processButton" id="searchkey">
			<form name="filterform" method="post" onsubmit="return filterValidation();">
				<input type="hidden" name="action"  value="filterProcess" />
				
				{$LANG.admin_keyword}:
				<input type="text" name="keyword" id="keyword" value="{$smarty.request.keyword}" class="no-mar">
				<input type="submit" name="filter" value="Filter" class="btn btn-success">
				<input type="button" name="clear" value="Clear" class="btn btn-danger" id="clear" onclick="return clearFilterTxtBox();">		 
			</form>	 
		</div>
		{/if}
		
	</div>
	<a href="#ModalFormEntry_555" class="pull-right" data-toggle="modal">Click Here to Add Or Point Domain</a>
	<div id="modals">
		<div id="ModalFormEntry_555" class="modal hide pointdomainInn in" aria-hidden="false">
			<div class="close PopFooterCloseButt" data-dismiss="modal" aria-hidden="true"></div>
			<div class="head">Step 1:</div>
			<div class="list">Open the notepad.</div>
			<div class="head">Step 2:</div>
			<div class="list">Copy and Pase the Below Code.
			   RewriteEngine on
			   RewriteBase /
			   RewriteRule (.*) http://www.{$SITE_MAIN_DOMAIN}/$1 [NC,P]</div>	
			<div class="head">Step 3:</div>
			<div class="list">Change the http://www.{$SITE_MAIN_DOMAIN} to your subdomain for example(http://ex.{$SITE_MAIN_DOMAIN})</div>
			<div class="head">Step 4:</div>
			<div class="list">save the file as .htaccess</div>
			<div class="head">Step 5:</div>
			<div class="list">Then Upload this htaccess file into the ftp.</div>
			<div class="head">Step 6:</div>
			<div class="list">Now run the site in the browser.</div>
		</div>
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
			<input type="button"  class="manageButton but_activate" value="Publish" onclick="sendMailToUsersPublish('publish','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="manageButton but_deactivate" value="UnPublish"  onclick="sendMailToUsersPublish('unpublish','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="manageButton but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','property');" />
			{*<input type="button" class="manageButton send_mail" value="Send Mail" style="display:none;" onclick="sendMailToUsers('1','mail_status','{$whereField}','{$tablename}','{$word}','user');" />*}
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
				
				<td width="10%" align="left" class="listHeaderCont">
					{if $smarty.get.sortby eq 'tdesc'}
						<a href="{$filename}?sortby=tasc{if $smarty.get.limit neq ''}&limit={$smarty.get.limit}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}">
							New Domain<img src="images/icon_arrow_down.png" alt="Descending" title="Descending" />
						</a>
					{elseif $smarty.get.sortby eq 'tasc'}
						<a href="{$filename}?sortby=tdesc{if $smarty.get.limit neq ''}&limit={$smarty.get.limit}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}">
							{$LANG.domain}<img src="images/icon_arrow_up.png" alt="Ascending" title="Ascending" />
						</a>
					{else}
						<a href="{$filename}?sortby=tasc{if $smarty.get.limit neq ''}&limit={$smarty.get.limit}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}">
							New Domain<img src="images/icon_arrow_up.png" alt="Ascending" title="Ascending" />
						</a>
					{/if}
				</td>
				
				<td width="15%" align="center" class="listHeaderCont">{$LANG.user_name}</td>
				<td width="15%" align="center" class="listHeaderCont">{$LANG.admin_domain_name}</td>
				<td width="15%" align="center" class="listHeaderCont">{$LANG.admin_status}</td>
				<td width="5%" align="center" class="listHeaderCont">{$LANG.admin_date}</td>
				<td width="15%" align="center" class="listHeaderCont">{$LANG.admin_action}</td>
			</tr>
			{section name="listing" loop="$newdetails"}
			{assign var="trvar" value=$smarty.section.listing.rownum}
			<tr {if $trvar is even}class="listLightGray"{/if} id="deletecate{$newdetails[listing].newdomainid}">
				<td align="center" class="listCont"><input type="checkbox" class="case" value="{$newdetails[listing].newdomainid}" onclick="return individualSelect();" />
				</td>
				<td align="center" class="listCont">{$newdetails[listing].sno}</td>
				<td align="center" class="listCont">{$newdetails[listing].domain_name}</td>
				<td align="center" class="listCont">{$objCommon->getUserName($newdetails[listing].user_id)}</td>
				<td align="center" class="listCont">{$objAdminMgmt->getDomain($newdetails[listing].domain_id)}</td>
                <td align="center" class="listCont">{$newdetails[listing].status}</td>
                <td align="center" class="listCont">{$newdetails[listing].addeddate}</td>
				
				<!--Status-->
				<td align="center" class="listCont" id="chgstatus{$newdetails[listing].point_id}">
					{if $newdetails[listing].status eq 'publish'}
						<span onclick="return changeStatus('unpublish','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$newdetails[listing].newdomainid}');" style="cursor:pointer;">
							<i class="fa fa-check-square-o"></i>
						</span>
						{else}
						<span onclick="return changeStatus('publish','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$newdetails[listing].newdomainid}');" style="cursor:pointer;">
							<i class="fa fa-minus-square-o"></i>
						</span>
					{/if}
				</td>
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
				<!--<a class="manageButton_addnw " href="listingAddEdit.php">Add New</a>-->
				<input type="button"  class="manageButton but_activate" value="Publish" onclick="sendMailToUsersPublish('publish','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
				<input type="button" class="manageButton but_deactivate" value="UnPublish"  onclick="sendMailToUsersPublish('unpublish','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
				<input type="button" class="manageButton but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','New Domain');" />
				{*<input type="button" class="manageButton send_mail" value="Send Mail" style="display:none;" onclick="sendMailToUsers('1','mail_status','{$whereField}','{$tablename}','{$word}','New Domain');" />*}
			</div>
		<!--Button List End-->
	</div>
</div>