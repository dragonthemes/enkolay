<div class="Heading">{$LANG.user_subdomain}</div>
<div class="ContBody clearfix">
	<div class="clearfix"><a class="btn btn-danger pull-right" href="userManage.php">{$LANG.admin_back}</a></div>
	<!--Button Left start-->
	<div  class="clearfix">
		{if $totalRecords gt 0}	
		<!--Filter-->
		<div class="fliterbuttonContShow processButton" id="searchkey">
			<form name="filterform" method="post" onsubmit="return filterValidation();">
				<input type="hidden" name="action"  value="filterProcess" />
				
				{$LANG.admin_keyword}:
				<input type="text" name="keyword" id="keyword" value="{$smarty.request.keyword}" class="no-mar">
				<input type="submit" name="filter" value="Filter" class="btn btn-success">
				<input type="button" name="clear" value="Clear" class="btn btn-danger" id="clear" onclick="return clearFilterTxtBox();">		 
			</form>	 
		</div>
		{/if}
		<!--Button Right start-->
			<span class="pull-right">
				<!--<a class="manageButton_addnw " href="listingAddEdit.php">Add New</a>			
				<input type="button" class="manageButton but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','reguser');" />-->	
			</span>
		<!--Button List End-->
	</div>
	<!--Button Left End-->
	
	<!--Pagination Start-->
	<div class="pageContTop">
		<ul class="page">
			<li>{$fromRecords} to {$toRecords} of {$totalRecords}</li>
			<li class="pages">{$LANG.admin_show}</li>
			<li class="pages">
				<select class="pageSelectbox" onchange="showPerPagefield(this.value,'{$smarty.get.keyword}','{$smarty.get.sortby}','user_id={$smarty.get.user_id}');" >
					<option value="5" {if $limit eq '5'}selected="selected"{/if}>5</option>
					<option value="10" {if $limit eq '10'}selected="selected"{/if}>10</option>
					<option value="15" {if $limit eq '15'}selected="selected"{/if}>15</option>
					<option value="20" {if $limit eq '20'}selected="selected"{/if}>20</option>
					<option value="25" {if $limit eq '25'}selected="selected"{/if}>25</option>
					<option value="30" {if $limit eq '30'}selected="selected"{/if}>30</option>
					<option value="50" {if $limit eq '50'}selected="selected"{/if}>50</option>
					<option value="100" {if $limit eq '100'}selected="selected"{/if}>100</option>
				</select>
			</li>
			<li class="pages">{$LANG.admin_per_page}</li>	
		</ul>
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
				<!--<td width="7%" align="center" class="listHeaderCont">{$LANG.admin_sno}</td>-->
				
				<td width="10%" align="left" class="listHeaderCont">
					{if $smarty.get.sortby eq 'tdesc'}
						<a href="{$filename}?sortby=tasc&user_id={$smarty.get.user_id}{if $smarty.get.limit neq ''}&limit={$smarty.get.limit}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}">
							{$LANG.domain_url}<img src="images/icon_arrow_down.png" alt="Descending" title="Descending" />
						</a>
					{elseif $smarty.get.sortby eq 'tasc'}
						<a href="{$filename}?sortby=tdesc&user_id={$smarty.get.user_id}{if $smarty.get.limit neq ''}&limit={$smarty.get.limit}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}">
								{$LANG.domain_url}<img src="images/icon_arrow_up.png" alt="Ascending" title="Ascending" />
						</a>
					{else}
						<a href="{$filename}?sortby=tasc&user_id={$smarty.get.user_id}{if $smarty.get.limit neq ''}&limit={$smarty.get.limit}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}">
								{$LANG.domain_url}<img src="images/icon_arrow_up.png" alt="Ascending" title="Ascending" />
						</a>
					{/if}
				</td>
				<td width="15%" align="left" class="listHeaderCont">{$LANG.domain_site_title}</td>
                {if $smarty.get.paging eq 'theme'}
				     <td width="15%" align="left" class="listHeaderCont">{$LANG.domain_theme}</td>
                {elseif $smarty.get.paging eq 'blog'}
                      <td width="15%" align="left" class="listHeaderCont">{$LANG.domain_blog}</td>
                {else $smarty.get.paging eq 'store'}
                      <td width="15%" align="left" class="listHeaderCont">{$LANG.domain_store}</td>      
                      {*<td width="15%" align="left" class="listHeaderCont">{$LANG.domain_post}</td>*}
                {/if}      
                {*<td width="15%" align="center" class="listHeaderCont">{$LANG.admin_page_name}</td>*}
                <td width="15%" align="center" class="listHeaderCont">{$LANG.domain_point_domain}</td>				
				<td width="25%" align="center" class="listHeaderCont">{$LANG.domain_new_domain}</td>
				{*<td width="25%" align="center" class="listHeaderCont">{$LANG.domain_meta}</td>
				<td width="25%" align="center" class="listHeaderCont">{$LANG.domain_headercode}</td>*}
				<td width="5%" align="center" class="listHeaderCont">{$LANG.admin_date}</td>
			</tr>
			{section name="listing" loop="$domaindetails"}
			{assign var="trvar" value=$smarty.section.listing.rownum}
			<tr {if $trvar is even}class="listLightGray"{/if} id="deletecate{$domaindetails[listing].user_id}">
				<td align="center" class="listCont"><input type="checkbox" class="case" value="{$domaindetails[listing].user_id}" onclick="individualSelect();" /></td>
				<!--<td align="center" class="listCont">{$domaindetails[listing].sno}</td>-->
				<td align="left" class="listCont">{$domaindetails[listing].subdomainurl|stripslashes}</td>
				<td align="left" class="listCont">{if $domaindetails[listing].site_title}{$domaindetails[listing].site_title}{else}My Site{/if}</td>
                {if $smarty.get.paging eq 'theme'}
				<td align="left" class="listCont">{$objAdminMgmt->getCommonSingleSelection('theme_name',$themetable,'theme_id',$domaindetails[listing].theme_id)}</td>
               <!-- <td align="center" class="listCont">{$objCommon->getThemeName($domaindetails[listing].theme_id)}</td>-->
                {elseif $smarty.get.paging eq 'blog'}
                
                <td align="left" class="listCont">{$objAdminMgmt->getCommonSingleSelection('blog_name',$blogtable,'blog_id',$domaindetails[listing].blog_id)}</td>
                {*<td align="left" class="listCont"><a href="postListManage.php?post_id={$domaindetails[listing].blog_id}" >Post</a></td>*}
                {else $smarty.get.paging eq 'store'}
                
                <td align="left" class="listCont">{$objAdminMgmt->getCommonSingleSelection('store_name',$storetable,'store_id',$domaindetails[listing].store_id)}</td>
                {/if}
                {*<td align="left" class="listCont"><a href="domainPageListManage.php?domain_id={$domaindetails[listing].domain_id}">Pages</a></td>
                <td align="left" class="listCont"><a href="siteListManage.php?domain_id={$domaindetails[listing].domain_id}">Settings</a></td>
				<td align="left" class="listCont">{$domaindetails[listing].footer_code|stripslashes}</td>	
				<td align="left" class="listCont">{$domaindetails[listing].metakeywords|stripslashes}</td>	
				<td align="left" class="listCont">{$domaindetails[listing].header_code|stripslashes}</td>*}		
				<td align="center" class="listCont"><a href="listPointDomain.php?domain_id={$domaindetails[listing].domain_id}&user_id={$domaindetails[listing].user_id}&paging={$smarty.get.paging}">Point</a></td>
				<td align="center" class="listCont"><a href="listNewDomain.php?domain_id={$domaindetails[listing].domain_id}&user_id={$domaindetails[listing].user_id}&paging={$smarty.get.paging}">New</a></td>
				
				<td align="center" class="listCont">{$domaindetails[listing].addeddate}</td>
			</tr>
			{sectionelse}
			<tr><td colspan="10" align="center" class="listCont">{$LANG.admin_norecords}</td></tr>
			{/section}
		</table>
	</div>
	<!--List End-->
	<!--Pagination start-->
	<div class="pageContTop">
		<ul class="page">
			<li>{$fromRecords} to {$toRecords} of {$totalRecords}</li>
			<li class="pages">{$LANG.admin_show}</li>
			<li class="pages">
				<select class="pageSelectbox" onchange="showPerPage(this.value,'{$smarty.get.keyword}','{$smarty.get.sortby}','user_id={$smarty.get.user_id}');" >
					<option value="5" {if $limit eq '5'}selected="selected"{/if}>5</option>
					<option value="10" {if $limit eq '10'}selected="selected"{/if}>10</option>
					<option value="15" {if $limit eq '15'}selected="selected"{/if}>15</option>
					<option value="20" {if $limit eq '20'}selected="selected"{/if}>20</option>
					<option value="25" {if $limit eq '25'}selected="selected"{/if}>25</option>
					<option value="30" {if $limit eq '30'}selected="selected"{/if}>30</option>
					<option value="50" {if $limit eq '50'}selected="selected"{/if}>50</option>
					<option value="100" {if $limit eq '100'}selected="selected"{/if}>100</option>
				</select>
			</li>
			<li class="pages">{$LANG.admin_per_page}</li>	
		</ul>
		<div class="paginationCont">
			{$pagination}
		</div>
	</div>
	<!--Pagination End-->
	<div class="clr"></div>
	<!--Button List start-->
	<div class="clearfix">
		<!--<a class="manageButton_addnw " href="listingAddEdit.php">Add New</a>
		<input type="button"  class="manageButton but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
		<input type="button" class="manageButton but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" />
		<input type="button" class="manageButton but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','reguser');" />
	</div>-->
	<!--Button List End-->
</div>