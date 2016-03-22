<div class="youtubepopclose" onclick=" $('#galleryPoP').hide();$('.loadmask').hide();"></div>
<div class="sliderPopupHead">
	RESİM GALERİSİ
</div>
<div class="row-fluid">    
    <div class="span12 slidePopRhtScroll offset0">
		<div id="gallery_imageLibrary" class="clearfix library_content">        
        <ul>
				<li><a href="#my_computer">Bilgisayarım</a></li>
				<li><a href="#image_library_content">Resim Kütüphanesi</a></li>
		</ul>
        <div id="my_computer">
        	
			<div class="clearfix gallerytopbtn">
				<form id="imageform_{$smarty.request.page_list_id}" class="nomargin addeditTop addeditbuttonForm form-horizontal SlideUploadForm" method="post" enctype="multipart/form-data" action='ajaxGalleryImageUpload.php'>
					<label id='imageloadbutton_{$smarty.request.page_list_id}' class="input input-file" for="file">
						<div class="button">
							<input type='file' name="photos[]" id="photoimg_{$smarty.request.page_list_id}" class="inputfile" size="1" onchange="galleryImageUpdatingProcess('{$smarty.request.page_list_id}');" multiple="" />
							Yeni Resim Yükle
						</div>
						<input type='hidden' name="page_list_id" value="{$smarty.request.page_list_id}"/>
					</label>
				</form>	
				<a class="nomargin upload_btn_save" onclick="galleryreload();">Kaydet</a>	
			</div>	
        	<div style="display:none" class="progress">
              <div class="bar"></div>
              <div class="percent">0%</div>
          </div>
		<div class="library_content_scroll clearfix">
    		 {if !$gallery_images}
    			<div id="preview"></div>
    			<ul id="sortableGalImg" class="SlideUploadImge">
    			</ul>
    		{/if}
    		 {if $gallery_images}
		 	<div class="clearfix"></div>
    			 <div id="preview"></div>
    			 <ul id="sortableGalImg" class="SlideUploadImge">
    				{section name="galimg" loop="$gallery_images"}
    					<li class="SlideUplWidtPopup">
    						<img width="100%" height="150" src="{$SITE_DOMAIN_IMAGES_URL}/{$gallery_images[galimg].gallery_name}" />
    						<a class="galleryimage" onclick="deleteGalImg('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$smarty.request.page_list_id}','{$gallery_images[galimg].gallery_id}','{$gallery_images[galimg].gallery_name}');" class="galleryimage"><img src="{$SITE_BASEURL}/images/Close.png" alt="" title="" /></a>
    					</li>
    				{/section}
    			</ul> 
    		 {/if}
		 </div>
         </div>
         <div id="image_library_content" class="clearfix">
          	<input type="button" class="upload_btn" value="Seç ve Ekle" onclick="uploadLibraryImages('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$smarty.request.page_list_id}','gallery');" />
			<div class="library_content_scroll clearfix image_library">
				{include file ='imageLibrary.tpl'}
			</div>
		</div>
        </div> 
	</div>
 </div>
{literal}
<script type="text/javascript">
	imagelibrarytabs();
</script>
{/literal}