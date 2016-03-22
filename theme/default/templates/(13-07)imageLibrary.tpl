{$objCommon->ImageLibrary()}
<ul class="SlideUploadImge clearfix imageLibraryUl">
	{section name='imgs' loop=$imageslist}
	{if $imageslist[imgs].image_name neq ''}
    <li class="SlideUplWidtPopup" id="imgli{$imageslist[imgs].type}{$imageslist[imgs].img_id}">
		<img class="libimg"  width="100%" height="120" src="{if $imageslist[imgs].isGoogle eq 'Y'}{$SITE_GOOGLE_IMAGES_URL}{else}{$SITE_DOMAIN_IMAGES_URL}{/if}/{$imageslist[imgs].image_name}"/>
	   <a class="galleryimage" onclick="deleteLibraryImage('{$imageslist[imgs].img_id}','{$imageslist[imgs].type}',this);"><img src="{$SITE_BASEURL}/images/Close.png" /></a>
    </li>
    {/if}
	{/section}
</ul>
	