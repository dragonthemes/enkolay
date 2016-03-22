<div class="row-fluid">
	<div class="pull-right">
		<a class="btn btn-warning" onclick="hideTwodivForm('sitelisting_id','MyAccPageInner','formentries');">{$LANG.user_sitelist}</a>
		<a class="btn btn-success" href="{$SUBDOMAIN}">{if $seperatedetails.0.site_title}{$seperatedetails.0.site_title}{elseif $seperatedetails.0.site_title eq '' and $seperatedetails.0.blog_id}{$LANG.blog_title_name}{else}{$LANG.site_title_name}{/if}</a>
		<a class="btn btn-info" onclick="SettingFunction('{$seperatedetails.0.domain_id}','{$seperatedetails.0.theme_id}');">{$LANG.user_editlist}</a>
	</div>
	<div class="clr"></div>
 	{if $formdetails.0.id eq '' and $contactformpresent.0.contact eq '1'}
		<div class="tableListContainer">
			<table width="100%" border="0" class="tableListContent">
				<thead>
					<tr>
						<th>{$LANG.date_submitted_for_form}</th>  
						<th>{$LANG.ip_address_for_form}</th>
						<th>{$LANG.name_first_for_form}</th> 
						<th>{$LANG.name_last_for_form}</th> 
						<th>{$LANG.email_for_form}</th>
						<th>{$LANG.action_for_form}</th>
					</tr>
				</thead>
				<tbody>
					  <th colspan="6">{$LANG.no_records}</th>  
					
				</tbody>
			</table>
		</div>
	
	{elseif $contactformpresent.0.contact eq '0'}
		<div class="formThemeEntery">
			<div class="formThemeEnteryHead">{$LANG.user_form_name}</div>
			<div class="formThemeEnteryImage"></div>
		</div>
	{else}
		<div class="tableListContainer">
			<table width="100%" border="0" class="tableListContent">
				<thead>
					<tr>
						<th>{$LANG.date_submitted_for_form}</th>  
						<th>{$LANG.name_first_for_form}</th> 
						<th>{$LANG.name_last_for_form}</th> 
						<th>{$LANG.email_for_form}</th>
						<th>{$LANG.action_for_form}</th>
					</tr>
				</thead>
				<tbody>
					 {section name="formentry" loop="$formdetails"}
						<tr onclick="clickToShowForm('{$formdetails[formentry].id}');">
							<td>{$formdetails[formentry].addeddate|date_format:'%b %d, %Y'|utf8_encode}</td>
							<td>{$formdetails[formentry].firstname}</td>
							<td>{$formdetails[formentry].lastname}</td>
							<td>{$formdetails[formentry].email}</td>
							<td onclick="clickToDelete('{$formdetails[formentry].id}','{$formdetails[formentry].domain_id}')">Sil</td>
						</tr>
					{/section}
				</tbody>
			</table>
		</div>
	 {/if}
	<div id="showDetForm">
	</div>
</div>