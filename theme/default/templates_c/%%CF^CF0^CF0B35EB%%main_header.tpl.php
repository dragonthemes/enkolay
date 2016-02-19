<?php /* Smarty version 2.6.3, created on 2015-12-09 11:28:35
         compiled from main_header.tpl */ ?>
<?php if ($this->_tpl_vars['req_file_name'] == 'onboarding.php'): ?>
	<div class="container">
		<a class="onboraingheader" href="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
">
			<img src="<?php echo $this->_tpl_vars['SITE_LOGO']; ?>
" alt="logo" title="" />
		</a>
	</div>
<?php endif;  if ($this->_tpl_vars['req_file_name'] == 'forgotPassword.php'): ?>
	<div class="container">
		<a class="onboraingheader" href="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
">
			<img src="<?php echo $this->_tpl_vars['SITE_LOGO']; ?>
" alt="logo" title="" />
		</a>
	</div>
<?php endif;  if ($this->_tpl_vars['req_file_name'] == 'resetPass.php' || $this->_tpl_vars['req_file_name'] == 'resetNewConfirm.php'): ?>
	<div class="container">
		<a class="forgotPassHeader" href="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
">
			<img src="<?php echo $this->_tpl_vars['SITE_LOGO']; ?>
" width="175" alt="logo" title="" />
		</a>
	</div>
<?php endif;  if ($this->_tpl_vars['req_file_name'] != 'onboarding.php'): ?>
	<?php if ($this->_tpl_vars['req_file_name'] == 'userHome.php' || $this->_tpl_vars['req_file_name'] == 'Mytransaction.php' || $this->_tpl_vars['req_file_name'] == 'MyHome.php' || $this->_tpl_vars['req_file_name'] == 'MyInvites.php' || $this->_tpl_vars['req_file_name'] == 'Myaccount.php' || $this->_tpl_vars['req_file_name'] == 'pointDomain.php' || $this->_tpl_vars['req_file_name'] == 'subscription.php' || $this->_tpl_vars['req_file_name'] == 'buyCredits.php' || $this->_tpl_vars['req_file_name'] == 'Support.php' || $this->_tpl_vars['req_file_name'] == 'buildEdit.php' || $this->_tpl_vars['req_file_name'] == 'mobOptions.php' || $this->_tpl_vars['req_file_name'] == 'themes_support.php' || $this->_tpl_vars['req_file_name'] == 'host.php' || $this->_tpl_vars['req_file_name'] == 'blogging.php' || $this->_tpl_vars['req_file_name'] == 'photos.php' || $this->_tpl_vars['req_file_name'] == 'forms.php' || $this->_tpl_vars['req_file_name'] == 'domains.php' || $this->_tpl_vars['req_file_name'] == 'staticPage.php'): ?>
		<div class="mySiteBg">
			<div class="container">
				<div class="mySiteBgTop">
					<a href="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
">
						<img src="<?php echo $this->_tpl_vars['SITE_LOGO']; ?>
" alt="logo" title="" width="175" />
					</a>
					
                    
				</div>
				<ul class="mysiteNav clearfix">
					<?php if (! $_SESSION['user_id']): ?>
					<?php else: ?>
						<li><a href="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/<?php if ($this->_tpl_vars['USERFRIENDLY'] == 'Y'): ?>userhome<?php else: ?>userHome.php<?php endif; ?>" class="navListtop <?php if ($this->_tpl_vars['req_file_name'] == 'userHome.php'): ?>active<?php endif; ?>"><?php echo $this->_tpl_vars['LANG']['header_mysite']; ?>
</a></li>
						<li><a href="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/<?php if ($this->_tpl_vars['USERFRIENDLY'] == 'Y'): ?>mytransaction<?php else: ?>Mytransaction.php<?php endif; ?>" class="<?php if ($this->_tpl_vars['req_file_name'] == 'Mytransaction.php'): ?>active <?php endif; ?>"><?php echo $this->_tpl_vars['LANG']['header_transaction']; ?>
</a></li>	
											<li><a href="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/<?php if ($this->_tpl_vars['USERFRIENDLY'] == 'Y'): ?>myinvites<?php else: ?>MyInvites.php<?php endif; ?>" class="navListtop <?php if ($this->_tpl_vars['req_file_name'] == 'MyInvites.php'): ?> active <?php endif; ?>"><?php echo $this->_tpl_vars['LANG']['header_invites']; ?>
</a></li>
						<li><a href="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/<?php if ($this->_tpl_vars['USERFRIENDLY'] == 'Y'): ?>support<?php else: ?>Support.php<?php endif; ?>" class="<?php if ($this->_tpl_vars['req_file_name'] == 'Support.php'): ?> active <?php endif; ?>"><?php echo $this->_tpl_vars['LANG']['header_feature']; ?>
</a></li>
						<li><a href="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/<?php if ($this->_tpl_vars['USERFRIENDLY'] == 'Y'): ?>myaccount<?php else: ?>Myaccount.php<?php endif; ?>" class="<?php if ($this->_tpl_vars['req_file_name'] == 'Myaccount.php'): ?>active <?php endif; ?>"><?php echo $this->_tpl_vars['LANG']['header_account']; ?>
</a></li>
						<li><a class="" onclick="return logout();"><?php echo $this->_tpl_vars['LANG']['header_logout']; ?>
</a></li>
					<?php endif; ?>	
				</ul>
			</div>
		</div>
		<div class="mySiteBgottom"></div>
	<?php endif;  endif; ?>

<?php if ($this->_tpl_vars['req_file_name'] == ''): ?>
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
								<?php unset($this->_sections['language']);
$this->_sections['language']['name'] = 'language';
$this->_sections['language']['loop'] = is_array($_loop=$this->_tpl_vars['language_names']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['language']['show'] = true;
$this->_sections['language']['max'] = $this->_sections['language']['loop'];
$this->_sections['language']['step'] = 1;
$this->_sections['language']['start'] = $this->_sections['language']['step'] > 0 ? 0 : $this->_sections['language']['loop']-1;
if ($this->_sections['language']['show']) {
    $this->_sections['language']['total'] = $this->_sections['language']['loop'];
    if ($this->_sections['language']['total'] == 0)
        $this->_sections['language']['show'] = false;
} else
    $this->_sections['language']['total'] = 0;
if ($this->_sections['language']['show']):

            for ($this->_sections['language']['index'] = $this->_sections['language']['start'], $this->_sections['language']['iteration'] = 1;
                 $this->_sections['language']['iteration'] <= $this->_sections['language']['total'];
                 $this->_sections['language']['index'] += $this->_sections['language']['step'], $this->_sections['language']['iteration']++):
$this->_sections['language']['rownum'] = $this->_sections['language']['iteration'];
$this->_sections['language']['index_prev'] = $this->_sections['language']['index'] - $this->_sections['language']['step'];
$this->_sections['language']['index_next'] = $this->_sections['language']['index'] + $this->_sections['language']['step'];
$this->_sections['language']['first']      = ($this->_sections['language']['iteration'] == 1);
$this->_sections['language']['last']       = ($this->_sections['language']['iteration'] == $this->_sections['language']['total']);
?>
									<a href="?lan=<?php echo $this->_tpl_vars['language_names'][$this->_sections['language']['index']]['lang_code']; ?>
"><?php echo $this->_tpl_vars['language_names'][$this->_sections['language']['index']]['lang_name']; ?>
</a>
								<?php endfor; endif; ?>
							</li>
							<li class="langToggArrow"><b class="caret"></b></li>
						</ul>
					</li>-->
					<li class="sitelogo"><a href="javascript:void(0);"><img src="<?php echo $this->_tpl_vars['SITE_LOGO']; ?>
" alt="siteLogo" title="siteLogo" /></a></li>
					<li class="pull-right borNone loginPop dropdown">
						<?php if (! $_SESSION['user_id']): ?>
							<a href="javascript:void(0);" class="dropdown-toggle " data-toggle="dropdown">
								Login <b class="caret"></b>
							</a> 
						<?php endif; ?>		
						<div class="dropdown-menu span3 offset0">
							<!--<div class="arrowTop"></div>-->
							<?php if (! $_SESSION['user_id']): ?>
								<form name="loginform" id="loginform" class="no-mar" method="post" action="">
									<div class="headerDropDownList">
										<div id="error_msglogin"><span class="icon-close"></span></div>
										<div class="row-fluid">
																					<div id="uemail">
												<input type="text" class="textbox bordertop_radius span12" name="user_email" id="user_email" value="<?php if ($_COOKIE['cookie_userEmail'] != ''):  echo $_COOKIE['cookie_userEmail'];  else:  echo $_POST['user_email'];  endif; ?>" placeholder="<?php echo $this->_tpl_vars['LANG']['index_site_email']; ?>
/<?php echo $this->_tpl_vars['LANG']['index_site_user']; ?>
"  value=""/>
											</div>
																					<input type="password" class="textbox span12 borderbottom_radius offset0" name="user_password" id="user_password" value="<?php if ($_COOKIE['cookie_Password'] != ''):  echo $_COOKIE['cookie_Password'];  else:  echo $_POST['user_password'];  endif; ?>" placeholder="<?php echo $this->_tpl_vars['LANG']['index_site_pass']; ?>
" />
											<div class="clr"></div>	
											<div class="remember">
												<input type="checkbox" name="remember_me" id="remember_me" class="no-mar"  value="Yes" <?php if ($_COOKIE['cookie_userName'] && $_COOKIE['cookie_Password']): ?> checked="checked" <?php elseif ($_COOKIE['cookie_userEmail']): ?>checked="checked" <?php endif; ?> /> <?php echo $this->_tpl_vars['LANG']['index_site_remember']; ?>

											</div>
											<a  href="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/<?php if ($this->_tpl_vars['USERFRIENDLY'] == 'Y'): ?>resetpass/1<?php else: ?>resetPass.php?forgot=1<?php endif; ?>" class="forgot"><?php echo $this->_tpl_vars['LANG']['index_site_forgot']; ?>
?</a>
											<input type="submit" class="loginPopButton" name="login" id="login" value="Login" />
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
<?php endif; ?>