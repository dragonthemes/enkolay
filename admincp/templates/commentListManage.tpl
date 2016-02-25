<div class="rightContHeading Heading">{$LANG.admin_comment_list}</div>
<div class="ContBody clearfix">
	<!--Button Left start-->
	<div  class="clearfix">
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
	</div>
	<!--Button Left End-->
	<!--Pagination Start-->
	<div class="pageContTop sky-form form-horizontal skyformbgNon">
		<ul class="page">
			<li>{$fromRecords} to {$toRecords} of {$totalRecords}</li>
			<li class="pages">{$LANG.admin_show}</li>
			<li class="pages">
				<label class="select">
					<select class="pageSelectbox" onchange="showPerPagefield(this.value,'{$smarty.get.keyword}','{$smarty.get.sortby}','blog_id={$smarty.get.blog_id}');" >
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
			<li class="pages"> per page</li>	
		</ul>
	</div>
		<!--Error Msg-->
		<span id="errormsg"></span>
		<!--Pagination-->
	<div class="paginationCont">
		{$pagination}
	</div>
	<!--Pagination End-->
	<!--List Start-->
	<div class="tableListContainer">
		<table width="100%" border="0" class="tableListContent">
			<tr class="listHeader leftNavblueBg">
				<!--<td width="3%" align="center" class="listHeaderCont"><input type="checkbox" id="selectall" onclick="selectDeselectAll();" /></td>-->
				<td width="15%" align="center" class="listHeaderCont">{$LANG.admin_sno}</td>		
				<td width="15%" align="center" class="listHeaderCont">{$LANG.admin_domain}</td>	
                <td width="15%" align="center" class="listHeaderCont">{$LANG.admin_title}</td>
                <td width="15%" align="center" class="listHeaderCont">{$LANG.admin_comments}</td>
                <td width="15%" align="center" class="listHeaderCont">{$LANG.admin_status}</td>	
                <td width="15%" align="center" class="listHeaderCont">{$LANG.admin_commentor_ip}</td>	
                <td width="15%" align="center" class="listHeaderCont">{$LANG.admin_addeddate}</td>			
			</tr>
			{section name="page" loop="$domainpage"}			
			{assign var="trvar" value=$smarty.section.page.rownum}
			<tr {if $trvar is even}class="listLightGray"{/if}>
			<!--	<td align="center" class="listCont"><input type="checkbox" class="case" value="{$domain_image[image].img_id}" onclick="individualSelect();" /></td>-->
				<td align="center" class="listCont">{$domainpage[page].sno}</td>
                <td align="center" class="listCont">{$objAdminMgmt->getDomain($domainpage[page].domain_id)}</td>
                <td align="center" class="listCont">{$domainpage[page].title}</td>
                <td align="center" class="listCont">{$domainpage[page].comments}</td>
                <td align="center" class="listCont">{$domainpage[page].status}</td>
                <td align="center" class="listCont">{$domainpage[page].commentor_ip}</td>
                <td align="center" class="listCont">{$domainpage[page].addeddate}</td>
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
			<li class="pages">{$LANg.admin_show}</li>
			<li class="pages">
				<label class="select">
					<select class="pageSelectbox" onchange="showPerPagefield(this.value,'{$smarty.get.keyword}','{$smarty.get.sortby}','blog_id={$smarty.get.blog_id}');" >
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
			<li class="pages"> per page</li>	
		</ul>
		<!--Button List start-->
		<div class="pull-right">
			<input type="button"  class="manageButton but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="manageButton but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" />
			<input type="button" class="manageButton but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','image');" />
		</div>
		<!--Button List End-->
	</div>
	<!--Pagination End-->
</div>