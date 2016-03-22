{section name='fields' loop=$contactfields}

{if $contactfields[fields].field_type eq 'text' }
<div class="span4 offset0 marTop10 relatepop clr formcustombuild_new formcustom" id="divfld{$contactfields[fields].field_id}">
	<div class="span12 contactLisNav"><span onclick="showContactFormFieldsList('{$contactfields[fields].field_id}','{$contactfields[fields].page_list_id}');">{$contactfields[fields].field_label_name}</span>{if $contactfields[fields].required}<span class="red">*</span>{/if}</div>
	<div class="clearfix"></div>
	<input class="contacttxtbx" type="text" style="{if $contactfields[fields].spacing eq 'None'}margin:0px;{elseif $contactfields[fields].spacing eq 'Small'}margin:5px 0px;{elseif $contactfields[fields].spacing eq 'Medium'}margin:10px 0px;{elseif $contactfields[fields].spacing eq 'Large'}margin:15px 0px;{/if}{if $contactfields[fields].size eq 'Small'}width:50%;{elseif $contactfields[fields].size eq 'Medium'}width:70%;{elseif $contactfields[fields].size eq 'Large'}width:100%;{/if}" value="{$contactfields[fields].value}" onclick="showContactFormFieldsList('{$contactfields[fields].field_id}','{$contactfields[fields].page_list_id}');" name="{$contactfields[fields].field_label_name}"  placeholder="{$contactfields[fields].place_holder}" {if $contactfields[fields].required eq 'Y'}required=""{/if} />{if $contactfields[fields].instruction}<span class="instruction-right left">{$contactfields[fields].instruction}</span>{/if}
    <span class="deleteField" onclick="deleteCustomeFields('{$contactfields[fields].field_id}','divfld{$contactfields[fields].field_id}')" ><i class="fa fa-trash-o"></i></span>
</div>
{/if}

{if $contactfields[fields].field_type eq 'file' }
<div class="span4 offset0 marTop10 relatepop clr formcustombuild_new formcustom" id="divfld{$contactfields[fields].field_id}">
	<div class="span12 contactLisNav"><span onclick="showContactFormFieldsList('{$contactfields[fields].field_id}','{$contactfields[fields].page_list_id}');">{$contactfields[fields].field_label_name}</span>{if $contactfields[fields].required}<span class="red">*</span>{/if}</div>
	<div class="clearfix"></div>
	<input type="file" style="{if $contactfields[fields].spacing eq 'None'}margin:0px;{elseif $contactfields[fields].spacing eq 'Small'}margin:5px 0px;{elseif $contactfields[fields].spacing eq 'Medium'}margin:10px 0px;{elseif $contactfields[fields].spacing eq 'Large'}margin:15px 0px;{/if}{if $contactfields[fields].size eq 'Small'}width:50%;{elseif $contactfields[fields].size eq 'Medium'}width:70%;{elseif $contactfields[fields].size eq 'Large'}width:100%;{/if}" value="{$contactfields[fields].value}" onclick="showContactFormFieldsList('{$contactfields[fields].field_id}','{$contactfields[fields].page_list_id}');" name="{$contactfields[fields].field_label_name}"  placeholder="{$contactfields[fields].place_holder}" {if $contactfields[fields].required eq 'Y'}required=""{/if} />{if $contactfields[fields].instruction}<span class="instruction-right left">{$contactfields[fields].instruction}</span>{/if}
    <span class="deleteField" onclick="deleteCustomeFields('{$contactfields[fields].field_id}','divfld{$contactfields[fields].field_id}')" ><i class="fa fa-trash-o"></i></span>
</div>
{/if}

{if $contactfields[fields].field_type eq 'radio' }
<div class="span4 offset0 marTop10 relatepop clr formcustombuild_new formcustom" id="divfld{$contactfields[fields].field_id}">
	<div class="span12 contactLisNav"><span onclick="showContactFormFieldsList('{$contactfields[fields].field_id}','{$contactfields[fields].page_list_id}');">{$contactfields[fields].field_label_name}</span>{if $contactfields[fields].required}<span class="red">*</span>{/if}</div>
	<div class="clearfix"></div>
	{assign var='opt' value=","|explode:$contactfields[fields].value}
    {section name='selopt' loop=$opt}                
    <label class="radio-inline" style="{if $contactfields[fields].spacing eq 'None'}margin:0px;{elseif $contactfields[fields].spacing eq 'Small'}margin:5px 0px;{elseif $contactfields[fields].spacing eq 'Medium'}margin:10px 0px;{elseif $contactfields[fields].spacing eq 'Large'}margin:15px 0px;{/if}">
    		<input class="flt" type="radio" name="{$contactfields[fields].field_post_name}" onclick="showContactFormFieldsList('{$contactfields[fields].field_id}','{$contactfields[fields].page_list_id}');" value="{$opt[selopt]}" {if $contactfields[fields].required eq 'Y'}required=""{/if} /> {$opt[selopt]}{if $contactfields[fields].instruction}<span class="instruction-right left">{$contactfields[fields].instruction}</span>{/if}
	</label>
    
    {sectionelse}
    <label class="radio-inline" style="{if $contactfields[fields].spacing eq 'None'}margin:0px;{elseif $contactfields[fields].spacing eq 'Small'}margin:5px 0px;{elseif $contactfields[fields].spacing eq 'Medium'}margin:10px 0px;{elseif $contactfields[fields].spacing eq 'Large'}margin:15px 0px;{/if}" >
    		<input class="flt" type="radio" name="{$contactfields[fields].field_post_name}" onclick="showContactFormFieldsList('{$contactfields[fields].field_id}','{$contactfields[fields].page_list_id}');" value="" {if $contactfields[fields].required eq 'Y'}required=""{/if} />{if $contactfields[fields].instruction}<span class="instruction-right left">{$contactfields[fields].instruction}</span>{/if}
	</label>
    {/section}
   <span class="deleteField" onclick="deleteCustomeFields('{$contactfields[fields].field_id}','divfld{$contactfields[fields].field_id}')" ><i class="fa fa-trash-o"></i></span>
</div>
{/if}
{if $contactfields[fields].field_type eq 'checkbox' }
<div class="span4 offset0 marTop10 relatepop clr formcustombuild_new formcustom" id="divfld{$contactfields[fields].field_id}">
	<div class="span12 contactLisNav"><span onclick="showContactFormFieldsList('{$contactfields[fields].field_id}','{$contactfields[fields].page_list_id}');">{$contactfields[fields].field_label_name}</span>{if $contactfields[fields].required}<span class="red">*</span>{/if}</div>
	<div class="clearfix"></div>
	{assign var='opt' value=","|explode:$contactfields[fields].value}
    {section name='selopt' loop=$opt}                
    <label class="radio-inline"  style="{if $contactfields[fields].spacing eq 'None'}margin:0px;{elseif $contactfields[fields].spacing eq 'Small'}margin:5px 0px;{elseif $contactfields[fields].spacing eq 'Medium'}margin:10px 0px;{elseif $contactfields[fields].spacing eq 'Large'}margin:15px 0px;{/if}">
    		<input class="flt" type="checkbox" name="{$contactfields[fields].field_post_name}[]" onclick="showContactFormFieldsList('{$contactfields[fields].field_id}','{$contactfields[fields].page_list_id}');" value="{$opt[selopt]}" {if $contactfields[fields].required eq 'Y'}required=""{/if} /> {$opt[selopt]}{if $contactfields[fields].instruction}<span class="instruction-right left">{$contactfields[fields].instruction}</span>{/if}
    </label>
    
    {sectionelse}
    <label class="radio-inline" style="{if $contactfields[fields].spacing eq 'None'}margin:0px;{elseif $contactfields[fields].spacing eq 'Small'}margin:5px 0px;{elseif $contactfields[fields].spacing eq 'Medium'}margin:10px 0px;{elseif $contactfields[fields].spacing eq 'Large'}margin:15px 0px;{/if}">
  		<input class="flt" type="checkbox" name="{$contactfields[fields].field_post_name}" onclick="showContactFormFieldsList('{$contactfields[fields].field_id}','{$contactfields[fields].page_list_id}');" value="" {if $contactfields[fields].required eq 'Y'}required=""{/if} />{if $contactfields[fields].instruction}<span class="instruction-right left">{$contactfields[fields].instruction}</span>{/if}
	</label>
    {/section}
    <span class="deleteField" onclick="deleteCustomeFields('{$contactfields[fields].field_id}','divfld{$contactfields[fields].field_id}')" ><i class="fa fa-trash-o"></i></span>
</div>

{/if}

{if $contactfields[fields].field_type eq 'select' }
<div class="span4 offset0 marTop10 relatepop clr formcustombuild_new formcustom" id="divfld{$contactfields[fields].field_id}">
	<div class="span12 contactLisNav"><span onclick="showContactFormFieldsList('{$contactfields[fields].field_id}','{$contactfields[fields].page_list_id}');">{$contactfields[fields].field_label_name}</span>{if $contactfields[fields].required}<span class="red">*</span>{/if}</div>
	<div class="clearfix"></div>
	{assign var='opt' value=","|explode:$contactfields[fields].value}
     <select style="{if $contactfields[fields].spacing eq 'None'}margin:0px;{elseif $contactfields[fields].spacing eq 'Small'}margin:5px 0px;{elseif $contactfields[fields].spacing eq 'Medium'}margin:10px 0px;{elseif $contactfields[fields].spacing eq 'Large'}margin:15px 0px;{/if}{if $contactfields[fields].size eq 'Small'}width:50%;{elseif $contactfields[fields].size eq 'Medium'}width:70%;{elseif $contactfields[fields].size eq 'Large'}width:100%;{/if}" name="{$contactfields[fields].field_post_name}" onclick="showContactFormFieldsList('{$contactfields[fields].field_id}','{$contactfields[fields].page_list_id}');" {if $contactfields[fields].required eq 'Y'}required=""{/if}>
     {assign var='opt' value=","|explode:$contactfields[fields].value}
     {section name='selopt' loop=$opt}
     <option>{$opt[selopt]}</option>
     {/section}
     </select>
     {if $contactfields[fields].instruction}<span class="instruction-right left">{$contactfields[fields].instruction}</span>{/if}
	<span class="deleteField" onclick="deleteCustomeFields('{$contactfields[fields].field_id}','divfld{$contactfields[fields].field_id}')" ><i class="fa fa-trash-o"></i></span>
</div>
{/if}

{if $contactfields[fields].field_type eq 'textarea' }
<div class="span4 offset0 marTop10 relatepop clr formcustombuild_new formcustom" id="divfld{$contactfields[fields].field_id}">
	<div class="span12 contactLisNav"><span onclick="showContactFormFieldsList('{$contactfields[fields].field_id}','{$contactfields[fields].page_list_id}');">{$contactfields[fields].field_label_name}</span>{if $contactfields[fields].required}<span class="red">*</span>{/if}</div>
	<div class="clearfix"></div>
	<textarea class="contacttxtarea" style="{if $contactfields[fields].spacing eq 'None'}margin:0px;{elseif $contactfields[fields].spacing eq 'Small'}margin:5px 0px;{elseif $contactfields[fields].spacing eq 'Medium'}margin:10px 0px;{elseif $contactfields[fields].spacing eq 'Large'}margin:15px 0px;{/if}{if $contactfields[fields].size eq 'Small'}width:50%;{elseif $contactfields[fields].size eq 'Medium'}width:70%;{elseif $contactfields[fields].size eq 'Large'}width:100%;{/if}" placeholder="{$contactfields[fields].place_holder}"  name="{$contactfields[fields].field_label_name}" {if $contactfields[fields].required eq 'Y'}required=""{/if} onclick="showContactFormFieldsList('{$contactfields[fields].field_id}','{$contactfields[fields].page_list_id}');">{$contactfields[fields].value}</textarea>{if $contactfields[fields].instruction}<span class="instruction-right left">{$contactfields[fields].instruction}</span>{/if}
    <span class="deleteField" onclick="deleteCustomeFields('{$contactfields[fields].field_id}','divfld{$contactfields[fields].field_id}')" ><i class="fa fa-trash-o"></i></span>
</div>
{/if}
{/section}
