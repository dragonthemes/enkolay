 
 {if !empty($titlelist)}
{section name="tit" loop="$titlelist"}
	<div class="blogInnComm">
		{if empty($titlelist[tit].title)}
			<a class="heading BlogNewPost"  onclick="ShowTitlePopup('{$titlelist[tit].domain_id}','{$titlelist[tit].post_id}','{$titlelist[tit].title}','{$titlelist[tit].addeddate|date_format:'%b %d, %Y'|utf8_encode}')">{$titlelist[tit].addeddate|date_format:'%b %d, %Y'|utf8_encode}</a>
			{else}
			<a class="heading BlogNewPost"  onclick="ShowTitlePopup('{$titlelist[tit].domain_id}','{$titlelist[tit].post_id}','{$titlelist[tit].title}')">{$titlelist[tit].title}</a>
		{/if}
		<div class="clr"></div>
		<!-------date format----------------------->				
		<div class="date">{$titlelist[tit].addeddate|date_format:'%b %d, %Y'|utf8_encode:"%A, %B %e, %Y"}</div>
		<!---date format ends---------------------->
		<div class="addcomment">
			{$objCommon->getComment($titlelist[tit].post_id)}
			{ if $getcomments}
			<!---to show count of comments  starts------->
			<a class="BlogNewPost" onclick="ShowTitlePopup('{$titlelist[tit].domain_id}','{$titlelist[tit].post_id}','{$titlelist[tit].title}')" target="_blank">{$objCommon->getCountComment($titlelist[tit].post_id)} {$LANG.main_blog_comments}</a>
			{else}
			<a class="BlogNewPost" onclick="ShowTitlePopup('{$titlelist[tit].domain_id}','{$titlelist[tit].post_id}','{$titlelist[tit].title}')" target="_blank">{$LANG.main_blog_add_comments}</a>
			<!---to show count of comments  ends------->
		{/if}
		</div>
		<!----twitter and facebook like for starts------>
		<div class="fb">
			{$objCommon->getSharebutton($smarty.session.domain_id)}
			 {if $blogsettings.0.sharebutton eq '1'}
				<iframe src="http://www.facebook.com/plugins/like.php?href={$SITE_BASEURL}/{$titlelist[tit].title}&amp;width&amp;layout=box_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=65&amp;appId=624881480908654" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:65px;" allowTransparency="true"></iframe>  
			{/if}
		</div>
		<!----twitter and facebook like for end------>
	</div>
    <!----list draggable elements start---->
    <div class="blogPageInnerBg blogPageThemeBg">
		<div class="themewrapper1 themewrapper2 fltNone themewrapper3 themewrapper4 themewrapper5 themewrapper6 newblogwrap">
			<div class="themewrapper2BgAlign droparea listpostblog">
			<div class="blogPageBgInnerTop"><div class="fireworkImg"></div></div>
			<div class="blogPageBgInner blogPageBgInnerMiddle clearfix">
            {$objCommon->ListDragInListPost($smarty.session.page_id,$titlelist[tit].post_id)}
				{section name="pagelist" loop="$list"}
				{if $list[pagelist].column_show eq '1'}
				<div class="tablesampleouter">
					 <div id="column{$pagefirstlist[pagelist].pagelist}" class="sample2  columsBor row-fluid no-space">
							{section name="rowcount" start=1 loop=$list[pagelist].column_count}
							<div class="addwidth column_inner_div {if $pagefirstlist[pagelist].column_count eq '3'}span6{/if} {if $pagefirstlist[pagelist].column_count eq '4'}span4{/if} {if $pagefirstlist[pagelist].column_count eq '5'}span3{/if} {if $pagefirstlist[pagelist].column_count eq '6'}five_column{/if}" id="col_{$smarty.section.rowcount.index}">
							
								{$objCommon->getColumnPageListForSource($smarty.section.rowcount.index,$list[pagelist].page_id,$list[pagelist].domain_id,$list[pagelist].pagelist)}
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
                                {$objCommon->getContactFormFields_saubdomain($smarty.session.domain_id,$columnpagefirstlist[colpagelist].pagelist)}                                
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
							</div>
							{/section}
					</div>
				</div>
					
				{/if}
				{if $list[pagelist].title_select eq '1'}
				<!--title starts-->
				<div class="themehead main_title" style="{if $list[pagelist].buildTitle_fontsize}font-size:{$list[pagelist].buildTitle_fontsize}px;{/if}{if $list[pagelist].buildTitle_fontcolor}color:{$list[pagelist].buildTitle_fontcolor}{/if}{if $list[pagelist].main_title_font_style}font-family:{$list[pagelist].main_title_font_style};{/if}{if $list[pagelist].main_title_line_size}line-height:{$list[pagelist].main_title_line_size}px;{/if}">
				{if !empty($list[pagelist].text_title)}
				{$list[pagelist].text_title}
				{/if}
				</div>
				<div class="space"></div>
				<div class="clearfix"></div>
				{/if}
				<!--title end-->
				{if $list[pagelist].description_select eq '1'}	
				<!--description starts-->
				<div class="main_paragraph" style="{if $list[pagelist].buildPara_fontsize}font-size:{$list[pagelist].buildPara_fontsize}px;{/if}{if $list[pagelist].buildPara_fontcolor}color:{$list[pagelist].buildPara_fontcolor}{/if}{if $list[pagelist].main_paragraph_font_style}font-family:{$list[pagelist].main_paragraph_font_style};{/if}{if $list[pagelist].main_paragraph_line_size}line-height:{$list[pagelist].main_paragraph_line_size}px;{/if}">					
				{if !empty($list[pagelist].text_description)}	
				{$list[pagelist].text_description}
				{/if}
				</div>
				<div class="space"></div>
				<div class="clearfix"></div>
				{/if}
				<!--description end-->
				{if $list[pagelist].image_select eq '1'}
				<!--image starts-->
                {$objCommon->getImageInSubdomain($list[pagelist].pagelist)}
                
				<div class="imagemaxwidth" style="text-align:{$imgalignment}">
				
				{if $images}
				<img src="{$SITE_DOMAIN_IMAGES_URL}/{$images}" alt="home image" width="{if $list[pagelist].img_width}{$list[pagelist].img_width}{/if}" height="{if $list[pagelist].img_height}{$list[pagelist].img_height}{else}{/if}"/>
				{/if}
				<div class="space"></div>
				</div>
			
				<div class="clearfix"></div>
				{/if}
				<!--image end-->
				
				
				{if $list[pagelist].divider}
				<!--Divider Starts-->
				<div id="buildDivide">
				<hr />
				</div>
				{/if}
				<!--Divider Ends----->
				
				{if $list[pagelist].image_multiple_select}
				<!--image multiple text-->
				<div class="row-fluid sourceNewTheneUploadImg">
				<div class="span3">
				<div class="uploadImgBg">
				{$objCommon->getImageTextInSubdomain($list[pagelist].pagelist,'singletext')}
				{if $images}
				<img src="{$SITE_DOMAIN_IMAGES_URL}/{$images}" width="{if $list[pagelist].img_width}{$list[pagelist].img_width}{else}100%{/if}" height="{if $list[pagelist].img_height}{$list[pagelist].img_height}{else}180{/if}">
				{/if}
				</div>
				</div>
				<div class="span9">
				<div class="main_imagetitle" style="{if $list[pagelist].main_imagetitle_font_style}font-family:{$list[pagelist].main_imagetitle_font_style};{/if}{if $list[pagelist].main_imagetitle_line_size}line-height:{$list[pagelist].main_imagetitle_line_size}px;{/if}{if $list[pagelist].main_imagetitle_font_size}font-size:{$list[pagelist].main_imagetitle_font_size}px;{/if}">{if $list[pagelist].image_text}{$list[pagelist].image_text}{/if}</div>
				</div>			
				</div>
				<div class="space"></div>
				<div class="clearfix"></div>
				{/if} 
				<!--image multiple text end-->
				{if $list[pagelist].contact_form eq '1'}
				<!--contact form starts-->
				{$objCommon->getAllContactDetails($list[pagelist].pagelist)}
                {$objCommon->getContactFormFields_saubdomain($smarty.session.domain_id,$list[pagelist].pagelist)}                					
				<div id="contact_form" class="">						
				{include file='contactform.tpl'}
				</div>
				<div class="space"></div>
				<div class="clearfix"></div>
				{/if}
				<!--contact form end-->
				{if $list[pagelist].social_plugins eq '1'}	
				<!--fan page starts-->					
				{$objCommon->getSocialDetails($list[pagelist].pagelist)}
				{if !empty($socialpagelist)}
				{section name="social" loop="$socialpagelist"}
				<div class="buildSocialIcon" style="text-align:{$list[pagelist].social_plugin_alignment}">
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
				{if $list[pagelist].youtube_video eq '1'}		
				<!--Youtube starts-->				
				{$objCommon->getYoutubeDetails($list[pagelist].pagelist)}
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
				{if $list[pagelist].gallery}
				<!--Gallery Starts-->
				{$objCommon->getGalleryImageForSubDomain($list[pagelist].pagelist)}
				{if $images}
				<div class="dc gallery_wrapper">
				{section name="galimg" loop="$images"}
				<!--<div class="imageGallery gallerySorceClick" style="{if $list[pagelist].gallery_column eq '2'}width: 49%;{elseif $list[pagelist].gallery_column eq '3'}width: 32%;{elseif $list[pagelist].gallery_column eq '4'}width: 24%;{elseif $list[pagelist].gallery_column eq '5'}width: 19%;{elseif $list[pagelist].gallery_column eq '6'}width: 15.5%;{else}{/if}{if $list[pagelist].gallery_spacing eq 'None'}margin: 0px;{elseif $list[pagelist].gallery_spacing eq 'Small'}margin: 5px 0px;{elseif $list[pagelist].gallery_spacing eq 'Medium'}margin: 10px 0px;{elseif $list[pagelist].gallery_spacing eq 'Large'}margin: 15px 0px;{else}margin: 0px;{/if}{if $list[pagelist].gallery_border eq 'None'}border: 0px solid rgb(221, 221, 221);{elseif $list[pagelist].gallery_border eq 'Thin'}border: 2px solid rgb(221, 221, 221);{elseif $list[pagelist].gallery_border eq 'Medium'}border: 3px solid rgb(221, 221, 221);{elseif $list[pagelist].gallery_border eq 'Thick'}border: 4px solid rgb(221, 221, 221);{else}border: 0px solid rgb(221, 221, 221);{/if}">
				<img width="100%" height="200" src="{$SITE_DOMAIN_IMAGES_URL}/{$images[galimg].gallery_name}">
				</div>-->
				<a class="fancybox-thumbs imageGallery" style="{if $list[pagelist].gallery_column eq '2'}width: 49.95%; min-height:299px;max-height:299px;{elseif $list[pagelist].gallery_column eq '3'}width: 33.28%;min-height:199px;max-height:199px;{elseif $list[pagelist].gallery_column eq '4'}width: 24.95%;min-height:150px;max-height:150px;{elseif $list[pagelist].gallery_column eq '5'}width: 19.95%;min-height:120px;max-height:120px;{elseif $list[pagelist].gallery_column eq '6'}width: 16.62%;min-height:100px;max-height:100px;{else}width:49.95%;min-height:299px;max-height:299px;{/if}{if $list[pagelist].gallery_spacing eq 'None'}margin: 0px;{elseif $list[pagelist].gallery_spacing eq 'Small'}margin: 5px 0px;{elseif $list[pagelist].gallery_spacing eq 'Medium'}margin: 10px 0px;{elseif $list[pagelist].gallery_spacing eq 'Large'}margin: 15px 0px;{else}margin: 0px;{/if}" data-fancybox-group="thumb" href="{$SITE_DOMAIN_IMAGES_URL}/{$images[galimg].gallery_name}">
				 <div class="aspectratioline"></div>
                 	<div class="image_container">
               			<img width="100%" height="" src="{$SITE_DOMAIN_IMAGES_URL}/{$images[galimg].gallery_name_thumb}" style="{if $list[pagelist].gallery_border eq 'None'}border: 0px solid rgb(221, 221, 221);{elseif $list[pagelist].gallery_border eq 'Thin'}border: 2px solid rgb(221, 221, 221);{elseif $list[pagelist].gallery_border eq 'Medium'}border: 3px solid rgb(221, 221, 221);{elseif $list[pagelist].gallery_border eq 'Thick'}border: 4px solid rgb(221, 221, 221);{else}border: 0px solid rgb(221, 221, 221);{/if}">
                     </div>
				</a>
				{/section}
				</div>
				{/if}
				<div class="space"></div>
				<div class="clearfix"></div>
				{/if}
				<!--Gallery Ends-->
				{if $list[pagelist].map eq '1'}	
				<!--Map starts-->					
				<div class="mapshowDiv clearfix">
				<iframe name="ifrm" id="ifrm" frameborder="0" allowfullscreen="" src="gmapPage.php?zoom={$list[pagelist].map_zoom}&lat={$list[pagelist].map_lat}&lon={$list[pagelist].map_lon}&addr={$list[pagelist].map_addr}&page_list_id={$list[pagelist].pagelist}" width="100%" height="250"></iframe>
				</div>
				<div class="space"></div>
				<div class="clearfix"></div>
				{/if}
				<!--Map ends-->
				{if $list[pagelist].slider}
				<!--Slider Process Start-->
				{$objCommon->getSliderImage($list[pagelist].domain_id,$list[pagelist].page_id,$list[pagelist].pagelist)}
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
				{if $list[pagelist].google_adsense}
				<!--Google Adsense Start-->
				<div class="imagemaxwidth">
				{if $list[pagelist].google_ads eq 'script'}
				{literal}
				<script>          
				{/literal}
				{$list[pagelist].google_script_text}
				{literal}
				</script>  
				{/literal}
				{/if}
				{if $list[pagelist].google_ads eq 'image'}
				{$objCommon->getGoogleImage($list[pagelist].domain_id,$list[pagelist].page_id,$list[pagelist].pagelist)}
				<a href="{if $google_images.0.google_url}http://{/if}{$google_images.0.google_url}" target="_blank"><img src="{$SITE_GOOGLE_IMAGES_URL}/{$google_images.0.google_image_name}" alt="google image" width="100%" height="180" ></a>
				
				{/if}
				</div>
				<div class="space"></div>
				<div class="clearfix"></div>
				{/if}
				<!--Google Adsense End-->
                
                {if $list[pagelist].file}
                {$objCommon->getFile_name($list[pagelist].pagelist)}
                {if !empty($files)}
                <div id="fileTool" class="width100 block fileTool">
					<div class="filename">{$files.0.original_name}</div>                   
					<a href="{$SITE_BASEURL}/uploads/files/{$files.0.file_id}/{$files.0.original_name}">Download File</a>
				</div>
                {/if}
                {/if}                                               
				{/section}
				<div class="blogPageThemeBgBottimage"></div>
			<!--site  and blog content end-->
			<!--CONTENT END-->
			
			</div>
			</div>
		</div>
	</div>
	
    <!---draggable elements end------------>
{sectionelse}
	<div class="norec">{$LANG.user_blog_norecord}</div>
{/section}					

{/if}
<!---for drag ------------------------>
{literal}
<script type="text/javascript">
	$(document).ready(function() {
	    $('#slider').nivoSlider();
	});
</script>
{/literal}
