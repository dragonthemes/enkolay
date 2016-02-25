<div class="Heading">{$LANG.admin_edit_language_files} - {$langcode}<a class="backButt pull-right" href="languageManageAdmin.php"><i class="fa fa-backward"></i> {$LANG.admin_back}</a></div>
<div class="ContBody clearfix">
	<div id="errormsg"></div>
	<form name="languagemgmt" class="no-mar" method="post" onsubmit="return updateselectLangFile()" >
		<input type="hidden" name="langid" id="langid" value="{$smarty.get.langid}" />
		<input type="hidden" name="lfile" id="lfile" value="{$smarty.get.lfile}" />
		<div class="sky-form form-horizontal skyformbgNon">
			<ul class="page">
				<li class="pages">{$LANG.admin_select_file} <span class="color1">*</span></li>
				<li class="pages">
					<label class="select">
						<select class="pageSelectbox" name="lang_file_name" id="lang_file_name" onchange="loadselectLangFile(this.value,'{$smarty.get.langid}','{$langcode}');">
							{section loop=$dir_files_list name=lf}
							<option value="{$dir_files_list[lf]}" {if $dir_files_list[lf] eq $smarty.get.lfile}selected="selected"{/if}>
								{$dir_files_list[lf]}</option>
							{/section}
						</select>	
						<i></i>
					</label>
				</li>
			</ul>
			<div class="clr"></div>
			<div class="page marTop20">
				<span class="pages">{$LANG.admin_lang_file} <span class="color1">*</span></span>
				<span class="pages">
					<textarea style="height:200px; width:100%;" name="langfilecontent" id="langfilecontent" cols="100" rows="25" />{$filedata|stripslashes}</textarea>
				</span>
			</div>
			<div class="clr"></div>
			<div class="marTop20">
				<input type="submit" class="btn btn-success" name="addEdit" value="{if $smarty.get.langid neq ''}{$LANG.admin_edit}{else}{$LANG.admin_add}{/if}">
				<a class="btn btn-danger" href="languageManageAdmin.php">{$LANG.admin_cancel}</a>
			</div>
		</div>
	</form>
</div>