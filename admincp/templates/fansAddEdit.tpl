<div class="rightContHeading Heading">{if $smarty.get.fans_id neq ''}{$LANG.admin_edit_fans}{else}{$LANG.admin_add_fans}{/if} <a class="backButt pull-right" href="fansManage.php"><i class="fa fa-backward"></i> {$LANG.admin_back}</a></div>
<div class="ContBody clearfix">
	<div class="alert alert-dismissable alert-info fade in">
		<button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="fa fa-remove"></i></button>
		<span class="title"><i class="fa fa-info-circle"></i> <span class="red">*</span> - {$LANG.admin_required_field}</span>
	</div>
	<div id="errormsg">{$error}</div>
	<form name="addNewCuisine" method="post" enctype="multipart/form-data" onsubmit="return addFans();" class="sky-form form-horizontal skyformbgNon">	
	<input type="hidden" name="action" value="FansAddEdit">
	<input type="hidden" name="action" value="{if $smarty.get.fans_id eq ''}{$LANG.admin_add}{else}{$LANG.admin_edit}{/if}">
	 	
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_fans_name} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" name="fans_name" id="fans_name" value="{if $smarty.get.fans_id neq ''}{$contentValue.0.fans_name|stripslashes}{/if}" />
			 	<script type="text/javascript">document.addNewCuisine.fans_name.focus();</script>
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_fansurl} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" name="fans_url" id="fans_url" value="{if $smarty.get.fans_id neq ''}{$contentValue.0.fans_url|stripslashes}{/if}" />
				<script type="text/javascript">document.addNewCuisine.fans_url.focus();</script>
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">&nbsp;</label>
			<div class="controls">
				<input type="submit" class="btn btn-success" name="cus_addEdit" value="{if $smarty.get.fans_id neq ''}{$LANG.admin_edit}{else}{$LANG.admin_add}{/if}">
				<a class="btn btn-danger" href="fansManage.php">{$LANG.admin_cancel}</a>
			</div>
		</div>
	</form>
</div>