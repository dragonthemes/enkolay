<!-----Delete Form Popup--->
<div id="deletePopup" style="display:none;">
<form name="delpopup" id="delpopup">
	<input type="hidden" name="delpageid" id="delepageid" value="">
	<input type="hidden" name="delpagelist" id="delepagelist" value="">
	<input type="hidden" name="delpagetext" id="delepagetext" value="">
	<input type="hidden" name="deldomainid" id="deledomid" value="">
	<div class="deletePopupTxt">
		{$LANG.are_you_sure_text}
	</div>
	<input type="button" class="deletePopupButton" name="submit" value="Delete" onclick="deleteListing();">
</form>
<div class="topArrow"></div>
</div>
<!--Delete Form Popup---->
<div id="sliderPoP" style="display:none;" class="sliderPopCont modal">
	<div class="imagelibraryloader"></div>
	{*include file="sliderPopUp.tpl"*}
</div>
<div id="sliderPopColumn" style="display:none;" class="sliderPopCont modal">
	<div class="imagelibraryloader"></div>
	{*include file="sliderPopUpColumn.tpl"*}
</div>
<div id="galleryPoP" style="display:none;" class="sliderPopCont modal">
	<div class="imagelibraryloader"></div>
	{*include file="galleryPopup.tpl"*}
</div>
<div id="galleryPoPColumn" style="display:none;" class="sliderPopCont modal">
	<div class="imagelibraryloader"></div>
	{*include file="galleryPopupColumn.tpl"*}
</div>
<div id="singlePoP" style="display:none;" class="sliderPopCont modal">
	<div class="imagelibraryloader"></div>
	{*include file="singleImagePopup.tpl"*}
</div>
<div id="imageTxtPop" style="display:none;" class="sliderPopCont modal">
	<div class="imagelibraryloader"></div>
	{*include file="singleImagePopup.tpl"*}
</div>
<div id="columnImagePoP" style="display:none;" class="sliderPopCont modal">
	<div class="imagelibraryloader"></div>
	{*include file="columnImagePopup.tpl"*}
</div>