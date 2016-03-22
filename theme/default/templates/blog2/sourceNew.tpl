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
	    <script type="text/javascript" src="{$SITE_JS_URL}/responsiveslide.js"></script>
	    <script type="text/javascript" src="{$SITE_JS_URL}/publishpage.js"></script>
        <script type="text/javascript" src="{$SITE_JS_URL}/jquery.form.js"></script>
		
		{literal}
		<script type="text/javascript">
			$(document).ready(function(){
			
				$('.fancybox').fancybox();
				$(".fancybox-effects-a").fancybox({
					helpers: {
						title : {
							type : 'outside'
						},
						overlay : {
							speedOut : 0
						}
					}
				});
				$(".fancybox-effects-b").fancybox({
					openEffect  : 'none',
					closeEffect	: 'none',
	
					helpers : {
						title : {
							type : 'over'
						}
					}
				});
				$('.fancybox-thumbs').fancybox({
					prevEffect : 'none',
					nextEffect : 'none',
					closeBtn  : true,
					arrows    : true,
					nextClick : true,
					helpers : {
						thumbs : {
							width  : 50,
							height : 50
						}
					}
				});
				
			});
		</script>
		{/literal}
		{literal}
			<script type="text/javascript">
				$(document).ready(function(){
					 //$('#slider').nivoSlider();
					 $('.nivoSlider').nivoSlider();
				});
				$(document).ready(function(){
					 $('#slider2').nivoSlider();
				});
			</script>
		{/literal}
		
		<!--js files calling end-->
		
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
	{$objCommon->getImageForShowTopInSubdomain($domain_details.0.domain_id,'backgroundimage')}
{$objCommon->getBannerEnableForSubdomain($domain_details.0.domain_id)}
{$objCommon->BacksgroundForShowTopInsubdomain($domain_details.0.domain_id)}
<body style="{if $sub_banner_config}{if $logo_sub_images && $default_switch eq 'N'}background:url({$SITE_DOMAIN_IMAGES_URL}/{$logo_sub_images}); background-size:100% 100%;{/if}{else}{if $background_color.0.background_color neq '' && $background_color.0.background_color_off eq 'N' && $default_switch eq 'N'}background-color:{$background_color.0.background_color}{/if}{/if}">

	<div class="navigation {$themecolorname} themepublish {$themename.0.theme_name|lower}">
		{if $domain_details}
			<!--{$objCommon->getImageForShowTopInSubdomain($domain_details.0.domain_id,'backgroundimage')}
			{$objCommon->getBannerEnableForSubdomain($domain_details.0.domain_id)}-->
            <div class="sourceNewThene">
                
                    
                <div class="container">
                   	<div class="mainRhtBanner clearfix">
                     <div class="mainRhtBannerInner">
                        {if $domain_details.0.header_banner eq 0 and $domain_details.0.header_slider eq 0}
                        {$objCommon->getImageForShowTopInSubdomain($domain_details.0.domain_id,'bannerimage')}
                        {$objCommon->getBannerStatus_subdomain($smarty.session.page_id)}
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
                        {$objCommon->getBannerStatus_subdomain($smarty.session.page_id)}
                        {if $banner_status eq 'need'}
                        {$objCommon->getImageForShowTopInSubdomain($domain_details.0.domain_id,'bannerimage')}
                        <div class="mainRhtBannerInnerBanner" {if $logo_sub_images}style="background:url({$SITE_DOMAIN_IMAGES_URL}/{$logo_sub_images});"{/if}>
                            {if $domain_details.0.heading_content neq '' or $domain_details.0.heading_description neq ''}
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
                       {$objCommon->getBannerStatus_subdomain($smarty.session.page_id)}
                            {if $banner_status eq 'need'}
                        	{$objCommon->getImageForBannerSlider($domain_details.0.domain_id,'sliderimage')}
							<div class="slideBannerRel">
								<div id="slider2" class="nivoSlider">
									{section name="bannersliimg" loop="$sliderimages"}
										<div class="imageSlider">
											<img width="100%" height="300" src="{$SITE_DOMAIN_IMAGES_URL}/{$sliderimages[bannersliimg].image_name}">
										</div>
									{/section}
								</div>
							</div>
                            {/if}
                        {/if}
                    </div>
                   </div>
                </div>
                <span style="color:green"><b>{$smarty.session.paymentSuccmsg}</b></span>
                {$objCommon->clearSession()}
				<div class="themeRightSep">
					<div class="mainRhtBannerInner replaceStoreBg store3Wrpper clearfix">
						<div class="mainRhtBanner clearfix">
							
							<div class="blogPageBgInner blogPageBgInnerMiddle clearfix">
							   {if $objCommon->getStoreComment($smarty.session.page_id)}
									{if $smarty.session.themename neq 'store2'} 
										{include file='publishstoretheme.tpl'}	
									{/if}
							   {else}
									{include file="blog2/blogdetailsnew.tpl"}	
							   {/if}
							</div>
						</div>
					</div>
				</div>								
                {*include file='publishdroppablePage.tpl'*}
            </div>                        
            <!-- No need to change Footer section starts -->
            
            <!-- No need to change Footer section ends -->			
			<div id="maska"></div>
		{/if}
	</div>	
    
</body>
</html>

</html>
