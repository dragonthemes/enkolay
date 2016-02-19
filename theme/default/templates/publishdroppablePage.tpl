<!--CONTENT STARTS-->	
<!--site and blog content start-->
<script type="text/javascript" src="{$SITE_JS_URL}/jquery.form.js"></script>
<div class="clearfix"></div>
<div class="blogPageInnerBg blogPageThemeBg themeseperateMar">
	<div class="themewrapper2BgAlign droparea">
		<div class="blogPageBgInnerTop"><div class="fireworkImg"></div></div>
		<div class="blogPageBgInner blogPageBgInnerMiddle clearfix">
			{section name="pagelist" loop="$pagefirstlist"}
			{if $pagefirstlist[pagelist].column_show eq '1'}
			<div class="tablesampleouter">
				<table class="sample2" width="100%" border="0" cellpadding="0" cellspacing="0">
					<tr>
						{section name="rowcount" start=1 loop=$pagefirstlist[pagelist].column_count}
						<td id="col_{$smarty.section.rowcount.index}" {if $smarty.section.rowcount.index > $pagefirstlist[pagelist].column_count}style="display:none;"{/if} {if $smarty.section.rowcount.index eq '1'}{if $pagefirstlist[pagelist].td_col1}style="width:{$pagefirstlist[pagelist].td_col1}px;"{/if}{/if}{if $smarty.section.rowcount.index eq '2'}{if $pagefirstlist[pagelist].td_col2}style="width:{$pagefirstlist[pagelist].td_col2}px;"{/if}{/if}{if $smarty.section.rowcount.index eq '3'}{if $pagefirstlist[pagelist].td_col3}style="width:{$pagefirstlist[pagelist].td_col3}px;"{/if}{/if}{if $smarty.section.rowcount.index eq '4'}{if $pagefirstlist[pagelist].td_col4}style="width:{$pagefirstlist[pagelist].td_col4}px;"{/if}{/if}{if $smarty.section.rowcount.index eq '5'}{if $pagefirstlist[pagelist].td_col5}style="width:{$pagefirstlist[pagelist].td_col5}px;"{/if}{/if}>
						
                        	<div class="tablewidthmax">
							{$objCommon->getColumnPageListForSource($smarty.section.rowcount.index,$pagefirstlist[pagelist].page_id,$pagefirstlist[pagelist].domain_id,$pagefirstlist[pagelist].pagelist)}
							{section name="colpagelist" loop="$columnpagefirstlist"}
							{if $columnpagefirstlist[colpagelist].title_select eq '1'}
							<!--title starts-->
							<div class="themehead main_title" style="{if $columnpagefirstlist[colpagelist].buildTitle_fontsize}font-size:{$columnpagefirstlist[colpagelist].buildTitle_fontsize}px;{/if}{if $columnpagefirstlist[colpagelist].buildTitle_fontcolor}color:{$columnpagefirstlist[colpagelist].buildTitle_fontcolor}{/if}{if $columnpagefirstlist[colpagelist].main_title_font_style}font-family:{$columnpagefirstlist[colpagelist].main_title_font_style};{/if}{if $columnpagefirstlist[colpagelist].main_title_line_size}line-height:{$columnpagefirstlist[colpagelist].main_title_line_size}px;{/if}">
							{if !empty($columnpagefirstlist[colpagelist].text_title)}
							{$columnpagefirstlist[colpagelist].text_title}
							{/if}
							</div>
							<div class="space"></div>
							<div class="clearfix"></div>
							{/if}
							<!--title end-->
							{if $columnpagefirstlist[colpagelist].description_select eq '1'}	
							<!--description starts-->
							<div class="main_paragraph" style="{if $columnpagefirstlist[colpagelist].buildPara_fontsize}font-size:{$columnpagefirstlist[colpagelist].buildPara_fontsize}px;{/if}{if $columnpagefirstlist[colpagelist].buildPara_fontcolor}color:{$columnpagefirstlist[colpagelist].buildPara_fontcolor}{/if}{if $columnpagefirstlist[colpagelist].main_paragraph_font_style}font-family:{$columnpagefirstlist[colpagelist].main_paragraph_font_style};{/if}{if $columnpagefirstlist[colpagelist].main_paragraph_line_size}line-height:{$columnpagefirstlist[colpagelist].main_paragraph_line_size}px;{/if}">					
							{if !empty($columnpagefirstlist[colpagelist].text_description)}	
							{$columnpagefirstlist[colpagelist].text_description}
							{/if}
							</div>
							<div class="space"></div>
							<div class="clearfix"></div>
							{/if}
							<!--description end-->
							{if $columnpagefirstlist[colpagelist].image_select eq '1'}
							<!--image starts-->
							
							{$objCommon->getImageInSubdomain($columnpagefirstlist[colpagelist].pagelist)}
							{if $images}
							<div class="imagemaxwidth">
							<img src="{$SITE_DOMAIN_IMAGES_URL}/{$images}" alt="home image" width="{if $columnpagefirstlist[colpagelist].img_width}{$columnpagefirstlist[colpagelist].img_width}{/if}" height="{if $columnpagefirstlist[colpagelist].img_height}{$columnpagefirstlist[colpagelist].img_height}{else}{/if}">
							</div>
							<div class="space"></div>
							{/if}							
							
							<div class="clearfix"></div>
							{/if}
							<!--image end-->							
							{if $columnpagefirstlist[colpagelist].divider}
							<!--Divider Starts-->
							<div id="buildDivide">
							<hr />
							</div>
							{/if}
							<!--Divider Ends-->
							{if $columnpagefirstlist[colpagelist].image_multiple_select}
							<!--image multiple text-->
							<div class="row-fluid sourceNewTheneUploadImg">
							<div class="span12">
							<div class="uploadImgBg">
							{$objCommon->getImage($columnpagefirstlist[colpagelist].pagelist,'singletext')}
							{if $images}
							<img src="{$SITE_DOMAIN_IMAGES_URL}/{$images}" width="{if $columnpagefirstlist[colpagelist].img_width}{$columnpagefirstlist[colpagelist].img_width}{else}100%{/if}" height="{if $columnpagefirstlist[colpagelist].img_height}{$columnpagefirstlist[colpagelist].img_height}{/if}" >
							{/if}
							</div>
							</div>
							<div class="span12">
							<div class="main_imagetitle" style="{if $columnpagefirstlist[colpagelist].main_imagetitle_font_style}font-family:{$columnpagefirstlist[colpagelist].main_imagetitle_font_style};{/if}{if $columnpagefirstlist[colpagelist].main_imagetitle_line_size}line-height:{$columnpagefirstlist[colpagelist].main_imagetitle_line_size}px;{/if}{if $columnpagefirstlist[colpagelist].main_imagetitle_font_size}font-size:{$columnpagefirstlist[colpagelist].main_imagetitle_font_size}px;{/if}">{if $columnpagefirstlist[colpagelist].image_text}{$columnpagefirstlist[colpagelist].image_text}{/if}</div>
							</div>			
							</div>
							<div class="space"></div>
							<div class="clearfix"></div>
							{/if} 
							<!--image multiple text end-->
							{if $columnpagefirstlist[colpagelist].contact_form eq '1'}
							<!--contact form starts-->
							{$objCommon->getAllContactDetails($columnpagefirstlist[colpagelist].pagelist)}
                            {$objCommon->getContactFormFields_saubdomain($columnpagefirstlist[colpagelist].domain_id,$columnpagefirstlist[colpagelist].pagelist)}
							<div id="contact_form" class="">						
							{include file='contactform.tpl'}
							</div>
							<div class="space"></div>
							<div class="clearfix"></div>
							{/if}
							<!--contact form end-->
							{if $columnpagefirstlist[colpagelist].social_plugins eq '1'}	
							<!--fan page starts-->					
							{$objCommon->getSocialDetails($columnpagefirstlist[colpagelist].pagelist)}
							{if !empty($socialpagelist)}
							{section name="social" loop="$socialpagelist"}
							<div class="buildSocialIcon">
							{if !empty($socialpagelist[social].fb)}
							<a href="{$socialpagelist[social].fb}"><input type="button" class="fbicon"/></a>
							{/if}
							{if !empty($socialpagelist[social].twitter)}
							<a href="{$socialpagelist[social].twitter}"><input type="button" class="twittericon" /></a>
							{/if}
							{if !empty($socialpagelist[social].linkedin)}
							<a href="{$socialpagelist[social].linkedin}"><input type="button" class="linkedicon" /></a>
							{/if}
							{if !empty($socialpagelist[social].mail)}
							<a href="mailto:{$socialpagelist[social].mail}"><input type="button" class="mailicon" /></a>
							{/if}
							</div>
							{/section}
							{/if}	
							<div class="space"></div>
							<div class="clearfix"></div>
							{/if}
							<!--fan page ends-->
							{if $columnpagefirstlist[colpagelist].youtube_video eq '1'}		
							<!--Youtube starts-->				
							{$objCommon->getYoutubeDetails($columnpagefirstlist[colpagelist].pagelist)}
							{if $youtubelist.0.youtube_url}
							<div class="youtubeDiv clearfix">
							<iframe name="ifrm" id="ifrm" frameborder="0" allowfullscreen="" src="{if $youtubelist.0.youtube_url neq ''}{$youtubelist.0.youtube_url}{else}{$SITE_BASEURL}/images/youtubeLogo.png{/if}" width="100%" height="553" style="{if $youtubelist.0.youtube_spacing eq 'None'}margin:0px;{elseif $youtubelist.0.youtube_spacing eq 'Small'}margin:5px 0px;{elseif $youtubelist.0.youtube_spacing eq 'Medium'}margin:10px 0px;{elseif $youtubelist.0.youtube_spacing eq 'Large'}margin:15px 0px;{/if}{if $youtubelist.0.youtube_width eq 'Small'}width:50%;{elseif $youtubelist.0.youtube_width eq 'Medium'}width:70%;{elseif $youtubelist.0.youtube_width eq 'Large'}width:100%;{/if}"></iframe>
							</div>
							{/if}
							<div class="space"></div>
							<div class="clearfix"></div>
							{/if}
							<!--Youtube ends-->
							{if $columnpagefirstlist[colpagelist].gallery}
							<!--Gallery Starts-->
							{$objCommon->getGalleryImageForSubDomain($columnpagefirstlist[colpagelist].pagelist)}
							{if $images}
							<div class="dc gallery_wrapper">
							{section name="galimg" loop="$images"}
							<a class="fancybox-thumbs imageGallery" style="{if $columnpagefirstlist[colpagelist].gallery_column eq '2'}width: 49%;{elseif $columnpagefirstlist[colpagelist].gallery_column eq '3'}width: 32%;{elseif $columnpagefirstlist[colpagelist].gallery_column eq '4'}width: 24%;{elseif $columnpagefirstlist[colpagelist].gallery_column eq '5'}width: 19%;{elseif $columnpagefirstlist[colpagelist].gallery_column eq '6'}width: 15.5%;{else}width: 49%;{/if}{if $columnpagefirstlist[colpagelist].gallery_spacing eq 'None'}margin: 0px;{elseif $columnpagefirstlist[colpagelist].gallery_spacing eq 'Small'}margin: 5px 0px;{elseif $columnpagefirstlist[colpagelist].gallery_spacing eq 'Medium'}margin: 10px 0px;{elseif $columnpagefirstlist[colpagelist].gallery_spacing eq 'Large'}margin: 15px 0px;{else}margin: 0px;{/if}{if $columnpagefirstlist[colpagelist].gallery_border eq 'None'}border: 0px solid rgb(221, 221, 221);{elseif $columnpagefirstlist[colpagelist].gallery_border eq 'Thin'}border: 2px solid rgb(221, 221, 221);{elseif $columnpagefirstlist[colpagelist].gallery_border eq 'Medium'}border: 3px solid rgb(221, 221, 221);{elseif $columnpagefirstlist[colpagelist].gallery_border eq 'Thick'}border: 4px solid rgb(221, 221, 221);{else}border: 0px solid rgb(221, 221, 221);{/if}" data-fancybox-group="thumb" href="{$SITE_DOMAIN_IMAGES_URL}/{$images[galimg].gallery_name}">
							  <div class="aspectratioline"></div>
                              <div class="image_container">
                                  <img height="" src="{$SITE_DOMAIN_IMAGES_URL}/{$images[galimg].gallery_name_thumb}">
                              </div>
							</a>
							{/section}
							</div>
							{/if}
							<div class="space"></div>
							<div class="clearfix"></div>
							{/if}
							<!--Gallery Ends-->
							{if $columnpagefirstlist[colpagelist].map eq '1'}	
							<!--Map starts-->					
							<iframe name="ifrm" id="ifrm" frameborder="0" allowfullscreen="" src="gmapPage.php?zoom={$columnpagefirstlist[colpagelist].map_zoom}&lat={$columnpagefirstlist[colpagelist].map_lat}&lon={$columnpagefirstlist[colpagelist].map_lon}&addr={$columnpagefirstlist[colpagelist].map_addr}&page_list_id={$columnpagefirstlist[colpagelist].pagelist}" width="100%" height="250"></iframe>
							<div class="space"></div>
							<div class="clearfix"></div>
							{/if}
							<!--Map ends-->
							{if $columnpagefirstlist[colpagelist].slider}
							<!--Slider Process Start-->
							{$objCommon->getSliderImage($columnpagefirstlist[colpagelist].domain_id,$columnpagefirstlist[colpagelist].page_id,$columnpagefirstlist[colpagelist].pagelist)}
							{if $images}
							<div id="slider" class="nivoSlider">
							{section name="sliimg" loop="$images"}
							<div class="imageSlider">
							<img width="100%" height="300" src="{$SITE_DOMAIN_IMAGES_URL}/{$images[sliimg].slider_images}">
							
							</div>
							{/section}
							</div>
							{/if}
							</div>
							<div class="space"></div>
							<div class="clearfix"></div>  
							{/if}
							<!--Slider Process End-->
							{if $columnpagefirstlist[colpagelist].google_adsense}
							<!--Google Adsense Start-->
							
							{if $columnpagefirstlist[colpagelist].google_ads eq 'script'}
							{literal}
							<script>          
							{/literal}
							{$columnpagefirstlist[colpagelist].google_script_text}
							{literal}
							</script>  
							{/literal}
							{/if}
							{if $columnpagefirstlist[colpagelist].google_ads eq 'image'}
							{$objCommon->getGoogleImage($columnpagefirstlist[colpagelist].domain_id,$columnpagefirstlist[colpagelist].page_id,$columnpagefirstlist[colpagelist].pagelist)}
							<div class="imagemaxwidth">
							<a href="{if $google_images.0.google_url}http://{/if}{$google_images.0.google_url}" target="_blank"><img src="{$SITE_GOOGLE_IMAGES_URL}/{$google_images.0.google_image_name}" alt="google image" width="100%" height="180" ></a>
							</div>
							<div class="space"></div>
							{/if}
							<div class="clearfix"></div>
							{/if}
							<!--Google Adsense End-->
                            {if $columnpagefirstlist[colpagelist].file}
                            {$objCommon->getFile_name($columnpagefirstlist[colpagelist].pagelist)}
                            {if !empty($files)}
                            <div id="fileTool" class="width100 block fileTool">
            					<div class="filename">{$files.0.original_name}</div>                               
            					<a href="{$SITE_BASEURL}/uploads/files/{$files.0.file_id}/{$files.0.original_name}">Download File</a>
            				</div>
                            {/if}
                                                               
                            {/if} 
		                 {/section}
						</td>
						{/section}
					</tr>
				</table>
			</div>
			{/if}
			{if $pagefirstlist[pagelist].title_select eq '1'}
			<!--title starts-->
			<div class="themehead main_title" style="{if $pagefirstlist[pagelist].buildTitle_fontsize}font-size:{$pagefirstlist[pagelist].buildTitle_fontsize}px;{/if}{if $pagefirstlist[pagelist].buildTitle_fontcolor}color:{$pagefirstlist[pagelist].buildTitle_fontcolor}{/if}{if $pagefirstlist[pagelist].main_title_font_style}font-family:{$pagefirstlist[pagelist].main_title_font_style};{/if}{if $pagefirstlist[pagelist].main_title_line_size}line-height:{$pagefirstlist[pagelist].main_title_line_size}px;{/if}">
			{if !empty($pagefirstlist[pagelist].text_title)}
			{$pagefirstlist[pagelist].text_title}
			{/if}
			</div>
			<div class="space"></div>
			<div class="clearfix"></div>
			{/if}
			<!--title end-->
			{if $pagefirstlist[pagelist].description_select eq '1'}	
			<!--description starts-->
			<div class="main_paragraph" style="{if $pagefirstlist[pagelist].buildPara_fontsize}font-size:{$pagefirstlist[pagelist].buildPara_fontsize}px;{/if}{if $pagefirstlist[pagelist].buildPara_fontcolor}color:{$pagefirstlist[pagelist].buildPara_fontcolor}{/if}{if $pagefirstlist[pagelist].main_paragraph_font_style}font-family:{$pagefirstlist[pagelist].main_paragraph_font_style};{/if}{if $pagefirstlist[pagelist].main_paragraph_line_size}line-height:{$pagefirstlist[pagelist].main_paragraph_line_size}px;{/if}">					
			{if !empty($pagefirstlist[pagelist].text_description)}	
			{$pagefirstlist[pagelist].text_description}
			{/if}
			</div>
			<div class="space"></div>
			<div class="clearfix"></div>
			{/if}
			<!--description end-->
			{if $pagefirstlist[pagelist].image_select eq '1'}
			<!--image starts-->
            {$objCommon->getImageInSubdomain($pagefirstlist[pagelist].pagelist)}
            
			<div class="imagemaxwidth" style="text-align:{$imgalignment}">
			
			{if $images}
			<img src="{$SITE_DOMAIN_IMAGES_URL}/{$images}" alt="home image" width="{if $pagefirstlist[pagelist].img_width}{$pagefirstlist[pagelist].img_width}{/if}" height="{if $pagefirstlist[pagelist].img_height}{$pagefirstlist[pagelist].img_height}{else}{/if}"/>
			{/if}
			<div class="space"></div>
			</div>
		
			<div class="clearfix"></div>
			{/if}
			<!--image end-->
			
			
			{if $pagefirstlist[pagelist].divider}
			<!--Divider Starts-->
			<div id="buildDivide">
			<hr />
			</div>
			{/if}
			<!--Divider Ends----->
			
			{if $pagefirstlist[pagelist].image_multiple_select}
			<!--image multiple text-->
			<div class="row-fluid sourceNewTheneUploadImg">
			<div class="pull-left marginRight15">
			<div class="uploadImgBg">
			{$objCommon->getImageTextInSubdomain($pagefirstlist[pagelist].pagelist,'singletext')}
			{if $images}
			<img src="{$SITE_DOMAIN_IMAGES_URL}/{$images}" width="{if $pagefirstlist[pagelist].img_width}{$pagefirstlist[pagelist].img_width}{/if}" height="{if $pagefirstlist[pagelist].img_height}{$pagefirstlist[pagelist].img_height}{/if}">
			{/if}
			</div>
			</div>
			<div class="span9">
			<div class="main_imagetitle" style="{if $pagefirstlist[pagelist].main_imagetitle_font_style}font-family:{$pagefirstlist[pagelist].main_imagetitle_font_style};{/if}{if $pagefirstlist[pagelist].main_imagetitle_line_size}line-height:{$pagefirstlist[pagelist].main_imagetitle_line_size}px;{/if}{if $pagefirstlist[pagelist].main_imagetitle_font_size}font-size:{$pagefirstlist[pagelist].main_imagetitle_font_size}px;{/if}">{if $pagefirstlist[pagelist].image_text}{$pagefirstlist[pagelist].image_text}{/if}</div>
			</div>			
			</div>
			<div class="space"></div>
			<div class="clearfix"></div>
			{/if} 
			<!--image multiple text end-->
			{if $pagefirstlist[pagelist].contact_form eq '1'}
			<!--contact form starts-->
			{$objCommon->getAllContactDetails($pagefirstlist[pagelist].pagelist)}
			<div id="contact_form" class="">						
            {$objCommon->getContactFormFields_saubdomain($pagefirstlist[pagelist].domain_id,$pagefirstlist[pagelist].pagelist)}		
			{include file='contactform.tpl'}
			</div>
			<div class="space"></div>
			<div class="clearfix"></div>
			{/if}
			<!--contact form end-->
			{if $pagefirstlist[pagelist].social_plugins eq '1'}	
			<!--fan page starts-->					
			{$objCommon->getSocialDetails($pagefirstlist[pagelist].pagelist)}
			{if !empty($socialpagelist)}
			{section name="social" loop="$socialpagelist"}
			<div class="buildSocialIcon" style="text-align:{$pagefirstlist[pagelist].social_plugin_alignment}">
			{if !empty($socialpagelist[social].fb)}
			<a href="{$socialpagelist[social].fb}"><input type="button" class="fbicon"/></a>
			{/if}
			{if !empty($socialpagelist[social].twitter)}
			<a href="{$socialpagelist[social].twitter}"><input type="button" class="twittericon" /></a>
			{/if}
			{if !empty($socialpagelist[social].linkedin)}
			<a href="{$socialpagelist[social].linkedin}"><input type="button" class="linkedicon" /></a>
			{/if}
			{if !empty($socialpagelist[social].mail)}
			<a href="mailto:{$socialpagelist[social].mail}"><input type="button" class="mailicon" /></a>
			{/if}
			</div>
			{/section}
			{/if}	
			<div class="space"></div>
			<div class="clearfix"></div>
			{/if}
			<!--fan page ends-->
			{if $pagefirstlist[pagelist].youtube_video eq '1'}		
			<!--Youtube starts-->				
			{$objCommon->getYoutubeDetails($pagefirstlist[pagelist].pagelist)}
			{if $youtubelist.0.youtube_url}
			<div class="youtubeDiv clearfix" style="{if $youtubelist.0.youtube_spacing eq 'None'}margin:0px;{elseif $youtubelist.0.youtube_spacing eq 'Small'}margin:5px 0px;{elseif $youtubelist.0.youtube_spacing eq 'Medium'}margin:10px 0px;{elseif $youtubelist.0.youtube_spacing eq 'Large'}margin:15px 0px;{/if}{if $youtubelist.0.youtube_width eq 'Small'}width:50%; height:250px; margin-left:auto; margin-right:auto;{elseif $youtubelist.0.youtube_width eq 'Medium'}width:70%;{elseif $youtubelist.0.youtube_width eq 'Large'}width:100%;{/if}">
			<iframe name="ifrm" id="ifrm" frameborder="0" allowfullscreen="" src="{$youtubelist.0.youtube_url}" width="100%" height="200"></iframe>
			</div>
			{else}
			<div class="youtubeDiv clearfix" style="{if $youtubelist.0.youtube_spacing eq 'None'}margin:0px;{elseif $youtubelist.0.youtube_spacing eq 'Small'}margin:5px 0px;{elseif $youtubelist.0.youtube_spacing eq 'Medium'}margin:10px 0px;{elseif $youtubelist.0.youtube_spacing eq 'Large'}margin:15px 0px;{/if}{if $youtubelist.0.youtube_width eq 'Small'}width:50%; height:250px; margin-left:auto; margin-right:auto;{elseif $youtubelist.0.youtube_width eq 'Medium'}width:70%;{elseif $youtubelist.0.youtube_width eq 'Large'}width:100%;{/if}">
			<iframe name="ifrm" id="ifrm" frameborder="0" allowfullscreen="" src="{$SITE_BASEURL}/images/youtubeLogo.png" width="100%" height="200"></iframe>
			</div>
			{/if}
			<div class="space"></div>
			<div class="clearfix"></div>
			{/if}
			<!--Youtube ends-->
			{if $pagefirstlist[pagelist].gallery}
			<!--Gallery Starts-->
			{$objCommon->getGalleryImageForSubDomain($pagefirstlist[pagelist].pagelist)}
			{if $images}
			<div class="dc gallery_wrapper">
			{section name="galimg" loop="$images"}
			<!--<div class="imageGallery gallerySorceClick" style="{if $pagefirstlist[pagelist].gallery_column eq '2'}width: 49%;{elseif $pagefirstlist[pagelist].gallery_column eq '3'}width: 32%;{elseif $pagefirstlist[pagelist].gallery_column eq '4'}width: 24%;{elseif $pagefirstlist[pagelist].gallery_column eq '5'}width: 19%;{elseif $pagefirstlist[pagelist].gallery_column eq '6'}width: 15.5%;{else}{/if}{if $pagefirstlist[pagelist].gallery_spacing eq 'None'}margin: 0px;{elseif $pagefirstlist[pagelist].gallery_spacing eq 'Small'}margin: 5px 0px;{elseif $pagefirstlist[pagelist].gallery_spacing eq 'Medium'}margin: 10px 0px;{elseif $pagefirstlist[pagelist].gallery_spacing eq 'Large'}margin: 15px 0px;{else}margin: 0px;{/if}{if $pagefirstlist[pagelist].gallery_border eq 'None'}border: 0px solid rgb(221, 221, 221);{elseif $pagefirstlist[pagelist].gallery_border eq 'Thin'}border: 2px solid rgb(221, 221, 221);{elseif $pagefirstlist[pagelist].gallery_border eq 'Medium'}border: 3px solid rgb(221, 221, 221);{elseif $pagefirstlist[pagelist].gallery_border eq 'Thick'}border: 4px solid rgb(221, 221, 221);{else}border: 0px solid rgb(221, 221, 221);{/if}">
			<img width="100%" height="200" src="{$SITE_DOMAIN_IMAGES_URL}/{$images[galimg].gallery_name}">
			</div>-->
			<a class="fancybox-thumbs imageGallery" style="{if $pagefirstlist[pagelist].gallery_column eq '2'}width: 49.95%; min-height:299px;max-height:299px;{elseif $pagefirstlist[pagelist].gallery_column eq '3'}width: 33.28%;min-height:199px;max-height:199px;{elseif $pagefirstlist[pagelist].gallery_column eq '4'}width: 24.95%;min-height:150px;max-height:150px;{elseif $pagefirstlist[pagelist].gallery_column eq '5'}width: 19.95%;min-height:120px;max-height:120px;{elseif $pagefirstlist[pagelist].gallery_column eq '6'}width: 16.62%;min-height:100px;max-height:100px;{else}width:49.95%;min-height:299px;max-height:299px;{/if}{if $pagefirstlist[pagelist].gallery_spacing eq 'None'}margin: 0px;{elseif $pagefirstlist[pagelist].gallery_spacing eq 'Small'}margin: 5px 0px;{elseif $pagefirstlist[pagelist].gallery_spacing eq 'Medium'}margin: 10px 0px;{elseif $pagefirstlist[pagelist].gallery_spacing eq 'Large'}margin: 15px 0px;{else}margin: 0px;{/if}" data-fancybox-group="thumb" href="{$SITE_DOMAIN_IMAGES_URL}/{$images[galimg].gallery_name}">
			 <div class="aspectratioline"></div>
             	<div class="image_container">
           			<img width="" height="" src="{$SITE_DOMAIN_IMAGES_URL}/{$images[galimg].gallery_name_thumb}" style="{if $pagefirstlist[pagelist].gallery_border eq 'None'}border: 0px solid rgb(221, 221, 221);{elseif $pagefirstlist[pagelist].gallery_border eq 'Thin'}border: 2px solid rgb(221, 221, 221);{elseif $pagefirstlist[pagelist].gallery_border eq 'Medium'}border: 3px solid rgb(221, 221, 221);{elseif $pagefirstlist[pagelist].gallery_border eq 'Thick'}border: 4px solid rgb(221, 221, 221);{else}border: 0px solid rgb(221, 221, 221);{/if}">
                 </div>
			</a>
			{/section}
			</div>
			{/if}
			<div class="space"></div>
			<div class="clearfix"></div>
			{/if}
			<!--Gallery Ends-->
			{if $pagefirstlist[pagelist].map eq '1'}	
			<!--Map starts-->					
			<div class="mapshowDiv clearfix">
			<iframe name="ifrm" id="ifrm" frameborder="0" allowfullscreen="" src="gmapPage.php?zoom={$pagefirstlist[pagelist].map_zoom}&lat={$pagefirstlist[pagelist].map_lat}&lon={$pagefirstlist[pagelist].map_lon}&addr={$pagefirstlist[pagelist].map_addr}&page_list_id={$pagefirstlist[pagelist].pagelist}" width="100%" height="250"></iframe>
			</div>
			<div class="space"></div>
			<div class="clearfix"></div>
			{/if}
			<!--Map ends-->
			{if $pagefirstlist[pagelist].slider}
			<!--Slider Process Start-->
			{$objCommon->getSliderImage($pagefirstlist[pagelist].domain_id,$pagefirstlist[pagelist].page_id,$pagefirstlist[pagelist].pagelist)}
			{if $images}
			<div class="relative">
			<ul class="responsive_slideshow">
				{section name="sliimg" loop="$images"}
				<li class="imageSlider">
					<img src="{$SITE_DOMAIN_IMAGES_URL}/{$images[sliimg].slider_images}"/>
				</li>
				{/section}
			</ul>
			</div>
			{/if}
			<div class="space"></div>
			<div class="clearfix"></div>  
			{/if}
			<!--Slider Process End-->
			{if $pagefirstlist[pagelist].google_adsense}
			<!--Google Adsense Start-->
			<div class="imagemaxwidth">
			{if $pagefirstlist[pagelist].google_ads eq 'script'}
			{literal}
			<script>          
			{/literal}
			{$pagefirstlist[pagelist].google_script_text}
			{literal}
			</script>  
			{/literal}
			{/if}
			{if $pagefirstlist[pagelist].google_ads eq 'image'}
			{$objCommon->getGoogleImage($pagefirstlist[pagelist].domain_id,$pagefirstlist[pagelist].page_id,$pagefirstlist[pagelist].pagelist)}
			<a href="{if $google_images.0.google_url}http://{/if}{$google_images.0.google_url}" target="_blank"><img src="{$SITE_GOOGLE_IMAGES_URL}/{$google_images.0.google_image_name}" alt="google image" width="100%" height="180" ></a>
			
			{/if}
			</div>
			<div class="space"></div>
			<div class="clearfix"></div>
			{/if}
			<!--Google Adsense End-->
            
            {if $pagefirstlist[pagelist].file}
            {$objCommon->getFile_name($pagefirstlist[pagelist].pagelist)}
            {if !empty($files)}
            <div id="fileTool" class="width100 block fileTool">
				<div class="filename">{$files.0.original_name}</div>                   
				<a href="{$SITE_BASEURL}/uploads/files/{$files.0.file_id}/{$files.0.original_name}">Download File</a>
			</div>
            {/if}           
            {/if}  

            {if $pagefirstlist[pagelist].column_image_show}
              {assign var="columnimages" value=$objCommon->getColumnTextImages($pagefirstlist[pagelist].page_id)}
             <div id="page_{$pagefirstlist[pagelist].pagelist}" class="columnlist">                                                                 
                  
			 <div class="tablesampleouter">
				 <div class="sample2  columsBor row-fluid no-space">
                    {section name=foo start=0 loop=3 step=1} 
                         {assign var="num" value=$smarty.section.foo.rownum}

                         {foreach from=$columnimages key=k item=imge}

                              {if $imge.column_id eq $num and $imge.status eq 'columnImageText'}
                                   {assign var="srcIndex" value=$k}
                                   {assign var="images" value=1}
                              {/if}

                              {if $imge.column_id eq $num and $imge.status eq 'columnImageText_title'}
                                   {assign var="srcIndex_title" value=$k}
                                   {assign var="images_title" value=1}
                              {/if}

                               {if $imge.column_id eq $num and $imge.status eq 'columnImageText_desc'}
                                   {assign var="srcIndex_desc" value=$k}
                                   {assign var="images_desc" value=1}
                              {/if}
                         {/foreach}

                         <div class="addwidth span4">     
						<div class="coltext_image" for="coltext_image{$smarty.section.foo.rownum}">
							
                                {if isset($images) and $images eq 1}
                                    <img src="{$SITE_DOMAIN_IMAGES_URL}/{$columnimages.$srcIndex.image_name}" alt="Column Text Image" />
                                    {assign var="images" value=0}
                               {else}
                                    <img src="{$SITE_BASEURL}/images/sample1.jpg" alt="Column Text Image" />
                               {/if}

						</div>

						<div class="coltext_title contentedit" id="coltext_title_{$smarty.section.foo.rownum}" >     
							{if isset($images_title) and $images_title eq 1}
                                        {$columnimages.$srcIndex_title.column_text_title}
                                        {assign var="images_title" value=0}
                                   {else}
                                        Sample Title
                                   {/if}
						</div>
						<div class="coltext_desc contentedit" id="coltext_desc_{$smarty.section.foo.rownum}" >     
							{if isset($images_desc) and $images_desc eq 1}
                                        {$columnimages.$srcIndex_desc.column_text_desc}
                                        {assign var="images_desc" value=0}
                                   {else}
                                        This is the test description
                                   {/if}
						</div>
					</div>
                         
                    {/section} 

					
				</div>
			</div> 
             </div>
              <div class="space"></div>
			<div class="clearfix"></div>
             {/if}                                             
			{/section}
			<div class="blogPageThemeBgBottimage"></div>
		<!--site  and blog content end-->
		<!--CONTENT END-->
		
		</div>
	</div>
</div>
<!--CONTENT ENDS-->
<script>$('.main_title a').attr('target','_blank');</script>

{if $passrequired eq 1}
  <div id="domain_password_check_div">
	<div class="modal popuppassword">
		<div class="modal-header">
			<h3>Password</h3>
		</div>
		
			<div class="modal-body">
				<span id="domain_password_error"></span>
				<input type="password" name="domain_password" id="domain_password" value=""/>
			</div> 
			<div class="modal-footer">
				<input type="button" name="submit" class="btn btn-primary" value="Gönder" onclick="domainPasswordvalidate({$domain_details.0.domain_id})"/>
			</div> 
		</div>
	</div>
	<div class="popuppasswordmask"></div>
{/if}

{if $pck_details|@count gt 0}
  <div id="domain_password_check_div">
	<div class="modal popuppassword">
		<div class="modal-header">
			<h3>Domain Payment Notification </h3>
		</div>		
			<div class="modal-body">
				<span id="domain_password_error"></span>
				Make Payment {$pck_details.0.price} TL and active your Account before {$pck_details.0.validtodate|date_format:'%b %d, %Y'|utf8_encode}.
			</div> 			
		</div>
	</div>
	<div class="popuppasswordmask"></div>
{/if}    

