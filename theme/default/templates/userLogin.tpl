<div class="container">
	<div class="detailsBgGrey clearfix">
		{if !$smarty.session.user_id}<div class="registerHead">{$LANG.user_login}</div>{/if}
		<div class="wrapperContent">
			<div class="row-fluid">
				<div class="marTop20">
					{if !$smarty.session.user_id}
						<div class="span5">
							<div class="span7 offset3">
								<a href="javascript:void(0);"  onclick="return callFacebookConnect();" class="facebookShare span12 marLft12">{$LANG.user_login_signin_facebook}</a>
							</div>
							{*========Twitter=========*}
							<div class="span7 marTop20 offset3">
								<a href="{$url}"  class="twitterShare span12">{$LANG.user_login_signin_twitter}</a>
							</div>
							{*========Twitter ends======*} 
							{*========Gmail Login=========*}
							<div class="span7 marTop20 offset3">
								<a target="_blank"  href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}googlelogin{else}googlelogin.php{/if}" class="googleShrae span12">{$LANG.user_login_signin_google}Google</a>
							</div>
							{*========Gmail Login ends======*}
							<div class="span12 dc marTop20">
								<span class="alreadyUser1">
								{$LANG.click_here_for_register}
								<a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}{$LANG.register_user_login}{else}register.php{/if}" class="signupClick">Register</a></span>	
							</div>
						</div>
					{/if}
					<div class="span7 borLeftGrey">
						<form name="loginform" id="loginform" class="sky-form form-horizontal skyformbgNon"  method="post" action="">
							<div id="error_msglogin"><span style="color:red;margin-left:230px;"></span></div>
							
							<div class="row-fluid">
								<fieldset>
									<section>
										<div class="control-group">	
											<label for="" class="control-label label">{$LANG.register_email} <span class="redStar">{$LANG.register_star}</span></label>
											<div class="controls">
												<label class="input span11 offset0">
													<input type="text" name="user_email" id="user_email" value="{if $smarty.cookies.cookie_userName neq ''}{$smarty.cookies.cookie_userName}{else}{$smarty.post.user_email}{/if}"/>
												</label>
											</div>
										</div>
									</section>
									<section>
										<div class="control-group">	
											<label for="" class="control-label label">{$LANG.register_password} <span class="redStar">{$LANG.register_star}</span></label>
											<div class="controls">
												<label class="input span11 offset0">
													<input type="password" name="user_password" id="user_password" value="{if $smarty.cookies.cookie_Password neq ''}{$smarty.cookies.cookie_Password}{else}{$smarty.post.user_password}{/if}"/>
												</label>
											</div>
										</div>
									</section>
									<section>
										<div class="control-group">	
											<label for="" class="control-label label">&nbsp;</label>
											<div class="controls">
												<input type="checkbox" class="no-mar" name="checkbox"> {$LANG.register_remember_me}
												<a href="javascript:void(0);" onclick="forgetPassPopUp();" class="forgot pull-right">{$LANG.register_forget_password}</a>
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
{include file='forgetPassword.tpl}