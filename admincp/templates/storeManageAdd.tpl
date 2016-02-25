<div class="rightContHeading Heading">{if $smarty.get.store_id neq ''}{$LANG.admin_edit_store}{else}{$LANG.admin_add_store}{/if} <a class="backButt pull-right" href="storeManage.php"><i class="fa fa-backward"></i> {$LANG.admin_back}</a></div>
<div class="ContBody clearfix">
	<div class="alert alert-dismissable alert-info fade in">
		<button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="fa fa-remove"></i></button>
		<span class="title"><i class="fa fa-info-circle"></i> <span class="red">*</span> - {$LANG.admin_required_field}</span>
	</div>
	<div id="errormsg"><span class="color1">{$ErrorMessage}</span></div>
	<!--onsubmit="return validateBanner({$banner_width},{$banner_height});"-->
	<form name="addNewStore" method="post" enctype="multipart/form-data" onsubmit="return validateStore({if $smarty.get.store_id neq ''}'{$LANG.admin_edit}'{else}'{$LANG.admin_add}'{/if});" class="sky-form form-horizontal skyformbgNon">	
	<input type="hidden" name="action" value="{if $smarty.get.store_id eq ''}storemanageadd{else}storemanageedit{/if}">
	<input type="hidden" name="store_id" id="store_id" value="{$smarty.get.store_id}">		
		<div class="clearfix priceHeading">{$LANG.admin_store_management}</div>
		<div class="control-group">	
			<label class="control-label label" for="">Store Name <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" name="store_name" id="store_name" value="{if $smarty.get.store_id neq ''}{$selectFollowersValue.0.store_name|stripslashes}{/if}" />
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">Store Description <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" name="store_description" id="store_description" value="{if $smarty.get.store_id neq ''}{$selectFollowersValue.0.store_description|stripslashes}{/if}" />
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_store_image} <span class="color1">*</span></label>
			<div class="controls">
				<label for="file" class="input input-file widt300" name="uploadImagefile" id="uploadImagefile">
					<div class="button"><input type="file" tabindex="1030" value="" onchange="this.parentNode.nextSibling.value = this.value" name="store_image" id="store_image">Browse</div><input type="text" readonly="" class="hei40">
					<p></p>
				</label>
				
				{if $smarty.get.store_id neq '' and $selectFollowersValue.0.store_image neq ''}
					<span class="photoContainer">
						<img src="{$SITE_IMAGE_STORE_URL}/{$selectFollowersValue.0.store_image}" alt="{$selectFollowersValue.0.store_image|stripslashes}" title="{$selectFollowersValue.0.store_image|stripslashes}" width="100" height="50" />
					</span>
				{/if}
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_store_red_image} </label>
			<div class="controls">
				<label for="file" class="input input-file widt300" name="uploadImagefile" id="uploadImagefile">
					<div class="button"><input type="file" tabindex="1030" value="" onchange="this.parentNode.nextSibling.value = this.value" name="red_store_image" id="store_image">Browse</div><input type="text" readonly="" class="hei40">
					<p></p>
				</label>
				{if $smarty.get.store_id neq '' and $selectFollowersValue.0.red_store_image neq ''}
					<span class="photoContainer">
						<img src="{$SITE_IMAGE_STORE_URL}/{$selectFollowersValue.0.red_store_image}" alt="{$selectFollowersValue.0.red_store_image|stripslashes}" title="{$selectFollowersValue.0.store_image|stripslashes}" width="100" height="50" />
					</span>
				{/if}
				
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_store_green_image} </label>
			<div class="controls">
				<label for="file" class="input input-file widt300" name="uploadImagefile" id="uploadImagefile">
					<div class="button"><input type="file" tabindex="1030" value="" onchange="this.parentNode.nextSibling.value = this.value" name="green_store_image" id="store_image">Browse</div><input type="text" readonly="" class="hei40"><p></p>
				</label>
				{if $smarty.get.store_id neq '' and $selectFollowersValue.0.green_store_image neq ''}
					<span class="photoContainer">
						<img src="{$SITE_IMAGE_STORE_URL}/{$selectFollowersValue.0.green_store_image}" alt="{$selectFollowersValue.0.green_store_image|stripslashes}" title="{$selectFollowersValue.0.green_store_image|stripslashes}" width="100" height="50" />
					</span>
				{/if}
				
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_store_orange_image} </label>
			<div class="controls">
				<label for="file" class="input input-file widt300" name="uploadImagefile" id="uploadImagefile">
					<div class="button"><input type="file" tabindex="1030" value="" onchange="this.parentNode.nextSibling.value = this.value" name="orange_store_image" id="store_image">Browse</div><input type="text" readonly="" class="hei40"><p></p>
				</label>
				{if $smarty.get.store_id neq '' and $selectFollowersValue.0.orange_store_image neq ''}
					<span class="photoContainer">
						<img src="{$SITE_IMAGE_STORE_URL}/{$selectFollowersValue.0.orange_store_image}" alt="{$selectFollowersValue.0.orange_store_image|stripslashes}" title="{$selectFollowersValue.0.orange_store_image|stripslashes}" width="100" height="50" />
					</span>
				{/if}
				
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_store_violet_image} </label>
			<div class="controls">
				<label for="file" class="input input-file widt300" name="uploadImagefile" id="uploadImagefile">
					<div class="button"><input type="file" tabindex="1030" value="" onchange="this.parentNode.nextSibling.value = this.value" name="violet_store_image" id="store_image">Browse</div><input type="text" readonly="" class="hei40">
					<p></p>
				</label>
				{if $smarty.get.store_id neq '' and $selectFollowersValue.0.violet_store_image neq ''}
					<span class="photoContainer">
						<img src="{$SITE_IMAGE_STORE_URL}/{$selectFollowersValue.0.violet_store_image}" alt="{$selectFollowersValue.0.violet_store_image|stripslashes}" title="{$selectFollowersValue.0.violet_store_image|stripslashes}" width="100" height="50" />
					</span>
				{/if}
			</div>
		</div>
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
				<input type="submit" class="btn btn-success" name="store_addEdit" value="{if $smarty.get.store_id neq ''}{$LANG.admin_edit}{else}{$LANG.admin_add}{/if}">
				<a class="btn btn-danger" href="storeManage.php">Cancel</a>
			</div>
		</div>
	</form>
</div>