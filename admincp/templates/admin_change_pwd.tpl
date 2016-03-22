<div class="Heading">{$LANG.admin_change_password}</div>
<div class="ContBody clearfix">
	<div class="alert alert-dismissable alert-info fade in">
		<button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="fa fa-remove"></i></button>
		<span class="title"><i class="fa fa-info-circle"></i> <span class="red">*</span> - {$LANG.admin_required_field}</span>
	</div>
	<form name="changepwd" method="post" onsubmit="return changepassword();" class="sky-form form-horizontal skyformbgNon">
		<div id="errormsg"></div>
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_old_password} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="password" name="old_password" id="old_password" value="" />
				<script type="text/javascript">document.changepwd.old_password.focus();</script>
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_new_password} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="password" name="new_password" id="new_password" value="" />
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_confirm_password} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="password" name="confirm_password" id="confirmed_password" value=""  />
			</div>
		</div>
		<div class="span3 marLeft44">
			<input type="submit" class="btn btn-success pull-right" value="Reset Password">
		</div>
	</form>
</div>