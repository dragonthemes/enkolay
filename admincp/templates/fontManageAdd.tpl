<div class="rightContHeading Heading">{if $smarty.get.font_id neq ''}{$LANG.admin_edit_font}{else}{$LANG.admin_add_font}{/if} <a class="backButt pull-right" href="fontManage.php"><i class="fa fa-backward"></i> {$LANG.admin_back}</a></div>
<div class="ContBody clearfix">
	<div class="alert alert-dismissable alert-info fade in">
		<button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="fa fa-remove"></i></button>
		<span class="title"><i class="fa fa-info-circle"></i> <span class="red">*</span> - {$LANG.admin_required_field}</span>
	</div>
	<div id="errormsg"><span class="color1">{$ErrorMessage}</span></div>
	<!--onsubmit="return validateBanner({$banner_width},{$banner_height});"-->
	<form name="addNewFont" method="post" enctype="multipart/form-data" onsubmit="return validateFont();" class="sky-form form-horizontal skyformbgNon">	
	<input type="hidden" name="action" value="fontAddEdit">
	<input type="hidden" name="font_id" id="font_id" value="{$smarty.get.font_id}">	
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_font_name} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" name="font_name" id="font_name" value="{if $smarty.get.font_id neq ''}{$selectFollowersValue.0.font_name|stripslashes}{/if} {$smarty.post.font_name}" />
				<script type="text/javascript">document.addNewFont.font_name.focus();</script>
			</div>
		</div>
		
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_font_status} <span class="color1">*</span></label>
			<div class="controls">
				<label class="span1 offset0">
					<input class="radioButtAlign" type="radio" name="status" id="status_active" value="1" {if $selectFollowersValue.0.status|stripslashes eq '1'}checked{/if}/>
					 Active
				</label>
				<label class="span1 offset0">
					<input class="radioButtAlign" type="radio" name="status" id="status_inactive" value="0" {if $selectFollowersValue.0.status|stripslashes eq '0'}checked{/if}/>
					 Inactive
				</label>
				<script type="text/javascript">document.addNewFont.status.focus();</script>
			</div>
		</div>
		
		<div class="control-group">	
			<label class="control-label label">&nbsp;</label>
			<div class="controls">
				<input type="submit" class="btn btn-success" name="font_addEdit" value="{if $smarty.get.font_id neq ''}{$LANG.admin_edit}{else}{$LANG.admin_add}{/if}">
				<a class="btn btn-danger" href="fontManage.php">Cancel</a>
			</div>
		</div>
	</form>
</div>