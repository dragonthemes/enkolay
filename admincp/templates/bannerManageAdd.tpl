<div class="rightContHeading Heading">{if $smarty.get.banner_id neq ''}{$LANG.admin_edit_banner}{else}{$LANG.admin_add_banner}{/if} <a class="backButt pull-right" href="bannerManage.php"><i class="fa fa-backward"></i> {$LANG.admin_back}</a></div>
<div class="ContBody clearfix">
	<div class="alert alert-dismissable alert-info fade in">
		<button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="fa fa-remove"></i></button>
		<span class="title"><i class="fa fa-info-circle"></i> <span class="red">*</span> - {$LANG.admin_required_field}</span>
	</div>
	<div id="errormsg"><span class="color1">{$ErrorMessage}</span></div>
	<!--onsubmit="return validateBanner({$banner_width},{$banner_height});"-->
	<form name="addNewBanner" method="post" enctype="multipart/form-data" onsubmit="return validateBanner({if $smarty.get.banner_id neq ''}'{$LANG.admin_edit}'{else}'{$LANG.admin_add}'{/if});" class="sky-form form-horizontal skyformbgNon">	
	<input type="hidden" name="action" value="bannerAddEdit">
	<input type="hidden" name="banner_id" id="banner_id" value="{$smarty.get.banner_id}">			
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_banner_name} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" name="banner_name" id="banner_name" value="{if $smarty.get.banner_id neq ''}{$selectFollowersValue.0.banner_name|stripslashes}{/if}{$smarty.post.banner_name}" />
				<script type="text/javascript">document.addNewBanner.banner_name.focus();</script>
				<div class="tooltip"><div class="HelpButton">?</div><span>Enter banner name</span></div>
			</div>
		</div>
		
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_banner_image} <span class="color1">*</span></label>
			<div class="controls">
				<label for="banner_image" class="input input-file widt300">
					<div class="button"><input type="file" onchange="this.parentNode.nextSibling.value = this.value" name="banner_image" id="banner_image">Browse</div><input type="text" readonly="">
				</label>
				<span class="tooltip"><span class="HelpButton">?</span><span>{$LANG.admin_upload_image}</span></span>
				{if $smarty.get.banner_id neq '' and $selectFollowersValue.0.banner_image neq ''}
					<span class="photoContainer">
						<img src="{$SITE_BANNER_URL}/{$selectFollowersValue.0.banner_image}" alt="{$selectFollowersValue.0.banner_name|stripslashes}" title="{$selectFollowersValue.0.banner_name|stripslashes}" width="100" height="50" />
					</span>
				{/if}		
			</div>
		</div>
		
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_banner_title} <span class="color1">*</span></label>
			<div class="controls">
				{$Editor}
				<div class="tooltip"><div class="HelpButton">?</div><span>Banner Title</span></div>
			</div>
		</div>
			
		<div class="control-group">	
			<label class="control-label label" for="">&nbsp;</label>
			<div class="controls">
				<input type="submit" class="btn btn-success" name="banner_addEdit" value="{if $smarty.get.banner_id neq ''}{$LANG.admin_edit}{else}{$LANG.admin_add}{/if}">
				<a class="btn btn-danger" href="bannerManage.php">Cancel</a>
			</div>
		</div>
	</form>
</div>