<div class="rightContHeading Heading">{$LANG.admin_banner_manage} <a class="backButt pull-right" href="bannerManage.php"><i class="fa fa-backward"></i> {$LANG.admin_back}</a></div>
<div class="ContBody clearfix">
	<div class="row-fluid sky-form form-horizontal skyformbgNon">
		<div class="span6">
			{if $totalRecords gt 0}
				<!-- Sort By -->
				<form name="bannermanage" class="no-mar" method="post" action="bannerManage.php" />
					Sort By <span class="restManageCol">:</span> <span class="selctTopAlign">
					<label class="select">
							<select class="no-mar" name="sortby" id="sortby" size="1" onchange="document.bannermanage.submit();">
								<option value="">{$LANG.admin_select}</option>
								<optgroup label="Status">
									<option value="active" {if $smarty.request.sortby eq active} selected="selected"{/if}>&nbsp;&nbsp;Active</option>
									<option value="deactive" {if $smarty.request.sortby eq deactive} selected="selected"{/if}>&nbsp;&nbsp;Deactive</option>
								</optgroup>
								<optgroup label="Others">
									<option value="casc" {if $smarty.request.sortby eq 'casc'}selected="selected"{/if}>&nbsp;&nbsp;Banner Name A to Z</option>
									<option value="cdesc" {if $smarty.request.sortby eq 'cdesc'}selected="selected"{/if}>&nbsp;&nbsp;Banner Name Z to A</option>
									
								 
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
					<input type="text" name="keyword" id="keyword" value="{$smarty.request.keyword}" class="no-mar" placeholder="Banner name">
					<input type="submit" name="filter" value="Filter" class="btn btn-success">
					<input type="button" name="clear" value="Clear" class="btn btn-danger" id="clear" onclick="return clearFilterTxtBox();">		 
				</form>
					 
			</div>
			
			{/if}
			
		</div>
		<!--Button Left End-->
	</div>
	<!--Button Left start-->
	<div  class="clearfix">
	 
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
			<a class="btn btn-success" href="bannerManageAdd.php"><i class="fa fa-plus-circle"></i> {$LANG.admin_new}</a>
			<input type="button"  class="manageButton but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="manageButton but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" />
			<input type="button" class="manageButton but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','banner');" />
		</span>
		<!--Button Right End--> 
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
				<td width="3%" align="center" class="listHeaderCont"><input type="checkbox" id="selectall" onclick="selectDeselectAll();" /></td>
				<td width="7%" align="center" class="listHeaderCont">{$LANG.admin_sno}</td>
				<td width="20%" align="" class="listHeaderCont">
					<a href="javascript:void(0);" {if $smarty.request.sortby eq 'cdesc'}onclick="sortByAscDesc('casc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'casc'}onclick="sortByAscDesc('cdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('cdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Banner Name{if $smarty.request.sortby eq 'cdesc'}<img class="arrow" src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'casc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img class="arrow" src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
					</a>
				</td>
				<!--<td width="25%" align="left" class="listHeaderCont">Banner Title</td>-->
				<td width="15%" align="center" class="listHeaderCont">{$LANG.admin_banner_image}</td>					
				<td width="15%" align="center" class="listHeaderCont">{$LANG.admin_date}</td>
				<td width="5%" align="center" class="listHeaderCont">Status</td>
				<td width="10%" align="center" class="listHeaderCont">{$LANG.admin_action}</td>					
			</tr>
			{section name="followers" loop="$followers_List"}
			{assign var="trvar" value=$smarty.section.followers.rownum}
			<tr {if $trvar is even}class="listLightGray"{/if}>
				<td align="center" class="listCont"><input type="checkbox" class="case" value="{$followers_List[followers].banner_id}" onclick="individualSelect();" /></td>
				<td align="center" class="listCont">{$followers_List[followers].sno}</td>
				<td align="left" class="listCont">{$followers_List[followers].banner_name|stripslashes}</td>
				<!--<td align="left" class="listCont">{$followers_List[followers].banner_title|stripslashes}</td>-->
				<td align="center" class="listCont">
					{if $followers_List[followers].banner_image neq ''}
						<div class="largeImgTooltip">
							<img src="{$SITE_BANNER_URL}/{$followers_List[followers].banner_image|stripslashes}" alt="{$followers_List[followers].banner_name|stripslashes}" title="{$followers_List[followers].banner_name|stripslashes}" class="imgborder" width="25" height="25"/>
							<span><img src="{$SITE_BANNER_URL}/{$followers_List[followers].banner_thumb|stripslashes}" alt="{$followers_List[followers].banner_name|stripslashes}" title="{$followers_List[followers].banner_name|stripslashes}" /></span>
						</div>
					{else}
						{$LANG.admin_empty}
					{/if}
				</td>
				<td align="center" class="listCont">{$followers_List[followers].addeddate|date_format}</td>				
				<td align="center" class="listCont" id="chgstatus{$followers_List[followers].banner_id}">
					{if $followers_List[followers].status eq '1'}
						<span onclick="return changeStatus('0','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$followers_List[followers].banner_id}');" style="cursor:pointer;">
							<i class="fa fa-check-square-o"></i>
						</span>
						{else}
						<span onclick="return changeStatus('1','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$followers_List[followers].banner_id}');" style="cursor:pointer;">
							<i class="fa fa-minus-square-o"></i>
						</span>
					{/if}
				</td>
				<td align="center" class="listCont">
					<span class="EditDeleteButton">
						<a href="bannerManageAdd.php?banner_id={$followers_List[followers].banner_id}" >
							<i class="fa fa-edit"></i>
						</a>
					</span>
					<span class="EditDeleteButton">
						<span onclick="return changeStatus('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$followers_List[followers].banner_id}','banner');" style="cursor:pointer;">
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
			<a class="btn btn-success" href="bannerManageAdd.php"><i class="fa fa-plus-circle"></i> {$LANG.admin_new}</a>
			<input type="button"  class="manageButton but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="manageButton but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" />
			<input type="button" class="manageButton but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','followers');" />
		</div>
		<!--Button List End-->
	</div>
	<!--Pagination End-->
</div>