<div class="rightContHeading Heading">{$LANG.admin_static_management} <a class="backButt pull-right" href="staticPageManage.php"><i class="fa fa-backward"></i> {$LANG.admin_back}</a></div>
<div class="ContBody clearfix">
<div class="ContBody clearfix">
	 <div class="row-fluid sky-form form-horizontal skyformbgNon">
		<div class="span6">
			{if $totalRecords gt 0}
				<!-- Sort By -->
				<form name="staticpagemanage" class="no-mar" method="post" action="staticPageManage.php" />
					Sort By <span class="restManageCol">:</span> <span class="selctTopAlign">
					<label class="select">
							<select class="no-mar" name="sortby" id="sortby" size="1" onchange="document.staticpagemanage.submit();">
								<option value="">{$LANG.admin_select}</option>
								<optgroup label="Status">
									<option value="active" {if $smarty.request.sortby eq active} selected="selected"{/if}>&nbsp;&nbsp;Active</option>
									<option value="deactive" {if $smarty.request.sortby eq deactive} selected="selected"{/if}>&nbsp;&nbsp;Deactive</option>
								</optgroup>
								<optgroup label="Others">
									<option value="tasc" {if $smarty.request.sortby eq 'tasc'}selected="selected"{/if}>&nbsp;&nbsp;Content Name A to Z</option>
									<option value="tdesc" {if $smarty.request.sortby eq 'tdesc'}selected="selected"{/if}>&nbsp;&nbsp;Content Name Z to A</option>
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
					<input type="text" name="keyword" id="keyword" value="{$smarty.request.keyword}" class="no-mar" placeholder="Content name">
					<input type="submit" name="filter" value="Filter" class="btn btn-success">
					<input type="button" name="clear" value="Clear" class="btn btn-danger" id="clear" onclick="return clearFilterTxtBox();">		 
				</form>
					 
			</div>
			
			{/if}
			
		</div>
		<!--Button Left End-->
	</div>
</div>
	<!--Pagination Start-->
	<div class="pageContTop sky-form form-horizontal skyformbgNon">
		<ul class="page">
			<li>{$fromRecords} to {$toRecords} of {$totalRecords}</li>
			<li class="pages">{$LANG.admin_show}</li>
			<li class="pages">
				<label class="select">
					<select class="pageSelectbox" onchange="{if $smarty.get.display_type eq O}ShowPerDisplayOthers(this.value,'{$filename}','O'){/if}{if $smarty.get.mainmenuid neq ''}showPerPageSubMenu(this.value,'{$filename}','{$smarty.get.mainmenuid}'){/if}{if $smarty.get.display_type eq '' && $smarty.get.mainmenuid eq ''}showPerPage(this.value,'{$filename}'){/if};" >
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
			{if $smarty.get.display_type eq O}
			<a class="btn btn-success" href="staticPageAddEdit.php?display_type=O"><i class="fa fa-plus-circle"></i> {$LANG.admin_new}</a>
			{elseif $smarty.get.mainmenuid eq $mainmenuid}
			<a class="btn btn-success" href="staticPageAddEdit.php"><i class="fa fa-plus-circle"></i> {$LANG.admin_new}</a>
			{else}
			<a class="btn btn-success" href="staticPageAddEdit.php"><i class="fa fa-plus-circle"></i> {$LANG.admin_new}</a>
			{/if}
			 	<input type="button"  class="manageButton but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
				<input type="button" class="manageButton but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;" />
				<input type="button" class="manageButton but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','content');" />
		</span>
		<!--Button List End--> 
	</div>
	<!--Error Msg-->
	<span id="errormsg" class="themeSuccessMsg">{$ErrorMessage}</span>
	<!--Page Navigation-->
	<div class="paginationCont">
		{$pagination}
	</div>
	<!--Pagination End-->
	<!--List Start-->
	<div class="tableListContainer">
		<table width="100%" border="0" bordercolor="#ddd" class="tableListContent">
			<tr class="listHeader leftNavblueBg">
				<td width="3%" align="center" class="listHeaderCont"><input type="checkbox" id="selectall" onclick="selectDeselectAll();" /></td>
				<td width="7%" align="center" class="listHeaderCont">{$LANG.admin_sno}</td>
				<td width="40%" align="left" class="listHeaderCont">
				{if $smarty.get.sortby eq 'tdesc'}
						<a href="{$filename}?sortby=tasc{if $smarty.get.limit neq ''}&limit={$smarty.get.limit}{/if}{if $smarty.get.display_type eq O}&display_type=O{/if}{if $smarty.get.mainmenuid neq ''}&mainmenuid={$smarty.get.mainmenuid}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}">
							{$LANG.admin_content_name}<img src="images/icon_arrow_down.png" alt="Descending" title="Descending" />
						</a>
					{elseif $smarty.get.sortby eq 'tasc'}
						<a href="{$filename}?sortby=tdesc{if $smarty.get.limit neq ''}&limit={$smarty.get.limit}{/if}{if $smarty.get.display_type eq O}&display_type=O{/if}{if $smarty.get.mainmenuid neq ''}&mainmenuid={$smarty.get.mainmenuid}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}">
							{$LANG.admin_content_name}<img src="images/icon_arrow_up.png" alt="Ascending" title="Ascending" />
						</a>
					{else}
						<a href="{$filename}?sortby=tasc{if $smarty.get.limit neq ''}&limit={$smarty.get.limit}{/if}{if $smarty.get.display_type eq O}&display_type=O{/if}{if $smarty.get.mainmenuid neq ''}&mainmenuid={$smarty.get.mainmenuid}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}">
							{$LANG.admin_content_name}<img src="images/icon_arrow_up.png" alt="Ascending" title="Ascending" />
						</a>
					{/if}
				</td>	
				<td width="15%" align="center" class="listHeaderCont">{$LANG.admin_date}</td>
				<td width="5%" align="center" class="listHeaderCont">{$LANG.admin_status}</td>
				<td width="10%" align="center" class="listHeaderCont">{$LANG.admin_action}</td>
			</tr>
			{section name="static" loop="$static_List"}
			{assign var="trvar" value=$smarty.section.content.rownum}
			<tr {if $trvar is even}class="listLightGray"{/if}>
				<td align="center" class="listCont"><input type="checkbox" class="case" value="{$static_List[static].content_id}" onclick="individualSelect();" /></td>
				<td align="center" class="listCont">{$static_List[static].sno}</td>
				<td align="left" class="listCont">{$static_List[static].content_name|stripslashes}</td>	
				<td align="center" class="listCont">{$static_List[static].addeddate|date_format}</td>
				
				<td align="center" class="listCont" id="chgstatus{$static_List[static].content_id}">
					{if $static_List[static].status eq '1'}
						<span onclick="return changeStatus('0','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$static_List[static].content_id}');" style="cursor:pointer;">
							<i class="fa fa-check-square-o"></i>
						</span>
						{elseif $static_List[static].status eq '0'}
						<span onclick="return changeStatus('1','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$static_List[static].content_id}');" style="cursor:pointer;">
							<i class="fa fa-minus-square-o"></i>
						</span>
					{/if}
				</td>
				<td align="center" class="listCont">
					<span class="EditDeleteButton">
						{if $smarty.get.display_type eq 'O'}
						<a href="staticPageAddEdit.php?conid={$static_List[static].content_id}&display_type=O"><i class="fa fa-edit"></i></a>
						{elseif $smarty.get.mainmenuid neq ''}
						<a href="staticPageAddEdit.php?conid={$static_List[static].content_id}&mainmenuid={$smarty.get.mainmenuid}"><i class="fa fa-edit"></i></a>
						{else}
						<a href="staticPageAddEdit.php?conid={$static_List[static].content_id}"><i class="fa fa-edit"></i></a>
						{/if}
					</span> 
					<span class="EditDeleteButton">
						<span onclick="return changeStatus('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$static_List[static].content_id}','content');" style="cursor:pointer;">
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
			<li class="pages">{$LANG.admin_show}</li>
			<li class="pages">
				<label class="select">
					<select class="pageSelectbox" onchange="{if $smarty.get.display_type eq O}ShowPerDisplayOthers(this.value,'{$filename}','O'){/if}{if $smarty.get.mainmenuid neq ''}showPerPageSubMenu(this.value,'{$filename}','{$smarty.get.mainmenuid}'){/if}{if $smarty.get.display_type eq '' && $smarty.get.mainmenuid eq ''}showPerPage(this.value,'{$filename}'){/if};" >
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
		<div class="pull-right">
			{if $smarty.get.display_type eq O}
			<a class="btn btn-success" href="staticPageAddEdit.php?display_type=O"><i class="fa fa-plus-circle"></i> {$LANG.admin_new}</a>
			{elseif $smarty.get.mainmenuid eq $mainmenuid}
			<a class="btn btn-success" href="staticPageAddEdit.php"><i class="fa fa-plus-circle"></i> {$LANG.admin_new}</a>
			{else}
			<a class="btn btn-success" href="staticPageAddEdit.php"><i class="fa fa-plus-circle"></i> {$LANG.admin_new}</a>
			{/if}
			<input type="button"  class="manageButton but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="manageButton but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;" />
			<input type="button" class="manageButton but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','content');" />
		</div>
		<!--Button List End-->
	</div>
	<!--Pagination End-->
</div>