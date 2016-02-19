{include file='main_js.tpl'}
<script type="text/javascript" src="{$SITE_JS_URL}/buildpage.js"></script>

<link href="{$SITE_BASEURL}/theme/{$smarty.session.themename}/css/theme.css" type="text/css" rel="stylesheet" />
<link href="{$SITE_CSS_URL}/design.css" type="text/css" rel="stylesheet" />

{$objCommon->getImageForShowTop($site_title.0.domain_id,'backgroundimage')}
{$objCommon->getBannerEnable($site_title.0.domain_id)}
<div class="clearfix {$smarty.session.themecolorname} {if $smarty.session.themename eq 'theme9'}theme9{/if}">
	<div class="clear2teheme"></div>
	<div class="themewrapper5 theme2Banner" {if $banner_config}{if $logoimages}style="background:url({$SITE_DOMAIN_IMAGES_URL}/{$logoimages}); background-size:100% 100%;"{/if}{/if}>
		<div class="theme5wrap">
			<div class="themewrapper4Cont wrapperCont5 clearfix" id="titheaddesUpdate">
				<div class="themeLeftSep mainRightPanelInnerTop">
					
					<div class="logoTopHoverOuter">
						<div class="themewrapper1 themewrapper3 blogwrapper1 logoTopHover blogwrapper2">
							<div class="theme4Wrapper">
								<div class="blogthemeLogo" onmouseover="titleShow()"  onmouseout="titleHide()">
									<div class="themewrapperLeft hei60">
										{$objCommon->getImageForShowTop($site_title.0.domain_id,'domainlogo')}
										{if $site_title.0.header_logo_config eq '1'}
										<div class="flt"><h2 class="mainPageThmeTitle site_title contentedit" id="updateTitle" contenteditable="true" onblur="return updateTitleIndex('{$smarty.session.domain_id}');" style="{if $site_title.0.site_title_font_style}font-family:{$site_title.0.site_title_font_style};{/if}{if $site_title.0.site_title_font_size}font-size:{$site_title.0.site_title_font_size}px;{/if}{if $site_title.0.site_title_line_size}line-height:{$site_title.0.site_title_line_size}px;{/if}">{if $site_title.0.site_title}{$site_title.0.site_title}{else}{/if}</h2></div>
										{elseif $site_title.0.header_logo_config eq '2'}
										<div class="logodiv" style="{if $site_title.0.logo_left}left:{$site_title.0.logo_left}px;{/if}{if $site_title.0.logo_top}top:{$site_title.0.logo_top}px;{/if}"><img class="logoresize" src="{$SITE_DOMAIN_IMAGES_URL}/{$logoimages}" width="{if $site_title.0.logo_width}{$site_title.0.logo_width}{else}200{/if}" height="{if $site_title.0.logo_height}{$site_title.0.logo_height}{else}50{/if}"></div>
										{elseif $site_title.0.header_logo_config eq '0'}
										{/if}
										<div id="showlogo">
											<ul class="hovershowLogo {if $site_title.0.header_logo_config eq '2'}logopopnew{/if}">
												<li class="{if $site_title.0.header_logo_config eq '0'}active{/if}" onclick="titleUpdateForShow('0','{$site_title.0.domain_id}')"><a href="javascript:void(0);"><span class="hovershowLogoArrowTop"></span> {$LANG.off_name}</a></li>
												<li class="{if $site_title.0.header_logo_config eq '1'}active{/if}" onclick="titleUpdateForShow('1','{$site_title.0.domain_id}')"><a href="javascript:void(0);"><span class="hovershowLogoArrowTop"></span> {$LANG.text_name}</a></li>
												{if $logoimages}
												<li class="{if $site_title.0.header_logo_config eq '2'}active{/if}" onclick="titleUpdateForShow('2','{$site_title.0.domain_id}')"><a href="javascript:void(0);"><span class="hovershowLogoArrowTop"></span>  {$LANG.logo_name}</a></li>	
												{if $site_title.0.header_logo_config eq '2'}
												<li onclick="return imageShow()"><a onclick="$('#uploadImgPopup').show();$('.loadmask').show();"><span class="hovershowLogoArrowTop"></span>  {$LANG.edit_logo_name}</a></li>
												{/if}
												{else}
												<li onclick="return imageShow()"><a onclick="$('#uploadImgPopup').show();$('.loadmask').show();"><span class="hovershowLogoArrowTop"></span>  {$LANG.logo_name}</a></li>
												{/if}	
											</ul>
										</div>
									</div>
								</div>
							</div>
							{if $smarty.session.themename neq 'store2'}
							{if $smarty.session.themename neq 'theme4'}
							{if $smarty.session.themename neq 'theme6'}
							{if $smarty.session.themename neq 'theme7'}
							{if $smarty.session.themename neq 'theme15'}
							{if $smarty.session.themename eq 'theme1' OR $smarty.session.themename eq 'theme10' OR $smarty.session.themename eq 'theme2' OR $smarty.session.themename eq 'theme3' OR $smarty.session.themename eq 'theme5' OR $smarty.session.themename eq 'blog1' OR $smarty.session.themename eq 'theme11' OR $smarty.session.themename eq 'theme12' OR $smarty.session.themename eq 'theme13' OR $smarty.session.themename eq 'theme14'}
							<div class="themewrapperRight">
								<div class="theme4Wrapper">
									<div class="buildNavTabBg blogthemeNavTab">
										<ul class="buildSection nav_menu blogthemeNavTab_menu" style="{if $site_title.0.nav_menu_font_style}font-family:{$site_title.0.nav_menu_font_style};{/if}{if $site_title.0.nav_menu_font_size}font-size:{$site_title.0.nav_menu_font_size}px;{/if}{if $site_title.0.nav_menu_line_size}line-height:{$site_title.0.nav_menu_line_size}px;{/if}">
											{if $smarty.session.domain_id}
											{$objCommon->getPages($site_title.0.domain_id)}
											{section name="pages" loop="$buildpagelist1"}
											<li class="navTabSub">
											{*	<a class="{if $smarty.session.page_id eq $buildpagelist1[pages].page_id}active{/if}"
											onclick="showPageListinBuild('{$buildpagelist1[pages].page_id}','{$buildpagelist1[pages].domain_id}')">{$buildpagelist1[pages].pagename}</a> *}
											{if $buildpagelist1[pages].seo_title eq 'link'}
											<span class="posRel">
											<a class="externalLinkBuildPopInn {if $smarty.session.page_id eq $buildpagelist1[pages].page_id}active{/if}" onmouseover="showexternalLinkContentPop('{$buildpagelist1[pages].link_site}');" onmouseout="mouseout('{$buildpagelist1[pages].link_site}');">{$buildpagelist1[pages].pagename}</a>
											<span id="externalLinkBuildPop" style="display:none;">
											External Link: <span id="content"></span>
											</span>
											</span>
											{else}
											<a class="{if $smarty.session.page_id eq $buildpagelist1[pages].page_id}active{/if}"
											onclick="showPageListinBuild('{$buildpagelist1[pages].page_id}','{$buildpagelist1[pages].domain_id}')">{$buildpagelist1[pages].pagename}</a>
											{/if}
											<ul>
												{$objCommon->getSubPages($buildpagelist1[pages].page_id,$site_title.0.domain_id)}
												{section name="submenu" loop=$subbuildpagelist}
												<li>
												<a class="{if $smarty.session.page_id eq $subbuildpagelist[submenu].page_id}active{/if}"
												onclick="showPageListinBuild('{$subbuildpagelist[submenu].page_id}','{$subbuildpagelist[submenu].domain_id}')">{$subbuildpagelist[submenu].pagename}</a>
												</li>
												{/section}
											</ul>
											</li>
											{/section}
											{/if}
										</ul>
									</div>
								</div>
							</div>
							{else}
							{if $smarty.session.themename neq 'theme9'}
							<div class="themewrapperRight">
								<div class="buildNavTabBg blogthemeNavTab">
									<ul class="buildSection nav_menu blogthemeNavTab_menu" style="{if $site_title.0.nav_menu_font_style}font-family:{$site_title.0.nav_menu_font_style};{/if}{if $site_title.0.nav_menu_font_size}font-size:{$site_title.0.nav_menu_font_size}px;{/if}{if $site_title.0.nav_menu_line_size}line-height:{$site_title.0.nav_menu_line_size}px;{/if}">
										{if $smarty.session.domain_id}
										{$objCommon->getPages($site_title.0.domain_id)}
										{section name="pages" loop="$buildpagelist1"}
										<li class="navTabSub">
										{*	<a class="{if $smarty.session.page_id eq $buildpagelist1[pages].page_id}active{/if}"
										onclick="showPageListinBuild('{$buildpagelist1[pages].page_id}','{$buildpagelist1[pages].domain_id}')">{$buildpagelist1[pages].pagename}</a>*}
										{if $buildpagelist1[pages].seo_title eq 'link'}
										<span class="posRel">
										<a class="externalLinkBuildPopInn {if $smarty.session.page_id eq $buildpagelist1[pages].page_id}active{/if}" onmouseover="showexternalLinkContentPop('{$buildpagelist1[pages].link_site}');" onmouseout="mouseout('{$buildpagelist1[pages].link_site}');">{$buildpagelist1[pages].pagename}</a>
										<span id="externalLinkBuildPop" style="display:none;">
										External Link: <span id="content"></span>
										</span>
										</span>
										{else}
										<a class="{if $smarty.session.page_id eq $buildpagelist1[pages].page_id}active{/if}"
										onclick="showPageListinBuild('{$buildpagelist1[pages].page_id}','{$buildpagelist1[pages].domain_id}')">{$buildpagelist1[pages].pagename}</a>
										{/if}
										<ul>
											{$objCommon->getSubPages($buildpagelist1[pages].page_id,$site_title.0.domain_id)}
											{section name="submenu" loop=$subbuildpagelist}
											<li>
											<a class="{if $smarty.session.page_id eq $subbuildpagelist[submenu].page_id}active{/if}"
											onclick="showPageListinBuild('{$subbuildpagelist[submenu].page_id}','{$subbuildpagelist[submenu].domain_id}')">{$subbuildpagelist[submenu].pagename}</a>
											</li>
											{/section}
										</ul>
										</li>
										{/section}
										{/if}
									</ul>
								</div>
							</div>
							{/if}
							{/if}
							{/if}
							{/if}
							{/if}
							{/if}
							{/if}
							{if $smarty.session.themename eq 'theme7'}
							<div class="themewrapperRight">
								<div class="theme4Wrapper">
									<div class="buildNavTabBg blogthemeNavTab">
										<ul class="buildSection nav_menu blogthemeNavTab_menu" style="{if $site_title.0.nav_menu_font_style}font-family:{$site_title.0.nav_menu_font_style};{/if}{if $site_title.0.nav_menu_font_size}font-size:{$site_title.0.nav_menu_font_size}px;{/if}{if $site_title.0.nav_menu_line_size}line-height:{$site_title.0.nav_menu_line_size}px;{/if}">
											{if $smarty.session.domain_id}
											{$objCommon->getPages($site_title.0.domain_id)}
											{section name="pages" loop="$buildpagelist1"}
											<li class="navTabSub">
											{*	<a class="{if $smarty.session.page_id eq $buildpagelist1[pages].page_id}active{/if}"
											onclick="showPageListinBuild('{$buildpagelist1[pages].page_id}','{$buildpagelist1[pages].domain_id}')">{$buildpagelist1[pages].pagename}</a> *}
											{if $buildpagelist1[pages].seo_title eq 'link'}
											<span class="posRel">
											<a class="externalLinkBuildPopInn {if $smarty.session.page_id eq $buildpagelist1[pages].page_id}active{/if}" onmouseover="showexternalLinkContentPop('{$buildpagelist1[pages].link_site}');" onmouseout="mouseout('{$buildpagelist1[pages].link_site}');">{$buildpagelist1[pages].pagename}</a>
											<span id="externalLinkBuildPop" style="display:none;">
											External Link: <span id="content"></span>
											</span>
											</span>
											{else}
											<a class="{if $smarty.session.page_id eq $buildpagelist1[pages].page_id}active{/if}"
											onclick="showPageListinBuild('{$buildpagelist1[pages].page_id}','{$buildpagelist1[pages].domain_id}')">{$buildpagelist1[pages].pagename}</a>
											{/if}
											<ul>
												{$objCommon->getSubPages($buildpagelist1[pages].page_id,$site_title.0.domain_id)}
												{section name="submenu" loop=$subbuildpagelist}
												<li>
												<a class="{if $smarty.session.page_id eq $subbuildpagelist[submenu].page_id}active{/if}"
												onclick="showPageListinBuild('{$subbuildpagelist[submenu].page_id}','{$subbuildpagelist[submenu].domain_id}')">{$subbuildpagelist[submenu].pagename}</a>
												</li>
												{/section}
											</ul>
											</li>
											{/section}
											{/if}
										</ul>
									</div>
								</div>
							</div>
							{/if}
						</div>
					</div>
					<div class="headerNavShadow"></div>	
					<input type="hidden" name="page_id" id="page_id" value="{$smarty.session.page_id}">
					<input type="hidden" name="domain_id" id="domain_id" value="{$smarty.session.domain_id}">
					{if $smarty.session.domain_id}
					<input type="hidden" name="blog_comment" id="blog_comment" value="{$objCommon->getBlogComment($smarty.session.page_id)}"/>
					<input type="hidden" name="store_comment" id="store_comment" value="{$objCommon->getStoreComment($smarty.session.page_id)}"/>
					{/if}
					<input type="hidden" name="clickid" id="clickid" value="">
					{if $smarty.session.themeOnuse}
					<div class="clearfix"></div>
					<div class="themeRightSepOuter">
						<div class="themeRightSep">
							<div class="mainRhtBanner clearfix">
								{if $site_title.0.header_banner eq 0 and $site_title.0.header_slider eq 0}
								<div class="mainRhtBannerInner">
								{$objCommon->getImageForShowTop($site_title.0.domain_id,'bannerimage')}
								{$objCommon->getBannerStatus($smarty.session.page_id)}
									{if $banner_status eq 'need'}
									<div class="mainRhtBannerInnerBanner relative" {if $logoimages}style="background:url({$SITE_DOMAIN_IMAGES_URL}/{$logoimages});"{/if}>
										<a class="editbannerTxt theme4editimg"   onclick="$('#editBannerImg').show();$('.loadmask').show();">
										{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
										</a>
										<a class="editbannerTxt"  {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else} onclick="$('#sliderBannerImg').show();$('.loadmask').show();" {/if}>
										{$LANG.slider_name} <i class="fa fa-caret-down"></i>
										</a>
										
										<div class="mainRhtBannerInnerRight">
                                            <h2 class="mainRhtBannerInnerHead main_headline" style="{if $site_title.0.main_headline_font_style}font-family:{$site_title.0.main_headline_font_style};{/if}{if $site_title.0.main_headline_font_size}font-size:{$site_title.0.main_headline_font_size}px;{/if}{if $site_title.0.main_headline_line_size}line-height:{$site_title.0.main_headline_line_size}px;{/if}">
                                                <div id="headingContent"  contenteditable="true"  data-ph="Başlığı Güncelle"  class="minhead headlimit contentedit {if $site_title.0.heading_content eq ''}clickheretext contenttext{/if}" onblur="updateHeading('{$smarty.session.domain_id}')" >{if $site_title.0.heading_content}{$site_title.0.heading_content}{/if}</div>
                                            </h2>
                                            <div class="mainRhtBannerInnerDesc contentedit{if $site_title.0.heading_description eq ''} clickheretext contenttext{/if}" id="headingdescription" contenteditable="true" data-ph="Açıklamayı Güncelle"  onblur="updateDescriptionTitle('{$smarty.session.domain_id}')" >{if $site_title.0.heading_description}{$site_title.0.heading_description}{/if}</div>
                                        </div>
										
									</div>
									{/if}
								</div>
								{/if}
								{if $site_title.0.header_banner}
								<div class="mainRhtBannerInner">
								{$objCommon->getImageForShowTop($site_title.0.domain_id,'bannerimage')}
								{$objCommon->getBannerStatus($smarty.session.page_id)}
									{if $banner_status eq 'need'}
									<div class="mainRhtBannerInnerBanner" {if $logoimages}style="background:url({$SITE_DOMAIN_IMAGES_URL}/{$logoimages});"{/if}>
										<a class="editbannerTxt theme4editimg"   onclick="$('#editBannerImg').show();$('.loadmask').show();">
										{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
										</a>
										<a class="editbannerTxt"  {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else} onclick="$('#sliderBannerImg').show();$('.loadmask').show();" {/if}>
										{$LANG.slider_name} <i class="fa fa-caret-down"></i>
										</a>
										<div class="themewrapper3">
											<div class="mainRhtBannerInnerRight">
												<h2 class="mainRhtBannerInnerHead main_headline" style="{if $site_title.0.main_headline_font_style}font-family:{$site_title.0.main_headline_font_style};{/if}{if $site_title.0.main_headline_font_size}font-size:{$site_title.0.main_headline_font_size}px;{/if}{if $site_title.0.main_headline_line_size}line-height:{$site_title.0.main_headline_line_size}px;{/if}">
													<div id="headingContent"  contenteditable="true"  data-ph="Başlığı Güncelle"  class="minhead headlimit contentedit {if $site_title.0.heading_content eq ''}clickheretext contenttext{/if}" onblur="updateHeading('{$smarty.session.domain_id}')">{if $site_title.0.heading_content}{$site_title.0.heading_content}{/if}</div>
												</h2>
												<div class="mainRhtBannerInnerDesc contentedit{if $site_title.0.heading_description eq ''} clickheretext contenttext{/if}" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onblur="updateDescriptionTitle('{$smarty.session.domain_id}')" >{if $site_title.0.heading_description}{$site_title.0.heading_description}{/if}</div>
											</div>
										</div>
									</div>
									{/if}
								</div>
								{/if}
								{if $site_title.0.header_slider}
								<div class="mainRhtBannerInner clr">
									{*$objCommon->getImageForBannerSlider($site_title.0.domain_id,'sliderimage')*}
									{if $smarty.session.domain_id}
									{$objCommon->getBannerSliderImage($smarty.session.domain_id,'sliderimage')}
									{/if}
									<div class="slideBannerRel">
										<a class="slideeditbannerTxt"   onclick="$('#editBannerImg').show();$('.loadmask').show();">
										{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
										</a>
										<a class="slideeditSlide"  {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else} onclick="$('#sliderBannerImg').show();$('.loadmask').show();" {/if}>
										{$LANG.slider_name} <i class="fa fa-caret-down"></i>
										</a>
										<div id="slider2" class="nivoSlider">
											{section name="sliimg" loop="$banner_images"}
											<div class="SlideUplWidt">
												<img width="100%" height="150" src="{$SITE_DOMAIN_IMAGES_URL}/{$banner_images[sliimg].image_name}"/> 	 
											</div>
											{/section}
										</div>
									</div>
								</div>
								{/if}
							</div>
						</div>
					</div>
					{/if}
				</div>
			</div>
			<div class="blogPageInner">
				<div class="blogPageInnerBg blogPageThemeBg">
					<div class="blogwrapper1 blogwrapper2 theme4Wrapper blog2wrapper relative mainwrapper">
						<!--<div id="toolbar" style="display:none;"></div>-->
						<div class="blogPageBgInnerTop"><div class="fireworkImg"></div></div>
						{include file='droppablePage.tpl'}
					</div>	
					<div class="clearfix clr"></div>
					<div class="footrAlign">
						<div class="footerWrapTop8"></div>
						<div class="themewrapper1 themewrapper2 footerBgSource themewrapper3 themewrapper4 themewrapper5 themewrapper6">
							{$objCommon->getCurrentDomainDetails()}
							{if $subsdetails.0.subs_monthly_date  le $current_date}
							{$LANG.create_free_website} <a href="http://{$SITE_MAIN_DOMAIN}">{$LANG.webbxyz_name}</a><a class="footerbutton" href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}" target="_blank">{$LANG.edit_name}</a>
							{else}
							<div class="contentedit" contenteditable="true" onblur="return updateFooterContent();" id="footer_main">{if $settingpage.0.footer_content}{$settingpage.0.footer_content}{else}{$LANG.create_free_website} <a href="http://{$SITE_MAIN_DOMAIN}">{$LANG.webbxyz_name}</a>{/if}</div>
							
							{/if}
						</div>
					</div>	
					<div class="dragMask"></div>
				</div>	
				
			</div>
			<div class="formattoolBg">
					<span class="text-bold"><i class="fa fa-bold"></i></span>
					<span class="text-italic"><i class="fa fa-italic"></i></span>
					<span class="text-underline"><i class="fa fa-underline"></i></span>
					<span class="text-strikethrough"><i class="fa fa-strikethrough"></i></span>
					<span class="text-plusfontSize"><i class="fa fa-plus"></i></span>
					<span class="text-minusfontSize"><i class="fa fa-minus"></i></span>
					<span class="text-showPalette"><i class="fa fa-font"></i></span>
					<span class="text-align">
						<i class="fa fa-align-left"></i>
						<span class="text-alignType">
						<span class="textalignLeft"><i class="fa fa-align-left"></i></span>
						<span class="textalignRight"><i class="fa fa-align-right"></i></span>
						<span class="textalignCenter"><i class="fa fa-align-center"></i></span>
						<span class="textalignJustify"><i class="fa fa-align-justify"></i></span>
					</span>
					</span>
				</div>		
				<div id="modals">
					<div id="editBannerImg" class="browseImgPopup" style="display:none;">
						<div id="image-chooser-nav">
							<!--<div class="image-chooser-tab image-chooser-tab-selected" id="image-chooser-tab-computer"><span>{$LANG.my_computer_name}</span></div>-->
							<div id="image-chooser-nav-label">
								<div>{$LANG.select_image_from} {$LANG.my_computer_name}</div>
							</div>
							<div class="close PopCloseButt btn btn-danger" onclick="$('#editBannerImg').hide();$('.loadmask').hide();">CLOSE [ X ]</div>
						</div>
						<div class="popBrowseInner" name="popupbrowsebanner" id="popupbrowsebanner">
							<div id='imageloadstatus' style="display:none;">
								<div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div>
							</div>
							<form id="bannerimageform" class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='{$SITE_BASEURL}/ajaxImageUpload.php' style="clear:both">
								<div class="uploadTxtPop">{$LANG.click_here_or_edit_change_image}</div>
								<div class="dc">
									<label for="file" class="input input-file" style="display:block" name="imageloadbutton" id="imageloadbutton">
										<div class="button">
											<input type="file" value="" name="photos[]" id="photobannerimg">
											{$LANG.browse_name}
										</div>
										<input type='hidden' name="status" value="bannerimage"/>
									</label>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--new banner slider process start-->
				<div id="modals">
					<div id="sliderBannerImg" class="browseImgPopup" style="display:none;">
						<div id="image-chooser-nav">
							<!--<div class="image-chooser-tab image-chooser-tab-selected" id="image-chooser-tab-computer">
								<span>{$LANG.my_computer_name}</span>
							</div>-->
							<div id="image-chooser-nav-label">
								<div>{$LANG.select_image_from} {$LANG.my_computer_name}</div>
							</div>
							<div class="close PopCloseButt btn btn-danger" onclick="$('#sliderBannerImg').hide();$('.loadmask').hide();">CLOSE [ X ]</div>
						</div>
						<div class="popBrowseInner">
							<div class="uploadTxtPop">{$LANG.click_here_or_edit_change_image}</div>
							<div class="row-fluid" id="sliderBanner">
								<div class="span3">
									<div name="popupbrowseslider" id="popupbrowseslider">
										<div id='imageloadstatus' style="display:none;">
											<div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div>
										</div>
										<form id="sliderimageform" class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxBannerSliderImageUpload.php' style="clear:both">
											<div class="dc">
												<label for="file" class="input input-file no-mar" style="display:block" name="imageloadbutton" id="imageloadbutton">
													<div class="maxWidtPopSlide">{$LANG.max_width_and_height}</div>
														<div class="button">
															<input type="file" value="" name="photos[]" id="photosliderimg" style="height:190px;">
															{$LANG.browse_name}
														</div>
													<input type='hidden' name="status" value="sliderimage"/>
												</label>
											</div>
										</form>
										<div class="dc marTop10">
											<a class="saveButtonInput" onclick="reloadPagelist();$('.loadmask').hide();">Save changes</a>    
										</div>
									</div>
								</div>
								<div class="span9">
									{if $smarty.session.domain_id}
									{$objCommon->getBannerSliderImage($smarty.session.domain_id,'sliderimage')}
									{/if}
									{if !$banner_images}
									<div id="banner_preview"></div>
									{/if}
									{if $banner_images}
									<div id="sortableImg" class="SlideUploadImge">
										<div id="banner_preview"></div>
										{section name="sliimg" loop="$banner_images"}
										<div class="SlideUplWidtPopup">
											<img width="100%" height="150" src="{$SITE_DOMAIN_IMAGES_URL}/{$banner_images[sliimg].image_name}"/>
											<a onclick="deleteSliderBannerImage('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$banner_images[sliimg].img_id}','sliderimage');" class="galleryimage"><img src="{$SITE_BASEURL}/images/Close.png" alt="" title="" /></a>
										</div>
										{/section}
									</div> 
									{/if}
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--new banner slider process end-->
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
					{include file="sliderPopUp.tpl"}
				</div>
				<div id="sliderPopColumn" style="display:none;" class="sliderPopCont modal">
					{include file="sliderPopUpColumn.tpl"}
				</div>
		</div>
	</div>
</div>