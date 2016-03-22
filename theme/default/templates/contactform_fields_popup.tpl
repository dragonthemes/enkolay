<div class="popclose" onclick="$('.contact_custom_field').hide();$(this).html('');$('#contactmask').hide();"></div>
<form name="contactlist" id="contactformfieldfrm" class="no-margin">
    <input name="action" type="hidden" value="AddContactFields" />
    <input type="hidden" name="page_list_id"  value="{$smarty.request.page_list_id}"/>
	<div class="contactlabelsPopupLeft">
		<div class="span12 offset0">
			<label>Form Alanı Adını Girin</label>
			<input type="text" class="fieldName" name="label_name" id="label_name" value=""/>                
		</div>
        {*<div class="span12 offset0">
			<label>Form Alanı Adını Girin</label>
			<input type="text" class="fieldName" name="field_name" id="field_name" value=""/>                
		</div>*}
		<div class="span12 offset0">
			<label>Alan Türünü Seçin</label>
			<select class="width100 offset0" name="field_type" id="field_type" onchange="changeoptionsdiv(this)">                    
				<option value="text">Metin Kutusu</option>
				<option value="select">Alta Açılan Seçenekler</option>
				<option value="textarea">Metin Alanı</option>
				<option value="radio">Seçenek Düğmeleri</option>
				<option value="checkbox">İşaretlenebilir Kutular</option>
                <option value="file">Dosya Yükleme</option>
			</select>
		</div>
        <div id="optionsdiv">
		<div class="span12 offset0" id="default_vauediv">
			<label>Varsayılan Değeri Girin</label>
			<input type="text" class="fieldName" name="default_value" id="default_value" value=""/>
		</div>
        </div>
		<div class="span12 offset0" id="placeholder_div">
			<label>Geçici Metni Girin</label>
			<input type="text" class="fieldName" name="place_holder" id="place_holder" value=""/>
		</div>
		{*<div class="span12 offset0">
			<label>Giriş Türünü Seçin</label>
			<select class="width100 offset0" name="" id="">
				<option>Metin</option>
				<option>Şifre</option>
				<option>Sayılar</option>
			</select>
		</div>*}
	</div>
	<div class="contactlabelsPopupRight contactlabelsPopupLeft">
		<div class="span12 offset0">
			<label>{$LANG.spacing_name}</label>
			<select class="width100 offset0" name="spacing" id="spacing">
				<option value="None" {if $contactpopuplist.1 eq 'None'}selected="selected"{/if}>{$LANG.for_none_name}</option>
				<option value="Small" {if $contactpopuplist.1 eq 'Small'}selected="selected"{/if}>{$LANG.small_name}</option>
				<option value="Medium" {if $contactpopuplist.1 eq 'Medium'}selected="selected"{/if}>{$LANG.medium_name}</option>
				<option value="Large" {if $contactpopuplist.1 eq 'Large'}selected="selected"{/if}>{$LANG.large_name}</option>
			</select>
		</div>
		<div id="widthdivs" class="span12 offset0">
			<label>{$LANG.small_name}</label>
			<select class="width100 offset0" name="width" id="width">
				<option value="Small"  {if $contactpopuplist.2 eq 'Small'}selected="selected"{/if}>{$LANG.small_name}</option>
				<option value="Medium" {if $contactpopuplist.2 eq 'Medium'}selected="selected"{/if}>{$LANG.medium_name}</option>
				<option value="Large"  {if $contactpopuplist.2 eq 'Large'}selected="selected"{/if}>{$LANG.large_name}</option>
			</select>
		</div>
		<div class="span12 offset0">
			<label>{$LANG.instruction_common_name}</label>
			<textarea name="instruction" id="instruction" class="width100 offset0">{$contactpopuplist.3}</textarea>
		</div>
		<div class="span12 offset0">
			<input type="checkbox" name="required" id="required" class="no-mar" value="Y" {if $contactpopuplist.4 eq 1}checked{/if}/><span class="margin_left_5">Zorunlu</span>
		</div>
		<input type="button" value="Kaydet" onclick="AddContactFormField();" class="btn btn-small btn-primary">
	</div>		
</form>