<div class="rightContHeading Heading">{if $smarty.get.blog_id neq ''}{$LANG.admin_edit_blog}{else}{$LANG.admin_add_blog}{/if} <a class="backButt pull-right" href="blogManage.php"><i class="fa fa-backward"></i> {$LANG.admin_back}</a></div>
<div class="ContBody clearfix">
	<div class="alert alert-dismissable alert-info fade in">
		<button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="fa fa-remove"></i></button>
		<span class="title"><i class="fa fa-info-circle"></i> <span class="red">*</span> - {$LANG.admin_required_field}</span>
	</div>
	<div id="errormsg"><span class="color1">{$ErrorMessage}</span></div>
	<!--onsubmit="return validateBanner({$banner_width},{$banner_height});"-->
	<form name="addNewBlog" method="post" enctype="multipart/form-data" onsubmit="return validateBlog({if $smarty.get.blog_id neq ''}'{$LANG.admin_edit}'{else}'{$LANG.admin_add}'{/if});" class="sky-form form-horizontal skyformbgNon">	
	<input type="hidden" name="action" value="{if $smarty.get.blog_id eq ''}blogmanageadd{else}blogmanageedit{/if}">
	<input type="hidden" name="blog_id" id="blog_id" value="{$smarty.get.blog_id}">
		<div class="clearfix priceHeading">{$LANG.admin_blog_management}</div>
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_blog_name} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" name="blog_name" id="blog_name" onkeyup="checkblogName();"  value="{if $smarty.get.blog_id neq ''}{$selectFollowersValue.0.blog_name|stripslashes}{/if}" />
				<script type="text/javascript">document.addNewBlog.blog_name.focus();</script>
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_blog_description} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" name="blog_description" id="blog_description" value="{if $smarty.get.blog_id neq ''}{$selectFollowersValue.0.blog_description|stripslashes}{/if}" />
				<script type="text/javascript">document.addNewBlog.blog_description.focus();</script>	
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_blog_image} <span class="color1">*</span></label>
			<div class="controls">
				<label for="file" class="input input-file widt300" name="uploadImagefile" id="uploadImagefile">
					<div class="button"><input type="file" tabindex="1030" value="" onchange="this.parentNode.nextSibling.value = this.value" name="blog_image" id="blog_image">Browse</div><input type="text" readonly="" class="hei40">
					<p></p>
				</label>
				
				{if $smarty.get.blog_id neq '' and $selectFollowersValue.0.blog_image neq ''}
					<span class="photoContainer">
						<img src="{$SITE_IMAGE_BLOG_URL}/{$selectFollowersValue.0.blog_image}" alt="{$selectFollowersValue.0.blog_image|stripslashes}" title="{$selectFollowersValue.0.blog_image|stripslashes}" width="100" height="50" />
					</span>
				{/if}	
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_blog_red_image} <span class="color1">*</span></label>
			<div class="controls">
				<label for="file" class="input input-file widt300" name="uploadImagefile" id="uploadImagefile">
					<div class="button"><input type="file" tabindex="1030" value="" onchange="this.parentNode.nextSibling.value = this.value" name="red_blog_image" id="blog_image">Browse</div><input type="text" readonly="" class="hei40">
					<p></p>
				</label>
				
				{if $smarty.get.blog_id neq '' and $selectFollowersValue.0.blog_image neq ''}
					<span class="photoContainer">
						<img src="{$SITE_IMAGE_BLOG_URL}/{$selectFollowersValue.0.red_blog_image}" alt="{$selectFollowersValue.0.red_blog_image|stripslashes}" title="{$selectFollowersValue.0.red_blog_image|stripslashes}" width="100" height="50" />
					</span>
				{/if}	
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_blog_green_image} <span class="color1">*</span></label>
			<div class="controls">
				<label for="file" class="input input-file widt300" name="uploadImagefile" id="uploadImagefile">
					<div class="button"><input type="file" tabindex="1030" value="" onchange="this.parentNode.nextSibling.value = this.value" name="green_blog_image" id="blog_image">Browse</div><input type="text" readonly="" class="hei40">
					<p></p>
				</label>
				
				{if $smarty.get.blog_id neq '' and $selectFollowersValue.0.green_blog_image neq ''}
					<span class="photoContainer">
						<img src="{$SITE_IMAGE_BLOG_URL}/{$selectFollowersValue.0.green_blog_image}" alt="{$selectFollowersValue.0.green_blog_image|stripslashes}" title="{$selectFollowersValue.0.green_blog_image|stripslashes}" width="100" height="50" />
					</span>
				{/if}	
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_blog_orange_image} <span class="color1">*</span></label>
			<div class="controls">
				<label for="file" class="input input-file widt300" name="uploadImagefile" id="uploadImagefile">
					<div class="button"><input type="file" tabindex="1030" value="" onchange="this.parentNode.nextSibling.value = this.value" name="orange_blog_image" id="blog_image">Browse</div><input type="text" readonly="" class="hei40">
					<p></p>
				</label>
				
				{if $smarty.get.blog_id neq '' and $selectFollowersValue.0.orange_blog_image neq ''}
					<span class="photoContainer">
						<img src="{$SITE_IMAGE_BLOG_URL}/{$selectFollowersValue.0.orange_blog_image}" alt="{$selectFollowersValue.0.orange_blog_image|stripslashes}" title="{$selectFollowersValue.0.orange_blog_image|stripslashes}" width="100" height="50" />
					</span>
				{/if}	
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_blog_violet_image} <span class="color1">*</span></label>
			<div class="controls">
				<label for="file" class="input input-file widt300" name="uploadImagefile" id="uploadImagefile">
					<div class="button"><input type="file" tabindex="1030" value="" onchange="this.parentNode.nextSibling.value = this.value" name="violet_blog_image" id="blog_image">Browse</div><input type="text" readonly="" class="hei40">
					<p></p>
				</label>
				
				{if $smarty.get.blog_id neq '' and $selectFollowersValue.0.violet_blog_image neq ''}
					<span class="photoContainer">
						<img src="{$SITE_IMAGE_BLOG_URL}/{$selectFollowersValue.0.violet_blog_image}" alt="{$selectFollowersValue.0.violet_blog_image|stripslashes}" title="{$selectFollowersValue.0.violet_blog_image|stripslashes}" width="100" height="50" />
					</span>
				{/if}	
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">Status <span class="color1">*</span></label>
			<!--<div class="controls">
				<input type="checkbox" name="status" id="status" {if $smarty.get.status eq '1' || $selectFollowersValue.0.status eq '1'} checked="checked" {/if}  value="1"/>
				<script type="text/javascript">document.addNewBlog.status.focus();</script>	
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
				<script type="text/javascript">document.addNewTheme.status.focus();</script>
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">&nbsp;</label>
			<div class="controls">
				<input type="submit" class="btn btn-success" name="blog_addEdit" value="{if $smarty.get.blog_id neq ''}{$LANG.admin_edit}{else}{$LANG.admin_add}{/if}">
				<a class="btn btn-danger" href="blogManage.php">Cancel</a>
			</div>
		</div>
	</form>
</div>