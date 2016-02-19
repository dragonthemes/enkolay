<div class="row-fluid">
	<div class="forgotHead">{$LANG.Forgot_Password} ?</div>
	<div class="marTop20">
		<div class="container">
			<div class="staticPageInner marTop20">
				<div class="forgotpassbg clearfix" id="forgetPassword">
					<div id="error_pass"></div>
					<div class="row-fluid">
						<div class="span8">
							<form name="forgetPassForm" class="no-mar" id="forgetPassForm" onsubmit="return forgetPasswordIndex();"  action="" method="post">
								<div class="row-fluid marTop20">
									<div class="span4">{$LANG.enter_your_mail} <span class="manetoryCol">{$LANG.register_star}</span></div>
									<input type="textbox" class="span7 myaccTctBx forgotPassTxt" name="forgetemail" id="forgetemail" value="" />
								</div>
								<div class="row-fluid marTop20">
									<span class="span4">&nbsp;</span>
									<input type="submit" class="btn btn-success" name="forgetSubmit" id="forgetSubmit" value="Send" />
									<a href="{$SITE_MAIN_DOMAIN}" class="btn btn-danger" name="cancel" id="cancel">Cancel</a>
								</div>
							</form>
						</div>
						<div class="span4">
							<div class="forgotpassRhtImg"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

