<div class="rightContHeading Heading">{if $smarty.get.conid neq ''}{$LANG.admin_edit_content}{else}{$LANG.admin_add_content}{/if} <a class="backButt pull-right" href="staticPageManage.php"><i class="fa fa-backward"></i> {$LANG.admin_back}</a></div>
<div class="ContBody clearfix">
	<form name="contentMgmt" method="post" onsubmit="{if $smarty.get.conid neq ''}return editStatic();{else}return addNewStatic();{/if}" class="sky-form form-horizontal skyformbgNon">
		<input type="hidden" name="conid" id="conid" value="{$smarty.get.conid}">
		<input type="hidden" name="action" value="{if $smarty.get.conid eq ''}{$LANG.admin_add}{else}{$LANG.admin_edit}{/if}">
		<div class="clearfix priceHeading">{$LANG.admin_contentinfo}</div>
		<div class="tab-pane fade active in" id="contactinfo_content">
			{include file='content_info.tpl'}
		</div>
		<div class="control-group">	
			<label class="control-label label">&nbsp;</label>
			<div class="controls">
				<input type="submit" class="btn btn-success" name="addEdit" value="{if $smarty.get.conid neq ''}{$LANG.admin_edit}{else}{$LANG.admin_add}{/if}">
				<a class="btn btn-danger" href="staticPageManage.php">Cancel</a>
			</div>
		</div>			
	</form>
</div>