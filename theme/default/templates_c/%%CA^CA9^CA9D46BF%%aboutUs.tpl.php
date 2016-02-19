<?php /* Smarty version 2.6.3, created on 2015-12-09 15:01:31
         compiled from aboutUs.tpl */ ?>
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
<div class="mySiteBgottom"></div>
<div class="row-fluid">
	<div class="container">
		<div class="staticHead">Hakkımızda</div>
		<div class="clr"></div>
		<div class="ListContainOuter staticContAlign">
				<br />Enkolayweb projesi,  10 yılı aşkın süredir yazılım, grafik tasarım ve sunucu bulundurma hizmetleri sağlayan Nova ve SPC firmalarının güç birliğinden doğmuştur. Son derece güzel ve profesyonel tasarıma sahip bir o kadar da ekonomik olan ve kolayca üretilen web sitelerine herkesin sahip olabilmesini hedefledik.
Enkolayweb Nedir ?<br /><br />
Enkolayweb; kendiniz veya şirketiniz için, sadece birkaç dakika içerisinde şık tasarımlı ve birçok özellikle dolu bir web sitesi yaratmanızı ve bunu kendinizin tasarlamasını sağlayan bir web sitesidir.<br /><br />
Sizin için düşündük, sizin için tasarladık!<br /><br />
İster İnşaat sektöründe olun, ister Bankacılık, ister web sitesi tasarımcısı olun, ister takı, ister müzisyen olun, ister futbolcu, Enkolayweb’in kolay web sitesi sihirbazının web tasarımı ile ilgili ilgisiz herkesin kullanabileceği kolaylıkta olması amacıyla yola çıktık.
Enkolayweb sayesinde, günler, haftalar hatta aylar süren uğraşlara hiç girmeden, dakikalar içerisinde kendinize veya işinize uygun, pratik, kaliteli ve kullanışlı bir web sitesi yaratabilirsiniz.<br /><br />
Herhangi kod ve benzeri yazılım bilgisine gerek kalmadan, dakikalar içinde web sitesi yaratma hizmetiyle birlikte Enkolayweb, gelişen ve hızlanan bilişim ve teknoloji sektörüne farklı bir hizmet anlayışı ve kalite getirme çabasını gerçekleştirmektedir.<br /><br />
Amacımız; hobiniz veya kurumsal işiniz için kendinize en uygun web sitesini yaratmanıza yardımcı olmak ve zahmeti en aza indirgeyerek işinizi kolaylaştırmak.
			</div>
	</div>
</div>
<div class="space"></div>