<div class="rightContHeading Heading">{if $smarty.get.price_id neq ''}{$LANG.admin_edit_price}{else}{$LANG.admin_add_price}{/if} <a class="backButt pull-right" href="pricemanage.php"><i class="fa fa-backward"></i> {$LANG.admin_back}</a></div>
<div class="ContBody clearfix">
	<div class="alert alert-dismissable alert-info fade in">
		<button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="fa fa-remove"></i></button>
		<span class="title"><i class="fa fa-info-circle"></i> <span class="red">*</span> - {$LANG.admin_required_field}</span>
	</div>
	<div id="errormsg"><span class="color1">{$ErrorMessage}</span></div>
	<!--onsubmit="return validateBanner({$banner_width},{$banner_height});"-->
	<form name="addNewPrice" method="post" enctype="multipart/form-data" onsubmit="return validatePrice();" class="sky-form form-horizontal skyformbgNon">	
	<input type="hidden" name="action" value="{if $smarty.get.price_id eq ''}pricemanageadd{else}pricemanageedit{/if}">
	<input type="hidden" name="price_id" id="price_id" value="{$smarty.get.price_id}">			
		<div class="clearfix priceHeading">{$LANG.admin_price_manage}</div>
		
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_price_name} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" name="price_name" id="price_name" value="{if $smarty.get.price_id neq ''}{$selectFollowersValue.0.price_name|stripslashes}{else}{$smarty.post.price_name}{/if}" />
				<script type="text/javascript">document.addNewPrice.price_name.focus();</script>
			</div>
		</div>
		
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_price_description} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" name="price_description" id="price_description" value="{if $smarty.get.price_id neq ''}{$selectFollowersValue.0.price_description|stripslashes}{else}{$smarty.post.price_description}{/if}" />
				<script type="text/javascript">document.addNewPrice.price_description.focus();</script>
			</div>
		</div>
		
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_price} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" name="price" id="price" value="{if $smarty.get.price_id neq ''}{$selectFollowersValue.0.price|stripslashes}{else}{$smarty.post.price}{/if}" />
				<script type="text/javascript">document.addNewPrice.price.focus();</script>
			</div>
		</div>
      {*  <div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_price} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="number" min="1"  name="days" id="days"  value="{if $smarty.post.days eq ''}{$selectFollowersValue.0.days}{else}{$smarty.post.days}{/if}" />
				<script type="text/javascript">document.addNewPrice.days.focus();</script>
			</div>
		</div>
		
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_status} <span class="color1">*</span></label>
			<!--<div class="controls">
				<input type="checkbox" name="status" id="status" {if $smarty.post.status eq '1' || $selectFollowersValue.0.status eq '1'} checked="checked" {/if}  value="1"/>
				<script type="text/javascript">document.addNewPrice.status.focus();</script>
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
				<script type="text/javascript">document.addNewPrice.status.focus();</script>
			</div>
		</div>  *}
		
		<div class="control-group">	
			<label class="control-label label" for="">&nbsp;</label>
			<div class="controls">
				<input type="submit" class="btn btn-success" name="price_addEdit" value="{if $smarty.get.price_id neq ''}{$LANG.admin_edit}{else}{$LANG.admin_add}{/if}">
				<a class="btn btn-danger" href="pricemanage.php">Cancel</a>
			</div>
		</div>
	</form>
</div>