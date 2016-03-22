<div class="youtubepopclose" onclick=" $('#columnImagePoP').hide();$('.loadmask').hide();"></div>
<div class="sliderPopupHead">
	RESİM 
</div>

<div class="row-fluid">    
    <div class="span12 slidePopRhtScroll offset0">
		<div id="single_imageLibrary" class="clearfix library_contentBanner">        
        <ul>
				<li><a href="#my_computer">Bilgisayarım</a></li>
				<li><a href="#image_library_content">Resim Kütüphanesi</a></li>
		</ul>
        <div id="my_computer">
        	<form id="imageform_{$smarty.request.page_list_id}" class="addeditTop addeditbuttonForm form-horizontal SlideUploadForm" method="post" enctype="multipart/form-data" action='ajaxImageUpload.php' >
        		<label id='imageloadbutton_{$smarty.request.page_list_id}' class="input input-file" for="file">
        			<div class="button">
        				<input type='file' name="photos[]" id="photoimg_{$smarty.request.page_list_id}" class="inputfile" size="1" {if $isBlog eq "Y"}onchange="blogImageUpdatingProcess('{$smarty.request.page_list_id}');"{else}onchange="singleImageUpdatingProcess('{$smarty.request.page_list_id}');"{/if}  />
        				Yeni Resim Yükle
        			</div>
                    <input type='hidden' name="status" value="columnImageText"/>
        			<input type='hidden' name="page_list_id" value="{$smarty.request.page_list_id}"/>
                    <input type='hidden' name="column_id" value="{$smarty.request.column_id}"/>
        		</label>
        	</form>	

        	<div style="display:none;" class="progress">
              <div class="bar"></div>
              <div class="percent">0%</div>
            </div>
          <div class="library_content_scroll clearfix">  
    		 {if empty($images)}
    			<div id="singlepreview"></div>
    			<ul id="sortableGalImg" class="SlideUploadImge">
    			</ul>
    		{/if}
    		 {if !empty($images)}
		 	<div class="clearfix"></div>
    			 <div id="preview"></div>
    			 <ul id="sortableGalImg" class="SlideUploadImge">    				
    					<li class="SlideUplWidtPopup">
    						<img width="100%" height="150" src="{$SITE_DOMAIN_IMAGES_URL}/{$images}" />    						
    					</li>    				
    			</ul> 
    		 {/if}
		 </div>
         </div>
         <div id="image_library_content" class="clearfix">
            <input type="button" class="upload_btn" value="Seç ve Ekle" onclick="uploadLibraryImages('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$smarty.request.page_list_id}','columnImageText');" />
            <input type='hidden' id="column_id"  name="column_id" value="{$smarty.request.column_id}"/>
				<div class="library_content_scroll clearfix image_library">{include file ='imageLibrary.tpl'}</div>
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