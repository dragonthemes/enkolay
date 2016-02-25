<div class="rightContHeading Heading">{$LANG.admin_domain_image_text_management}</div>
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
				<!--<td width="25%" align="left" class="listHeaderCont">Banner Title</td>-->
				<td width="15%" align="center" class="listHeaderCont">{$LANG.admin_domain_id}</td>					
				<td width="15%" align="center" class="listHeaderCont">{$LANG.admin_page_id}</td>
                <td width="15%" align="center" class="listHeaderCont">{$LANG.admin_domain_image}</td>
				<td width="15%" align="center" class="listHeaderCont">{$LANG.admin_status}</td>
                <td width="155%" align="center" class="listHeaderCont">{$LANG.admin_imagetext}</td>
				<!--<td width="10%" align="center" class="listHeaderCont">{$LANG.admin_action}</td>-->					
			</tr>
			{section name="image" loop="$domain_image"}			
			{assign var="trvar" value=$smarty.section.image.rownum}
			<tr {if $trvar is even}class="listLightGray"{/if}>
			<!--	<td align="center" class="listCont"><input type="checkbox" class="case" value="{$domain_image[image].img_id}" onclick="individualSelect();" /></td>-->
				<td align="center" class="listCont">{$domain_image[image].sno}</td>
                <td align="center" class="listCont">{$objAdminMgmt->getDomain($domain_image[image].domain_id)}</td>
                <td align="center" class="listCont">{$objAdminMgmt->getPagename($domain_image[image].page_id)}</td> 
                <td align="center" class="listCont">
					{if $domain_image[image].image_name neq ''}
						<div class="largeImgTooltip">
							<img src="{$SITE_DOMAIN_IMAGES_URL}/{$domain_image[image].image_name|stripslashes}" alt="{$domain_image[image].image_name|stripslashes}" title="{$domain_image[image].image_name|stripslashes}" width="100" height="100"/>
		
						</div>
					{else}
						{$LANG.admin_empty}
					{/if}
				</td>	
				<td align="center" class="listCont">{$domain_image[image].status|stripslashes}</td>
                <td align="center" class="listCont">{$objAdminMgmt->getImageText($domain_image[image].page_id)}</td> 
				<!--<td align="center" class="listCont">
					<span class="EditDeleteButton">
						<a href="domainImageManage.php?theme_id={$domain_image[image].img_id}" >
							<img src="images/icon_edit.png" width="16" height="16" alt="Edit" title="Edit" />
						</a>
					</span>
					<span class="EditDeleteButton">
						<img src="images/icon_delete.png" width="14" height="14" alt="Delete" title="Delete" onclick="return changeStatus('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$domain_image[image].img_id}','banner');" style="cursor:pointer;" />
					</span>
				</td>-->
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