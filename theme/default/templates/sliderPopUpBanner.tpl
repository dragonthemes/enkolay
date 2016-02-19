<div class="span3">
	<label for="file" class="input input-file" name="popupbrowseslider" id="popupbrowseslider">
	 	<div id='imageloadstatus' style="display:none;">
			<div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div>
		</div>
								
		<form id="sliderimageform" class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxBannerSliderImageUpload.php' style="clear:both">
			<div class="dc">
				<label for="file" class="input input-file" style="display:block" name="imageloadbutton" id="imageloadbutton">
					<div class="maxWidtPopSlide">{$LANG.max_width_and_height}</div>
					<div class="button">
						<input type="file" value="" name="photos[]" id="photosliderimg" style="height:190px;" multiple>
						{$LANG.browse_name}
					</div>
					<input type='hidden' name="status" value="sliderimage"/>
				</label>
			</div>
		</form>
		<div class="dc">
                     <a class="btn btn-warning pull-right" onclick="imageReloadPagelist();$('#maska').hide();">Save changes</a>    
		</div>
	</label>
</div>
<div class="span9">
{$objCommon->getBannerSliderImage($smarty.session.domain_id,'sliderimage')}
	{if !$banner_images}
		<div id="banner_preview"></div>
	{/if}
	 {if $banner_images}
	
		 <div id="sortableImg" class="SlideUploadImge">
			 <div id="banner_preview"></div>
			{section name="sliimg" loop="$banner_images"}
				<div class="SlideUplWidt">
					<img width="100%" height="150" src="{$SITE_DOMAIN_IMAGES_URL}/{$banner_images[sliimg].image_name}"/>
					 
					<a onclick="deleteSliderBannerImage('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$banner_images[sliimg].banner_slider_id}','sliderimage');" class="galleryimage"><img src="{$SITE_BASEURL}/images/Close.png" alt="" title="" /></a>
				</div>
			{/section}
		</div> 
	 {/if}
</div>