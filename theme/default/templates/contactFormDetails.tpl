<div class="contactlabelsPopup">
<div class="popclose" onclick="popclose();"></div>
	<form name="contactlist" id="contactlist">
		<div class="contactlabelsPopupLeft">
			<label>{$LANG.field_title_name}</label>
			<input type="text" class="fieldName" name="fieldname" id="fieldname" value="{$contactpopuplist.0}"/>
		</div>
		<div class="contactlabelsPopupRight">
			<div class="required"><input type="checkbox" name="required" id="required" class="no-mar" value="1" {if $contactpopuplist.4 eq 1}checked{/if}/> <span>Required</span></div>
			<div class="contactlabelsPopupRightInner">
				<label>{$LANG.instruction_common_name}</label>
				<textarea name="instruction" id="instruction">{$contactpopuplist.3}</textarea>
				<label>{$LANG.spacing_name}</label>
				<select class="spacingOption" name="spacing" id="spacing">
					<option value="None" {if $contactpopuplist.1 eq 'None'}selected="selected"{/if}>{$LANG.for_none_name}</option>
					<option value="Small" {if $contactpopuplist.1 eq 'Small'}selected="selected"{/if}>{$LANG.small_name}</option>
					<option value="Medium" {if $contactpopuplist.1 eq 'Medium'}selected="selected"{/if}>{$LANG.medium_name}</option>
					<option value="Large" {if $contactpopuplist.1 eq 'Large'}selected="selected"{/if}>{$LANG.large_name}</option>
				</select>
				<label>{$LANG.small_name}</label>
				<select class="widthOption" name="width" id="width">
					<option value="Small"  {if $contactpopuplist.2 eq 'Small'}selected="selected"{/if}>{$LANG.small_name}</option>
					<option value="Medium" {if $contactpopuplist.2 eq 'Medium'}selected="selected"{/if}>{$LANG.medium_name}</option>
					<option value="Large"  {if $contactpopuplist.2 eq 'Large'}selected="selected"{/if}>{$LANG.large_name}</option>
				</select>
			</div>
			<div>
				<input type="button" value="save" onclick="saveDetails('{$contactpopuplist.5}','{$domainid}','{$pageid}','{$labelval}');">
			</div>
		</div>
	</form>
</div>	