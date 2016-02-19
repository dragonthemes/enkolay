<?php /* Smarty version 2.6.3, created on 2015-12-09 15:02:26
         compiled from contactUs.tpl */ ?>
<div class="staticHeader">
	<div class="newtopmenunav TopMenuNav nav-collapse in collapse no-mar clearfix">
		<div class="container">
			<ul class="nav row unstyled TopMenuNavList">
				<li class="sitelogo"><a href="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
"><img width="175" src="<?php echo $this->_tpl_vars['SITE_LOGO']; ?>
" alt="siteLogo" title="siteLogo" /></a></li>
				<li class="pull-right borNone loginPop dropdown">
					<?php if (! $_SESSION['user_id']): ?>
						<a href="javascript:void(0);" class="dropdown-toggle " data-toggle="dropdown">
							Giriş <b class="caret"></b>
						</a> 
					<?php endif; ?>		
					<div class="dropdown-menu span4 offset0">
						<!--<div class="arrowTop"></div>-->
						<?php if (! $_SESSION['user_id']): ?>
							<form name="loginform" id="loginform" class="no-mar" method="post" action="">
								<div class="headerDropDownList">
									<div id="error_msglogin"><span class="icon-close"></span></div>
									<div class="row-fluid">
																			<div id="uemail">
											<input type="text" class="textbox span12" name="user_email" id="user_email" value="<?php if ($_COOKIE['cookie_userEmail'] != ''):  echo $_COOKIE['cookie_userEmail'];  else:  echo $_POST['user_email'];  endif; ?>" placeholder="<?php echo $this->_tpl_vars['LANG']['index_site_email']; ?>
/<?php echo $this->_tpl_vars['LANG']['index_site_user']; ?>
"  value=""/>
										</div>
																			<input type="password" class="textbox span12 offset0" name="user_password" id="user_password" value="<?php if ($_COOKIE['cookie_Password'] != ''):  echo $_COOKIE['cookie_Password'];  else:  echo $_POST['user_password'];  endif; ?>" placeholder="<?php echo $this->_tpl_vars['LANG']['index_site_pass']; ?>
" />
										<div class="clr"></div>	
										<div class="remember">
											<input type="checkbox" name="remember_me" id="remember_me" class="no-mar"  value="Yes" <?php if ($_COOKIE['cookie_userName'] && $_COOKIE['cookie_Password']): ?> checked="checked" <?php elseif ($_COOKIE['cookie_userEmail']): ?>checked="checked" <?php endif; ?> /> <?php echo $this->_tpl_vars['LANG']['index_site_remember']; ?>

										</div>
										<a  href="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/<?php if ($this->_tpl_vars['USERFRIENDLY'] == 'Y'): ?>resetpass/1<?php else: ?>resetPass.php?forgot=1<?php endif; ?>" class="forgot"><?php echo $this->_tpl_vars['LANG']['index_site_forgot']; ?>
?</a>
										<input type="submit" class="loginPopButton" name="login" id="login" value="GİRİŞ" />
									</div>
								</div>
							</form>
									
						<div class="marLftRhtLogPop">
                            <input type="hidden" name="facebook_api_value" id="facebook_api_value" value="<?php echo $this->_tpl_vars['FACEBOOK_API']; ?>
"/>
							<a onclick="return callFacebookConnect();" class="btn-facebook btn-block">
								<span class="facebook"></span>
								<span class="text"><?php echo $this->_tpl_vars['LANG']['header_login_facebook']; ?>
</span>
							</a>
						</div>
											</div>
				<?php endif; ?>	
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