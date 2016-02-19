{$objCommon->ImageLibrary()}
<ul class="SlideUploadImge clearfix imageLibraryUl">
	{section name='imgs' loop=$imageslist}
	{if $imageslist[imgs].image_name neq ''}
    <li class="SlideUplWidtPopup" data-imgid="{$imageslist[imgs].id}" id="imgli{$imageslist[imgs].type}{$imageslist[imgs].id}">
		<img class="libimg"  width="100%" height="120" src="{$SITE_DOMAIN_IMAGES_URL}/{$imageslist[imgs].image_name}"/>
	   <a class="galleryimage" onclick="deleteLibraryImage('{$imageslist[imgs].id}',this);"><img src="{$SITE_BASEURL}/images/Close.png" /></a>
    </li>
    {/if}
	{/section}
</ul>
	