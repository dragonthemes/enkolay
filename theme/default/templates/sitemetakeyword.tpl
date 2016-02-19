<div class="marTop10 clearfix">
	<div id="sitemetakeyword" style="display:block">
		<div class="subdomainLeft">{$LANG.main_meta}</div>
        <div id="succ_key"></div>
		<div class="subdomainRight clearfix">
			<!--{$settingpage.0.metakeywords}-->
			<div id="sitekeyword">
				<form name="site_word" id="site_word" class="no-mar" method="post" action="">
					<div class="subdomainformLeft">
						<input type="text" name="site_metakeyword" class="PageMainRightTxtBx" id="site_metakeyword" placeholder="Anahtar kelimelerinizi buraya girin" value="{$settingpage.0.metakeywords}">
					</div>
					<div class="subdomainformRight">
						<input type="button" class="btn btn-primary" name="save" id="save" value="{$LANG.main_save}" onclick="SaveKeyword();">
						<!--<input  type="button" class="btn btn-danger" name="cancel" id="cancel" value="{$LANG.main_cancel}" onclick="showADiv('sitemetakeyword','sitekeyword');">-->
					</div>
					<div class="clr"></div>
					<div class="seoformComment">{$LANG.main_seperate_key}</div>
				</form>
			</div>
		</div>		
	</div>
</div>