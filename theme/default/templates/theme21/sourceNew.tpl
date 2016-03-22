{*===header Part For Both Blog and Site starts===*}
<html>
<head>
	{if $domain_details}
	<title>{$domain_details.0.site_title|strip_tags}{if $smarty.get.pageurl}-{$smarty.get.pageurl|replace:'-':' '|capitalize}{/if}</title>
	{elseif $store_details}
	<title>{$store_details.0.site_title|strip_tags}{if $smarty.get.pageurl}-{$smarty.get.pageurl|replace:'-':' '|capitalize}{/if}</title>
	{else}
	<title>{$blog_details.0.site_title|strip_tags}{if $smarty.get.pageurl}-{$smarty.get.pageurl|replace:'-':' '|capitalize}{/if}</title>
	{/if}
	<link href="{$SITE_CSS_URL}/reset.css" type="text/css" rel="stylesheet" />
	<link href="{$SITE_CSS_URL}/general.css" type="text/css" rel="stylesheet" />
	<link href="{$SITE_CSS_URL}/bootstrap.css" type="text/css" rel="stylesheet" />
	<link href="{$SITE_CSS_URL}/bootstrap-responsive.css" type="text/css" rel="stylesheet" />
	<link href="{$SITE_CSS_URL}/spectrum.css" type="text/css" rel="stylesheet" />
	<link href="{$SITE_CSS_URL}/icons.css" type="text/css" rel="stylesheet" />
	<link href="{$SITE_CSS_URL}/font-awesome.css" type="text/css" rel="stylesheet" />
	<link type="text/css" href="{$SITE_CSS_URL}/farbtastic.css" rel="stylesheet"/>
	<link type="text/css" href="{$SITE_CSS_URL}/freshereditor.css" rel="stylesheet"/>
	<link type="text/css" href="{$SITE_CSS_URL}/jquery.fancybox.css" rel="stylesheet"/>
	<link href="{$SITE_CSS_URL}/restore.css" type="text/css" rel="stylesheet" />		
	{$getglobalvarjavascript}
	<!--js files calling starts-->
	<script src="{$SITE_JS_URL}/jquery.1.8.2.min.js"></script>
	<script type="text/javascript" src="{$SITE_JS_URL}/bootstrap.js"></script>
	<script type="text/javascript" src="{$SITE_JS_URL}/jquery.min.js"></script>
	<script type="text/javascript" src="{$SITE_JS_URL}/jquery.ui.all.js"></script>
	<script type="text/javascript" src="{$SITE_JS_URL}/common.js"></script>
	<script type="text/javascript" src="{$SITE_JS_URL}/column.js"></script>
	<script type="text/javascript" src="{$SITE_JS_URL}/jquery.nivo.slider.js"></script>
	<script type="text/javascript" src="{$SITE_JS_URL}/jquery.fancybox.js"></script>
	<script type="text/javascript" src="{$SITE_JS_URL}/jquery.fancybox-thumbs.js"></script>
	<script type="text/javascript" src="{$SITE_JS_URL}/publishpage.js"></script>
	<!--common for both site and blog site title starts-->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
	{if $domain_details}
	<!--list header code  start-->
	<meta name="keywords" content="{$domain_details.0.metakeywords}" />
	<meta name="description" content="{$domain_details.0.site_description}" />
	{$domain_details.0.header_code}
	{/if}
	{if $blog_details}
	<meta name="keywords" content="{$blog_details.0.metakeywords}" />
	<meta name="description" content="{$blog_details.0.site_description}" />
	{$blog_details.0.header_code} 
	{/if}
	{if $store_details}
	<meta name="keywords" content="{$store_details.0.metakeywords}" />
	<meta name="description" content="{$store_details.0.site_description}" />
	{$store_details.0.header_code} 
	{/if}
	<!--list header code end-->
	{if $domain_details.0.theme_id}
	<!--theme name and blog name css file start-->
	{$objCommon->getThemeName($domain_details.0.domain_id)}
	{if $themename}
	<link href="{$SITE_BASEURL}/theme/{$themename.0.theme_name|lower}/css/theme.css" type="text/css" rel="stylesheet" />
	{/if}
	{else}
	{if $blog_details.0.blog_id}
	{$objCommon->getBlogName($blog_details.0.domain_id)}
	{if $blogname}
	<link href="{$SITE_BASEURL}/theme/{$blogname.0.blog_name|lower}/css/theme.css" type="text/css" rel="stylesheet" />
	{/if}
	{/if}
	{if $store_details.0.store_id}
	{$objCommon->getStoreName($store_details.0.domain_id)}
	{if $storename}
	<link href="{$SITE_BASEURL}/theme/{$storename.0.store_name|lower}/css/theme.css" type="text/css" rel="stylesheet" />
	{/if}
	{/if}
	{/if}
	<!--theme name and blog name css file end-->
	<link href="{$SITE_CSS_URL}/design.css" type="text/css" rel="stylesheet" /> 
</head>
<body>
	<div class="{$themecolorname} themepublish {if $smarty.session.themename eq 'theme9'}theme9{/if}">
		{if $domain_details}
		{$objCommon->getImageForShowTopInSubdomain($domain_details.0.domain_id,'backgroundimage')}
		{$objCommon->getBannerEnableForSubdomain($domain_details.0.domain_id)}
		<div class="mainRightPanelInner sourceNewThene">
			<div class="themewrapper5 theme2Banner"  {if $sub_banner_config}{if $logo_sub_images}style="background:url({$SITE_DOMAIN_IMAGES_URL}/{$logo_sub_images}); background-size:100% 100%;"{/if}{/if}>
				<div class="theme5wrap">
					<div class="wrapperCont5 clearfix">
						<div class="themewrapper4Cont">
							<div class="themeLeftSep mainRightPanelInnerTop">
								<div class="logoTopHoverOuter">
									<div class="themewrapper2 logoTopHover themewrapper3 blogwrapper1 blogwrapper2">
										<div class="theme4Wrapper blogthemeLogo">
											{if $domain_details}
											<!--to show  site title start-->
											<div class="themewrapperLeft theme4HeaderOuterHei" style="position:relative;">
												{if $domain_details.0.header_logo_config eq '1'}
												<div><div class="mainPageThmeTitle" style="{if $domain_details.0.site_title_font_style}font-family:{$domain_details.0.site_title_font_style};{/if}{if $domain_details.0.site_title_font_size}font-size:{$domain_details.0.site_title_font_size}px;{/if}{if $domain_details.0.site_title_line_size}line-height:{$domain_details.0.site_title_line_size}px;{/if}"><a href="{$SITE_SOURCE_BASEURL}">{$domain_details.0.site_title}</a></div></div>
												{elseif $domain_details.0.header_logo_config eq '2'}
												{$objCommon->getImageForShowTopInSubdomain($domain_details.0.domain_id,'domainlogo')}
												<div class="themelogoposition" style="{if $domain_details.0.logo_left}left:{$domain_details.0.logo_left}px;{/if}{if $domain_details.0.logo_top}top:{$domain_details.0.logo_top}px;{/if}">
													<a href="{$SITE_SOURCE_BASEURL}"><img src="{$SITE_DOMAIN_IMAGES_URL}/{$logo_sub_images}" alt="home image" width="{if $domain_details.0.logo_width}{$domain_details.0.logo_width}{else}200{/if}" height="{if $domain_details.0.logo_height}{$domain_details.0.logo_height}{else}72{/if}" ></a>
												</div>
												{elseif $domain_details.0.header_logo_config eq '0'}
												{/if}
											</div>
											{/if}
										</div>
										<!--to show site title end-->
										{if $domain_details}
										<div class="themewrapperRight">
											<div class="buildNavTabBg marTop23">
												<ul class="buildSection">
													{$objCommon->getPages_subdomain($domain_details.0.domain_id)}
													{section name="pages" loop="$buildpagelist1"}
													<li class="navTabSub">
														{if $buildpagelist1[pages].seo_title eq 'link'}
														<a class="{if $smarty.session.page_id eq $buildpagelist1[pages].page_id}active{/if}"
														href="{$buildpagelist1[pages].link_site}"{if $buildpagelist1[pages].link_status eq 'new'} target="_blank"{/if}style="{if $domain_details.0.nav_menu_font_style}font-family:{$domain_details.0.nav_menu_font_style};{/if}{if $domain_details.0.nav_menu_font_size}font-size:{$domain_details.0.nav_menu_font_size}px;{/if}{if $domain_details.0.nav_menu_line_size}line-height:{$domain_details.0.nav_menu_line_size}px;{/if}">{$buildpagelist1[pages].pagename}</a>
														{else}
														<a class="{if $smarty.session.page_id eq $buildpagelist1[pages].page_id}active{/if}"
														href="{$SITE_SOURCE_BASEURL}/{$buildpagelist1[pages].seo_title}" style="{if $domain_details.0.nav_menu_font_style}font-family:{$domain_details.0.nav_menu_font_style};{/if}{if $domain_details.0.nav_menu_font_size}font-size:{$domain_details.0.nav_menu_font_size}px;{/if}{if $domain_details.0.nav_menu_line_size}line-height:{$domain_details.0.nav_menu_line_size}px;{/if}">{$buildpagelist1[pages].pagename}</a>
														{/if}
														<ul>
															{$objCommon->getSubPages($buildpagelist1[pages].page_id,$buildpagelist1[pages].domain_id)}
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
							<div class="themeRightSepOuter">
								<div class="themeRightSep">
									<div class="mainRhtBanner clearfix">
										<div class="mainRhtBannerInner">
											{if $domain_details.0.header_banner eq 0 and $domain_details.0.header_slider eq 0}
											{$objCommon->getImageForShowTopInSubdomain($domain_details.0.domain_id,'bannerimage')}
											{$objCommon->getBannerStatus($smarty.session.page_id)}
											{if $banner_status eq 'need'}
											<div class="mainRhtBannerInnerBanner" {if $logo_sub_images}style="background:url({$SITE_DOMAIN_IMAGES_URL}/{$logo_sub_images});"{/if}>
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
											</div>
											{/if}
											{/if}
											{if $domain_details.0.header_banner}
											{$objCommon->getImageForShowTopInSubdomain($domain_details.0.domain_id,'bannerimage')}
											{$objCommon->getBannerStatus($smarty.session.page_id)}
											{if $banner_status eq 'need'}
											<div class="mainRhtBannerInnerBanner" {if $logo_sub_images}style="background:url({$SITE_DOMAIN_IMAGES_URL}/{$logo_sub_images});"{/if}>
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
											</div>
											{/if}
											{/if}
											{if $domain_details.0.header_slider}
											{$objCommon->getImageForBannerSlider($domain_details.0.domain_id,'sliderimage')}
											<div class="slideBannerRel">
												<div id="slider2" class="nivoSlider widt860">
													{section name="bannersliimg" loop="$sliderimages"}
													<div class="imageSlider">
														<img width="100%" height="300" src="{$SITE_DOMAIN_IMAGES_URL}/{$sliderimages[bannersliimg].image_name}">
													</div>
													{/section}
												</div>
											</div>
											{/if}
										</div>
									</div>
								</div>
							</div>
							<!-- Banner section ends -->
						</div>
						{include file='publishdroppablePage.tpl'}
					</div>
				</div>
				<!-- No need to change Footer section starts -->
				<div class="footerScriptBg">
					<div class="footrAlign">
						<div class="footerWrapTop8"></div>
						<div class="themewrapper1 themewrapper2 footerBgSource themewrapper3 themewrapper4 themewrapper5 themewrapper6">
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
					</div>	
				</div>
				<!-- No need to change Footer section ends -->			
			</div>
		</div>
		<div id="maska"></div>
		{elseif $store_details}
		{include file="storedetailsnew.tpl"}
		{else}
		{include file="blogdetailsnew.tpl"}
		{/if}
	</div>	
</body>
</html>
