 <div class="container">
	<div class="resetContainer marTop40">
		<div class="head">{$LANG.password_reset}</div>	
		<div class="inner">	 
		<form name="resetconfirm" id="resetconfirm" class="no-mar" method="post" onsubmit="return resetConfirm();">
			 <div id="errorm"></div>
 			 <input type="hidden" name="user_id" id="user_id" value="{$smarty.get.u|base64_decode}">
			 <img src="{$SITE_BASEURL}/images/reset.jpeg" alt="reset" title="" />
			<div class="cont">{$LANG.password_desired_belw}</div>
			<div class="form">
			 	<label>{$LANG.password_new_password}</label>
				 <input type="password" name="new_pass" id="new_pass" value="">
				 <div class="clr"></div>
				 <label>{$LANG.password_new_confirm}</label>
				 <input type="password" name="confirm_pass" id="confirm_pass" value="">
				 <div class="clr"></div>
				 <input type="submit" class="btn btn-primary" name="reset" id="reset" value="Sıfırla">
				 <input  type="button" name="cancel" class="btn btn-danger" id="cancel" value="Vazgeç" onclick="return changePage();">
				 <div class="resetCont"><a href="{$SITE_BASEURL}">{$LANG.password_click_here}</a>{$LANG.password_to_go_to_main}</div>
			 </div>
		 </form>
		</div>
	</div>
</div>