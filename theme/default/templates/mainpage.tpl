<div class="row-fluid relatediv">
	<div class="toppanel">
	{if $req_file_name eq 'main.php'}
		<div class="{if $req_file_name eq 'index.php'}header{/if}{if $req_file_name neq 'index.php'}headerSec{/if}">
			<div class="{if $req_file_name eq 'index.php'}container{/if}{if $req_file_name neq 'index.php'}containerSec{/if}">
				<div class="TopMenuNav clearfix">
					{if $req_file_name neq 'index.php'}
						<a href="{$SITE_BASEURL}" class="logoSec {if $req_file_name neq 'main.php' AND $req_file_name neq 'onboarding.php' }marLefUserHome {/if}">
							<img src="{$SITE_LOGO}" alt="logo" title="" />
						</a>
					{/if}
					<ul class="nav row unstyled TopMenuNavListSec {if $req_file_name neq 'index.php'} {/if}">
						{if $req_file_name eq 'index.php'}
							<li class="rightLine borNone">
								<img src="{$SITE_BASEURL}/images/right-line.png" alt="right-line" title="" />
							</li>
						{/if}
						
					{if !$smarty.session.user_id}
						
					{else}
						{*==theme selection page===*}	
						{if $req_file_name eq 'main.php'}
							<li class="main_rightNav_opt"><a class="navListtop optListMar optionslist" onclick="commonTop('topoptions');"><span class="fa fa-bars"></span></a></li>
							<li class="main_rightNav_pub"><a class="navListtop"  id="_publishPop" onclick="publishPage('{$smarty.session.domain_id}'); $('#publishPopup').show();$('.loadmask').show();">{$LANG.header_publish}</a></li>
							{if $settingpage.0.payment_status eq 'No' or $settingpage.0.payment_status eq ''}
							  <li class="main_rightNav_buy"><a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription/{$smarty.session.domain_id}/invoice{else}subscription.php?domain_id={$smarty.session.domain_id}&inv=invoice{/if}">SATIN AL</a></li>
							{/if}	
							<li><a class="navListtop" id="showTop" onclick="commonToogle('settingpage');showSettingPage('{$smarty.session.domain_id}');"><span class="arrow marLft50"><img src="{$SITE_BASEURL}/images/headerottArrow.png" alt="headerottArrow" title="" /></span> {$LANG.header_settings}</a></li>
							<li><a class="navListtop mainPageTogg" onclick="showPages('0');"><span class="arrow"><img src="{$SITE_BASEURL}/images/headerottArrow.png" alt="headerottArrow" title="" /></span> {$LANG.header_pages}</a></li>
							<li><a class="navListtop" id="siteTitleAndAllChanges" onclick="showBuildPages('{$smarty.session.domain_id}');showDesign();"><span class="arrow"><img class="marLft20" src="{$SITE_BASEURL}/images/headerottArrow.png" alt="headerottArrow" title="" /></span> {$LANG.header_design}</a></li>
							<li class="headerNavBorLft"><a class="navListtop active"  onclick="showBuildPages('{$smarty.session.domain_id}');"><span class="arrow"><img src="{$SITE_BASEURL}/images/headerottArrow.png" alt="headerottArrow" title="" /></span> {$LANG.header_build}</a></li>
						{/if}	
						{*==theme selection page Ends===*}	
					{/if}	
						
					</ul>
					
				</div>
			</div>
		</div>
		<div id="topoptions" style="display:none">
			<li><a onclick="FullSreeen();">{$LANG.header_opt_full}</a></li>
			<li><a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}userhome{else}userHome.php{/if}">{$LANG.header_opt_mysite}</a></li>
			<li><a href="">{$LANG.header_opt_stats}</a></li>
			<li><a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}myhome{else}MyHome.php{/if}">{$LANG.header_opt_domain}</a></li>
			<li><a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}userhome{else}userHome.php{/if}">{$LANG.header_opt_exiteditor}</a></li>
		</div>
	{/if}
        {if $smarty.session.domain_id}
		{$objCommon->getImageForShowTop($smarty.session.domain_id,'backgroundimage')}
		{$objCommon->getBannerEnable($smarty.session.domain_id)}
        {$objCommon->getBacgroundColor_status()}
       	{/if}
	{*===leftside part of listing options starts===*}
		<!--<span class="hidebg"></span>-->
		<div class="mainLeftPanel clearfix overhidden">
			<ul class="mainLeftPanelUl clearfix" id="toolssection">
				<li>
					<a class="mainTabNav basicnav active" href="javascript:void(0);" id="basic_section">
						<span class="inlineblock"><img src="{$SITE_BASEURL}/images/basic.png" alt="basic" title="basic" /></span><span class="inlineblock">Temel</span>
					</a>
				</li>
				<li>
					<a class="mainTabNav" href="javascript:void(0);" id="more_section">
						<span class="inlineblock"><img src="{$SITE_BASEURL}/images/social-icons2.png" alt="social" title="social" /></span><span class="inlineblock">Sosyal</span>
					</a>
				</li>
				<li>
					<a class="mainTabNav" href="javascript:void(0);" id="media_section">
						<span class="inlineblock"><img src="{$SITE_BASEURL}/images/media2.png" alt="media2" title="media2" /></span><span class="inlineblock">Medya</span>
					</a>
				</li>
				<li>
					<a class="mainTabNav" href="javascript:void(0);" id="structure_section">
						<span class="inlineblock"><img src="{$SITE_BASEURL}/images/structure2.png" alt="structure2" title="structure2" /></span><span class="inlineblock">Yapı</span>
					</a>
				</li>			
			</ul>
			<ul class="mainLeftPanelUl clearfix" id="draggable_content"> 
				<li class="mainLeftPanelScroll toolone basictool toolsectioncontent" id="basic_section_content">					
					<ul class="mainLeftPanelUlContent basictab">
						<li class="sectioncontent">
							<ul class="clearfix leftuldiv mainLeftPanelScrollActive">
								<li class="dragableBox listbox slide" id="box1" data-title="box1">
									<div class="outerToolwrap">
									<span class="dc"><span class="titleimgclass bgicon"></span></span><div class="title-box"><span class="title">{$LANG.main_page_title}</span></div>
									</div>
								</li>
								<li class="dragableBox listbox" id="box2" data-title="box2"><div class="outerToolwrap"><span class="paraimgclass bgicon"></span><div class="title-box"><span class="title">{$LANG.main_page_paragraph}</span></div></div></li>
								<li class="dragableBox listbox" id="box3" data-title="box3"><div class="outerToolwrap"><span class="imgtxtimgclass bgicon"></span><div class="title-box"><span class="title">{$LANG.main_page_image_plus_text}</span></div></div></li>
								<li class="dragableBox listbox" id="box4" data-title="box4"><div class="outerToolwrap"><span class="sinimimgclass bgicon"></span><div class="title-box"><span class="title">{$LANG.main_page_image}</span></div></div></li>
								<li class="dragableBox listbox" id="box5" data-title="box5"><div class="outerToolwrap"><span class="cntfrmimgclass bgicon"></span><div class="title-box"><span class="title">{$LANG.main_page_contact_form}</span></div></div></li>
								<li class="dragableBox listbox" id="box9" data-title="box9"><div class="outerToolwrap"><span class="galleryimgclass bgicon"></span><div class="title-box"><span class="title">{$LANG.main_page_gallery}</span></div></div></li>
								<li class="dragableBox listbox" id="box10" data-title="box10"><div class="outerToolwrap"><span class="mapimgclass bgicon"></span><div class="title-box"><span class="title">{$LANG.main_page_map}</span></div></div></li>
								<li class="dragableBox listbox" id="box11" data-title="box11"><div class="outerToolwrap"><span class="slideimgclass bgicon"></span><div class="title-box"><span class="title">{$LANG.main_page_slider}</span></div></div></li>
								<li class="dragableBox listbox" id="box13" data-title="box13"><div class="outerToolwrap"><span class="columnimgclass bgicon"></span><div class="title-box"><span class="title">SÜTUN</span></div></div></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="mainLeftPanelScroll tooltwo socialtool toolsectioncontent" id="more_section_content" style="display:none;">
					
					<ul class="mainLeftPanelUlContent othertab">
						<li class="sectioncontent">
								<ul class="clearfix leftuldiv">
									<li class="dragableBox listbox" id="box8" data-title="box8"><div class="outerToolwrap"><span class="socialimgclass bgicon"></span><div class="title-box"><span class="title">{$LANG.main_page_social_icons}</span></div></div></li>
									<li class="dragableBox listbox" id="box16" data-title="box16"><div class="outerToolwrap"><span class="socialimgclass bgicon"></span><div class="title-box"><span class="title">Image & Text Columns</span></div></div></li>
								</ul>
								<div style="clear:both"></div>
							</li>
					</ul>
				</li>
				
				<li class="mainLeftPanelScroll tooltwo mediatool toolsectioncontent" id="media_section_content" style="display:none;">
					
					<ul class="mainLeftPanelUlContent othertab">
						<li class="sectioncontent">
							<ul class="clearfix leftuldiv">
								<li class="dragableBox listbox" id="box7" data-title="box7"><div class="outerToolwrap"><span class="utubeimgclass bgicon"></span><div class="title-box"><span class="title">{$LANG.main_page_youtube}</span></div></div></li>
								<li class="dragableBox listbox" id="box14" data-title="box14"><div class="outerToolwrap"><span class="fileiconclass bgicon"></span><div class="title-box"><span class="title">DOSYA</span></div></div></li>
								<li class="dragableBox listbox" id="box12" data-title="box12"><div class="outerToolwrap"><span class="addonimgclass bgicon"></span><div class="title-box"><span class="title">{$LANG.main_page_google_adsense}</span></div></div></li>								
								<!--<li class="dragableBox listbox" id="box15" data-title="box15"><div class="outerToolwrap"><span class="documenticonclass bgicon"></span><div class="title-box"><span class="title">Document</span></div></div></li>-->
							</ul>
							<div style="clear:both"></div>
						</li>
					</ul>
				</li>
				<li class="mainLeftPanelScroll tooltwo structuretool toolsectioncontent" id="structure_section_content" style="display:none;">
					
					<ul class="mainLeftPanelUlContent othertab">
						<li class="sectioncontent">
								<ul class="clearfix leftuldiv">
									<li class="dragableBox listbox" id="box6" data-title="box6"><div class="outerToolwrap"><span class="dividerimgclass bgicon"></span><div class="title-box"><span class="title">{$LANG.main_page_divider}</span></div></div></li>
									<li class="dragableBox listbox" id="box17" data-title="box17"><div class="outerToolwrap"><span class="socialimgclass bgicon"></span><div class="title-box"><span class="title">Team With Text</span></div></div></li>
									<li class="dragableBox listbox" id="box18" data-title="box18"><div class="outerToolwrap"><span class="imgtxtimgclass bgicon"></span><div class="title-box"><span class="title">{$LANG.main_page_image_plus_text}</span></div></div></li>
								</ul>
								<div style="clear:both"></div>
							</li>
					</ul>
				</li>				
			</ul>
			<div id="designleft" style="display:none;">
				<div class="maindesignleftDiv">
					<div class="headerNav">
						<h3 class="mainTabNav active">
							<span class="arrow"></span>
							<img src="{$SITE_BASEURL}/images/basic.png" alt="basic" title="basic" />
							<br/>
							{$LANG.main_page_design}
						</h3>
					</div>
					<div class="selectTheme widAuto clearfix">
						<button id="change-theme-button" class="mainleftthemeAlign" onclick="$('#themelist').show();$('#build').hide();">
							<i class="fa fa-copy"></i> <br />
							{$LANG.main_page_change_theme}
						</button>
						<button id="change-fonts-button" class="mainleftthemeAlign">
							<i class="fa fa-font"></i>  <br />
							{$LANG.main_page_change_font}
						</button>
						<button id="change-back-button" class="mainleftthemeAlign">
							<i class="fa fa-picture-o"></i>  <br />
							{$LANG.main_page_change_background}
						</button>
					</div>
				</div>
				
				<div class="maindesignleftChange" style="display:none;">
					<div class="selectTheme no-mar clearfix">
						<input type="hidden" name="fontchange" id="fontchange" value="">
						<div class="selectlist">
							<h3 class="fontlistdivHead marLftmin60 active">
								<span class="arrow"></span>
								<img src="{$SITE_BASEURL}/images/basic.png" alt="basic" title="basic" />
								<br/>
								{$LANG.main_page_select_options}<a class="fontback">GERİ</a>
							</h3>
							<ul class="nav">
								<li id="site_title">
									<i class="fa fa-copy"></i> <br />
									{$LANG.main_site_title}
								</li>
								<li id="nav_menu">
									<i class="fa fa-copy"></i> <br />
									{$LANG.main_page_navigation_menu}
								</li>
								<li id="main_headline">
									<i class="fa fa-copy"></i> <br />
									{$LANG.main_page_headline}
								</li>
								<li id="main_title">
									<i class="fa fa-copy"></i> <br />
									{$LANG.main_page_title}
								</li>
								<li id="main_paragraph">
									<i class="fa fa-copy"></i> <br />
									{$LANG.main_page_paragraph}
								</li>
								<li id="main_imagetitle">	
									<i class="fa fa-copy"></i> <br />
									{$LANG.main_page_image_captions}
								</li>
							</ul>	
						</div>						
						<div class="fontlistdiv fontlistdivSel" style="display:none;">
							<h3 class="fontlistdivHead marLftmin60 active">
								<span class="arrow"></span>
								<img src="{$SITE_BASEURL}/images/basic.png" alt="basic" title="basic" />
								<br/>
								{$LANG.main_page_select_font_family}<a class="fontback">GERİ</a>
							</h3>
							<div class="mainLeftPanelScrollNew">
								<div class="nav fontfamily fontlistdivInn">
									<ul class="nav fontfamily fontScrollUl">
										{section name=fontdetails loop=$fontlist}
											<li style="font-family:{$fontlist[fontdetails].font_name};">{$fontlist[fontdetails].font_name}</li>
										{/section}
									</ul>
								</div>
							</div>
							<h3 class="fontlistdivHead active">
								<span class="arrow"></span>
								<img src="{$SITE_BASEURL}/images/basic.png" alt="basic" title="basic" />
								<br/>
								{$LANG.main_page_select_font_size}
							</h3>
							<div class="fontSizeModify clearfix">
								<span class="plusminusfont decreasefont"><i class="fa fa-minus-circle"></i></span>
								<input type="text" class="inputfont" value="20" />
								<span class="plusminusfont increasefont"><i class="fa fa-plus-circle"></i></span>
							</div>	
							<h3 class="fontlistdivHead active lineht">
								<span class="arrow"></span>
								<img src="{$SITE_BASEURL}/images/basic.png" alt="basic" title="basic" />
								<br/>
								Select Line Height
							</h3>
							<div class="fontSizeModify clearfix lineht">
								<span class="plusminusfont decreaselineht"><i class="fa fa-minus-circle"></i></span>
								<input type="text" class="inputlineht" value="20" />
								<span class="plusminusfont increaselineht"><i class="fa fa-plus-circle"></i></span>
							</div>						
						</div>
					</div>
				</div>
			</div>
			<div class="bgmaskTop"></div>
		</div>	
	{*===leftside part of listing options starts===*}
	</div>	
			
	
	{*====selected theme list part starts===*}
	<div class="mainRightPanel">
		<div class="container">
		{*====Theme Popup Starts==*}
				<div id="themelist" style="display:none;">
						{if $smarty.session.themeOnuse}
						<div id="themeselection" class="themeselectionOuter chooseDomainPop container">
							<div class="ChooseThemeTxt">{$LANG.main_page_choose_a_theme} </div>
							<div id="sucess_disp"></div>
							<div class="row-fluid marTop40">
								{section name=themedetails loop=$themeval}
									<div class="{if $smarty.section.themedetails.index%2 eq 0}span6 themeMenuWidt offset0{else}span6 themeMenuWidt{/if}{if $smarty.session.themename eq $objCommon->getThemeNameForActive($themeval[themedetails].theme_id)} active{/if}">
										<div class="themeBg">
											<div id="themeimgrep_{$themeval[themedetails].theme_id}" title="{$themeval[themedetails].theme_name}">
												<img src="{$SITE_BASEURL}/uploads/photo_theme/{$themeval[themedetails].theme_image}" alt="{$themeval[themedetails].theme_name}" />
											</div>
											<div class="themeMenu">	
												<div class="row-fluid">
													<ul class="theme-colors span7" id="color_{$themeval[themedetails].theme_id}">
														<li id="blue_{$themeval[themedetails].theme_id}" style="background-color:#107db5" data-color="blue" class="active" onclick="changeThemeImage('{$SITE_BASEURL}/uploads/photo_theme/{$themeval[themedetails].theme_image}','{$themeval[themedetails].theme_id}','blue_{$themeval[themedetails].theme_id}');"></li>
														{if $themeval[themedetails].red_theme_image}
															<li id="red_{$themeval[themedetails].theme_id}" style="background-color:#e50d0e" data-color="red" onclick="changeThemeImage('{$SITE_BASEURL}/uploads/photo_theme/{$themeval[themedetails].red_theme_image}','{$themeval[themedetails].theme_id}','red_{$themeval[themedetails].theme_id}');"></li>
														{/if}
														{if $themeval[themedetails].green_theme_image}
															<li id="green_{$themeval[themedetails].theme_id}" style="background-color:#8fb81e" data-color="green" onclick="changeThemeImage('{$SITE_BASEURL}/uploads/photo_theme/{$themeval[themedetails].green_theme_image}','{$themeval[themedetails].theme_id}','green_{$themeval[themedetails].theme_id}');"></li>
														{/if}
														{if $themeval[themedetails].orange_theme_image}
															<li id="orange_{$themeval[themedetails].theme_id}" style="background-color:#f27e0d" data-color="orange" onclick="changeThemeImage('{$SITE_BASEURL}/uploads/photo_theme/{$themeval[themedetails].orange_theme_image}','{$themeval[themedetails].theme_id}','orange_{$themeval[themedetails].theme_id}');"></li>
														{/if}
														{if $themeval[themedetails].violet_theme_image}
															<li id="violet_{$themeval[themedetails].theme_id}" style="background-color:#b812be" data-color="pink" onclick="changeThemeImage('{$SITE_BASEURL}/uploads/photo_theme/{$themeval[themedetails].violet_theme_image}','{$themeval[themedetails].theme_id}','violet_{$themeval[themedetails].theme_id}');"></li>
														{/if}
													</ul>
													<a class="btn btn-success pull-right marRht10" onclick="updateTheme('{$themeval[themedetails].theme_id}','{$themeval[themedetails].theme_name}','{$smarty.session.domain_id}');">{$LANG.main_choose}</a>
												</div>
											</div>
										</div>
									</div>
								{/section}	
							</div>
						</div> 	
						{/if}
						{if $smarty.session.blogonuse}
						<div id="blogthemeselection" class="chooseDomainPop">
							<div class="ChooseThemeTxt">{$LANG.main_page_choose_a_theme} </div>
							{*======Blog Theme Selection part====*}	
								<div class="row-fluid marTop20">
									{section name=blogdetails loop=$blogval}
										<div class="{if $smarty.section.blogdetails.index%2 eq 0}span6 themeMenuWidt offset0{else}span6 themeMenuWidt{/if}{if $smarty.session.themename eq $objCommon->getBlogNameForActive($blogval[blogdetails].blog_id)} active{/if}">
											<div class="themeBg">
											   <div id="blogimgrep_{$blogval[blogdetails].blog_id}">
													<img src="{$SITE_BASEURL}/uploads/photo_blog/{$blogval[blogdetails].blog_image}" alt="{$blogval[blogdetails].blog_name}" />			</div>
												<div class="themeMenu">
													<div class="row-fluid">
														<ul class="theme-colors span7" id="blogcolor_{$blogval[blogdetails].blog_id}">
															<li style="background-color:#107db5" data-color="blue" id="blogblue_{$blogval[blogdetails].blog_id}" class="active" onclick="changeBlogImage('{$SITE_BASEURL}/uploads/photo_blog/{$blogval[blogdetails].blog_image}','{$blogval[blogdetails].blog_id}','blogblue_{$blogval[blogdetails].blog_id}');"></li>
															{if $blogval[blogdetails].red_blog_image}
																<li style="background-color:#e50d0e" data-color="red" id="blogred_{$blogval[blogdetails].blog_id}" onclick="changeBlogImage('{$SITE_BASEURL}/uploads/photo_blog/{$blogval[blogdetails].red_blog_image}','{$blogval[blogdetails].blog_id}','blogred_{$blogval[blogdetails].blog_id}');"></li>
															{/if}
															{if $blogval[blogdetails].green_blog_image}
																<li style="background-color:#8fb81e" data-color="green" id="bloggreen_{$blogval[blogdetails].blog_id}" onclick="changeBlogImage('{$SITE_BASEURL}/uploads/photo_blog/{$blogval[blogdetails].green_blog_image}','{$blogval[blogdetails].blog_id}','bloggreen_{$blogval[blogdetails].blog_id}');"></li>
															{/if}
															{if $blogval[blogdetails].orange_blog_image}
																<li style="background-color:#f27e0d" data-color="orange" id="blogorange_{$blogval[blogdetails].blog_id}" onclick="changeBlogImage('{$SITE_BASEURL}/uploads/photo_blog/{$blogval[blogdetails].orange_blog_image}','{$blogval[blogdetails].blog_id}','blogorange_{$blogval[blogdetails].blog_id}');"></li>
															{/if}
															{if $blogval[blogdetails].violet_blog_image}
																<li style="background-color:#b812be" data-color="pink" id="blogviolet_{$blogval[blogdetails].blog_id}" onclick="changeBlogImage('{$SITE_BASEURL}/uploads/photo_blog/{$blogval[blogdetails].violet_blog_image}','{$blogval[blogdetails].blog_id}','blogviolet_{$blogval[blogdetails].blog_id}');"></li>
															{/if}
														</ul>
														<a class="btn btn-success pull-right marRht10" onclick="updateBlog('{$blogval[blogdetails].blog_id}','{$blogval[blogdetails].blog_name}','{$smarty.session.domain_id}');">{$LANG.main_choose}</a>
													</div>
												</div>
											</div>
										</div>
									{/section}	
								</div>
							{*======Blog Theme Selection part ends====*}
						</div>
					{/if}
					{if $smarty.session.storeonuse}
					<div id="storethemeselection" class="chooseDomainPop">
						<div class="ChooseThemeTxt">{$LANG.main_page_choose_a_theme} </div>
						{*======Blog Theme Selection part====*}	
							<div class="row-fluid marTop20">
							{section name=storedetails loop=$storeval}
									<div class="{if $smarty.section.storedetails.index%2 eq 0}span6 themeMenuWidt offset0{else}span6 themeMenuWidt{/if}{if $smarty.session.themename eq $objCommon->getStoreNameForActive($storeval[storedetails].store_id)} active{/if}">
										<div class="themeBg">
										   <div id="storeimgrep_{$storeval[storedetails].store_id}">
												<img src="{$SITE_BASEURL}/uploads/photo_store/{$storeval[storedetails].store_image}">									  
											</div>
											<div class="themeMenu">	
												<div class="row-fluid">
													<ul class="theme-colors span7" id="storecolor_{$storeval[storedetails].store_id}">
														<li style="background-color:#107db5" data-color="blue" id="storeblue_{$storeval[storedetails].store_id}" class="active" onclick="changeStoreImage('{$SITE_BASEURL}/uploads/photo_store/{$storeval[storedetails].store_image}','{$storeval[storedetails].store_id}','storeblue_{$storeval[storedetails].store_id}');"></li>
														{if $storeval[storedetails].red_store_image}
															<li style="background-color:#e50d0e" data-color="red" id="storered_{$storeval[storedetails].store_id}" onclick="changeStoreImage('{$SITE_BASEURL}/uploads/photo_store/{$storeval[storedetails].red_store_image}','{$storeval[storedetails].store_id}','storered_{$storeval[storedetails].store_id}');"></li>
														{/if}
														{if $storeval[storedetails].green_store_image}
															<li style="background-color:#8fb81e" data-color="green" id="storegreen_{$storeval[storedetails].store_id}" onclick="changeStoreImage('{$SITE_BASEURL}/uploads/photo_store/{$storeval[storedetails].green_store_image}','{$storeval[storedetails].store_id}','storegreen_{$storeval[storedetails].store_id}');"></li>
														{/if}
														{if $storeval[storedetails].orange_store_image}
															<li style="background-color:#f27e0d" data-color="orange" id="storeorange_{$storeval[storedetails].store_id}" onclick="changeStoreImage('{$SITE_BASEURL}/uploads/photo_store/{$storeval[storedetails].orange_store_image}','{$storeval[storedetails].store_id}','storeorange_{$storeval[storedetails].store_id}');"></li>
														{/if}
														{if $storeval[storedetails].violet_store_image}
															<li style="background-color:#b812be" data-color="pink" id="storeviolet_{$storeval[storedetails].store_id}" onclick="changeStoreImage('{$SITE_BASEURL}/uploads/photo_store/{$storeval[storedetails].violet_store_image}','{$storeval[storedetails].store_id}','storeviolet_{$storeval[storedetails].store_id}');"></li>
														{/if}
													</ul>
													<a class="btn btn-success pull-right marRht10" onclick="updateStore('{$storeval[storedetails].store_id}','{$storeval[storedetails].store_name}','{$smarty.session.domain_id}');">{$LANG.main_choose}</a>
												</div>
											</div>
										</div>
										<!--<div class="themeMenuDescript">{$blogval[blogdetails].blog_description}</div>-->
									</div>
								{/section}	
									</div>
							{*======Store Theme Selection part ends====*}
						</div>
					{/if}
				</div>
				{*====Theme Popup Ends==*}
		</div>
		{*====Setting page Popup starts==*}
			<div id="settingpage" class="main_settingpage main_settingpageTab" style="display:none">
				{include file='settingsPageReplace.tpl'}
			</div>
		{*==setting page popup ends===*}
		
		<div class="clearfix mainRightPanelInner mainRightPanelInnerSec">
			
			<div id="pages">
			
			</div>
			<div id="build" class="posRel">
				{include file=$pagelistpath}
			</div>
			
			<!----Publish the site---->
			{*====selected theme list part starts===*}	
			{*===popup part starts===*}
			<div id="modals">
				<div id="myModal" class="modal hide" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" style="display: none;">
					<div class="domainChangeOne">
						<div class="domainOuterHead">
							<img src="{$SITE_BASEURL}/images/Www.png" alt="domain" title="domain" />
							<div>WEB SİTENİZİN ADRESİNİ SEÇİN</div>
						</div>
						<div class="chooseDomainPop">
						{*===sucess or error message===*}
								<div id="sucess_disp"></div>
								<div id="error_msg"></div>
						{*==sucess or error message==*}
						<div class="notify"><img src="{$SITE_BASEURL}/images/notification.png" alt="notification" title="notification" /><span>{$LANG.main_chose_reverse}</span></div>
						<!--	<div class="head">{$LANG.main_choose_subdomain}</div>
							<div class="webstart">{$LANG.main_website_started}</div>-->
							<div class="chooseDomainInner">
								<form name="domainform" class="chooseDomainInnerForm" id="domainform" method="post" action="javascript:void(0);" onsubmit="AddSubDomain();">
									<input type="hidden" name="popupuse" id="popupuse" value="{$smarty.session.popuponuse}"/>
									{if !empty($themelist.0.theme_id)}
										{if $themelist.0.theme_id neq '0'}
											<input type="hidden" name="id_theme" id="id_theme" value="{$themelist.0.theme_id}"/>
										{/if}
									{/if}
									{if !empty($bloglist.0.blog_id)}
										{if $bloglist.0.blog_id neq '0'}	
											<input type="hidden" name="id_blog" id="id_blog" value="{$bloglist.0.blog_id}"/>
										{/if}	
									{/if}
									{if !empty($storelist.0.store_id)}
										{if $storelist.0.store_id neq '0'}	
											<input type="hidden" name="id_store" id="id_store" value="{$storelist.0.store_id}"/>
										{/if}	
									{/if}
									<div class="chooseDomainSubdomain">
										<div class="chooseDomainSubdomainTop">{$SITE_MAIN_DOMAIN} altında yer alacak bir alan adı seçin</div>
										<div class="chooseDomainSubdomainBott">Web sitenize hemen başlamak için en güzel yol</div>
										<input type="radio" name="domain" id="sub_domain" checked="checked" style="display:none;"/>{$LANG.main_http} <input type="text" id="domain_name" name="domainname"  value="" placeholder="örnek: guzelsitem12" onkeyup="checkDomainValidation();"/>{$SITE_MAIN_DOMAIN}
									</div>
								{*	<div class="chooseDomainAlreaydomain">
										<div class="chooseDomainSubdomainTop">Connect a Domain You Already Own</div>
										<div class="chooseDomainSubdomainBott">Choose a plan and connect your domain in the next step</div>
										<input type="radio" name="domain" id="point_domain"/>{$LANG.main_http}www. <input type="text" id="point_domain_name" name="point_domain_name"  value="" placeholder="example.com"/>
									</div>  *}
									<div class="clearfix">
										<input type="submit" class="saveButtonInput" name="setting_domain_submit" id="setting_domain_submit" value="{$LANG.main_continue}" />
									</div>											
								</form>
							</div>
						</div>
				</div>
                <div class="domainChangeTwo" style="display:none;">
						<div class="domainOuterHead">
							<img src="{$SITE_BASEURL}/images/Www.png" alt="domain" title="domain" />
							<div>WEB SİTENİZİN ADRESİNİ SEÇİN</div>
						</div>
						<div class="clearfix">
							<div class="chooseDomainPop">
								<div class="chooseDomainInner chooseDomainInnerSec">
									<div class="para">To set up your domain with {$SITE_MAIN_DOMAIN}, your domain's DNS settings need to be updated.</div>
									<div class="option"><b>Option A:</b> Email instructions to your domain registrar</div>
									<div class="inst">Send these instructions to your domain registrar (ex. GoDaddy, 1and1, Yahoo, etc.)</div>
									<div class="chooseDomainPopTxtarea">
										<p>Hello, I have purchased my domain <span id="youdomainurl"></span> from you.  I have built my website on {$SITE_MAIN_DOMAIN}.  I need you to point my domain to the following IP: {$smarty.server.SERVER_ADDR}</p>
										<p>This is done by changing my domain's A-Records. I am not requesting that you transfer my domain, redirect my domain, or change my name servers.  I want to remain with you as my domain registrar.</p>
									</div>
									<div class="option"><b>Option B:</b> Make the DNS changes yourself see instructions</div>
									<div class="para">Once the DNS changes are made, it may take up to 48 hours (although usually less) for the changes to propagate through the Internet</div>
									<div class="dc">
										<input type="button" class="subdomainInput" value="{$LANG.main_continue}" onclick="redirectnew();" />
									</div>
								</div>            
							</div>
						</div>
					</div>
                </div>
			</div>
			<div class="modalPopBg"></div>
	
			{*===popup part ends===*}
		</div>
	</div>
</div>
<div id="modals">
    <div id="banner_slide_images_popup" class="sliderPopCont modal hide">
    	<div class="youtubepopclose close" data-dismiss="modal"></div>
    	<div class="sliderPopupHead no_textindent">ARKAPLAN <a onclick="SaveBackgroundChanges();" class="savetobg">Kaydet</a></div>
        <input type="hidden" id="uploadtype" />
    	<div class="row-fluid">
    		<div class="span12 offset0">
    			<div class="bgTitle">Arkaplan Resmi</div>
			<div class="row-fluid">
				<div class="span12 slidePopRhtScroll backgroundpadding offset0">
					<div class="bgChangOnOff bannerswitch">
						<div class="button pull-left">
							<a onclick="changeBackgroundEnable('{$smarty.session.domain_id}',this);" data-val="OFF" data-back="img" class="backstatus {if $banner_config eq '0' || $default_switch eq 'Y'}active{/if}">{$LANG.main_page_off}</a>
							<a onclick="changeBackgroundEnable('{$smarty.session.domain_id}',this);" data-val="ON" data-back="img" class="backstatus {if $banner_config eq '1' && $default_switch eq 'N'}active{/if}">{$LANG.main_page_on}</a>
						</div>
					</div>
					<div class="imagepreviewBG clearfix">
						<label class="bglabel selectbgimage">Resim Önizlemesi :</label><span id="background_img"  class="bgboximage"><img {if $logoimages eq ''} src="{$SITE_BASEURL}/images/no-image.png"{else}src="{$SITE_DOMAIN_IMAGES_URL}/{$logoimages}"{/if} id="backimg" style="height:50px;width:100px"  /></span>
					</div>
					<div class="clearfix"></div>
					<div id="background_imageLibrary" class="clearfix library_content">
						<ul>
							<li><a href="#my_computer">Bilgisayarım</a></li>
							<li><a href="#image_library_content">Resim Kütüphanesi</a></li>
						</ul>
						<div id="my_computer" class="clearfix">
                            <div class="backgroundLibrary">
                            <div id='imageloadstatus' style='display:none'>
                                                  <div class="laodImgChange"> <img src="{$SITE_BASEURL}/images/gifload.gif" alt="Yükleniyor...."/> </div>
                                             </div>
                            </div>
							<form id="imagebackground" class="addeditTop addeditbuttonForm form-horizontal SlideUploadForm" method="post" enctype="multipart/form-data" action='ajaxImageUpload.php'>
								<label for="file" class="input input-file" style="display:block" name="imageloadbutton">
									<div class="button">
										<input type="file" value="" name="photos[]" onchange="openFile(event);" id="backgroundimg1" />
										Yeni Resim Yükle
									</div>
									<input type='hidden' name="status" value="backgroundimage"/>
								</label>
							</form>
							{*<a class="upload_btn_save" href="{if $USERFRIENDLY eq 'Y'}main{else}main.php{/if}">Save</a>*}
						</div>
							<div id="image_library_content" class="clearfix">
								<input type="button" class="upload_btn" value="Seç ve Ekle" id="lipimguplod" onclick="uploadLibraryImages('{$smarty.session.domain_id}','{$smarty.session.page_id}','','background');" />
							<div class="backgroundLibrary">
                            <div id="backgroundimg">	
								{include file ='imageLibrary.tpl'}
							</div>
                            </div>    
						</div>
					</div>
				</div>
			</div>
    		</div>
		<div class="span12 offset0">
    			<div class="bgTitle">Arkaplan Rengi</div>
				<div class="bgChangOnOff bannerswitch slidePopRhtScroll backgroundpadding">
					<div class="button pull-left">
						<a class="backstatus {if $backgroundcolor eq 'Y' || $default_switch eq 'Y'}active{/if}" data-back='color'  data-val="OFF" onclick="changeBackgroundStatus(this);">{$LANG.main_page_off}</a>
						<a class="backstatus  {if $backgroundcolor eq 'N' && $default_switch eq 'N'}active{/if}" data-back='color' data-val="ON" onclick="changeBackgroundStatus(this);">{$LANG.main_page_on}</a>
                        {*change_bg_color_popup_on*}
					</div>
					<label class="bglabel selectbgcolor">Renk Seç :</label><span style="background-color:{$backcolor}" class="bgboxcolor"></span>
					<div id="selectbgcolorWrap">
						<div id='selectbgcolor'><select name='colour'> <option value='ffffff'>#ffffff</option> <option value='ffccc9'>#ffccc9</option> <option value='ffce93'>#ffce93</option> <option value='fffc9e'>#fffc9e</option> <option value='ffffc7'>#ffffc7</option> <option value='9aff99'>#9aff99</option> <option value='96fffb'>#96fffb</option> <option value='cdffff'>#cdffff</option> <option value='cbcefb'>#cbcefb</option> <option value='cfcfcf'>#cfcfcf</option> <option value='fd6864'>#fd6864</option> <option value='fe996b'>#fe996b</option> <option value='fffe65'>#fffe65</option> <option value='fcff2f'>#fcff2f</option> <option value='67fd9a'>#67fd9a</option> <option value='38fff8'>#38fff8</option> <option value='68fdff'>#68fdff</option> <option value='9698ed'>#9698ed</option> <option value='c0c0c0'>#c0c0c0</option> <option value='fe0000'>#fe0000</option> <option value='f8a102'>#f8a102</option> <option value='ffcc67'>#ffcc67</option> <option value='f8ff00'>#f8ff00</option> <option value='34ff34'>#34ff34</option> <option value='68cbd0'>#68cbd0</option> <option value='34cdf9'>#34cdf9</option> <option value='6665cd'>#6665cd</option> <option value='9b9b9b'>#9b9b9b</option> <option value='cb0000'>#cb0000</option> <option value='f56b00'>#f56b00</option> <option value='ffcb2f'>#ffcb2f</option> <option value='ffc702'>#ffc702</option> <option value='32cb00'>#32cb00</option> <option value='00d2cb'>#00d2cb</option> <option value='3166ff'>#3166ff</option> <option value='6434fc'>#6434fc</option> <option value='656565'>#656565</option> <option value='9a0000'>#9a0000</option> <option value='ce6301'>#ce6301</option> <option value='cd9934'>#cd9934</option> <option value='999903'>#999903</option> <option value='009901'>#009901</option> <option value='329a9d'>#329a9d</option> <option value='3531ff'>#3531ff</option> <option value='6200c9'>#6200c9</option> <option value='343434'>#343434</option> <option value='680100'>#680100</option> <option value='963400'>#963400</option> <option value='986536' selected='selected'>#986536</option> <option value='646809'>#646809</option> <option value='036400'>#036400</option> <option value='34696d'>#34696d</option> <option value='00009b'>#00009b</option> <option value='303498'>#303498</option> <option value='000000'>#000000</option> <option value='330001'>#330001</option> <option value='643403'>#643403</option> <option value='663234'>#663234</option> <option value='343300'>#343300</option> <option value='013300'>#013300</option> <option value='003532'>#003532</option> <option value='010066'>#010066</option> <option value='340096'>#340096</option> </select></div>
					</div>
				</div>
    	</div>
		<div class="span12 offset0">
    		<div class="bgTitle">Varsayılan Tema</div>
			<div class="bgChangOnOff bannerswitch slidePopRhtScroll backgroundpadding">
				<div class="button">
					<a class="backstatus defaultstatus1 {if $default_switch eq 'N'}active{/if}" data-back='default' data-val="OFF" onclick="changeBackgroundStatus_default('N',this);">{$LANG.main_page_off}</a>
					<a class="backstatus defaultstatus1 {if $default_switch eq 'Y'}active{/if}" data-back='default' data-val="ON" onclick="changeBackgroundStatus_default('Y',this);">{$LANG.main_page_on}</a>
				</div>
			</div>
    	</div>
    	</div>
    </div>
</div>
{*====Store page Popup starts==*}
	<div id="storepage" class="main_storepage" style="display:none">
		{include file='storePageReplace.tpl'}
	</div>
{*==store page popup ends===*}
{literal}
<script type="text/javascript">
	$(document).ready(function(){
		$(".mainLeftPanel").removeClass("overhidden");
		$(".mainLeftArrow").hide();
		var basictab = $(window).width();
		//$("#basic_section_content .leftuldiv li").css("width",basictab/10);
		//$(".mainLeftPanelUlContent").css("width",basictab);
		$(".mainRightArrow").css("left",basictab);
		var toolwidth = 1340 - basictab;
		$(".mainLeftArrow").click(function(){
			var rightval = parseInt($(".mainLeftPanelUlContent").css("right"));
			var rightvalInt = rightval;
			if(toolwidth<rightvalInt){
				$(".mainLeftPanelUlContent").css({"left":"auto","right":"auto"});
			}
			else{
				$(".mainLeftPanelUlContent").css({"left":"-=134px","right":"auto"});
			}
		});
		$(".mainRightArrow").click(function(){
			var leftval = parseInt($(".mainLeftPanelUlContent").css("left"));
			var leftvalInt = -leftval;
			if(leftvalInt>=0){
				$(".mainLeftArrow").show();
			}	
			if(toolwidth<leftvalInt){
				$(".mainLeftPanelUlContent").css({"left":"auto","right":"auto"});
			}
			else{
				$(".mainLeftPanelUlContent").css({"left":"-=134px","right":"auto"});
			}
		});	
		
		$("#change-back-button").click(function(){
			//$(".maindesignleftDiv").slideUp();
			//$(".mainbackgroundleftChange").slideDown();
			//$("#themelist").hide();
			//$("#build").show();
		});	
		$("#change-fonts-button").click(function(){
			$(".maindesignleftDiv").slideUp();
			$(".maindesignleftChange").slideDown();
			$("#themelist").hide();
			$("#build").show();
		});	
		var fonttotchange;
		$(".selectlist li").click(function(){
			$(".selectlist").slideUp();
			$(".fontlistdiv").slideDown();
			pageid = $('#page_id').val();
			domainid = $('#domain_id').val();
			fonttotchange = $(this).attr("id");
			if(fonttotchange=='site_title'){
				$(".lineht").hide();	
			}
			else{
				$(".lineht").show();	
			}
			//$(".mainLeftPageScroll.nano").nanoScroller();
			var fontfamily = $("."+fonttotchange).css("font-family");
			//$(".fontlistdiv ul").append('<li class="active">'+fontfamily+'</li>');
			$('.fontfamily li').removeClass("activefont");
			var fontnew = $('.fontfamily li:contains('+fontfamily+')');
			$(fontnew).addClass("activefont");
			$("#fontchange").val(fonttotchange);
			getFontSizeForListing(pageid,domainid,fonttotchange);
		});
		$(".fontfamily li").click(function(){
			$('.fontfamily li').removeClass("activefont");
			fonttotchange = $("#fontchange").val();
			var font = $(this).text();
			pageid = $('#page_id').val();
			domainid = $('#domain_id').val();
			$("."+fonttotchange).css("font-family",font);
			fontchange = fonttotchange+'_font_style';	
			updateFontStylingForEachListing(pageid,domainid,fontchange,font);
		});	
		$(".selectlist .fontback").click(function(){
			$(".maindesignleftChange").slideUp();
			$(".mainbackgroundleftChange").slideUp();
			$(".maindesignleftDiv").slideDown();
		});	
		$(".fontlistdiv .fontback").click(function(){
			$(this).parent().parent().slideUp();
			$(".selectlist").slideDown();
		});	
		
		//Font Size Changes
		$(".increasefont").click(function(){
			var fontSize = $(".inputfont");
			fontSize.val( +fontSize.val() + 1 );
			fonttotchange = $("#fontchange").val();
			var minussize = $(".inputfont").val()+"px";
			var minussize1 = $(".inputfont").val();
			if(minussize1<= 100){
				$("."+fonttotchange).css("font-size",minussize);
				pageid = $('#page_id').val();
				domainid = $('#domain_id').val();
				fontchange = fonttotchange+'_font_size';	
				updateFontStylingForEachListing(pageid,domainid,fontchange,minussize);
			}
			else{
				var minussize = $(".inputfont").val("100")+"px";
			}
		});
		$(".decreasefont").click(function(){
			var fontSize = $(".inputfont");
			fontSize.val( +fontSize.val() - 1 );
			fonttotchange = $("#fontchange").val();
			var plussize = $(".inputfont").val()+"px";
			var plussize1 = $(".inputfont").val();
			if(plussize1<=100){
				$("."+fonttotchange).css("font-size",plussize);
				pageid = $('#page_id').val();
				domainid = $('#domain_id').val();
				fontchange = fonttotchange+'_font_size';	
				updateFontStylingForEachListing(pageid,domainid,fontchange,plussize);
			}
			else{
				var plussize = $(".inputfont").val("100")+"px";
			}
		});
		$(".inputfont").keyup(function(){
			var fontpressSize = $( ".inputfont" ).val()+"px";
			var fontpressSize1 = $( ".inputfont" ).val();
			if(fontpressSize1<=100){
				fonttotchange = $("#fontchange").val();
				$("."+fonttotchange).css("font-size",fontpressSize);
				pageid = $('#page_id').val();
				domainid = $('#domain_id').val();
				fontchange = fonttotchange+'_font_size';	
				updateFontStylingForEachListing(pageid,domainid,fontchange,fontpressSize);
			}
			else{
				var fontpressSize = $( ".inputfont" ).val("100")+"px";
			}
		});
		
		//Font Line height Changes
		$(".increaselineht").click(function(){
			var fontSize = $(".inputlineht");
			fontSize.val( +fontSize.val() + 1 );
			fonttotchange = $("#fontchange").val();
			var minussize = $(".inputlineht").val()+"px";
			var minussize1 = $(".inputlineht").val();
			if(minussize1<=100){
				$("."+fonttotchange).css("line-height",minussize);
				$("."+fonttotchange+" *").css("line-height",minussize);
				pageid = $('#page_id').val();
				domainid = $('#domain_id').val();
				fontchange = fonttotchange+'_line_size';	
				updateFontStylingForEachListing(pageid,domainid,fontchange,minussize);
			}
			else{
				var minussize = $( ".inputlineht" ).val("100")+"px";
			}
		});
		$(".decreaselineht").click(function(){
			var fontSize = $(".inputlineht");
			fontSize.val( +fontSize.val() - 1 );
			fonttotchange = $("#fontchange").val();
			var plussize = $(".inputlineht").val()+"px";
			var plussize1 = $(".inputlineht").val();
			if(plussize1<=100){
				$("."+fonttotchange).css("line-height",plussize);
				$("."+fonttotchange+" *").css("line-height",plussize);
				fontchange = fonttotchange+'_line_size';	
				updateFontStylingForEachListing(pageid,domainid,fontchange,plussize);
			}
			else{
				var plussize = $( ".inputlineht" ).val("100")+"px";
			}
		});
		$(".inputlineht").keyup(function(){
			var fontpressSize = $( ".inputlineht" ).val()+"px";
			fonttotchange = $("#fontchange").val();
			var fontpressSize1 = $( ".inputlineht" ).val();
			if(fontpressSize1<=100){
				$("."+fonttotchange).css("line-height",fontpressSize);
				$("."+fonttotchange+" *").css("line-height",fontpressSize);
				pageid = $('#page_id').val();
				domainid = $('#domain_id').val();
				fontchange = fonttotchange+'_line_size';	
				updateFontStylingForEachListing(pageid,domainid,fontchange,fontpressSize);
			}
			else{
				var fontpressSize = $( ".inputlineht" ).val("100")+"px";
			}
		});
	});
	$(document).ready(function(){
		$(".deleteBg").click(function(){
			$( "#deletePopup").fadeIn( 300 );	
			var closetop = $(this).offset();
			$("#deletePopup").css("top",closetop.top);
		});
		$(document).click(function(event){
			 if($(event.target).closest(".contentedit").length == 0) { $(".formattoolBg").fadeOut(200); } 
		});
	});
	$(window).resize(function(){
		$(".mainLeftPanel").removeClass("overhidden");
		$(".mainLeftArrow").hide();
		var basictab = $(window).width();
		//$("#basic_section_content .leftuldiv li").css("width",basictab/10);
		//$(".mainLeftPanelUlContent").css("width",basictab);
	});
	
</script>
<script type="text/javascript">

    $(window).load(function(){
        $("#change-back-button").click(function(){
            $("#banner_slide_images_popup").show();
			$('#selectbgcolor select').colourPickerNew({
				ico: jssitebaseUrl+'/images/jquery.colourPicker.gif',
				title:	false
			});
            $(".loadmask").show();
    	});
        $(".youtubepopclose").click(function(){
            $("#banner_slide_images_popup").hide();
            $(".loadmask").hide();
    	});
     });
 	$(document).ready(function(){
		$("#background_imageLibrary").tabs();
		$("#backgroundimg ul.imageLibraryUl li").click(function(){
		    var urls;
		    $(".imageLibraryUl li").removeClass("active");
			$(this).toggleClass("active");
            urls        = $(this).children("img").attr("src");
            $("#backimg").attr("src",urls);
            $("#uploadtype").val("lipimg");
			//$(".imageLibraryUl li.active img").attr();	
		});
		$("#change-fonts-button").click(function(){
			$(".maindesignleftDiv").slideUp();
			$(".maindesignleftChange").slideDown();
			$("#themelist").hide();
			$("#build").show();
		});	 
	});	
</script>
<script type="text/javascript">
$(document).ready(function(){
	$('#photobannerimg').die('click').live('change', function(){
	   
            var bar = $('.bar');
			var percent = $('.percent');
			var status = $('#status');
	      	$(".progress").show();
	        $("#bannerimageform").ajaxForm({
			 target: '#preview', 
		     beforeSubmit:function(){ 
		        status.empty();
				var percentVal = '0%';
				bar.width(percentVal)
				percent.html(percentVal);  
		     	$("#imageloadstatus").show();
			 	$("#imageloadbutton").hide();
			 }, 
             uploadProgress: function(event, position, total, percentComplete) {
				var percentVal = percentComplete + '%';
				bar.width(percentVal)
				percent.html(percentVal);
			}, 
			complete:function(xhr){ 
			 
             var restxt=xhr.responseText;
			 if(restxt.trim()=='Unknown extension!')
             {
                alert("Unknown extension!");
                $("#preview").hide();
                $("#imageloadstatus").hide();
                $(".progress").hide();
    			$("#imageloadbutton").hide();
				$("#maska").hide();               
             }
             else if(restxt.trim()=='You have exceeded the size limit! so moving unsuccessful!')
             {
                alert("You have exceeded the size limit! so moving unsuccessful!");
                $("#preview").hide();
                $("#imageloadstatus").hide();
                $(".progress").hide();
    			$("#imageloadbutton").hide();
				$("#maska").hide();                
             }
             else
             {
                $("#imageloadstatus").hide();
                $(".progress").hide();
    			$("#imageloadbutton").hide();
				$("#maska").hide();
				imageReloadPagelist();
             }  
			}, 
			error:function(){ 
			    $("#imageloadstatus").hide();
				$("#imageloadbutton").show();
			} }).submit();
	});
    
		
	$('#backgroundimg').die('click').live('change', function(){ 
	        $("#imagebackground").ajaxForm({target: '#preview', 
		     beforeSubmit:function(){ 
		    }, 
			success:function(){ 
			 window.location = jssitebaseUrl+'/main.php';
			}, 
			error:function(){ 
			} }).submit();
	});
});
$('.showTopTogg').click(function(){ 
	$(".main_storepage").animate({left:'0'});
	$(".main_storepage").show();
});




</script>
{/literal}