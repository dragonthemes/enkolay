<div class="rightContHeading Heading">{if $smarty.get.banner_id neq ''}{$LANG.admin_edit_background}{else}{$LANG.admin_add_background}{/if} <a class="backButt pull-right" href="backgroundManage.php"><i class="fa fa-backward"></i> {$LANG.admin_back}</a></div>
<div class="ContBody clearfix">
	<div class="alert alert-dismissable alert-info fade in">
		<button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="fa fa-remove"></i></button>
		<span class="title"><i class="fa fa-info-circle"></i> <span class="red">*</span> - {$LANG.admin_required_field}</span>
	</div>
	<div id="errormsg"><span class="color1">{$ErrorMessage}</span></div>
	<!--onsubmit="return validateBanner({$banner_width},{$banner_height});"-->
	<form name="addNewBackground" method="post" enctype="multipart/form-data" onsubmit="return validateBackground({if $smarty.get.background_id neq ''}'{$LANG.admin_edit}'{else}'{$LANG.admin_add}'{/if});" class="sky-form form-horizontal skyformbgNon">	
	<input type="hidden" name="action" value="backgroundAddEdit">
	<input type="hidden" name="background_id" id="background_id" value="{$smarty.get.background_id}">			
		<div class="control-group">	
			<label class="control-label label">{$LANG.admin_background_name} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" name="background_name" id="background_name" value="{if $smarty.get.background_id neq ''}{$selectFollowersValue.0.background_name|stripslashes}{/if}" />
				<script type="text/javascript">document.addNewBackground.background_name.focus();</script>
			</div>
		</div>	
		<div class="control-group">	
			<label class="control-label label">{$LANG.admin_background_image} <span class="color1">*</span></label>
			<div class="controls">
				<label for="file" class="input input-file widt300" name="uploadImagefile" id="uploadImagefile">
					<div class="button"><input type="file" tabindex="1030" value="" onchange="this.parentNode.nextSibling.value = this.value" name="background_image" id="background_image">Browse</div><input type="text" readonly="" class="hei40">
					<p></p>
				</label>
				
				{if $smarty.get.background_id neq '' and $selectFollowersValue.0.background_image neq ''}
					<span class="photoContainer">
						<img src="{$SITE_BACKGROUND_URL}/{$selectFollowersValue.0.background_image}" alt="{$selectFollowersValue.0.background_name|stripslashes}" title="{$selectFollowersValue.0.background_name|stripslashes}" width="100" height="50" />
					</span>
				{/if}	
			</div>
		</div>	
		<div class="control-group">	
			<label class="control-label label">&nbsp;</label>
			<div class="controls">
				<input type="submit" class="btn btn-success" name="background_addEdit" value="{if $smarty.get.background_id neq ''}{$LANG.admin_edit}{else}{$LANG.admin_add}{/if}">
				<a class="btn btn-danger" href="backgroundManage.php">Cancel</a>
			</div>
		</div>			
	</form>
</div>