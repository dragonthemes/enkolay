{include file='main_js.tpl'}

{$objCommon->getImageForShowTop($site_title.0.domain_id,'backgroundimage')}
{$objCommon->getBannerEnable($site_title.0.domain_id)}
{$objCommon->BackgroundForShowTop($site_title.0.domain_id)}
<div class="clearfix {$smarty.session.themecolorname} {if $smarty.session.themename eq 'theme9'}theme9{/if}">
	<div class="clear2teheme"></div>
	<div class="theme2Banner clearfix" id="theme_background" style="{if $banner_config}{if $logoimages && $default_switch eq 'N'}background:url({$SITE_DOMAIN_IMAGES_URL}/{$logoimages}); background-size:100% 100%;{/if}{else}{if $background_color.0.background_color neq '' && $background_color.0.background_color_off eq 'N' && $default_switch eq 'N'}background-color:{$background_color.0.background_color}{/if}{/if}">
		
			<div class="themewrapper4Cont wrapperCont5 clearfix" id="titheaddesUpdate">
				<div class="themeLeftSep mainRightPanelInnerTop">
					
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
								<div class="mainRhtBannerInner">
									{if $site_title.0.header_banner eq 0 and $site_title.0.header_slider eq 0}
									{$objCommon->getImageForShowTop($site_title.0.domain_id,'bannerimage')}
									{$objCommon->getBannerStatus($smarty.session.page_id)}
									{if $banner_status eq 'need'}
									<div class="mainRhtBannerInnerBanner" {if $logoimages}style="background-image:url({$SITE_DOMAIN_IMAGES_URL}/{$logoimages});"{/if}>
                                    	<div class="themewrapperRight">
                                                <div class="theme5wrap">
                                                    <div class="buildNavTabBg blogthemeNavTab">
                                                        <ul class="buildSection nav_menu blogthemeNavTab_menu" style="{if $site_title.0.nav_menu_font_style}font-family:{$site_title.0.nav_menu_font_style};{/if}{if $site_title.0.nav_menu_font_size}font-size:{$site_title.0.nav_menu_font_size}px;{/if}{if $site_title.0.nav_menu_line_size}line-height:{$site_title.0.nav_menu_line_size}px;{/if}">
                                                            {if $smarty.session.domain_id}
                                                            {$objCommon->getPages($site_title.0.domain_id)}
                                                            {section name="pages" loop="$buildpagelist1"}
                                                            <li class="navTabSub">
                                                            {*	<a class="{if $smarty.session.page_id eq $buildpagelist1[pages].page_id}active{/if}"
                                                            onclick="showPageListinBuild('{$buildpagelist1[pages].page_id}','{$buildpagelist1[pages].domain_id}')">{$buildpagelist1[pages].pagename}</a>*}
                                                            {if $buildpagelist1[pages].seo_title eq 'link'}
                                                            <span class="posRel flt">
                                                            <a class="externalLinkBuildPopInn {if $smarty.session.page_id eq $buildpagelist1[pages].page_id}active{/if}" onmouseover="showexternalLinkContentPop('{$buildpagelist1[pages].link_site}','{$buildpagelist1[pages].page_id}');" onmouseout="mouseout('{$buildpagelist1[pages].link_site}','{$buildpagelist1[pages].page_id}');">{$buildpagelist1[pages].pagename}</a>
                                                                            <span class="externalLinkBuildPop" id="externalLinkBuildPop_{$buildpagelist1[pages].page_id}" style="display:none;">
                                                                                <span class="content"></span>
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
										<div class="logoTopHoverOuter">
                                            <div class="themewrapper1 themewrapper3 blogwrapper1 logoTopHover blogwrapper2">
                                                <div class="theme4Wrapper">
                                                    <div class="blogthemeLogo" onmouseover="titleShow()"  onmouseout="titleHide()">
                                                        <div class="themewrapperLeft hei60">
                                                            {$objCommon->getImageForShowTop($site_title.0.domain_id,'domainlogo')}
                                                            {if $site_title.0.header_logo_config eq '1'}
                                                            <div class="flt"><h2 class="mainPageThmeTitle site_title contentedit" id="updateTitle" contenteditable="true" onblur="return updateTitleIndex('{$smarty.session.domain_id}');" style="{if $site_title.0.site_title_font_style}font-family:{$site_title.0.site_title_font_style};{/if}{if $site_title.0.site_title_font_size}font-size:{$site_title.0.site_title_font_size}px;{/if}{if $site_title.0.site_title_line_size}line-height:{$site_title.0.site_title_line_size}px;{/if}">{if $site_title.0.site_title}{$site_title.0.site_title}{else}{/if}</h2></div>
                                                            {elseif $site_title.0.header_logo_config eq '2'}
                                                            <div class="logodiv" style="{if $site_title.0.logo_left}left:{$site_title.0.logo_left}px;{/if}{if $site_title.0.logo_top}top:{$site_title.0.logo_top}px;{/if}"><img class="logoresize" src="{$SITE_DOMAIN_IMAGES_URL}/{$logoimages}" width="{if $site_title.0.logo_width}{$site_title.0.logo_width}{else}{/if}" height="{if $site_title.0.logo_height}{$site_title.0.logo_height}{else}{/if}"></div>
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
                                            </div>
                                        </div>
										<a class="editbannerTxt"   onclick="$('#editBannerImg').show();$('.loadmask').show();">
										{$LANG.edit_image_name}  
										</a>
										
										<a class="editbannerTxt" onclick="$('#sliderBannerImg').show();$('.loadmask').show();">
										{$LANG.slider_name}  
										</a>
										<div class="themewrapper3">
											<div class="mainRhtBannerInnerRight">
												<input type="hidden" value="" class="headlimitInput" />
												<h2 class="mainRhtBannerInnerHead main_headline" style="{if $site_title.0.main_headline_font_style}font-family:{$site_title.0.main_headline_font_style};{/if}{if $site_title.0.main_headline_font_size}font-size:{$site_title.0.main_headline_font_size}px;{/if}{if $site_title.0.main_headline_line_size}line-height:{$site_title.0.main_headline_line_size}px;{/if}">
													<div id="headingContent" contenteditable="true" data-ph="Başlığı Güncelle"  class="minhead headlimit contentedit {if $site_title.0.heading_content eq ''}clickheretext contenttext{/if}" onchange="updateHeading('{$smarty.session.domain_id}')"   onblur="updateHeading('{$smarty.session.domain_id}')" >{if $site_title.0.heading_content}{$site_title.0.heading_content}{/if}</div>
												</h2>										
												<div class="mainRhtBannerInnerDesc contentedit{if $site_title.0.heading_description eq ''} clickheretext contenttext{/if}" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onchange="updateDescriptionTitle('{$smarty.session.domain_id}')"  onblur="updateDescriptionTitle('{$smarty.session.domain_id}')"   >{if $site_title.0.heading_description}{$site_title.0.heading_description}{/if}</div>
											</div>
										</div>
									</div>
									{/if}
									{/if}
									{if $site_title.0.header_banner}
									{$objCommon->getBannerStatus($smarty.session.page_id)}
									{if $banner_status eq 'need'}
									{$objCommon->getImageForShowTop($site_title.0.domain_id,'bannerimage')}
									<div class="mainRhtBannerInnerBanner" {if $logoimages}style="background-image:url({$SITE_DOMAIN_IMAGES_URL}/{$logoimages});"{/if}>
                                    	<div class="themewrapperRight">
                    	<div class="theme5wrap">
                        	<div class="buildNavTabBg blogthemeNavTab">
                            <ul class="buildSection nav_menu blogthemeNavTab_menu" style="{if $site_title.0.nav_menu_font_style}font-family:{$site_title.0.nav_menu_font_style};{/if}{if $site_title.0.nav_menu_font_size}font-size:{$site_title.0.nav_menu_font_size}px;{/if}{if $site_title.0.nav_menu_line_size}line-height:{$site_title.0.nav_menu_line_size}px;{/if}">
                                {if $smarty.session.domain_id}
                                {$objCommon->getPages($site_title.0.domain_id)}
                                {section name="pages" loop="$buildpagelist1"}
                                <li class="navTabSub">
                                {*	<a class="{if $smarty.session.page_id eq $buildpagelist1[pages].page_id}active{/if}"
                                onclick="showPageListinBuild('{$buildpagelist1[pages].page_id}','{$buildpagelist1[pages].domain_id}')">{$buildpagelist1[pages].pagename}</a>*}
                                {if $buildpagelist1[pages].seo_title eq 'link'}
                                
                                <a class="externalLinkBuildPopInn {if $smarty.session.page_id eq $buildpagelist1[pages].page_id}active{/if}" onmouseover="showexternalLinkContentPop('{$buildpagelist1[pages].link_site}','{$buildpagelist1[pages].page_id}');" onmouseout="mouseout('{$buildpagelist1[pages].link_site}','{$buildpagelist1[pages].page_id}');">{$buildpagelist1[pages].pagename}</a>
                                                <span class="externalLinkBuildPop" id="externalLinkBuildPop_{$buildpagelist1[pages].page_id}" style="display:none;">
                                                	<span class="content"></span>
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
										<div class="logoTopHoverOuter">
						<div class="themewrapper1 themewrapper3 blogwrapper1 logoTopHover blogwrapper2">
							<div class="theme4Wrapper">
								<div class="blogthemeLogo" onmouseover="titleShow()"  onmouseout="titleHide()">
									<div class="themewrapperLeft hei60">
										{$objCommon->getImageForShowTop($site_title.0.domain_id,'domainlogo')}
										{if $site_title.0.header_logo_config eq '1'}
										<div class="flt"><h2 class="mainPageThmeTitle site_title contentedit" id="updateTitle" contenteditable="true" onblur="return updateTitleIndex('{$smarty.session.domain_id}');" style="{if $site_title.0.site_title_font_style}font-family:{$site_title.0.site_title_font_style};{/if}{if $site_title.0.site_title_font_size}font-size:{$site_title.0.site_title_font_size}px;{/if}{if $site_title.0.site_title_line_size}line-height:{$site_title.0.site_title_line_size}px;{/if}">{if $site_title.0.site_title}{$site_title.0.site_title}{else}{/if}</h2></div>
										{elseif $site_title.0.header_logo_config eq '2'}
										<div class="logodiv" style="{if $site_title.0.logo_left}left:{$site_title.0.logo_left}px;{/if}{if $site_title.0.logo_top}top:{$site_title.0.logo_top}px;{/if}"><img class="logoresize" src="{$SITE_DOMAIN_IMAGES_URL}/{$logoimages}" width="{if $site_title.0.logo_width}{$site_title.0.logo_width}{else}{/if}" height="{if $site_title.0.logo_height}{$site_title.0.logo_height}{else}{/if}"></div>
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
						</div>
					</div>
										<a class="editbannerTxt"   onclick="$('#editBannerImg').show();$('.loadmask').show();">
										{$LANG.edit_image_name}  
										</a>
										
										<a class="editbannerTxt"  onclick="$('#sliderBannerImg').show();$('.loadmask').show();">
										{$LANG.slider_name}  
										</a>
										<div class="themewrapper3">
											<div class="mainRhtBannerInnerRight">
												<h2 class="mainRhtBannerInnerHead main_headline" style="{if $site_title.0.main_headline_font_style}font-family:{$site_title.0.main_headline_font_style};{/if}{if $site_title.0.main_headline_font_size}font-size:{$site_title.0.main_headline_font_size}px;{/if}{if $site_title.0.main_headline_line_size}line-height:{$site_title.0.main_headline_line_size}px;{/if}">
													<div id="headingContent"  contenteditable="true"  data-ph="Başlığı Güncelle"  class="minhead headlimit contentedit {if $site_title.0.heading_content eq ''}clickheretext contenttext{/if}" onchange="updateHeading('{$smarty.session.domain_id}')"   onblur="updateHeading('{$smarty.session.domain_id}')">{if $site_title.0.heading_content}{$site_title.0.heading_content}{/if}</div>
												</h2>
												<div class="mainRhtBannerInnerDesc contentedit{if $site_title.0.heading_description eq ''} clickheretext contenttext{/if}" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onchange="updateDescriptionTitle('{$smarty.session.domain_id}')"  onblur="updateDescriptionTitle('{$smarty.session.domain_id}')"  >{if $site_title.0.heading_description}{$site_title.0.heading_description}{/if}</div>
											</div>
										</div>
									</div>
									{/if}
									{/if}
									{if $site_title.0.header_slider}
									{*$objCommon->getImageForBannerSlider($site_title.0.domain_id,'sliderimage')*}
									{if $smarty.session.domain_id}
									{$objCommon->getBannerSliderImage($smarty.session.domain_id,'sliderimage')}
									{/if}
									<div class="slideBannerRel hoverSlide">
                                    	<div class="menuSlider">
                                            <div class="themewrapperRight">
                                                    <div class="theme5wrap">
                                                        <div class="buildNavTabBg blogthemeNavTab">
                                                            <ul class="buildSection nav_menu blogthemeNavTab_menu" style="{if $site_title.0.nav_menu_font_style}font-family:{$site_title.0.nav_menu_font_style};{/if}{if $site_title.0.nav_menu_font_size}font-size:{$site_title.0.nav_menu_font_size}px;{/if}{if $site_title.0.nav_menu_line_size}line-height:{$site_title.0.nav_menu_line_size}px;{/if}">
                                                                {if $smarty.session.domain_id}
                                                                {$objCommon->getPages($site_title.0.domain_id)}
                                                                {section name="pages" loop="$buildpagelist1"}
                                                                <li class="navTabSub">
                                                                {*	<a class="{if $smarty.session.page_id eq $buildpagelist1[pages].page_id}active{/if}"
                                                                onclick="showPageListinBuild('{$buildpagelist1[pages].page_id}','{$buildpagelist1[pages].domain_id}')">{$buildpagelist1[pages].pagename}</a>*}
                                                                {if $buildpagelist1[pages].seo_title eq 'link'}
                                                                <span class="posRel flt">
                                                                <a class="externalLinkBuildPopInn {if $smarty.session.page_id eq $buildpagelist1[pages].page_id}active{/if}" onmouseover="showexternalLinkContentPop('{$buildpagelist1[pages].link_site}','{$buildpagelist1[pages].page_id}');" onmouseout="mouseout('{$buildpagelist1[pages].link_site}','{$buildpagelist1[pages].page_id}');">{$buildpagelist1[pages].pagename}</a>
                                                                                <span class="externalLinkBuildPop" id="externalLinkBuildPop_{$buildpagelist1[pages].page_id}" style="display:none;">
                                                                                    <span class="content"></span>
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
                                            <div class="logoTopHoverOuter">
                                                <div class="themewrapper1 themewrapper3 blogwrapper1 logoTopHover blogwrapper2">
                                                    <div class="theme4Wrapper">
                                                        <div class="blogthemeLogo" onmouseover="titleShow()"  onmouseout="titleHide()">
                                                            <div class="themewrapperLeft hei60">
                                                                {$objCommon->getImageForShowTop($site_title.0.domain_id,'domainlogo')}
                                                                {if $site_title.0.header_logo_config eq '1'}
                                                                <div class="flt"><h2 class="mainPageThmeTitle site_title contentedit" id="updateTitle" contenteditable="true" onblur="return updateTitleIndex('{$smarty.session.domain_id}');" style="{if $site_title.0.site_title_font_style}font-family:{$site_title.0.site_title_font_style};{/if}{if $site_title.0.site_title_font_size}font-size:{$site_title.0.site_title_font_size}px;{/if}{if $site_title.0.site_title_line_size}line-height:{$site_title.0.site_title_line_size}px;{/if}">{if $site_title.0.site_title}{$site_title.0.site_title}{else}{/if}</h2></div>
                                                                {elseif $site_title.0.header_logo_config eq '2'}
                                                                <div class="logodiv" style="{if $site_title.0.logo_left}left:{$site_title.0.logo_left}px;{/if}{if $site_title.0.logo_top}top:{$site_title.0.logo_top}px;{/if}"><img class="logoresize" src="{$SITE_DOMAIN_IMAGES_URL}/{$logoimages}" width="{if $site_title.0.logo_width}{$site_title.0.logo_width}{else}{/if}" height="{if $site_title.0.logo_height}{$site_title.0.logo_height}{else}{/if}"></div>
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
                                                </div>
                                            </div>
										</div>                                            
                                    	
										
                                        {$objCommon->getBannerStatus($smarty.session.page_id)}
                                        {if $banner_status eq 'need'}
										<div class="slideBannerRel hoverSlide carousel carousel-fade slide" id="myCarousel">
											<a class="slideeditbannerTxt" onclick="$('#editBannerImg').show();$('.loadmask').show();">{$LANG.edit_image_name} </a>
											<a class="slideeditSlide"  onclick="$('#sliderBannerImg').show();$('.loadmask').show();">{$LANG.slider_name} </a>
											<div class="carousel-inner">
												{section name="sliimg" loop="$banner_images"}
												<div class="item {if $smarty.section.sliimg.rownum eq 1}active{/if}">
													<div class="fill bannersrchArea banner-image-bg" style="background-image:url('{$SITE_DOMAIN_IMAGES_URL}/{$banner_images[sliimg].image_name}')"></div>
												</div>
												{/section}
											</div>
											<!-- Controls -->
											<a class="left carousel-control" href="#myCarousel" data-slide="prev">
												<span class="fa fa-2x fa-arrow-left"></span>
											</a>
											<a class="right carousel-control" href="#myCarousel" data-slide="next">
												<span class="fa fa-2x fa-arrow-right"></span>
											</a>
										</div>
                                        {/if}
									</div>
									{/if}
								</div>
							</div>
						</div>
					</div>
					{/if}
				</div>
			</div>
            <div class="theme5wrap">
                <div class="blogPageInner">
                    <div class="blogPageInnerBg blogPageThemeBg">
                        <div class="blogwrapper1 blogwrapper2 theme4Wrapper blog2wrapper relative mainwrapper">
                            <div class="blogPageBgInnerTop"><div class="fireworkImg"></div></div>
                            {include file='droppablePage.tpl'}
                        </div>	
                        <div class="clearfix clr"></div>
                        
                    </div>	
                </div>
			</div>
            <div class="footrAlign">
	            <div class="theme5wrap">
                    <div class="footerWrapTop8"></div>
                    <div class="footerBgSource">
                        {$objCommon->getCurrentDomainDetails()}
                        <div class="contentedit" contenteditable="true" onblur="return updateFooterContent();" onkeydown="return updateFooterContent();" id="footer_main">{if $settingpage.0.footer_content}{$settingpage.0.footer_content}{else}{$LANG.create_free_website} <a href="http://{$SITE_MAIN_DOMAIN}">{$LANG.webbxyz_name}</a>{/if}</div>
                    </div>
				</div>                    
            </div>		
            <div class="dragMask"></div>               
                
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
				{include file="allpopup.tpl"}
		</div>
	</div>
</div>