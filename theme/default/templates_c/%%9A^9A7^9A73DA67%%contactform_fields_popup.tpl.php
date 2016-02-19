<?php /* Smarty version 2.6.3, created on 2015-12-22 12:11:34
         compiled from contactform_fields_popup.tpl */ ?>
<div class="popclose" onclick="$('.contact_custom_field').hide();$(this).html('');$('#contactmask').hide();"></div>
<form name="contactlist" id="contactformfieldfrm" class="no-margin">
    <input name="action" type="hidden" value="AddContactFields" />
    <input type="hidden" name="page_list_id"  value="<?php echo $_REQUEST['page_list_id']; ?>
"/>
	<div class="contactlabelsPopupLeft">
		<div class="span12 offset0">
			<label>Form Alanı Adını Girin</label>
			<input type="text" class="fieldName" name="label_name" id="label_name" value=""/>                
		</div>
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
			</div>
	<div class="contactlabelsPopupRight contactlabelsPopupLeft">
		<div class="span12 offset0">
			<label><?php echo $this->_tpl_vars['LANG']['spacing_name']; ?>
</label>
			<select class="width100 offset0" name="spacing" id="spacing">
				<option value="None" <?php if ($this->_tpl_vars['contactpopuplist']['1'] == 'None'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['for_none_name']; ?>
</option>
				<option value="Small" <?php if ($this->_tpl_vars['contactpopuplist']['1'] == 'Small'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['small_name']; ?>
</option>
				<option value="Medium" <?php if ($this->_tpl_vars['contactpopuplist']['1'] == 'Medium'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['medium_name']; ?>
</option>
				<option value="Large" <?php if ($this->_tpl_vars['contactpopuplist']['1'] == 'Large'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['large_name']; ?>
</option>
			</select>
		</div>
		<div id="widthdivs" class="span12 offset0">
			<label><?php echo $this->_tpl_vars['LANG']['small_name']; ?>
</label>
			<select class="width100 offset0" name="width" id="width">
				<option value="Small"  <?php if ($this->_tpl_vars['contactpopuplist']['2'] == 'Small'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['small_name']; ?>
</option>
				<option value="Medium" <?php if ($this->_tpl_vars['contactpopuplist']['2'] == 'Medium'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['medium_name']; ?>
</option>
				<option value="Large"  <?php if ($this->_tpl_vars['contactpopuplist']['2'] == 'Large'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['large_name']; ?>
</option>
			</select>
		</div>
		<div class="span12 offset0">
			<label><?php echo $this->_tpl_vars['LANG']['instruction_common_name']; ?>
</label>
			<textarea name="instruction" id="instruction" class="width100 offset0"><?php echo $this->_tpl_vars['contactpopuplist']['3']; ?>
</textarea>
		</div>
		<div class="span12 offset0">
			<input type="checkbox" name="required" id="required" class="no-mar" value="Y" <?php if ($this->_tpl_vars['contactpopuplist']['4'] == 1): ?>checked<?php endif; ?>/><span class="margin_left_5">Zorunlu</span>
		</div>
		<input type="button" value="Kaydet" onclick="AddContactFormField();" class="btn btn-small btn-primary">
	</div>		
</form>