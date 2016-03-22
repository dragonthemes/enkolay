{if $smarty.get.langid neq '' and $smarty.get.lfile neq ''}
	{include file='languageFilesEdit.tpl'}
{else}
<!--Add Edit-->
<div class="Heading">{if $smarty.get.langid neq ''}{$LANG.admin_edit_language}{else}{$LANG.admin_add_language}{/if} <a class="backButt pull-right" href="languageManageAdmin.php"><i class="fa fa-backward"></i> {$LANG.admin_back}</a></div>
<div class="ContBody clearfix">
	<div id="errormsg" class="no-mar"></div>
	<form name="languagemgmt" method="post" onsubmit="{if $smarty.get.langid neq ''}return editLanguage();{else}return addNewLanguage();{/if}" class="sky-form form-horizontal skyformbgNon">
		<input type="hidden" name="langid" id="langid" value="{$smarty.get.langid}">
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_language_name} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" name="languagename" id="languagename"  value="{if $smarty.get.langid neq ''}{$langvalue.0.lang_name}{/if}" />
				<script type="text/javascript">document.languagemgmt.languagename.focus();</script>
				<div class="tooltip"><div class="HelpButton">?</div><span>Enter Language name</span></div>
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_language_code} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" name="languagecode" id="languagecode" maxlength="2" value="{if $smarty.get.langid neq ''}{$langvalue.0.lang_code}{/if}" />	
				<div class="tooltip"><div class="HelpButton">?</div><span>Enter Language code</span></div>	
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">&nbsp;</label>
			<div class="controls">
				<input type="submit" class="btn btn-success" name="addEdit" value="{if $smarty.get.langid neq ''}{$LANG.admin_edit}{else}{$LANG.admin_add}{/if}">
				<a class="btn btn-danger" href="languageManageAdmin.php">{$LANG.admin_cancel}</a>	
			</div>
		</div>
	</form>
</div>
{/if}