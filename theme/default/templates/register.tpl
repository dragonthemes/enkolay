<div class="container">
	<div class="detailsBgGrey paddNon clearfix">
		<div class="registerHead">{$LANG.register_for_registration}</div>
		<div class="paddRoundTen">
			<div class="row-fluid marTop20">
				<div class="span5">
						<div class="span7 offset3">
							<a href="javascript:void(0);"  onclick="return callFacebookConnect();" class="facebookShare span12 marLft12">{$LANG.user_signup_with_facebook}</a>
						</div>
						{*========Twitter=========*}
						<div class="span7 marTop20 offset3">
							<a href="{$url}"  onclick="" class="twitterShare span12">{$LANG.user_signup_with_twitter}</a>
						</div>
						{*========Twitter ends======*} 
						{*========Gmail Login=========*}
						<div class="span7 marTop20 offset3">
							<a target="_blank"  href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}googlelogin{else}googlelogin.php{/if}" class="googleShrae span12">{$LANG.user_signup_with_google}</a>
						</div>
						{*========Gmail Login ends======*}
						<div class="span12 dc marTop20">
							<span class="alreadyUser1">
							{$LANG.already_acnt}?
							<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}login{/if}" class="signupClick">{$LANG.register_for_login}</a></span>	
						</div>
					</div>
				<div id="errormsg" class="errorMsgBg"><span style="color:red;margin-left:230px;">{if $successmsg}{$successmsg}{/if}</span></div>
				<div class="span7 borLeftGrey">
					<form name="registerform" id="registerform" class="sky-form form-horizontal skyformbgNon" method="post" action="" >
						<div class="row-fluid">
							<fieldset>
								<section>
									<div class="control-group">	
										<label for="" class="control-label label">{$LANG.register_name} <span class="redStar">{$LANG.register_star}</span></label>
										<div class="controls">
											<label class="input span11 offset0">
												<input type="text" name="username" id="username" value="{$smarty.post.username}" />
											</label>
										</div>
									</div>
								</section>
								<section>
									<div class="control-group">	
										<label for="" class="control-label label">{$LANG.register_email} <span class="redStar">{$LANG.register_star}</span></label>
										<div class="controls">
											<label class="input span11 offset0">
												<input type="text" name="email" id="email" value="{$smarty.post.email}"/>
											</label>
										</div>
									</div>
								</section>
								<section>
									<div class="control-group">	
										<label for="" class="control-label label">{$LANG.register_confirm_email} <span class="redStar">{$LANG.register_star}</span></label>
										<div class="controls">
											<label class="input span11 offset0">
												<input type="text" name="confirmemail" id="confirmemail" value="{$smarty.post.confirmemail}"/>
											</label>
										</div>
									</div>
								</section>
								<section>
									<div class="control-group">	
										<label for="" class="control-label label">{$LANG.register_password} <span class="redStar">{$LANG.register_star}</span></label>
										<div class="controls">
											<label class="input span11 offset0">
												<input type="password" name="password" id="password" value="{$smarty.post.password}"/>
											</label>
										</div>
									</div>
								</section>
								<section>
									<div class="control-group">	
										<label for="" class="control-label label">{$LANG.register_retype_password} <span class="redStar">{$LANG.register_star}</span></label>
										<div class="controls">
											<label class="input span11 offset0">
												<input type="password" name="repassword" id="repassword" value="{$smarty.post.repassword}" />
											</label>
										</div>
									</div>
								</section>
								<section>
									<div class="control-group">	
										<label for="" class="control-label label">{$LANG.register_address} <span class="redStar">{$LANG.register_star}</span></label>
										<div class="controls">
											<label class="textarea span11 offset0">
												<textarea rows="3" name="address" id="address">{$smarty.post.address}</textarea>
											</label>
										</div>
									</div>
								</section>
								<section>
									<div class="control-group">	
										<label for="" class="control-label label">&nbsp;</label>
										<div class="controls">
											<label class="captchaInner no-mar">
												<input type="hidden" name="aboutme" id="aboutme" value="Admin">
											</label>
											<div class="clearfix">
												<span class="span8 offset0">
													<img src="{$SITE_BASEURL}/captcha.php" id="captcha" class="captchaNew" />
												</span>
											</div>								
											<a href="#" onclick="document.getElementById('captcha').src='{$SITE_BASEURL}/captcha.php?'+Math.random(); document.getElementById('captcha-form').focus();" id="change-image" class="captchaNew">{$LANG.register_not_readable_text}</a>
											<span  class="captchaNew"><b>{$LANG.register_human_test}</b></span>
											<label class="input marTop10 captchaInner span11 offset0">
												<input type="text" name="captcha" id="captcha-form" class="captchatext" />
											</label>
										</div>
									</div>
								</section>
								<div class="row-fluid">
									<span class="span9 offset0">
										<input type="submit" name="register" id="register" class="button pull-right no-mar" value="Register" />									
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