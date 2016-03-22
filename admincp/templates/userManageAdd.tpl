<div class="Heading">{if $smarty.get.user_id neq ''}{$LANG.user_edit}{/if} <a class="backButt pull-right" href="userManage.php"><i class="fa fa-backward"></i> {$LANG.admin_back}</a></div>
<div id="errormsg"><span style="color:red;margin-left:230px;">{$ErrorMessage}</span></div>
<div class="ContBody clearfix">
	<div class="alert alert-dismissable alert-info fade in">
		<button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="fa fa-remove"></i></button>
		<span class="title"><i class="fa fa-info-circle"></i> <span class="red">*</span> - {$LANG.admin_required_field}</span>
	</div>
	<div id="errormsg"></div>
	<form name="propertymgmt" method="post" onsubmit="return validateProperty();" class="sky-form form-horizontal skyformbgNon">
		<input type="hidden" name="user_id" id="user_id" value="{$smarty.get.user_id}">
		<input type="hidden" name="action" value="{if $smarty.get.user_id eq ''}{$LANG.admin_add}{else}{$LANG.admin_edit}{/if}">
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.user_name} <span class="color1">*</span></label>
			<div class="controls">
				 <input class="textbox" type="text" name="username" id="username" value="{if $smarty.get.user_id neq ''}{$uservalue.0.username}{else}{$smarty.request.username}{/if}" />
			   <script type="text/javascript">document.mgmt.username.focus();</script>
			   <div class="tooltip"><div class="HelpButton">?</div><span>Enter User name</span></div>	
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.user_email} <span class="color1">*</span></label>
			<div class="controls">
				 <input class="textbox" type="text" name="email" id="email" value="{if $smarty.get.user_id neq ''}{$uservalue.0.email}{else}{$smarty.request.email}{/if}" />
			   <script type="text/javascript">document.mgmt.username.focus();</script>
			   <div class="tooltip"><div class="HelpButton">?</div><span>Enter Email</span></div>	
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">&nbsp;</label>
			<div class="controls">
				<input type="submit" class="btn btn-info hei30" name="addEdit" value="{if $smarty.get.user_id neq ''}{$LANG.admin_edit}{else}{$LANG.admin_add}{/if}">
				<a class="btn btn-danger" href="userManage.php">{$LANG.admin_cancel}</a>
			</div>
		</div>
	</form>
</div>