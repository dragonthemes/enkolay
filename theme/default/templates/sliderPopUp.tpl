<div class="youtubepopclose" onclick=" $('#sliderPoP').hide();$('.loadmask').hide();"></div>
<div class="sliderPopupHead">
	SLAYT GÖSTERİSİ
</div>
<div class="row-fluid">
	<div class="span12 slidePopRhtScroll offset0">
		<div id="imageLibrary" class="clearfix library_content">
			<ul>
				<li><a href="#my_computer">Bilgisayarım</a></li>
				<li><a href="#image_library_content">Resim Kütüphanesi</a></li>
			</ul>
			<div id="my_computer">
				
				<div class="clearfix gallerytopbtn">
                    <form id="imageform_{$smarty.request.page_list_id}" class="nomargin addeditTop addeditbuttonForm form-horizontal SlideUploadForm" method="post" enctype="multipart/form-data" action='ajaxSliderImageUpload.php'>
    					<label id='imageloadbutton_{$smarty.request.page_list_id}' class="input input-file" for="file">
    						<div class="button">
    							<input type='file' name="photos[]" id="sliimg_{$smarty.request.page_list_id}" class="inputfile" size="1" onchange="sliderImageUpdatingProcess('{$smarty.request.page_list_id}');" multiple />
    							Yeni Resim Yükle
    						</div>
    						<input type='hidden' name="page_list_id" value="{$smarty.request.page_list_id}"/>
    					</label>
    				</form>	
    				<a style="display:none" class="nomargin upload_btn_save" onclick="galleryreload()" >Kaydet</a>
                </div>
				<div style="display:none" class="progress">
					<div class="bar"></div>
					<div class="percent">0%</div>
				</div>
				<div class="library_content_scroll clearfix">
				{if !$slider_images}
				<div id="preview"></div>
				<ul id="sortableImg" class="SlideUploadImge">
				</ul>
				{/if}
				{if $slider_images}
				<!--<div class="preview_image">Preview</div>-->
				<div class="clearfix"></div>
				<div id="preview"></div>
				<ul id="sortableImg" class="SlideUploadImge">
					{section name="sliimg" loop="$slider_images"}
					<li class="SlideUplWidtPopup">
						<img width="100%" src="{$SITE_DOMAIN_IMAGES_URL}/{$slider_images[sliimg].slider_images}">
						<a class="galleryimage" onclick="deleteSliImg('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$smarty.request.page_list_id}','{$slider_images[sliimg].slider_id}','{$slider_images[sliimg].slider_images}');"><img src="{$SITE_BASEURL}/images/Close.png" alt="" title="" /></a>
					</li>
					{/section}
				</ul> 
				{/if}
				</div>	
			</div>
			<div id="image_library_content" class="clearfix">
				<input type="button" class="upload_btn" value="Seçilenleri Ekle" onclick="uploadLibraryImages('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$smarty.request.page_list_id}','slider');" />
				<div class="library_content_scroll clearfix">{include file ='imageLibrary.tpl'}</div>
			</div>
		</div>
	</div>
 </div>
 {literal}
 <script type="text/javascript">
 	$(document).ready(function(){
	   imagelibrarytabs();	
	});          
 </script>	
 {/literal}