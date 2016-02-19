<!DOCTYPE html>
<html>
<head>
	{include file='subpageheader.tpl'}
</head>
	{$objCommon->getThemeName($domain_details.0.domain_id)}
	{$objCommon->getImageForShowTopInSubdomain($domain_details.0.domain_id,'backgroundimage')}
	{$objCommon->getBannerEnableForSubdomain($domain_details.0.domain_id)}
	{$objCommon->BacksgroundForShowTopInsubdomain($domain_details.0.domain_id)}
    <body class="theme2Banner" style="{if $sub_banner_config}{if $logo_sub_images && $default_switch eq 'N'}background:url({$SITE_DOMAIN_IMAGES_URL}/{$logo_sub_images}); background-size:100% 100%;{/if}{else}{if $background_color.0.background_color neq '' && $background_color.0.background_color_off eq 'N' && $default_switch eq 'N'}background-color:{$background_color.0.background_color}{/if}{/if}">
		<div class="{$themecolorname} themepublish {$themename.0.theme_name|lower}">
			{if $domain_details}
				<div class="mainRightPanelInner sourceNewThene">
					<div class="themewrapper5 ">
                        <div class="logoTopHoverOuter">
                            <div class="container">
                                <div class="navbar">
                                     <button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                      </button>
                                    {if $domain_details}
                                    <!--to show  site title start-->
                                    <div class="text-center">
	                                    <div class="themewrapperLeft">
                                        {if $domain_details.0.header_logo_config eq '1'}
                                        <div class="mainPageThmeTitle" style="{if $domain_details.0.site_title_font_style}font-family:{$domain_details.0.site_title_font_style};{/if}{if $domain_details.0.site_title_font_size}font-size:{$domain_details.0.site_title_font_size}px;{/if}{if $domain_details.0.site_title_line_size}line-height:{$domain_details.0.site_title_line_size}px;{/if}"><a href="{$SITE_SOURCE_BASEURL}">{$domain_details.0.site_title}</a></div>
                                        {elseif $domain_details.0.header_logo_config eq '2'}
                                        {$objCommon->getImageForShowTopInSubdomain($domain_details.0.domain_id,'domainlogo')}
                                        <div class="themelogoposition" style="{if $domain_details.0.logo_left}left:{$domain_details.0.logo_left}px;{/if}{if $domain_details.0.logo_top}top:{$domain_details.0.logo_top}px;{/if}">
                                            <a href="{$SITE_SOURCE_BASEURL}"><img src="{$SITE_DOMAIN_IMAGES_URL}/{$logo_sub_images}" alt="home image" width="{if $domain_details.0.logo_width}{$domain_details.0.logo_width}{else}{/if}" height="{if $domain_details.0.logo_height}{$domain_details.0.logo_height}{else}{/if}" ></a>
                                        </div>
                                        {elseif $domain_details.0.header_logo_config eq '0'}
                                        {/if}
                                    </div>
                                    </div>
                                    {/if}
                                   
                                    <!--to show site title end-->
                                    {if $domain_details}
                                    <div class="theme4HeaderOuterHei">
                                        <div class="buildNavTabBg nav-collapse collapse">
                                            <ul class="buildSection nav" style="{if $domain_details.0.nav_menu_font_style}font-family:{$domain_details.0.nav_menu_font_style};{/if}{if $domain_details.0.nav_menu_font_size}font-size:{$domain_details.0.nav_menu_font_size}px;{/if}{if $domain_details.0.nav_menu_line_size}line-height:{$domain_details.0.nav_menu_line_size}px;{/if}">
                                                {$objCommon->getPages_subdomain($domain_details.0.domain_id)}
                                                {section name="pages" loop="$buildpagelist1"}
                                                {$objCommon->getSubPages($buildpagelist1[pages].page_id,$buildpagelist1[pages].domain_id)}
                                                <li class="navTabSub">
                                                    {if $buildpagelist1[pages].seo_title eq 'link'}
                                                    <a class="{if $smarty.session.page_id eq $buildpagelist1[pages].page_id}active{/if}"
                                                    href="{$buildpagelist1[pages].link_site}"{if $buildpagelist1[pages].link_status eq 'new'} target="_blank"{/if}>{$buildpagelist1[pages].pagename}</a>
                                                   {if !empty($subbuildpagelist)}<span class="menudown"><i class="caret"></i></span>{/if}
                                                    {else}
                                                    <a class="{if $smarty.session.page_id eq $buildpagelist1[pages].page_id}active{/if}"
                                                    href="{$SITE_SOURCE_BASEURL}/{$buildpagelist1[pages].seo_title}" >{$buildpagelist1[pages].pagename}</a>
                                                   {if !empty($subbuildpagelist)}<span class="menudown"><i class="caret"></i></span>{/if}
                                                   {/if}
                                                    <ul>
                                                        {section name="submenu" loop=$subbuildpagelist}
                                                        <li>
                                                        <a class="{if $smarty.session.page_id eq $subbuildpagelist[submenu].page_id}active{/if}"
                                                        href="{$SITE_SOURCE_BASEURL}/{$subbuildpagelist[submenu].seo_title}">{$subbuildpagelist[submenu].pagename}</a>
                                                        </li>
                                                        {/section}
                                                    </ul>
                                                </li>
                                                {/section}
                                            </ul>
                                        </div>
                                    </div>
                                    {/if}
                                    <!--to show pagename end-->
                                </div>
                             </div>
                        </div>
                        <div class="container">
                            <div class="themeRightSepOuter">
                                <div class="themeRightSep">
                                    <div class="mainRhtBanner clearfix">
                                        <div class="mainRhtBannerInner">
                                            {if $domain_details.0.header_banner eq 0 and $domain_details.0.header_slider eq 0}
                                            {$objCommon->getImageForShowTopInSubdomain($domain_details.0.domain_id,'bannerimage')}
                                            {$objCommon->getBannerStatus_subdomain($smarty.session.page_id)}
                                            {if $banner_status eq 'need'}
                                            <div class="mainRhtBannerInnerBanner" {if $logo_sub_images}style="background-image:url({$SITE_DOMAIN_IMAGES_URL}/{$logo_sub_images});"{/if}>
                                                
                                            </div>
                                            {if $domain_details.0.heading_content neq '' || $domain_details.0.heading_description neq '' }
                                                <div class="mainRhtBannerInnerRight" style="display:block;">
                                                    <div class="mainRhtBannerInnerHead" style="{if $domain_details.0.main_headline_font_style}font-family:{$domain_details.0.main_headline_font_style};{/if}{if $domain_details.0.main_headline_font_size}font-size:{$domain_details.0.main_headline_font_size}px;{/if}{if $domain_details.0.main_headline_line_size}line-height:{$domain_details.0.main_headline_line_size}px;{/if}">{if $domain_details.0.heading_content}{$domain_details.0.heading_content}{/if}</div>
                                                    <div class="mainRhtBannerInnerDesc">{if $domain_details.0.heading_description}{$domain_details.0.heading_description}{/if}</div>
                                                </div>
                                                {else}
                                                <div class="mainRhtBannerInnerRight" style="display:none;">
                                                    <div class="mainRhtBannerInnerHead" style="{if $domain_details.0.main_headline_font_style}font-family:{$domain_details.0.main_headline_font_style};{/if}{if $domain_details.0.main_headline_font_size}font-size:{$domain_details.0.main_headline_font_size}px;{/if}{if $domain_details.0.main_headline_line_size}line-height:{$domain_details.0.main_headline_line_size}px;{/if}">{if $domain_details.0.heading_content}{$domain_details.0.heading_content}{/if}</div>
                                                    <div class="mainRhtBannerInnerDesc">{if $domain_details.0.heading_description}{$domain_details.0.heading_description}{/if}</div>
                                                </div> 
                                                {/if}
                                            {/if}
                                            {/if}
                                            {if $domain_details.0.header_banner}
                                            {$objCommon->getImageForShowTopInSubdomain($domain_details.0.domain_id,'bannerimage')}
                                            {$objCommon->getBannerStatus_subdomain($smarty.session.page_id)}
                                            {if $banner_status eq 'need'}
                                            <div class="mainRhtBannerInnerBanner" {if $logo_sub_images}style="background-image:url({$SITE_DOMAIN_IMAGES_URL}/{$logo_sub_images});"{/if}>
                                               
                                            </div>
                                             {if $domain_details.0.heading_content neq '' || $domain_details.0.heading_description neq '' }
                                                <div class="mainRhtBannerInnerRight" style="display:block;">
                                                    <div class="mainRhtBannerInnerHead" style="{if $domain_details.0.main_headline_font_style}font-family:{$domain_details.0.main_headline_font_style};{/if}{if $domain_details.0.main_headline_font_size}font-size:{$domain_details.0.main_headline_font_size}px;{/if}{if $domain_details.0.main_headline_line_size}line-height:{$domain_details.0.main_headline_line_size}px;{/if}">{if $domain_details.0.heading_content}{$domain_details.0.heading_content}{/if}</div>
                                                    <div class="mainRhtBannerInnerDesc">{if $domain_details.0.heading_description}{$domain_details.0.heading_description}{/if}</div>
                                                </div>
                                                {else}
                                                <div class="mainRhtBannerInnerRight" style="display:none;">
                                                    <div class="mainRhtBannerInnerHead" style="{if $domain_details.0.main_headline_font_style}font-family:{$domain_details.0.main_headline_font_style};{/if}{if $domain_details.0.main_headline_font_size}font-size:{$domain_details.0.main_headline_font_size}px;{/if}{if $domain_details.0.main_headline_line_size}line-height:{$domain_details.0.main_headline_line_size}px;{/if}">{if $domain_details.0.heading_content}{$domain_details.0.heading_content}{/if}</div>
                                                    <div class="mainRhtBannerInnerDesc">{if $domain_details.0.heading_description}{$domain_details.0.heading_description}{/if}</div>
                                                </div> 
                                                {/if}
                                            {/if}
                                            {/if}
                                            {if $domain_details.0.header_slider}
                                            {$objCommon->getImageForBannerSlider($domain_details.0.domain_id,'sliderimage')}
                                            {$objCommon->getBannerStatus_subdomain($smarty.session.page_id)}
                                            {if $banner_status eq 'need'}
                                            <div class="slideBannerRel carousel carousel-fade slide" id="myCarousel">
												<div class="carousel-inner">
													{section name="bannersliimg" loop="$sliderimages"}
													<div class="item {if $smarty.section.bannersliimg.rownum eq 1}active{/if}">
														<div class="fill bannersrchArea banner-image-bg" style="background-image:url('{$SITE_DOMAIN_IMAGES_URL}/{$sliderimages[bannersliimg].image_name}')"></div>
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
                                            {/if}
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                       
                            <!-- Banner section ends -->
                           <span style="color:green"><b>{$smarty.session.paymentSuccmsg}</b></span>
                            {$objCommon->clearSession()}
            				<div class="themeRightSep">
            					<div class="mainRhtBannerInner replaceStoreBg store3Wrpper paddRound20 clearfix">
            						<div class="mainRhtBanner clearfix">
            							<div class="blogPageBgInnerTop"><div class="fireworkImg"></div></div>
            							<div class="blogPageBgInner blogPageBgInnerMiddle clearfix">
            							   {if $objCommon->getStoreComment($smarty.session.page_id)}
            									{if $smarty.session.themename neq 'store2'} 
            										{include file='publishstoretheme.tpl'}	
            									{/if}
            								{else}
            									{include file='publishdroppablePage.tpl'}	
            								{/if}
            							</div>
            						</div>
            					</div>
            				</div>
                            <!-- No need to change Footer section starts -->
                           <div class="clearfix"></div>                    
                           <div class="footrAlign">
                           
                                {if $domain_details}
                                <!--FOOTER CODE STARTS-->
                                <!--show footer code details-->
                                {$domain_details.0.footer_code}
                                <!--show footer code details end-->
                                {if $domain_details.0.footer_content}
                                {$domain_details.0.footer_content}
                                {else}
                                {$LANG.common_create_new} <a href="http://{$SITE_MAIN_DOMAIN}">{$LANG.webbxyz_name}</a>
                                {/if}
                                {/if}
                                <!--FOOTER CODE END-->
                            </div>
                          <!-- No need to change Footer section ends -->			
                       </div>
					</div>
				</div>
				<div id="maska"></div>
			{/if}
		</div>	
	</body>
</html>