<div class="contact_custom_field" id="edit_custom_fields">
<div class="popclose" onclick="$('.contact_custom_field').hide();"></div>
	<form name="contactlist" id="contactlist">
        <input type="hidden" name="action" value="UpdatecontactFields" />
        <input type="hidden" name="page_list_id" value="{$smarty.post.page_list_id}"/>
        <input type="hidden" name="field_id" value="{$smarty.post.field_id}"/>
		<div class="contactlabelsPopupLeft">
			<label>{$LANG.field_title_name}</label>
			<input type="text" class="fieldName" name="fieldlabel" id="fieldlabel" value="{$contactfields.0.field_label_name}"/>
            <label>Field Name</label>
			<input type="text" class="fieldName" name="fieldname" id="fieldname" value="{$contactfields.0.field_post_name}"/>
            <br />
            {if $contactfields.0.field_type eq 'select'}
            <input type="text"  id="addopt" class="fieldName" /><br />
            <input class="btn btn-info margin_bottom_10" type="button" {if $contactfields[fields].required eq 'Y'}required=""{/if} value="Seçeneği Ekle" onclick="addOption('addopt','default_value')" />
            <br />
            <select  class="select" name="default_value[]"  id="default_value" multiple="multiple">
            {assign var='opt' value=","|explode:$contactfields.0.value}
            {section name='selopt' loop=$opt}
            <option>
            {$opt[selopt]}
            </option>
            {/section}
            </select><br />
            <span onclick="removeSelOptiuon();" class="btn btn-danger margin_bottom_10">Kaldır</span>   
            
            {elseif $contactfields.0.field_type eq 'radio'}
            
            <input type="text"  id="addopt" class="fieldName span7"/>
            <input type="button" class="btn btn-info margin_bottom_10 pull-right" {if $contactfields[fields].required eq 'Y'}required=""{/if} value="Seçeneği Ekle" onclick="addRadioButton('addopt','radiolist')" />
            <br />
            <div id="radiolist" class="formcustom">
			  {if $contactfields.0.value neq ''}
			  {assign var='opt' value=","|explode:$contactfields.0.value} 
			  {section name='selopt' loop=$opt}                
			  <label class="radio-inline">
				<input type="radio" value="{$opt[selopt]}" class="checkradio" name="{$contactfields.0.field_post_name}" />  {$opt[selopt]}
			  </label>
			  {/section}   
			  {/if}
			  <input type="hidden" name="default_value"  value="{$contactfields.0.value}" id="default_value" class="fieldName" />                       
            </div>
            
            <a onclick="removeOptiuon();" class="btn btn-danger margin_bottom_10">Kaldır</a>   
                        
            {elseif $contactfields.0.field_type eq 'checkbox'}
            
            <input type="text"  id="addopt" class="fieldName span7" />
            <input type="button" class="btn btn-info margin_bottom_10 pull-right" {if $contactfields[fields].required eq 'Y'}required=""{/if} value="Seçeneği Ekle" onclick="addCheckBox('addopt','checklist')" />
            <br />
            
            <div id="checklist" class="formcustom"> 
            {if $contactfields.0.value neq ''}
            {assign var='opt' value=","|explode:$contactfields.0.value}
            {section name='selopt' loop=$opt}                
            <label class="radio-inline">
           	<input type="checkbox" class="checkradio" value="{$opt[selopt]}" name="{$contactfields.0.field_post_name}[]"  /> {$opt[selopt]}
            </label>
            {/section}
            {/if}
            </div>
            <input type="hidden" name="default_value" value="{$contactfields.0.value}" id="default_value" />
            <a onclick="removeOptiuon();" class="btn btn-danger">Kaldır</a>            
            {else}
            <label>Default value</label>
		      <input type="text" class="fieldName" name="default_value" id="default_value" value="{$contactfields.0.value}"/>
            {/if}   
            {if $contactfields.0.field_type eq 'text' || $contactfields.0.field_type eq 'textarea' } 
            <label>Place Holder</label>
			<input type="text" class="fieldName" name="place_holder" id="place_holder" value="{$contactfields.0.place_holder}"/>
            {/if}
        </div>
		<div class="contactlabelsPopupRight">
			
			<div class="contactlabelsPopupRightInner">
				<label>{$LANG.instruction_common_name}</label>
				<textarea name="instruction" id="instruction">{$contactfields.0.instruction}</textarea>
				<label>{$LANG.spacing_name}</label>
				<select class="spacingOption" name="spacing" id="spacing">
					<option value="None" {if $contactfields.0.spacing eq 'None'}selected="selected"{/if}>{$LANG.for_none_name}</option>
					<option value="Small" {if $contactfields.0.spacing eq 'Small'}selected="selected"{/if}>{$LANG.small_name}</option>
					<option value="Medium" {if $contactfields.0.spacing eq 'Medium'}selected="selected"{/if}>{$LANG.medium_name}</option>
					<option value="Large" {if $contactfields.0.spacing eq 'Large'}selected="selected"{/if}>{$LANG.large_name}</option>
				</select>
                {if $contactfields.0.field_type eq 'text' || $contactfields.0.field_type eq 'textarea' || $contactfields.0.field_type eq 'select'}
				<label>{$LANG.small_name}</label>
				<select class="widthOption" name="width" id="width">
					<option value="Small"  {if $contactfields.0.size eq 'Small'}selected="selected"{/if}>{$LANG.small_name}</option>
					<option value="Medium" {if $contactfields.0.size eq 'Medium'}selected="selected"{/if}>{$LANG.medium_name}</option>
					<option value="Large"  {if $contactfields.0.size eq 'Large'}selected="selected"{/if}>{$LANG.large_name}</option>
				</select>
                {/if}
			</div>
            <div class="required"><input type="checkbox" name="required" id="required" class="no-mar" value="Y" {if $contactfields.0.required eq 'Y'}checked="checked"{/if} /> <span>Required</span></div>
			<div>
				<input type="button" value="save" onclick="SaveContactFields();" />
			</div>
		</div>
	</form>
</div>	
{literal}
<script>
//Add new select option
function addOption(txtid,selid)
{
    var textval = $("#"+txtid).val();    
    if(textval!=""){
        $('#'+selid).append("<option class='select'>"+$('#'+txtid).val()+"</option>");
        $("#"+txtid).val("");      
     }   
}
//Add new radio button
function addRadioButton(txtid,divid)
{
    var txtval  = $("#"+txtid).val();  
    var optlist="";  
    if(txtval=="")
    {
        alert('Please enter option value to add option');
    }
    else
    {
        $("#"+divid).append("<label class='radio-inline'><input class='checkradio' value='"+txtval+"' type='radio' /> "+txtval+"</label>");
        $("#"+txtid).val("");
        valueSeperate();
    }
}
//Add new check box
function addCheckBox(txtid,divid)
{
    var txtval  = $("#"+txtid).val();
    var optlist="";
    if(txtval=="")
    {
        alert('Please enter option value to add option');
    }
    else
    {
        $("#"+divid).append("<label class='radio-inline'><input class='checkradio' value='"+txtval+"' type='checkbox' /> "+txtval+"</label>");
        $("#"+txtid).val("");
        valueSeperate();
    }
}

//Remove selected radio or check boxes
function removeOptiuon()
{
    
    var length=$(".checkradio:checked").length;
    if(length==0)
    {
        alert("Please select any option to remove");
    }
    else
    {
        $(".checkradio:checked").parent().remove();
        valueSeperate();
    }
}
//Remove selected option in select box
function removeSelOptiuon()
{
    
    var length=$(".select option:selected").length;
    if(length==0)
    {
        alert("Please select any option to remove");
    }
    else
    {
        $(".select option:selected").remove();
        valueSeperate();
    }
}
//Seperate created option values in hidden feilds
function valueSeperate()
{
    var optlist="";
    $(".checkradio").each(function(){
        //alert($(this).val());
        optlist+=","+$(this).val();
    });
    $("#default_value").val(optlist.substr(1));
}
</script>
{/literal}