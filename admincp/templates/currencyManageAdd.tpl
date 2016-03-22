<div class="rightContHeading Heading">{if $smarty.get.blog_id neq ''}{$LANG.admin_edit_theme}{else}{$LANG.admin_add_currency}{/if} <a class="backButt pull-right" href="currencyManage.php"><i class="fa fa-backward"></i> {$LANG.admin_back}</a></div>
<div class="ContBody clearfix">
	<div class="alert alert-dismissable alert-info fade in">
		<button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="fa fa-remove"></i></button>
		<span class="title"><i class="fa fa-info-circle"></i> <span class="red">*</span> - {$LANG.admin_required_field}</span>
	</div>
	<div id="errormsg"><span class="color1">{$ErrorMessage}</span></div>
	<!--onsubmit="return validateBanner({$banner_width},{$banner_height});"-->
	<form name="addNewTheme" method="post" enctype="multipart/form-data" onsubmit="return validateCurrency({if $smarty.get.id neq ''}'{$LANG.admin_edit}'{else}'{$LANG.admin_add}'{/if});" class="sky-form form-horizontal skyformbgNon">	
	<input type="hidden" name="action" value="{if $smarty.get.id eq ''}currencyManageAdd{else}currencyManageEdit{/if}">
	<input type="hidden" name="id" id="id" value="{$smarty.get.id}">		
		<div class="clearfix priceHeading">{$LANG.admin_currency_management}</div>
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_currency_name}<span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" name="currency_name" id="currency_name" value="{if $smarty.get.id neq ''}{$selectCurrencyValue.0.currency_name|stripslashes}{/if}" />
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_currency_code}<span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" name="currency_code" id="currency_code" value="{if $smarty.get.id neq ''}{$selectCurrencyValue.0.currency_code|stripslashes}{/if}" />
			</div>
		</div>
		<div class="control-group">
		
		<label class="control-label label" for="">{$LANG.admin_currency_type}<span class="color1">*</span></label>
		<label class="span1 offset0">
					<input class="radioButtAlign" type="radio" name="currency_type" value="S" id="currency_type" onclick="symbolshow();" {if $selectCurrencyValue.0.currency_type|stripslashes eq 'S'}{/if}checked="checked">{$LANG.currency_symbol}
		</label>			
					<div  id="currency_symbol">	
				<label class="control-label label" for="">{$LANG.admin_currency_symbol}<span class="color1">*</span></label>
				<input class="textbox" type="text" name="symbol" value="{if $smarty.get.id neq ''}{$selectCurrencyValue.0.currency_symbol|stripslashes}{/if}" id="symbol" >
					 </div>
		
				
				<label class="span1 offset0">
					<input class="radioButtAlign" type="radio" name="currency_type" id="currency_type" value="I"  {if $selectCurrencyValue.0.currency_type|stripslashes eq 'I'}{/if} onclick="Imageshow();" >{$LANG.currency_Image}</label>
					<div id="currrency_image" style="display:none;">
				<label class="control-label label" for="">{$LANG.currency_image}<span class="color1">*</span></label>
			<input type="file" id="image" name="currency_image" value="{if $smarty.get.id neq ''}{$selectCurrencyValue.0.currency_image|stripslashes}{/if}" name="image">
					</div>
		</div>
		
		
		
	<div class="control-group">	
		<label class="control-label label" for="">{$LANG.admin_currency_status}<span class="color1">*</span></label>
				<label class="span1 offset0">
					<input class="radioButtAlign" type="radio" name="status" id="status_active" value="1" {if $selectCurrencyValue.0.status|stripslashes eq '1'}checked{/if}/>
					 Active
				</label>
				<label class="span1 offset0">
					<input class="radioButtAlign" type="radio" name="status" id="status_inactive" value="0" {if $selectCurrencyValue.0.status|stripslashes eq '0'}checked{/if}/>
					 Inactive
				</label>
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">&nbsp;</label>
			<div class="controls">
				<input type="submit" class="btn btn-success" name="theme_addEdit" value="{if $smarty.get.id neq ''}{$LANG.admin_edit}{else}{$LANG.admin_add}{/if}">
				<a class="btn btn-danger" href="currencyManage.php">Cancel</a>
			</div>
		</div>
	</form>
