<div class="Heading">{$LANG.admin_post_details}</div>
<div class="ContBody clearfix">
	<div class="clearfix"><a class="btn btn-danger pull-right" href="blogDomainManage.php">{$LANG.admin_back}</a></div>
	<!--Button Left start-->
	<div  class="clearfix">
		{if $totalRecords gt 0}	
		<!--Filter-->
		<div class="fliterbuttonContShow processButton" id="searchkey">
			<form name="filterform" method="post" onsubmit="return filterValidation();">
				<input type="hidden" name="action"  value="filterProcess" />
				
				{$LANG.admin_keyword}:
				<input type="text" name="keyword" id="keyword" value="{$smarty.request.keyword}" class="no-mar" placeholder="post">
				<input type="submit" name="filter" value="Filter" class="btn btn-success">
				<input type="button" name="clear" value="Clear" class="btn btn-danger" id="clear" onclick="return clearFilterTxtBox();">		 
			</form>	 
		</div>
		{/if}
		<!--Button Right start-->
			<span class="pull-right">
				<!--<a class="manageButton_addnw " href="listingAddEdit.php">Add New</a>-->				
				<input type="button" class="manageButton but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','reguser');" />
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
				<select class="pageSelectbox" onchange="showPerPagefield(this.value,'{$smarty.get.keyword}','{$smarty.get.sortby}','domain_id={$smarty.get.domain_id}');" >
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
				<td width="7%" align="center" class="listHeaderCont">{$LANG.admin_sno}</td>
				<td width="15%" align="left" class="listHeaderCont">{$LANG.admin_post}</td>	
				<td width="15%" align="left" class="listHeaderCont">{$LANG.admin_addeddate}</td>				
			</tr>
			{section name="postlist" loop="$post_List"}
			{assign var="trvar" value=$smarty.section.postcomment.rownum}
			<tr {if $trvar is even}class="listLightGray"{/if} id="deletecate{$post_List[postlist].post_id}">
				<td align="center" class="listCont">{$post_List[postlist].sno}</td>
				<td align="left" class="listCont"><a href="listComments.php?title_id={$post_List[postlist].post_id}&domain_id={$post_List[postlist].domain_id}">{$post_List[postlist].title}</a></td>
			  	<td align="center" class="listCont">{$post_List[postlist].addeddate|date_format}</td>
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
				<select class="pageSelectbox" onchange="showPerPage(this.value,'{$smarty.get.keyword}','{$smarty.get.sortby}','domain_id={$smarty.get.domain_id}');" >
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
	 
</div>