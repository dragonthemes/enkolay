<div class="rightContHeading Heading">{$LANG.admin_fans_management} <a class="backButt pull-right" href="fansManage.php"><i class="fa fa-backward"></i> {$LANG.admin_back}</a></div>
<div class="ContBody clearfix">
	<div class="row-fluid sky-form form-horizontal skyformbgNon">
		<div class="span6">
			{if $totalRecords gt 0}
				<!-- Sort By -->
				<form name="fansmanage" class="no-mar" method="get" action="fansManage.php" />
					Sort By <span class="restManageCol">:</span> <span class="selctTopAlign">
					<label class="select">
							<select class="no-mar" name="sortby" id="sortby" size="1" onchange="document.fansmanage.submit();">
								<option value="">{$LANG.admin_select}</option>
								<optgroup label="Status">
									<option value="active" {if $smarty.request.sortby eq active} selected="selected"{/if}>&nbsp;&nbsp;Active</option>
                                    <option value="deactive" {if $smarty.request.sortby eq deactive} selected="selected"{/if}>&nbsp;&nbsp;Deactive</option>
								</optgroup>
								<optgroup label="Others">
									<option value="casc" {if $smarty.request.sortby eq 'casc'}selected="selected"{/if}>&nbsp;&nbsp;Fans Name A to Z</option>
									<option value="cdesc" {if $smarty.request.sortby eq 'cdesc'}selected="selected"{/if}>&nbsp;&nbsp;Fans Name Z to A</option>
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
					<input type="text" name="keyword" id="keyword" value="{$smarty.request.keyword}" class="no-mar" placeholder="Fans name">
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
		<span class="pull-right">
			<a class="btn btn-success" href="fansAddEdit.php"><i class="fa fa-plus-circle"></i> {$LANG.admin_new}</a>
			<input type="button"  class="manageButton but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="manageButton but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;" />
			<input type="button" class="manageButton but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','content');" />
		</span>
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
			<tr class="listHeader">
				<td width="3%" align="center" class="listHeaderCont"><input type="checkbox" id="selectall" onclick="selectDeselectAll();" /></td>
				<td width="7%" align="center" class="listHeaderCont">{$LANG.admin_sno}</td>
				<td width="25%" align="left" class="listHeaderCont">{$LANG.admin_fans_name}</td>
				<td width="15%" align="center" class="listHeaderCont">{$LANG.admin_fansurl}</td>
				<td width="15%" align="center" class="listHeaderCont">{$LANG.admin_date}</td>
				<td width="5%" align="center" class="listHeaderCont">{$LANG.status}</td>
				<td width="10%" align="center" class="listHeaderCont">{$LANG.admin_action}</td>
				
			</tr>
			{section name="fans" loop="$fans_list"}
			{assign var="trvar" value=$smarty.section.fans.rownum}
			<tr {if $trvar is even}class="listLightGray"{/if}>
				<td align="center" class="listCont"><input type="checkbox" class="case" value="{$fans_list[fans].fans_id}" onclick="individualSelect();" /></td>
				<td align="center" class="listCont">{$fans_list[fans].sno}</td>
				<td align="left" class="listCont">{$fans_list[fans].fans_name|stripslashes}</td>
				<td align="left" class="listCont">{$fans_list[fans].fans_url|stripslashes}</td>
				<td align="center" class="listCont">{$fans_list[fans].added_date}</td>				
				<td align="center" class="listCont" id="chgstatus{$fans_list[fans].fans_id}">
					{if $fans_list[fans].status eq '1'}
					<span onclick="return changeStatus('0','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$fans_list[fans].fans_id}');" style="cursor:pointer;">
						<i class="fa fa-check-square-o"></i>
					</span>
					{else}
					<span onclick="return changeStatus('1','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$fans_list[fans].fans_id}');" style="cursor:pointer;">
						<i class="fa fa-minus-square-o"></i>
					</span>
					{/if}
				</td>
				<td align="center" class="listCont">
					<span class="EditDeleteButton">
						<a href="fansAddEdit.php?fans_id={$fans_list[fans].fans_id}" >
							<img src="images/icon_edit.png" width="16" height="16" alt="Edit" title="Edit" />
						</a>
					</span>
					<span class="EditDeleteButton">
						<img src="images/icon_delete.png" width="14" height="14" alt="Delete" title="Delete" onclick="return changeStatus('delete','{$fieldname}','{$whereField}','{$tablename}','{$word}','{$fans_list[fans].fans_id}','fans');" style="cursor:pointer;" />
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
		<span class="pull-right">
			<a class="btn btn-success" href="fansAddEdit.php"><i class="fa fa-plus-circle"></i> {$LANG.admin_new}</a>
			<input type="button"  class="manageButton but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="manageButton but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;" />
			<input type="button" class="manageButton but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','content');" />
		</span>
	</div>
	
	<!--Pagination End-->
	<div class="clr"></div>
</div>