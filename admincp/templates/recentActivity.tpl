<div class="Heading">{$LANG.recent_activity}</div>
<div class="ContBody clearfix">
	<!--Button Left start-->
	<div  class="clearfix">
		{if $totalRecords gt 0}	
		<!--Filter-->
		<span class="processButton pull-left" id="searchkey">
			<form name="filterform" class="no-mar" method="post" onsubmit="return filterValidation();">
				<input type="hidden" name="action"  value="filterProcess" />
				{$LANG.admin_keyword}:
				<input type="text" name="keyword" id="keyword" value="" class="no-mar" />
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
			<li class="pages">{$LANG.admin_per_page}
</li>	
		</ul>
		<!--Button Right start-->
		<span class="pull-right">
			<input type="button" class="manageButton but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','property');" />
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
			<thead>
				<tr class="listHeader leftNavblueBg">
					<th width="3%" align="center" class="listHeaderCont"><input type="checkbox" id="selectall" onclick="selectDeselectAll();" /></th>
					<th width="7%" align="center" class="listHeaderCont">{$LANG.admin_sno}</th>
					
					<th width="50%" align="left" class="listHeaderCont">
						{if $smarty.get.sortby eq 'tdesc'}
							<a href="{$filename}?sortby=tasc{if $smarty.get.limit neq ''}&limit={$smarty.get.limit}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}">
								{$LANG.user_name}<img class="arrow" src="images/icon_arrow_down.png" alt="Descending" title="Descending" />
							</a>
						{elseif $smarty.get.sortby eq 'tasc'}
							<a href="{$filename}?sortby=tdesc{if $smarty.get.limit neq ''}&limit={$smarty.get.limit}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}">
								{$LANG.user_name}<img class="arrow" src="images/icon_arrow_up.png" alt="Ascending" title="Ascending" />
							</a>
						{else}
							<a href="{$filename}?sortby=tasc{if $smarty.get.limit neq ''}&limit={$smarty.get.limit}{/if}{if $smarty.request.keyword neq ''}&keyword={$smarty.request.keyword}{/if}">
								{$LANG.user_name}<img class="arrow" src="images/icon_arrow_up.png" alt="Ascending" title="Ascending" />
							</a>
						{/if}
					</th>
					
					<th width="15%" align="center" class="listHeaderCont dc">{$LANG.recent_active}</th>					
					<th width="10%" align="center" class="listHeaderCont">{$LANG.user_addeddate}</th>
				</tr>
			</thead>
			<tbody>
				{section name="property" loop="$activities"}
				{assign var="trvar" value=$smarty.section.property.rownum}
					<tr {if $trvar is even}class="listLightGray"{/if} id="deletecate{$activities[property].id}">
						<td align="center" class="listCont"><input type="checkbox" class="case" value="{$activities[property].id}" onclick="individualSelect();" /></td>
						<td align="center" class="listCont">{$activities[property].id}</td>
						<td align="center" class="listCont">{$activities[property].user_id}</td>
						<td align="left" class="listCont txtInt10">{$activities[property].activity|stripslashes}</td>
						<td align="center" class="listCont">{$activities[property].addeddate|date_format}</td>
					</tr>
				{sectionelse}
					<tr><td colspan="10" align="center" class="noRec">{$LANG.admin_norecords}</td></tr>
				{/section}
			</tbody>
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
			<li class="pages">{$LANG.admin_per_page}
</li>	
		</ul>
		<!--Button List start-->
		<div class="pull-right">
			<input type="button" class="manageButton but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','property');" />
		</div>
		<!--Button List End-->
	</div>
	<!--Pagination End-->
</div>