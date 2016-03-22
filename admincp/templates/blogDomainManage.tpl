<div class="Heading">{$LANG.admin_blog_domain_details} <a class="backButt pull-right" href="blogDomainManage.php"><i class="fa fa-backward"></i> {$LANG.admin_back}</a></div>
<div class="ContBody clearfix">
	<!--Button Left start-->
	<div  class="clearfix">
		{if $totalRecords gt 0}	
		<!--Filter-->
		<div class="fliterbuttonContShow processButton" id="searchkey">
			<form name="filterform" method="post" onsubmit="return filterValidation();">
				<input type="hidden" name="action"  value="filterProcess" />
				
				{$LANG.admin_keyword}:
				<input type="text" name="keyword" id="keyword" value="{$smarty.request.keyword}" class="no-mar" placeholder="http://domain.{$SITE_MAIN_DOMAIN}.com">
				<input type="submit" name="filter" value="Filter" class="btn btn-success">
				<input type="button" name="clear" value="Clear" class="btn btn-danger" id="clear" onclick="return clearFilterTxtBox();">		 
			</form>	 
		</div>
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
				<td width="7%" align="center" class="listHeaderCont">{$LANG.admin_sno}</td>
				
				<td width="10%" align="left" class="listHeaderCont">
					{if $smarty.get.sortby eq 'tdesc'}
						<a href="{$filename}?sortby=tasc{if $smarty.get.limit neq ''}&limit={$smarty.get.limit}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}">
							{$LANG.admin_domain_name}<img src="images/icon_arrow_down.png" alt="Descending" title="Descending" />
						</a>
					{elseif $smarty.get.sortby eq 'tasc'}
						<a href="{$filename}?sortby=tdesc{if $smarty.get.limit neq ''}&limit={$smarty.get.limit}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}">
								{$LANG.admin_domain_name}<img src="images/icon_arrow_up.png" alt="Ascending" title="Ascending" />
						</a>
					{else}
						<a href="{$filename}?sortby=tasc{if $smarty.get.limit neq ''}&limit={$smarty.get.limit}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}">
								{$LANG.admin_domain_name}<img src="images/icon_arrow_up.png" alt="Ascending" title="Ascending" />
						</a>
					{/if}
				</td>
				<td width="15%" align="left" class="listHeaderCont">{$LANG.admin_post}</td>				
				<td width="25%" align="center" class="listHeaderCont">{$LANG.admin_author}</td>
				<td width="5%" align="center" class="listHeaderCont">{$LANG.admin_archieves}</td>
				<td width="5%" align="center" class="listHeaderCont">{$LANG.admin_category}</td>
			</tr>
			{section name="blogdomain" loop="$blogdomain_List"}
			{assign var="trvar" value=$smarty.section.blogdomain.rownum}
			<tr {if $trvar is even}class="listLightGray"{/if} id="deletecate{$blogdomain_List[blogdomain].user_id}">
				<td align="center" class="listCont">{$blogdomain_List[blogdomain].sno}</td>
				<td align="left" class="listCont">{$objAdminMgmt->getDomain($blogdomain_List[blogdomain].domain_id)}</td>
				<td align="left" class="listCont"><a href="listPost.php?domain_id={$blogdomain_List[blogdomain].domain_id}">Post</a></td>
				<td align="center" class="listCont">{$blogdomain_List[blogdomain].author}</td>
				<td align="center" class="listCont">{$blogdomain_List[blogdomain].archives}</td>
				<td align="center" class="listCont">{$blogdomain_List[blogdomain].categories}</td>
			   											
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
	</div>
	<!--Pagination End-->
	 
</div>