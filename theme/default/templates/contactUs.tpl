<div class="staticHeader">
	<div class="newtopmenunav TopMenuNav nav-collapse in collapse no-mar clearfix">
		<div class="container">
			<ul class="nav row unstyled TopMenuNavList">
				<li class="sitelogo"><a href="{$SITE_BASEURL}"><img width="175" src="{$SITE_LOGO}" alt="siteLogo" title="siteLogo" /></a></li>
				<li class="pull-right borNone loginPop dropdown">
					{if !$smarty.session.user_id}
						<a href="javascript:void(0);" class="dropdown-toggle " data-toggle="dropdown">
							Giriş <b class="caret"></b>
						</a> 
					{/if}		
					<div class="dropdown-menu span4 offset0">
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
											<input type="text" class="textbox span12" name="user_email" id="user_email" value="{if $smarty.cookies.cookie_userEmail neq ''}{$smarty.cookies.cookie_userEmail}{else}{$smarty.post.user_email}{/if}" placeholder="{$LANG.index_site_email}/{$LANG.index_site_user}"  value=""/>
										</div>
									{*	<div id="uname" style="display:none;">
										<input type="text" class="textbox span12" name="username" id="username" value="{if $smarty.cookies.cookie_userName neq ''}{$smarty.cookies.cookie_userName}{/if}" placeholder="{$LANG.index_site_user}" />
										</div>*}
										<input type="password" class="textbox span12 offset0" name="user_password" id="user_password" value="{if $smarty.cookies.cookie_Password neq ''}{$smarty.cookies.cookie_Password}{else}{$smarty.post.user_password}{/if}" placeholder="{$LANG.index_site_pass}" />
										<div class="clr"></div>	
										<div class="remember">
											<input type="checkbox" name="remember_me" id="remember_me" class="no-mar"  value="Yes" {if $smarty.cookies.cookie_userName && $smarty.cookies.cookie_Password} checked="checked" {elseif $smarty.cookies.cookie_userEmail}checked="checked" {/if} /> {$LANG.index_site_remember}
										</div>
										<a  href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}resetpass/1{else}resetPass.php?forgot=1{/if}" class="forgot">{$LANG.index_site_forgot}?</a>
										<input type="submit" class="loginPopButton" name="login" id="login" value="GİRİŞ" />
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
<div class="row-fluid">
	<div class="container">
		<div class="staticHead">BİZE ULAŞIN</div>
		<div class="ListContainOuter staticContAlign">
			<br />İletişim Bilgileri<br />
Adres: Galip Dede Sokak No: 9/5 Çankaya 06680 Ankara<br />
Tel: 312 468 1671<br />
Fax: 312 428 0908<br /><br />
 
Hızlı Sayfalar Kurumsal Bilgiler<br />
Şirket Unvanı: Hızlı Sayfalar İnternet ve Bilişim Hizmetleri Ticaret Ltd. Şti.<br />
Sorumlu Kişiler: Mehmet Çağrı Yakar & Arda Burak Sepici<br />
Ticaret Sicil No: 313527<br />
Merkezinin Bulunduğu Yer: Ankara<br />
E-posta: info@hizlisayfalar.net<br />
Telefon No: 312 468 16 71<br />
		</div>
	</div>
</div>
<div class="space"></div>