<div class="row-fluid">
	{$objCommon->getAdvancedOption()}
	<div class="storeDahboradHead clearfix">
		{$LANG.ship_list}
	</div>
	<form id="advancestore" class="no-mar">
		<div class="span7 offset0 marTop10">
			<div class="store_addProduct">
				<label>{$LANG.google_analytics}</label>
				<textarea name="googleanalytics" id="googleanalytics">{$advanceinfo.0.advanced_option}</textarea>
			</div>
			<div class="clr"></div>
			<div class="marTop20">
				<input type="button" class="footerutton" name="save" value="Save" onclick="saveAdvancedOption();">
			</div>
		</div>
	</form>
</div>