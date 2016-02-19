<div class="staticHeader">
	<div class="newtopmenunav TopMenuNav nav-collapse in collapse no-mar clearfix">
		<div class="container">
			<ul class="nav row unstyled TopMenuNavList">
				<li class="sitelogo"><a href="{$SITE_BASEURL}"><img width="175" src="{$SITE_LOGO}" alt="siteLogo" title="siteLogo" /></a></li>
				<li class="pull-right borNone loginPop dropdown">
					{if !$smarty.session.user_id}
						<a href="javascript:void(0);" class="dropdown-toggle " data-toggle="dropdown">
							Login <b class="caret"></b>
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
										<input type="submit" class="loginPopButton" name="login" id="login" value="Login" />
									</div>
								</div>
							</form>
						{*===Facebook Login===*}			
						<div class="marLftRhtLogPop">
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
		<div class="staticHead">GİZLİLİK VE GÜVENLİK BİLDİRİMİ</div>
		<div class="ListContainOuter staticContAlign">
			<h3>Gizlilik ve Güvenlik Bildirimi</h3>
Bu metin Orca.web.tr web sitesi üzerinde gerçekleştirilecek işlemlerde izlenecek güvenlik ve gizlilik politikalarını belirtmektedir.<br /><br />

Orca.web.tr'de satış, sipariş, ödeme ve kredi kartı işlemlerinin sağlıklı bir şekilde gerçekleştirilmesi, hızlanması ve takibi amacı ile üyelik sistemi mevcuttur. Üyelik sistemi sayesinde içeriğimizin ve bu içeriğin yönetimi düzenlenmektedir.<br /><br />

Kullanıcılar üyelik sistemi içerisinde vermiş oldukları bilgileri istedikleri zaman düzenleme ve güncelleme haklarına sahiptirler.<br /><br />

Üyelik sistemi içerisinde verilen kişisel ve kurumsal bilgiler bu metinde bahsi geçen işlemler dışında hiçbir işlem için kullanılmayacaktır.<br /><br />

Ayrıca güvenlik nedeni ile işlemler sırasında işlem yapılan bilgisayara ve bağlantıya ait kaynaklar kaydedilmektedir. Kredi kartı işlemleri Garanti Bankası tarafından sağlanan POS sistemi üzerinden, GeoTrust firması tarafından sağlanan ve onaylanan 128 bit SSL sertifikası ile şifrelenmiş olarak sağlanmaktadır.<br /><br />

Güvenlik ve Gizlilik Politikamız ile ilgili sorularınız için lütfen bizimle iletişim sayfamız aracılığıyla bağlantıya geçin.
		</div>
	</div>
</div>
<div class="space"></div>