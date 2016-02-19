<div class="{$themecolorname} blogpublish"> {$objCommon->getImageForShowTop($blog_details.0.domain_id,'backgroundimage')}
     {$objCommon->getBannerEnable($blog_details.0.domain_id)}
     <div class="clearfix mainRightPanelInner">
          <div class="themewrapper5" {if $banner_config}{if $logoimages}style="background:url({$SITE_DOMAIN_IMAGES_URL}/{$logoimages});"{/if}{/if}>
               <div class="themewrapper4Cont wrapperCont5 clearfix">
                    <div class="themeLeftSep logoTopHoverOuter">
                         <div class="themewrapper2 themewrapper3 blogwrapper1 blogwrapper2">
                              <!--to show blog  title start-->
                              {if $blog_details}
                              <div class="blogthemeLogo">
                                   <div class="themewrapper1"> {if $blog_details.0.header_logo_config eq '1'}
                                        <div>
                                             <h2 class="mainPageThmeTitle" style="{if $blog_details.0.site_title_font_style}font-family:{$blog_details.0.site_title_font_style};{/if}{if $blog_details.0.site_title_font_size}font-size:{$blog_details.0.site_title_font_size}px;{/if}{if $blog_details.0.site_title_line_size}line-height:{$blog_details.0.site_title_line_size}px;{/if}"><a href="{$SITE_SOURCE_BASEURL}">{$blog_details.0.site_title}</a></h2>
                                        </div>
                                        {elseif $blog_details.0.header_logo_config eq '2'}
                                        {$objCommon->getImageForShowTop($blog_details.0.domain_id,'domainlogo')} <a href="{$SITE_SOURCE_BASEURL}"><img src="{$SITE_DOMAIN_IMAGES_URL}/{$logoimages}" alt="home image" width="200" height="100"></a> {elseif $blog_details.0.header_logo_config eq '0'}
                                        {/if} 
                                    </div>
                              </div>
                              {/if}
                              <!--to show blog  title end-->
                              <div class="clearfix"></div>
                              <div class="buildNavTabBg blogthemeNavTab">
                                   <div class="themewrapper1">
                                        <ul class="buildSection blogthemeNavTab_menu">
                                             {$objCommon->getPages_subdomain($blog_details.0.domain_id)}
                                             {section name="pages" loop="$buildpagelist1"}
                                             <li class="navTabSub"> {if $buildpagelist1[pages].seo_title eq 'link'} <a class="{if $smarty.session.page_id eq $buildpagelist1[pages].page_id}active{/if}"
href="http://{$buildpagelist1[pages].link_site}"{if $buildpagelist1[pages].link_status eq 'new'} target="_blank"{/if}style="{if $blog_details.0.nav_menu_font_style}font-family:{$blog_details.0.nav_menu_font_style};{/if}{if $blog_details.0.nav_menu_font_size}font-size:{$blog_details.0.nav_menu_font_size}px;{/if}{if $blog_details.0.nav_menu_line_size}line-height:{$blog_details.0.nav_menu_line_size}px;{/if}">{$buildpagelist1[pages].pagename}</a> {else} <a class="{if $smarty.session.page_id eq $buildpagelist1[pages].page_id}active{/if}"
href="{$SITE_SOURCE_BASEURL}/{$buildpagelist1[pages].seo_title}" style="{if $blog_details.0.nav_menu_font_style}font-family:{$blog_details.0.nav_menu_font_style};{/if}{if $blog_details.0.nav_menu_font_size}font-size:{$blog_details.0.nav_menu_font_size}px;{/if}{if $blog_details.0.nav_menu_line_size}line-height:{$blog_details.0.nav_menu_line_size}px;{/if}">{$buildpagelist1[pages].pagename}</a> {/if}
                                                  <ul>
                                                       {$objCommon->getSubPages($buildpagelist1[pages].page_id,$buildpagelist1[pages].domain_id)}
                                                       {section name="submenu" loop=$subbuildpagelist}
                                                       <li> <a class="{if $smarty.session.page_id eq $subbuildpagelist[submenu].page_id}active{/if}"
href="{$SITE_SOURCE_BASEURL}/{$subbuildpagelist[submenu].seo_title}">{$subbuildpagelist[submenu].pagename}</a> </li>
                                                       {/section}
                                                  </ul>
                                                  <!---for list drag elements in about us and contact us page start------->
                                                  <!---for list drag elements in about us and contact us page start------->
                                             </li>
                                             {/section}
                                        </ul>
                                   </div>
                              </div>
                              <!--to show pagename end-->
                         </div>
                    </div>
                    <!--common for both site and blog site title end -->
               </div>
               <!--CONTENT START-->
               <!--site and blog content start-->
               <div class="blogPageInner">
                    <div class="blogwrapper1 blogwrapper2 blog2wrapper">
                         <div class="blogPageBgInnerTop">
                              <div class="fireworkImg"></div>
                         </div>
                         <div class="blogPageBgInner blogPageBgInnerMiddle clearfix">
                              <div class="blogInner"> {if !empty($listpost) and $buildpagelist.0.blog_comments eq '1'}
                                   <div class="blogLeft">
                                        <ul class="no-mar">
                                             <li class="blog2compress">
                                                  <!---pagination start-->
                                                  <div class="paginationCont"> {$pagination} </div>
                                                  <!--Pagination End-->
                                             </li>
                                             {section name="tit" loop="$listpost"}
                                             <div class="clearfix outerblogwrap">
                                                  <div class="blogInnComm">
                                                       <div class="heading">{$listpost[tit].title}</div>
                                                       <!--date format-->
                                                       <div class="date">{$titlelist[tit].addeddate|date_format:'%b %d, %Y'|utf8_encode}</div>
                                                       <!--date format ends-->
                                                       <div class="addcomment"> {$objCommon->getComment($titlelist[tit].post_id)}
                                                            { if $objCommon->getCountComment($listpost[tit].post_id)}
                                                            <!--to show count of comments  starts-->
                                                            <a href="{$SITE_SOURCE_BASEURL}/{if $USERFRIENDLY eq 'Y'}postcomment/{$listpost[tit].post_id}/{$listpost[tit].seo_title}{else}postComment.php?post_id={$listpost[tit].post_id}{/if}" target="_blank">{$objCommon->getCountComment($listpost[tit].post_id)} {$LANG.main_blog_comments}</a>
                                                            <!--to show count of comments  ends-->
                                                            {else}
                                                            <!--to show count of comments  starts-->
                                                            <a href="{$SITE_SOURCE_BASEURL}/{if $USERFRIENDLY eq 'Y'}postcomment/{$listpost[tit].post_id}/{$listpost[tit].seo_title}{else}postComment.php?post_id={$listpost[tit].post_id}{/if}" target="_blank">{$LANG.common_blog_add}</a>
                                                            <!--to show count of comments  ends-->
                                                            {/if} </div>
                                                       <div class="fb"> {$objCommon->getSharebutton($listpost[tit].domain_id)}
                                                            {if $blogsettings.0.sharebutton eq '1'}
                                                            <!--twitter and facebook like for starts-->
                                                            <iframe src="//www.facebook.com/plugins/like.php?href={$SITE_SOURCE_BASEURL}/{$titlelist[tit].title}&amp;width&amp;layout=box_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=65&amp;appId=624881480908654" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:65px;" allowTransparency="true"></iframe>
                                                            {/if}
                                                            <!--twitter and facebook like for end-->
                                                       </div>
                                                  </div>
                                                 {$objCommon->ListDragInListPost($smarty.session.page_id,$titlelist[tit].post_id)}
				{section name="pagelist" loop="$list"}
				{if $list[pagelist].column_show eq '1'}
				<div class="tablesampleouter">
					<table class="sample2" width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr>
							{section name="rowcount" start=1 loop=$list[pagelist].column_count}
							<td id="col_{$smarty.section.rowcount.index}" {if $smarty.section.rowcount.index > $list[pagelist].column_count}style="display:none;"{/if} {if $smarty.section.rowcount.index eq '1'}{if $list[pagelist].td_col1}style="width:{$list[pagelist].td_col1}px;"{/if}{/if}{if $smarty.section.rowcount.index eq '2'}{if $list[pagelist].td_col2}style="width:{$list[pagelist].td_col2}px;"{/if}{/if}{if $smarty.section.rowcount.index eq '3'}{if $list[pagelist].td_col3}style="width:{$list[pagelist].td_col3}px;"{/if}{/if}{if $smarty.section.rowcount.index eq '4'}{if $list[pagelist].td_col4}style="width:{$list[pagelist].td_col4}px;"{/if}{/if}{if $smarty.section.rowcount.index eq '5'}{if $list[pagelist].td_col5}style="width:{$list[pagelist].td_col5}px;"{/if}{/if}>
							
                            	<div class="tablewidthmax">
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
                                             {/section}
                                             <!--Pagination start-->
                                             <div class="paginationCont"> {$pagination} </div>
                                             <!--Pagination end-->
                                        </ul>
                                   </div>
                                   <div class="blogRight">
                                        <div class="blogRhtInner">
                                             <!--comments end-->
                                             {if $blog_details}
                                             <!--author start-->
                                             <div class="authorTxtBg"> {if $blog_details.0.author}
                                                  {$blog_details.0.author}
                                                  {else}	
                                                  {$LANG.blog_page_author}
                                                  {/if} </div>
                                             <!--author end-->
                                             <div class="achiverTxtBgpublish"> {if $blog_details.0.archives}
                                                  <!--archives start-->
                                                  {$blog_details.0.archives}
                                                  {else}
                                                  {$LANG.blog_page_archives}
                                                  {/if} </div>
                                             <!--archives end-->
                                             <div id="cat_id" class="CatBg">
                                                  <!--categories start-->
                                                  <div class="authHead"> {if $blog_details.0.categories}
                                                       {$blog_details.0.categories}
                                                       {else}
                                                       {$LANG.common_blog_cat}
                                                       {/if} </div>
                                                  <div class="userList"> {$objCommon->selectCategory($blog_details.0.domain_id)} <a href="{$SITE_SOURCE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subpostlist/all{else}postListInSource.php?cat=all{/if}">
                                                       <div class="authCont">All</div>
                                                       </a> {section name="category" loop="$category"} <a href="{$SITE_SOURCE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subpostlist/{$category[category].cat_id}{else}postListInSource.php?cat={$category[category].cat_id}{/if}">
                                                       <div class="authCont">{$category[category].cat_name}</div>
                                                       </a> {/section}
                                                       <!--categories end-->
                                                  </div>
                                             </div>
                                             {/if} </div>
                                   </div>
                                   {/if}
                                   
                                   {$objCommon->getPageNameForSubBlog($smarty.session.page_id)}
                                   {if $pagenames_for_drag  neq 'Blog' }
                                   <!-----------other than blog page drag elements show----------------->
                                   {$objCommon->ListDragElementsInOtherPage($smarty.session.page_id)}
                                   {section name="pagelist" loop="$pagefirstlist"}
                                   {if $pagefirstlist[pagelist].column_show eq '1'}
                                   <div class="tablesampleouter">
                                        <table class="sample2" width="100%" border="0" cellpadding="0" cellspacing="0">
                                             <tr> {section name="rowcount" start=1 loop=$pagefirstlist[pagelist].column_count}
                                                  <td id="col_{$smarty.section.rowcount.index}" {if $smarty.section.rowcount.index > $pagefirstlist[pagelist].column_count}style="display:none;"{/if} {if $smarty.section.rowcount.index eq '1'}{if $pagefirstlist[pagelist].td_col1}style="width:{$pagefirstlist[pagelist].td_col1}px;"{/if}{/if}{if $smarty.section.rowcount.index eq '2'}{if $pagefirstlist[pagelist].td_col2}style="width:{$pagefirstlist[pagelist].td_col2}px;"{/if}{/if}{if $smarty.section.rowcount.index eq '3'}{if $pagefirstlist[pagelist].td_col3}style="width:{$pagefirstlist[pagelist].td_col3}px;"{/if}{/if}{if $smarty.section.rowcount.index eq '4'}{if $pagefirstlist[pagelist].td_col4}style="width:{$pagefirstlist[pagelist].td_col4}px;"{/if}{/if}{if $smarty.section.rowcount.index eq '5'}{if $pagefirstlist[pagelist].td_col5}style="width:{$pagefirstlist[pagelist].td_col5}px;"{/if}{/if}>
                                                       <div class="tablewidthmax"> {$objCommon->getColumnPageListForSource($smarty.section.rowcount.index,$pagefirstlist[pagelist].page_id,$pagefirstlist[pagelist].domain_id,$pagefirstlist[pagelist].pagelist)}
                                                            {section name="colpagelist" loop="$columnpagefirstlist"}
                                                            {if $columnpagefirstlist[colpagelist].title_select eq '1'}
                                                            <!--title starts-->
                                                            <div class="themehead main_title" style="{if $columnpagefirstlist[colpagelist].buildTitle_fontsize}font-size:{$columnpagefirstlist[colpagelist].buildTitle_fontsize}px;{/if}{if $columnpagefirstlist[colpagelist].buildTitle_fontcolor}color:{$columnpagefirstlist[colpagelist].buildTitle_fontcolor}{/if}{if $columnpagefirstlist[colpagelist].main_title_font_style}font-family:{$columnpagefirstlist[colpagelist].main_title_font_style};{/if}{if $columnpagefirstlist[colpagelist].main_title_line_size}line-height:{$columnpagefirstlist[colpagelist].main_title_line_size}px;{/if}"> {if !empty($columnpagefirstlist[colpagelist].text_title)}
                                                                 {$columnpagefirstlist[colpagelist].text_title}
                                                                 {/if} </div>
                                                            <div class="space"></div>
                                                            <div class="clearfix"></div>
                                                            {/if}
                                                            <!--title end-->
                                                            {if $columnpagefirstlist[colpagelist].description_select eq '1'}
                                                            <!--description starts-->
                                                            <div class="main_paragraph" style="{if $columnpagefirstlist[colpagelist].buildPara_fontsize}font-size:{$columnpagefirstlist[colpagelist].buildPara_fontsize}px;{/if}{if $columnpagefirstlist[colpagelist].buildPara_fontcolor}color:{$columnpagefirstlist[colpagelist].buildPara_fontcolor}{/if}{if $columnpagefirstlist[colpagelist].main_paragraph_font_style}font-family:{$columnpagefirstlist[colpagelist].main_paragraph_font_style};{/if}{if $columnpagefirstlist[colpagelist].main_paragraph_line_size}line-height:{$columnpagefirstlist[colpagelist].main_paragraph_line_size}px;{/if}"> {if !empty($columnpagefirstlist[colpagelist].text_description)}	
                                                                 {$columnpagefirstlist[colpagelist].text_description}
                                                                 {/if} </div>
                                                            <div class="space"></div>
                                                            <div class="clearfix"></div>
                                                            {/if}
                                                            <!--description end-->
                                                            {if $columnpagefirstlist[colpagelist].image_select eq '1'}
                                                            <!--image starts-->
                                                            {$objCommon->getImageInSubdomain($columnpagefirstlist[colpagelist].pagelist)}
                                                            {if $images}
                                                            <div class="imagemaxwidth"> <img src="{$SITE_DOMAIN_IMAGES_URL}/{$images}" alt="home image" width="{if $columnpagefirstlist[colpagelist].img_width}{$columnpagefirstlist[colpagelist].img_width}{/if}" height="{if $columnpagefirstlist[colpagelist].img_height}{$columnpagefirstlist[colpagelist].img_height}{else}{/if}"> </div>
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
                                                                      <div class="uploadImgBg"> {$objCommon->getImage($columnpagefirstlist[colpagelist].pagelist,'singletext')}
                                                                           {if $images} <img src="{$SITE_DOMAIN_IMAGES_URL}/{$images}" width="{if $columnpagefirstlist[colpagelist].img_width}{$columnpagefirstlist[colpagelist].img_width}{else}100%{/if}" height="{if $columnpagefirstlist[colpagelist].img_height}{$columnpagefirstlist[colpagelist].img_height}{/if}" > {/if} </div>
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
                                                            <div id="contact_form" class=""> {include file='contactform.tpl'} </div>
                                                            <div class="space"></div>
                                                            <div class="clearfix"></div>
                                                            {/if}
                                                            <!--contact form end-->
                                                            {if $columnpagefirstlist[colpagelist].social_plugins eq '1'}
                                                            <!--fan page starts-->
                                                            {$objCommon->getSocialDetails($columnpagefirstlist[colpagelist].pagelist)}
                                                            {if !empty($socialpagelist)}
                                                            {section name="social" loop="$socialpagelist"}
                                                            <div class="buildSocialIcon"> {if !empty($socialpagelist[social].fb)} <a href="{$socialpagelist[social].fb}">
                                                                 <input type="button" class="fbicon"/>
                                                                 </a> {/if}
                                                                 {if !empty($socialpagelist[social].twitter)} <a href="{$socialpagelist[social].twitter}">
                                                                 <input type="button" class="twittericon" />
                                                                 </a> {/if}
                                                                 {if !empty($socialpagelist[social].linkedin)} <a href="{$socialpagelist[social].linkedin}">
                                                                 <input type="button" class="linkedicon" />
                                                                 </a> {/if}
                                                                 {if !empty($socialpagelist[social].mail)} <a href="mailto:{$socialpagelist[social].mail}">
                                                                 <input type="button" class="mailicon" />
                                                                 </a> {/if} </div>
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
                                                            <div class="dc gallery_wrapper"> {section name="galimg" loop="$images"} <a class="fancybox-thumbs imageGallery" style="{if $columnpagefirstlist[colpagelist].gallery_column eq '2'}width: 49%;{elseif $columnpagefirstlist[colpagelist].gallery_column eq '3'}width: 32%;{elseif $columnpagefirstlist[colpagelist].gallery_column eq '4'}width: 24%;{elseif $columnpagefirstlist[colpagelist].gallery_column eq '5'}width: 19%;{elseif $columnpagefirstlist[colpagelist].gallery_column eq '6'}width: 15.5%;{else}width: 49%;{/if}{if $columnpagefirstlist[colpagelist].gallery_spacing eq 'None'}margin: 0px;{elseif $columnpagefirstlist[colpagelist].gallery_spacing eq 'Small'}margin: 5px 0px;{elseif $columnpagefirstlist[colpagelist].gallery_spacing eq 'Medium'}margin: 10px 0px;{elseif $columnpagefirstlist[colpagelist].gallery_spacing eq 'Large'}margin: 15px 0px;{else}margin: 0px;{/if}{if $columnpagefirstlist[colpagelist].gallery_border eq 'None'}border: 0px solid rgb(221, 221, 221);{elseif $columnpagefirstlist[colpagelist].gallery_border eq 'Thin'}border: 2px solid rgb(221, 221, 221);{elseif $columnpagefirstlist[colpagelist].gallery_border eq 'Medium'}border: 3px solid rgb(221, 221, 221);{elseif $columnpagefirstlist[colpagelist].gallery_border eq 'Thick'}border: 4px solid rgb(221, 221, 221);{else}border: 0px solid rgb(221, 221, 221);{/if}" data-fancybox-group="thumb" href="{$SITE_DOMAIN_IMAGES_URL}/{$images[galimg].gallery_name}">
                                                                 <div class="aspectratioline"></div>
                                                                 <div class="image_container"> <img height="" src="{$SITE_DOMAIN_IMAGES_URL}/{$images[galimg].gallery_name_thumb}"> </div>
                                                                 </a> {/section} </div>
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
                                                            <div id="slider" class="nivoSlider"> {section name="sliimg" loop="$images"}
                                                                 <div class="imageSlider"> <img width="100%" height="300" src="{$SITE_DOMAIN_IMAGES_URL}/{$images[sliimg].slider_images}"> </div>
                                                                 {/section} </div>
                                                            {/if} </div>
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
                                                       <div class="imagemaxwidth"> <a href="{if $google_images.0.google_url}http://{/if}{$google_images.0.google_url}" target="_blank"><img src="{$SITE_GOOGLE_IMAGES_URL}/{$google_images.0.google_image_name}" alt="google image" width="100%" height="180" ></a> </div>
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
                                                            <a href="{$SITE_BASEURL}/uploads/files/{$files.0.file_id}/{$files.0.original_name}">Download File</a> </div>
                                                       {/if}
                                                       
                                                       {/if} 
                                                       {/section} </td>
                                                  {/section} </tr>
                                        </table>
                                   </div>
                                   {/if}
                                   {if $pagefirstlist[pagelist].title_select eq '1'}
                                   <!--title starts-->
                                   <div class="themehead main_title" style="{if $pagefirstlist[pagelist].buildTitle_fontsize}font-size:{$pagefirstlist[pagelist].buildTitle_fontsize}px;{/if}{if $pagefirstlist[pagelist].buildTitle_fontcolor}color:{$pagefirstlist[pagelist].buildTitle_fontcolor}{/if}{if $pagefirstlist[pagelist].main_title_font_style}font-family:{$pagefirstlist[pagelist].main_title_font_style};{/if}{if $pagefirstlist[pagelist].main_title_line_size}line-height:{$pagefirstlist[pagelist].main_title_line_size}px;{/if}"> {if !empty($pagefirstlist[pagelist].text_title)}
                                        {$pagefirstlist[pagelist].text_title}
                                        {/if} </div>
                                   <div class="space"></div>
                                   <div class="clearfix"></div>
                                   {/if}
                                   <!--title end-->
                                   {if $pagefirstlist[pagelist].description_select eq '1'}
                                   <!--description starts-->
                                   <div class="main_paragraph" style="{if $pagefirstlist[pagelist].buildPara_fontsize}font-size:{$pagefirstlist[pagelist].buildPara_fontsize}px;{/if}{if $pagefirstlist[pagelist].buildPara_fontcolor}color:{$pagefirstlist[pagelist].buildPara_fontcolor}{/if}{if $pagefirstlist[pagelist].main_paragraph_font_style}font-family:{$pagefirstlist[pagelist].main_paragraph_font_style};{/if}{if $pagefirstlist[pagelist].main_paragraph_line_size}line-height:{$pagefirstlist[pagelist].main_paragraph_line_size}px;{/if}"> {if !empty($pagefirstlist[pagelist].text_description)}	
                                        {$pagefirstlist[pagelist].text_description}
                                        {/if} </div>
                                   <div class="space"></div>
                                   <div class="clearfix"></div>
                                   {/if}
                                   <!--description end-->
                                   {if $pagefirstlist[pagelist].image_select eq '1'}
                                   <!--image starts-->
                                   {$objCommon->getImageInSubdomain($pagefirstlist[pagelist].pagelist)}
                                   <div class="imagemaxwidth" style="text-align:{$imgalignment}"> {if $images} <img src="{$SITE_DOMAIN_IMAGES_URL}/{$images}" alt="home image" width="{if $pagefirstlist[pagelist].img_width}{$pagefirstlist[pagelist].img_width}{/if}" height="{if $pagefirstlist[pagelist].img_height}{$pagefirstlist[pagelist].img_height}{else}{/if}"/> {/if}
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
                                        <div class="span3">
                                             <div class="uploadImgBg"> {$objCommon->getImageTextInSubdomain($pagefirstlist[pagelist].pagelist,'singletext')}
                                                  {if $images} <img src="{$SITE_DOMAIN_IMAGES_URL}/{$images}" width="{if $pagefirstlist[pagelist].img_width}{$pagefirstlist[pagelist].img_width}{else}100%{/if}" height="{if $pagefirstlist[pagelist].img_height}{$pagefirstlist[pagelist].img_height}{else}180{/if}"> {/if} </div>
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
                                   <div id="contact_form" class=""> {include file='contactform.tpl'} </div>
                                   <div class="space"></div>
                                   <div class="clearfix"></div>
                                   {/if}
                                   <!--contact form end-->
                                   {if $pagefirstlist[pagelist].social_plugins eq '1'}
                                   <!--fan page starts-->
                                   {$objCommon->getSocialDetails($pagefirstlist[pagelist].pagelist)}
                                   {if !empty($socialpagelist)}
                                   {section name="social" loop="$socialpagelist"}
                                   <div class="buildSocialIcon" style="text-align:{$pagefirstlist[pagelist].social_plugin_alignment}"> {if !empty($socialpagelist[social].fb)} <a href="{$socialpagelist[social].fb}">
                                        <input type="button" class="fbicon"/>
                                        </a> {/if}
                                        {if !empty($socialpagelist[social].twitter)} <a href="{$socialpagelist[social].twitter}">
                                        <input type="button" class="twittericon" />
                                        </a> {/if}
                                        {if !empty($socialpagelist[social].linkedin)} <a href="{$socialpagelist[social].linkedin}">
                                        <input type="button" class="linkedicon" />
                                        </a> {/if}
                                        {if !empty($socialpagelist[social].mail)} <a href="mailto:{$socialpagelist[social].mail}">
                                        <input type="button" class="mailicon" />
                                        </a> {/if} </div>
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
                                   <div class="dc gallery_wrapper"> {section name="galimg" loop="$images"}
                                        <!--<div class="imageGallery gallerySorceClick" style="{if $pagefirstlist[pagelist].gallery_column eq '2'}width: 49%;{elseif $pagefirstlist[pagelist].gallery_column eq '3'}width: 32%;{elseif $pagefirstlist[pagelist].gallery_column eq '4'}width: 24%;{elseif $pagefirstlist[pagelist].gallery_column eq '5'}width: 19%;{elseif $pagefirstlist[pagelist].gallery_column eq '6'}width: 15.5%;{else}{/if}{if $pagefirstlist[pagelist].gallery_spacing eq 'None'}margin: 0px;{elseif $pagefirstlist[pagelist].gallery_spacing eq 'Small'}margin: 5px 0px;{elseif $pagefirstlist[pagelist].gallery_spacing eq 'Medium'}margin: 10px 0px;{elseif $pagefirstlist[pagelist].gallery_spacing eq 'Large'}margin: 15px 0px;{else}margin: 0px;{/if}{if $pagefirstlist[pagelist].gallery_border eq 'None'}border: 0px solid rgb(221, 221, 221);{elseif $pagefirstlist[pagelist].gallery_border eq 'Thin'}border: 2px solid rgb(221, 221, 221);{elseif $pagefirstlist[pagelist].gallery_border eq 'Medium'}border: 3px solid rgb(221, 221, 221);{elseif $pagefirstlist[pagelist].gallery_border eq 'Thick'}border: 4px solid rgb(221, 221, 221);{else}border: 0px solid rgb(221, 221, 221);{/if}">
<img width="100%" height="200" src="{$SITE_DOMAIN_IMAGES_URL}/{$images[galimg].gallery_name}">
</div>-->
                                        <a class="fancybox-thumbs imageGallery" style="{if $pagefirstlist[pagelist].gallery_column eq '2'}width: 49.95%; min-height:299px;max-height:299px;{elseif $pagefirstlist[pagelist].gallery_column eq '3'}width: 33.28%;min-height:199px;max-height:199px;{elseif $pagefirstlist[pagelist].gallery_column eq '4'}width: 24.95%;min-height:150px;max-height:150px;{elseif $pagefirstlist[pagelist].gallery_column eq '5'}width: 19.95%;min-height:120px;max-height:120px;{elseif $pagefirstlist[pagelist].gallery_column eq '6'}width: 16.62%;min-height:100px;max-height:100px;{else}width:49.95%;min-height:299px;max-height:299px;{/if}{if $pagefirstlist[pagelist].gallery_spacing eq 'None'}margin: 0px;{elseif $pagefirstlist[pagelist].gallery_spacing eq 'Small'}margin: 5px 0px;{elseif $pagefirstlist[pagelist].gallery_spacing eq 'Medium'}margin: 10px 0px;{elseif $pagefirstlist[pagelist].gallery_spacing eq 'Large'}margin: 15px 0px;{else}margin: 0px;{/if}" data-fancybox-group="thumb" href="{$SITE_DOMAIN_IMAGES_URL}/{$images[galimg].gallery_name}">
                                        <div class="aspectratioline"></div>
                                        <div class="image_container"> <img width="100%" height="" src="{$SITE_DOMAIN_IMAGES_URL}/{$images[galimg].gallery_name_thumb}" style="{if $pagefirstlist[pagelist].gallery_border eq 'None'}border: 0px solid rgb(221, 221, 221);{elseif $pagefirstlist[pagelist].gallery_border eq 'Thin'}border: 2px solid rgb(221, 221, 221);{elseif $pagefirstlist[pagelist].gallery_border eq 'Medium'}border: 3px solid rgb(221, 221, 221);{elseif $pagefirstlist[pagelist].gallery_border eq 'Thick'}border: 4px solid rgb(221, 221, 221);{else}border: 0px solid rgb(221, 221, 221);{/if}"> </div>
                                        </a> {/section} </div>
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
                                             <li class="imageSlider"> <img src="{$SITE_DOMAIN_IMAGES_URL}/{$images[sliimg].slider_images}"/> </li>
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
                                   <div class="imagemaxwidth"> {if $pagefirstlist[pagelist].google_ads eq 'script'}
                                        {literal}
                                        <script>          
{/literal}
{$pagefirstlist[pagelist].google_script_text}
{literal}
</script>
                                        {/literal}
                                        {/if}
                                        {if $pagefirstlist[pagelist].google_ads eq 'image'}
                                        {$objCommon->getGoogleImage($pagefirstlist[pagelist].domain_id,$pagefirstlist[pagelist].page_id,$pagefirstlist[pagelist].pagelist)} <a href="{if $google_images.0.google_url}http://{/if}{$google_images.0.google_url}" target="_blank"><img src="{$SITE_GOOGLE_IMAGES_URL}/{$google_images.0.google_image_name}" alt="google image" width="100%" height="180" ></a> {/if} </div>
                                   <div class="space"></div>
                                   <div class="clearfix"></div>
                                   {/if}
                                   <!--Google Adsense End-->
                                   {if $pagefirstlist[pagelist].file}
                                   {$objCommon->getFile_name($pagefirstlist[pagelist].pagelist)}
                                   {if !empty($files)}
                                   <div id="fileTool" class="width100 block fileTool">
                                        <div class="filename">{$files.0.original_name}</div>
                                        <a href="{$SITE_BASEURL}/uploads/files/{$files.0.file_id}/{$files.0.original_name}">Download File</a> </div>
                                   {/if}
                                   {/if}                                               
                                   {/section}
                                   <!---end second section-------------------------------------------------------------------------------------------->
                                   <!-----------other thatn blog page drag elements end----------------->
                                   {/if} </div>
                         </div>
                    </div>
                    <div class="blogPageBgInnerBottom"></div>
               </div>
          </div>
          <div class="clearfix"></div>
          <div class="footrAlign">
               <div class="themewrapper1 themewrapper2 footerBgSource themewrapper3 themewrapper4 themewrapper5 themewrapper6">
                    <!--show footer code details-->
                    {if $blog_details}
                    {$blog_details.0.footer_code}
                    <!--show footer code details end-->
                    {if $blog_details.0.footer_content}
                    {$blog_details.0.footer_content}
                    {else}
                    {$LANG.create_free_website} <a href="{$SITE_MAIN_DOMAIN}">{$LANG.webbxyz_name}</a> {/if}
                    
                    {/if} </div>
               <!--FOOTER CODE END-->
          </div>
          <!--site  and blog content end-->
     </div>
</div>
{if $blogname.0.blog_name|lower eq 'blog2' || $blogname.0.blog_name|lower eq 'blog3'}
{literal}
<script type="text/javascript">
$(document).ready(function(){
var winBlogHeight = $(document).height();
//$('.mainRightPanelInner').css({"height":winBlogHeight});
});
</script>
{/literal}
{/if}

{literal}
<script type="text/javascript">
$(document).ready(function(){
$('#slider').nivoSlider();
});
</script>
{/literal} 