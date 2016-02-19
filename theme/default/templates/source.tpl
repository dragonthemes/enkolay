{*===header Part For Both Blog and Site starts===*}
<html>
	<head>
		{include file='main_css.tpl'}
		<!----js files calling starts----->
		<script src="{$SITE_JS_URL}/jquery.1.8.2.min.js"></script>
		<script type="text/javascript" src="{$SITE_JS_URL}/bootstrap.js"></script>
		<script type="text/javascript" src="{$SITE_JS_URL}/jquery.js"></script>
		<script type="text/javascript" src="{$SITE_JS_URL}/jqueryui.js"></script>
		<script type="text/javascript" src="{$SITE_JS_URL}/common.js"></script>
		<!----js files calling end----->
		
		<!----common for both site and blog site title starts ----->
				<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
				<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
			<!------ list header code  start------>
				{if $domain_details}
				<meta name="keywords" content="{$domain_details.0.metakeywords}" />
				<meta name="description" content="{$domain_details.0.site_description}" />
				<meta name="header code" content="{$domain_details.0.header_code}" />
				{/if}
				{if $blog_details}
				<meta name="keywords" content="{$blog_details.0.metakeywords}" />
				<meta name="description" content="{$blog_details.0.site_description}" />
				<meta name="header code" content="{$blog_details.0.header_code}" />
				{/if}
			<!------ list header code end------>
			
			<!-------thene name and blog name css file start-------->
				{if $domain_details.0.theme_id}
					{$objCommon->getThemeName($domain_details.0.theme_id)}
						{if $themename}
							<link href="{$SITE_BASEURL}/theme/{$themename.0.theme_name|lower}/css/theme.css" type="text/css" rel="stylesheet" />
						{/if}
				{else}
					{if $blog_details.0.blog_id}
						{$objCommon->getBlogName($blog_details.0.blog_id)}
							{if $blogname}
							<link href="{$SITE_BASEURL}/theme/{$blogname.0.blog_name|lower}/css/theme.css" type="text/css" rel="stylesheet" />
							{/if}
					{/if}
				{/if}
			<!-------thene name and blog name css file end-------->
		
			 
	</head>
	<body>
		{if $domain_details}
		<div class="{$themecolorname}">
		<div class="mainRightPanelInner">
			<div class="themewrapper5">
				<div class="themewrapper4Cont wrapperCont5 clearfix">
					<div class="themeLeftSep mainRightPanelInnerTop">
						<div class="themewrapper2 themewrapper3 blogwrapper1 blogwrapper2">
						<!-------to show  site title start--------->
							{if $domain_details}
								<div class="themewrapper1">
									{if $domain_details.0.header_logo_config eq '1'}
									<div><h2 class="mainPageThmeTitle" style="{if $domain_details.0.site_title_font_style}font-family:{$domain_details.0.site_title_font_style};{/if}{if $domain_details.0.site_title_font_size}font-size:{$domain_details.0.site_title_font_size}px;{/if}{if $domain_details.0.site_title_line_size}line-height:{$domain_details.0.site_title_line_size}px;{/if}">{$domain_details.0.site_title}</h2></div>
									{elseif $domain_details.0.header_logo_config eq '2'}
										{$objCommon->getImageForShowTop($domain_details.0.domain_id,'domainlogo')}
										<img src="{$SITE_DOMAIN_IMAGES_URL}/{$logoimages}" alt="home image" width="200" height="100">
									{elseif $domain_details.0.header_logo_config eq '0'}
										
									{/if}
								</div>
							{/if}
						<!-------to show site title end--------->
						
						<!-------to show pagename starts--------->
						{if $domain_details}
							<div class="buildNavTabBg">
								<div class="themewrapper1">
									<ul class="buildSection">
										{section name ="page" loop="$pagenames"} 
											<li>
										  		<a class="{if $smarty.session.page_id eq $pagenames[page].page_id}active{/if}"
								 href="{$SITE_SOURCE_BASEURL}/source/{$pagenames[page].seo_title}" style="{if $domain_details.0.nav_menu_font_style}font-family:{$domain_details.0.nav_menu_font_style};{/if}{if $domain_details.0.nav_menu_font_size}font-size:{$domain_details.0.nav_menu_font_size}px;{/if}{if $domain_details.0.nav_menu_line_size}line-height:{$domain_details.0.nav_menu_line_size}px;{/if}">{$pagenames[page].pagename}</a>
											</li>
										{/section}
									</ul>
								</div>
							</div>
						{/if}
						
						<!-------to show pagename end--------->
					</div>
					</div>
					<!----common for both site and blog site title end ----->
			
					<div class="themeRightSep">
						<div class="mainRhtBanner clearfix">
							<div class="mainRhtBannerInner">
								<div class="mainRhtBannerInnerBanner">
									{if $domain_details}
									<h2 class="mainRhtBannerInnerHead" style="{if $domain_details.0.main_headline_font_style}font-family:{$domain_details.0.main_headline_font_style};{/if}{if $domain_details.0.main_headline_font_size}font-size:{$domain_details.0.main_headline_font_size}px;{/if}{if $domain_details.0.main_headline_line_size}line-height:{$domain_details.0.main_headline_line_size}px;{/if}">{if $domain_details.0.heading_content}{$domain_details.0.heading_content}{else}Click to add heading{/if}</h2>
									{/if}
								</div>
								<div class="themewrapper1 themewrapper3">
									<div class="mainRhtBannerInnerLeft">
										<div class="bannerBg">
											<div class="bannerBgLeft">
												<div class="mainRhtBannerInnerDesc">
													Much has been said and written about Twitter Bootstrap these days in the world of web designing and development. Some people call it a boon for web developers with zero designing knowledge, while others call it a blessing for the designers.							In many scenarios web developers have the entire setup ready with them but they can't proceed due to absence of the design of the project they are going to work on. They have to rely on the designers to complete the client side of their project. This process consumes a hell lot of time and is a serious wastage of time for a developer who needs his/her ideas to be implementing as quickly as possible. In such scenarios, Twitter Bootstrap comes to the rescue in the super-heroic fashion!
												</div>
											</div>
										</div>
									</div>
									<div class="mainRhtBannerInnerRight"></div>
								</div>
							</div>
						</div>
					</div>
					<!---------------------------CONTENT START-------------------------------------------------------------------------------------------->	
					<!---------------------site and blog content start----------------------------------------->
					<div class="themewrapper1 themewrapper2 fltNone themewrapper3 themewrapper4 themewrapper5 themewrapper6">
						<div class="themewrapper2BgAlign">
						<div class="blogPageBgInnerTop"><div class="fireworkImg"></div></div>
						<div class="blogPageBgInner blogPageBgInnerMiddle clearfix">
							{section name="pagelist" loop="$pagefirstlist"}
								<!-----title starts------->
								{if $pagefirstlist[pagelist].title_select eq '1'}
									<div class="contentedit{if $pagefirstlist[pagelist].buildtitle_bold} bold{/if}{if $pagefirstlist[pagelist].buildtitle_italic} italic{/if}{if $pagefirstlist[pagelist].buildtitle_underline} underline{/if}{if $pagefirstlist[pagelist].buildtitle_strikethrough} strikethrough{/if}{if $pagefirstlist[pagelist].buildTitle_textalign} {$pagefirstlist[pagelist].buildTitle_textalign}{/if}" style="{if $pagefirstlist[pagelist].buildTitle_fontsize}font-size:{$pagefirstlist[pagelist].buildTitle_fontsize}px;{/if}{if $pagefirstlist[pagelist].buildTitle_fontcolor}color:{$pagefirstlist[pagelist].buildTitle_fontcolor}{/if}{if $pagefirstlist[pagelist].main_title_font_style}font-family:{$pagefirstlist[pagelist].main_title_font_style};{/if}{if $pagefirstlist[pagelist].main_title_line_size}line-height:{$pagefirstlist[pagelist].main_title_line_size}px;{/if}">
									{if !empty($pagefirstlist[pagelist].text_title)}
										<h3>{$pagefirstlist[pagelist].text_title}</h3>
									{/if}
									</div>
								 {/if}
								<!-----title end------->
								
								<!-----description starts------->
									{if $pagefirstlist[pagelist].description_select eq '1'}	
										<div class="contentedit{if $pagefirstlist[pagelist].buildPara_bold} bold{/if}{if $pagefirstlist[pagelist].buildPara_italic} italic{/if}{if $pagefirstlist[pagelist].buildPara_underline} underline{/if}{if $pagefirstlist[pagelist].buildPara_strikethrough} strikethrough{/if}{if $pagefirstlist[pagelist].buildPara_textalign} {$pagefirstlist[pagelist].buildPara_textalign}{/if}" style="{if $pagefirstlist[pagelist].buildPara_fontsize}font-size:{$pagefirstlist[pagelist].buildPara_fontsize}px;{/if}{if $pagefirstlist[pagelist].buildPara_fontcolor}color:{$pagefirstlist[pagelist].buildPara_fontcolor}{/if}{if $pagefirstlist[pagelist].main_paragraph_font_style}font-family:{$pagefirstlist[pagelist].main_paragraph_font_style};{/if}{if $pagefirstlist[pagelist].main_paragraph_line_size}line-height:{$pagefirstlist[pagelist].main_paragraph_line_size}px;{/if}">					
										{if !empty($pagefirstlist[pagelist].text_description)}	
											{$pagefirstlist[pagelist].text_description}
										{/if}
										</div>
									{/if}
								<!-----description end------->
								<div>	
								<!-----image starts------->
								{if $pagefirstlist[pagelist].image_select eq '1'}
								 	{$objCommon->getImage($pagefirstlist[pagelist].pagelist)}
									{if $images}
										<img src="{$SITE_DOMAIN_IMAGES_URL}/{$images}" alt="home image">
									{/if}
								{/if}
								
								<!-----image end------->
								</div>
								<!--Divider Starts----->
								{if $pagefirstlist[pagelist].divider}
									<div id="buildDivide">
										aaaaaaaaaaaaaaaaaaaaaaaaaaaa
									</div>
								{/if}
								<!--Divider Ends----->
								<!-----image multiple text----->
								    {if $pagefirstlist[pagelist].image_multiple_select}
										{$objCommon->getImage($pagefirstlist[pagelist].pagelist,'singletext')}
												<div class="contentedit main_imagetitle" style="{if $pagefirstlist[pagelist].main_imagetitle_font_style}font-family:{$pagefirstlist[pagelist].main_imagetitle_font_style};{/if}{if $pagefirstlist[pagelist].main_imagetitle_line_size}line-height:{$pagefirstlist[pagelist].main_imagetitle_line_size}px;{/if}{if $pagefirstlist[pagelist].main_imagetitle_font_size}font-size:{$pagefirstlist[pagelist].main_imagetitle_font_size}px;{/if}">{if $pagefirstlist[pagelist].image_text}{$pagefirstlist[pagelist].image_text}{else}Image Title Here....{/if}</div>
												{if $images}
													<img src="{$SITE_DOMAIN_IMAGES_URL}/{$images}">
												{/if}
											</div>
									{/if} 
								<!----image multiple text end------>
								
								
								<!-----contact form starts------->
									{if $pagefirstlist[pagelist].contact_form eq '1'}
										{$objCommon->getAllContactDetails($pagefirstlist[pagelist].pagelist)}
										<div id="contact_form" class="martop20">						
											{include file='contactform.tpl'}
										</div>
									{/if}
								<!-----contact form end------->
								
								
								<!-----fan page starts------->
									{if $pagefirstlist[pagelist].social_plugins eq '1'}						
										{$objCommon->getSocialDetails($pagefirstlist[pagelist].pagelist)}
								 	 		{if !empty($socialpagelist)}
												{section name="social" loop="$socialpagelist"}
													{if !empty($socialpagelist[social].fb)}
														<a href="{$socialpagelist[social].fb}"><input type="button" class="btn btn-primary" value="Facebook" /></a>
													{/if}
													{if !empty($socialpagelist[social].twitter)}
														<a href="{$socialpagelist[social].twitter}"><input type="button" class="btn btn-info" value="Twitter" /></a>
													{/if}
													{if !empty($socialpagelist[social].linkedin)}
														<a href="{$socialpagelist[social].linkedin}"><input type="button" class="btn btn-danger" value="linked" /></a>
													{/if}
													{if !empty($socialpagelist[social].mail)}
														<a href="mailto:{$socialpagelist[social].mail}"><input type="button" class="btn btn-danger" value="mail" /></a>
													{/if}
												{/section}
											{/if}	
									{/if}
								<!-----fan page ends------->
						{/section}
					</div>
					<!------------------site  and blog content end------------------->
			 		<!-------------------CONTENT END-------------->
				</div>
					
					
					<div class="themewrapper1 themewrapper2 themewrapper3 themewrapper4 themewrapper5 themewrapper6">
						<!------FOOTER CODE STARTS-------------------->
						<div class="pull-right">
							<!------show footer code details------------------------------------>
							{if $domain_details}
								{$domain_details.0.footer_code}
							{/if}
							<!------show footer code details end------------------>
							{$LANG.common_create_new}<a href="">}{$SITE_MAIN_DOMAIN}</a>
						</div>					
							
							
						<!------FOOTER CODE END--------------------->
					</div>
					
				</div>
			</div>
		</div>
		</div>
		{else}
			{include file="blogdetailsnew.tpl"}
		{/if}
	</body>
</html>