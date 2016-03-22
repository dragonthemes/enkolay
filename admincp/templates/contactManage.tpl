<div class="rightContHeading Heading">{$LANG.admin_contact_management}<a class="backButt pull-right" href="contactManage.php"><i class="fa fa-backward"></i> {$LANG.admin_back}</a></div>
<div class="ContBody clearfix">
	<div class="row-fluid sky-form form-horizontal skyformbgNon">
		<div class="span6">
			{if $totalRecords gt 0}
				<!-- Sort By -->
				<form name="contactmanage" class="no-mar" method="get" action="contactManage.php" />
					Sort By <span class="restManageCol">:</span> <span class="selctTopAlign">
					<label class="select">
							<select class="no-mar" name="sortby" id="sortby" size="1" onchange="document.contactmanage.submit();">
								<option value="">{$LANG.admin_select}</option>
							 	<optgroup label="Mail to">
									<option value="casc" {if $smarty.request.sortby eq 'casc'}selected="selected"{/if}>&nbsp;&nbsp;Mail to A to Z</option>
									<option value="cdesc" {if $smarty.request.sortby eq 'cdesc'}selected="selected"{/if}>&nbsp;&nbsp;Mail to Z to A</option>
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
					<input type="text" name="keyword" id="keyword" value="{$smarty.request.keyword}" class="no-mar" placeholder="Domain name">
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
				<td width="15%" align="center" class="listHeaderCont">{$LANG.admin_mail_to}</td>
				<td width="15%" align="center" class="listHeaderCont">{$LANG.admin_page_name}</td>
                <td width="15%" align="center" class="listHeaderCont">{$LANG.admin_label1}</td>
                <td width="15%" align="center" class="listHeaderCont">{$LANG.admin_label2}</td>
                <td width="15%" align="center" class="listHeaderCont">{$LANG.admin_label3}</td>
                <td width="15%" align="center" class="listHeaderCont">{$LANG.admin_label4}</td>
                <td width="15%" align="center" class="listHeaderCont">{$LANG.admin_label5}</td>
				<td width="15%" align="center" class="listHeaderCont">{$LANG.admin_date}</td>
				<td width="15%" align="center" class="listHeaderCont">{$LANG.admin_action}</td>
				 				
			</tr>
			{section name="contact" loop="$contact_List"}
			{assign var="trvar" value=$smarty.section.contact.rownum}
			<tr {if $trvar is even}class="listLightGray"{/if}>
			 
				<td align="center" class="listCont">{$contact_List[contact].sno}</td>
				<td align="left" class="listCont">{$objAdminMgmt->getDomain($contact_List[contact].domain_id)}</td>
				<td align="left" class="listCont">{$contact_List[contact].mail_to|stripslashes}</td>
				<td align="left" class="listCont">{$objAdminMgmt->getPagename($contact_List[contact].page_id)}</td> 
                <td align="left" class="listCont">{$contact_List[contact].text1|stripslashes}</td>
                <td align="left" class="listCont">{$contact_List[contact].text2|stripslashes}</td>
                <td align="left" class="listCont">{$contact_List[contact].text3|stripslashes}</td>
                <td align="left" class="listCont">{$contact_List[contact].text4|stripslashes}</td>
                <td align="left" class="listCont">{$contact_List[contact].text5|stripslashes}</td>
				<td align="center" class="listCont">{$contact_List[contact].added_date}</td>
				<td align="center" class="listCont">
					<span class="EditDeleteButton">
						<a href="contactManageEdit.php?contact_id={$contact_List[contact].id}&page_id={$contact_List[contact].page_id}&domain_id={$contact_List[contact].domain_id}" >
							<i class="fa fa-edit"></i>
						</a>
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
	</div>
	
	<!--Pagination End-->
 
</div>