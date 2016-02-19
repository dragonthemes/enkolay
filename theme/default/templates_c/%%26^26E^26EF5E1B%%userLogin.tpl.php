<?php /* Smarty version 2.6.3, created on 2015-12-30 08:29:10
         compiled from userLogin.tpl */ ?>
<div class="container">
	<div class="detailsBgGrey clearfix">
		<?php if (! $_SESSION['user_id']): ?><div class="registerHead"><?php echo $this->_tpl_vars['LANG']['user_login']; ?>
</div><?php endif; ?>
		<div class="wrapperContent">
			<div class="row-fluid">
				<div class="marTop20">
					<?php if (! $_SESSION['user_id']): ?>
						<div class="span5">
							<div class="span7 offset3">
								<a href="javascript:void(0);"  onclick="return callFacebookConnect();" class="facebookShare span12 marLft12"><?php echo $this->_tpl_vars['LANG']['user_login_signin_facebook']; ?>
</a>
							</div>
														<div class="span7 marTop20 offset3">
								<a href="<?php echo $this->_tpl_vars['url']; ?>
"  class="twitterShare span12"><?php echo $this->_tpl_vars['LANG']['user_login_signin_twitter']; ?>
</a>
							</div>
							 
														<div class="span7 marTop20 offset3">
								<a target="_blank"  href="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/<?php if ($this->_tpl_vars['USERFRIENDLY'] == 'Y'): ?>googlelogin<?php else: ?>googlelogin.php<?php endif; ?>" class="googleShrae span12"><?php echo $this->_tpl_vars['LANG']['user_login_signin_google']; ?>
Google</a>
							</div>
														<div class="span12 dc marTop20">
								<span class="alreadyUser1">
								<?php echo $this->_tpl_vars['LANG']['click_here_for_register']; ?>

								<a href="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/<?php if ($this->_tpl_vars['USERFRIENDLY'] == 'Y'):  echo $this->_tpl_vars['LANG']['register_user_login'];  else: ?>register.php<?php endif; ?>" class="signupClick">Register</a></span>	
							</div>
						</div>
					<?php endif; ?>
					<div class="span7 borLeftGrey">
						<form name="loginform" id="loginform" class="sky-form form-horizontal skyformbgNon"  method="post" action="">
							<div id="error_msglogin"><span style="color:red;margin-left:230px;"></span></div>
							
							<div class="row-fluid">
								<fieldset>
									<section>
										<div class="control-group">	
											<label for="" class="control-label label"><?php echo $this->_tpl_vars['LANG']['register_email']; ?>
 <span class="redStar"><?php echo $this->_tpl_vars['LANG']['register_star']; ?>
</span></label>
											<div class="controls">
												<label class="input span11 offset0">
													<input type="text" name="user_email" id="user_email" value="<?php if ($_COOKIE['cookie_userName'] != ''):  echo $_COOKIE['cookie_userName'];  else:  echo $_POST['user_email'];  endif; ?>"/>
												</label>
											</div>
										</div>
									</section>
									<section>
										<div class="control-group">	
											<label for="" class="control-label label"><?php echo $this->_tpl_vars['LANG']['register_password']; ?>
 <span class="redStar"><?php echo $this->_tpl_vars['LANG']['register_star']; ?>
</span></label>
											<div class="controls">
												<label class="input span11 offset0">
													<input type="password" name="user_password" id="user_password" value="<?php if ($_COOKIE['cookie_Password'] != ''):  echo $_COOKIE['cookie_Password'];  else:  echo $_POST['user_password'];  endif; ?>"/>
												</label>
											</div>
										</div>
									</section>
									<section>
										<div class="control-group">	
											<label for="" class="control-label label">&nbsp;</label>
											<div class="controls">
												<input type="checkbox" class="no-mar" name="checkbox"> <?php echo $this->_tpl_vars['LANG']['register_remember_me']; ?>

												<a href="javascript:void(0);" onclick="forgetPassPopUp();" class="forgot pull-right"><?php echo $this->_tpl_vars['LANG']['register_forget_password']; ?>
</a>
											</div>
										</div>
									</section>
									<div class="row-fluid">
										<span class="span9 offset0">
											<input type="submit" name="login" id="login" value="Login" class="button pull-right no-mar" />									
										</span>
									</div>
								</fieldset>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "forgetPassword.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>