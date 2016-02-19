<div class="marTop10 clearfix">
	<div id="sitefooter" style="display:block">
		<div class="subdomainLeft">{$LANG.main_footer}</div>
        <div id="succ_footer"></div>
		<div class="subdomainRight clearfix">
			<!--{$settingpage.0.footer_code}-->
			<div id="sitefootercode">
				<form name="site_footer" id="site_footer" method="post" class="no-mar" action="">
					<div class="subdomainformLeft">
						<textarea name="footercode" id="footercode" class="PageMainRightTxtArea" placeholder="Varsa alt kısım kodunu buraya girin">{$settingpage.0.footer_code}</textarea>
					</div>
					<div class="subdomainformRight">
						<input type="button" class="btn btn-primary" name="save" id="save" value="{$LANG.main_save}" onclick="SaveFooter();">
						<!--<input  type="button" class="btn btn-danger" name="cancel" id="cancel" value="{$LANG.main_cancel}" onclick="showADiv('sitefooter','sitefootercode');">-->
					</div>
					<div class="clr"></div>
					<div class="seoformComment">{$LANG.main_google}</div>
					<div class="spaceHei"></div>
				</form>
			</div>
		</div>
	</div>
</div>