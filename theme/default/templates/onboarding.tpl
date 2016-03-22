<div class="row-fluid">
	<div class="marTop20">
		<div class="container">	
			{*==site,blog,store starts==*}
			<div id="selection" class="siteBlockOuter" style="display:none">
				<div class="ChooseThemeTxt">{$LANG.main_page_started}</div>
				<div class="choose_cat">
					{$LANG.main_page_select_theme}
				</div>
				<div class="row-fluid">
					<a class="span4 offset2 dc siteblogInner onboardsite" tabindex="1">
						<img src="{$SITE_BASEURL}/images/site.png">
						<div class="button">{$LANG.main_site}</div>
					</a>
					<a class="span4 offset0 dc siteblogInner onboardblog" tabindex="2">
						<img src="{$SITE_BASEURL}/images/blog.png">
						<div class="button">{$LANG.main_blog}</div>
					</a>
				{* <a class="span3 siteblogInner onboardstore" tabindex="2">
						<img src="{$SITE_BASEURL}/images/blog.png">
						<div class="button">{$LANG.main_store}</div>
					</a> *}
					<div class="span3"></div> 
				</div>	
				<div class="ChooseThemeTxtBott marTop20">
					{$LANG.main_page_access} 
					<div class="clr"></div>
					{$LANG.main_page_no_matter}
				</div>	
			</div>
			{*==site,blog,store ends==*}
			<div class="themeselectionOuter">
				<div id="themeselection" class="" >
					<div class="ChooseThemeTxtSec clearfix">
						{$LANG.main_page_select_templates}
						<!-- <div class="themebackTop pull-right"><img src="{$SITE_BASEURL}/images/scrollTop.png"></div> -->
					</div>
					<!--<div class="themebackTop">Back</div>
					<div class="ChooseThemeTxt">Choose a Theme </div>-->
					<div id="sucess_disp"></div>
					<div class="row-fluid">
						{section name=themedetails loop=$themeval}
							<div class="{if $smarty.section.themedetails.index%2 eq 0}span6 themeMenuWidt offset0{else}span6 themeMenuWidt{/if}">
								<div class="themeBg">
									<div id="themeimgrep_{$themeval[themedetails].theme_id}">
										<img src="{$SITE_BASEURL}/uploads/photo_theme/{$themeval[themedetails].theme_image}">
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
											<a class="btn btn-success pull-right marRht10" onclick="SelectTheme('{$themeval[themedetails].theme_id}','{$themeval[themedetails].theme_name}');">{$LANG.main_choose}</a>
										</div>
									</div>
								</div>
								<!--<div class="themeMenuDescript">{$themeval[themedetails].theme_description}</div>-->
							</div>
						{/section}	
					</div>
				</div> 	
			</div>
			<div class="blogselectionOuter">
				<div id="blogthemeselection" class="" style="display:none">
					<div class="ChooseThemeTxtSec clearfix">
						{$LANG.main_page_select_templates}
						<div class="blockbackTop pull-right"><img src="{$SITE_BASEURL}/images/scrollTop.png"></div>
					</div>
					{*======Blog Theme Selection part====*}	
					<div id="sucess_dis"></div>
					<div class="row-fluid">
						{section name=blogdetails loop=$blogval}
							<div class="{if $smarty.section.blogdetails.index%2 eq 0}span6 themeMenuWidt offset0{else}span6 themeMenuWidt{/if}">
								<div class="themeBg">
								   <div id="blogimgrep_{$blogval[blogdetails].blog_id}">
										<img src="{$SITE_BASEURL}/uploads/photo_blog/{$blogval[blogdetails].blog_image}">									  
									</div>
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
											<a class="btn btn-success pull-right marRht10" onclick="SelectBlog('{$blogval[blogdetails].blog_id}','{$blogval[blogdetails].blog_name}');">{$LANG.main_choose}</a>
										</div>
									</div>
								</div>
								<!--<div class="themeMenuDescript">{$blogval[blogdetails].blog_description}</div>-->
							</div>
						{/section}	
					</div>
					{*======Blog Theme Selection part ends====*}
				</div>
			</div>
	 		<div class="storeselectionOuter">
				<div id="storethemeselection" class="" style="display:none">
					<div class="ChooseThemeTxtSec clearfix">
						Select a template for your site from the given list.
						<div class="storebackTop pull-right"><img src="{$SITE_BASEURL}/images/scrollTop.png"></div>
					</div>
					{*======Store Theme Selection part====*}	
					<div id="sucess_storedis"></div>
					<div class="row-fluid">
						{section name=storedetails loop=$storeval}
							<div class="{if $smarty.section.storedetails.index%2 eq 0}span6 themeMenuWidt offset0{else}span6 themeMenuWidt{/if}">
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
											<a class="btn btn-success pull-right marRht10" onclick="SelectStore('{$storeval[storedetails].store_id}','{$storeval[storedetails].store_name}');">{$LANG.main_choose}</a>
										</div>
									</div>
								</div>
								<!--<div class="themeMenuDescript">{$blogval[blogdetails].blog_description}</div>-->
							</div>
						{/section}	
					</div>
					{*======Store Theme Selection part ends====*}
				</div>
			</div> 
			
		</div>
		 
	</div>
</div>