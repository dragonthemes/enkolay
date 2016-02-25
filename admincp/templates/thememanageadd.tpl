<div class="rightContHeading Heading">{if $smarty.get.blog_id neq ''}{$LANG.admin_edit_theme}{else}{$LANG.admin_add_theme}{/if} <a class="backButt pull-right" href="thememanage.php"><i class="fa fa-backward"></i> {$LANG.admin_back}</a></div>
<div class="ContBody clearfix">
	<div class="alert alert-dismissable alert-info fade in">
		<button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="fa fa-remove"></i></button>
		<span class="title"><i class="fa fa-info-circle"></i> <span class="red">*</span> - {$LANG.admin_required_field}</span>
	</div>
	<div id="errormsg"><span class="color1">{$Errormessage}</span></div>
	<!--onsubmit="return validateBanner({$banner_width},{$banner_height});"-->
	<form name="addNewTheme" method="post" enctype="multipart/form-data" onsubmit="return validateTheme({if $smarty.get.theme_id neq ''}'{$LANG.admin_edit}'{else}'{$LANG.admin_add}'{/if});" class="sky-form form-horizontal skyformbgNon">	
	<input type="hidden" name="action" value="{if $smarty.get.theme_id eq ''}thememanageadd{else}thememanageedit{/if}">
	<input type="hidden" name="theme_id" id="theme_id" value="{$smarty.get.theme_id}">		
		<div class="clearfix priceHeading">{$LANG.admin_theme_management}</div>
		<div class="control-group">	
			<label class="control-label label" for="">Theme Name <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" name="theme_name" id="theme_name"  onkeyup="checkthemeName();"  value="{if $smarty.get.theme_id neq ''}{$selectFollowersValue.0.theme_name|stripslashes}{/if}" />
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">Theme Description <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" name="theme_description" id="theme_description" value="{if $smarty.get.theme_id neq ''}{$selectFollowersValue.0.theme_description|stripslashes}{/if}" />
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_theme_image} <span class="color1">*</span></label>
			<div class="controls">
				<label for="file" class="input input-file widt300" name="uploadImagefile" id="uploadImagefile">
					<div class="button"><input type="file" tabindex="1030" value="" onchange="this.parentNode.nextSibling.value = this.value" name="theme_image" id="theme_image">Browse</div><input type="text" readonly="" class="hei40">
					<p></p>
				</label>
				
				{if $smarty.get.theme_id neq '' and $selectFollowersValue.0.theme_image neq ''}
					<span class="photoContainer">
						<img src="{$SITE_IMAGE_BANNER_URL}/{$selectFollowersValue.0.theme_image}" alt="{$selectFollowersValue.0.theme_image|stripslashes}" title="{$selectFollowersValue.0.theme_image|stripslashes}" width="100" height="50" />
					</span>
				{/if}
			</div>
		</div>
		<!--<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_theme_red_image} </label>
			<div class="controls">
				<label for="file" class="input input-file widt300" name="uploadImagefile" id="uploadImagefile">
					<div class="button"><input type="file" tabindex="1030" value="" onchange="this.parentNode.nextSibling.value = this.value" name="red_theme_image" id="theme_image">Browse</div><input type="text" readonly="" class="hei40">
					<p></p>
				</label>
				{if $smarty.get.theme_id neq '' and $selectFollowersValue.0.red_theme_image neq ''}
					<span class="photoContainer">
						<img src="{$SITE_IMAGE_BANNER_URL}/{$selectFollowersValue.0.red_theme_image}" alt="{$selectFollowersValue.0.red_theme_image|stripslashes}" title="{$selectFollowersValue.0.theme_image|stripslashes}" width="100" height="50" />
					</span>
				{/if}
				
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_theme_green_image} </label>
			<div class="controls">
				<label for="file" class="input input-file widt300" name="uploadImagefile" id="uploadImagefile">
					<div class="button"><input type="file" tabindex="1030" value="" onchange="this.parentNode.nextSibling.value = this.value" name="green_theme_image" id="theme_image">Browse</div><input type="text" readonly="" class="hei40"><p></p>
				</label>
				{if $smarty.get.theme_id neq '' and $selectFollowersValue.0.green_theme_image neq ''}
					<span class="photoContainer">
						<img src="{$SITE_IMAGE_BANNER_URL}/{$selectFollowersValue.0.green_theme_image}" alt="{$selectFollowersValue.0.green_theme_image|stripslashes}" title="{$selectFollowersValue.0.green_theme_image|stripslashes}" width="100" height="50" />
					</span>
				{/if}
				
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_theme_orange_image} </label>
			<div class="controls">
				<label for="file" class="input input-file widt300" name="uploadImagefile" id="uploadImagefile">
					<div class="button"><input type="file" tabindex="1030" value="" onchange="this.parentNode.nextSibling.value = this.value" name="orange_theme_image" id="theme_image">Browse</div><input type="text" readonly="" class="hei40"><p></p>
				</label>
				{if $smarty.get.theme_id neq '' and $selectFollowersValue.0.orange_theme_image neq ''}
					<span class="photoContainer">
						<img src="{$SITE_IMAGE_BANNER_URL}/{$selectFollowersValue.0.orange_theme_image}" alt="{$selectFollowersValue.0.orange_theme_image|stripslashes}" title="{$selectFollowersValue.0.orange_theme_image|stripslashes}" width="100" height="50" />
					</span>
				{/if}
				
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_theme_violet_image} </label>
			<div class="controls">
				<label for="file" class="input input-file widt300" name="uploadImagefile" id="uploadImagefile">
					<div class="button"><input type="file" tabindex="1030" value="" onchange="this.parentNode.nextSibling.value = this.value" name="violet_theme_image" id="theme_image">Browse</div><input type="text" readonly="" class="hei40">
					<p></p>
				</label>
				{if $smarty.get.theme_id neq '' and $selectFollowersValue.0.violet_theme_image neq ''}
					<span class="photoContainer">
						<img src="{$SITE_IMAGE_BANNER_URL}/{$selectFollowersValue.0.violet_theme_image}" alt="{$selectFollowersValue.0.violet_theme_image|stripslashes}" title="{$selectFollowersValue.0.violet_theme_image|stripslashes}" width="100" height="50" />
					</span>
				{/if}
			</div>
		</div>-->
		<div class="control-group">	
			<label class="control-label label" for="">Status <span class="color1">*</span></label>
			<!--<div class="controls">
				<input type="checkbox" name="status" id="status" {if $smarty.get.status eq '1' || $selectFollowersValue.0.status eq '1'} checked="checked" {/if}  value="1"/>
				<script type="text/javascript">document.addNewTheme.status.focus();</script>
			</div>-->
            <div class="controls">
				<label class="span1 offset0">
					<input class="radioButtAlign" type="radio" name="status" id="status_active" value="1" {if $selectFollowersValue.0.status|stripslashes eq '1'}checked{/if}/>
					 Active
				</label>
				<label class="span1 offset0">
					<input class="radioButtAlign" type="radio" name="status" id="status_inactive" value="0" {if $selectFollowersValue.0.status|stripslashes eq '0'}checked{/if}/>
					 Inactive
				</label>
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">&nbsp;</label>
			<div class="controls">
				<input type="submit" class="btn btn-success" name="theme_addEdit" value="{if $smarty.get.theme_id neq ''}{$LANG.admin_edit}{else}{$LANG.admin_add}{/if}">
				<a class="btn btn-danger" href="thememanage.php">Cancel</a>
			</div>
		</div>
	</form>
</div>