<div class="Heading">{$LANG.admin_manage_language} <a class="backButt pull-right" href="languageManageAdmin.php"><i class="fa fa-backward"></i> {$LANG.admin_back}</a></div>
<div class="ContBody clearfix">
	<div class="row-fluid sky-form form-horizontal skyformbgNon">
		<div class="span6">
			{if $totalRecords gt 0}
				<!-- Sort By -->
				<form name="languagemanage" class="no-mar" method="post" action="languageManageAdmin.php" />
					Sort By <span class="restManageCol">:</span> <span class="selctTopAlign">
					<label class="select">
							<select class="no-mar" name="sortby" id="sortby" size="1" onchange="document.languagemanage.submit();">
								<option value="">{$LANG.admin_select}</option>
								<optgroup label="Status">
									<option value="active" {if $smarty.request.sortby eq active} selected="selected"{/if}>&nbsp;&nbsp;Active</option>
									<option value="deactive" {if $smarty.request.sortby eq deactive} selected="selected"{/if}>&nbsp;&nbsp;Deactive</option>
								</optgroup>
								<optgroup label="Others">
									<option value="lnasc" {if $smarty.request.sortby eq 'lnasc'}selected="selected"{/if}>&nbsp;&nbsp;Language Name A to Z</option>
									<option value="lndesc" {if $smarty.request.sortby eq 'lndesc'}selected="selected"{/if}>&nbsp;&nbsp;Language Name Z to A</option>
									
									<option value="lcasc" {if $smarty.request.sortby eq 'lcasc'}selected="selected"{/if}>&nbsp;&nbsp;Language Code A to Z</option>
									<option value="lcdesc" {if $smarty.request.sortby eq 'lcdesc'}selected="selected"{/if}>&nbsp;&nbsp;Language Code Z to A</option>
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
					<input type="text" name="keyword" id="keyword" value="{$smarty.request.keyword}" class="no-mar" placeholder="Language name">
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
			<a class="btn btn-success" href="languageAddEdit.php">{$LANG.admin_new}</a>
			<input type="button"  class="manageButton but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="manageButton but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" />
			<input type="button" class="manageButton but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','language');" />
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
				<td width="30%" align="left" class="listHeaderCont">
					<a href="javascript:void(0);" {if $smarty.request.sortby eq 'lndesc'}onclick="sortByAscDesc('lnasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'lnasc'}onclick="sortByAscDesc('lndesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('lndesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Language Name{if $smarty.request.sortby eq 'lndesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'lnasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
				</td>
				<td width="15%" align="left" class="listHeaderCont">
					<a href="javascript:void(0);" {if $smarty.request.sortby eq 'lcdesc'}onclick="sortByAscDesc('lcasc','{$smarty.get.limit}','{$smarty.request.keyword}');"{elseif $smarty.request.sortby eq 'lcasc'}onclick="sortByAscDesc('lcdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{else}onclick="sortByAscDesc('lcdesc','{$smarty.get.limit}','{$smarty.request.keyword}');"{/if}>Language Code{if $smarty.request.sortby eq 'lcdesc'}<img src="images/icon_arrow_down.png" alt="" title="Descending" />{elseif $smarty.request.sortby eq 'lcasc'}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{else}<img src="images/icon_arrow_up.png" alt="" title="Ascending" />{/if}
					</a>
				</td>
				<td width="15%" align="center" class="listHeaderCont">Edit Languages Files</td>
					<td width="5%" align="center" class="listHeaderCont">Site Status</td>
				<td width="5%" align="center" class="listHeaderCont">Language Status</td>
				<td width="15%" align="center" class="listHeaderCont">{$LANG.admin_date}</td>
				<td width="15%" align="center" class="listHeaderCont">Action</td>
				{*<td width="10%" align="center" class="listHeaderCont">{$LANG.admin_sitelang}</td>*}
			</tr>
			{section name="lang" loop="$languageName_list"}
			{assign var="trvar" value=$smarty.section.lang.rownum}
			<tr {if $trvar is even}class="listLightGray"{/if} id="deletecate{$languageName_list[lang].lang_id}">
				<td align="center" class="listCont"><input type="checkbox" class="case" value="{$languageName_list[lang].lang_id}" onclick="individualSelect();" /></td>
				<td align="center" class="listCont">{$languageName_list[lang].sno}</td>
				<td align="left" class="listCont">{$languageName_list[lang].lang_name}</td>
				<td align="left" class="listCont">{$languageName_list[lang].lang_code}</td>
				<td align="left" class="listCont"><a href="languageAddEdit.php?langid={$languageName_list[lang].lang_id}&langcode={$languageName_list[lang].lang_code}&lfile=header.php"><i class="fa fa-edit"></i> {$languageName_list[lang].lang_code} Files</a></td>
				<td align="center" class="listCont">
					{if $languageName_list[lang].lang_site eq 'Yes'}
					{*<img src="images/star_yellow.png" alt="Active" title="Site Language" onclick="return changeStatus('0','lang_site','{$whereField}','{$tablename}','{$word}','{$languageName_list[lang].lang_id}');" style="cursor:pointer;" />*}
					<span onclick="return changeStatus('0','lang_site','{$whereField}','{$tablename}','{$word}','{$languageName_list[lang].lang_id}');" style="cursor:pointer;">
						<i class="fa fa-check-square-o"></i>
					</span>
					{else}
					<span onclick="return changeStatus('1','lang_site','{$whereField}','{$tablename}','{$word}','{$languageName_list[lang].lang_id}');" style="cursor:pointer;">
						<i class="fa fa-minus-square-o"></i>
					</span>
					{*<img src="images/star_grey.png" alt="Inactive" title="Inactive" onclick="return changeStatus('1','lang_site','{$whereField}','{$tablename}','{$word}','{$languageName_list[lang].lang_id}');" style="cursor:pointer;" />*}
					{/if}
				</td>
				<!-----language status-------->
				<td align="center" class="listCont">
					{if $languageName_list[lang].lang_status eq '1'}
				 	<span onclick="return changeStatus('0','lang_status','{$whereField}','{$tablename}','{$word}','{$languageName_list[lang].lang_id}');" style="cursor:pointer;">
						<i class="fa fa-check-square-o"></i>
					</span>
					{else}
					<span onclick="return changeStatus('1','lang_status','{$whereField}','{$tablename}','{$word}','{$languageName_list[lang].lang_id}');" style="cursor:pointer;">
						<i class="fa fa-minus-square-o"></i>
					</span>
				 	{/if}
				</td>
				<!-----lang status end------>
				<td align="center" class="listCont">{$languageName_list[lang].addeddate|date_format}</td>
				<td align="center" class="listCont"><a href="languageAddEdit.php?langid={$languageName_list[lang].lang_id}"><i class="fa fa-edit"></i></a></td>
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
			<li class="pages">{$LANG.admin_per_page}</li>	
		</ul>
		<!--Button List start-->
		<div class="pull-right marTop10">
			<input type="button"  class="manageButton but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="manageButton but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" />
			<input type="button" class="manageButton but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','language');" />
		</div>
		<!--Button List End-->
	</div>
	<!--Pagination End-->
</div>