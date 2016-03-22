<div class="rightContHeading Heading">{$LANG.admin_banner_manage} <a class="backButt pull-right" href="backgroundManage.php"><i class="fa fa-backward"></i> {$LANG.admin_back}</a></div>
<div class="ContBody clearfix">
	<!--Button Left start-->
	<div  class="clearfix">
		{if $totalRecords gt 0}
			<!--Filter-->
			<span class="processButton" id="searchkey">
				<form name="filterform" method="post" onsubmit="return filterValidation();" class="no-mar pull-left">
					<input type="hidden" name="action"  value="filterProcess" />
					
					{$LANG.admin_keyword}:
					<input type="text" name="keyword" id="keyword" value="{$smarty.request.keyword}" placeholder="Background name" class="no-mar">
					<input type="submit" name="filter" value="Filter" class="btn btn-success">
					<input type="button" name="clear" value="Clear" class="btn btn-danger" id="clear" onclick="return clearFilterTxtBox();">		 
				</form>	
			</span>
		{/if}
		<!--Export-->
	 {*	<div  class="filterbutton" onclick="return exportOptShowHide();">Export<img src="images/icon_plus.png" alt="Export" title="Export" /></div>
		<div class="fliterbuttonContShow processButton" id="export" style="display:none;">
			<form name="exportform" method="post" onsubmit="return exportValidation();">
				<input type="hidden" name="action"  value="exportProcess" />
						
				<select name="exportfile" id="exportfile">				 	 
					<option value="CSV">CSV</option>
					<option value="Excel">Excel</option>	
				</select>
				<input type="submit" name="export" value="Export" class="buttonFilter" />	
			</form>				 
		</div>*}
		
		<!--Import-->
	 {*	<div  class="filterbutton" onclick="return importOptShowHide();">Import<img src="images/icon_plus.png" alt="Import" title="Import" /></div>
		<div class="fliterbuttonContShow processButton" id="import" style="display:none;">
			<form name="importform" method="post"  enctype="multipart/form-data" onsubmit="return importValidation();" >
				<input type="hidden" name="action" value="importProcess" />	
				
				 <input type="file" name="importfile" id="importfile" />
				 <input type="radio" name="rd_import"  value="emptab"checked="checked" />&nbsp;Empty table
				 <input type="radio" name="rd_import"  value="upttab" />&nbsp;Update table	         
				 <input type="submit" name="submitImport" value="Import" class="buttonFilter" />
						 
			</form>
		 </div>*}
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
		<!--Button Right start-->
		<span class="pull-right">
			<a class="btn btn-success" href="backgroundManageAdd.php"><i class="fa fa-plus-circle"></i> {$LANG.admin_new}</a>
			<input type="button"  class="manageButton but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="manageButton but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" />
			<input type="button" class="manageButton but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','banner');" />
		</span>
		<!--Button Right End--> 
	</div>
		<!--Error Msg-->
		<span id="errormsg" class="successmsg">{$ErrorMessage}</span>
		<!--Pagination-->
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
				<td width="20%" align="center" class="listHeaderCont">
					<a href="javascript:void(0);" {if $smarty.request.sortby eq 'cdesc'}onclick="sortByAscDesc('casc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'casc'}onclick="sortByAscDesc('cdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('cdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Background Name{if $smarty.request.sortby eq 'cdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'casc'}<img class="arrow" src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img class="arrow" src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
					</a>
				</td>
				<td width="15%" align="center" class="listHeaderCont">{$LANG.admin_background_image}</td>					
				<td width="15%" align="center" class="listHeaderCont">{$LANG.admin_date}</td>
				<td width="5%" align="center" class="listHeaderCont">Status</td>
				<td width="10%" align="center" class="listHeaderCont">{$LANG.admin_action}</td>					
			</tr>
			{section name="background" loop="$background_List"}
			{assign var="trvar" value=$smarty.section.background.rownum}
			<tr {if $trvar is even}class="listLightGray"{/if}>
				<td align="center" class="listCont"><input type="checkbox" class="case" value="{$background_List[background].background_id}" onclick="individualSelect();" /></td>
				<td align="center" class="listCont">{$background_List[background].sno}</td>
				<td align="left" class="listCont">{$background_List[background].background_name|stripslashes}</td>
				<td align="center" class="listCont">
					{if $background_List[background].background_image neq ''}
						<div class="largeImgTooltip">
							<img src="{$SITE_BACKGROUND_URL}/{$background_List[background].background_image|stripslashes}" alt="{$background_List[background].background_name|stripslashes}" title="{$background_List[background].background_name|stripslashes}" class="imgborder" width="25" height="25"/>
							<span><img src="{$SITE_BACKGROUND_URL}/{$background_List[background].background_thumb|stripslashes}" alt="{$background_List[background].background_name|stripslashes}" title="{$background_List[background].background_name|stripslashes}" /></span>
						</div>
					{else}
						{$LANG.admin_empty}
					{/if}
				</td>
				<td align="center" class="listCont">{$background_List[background].addeddate|date_format}</td>				
				<td align="center" class="listCont" id="chgstatus{$background_List[background].background_id}">
					{if $background_List[background].status eq '1'}
						<span onclick="return changeStatus('0','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$background_List[background].banner_id}');" style="cursor:pointer;">
							<i class="fa fa-check-square-o"></i>
						</span>
						{else}
						<span onclick="return changeStatus('1','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$background_List[background].banner_id}');" style="cursor:pointer;">
							<i class="fa fa-minus-square-o"></i>
						</span>
					{/if}
				</td>
				<td align="center" class="listCont">
					<span class="EditDeleteButton">
						<a href="backgroundManageAdd.php?background_id={$background_List[background].background_id}" >
							<i class="fa fa-edit"></i>
						</a>
					</span>
					<span class="EditDeleteButton">
						<span onclick="return changeStatus('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$background_List[background].background_id}','background');" style="cursor:pointer;">
							<i class="fa fa-times"></i>
						</span>
					</span>
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
		<!--Button List start-->
		<div class="pull-right">
			<a class="btn btn-success" href="backgroundManageAdd.php"><i class="fa fa-plus-circle"></i> {$LANG.admin_new}</a>
			<input type="button"  class="manageButton but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="manageButton but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" />
			<input type="button" class="manageButton but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','followers');" />
		</div>
		<!--Button List End-->
	</div>
	<!--Pagination End-->
</div>