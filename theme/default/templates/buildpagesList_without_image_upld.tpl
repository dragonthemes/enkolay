<script type="text/javascript" src="{$SITE_JS_URL}/jquery.min.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/common.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/jquery.ui.all.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/colResizable-1.3.min.js"></script>
{literal}
<script type="text/javascript">
	var onSampleResized = function(e){
		var columns = $(e.currentTarget).find("td");
		var msg = '';
		columns.each(function(){ msg += $(this).width() + "px; "; });	
		var tdone = $(".sample2 tr td:first").width();
		var tdtwo = $(".sample2 tr td:nth-child(2)").width();
		var tdthree = $(".sample2 tr td:nth-child(3)").width();
		var tdfour = $(".sample2 tr td:nth-child(4)").width();
		var tdfive = $(".sample2 tr td:nth-child(5)").width();
		var colpagelist = $(e.currentTarget).find(".columnpagelistid").val();	
		updatewidthvalue(tdone,tdtwo,tdthree,tdfour,tdfive,colpagelist);
	};	
	var dropvalinput = $(".dropvalue").val("");
	function colResize(){
		$(".sample2").colResizable({
			liveDrag:true, 
			draggingClass:"dragging", 
			onResize:onSampleResized
		});	
	}
	colResize();
</script>
{/literal}
<link href="{$SITE_BASEURL}/theme/{$smarty.session.themename}/css/theme.css" type="text/css" rel="stylesheet" />
<link href="{$SITE_CSS_URL}/design.css" type="text/css" rel="stylesheet" />
	{$objCommon->getImageForShowTop($site_title.0.domain_id,'backgroundimage')}
	{$objCommon->getBannerEnable($site_title.0.domain_id)}
	<div class="{$smarty.session.themecolorname}">
		<div class="clear2teheme"></div>
		<div class="themewrapper5 theme2Banner" {if $banner_config}{if $logoimages}style="background:url({$SITE_DOMAIN_IMAGES_URL}/{$logoimages}); background-size:100% 100%;"{/if}{/if}>
			{if $smarty.session.themename eq 'theme5'}
			<div class="theme5wrap">
			{/if}
			<div class="themewrapper4Cont wrapperCont5 clearfix" id="titheaddesUpdate">
				<div class="themeLeftSep mainRightPanelInnerTop">
					{if $smarty.session.themename eq 'theme4' OR $smarty.session.themename eq 'store2' }
						<div class="themewrapperRight">
							<div class="theme4Wrapper">
								<div class="buildNavTabBg blogthemeNavTab">
								<ul class="buildSection nav_menu blogthemeNavTab_menu" style="{if $site_title.0.nav_menu_font_style}font-family:{$site_title.0.nav_menu_font_style};{/if}{if $site_title.0.nav_menu_font_size}font-size:{$site_title.0.nav_menu_font_size}px;{/if}{if $site_title.0.nav_menu_line_size}line-height:{$site_title.0.nav_menu_line_size}px;{/if}">
								{if $smarty.session.domain_id}
								{$objCommon->getPages($site_title.0.domain_id)}
								{section name="pages" loop="$buildpagelist1"}
									<li class="navTabSub">
										<a class="{if $smarty.session.page_id eq $buildpagelist1[pages].page_id}active{/if}"
							 onclick="showPageListinBuild('{$buildpagelist1[pages].page_id}','{$buildpagelist1[pages].domain_id}')">{$buildpagelist1[pages].pagename}</a>
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
					{if $smarty.session.themename neq 'store3' }
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
													<li onclick="return imageShow()"><a data-toggle="modal" href="#uploadImgPopup"><span class="hovershowLogoArrowTop"></span>  {$LANG.edit_logo_name}</a></li>
												{/if}
												{else}
													<li onclick="return imageShow()"><a data-toggle="modal" href="#uploadImgPopup"><span class="hovershowLogoArrowTop"></span>  {$LANG.logo_name}</a></li>
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
												{if $smarty.session.themename neq ''}
													{if $smarty.session.themename eq 'theme1' OR $smarty.session.themename eq 'theme2' OR $smarty.session.themename eq 'theme3' OR $smarty.session.themename eq 'theme5' OR $smarty.session.themename eq 'blog1'}
													<div class="themewrapperRight">
														<div class="theme4Wrapper">
															<div class="buildNavTabBg blogthemeNavTab">
															<ul class="buildSection nav_menu blogthemeNavTab_menu" style="{if $site_title.0.nav_menu_font_style}font-family:{$site_title.0.nav_menu_font_style};{/if}{if $site_title.0.nav_menu_font_size}font-size:{$site_title.0.nav_menu_font_size}px;{/if}{if $site_title.0.nav_menu_line_size}line-height:{$site_title.0.nav_menu_line_size}px;{/if}">
															{if $smarty.session.domain_id}
															{$objCommon->getPages($site_title.0.domain_id)}
															{section name="pages" loop="$buildpagelist1"}
																<li class="navTabSub">
																	<a class="{if $smarty.session.page_id eq $buildpagelist1[pages].page_id}active{/if}"
														 onclick="showPageListinBuild('{$buildpagelist1[pages].page_id}','{$buildpagelist1[pages].domain_id}')">{$buildpagelist1[pages].pagename}</a>
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
														<div class="themewrapperRight">
														<div class="buildNavTabBg blogthemeNavTab">
															<ul class="buildSection nav_menu blogthemeNavTab_menu" style="{if $site_title.0.nav_menu_font_style}font-family:{$site_title.0.nav_menu_font_style};{/if}{if $site_title.0.nav_menu_font_size}font-size:{$site_title.0.nav_menu_font_size}px;{/if}{if $site_title.0.nav_menu_line_size}line-height:{$site_title.0.nav_menu_line_size}px;{/if}">
															{if $smarty.session.domain_id}
															{$objCommon->getPages($site_title.0.domain_id)}
															{section name="pages" loop="$buildpagelist1"}
																<li class="navTabSub">
																	<a class="{if $smarty.session.page_id eq $buildpagelist1[pages].page_id}active{/if}"
														 onclick="showPageListinBuild('{$buildpagelist1[pages].page_id}','{$buildpagelist1[pages].domain_id}')">{$buildpagelist1[pages].pagename}</a>
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
								{if $smarty.session.themename eq 'theme7'}
									<div class="themewrapperRight">
										<div class="theme4Wrapper">
											<div class="buildNavTabBg blogthemeNavTab">
											<ul class="buildSection nav_menu blogthemeNavTab_menu" style="{if $site_title.0.nav_menu_font_style}font-family:{$site_title.0.nav_menu_font_style};{/if}{if $site_title.0.nav_menu_font_size}font-size:{$site_title.0.nav_menu_font_size}px;{/if}{if $site_title.0.nav_menu_line_size}line-height:{$site_title.0.nav_menu_line_size}px;{/if}">
											{if $smarty.session.domain_id}
											{$objCommon->getPages($site_title.0.domain_id)}
											{section name="pages" loop="$buildpagelist1"}
												<li class="navTabSub">
													<a class="{if $smarty.session.page_id eq $buildpagelist1[pages].page_id}active{/if}"
										 onclick="showPageListinBuild('{$buildpagelist1[pages].page_id}','{$buildpagelist1[pages].domain_id}')">{$buildpagelist1[pages].pagename}</a>
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
					{/if}
					{if $smarty.session.themename eq 'store3' }
						<div class="logoTopHoverOuter">
							<div class="themewrapper1 themewrapper3 blogwrapper1 logoTopHover blogwrapper2">
								<div class="themewrapperBgLft">
									<div class="theme4Wrapper">
										<div class="blogthemeLogo" onmouseover="titleShow()"  onmouseout="titleHide()">
											<div class="themewrapperLeft hei60">
											{$objCommon->getImageForShowTop($site_title.0.domain_id,'domainlogo')}
											{if $site_title.0.header_logo_config eq '1'}
											<div class="flt"><h2 class="mainPageThmeTitle site_title contentedit" id="updateTitle" contenteditable="true"  data-ph="Edit Text Here"  onblur="return updateTitleIndex('{$smarty.session.domain_id}');" style="{if $site_title.0.site_title_font_style}font-family:{$site_title.0.site_title_font_style};{/if}{if $site_title.0.site_title_font_size}font-size:{$site_title.0.site_title_font_size}px;{/if}{if $site_title.0.site_title_line_size}line-height:{$site_title.0.site_title_line_size}px;{/if}">{if $site_title.0.site_title}{$site_title.0.site_title}{else}{/if}</h2></div>
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
														<li onclick="return imageShow()"><a data-toggle="modal" href="#uploadImgPopup"><span class="hovershowLogoArrowTop"></span>  {$LANG.edit_logo_name}</a></li>
													{/if}
													{else}
														<li onclick="return imageShow()"><a data-toggle="modal" href="#uploadImgPopup"><span class="hovershowLogoArrowTop"></span>  {$LANG.logo_name}</a></li>
													{/if}	
												</ul>
											</div>
										</div>
										</div>
									</div>
								</div>
								<div class="themewrapperRight">
									<div class="theme4Wrapper">
										<div class="buildNavTabBg blogthemeNavTab">
										<ul class="buildSection nav_menu blogthemeNavTab_menu" style="{if $site_title.0.nav_menu_font_style}font-family:{$site_title.0.nav_menu_font_style};{/if}{if $site_title.0.nav_menu_font_size}font-size:{$site_title.0.nav_menu_font_size}px;{/if}{if $site_title.0.nav_menu_line_size}line-height:{$site_title.0.nav_menu_line_size}px;{/if}">
										{if $smarty.session.domain_id}
										{$objCommon->getPages($site_title.0.domain_id)}
										{section name="pages" loop="$buildpagelist1"}
											<li class="navTabSub">
												<a class="{if $smarty.session.page_id eq $buildpagelist1[pages].page_id}active{/if} "
									 onclick="showPageListinBuild('{$buildpagelist1[pages].page_id}','{$buildpagelist1[pages].domain_id}','{$buildpagelist1[pages].pagename}')">{$buildpagelist1[pages].pagename}</a>
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
							</div>
						</div>
					{/if}
					{if $smarty.session.themename eq 'theme6'}
						<div class="themewrapperRight">
							<div class="theme4Wrapper">
								<div class="buildNavTabBg blogthemeNavTab">
								<ul class="buildSection nav_menu blogthemeNavTab_menu" style="{if $site_title.0.nav_menu_font_style}font-family:{$site_title.0.nav_menu_font_style};{/if}{if $site_title.0.nav_menu_font_size}font-size:{$site_title.0.nav_menu_font_size}px;{/if}{if $site_title.0.nav_menu_line_size}line-height:{$site_title.0.nav_menu_line_size}px;{/if}">
								{if $smarty.session.domain_id}
								{$objCommon->getPages($site_title.0.domain_id)}
								{section name="pages" loop="$buildpagelist1"}
									<li class="navTabSub">
										<a class="{if $smarty.session.page_id eq $buildpagelist1[pages].page_id}active{/if}"
							 onclick="showPageListinBuild('{$buildpagelist1[pages].page_id}','{$buildpagelist1[pages].domain_id}')">{$buildpagelist1[pages].pagename}</a>
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
				
				
				<input type="hidden" name="page_id" id="page_id" value="{$smarty.session.page_id}">
				<input type="hidden" name="domain_id" id="domain_id" value="{$smarty.session.domain_id}">
				{if $smarty.session.domain_id}
				<input type="hidden" name="blog_comment" id="blog_comment" value="{$objCommon->getBlogComment($smarty.session.page_id)}">
				<input type="hidden" name="store_comment" id="store_comment" value="{$objCommon->getStoreComment($smarty.session.page_id)}">
				{/if}
				<input type="hidden" name="clickid" id="clickid" value="">
				{if $smarty.session.themeOnuse}
					<div class="themeRightSepOuter">
						<div class="themeRightSep">
							<div class="mainRhtBanner clearfix">
							{if $smarty.session.themename eq 'theme1'}
								<div class="mainRhtBannerInner">
									{if $site_title.0.header_banner eq 0 and $site_title.0.header_slider eq 0}
										{$objCommon->getImageForShowTop($site_title.0.domain_id,'bannerimage')}
										<div class="mainRhtBannerInnerBanner" {if $logoimages}style="background:url({$SITE_DOMAIN_IMAGES_URL}/{$logoimages});"{/if}>
											<a class="editbannerTxt" data-toggle="modal" href="#editBannerImg">
												{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
											</a>
											
											<a class="editbannerTxt" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
												{$LANG.slider_name} <i class="fa fa-caret-down"></i>
											</a>
											<div class="themewrapper3">
												<div class="mainRhtBannerInnerRight">
													<input type="hidden" value="" class="headlimitInput" />
													<h2 class="mainRhtBannerInnerHead main_headline" style="{if $site_title.0.main_headline_font_style}font-family:{$site_title.0.main_headline_font_style};{/if}{if $site_title.0.main_headline_font_size}font-size:{$site_title.0.main_headline_font_size}px;{/if}{if $site_title.0.main_headline_line_size}line-height:{$site_title.0.main_headline_line_size}px;{/if}">
														<div id="headingContent" contenteditable="true" data-ph="Edit Headline Here"  class="headlimit contentedit {if $site_title.0.heading_content eq ''}clickheretext contenttext{/if}" onblur="updateHeading('{$smarty.session.domain_id}')" >{if $site_title.0.heading_content}{$site_title.0.heading_content}{/if}</div>
													</h2>
													<div class="mainRhtBannerInnerDesc contentedit{if $site_title.0.heading_description eq ''} clickheretext contenttext{/if}" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onmouseout="updateDescriptionTitle('{$smarty.session.domain_id}')" style="{if $site_title.0.site_title_font_style}font-family:{$site_title.0.site_title_font_style};{/if}{if $site_title.0.site_title_font_size}font-size:{$site_title.0.site_title_font_size}px;{/if}{if $site_title.0.site_title_line_size}line-height:{$site_title.0.site_title_line_size}px;{/if}">{if $site_title.0.heading_description}{$site_title.0.heading_description}{/if}</div>
                                                </div>
											</div>
										</div>
									{/if}
									{if $site_title.0.header_banner}
										{$objCommon->getImageForShowTop($site_title.0.domain_id,'bannerimage')}
										<div class="mainRhtBannerInnerBanner" {if $logoimages}style="background:url({$SITE_DOMAIN_IMAGES_URL}/{$logoimages});"{/if}>
											<a class="editbannerTxt" data-toggle="modal" href="#editBannerImg">
												{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
											</a>
											
											<a class="editbannerTxt" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
												{$LANG.slider_name} <i class="fa fa-caret-down"></i>
											</a>
											<div class="themewrapper3">
												<div class="mainRhtBannerInnerRight">
													<h2 class="mainRhtBannerInnerHead main_headline" style="{if $site_title.0.main_headline_font_style}font-family:{$site_title.0.main_headline_font_style};{/if}{if $site_title.0.main_headline_font_size}font-size:{$site_title.0.main_headline_font_size}px;{/if}{if $site_title.0.main_headline_line_size}line-height:{$site_title.0.main_headline_line_size}px;{/if}">
														<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="headlimit contentedit {if $site_title.0.heading_content eq ''}clickheretext contenttext{/if}" onblur="updateHeading('{$smarty.session.domain_id}')" >{if $site_title.0.heading_content}{$site_title.0.heading_content}{/if}</div>
													</h2>
													<div class="mainRhtBannerInnerDesc contentedit{if $site_title.0.heading_description eq ''} clickheretext contenttext{/if}" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onmouseout="updateDescriptionTitle('{$smarty.session.domain_id}')">{if $site_title.0.heading_description}{$site_title.0.heading_description}{/if}</div>
												</div>
											</div>
										</div>
									{/if}
									{if $site_title.0.header_slider}
										{$objCommon->getImageForBannerSlider($site_title.0.domain_id,'sliderimage')}
										<div class="slideBannerRel hoverSlide">
											<a class="slideeditbannerTxt" data-toggle="modal" href="#editBannerImg">
												{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
											</a>
											<a class="slideeditSlide" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
												{$LANG.slider_name} <i class="fa fa-caret-down"></i>
											</a>
											<div id="slider2" class="nivoSlider widt860">
												 {section name="bannersliimg" loop="$sliderimages"}
													<div class="imageSlider">
														<img width="100%" height="300" src="{$SITE_DOMAIN_IMAGES_URL}/{$sliderimages[bannersliimg].image_name}">
                                                        <div class="slideimageInn">
                                                            <a onclick="deleteSliderBannerImage('{$sliderimages[bannersliimg].img_id}');" class="galleryimage"><i class="fa fa-trash-o"></i></a>
                                                            
                                                        </div>
													</div>
                                                    
												 {/section}
											</div>
                                        </div>
									{/if}
								</div>
							{elseif $smarty.session.themename eq 'theme2'}
							
								{if $site_title.0.header_banner eq 0 and $site_title.0.header_slider eq 0}
									<div class="mainRhtBannerInnerBanner clr">
										<div class="paddlefRht">
											<div class="top-divider"></div>
											{$objCommon->getImageForShowTop($site_title.0.domain_id,'bannerimage')}
											<div id="banner">
												<div id="bannerleft">
													<div class="wsite-header" {if $logoimages}style="background:url({$SITE_DOMAIN_IMAGES_URL}/{$logoimages}); background-size:cover;"{/if}>
														<a class="editbannerTxt" data-toggle="modal" href="#editBannerImg">
															{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
														</a>
														<a class="editbannerTxt" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
															{$LANG.slider_name} <i class="fa fa-caret-down"></i>
														</a>
													</div>
													<div class="banner-shadow"></div>
													<div class="banner-corners"></div>
													<div class="effect"> </div>
													<div class="banner-top"></div>
													<div class="banner-right"></div>
													<div class="banner-btm"></div>
													<div class="banner-left"></div>
												</div>
												<div id="bannerright">
													<div class="bannerrightCont">
														<h2 class="mainRhtBannerInnerHead main_headline" style="{if $site_title.0.main_headline_font_style}font-family:{$site_title.0.main_headline_font_style};{/if}{if $site_title.0.main_headline_font_size}font-size:{$site_title.0.main_headline_font_size}px;{/if}{if $site_title.0.main_headline_line_size}line-height:{$site_title.0.main_headline_line_size}px;{/if}">
														<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="headlimit contentedit{if $site_title.0.heading_content eq ''} clickheretext contenttext{/if}" onblur="updateHeading('{$smarty.session.domain_id}')" >{if $site_title.0.heading_content}{$site_title.0.heading_content}{/if}</div>
														</h2>
														<p id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  class="contentedit {if $site_title.0.heading_description eq ''}clickheretext contenttext{/if}" onmouseout="updateDescriptionTitle('{$smarty.session.domain_id}')">{if $site_title.0.heading_description}{$site_title.0.heading_description}{/if}</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								{/if}
								{if $site_title.0.header_banner}
									{$objCommon->getImageForShowTop($site_title.0.domain_id,'bannerimage')}
									<div class="paddlefRht">
										<div class="top-divider"></div>
										{$objCommon->getImageForShowTop($site_title.0.domain_id,'bannerimage')}
										<div id="banner">
											<div id="bannerleft">
												<div class="wsite-header" {if $logoimages}style="background:url({$SITE_DOMAIN_IMAGES_URL}/{$logoimages}); background-size:cover;"{/if}>
													<a class="editbannerTxt" data-toggle="modal" href="#editBannerImg">
														{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
													</a>
													<a class="editbannerTxt" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
														{$LANG.slider_name} <i class="fa fa-caret-down"></i>
													</a>
												</div>
												<div class="banner-shadow"></div>
												<div class="banner-corners"></div>
												<div class="effect"> </div>
												<div class="banner-top"></div>
												<div class="banner-right"></div>
												<div class="banner-btm"></div>
												<div class="banner-left"></div>
											</div>
											<div id="bannerright">
												<div class="bannerrightCont">
													<h2 class="mainRhtBannerInnerHead main_headline" style="{if $site_title.0.main_headline_font_style}font-family:{$site_title.0.main_headline_font_style};{/if}{if $site_title.0.main_headline_font_size}font-size:{$site_title.0.main_headline_font_size}px;{/if}{if $site_title.0.main_headline_line_size}line-height:{$site_title.0.main_headline_line_size}px;{/if}">
													<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="headlimit contentedit{if $site_title.0.heading_content eq ''} clickheretext contenttext{/if}" onblur="updateHeading('{$smarty.session.domain_id}')" >{if $site_title.0.heading_content}{$site_title.0.heading_content}{/if}</div>
													</h2>
													<p id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  class="contentedit {if $site_title.0.heading_description eq ''}clickheretext contenttext{/if}" onmouseout="updateDescriptionTitle('{$smarty.session.domain_id}')">{if $site_title.0.heading_description}{$site_title.0.heading_description}{/if}</p>
												</div>
											</div>
										</div>
									</div>
								{/if}
								{if $site_title.0.header_slider}
									{$objCommon->getImageForBannerSlider($site_title.0.domain_id,'sliderimage')}
									<div class="slideBannerRel">
										<a class="slideeditbannerTxt" data-toggle="modal" href="#editBannerImg">
											{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
										</a>
										<a class="slideeditSlide" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
											{$LANG.slider_name} <i class="fa fa-caret-down"></i>
										</a>
										<div id="slider2" class="nivoSlider theme2Widt">
											 {section name="bannersliimg" loop="$sliderimages"}
												<div class="imageSlider">
													<img width="100%" height="300" src="{$SITE_DOMAIN_IMAGES_URL}/{$sliderimages[bannersliimg].image_name}">
												    <div class="slideimageInn">
                                                            <a onclick="deleteSliderBannerImage('{$sliderimages[bannersliimg].img_id}');" class="galleryimage"><i class="fa fa-trash-o"></i></a>
                                                            
                                                    </div>
                                                </div>
											 {/section}
										</div>
									</div>
								{/if}
							{elseif $smarty.session.themename eq 'theme3'}
								{if $site_title.0.header_banner eq 0 and $site_title.0.header_slider eq 0}
									<div class="mainRhtBannerInner clr">
										<div class="paddlefRht">
											<div class="top-divider"></div>
											{$objCommon->getImageForShowTop($site_title.0.domain_id,'bannerimage')}
											<div id="banner">
												<div id="bannerleft">
													<div class="wsite-header" {if $logoimages}style="background:url({$SITE_DOMAIN_IMAGES_URL}/{$logoimages}); background-size:cover;"{/if}>
														<a class="editbannerTxt" data-toggle="modal" href="#editBannerImg">
															{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
														</a>
														<a class="editbannerTxt" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
															{$LANG.slider_name} <i class="fa fa-caret-down"></i>
														</a>
													</div>
													<div class="banner-shadow"></div>
													<div class="banner-corners"></div>
													<div class="effect"> </div>
													<div class="banner-top"></div>
													<div class="banner-right"></div>
													<div class="banner-btm"></div>
													<div class="banner-left"></div>
												</div>
												<div id="bannerright">
													<div class="bannerrightCont">
														<h2 class="mainRhtBannerInnerHead main_headline" style="{if $site_title.0.main_headline_font_style}font-family:{$site_title.0.main_headline_font_style};{/if}{if $site_title.0.main_headline_font_size}font-size:{$site_title.0.main_headline_font_size}px;{/if}{if $site_title.0.main_headline_line_size}line-height:{$site_title.0.main_headline_line_size}px;{/if}">
														<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="headlimit contentedit{if $site_title.0.heading_content eq ''} clickheretext contenttext{/if}" onblur="updateHeading('{$smarty.session.domain_id}')" >{if $site_title.0.heading_content}{$site_title.0.heading_content}{/if}</div>
														</h2>
														<p id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  class="contentedit {if $site_title.0.heading_description eq ''}clickheretext contenttext{/if}" onmouseout="updateDescriptionTitle('{$smarty.session.domain_id}')">{if $site_title.0.heading_description}{$site_title.0.heading_description}{/if}</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								{/if}
								{if $site_title.0.header_banner}
									<div class="mainRhtBannerInner clr">
										{$objCommon->getImageForShowTop($site_title.0.domain_id,'bannerimage')}
										<div class="paddlefRht">
											<div class="top-divider"></div>
											{$objCommon->getImageForShowTop($site_title.0.domain_id,'bannerimage')}
											<div id="banner">
												<div id="bannerleft">
													<div class="wsite-header" {if $logoimages}style="background:url({$SITE_DOMAIN_IMAGES_URL}/{$logoimages}); background-size:cover;"{/if}>
														<a class="editbannerTxt" data-toggle="modal" href="#editBannerImg">
															{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
														</a>
														<a class="editbannerTxt" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
															{$LANG.slider_name} <i class="fa fa-caret-down"></i>
														</a>
													</div>
													<div class="banner-shadow"></div>
													<div class="banner-corners"></div>
													<div class="effect"> </div>
													<div class="banner-top"></div>
													<div class="banner-right"></div>
													<div class="banner-btm"></div>
													<div class="banner-left"></div>
												</div>
												<div id="bannerright">
													<div class="bannerrightCont">
														<h2 class="mainRhtBannerInnerHead main_headline" style="{if $site_title.0.main_headline_font_style}font-family:{$site_title.0.main_headline_font_style};{/if}{if $site_title.0.main_headline_font_size}font-size:{$site_title.0.main_headline_font_size}px;{/if}{if $site_title.0.main_headline_line_size}line-height:{$site_title.0.main_headline_line_size}px;{/if}">
														<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="headlimit contentedit{if $site_title.0.heading_content eq ''} clickheretext contenttext{/if}" onblur="updateHeading('{$smarty.session.domain_id}')" >{if $site_title.0.heading_content}{$site_title.0.heading_content}{/if}</div>
														</h2>
														<p id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  class="contentedit {if $site_title.0.heading_description eq ''}clickheretext contenttext{/if}" onmouseout="updateDescriptionTitle('{$smarty.session.domain_id}')">{if $site_title.0.heading_description}{$site_title.0.heading_description}{/if}</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								{/if}
								{if $site_title.0.header_slider}
									<div class="mainRhtBannerInner clr">
										{$objCommon->getImageForBannerSlider($site_title.0.domain_id,'sliderimage')}
										<div class="slideBannerRel">
											<a class="slideeditbannerTxt" data-toggle="modal" href="#editBannerImg">
												{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
											</a>
											<a class="slideeditSlide" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
												{$LANG.slider_name} <i class="fa fa-caret-down"></i>
											</a>
											<div id="slider2" class="nivoSlider theme3Widt">
												 {section name="bannersliimg" loop="$sliderimages"}
													<div class="imageSlider">
														<img width="100%" height="300" src="{$SITE_DOMAIN_IMAGES_URL}/{$sliderimages[bannersliimg].image_name}">
													    <div class="slideimageInn">
                                                            <a onclick="deleteSliderBannerImage('{$sliderimages[bannersliimg].img_id}');" class="galleryimage"><i class="fa fa-trash-o"></i></a>
                                                            
                                                    </div>
                                                    </div>
												 {/section}
											</div>
										</div>
									</div>
								{/if}
								
							{elseif $smarty.session.themename eq 'theme4'}
								
								{if $site_title.0.header_banner eq 0 and $site_title.0.header_slider eq 0}
									<div class="mainRhtBannerInner">
										{$objCommon->getImageForShowTop($site_title.0.domain_id,'bannerimage')}
										<div class="mainRhtBannerInnerBanner" {if $logoimages}style="background:url({$SITE_DOMAIN_IMAGES_URL}/{$logoimages});"{/if}>
											<a class="editbannerTxt theme4editimg" data-toggle="modal" href="#editBannerImg">
												{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
											</a>
											<a class="editbannerTxt" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
												{$LANG.slider_name} <i class="fa fa-caret-down"></i>
											</a>
											<div class="themewrapper3">
												<div class="mainRhtBannerInnerRight">
													<h2 class="mainRhtBannerInnerHead main_headline" style="{if $site_title.0.main_headline_font_style}font-family:{$site_title.0.main_headline_font_style};{/if}{if $site_title.0.main_headline_font_size}font-size:{$site_title.0.main_headline_font_size}px;{/if}{if $site_title.0.main_headline_line_size}line-height:{$site_title.0.main_headline_line_size}px;{/if}">
														<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="headlimit contentedit {if $site_title.0.heading_content eq ''}clickheretext contenttext{/if}" onblur="updateHeading('{$smarty.session.domain_id}')" >{if $site_title.0.heading_content}{$site_title.0.heading_content}{/if}</div>
													</h2>
													<div class="mainRhtBannerInnerDesc contentedit{if $site_title.0.heading_description eq ''} clickheretext contenttext{/if}" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onmouseout="updateDescriptionTitle('{$smarty.session.domain_id}')">{if $site_title.0.heading_description}{$site_title.0.heading_description}{/if}</div>
												</div>
											</div>
										</div>
									</div>
								{/if}
								{if $site_title.0.header_banner}
									<div class="mainRhtBannerInner">
										{$objCommon->getImageForShowTop($site_title.0.domain_id,'bannerimage')}
										<div class="mainRhtBannerInnerBanner" {if $logoimages}style="background:url({$SITE_DOMAIN_IMAGES_URL}/{$logoimages});"{/if}>
											<a class="editbannerTxt theme4editimg" data-toggle="modal" href="#editBannerImg">
												{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
											</a>
											<a class="editbannerTxt" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
												{$LANG.slider_name} <i class="fa fa-caret-down"></i>
											</a>
											<div class="themewrapper3">
												<div class="mainRhtBannerInnerRight">
													<h2 class="mainRhtBannerInnerHead main_headline" style="{if $site_title.0.main_headline_font_style}font-family:{$site_title.0.main_headline_font_style};{/if}{if $site_title.0.main_headline_font_size}font-size:{$site_title.0.main_headline_font_size}px;{/if}{if $site_title.0.main_headline_line_size}line-height:{$site_title.0.main_headline_line_size}px;{/if}">
														<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="headlimit contentedit {if $site_title.0.heading_content eq ''}clickheretext contenttext{/if}" onblur="updateHeading('{$smarty.session.domain_id}')" >{if $site_title.0.heading_content}{$site_title.0.heading_content}{/if}</div>
													</h2>
													<div class="mainRhtBannerInnerDesc contentedit{if $site_title.0.heading_description eq ''} clickheretext contenttext{/if}" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onmouseout="updateDescriptionTitle('{$smarty.session.domain_id}')">{if $site_title.0.heading_description}{$site_title.0.heading_description}{/if}</div>
												</div>
											</div>
										</div>
									</div>
								{/if}
								{if $site_title.0.header_slider}
									<div class="mainRhtBannerInner clr">
										{$objCommon->getImageForBannerSlider($site_title.0.domain_id,'sliderimage')}
										<div class="slideBannerRel">
											<a class="slideeditbannerTxt" data-toggle="modal" href="#editBannerImg">
												{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
											</a>
											<a class="slideeditSlide" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
												{$LANG.slider_name} <i class="fa fa-caret-down"></i>
											</a>
											<div id="slider2" class="nivoSlider theme4Widt">
												 {section name="bannersliimg" loop="$sliderimages"}
													<div class="imageSlider">
														<img width="100%" height="300" src="{$SITE_DOMAIN_IMAGES_URL}/{$sliderimages[bannersliimg].image_name}">
													    <div class="slideimageInn">
                                                            <a onclick="deleteSliderBannerImage('{$sliderimages[bannersliimg].img_id}');" class="galleryimage"><i class="fa fa-trash-o"></i></a>
                                                            
                                                    </div>
                                                    </div>
												 {/section}
											</div>
										</div>
									</div>
								{/if}
								
							{elseif $smarty.session.themename eq 'theme5'}
								{if $site_title.0.header_banner eq 0 and $site_title.0.header_slider eq 0}
									<div class="mainRhtBannerInner">
										{$objCommon->getImageForShowTop($site_title.0.domain_id,'bannerimage')}
										<div class="mainRhtBannerInnerBanner" {if $logoimages}style="background:url({$SITE_DOMAIN_IMAGES_URL}/{$logoimages});"{/if}>
											<a class="editbannerTxt theme4editimg" data-toggle="modal" href="#editBannerImg">
												{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
											</a>
											<a class="editbannerTxt" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
												{$LANG.slider_name} <i class="fa fa-caret-down"></i>
											</a>
											<div class="themewrapper3">
												<div class="mainRhtBannerInnerRight">
													<h2 class="mainRhtBannerInnerHead main_headline" style="{if $site_title.0.main_headline_font_style}font-family:{$site_title.0.main_headline_font_style};{/if}{if $site_title.0.main_headline_font_size}font-size:{$site_title.0.main_headline_font_size}px;{/if}{if $site_title.0.main_headline_line_size}line-height:{$site_title.0.main_headline_line_size}px;{/if}">
														<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="headlimit contentedit {if $site_title.0.heading_content eq ''}clickheretext contenttext{/if}" onblur="updateHeading('{$smarty.session.domain_id}')" >{if $site_title.0.heading_content}{$site_title.0.heading_content}{/if}</div>
													</h2>
													<div class="mainRhtBannerInnerDesc contentedit{if $site_title.0.heading_description eq ''} clickheretext contenttext{/if}" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onmouseout="updateDescriptionTitle('{$smarty.session.domain_id}')">{if $site_title.0.heading_description}{$site_title.0.heading_description}{/if}</div>
												</div>
											</div>
										</div>
									</div>
								{/if}
								{if $site_title.0.header_banner}
									<div class="mainRhtBannerInner">
										{$objCommon->getImageForShowTop($site_title.0.domain_id,'bannerimage')}
										<div class="mainRhtBannerInnerBanner" {if $logoimages}style="background:url({$SITE_DOMAIN_IMAGES_URL}/{$logoimages});"{/if}>
											<a class="editbannerTxt theme4editimg" data-toggle="modal" href="#editBannerImg">
												{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
											</a>
											<a class="editbannerTxt" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
												{$LANG.slider_name} <i class="fa fa-caret-down"></i>
											</a>
											<div class="themewrapper3">
												<div class="mainRhtBannerInnerRight">
													<h2 class="mainRhtBannerInnerHead main_headline" style="{if $site_title.0.main_headline_font_style}font-family:{$site_title.0.main_headline_font_style};{/if}{if $site_title.0.main_headline_font_size}font-size:{$site_title.0.main_headline_font_size}px;{/if}{if $site_title.0.main_headline_line_size}line-height:{$site_title.0.main_headline_line_size}px;{/if}">
														<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="headlimit contentedit {if $site_title.0.heading_content eq ''}clickheretext contenttext{/if}" onblur="updateHeading('{$smarty.session.domain_id}')" >{if $site_title.0.heading_content}{$site_title.0.heading_content}{/if}</div>
													</h2>2
													<div class="mainRhtBannerInnerDesc contentedit{if $site_title.0.heading_description eq ''} clickheretext contenttext{/if}" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onmouseout="updateDescriptionTitle('{$smarty.session.domain_id}')">{if $site_title.0.heading_description}{$site_title.0.heading_description}{/if}</div>
												</div>
											</div>
										</div>
									</div>
								{/if}
								{if $site_title.0.header_slider}
									<div class="mainRhtBannerInner clr">
										{$objCommon->getImageForBannerSlider($site_title.0.domain_id,'sliderimage')}
										<div class="slideBannerRel">
											<a class="slideeditbannerTxt" data-toggle="modal" href="#editBannerImg">
												{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
											</a>
											<a class="slideeditSlide" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
												{$LANG.slider_name} <i class="fa fa-caret-down"></i>
											</a>
											<div id="slider2" class="nivoSlider theme4Widt">
												 {section name="bannersliimg" loop="$sliderimages"}
													<div class="imageSlider">
														<img width="100%" height="300" src="{$SITE_DOMAIN_IMAGES_URL}/{$sliderimages[bannersliimg].image_name}">
												        <div class="slideimageInn">
                                                            <a onclick="deleteSliderBannerImage('{$sliderimages[bannersliimg].img_id}');" class="galleryimage"><i class="fa fa-trash-o"></i></a>
                                                            
                                                    </div>
                                                	</div>
												 {/section}
											</div>
										</div>
									</div>
								{/if}
								
							{elseif $smarty.session.themename eq 'theme6'}
								
								{if $site_title.0.header_banner eq 0 and $site_title.0.header_slider eq 0}
									<div class="mainRhtBannerInner">
										{$objCommon->getImageForShowTop($site_title.0.domain_id,'bannerimage')}
										<div class="mainRhtBannerInnerBanner" {if $logoimages}style="background:url({$SITE_DOMAIN_IMAGES_URL}/{$logoimages});"{/if}>
											<a class="editbannerTxt theme4editimg" data-toggle="modal" href="#editBannerImg">
												{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
											</a>
											<a class="editbannerTxt" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
												{$LANG.slider_name} <i class="fa fa-caret-down"></i>
											</a>
											<div class="themewrapper3">
												<div class="mainRhtBannerInnerRight">
													<h2 class="mainRhtBannerInnerHead main_headline" style="{if $site_title.0.main_headline_font_style}font-family:{$site_title.0.main_headline_font_style};{/if}{if $site_title.0.main_headline_font_size}font-size:{$site_title.0.main_headline_font_size}px;{/if}{if $site_title.0.main_headline_line_size}line-height:{$site_title.0.main_headline_line_size}px;{/if}">
														<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="headlimit contentedit {if $site_title.0.heading_content eq ''}clickheretext contenttext{/if}" onblur="updateHeading('{$smarty.session.domain_id}')" >{if $site_title.0.heading_content}{$site_title.0.heading_content}{/if}</div>
													</h2>
													<div class="mainRhtBannerInnerDesc contentedit{if $site_title.0.heading_description eq ''} clickheretext contenttext{/if}" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onmouseout="updateDescriptionTitle('{$smarty.session.domain_id}')">{if $site_title.0.heading_description}{$site_title.0.heading_description}{/if}</div>
												</div>
											</div>
										</div>
									</div>
								{/if}
								{if $site_title.0.header_banner}
									<div class="mainRhtBannerInner">
										{$objCommon->getImageForShowTop($site_title.0.domain_id,'bannerimage')}
										<div class="mainRhtBannerInnerBanner" {if $logoimages}style="background:url({$SITE_DOMAIN_IMAGES_URL}/{$logoimages});"{/if}>
											<a class="editbannerTxt theme4editimg" data-toggle="modal" href="#editBannerImg">
												{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
											</a>
											<a class="editbannerTxt" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
												{$LANG.slider_name} <i class="fa fa-caret-down"></i>
											</a>
											<div class="themewrapper3">
												<div class="mainRhtBannerInnerRight">
													<h2 class="mainRhtBannerInnerHead main_headline" style="{if $site_title.0.main_headline_font_style}font-family:{$site_title.0.main_headline_font_style};{/if}{if $site_title.0.main_headline_font_size}font-size:{$site_title.0.main_headline_font_size}px;{/if}{if $site_title.0.main_headline_line_size}line-height:{$site_title.0.main_headline_line_size}px;{/if}">
														<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="headlimit contentedit {if $site_title.0.heading_content eq ''}clickheretext contenttext{/if}" onblur="updateHeading('{$smarty.session.domain_id}')" >{if $site_title.0.heading_content}{$site_title.0.heading_content}{/if}</div>
													</h2>
													<div class="mainRhtBannerInnerDesc contentedit{if $site_title.0.heading_description eq ''} clickheretext contenttext{/if}" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onmouseout="updateDescriptionTitle('{$smarty.session.domain_id}')">{if $site_title.0.heading_description}{$site_title.0.heading_description}{/if}</div>
												</div>
											</div>
										</div>
									</div>
								{/if}
								{if $site_title.0.header_slider}
									<div class="mainRhtBannerInner clr">
										{$objCommon->getImageForBannerSlider($site_title.0.domain_id,'sliderimage')}
										<div class="slideBannerRel">
											<a class="slideeditbannerTxt" data-toggle="modal" href="#editBannerImg">
												{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
											</a>
											<a class="slideeditSlide" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
												{$LANG.slider_name} <i class="fa fa-caret-down"></i>
											</a>
											<div id="slider2" class="nivoSlider theme4Widt">
												 {section name="bannersliimg" loop="$sliderimages"}
													<div class="imageSlider">
														<img width="100%" height="300" src="{$SITE_DOMAIN_IMAGES_URL}/{$sliderimages[bannersliimg].image_name}">
												        <div class="slideimageInn">
                                                            <a onclick="deleteSliderBannerImage('{$sliderimages[bannersliimg].img_id}');" class="galleryimage"><i class="fa fa-trash-o"></i></a>
                                                            
                                                        </div>
                                                	</div>
												 {/section}
											</div>
										</div>
									</div>
								{/if}
							{elseif $smarty.session.themename eq 'theme7'}
								
								{if $site_title.0.header_banner eq 0 and $site_title.0.header_slider eq 0}
									<div class="mainRhtBannerInner">
										{$objCommon->getImageForShowTop($site_title.0.domain_id,'bannerimage')}
										<div class="mainRhtBannerInnerBanner" {if $logoimages}style="background:url({$SITE_DOMAIN_IMAGES_URL}/{$logoimages});"{/if}>
											<a class="editbannerTxt theme4editimg" data-toggle="modal" href="#editBannerImg">
												{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
											</a>
											<a class="editbannerTxt" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
												{$LANG.slider_name} <i class="fa fa-caret-down"></i>
											</a>
											<div class="themewrapper3">
												<div class="mainRhtBannerInnerRight">
													<h2 class="mainRhtBannerInnerHead main_headline" style="{if $site_title.0.main_headline_font_style}font-family:{$site_title.0.main_headline_font_style};{/if}{if $site_title.0.main_headline_font_size}font-size:{$site_title.0.main_headline_font_size}px;{/if}{if $site_title.0.main_headline_line_size}line-height:{$site_title.0.main_headline_line_size}px;{/if}">
														<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="headlimit contentedit {if $site_title.0.heading_content eq ''}clickheretext contenttext{/if}" onblur="updateHeading('{$smarty.session.domain_id}')" >{if $site_title.0.heading_content}{$site_title.0.heading_content}{/if}</div>
													</h2>
													<div class="mainRhtBannerInnerDesc contentedit{if $site_title.0.heading_description eq ''} clickheretext contenttext{/if}" id="headingdescription" contenteditable="true" data-ph="Açıklamayı Güncelle"  onmouseout="updateDescriptionTitle('{$smarty.session.domain_id}')">{if $site_title.0.heading_description}{$site_title.0.heading_description}{/if}</div>
												</div>
											</div>
										</div>
									</div>
								{/if}
								{if $site_title.0.header_banner}
									<div class="mainRhtBannerInner">
										{$objCommon->getImageForShowTop($site_title.0.domain_id,'bannerimage')}
										<div class="mainRhtBannerInnerBanner" {if $logoimages}style="background:url({$SITE_DOMAIN_IMAGES_URL}/{$logoimages});"{/if}>
											<a class="editbannerTxt theme4editimg" data-toggle="modal" href="#editBannerImg">
												{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
											</a>
											<a class="editbannerTxt" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
												{$LANG.slider_name} <i class="fa fa-caret-down"></i>
											</a>
											<div class="themewrapper3">
												<div class="mainRhtBannerInnerRight">
													<h2 class="mainRhtBannerInnerHead main_headline" style="{if $site_title.0.main_headline_font_style}font-family:{$site_title.0.main_headline_font_style};{/if}{if $site_title.0.main_headline_font_size}font-size:{$site_title.0.main_headline_font_size}px;{/if}{if $site_title.0.main_headline_line_size}line-height:{$site_title.0.main_headline_line_size}px;{/if}">
														<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="headlimit contentedit {if $site_title.0.heading_content eq ''}clickheretext contenttext{/if}" onblur="updateHeading('{$smarty.session.domain_id}')" >{if $site_title.0.heading_content}{$site_title.0.heading_content}{/if}</div>
													</h2>
													<div class="mainRhtBannerInnerDesc contentedit{if $site_title.0.heading_description eq ''} clickheretext contenttext{/if}" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onmouseout="updateDescriptionTitle('{$smarty.session.domain_id}')">{if $site_title.0.heading_description}{$site_title.0.heading_description}{/if}</div>
												</div>
											</div>
										</div>
									</div>
								{/if}
								{if $site_title.0.header_slider}
									<div class="mainRhtBannerInner clr">
										{$objCommon->getImageForBannerSlider($site_title.0.domain_id,'sliderimage')}
										<div class="slideBannerRel">
											<a class="slideeditbannerTxt" data-toggle="modal" href="#editBannerImg">
												{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
											</a>
											<a class="slideeditSlide" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
												{$LANG.slider_name} <i class="fa fa-caret-down"></i>
											</a>
											<div id="slider2" class="nivoSlider theme4Widt">
												 {section name="bannersliimg" loop="$sliderimages"}
													<div class="imageSlider">
														<img width="100%" height="300" src="{$SITE_DOMAIN_IMAGES_URL}/{$sliderimages[bannersliimg].image_name}">
													    <div class="slideimageInn">
                                                            <a onclick="deleteSliderBannerImage('{$sliderimages[bannersliimg].img_id}');" class="galleryimage"><i class="fa fa-trash-o"></i></a>
                                                            
                                                        </div>
                                                    </div>
												 {/section}
											</div>
										</div>
									</div>
								{/if}
							
							{elseif $smarty.session.themename eq 'theme8'}
								
								{if $site_title.0.header_banner eq 0 and $site_title.0.header_slider eq 0}
									<div class="mainRhtBannerInner">
										{$objCommon->getImageForShowTop($site_title.0.domain_id,'bannerimage')}
										<div class="MainLftBannerBg">
											<div class="mainRhtBannerInnerBanner" {if $logoimages}style="background:url({$SITE_DOMAIN_IMAGES_URL}/{$logoimages});"{/if}>
												<a class="editbannerTxt theme4editimg" data-toggle="modal" href="#editBannerImg">
													{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
												</a>
												<a class="editbannerTxt" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
													{$LANG.slider_name} <i class="fa fa-caret-down"></i>
												</a>
											</div>
										</div>
										
										<div class="themewrapper3">
											<div class="mainRhtBannerInnerRight">
												<h2 class="mainRhtBannerInnerHead main_headline" style="{if $site_title.0.main_headline_font_style}font-family:{$site_title.0.main_headline_font_style};{/if}{if $site_title.0.main_headline_font_size}font-size:{$site_title.0.main_headline_font_size}px;{/if}{if $site_title.0.main_headline_line_size}line-height:{$site_title.0.main_headline_line_size}px;{/if}">
													<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="contentedit {if $site_title.0.heading_content eq ''}clickheretext contenttext{/if}" onblur="updateHeading('{$smarty.session.domain_id}')" >{if $site_title.0.heading_content}{$site_title.0.heading_content}{/if}</div>
												</h2>
												<div class="mainRhtBannerInnerDesc contentedit{if $site_title.0.heading_description eq ''} clickheretext contenttext{/if}" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onmouseout="updateDescriptionTitle('{$smarty.session.domain_id}')">{if $site_title.0.heading_description}{$site_title.0.heading_description}{/if}</div>
											</div>
										</div>
									</div>
								{/if}
								{if $site_title.0.header_banner}
									<div class="mainRhtBannerInner">
										{$objCommon->getImageForShowTop($site_title.0.domain_id,'bannerimage')}
										<div class="MainLftBannerBg">
											<div class="mainRhtBannerInnerBanner" {if $logoimages}style="background:url({$SITE_DOMAIN_IMAGES_URL}/{$logoimages});"{/if}>
											</div>
											<a class="editbannerTxt theme4editimg" data-toggle="modal" href="#editBannerImg">
												{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
											</a>
											<a class="editbannerTxt" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
												{$LANG.slider_name} <i class="fa fa-caret-down"></i>
											</a>
										</div>
										<div class="themewrapper3">
											<div class="mainRhtBannerInnerRight">
												<h2 class="mainRhtBannerInnerHead main_headline" style="{if $site_title.0.main_headline_font_style}font-family:{$site_title.0.main_headline_font_style};{/if}{if $site_title.0.main_headline_font_size}font-size:{$site_title.0.main_headline_font_size}px;{/if}{if $site_title.0.main_headline_line_size}line-height:{$site_title.0.main_headline_line_size}px;{/if}">
													<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="headlimit contentedit {if $site_title.0.heading_content eq ''}clickheretext contenttext{/if}" onblur="updateHeading('{$smarty.session.domain_id}')" >{if $site_title.0.heading_content}{$site_title.0.heading_content}{/if}</div>
												</h2>
												<div class="mainRhtBannerInnerDesc contentedit{if $site_title.0.heading_description eq ''} clickheretext contenttext{/if}" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onmouseout="updateDescriptionTitle('{$smarty.session.domain_id}')">{if $site_title.0.heading_description}{$site_title.0.heading_description}{/if}</div>
											</div>
										</div>
									</div>
								{/if}
								{if $site_title.0.header_slider}
									<div class="mainRhtBannerInner clr">
										{$objCommon->getImageForBannerSlider($site_title.0.domain_id,'sliderimage')}
										<div class="slideBannerRel">
											<a class="slideeditbannerTxt" data-toggle="modal" href="#editBannerImg">
												{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
											</a>
											<a class="slideeditSlide" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
												{$LANG.slider_name} <i class="fa fa-caret-down"></i>
											</a>
											<div id="slider2" class="nivoSlider theme4Widt">
												 {section name="bannersliimg" loop="$sliderimages"}
													<div class="imageSlider">
														<img width="100%" height="300" src="{$SITE_DOMAIN_IMAGES_URL}/{$sliderimages[bannersliimg].image_name}">
													    <div class="slideimageInn">
                                                            <a onclick="deleteSliderBannerImage('{$sliderimages[bannersliimg].img_id}');" class="galleryimage"><i class="fa fa-trash-o"></i></a>
                                                            
                                                        </div>
                                                    </div>
												 {/section}
											</div>
										</div>
									</div>
								{/if}
								{elseif $smarty.session.themename eq 'theme9'}
								
								{if $site_title.0.header_banner eq 0 and $site_title.0.header_slider eq 0}
									<div class="mainRhtBannerInner">
										{$objCommon->getImageForShowTop($site_title.0.domain_id,'bannerimage')}
										<div class="MainLftBannerBg">
											<div class="mainRhtBannerInnerBanner" {if $logoimages}style="background:url({$SITE_DOMAIN_IMAGES_URL}/{$logoimages});"{/if}>
												<a class="editbannerTxt theme4editimg" data-toggle="modal" href="#editBannerImg">
													{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
												</a>
												<a class="editbannerTxt" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
													{$LANG.slider_name} <i class="fa fa-caret-down"></i>
												</a>
											</div>
										</div>
										
										<div class="themewrapper3">
											<div class="mainRhtBannerInnerRight">
												<h2 class="mainRhtBannerInnerHead main_headline" style="{if $site_title.0.main_headline_font_style}font-family:{$site_title.0.main_headline_font_style};{/if}{if $site_title.0.main_headline_font_size}font-size:{$site_title.0.main_headline_font_size}px;{/if}{if $site_title.0.main_headline_line_size}line-height:{$site_title.0.main_headline_line_size}px;{/if}">
													<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="headlimit contentedit {if $site_title.0.heading_content eq ''}clickheretext contenttext{/if}" onblur="updateHeading('{$smarty.session.domain_id}')" >{if $site_title.0.heading_content}{$site_title.0.heading_content}{/if}</div>
												</h2>
												<div class="mainRhtBannerInnerDesc contentedit{if $site_title.0.heading_description eq ''} clickheretext contenttext{/if}" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onmouseout="updateDescriptionTitle('{$smarty.session.domain_id}')">{if $site_title.0.heading_description}{$site_title.0.heading_description}{/if}</div>
											</div>
										</div>
									</div>
								{/if}
								{if $site_title.0.header_banner}
									<div class="mainRhtBannerInner">
										{$objCommon->getImageForShowTop($site_title.0.domain_id,'bannerimage')}
										<div class="MainLftBannerBg">
											<div class="mainRhtBannerInnerBanner" {if $logoimages}style="background:url({$SITE_DOMAIN_IMAGES_URL}/{$logoimages});"{/if}>
											</div>
											<a class="editbannerTxt theme4editimg" data-toggle="modal" href="#editBannerImg">
												{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
											</a>
											<a class="editbannerTxt" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
												{$LANG.slider_name} <i class="fa fa-caret-down"></i>
											</a>
										</div>
										<div class="themewrapper3">
											<div class="mainRhtBannerInnerRight">
												<h2 class="mainRhtBannerInnerHead main_headline" style="{if $site_title.0.main_headline_font_style}font-family:{$site_title.0.main_headline_font_style};{/if}{if $site_title.0.main_headline_font_size}font-size:{$site_title.0.main_headline_font_size}px;{/if}{if $site_title.0.main_headline_line_size}line-height:{$site_title.0.main_headline_line_size}px;{/if}">
													<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="headlimit contentedit {if $site_title.0.heading_content eq ''}clickheretext contenttext{/if}" onblur="updateHeading('{$smarty.session.domain_id}')" >{if $site_title.0.heading_content}{$site_title.0.heading_content}{/if}</div>
												</h2>
												<div class="mainRhtBannerInnerDesc contentedit{if $site_title.0.heading_description eq ''} clickheretext contenttext{/if}" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onmouseout="updateDescriptionTitle('{$smarty.session.domain_id}')">{if $site_title.0.heading_description}{$site_title.0.heading_description}{/if}</div>
											</div>
										</div>
									</div>
								{/if}
								{if $site_title.0.header_slider}
									<div class="mainRhtBannerInner clr">
										{$objCommon->getImageForBannerSlider($site_title.0.domain_id,'sliderimage')}
										<div class="slideBannerRel">
											<a class="slideeditbannerTxt" data-toggle="modal" href="#editBannerImg">
												{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
											</a>
											<a class="slideeditSlide" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
												{$LANG.slider_name} <i class="fa fa-caret-down"></i>
											</a>
											<div id="slider2" class="nivoSlider theme4Widt">
												 {section name="bannersliimg" loop="$sliderimages"}
													<div class="imageSlider">
														<img width="100%" height="300" src="{$SITE_DOMAIN_IMAGES_URL}/{$sliderimages[bannersliimg].image_name}">
													    <div class="slideimageInn">
                                                            <a onclick="deleteSliderBannerImage('{$sliderimages[bannersliimg].img_id}');" class="galleryimage"><i class="fa fa-trash-o"></i></a>
                                                            
                                                        </div>
                                                    </div>
												 {/section}
											</div>
										</div>
									</div>
								{/if}
							{else}
								<div class="mainRhtBannerInner">
									{if $site_title.0.header_banner eq 0 and $site_title.0.header_slider eq 0}
										{$objCommon->getImageForShowTop($site_title.0.domain_id,'bannerimage')}
										<div class="mainRhtBannerInnerBanner" {if $logoimages}style="background:url({$SITE_DOMAIN_IMAGES_URL}/{$logoimages});"{/if}>
											<a class="editbannerTxt" data-toggle="modal" href="#editBannerImg">
												{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
											</a>
											
											<a class="editbannerTxt" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
												{$LANG.slider_name} <i class="fa fa-caret-down"></i>
											</a>
											<div class="themewrapper3">
												<div class="mainRhtBannerInnerRight">
													<input type="hidden" value="" class="headlimitInput" />
													<h2 class="mainRhtBannerInnerHead main_headline" style="{if $site_title.0.main_headline_font_style}font-family:{$site_title.0.main_headline_font_style};{/if}{if $site_title.0.main_headline_font_size}font-size:{$site_title.0.main_headline_font_size}px;{/if}{if $site_title.0.main_headline_line_size}line-height:{$site_title.0.main_headline_line_size}px;{/if}">
														<div id="headingContent" contenteditable="true" data-ph="Edit Headline Here"  class="headlimit contentedit {if $site_title.0.heading_content eq ''}clickheretext contenttext{/if}" onblur="updateHeading('{$smarty.session.domain_id}')" >{if $site_title.0.heading_content}{$site_title.0.heading_content}{/if}</div>
													</h2>
													<div class="mainRhtBannerInnerDesc contentedit{if $site_title.0.heading_description eq ''} clickheretext contenttext{/if}" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onmouseout="updateDescriptionTitle('{$smarty.session.domain_id}')" style="{if $site_title.0.site_title_font_style}font-family:{$site_title.0.site_title_font_style};{/if}{if $site_title.0.site_title_font_size}font-size:{$site_title.0.site_title_font_size}px;{/if}{if $site_title.0.site_title_line_size}line-height:{$site_title.0.site_title_line_size}px;{/if}">{if $site_title.0.heading_description}{$site_title.0.heading_description}{/if}</div>
                                                </div>
											</div>
										</div>
									{/if}
									{if $site_title.0.header_banner}
										{$objCommon->getImageForShowTop($site_title.0.domain_id,'bannerimage')}
										<div class="mainRhtBannerInnerBanner" {if $logoimages}style="background:url({$SITE_DOMAIN_IMAGES_URL}/{$logoimages});"{/if}>
											<a class="editbannerTxt" data-toggle="modal" href="#editBannerImg">
												{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
											</a>
											
											<a class="editbannerTxt" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
												{$LANG.slider_name} <i class="fa fa-caret-down"></i>
											</a>
											<div class="themewrapper3">
												<div class="mainRhtBannerInnerRight">
													<h2 class="mainRhtBannerInnerHead main_headline" style="{if $site_title.0.main_headline_font_style}font-family:{$site_title.0.main_headline_font_style};{/if}{if $site_title.0.main_headline_font_size}font-size:{$site_title.0.main_headline_font_size}px;{/if}{if $site_title.0.main_headline_line_size}line-height:{$site_title.0.main_headline_line_size}px;{/if}">
														<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="headlimit contentedit {if $site_title.0.heading_content eq ''}clickheretext contenttext{/if}" onblur="updateHeading('{$smarty.session.domain_id}')" >{if $site_title.0.heading_content}{$site_title.0.heading_content}{/if}</div>
													</h2>
													<div class="mainRhtBannerInnerDesc contentedit{if $site_title.0.heading_description eq ''} clickheretext contenttext{/if}" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onmouseout="updateDescriptionTitle('{$smarty.session.domain_id}')">{if $site_title.0.heading_description}{$site_title.0.heading_description}{/if}</div>
												</div>
											</div>
										</div>
									{/if}
									{if $site_title.0.header_slider}
										{$objCommon->getImageForBannerSlider($site_title.0.domain_id,'sliderimage')}
										<div class="slideBannerRel hoverSlide">
											<a class="slideeditbannerTxt" data-toggle="modal" href="#editBannerImg">
												{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
											</a>
											<a class="slideeditSlide" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
												{$LANG.slider_name} <i class="fa fa-caret-down"></i>
											</a>
											<div id="slider2" class="nivoSlider widt860">
												 {section name="bannersliimg" loop="$sliderimages"}
													<div class="imageSlider">
														<img width="100%" height="300" src="{$SITE_DOMAIN_IMAGES_URL}/{$sliderimages[bannersliimg].image_name}">
                                                        <div class="slideimageInn">
                                                            <a onclick="deleteSliderBannerImage('{$sliderimages[bannersliimg].img_id}');" class="galleryimage"><i class="fa fa-trash-o"></i></a>
                                                            
                                                        </div>
													</div>
                                                    
												 {/section}
											</div>
                                        </div>
									{/if}
								</div>
							{/if}
							</div>
						</div>
					</div>
				{/if}
			</div>
		</div>
		{if $smarty.session.storeonuse}
			<div class="themeRightSepOuter">
			
				<div class="themeRightSep storeBannerShow" {if $smarty.session.pagename eq 'Store'}style="display:none;"{/if}>
						<div class="mainRhtBanner clearfix">
							<div class="mainRhtBannerInner">
									{if $site_title.0.header_banner eq 0 and $site_title.0.header_slider eq 0}
										{$objCommon->getImageForShowTop($site_title.0.domain_id,'bannerimage')}
										<div class="mainRhtBannerInnerBanner" {if $logoimages}style="background:url({$SITE_DOMAIN_IMAGES_URL}/{$logoimages});"{/if}>
											<a class="editbannerTxt" data-toggle="modal" href="#editBannerImg">
												{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
											</a>
											
											<a class="editbannerTxt" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
												{$LANG.slider_name} <i class="fa fa-caret-down"></i>
											</a>
											<div class="themewrapper3">
												<div class="mainRhtBannerInnerRight">
													<h2 class="mainRhtBannerInnerHead main_headline" style="{if $site_title.0.main_headline_font_style}font-family:{$site_title.0.main_headline_font_style};{/if}{if $site_title.0.main_headline_font_size}font-size:{$site_title.0.main_headline_font_size}px;{/if}{if $site_title.0.main_headline_line_size}line-height:{$site_title.0.main_headline_line_size}px;{/if}">
														<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="headlimit contentedit {if $site_title.0.heading_content eq ''}clickheretext contenttext{/if}" onblur="updateHeading('{$smarty.session.domain_id}')" >{if $site_title.0.heading_content}{$site_title.0.heading_content}{/if}</div>
													</h2>
													<div class="mainRhtBannerInnerDesc contentedit{if $site_title.0.heading_description eq ''} clickheretext contenttext{/if}" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onmouseout="updateDescriptionTitle('{$smarty.session.domain_id}')">{if $site_title.0.heading_description}{$site_title.0.heading_description}{/if}</div>
												</div>
											</div>
										</div>
									{/if}
									{if $site_title.0.header_banner}
										{$objCommon->getImageForShowTop($site_title.0.domain_id,'bannerimage')}
										<div class="mainRhtBannerInnerBanner" {if $logoimages}style="background:url({$SITE_DOMAIN_IMAGES_URL}/{$logoimages});"{/if}>
											<a class="editbannerTxt" data-toggle="modal" href="#editBannerImg">
												{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
											</a>
											
											<a class="editbannerTxt" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
												{$LANG.slider_name} <i class="fa fa-caret-down"></i>
											</a>
											<div class="themewrapper3">
												<div class="mainRhtBannerInnerRight">
													<h2 class="mainRhtBannerInnerHead main_headline" style="{if $site_title.0.main_headline_font_style}font-family:{$site_title.0.main_headline_font_style};{/if}{if $site_title.0.main_headline_font_size}font-size:{$site_title.0.main_headline_font_size}px;{/if}{if $site_title.0.main_headline_line_size}line-height:{$site_title.0.main_headline_line_size}px;{/if}">
														<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="headlimit contentedit {if $site_title.0.heading_content eq ''}clickheretext contenttext{/if}" onblur="updateHeading('{$smarty.session.domain_id}')" >{if $site_title.0.heading_content}{$site_title.0.heading_content}{/if}</div>
													</h2>
													<div class="mainRhtBannerInnerDesc contentedit{if $site_title.0.heading_description eq ''} clickheretext contenttext{/if}" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onmouseout="updateDescriptionTitle('{$smarty.session.domain_id}')">{if $site_title.0.heading_description}{$site_title.0.heading_description}{/if}</div>
												</div>
											</div>
										</div>
									{/if}
									{if $site_title.0.header_slider}
										{$objCommon->getImageForBannerSlider($site_title.0.domain_id,'sliderimage')}
										<div class="slideBannerRel hoverSlide">
											<a class="slideeditbannerTxt" data-toggle="modal" href="#editBannerImg">
												{$LANG.edit_image_name} <i class="fa fa-caret-down"></i>
											</a>
											<a class="slideeditSlide" data-toggle="modal" {if $subsdetails.0.subs_monthly_date  le $current_date}href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}"{else}href="#sliderBannerImg"{/if}>
												{$LANG.slider_name} <i class="fa fa-caret-down"></i>
											</a>
											<div id="slider2" class="nivoSlider widt860">
												 {section name="bannersliimg" loop="$sliderimages"}
													<div class="imageSlider">
														<img width="100%" height="300" src="{$SITE_DOMAIN_IMAGES_URL}/{$sliderimages[bannersliimg].image_name}">
                                                        <div class="slideimageInn">
                                                            <a onclick="deleteSliImg('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','{$images[sliimg].slider_id}','{$images[sliimg].slider_images}');" class="galleryimage"><i class="fa fa-trash-o"></i></a>
                                                            
                                                        </div>
													</div>
												 {/section}
											</div>
                                            <a data-toggle="modal" class="hoverSlideShow" href="#slimgpopup_{$pagefirstlist[pagelist].pagelist}">
                                                {$LANG.add_image_name}
                                             </a>
										</div>
									{/if}
								</div>
						</div>
					</div>
			</div>
			{if $smarty.session.themename neq 'store3'}
				{if $smarty.session.themename neq 'store2'}
					<div class="themeRightSep">
						<div class="mainRhtBannerInner replaceStoreBg paddRound20 clearfix" id="replaceStore">
									{if $smarty.session.page_id}
										{if $objCommon->getStoreComment($smarty.session.page_id)}
											<div class="StoreHoverEdit">
												<div class="StoreHoverEditLeft"></div>
												<div class="StoreHoverEditContent">
													<a class="storeButton storeMainAdd" onclick="commonToogle('storepage');showStorePage('{$smarty.session.domain_id}');">Add Product</a>
												</div>
												<div class="StoreHoverEditRight"></div>
											</div>
										{/if}
									{/if}
										{*=====Store  and their function starts======*}
											{if $smarty.session.page_id}
												{if $objCommon->getStoreComment($smarty.session.page_id)}
												<!----for list categories and its images start------>
												<div class="storeMainPageHead"><span>Category</span></div>
													<div class="storeMainPage">
														{$objCommon->getCategories($smarty.session.domain_id)}
														{section name="cat" loop="$categories"}
															{$objCommon->getCategoriesImages($categories[cat].store_cat_id,$categories[cat].domain_id)}
															<a class="storeMainPageInner span4 {if $smarty.section.cat.index eq '3'} offset0 {/if}" onclick="return showAllCorrsProducts('{$categories[cat].store_cat_id}','{$categories[cat].domain_id}');">
															
																{if $categoriesImages}
																	<img src="{$SITE_CAT_IMAGES_URL}/{$categoriesImages}" alt="category images" width="100%" height="235">
																{else}
																	<img src="{$SITE_BASEURL}/images/blank-category.png" alt="Categories images" width="100%" height="235">
																{/if}
																{if $categories[cat].cat_name}<div class="storeMainPageInnerDetails">{$categories[cat].cat_name}</div>{/if}
															</a>
														{/section}
													</div>
													<div class="clr"></div>
												<!----for list categories and its images end------>
												<div class="storeMainPageHead marTop20"><span>Product</span></div>
												<!----for list categories and its images start------>
												<div class="storeMainPageProduct">
                                                    {*$objCommon->getStoreBasicValue($smarty.session.domain_id)*} 
													{$objCommon->getProducts($smarty.session.domain_id)}                                                    
													{section name="prod" loop="$productsListInCatPage"}
														<a class="storeMainPageProductInner span3 {if $smarty.section.prod.index eq  '4'} offset0 {/if}" onclick="showProductViewPage('{$productsListInCatPage[prod].product_id}','{$productsListInCatPage[prod].domain_id}');">
															{$objCommon->getProductsImages($productsListInCatPage[prod].product_id,$productsListInCatPage[prod].domain_id)}
															{if !empty($pro_images)}
																<img src="{$SITE_PRODUCT_IMAGES_URL}/{$pro_images}" alt="Product images" width="200" height="200">
															{else}
																<img src="{$SITE_BASEURL}/images/blank-product.png" alt="Product images" width="200" height="200">
															{/if}
															<div class="procutName">{if $productsListInCatPage[prod].product_name} {$productsListInCatPage[prod].product_name}{/if}</div>
															{if $productsListInCatPage[prod].sale_price eq ''}	 
															<span>{if $productsListInCatPage[prod].price}{$symbol}{$productsListInCatPage[prod].price}{/if}</span>
															{else}
															<span class="proctPrice">{if $productsListInCatPage[prod].price}{$symbol}{$productsListInCatPage[prod].price}{/if}</span>
															<span class="proctSalePrice">{if $productsListInCatPage[prod].sale_price}{$symbol}{$productsListInCatPage[prod].sale_price}{/if}</span>
															{/if}
														</a>
													{sectionelse}
														<div class="RecNone">YOUR STORE IS EMPTY</div>
														<div class="RecNone" onclick="commonToogle('storepage'); showStorePage('{$smarty.session.domain_id}'); showProductList('{$smarty.session.domain_id}'); showActiveClass('products'); ">Add Product</div>
	
													{/section}
												</div>
												<!----for list categories and its images end------>
												{/if}	
											{/if}
												
											{*====Store and their Function are ends===*}
										</div>
					</div>
				{/if}
			{/if}
		{/if}						
		<div class="blogPageInner">
			<div class="blogPageInnerBg blogPageThemeBg">
				<div class="blogwrapper1 blogwrapper2 theme4Wrapper blog2wrapper">
					{if $smarty.session.themename eq 'store2' OR $smarty.session.themename eq 'store3'}
						{if $smarty.session.storeonuse}
							<div class="themeRightSep">
								<div class="mainRhtBannerInner replaceStoreBg paddRound20 clearfix" id="replaceStore">
								{if $smarty.session.page_id}
									{if $objCommon->getStoreComment($smarty.session.page_id)}
										<div class="StoreHoverEdit">
											<div class="StoreHoverEditLeft"></div>
											<div class="StoreHoverEditContent">
												<!--<a class="storeButton">Edit Storefront</a>-->
												<a class="storeButton storeMainAdd" onclick="commonToogle('storepage');showStorePage('{$smarty.session.domain_id}');">Add Product</a>
											</div>
											<div class="StoreHoverEditRight"></div>
										</div>
									{/if}
								{/if}
									{*=====Store  and their function starts======*}
										{if $smarty.session.page_id}
											{if $objCommon->getStoreComment($smarty.session.page_id)}
											<!----for list categories and its images start------>
											<div class="storeMainPageHead"><span>Category</span></div>
												<div class="storeMainPage">
													{$objCommon->getCategories($smarty.session.domain_id)}
													{section name="cat" loop="$categories"}
														{$objCommon->getCategoriesImages($categories[cat].store_cat_id,$categories[cat].domain_id)}
														<a class="storeMainPageInner span4 {if $smarty.section.cat.index eq '3'} offset0 {/if}" onclick="return showAllCorrsProducts('{$categories[cat].store_cat_id}','{$categories[cat].domain_id}');">
														
															{if $categoriesImages}
																<img src="{$SITE_CAT_IMAGES_URL}/{$categoriesImages}" alt="category images" width="100%" height="235">
															{else}
																<img src="{$SITE_BASEURL}/images/blank-category.png" alt="Categories images" width="100%" height="235">
															{/if}
															{if $categories[cat].cat_name}<div class="storeMainPageInnerDetails">{$categories[cat].cat_name}</div>{/if}
														</a>
													{sectionelse}
														<div class="RecNone">No records found</div>
													{/section}
												</div>
												<div class="clr"></div>
											<!----for list categories and its images end------>
											<div class="storeMainPageHead marTop20"><span>Product</span></div>
											<!----for list categories and its images start------>
											<div class="storeMainPageProduct">
												{$objCommon->getProducts($smarty.session.domain_id)}
												{section name="prod" loop="$productsListInCatPage"}
													<div class="storeMainPageProductInner span3 {if $smarty.section.prod.index eq  '4'} offset0 {/if}" onclick="showProductViewPage('{$productsListInCatPage[prod].product_id}','{$productsListInCatPage[prod].domain_id}');">
														{$objCommon->getProductsImages($productsListInCatPage[prod].product_id,$productsListInCatPage[prod].domain_id)}
														{if !empty($pro_images)}
															<img src="{$SITE_PRODUCT_IMAGES_URL}/{$pro_images}" alt="Product images" width="200" height="200">
														{else}
															<img src="{$SITE_BASEURL}/images/blank-product.png" alt="Product images" width="200" height="200">
														{/if}
														<div class="procutName">{if $productsListInCatPage[prod].product_name} {$productsListInCatPage[prod].product_name} {/if}</div>
														{if $productsListInCatPage[prod].sale_price eq ''}	 
															<span>{if $productsListInCatPage[prod].price}{$productsListInCatPage[prod].price}{/if}</span>
															{else}
															<span class="proctPrice">{if $productsListInCatPage[prod].price}{$productsListInCatPage[prod].price}{/if}</span>
															<span class="proctSalePrice">{if $productsListInCatPage[prod].sale_price}{$productsListInCatPage[prod].sale_price}{/if}</span>
														{/if}
													</div>
												{sectionelse}
													<div class="RecNone">No records found</div>
												{/section}
											</div>
											<!----for list categories and its images end------>
											{/if}	
										{/if}
											
										{*====Store and their Function are ends===*}
									</div>
							</div>
						{/if}
					{/if}	
					<div id="toolbar" style="display:none;"></div>
					<div class="blogPageBgInnerTop"><div class="fireworkImg"></div></div>
                    
               
                    
					<div id="pagelist" class="blogPageBgInner themewrapper1 blogPageBgInnerMiddle blogPageBgInnerMiddleSec clearfix">
						<div class="themewrapper2BgAlign" >
							<div id="rightColumn" class="clearfix"> 
								{*=====Blog and their function ======*}
								{if $smarty.session.page_id}
									{if $objCommon->getBlogComment($smarty.session.page_id)}
										{if $smarty.session.blogonuse }
											
											<ul id="">
												<li class="">
													<div class="blogInner">
														<div class="blogLeft">
															<div class="blogPageBgInnerTab blogPageBgInnerTab4">
																<a class="active BlogNewPost" onclick="return AddTitlePopup('{$smarty.session.domain_id}');">{$LANG.main_blog_newpost}</a>
																{$objCommon->getDraftsDetails($smarty.session.domain_id)}
																{if !empty($drafts_list)}
																	<a class="BlogNewPost" onclick="commonForOption('{$smarty.session.domain_id}','drafts_id')">{$LANG.user_drafts}({$drafts_list|@count})</a>
																{/if}		
																<a data-toggle="modal" href="#myModalBlogComment" onclick="getAllTheComments('{$smarty.session.domain_id}');">{$LANG.main_blog_comments}</a>
																<a data-toggle="modal" href="#myModalBlogSetting" onclick="ShowPassChangeColumn('settingblog','postblog','commentblogid');">{$LANG.main_blog_setting}</a>
															</div>
															{*==drafts list small popup==*}
															<div class="BlogNewPostPopup">
																<div id='drafts_id'></div>
															</div>
															{*==drafts list small popup==*}	
															
															<div id="postblog" style="display:block">
																<div id="showPost">
																	{include file="listPost.tpl"}
																</div>	
																{*---popup for  add title--*}		
																<div class="BlogNewPostPopup">			
																	<div id="popaddtitle" style="display:none">								
																	</div>
																</div>
																<div class="blogMask"></div>
																{*---popup for  add title--*}
																{*----newtitle ends---*}
																
																{*---popup for edit   title--*}		
																<div id="myModalBlogEditPost" class="BlogNewPostPopup">			
																	 
																</div>
																{*---popup for edit   title--*}
																{*----newtitle ends---*}
																
															</div>
															<div id="showeditpost" style="display:none;">
																{include file="addtitle.tpl"}
															</div>
															
															<div id="modals">
																<div id="myModalBlogComment" class="modal addCatPopWidt hide modelPopContLogin fade loginPopMar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">			
																	<div id="commentblogid" style="display:none">
																		{include file="blockpopupcomment.tpl"}				
																	</div>
																</div>
															</div>
															
															<div id="modals">
																<div id="myModalBlogSetting" class="modal hide addCatPopWidt fade loginPopMar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">			
																	<div id="settingblog" style="display:none">
																		<div class="headBgTop">
																			{$LANG.main_blog_setting}
																			<div class="pull-right curPoint" data-dismiss="modal" aria-hidden="true">X</div>
																		</div>
																		<div class="popaddTitle clearfix">
																			<form name="blogsettingform" class="form-horizontal no-mar sky-form" id="blogsettingform" method="post" action="">
																			<input type="hidden" name="domain_id" id="domain_id" value="{$smarty.session.domain_id}">					
																			<input type="hidden" name="action" id="action" value="updateBlogSetting">
																				<ul class="offset0">
																					<li class="control-group">	
																						<div class="control-label">
																							<label>{$LANG.main_common_default}</label>
																						</div>
																						<div class="controls">
																							<label class="select">
																								<select name="commentdefault">
																									<option value="{$LANG.main_blog_close}" {if $blogsetting_list.0.comment_default eq $LANG.main_blog_close} selected="selected" {/if} >{$LANG.main_blog_close}</option>
																									<option value="{$LANG.main_blog_open}" {if $blogsetting_list.0.comment_default eq $LANG.main_blog_open} selected="selected" {/if}>{$LANG.main_blog_open}</option>
																									<option value="{$LANG.main_blog_require}" {if $blogsetting_list.0.comment_default eq $LANG.main_blog_require} selected="selected" {/if} >{$LANG.main_blog_require}</option>
																								</select>
																								<i></i>
																							</label>
																						</div>
																					</li>
																					<li class="control-group">	
																						<div class="control-label">
																							<label>{$LANG.main_blog_post}</label>
																						</div>
																						<div class="controls">
																							<label class="select">
																								<select name="postperpage">
																									 {section name=foo start=1 loop=51}
																										<option value="{$smarty.section.foo.index}" {if $blogsetting_list.0.post_perpage eq  $smarty.section.foo.index }selected="selected"{/if}>{$smarty.section.foo.index}</option>
																									 {/section}
																								</select>
																								<i></i>
																							</label>
																						</div>
																					</li>
																					<li class="control-group">	
																						<div class="control-label">
																							<label>{$LANG.main_blog_notify}</label>
																						</div>
																						<div class="controls">
																							<label class="select">
																								<select name="notifyme">
																									<option value="{$LANG.main_blog_yes}" {if $blogsetting_list.0.notifyme eq $LANG.main_blog_yes} selected="selected" {/if}>{$LANG.main_blog_yes}</option>
																									<option value="{$LANG.main_blog_no}" {if $blogsetting_list.0.notifyme eq $LANG.main_blog_no} selected="selected" {/if}>{$LANG.main_blog_no}</option>
																								</select>
																								<i></i>
																							</label>
																							<div class="dc"><span class="txtBoxBlogPop_at">at</span></div>
																							<input class="txtBoxBlogPopComment" type="text" name="notifyme_email" id="notifyme_email" value="{$blogsetting_list.0.notifyme_email}" placeholder="{$LANG.main_notiyemail}">
																						</div>
																					</li>
																					<li class="control-group">	
																						<div class="control-label">
																							<label>{$LANG.main_blog_autocomment}</label>
																						</div>
																						<div class="controls">
																							<label class="select">
																								<select name="automaticallyclose">
																									<option value="{$LANG.main_blog_never}" {if $blogsetting_list.0.automaticallyclose  eq $LANG.main_blog_never} selected="selected" {/if}>{$LANG.main_blog_never}</option>
																									<option value="{$LANG.main_blog_afterthird}" {if $blogsetting_list.0.automaticallyclose  eq $LANG.main_blog_afterthird} selected="selected" {/if}>{$LANG.main_blog_afterthird}</option>
																									<option value="{$LANG.main_blog_aftersix}" {if $blogsetting_list.0.automaticallyclose  eq $LANG.main_blog_aftersix} selected="selected" {/if}>{$LANG.main_blog_aftersix}</option>
																									<option value="{$LANG.main_blog_afternine}" {if $blogsetting_list.0.automaticallyclose  eq $LANG.main_blog_afternine} selected="selected" {/if}>{$LANG.main_blog_afternine}</option>
																								</select>
																								<i></i>
																							</label>
																						</div>
																					</li>
																					<li class="control-group">	
																						<div class="control-label">
																							<label>{$LANG.main_blog_share_but}</label>
																						</div>
																						<div class="controls">
																							<input class="no-mar" type="checkbox" name="sharebutton" id="sharebutton" value="1" {if $blogsetting_list.0.sharebutton eq '1'}checked{/if}> {$LANG.main_blog_share}
																						</div>
																					</li>
																				</ul>
																				<input type="button" name="updatesetting" class="btn btn-info pull-right" id="updatesetting" onclick="updateBlogSetting();" value="{$LANG.main_save}">
																			</form>	
																		</div>
																	</div>
																</div>
															</div>
																
															
														</div>
														<div class="blogRight">	
															<div class="blogRhtInner">
																{*==author and archives column starts==*}
																{*<div class="popaddTitleHead"><div class="popaddTitleHeadBg"><div class="popaddTitleHeadBgCol">{$LANG.user_blog_author}</div></div></div>*}
																<div id="author_id" class="authorTxtBg">
																	{include file="authorBlog.tpl"}
																</div>
															{*	<div class="popaddTitleHead marTop10"><div class="popaddTitleHeadBg"><div class="popaddTitleHeadBgCol">{$LANG.user_blog_archives}</div></div></div>*}
																<div id="archives_id" class="achiverTxtBg clearfix">
																	
																	{include file="archivesBlog.tpl"}
																	
																</div>
																<div class="authCont">{$smarty.now|date_format:'%b %d, %Y'|utf8_encode}</div>
																<div id="cat_id" class="CatBg">
																	{include file="categoriesBlog.tpl"}
																</div>
																	<div class="userList">
																		{$objCommon->selectCat()}
																			<a onclick="return selectPostBasdCat('{$cate[category].cat_id}');"><div class="authCont">{$LANG.all_categories}</div> </a>
																		 {section name="category" loop="$cate"}
																			<a onclick="return selectPostBasdCat('{$cate[category].cat_id}');"> <div class="authCont">{$cate[category].cat_name}</div> </a>
																		 {/section}
																	</div>
																	{*==author and archives column starts==*}
																
															</div>
														</div>
													</div>
												</li>
											</ul>
										{/if}
									{/if}	
								{/if}
									
								{*====Blog and their Function are ends===*}
								
								{if $smarty.session.domain_id}
								{if !$objCommon->getBlogComment($smarty.session.page_id)}
									<input type="hidden" class="dropvalue" value="" />
									<div id="dropBox" class="dropBox clearfix pull-left">
										<ul id="sortable" class="clearfix">
											
											{section name="pagelist" loop="$pagefirstlist"}
											<div id="dropBox2" class="dropBox2 clearfix" style="position:relative;">
											{if $pagefirstlist[pagelist].column_show}
											<li id="page_{$pagefirstlist[pagelist].pagelist}" class="activemove theme2bginn">
												<div class="form_element_control">
													<div class="controlMidOuter">
														<div class="controlMidBg"></div>
													</div>
													<div class="deleteOuter">
														<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','column_show');"><i class="fa fa-trash-o"></i></div>
													</div>
												</div>
												<div class="columnPop">
													<div class="columnPopLeft"></div>
													<div class="columnPopContent">
														<select class="columncount" onchange="selecttochange(this,'{$pagefirstlist[pagelist].pagelist}');">
															<option {if $pagefirstlist[pagelist].column_count eq '3'}selected="selected"{/if}>2</option>
															<option {if $pagefirstlist[pagelist].column_count eq '4'}selected="selected"{/if}>3</option>
															<option {if $pagefirstlist[pagelist].column_count eq '5'}selected="selected"{/if}>4</option>
															<option {if $pagefirstlist[pagelist].column_count eq '6'}selected="selected"{/if}>5</option>
														</select>
													</div>
													<div class="columnPopRight"></div>
												</div>
												<!--<table onmouseover="columnId(this);" onmouseleave="columnIdOut(this);" class="sample2 columsBor" width="100%" border="0" cellpadding="0" cellspacing="0">-->			
												<div class="tablesampleouter">
													<table class="sample2 columsBor" border="0" cellpadding="0" cellspacing="0">
													<tr>
													
													 {section name="rowcount" start=1 loop=$pagefirstlist[pagelist].column_count}
													 	<td class="addwidth" id="col_{$smarty.section.rowcount.index}" {if $smarty.section.rowcount.index eq ''} $pagefirstlist[pagelist].column_count}style="display:none;"{/if} {if $smarty.section.rowcount.index eq '1'}{if $pagefirstlist[pagelist].td_col1}style="width:{$pagefirstlist[pagelist].td_col1}px;"{/if}{/if}{if $smarty.section.rowcount.index eq '2'}{if $pagefirstlist[pagelist].td_col2}style="width:{$pagefirstlist[pagelist].td_col2}px;"{/if}{/if}{if $smarty.section.rowcount.index eq '3'}{if $pagefirstlist[pagelist].td_col3}style="width:{$pagefirstlist[pagelist].td_col3}px;"{/if}{/if}{if $smarty.section.rowcount.index eq '4'}{if $pagefirstlist[pagelist].td_col4}style="width:{$pagefirstlist[pagelist].td_col4}px;"{/if}{/if}{if $smarty.section.rowcount.index eq '5'}{if $pagefirstlist[pagelist].td_col5}style="width:{$pagefirstlist[pagelist].td_col5}px;"{/if}{/if}>
														<input type="hidden" name="columnpagelistid" id="columnpagelistid" class="columnpagelistid" value="{$pagefirstlist[pagelist].pagelist}">
															<!---COlumn Sortable---->
															<ul id="sortable_{$smarty.section.rowcount.index}" class="clearfix no-mar sortcolumn">
																	{$objCommon->getColumnPageList($smarty.section.rowcount.index,$pagefirstlist[pagelist].pagelist)}
																	{if $columnpagefirstlist}
																	{section name="colpagelist" loop="$columnpagefirstlist"}
																	{if $columnpagefirstlist[colpagelist].title_select}
																	<li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn posRel">								
																		<div class="form_element_control">
																			<div class="controlMidOuter">
																				<div class="controlMidBg"></div>
																			</div>
																			<div class="deleteOuter">
																				<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','title_select');"><i class="fa fa-trash-o"></i></div>
																			</div>
																		</div>
																		<div id="buildTitle_{$columnpagefirstlist[colpagelist].pagelist}" onmouseout="updateTitle('buildTitle_{$columnpagefirstlist[colpagelist].pagelist}');" class="themehead {if $columnpagefirstlist[colpagelist].text_title eq ''}clickheretext contenttext {/if}contentedit main_title" style="{if $columnpagefirstlist[colpagelist].buildTitle_fontsize}font-size:{$columnpagefirstlist[colpagelist].buildTitle_fontsize}px;{/if}{if $columnpagefirstlist[colpagelist].buildTitle_fontcolor}color:{$columnpagefirstlist[colpagelist].buildTitle_fontcolor}{/if}{if $columnpagefirstlist[colpagelist].main_title_font_style}font-family:{$columnpagefirstlist[colpagelist].main_title_font_style};{/if}{if $columnpagefirstlist[colpagelist].main_title_line_size}line-height:{$columnpagefirstlist[colpagelist].main_title_line_size}px;{/if}" contenteditable="true"  data-ph="Başlığı Düzenle" >{if $columnpagefirstlist[colpagelist].text_title}{$columnpagefirstlist[colpagelist].text_title}{/if}</div>
																	</li>
																	{/if}
																	{if $columnpagefirstlist[colpagelist].description_select}
																	<li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn posRel">
																		<div class="form_element_control">
																			<div class="controlMidOuter">
																				<div class="controlMidBg"></div>
																			</div>
																			<div class="deleteOuter">
																				<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','description_select');"><i class="fa fa-trash-o"></i></div>
																			</div>
																		</div>								
																		<div id="buildPara_{$columnpagefirstlist[colpagelist].pagelist}" class="{if $columnpagefirstlist[colpagelist].text_description eq ''}clickheretext contenttext {/if}contentedit main_paragraph" style="{if $columnpagefirstlist[colpagelist].buildPara_fontsize}font-size:{$columnpagefirstlist[colpagelist].buildPara_fontsize}px;{/if}{if $columnpagefirstlist[colpagelist].buildPara_fontcolor}color:{$columnpagefirstlist[colpagelist].buildPara_fontcolor}{/if}{if $columnpagefirstlist[colpagelist].main_paragraph_font_style}font-family:{$columnpagefirstlist[colpagelist].main_paragraph_font_style};{/if}{if $columnpagefirstlist[colpagelist].main_paragraph_line_size}line-height:{$columnpagefirstlist[colpagelist].main_paragraph_line_size}px;{/if}" onmouseout="updateDesc('buildPara_{$columnpagefirstlist[colpagelist].pagelist}');" contenteditable="true"  data-ph="Paragrafı Düzenle" >{if $columnpagefirstlist[colpagelist].text_description}{$columnpagefirstlist[colpagelist].text_description}{/if}</div>					
																	</li>
																	{/if}
																	{if $columnpagefirstlist[colpagelist].divider}
																		<li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn posRel">
																			<div class="form_element_control">
																				<div class="controlMidOuter">
																					<div class="controlMidBg"></div>
																				</div>
																				<div class="deleteOuter">
																					<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','divider');"><i class="fa fa-trash-o"></i></div>
																				</div>
																			</div>
																			<div id="buildDivide" class="">
																				<hr />
																			</div>
																		</li>
																	{/if}
																	{if $columnpagefirstlist[colpagelist].image_multiple_select}
																		{$objCommon->getImage($columnpagefirstlist[colpagelist].pagelist,'singletext')}
																		<li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn posRel">
																			<div class="form_element_control">
																				<div class="controlMidOuter">
																					<div class="controlMidBg"></div>
																				</div>
																				<div class="deleteOuter">
																					<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','image_multiple_select');"><i class="fa fa-trash-o"></i></div>
																				</div>
																			</div>
																			<div id="buildImgTxt">
																				<div class="row-fluid">
																					<div class="span3">
																						{if !$images}	
																							{*<div id='preview_{$columnpagefirstlist[colpagelist].pagelist}'>
																							</div>*}
																							<div id='imageloadstatus_{$columnpagefirstlist[colpagelist].pagelist}' style='display:none'><div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div></div>
																							<form id="imageform_{$columnpagefirstlist[colpagelist].pagelist}" method="post" class="form-horizontal sky-form" enctype="multipart/form-data" action='ajaxImageUpload.php' style="clear:both">
																								<label id='imageloadbutton_{$columnpagefirstlist[colpagelist].pagelist}' class="input input-file" style="display:block; height:135px;" for="file">
																									<div class="button">
																										<input type='file' name="photos[]" id="photoimg_{$columnpagefirstlist[colpagelist].pagelist}" class="inputfile" onchange="imageUpdatingProcess('{$columnpagefirstlist[colpagelist].pagelist}');"/>
																									</div>
																									<input type='hidden' name="status" value="singletext"/>
																									<input type='hidden' name="page_list_id" value="{$columnpagefirstlist[colpagelist].pagelist}"/>
																								</label>
																							</form>
																						{else}
																							<div class="uploadImgBg">
																								<img class="imagechange" width="93%" height="180" src="{$SITE_DOMAIN_IMAGES_URL}/{$images}">
																								{*<div id='preview_{$columnpagefirstlist[colpagelist].pagelist}'>
																								</div>*}
																								<div id='imageloadstatus_{$columnpagefirstlist[colpagelist].pagelist}' style='display:none'><div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div></div>
																								<form id="imageform_{$columnpagefirstlist[colpagelist].pagelist}" method="post" class="form-horizontal sky-form uploadsecbg" style="margin:-37px 0 0;" enctype="multipart/form-data" action='ajaxImageUpload.php' style="clear:both">
																									<label id='imageloadbutton_{$columnpagefirstlist[colpagelist].pagelist}' class="input input-file" style="display:block" for="file">
																										<div class="button">
																											<input type='file' name="photos[]" id="photoimg_{$columnpagefirstlist[colpagelist].pagelist}" class="inputfile" onchange="imageUpdatingProcess('{$columnpagefirstlist[colpagelist].pagelist}');"/>
																										</div>
																										<input type='hidden' name="status" value="singletext"/>
																										<input type='hidden' name="page_list_id" value="{$columnpagefirstlist[colpagelist].pagelist}"/>
																									</label>
																								</form>
																							</div>
																						{/if}
																					</div>
																					<div class="span9">
																						<div id="imgtitle_{$columnpagefirstlist[colpagelist].pagelist}" onmouseout="updateImgTitle('imgtitle_{$columnpagefirstlist[colpagelist].pagelist}');" class="themehead borNone {if $columnpagefirstlist[colpagelist].image_text eq ''}clickheretext contenttext {/if}contentedit main_imagetitle" style="{if $columnpagefirstlist[colpagelist].imgtitle_fontsize}font-size:{$columnpagefirstlist[colpagelist].imgtitle_fontsize}px;{/if}{if $columnpagefirstlist[colpagelist].imgtitle_fontcolor}color:{$columnpagefirstlist[colpagelist].imgtitle_fontcolor}{/if}{if $columnpagefirstlist[colpagelist].main_imagetitle_font_style}font-family:{$columnpagefirstlist[colpagelist].main_imagetitle_font_style};{/if}{if $columnpagefirstlist[colpagelist].main_imagetitle_line_size}line-height:{$columnpagefirstlist[colpagelist].main_imagetitle_line_size}px;{/if}{if $columnpagefirstlist[colpagelist].main_imagetitle_font_size}font-size:{$columnpagefirstlist[colpagelist].main_imagetitle_font_size}px;{/if}" contenteditable="true"  data-ph="Resim Seç ve Metni Düzenle" >{if $columnpagefirstlist[colpagelist].image_text}{$columnpagefirstlist[colpagelist].image_text}{/if}</div> 
																					</div>
																				</div>
																			</div>
																		</li>
																	{/if}
																	{if $columnpagefirstlist[colpagelist].image_select}
																	{$objCommon->getImage($columnpagefirstlist[colpagelist].pagelist)}
																	<li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn posRel">
																		<div class="form_element_control">
																			<div class="controlMidOuter">
																				<div class="controlMidBg"></div>
																			</div>
																			<div class="deleteOuter">
																				<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','image_select');"><i class="fa fa-trash-o"></i></div>
																			</div>
																		</div>
																		<div id="buildImg_{$columnpagefirstlist[colpagelist].pagelist}" class="row-fluid">
																		 {if !$images}
																			{*<div id='preview_{$columnpagefirstlist[colpagelist].pagelist}'>
																			</div>*}
																			<div id='imageloadstatus_{$columnpagefirstlist[colpagelist].pagelist}' style='display:none'>
																			<div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div></div>
																			<form id="imageform_{$columnpagefirstlist[colpagelist].pagelist}" class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxImageUpload.php' style="clear:both">
																				<label id='imageloadbutton_{$columnpagefirstlist[colpagelist].pagelist}' class="input input-file" style="display:block; height:135px;" for="file">
																					<div class="button">
																						<input type='file' name="photos[]" id="photoimg_{$columnpagefirstlist[colpagelist].pagelist}" class="inputfile" onchange="imageUpdatingProcess('{$columnpagefirstlist[colpagelist].pagelist}');"/>
																					</div>
																					<input type='hidden' name="status" value="single"/>
																					<input type='hidden' name="page_list_id" value="{$columnpagefirstlist[colpagelist].pagelist}"/>
																				</label>
																			</form>
																		{else}
																			<div class="uploadImgBg">
																				<img class="imagechange" width="{if $columnpagefirstlist[colpagelist].img_width}{$columnpagefirstlist[colpagelist].img_width}{else}100%{/if}" height="{if $columnpagefirstlist[colpagelist].img_height}{$columnpagefirstlist[colpagelist].img_height}{/if}" src="{$SITE_DOMAIN_IMAGES_URL}/{$images}">
																				{*<div id='preview_{$columnpagefirstlist[colpagelist].pagelist}'>
																				</div>*}
																				<div id='imageloadstatus_{$columnpagefirstlist[colpagelist].pagelist}' style='display:none'><div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div></div>
																				<form id="imageform_{$columnpagefirstlist[colpagelist].pagelist}" class="form-horizontal sky-form uploadsecbg" style="margin:-37px 0 0; clear:both;" method="post" enctype="multipart/form-data" action='ajaxImageUpload.php'>
																					<label id='imageloadbutton_{$columnpagefirstlist[colpagelist].pagelist}' class="input input-file" style="display:block" for="file">
																						<div class="button">
																							<input type='file' name="photos[]" id="photoimg_{$columnpagefirstlist[colpagelist].pagelist}" class="inputfile" onchange="imageUpdatingProcess('{$columnpagefirstlist[colpagelist].pagelist}');"/>
																						</div>
																						<input type='hidden' name="status" value="single"/>
																						<input type='hidden' name="page_list_id" value="{$columnpagefirstlist[colpagelist].pagelist}"/>
																					</label>
																				</form>
																			</div>
																		{/if}
																		</div>
																	</li>
																	{/if}
																	{if $columnpagefirstlist[colpagelist].contact_form}
																	 {$objCommon->getAllContactDetails($columnpagefirstlist[colpagelist].pagelist)}
																	<li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn posRel">
																		<div class="form_element_control">
																			<div class="controlMidOuter">
																				<div class="controlMidBg"></div>
																			</div>
																			<div class="deleteOuter">
																				<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','contact_form');"><i class="fa fa-trash-o"></i></div>
																			</div>
																		</div>
																		<div id="" class="contactform">
																			<!--<div  onclick="showContactMail();">
																				Form Entries
																			</div>-->
																			
																			<a data-toggle="modal" href="#ModalFormEntry_{$columnpagefirstlist[colpagelist].pagelist}" class="formEntryButton pull-right">Form Entries</a>
																			<div class="themeheadsec contentedit {if $contactlist.0.title_head eq ''}clickheretext contenttext {/if}contactTxt contactHead" style="{if $contactlist.0.buildContact_fontsize}font-size:{$contactlist.0.buildContact_fontsize}px;{/if}{if $contactlist.0.buildContact_fontcolor}color:{$contactlist.0.buildContact_fontcolor}{/if}{if $contactlist.0.buildContact_font_style}font-family:{$contactlist.0.buildContact_font_style};{/if}{if $contactlist.0.buildContact_line_size}line-height:{$contactlist.0.buildContact_line_size}px;{/if}{if $contactlist.0.buildContact_font_size}font-size:{$contactlist.0.buildContact_font_size}px;{/if}" id="buildContact_{$contactlist.0.id}" onmouseout="updateContactFormTitle('buildContact_{$contactlist.0.id}');" data-ph="Edit Heading Here">{if $contactlist.0.title_head}{$contactlist.0.title_head}{/if}</div>
																			<div class="row-fluid"> 	
																				<div class="span4">
																					<div class="span12 contactLisNav"><span onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','1');">{$contactlist.0.text1}</span>{if $contactlist.0.text1_required}<span class="red">*</span>{/if}</div>
																					<input type="text" value="" placeholder="{$contactlist.0.text1}" class="contacttxtbx" style="{if $contactlist.0.text1_spacing eq 'None'}margin:0px;{elseif $contactlist.0.text1_spacing eq 'Small'}margin:5px 0px;{elseif $contactlist.0.text1_spacing eq 'Medium'}margin:10px 0px;{elseif $contactlist.0.text1_spacing eq 'Large'}margin:15px 0px;{/if}{if $contactlist.0.text1_width eq 'Small'}width:50%;{elseif $contactlist.0.text1_width eq 'Medium'}width:70%;{elseif $contactlist.0.text1_width eq 'Large'}width:100%;{/if}" onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','1');">{if $contactlist.0.text1_instruction}<span class="instruction-right left">{$contactlist.0.text1_instruction}</span>{/if}
																				</div>
																				<div class="span4">
																					<div class="span12 contactLisNav"><span onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','2');">{$contactlist.0.text2}</span> {if $contactlist.0.text2_required}<span class="red">*</span>{/if}</div>
																					<input type="text" value="" placeholder="{$contactlist.0.text2}" class="contacttxtbx" style="{if $contactlist.0.text2_spacing eq 'None'}margin:0px;{elseif $contactlist.0.text2_spacing eq 'Small'}margin:5px 0px;{elseif $contactlist.0.text2_spacing eq 'Medium'}margin:10px 0px;{elseif $contactlist.0.text2_spacing eq 'Large'}margin:15px 0px;{/if}{if $contactlist.0.text2_width eq 'Small'}width:50%;{elseif $contactlist.0.text2_width eq 'Medium'}width:70%;{elseif $contactlist.0.text2_width eq 'Large'}width:100%;{/if}" onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','2');">{if $contactlist.0.text2_instruction}<span class="instruction-right left">{$contactlist.0.text2_instruction}</span>{/if}
																				</div>
																			</div>
																			<div class="row-fluid marTop10">
																				<div class="span12 contactLisNav"><span onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','3');">{$contactlist.0.text3}</span> {if $contactlist.0.text3_required}<span class="red">*</span>{/if}</div>
																				<input type="text" value="" placeholder="{$contactlist.0.text3}" class="contacttxtbx" style="{if $contactlist.0.text3_spacing eq 'None'}margin:0px;{elseif $contactlist.0.text3_spacing eq 'Small'}margin:5px 0px;{elseif $contactlist.0.text3_spacing eq 'Medium'}margin:10px 0px;{elseif $contactlist.0.text3_spacing eq 'Large'}margin:15px 0px;{/if}{if $contactlist.0.text3_width eq 'Small'}width:50%;{elseif $contactlist.0.text3_width eq 'Medium'}width:70%;{elseif $contactlist.0.text3_width eq 'Large'}width:100%;{/if}" onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','3');">{if $contactlist.0.text3_instruction}<span class="instruction-right left">{$contactlist.0.text3_instruction}</span>{/if}
																			</div>
																			<div class="row-fluid marTop10">
																				<div class="span12 contactLisNav"><span onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','4');">{$contactlist.0.text4}</span>{if $contactlist.0.text4_required}<span class="red">*</span>{/if}</div>
																				<textarea class="contacttxtarea" style="{if $contactlist.0.text4_spacing eq 'None'}margin:0px;{elseif $contactlist.0.text4_spacing eq 'Small'}margin:5px 0px;{elseif $contactlist.0.text4_spacing eq 'Medium'}margin:10px 0px;{elseif $contactlist.0.text4_spacing eq 'Large'}margin:15px 0px;{/if}{if $contactlist.0.text4_width eq 'Small'}width:50%;{elseif $contactlist.0.text4_width eq 'Medium'}width:70%;{elseif $contactlist.0.text4_width eq 'Large'}width:100%;{/if}" onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','4');"></textarea>{if $contactlist.0.text4_instruction}<span class="instruction-right left">{$contactlist.0.text4_instruction}</span>{/if}
																			</div>
																			<div class="row-fluid marTop10">
																				<div class="buildPagePostButtonLeft"><input type="submit" value="Submit" class="buildPagePostButton"> </div>
																			</div>
																		</div>
																		
																		{*<div id="showMailContact" style="display:none;">
																		{$objCommon->getEmai($columnpagefirstlist.0.domain_id,$columnpagefirstlist.0.page_id)}
																			<form name="conatctmail" method="post">
																				<input type="text" name="contactmail" id="contactmail" value="{$mailid}" >
																				<input type="button" name="submit" value="submit" onclick="changeMail();">
																			</form>
																		</div>*}
																		<div id="modals">
																			<div id="ModalFormEntry_{$columnpagefirstlist[colpagelist].pagelist}" class="modal hide">
																				<div class="formEntryPopForm clearfix">
																					<div id="errtext"></div>
																					{$objCommon->getEmai($columnpagefirstlist[colpagelist].pagelist)}
																					<form name="conatctmail_{$columnpagefirstlist[colpagelist].pagelist}" method="post" class="no-mar">
																						<div id="errtext"></div>
																						<input type="text" name="contactmail" id="contactmail_{$columnpagefirstlist[colpagelist].pagelist}" value="{$mailid}" >
																						<input type="button" class="btn btn-info pull-right marTop10" name="submit" value="submit" onclick="changeMail('{$columnpagefirstlist[colpagelist].pagelist}');">
																					</form>
																					<button class="close formEntryPopFormClose btn marTop10" data-dismiss="modal" aria-hidden="true">close</button>
																				</div>
																			</div>
																		</div>
																		<div id="contactForm"></div>	
																	</li>
																	{/if}
																	{if $columnpagefirstlist[colpagelist].social_plugins}
																	{$objCommon->getSocialDetails($columnpagefirstlist[colpagelist].pagelist)}
																	<li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn posRel">
																		<div class="form_element_control">
																			<div class="controlMidOuter">
																				<div class="controlMidBg"></div>
																			</div>
																			<div class="deleteOuter">
																				<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','social_plugins');"><i class="fa fa-trash-o"></i></div>
																			</div>
																		</div>
																		<div class="moveicon"></div>
																		<div id="buildSocial_{$columnpagefirstlist[colpagelist].pagelist}" class="buildSocialIcon">
																			<input type="button" class="fbicon" value="" />
																			<input type="button" class="twittericon" value="" />
																			<input type="button" class="linkedicon" value="" />
																			<input type="button" class="mailicon" value="" />
																		</div>
																		
																		<div id="pluginShow_{$columnpagefirstlist[colpagelist].pagelist}" class="socialPop" style="display:none;">
																			<div class="leftside">
																				<i class="fa fa-users fontSize42"></i>
																				<label>{$LANG.social_link_name}</label>
																			</div>
																			<div class="rightside">
																				<form class="no-mar" id="socialplugin_{$columnpagefirstlist[colpagelist].pagelist}" name="socialplugin" method="post">
																					<input type="hidden" name="domain_id" id="domain_id_{$columnpagefirstlist[colpagelist].pagelist}" value="{$columnpagefirstlist[colpagelist].domain_id}">
																					<input type="hidden" name="page_id" id="page_id_{$columnpagefirstlist[colpagelist].pagelist}" value="{$columnpagefirstlist[colpagelist].page_id}">
																					<input type="hidden" name="page_list_id" id="page_list_id_{$columnpagefirstlist[colpagelist].pagelist}" value="{$columnpagefirstlist[colpagelist].pagelist}">
																					<div class="socialInn clearfix">
																						<span><i class="fa fa-facebook"></i></span>
																						<input type="text" name="fb" value="{$socialpagelist.0.fb}" id="fb_{$columnpagefirstlist[colpagelist].pagelist}" placeholder="http://facebook.com/example">
																					</div>
																					<div class="socialInn clearfix">
																						<span><i class="fa fa fa-tumblr"></i></span>
																						<input type="text" name="tw" value="{$socialpagelist.0.twitter}" id="tw_{$columnpagefirstlist[colpagelist].pagelist}" placeholder="http://twitter.com/example">
																					</div>
																					<div class="socialInn clearfix">
																						<span><i class="fa fa-linkedin"></i></span>
																						<input type="text" name="ln" value="{$socialpagelist.0.linkedin}" id="ln_{$columnpagefirstlist[colpagelist].pagelist}" placeholder="http://linkedin.com/in/example">
																					</div>
																					<div class="socialInn clearfix">
																						<span><i class="fa fa fa-envelope-o"></i></span>
																						<input type="text" name="mail" value="{$socialpagelist.0.mail}" id="mail_{$columnpagefirstlist[colpagelist].pagelist}" placeholder="example@example.com">
																					</div>
																					<div class="mapButton clearfix">
																						<input type="button" class="btn btn-success" name="submit" value="Save" onclick="updateSocial('{$columnpagefirstlist[colpagelist].pagelist}');">
																						<input type="button" class="btn btn-danger pull-right addGoogCancel" name="cancel" value="Cancel" onclick="$('#pluginShow_{$columnpagefirstlist[colpagelist].pagelist}').hide();">
																					</div>
																			   </form>
																			 </div>
																		</div>
																	</li>
																	{/if}
																	{if $columnpagefirstlist[colpagelist].youtube_video}
																		<li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn posRel">
																			<div class="form_element_control">
																				<div class="controlMidOuter">
																					<div class="controlMidBg" onclick="showVideoPopup('youtubelabelsPopup_{$columnpagefirstlist[colpagelist].pagelist}');"></div>
																				</div>
																				<div class="deleteOuter">
																					<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','youtube_video');"><i class="fa fa-trash-o"></i></div>
																				</div>
																			</div>
																			{$objCommon->getYoutubeDetails($columnpagefirstlist[colpagelist].pagelist)}
																			<div class="youtubeDiv clearfix" id="youtubeDiv_{$columnpagefirstlist[colpagelist].pagelist}" onclick="showVideoPopup('youtubelabelsPopup_{$columnpagefirstlist[colpagelist].pagelist}');" style="display:block;{if $youtubelist.0.youtube_spacing eq 'None'}margin:0px;{elseif $youtubelist.0.youtube_spacing eq 'Small'}margin:5px 0px;{elseif $youtubelist.0.youtube_spacing eq 'Medium'}margin:10px 0px;{elseif $youtubelist.0.youtube_spacing eq 'Large'}margin:15px 0px;{/if}{if $youtubelist.0.youtube_width eq 'Small'}width:50%;{elseif $youtubelist.0.youtube_width eq 'Medium'}width:70%;{elseif $youtubelist.0.youtube_width eq 'Large'}width:100%;{/if}">
																				<iframe name="ifrm" id="ifrm" frameborder="0" allowfullscreen="" src="{$youtubelist.0.youtube_url}" width="100%" height="200"></iframe>	
																			</div>
																			<div class="youtubelabelsPopup" id="youtubelabelsPopup_{$columnpagefirstlist[colpagelist].pagelist}" style="display:none;">
																				<div class="youtubepopclose" onclick="popcloseforutubeurl('youtubelabelsPopup_{$columnpagefirstlist[colpagelist].pagelist}');"></div>
																				
																				<form name="youtubefrm_{$columnpagefirstlist[colpagelist].pagelist}" method="post">
																					<div id="error_{$columnpagefirstlist[colpagelist].pagelist}"></div>
																					<div class="contactlabelsPopupLeft">
																						<label>Youtube Video Url</label>
																						<input type="text" class="videoUrl" name="videourl_{$columnpagefirstlist[colpagelist].pagelist}" id="videourl_{$columnpagefirstlist[colpagelist].pagelist}" value="{$youtubelist.0.youtube_url}"/>
																					</div>
																					<div class="contactlabelsPopupRight">
																						<div class="contactlabelsPopupRightInner">
																							<label>{$LANG.spacing_name}</label>
																							<select class="spacingOption" name="spacing" id="spacing_{$columnpagefirstlist[colpagelist].pagelist}">
																								<option value="{$LANG.for_none_name}" {if $youtubelist.0.youtube_spacing eq 'None'}selected="selected"{/if}>{$LANG.for_none_name}</option>
																								<option value="{$LANG.small_name}" {if $youtubelist.0.youtube_spacing eq 'Small'}selected="selected"{/if}>{$LANG.small_name}</option>
																								<option value="{$LANG.medium_name}" {if $youtubelist.0.youtube_spacing eq 'Medium'}selected="selected"{/if}>{$LANG.medium_name}</option>
																								<option value="{$LANG.large_name}" {if $youtubelist.0.youtube_spacing eq 'Large'}selected="selected"{/if}>{$LANG.large_name}</option>
																							</select>
																							<label>Width</label>
																							<select class="widthOption" name="width_{$columnpagefirstlist[colpagelist].pagelist}" id="width_{$columnpagefirstlist[colpagelist].pagelist}">
																								<option value="Small" {if $youtubelist.0.youtube_width eq 'Small'}selected="selected"{/if}>Small</option>
																								<option value="Medium" {if $youtubelist.0.youtube_width eq 'Medium'}selected="selected"{/if}>Medium</option>
																								<option value="Large" {if $youtubelist.0.youtube_width eq 'Large'}selected="selected"{/if}>Large</option>
																							</select>
																						</div>
																						<div>
																							<input type="button" value="save" class="videosubmit"  onclick="addYoutubeUrl('{$columnpagefirstlist[colpagelist].pagelist}');" />
																						</div>
																					</div>
																				</form>
																			</div>
																		</li>
																	{/if}
																	<!--Gallery Process Start-->
																	{if $columnpagefirstlist[colpagelist].gallery}
																		 <li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn posRel">
																			<div class="form_element_control">
																				<div class="controlMidOuter">
																					<div class="controlMidBg"></div>
																				</div>
																				<div class="deleteOuter">
																					<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','gallery');"><i class="fa fa-trash-o"></i></div>
																				</div>
																			</div>
																			<div id="galImg_{$columnpagefirstlist[colpagelist].pagelist}" class="row-fluid">
																			 {$objCommon->getGalleryImage($smarty.session.domain_id,$smarty.session.page_id,$columnpagefirstlist[colpagelist].pagelist)}
																			 {if $images}
																				 {section name="galimg" loop="$images"}
																					<div class="imageGallery" style="{if $columnpagefirstlist[colpagelist].gallery_column eq '2'}width: 49%;{elseif $columnpagefirstlist[colpagelist].gallery_column eq '3'}width: 32%;{elseif $columnpagefirstlist[colpagelist].gallery_column eq '4'}width: 24%;{elseif $columnpagefirstlist[colpagelist].gallery_column eq '5'}width: 19%;{elseif $columnpagefirstlist[colpagelist].gallery_column eq '6'}width: 15.5%;{else}{/if}{if $columnpagefirstlist[colpagelist].gallery_spacing eq 'None'}margin: 0px;{elseif $columnpagefirstlist[colpagelist].gallery_spacing eq 'Small'}margin: 5px 0px;{elseif $columnpagefirstlist[colpagelist].gallery_spacing eq 'Medium'}margin: 10px 0px;{elseif $columnpagefirstlist[colpagelist].gallery_spacing eq 'Large'}margin: 15px 0px;{else}margin: 0px;{/if}{if $columnpagefirstlist[colpagelist].gallery_border eq 'None'}border: 0px solid rgb(221, 221, 221);{elseif $columnpagefirstlist[colpagelist].gallery_border eq 'Thin'}border: 2px solid rgb(221, 221, 221);{elseif $columnpagefirstlist[colpagelist].gallery_border eq 'Medium'}border: 3px solid rgb(221, 221, 221);{elseif $columnpagefirstlist[colpagelist].gallery_border eq 'Thick'}border: 4px solid rgb(221, 221, 221);{else}border: 0px solid rgb(221, 221, 221);{/if}">
																						<img width="100%" height="200" src="{$SITE_DOMAIN_IMAGES_URL}/{$images[galimg].gallery_name_thumb}">
																						<div class="galleryimageInn">
																							<a onclick="deleteGalImg('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','{$images[galimg].gallery_id}','{$images[galimg].gallery_name}');" class="galleryimage"><i class="fa fa-trash-o"></i></a>
																							<a class="galleryimage galleryimagecomm" id="galleryPopup_{$columnpagefirstlist[colpagelist].pagelist}" onclick="showGaleryPopup('galPopup_{$columnpagefirstlist[colpagelist].pagelist}');"><i class="fa fa-plus-square-o"></i></a>
																						</div>
																					</div>
																				 {/section}
																				 
																			 {else}
																				{*<div id='preview_{$columnpagefirstlist[colpagelist].pagelist}'>
																				</div>*}
																				<div id='imageloadstatus_{$columnpagefirstlist[colpagelist].pagelist}' style='display:none'>
																				<div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div></div>
																				<form id="imageform_{$columnpagefirstlist[colpagelist].pagelist}" class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxGalleryImageUpload.php' style="clear:both">
																					<label id='imageloadbutton_{$columnpagefirstlist[colpagelist].pagelist}' class="input input-file" style="display:block; height:135px;" for="file">
																						<div class="button">
																							<input type='file' name="photos[]" id="photoimg_{$columnpagefirstlist[colpagelist].pagelist}" class="inputfile" onchange="imageUpdatingProcess('{$columnpagefirstlist[colpagelist].pagelist}');"/>
																						</div>
																						<input type='hidden' name="page_list_id" value="{$columnpagefirstlist[colpagelist].pagelist}"/>
																					</label>
																				</form>
																			  {/if}
																			  </div>
																			  <!--Gallery Image Popup-->
																				<div id="galPopup_{$columnpagefirstlist[colpagelist].pagelist}" style="display:none;" class="galleryimagepop">
																					<form name="galleryPopup_{$columnpagefirstlist[colpagelist].pagelist}" method="post">
																						<div class="leftside">
																							<i class="fa fa-picture-o"></i>
																							<div class="clr"></div>
																							<a onclick="$('#galimgpopup_{$columnpagefirstlist[colpagelist].pagelist}').show();$('#masktable').show();$('.imagepopupdiv').css('top',$(window).scrollTop()+20);" style="cursor:pointer;">{$LANG.add_image_name}</a>
																						</div>
																						<div class="rightside">
																							<label>{$LANG.add_image_name}</label>
																							<select class="columnOption" name="column_{$columnpagefirstlist[colpagelist].pagelist}" id="column_{$columnpagefirstlist[colpagelist].pagelist}">
																								<option value="2" {if $columnpagefirstlist[colpagelist].gallery_column eq '2'}selected{/if}>2</option>
																								<option value="3" {if $columnpagefirstlist[colpagelist].gallery_column eq '3'}selected{/if}>3</option>
																								<option value="4" {if $columnpagefirstlist[colpagelist].gallery_column eq '4'}selected{/if}>4</option>
																								<option value="5" {if $columnpagefirstlist[colpagelist].gallery_column eq '5'}selected{/if}>5</option>
																								<option value="6" {if $columnpagefirstlist[colpagelist].gallery_column eq '6'}selected{/if}>6</option>
																							</select>
																							<label>{$LANG.spacing_name}</label>
																							<select class="imagespacingOption" name="spacing_{$columnpagefirstlist[colpagelist].pagelist}" id="spacing_{$columnpagefirstlist[colpagelist].pagelist}">
																								<option value="{$LANG.for_none_name}" {if $columnpagefirstlist[colpagelist].gallery_spacing eq 'None'}selected{/if}>{$LANG.for_none_name}</option>
																								<option value="{$LANG.small_name}" {if $columnpagefirstlist[colpagelist].gallery_spacing eq 'Small'}selected{/if}>{$LANG.small_name}</option>
																								<option value="{$LANG.medium_name}" {if $columnpagefirstlist[colpagelist].gallery_spacing eq 'Medium'}selected{/if}>{$LANG.medium_name}</option>
																								<option value="{$LANG.large_name}" {if $columnpagefirstlist[colpagelist].gallery_spacing eq 'Large'}selected{/if}>{$LANG.large_name}</option>
																							</select>
																							<label>{$LANG.border_name}</label>
																							<select class="borderOption" name="border_{$columnpagefirstlist[colpagelist].pagelist}" id="border_{$columnpagefirstlist[colpagelist].pagelist}">
																								<option value="{$LANG.for_none_name}" {if $columnpagefirstlist[colpagelist].gallery_border eq 'None'}selected{/if}>{$LANG.for_none_name}</option>
																								<option value="{$LANG.thin_name}" {if $columnpagefirstlist[colpagelist].gallery_border eq 'Thin'}selected{/if}>{$LANG.thin_name}</option>
																								<option value="{$LANG.medium_name}" {if $columnpagefirstlist[colpagelist].gallery_border eq 'Medium'}selected{/if}>{$LANG.medium_name}</option>
																								<option value="{$LANG.thick_name}" {if $columnpagefirstlist[colpagelist].gallery_border eq 'Thick'}selected{/if}>{$LANG.thick_name}</option>
																							</select>
																							<!--<label>Cropping</label>
																							<select class="widthOption" name="croping_{$columnpagefirstlist[colpagelist].pagelist}" id="croping_{$columnpagefirstlist[colpagelist].pagelist}">
																								<option value="None">None</option>
																								<option value="Square">Square</option>
																								<option value="Rectangle">Rectangle</option>
																							</select>-->
																							<div class="clearfix">
																								<input type="button" class="btn btn-success" value="save" class="videosubmit"  onclick="addgalleryProcess('{$columnpagefirstlist[colpagelist].pagelist}');" />
																								<input type="button" class="btn btn-danger pull-right gallerycancel" value="cancel" />
																							</div>
																						</div>
																					</form>
																				</div>
																				
																					<div id="galimgpopup_{$columnpagefirstlist[colpagelist].pagelist}" class="imagepopupdiv" aria-hidden="false">
																						<div id="image-chooser-nav">
																							<div id="image-chooser-nav-label">
																								<div>{$LANG.select_image_from}</div>
																							</div>
																							<div id="image-chooser-tab-computer" class="image-chooser-tab image-chooser-tab-selected">
																								<div class="colWhite">
																									<span></span> {$LANG.my_computer_name}
																								</div>
																							</div>
																							<div class="close PopCloseButt btn btn-danger" onclick="$('#galimgpopup_{$columnpagefirstlist[colpagelist].pagelist}').hide();$('#masktable').hide();">X</div>
																						</div>
																						<div id="browsebutton" class="popBrowseInner">
																							{*<div id='preview'></div>*}
																							<div id='imageloadstatus' style="display:none;">
																								<div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div>
																							</div>
																							<form id="galimagephotogal" class="form-horizontal sky-form no-mar" method="post" enctype="multipart/form-data" action='ajaxGalleryImageUpload.php' style="clear:both">
																								<div class="uploadTxtPop">{$LANG.click_here_to_upload}</div>
																								<label for="file" class="input input-file no-mar" style="display:block" name="imageloadbutton" id="imageloadbutton">
																									<div class="button">
																										<input type="file" class="hei180" value="" name="photos[]" id="galimgphoto">
																									</div>
																									<input type='hidden' name="page_list_id" value="{$columnpagefirstlist[colpagelist].pagelist}"/>
																								</label>
																							</form>
																							
																						</div>
																					</div>
																				
																				<div id="masktable" style="display:none;"></div>
																				<!--Gallery Image Popup Ends-->
																		</li>
																	 {/if}
																	<!--Gallery Process End-->
																	{if $columnpagefirstlist[colpagelist].map}
																	 <li id="page_{$columnpagefirstlist[colpagelist].pagelist}" onclick="showMapPopUp('mapframe_{$columnpagefirstlist[colpagelist].pagelist}');" class="activemove theme2bginn posRel">
																		 <div class="form_element_control">
																				<div class="controlMidOuter">
																					<div class="controlMidBg"></div>
																				</div>
																				<div class="deleteOuter">
																					<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','social_plugins');"><i class="fa fa-trash-o"></i></div>
																				</div>
																			</div>
																		<div class="moveicon"></div>
																		 <iframe name="ifrm" id="ifrm" frameborder="0" allowfullscreen="" src="gmapPage.php?zoom={$columnpagefirstlist[colpagelist].map_zoom}&lat={$columnpagefirstlist[colpagelist].map_lat}&lon={$columnpagefirstlist[colpagelist].map_lon}&addr={$columnpagefirstlist[colpagelist].map_addr}&page_list_id={$columnpagefirstlist[colpagelist].pagelist}" width="100%" height="250"></iframe>
																			<div id="mapframe_{$columnpagefirstlist[colpagelist].pagelist}" class="mappop" style="display:none;">
																				<div class="leftside">
																					<img src="{$SITE_BASEURL}/images/map_marker.png" alt="map image"/>
																					<label>{$LANG.map_name}</label>
																				</div>
																				<div class="rightside">
																					<form name="mapframepopup_{$columnpagefirstlist[colpagelist].pagelist}" class="no-mar" method="post">
																						<label>{$LANG.address_name}</label>
																						<input class="mapinputTxt" type="text" name="addr_{$columnpagefirstlist[colpagelist].pagelist}" id="addr_{$columnpagefirstlist[colpagelist].pagelist}" value="{$columnpagefirstlist[colpagelist].map_addr}">
																						<label>{$LANG.zoom_name}</label>
																						{*<input class="mapinputTxt" type="text" name="zoom_{$columnpagefirstlist[colpagelist].pagelist}" id="zoom_{$columnpagefirstlist[colpagelist].pagelist}" value="{$columnpagefirstlist[colpagelist].map_zoom}">*}
																						<input class="mapinputTxt" type="number" min="1" max="17" name="zoom_{$columnpagefirstlist[colpagelist].pagelist}" id="zoom_{$columnpagefirstlist[colpagelist].pagelist}" value="{$columnpagefirstlist[colpagelist].map_zoom}" onkeypress="keypress();">
																						<label>latitude</label>
																						<input class="mapinputTxt" type="text" name="lat_{$columnpagefirstlist[colpagelist].pagelist}" id="lat_{$columnpagefirstlist[colpagelist].pagelist}" value="{$columnpagefirstlist[colpagelist].map_lat}">
																						<label>longtitude</label>
																						<input class="mapinputTxt" type="text" name="lon_{$columnpagefirstlist[colpagelist].pagelist}" id="lon_{$columnpagefirstlist[colpagelist].pagelist}" value="{$columnpagefirstlist[colpagelist].map_lon}">
																						<div class="mapButton clearfix">
																							<input type="button" value="save" class="btn btn-success"  onclick="addMapProcess('{$columnpagefirstlist[colpagelist].pagelist}');" />
																							<input type="button" value="cancel" class="btn btn-danger pull-right mapcancel" />
																						</div>
																				   </form>
																				 </div>
																			</div>
																		 </li>
																	{/if}
																	<!--Slider Process Start-->
																	{if $columnpagefirstlist[colpagelist].slider}
																	 <li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn posRel">
																		<div class="form_element_control">
																			<div class="controlMidOuter">
																				<div class="controlMidBg"></div>
																			</div>
																			<div class="deleteOuter">
																				<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','slider');"><i class="fa fa-trash-o"></i></div>
																			</div>
																		</div>
																		<div id="sliImg_{$columnpagefirstlist[colpagelist].pagelist}" class="row-fluid hoverSlide">
																		 {$objCommon->getSliderImage($smarty.session.domain_id,$smarty.session.page_id,$columnpagefirstlist[colpagelist].pagelist)}
																		 {if $images}
																			 <div id="slider" class="nivoSlider">
																				 {section name="sliimg" loop="$images"}
																					<div class="imageSlider">
																						<img width="100%" height="300" src="{$SITE_DOMAIN_IMAGES_URL}/{$images[sliimg].slider_images}">
																						<div class="slideimageInn">
																							<a onclick="deleteSliImg('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','{$images[sliimg].slider_id}','{$images[sliimg].slider_images}');" class="galleryimage"><i class="fa fa-trash-o"></i></a>
																							
																						</div>
																					</div>
																				 {/section}
																			 </div>
																			 <a data-toggle="modal" class="hoverSlideShow tableslider" href="#slimgpopup_{$columnpagefirstlist[colpagelist].pagelist}">
																				{$LANG.add_image_name}
																			 </a>	
																			 <div id="maskatable" style=" display:none;"></div>										 
																			 <div id="modals">
																				<div id="slimgpopup_{$columnpagefirstlist[colpagelist].pagelist}" class="modal fade hide" aria-hidden="false">
																					<div id="image-chooser-nav">
																						<div id="image-chooser-nav-label">
																							<div>{$LANG.select_image_from}</div>
																						</div>
																						<div id="image-chooser-tab-computer" class="image-chooser-tab image-chooser-tab-selected">
																							<div class="colWhite">
																								<span></span> {$LANG.my_computer_name}
																							</div>
																						</div>
																						<div class="close PopCloseButt btn btn-danger closetableslider" data-dismiss="modal">X</div>
																					</div>
																					<div id="browsebutton" class="popBrowseInner">
																						{*<div id='preview'></div>*}
																						<div id='imageloadstatus' style="display:none;">
																							<div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div>
																						</div>
																						<form id="slimagephotogal" class="form-horizontal sky-form no-mar" method="post" enctype="multipart/form-data" action='ajaxSliderImageUpload.php' style="clear:both">
																							<div class="uploadTxtPop">{$LANG.click_here_to_upload}</div>
																							<div class="">{$LANG.upload_image_max_width_and_height}</div>
																							<label for="file" class="input input-file no-mar" style="display:block" name="imageloadbutton" id="imageloadbutton">
																								<div class="button">
																									<input type="file" class="hei180" value="" name="photos[]" id="slimgphoto">
																								</div>
																								<input type='hidden' name="page_list_id" value="{$columnpagefirstlist[colpagelist].pagelist}"/>
																							</label>
																						</form>
																						
																					</div>
																				</div>
																			</div>
																		 {else}
																			{*<div id='preview_{$columnpagefirstlist[colpagelist].pagelist}'>
																			</div>*}
																			<div id='imageloadstatus_{$columnpagefirstlist[colpagelist].pagelist}' style='display:none'>
																			<div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div></div>
																			<form id="imageform_{$columnpagefirstlist[colpagelist].pagelist}" class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxSliderImageUpload.php' style="clear:both">
																				<label id='imageloadbutton_{$columnpagefirstlist[colpagelist].pagelist}' class="input input-file" style="display:block; height:135px;" for="file">
																					<div class="button">
																						<input type='file' name="photos[]" id="sliimg_{$columnpagefirstlist[colpagelist].pagelist}" class="inputfile" onchange="imageUpdatingProcess('{$columnpagefirstlist[colpagelist].pagelist}');"/>
																					</div>
																					<input type='hidden' name="page_list_id" value="{$columnpagefirstlist[colpagelist].pagelist}"/>
																				</label>
																			</form>
																		{/if}
																	</div>
																	</li>  
																 {/if}
																<!--Slider Process End-->
																	
																	<!--Google Adsense Start-->
																	 
																	{if $columnpagefirstlist[colpagelist].google_adsense}
																		<li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn posRel">
																				<div class="form_element_control">
																					<div class="controlMidOuter">
																						<div class="controlMidBg"></div>
																					</div>
																					<div class="deleteOuter">
																						<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','google_adsense');"><i class="fa fa-trash-o"></i></div>
																					</div>
																				</div>
																				<input type='radio' name="google_ads" id="google_ads_script_{$columnpagefirstlist[colpagelist].pagelist}" class="scriptImgInput" value="script" {if $columnpagefirstlist[colpagelist].google_ads eq 'script'}checked="checked" {/if} onclick="showDivForScript('script_{$columnpagefirstlist[colpagelist].pagelist}','images_{$columnpagefirstlist[colpagelist].pagelist}');">
																				<label class="scriptImg" for="google_ads_script_{$columnpagefirstlist[colpagelist].pagelist}" onclick="showDivForScript('script_{$columnpagefirstlist[colpagelist].pagelist}','images_{$columnpagefirstlist[colpagelist].pagelist}');">
																					<div class="scriptInner">
																						<div class="scriptImage">{$LANG.script_name}</div>
																					</div>
																				</label>
																				<input type='radio' name="google_ads" id="google_ads_image_{$columnpagefirstlist[colpagelist].pagelist}" class="imgaeImgInput" value="image" {if $columnpagefirstlist[colpagelist].google_ads eq 'image'}checked="checked" {/if} onclick="showDivForScript('images_{$columnpagefirstlist[colpagelist].pagelist}','script_{$columnpagefirstlist[colpagelist].pagelist}');">
																				<label class="imgaeImg" for="google_ads_image_{$columnpagefirstlist[colpagelist].pagelist}" onclick="showDivForScript('images_{$columnpagefirstlist[colpagelist].pagelist}','script_{$columnpagefirstlist[colpagelist].pagelist}');">
																					<div class="imageInner">
																						<div class="imageHead">{$LANG.image_name}</div>
																						<div class="imageImage"></div>
																					</div>
																				</label>
																				
																				<div id="script_{$columnpagefirstlist[colpagelist].pagelist}" class="addGoogPop">
																					<div class="leftside">
																						<i class="fa fa-file-text-o fontSize42"></i>
																						<label>{$LANG.script_name}</label>
																					</div>
																					<div class="rightside">
																						<form name="script_google_{$columnpagefirstlist[colpagelist].pagelist}" class="no-mar"  id="script_google_{$columnpagefirstlist[colpagelist].pagelist}" method="post" action="">
																							<label>{$LANG.adress_name}</label>
																							<input type="hidden" name="script" id="script" value="script">
																							 <textarea class="addGooginputTxt google_ansen" name="google_script_text" id="google_script_text_{$columnpagefirstlist[colpagelist].pagelist}"   placeholder="Enter your script" >{$columnpagefirstlist[colpagelist].google_script_text}</textarea>
																							 <input type='hidden' name="page_list_id" id="page_list_id" value="{$columnpagefirstlist[colpagelist].pagelist}"/>
																							
																							<div class="mapButton clearfix">
																								 <input type="button" name="submit" value="Submit" class="btn btn-success"  onclick="googleScriptSave('{$columnpagefirstlist[colpagelist].pagelist}');">
																								<input type="button" value="cancel" class="btn btn-danger pull-right addGoogCancel" />
									
																							</div>
																					   </form>
																					 </div>
																				</div>
																				
																				<!--<div id="script_{$columnpagefirstlist[colpagelist].pagelist}" {if $columnpagefirstlist[colpagelist].google_ads eq 'script'}  style="display:block;"{else}style="display:none;" {/if}>
																					<form name="script_google_{$columnpagefirstlist[colpagelist].pagelist}"  id="script_google_{$columnpagefirstlist[colpagelist].pagelist}" method="post" action="">
																					<input type="hidden" name="script" id="script" value="script">
																					 <textarea name="google_script_text" id="google_script_text_{$columnpagefirstlist[colpagelist].pagelist}" class="google_ansen" placeholder="Enter your script" >{$columnpagefirstlist[colpagelist].google_script_text}</textarea>
																					 <input type='hidden' name="page_list_id" id="page_list_id" value="{$columnpagefirstlist[colpagelist].pagelist}"/>
																					 <input type="button" name="submit" value="Submit" class="btn btn-success"  onclick="googleScriptSave('{$columnpagefirstlist[colpagelist].pagelist}');">
																					</form>  
																				</div>-->
																				
																				{$objCommon->getImageGoogle($columnpagefirstlist[colpagelist].pagelist)}
																				<div id="images_{$columnpagefirstlist[colpagelist].pagelist}" class="row-fluid" {if $columnpagefirstlist[colpagelist].google_ads eq 'image'}  style="display:block;" {else}style="display:none;" {/if}>
																			 {if !$images_google}
																				
																				{*<div id='preview_{$columnpagefirstlist[colpagelist].pagelist}'>
																				</div>*}
																				<div id='imageloadstatus_{$columnpagefirstlist[colpagelist].pagelist}' style='display:none'>
																				<img src="{$SITE_BASEURL}/images/loadings.gif" alt="Uploading...."/></div>
																				<form id="imageform_{$columnpagefirstlist[colpagelist].pagelist}" class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxGoogleImageUpload.php' style="clear:both">
																					<label id='imageloadbutton_{$columnpagefirstlist[colpagelist].pagelist}' class="input input-file" style="display:block; height:135px;" for="file">
																						<div class="button">
																							<input type='file' name="photos[]" id="photoimg_{$columnpagefirstlist[colpagelist].pagelist}" class="inputfile" onchange="imageUpdatingProcess('{$columnpagefirstlist[colpagelist].pagelist}');"/>
																						</div>
																						<input type='hidden' name="image" id="image" value="image"/>
																						<input type='hidden' name="page_list_id" value="{$columnpagefirstlist[colpagelist].pagelist}"/>
																					</label>
																				</form>
																			{else}
																			  
																				<div class="googAddOption">
																					<!--<img width="{if $columnpagefirstlist[colpagelist].img_width}{$columnpagefirstlist[colpagelist].img_width}{else}100%{/if}" height="{if $columnpagefirstlist[colpagelist].img_height}{$columnpagefirstlist[colpagelist].img_height}{else}180{/if}" src="{$SITE_GOOGLE_IMAGES_URL}/{$images_google.0.google_image_name}"> -->
																					<img width="{if $columnpagefirstlist[colpagelist].img_width}{$columnpagefirstlist[colpagelist].img_width}{else}100%{/if}" src="{$SITE_GOOGLE_IMAGES_URL}/{$images_google.0.google_image_name}"> 
																					<div class="googAddDelete">
																						<a class="galleryimage" onclick="deletegoogleImage('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','{$images_google.0.google_image_id }','{$images_google.0.google_image_name}');">
																							<i class="fa fa-trash-o"></i>
																						</a>
																					</div>
																					<a class="googAddUrl" onclick="showAddUrl('urladd_{$columnpagefirstlist[colpagelist].pagelist}');"> {$LANG.add_url_name}</a>
																				</div>
																				
																				<div id="urladd_{$columnpagefirstlist[colpagelist].pagelist}" class="addGoogPop" style="display:none;">
																					<div class="leftside">
																						<i class="fa fa-external-link fontSize42"></i>
																						<label>{$LANG.add_url_name}</label>
																					</div>
																					<div class="rightside">
																						<form name="imagetxt_{$columnpagefirstlist[colpagelist].pagelist}" class="no-mar"  id="imagetxt_{$columnpagefirstlist[colpagelist].pagelist}" method="post" action="">
																							<label>{$LANG.url_name}</label>
																							<input type="text" name="image_text_{$columnpagefirstlist[colpagelist].pagelist}" id="image_text_{$columnpagefirstlist[colpagelist].pagelist}" class="google_url_text" value="{$images_google.0.google_url}">
																							<input type='hidden' name="page_list_id" id="page_list_id" value="{$columnpagefirstlist[colpagelist].pagelist}"/>
																							<input type='hidden' name="google_image_id" id="google_image_id" value="{$images_google.0.google_image_id}"/>
																							
																							<div class="mapButton clearfix">
																								 <input type="button" name="submit" value="Submit" class="btn btn-success"  onclick="googleImageUrlSave('{$columnpagefirstlist[colpagelist].pagelist}');">
																								<input type="button" value="cancel" class="btn btn-danger pull-right addGoogCancel" />
									
																							</div>
																					   </form>
																					 </div>
																				</div>											 
																			{/if}
																			</div>
																		</li>
																	{/if}
																	<!--Google Adsense End-->
																	
																{/section}
																{else}
																 <div class="columnDragTxt">drag element here</div>
																{/if}
																</ul>
															<!---column sortable--->	
														</td>
													 {/section}
													</tr>
												</table>
												</div>
											</li>		
											{/if}
											</div>
											{if $pagefirstlist[pagelist].title_select}
											<li id="page_{$pagefirstlist[pagelist].pagelist}" class="activemove theme2bginn">								
												<div class="form_element_control">
													<div class="controlMidOuter">
														<div class="controlMidBg"></div>
													</div>
													<div class="deleteOuter">
														<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','title_select');"><i class="fa fa-trash-o"></i></div>
													</div>
												</div>
												<div id="buildTitle_{$pagefirstlist[pagelist].pagelist}" onmouseout="updateTitle('buildTitle_{$pagefirstlist[pagelist].pagelist}');" class="themehead {if $pagefirstlist[pagelist].text_title eq ''}clickheretext contenttext {/if}contentedit main_title" style="{if $pagefirstlist[pagelist].buildTitle_fontsize}font-size:{$pagefirstlist[pagelist].buildTitle_fontsize}px;{/if}{if $pagefirstlist[pagelist].buildTitle_fontcolor}color:{$pagefirstlist[pagelist].buildTitle_fontcolor}{/if}{if $pagefirstlist[pagelist].main_title_font_style}font-family:{$pagefirstlist[pagelist].main_title_font_style};{/if}{if $pagefirstlist[pagelist].main_title_line_size}line-height:{$pagefirstlist[pagelist].main_title_line_size}px;{/if}" contenteditable="true"  data-ph="Başlığı Düzenle" >{if $pagefirstlist[pagelist].text_title}{$pagefirstlist[pagelist].text_title}{/if}</div>
											</li>
											{/if}
											{if $pagefirstlist[pagelist].description_select}
											<li id="page_{$pagefirstlist[pagelist].pagelist}" class="activemove theme2bginn">
												<div class="form_element_control">
													<div class="controlMidOuter">
														<div class="controlMidBg"></div>
													</div>
													<div class="deleteOuter">
														<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','description_select');"><i class="fa fa-trash-o"></i></div>
													</div>
												</div>								
												<div id="buildPara_{$pagefirstlist[pagelist].pagelist}" class="{if $pagefirstlist[pagelist].text_description eq ''}clickheretext contenttext {/if}contentedit main_paragraph" style="{if $pagefirstlist[pagelist].buildPara_fontsize}font-size:{$pagefirstlist[pagelist].buildPara_fontsize}px;{/if}{if $pagefirstlist[pagelist].buildPara_fontcolor}color:{$pagefirstlist[pagelist].buildPara_fontcolor}{/if}{if $pagefirstlist[pagelist].main_paragraph_font_style}font-family:{$pagefirstlist[pagelist].main_paragraph_font_style};{/if}{if $pagefirstlist[pagelist].main_paragraph_line_size}line-height:{$pagefirstlist[pagelist].main_paragraph_line_size}px;{/if}" onmouseout="updateDesc('buildPara_{$pagefirstlist[pagelist].pagelist}');" contenteditable="true"  data-ph="Paragrafı Düzenle" >{if $pagefirstlist[pagelist].text_description}{$pagefirstlist[pagelist].text_description}{/if}</div>					
											</li>
											{/if}
											{if $pagefirstlist[pagelist].divider}
												<li id="page_{$pagefirstlist[pagelist].pagelist}" class="activemove theme2bginn">
													<div class="form_element_control">
														<div class="controlMidOuter">
															<div class="controlMidBg"></div>
														</div>
														<div class="deleteOuter">
															<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','divider');"><i class="fa fa-trash-o"></i></div>
														</div>
													</div>
													<div id="buildDivide" class="">
														<hr />
													</div>
												</li>
											{/if}
											{if $pagefirstlist[pagelist].image_multiple_select}
												{$objCommon->getImage($pagefirstlist[pagelist].pagelist,'singletext')}
												<li id="page_{$pagefirstlist[pagelist].pagelist}" class="activemove theme2bginn">
													<div class="form_element_control">
														<div class="controlMidOuter">
															<div class="controlMidBg"></div>
														</div>
														<div class="deleteOuter">
															<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','image_multiple_select');"><i class="fa fa-trash-o"></i></div>
														</div>
													</div>
													<div id="buildImgTxt">
														<div class="row-fluid ">
															<div class="span3 buildImgTxt">
																{if !$images}	
																	{*<div id='preview_{$pagefirstlist[pagelist].pagelist}'>
																	</div>*}
																	<div id='imageloadstatus_{$pagefirstlist[pagelist].pagelist}' style='display:none'>
                                                                    	<div class="laodImgChange">
                                                                        	<img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/>
                                                                           </div>
                                                                     </div>
																	<form id="imageform_{$pagefirstlist[pagelist].pagelist}" method="post" class="form-horizontal sky-form" enctype="multipart/form-data" action='ajaxImageUpload.php' style="clear:both">
																		<label id='imageloadbutton_{$pagefirstlist[pagelist].pagelist}' class="input input-file" style="display:block; height:135px;" for="file">
																			<div class="button">
																				<input type='file' name="photos[]" id="photoimg_{$pagefirstlist[pagelist].pagelist}" class="inputfile" onchange="imageUpdatingProcess('{$pagefirstlist[pagelist].pagelist}');"/>
																			</div>
																			<input type='hidden' name="status" value="singletext"/>
																			<input type='hidden' name="page_list_id" value="{$pagefirstlist[pagelist].pagelist}"/>
																		</label>
																	</form>
                                                                <!--<div class="hideupload">
                                                    
                                                                    <div id="mulitplefileuploader_{$pagefirstlist[pagelist].pagelist}">Upload</div>
                                                                    <img width="93%" height="180" class="uploadedImg" id="image_{$pagefirstlist[pagelist].pagelist}" src="" />
                                                                    <div id="progressbar">0 %</div>
                                                                    
                                                                </div>-->
																{else}
																	<div class="uploadImgBg">
																		<img class="imagechange" width="93%" height="180" src="{$SITE_DOMAIN_IMAGES_URL}/{$images}">
																		{*<div id='preview_{$pagefirstlist[pagelist].pagelist}'>
																		</div>*}
																		<div id='imageloadstatus_{$pagefirstlist[pagelist].pagelist}' style='display:none'><div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div></div>
																		<form id="imageform_{$pagefirstlist[pagelist].pagelist}" method="post" class="form-horizontal sky-form uploadsecbg" style="margin:-37px 0 0;" enctype="multipart/form-data" action='ajaxImageUpload.php' style="clear:both">
																			<label id='imageloadbutton_{$pagefirstlist[pagelist].pagelist}' class="input input-file" style="display:block" for="file">
																				<div class="button">
																					<input type='file' name="photos[]" id="photoimg_{$pagefirstlist[pagelist].pagelist}" class="inputfile" onchange="imageUpdatingProcess('{$pagefirstlist[pagelist].pagelist}');"/>
																				</div>
																				<input type='hidden' name="status" value="singletext"/>
																				<input type='hidden' name="page_list_id" value="{$pagefirstlist[pagelist].pagelist}"/>
																			</label>
																		</form>
																	</div>
																{/if}
															</div>
															<div class="span9">
																<div id="imgtitle_{$pagefirstlist[pagelist].pagelist}" onmouseout="updateImgTitle('imgtitle_{$pagefirstlist[pagelist].pagelist}');" class="themehead borNone {if $pagefirstlist[pagelist].image_text eq ''}clickheretext contenttext {/if}contentedit main_imagetitle" style="{if $pagefirstlist[pagelist].imgtitle_fontsize}font-size:{$pagefirstlist[pagelist].imgtitle_fontsize}px;{/if}{if $pagefirstlist[pagelist].imgtitle_fontcolor}color:{$pagefirstlist[pagelist].imgtitle_fontcolor}{/if}{if $pagefirstlist[pagelist].main_imagetitle_font_style}font-family:{$pagefirstlist[pagelist].main_imagetitle_font_style};{/if}{if $pagefirstlist[pagelist].main_imagetitle_line_size}line-height:{$pagefirstlist[pagelist].main_imagetitle_line_size}px;{/if}{if $pagefirstlist[pagelist].main_imagetitle_font_size}font-size:{$pagefirstlist[pagelist].main_imagetitle_font_size}px;{/if}" contenteditable="true"  data-ph="Resim Seç ve Metni Düzenle" >{if $pagefirstlist[pagelist].image_text}{$pagefirstlist[pagelist].image_text}{/if}</div> 
															</div>
														</div>
													</div>
												</li>
											{/if}
											{if $pagefirstlist[pagelist].image_select}
											{$objCommon->getImage($pagefirstlist[pagelist].pagelist)}
											<li id="page_{$pagefirstlist[pagelist].pagelist}" class="activemove theme2bginn">
												<div class="form_element_control">
													<div class="controlMidOuter">
														<div class="controlMidBg"></div>
													</div>
													<div class="deleteOuter">
														<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','image_select');"><i class="fa fa-trash-o"></i></div>
													</div>
												</div>
												<div id="buildImg_{$pagefirstlist[pagelist].pagelist}" class="row-fluid buildimage" title="{$pagefirstlist[pagelist].pagelist}" style="">
													{if !$images}
													{*<div id='preview_{$pagefirstlist[pagelist].pagelist}'>
													</div>*}
													<div id='imageloadstatus_{$pagefirstlist[pagelist].pagelist}' style='display:none'>
														<div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div>
                                                    </div>
													<form id="imageform_{$pagefirstlist[pagelist].pagelist}" class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxImageUpload.php' style="clear:both">
														<label id='imageloadbutton_{$pagefirstlist[pagelist].pagelist}' class="input input-file" style="display:block; height:135px;" for="file">
															<div class="button">
																	<input type='file' name="photos[]" id="photoimg_{$pagefirstlist[pagelist].pagelist}" class="inputfile" onchange="imageUpdatingProcess('{$pagefirstlist[pagelist].pagelist}');"/>
															</div>
															<input type='hidden' name="status" value="single"/>
															<input type='hidden' name="page_list_id" value="{$pagefirstlist[pagelist].pagelist}"/>
														</label>
													</form>
                                                    <input type="hidden" name="imagesuploadNumbers" id="{$pagefirstlist[pagelist].pagelist}"/>
                                                    <!--<div class="hideupload">
                                                    	
                                                        <div id="mulitplefileuploader_{$pagefirstlist[pagelist].pagelist}">Upload</div>
                                                        <img width="93%" height="180" class="uploadedImg" id="image_{$pagefirstlist[pagelist].pagelist}" src="" />
                                                        <div id="progressbar">0 %</div>
                                                        
                                                    </div>-->
                                                    
                                                    
                                                    
                                                    
												{else}
													<div class="uploadImgBg">
														<img class="imagechange" width="{if $pagefirstlist[pagelist].img_width}{$pagefirstlist[pagelist].img_width}{else}100%{/if}" height="{if $pagefirstlist[pagelist].img_height}{$pagefirstlist[pagelist].img_height}{/if}" src="{$SITE_DOMAIN_IMAGES_URL}/{$images}">
														{*<div id='preview_{$pagefirstlist[pagelist].pagelist}'>
														</div>*}
														<div id='imageloadstatus_{$pagefirstlist[pagelist].pagelist}' style='display:none'><div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div></div>
														<form id="imageform_{$pagefirstlist[pagelist].pagelist}" class="form-horizontal sky-form uploadsecbg" style="margin:-37px 0 0;" method="post" enctype="multipart/form-data" action='ajaxImageUpload.php' style="clear:both">
															<label id='imageloadbutton_{$pagefirstlist[pagelist].pagelist}' class="input input-file" style="display:block" for="file">
																<div class="button">
																	<input type='file' name="photos[]" id="photoimg_{$pagefirstlist[pagelist].pagelist}" class="inputfile" onchange="	('{$pagefirstlist[pagelist].pagelist}');"/>
																</div>
																<input type='hidden' name="status" value="single"/>
																<input type='hidden' name="page_list_id" value="{$pagefirstlist[pagelist].pagelist}"/>
															</label>
														</form>
													</div>
												{/if}
												</div>
											</li>
											{/if}
											{if $pagefirstlist[pagelist].contact_form}
											 {$objCommon->getAllContactDetails($pagefirstlist[pagelist].pagelist)}
											<li id="page_{$pagefirstlist[pagelist].pagelist}" class="activemove theme2bginn">
												<div class="form_element_control">
													<div class="controlMidOuter">
														<div class="controlMidBg"></div>
													</div>
													<div class="deleteOuter">
														<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','contact_form');"><i class="fa fa-trash-o"></i></div>
													</div>
												</div>
												<div id="" class="contactform">
													<!--<div  onclick="showContactMail();">
														Form Entries
													</div>-->
													
													<a data-toggle="modal" href="#ModalFormEntry_{$pagefirstlist[pagelist].pagelist}" class="formEntryButton pull-right">Form Entries</a>
													<div class="themeheadsec contentedit {if $contactlist.0.title_head eq ''}clickheretext contenttext {/if}contactTxt contactHead" style="{if $contactlist.0.buildContact_fontsize}font-size:{$contactlist.0.buildContact_fontsize}px;{/if}{if $contactlist.0.buildContact_fontcolor}color:{$contactlist.0.buildContact_fontcolor}{/if}{if $contactlist.0.buildContact_font_style}font-family:{$contactlist.0.buildContact_font_style};{/if}{if $contactlist.0.buildContact_line_size}line-height:{$contactlist.0.buildContact_line_size}px;{/if}{if $contactlist.0.buildContact_font_size}font-size:{$contactlist.0.buildContact_font_size}px;{/if}" id="buildContact_{$contactlist.0.id}" onmouseout="updateContactFormTitle('buildContact_{$contactlist.0.id}');" data-ph="Edit Heading Here">{if $contactlist.0.title_head}{$contactlist.0.title_head}{/if}</div>
													<div class="row-fluid"> 	
														<div class="span4">
															<div class="span12 contactLisNav"><span onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','1');">{$contactlist.0.text1}</span>{if $contactlist.0.text1_required}<span class="red">*</span>{/if}</div>
															<input type="text" value="" placeholder="{$contactlist.0.text1}" class="contacttxtbx" style="{if $contactlist.0.text1_spacing eq 'None'}margin:0px;{elseif $contactlist.0.text1_spacing eq 'Small'}margin:5px 0px;{elseif $contactlist.0.text1_spacing eq 'Medium'}margin:10px 0px;{elseif $contactlist.0.text1_spacing eq 'Large'}margin:15px 0px;{/if}{if $contactlist.0.text1_width eq 'Small'}width:50%;{elseif $contactlist.0.text1_width eq 'Medium'}width:70%;{elseif $contactlist.0.text1_width eq 'Large'}width:100%;{/if}" onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','1');">{if $contactlist.0.text1_instruction}<span class="instruction-right left">{$contactlist.0.text1_instruction}</span>{/if}
														</div>
														<div class="span4">
															<div class="span12 contactLisNav"><span onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','2');">{$contactlist.0.text2}</span> {if $contactlist.0.text2_required}<span class="red">*</span>{/if}</div>
															<input type="text" value="" placeholder="{$contactlist.0.text2}" class="contacttxtbx" style="{if $contactlist.0.text2_spacing eq 'None'}margin:0px;{elseif $contactlist.0.text2_spacing eq 'Small'}margin:5px 0px;{elseif $contactlist.0.text2_spacing eq 'Medium'}margin:10px 0px;{elseif $contactlist.0.text2_spacing eq 'Large'}margin:15px 0px;{/if}{if $contactlist.0.text2_width eq 'Small'}width:50%;{elseif $contactlist.0.text2_width eq 'Medium'}width:70%;{elseif $contactlist.0.text2_width eq 'Large'}width:100%;{/if}" onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','2');">{if $contactlist.0.text2_instruction}<span class="instruction-right left">{$contactlist.0.text2_instruction}</span>{/if}
														</div>
													</div>
													<div class="row-fluid marTop10">
														<div class="span12 contactLisNav"><span onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','3');">{$contactlist.0.text3}</span> {if $contactlist.0.text3_required}<span class="red">*</span>{/if}</div>
														<input type="text" value="" placeholder="{$contactlist.0.text3}" class="contacttxtbx" style="{if $contactlist.0.text3_spacing eq 'None'}margin:0px;{elseif $contactlist.0.text3_spacing eq 'Small'}margin:5px 0px;{elseif $contactlist.0.text3_spacing eq 'Medium'}margin:10px 0px;{elseif $contactlist.0.text3_spacing eq 'Large'}margin:15px 0px;{/if}{if $contactlist.0.text3_width eq 'Small'}width:50%;{elseif $contactlist.0.text3_width eq 'Medium'}width:70%;{elseif $contactlist.0.text3_width eq 'Large'}width:100%;{/if}" onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','3');">{if $contactlist.0.text3_instruction}<span class="instruction-right left">{$contactlist.0.text3_instruction}</span>{/if}
													</div>
													<div class="row-fluid marTop10">
														<div class="span12 contactLisNav"><span onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','4');">{$contactlist.0.text4}</span>{if $contactlist.0.text4_required}<span class="red">*</span>{/if}</div>
														<textarea class="contacttxtarea" style="{if $contactlist.0.text4_spacing eq 'None'}margin:0px;{elseif $contactlist.0.text4_spacing eq 'Small'}margin:5px 0px;{elseif $contactlist.0.text4_spacing eq 'Medium'}margin:10px 0px;{elseif $contactlist.0.text4_spacing eq 'Large'}margin:15px 0px;{/if}{if $contactlist.0.text4_width eq 'Small'}width:50%;{elseif $contactlist.0.text4_width eq 'Medium'}width:70%;{elseif $contactlist.0.text4_width eq 'Large'}width:100%;{/if}" onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','4');"></textarea>{if $contactlist.0.text4_instruction}<span class="instruction-right left">{$contactlist.0.text4_instruction}</span>{/if}
													</div>
													<div class="row-fluid marTop10">
														<div class="buildPagePostButtonLeft"><input type="submit" value="Submit" class="buildPagePostButton"> </div>
													</div>
												</div>
												
												{*<div id="showMailContact" style="display:none;">
												{$objCommon->getEmai($pagefirstlist.0.domain_id,$pagefirstlist.0.page_id)}
													<form name="conatctmail" method="post">
														<input type="text" name="contactmail" id="contactmail" value="{$mailid}" >
														<input type="button" name="submit" value="submit" onclick="changeMail();">
													</form>
												</div>*}
												<div id="modals">
													<div id="ModalFormEntry_{$pagefirstlist[pagelist].pagelist}" class="modal hide">
														<div class="formEntryPopForm clearfix">
															<div id="errtext"></div>
															{$objCommon->getEmai($pagefirstlist[pagelist].pagelist)}
															<form name="conatctmail_{$pagefirstlist[pagelist].pagelist}" method="post" class="no-mar">
																<div id="errtext"></div>
																<input type="text" name="contactmail" id="contactmail_{$pagefirstlist[pagelist].pagelist}" value="{$mailid}" >
																<input type="button" class="btn btn-info pull-right marTop10" name="submit" value="submit" onclick="changeMail('{$pagefirstlist[pagelist].pagelist}');">
															</form>
															<button class="close formEntryPopFormClose btn marTop10" data-dismiss="modal" aria-hidden="true">close</button>
														</div>
													</div>
												</div>
												<div id="contactForm"></div>	
											</li>
											{/if}
											{if $pagefirstlist[pagelist].social_plugins}
											{$objCommon->getSocialDetails($pagefirstlist[pagelist].pagelist)}
											<li id="page_{$pagefirstlist[pagelist].pagelist}" class="activemove theme2bginn">
												<div class="form_element_control">
													<div class="controlMidOuter">
														<div class="controlMidBg"></div>
													</div>
													<div class="deleteOuter">
														<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','social_plugins');"><i class="fa fa-trash-o"></i></div>
													</div>
												</div>
												<div class="moveicon"></div>
												<div id="buildSocial_{$pagefirstlist[pagelist].pagelist}" class="buildSocialIcon">
													<input type="button" class="fbicon" value="" />
													<input type="button" class="twittericon" value="" />
													<input type="button" class="linkedicon" value="" />
													<input type="button" class="mailicon" value="" />
												</div>
												
												<div id="pluginShow_{$pagefirstlist[pagelist].pagelist}" class="socialPop" style="display:none;">
													<div class="leftside">
														<i class="fa fa-users fontSize42"></i>
														<label>{$LANG.social_link_name}</label>
													</div>
													<div class="rightside">
														<form class="no-mar" id="socialplugin_{$pagefirstlist[pagelist].pagelist}" name="socialplugin" method="post">
															<input type="hidden" name="domain_id" id="domain_id_{$pagefirstlist[pagelist].pagelist}" value="{$pagefirstlist[pagelist].domain_id}">
															<input type="hidden" name="page_id" id="page_id_{$pagefirstlist[pagelist].pagelist}" value="{$pagefirstlist[pagelist].page_id}">
															<input type="hidden" name="page_list_id" id="page_list_id_{$pagefirstlist[pagelist].pagelist}" value="{$pagefirstlist[pagelist].pagelist}">
															<div class="socialInn clearfix">
																<span><i class="fa fa-facebook"></i></span>
																<input type="text" name="fb" value="{$socialpagelist.0.fb}" id="fb_{$pagefirstlist[pagelist].pagelist}" placeholder="http://facebook.com/example">
															</div>
															<div class="socialInn clearfix">
																<span><i class="fa fa fa-tumblr"></i></span>
																<input type="text" name="tw" value="{$socialpagelist.0.twitter}" id="tw_{$pagefirstlist[pagelist].pagelist}" placeholder="http://twitter.com/example">
															</div>
															<div class="socialInn clearfix">
																<span><i class="fa fa-linkedin"></i></span>
																<input type="text" name="ln" value="{$socialpagelist.0.linkedin}" id="ln_{$pagefirstlist[pagelist].pagelist}" placeholder="http://linkedin.com/in/example">
															</div>
															<div class="socialInn clearfix">
																<span><i class="fa fa fa-envelope-o"></i></span>
																<input type="text" name="mail" value="{$socialpagelist.0.mail}" id="mail_{$pagefirstlist[pagelist].pagelist}" placeholder="example@example.com">
															</div>
															<div class="mapButton clearfix">
																<input type="button" class="btn btn-success" name="submit" value="Save" onclick="updateSocial('{$pagefirstlist[pagelist].pagelist}');">
																<input type="button" class="btn btn-danger pull-right addGoogCancel" name="cancel" value="Cancel" onclick="$('#pluginShow_{$pagefirstlist[pagelist].pagelist}').hide();">
															</div>
													   </form>
													 </div>
												</div>
											</li>
											{/if}
											{if $pagefirstlist[pagelist].youtube_video}
												<li id="page_{$pagefirstlist[pagelist].pagelist}" class="activemove theme2bginn">
													<div class="form_element_control">
														<div class="controlMidOuter">
															<div class="controlMidBg" onclick="showVideoPopup('youtubelabelsPopup_{$pagefirstlist[pagelist].pagelist}');"></div>
														</div>
														<div class="deleteOuter">
															<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','youtube_video');"><i class="fa fa-trash-o"></i></div>
														</div>
													</div>
													{$objCommon->getYoutubeDetails($pagefirstlist[pagelist].pagelist)}
													<div class="youtubeDiv clearfix" id="youtubeDiv_{$pagefirstlist[pagelist].pagelist}" onclick="showVideoPopup('youtubelabelsPopup_{$pagefirstlist[pagelist].pagelist}');" style="display:block;{if $youtubelist.0.youtube_spacing eq 'None'}margin:0px;{elseif $youtubelist.0.youtube_spacing eq 'Small'}margin:5px 0px;{elseif $youtubelist.0.youtube_spacing eq 'Medium'}margin:10px 0px;{elseif $youtubelist.0.youtube_spacing eq 'Large'}margin:15px 0px;{/if}{if $youtubelist.0.youtube_width eq 'Small'}width:50%;{elseif $youtubelist.0.youtube_width eq 'Medium'}width:70%;{elseif $youtubelist.0.youtube_width eq 'Large'}width:100%;{/if}">
														<iframe name="ifrm" id="ifrm" frameborder="0" allowfullscreen="" src="{$youtubelist.0.youtube_url}" width="100%" height="200"></iframe>	
													</div>
													<div class="youtubelabelsPopup" id="youtubelabelsPopup_{$pagefirstlist[pagelist].pagelist}" style="display:none;">
														<div class="youtubepopclose" onclick="popcloseforutubeurl('youtubelabelsPopup_{$pagefirstlist[pagelist].pagelist}');"></div>
														
														<form name="youtubefrm_{$pagefirstlist[pagelist].pagelist}" method="post">
															<div id="error_{$pagefirstlist[pagelist].pagelist}"></div>
															<div class="contactlabelsPopupLeft">
																<label>Youtube Video Url</label>
																<input type="text" class="videoUrl" name="videourl_{$pagefirstlist[pagelist].pagelist}" id="videourl_{$pagefirstlist[pagelist].pagelist}" value="{$youtubelist.0.youtube_url}"/>
															</div>
															<div class="contactlabelsPopupRight">
																<div class="contactlabelsPopupRightInner">
																	<label>{$LANG.spacing_name}</label>
																	<select class="spacingOption" name="spacing" id="spacing_{$pagefirstlist[pagelist].pagelist}">
																		<option value="{$LANG.for_none_name}" {if $youtubelist.0.youtube_spacing eq 'None'}selected="selected"{/if}>{$LANG.for_none_name}</option>
																		<option value="{$LANG.small_name}" {if $youtubelist.0.youtube_spacing eq 'Small'}selected="selected"{/if}>{$LANG.small_name}</option>
																		<option value="{$LANG.medium_name}" {if $youtubelist.0.youtube_spacing eq 'Medium'}selected="selected"{/if}>{$LANG.medium_name}</option>
																		<option value="{$LANG.large_name}" {if $youtubelist.0.youtube_spacing eq 'Large'}selected="selected"{/if}>{$LANG.large_name}</option>
																	</select>
																	<label>Width</label>
																	<select class="widthOption" name="width_{$pagefirstlist[pagelist].pagelist}" id="width_{$pagefirstlist[pagelist].pagelist}">
																		<option value="Small" {if $youtubelist.0.youtube_width eq 'Small'}selected="selected"{/if}>Small</option>
																		<option value="Medium" {if $youtubelist.0.youtube_width eq 'Medium'}selected="selected"{/if}>Medium</option>
																		<option value="Large" {if $youtubelist.0.youtube_width eq 'Large'}selected="selected"{/if}>Large</option>
																	</select>
																</div>
																<div>
																	<input type="button" value="save" class="videosubmit"  onclick="addYoutubeUrl('{$pagefirstlist[pagelist].pagelist}');" />
																</div>
															</div>
														</form>
													</div>
												</li>
											{/if}
											<!--Gallery Process Start-->
											{if $pagefirstlist[pagelist].gallery}
												 <li id="page_{$pagefirstlist[pagelist].pagelist}" class="activemove theme2bginn">
													<div class="form_element_control">
														<div class="controlMidOuter">
															<div class="controlMidBg"></div>
														</div>
														<div class="deleteOuter">
															<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','gallery');"><i class="fa fa-trash-o"></i></div>
														</div>
													</div>
													<div id="galImg_{$pagefirstlist[pagelist].pagelist}" class="row-fluid">
													 {$objCommon->getGalleryImage($smarty.session.domain_id,$smarty.session.page_id,$pagefirstlist[pagelist].pagelist)}
													 {if $images}
														 {section name="galimg" loop="$images"}
															<div class="imageGallery" style="{if $pagefirstlist[pagelist].gallery_column eq '2'}width: 49%;{elseif $pagefirstlist[pagelist].gallery_column eq '3'}width: 32%;{elseif $pagefirstlist[pagelist].gallery_column eq '4'}width: 24%;{elseif $pagefirstlist[pagelist].gallery_column eq '5'}width: 19%;{elseif $pagefirstlist[pagelist].gallery_column eq '6'}width: 15.5%;{else}{/if}{if $pagefirstlist[pagelist].gallery_spacing eq 'None'}margin: 0px;{elseif $pagefirstlist[pagelist].gallery_spacing eq 'Small'}margin: 5px 0px;{elseif $pagefirstlist[pagelist].gallery_spacing eq 'Medium'}margin: 10px 0px;{elseif $pagefirstlist[pagelist].gallery_spacing eq 'Large'}margin: 15px 0px;{else}margin: 0px;{/if}{if $pagefirstlist[pagelist].gallery_border eq 'None'}border: 0px solid rgb(221, 221, 221);{elseif $pagefirstlist[pagelist].gallery_border eq 'Thin'}border: 2px solid rgb(221, 221, 221);{elseif $pagefirstlist[pagelist].gallery_border eq 'Medium'}border: 3px solid rgb(221, 221, 221);{elseif $pagefirstlist[pagelist].gallery_border eq 'Thick'}border: 4px solid rgb(221, 221, 221);{else}border: 0px solid rgb(221, 221, 221);{/if}">
																<img width="100%" height="200" src="{$SITE_DOMAIN_IMAGES_URL}/{$images[galimg].gallery_name_thumb}">
																<div class="galleryimageInn">
																	<a onclick="deleteGalImg('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','{$images[galimg].gallery_id}','{$images[galimg].gallery_name}');" class="galleryimage"><i class="fa fa-trash-o"></i></a>
																	<a class="galleryimage galleryimagecomm" id="galleryPopup_{$pagefirstlist[pagelist].pagelist}" onclick="showGaleryPopup('galPopup_{$pagefirstlist[pagelist].pagelist}');"><i class="fa fa-plus-square-o"></i></a>
																</div>
															</div>
														 {/section}
														 
													 {else}
														{*<div id='preview_{$pagefirstlist[pagelist].pagelist}'>
														</div>*}
														<div id='imageloadstatus_{$pagefirstlist[pagelist].pagelist}' style='display:none'>
														<div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div></div>
														<form id="imageform_{$pagefirstlist[pagelist].pagelist}" class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxGalleryImageUpload.php' style="clear:both">
															<label id='imageloadbutton_{$pagefirstlist[pagelist].pagelist}' class="input input-file" style="display:block; height:135px;" for="file">
																<div class="button">
																	<input type='file' name="photos[]" id="photoimg_{$pagefirstlist[pagelist].pagelist}" class="inputfile" onchange="imageUpdatingProcess('{$pagefirstlist[pagelist].pagelist}');"/>
																</div>
																<input type='hidden' name="page_list_id" value="{$pagefirstlist[pagelist].pagelist}"/>
															</label>
														</form>
													  {/if}
													  </div>
													  <!--Gallery Image Popup-->
														<div id="galPopup_{$pagefirstlist[pagelist].pagelist}" style="display:none;" class="galleryimagepop">
															<form name="galleryPopup_{$pagefirstlist[pagelist].pagelist}" method="post">
																<div class="leftside">
																	<i class="fa fa-picture-o"></i>
																	<div class="clr"></div>
																	<a data-toggle="modal" href="#galimgpopup_{$pagefirstlist[pagelist].pagelist}">{$LANG.image_add_change}</a>
																</div>
																<div class="rightside">
																	<label>{$LANG.add_image_name}</label>
																	<select class="columnOption" name="column_{$pagefirstlist[pagelist].pagelist}" id="column_{$pagefirstlist[pagelist].pagelist}">
																		<option value="2" {if $pagefirstlist[pagelist].gallery_column eq '2'}selected{/if}>2</option>
																		<option value="3" {if $pagefirstlist[pagelist].gallery_column eq '3'}selected{/if}>3</option>
																		<option value="4" {if $pagefirstlist[pagelist].gallery_column eq '4'}selected{/if}>4</option>
																		<option value="5" {if $pagefirstlist[pagelist].gallery_column eq '5'}selected{/if}>5</option>
																		<option value="6" {if $pagefirstlist[pagelist].gallery_column eq '6'}selected{/if}>6</option>
																	</select>
																	<label>{$LANG.spacing_name}</label>
																	<select class="imagespacingOption" name="spacing_{$pagefirstlist[pagelist].pagelist}" id="spacing_{$pagefirstlist[pagelist].pagelist}">
																		<option value="{$LANG.for_none_name}" {if $pagefirstlist[pagelist].gallery_spacing eq 'None'}selected{/if}>{$LANG.for_none_name}</option>
																		<option value="{$LANG.small_name}" {if $pagefirstlist[pagelist].gallery_spacing eq 'Small'}selected{/if}>{$LANG.small_name}</option>
																		<option value="{$LANG.medium_name}" {if $pagefirstlist[pagelist].gallery_spacing eq 'Medium'}selected{/if}>{$LANG.medium_name}</option>
																		<option value="{$LANG.large_name}" {if $pagefirstlist[pagelist].gallery_spacing eq 'Large'}selected{/if}>{$LANG.large_name}</option>
																	</select>
																	<label>{$LANG.border_name}</label>
																	<select class="borderOption" name="border_{$pagefirstlist[pagelist].pagelist}" id="border_{$pagefirstlist[pagelist].pagelist}">
																		<option value="{$LANG.for_none_name}" {if $pagefirstlist[pagelist].gallery_border eq 'None'}selected{/if}>{$LANG.for_none_name}</option>
																		<option value="{$LANG.thin_name}" {if $pagefirstlist[pagelist].gallery_border eq 'Thin'}selected{/if}>{$LANG.thin_name}</option>
																		<option value="{$LANG.medium_name}" {if $pagefirstlist[pagelist].gallery_border eq 'Medium'}selected{/if}>{$LANG.medium_name}</option>
																		<option value="{$LANG.thick_name}" {if $pagefirstlist[pagelist].gallery_border eq 'Thick'}selected{/if}>{$LANG.thick_name}</option>
																	</select>
																	<!--<label>Cropping</label>
																	<select class="widthOption" name="croping_{$pagefirstlist[pagelist].pagelist}" id="croping_{$pagefirstlist[pagelist].pagelist}">
																		<option value="None">None</option>
																		<option value="Square">Square</option>
																		<option value="Rectangle">Rectangle</option>
																	</select>-->
																	<div class="clearfix">
																		<input type="button" class="btn btn-success" value="save" class="videosubmit"  onclick="addgalleryProcess('{$pagefirstlist[pagelist].pagelist}');" />
																		<input type="button" class="btn btn-danger pull-right gallerycancel" value="cancel" />
																	</div>
																</div>
															</form>
														</div>
														<div id="modals">
															<div id="galimgpopup_{$pagefirstlist[pagelist].pagelist}" class="modal fade hide" aria-hidden="false">
																<div id="image-chooser-nav">
																	<div id="image-chooser-nav-label">
																		<div>{$LANG.select_image_from}</div>
																	</div>
																	<div id="image-chooser-tab-computer" class="image-chooser-tab image-chooser-tab-selected">
																		<div class="colWhite">
																			<span></span> {$LANG.my_computer_name}
																		</div>
																	</div>
																	<div class="close PopCloseButt btn btn-danger" data-dismiss="modal">X</div>
																</div>
																<div id="browsebutton" class="popBrowseInner">
																	{*<div id='preview'></div>*}
																	<div id='imageloadstatus' style="display:none;">
																		<div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div>
																	</div>
																	<form id="galimagephotogal" class="form-horizontal sky-form no-mar" method="post" enctype="multipart/form-data" action='ajaxGalleryImageUpload.php' style="clear:both">
																		<div class="uploadTxtPop">{$LANG.click_here_to_upload}</div>
																		<label for="file" class="input input-file no-mar" style="display:block" name="imageloadbutton" id="imageloadbutton">
																			<div class="button">
																				<input type="file" class="hei180" value="" name="photos[]" id="galimgphoto">
																			</div>
																			<input type='hidden' name="page_list_id" value="{$pagefirstlist[pagelist].pagelist}"/>
																		</label>
																	</form>
																	
																</div>
															</div>
														</div>
														<!--Gallery Image Popup Ends-->
												</li>
											 {/if}
											<!--Gallery Process End-->
											{if $pagefirstlist[pagelist].map}
											 <li id="page_{$pagefirstlist[pagelist].pagelist}" onclick="showMapPopUp('mapframe_{$pagefirstlist[pagelist].pagelist}');" class="activemove theme2bginn">
												 <div class="form_element_control">
														<div class="controlMidOuter">
															<div class="controlMidBg"></div>
														</div>
														<div class="deleteOuter">
															<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','social_plugins');"><i class="fa fa-trash-o"></i></div>
														</div>
													</div>
												<div class="moveicon"></div>
												 <iframe name="ifrm" id="ifrm" frameborder="0" allowfullscreen="" src="gmapPage.php?zoom={$pagefirstlist[pagelist].map_zoom}&lat={$pagefirstlist[pagelist].map_lat}&lon={$pagefirstlist[pagelist].map_lon}&addr={$pagefirstlist[pagelist].map_addr}&page_list_id={$pagefirstlist[pagelist].pagelist}" width="100%" height="250"></iframe>
													<div id="mapframe_{$pagefirstlist[pagelist].pagelist}" class="mappop" style="display:none;">
														<div class="leftside">
															<img src="{$SITE_BASEURL}/images/map_marker.png" alt="map image"/>
															<label>{$LANG.map_name}</label>
														</div>
														<div class="rightside">
															<form name="mapframepopup_{$pagefirstlist[pagelist].pagelist}" class="no-mar" method="post">
																<label>{$LANG.address_name}</label>
																<input class="mapinputTxt" type="text" name="addr_{$pagefirstlist[pagelist].pagelist}" id="addr_{$pagefirstlist[pagelist].pagelist}" value="{$pagefirstlist[pagelist].map_addr}">
																<label>{$LANG.zoom_name}</label>
																{*<input class="mapinputTxt" type="text" name="zoom_{$pagefirstlist[pagelist].pagelist}" id="zoom_{$pagefirstlist[pagelist].pagelist}" value="{$pagefirstlist[pagelist].map_zoom}">*}
																<input class="mapinputTxt" type="number" min="1" max="17" name="zoom_{$pagefirstlist[pagelist].pagelist}" id="zoom_{$pagefirstlist[pagelist].pagelist}"  value="{$pagefirstlist[pagelist].map_zoom}" onKeyPress="keypress(event);">
																<label>latitude</label>
																<input class="mapinputTxt" type="text" name="lat_{$pagefirstlist[pagelist].pagelist}" id="lat_{$pagefirstlist[pagelist].pagelist}" value="{$pagefirstlist[pagelist].map_lat}">
																<label>longtitude</label>
																<input class="mapinputTxt" type="text" name="lon_{$pagefirstlist[pagelist].pagelist}" id="lon_{$pagefirstlist[pagelist].pagelist}" value="{$pagefirstlist[pagelist].map_lon}">
																<div class="mapButton clearfix">
																	<input type="button" value="save" class="btn btn-success"  onclick="addMapProcess('{$pagefirstlist[pagelist].pagelist}');" />
																	<input type="button" value="cancel" class="btn btn-danger pull-right mapcancel" />
																</div>
														   </form>
														 </div>
													</div>
												 </li>
											{/if}
											<!--Slider Process Start-->
											{if $pagefirstlist[pagelist].slider}
											 <li id="page_{$pagefirstlist[pagelist].pagelist}" class="activemove theme2bginn">
												<div class="form_element_control">
													<div class="controlMidOuter">
														<div class="controlMidBg"></div>
													</div>
													<div class="deleteOuter">
														<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','slider');"><i class="fa fa-trash-o"></i></div>
													</div>
												</div>
												<div id="sliImg_{$pagefirstlist[pagelist].pagelist}" class="row-fluid hoverSlide">
												 {$objCommon->getSliderImage($smarty.session.domain_id,$smarty.session.page_id,$pagefirstlist[pagelist].pagelist)}
												 {if $images}
													 <div id="slider" class="nivoSlider">
														 {section name="sliimg" loop="$images"}
															<div class="imageSlider">
																<img width="100%" height="300" src="{$SITE_DOMAIN_IMAGES_URL}/{$images[sliimg].slider_images}">
																<div class="slideimageInn">
																	<a onclick="deleteSliImg('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','{$images[sliimg].slider_id}','{$images[sliimg].slider_images}');" class="galleryimage"><i class="fa fa-trash-o"></i></a>
																	
																</div>
															</div>
														 {/section}
													 </div>
													 <a data-toggle="modal" class="hoverSlideShow" href="#slimgpopup_{$pagefirstlist[pagelist].pagelist}">
														{$LANG.add_image_name}
													 </a>											 
													 <div id="modals">
														<div id="slimgpopup_{$pagefirstlist[pagelist].pagelist}" class="modal fade hide" aria-hidden="false">
															<div id="image-chooser-nav">
																<div id="image-chooser-nav-label">
																	<div>{$LANG.select_image_from}</div>
																</div>
																<div id="image-chooser-tab-computer" class="image-chooser-tab image-chooser-tab-selected">
																	<div class="colWhite">
																		<span></span> {$LANG.my_computer_name}
																	</div>
																</div>
																<div class="close PopCloseButt btn btn-danger" data-dismiss="modal">X</div>
															</div>
															<div id="browsebutton" class="popBrowseInner">
																{*<div id='preview'></div>*}
																<div id='imageloadstatus' style="display:none;">
																	<div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div>
																</div>
																<form id="slimagephotogal" class="form-horizontal sky-form no-mar" method="post" enctype="multipart/form-data" action='ajaxSliderImageUpload.php' style="clear:both">
																	<div class="uploadTxtPop">{$LANG.click_here_to_upload}</div>
																	<div class="">{$LANG.upload_image_max_width_and_height}</div>
																	<label for="file" class="input input-file no-mar" style="display:block" name="imageloadbutton" id="imageloadbutton">
																		<div class="button">
																			<input type="file" class="hei180" value="" name="photos[]" id="slimgphoto">
																		</div>
																		<input type='hidden' name="page_list_id" value="{$pagefirstlist[pagelist].pagelist}"/>
																	</label>
																</form>
																
															</div>
														</div>
													</div>
												 {else}
													{*<div id='preview_{$pagefirstlist[pagelist].pagelist}'>
													</div>*}
													<div id='imageloadstatus_{$pagefirstlist[pagelist].pagelist}' style='display:none'>
													<div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div></div>
													<form id="imageform_{$pagefirstlist[pagelist].pagelist}" class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxSliderImageUpload.php' style="clear:both">
														<label id='imageloadbutton_{$pagefirstlist[pagelist].pagelist}' class="input input-file" style="display:block; height:135px;" for="file">
															<div class="button fff">
																<input type='file' name="photos[]" id="sliimg_{$pagefirstlist[pagelist].pagelist}" class="inputfile" onchange="imageUpdatingProcess('{$pagefirstlist[pagelist].pagelist}');"/>
															</div>
															<input type='hidden' name="page_list_id" value="{$pagefirstlist[pagelist].pagelist}"/>
														</label>
													</form>
												{/if}
											</div>
											</li>  
										 {/if}
										<!--Slider Process End-->
										
										<!--Google Adsense Start-->
										 
										{if $pagefirstlist[pagelist].google_adsense}
											<li id="page_{$pagefirstlist[pagelist].pagelist}" class="activemove theme2bginn">
													<div class="form_element_control">
														<div class="controlMidOuter">
															<div class="controlMidBg"></div>
														</div>
														<div class="deleteOuter">
															<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','google_adsense');"><i class="fa fa-trash-o"></i></div>
														</div>
													</div>
													<input type='radio' name="google_ads" id="google_ads_script_{$pagefirstlist[pagelist].pagelist}" class="scriptImgInput" value="script" {if $pagefirstlist[pagelist].google_ads eq 'script'}checked="checked" {/if} onclick="showDivForScript('script_{$pagefirstlist[pagelist].pagelist}','images_{$pagefirstlist[pagelist].pagelist}');">
													<label class="scriptImg" for="google_ads_script_{$pagefirstlist[pagelist].pagelist}" onclick="showDivForScript('script_{$pagefirstlist[pagelist].pagelist}','images_{$pagefirstlist[pagelist].pagelist}');">
														<div class="scriptInner">
															<div class="scriptImage">{$LANG.script_name}</div>
														</div>
													</label>
													<input type='radio' name="google_ads" id="google_ads_image_{$pagefirstlist[pagelist].pagelist}" class="imgaeImgInput" value="image" {if $pagefirstlist[pagelist].google_ads eq 'image'}checked="checked" {/if} onclick="showDivForScript('images_{$pagefirstlist[pagelist].pagelist}','script_{$pagefirstlist[pagelist].pagelist}');">
													<label class="imgaeImg" for="google_ads_image_{$pagefirstlist[pagelist].pagelist}" onclick="showDivForScript('images_{$pagefirstlist[pagelist].pagelist}','script_{$pagefirstlist[pagelist].pagelist}');">
														<div class="imageInner">
															<div class="imageHead">{$LANG.image_name}</div>
															<div class="imageImage"></div>
														</div>
													</label>
													
													<div id="script_{$pagefirstlist[pagelist].pagelist}" class="addGoogPop">
														<div class="leftside">
															<i class="fa fa-file-text-o fontSize42"></i>
															<label>{$LANG.script_name}</label>
														</div>
														<div class="rightside">
															<form name="script_google_{$pagefirstlist[pagelist].pagelist}" class="no-mar"  id="script_google_{$pagefirstlist[pagelist].pagelist}" method="post" action="">
																<label>{$LANG.adress_name}</label>
																<input type="hidden" name="script" id="script" value="script">
																 <textarea class="addGooginputTxt google_ansen" name="google_script_text" id="google_script_text_{$pagefirstlist[pagelist].pagelist}"   placeholder="Enter your script" >{$pagefirstlist[pagelist].google_script_text}</textarea>
																 <input type='hidden' name="page_list_id" id="page_list_id" value="{$pagefirstlist[pagelist].pagelist}"/>
																
																<div class="mapButton clearfix">
																	 <input type="button" name="submit" value="Submit" class="btn btn-success"  onclick="googleScriptSave('{$pagefirstlist[pagelist].pagelist}');">
																	<input type="button" value="cancel" class="btn btn-danger pull-right addGoogCancel" />
		
																</div>
														   </form>
														 </div>
													</div>
													
													<!--<div id="script_{$pagefirstlist[pagelist].pagelist}" {if $pagefirstlist[pagelist].google_ads eq 'script'}  style="display:block;"{else}style="display:none;" {/if}>
														<form name="script_google_{$pagefirstlist[pagelist].pagelist}"  id="script_google_{$pagefirstlist[pagelist].pagelist}" method="post" action="">
														<input type="hidden" name="script" id="script" value="script">
														 <textarea name="google_script_text" id="google_script_text_{$pagefirstlist[pagelist].pagelist}" class="google_ansen" placeholder="Enter your script" >{$pagefirstlist[pagelist].google_script_text}</textarea>
														 <input type='hidden' name="page_list_id" id="page_list_id" value="{$pagefirstlist[pagelist].pagelist}"/>
														 <input type="button" name="submit" value="Submit" class="btn btn-success"  onclick="googleScriptSave('{$pagefirstlist[pagelist].pagelist}');">
														</form>  
													</div>-->
													
													{$objCommon->getImageGoogle($pagefirstlist[pagelist].pagelist)}
													<div id="images_{$pagefirstlist[pagelist].pagelist}" class="row-fluid" {if $pagefirstlist[pagelist].google_ads eq 'image'}  style="display:block;" {else}style="display:none;" {/if}>
												 {if !$images_google}
													
													{*<div id='preview_{$pagefirstlist[pagelist].pagelist}'>
													</div>*}
													<div id='imageloadstatus_{$pagefirstlist[pagelist].pagelist}' style='display:none'>
													<img src="{$SITE_BASEURL}/images/loadings.gif" alt="Uploading...."/></div>
													<form id="imageform_{$pagefirstlist[pagelist].pagelist}" class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxGoogleImageUpload.php' style="clear:both">
														<label id='imageloadbutton_{$pagefirstlist[pagelist].pagelist}' class="input input-file" style="display:block; height:135px;" for="file">
															<div class="button">
																<input type='file' name="photos[]" id="photoimg_{$pagefirstlist[pagelist].pagelist}" class="inputfile" onchange="imageUpdatingProcess('{$pagefirstlist[pagelist].pagelist}');"/>
															</div>
															<input type='hidden' name="image" id="image" value="image"/>
															<input type='hidden' name="page_list_id" value="{$pagefirstlist[pagelist].pagelist}"/>
														</label>
													</form>
												{else}
												  
													<div class="googAddOption">
														<!--<img width="{if $pagefirstlist[pagelist].img_width}{$pagefirstlist[pagelist].img_width}{else}100%{/if}" height="{if $pagefirstlist[pagelist].img_height}{$pagefirstlist[pagelist].img_height}{else}180{/if}" src="{$SITE_GOOGLE_IMAGES_URL}/{$images_google.0.google_image_name}"> -->
														<img width="{if $pagefirstlist[pagelist].img_width}{$pagefirstlist[pagelist].img_width}{else}100%{/if}">
														<div class="googAddDelete">
															<a class="galleryimage" onclick="deletegoogleImage('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','{$images_google.0.google_image_id }','{$images_google.0.google_image_name}');">
																<i class="fa fa-trash-o"></i>
															</a>
														</div>
														<a class="googAddUrl" onclick="showAddUrl('urladd_{$pagefirstlist[pagelist].pagelist}');"> {$LANG.add_url_name}</a>
													</div>
													
													<div id="urladd_{$pagefirstlist[pagelist].pagelist}" class="addGoogPop" style="display:none;">
														<div class="leftside">
															<i class="fa fa-external-link fontSize42"></i>
															<label>{$LANG.add_url_name}</label>
														</div>
														<div class="rightside">
															<form name="imagetxt_{$pagefirstlist[pagelist].pagelist}" class="no-mar"  id="imagetxt_{$pagefirstlist[pagelist].pagelist}" method="post" action="">
																<label>{$LANG.url_name}</label>
																<input type="text" name="image_text_{$pagefirstlist[pagelist].pagelist}" id="image_text_{$pagefirstlist[pagelist].pagelist}" class="google_url_text" value="{$images_google.0.google_url}">
																<input type='hidden' name="page_list_id" id="page_list_id" value="{$pagefirstlist[pagelist].pagelist}"/>
																<input type='hidden' name="google_image_id" id="google_image_id" value="{$images_google.0.google_image_id}"/>
																
																<div class="mapButton clearfix">
																	 <input type="button" name="submit" value="Submit" class="btn btn-success"  onclick="googleImageUrlSave('{$pagefirstlist[pagelist].pagelist}');">
																	<input type="button" value="cancel" class="btn btn-danger pull-right addGoogCancel" />
		
																</div>
														   </form>
														 </div>
													</div>											 
												{/if}
												</div>
											</li>
										{/if}
										<!--Google Adsense End-->
									{sectionelse}
										<div id="dropBox2" class="dropBox2 clearfix"></div>
									{/section}
											
									</ul>
										
									</div>
									<div class="rightDiv" style="display:none;"></div>
								{/if}
								{else}
									<div id="dropBox" class="dropBox clearfix"></div>
									<div id="dropBox2" class="dropBox2 clearfix"></div>
								{/if}
									
							</div>	
							
						</div>
					</div>
					
				</div>
				<div class="blogPageBgInnerBottom"></div>
			</div>
			<div class="clearfix clr"></div>
			<div class="footrAlign">
				<div class="footerWrapTop8"></div>
				<div class="themewrapper1 themewrapper2 footerBgSource themewrapper3 themewrapper4 themewrapper5 themewrapper6">
					{if $subsdetails.0.subs_monthly_date  le $current_date}
						{$LANG.create_free_website} <a href="http://{$SITE_MAIN_DOMAIN}">{$LANG.webbxyz_name}</a><a class="footerbutton" href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}" target="_blank">{$LANG.edit_name}</a>
					{else}
						<div class="contentedit" contenteditable="true" onmouseout="return updateFooterContent();" id="footer_main">{if $settingpage.0.footer_content}{$settingpage.0.footer_content}{else}{$LANG.create_free_website} <a href="http://{$SITE_MAIN_DOMAIN}">{$LANG.webbxyz_name}</a>{/if}</div>
						 
					{/if}
				</div>
			</div>
		</div>
		{if $smarty.session.themename eq 'theme5'}
		</div>
		{/if}
	</div>
		<div class="formattoolBg">
			<span class="text-bold"><i class="fa fa-bold"></i></span>
			<span class="text-italic"><i class="fa fa-italic"></i></span>
			<span class="text-underline"><i class="fa fa-underline"></i></span>
			<span class="text-strikethrough"><i class="fa fa-strikethrough"></i></span>
			<span class="text-plusfontSize"><i class="fa fa-plus"></i></span>
			<span class="text-minusfontSize"><i class="fa fa-minus"></i></span>
			<span class="text-showPalette"><i class="fa fa-font"></i></span>
			{*<span class="text-link"><i class="fa fa-link"></i></span>*}
			<span class="text-align">
				<i class="fa fa-align-left"></i>
				<span class="text-alignType">
					<span class="textalignLeft"><i class="fa fa-align-left"></i></span>
					<span class="textalignRight"><i class="fa fa-align-right"></i></span>
					<span class="textalignCenter"><i class="fa fa-align-center"></i></span>
					<span class="textalignJustify"><i class="fa fa-align-justify"></i></span>
				</span>
			</span>
			{*<span class="text-remove"><i class="fa fa-eraser"></i></span>
			<span class="text-undo"><i class="fa fa-undo"></i></span>
			<span class="text-redo"><i class="fa fa-repeat"></i></span>*}				
		</div>		
		<div id="modals">
			<div id="editBannerImg" class="modal browseImgPopup fade hide">
				<div class="close PopCloseButt btn btn-danger" type="button" data-dismiss="modal" aria-hidden="true">X</div>
				<div class="changePopBrowseImg">{$LANG.click_here_or_edit_change_image}</div>
				<label for="file" class="input input-file" name="popupbrowsebanner" id="popupbrowsebanner">
					{*<div id='preview'>
					</div>*}
					<!--<div id='imageloadstatus' style='display:none'><img src="{$SITE_BASEURL}/images/loadings.gif" alt="Uploading...."/></div>-->
					
					<div id='imageloadstatus' style="display:none;">
						<div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div>
					</div>
											
					<form id="bannerimageform" class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxImageUpload.php' style="clear:both">
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
				</label>
			</div>
		</div>
		<div id="modals">
			<div id="sliderBannerImg" class="modal browseImgPopup fade hide">
				<div class="close PopCloseButt btn btn-danger" type="button" data-dismiss="modal" aria-hidden="true">X</div>
				<div class="changePopBrowseImg">{$LANG.click_here_or_edit_change_image}</div>
				<label for="file" class="input input-file" name="popupbrowseslider" id="popupbrowseslider">
					{*<div id='preview'>
					</div>*}
					<!--<div id='imageloadstatus' style='display:none'><img src="{$SITE_BASEURL}/images/loadings.gif" alt="Uploading...."/></div>-->
					
					<div id='imageloadstatus' style="display:none;">
						<div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div>
					</div>
											
					<form id="sliderimageform" class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxImageUpload.php' style="clear:both">
						<div class="dc">
							<label for="file" class="input input-file" style="display:block" name="imageloadbutton" id="imageloadbutton">
								<div class="maxWidtPopSlide">{$LANG.max_width_and_height}</div>
								<div class="button">
									<input type="file" value="" name="photos[]" id="photosliderimg" style="height:190px;">
									{$LANG.browse_name}
								</div>
								<input type='hidden' name="status" value="sliderimage"/>
							</label>
						</div>
					</form>
				</label>
			</div>
		</div>
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
				<!--<input type="button" class="btn btn-danger pull-right" name="cancel" value="No" onclick="hidedelid();">-->
			</form>
			<div class="topArrow"></div>
		</div>
		<!--Delete Form Popup---->
{literal}
<script type="text/javascript">
$(document).ready(function(){				
    $('#popupbrowsebannerImg').on('change', function(evt){
        var file = evt.target.files[0];
        if(file.type.match('image.*')){
            var reader = new FileReader();
            reader.onload = (function(file){
                return function(e){
                    $('#changebannerimage').css({
                        'background-image': 'url(' + e.target.result +')'
                    });
                }
            })(file);
        }
        reader.readAsDataURL(file);
        $("#editBannerImg").hide();
        $(".modal-backdrop").hide();
    })
    $('#backgroundimage').on('change', function(evt){
        var file = evt.target.files[0];
        if(file.type.match('image.*')){
            var reader = new FileReader();
            reader.onload = (function(file){
                return function(e){
                    $('body').css({
                        'background': 'url(' + e.target.result +') repeat'
                    });
                }
            })(file);
        }
        reader.readAsDataURL(file);
    })
});
</script>
{/literal}