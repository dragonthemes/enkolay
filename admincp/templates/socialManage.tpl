<div class="rightContHeading Heading">{$LANG.admin_social_management} <a class="backButt pull-right" href="socialManage.php"><i class="fa fa-backward"></i> {$LANG.admin_back}</a></div>
<div class="ContBody clearfix">
	<!--Button Left start-->
	<div  class="clearfix">
		{if $totalRecords gt 0}
			<!--Filter-->
			<span class="processButton" id="searchkey">
				<form name="filterform" method="post" onsubmit="return filterValidation();" class="no-mar pull-left">
					<input type="hidden" name="action"  value="filterProcess" />
					
					{$LANG.admin_keyword}:
					<input type="text" name="keyword" id="keyword" value="{$smarty.request.keyword}" class="no-mar" placeholder="http://domain.{$SITE_MAIN_DOMAIN}"/>
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
			<li class="pages"> per page</li>	
		</ul>
	</div>
		<!--Error Msg-->
		<span id="errormsg">{$ErrorMessage}</span>
		<!--Pagination-->
	<div class="paginationCont">
		{$pagination}
	</div>
	<!--Pagination End-->
	<!--List Start-->
	<div class="tableListContainer">
		<table width="100%" border="0" class="tableListContent">
			<tr class="listHeader leftNavblueBg">
				<td width="7%" align="center" class="listHeaderCont">{$LANG.admin_sno}</td>
				<td width="15%" align="center" class="listHeaderCont">{$LANG.admin_domain_name}</td>
				<td width="15%" align="center" class="listHeaderCont">{$LANG.admin_page_name}</td>
				<td width="15%" align="center" class="listHeaderCont">{$LANG.admin_fb}</td>
				<td width="15%" align="center" class="listHeaderCont">{$LANG.admin_twitter}</td>
				<td width="15%" align="center" class="listHeaderCont">{$LANG.admin_linkedin}</td>
				<td width="15%" align="center" class="listHeaderCont">{$LANG.admin_mail}</td>
				<td width="15%" align="center" class="listHeaderCont">{$LANG.admin_date}</td>
				 				
			</tr>
			{section name="social" loop="$social_List"}
			{assign var="trvar" value=$smarty.section.social.rownum}
			<tr {if $trvar is even}class="listLightGray"{/if}>
			 
				<td align="center" class="listCont">{$social_List[social].sno}</td>
				<td align="left" class="listCont">{$objAdminMgmt->getDomain($social_List[social].domain_id)}</td>
				<td align="left" class="listCont">{$objAdminMgmt->getPagename($social_List[social].page_id)}</td> 
				<td align="center" class="listCont">{$social_List[social].fb}</td>
				<td align="center" class="listCont">{$social_List[social].twitter}</td>
				<td align="center" class="listCont">{$social_List[social].linkedin}</td>
				<td align="center" class="listCont">{$social_List[social].mail}</td>
				<td align="center" class="listCont">{$social_List[social].added_date|date_format}</td>				
				 
			 
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
			<li class="pages"> per page</li>	
		</ul>
	</div>
	<!--Pagination End-->
</div>