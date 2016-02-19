{if $req_file_name eq 'onboarding.php'}
	<div class="container">
		<a class="onboraingheader" href="{$SITE_BASEURL}">
			<img src="{$SITE_LOGO}" alt="logo" title="" />
		</a>
	</div>
{/if}
{if $req_file_name eq 'forgotPassword.php'}
	<div class="container">
		<a class="onboraingheader" href="{$SITE_BASEURL}">
			<img src="{$SITE_LOGO}" alt="logo" title="" />
		</a>
	</div>
{/if}
{if $req_file_name eq 'resetPass.php' || $req_file_name eq 'resetNewConfirm.php'}
	<div class="container">
		<a class="forgotPassHeader" href="{$SITE_BASEURL}">
			<img src="{$SITE_LOGO}" width="175" alt="logo" title="" />
		</a>
	</div>
{/if}
{if $req_file_name neq 'onboarding.php'}
	{if $req_file_name eq 'userHome.php' || $req_file_name eq 'Mytransaction.php' || $req_file_name eq 'MyHome.php' || $req_file_name eq 'MyInvites.php' || $req_file_name eq 'Myaccount.php' || $req_file_name eq 'pointDomain.php' || $req_file_name eq 'subscription.php' || $req_file_name eq 'buyCredits.php' ||  $req_file_name eq 'Support.php' || $req_file_name eq 'buildEdit.php' || $req_file_name eq 'mobOptions.php' || $req_file_name eq 'themes_support.php' || $req_file_name eq 'host.php' || $req_file_name eq 'blogging.php' || $req_file_name eq 'photos.php' || $req_file_name eq 'forms.php' || $req_file_name eq 'domains.php' || $req_file_name eq 'staticPage.php'}
		<div class="mySiteBg">
			<div class="container">
				<div class="mySiteBgTop">
					<a href="{$SITE_BASEURL}">
						<img src="{$SITE_LOGO}" alt="logo" title="" width="175" />
					</a>
					
                    
				</div>
				<ul class="mysiteNav clearfix">
					{if !$smarty.session.user_id}
					{else}
						<li><a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}userhome{else}userHome.php{/if}" class="navListtop {if $req_file_name eq 'userHome.php'}active{/if}">{$LANG.header_mysite}</a></li>
						<li><a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}mytransaction{else}Mytransaction.php{/if}" class="{if $req_file_name eq 'Mytransaction.php'}active {/if}">{$LANG.header_transaction}</a></li>	
					{*	<li><a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}myhome{else}MyHome.php{/if}"  class="navListtop {if $req_file_name eq 'MyHome.php'} active {/if}">{$LANG.header_domain}</a></li>  *}
						<li><a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}myinvites{else}MyInvites.php{/if}" class="navListtop {if $req_file_name eq 'MyInvites.php'} active {/if}">{$LANG.header_invites}</a></li>
						<li><a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}support{else}Support.php{/if}" class="{if $req_file_name eq 'Support.php'} active {/if}">{$LANG.header_feature}</a></li>
						<li><a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}myaccount{else}Myaccount.php{/if}" class="{if $req_file_name eq 'Myaccount.php'}active {/if}">{$LANG.header_account}</a></li>
						<li><a class="" onclick="return logout();">{$LANG.header_logout}</a></li>
					{/if}	
				</ul>
			</div>
		</div>
		<div class="mySiteBgottom"></div>
	{/if}
{/if}

{if $req_file_name eq ''}
	<div class="header">
		<div class="container">
			<div class="newtopmenunav TopMenuNav clearfix">
				<ul class="row unstyled TopMenuNavList">
					<!--<li class="headerLangList borNone dropdown">
						<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
							<span class="selctLanTxt">Select Language <b class="caret"></b></span>
						</a>
						<ul class="headerLangListToggle dropdown-menu">
							<li>
								{section name=language loop=$language_names}
									<a href="?lan={$language_names[language].lang_code}">{$language_names[language].lang_name}</a>
								{/section}
							</li>
							<li class="langToggArrow"><b class="caret"></b></li>
						</ul>
					</li>-->
					<li class="sitelogo"><a href="javascript:void(0);"><img src="{$SITE_LOGO}" alt="siteLogo" title="siteLogo" /></a></li>
					<li class="pull-right borNone loginPop dropdown">
						{if !$smarty.session.user_id}
							<a href="javascript:void(0);" class="dropdown-toggle " data-toggle="dropdown">
								Login <b class="caret"></b>
							</a> 
						{/if}		
						<div class="dropdown-menu span3 offset0">
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
{/if}