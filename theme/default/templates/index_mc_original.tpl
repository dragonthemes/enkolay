<!--<ul class="indexRightScroll">
	<li>
		<a href="javascript:void(0);" data-index="1" id="banner" class="active"></a>
		<table class="indextooltip">
			<tbody>
				<tr>
					<td class="indextooltipLft"></td>
					<td class="indextooltipMid">HOME</td>
					<td class="indextooltipRht"></td>
				</tr>
			</tbody>
		</table>
	</li>
	<li>
		<a href="javascript:void(0);" id="feature" class=""></a>
		<table class="indextooltip">
			<tbody>
				<tr>	
					<td class="indextooltipLft"></td>
					<td class="indextooltipMid">FEATURES</td>
					<td class="indextooltipRht"></td>
				</tr>
			</tbody>
		</table>
	</li>
	<li>
		<a href="javascript:void(0);" id="signup" class=""></a>
		<table class="indextooltip">
			<tbody>
				<tr>
					<td class="indextooltipLft"></td>
					<td class="indextooltipMid">SIGN UP</td>
					<td class="indextooltipRht"></td>
				</tr>
			</tbody>
		</table>
	</li>
</ul>-->
<div class="indexCont" id="order_content">
	<div class="header">
		<div class="container">
			<div class="newtopmenunav TopMenuNav clearfix">
				<ul class="row unstyled TopMenuNavList">
					<li class="sitelogo"><a href="javascript:void(0);"><img src="{$SITE_LOGO}" alt="siteLogo" title="siteLogo" /></a></li>
                    <li class="indexBannerDiv frt">
                    	<div class="indexBannerHead">
                            <ul class="Indexnav">
                                <li class="menu">
                                    <a href="javascript:void(0);" class="menuclick">Menu <img src="{$SITE_BASEURL}/images/menu.png" alt="menu" title="menu" /></a>
                                    <ul class="menuList" style="display:none;">
                                        <li class="arrow"></li>
                                        <li class="menuListIcon borTopNone">
                                            <a href="{$SITE_BASEURL}" class="menuHome">
                                                <img class="frontindex" src="{$SITE_BASEURL}/images/home.png" alt="home" title="home" />
                                                <div class="indexFearListTxt">
                                                    <img class="frontindex" src="{$SITE_BASEURL}/images/indexhome.png" alt="indexhome" title="indexhome" />
                                                    <p>Home</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="menuListIcon menuListIconListMar">
                                            <a href="javascript:void(0);" id="feature_content" class="menuFeature">
                                                <img class="frontindex" src="{$SITE_BASEURL}/images/features.png" alt="features" title="features" />
                                                <div class="indexFearListTxt">
                                                    <img class="frontindex" src="{$SITE_BASEURL}/images/indexfeatures.png" alt="indexfeatures" title="indexfeatures" />
                                                    <p>Features</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="menuListIcon menuListIconListMar">
                                            <a href="javascript:void(0);" id="createTheme" class="menuTheme">
                                                <img class="frontindex" src="{$SITE_BASEURL}/images/themes2.png" alt="themes2" title="themes2" />
                                                <div class="indexFearListTxt">
                                                    <img class="frontindex" src="{$SITE_BASEURL}/images/indextheme.png" alt="indextheme" title="indextheme" />
                                                    <p>Themes</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="menuListIcon">
                                            <a href="javascript:void(0);" id="createBlog" class="menuBlog">
                                                <img class="frontindex" src="{$SITE_BASEURL}/images/blogging2.png" alt="blogging2" title="blogging2" />
                                                <div class="indexFearListTxt">
                                                    <img class="frontindex" src="{$SITE_BASEURL}/images/indexblogging.png" alt="indexblogging" title="indexblogging" />
                                                    <p>Blog</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="menuListIcon menuListIconListMar">
                                            {*<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}content/about-us{else}staticPage.php?con_seourl=about-us{/if}"> *}
                                              <a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}aboutUs{else}aboutUs.php{/if}">
                                                <img class="frontindex" src="{$SITE_BASEURL}/images/about.png" alt="about" title="about" />
                                                <div class="indexFearListTxt">
                                                    <img class="frontindex" src="{$SITE_BASEURL}/images/indexabout.png" alt="indexabout" title="indexabout" />
                                                    <p>About</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="menuListIcon menuListIconListMar">	
                                            {*<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}content/contact-us{else}staticPage.php?con_seourl=contact-us{/if}"> *}
                                            <a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}contactUs{else}contactUs.php{/if}">
                                                <img class="frontindex" src="{$SITE_BASEURL}/images/contact.png" alt="contact" title="contact" />
                                                <div class="indexFearListTxt">
                                                    <img class="frontindex" src="{$SITE_BASEURL}/images/indexcontact.png" alt="indexabout" title="indexabout" />
                                                    <p>Contact</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="indexsocialConnect">
                                            <ul>
                                                <li class="socilConnectTxt">Social Connect</li>
                                                <li class="indexsocialConnectFb"><a href="{$objCommon->getFollowers('1')}" target="_blank"><img src="{$SITE_BASEURL}/images/fb2.png" alt="facebook" title="facebook"/></a></li>
                                                <li class="indexsocialConnectTw"><a href="{$objCommon->getFollowers('2')}" target="_blank"><img src="{$SITE_BASEURL}/images/twee.png" alt="twiiter" title="twiiter" /></a></li>
                                                <li class="indexsocialConnectGoog"><a href="{$objCommon->getFollowers('3')}" target="_blank"><img src="{$SITE_BASEURL}/images/g+.png" alt="google" title="google" /></a></li>
                                                {*<li class="indexsocialConnectYou"><a href="javascript:void(0);"><img src="{$SITE_BASEURL}/images/youtb.png" alt="youtube" title="youtube" /></a></li>
                                                <li class="indexsocialConnectInsta"><a href="javascript:void(0);"><img src="{$SITE_BASEURL}/images/insta.png" alt="insta" title="insta" /></a></li>*}
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="frt borNone loginPop dropdown">
						{if !$smarty.session.user_id}
							<a href="javascript:void(0);" class="dropdown-toggle " data-toggle="dropdown">
								Login <b class="caret"></b>
							</a> 
						{/if}		
						<div class="dropdown-menu offset0">
							<!--<div class="arrowTop"></div>-->
							{if !$smarty.session.user_id}
								<form name="loginform" id="loginform" class="no-mar" method="post" action="">
									<div class="headerDropDownList">
										<div id="error_msglogin"><span class="icon-close"></span></div>
										<div class="row-fluid">
										{*<div class="loginwidth">
											<h2>Login With</h2>
											<label><input type="radio" name="log" id="email_log" onclick="return showdiv('uemail');" checked="checked" value="">Email</label>
											<label><input type="radio" name="log" id="username_log" onclick="return showdiv('uname');">Username</label>
										  </div>*}
											<div id="uemail">
												<input type="text" class="textbox bordertop_radius span12" name="user_email" id="user_email" value="{if $smarty.cookies.cookie_userEmail neq ''}{$smarty.cookies.cookie_userEmail}{else}{$smarty.post.user_email}{/if}" placeholder="{$LANG.index_site_email}/{$LANG.index_site_user}"  value=""/>
											</div>
										{*	<div id="uname" style="display:none;">
											<input type="text" class="textbox span12" name="username" id="username" value="{if $smarty.cookies.cookie_userName neq ''}{$smarty.cookies.cookie_userName}{/if}" placeholder="{$LANG.index_site_user}" />
											</div>*}
											<input type="password" class="textbox span12 borderbottom_radius offset0" name="user_password" id="user_password" value="{if $smarty.cookies.cookie_Password neq ''}{$smarty.cookies.cookie_Password}{else}{$smarty.post.user_password}{/if}" placeholder="{$LANG.index_site_pass}" />
											<div class="clr"></div>	
											<div class="remember">
												<input type="checkbox" name="remember_me" id="remember_me" class="no-mar"  value="Yes" {if $smarty.cookies.cookie_userName && $smarty.cookies.cookie_Password} checked="checked" {elseif $smarty.cookies.cookie_userEmail}checked="checked" {/if} /> {$LANG.index_site_remember}
											</div>
											<a  href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}resetpass/1{else}resetPass.php?forgot=1{/if}" class="forgot">{$LANG.index_site_forgot}?</a>
											<input type="submit" class="loginPopButton" name="login" id="login" value="Login" />
										</div>
									</div>
								</form>
							{*===Facebook Login===*}			
							<div class="marLftRhtLogPop">
                                <input type="hidden" name="facebook_api_value" id="facebook_api_value" value="{$FACEBOOK_API}"/>
								<a onclick="return callFacebookConnect();" class="btn-facebook btn-block">
									<span class="facebook"></span>
									<span class="text">{$LANG.header_login_facebook}</span>
								</a>
							</div>
							{*===Facebook Login Ends===*}
						</div>
					{/if}	
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="indexBanner">
		<div class="container">
			 <div class="indexBannerCont">
                <div class="indexBannerContTop">A better web starts with your website</div>
                <ul class="indexBannerContBott">
                    <li><img src="{$SITE_BASEURL}/images/indexDott.png" alt="indexDott" title="indexDott" /> Websites</li>     
                    <li><img src="{$SITE_BASEURL}/images/indexDott.png" alt="indexDott" title="indexDott" /> Domains</li>     
                    <li><img src="{$SITE_BASEURL}/images/indexDott.png" alt="indexDott" title="indexDott" /> Commerce</li>     
                    <li><img src="{$SITE_BASEURL}/images/indexDott.png" alt="indexDott" title="indexDott" /> Mobile</li>   
                    <li><img src="{$SITE_BASEURL}/images/indexDott.png" alt="indexDott" title="indexDott" /> 24/7 Support</li>
                </ul>
                <a class="indexBannerContButton">Sign Up Now !</a>
            </div>
		</div>
	</div>
</div>
<div class="indexHowitWork">
	<div class="container">
		<div class="indexHowitWorkHead">How it Works</div>
		<div class="row-fluid">
			<div class="span3">
				<div class="indexCreate"></div>
				<div class="indexCreateHead">Create</div>
				<div class="indexCreateTxt">Create a free account <br>of your Website</div>
			</div>
			<div class="span3">
				<div class="indexBuild"></div>
				<div class="indexCreateHead">Build</div>
				<div class="indexCreateTxt">Build your website<br>User friendly</div>
			</div>
			<div class="span3">
				<div class="indexPublish"></div>
				<div class="indexCreateHead">Publish</div>
				<div class="indexCreateTxt">Publish your website<br>Domain</div>
			</div>
			<div class="span3">
				<div class="indexGrow"></div>
				<div class="indexCreateHead">Grow</div>
				<div class="indexCreateTxt">Grow with your<br>Business</div>
			</div>
		</div>
	</div>
</div>
<div class="indexCont" id="feature_content">
	<div class="indexSiteCrator">
		<div class="container">
			<div class="indexModernTheme">
				<div class="indexSiteCratorHead">Powerful Site Creator</div>
				<div class="indexSiteCratorInbuild">Themes, Blogs, Stores and Drag & Drop</div>
				<div class="row-fluid">
					<div id="slideshow">
						<div class="span4">
							<div class="indexSiteCreateLftInn indexSiteCreateLft">
								<ul class="slides-nav no-mar">
									<li class="on">
										<a href="#slide-one" id="createTheme" class="one active">
											<img src="{$SITE_BASEURL}/images/theme.png" alt="create theme" title="create theme" />
											<h3>theme</h3>
										</a>
									</li>
									<li>
										<a href="#slide-two" id="createDrag" class="two">
											<img src="{$SITE_BASEURL}/images/drag-&-drop.png" alt="drag-&-drop" title="drag-&-drop" />
											<h3>drag & drop</h3>
										</a>
									</li>
									<li>
										<a href="#slide-three" id="createMobile" class="three">
											<img src="{$SITE_BASEURL}/images/mobile-review.png" alt="mobile-review" title="mobile-review" />
											<h3>mobile view</h3>
										</a>
									</li>
									<li>
										<a href="#slide-four" id="createBlog" class="four">
											<img src="{$SITE_BASEURL}/images/blogs.png" alt="blog" title="blog" />
											<h3>blogging</h3>
										</a>
									</li>
									<li>
										<a href="#slide-five" id="createEcommerce" class="five">
											<img src="{$SITE_BASEURL}/images/ecommerce.png" alt="ecommerce" title="ecommerce" />
											<h3>ecommerce</h3>
										</a>
									</li>
									
								</ul>
							</div>
						</div>
						<div class="span8">
							<div class="indexSiteCreateRht">
								<div class="slides">
									<ul>
										<li id="slide-one">
											<div class="CreateSiteTab" id="createTheme_content">
												<div class="row-fluid">
													<div class="span6"><img src="{$SITE_BASEURL}/images/theme1.jpg" alt="theme1" title="theme1" /></div>
													<div class="span6"><img src="{$SITE_BASEURL}/images/theme2.jpg" alt="theme2" title="theme2" /></div>
												</div>
												<div class="row-fluid marTop30">
													<div class="span6"><img src="{$SITE_BASEURL}/images/theme3.jpg" alt="theme3" title="theme3" /></div>
													<div class="span6"><img src="{$SITE_BASEURL}/images/theme4.jpg" alt="theme4" title="theme4" /></div>
												</div>
												<div class="row-fluid marTop30 dc">
													<a class="siteBuildButton" href="javascript:void(0);">More Themes</a>
												</div>
											</div>
										</li>
										<li id="slide-two">
											<div class="CreateSiteTab" id="createDrag_content">
												<div class="CreateSiteTab" id="createTheme_content">
												<div class="row-fluid">
													<div class="span12 dc"><img class="dragGifImg" src="{$SITE_BASEURL}/images/drag-and-drop-new.gif" alt="drag" title="drag" /></div>
												</div>
											</div>
											</div>
										</li>   
										<li id="slide-three">
											<div class="CreateSiteTab" id="createMobile_content">
												<div class="CreateSiteTab" id="createTheme_content">
													<div class="row-fluid">
														<div class="span12 dc"><img src="{$SITE_BASEURL}/images/mobile-view.png" alt="mobile-view" title="mobile-view" /></div>
													</div>
												</div>
											</div>
										</li>      
										<li id="slide-four">
											<div class="CreateSiteTab" id="createBlog_content">
												<div class="CreateSiteTab" id="createTheme_content">
													<div class="row-fluid">
														<div class="span6"><img src="{$SITE_BASEURL}/images/store1.jpg" alt="store1" title="store1" /></div>
													</div>
													<div class="row-fluid marTop30 dc">
														<a class="siteBuildButton" href="javascript:void(0);">More Themes</a>
													</div>
												</div>
											</div>
										</li>  
										<li id="slide-five">
											<div class="CreateSiteTab" id="createEcommerce_content">
												<!--<div class="CreateSiteTab" id="createTheme_content">
													<div class="row-fluid">
														<div class="span6"><img src="{$SITE_BASEURL}/images/categories.jpg" alt="categories" title="categories" /></div>
														<div class="span6"><img src="{$SITE_BASEURL}/images/product.jpg" alt="product" title="product" /></div>
													</div>
													<div class="row-fluid marTop30">
														<div class="span6"><img src="{$SITE_BASEURL}/images/category-list.jpg" alt="category-list" title="category-list" /></div>
														<div class="span6"><img src="{$SITE_BASEURL}/images/product-list.jpg" alt="product-list" title="product-list" /></div>
													</div>
												</div>-->
												<div class="indexCommingSoon">Coming Soon ...</div>
											</div>
										</li>            
									</ul>
								</div>
							</div> 
						</div>
        			</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="indexCont" id="signup_content">
	<div class="indexFooter">
		<div class="container">
			<div class="indexFooterInn">
                {*<div id="facebook_api_value">{$FACEBOOK_API}</div>*}
                <input type="hidden" name="facebook_api_value" id="facebook_api_value" value="{$FACEBOOK_API}"/>
				<div class="indexFooterHead">Build and maintain your own website for FREE!</div>
				<div class="indexFooterPara">We help you every step of the way</div>
				<a class="indexFooterSocial" onclick="return callFacebookConnect();" href="javascript:void(0);"><img src="{$SITE_BASEURL}/images/fb-signup.png" alt="fb" title="fb" /></a>

				<div class="row-fluid">
					<div class="span6 indexFooterLeft">
						<div id="show_case">
							<div class="indexFooterLeftSlide">
								<div class="indexFooterLeftUser"></div>
								<div class="indexFooterSpace"></div>
								<div class="indexFooterDesc">
									<div class="indexFooterDescQuote"></div>
									<div class="indexFooterDescPara">Just wanted to say thank you for all your support. I have published my web page without any hassles and am quite proud of it seeing as I am not that computer savvy. . . .</div>
									<div class="indexFooterDescDate">Mark Antony, <b>Aug 15</b></div>
								</div>
							</div>
							<div class="indexFooterLeftSlide" style="display:none;">
								<div class="indexFooterDesc">
									<div class="indexFooterDescQuote"></div>
									<div class="indexFooterDescPara">Just wanted to say thank you for all your support. I have published my web page without any hassles and am quite proud of it seeing as I am not that computer savvy. . . .</div>
									<div class="indexFooterDescDate">Mark Antony, <b>Aug 15</b></div>
								</div>
								<div class="indexFooterSpace"></div>
								<div class="indexFooterLeftUser"></div>
							</div>
						</div>
					</div>
					<div class="span6">
						<div class="inndexFooterSignUp pull-right">
							{if !$smarty.session.user_id}
								<div id="errormsg">{if $successmsg}{$successmsg}{/if}</div>
								<form name="registerform" id="registerform" method="post" class="no-mar"> 	
									<div class="indexFooterSignupInn">
										<input class="indexFooterSignupInnLable" type="text" name="usrname" id="usrname" placeholder="{$LANG.index_site_full}" value=""/>
										<input class="indexFooterSignupInnLable" type="text" name="email" id="email" placeholder="{$LANG.index_site_email}" value=""/>
										<input class="indexFooterSignupInnLable" type="password" name="password" id="password" placeholder="{$LANG.index_site_pass}" value=""/>
										<input class="indexFooterSignupInnButton" type="submit" name="signupsubmit" id="signupsubmit" value="{$LANG.index_site_sign}"/> 
									</div>
								</form>
							{/if}
						</div>
					</div>
				</div>
			</div>
			<div class="indexFooterStaticPage">
				<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}terms{else}terms.php{/if}">Terms</a> | <a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}privacy{else}privacy.php{/if}">Privacy</a> &copy; 2014, {$SITE_MAIN_DOMAIN}, Inc.
			</div>
		</div>
	</div>
</div>
{literal}
	<script type="text/javascript">
		$(window).resize(function(){
			var winHei = $(window).height();
			var winWidt = $(window).width();
			$(".indexBanner").css({"width":winWidt,"height":winHei});
		});
		$(document).ready(function(){
			var winHei = $(window).height();
			var winWidt = $(window).width();
			$(".indexBanner").css({"width":winWidt,"height":winHei});
			
			$(".indexSiteCreateLftInn a").click(function() {
				$(".indexSiteCreateLftInn a").removeClass("active");
				$(".CreateSiteTab").hide();
				$(this).addClass("active"); 
				var activeTab = $(this).attr("id");
				$('#'+activeTab+'_content').show();
			});	
			$(".indexRightScroll li a").click(function() {
				$(".indexRightScroll li a").removeClass("active");
				$(this).addClass("active"); 
			});	
			
			var pageheight = $(window).height();
			$("#banner,.menuHome").click(function(){
				$(window).scrollTop(0);
			});
			$("#feature,.menuTheme,.menuFeature,.menuBlog").click(function(){
				$(window).scrollTop(pageheight);
			});
			$("#signup,.indexBannerContButton,.siteBuildButton").click(function(){
				$(window).scrollTop(pageheight*3);
			});


			$('.indexFooterLeft:gt(0)').hide();
			setInterval(function() {
				$(".indexFooterLeftSlide:first-child").fadeOut(2000).next(".indexFooterLeftSlide").fadeIn(2000).end().appendTo("#show_case")
			}, 7000);
			
			$("ul.Indexnav li.menu .menuclick").click(function(){
				$("ul.Indexnav li ul.menuList").slideToggle();
			});	
			$(".menuList li a").click(function(){
				$(".menuList").hide();
			});	
			$(".loginPop").click(function(){
				$("ul.Indexnav li ul.menuList").slideUp("slow");
			});	
			
		});
	</script>
{/literal}