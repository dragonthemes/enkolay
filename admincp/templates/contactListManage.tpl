<div class="rightContHeading Heading">{$LANG.admin_contactlist} <a class="backButt pull-right" href="contactListManage.php"><i class="fa fa-backward"></i> {$LANG.admin_back}</a></div>
<div class="ContBody clearfix">
	<div class="row-fluid sky-form form-horizontal skyformbgNon">
		<div class="span6">
			{if $totalRecords gt 0}
				<!-- Sort By -->
				<form name="contactlistmanage" class="no-mar" method="get" action="contactListManage.php" />
					Sort By <span class="restManageCol">:</span> <span class="selctTopAlign">
					<label class="select">
							<select class="no-mar" name="sortby" id="sortby" size="1" onchange="document.contactlistmanage.submit();">
								<option value="">{$LANG.admin_select}</option>
							 	<optgroup label="First name">
									<option value="casc" {if $smarty.request.sortby eq 'casc'}selected="selected"{/if}>&nbsp;&nbsp;First Name A to Z</option>
									<option value="cdesc" {if $smarty.request.sortby eq 'cdesc'}selected="selected"{/if}>&nbsp;&nbsp;First Name Z to A</option>
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
					<input type="text" name="keyword" id="keyword" value="{$smarty.request.keyword}" class="no-mar" placeholder="First name">
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
				<td width="15%" align="center" class="listHeaderCont">{$LANG.admin_firstname}</td>
                <td width="15%" align="center" class="listHeaderCont">{$LANG.admin_lastname}</td>
				<td width="15%" align="center" class="listHeaderCont">{$LANG.admin_email}</td>
                <td width="15%" align="center" class="listHeaderCont">{$LANG.admin_comments}</td>
                <td width="15%" align="center" class="listHeaderCont">{$LANG.admin_commentor_ip}</td>
                <td width="15%" align="center" class="listHeaderCont">{$LANG.admin_addeddate}</td>
				<!--<td width="10%" align="center" class="listHeaderCont">{$LANG.admin_action}</td>-->					
			</tr>
			{section name="con" loop="$contacts"}			
			{assign var="trvar" value=$smarty.section.con.rownum}
			<tr {if $trvar is even}class="listLightGray"{/if}>
			<!--	<td align="center" class="listCont"><input type="checkbox" class="case" value="{$domain_image[image].img_id}" onclick="individualSelect();" /></td>-->
				<td align="center" class="listCont">{$contacts[con].sno}</td>
                <td align="center" class="listCont">{$objAdminMgmt->getDomain($contacts[con].domain_id)}</td>
                <td align="center" class="listCont">{$contacts[con].firstname}</td>
                <td align="center" class="listCont">{$contacts[con].lastname}</td>	
                <td align="center" class="listCont">{$contacts[con].email}</td>
                <td align="center" class="listCont">{$contacts[con].comments}</td>
				<td align="center" class="listCont">{$contacts[con].commentor_ip}</td> 
                <td align="center" class="listCont">{$contacts[con].addeddate}</td>
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
		<!--Button List start-->
		<div class="pull-right">
			<input type="button"  class="manageButton but_activate" value="Activate" onclick="adminActivateDeactivate('1','{$fieldname}','{$whereField}','{$tablename}','{$word}');" style="display:none;"/>
			<input type="button" class="manageButton but_deactivate" value="Deactivate" style="display:none;" onclick="adminActivateDeactivate('0','{$fieldname}','{$whereField}','{$tablename}','{$word}');" />
			<input type="button" class="manageButton but_delete" value="Delete" style="display:none;" onclick="adminActivateDeactivate('delete','deletefield','{$whereField}','{$tablename}','{$word}','image');" />
		</div>
		<!--Button List End-->
	</div>
	
	<!--Pagination End-->
</div>